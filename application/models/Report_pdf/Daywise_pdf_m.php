<?php

class Daywise_pdf_m extends CI_Model {

    public function Pdf_report()
    {
        parent::model();
    }
    
    /*--------- Start Code for count the user -------------*/
    public function get_count() 
    {
    	
        $this->db->where('role_id', '5');
        
        return $this->db->get('admin')->num_rows();
    }
    
    /*------------- Start Code for get all user from admin table----------*/
    
    public function getAll_user() {
     
       
        $this->db->where('role_id', '5'); 
        $this->db->from('admin');   
        $query=$this->db->get();
        return $query->result();
        
    }
    /*-------------- Code for to get Process Value ---------------*/
    
    public function get_comp_value($adminid,$compid,$date){
        $this->db->select('*');
        if($adminid!=''){
           $this->db->where('emp_id',$adminid);
       }
       if($compid!=''){
           $this->db->where('camp_id',$compid);
       }
       if($date!=''){
           $this->db->where('pro_date',$date);
       }
       $this->db->from('pro_stat_sr');   
       $query=$this->db->get();
       return $query->result();
   } 

   public function setting()
   {
       return $this->db->get('tbl_setting')->result();
   } 

   
}  

