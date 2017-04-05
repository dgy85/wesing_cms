<?php

class Page_model extends CI_Model
{
    public function getCategoryList()
    {
        $cateList = $this->db->query("select * from wesing_category ORDER  by cate_sort,cate_id limit 6" )->result_array();
        return array(
            'catelist'=>$cateList
        );
    }
}