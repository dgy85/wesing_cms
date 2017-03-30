<?php

class Articles extends Admin_Controller
{
    public function index()
    {
        $this->showpage('admin/art_list');
    }

}