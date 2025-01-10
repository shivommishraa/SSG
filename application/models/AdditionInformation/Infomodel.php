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
/*===================================================================*/
   


}