<?php
class Apis_model extends CI_Model
{
    public function getApiInfo($apiType,$apiOwner)
    {
        $apiArr = $this->db->query("select * from wesing_apis WHERE api_type=? and api_owner=?",array($apiType,$apiOwner))->result_array();
        if(!$apiArr){
            return false;
        }
        $apiArr = current($apiArr);
        return array(
            'key'=>$apiArr['api_key'],
            'secret'=>$apiArr['api_secret'],
            'token'=>time()>$apiArr['api_token_exp_time'] ? "" : $apiArr['api_token'],
            'exptime'=>$apiArr['api_token_exp_time']
        );
    }

    public function setApiToken($apiType,$apiOwner,$apiToken,$apiTokenExpiresTime)
    {
        $this->db->set('api_token',$apiToken);
        $this->db->set('api_token_exp_time',$apiTokenExpiresTime);
        $this->db->where(array('api_type'=>$apiType,'api_owner'=>$apiOwner));
        $this->db->update("wesing_apis");
    }

    public function getApiToken($apiType,$apiOwner)
    {
        $apiInfo = $this->db->query("select api_token from wesing_apis where api_type=? and api_owner=? and api_token_exp_time>?",array($apiType,$apiOwner,time()-5))->result_array();
        if(!$apiInfo) return false;
        return current($apiInfo);
    }
}