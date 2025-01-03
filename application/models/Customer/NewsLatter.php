<?php
class NewsLatter extends CI_Model {
	
 	public function getAllNewslatter($limit,$start,$newslatteremail) {
		$this->db->select('*');
	       $this->db->limit($limit, $start);
	    if($newslatteremail!=''){
	    	$this->db->where('newslatteremail',$newslatteremail);
	    }
	    $this->db->from('tbl_newlatter_newslatteremail');   
	    $query=$this->db->get();
	    return $query->result(); 
	}

	public function get_count($newslatteremail='') 
    {
    	if($newslatteremail!=''){
            $this->db->where('newslatteremail',$newslatteremail); 
        }
        return $this->db->get('tbl_newlatter_newslatteremail')->num_rows();
    }

    public function getAll() {
        return $this->db->get('tbl_newlatter_newslatteremail')->result();
    }

    public function InsertData($data) {
        $this->db->insert('tbl_newlatter_newslatteremail', $data);
        return $this->db->insert_id();
    }

    public function getloggedinCustomerData($id) {
        $this->db->where('id', $id);
        return $this->db->get('tbl_newlatter_newslatteremail')->result();
    }

    public function getDataBynewslatteremail($newslatteremail) {
        $this->db->where('newslatteremail', $newslatteremail);
        return $this->db->get('tbl_newlatter_newslatteremail')->result();
    }

    public function getCustomerTypeById($id) {
        $this->db->where('id', $id);
        return $this->db->get('tbl_newlatter_newslatteremail')->result();
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('tbl_newlatter_newslatteremail', $data);
        return true;
    }

    public function delete($id) {
	    $this->db->where('id', $id);
	    $this->db->delete('tbl_newlatter_newslatteremail');
	    return true;
	}

	public function changeStatus($id) {
	    $table=$this->getCustomerTypeById($id);
	    if($table[0]->status==0)
	    {
	        $this->update($id,array('status' => '1'));
	        return "Activated";
	    }else{
	        $this->update($id,array('status' => '0'));
	        return "Deactivated";
	    }
	}


	public function validateCustomer()
	{
	     $newslatteremail_id=$this->security->xss_clean($this->input->post('newslatteremail'));
	     $password=$this->input->post('password');
	     $this->db->select('*');
	     $this->db->from('tbl_newlatter_newslatteremail');
	     $this->db->where('newslatteremail', $newslatteremail_id);  
	     $this->db->where('password', $password);  
	     $query = $this->db->get(); 
	     if($query->num_rows()>0)
	     {
	      $row=$query->row();
	      $data=array(
	        
	        'customer_newslatteremail'=>$row->newslatteremail_id,
	        'customer_password'=>$row->password,
	        'customer_session_id'=>$row->id,
	        'customer_validated'=>true
	      );
	      
	      $this->session->set_userdata($data);
	      $this->session->userdata($data);
	      return true;
	      
	    }
	    else
	    {
	      return false;
	    }
	  
	}

}