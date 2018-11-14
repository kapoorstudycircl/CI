<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function login_valid($username, $password)
	{
		//$q=$this->db->query('select* from login where username= $username and password=$password' );
		
			$query = $this->db->where('username', $username)
						      ->where('password', $password)
						      ->get('login');
						  //echo $q;
						$row = $query->row();

					if (isset($row))
							{
								return true;
							       // echo $row->username;
							       // echo $row->password;

								}else{
									return false;
								}
		/*public function saveLogin($data)
	{
		{
			$this->db->insert('login', $data);
			$admin_id = $this->db->insert_id();
		}
		return $admin_id;
	}*/
}
}
?>
