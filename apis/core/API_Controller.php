<?php

class API_Controller extends CI_Controller
{
    private $_clientID = '';
    private $_secret   = '';
    protected $_responseType = "json";
    protected $allowOutputType = array(
        'xml' => 'application/xml',
        'json' => 'application/json'
    );

    public function __construct()
    {
        parent::__construct();
        $headers = array();
        foreach ($_SERVER as $name => $value)
        {
            if (substr($name, 0, 5) == 'HTTP_')
            {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }


        $this->load->model('auth_model','auth');

        $responseType = $this->input->get_post('format', true);
        $this->_responseType = in_array($responseType, array_keys($this->allowOutputType)) ? $responseType : $this->_responseType;

        //验证用户权限
        $clientid = '';
        $secret = '';
        if(isset($headers['Auth'])) {
            $Authorization = explode(' ', $headers['Auth']);
            if (sizeof($Authorization) != 2) {
                $this->_response(array('responseCode' => 403, 'responseMsg' => 'Authorization Incorrect'), 403);
            }

            $clientid = $Authorization[0];
            $secret = $Authorization[1];

        }

        if (!$clientid || !$secret || !$this->auth->verify($clientid,$secret)) {
            $this->_response(array('responseCode' => 403, 'responseMsg' => 'Authorization Not Valid'), 403);
        }
        $this->_clientID = $clientid;
        $this->_secret   = $secret;
    }

    /**
     * 数据输出
     * @param $data
     * @param int $httpStatusCode
     * @return string
     */
    public function _response($data,$httpStatusCode=200)
    {
        http_response_code($httpStatusCode);

        if (empty($data)) return '';
        if ('json' == $this->_responseType) {
            $data = json_encode($data);
        } elseif ('xml' == $this->_responseType) {
            $data = self::_xml_encode($data);
        } elseif ('php' == $this->_responseType) {
            $data = serialize($data);
        }else{
            $data = "error format";
        }

        $this->setContentType($this->_responseType);

        echo $data;
        $this->config->set_item('log_threshold',4);
        log_message('info','responsedata='.$data);
        exit;
    }

    /**
     * 头信息设置
     * @param $type
     * @param string $charset
     */
    protected function setContentType($type, $charset = '')
    {
        if (headers_sent()) return;
        $type = strtolower($type);
        if (isset($this->allowOutputType[$type])) //过滤content_type
            header('Content-Type: ' . $this->allowOutputType[$type] . '; charset=' . $charset);
    }

    /**
     * xml数据格式化
     * @param $data
     * @param string $root
     * @param string $item
     * @param string $attr
     * @param string $id
     * @param string $encoding
     * @return string
     */
    protected function _xml_encode($data, $root='root', $item='item', $attr='', $id='id', $encoding='utf-8') {
        if(is_array($attr)){
            $_attr = array();
            foreach ($attr as $key => $value) {
                $_attr[] = "{$key}=\"{$value}\"";
            }
            $attr = implode(' ', $_attr);
        }
        $attr   = trim($attr);
        $attr   = empty($attr) ? '' : " {$attr}";
        $xml    = "<?xml version=\"1.0\" encoding=\"{$encoding}\"?>";
        $xml   .= "<{$root}{$attr}>";
        $xml   .= self::_data_to_xml($data, $item, $id);
        $xml   .= "</{$root}>";
        return $xml;
    }

    /**
     * xml数据格式化
     * @param $data
     * @param string $item
     * @param string $id
     * @return string
     */
    protected function _data_to_xml($data, $item='item', $id='id') {
        $xml = $attr = '';
        foreach ($data as $key => $val) {
            if(is_numeric($key)){
                $id && $attr = " {$id}=\"{$key}\"";
                $key  = $item;
            }
            $xml    .=  "<{$key}{$attr}>";
            $xml    .=  (is_array($val) || is_object($val)) ? $this->_data_to_xml($val, $item, $id) : $val;
            $xml    .=  "</{$key}>";
        }
        return $xml;
    }
}