<?php

class Paymentmodel extends CI_Model {

    public function Payment_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for payment terms ----------*/
    public function insert($data) {
      $insert =$this->db->insert('tbl_terms_con', $data);
      return $insert?$this->db->insert_id():false;
  }    
  
  /*--------- Start Code for count the payment terms -------------*/
  public function get_count($term_con_name='') 
  {
    if($term_con_name!=''){
        $this->db->where('term_con_name',$term_con_name);
        
    }
    
    return $this->db->get('tbl_terms_con')->num_rows();
}

/*------------- Start Code for get all payment terms ----------*/

public function getAll_Role($limit,$start,$term_con_name='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($term_con_name!=''){
       $this->db->where('term_con_name',$term_con_name);
   }
   $this->db->from('tbl_terms_con');   
   $query=$this->db->get();
   return $query->result();
   
}

/*----------- Start Code for delete the payment terms ---------------*/

public function delete($id) {
    $this->db->where('term_con_id', $id);
    $this->db->delete('tbl_terms_con');
    return true;
}

/*------ Start code for change status for payment terms------------*/

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->term_con_status ==0)
    {
        $this->update($id,array('term_con_status ' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('term_con_status ' => '0'));
        return "Deactivated";
    }
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('term_con_id', $id);
    return $this->db->get('tbl_terms_con')->result();
}

/*-------------- Start Code for update the payment terms -------*/

public function update($id,$data) {
    $this->db->where('term_con_id', $id);
    $this->db->update('tbl_terms_con', $data);
    return true;
}


  public function update_menu($id,$data){
    $this->db->where('term_con_id',$id);
    $this->db->update('tbl_terms_con',$data);
    return true;
   }

}  

