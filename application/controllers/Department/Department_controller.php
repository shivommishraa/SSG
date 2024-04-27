<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_Controller extends CI_Controller {
    
 
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel'));
        $this->load->model(array('Admin_model/Role_model'));
          $this->load->model(array('Department/Department_model'));
         $this->load->model('Menu_model/Menu');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
      
  }
  public function manage_department()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
    $name=($this->input->post('dept_name')) ? $this->input->post('dept_name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Department/Department_Controller/manage_department"."/$name";
    $config['total_rows'] = $this->Department_model->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["department"] = $this->Department_model->getAll_Department($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Department/manage_department',$data);
    $this->load->view('Dashboard/footer.php');
}

public function adddepartment()
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Department/add_department',$data); 
    $this->load->view('Dashboard/footer.php');
}

public function addTbl_department()
{
    $data[' dept_name'] = $this->input->post('dept_name');
    //$data['department'] = $this->input->post('department');
    $insert=$this->Department_model->insert($data);
    $this->session->set_flashdata('success', 'Department added Successfully');
   
    redirect('Department/Department_Controller/manage_department');
}

/*--------------- Code for delete the tble role ------------*/
public function deleteTbl_department($dpt_id) {
    $delete = $this->Department_model->delete($dpt_id);
    $this->session->set_flashdata('success', 'Department deleted');
    redirect('Department/Department_Controller/manage_department');
}

/*---------- Code for change the status ---------------*/

public function changeStatusTbl_department($id) {
 
    $edit = $this->Department_model->changeStatus($id);
    $this->session->set_flashdata('success', 'Department '.$edit.' Successfully');
    redirect('Department/Department_Controller/manage_department');
}

/*------------ Code for Edit the role --------------*/
public function editTbl_department($sid)
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['rolee'] = $this->Department_model->getDataById($sid);
    $this->load->view('Department/edit_department', $data);
    $this->load->view('Dashboard/footer.php');
}

/*---------------------- Code for update the post the role---------------*/

public function editdepartmentPost() {
    $dept_id = $this->input->post('dept_id');
    $data['dept_name'] = $this->input->post('dept_name');
   // $data['department'] = $this->input->post('department');
    $edit = $this->Department_model->update($dept_id,$data);

    if ($edit) {
        $this->session->set_flashdata('success', 'Department Updated');
        redirect('Department/Department_Controller/manage_department');
    }
}


public function error_page()
{
    
 $id= $this->session->userdata('session_id');
 $data['admin']=$this->Adminmodel->getadmin($id);
 $data['total_admin']=$this->Adminmodel->total_admin();
 $this->load->view('Page_Not_Found/404_error.php',$data);
 
 
}


}