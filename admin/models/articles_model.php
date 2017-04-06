<?php

class Articles_model extends Admin_Model
{
    public function addNew()
    {
        $this->disabled=0;
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
        $this->db->query('update wesing_article set disabled=1 WHERE disabled = 0 and art_id=?',array($documentid));
        return '';
    }

    public function getList($page=1,$pagesize=10)
    {
        $whereStr = $this->whereCondition ? ' and '.implode(' and ',$this->whereCondition) : '';
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s where disabled=0 %s",$this->tableName,$whereStr))->result_array();
        $total = current($totalArr);
        $adminList = $this->db->query(sprintf("select a.*,b.cate_name,c.uname from %s a,wesing_category b,wesing_admin c where a.cate_id = b.cate_id and a.authorid=c.id and a.disabled=0 and b.disabled=0 %s ORDER  by art_id limit %d,%d" ,$this->tableName,$whereStr,($page-1)*$pagesize,$pagesize ))->result_array();
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