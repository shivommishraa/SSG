<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift_Controller extends CI_Controller {
  
 
	public function __construct() {
    parent::__construct();
    $this->load->model(array('Admin_model/Adminmodel'));
    $this->load->model(array('Admin_model/Role_model'));
    $this->load->model('Menu_model/Menu');
    $this->load->model(array('Shift_model/Shift_model','Admin_model/User_model'));
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
    
    
  }
  public function manage_shift()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
    $name=($this->input->post('shift_name')) ? $this->input->post('shift_name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Shift/Shift_Controller/manage_shift"."/$name";
    $config['total_rows'] = $this->Shift_model->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["shift"] = $this->Shift_model->getAll_shift($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Shift/manage_shift',$data);
    $this->load->view('Dashboard/footer.php');
  }
  
  public function add_shift()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Shift/add_shift',$data); 
    $this->load->view('Dashboard/footer.php');
  }

  public function addTbl_shift()
  {
    $this->load->helper(array('url','form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('shift_name','Shift Name','required');
    $this->form_validation->set_rules('shift_start_time','Shift Start Time','required');
    $this->form_validation->set_rules('shift_end_time','Shift End Time','required');
    if($this->form_validation->run() == FALSE)
    {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $data["role"] = $this->User_model->getAll_role();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('Shift/add_shift',$data); 
      $this->load->view('Dashboard/footer.php');
    }
    else
    {

      $data['shift_name'] = $this->input->post('shift_name');
      $data['shift_start_time'] = $this->input->post('shift_start_time');
      $data['shift_end_time'] = $this->input->post('shift_end_time');
      $insert=$this->Shift_model->insert($data);
      $this->session->set_flashdata('success', 'Shift added Successfully');
      redirect('Shift/Shift_Controller/manage_shift');
    }
  }
  
  /*--------------- Code for delete the tble role ------------*/
  public function deleteTbl_shift($role_id) {
    $delete = $this->Shift_model->delete($role_id);
    $this->session->set_flashdata('success', 'Shift deleted');
    redirect('Shift/Shift_Controller/manage_shift');
  }

  /*---------- Code for change the status ---------------*/

  public function changeStatusTbl_status($id) {
    $edit = $this->Shift_model->changeStatus($id);
    $this->session->set_flashdata('success', 'Shift '.$edit.' Successfully');
    redirect('Shift/Shift_Controller/manage_shift');
  }

  /*------------ Code for Edit the role --------------*/
  public function editTbl_shift($sid)
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['rolee'] = $this->Shift_model->getDataById($sid);
    $this->load->view('Shift/edit_shift', $data);
    $this->load->view('Dashboard/footer.php');
  }

  /*---------------------- Code for update the post the role---------------*/

  public function editshiftPost() {
   $this->load->helper(array('url','form'));
   $this->load->library('form_validation');
   $this->form_validation->set_rules('shift_name','Shift Name','required');
   $this->form_validation->set_rules('shift_start_time','Shift Start Time','required');
   $this->form_validation->set_rules('shift_end_time','Shift End Time','required');
   if($this->form_validation->run() == FALSE)
   {
    $datas = $this->input->post('shift_id');
    redirect ("Shift/Shift_Controller/editTbl_shift/$datas ");
  }
  else
  {
    $shift_id = $this->input->post('shift_id');
    $data['shift_name'] = $this->input->post('shift_name');
    $data['shift_start_time'] = $this->input->post('shift_start_time');
    $data['shift_end_time'] = $this->input->post('shift_end_time');
    
    $edit = $this->Shift_model->update($shift_id,$data);

    if ($edit) {
      $this->session->set_flashdata('success', 'Shift Updated');
      redirect('Shift/Shift_Controller/manage_shift');
    }
  }
}

}