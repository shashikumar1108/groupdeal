<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Signup extends REST_Controller {

	public function index()
	{
		$this->load->view('customer/index');
	}

	public function signup_post()
	{
        echo '<pre>';print_r($_POST);exit;
		//$this->load->view('customer/signup');
	}
}
