<?php
class Usr extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index($page=1)
    {
        $page = (int)$page<0 ? 1 : (int)$page;
        $args = $this->user_model->getlist($page,10);
        $this->showpage('admin/wxusr_list',$args);
    }
}