<?php

class Articles_model extends Admin_Model
{
    public function addNew()
    {
        if($this->getByField('art_title',$this->getMeta('art_title'))){
            return '内容已存在';
        }

        $this->db->insert($this->tableName,self::_getEntity());
        if($this->db->affected_rows()>0){
            return;
        }

        return '内容创建失败';
    }

    public function delete($documentid)
    {
        $this->db->query('delete from wesing_article WHERE art_id=?',array($documentid));
        return '';
    }

    public function getList($page=1,$pagesize=10)
    {
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s",$this->tableName))->result_array();
        $total = current($totalArr);
        $adminList = $this->db->query(sprintf("select * from %s ORDER  by art_id limit %d,%d" ,$this->tableName,($page-1)*$pagesize,$pagesize ))->result_array();
        return array(
            'list'=>$adminList,
            'totalpage' =>ceil($total['total']/$pagesize),
            'page' =>$page
        );
    }

    public function updateRec($documentid)
    {
        unset(self::$dbCache[$this->tableName]->cate_id);
        $this->db->where('art_id',$documentid);
        $this->db->update($this->tableName,$this->_getEntity());
    }
}