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
        $whereStr = $this->whereCondition ? ' and '.implode(' and ',$this->whereCondition) : '';
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s where disabled=0 %s",$this->tableName,$whereStr))->result_array();
        $total = current($totalArr);
        $adminListArr = $this->db->query(sprintf("select * from %s where disabled=0 %s ORDER  by parentid,cate_sort,cate_id limit %d,%d" ,$this->tableName,$whereStr,($page-1)*$pagesize,$pagesize ))->result_array();
        $adminList = array();
        foreach ($adminListArr as $_key=>$_cateItem){
            if($_cateItem['parentid']==0){
                $adminList[$_cateItem['cate_id']] = $_cateItem;
            }elseif($_cateItem['parentid']!=0){
                $_cateItem['cate_name'] = str_repeat('&nbsp;',4).'+'.$_cateItem['cate_name'];
                $adminList[$_cateItem['parentid']]['children'][$_cateItem['cate_id']] = $_cateItem;
            }
        }
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