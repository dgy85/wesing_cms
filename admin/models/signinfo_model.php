<?php

class Signinfo_model extends Admin_Model
{

    public function delete($documentid)
    {

        $this->db->query('update wesing_category set disabled=1 WHERE cate_id=?',array($documentid));
        $this->db->query('update wesing_article set disabled=1 where cate_id=?',array($documentid));
        return '';
    }

    public function getList($page=1,$pagesize=10)
    {
        $totalArr = $this->db->query("select count(1) as total from wesing_signinfo ")->result_array();
        $total = current($totalArr);
        $sql = "select t1.art_id as art_id,t1.usr_id as usr_id,t1.sign_time as sign_time,t2.art_title as art_title,";
        $sql = $sql . "t3.cate_name as cate_name,t2.art_content,t4.nick_name as nick_name ";
        $sql = $sql . "from wesing_signinfo t1 ";
        $sql = $sql . "left join wesing_article t2 on t1.art_id = t2.art_id ";
        $sql = $sql . "left join wesing_category t3 on t2.cate_id = t3.cate_id ";
        $sql = $sql . "left join wesing_usr t4 on t1.usr_id = t4.usr_id ";
        $sql = $sql . "order by t1.sign_time limit ?,?";
        $adminList = $this->db->query($sql,array(($page-1)*$pagesize,$pagesize))->result_array();
        return array(
            'list'=>$adminList,
            'totalpage' =>ceil($total['total']/$pagesize),
            'page' =>$page
        );
    }

}