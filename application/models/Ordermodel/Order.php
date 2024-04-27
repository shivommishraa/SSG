<?php

class Order extends CI_Model {

    public function OrderController()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for role ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_order', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the role -------------*/
  public function get_count($name='') 
  {
    if($name!=''){
        $this->db->where('name',$name);
        
    }
    
    return $this->db->get('tbl_order')->num_rows();
}

/*------------- Start Code for get all role from tbl_department----------*/

public function getOrders($limit,$start,$name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($name!=''){
       $this->db->where('name',$name);
   }
   $this->db->from('tbl_order');   
   $query=$this->db->get();
   return $query->result();
   
}

/*----------- Start Code for delete the role ---------------*/

public function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('tbl_order');
    return true;
}

/*------ Start code for change status for role------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->status==0)
    {
        $this->update($id,array('status' => '1'));
        return "Delivered";
    }else{
        $this->update($id,array('status' => '0'));
        return "Not Delivered";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('id', $id);
    return $this->db->get('tbl_order')->result();
}

/*-------------- Start Code for update the role -------*/

public function update($id,$data) {
    $this->db->where('id', $id);
    $this->db->update('tbl_order', $data);
    return true;
}


  public function update_menu($id,$data){
    $this->db->where('id',$id);
    $this->db->update('tbl_order',$data);
    return true;
   }



public function all_active_dept() {
    $id=1;
    $this->db->where('status', $id);
    return $this->db->get('tbl_order')->result();
}


}  

