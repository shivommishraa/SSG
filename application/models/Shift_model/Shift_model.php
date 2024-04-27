<?php

class Shift_model extends CI_Model {

    public function Shift_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for shift ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_shift', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the shift -------------*/
  public function get_count($shift_name='') 
  {
    if($shift_name!=''){
        $this->db->where('shift_name',$shift_name);
        
    }
    
    return $this->db->get('tbl_shift')->num_rows();
}

/*------------- Start Code for get all shift from tbl_shift----------*/

public function getAll_shift($limit,$start,$shift_name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($shift_name!=''){
       $this->db->where('shift_name',$shift_name);
   }
   $this->db->from('tbl_shift');   
   $query=$this->db->get();
   return $query->result();
   
}

/*----------- Start Code for delete the shift ---------------*/

public function delete($id) {
    $this->db->where('shift_id', $id);
    $this->db->delete('tbl_shift');
    return true;
}

/*------ Start code for change status for shift------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->shift_status==0)
    {
        $this->update($id,array('shift_status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('shift_status' => '0'));
        return "Deactivated";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('shift_id', $id);
    return $this->db->get('tbl_shift')->result();
}

/*-------------- Start Code for update the shift -------*/

public function update($id,$data) {
    $this->db->where('shift_id', $id);
    $this->db->update('tbl_shift', $data);
    return true;
}

/*-------------- Start Code for get all shift -------*/

public function getall_shiftdata() {
 return $this->db->get('tbl_shift')->result();
}


}  

