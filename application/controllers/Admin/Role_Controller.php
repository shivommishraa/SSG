<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_Controller extends CI_Controller {
    
 
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel'));
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
  public function manage_role()
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
    $config['base_url'] = base_url() ."Admin/Role_Controller/manage_role"."/$name";
    $config['total_rows'] = $this->Role_model->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["role"] = $this->Role_model->getAll_Role($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('User/manage_role',$data);
    $this->load->view('Dashboard/footer.php');
}

public function addrole()
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['designation']=$this->Designation_model->all_designation();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('User/add_role',$data); 
    $this->load->view('Dashboard/footer.php');
}

public function addTbl_role()
{
    $data['role_name'] = $this->input->post('role_name');
    $datarray=$this->input->post('designation');
    $data['designation']=implode(',',$datarray); 
    $insert=$this->Role_model->insert($data);
    $this->session->set_flashdata('success', 'Role added Successfully');
    redirect('Admin/Role_Controller/manage_role');
}

/*--------------- Code for delete the tble role ------------*/
public function deleteTbl_role($role_id) {
    $delete = $this->Role_model->delete($role_id);
    $this->session->set_flashdata('success', 'Role deleted');
    redirect('Admin/Role_Controller/manage_role');
}

/*---------- Code for change the status ---------------*/

public function changeStatusTbl_role($id) {
    $edit = $this->Role_model->changeStatus($id);
    $this->session->set_flashdata('success', 'Role '.$edit.' Successfully');
    redirect('Admin/Role_Controller/manage_role');
}

/*------------ Code for Edit the role --------------*/
public function editTbl_role($sid)
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['designation']=$this->Designation_model->all_designation();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['rolee'] = $this->Role_model->getDataById($sid);
    $this->load->view('User/edit_role', $data);
    $this->load->view('Dashboard/footer.php');
}

/*---------------------- Code for update the post the role---------------*/

public function editrolePost() {
    $role_id = $this->input->post('role_id');
    $data['role_name'] = $this->input->post('role_name');
    $datarray=$this->input->post('designation');
    $data['designation']=implode(',',$datarray); 
    $edit = $this->Role_model->update($role_id,$data);

    if ($edit) {
        $this->session->set_flashdata('success', 'Role Updated');
        redirect('Admin/Role_Controller/manage_role');
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
    $data['role'] = $this->Role_model->getDataById($role_id);
    $data['getdesignation']=function($id){
        return $this->Designation_model->getDataById($id);
    };
    $this->load->view('User/View_roledata.php',$data);
}


}