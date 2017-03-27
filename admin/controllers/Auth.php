<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->load->view('admin/login');
    }

    public function checkPass()
    {
        $uname = $this->input->get('uname');
        $upass = $this->input->get('upass');
        if(!$uname || !$upass){
            $this->_response(array('responseCode'=>403,'responseMsg'=>'账号或者密码不能为空'),403);
        }

        $this->session->set_userdata(array('usrKey'=>1));
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