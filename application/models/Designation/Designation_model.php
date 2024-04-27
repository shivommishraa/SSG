<?php

class Designation_model extends CI_Model {

    public function Designation_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for tbl_designationle ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_designation', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the tbl_designation -------------*/
  public function get_count($dsgn_name='') 
  {
    if($dsgn_name!=''){
        $this->db->where('dsgn_name',$dsgn_name);
        
    }
    
    return $this->db->get('tbl_designation')->num_rows();
}

/*------------- Start Code for get all role from tbl_designation----------*/

public function getAll_designation($limit,$start,$dsgn_name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($dsgn_name!=''){
       $this->db->where('dsgn_name',$dsgn_name);
   }
   $this->db->from('tbl_designation');   
   $query=$this->db->get();
   return $query->result();
   
}

public function all_designation()
{
  $this->db->select('*');
   $this->db->from('tbl_designation');   
   $query=$this->db->get();
   return $query->result();
}

/*----------- Start Code for delete the tbl_designationle ---------------*/

public function delete($id) {
  
    $this->db->where('dsgn_id', $id);
    $this->db->delete('tbl_designation');
    return true;
}

/*------ Start code for change status for tbl_designation------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->dsgn_status==0)
    {
        $this->update($id,array('dsgn_status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('dsgn_status' => '0'));
        return "Deactivated";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('dsgn_id', $id);
    return $this->db->get('tbl_designation')->result();
}

/*-------------- Start Code for update the role -------*/

public function update($id,$data) {
    $this->db->where('dsgn_id', $id);
    $this->db->update('tbl_designation', $data);
    return true;
}


  public function update_menu($id,$data){
    $this->db->where('dsgn_id',$id);
    $this->db->update('tbl_designation',$data);
    return true;
   }

}  

