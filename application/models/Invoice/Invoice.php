<?php
class Invoice extends CI_Model
{
  public function InvoiceController()
  {
    parent::model();
    $this->load->library('session');
  }
  
  public function setting()
   {
       return $this->db->get('tbl_setting')->result();
   } 
  public function insert_invoice($data)
  {

   $this->db->insert('tbl_invoice',$data);
   return $this->db->insert_id();

 }

 public function insert_item_details($data)
 {

  $this->db->insert('invoice_item_deatils',$data);
  return $this->db->insert_id();

}

public function get_all_invoice($id)
{
  $this->db->select('*');
  $this->db->where('pr_id',$id);
  return $this->db->get('tbl_invoice')->result();
}
public function get_all_admin()
{
  $this->db->select('*');
  return $this->db->get('admin')->result();
}


public function all_invoice_data($inid){
  $this->db->select('*');
  $this->db->where('inc_id',$inid);
  return $this->db->get('tbl_invoice')->result();
}

public function getclientdata($id){

   $this->db->select('*');
   $this->db->where('cus_id',$id);
   return $this->db->get('tbl_customer')->result();

}
public function getstatename($id){

   $this->db->select('*');
   $this->db->where('state_id',$id);
   return $this->db->get('rec_state')->result();

}

 public function getinc_status($id){
   $this->db->select('*');
   $this->db->where('inc_sts_id',$id);
   return $this->db->get('tbl_invoice_status')->result();
 }

public function all_itm_data($id){
   $this->db->select('*');
   $this->db->where('invoice_id',$id);
   return $this->db->get('invoice_item_deatils')->result();
}

public function getterm_con($id){
  $this->db->select('*');
   $this->db->where('term_con_id',$id);
   return $this->db->get('tbl_terms_con')->result();
}

public function getall_payment_terms()
{
  $this->db->select('*');
   return $this->db->get('tbl_terms_con')->result();
}

public function update_invoice($id,$data)
{
   $this->db->where('inc_id', $id);
  $this->db->update('tbl_invoice', $data);
  return true;
}

public function update_item_details($id,$data)
{
     $this->db->where('itm_detail_id', $id);
  $this->db->update('invoice_item_deatils', $data);
  return true;
}


public function item_cal_detail($id)
{
  

  $this->db->select('itm_tax_per, sum(itm_tax) itm_tax, sum(itm_rate*itm_qty) gross_rate');
     $this->db->where('invoice_id', $id);
  $this->db->group_by('itm_tax_per'); 
  return $this->db->get('invoice_item_deatils')->result();;
}


public function getallIncstatus()
{
  $this->db->select('*');
  return $this->db->get('tbl_invoice_status')->result();
}

public function update_inc_status($id,$data)
{

     $this->db->where('inc_id', $id);
  $this->db->update('tbl_invoice', $data);
  return true;
}

}
