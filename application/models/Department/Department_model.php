<?php

class Department_model extends CI_Model {

    public function Department_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for role ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_department', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the role -------------*/
  public function get_count($dept_name='') 
  {
    if($dept_name!=''){
        $this->db->where('dept_name',$dept_name);
        
    }
    
    return $this->db->get('tbl_department')->num_rows();
}

/*------------- Start Code for get all role from tbl_department----------*/

public function getAll_Department($limit,$start,$dept_name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($dept_name!=''){
       $this->db->where('dept_name',$dept_name);
   }
   $this->db->from('tbl_department');   
   $query=$this->db->get();
   return $query->result();
   
}

/*----------- Start Code for delete the role ---------------*/

public function delete($id) {
    $this->db->where('dept_id', $id);
    $this->db->delete('tbl_department');
    return true;
}

/*------ Start code for change status for role------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->dept_status==0)
    {
        $this->update($id,array('dept_status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('dept_status' => '0'));
        return "Deactivated";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('dept_id', $id);
    return $this->db->get('tbl_department')->result();
}

/*-------------- Start Code for update the role -------*/

public function update($id,$data) {
    $this->db->where('dept_id', $id);
    $this->db->update('tbl_department', $data);
    return true;
}


  public function update_menu($id,$data){
    $this->db->where('dept_id',$id);
    $this->db->update('tbl_department',$data);
    return true;
   }



public function all_active_dept() {
    $id=1;
    $this->db->where('dept_status', $id);
    return $this->db->get('tbl_department')->result();
}


}  

