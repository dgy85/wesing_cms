<?php
class Category extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index($page=1)
    {
        $page = (int)$page<0 ? 1 : (int)$page;
        $args = $this->category_model->getlist($page,10);
        $this->showpage('admin/category_list',$args);
    }

    public function add()
    {
        $this->showpage('admin/category_add');
    }

    public function delete($documentId)
    {
        $documentId = (int)$documentId;
        if(!$documentId) $this->_response('参数错误',500);

        $delMsg = $this->category_model->delete($documentId);
        if($delMsg) $this->_response($delMsg,500);
        $this->_response('记录已删除',200);
    }

    public function edit($documentId)
    {
        $documentId = (int)$documentId;
        $adminRs = (array)$this->category_model->getByPriIntKey($documentId);
        $this->showpage('admin/category_edit',$adminRs);
    }

    public function add_category()
    {
        $categoryname = $this->input->post('categoryname',true);
        $ifpage = $this->input->post('ifpage',true);
        $ifactivity = $this->input->post('ifactivity',true);
        $pageContent= $this->input->post('pagecontent');
        $thub = $this->input->post('thub',true);
        $sort = (int)$this->input->post('sort',true);

        if(strlen($categoryname)>20){
            $this->_response('分类名称不能超过20个字符',400);
        }
        $this->category_model->setMeta('singlepage',$ifpage=='on');
        $this->category_model->setMeta('cate_name',$categoryname);
        $this->category_model->setMeta('cate_thub',$thub);
        $this->category_model->setMeta('cate_sort',$sort);
        $this->category_model->setMeta('ctime',date('Y-m-d H:i:s'));
        $respMsg = $this->category_model->addNew();

        if($ifpage=='on'){
            $this->load->model('articles_model');
            $this->articles_model->setMeta('art_title',$categoryname);
            $this->articles_model->setMeta('cate_id',$this->category_model->getMeta('cate_id'));
            $this->articles_model->setMeta('art_desc',mb_substr(strip_tags($pageContent),0,200));
            $this->articles_model->setMeta('art_content',$pageContent);
            $this->articles_model->setMeta('if_activity',$ifactivity=='on');
            $this->articles_model->setMeta('art_ctime',date('Y-m-d H:i:s'));
            $this->articles_model->setMeta('authorid',$this->session->userdata('id'));
            $this->articles_model->addNew();
        }
        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('用户创建成功',200);
    }

    public function save_category()
    {
        $documentid = $this->input->post('documentid',true);
        $categoryname = $this->input->post('categoryname',true);
        $ifpage = $this->input->post('ifpage',true);
        $ifactivity = $this->input->post('ifactivity',true);
        $pageContent= $this->input->post('pagecontent');
        $thub = $this->input->post('thub',true);
        $sort = (int)$this->input->post('sort',true);

        if(strlen($categoryname)>20){
            $this->_response('分类名称不能超过20个字符',400);
        }

        $cateRs = $this->category_model->getByPriIntKey($documentid);

        if(!$cateRs) $this->_response('分类信息不存在',400);

        $this->category_model->setMeta('singlepage',$ifpage=='on');
        $this->category_model->setMeta('cate_name',$categoryname);
        $this->category_model->setMeta('cate_thub',$thub);
        $this->category_model->setMeta('cate_sort',$sort);
        $respMsg = $this->category_model->updateRec($documentid);

        $this->load->model('articles_model');
        $ifExists = $this->articles_model->getByField('cate_id',$documentid);

        if($ifpage=='on'){
            //先删除所有的文章
            if($ifExists){
                foreach ($ifExists as $_artItem){
                    $this->articles_model->delete($_artItem['art_id']);
                }
            }
            $this->articles_model->setMeta('art_title',$categoryname);
            $this->articles_model->setMeta('cate_id',$this->category_model->getMeta('cate_id'));
            $this->articles_model->setMeta('art_desc',mb_substr(strip_tags($pageContent),0,200));
            $this->articles_model->setMeta('art_content',$pageContent);
            $this->articles_model->setMeta('if_activity',$ifactivity=='on');
            $this->articles_model->setMeta('art_ctime',date('Y-m-d H:i:s'));
            $this->articles_model->setMeta('authorid',$this->session->userdata('id'));
            $this->articles_model->addNew();
        }

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('分类信息已保存',200);
    }
}