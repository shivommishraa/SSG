<?php

class Role_model extends CI_Model {

    public function Role_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for role ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_role', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the role -------------*/
  public function get_count($role_name='') 
  {
    if($role_name!=''){
        $this->db->where('role_name',$role_name);
        
    }
    
    return $this->db->get('tbl_role')->num_rows();
}

/*------------- Start Code for get all role from tbl_role----------*/

public function getAll_Role($limit,$start,$role_name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($role_name!=''){
       $this->db->where('role_name',$role_name);
   }
   $this->db->from('tbl_role');   
   $query=$this->db->get();
   return $query->result();
   
}

/*----------- Start Code for delete the role ---------------*/

public function delete($id) {
    $this->db->where('role_id', $id);
    $this->db->delete('tbl_role');
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
    $this->db->where('role_id', $id);
    $this->db->update('tbl_role', $data);
    return true;
}


  public function update_menu($id,$data){
    $this->db->where('role_id',$id);
    $this->db->update('tbl_role',$data);
    return true;
   }

}  

