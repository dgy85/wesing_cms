<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends API_Controller {

    public function index()
	{
	    $this->_responseType='xml';
	    $this->_response(array(
	        "responseCode"=>'40096230',
            'responseMsg'=>'发生了未知的错误',
            'erroruri'=>$_SERVER['HTTP_USER_AGENT'],
            'items'=>array(
                array(
                    'ID'=>1,
                    'Name'=>'BBQ',
                    'Amt'=>2342
                ),
                array(
                    'ID'=>12,
                    'Name'=>'BBQ',
                    'Amt'=>242
                ),
                array(
                    'ID'=>13,
                    'Name'=>'BB1Q',
                    'Amt'=>232
                ),
                array(
                    'ID'=>14,
                    'Name'=>'BB2Q',
                    'Amt'=>232
                ),
            )
            ));
	}
}
