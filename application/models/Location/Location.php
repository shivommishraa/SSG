<?php  
class Location extends CI_Model
{
  public function LocationController()
  {
    parent::model();
  }

  public function insert($data)
  {
    $this->db->insert('tbl_location', $data);

    return $this->db->insert_id();
    
  }
  public function get_count($name) 
  {
    if($name!=''){
      $this->db->like('location_name',$name);
      
    }
    return $this->db->count_all('tbl_location');
  }
  public function datagetalllocation()
  {
   return $this->db->get('tbl_location')->result(); 
 }
 public function getallcompany()
 {
  $this->db->select('*');
  $this->db->from('tbl_company');
  $query=$this->db->get();
  return $query->result();
}

public function getalllocation($limit, $start,$name='')
{
  $this->db->select('*');
  $this->db->limit($limit, $start);
  if($name!=''){
    $this->db->like('location_name',$name);

  }
  $this->db->from('tbl_location');
  $this->db->join('tbl_company','tbl_location.comp_id=tbl_company.cmp_id');

  $query=$this->db->get();
  return $query->result();

}

public function delete($id)
{
 $this->db->where('location_id', $id);
 $this->db->delete('tbl_location');
 return true;
}
public function getDataById($id)
{
  $this->db->where('location_id',$id);
  $this->db->from('tbl_location');
  $this->db->join('tbl_company','tbl_location.comp_id=tbl_company.cmp_id');

  $query=$this->db->get();
  return $query->result();

}

public function editsinglelocation($id,$data) {
  $this->db->where('location_id', $id);
  $this->db->update('tbl_location', $data);
  return true;
}
public function changeStatus($id)
{
 $table=$this->getDataById($id);
 if($table[0]->location_status==0)
 {
  $this->editsinglelocation($id,array('location_status' => '1'));
  return "Activated";
}else{
  $this->editsinglelocation($id,array('location_status' => '0'));
  return "Deactivated";
}
}


  public function getall_warehouse()
   {
      
       $this->db->select('*');
       return $this->db->get('tbl_location')->result();


     }


}