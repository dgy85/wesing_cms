<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends WeSing_Controller {
	public function index()
	{
	    $this->load->model('page_model');
	    $args = (array)$this->page_model->getCategoryList();

		$this->load->view('wesing/home',$args);
	}

	public function cate($cateID,$page=1)
    {

    }
}
