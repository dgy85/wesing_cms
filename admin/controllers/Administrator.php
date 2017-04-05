<?php
class Administrator extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('administrator_model');
    }

    public function index($page=1)
    {
        $page = (int)$page<0 ? 1 : (int)$page;
        $args = $this->administrator_model->getlist($page,10);
        $this->showpage('admin/adminusr_list',$args);
    }

    public function add()
    {
        $this->showpage('admin/adminusr_add');
    }

    public function delete($documentId)
    {
        $documentId = (int)$documentId;
        if(!$documentId) $this->_response('参数错误',500);

        $delMsg = $this->administrator_model->delete($documentId);
        if($delMsg) $this->_response($delMsg,500);
        $this->_response('记录已删除',200);
    }

    public function edit($documentId)
    {
        $documentId = (int)$documentId;
        $adminRs = (array)$this->administrator_model->getByPriIntKey($documentId);
        $this->showpage('admin/adminusr_edit',$adminRs);
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

    public function saveEdit()
    {
        $adminid = $this->input->post('documentid',true);
        $userpass = $this->input->post('adminpass',true);
        $usercpss = $this->input->post('confirmpass',true);

        if(!preg_match('/^[a-zA-Z0-9_&]{6,15}$/',$userpass)){
            $this->_response('密码格式错误',400);
        }

        if($usercpss != $userpass){
            $this->_response('两次输入密码不一致',400);
        }

        $respMsg = $this->administrator_model->updateRec($adminid,$userpass);

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('密码已修改',200);
    }
}