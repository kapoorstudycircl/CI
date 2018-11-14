<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper(array('form', 'url'));
		
		//echo "test";
	}
	/*public function index()
	{
		$this->load->view('public/admin_login');
	}
	/*public function admin_login()
	{
		echo "reached admin login function";
	}*/
	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','user name','required|alpha|trim');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run()){
			echo "data inserted";

		}else {
			echo "validation failed";
		}
		$save = array(
		               'username'		=>	$this->input->post('username'),
		               'password'		=>	$this->input->post('password')
		           );
		$this->login_model->saveLogin($save);
		$this->load->view('public/dashboard');
		$this->load->view('public/pages');

		//redirect('login/index');
		//redirect('http://www.tutorialspoint.com');
	}
}
?>