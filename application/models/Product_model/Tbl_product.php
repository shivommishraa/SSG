
<?php

class Tbl_product extends CI_Model {

 
public function getAllproduct($limit,$start,$product_name='',$brand_name='') {
     
    $this->db->select('*');
    $this->db->limit($limit, $start);
    if($product_name!=''){
        $this->db->where('product_name',$product_name);
        
    }
    if($brand_name!=''){
        $this->db->where('product_brand',$brand_name);
        
    }
    $this->db->from('gallery');   
    $query=$this->db->get();
    return $query->result();
}
/*================function for get slider product from gallery table ===============*/
public function getSliderProduct(){
    $this->db->select('*');
    $this->db->where('enable_for_scroll',"1");
    $this->db->from('gallery');   
    $query=$this->db->get();
    return $query->result();
}
public function getAllEnabledProductsForFeatured(){
    $this->db->select('*');
    $this->db->where('status', "1");
    $this->db->where('enable_featured_product >', 0); // Check for values greater than 0
    $this->db->from('gallery');   
    $query = $this->db->get();
    return $query->result();
}

/*================Code for get  all product from product table ===============*/
public function getAll() {
    return $this->db->get('gallery')->result();
}
/*================Code for get all product count from product table ===============*/

public function get_count($product_name='',$brand_name='') 
{
    if($product_name!=''){
        $this->db->where('product_name',$product_name);
        
    }
    if($brand_name!=''){
        $this->db->where('product_brand',$brand_name);
        
    }
    return $this->db->get('gallery')->num_rows();
}

public function insert($data) {
  $insert =$this->db->insert('gallery', $data);
        //return $this->db->insert_id();
  return $insert?$this->db->insert_id():false;
}

public function insertImage($data)
{
    
   $insert =$this->db->insert('gallery_images', $data);
        //return $this->db->insert_id();
   return $insert?$this->db->insert_id():false;
}
public function updategallerydate($id,$data)
{
    $this->db->where('gallery_id', $id);
    $this->db->update('gallery_images', $data);
    return true;
}

public function getDataById($id) {
    $this->db->where('id', $id);
    return $this->db->get('gallery')->result();
}

public function update($id,$data) {
    $this->db->where('id', $id);
    $this->db->update('gallery', $data);
    return true;
}

public function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('gallery');
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


public function getAllInquiry($limit,$start,$customer_name='',$customer_email='') {
 
   $this->db->select('*');
   $this->db->limit($limit, $start);
   if($customer_name!=''){
    $this->db->where('customer_name',$customer_name);
    
}
if($customer_email!=''){
    $this->db->where('customer_email',$customer_email);
    
}
$this->db->from('product_inquiry');   
$query=$this->db->get();
return $query->result();

}

public function get_count_inquiry($customer_name='',$customer_email='') 
{
    if($customer_name!=''){
        $this->db->where('customer_name',$customer_name);
        
    }
    if($customer_email!=''){
        $this->db->where('customer_email',$customer_email);
        
    }
    return $this->db->get('product_inquiry')->num_rows();
}

public function getDataById_inquiry($id) {
    $this->db->where('inquiry_id', $id);
    return $this->db->get('product_inquiry')->result();
}

public function changeStatus_inquiry($id)
{
   $table=$this->getDataById_inquiry($id);
   if($table[0]->status==0)
   {
    $this->updateinquiry($id,array('status' => '1'));
    return "Activated";
}else{
    $this->updateinquiry($id,array('status' => '0'));
    return "Deactivated";
}
}

public function updateinquiry($id,$data)
{
    $this->db->where('inquiry_id', $id);
    $this->db->update('product_inquiry', $data);
    return true;
}

public function deleteInquiry($id)
{
   $this->db->where('inquiry_id', $id);
   $this->db->delete('product_inquiry');
   return true;   
}

public function getAllStatus() {
    return $this->db->get('tbl_status')->result();
}

public function submitupdate_status($data) {
  $insert =$this->db->insert('status_history', $data);
        //return $this->db->insert_id();
  return $insert?$this->db->insert_id():false;
}

public function check_already($id)
{
    $this->db->where('inquiry_id', $id);
    return $this->db->get('status_history')->result(); 
}

public function update_inquirystatus($data,$id) {
    $this->db->where('inquiry_id', $id);
    $this->db->update('status_history', $data);
    return true;
}
public function get_statusname($id)
{
   $this->db->where('status_id', $id);
   return $this->db->get('tbl_status')->result(); 
}

}