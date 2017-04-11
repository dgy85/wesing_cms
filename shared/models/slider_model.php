<?php

class Slider_model extends Admin_Model
{
    public function addNew()
    {
        $this->db->insert($this->tableName,self::_getEntity());
        $this->setMeta('s_id',self::getLastInsertId());
        if($this->db->affected_rows()>0){
            return;
        }

        return '分类创建失败';
    }

    public function delete($documentid)
    {

        $this->db->query('update wesing_slider set disabled=1 WHERE s_id=?',array($documentid));
        return '';
    }

    public function getList($page=1,$pagesize=4)
    {
        $whereStr = $this->whereCondition ? ' and '.implode(' and ',$this->whereCondition) : '';
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s where disabled=0 %s",$this->tableName,$whereStr))->result_array();
        $total = current($totalArr);
        $adminList = $this->db->query(sprintf("select * from %s where disabled=0 %s ORDER  by s_id limit %d,%d" ,$this->tableName,$whereStr,($page-1)*$pagesize,$pagesize ))->result_array();
        return array(
            'list'=>$adminList,
            'totalpage' =>ceil($total['total']/$pagesize),
            'page' =>$page
        );
    }

    public function updateRec($documentid)
    {
        unset(self::$dbCache[$this->tableName]->cate_id);
        $this->db->where('s_id',$documentid);
        $this->db->update($this->tableName,$this->_getEntity());
    }
}