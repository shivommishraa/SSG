<?php

class Bannercategory extends CI_Model {

 
    public function getAll() {
        return $this->db->get('bannercategory')->result();
    }

    public function getAllBannercategory() {
         $this->db->where('status',"1");
        return $this->db->get('bannercategory')->result();
    }
   
    public function getBannercategoryById($id='')
    {
        $this->db->select('*');
		$this->db->where('id',$id);
		return $this->db->get('bannercategory')->result();
    }

}