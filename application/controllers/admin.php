<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		 $this->load->library('table');
		 $this->load->model('list_donor_model');
		
		//echo "test";
	}
	public function index()
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
		               	$this->load->view('public/dashboard');
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
		

		//redirect('login/index');
		//redirect('http://www.tutorialspoint.com');
	
	public function page_add()
	{

		$this->load->view('public/new_donor');
	}
	public function new_donor()
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
			$this->load->view('public/dashboard');
		               }else {
			             	//echo 'either username or password not correct';
		               	echo "error";
		               			//$this->load->view('public/dashboard'); 
			
									}
	}

	public function page_list()
	{
		$this->load->view('public/list_donor');
	}
	
		             /*public function donorlist()
		             {
		            $this->load->library('table'); // Loading the Table Library 

$query = $this->db->get('blood_donate'); // the MySQL table name to generate HTML table

echo $this->table->generate($query); // Render of your HTML table
//$this->load->view('public/list_donor', $r);// Render of your HTML table
}*/
public function submit(){ 
		$op=$this->input->post('op');
		$donor_id=$this->input->post('donor_id');
		echo $donor_id;
		$username =$this->input->post('username');
		echo $username;
		$email =$this->input->post('email');
		echo $username;
		$blood_group =$this->input->post('blood_group');
		$data = array('username'=>$username,'email'=>$email,'blood_group'=>$blood_group);
		//if($op=="edit"){
			$this->list_donor_model->submit($data);
			$this->load->view('public/dashboard');
		/*}else{
			$this->list_donor_model->update($id,$data);
			
	}*/

}
public function data(){
	$data['sql1']=$this->list_donor_model->gethome();
		//$this->load->view('public/header');
		$this->load->view('public/list_donor',$data);
		//$this->load->view('public/footer');
}
public function delete($donor_id){
	$this->load->model('list_donor_model');
		$this->list_donor_model->delete($donor_id);
		$this->load->view('public/list_donor');
	}
	public function edit($donor_id){
		$data['op']='edit';
		$data['sql']=$this->list_donor_model->edit($donor_id);
		$this->load->view('public/donor_edit');
		//$this->load->view('public/new_donor');

			}
}
     
?>