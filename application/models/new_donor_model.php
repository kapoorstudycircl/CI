<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_Donor_model extends CI_Model {
	
	public function savenewDonor($data)
	{
		{
			$this->db->insert('blood_donate', $data);
			$donor_id = $this->db->insert_id();
		}
		return $donor_id;
	}
}
?>