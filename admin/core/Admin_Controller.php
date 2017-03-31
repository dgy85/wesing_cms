<?php

class Admin_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $usrKey = $this->session->userdata('usrKey');
        if(!$usrKey){
            redirect('/Auth/login');
        }
    }

    public function showpage($pagefile,array $args = array(),$returnString = false)
    {
        $args['page'] = isset($args['page']) && $args['page']>0 ? (isset($args['total']) & $args['total']>0 ? ($args['page']>$args['total'] ? $args['total'] : $args['page']) : 1) : 1;
        $args['total'] = isset($args['total']) && $args['total']>0 ? $args['total'] : 1;
        $args['datarange'] = sprintf('%s-%s',($args['page']-1)*20+1,$args['page']*20);
        $args['menu'] = $this->config->item('menu');
        return $this->load->view($pagefile,$args,$returnString);
    }

    protected function _response($msg,$code)
    {
        echo json_encode(array(
            'responseCode'=>$code,
            'responseMsg'=>$msg
        ));
        exit;
    }
}