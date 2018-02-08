<?php  
	/**
	* Author: fuzail ahmed
	* Description: Login Example
	*/
	class Login2 extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$data['_view'] = 'user/login2';
        	$this->load->view('templates/layout',$data);
		}
	}
?>