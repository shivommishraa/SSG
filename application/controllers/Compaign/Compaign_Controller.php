<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compaign_Controller extends CI_Controller {
  
 
	public function __construct() {
    parent::__construct();
    $this->load->model(array('Admin_model/Adminmodel'));
    $this->load->model('Menu_model/Menu');
    $this->load->model(array('Admin_model/Role_model','Compaign_model/Compaign_model','Shift_model/Shift_model'));
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
    
    
  }
  public function manage_compaign()
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
    $config = $this->config->item('pagination_config');
    $config['base_url'] = base_url() ."Compaign/Compaign_Controller/manage_compaign"."/$name";
    $config['total_rows'] = $this->Compaign_model->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
     //============================ End Pager Code ==============================
    $data["compaign"] = $this->Compaign_model->getAll_Compaign($config['per_page'],$page,$name);
    $data['shift_name']=function($id){
      return $this->Shift_model->getDataById($id);
    };
    $data['shift']=$this->Shift_model->getall_shiftdata();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Compaign/manage_compaign',$data);
    $this->load->view('Dashboard/footer.php');
  }
  
  public function add_compaign()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['shift']=$this->Shift_model->getall_shiftdata();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Compaign/add_compaign',$data); 
    $this->load->view('Dashboard/footer.php');
  }

  public function addTbl_compaign()
  {
    $this->load->helper(array('url','form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('compaign_name','Process Name','required');
    $this->form_validation->set_rules('shift_id','Shift','required');
    if($this->form_validation->run() == FALSE)
    {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $data['shift']=$this->Shift_model->getall_shiftdata();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('Compaign/add_compaign',$data); 
      $this->load->view('Dashboard/footer.php');
    }
    else
    {

      $data['compaign_name'] = $this->input->post('compaign_name');
      $data['shift_id'] = $this->input->post('shift_id');
      $insert=$this->Compaign_model->insert($data);
      $this->session->set_flashdata('success', 'Process added Successfully');
      redirect('Compaign/Compaign_Controller/manage_compaign');
    }
  }
  
  /*--------------- Code for delete the tble role ------------*/
  public function deleteTbl_compaign($role_id) {
    $delete = $this->Compaign_model->delete($role_id);
    $this->session->set_flashdata('success', 'Process deleted');
    redirect('Compaign/Compaign_Controller/manage_compaign');
  }

  /*---------- Code for change the status ---------------*/

  public function changeStatusTbl_compaign($id) {
    $edit = $this->Compaign_model->changeStatus($id);
    $this->session->set_flashdata('success', 'Process '.$edit.' Successfully');
    redirect('Compaign/Compaign_Controller/manage_compaign');
  }

  /*------------ Code for Edit the role --------------*/
  public function editTbl_compaign($sid)
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['compaign'] = $this->Compaign_model->getDataById($sid);
    $data['shift']=$this->Shift_model->getall_shiftdata();
    $this->load->view('Compaign/edit_compaign', $data);
    $this->load->view('Dashboard/footer.php');
  }

  /*---------------------- Code for update the post the role---------------*/

  public function editcompaign_Post() {
    $compaign_id = $this->input->post('compaign_id');
    $data['compaign_name'] = $this->input->post('compaign_name');
    $data['shift_id'] = $this->input->post('shift_id');
    
    $edit = $this->Compaign_model->update($compaign_id,$data);

    if ($edit) {
      $this->session->set_flashdata('success', 'Process Updated');
      redirect('Compaign/Compaign_Controller/manage_compaign');
    }
  }

}