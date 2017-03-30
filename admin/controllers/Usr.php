<?php
class Usr extends Admin_Controller
{
    public function index()
    {
        $this->showpage('admin/wxusr_list');
    }
}