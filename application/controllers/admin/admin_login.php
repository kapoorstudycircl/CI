<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->view('public/admin_login/admin_login');
	}
	public function login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','user name','required|alpha|trim');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p");
		if ($this->form_validation->run()){
			//echo "data inserted";
			/*$save = array(
		               'username'		=>	$this->input->post('username'),
		               'password'		=>	$this->input->post('password')
		           );*/
		           //$this->load->view('public/admin_login');
		               $username =	$this->input->post('username');
		               $password =	$this->input->post('password');
		               $this->load->model('login_model');
		               $admin_id = $this->login_model->login_valid($username, $password);
		               if($admin_id){
		               	$this->load->library('session');
		               	$this->session->set_userdata('user_id', $admin_id);
		               	//$this->load->view('public/header');
		               	$this->load->view('public/dashboard');
		               	//$this->load->view('public/footer');
		               }else {
			//echo "validation failed";
			//redirect('admin/index');
		               	echo 'either username or password not correct';
		               //$this->load->library('session');
		               	  //$this->session->set_flashdata('err_message', 'Your cart is empty!');
		               	
			$this->load->view('public/admin_login'); 
			
		}
	}else {
			//echo "validation failed";
			//redirect('admin/index');
		               //	echo 'either username or password not correct';
		               //$this->load->library('session');
		               	  //$this->session->set_flashdata('err_message', 'Your cart is empty!');
		               	
			$this->load->view('public/admin_login'); 
		}
		//$this->login_model->saveLogin($save);
		//$this->load->view('public/dashboard');
		//$this->load->view('public/pages');
		}
	}
		?>