<?php

class Admin_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $usrKey = $this->session->userdata('id');

        if(!$usrKey){
            redirect('/Auth/login');
        }
    }

    public function showpage($pagefile,array $args = array(),$returnString = false)
    {
        $args['menu'] = $this->config->item('menu');
        return $this->load->view($pagefile,$args,$returnString);
    }

    protected function _response($msg,$code)
    {
        echo json_encode(array(
            'responseCode'=>$code,
            'responseMsg'=>$msg
        ));
        exit;
    }
}