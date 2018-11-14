<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_Donor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
	}
public function page_add()
	{
		//$this->load->view('public/header');
		$this->load->view('public/new_donor');
		//$this->load->view('public/footer');
		
	}
	public function donor_valid()
	{
		//$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		echo "form";
		$this->form_validation->set_rules('username', 'Username','required|min_length[5]|max_length[12]|is_unique[users.username]');
		echo " username";
		$this->form_validation->set_rules('mobile_number','mobile_number','required|length[10]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('address','Address','required|alpha|trim');
		$this->form_validation->set_rules('city','City','required|alpha|trim');
		$this->form_validation->set_rules('state','State','required|alpha|trim');
		$this->form_validation->set_rules('date','Date','required');
		$this->form_validation->set_rules('blood_group','Blood_Group','required');
		echo " username";
		$save = array(
		               'username'		=>	$this->input->post('username'),
		               'password'		=>	$this->input->post('password'),
		               'confirm_password'		=>	$this->input->post('confirm_password'),
		               'mobile_number'		=>	$this->input->post('mobile_number'),
		               'email'		=>	$this->input->post('email'),
		               'address'		=>	$this->input->post('address'),
		               'city'		=>	$this->input->post('city'),
		               'state'		=>	$this->input->post('state'),
		               'date'		=>	$this->input->post('date'),
		               'blood_group'		=>	$this->input->post('blood_group')
		           );
		               $this->load->model('new_donor_model');
		               $this->new_donor_model->savenewDonor($save);
		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run()==true )	
		{
			echo " username";
			//$this->load->view('public/header');
			$this->load->view('public/dashboard');
			//$this->load->view('public/footer');
		               }else {
			             	//echo 'either username or password not correct';
		               	echo "error";
		               			//$this->load->view('public/dashboard'); 
			
									}
	}
}
?>