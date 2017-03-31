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
            return '用户创建成功';
        }

        return '用户创建失败';
    }

    public function getList($page=1,$pagesize=10)
    {
        $totalArr = $this->db->query(sprintf("select count(1) as total from %s",$this->tableName))->result_array();
        $total = current($totalArr);
        $adminList = $this->db->query(sprintf("select * from %s ORDER  by id limit %d,%d" ,$this->tableName,($page-1)*$pagesize,$pagesize ))->result_array();
        $end = ($page-1)*$pagesize+$pagesize;
        $end = $end > $total ? $total : $end;
        $start  = ($page-1)*$pagesize+1;
        $start = $start > $total ? $total : $start;
        return array(
            'list'=>$adminList,
            'total'=>$total['total'],
            'totalpage' =>ceil($total['total']/$pagesize),
            'page' =>$page,
            'start'=> $start,
            'end'=> $end
        );
    }

    public function updateRec(array $updateInfo)
    {

    }
}