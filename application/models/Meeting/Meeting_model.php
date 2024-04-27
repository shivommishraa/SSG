<?php

class Meeting_model extends CI_Model {

  public function Meeting_Controller()
  {
    parent::model();
  }

  /*------- Start Code for insert the data for role ----------*/
  public function insert($data) {
    $insert =$this->db->insert('tbl_meeting', $data);
    return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the role -------------*/
  public function get_count($meeting_date='') 
  {
    if($meeting_date!=''){
      $this->db->where('meeting_date',$meeting_date);

    }
    
    return $this->db->get('tbl_meeting')->num_rows();
  }

  /*------------- Start Code for get all role from tbl_role----------*/

  public function getAll_Meeting($limit,$start,$meeting_date='') {

   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($meeting_date!=''){
     $this->db->where('meeting_date',$meeting_date);
   }
   $this->db->from('tbl_meeting');   
   $query=$this->db->get();
   return $query->result();
   
 }

 public function getMeetingById($id){
   $this->db->where('meeting_id', $id);
   return $this->db->get('tbl_meeting')->result();
 }

 public function findcompDataById($id){
  $this->db->where('compaign_id', $id);
  return $this->db->get('tbl_compaign')->result();
}

/*----------- Start Code for delete the role ---------------*/

public function delete($id) {
  $this->db->where('meeting_id', $id);
  $this->db->delete('tbl_meeting');
  return true;
}

/*------ Start code for change status for role------------*/

public function changeStatus($id) {
  $table=$this->getDataById($id);
  if($table[0]->is_status==0)
  {
    $this->update($id,array('is_status' => '1'));
    return "Activated";
  }else{
    $this->update($id,array('is_status' => '0'));
    return "Deactivated";
  }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
  $this->db->where('role_id', $id);
  return $this->db->get('tbl_role')->result();
}

/*-------------- Start Code for update the role -------*/

public function update($id,$data) {
  $this->db->where('meeting_id', $id);
  $this->db->update('tbl_meeting', $data);
  return true;
}

public function add_meeting_comment($data)
{

  $insert =$this->db->insert('meeting_comment', $data);
  return $insert?$this->db->insert_id():false;
}

public function get_count_comment($mt_id='') 
{
  if($mt_id!=''){
    $this->db->where('meeting_id',$mt_id);

  }
  return $this->db->get('meeting_comment')->num_rows();
}


public function getAll_Meeting_comment($limit,$start,$mt_id='') {

 $this->db->select('*');
 $this->db->limit($limit, $start);
 if($mt_id!=''){
  $this->db->where('meeting_id',$mt_id);

}
$this->db->from('meeting_comment');   
$query=$this->db->get();
return $query->result();

}


/*--------- Start Code for Allowed See Meeting ---------------*/

public function get_allowed_meeting()
{
  $id="9";
  $this->db->where('setting_id', $id);
  return $this->db->get('tbl_setting')->result(); 
}

}  

