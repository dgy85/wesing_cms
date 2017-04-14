<?php

class Articles extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('articles_model');
    }

    public function index($page =1)
    {
        $page = (int)$page<0 ? 1 : (int)$page;
        $args = $this->articles_model->getlist($page,10);
        $this->showpage('admin/art_list',$args);
    }

    public function add()
    {
        $this->load->model('category_model');
        $this->category_model->singlepage=0;
        $args = $this->category_model->getList(1,100);
        $this->showpage('admin/art_add',$args);
    }

    public function delete($documentId)
    {
        $documentId = (int)$documentId;
        if(!$documentId) $this->_response('参数错误',500);

        $delMsg = $this->articles_model->delete($documentId);
        if($delMsg) $this->_response($delMsg,500);
        $this->_response('记录已删除',200);
    }

    public function edit($documentId)
    {
        $this->load->model('category_model');

        $documentId = (int)$documentId;
        $adminRs = (array)$this->articles_model->getByPriIntKey($documentId);
        if(isset($adminRs[0]) && !$adminRs[0]) show_error('文档#'.$documentId.'不存在'.anchor('articles','返回').'',200,'出错了');

        $this->category_model->singlepage=0;
        $args = $this->category_model->getList(1,100);
        $adminRs = array_merge($adminRs,$args);
        $this->showpage('admin/art_edit',$adminRs);
    }

    public function add_art()
    {
        $artTitle = $this->input->post('art_title',true);
        $artDesc = $this->input->post('art_description',true);
        $category = $this->input->post('category',true);
        $artContent = $this->input->post('art_content',true);
        $artTitle = strip_tags($artTitle);
        $artDesc  = strip_tags($artDesc);
        $category = (int)$category;

        if(mb_strlen($artTitle)>100){
            $this->_response('文章标题不能超过100个字符',400);
        }

        $this->articles_model->setMeta('art_title',$artTitle);
        $this->articles_model->setMeta('cate_id',$category);
        $this->articles_model->setMeta('art_desc',$artDesc);
        $this->articles_model->setMeta('art_content',$artContent);
        $this->articles_model->setMeta('art_ctime',date('Y-m-d H:i:s'));
        $this->articles_model->setMeta('authorid',$this->session->userdata('id'));
        $respMsg = $this->articles_model->addNew();

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('记录创建成功',200);
    }

    public function save_art()
    {
        $documentid = $this->input->post('documentid',true);
        $artTitle = $this->input->post('art_title',true);
        $artDesc = $this->input->post('art_description',true);
        $category = $this->input->post('category',true);
        $artContent = $this->input->post('art_content',true);
        $artTitle = strip_tags($artTitle);
        $artDesc  = strip_tags($artDesc);

        if(mb_strlen($artTitle)>100){
            $this->_response('文章标题不能超过100个字符',400);
        }

        $artRs = $this->articles_model->getByPriIntKey($documentid);

        if(!$artRs) $this->_response('文章不存在',400);

        $this->articles_model->setMeta('art_title',$artTitle);
        $this->articles_model->setMeta('art_desc',$artDesc);
        $this->articles_model->setMeta('cate_id',$category);
        $this->articles_model->setMeta('art_content',$artContent);
        $respMsg = $this->articles_model->updateRec($documentid);

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('文章信息已保存',200);
    }
}