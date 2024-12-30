<?php
class FrontendCustomermodel extends CI_Model {
	
 	public function getAllCustomerType($limit,$start,$email) {
		$this->db->select('*');
	       $this->db->limit($limit, $start);
	    if($email!=''){
	    	$this->db->where('email',$email);
	    }
	    $this->db->from('tbl_frontend_customer');   
	    $query=$this->db->get();
	    return $query->result(); 
	}

	public function get_count($email='') 
    {
    	if($email!=''){
            $this->db->where('email',$email); 
        }
        return $this->db->get('tbl_frontend_customer')->num_rows();
    }

    public function getAll() {
        return $this->db->get('tbl_frontend_customer')->result();
    }

    public function InsertData($data) {
        $this->db->insert('tbl_frontend_customer', $data);
        return $this->db->insert_id();
    }

    public function getCustomerTypeById($id) {
        $this->db->where('id', $id);
        return $this->db->get('tbl_frontend_customer')->result();
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('tbl_frontend_customer', $data);
        return true;
    }

    public function delete($id) {
	    $this->db->where('id', $id);
	    $this->db->delete('tbl_frontend_customer');
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
	     $email_id=$this->security->xss_clean($this->input->post('email'));
	     $password=$this->input->post('password');
	     $this->db->select('*');
	     $this->db->from('tbl_frontend_customer');
	     $this->db->where('email', $email_id);  
	     $this->db->where('password', $password);  
	     $query = $this->db->get(); 
	     if($query->num_rows()>0)
	     {
	      $row=$query->row();
	      $data=array(
	        
	        'customer_email'=>$row->email_id,
	        'customer_password'=>$row->password,
	        'customer_session_id'=>$row->admin_id,
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