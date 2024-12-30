<?php
class Customertypemodel extends CI_Model {
 	public function getAllCustomerType($limit,$start,$type) {
		$this->db->select('*');
	       $this->db->limit($limit, $start);
	    if($type!=''){
	    	$this->db->where('type',$type);
	    }
	    $this->db->from('tbl_customer_type');   
	    $query=$this->db->get();
	    return $query->result(); 
	}

	public function get_count($type='') 
    {
    	if($category_name!=''){
            $this->db->where('type',$type); 
        }
        return $this->db->get('tbl_customer_type')->num_rows();
    }

    public function getAll() {
        return $this->db->get('tbl_customer_type')->result();
    }

    public function InsertData($data) {
        $this->db->insert('tbl_customer_type', $data);
        return $this->db->insert_id();
    }

    public function getCustomerTypeById($id) {
        $this->db->where('id', $id);
        return $this->db->get('tbl_customer_type')->result();
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('tbl_customer_type', $data);
        return true;
    }

    public function delete($id) {
	    $this->db->where('id', $id);
	    $this->db->delete('tbl_customer_type');
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

}