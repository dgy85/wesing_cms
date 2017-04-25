<?php

class API_Controller extends CI_Controller
{
    private $clientId = '';
    private $secret   = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function _response($responseCode,$responseMsg,$httpStatusCode=200)
    {
        http_response_code($httpStatusCode);
        echo json_encode(array(
            'responseCode'=>$responseCode,
            'responseMsg'=>$responseMsg,
            'sign'=>hash_hmac('SHA1',$responseCode.$this->clientId.$this->secret)
        ));
    }
}