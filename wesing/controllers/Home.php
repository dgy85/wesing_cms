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
        $args['cateid'] = $cateID;
        $args['page'] = $page;

        if($args['subCates'])
            $this->load->view('wesing/pagelist',$args);
        elseif ($this->input->is_ajax_request()){
            $catInfo = current($args['catelist']);
            if(!$catInfo) exit(0);
            $responseString = "";
            foreach ($catInfo['art'] as $_artItem){
                $responseString.=sprintf('<li><a href="%s"><span>%s</span>%s</a></li>',
                    site_url('home/art/'.$_artItem['art_id']),
                    date('Y-m-d',strtotime($_artItem['art_ctime'])),
                    $_artItem['art_title']);
            }
            echo json_encode(array(
                'responseBody'=>$responseString,
                'responsePage'=>$catInfo['totalPage']
            ));
            exit(0);
        }else{
            $this->load->view('wesing/artlist',$args);
        }
    }

    public function art($documentid){
        $args = $this->page_model->getArt($documentid);
        $this->load->view('wesing/artdetail',$args);
    }

    public function usr_center()
    {
        $args = $this->page_model->getMyActs();
        $this->load->view('wesing/usrcenter',$args);
    }
}
