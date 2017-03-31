<?php
class Administrator extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('administrator_model');
    }

    public function index()
    {
        $args = $this->administrator_model->getlist();
        $this->showpage('admin/adminusr_list',$args);
    }

    public function add()
    {
        $this->showpage('admin/adminusr_add');
    }

    public function addUsr()
    {
        $username = $this->input->post('adminname',true);
        $userpass = $this->input->post('adminpass',true);
        $usercpss = $this->input->post('confirmpass',true);

        if(!preg_match('/^[a-zA-Z0-9_&]{3,15}$/',$username)){
            $this->_response('用户名格式错误',400);
        }

        if(!preg_match('/^[a-zA-Z0-9_&]{6,15}$/',$userpass)){
            $this->_response('密码格式错误',400);
        }

        if($usercpss != $userpass){
            $this->_response('两次输入密码不一致',400);
        }

        $respMsg = $this->administrator_model->addNew($username,$userpass);

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('用户创建成功',200);
    }
}