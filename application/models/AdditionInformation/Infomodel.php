<?php

class Infomodel extends CI_Model {

 
    public function getAll() {
        return $this->db->get('tbl_additional_info')->result();
    }

    public function addInfoinsert($data) {
        $this->db->insert('tbl_additional_info', $data);
        return $this->db->insert_id();
    }

    public function getInfoDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get('tbl_additional_info')->result();
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('tbl_additional_info', $data);
        return true;
    }

    /*======== Start Code for Info Model Gallery ===========*/
    public function getAllInfoBannerGallery() {
        return $this->db->get('info_banner_gallery')->result();
    }

    public function updateInfoGallery($data, $id) { 
        if(!empty($data) && !empty($id)){ 
            // Add modified date if not included 
            /*if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            }*/ 
            
            // Update gallery data 
            $update = $this->db->update('info_banner_gallery', $data, array('id' => $id)); 
            
            // Return the status 
            return $update?true:false; 
        } 
        return false; 
    }

    public function insertImagesImage($data = array()) { 
        if(!empty($data)){ 
           
            // Insert gallery data 
            $insert = $this->db->insert_batch('info_banner_gallery', $data); 
            
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 


    
/*===================================================================*/
   


}