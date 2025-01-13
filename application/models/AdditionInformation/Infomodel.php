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

    public function getAllInfoBannerGalleryBy($id) {
        $this->db->where('tbl_additional_info_id', $id);
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


    public function getImgRow($id){ 
        $this->db->select('*'); 
        $this->db->from('info_banner_gallery'); 
        $this->db->where('id', $id); 
        $query  = $this->db->get(); 
        return ($query->num_rows() > 0)?$query->row_array():false; 
    } 

     public function deleteImage($id){ 
        // Delete image data 
       
        $delete = $this->db->delete('info_banner_gallery', $id); 
        
        // Return the status 
        return $delete?true:false; 
    } 



    public function updateforModelPopup($id,$data){ 
        $this->db->where('id', $id);
        $datas=$this->db->update('tbl_additional_info', $data);
        return $datas?true:false; 
    } 
    
/*===================================================================*/
   


}