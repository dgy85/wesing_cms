<?php

class Page_model extends CI_Model
{
    public function getCategoryList()
    {
        $cateList = $this->db->query("select * from wesing_category where parentid=0 ORDER  by cate_sort,cate_id limit 6" )->result_array();
        return array(
            'catelist'=>$cateList
        );
    }

    public function getCateDetail($cateid,$page)
    {
        $cateid = (int)$cateid;
        $page = (int)$page;
        $subClassList = true;

        if(!$cateid) show_error('访问出错，请返回重试',200,'出错了');

        $cateList = $this->db->query("select * from wesing_category where parentid=?",array($cateid))->result_array();
        if(!$cateList){
            $subClassList = false;
            $cateList = $this->db->query("select * from wesing_category where cate_id=?",array($cateid))->result_array();
        }

        foreach ($cateList as $_key=>$_cateItem){
            if($_cateItem['singlepage']){
                $singlePageContent = $this->db->query("select art_id,art_desc,if_activity from wesing_article where cate_id=? and disabled=0",array($_cateItem['cate_id']))->result_array();
                $cateList[$_key]['page']=current($singlePageContent);
            }else{
                $artList = $this->db->query('select art_id,art_title,art_ctime from wesing_article where cate_id=? and disabled=0 order by art_id desc limit ?,?',array($_cateItem['cate_id'],($page-1)*5,5) )->result_array();
                $artCounter = $this->db->query('select count(1) as total from wesing_article where cate_id=? and disabled=0 ',array($_cateItem['cate_id']) )->result_array();
                $cateList[$_key]['art'] = $artList;
                $cateList[$_key]['totalPage'] = ceil($artCounter[0]['total']/5);
            }
        }

        return array('catelist'=>$cateList,'subCates'=>$subClassList);
    }

    public function getSliderList()
    {
        $sliderlist = $this->db->query("select * from wesing_slider where disabled=0 ORDER by s_id desc limit 4")->result_array();

        return array('sliderlist'=>$sliderlist);
    }

    public function getArt($documentid)
    {
        $documentid = (int)$documentid;
        $art = $this->db->query("select * from wesing_article where disabled=0 and art_id=?",array($documentid))->result_array();

        return (array)current($art);
    }

}