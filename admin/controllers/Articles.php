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
        $this->showpage('admin/art_add');
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
        $documentId = (int)$documentId;
        $adminRs = (array)$this->articles_model->getByPriIntKey($documentId);
        $this->showpage('admin/art_edit',$adminRs);
    }

    public function add_art()
    {
        $artTitle = $this->input->post('art_title',true);
        $artDesc = $this->input->post('art_desc',true);
        $artContent = $this->input->post('art_content',true);

        if(strlen($artTitle)>100){
            $this->_response('文章标题不能超过100个字符',400);
        }

        $this->articles_model->setMeta('art_title',$artTitle);
        $this->articles_model->setMeta('art_desc',$artDesc);
        $this->articles_model->setMeta('art_content',$artContent);
        $this->articles_model->setMeta('art_ctime',date('Y-m-d H:i:s'));
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
        $artDesc = $this->input->post('art_desc',true);
        $artContent = $this->input->post('art_content',true);

        if(strlen($artTitle)>100){
            $this->_response('文章标题不能超过100个字符',400);
        }

        $artRs = $this->articles_model->getByPriIntKey($documentid);

        if(!$artRs) $this->_response('文章不存在',400);

        $this->articles_model->setMeta('art_title',$artTitle);
        $this->articles_model->setMeta('art_desc',$artDesc);
        $this->articles_model->setMeta('art_content',$artContent);
        $respMsg = $this->articles_model->updateRec($documentid);

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('文章信息已保存',200);
    }
}