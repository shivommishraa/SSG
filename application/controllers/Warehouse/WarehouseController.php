<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WarehouseController extends CI_Controller {
    
 
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel','Warehouse/Warehouse_model'));
        $this->load->model(array('Admin_model/Role_model','Designation/Designation_model'));
         $this->load->model('Menu_model/Menu');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
      
  }
  public function manage_warehouse()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
    $name=($this->input->post('role_name')) ? $this->input->post('role_name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Warehouse/WarehouseController/manage_warehouse"."/$name";
    $config['total_rows'] = $this->Warehouse_model->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
    if(!empty($name)){
     $data['sname']= $name;
    }
          //============================ End Pager Code ==============================
    $data["role"] = $this->Warehouse_model->getAll_warehouse($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Warehouse/manage_warehouse',$data);
    $this->load->view('Dashboard/footer.php');
}

public function addwarehouse()
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['designation']=$this->Designation_model->all_designation();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Warehouse/add_warehouse',$data); 
    $this->load->view('Dashboard/footer.php');
}

public function addTbl_warehouse()
{
    $data['location_name'] = $this->input->post('location_name');
    $insert=$this->Warehouse_model->insert($data);
    $this->session->set_flashdata('success', 'Success: Warehouse added Successfully');
    redirect('Warehouse/WarehouseController/manage_warehouse');
}

/*--------------- Code for delete the tble warehouse ------------*/
public function deleteTbl_warehouse($role_id) {
    $delete = $this->Warehouse_model->delete($role_id);
    $this->session->set_flashdata('success', 'Success: Warehouse deleted');
     redirect('Warehouse/WarehouseController/manage_warehouse');
}

/*---------- Code for change the status ---------------*/

public function changeStatusTbl_warehouse($id) {
    $edit = $this->Warehouse_model->changeStatus($id);
    $this->session->set_flashdata('success', 'Success: Warehouse '.$edit.' Successfully');
    redirect('Warehouse/WarehouseController/manage_warehouse');
}

/*------------ Code for Edit the warehouse --------------*/
public function editTbl_warehouse($sid)
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['designation']=$this->Designation_model->all_designation();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['rolee'] = $this->Warehouse_model->getDataById($sid);
    $this->load->view('Warehouse/edit_warehouse', $data);
    $this->load->view('Dashboard/footer.php');
}

/*---------------------- Code for update the post the warehouse---------------*/

public function editData_warehouse() {
    $location_id = $this->input->post('location_id');
    $data['location_name'] = $this->input->post('location_name');
   
    $edit = $this->Warehouse_model->update($location_id,$data);

    if ($edit) {
        $this->session->set_flashdata('success', 'Success: Warehouse Updated.');
        redirect('Warehouse/WarehouseController/manage_warehouse');
    }
}


public function error_page()
{
    
 $id= $this->session->userdata('session_id');
 $data['admin']=$this->Adminmodel->getadmin($id);
 $data['total_admin']=$this->Adminmodel->total_admin();
 $this->load->view('Page_Not_Found/404_error.php',$data);
 
 
}

public function View_roledata()
{
    $role_id=$_POST['role_id'];
    $data['role'] = $this->Warehouse_model->getDataById($role_id);
    $data['getdesignation']=function($id){
        return $this->Designation_model->getDataById($id);
    };
    $this->load->view('User/View_roledata.php',$data);
}


}