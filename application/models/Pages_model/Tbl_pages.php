<?php
class Tbl_pages extends CI_Model {

 
    public function getAll($limit, $start,$name="") {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        if($name!=''){
            $this->db->where('route',$name);
            
        }
        return $this->db->get('tbl_pages')->result();
    }
    public function get_count($name='') 
    {
        if($name!=''){
            $this->db->where('route',$name);
            
        }
        return $this->db->get('tbl_pages')->num_rows();
    }
    
    public function insert($data) {
        $this->db->insert('tbl_pages', $data);
        return $this->db->insert_id();
    }
    
    public function getDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get('tbl_pages')->result();
    }
    
    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('tbl_pages', $data);
        return true;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_pages');
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