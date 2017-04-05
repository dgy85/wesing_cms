<?php

class Category_model extends Admin_Model
{
    public function addNew()
    {
        if($this->getByField('cate_name',$this->getMeta('cate_name'))){
            return '分类已存在';
        }

        $this->db->insert($this->tableName,self::_getEntity());
        if($this->db->affected_rows()>0){
            return;
        }

        return '分类创建失败';
    }

    public function delete($documentid)
    {
        $this->db->query('delete from wesing_category WHERE cate_id=?',array($documentid));
        return '';
    }

    public function getList($page=1,$pagesize=10)
    {
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s",$this->tableName))->result_array();
        $total = current($totalArr);
        $adminList = $this->db->query(sprintf("select * from %s ORDER  by cate_sort,cate_id limit %d,%d" ,$this->tableName,($page-1)*$pagesize,$pagesize ))->result_array();
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