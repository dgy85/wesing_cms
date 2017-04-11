<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends WeSing_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
    }

    public function index()
	{
	    $cate = (array)$this->page_model->getCategoryList();
	    $slider = (array)$this->page_model->getSliderList();
        $args = array_merge(array(),$cate,$slider);
		$this->load->view('wesing/home',$args);
	}

	public function cate($cateID,$page=1)
    {
        $args = $this->page_model->getCateDetail($cateID,$page);
        $this->load->view('wesing/pagelist',$args);
    }

    public function art($documentid){
        $args = $this->page_model->getArt($documentid);
        $this->load->view('wesing/artdetail',$args);
    }
}
