<?php

class Category_model extends Admin_Model
{
    public function addNew()
    {
        if($this->getByField('cate_name',$this->getMeta('cate_name'))){
            return '分类已存在';
        }

        $this->db->insert($this->tableName,self::_getEntity());
        $this->setMeta('cate_id',self::getLastInsertId());
        if($this->db->affected_rows()>0){
            return;
        }

        return '分类创建失败';
    }

    public function delete($documentid)
    {

        $this->db->query('update wesing_category set disabled=1 WHERE cate_id=?',array($documentid));
        $this->db->query('update wesing_article set disabled=1 where cate_id=?',array($documentid));
        return '';
    }

    public function getList($page=1,$pagesize=10)
    {
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s where disabled=0",$this->tableName))->result_array();
        $total = current($totalArr);
        $adminList = $this->db->query(sprintf("select * from %s where disabled=0 ORDER  by cate_sort,cate_id limit %d,%d" ,$this->tableName,($page-1)*$pagesize,$pagesize ))->result_array();
        return array(
            'list'=>$adminList,
            'totalpage' =>ceil($total['total']/$pagesize),
            'page' =>$page
        );
    }

    public function updateRec($documentid)
    {
        unset(self::$dbCache[$this->tableName]->cate_id);
        $this->db->where('cate_id',$documentid);
        $this->db->update($this->tableName,$this->_getEntity());
    }
}