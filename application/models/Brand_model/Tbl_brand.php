<?php

class Tbl_brand extends CI_Model {

    
    public function getAll() {
        return $this->db->get('tbl_brand')->result();
    }


    public function getAllbrand($limit,$start,$brand_name='') {
     
       $this->db->select('*');
       $this->db->limit($limit, $start);
       
       if($brand_name!=''){
        $this->db->where('brand_name',$brand_name);
        
    }
    $this->db->from('tbl_brand');   
    $query=$this->db->get();
    return $query->result();
    
}

public function get_count($brand_name='') 
{
 
   if($brand_name!=''){
    $this->db->where('brand_name',$brand_name);
    
}
return $this->db->get('tbl_brand')->num_rows();
}

public function insert($data) {
    $this->db->insert('tbl_brand', $data);
    return $this->db->insert_id();
}

public function getDataBybrand_id($brand_id) {
    $this->db->where('brand_id', $brand_id);
    return $this->db->get('tbl_brand')->result();
}

public function update($brand_id,$data) {
    $this->db->where('brand_id', $brand_id);
    $this->db->update('tbl_brand', $data);
    return true;
}

public function delete($brand_id) {
    $this->db->where('brand_id', $brand_id);
    $this->db->delete('tbl_brand');
    return true;
}

public function changeStatus($brand_id) {
    $table=$this->getDataBybrand_id($brand_id);
    if($table[0]->status==0)
    {
        $this->update($brand_id,array('status' => '1'));
        return "Activated";
    }else{
        $this->update($brand_id,array('status' => '0'));
        return "Deactivated";
    }
}

}