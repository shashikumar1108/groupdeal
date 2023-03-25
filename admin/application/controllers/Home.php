<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Home extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('Master_db');
	}

	public function index_get()
	{
		notFound($this);
	}

	public function index_post()
	{
		notFound($this);
	}

	public function verifyLogin_post(){

		$result = array(
			'status' => 500,
			'message' => 'Something went wrong!!!'
		);

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
			if( !empty($_POST['email']) && !empty($_POST['password']) ){
				$email = trim(htmlspecialchars($this->input->post('email')));
				$password = trim(htmlspecialchars($this->input->post('password')));

				$where = array(
					'email' 	=>	$email,
					'status'	=>	1,
					'type'		=>	1,
				);
				$checkEmail = $this->Master_db->getRecords('users',$where,'id,first_name,type,email,password');
				//print_r($checkEmail);exit;
				if( count($checkEmail) ){

					//echo verifyPassword($password,$checkEmail[0]->password);exit;
					if( verifyPassword($password,$checkEmail[0]->password) ){

						//clientErr($this,array('message'=>'Password verified!!!'));	
						$headers = array('alg'=>'HS256','typ'=>'JWT');
						//1hr expiration
						$payload = array(
							'user_id'=>$checkEmail[0]->id,
							'name'=>$checkEmail[0]->first_name, 
							'admin'=>$checkEmail[0]->type, 
							'exp'=>(time() + (60*60) )
						);
						
						$token = createJwt($headers,$payload,'secret');
						$this->Master_db->updateRecord('users',array('access_token'=>$token),array('id'=>$checkEmail[0]->id));
						//echo $token;exit;
						$result = array(
							'message'	=> 	'Logged successfully',
							'token'		=>	$token,
						);
						success($this,$result);
					}else{
						clientErr($this,array('message'=>'Incorrect password!!!'));	
					}
				}else{
					clientErr($this,array('message'=>'Email not registered!!!'));
				}
								
			}else{
				clientErr($this,array('message'=>'Required fields are missing!!!'));
			}			
		}else{
			notFound($this,array('message'=>'API not found'));
		}
	}

	public function logout_get(){
		//echo checkAuthorization($this->input->request_headers());
		if( checkAuthorization($this->input->request_headers()) == 1 ){
			$checkToken = $this->Master_db->getRecords('users',array('access_token'=>$this->input->request_headers()['Authorization']),'id,email,password');
			if( count($checkToken) ){
				$this->Master_db->updateRecord('users',array('access_token'=>''),array('id'=>$checkToken[0]->id));
				success($this,array('message'=>'Logged out successfully.'));
			}else{
				clientErr($this,array('message'=>'Invalid token'));
			}
		}else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
	}
}
