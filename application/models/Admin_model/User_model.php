<?php

class User_model extends CI_Model {

    public function User_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for role ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_role', $data);
      return $insert?$this->db->insert_id():false;
  }    
  /*------- Start Code for insert history for process history ----------*/
  public function add_processhistory($data)
  {
    $insert =$this->db->insert('process_history', $data);
    return $insert?$this->db->insert_id():false;
}
public function add_process_auditlog($data)
{
    $insert =$this->db->insert('tbl_process_audit_log', $data);
    return $insert?$this->db->insert_id():false;

}
/*--------- Start Code for count the role -------------*/
public function get_count($name='') 
{
    if($name!=''){
        $this->db->where('name',$name);
        
    }
    
    return $this->db->get('admin')->num_rows();
}



/*--------- Start Code for count the contact us -------------*/
public function get_count_contactus($send_at='') 
{
    if($send_at!=''){
        $this->db->like('send_at',$send_at);
        
    }
    
    return $this->db->get('tbl_contact')->num_rows();
}

/*------------- Start Code for get all role from tbl_role----------*/

public function getAll_user($limit,$start,$name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($name!=''){
       $this->db->where('name',$name);
   }
   $this->db->from('admin');   
   $query=$this->db->get();
   return $query->result();
   
}

/*------------- Start Code for get all contact us----------*/

public function getAll_contactusquery($limit,$start,$send_at='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($send_at!=''){
    $this->db->like('send_at', $send_at);
   }
   $this->db->from('tbl_contact');   
   $query=$this->db->get();
   return $query->result();
   
}

public function check_alreadyprocess($eid,$pid)
{
    $this->db->select('*');
    if($eid!=''){
       $this->db->where('emp_id',$eid);
   }
   if($pid!=''){
       $this->db->where('compaign_id',$pid);
   }
   $this->db->from('process_history');   
   $query=$this->db->get();
   return $query->result();
}

/*------------------ Start code for Find All User -----------*/
public function getAll_role()
{
 return $this->db->get('tbl_role')->result();
}
/*--------------- Start Code for Get All State---------------*/

public function getAll_state()
{
 return $this->db->get('rec_state')->result();
}

/*----------- Start Code for delete the role ---------------*/

public function delete($id) {
    $this->db->where('admin_id', $id);
    $this->db->delete('admin');
    return true;
}

public function deletecontactus($id)
{
   $this->db->where('contact_id', $id);
    $this->db->delete('tbl_contact');
    return true;
}
public function assignprocessdelete($id)
{
   $this->db->where('ph_sr', $id);
   $this->db->delete('process_history');
   return true;
}
/*------ Start code for change status for role------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->status==0)
    {
        $this->update($id,array('status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('status' => '0'));
        return "Deactivated";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('admin_id', $id);
    return $this->db->get('admin')->result();
}

/*------------- Start Code for search  by process history id ---------*/

public function process_history_data($id)
{
    $this->db->where('emp_id', $id);
    return $this->db->get('process_history')->result();
}
/*-------------- Start Code for update the User -------*/

public function update($id,$data) {
    $this->db->where('admin_id', $id);
    $this->db->update('admin', $data);
    return true;
}


/*------- Start Code for insert the data for User ----------*/
public function userinsert($data) {
  $insert =$this->db->insert('admin', $data);
  return $insert?$this->db->insert_id():false;
} 

/*------------- Start Code for search by id ---------*/

public function getRoleById($id) {
    $this->db->where('role_id', $id);
    return $this->db->get('tbl_role')->result();
}

/*--------- Start Code for get all user ------------------*/

public function get_alluser() {
    
    return $this->db->get('admin')->result();
}

/*--------- Start Code for Allowed CSR ---------------*/

public function get_allowed_csruser()
{
    $id="1";
    $this->db->where('setting_id', $id);
    return $this->db->get('tbl_setting')->result(); 
}


/*----Code for insert history after add or update in add_team_history table---*/

public function insert_add_team_history($data){

  $insert =$this->db->insert('add_team_history', $data);
  return $insert?$this->db->insert_id():false;
}



}  

