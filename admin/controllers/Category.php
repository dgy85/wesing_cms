<?php
class Category extends Admin_Controller
{
    public function index()
    {
        $this->showpage('admin/category_list');
    }
}