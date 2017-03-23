<?php
class test_model extends Admin_Model
{

    public function showCache()
    {
        $this->load->model('bq_model');
        $this->load->model('te_model');
        var_dump($this->getByPriIntKey(1,array('entity','pcg_subtype','pcg_subtype2'))->getMeta('pcg_subtype'));
        var_dump($this->te_model->getByPriIntKey(1,array('entity','pcg_subtype','pcg_subtype2')));
        print_r(self::$dbCache);
    }
}