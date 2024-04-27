<?php

class Warehouse_model extends CI_Model {

    public function Warehouse_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for warehouse ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_location', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the warehouse -------------*/
  public function get_count($location_name='') 
  {
    if($location_name!=''){
        $this->db->where('location_name',$location_name);
        
    }
    
    return $this->db->get('tbl_location')->num_rows();
}

/*------------- Start Code for get all warehouse from warehouse table----------*/

public function getAll_warehouse($limit,$start,$location_name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($location_name!=''){
       $this->db->where('location_name',$location_name);
   }
   $this->db->from('tbl_location');   
   $query=$this->db->get();
   return $query->result();
   
}

/*----------- Start Code for delete the warehouse ---------------*/

public function delete($id) {
    $this->db->where('location_id', $id);
    $this->db->delete('tbl_location');
    return true;
}

/*------ Start code for change status for warehouse------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->location_status ==0)
    {
        $this->update($id,array('location_status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('location_status' => '0'));
        return "Deactivated";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('location_id', $id);
    return $this->db->get('tbl_location')->result();
}

/*-------------- Start Code for update the warehouse -------*/

public function update($id,$data) {
    $this->db->where('location_id', $id);
    $this->db->update('tbl_location', $data);
    return true;
}


  public function update_menu($id,$data){
    $this->db->where('location_id',$id);
    $this->db->update('tbl_location',$data);
    return true;
   }

}  

