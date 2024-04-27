<?php

class Compaign_model extends CI_Model {

    public function Compaign_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for compaign ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_compaign', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the compaign -------------*/
  public function get_count($compaign_name='') 
  {
    if($compaign_name!=''){
        $this->db->where('compaign_name',$compaign_name);
        
    }
    
    return $this->db->get('tbl_compaign')->num_rows();
}

/*------------- Start Code for get all compaign from tbl_compaign----------*/

public function getAll_Compaign($limit,$start,$compaign_name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($compaign_name!=''){
       $this->db->where('compaign_name',$compaign_name);
   }
   $this->db->from('tbl_compaign');   
   $query=$this->db->get();
   return $query->result();
   
}

/*----------- Start Code for delete the compaign ---------------*/

public function delete($id) {
    $this->db->where('compaign_id', $id);
    $this->db->delete('tbl_compaign');
    return true;
}

/*------ Start code for change status for compaign------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->compaign_status==0)
    {
        $this->update($id,array('compaign_status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('compaign_status' => '0'));
        return "Deactivated";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('compaign_id', $id);
    return $this->db->get('tbl_compaign')->result();
}

/*-------------- Start Code for update the compaign -------*/

public function update($id,$data) {
    $this->db->where('compaign_id', $id);
    $this->db->update('tbl_compaign', $data);
    return true;
}


public function all_Compaign()
{
   $this->db->from('tbl_compaign');   
   $query=$this->db->get();
   return $query->result();
}
}  

