<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
	{
        logmsg("");
        log_message('error','测试的error信息');
        var_dump($this->config->item("log_threshold"));
	}
}
