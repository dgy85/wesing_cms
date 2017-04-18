<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header("Location: ".site_url('Auth/login'));
    }

    public function checkPass()
    {
        $uname = $this->input->get('uname');
        $upass = $this->input->get('upass');
        if(!$uname || !$upass){
            $this->_response(array('responseCode'=>403,'responseMsg'=>'账号或者密码不能为空'),403);
        }

        $this->load->model('administrator_model','am');
        $adminInfo = $this->am->getByField('uname',$uname);
        if(!$adminInfo)
            $this->_response(array('responseCode'=>401,'responseMsg'=>'账号或者密码错误'),403);

        $adminPass = $adminInfo['upass'];
        $salt = $adminInfo['salt'];
        if(md5($uname.$upass.$salt)!=$adminPass)
            $this->_response(array('responseCode'=>402,'responseMsg'=>'账号或者密码错误'),403);

        unset($adminInfo['salt']);
        unset($adminInfo['upass']);
        $this->db->query(sprintf("update wesing_admin set lastlogin=now(),lastloginip=%d where id=%d",ip2long($this->input->ip_address()),$adminInfo['id']));
        $this->session->set_userdata($adminInfo);
        $this->_response(array('responseCode'=>200,'responseMsg'=>'用户登录成功'),200);
    }

    protected function _response(array $responseMsg,$httpCode = 200)
    {
        $httpCode = (int)$httpCode;
        http_response_code($httpCode);
        //logmsg(json_encode($responseMsg));
        echo json_encode($responseMsg);
        exit;
    }
}