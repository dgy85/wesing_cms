<?php
class Apis extends Admin_Controller
{
    private $api;
    public function index()
    {
        $this->showpage('admin/api_pannel',$args);

    }
}