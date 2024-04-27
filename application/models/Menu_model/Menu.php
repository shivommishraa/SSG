<?php 
class Menu extends CI_Model
{
    public function MenuController()
    {
        parent::model();
    }
    
    public function getAllMenuGroup()
    {
        return $this->db->get('tbl_menu_group')->result();
    }
    public function getAllMenu()
    {
        $this->db->select('*');
        //$this->db->where('default_menu_status','1');
        $this->db->where('showInMenu','1');
        return $this->db->get('tbl_menu')->result();
    }
    public function permission()
    { 
        return $this->db->get('tbl_menu')->result();
    }
    public function getadmin($id){ 
        $this->db->where('adminid',$id);
        return $this->db->get('admin')->result();
    } 
    public function adminrole()
    {
        return $this->db->get('tbl_role')->result();
    }
    public function childmenu(){
            //$this->db->where('default_menu_status','1');
        return $this->db->get('tbl_menu')->result();
        
    }


/*--------- Start Code for Allowed See Page Permission ---------------*/

public function allowed_page_permission()
{
  $id="10";
  $this->db->where('setting_id', $id);
  return $this->db->get('tbl_setting')->result(); 
}
}