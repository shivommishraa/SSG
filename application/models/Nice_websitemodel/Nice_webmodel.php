<?php

class Nice_webmodel extends CI_Model {

    public function Website_Controller()
    {
        parent::model();
    }
     
     /*--------- Start Code for count the image -------------*/
public function get_count($brand_id='') 
{
    if($brand_id!=''){
        $this->db->where('brand_id',$brand_id);
        
    }
    
    return $this->db->get('gallery_images')->num_rows();
}

public function get_countStatus($cate_id='') 
{
    if($cate_id!=''){
        $this->db->where('cate_id',$cate_id);
        
    }
    
    return $this->db->get('tbl_text_status')->num_rows();
}


    public function getAllProducts($limit,$start,$brand_id='')
    {
    	    $this->db->select('*');
            $this->db->limit($limit, $start);
            if($brand_id!=''){
               $this->db->where('brand_id',$brand_id);
            }
            return $this->db->get('gallery_images')->result();
    }

    public function getAlltextstatus($limit,$start,$cate_id='')
    {
            $this->db->select('*');
            $this->db->limit($limit, $start);
            if($cate_id!=''){
               $this->db->where('cate_id',$cate_id);
            }
            $this->db->where('status_status','1');
            return $this->db->get('tbl_text_status')->result();
    }

    public function getimage_datails($id)
    {
        $this->db->where('id', $id); 
        return $this->db->get('gallery')->result();

    }
      
     
    public function getproduct_image($id)
    {

    	$this->db->where('gallery_id', $id);  
        return $this->db->get('gallery_images')->result();
    }
    
    public function getproduct_deatails($id)
    {
    	$this->db->where('id', $id); 
        return $this->db->get('gallery')->result();

    }
    public function getproduct_brand($id="")
    {   
        if($id)
        {
            $this->db->where('brand_id', $id); 
        }
        $this->db->where('status', '1'); 
        return $this->db->get('tbl_brand')->result();
    }
    public function getTextStausCategory()
    {
        $this->db->where('status_staus', '1'); 
        return $this->db->get('tbl_textcategory')->result();
    }
    public function submit_inquiry($data)
    {
         $this->db->insert('product_inquiry', $data);
        return $this->db->insert_id();
    }

    public function submit_query($data)
    {
        $this->db->insert('tbl_contact', $data);
        return $this->db->insert_id();
    }

    public function getHostpermit()
    {
       $data= $this->db->get('tbl_host_permit')->result();
       if(!empty($data)){
        return 1;
       }else{
        return 0;
       }
    }
    public function submit_for_hostdata($data)
    {
        $this->db->insert('tbl_host_permit', $data);
        return $this->db->insert_id();
    }

    public function saveData($data) 
    {
        if($this->db->insert('tbl_contact',$data))
        {
            return 1;   
        }else
        {
            return 0;   
        }
    }
    public function saveorder($data) 
    {
        if($this->db->insert('tbl_order',$data))
        {
            return 1;   
        }else
        {
            return 0;   
        }
    }

    public function savenewslatteremail($data) 
    {
        if($this->db->insert('tbl_newlatter_email',$data))
        {
            return 1;   
        }else
        {
            return 0;   
        }
    }
 }  
 
