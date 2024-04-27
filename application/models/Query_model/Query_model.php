<?php

class Query_model extends CI_Model {

    public function getAll() {
        return $this->db->get('tbl_contact')->result();
    }


    public function getAllQuery($limit,$start,$name='') {
     
       $this->db->select('*');
       $this->db->limit($limit, $start);
       
       if($name!=''){
        $this->db->where('name',$name);
        
    }
    $this->db->from('tbl_contact');   
    $query=$this->db->get();
    return $query->result();
    
}

public function get_count($name='') 
{
 
   if($name!=''){
    $this->db->where('name',$name);
    
}
return $this->db->get('tbl_contact')->num_rows();
}

public function insert($data) {
    $this->db->insert('tbl_contact', $data);
    return $this->db->insert_id();
}

public function getDataByid($id) {
    $this->db->where('contact_id', $id);
    return $this->db->get('tbl_contact')->result();
}

public function update($id,$data) {
    $this->db->where('contact_id', $id);
    $this->db->update('tbl_contact', $data);
    return true;
}

public function delete($id) {
    $this->db->where('contact_id', $id);
    $this->db->delete('tbl_contact');
    return true;
}

public function changeStatus($id) {
    $table=$this->getDataByid($id);
    if($table[0]->status==0)
    {
        $this->update($id,array('status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('status' => '0'));
        return "Deactivated";
    }
}

public function check_already($id)
{
    $this->db->where('contact_id', $id);
    return $this->db->get('comment_history')->result(); 
}

public function update_contactstatus($data,$id) {
    $this->db->where('contact_id', $id);
    $this->db->update('comment_history', $data);
    return true;
}

public function submitupdate_status($data) {
  $insert =$this->db->insert('comment_history', $data);
        //return $this->db->insert_id();
  return $insert?$this->db->insert_id():false;
}


}