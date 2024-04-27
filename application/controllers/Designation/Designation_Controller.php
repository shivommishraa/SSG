<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation_Controller extends CI_Controller {
    
 
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel'));
        $this->load->model(array('Admin_model/Role_model'));
          $this->load->model(array('Department/Department_model','Designation/Designation_model'));
         $this->load->model('Menu_model/Menu');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
      
  }
  public function manage_designation()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
    $name=($this->input->post('dsgn_name')) ? $this->input->post('dsgn_name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Designation/Designation_Controller/manage_designation"."/$name";
    $config['total_rows'] = $this->Designation_model->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["designation"] = $this->Designation_model->getAll_designation($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Designation/manage_designation',$data);
    $this->load->view('Dashboard/footer.php');
}

public function adddesignation()
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Designation/add_designation',$data); 
    $this->load->view('Dashboard/footer.php');
}

public function addTbl_designation()
{
    $data['dsgn_name'] = $this->input->post('dsgn_name');
    //$data['department'] = $this->input->post('department');
    $insert=$this->Designation_model->insert($data);
    $this->session->set_flashdata('success', 'Designation added Successfully');
   
    redirect('Designation/Designation_Controller/manage_designation');
}

/*--------------- Code for delete the tble designation ------------*/
public function deleteTbl_designation($dpt_id) {
    $delete = $this->Designation_model->delete($dpt_id);
    $this->session->set_flashdata('success', 'Designation deleted');
    redirect('Designation/Designation_Controller/manage_designation');
}

/*---------- Code for change the status ---------------*/

public function changeStatusTbl_designation($id) {
 
    $edit = $this->Designation_model->changeStatus($id);
    $this->session->set_flashdata('success', 'Designation '.$edit.' Successfully');
    redirect('Designation/Designation_Controller/manage_designation');
}

/*------------ Code for Edit the role --------------*/
public function editTbl_designation($sid)
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['rolee'] = $this->Designation_model->getDataById($sid);
    $this->load->view('Designation/edit_designation', $data);
    $this->load->view('Dashboard/footer.php');
}

/*---------------------- Code for update the post the role---------------*/

public function editdesignationPost() {
    $dsgn_id = $this->input->post('dsgn_id');
    $data['dsgn_name'] = $this->input->post('dsgn_name');
   // $data['department'] = $this->input->post('department');
    $edit = $this->Designation_model->update($dsgn_id,$data);

    if ($edit) {
        $this->session->set_flashdata('success', 'Designation Updated');
        redirect('Designation/Designation_Controller/manage_designation');
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