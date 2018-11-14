<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_Donor_model extends CI_Model{
	
	      //we will use the select function  
     /*$query = $this->db->query('select * from blood_donate');
     $rows=$query->result();
$data = array('result'=>$rows); */
   
   public function gethome()
  {
    $sql= $this->db->query("SELECT * FROM blood_donate");
    return $sql;
  }
  function submit($data){
    $this->db->insert('blood_donate', $data);
  }
  function delete($donor_id){
    $this->db->where("donor_id",$donor_id);
    $this->db->delete('blood_donate');
  }
  function edit($donor_id){
    $this->db->where("donor_id",$donor_id);
    return $this->db->get('blood_donate');
  }
  function update($donor_id,$data){
    $this->db->where("donor_id",$donor_id);
    $this->db->update('blood_donate',$data);
  }
}
?>  
 