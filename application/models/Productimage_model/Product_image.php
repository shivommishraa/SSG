 
<?php

class Product_image extends CI_Model {

    
    public function getAll() {
        return $this->db->get('product_image')->result();
    }

    public function getAllbrand($limit,$start,$product_id='') {
     
       $this->db->select('*');
       $this->db->limit($limit, $start);
       
       if($product_id!=''){
        $this->db->where('product_id',$product_id);
        
    }
    $this->db->from('product_image');   
    $query=$this->db->get();
    return $query->result();
    
}

public function get_count($product_id='') 
{
 
   if($product_id!=''){
    $this->db->where('product_id',$product_id);
    
}
return $this->db->get('product_image')->num_rows();
}

public function insert($data) {
    $this->db->insert('product_image', $data);
    return $this->db->insert_id();
}

public function getDataById($id) {
    $this->db->where('id', $id);
    return $this->db->get('product_image')->result();
}

public function update($id,$data) {
    $this->db->where('id', $id);
    $this->db->update('product_image', $data);
    return true;
}

public function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('product_image');
    return true;
}

public function changeStatus($id) {
    $table=$this->getDataById($id);
    if($table[0]->status==0)
    {
        $this->update($id,array('status' => '1'));
        return "Activated";
    }else{
        $this->update($id,array('status' => '0'));
        return "Deactivated";
    }
}

}