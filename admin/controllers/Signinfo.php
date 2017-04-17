<?php

class Signinfo extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('signinfo_model');
    }

    public function index($page=1)
    {
        $page = (int)$page<0 ? 1 : (int)$page;
        $args = $this->signinfo_model->getlist($page,10);
        $this->showpage('admin/signinfo_list',$args);
    }

    public function add()
    {

    }
}