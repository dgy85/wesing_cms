<?php

/**
 * Created by PhpStorm.
 * User: julie
 * Date: 2017/4/17
 * Time: 9:42
 */
class User_model extends Admin_Model
{
    public function getList($page=1,$pagesize=10)
    {
        $totalArr = $this->db->query("select count(1) as total from wesing_signinfo ")->result_array();
        $total = current($totalArr);
        $sql = "select usr_id,nick_name,open_key,key_type,usr_thub,regtime from wesing_usr ";
        $sql = $sql . "order by usr_id limit ?,?";
        $adminList = $this->db->query($sql,array(($page-1)*$pagesize,$pagesize))->result_array();
        return array(
            'list'=>$adminList,
            'totalpage' =>ceil($total['total']/$pagesize),
            'page' =>$page
        );
    }
}