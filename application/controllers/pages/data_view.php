<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_View extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		 $this->load->library('table');
		 $this->load->model('list_donor_model');
		}
		//echo "test";
		 public function page_list()
	{
		$this->load->view('public/header');
		$this->load->view('public/list_donor');
		$this->load->view('public/footer');
	}
	
	public function index()
	{
		$data['sql1']=$this->list_donor_model->gethome();
		$this->load->view('public/header');
		$this->load->view('public/list_donor');
		$this->load->view('public/footer');

		//$this->load->view('public/admin_login');
			}

			public function submit(){ 
		//$op=$this->input->post('op');
		$donor_id=$this->input->post('donor_id');
		echo $donor_id;
		$username =$this->input->post('username');
		echo $username;
		$blood_group =$this->input->post('blood_group');
		$data = array('username'=>$username,'blood_group'=>$blood_group);
		//if($op=="edit"){
			$this->list_donor_model->submit($data);
			$this->load->view('public/dashboard');
		/*}else{
			$this->list_donor_model->update($id,$data);
			
	}*/
}
}
?>