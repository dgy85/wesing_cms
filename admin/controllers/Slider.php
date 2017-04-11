<?php
class Slider extends Admin_Controller
{
    private $typeMap = array(
        "link"=>"内容链接",
        "web"=>"网址"
    );
    public function __construct()
    {
        parent::__construct();
        $this->load->model('slider_model');
    }

    public function index($page=1)
    {
        $page = (int)$page<0 ? 1 : (int)$page;
        $args = $this->slider_model->getlist($page,10);
        $args['typeMap'] = $this->typeMap;
        $this->showpage('admin/slider_list',$args);
    }

    public function add()
    {
        $this->slider_model->parentid=0;
        $args = $this->slider_model->getList();
        $this->showpage('admin/slider_add',$args);
    }

    public function delete($documentId)
    {
        $documentId = (int)$documentId;
        if(!$documentId) $this->_response('参数错误',500);

        $delMsg = $this->slider_model->delete($documentId);
        if($delMsg) $this->_response($delMsg,500);
        $this->_response('记录已删除',200);
    }

    public function edit($documentId)
    {
        $documentId = (int)$documentId;
        $this->slider_model->parentid=0;
        $adminRs = (array)$this->slider_model->getByPriIntKey($documentId);
        $this->showpage('admin/slider_edit',$adminRs);
    }

    public function add_slider()
    {
        $stype = $this->input->post('stype',true);
        $starget = $this->input->post('target',true);
        $slidername = $this->input->post('slidername',true);
        $thub = $this->input->post('thub',true);

        if(mb_strlen($slidername)>20){
            $this->_response('分类名称不能超过20个字符',400);
        }

        if(!filter_var($starget,FILTER_VALIDATE_URL)){
            $this->_response('链接地址错误',400);
        }
        $this->slider_model->setMeta('s_type',$stype);
        $this->slider_model->setMeta('s_target',$starget);
        $this->slider_model->setMeta('s_title',$slidername);
        $this->slider_model->setMeta('s_thub',$thub);
        $respMsg = $this->slider_model->addNew();

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('用户创建成功',200);
    }

    public function save_slider()
    {
        $documentid = $this->input->post('documentid',true);
        $stype = $this->input->post('stype',true);
        $starget = $this->input->post('target',true);
        $slidername = $this->input->post('slidername',true);
        $thub = $this->input->post('thub',true);

        if(!filter_var($starget,FILTER_VALIDATE_URL)){
            $this->_response('链接地址错误',400);
        }

        if(mb_strlen($slidername)>20){
            $this->_response('名称不能超过20个字符',400);
        }

        $cateRs = $this->slider_model->getByPriIntKey($documentid);

        if(!$cateRs) $this->_response('文档#'.$documentid.'不存在',400);

        $this->slider_model->setMeta('s_type',$stype);
        $this->slider_model->setMeta('s_target',$starget);
        $this->slider_model->setMeta('s_title',$slidername);
        $this->slider_model->setMeta('s_thub',$thub);
        $respMsg = $this->slider_model->updateRec($documentid);

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('信息已保存',200);
    }
}