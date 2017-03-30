<?php
class Administrator extends Admin_Controller
{
    public function index()
    {
        $this->showpage('admin/adminusr_list');
    }
}