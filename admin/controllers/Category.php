<?php
class Category extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index()
    {
        $args = $this->category_model->getlist(1,1000);
        $this->showpage('admin/category_list',$args);
    }

    public function add()
    {
        $this->category_model->parentid=0;
        $args = $this->category_model->getList();
        $this->showpage('admin/category_add',$args);
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
        $this->category_model->parentid=0;
        $catelist = $this->category_model->getList();
        $adminRs = (array)$this->category_model->getByPriIntKey($documentId);
        $adminRs['catelist'] = $catelist['list'] ?: array();
        if($adminRs['singlepage']){
            $this->load->model('articles_model');
            $this->articles_model->cate_id=$adminRs['cate_id'];
            $this->articles_model->disabled=0;
            $artItem = $this->articles_model->getByField(1,1);
            $adminRs = array_merge($adminRs,$artItem);
        }
        $this->showpage('admin/category_edit',$adminRs);
    }

    public function add_category()
    {
        $categoryname = $this->input->post('categoryname',true);
        $parentid = (int)$this->input->post('parentid',true);
        $ifpage = $this->input->post('ifpage',true);
        $ifactivity = $this->input->post('ifactivity',true);
        $pageContent= $this->input->post('pagecontent');
        $thub = $this->input->post('thub',true);
        $sort = (int)$this->input->post('sort',true);

        if(mb_strlen($categoryname)>20){
            $this->_response('分类名称不能超过20个字符',400);
        }
        $this->category_model->setMeta('singlepage',$ifpage=='on');
        $this->category_model->setMeta('parentid',$parentid);
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
        $parentid = (int)$this->input->post('parentid',true);
        $ifpage = $this->input->post('ifpage',true);
        $ifactivity = $this->input->post('ifactivity',true);
        $pageContent= $this->input->post('pagecontent',true);
        $thub = $this->input->post('thub',true);
        $meta_image = $this->input->post('meta_image',true);
        $sort = (int)$this->input->post('sort',true);

        if(mb_strlen($categoryname)>20){
            $this->_response('分类名称不能超过20个字符',400);
        }

        $cateRs = $this->category_model->getByPriIntKey($documentid);

        if(!$cateRs) $this->_response('分类信息不存在',400);

        $this->category_model->setMeta('singlepage',$ifpage=='on');
        $this->category_model->setMeta('parentid',$parentid);
        $this->category_model->setMeta('cate_name',$categoryname);
        $this->category_model->setMeta('cate_thub',$thub);
        $this->category_model->setMeta('cate_metaimage',$meta_image);
        $this->category_model->setMeta('cate_sort',$sort);
        $respMsg = $this->category_model->updateRec($documentid);

        $this->load->model('articles_model');
        $this->articles_model->disabled=0;
        $ifExists = $this->articles_model->getByField('cate_id',$documentid);
        if($ifpage=='on'){
            //先删除所有的文章
            if($ifExists && !isset($ifExists['art_id'])){
                foreach ($ifExists as $_artItem){
                    $this->articles_model->delete($_artItem['art_id']);
                }
            }elseif(isset($ifExists['art_id'])){
                $this->articles_model->delete($ifExists['art_id']);
            }
            $this->articles_model->setMeta('art_id','');
            $this->articles_model->setMeta('disabled',0);
            $this->articles_model->setMeta('art_title',$categoryname);
            $this->articles_model->setMeta('cate_id',$documentid);
            $this->articles_model->setMeta('art_desc',mb_substr(strip_tags($pageContent),0,200));
            $this->articles_model->setMeta('art_content',$pageContent);
            $this->articles_model->setMeta('if_activity',$ifactivity=='on');
            $this->articles_model->setMeta('art_ctime',date('Y-m-d H:i:s'));
            $this->articles_model->setMeta('authorid',$this->session->userdata('id'));
            $artInst = $this->articles_model->addNew();
        }

        if($respMsg){
            $this->_response($respMsg,400);
        }
        $this->_response('分类信息已保存',200);
    }
}