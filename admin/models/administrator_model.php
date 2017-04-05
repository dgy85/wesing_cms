<?php

class Administrator_model extends Admin_Model
{
    public function addNew($uname,$upass)
    {
        if($this->getByField('uname',$uname)){
            return '用户已存在';
        }

        $salt = substr(str_shuffle(uniqid(time())),3,6);
        $this->setMeta('uname',$uname);
        $this->setMeta('upass',md5($uname.$upass.$salt));
        $this->setMeta('ctime',date('Y-m-d H:i:s'));
        $this->setMeta('salt',$salt);

        $this->db->insert($this->tableName,self::_getEntity());
        if($this->db->affected_rows()>0){
            return;
        }

        return '用户创建失败';
    }

    public function delete($documentid)
    {
        $adminRs = $this->db->query("select uname from wesing_admin where id=?",array($documentid))->result_array();
        $adminRs = current($adminRs);
        if(!$adminRs) return '';
        if($adminRs['uname']=='admin') return '不能删除管理员帐户';
        $this->db->query('delete from wesing_admin WHERE id=?',array($documentid));
        return '';
    }

    public function getList($page=1,$pagesize=10)
    {
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s",$this->tableName))->result_array();
        $total = current($totalArr);
        $adminList = $this->db->query(sprintf("select * from %s ORDER  by id limit %d,%d" ,$this->tableName,($page-1)*$pagesize,$pagesize ))->result_array();
        return array(
            'list'=>$adminList,
            'totalpage' =>ceil($total['total']/$pagesize),
            'page' =>$page
        );
    }

    public function updateRec($documentid,$upass)
    {
        $adminRs = $this->getByPriIntKey($documentid);
        if(!$adminRs) return '账户不存在';
        $this->db->query(" update wesing_admin set upass=? where id=?",array(md5($adminRs['uname'].$upass.$adminRs['salt']),$documentid));
    }
}