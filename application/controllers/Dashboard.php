<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Menu_model/Menu');
    $this->load->model('Admin_model/Role_model');
    $this->load->model('Admin_model/Adminmodel');
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
  }
 /* ================== Start Old Code without menu dynamic =============*/
  /*public function index()
  {
   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['total_admin']=$this->Adminmodel->total_admin();
   $this->load->view('Dashboard/header.php',$data);
   $this->load->view('Dashboard/side.php');
   $this->load->view('Dashboard/dashboard_page.php',$data);
   $this->load->view('Dashboard/footer.php');
   
 }*/
 /* ================== End Old Code without menu dynamic =============*/
 public function index()
 {
   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['total_admin']=$this->Adminmodel->total_admin();
   $data['menu_groups']=$this->Menu->getAllMenuGroup();
   $data['menu_details']=$this->Menu->getAllMenu();
   $data['admin_role']=$this->Menu->adminrole();
   $this->load->view('Dashboard/header.php',$data);
   $this->load->view('Dashboard/side.php');
   $this->load->view('Dashboard/dashboard_page.php',$data);
   $this->load->view('Dashboard/footer.php');
   
 }

 public function permission(){
   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['menu_groups']=$this->Menu->getAllMenuGroup();
   $data['menu_details']=$this->Menu->getAllMenu();
   $data['admin_role']=$this->Menu->adminrole();
   $data['allowed_page_permission']=$this->Menu->allowed_page_permission(); 
   $this->load->view('Dashboard/header.php',$data);
   $this->load->view('Dashboard/side.php',$data);

   $this->load->view('Dashboard/frm_permission',$data);
   $this->load->view('Dashboard/footer.php');
   
 }
 function get_page_name(){
  $category_id = $this->input->get('id',TRUE);
  $data['datata'] = $this->Role_model->getDataById($category_id);
  $data['menu_groups']=$this->Menu->getAllMenuGroup();
  $data['menu_details']=$this->Menu->permission();
  $data['admin_role']=$this->Menu->adminrole();
  $this->load->view('Dashboard/ajax_permission',$data);  
}
public function save_pages(){

  $id=$this->input->post('admin_role');
  $groups=$this->input->post('gruops');
  $menus=$this->input->post('menus');
  $data['groups']=implode(',',$groups);
  $data['menus']=implode(',',$menus);
  $this->Role_model->update_menu($id,$data);
  $this->session->set_flashdata('success','Menus Updated Successfully');
  redirect('Dashboard/permission');

} 


}