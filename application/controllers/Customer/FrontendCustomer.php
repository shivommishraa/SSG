<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FrontendCustomer extends CI_Controller {

	  public function __construct() {
	    parent::__construct();
	    $this->load->model('Customer/FrontendCustomermodel');
	    $this->load->helper('url');
	    $this->load->library("pagination");
	    $this->load->model('Admin_model/Adminmodel');
	    $this->load->model('Menu_model/Menu');
	    $this->load->model('Admin_model/Role_model');
	    $this->load->library('session');
	    $this->load->helper(array('url','form'));
	    if(!$this->session->userdata('validated')){
	      redirect('login');
	    }
	  }
    
    public function manageFrontendCustomer()
    {
     	$id= $this->session->userdata('session_id');
     	$data['admin']=$this->Adminmodel->getadmin($id);
     	$data['menu_groups']=$this->Menu->getAllMenuGroup();
     	$data['menu_details']=$this->Menu->getAllMenu();
     	$data['admin_role']=$this->Menu->adminrole();
            //============================ Start Pager Code ==============================
     	$email=($this->input->post('email')) ? $this->input->post('email') :0;
     	$email=($this->uri->segment(4)) ?  $this->uri->segment(4) :$email;
    	 $this->load->config('bootstrap_pagination');
     	$config = $this->config->item('pagination_config');;
     	$config['base_url'] = base_url() ."Customer/FrontendCustomer/manageFrontendCustomer"."/$email";
     	$config['total_rows'] = $this->FrontendCustomermodel->get_count($email);
     	$config['per_page'] = 20;
     	$config['uri_segment'] = 5;
     	$this->pagination->initialize($config);
     	$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
     	$data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
     	$data["fcustomer"] = $this->FrontendCustomermodel->getAllCustomerType($config['per_page'],$page,$email);
     	$this->load->view('Dashboard/header.php',$data);
     	$this->load->view('Dashboard/side.php');
    	$this->load->view('Customer/Admin/managefrontendcustomer', $data);
       	$this->load->view('Dashboard/footer.php');
     }

    public function addNewFrontendCustomer() {
     $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('Customer/Admin/newfrontendcustomer',$data);
        $this->load->view('Dashboard/footer.php');
    }
    public function addFrontendCustomer() {
      $data['email'] = $this->input->post('email');
      $data['name'] = $this->input->post('name');
      $data['mobile'] = $this->input->post('mobile');
      $data['password'] = $this->input->post('password');
      $data['status'] = $this->input->post('status');
      if ($_FILES['customerimage']['name']) { 
        $data['customerimage'] = $this->doUpload('customerimage');
      }
      $this->FrontendCustomermodel->InsertData($data);
      $this->session->set_flashdata('success', 'Customer Added Successfully');
      redirect('Customer/FrontendCustomer/manageFrontendCustomer');
    }

    public function doUpload($file) {
      $config['upload_path'] = './ssgassests/img/customerimage';
      $config['allowed_types'] = '*';
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload($file))
      {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('upload_form', $error);
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        return $data['upload_data']['file_name'];
      }
    }

    public function editFrontendCustomer($tbl_id) {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data['ctdata'] = $this->FrontendCustomermodel->getCustomerTypeById($tbl_id);
        $this->load->view('Customer/Admin/editfrontendcustomer',$data);
        $this->load->view('Dashboard/footer.php');
    }

    public function frontendcustomerUpdatePost() {
	      $tbl_info_id = $this->input->post('id');
	      $ctdata = $this->FrontendCustomermodel->getCustomerTypeById($tbl_info_id);
	      $data['email'] = $this->input->post('email');
        $data['name'] = $this->input->post('name');
        $data['mobile'] = $this->input->post('mobile');
        $data['password'] = $this->input->post('password');
        $data['status'] = $this->input->post('status');
        if ($_FILES['customerimage']['name']) { 
          $data['customerimage'] = $this->doUpload('customerimage');
        }
	      $edit = $this->FrontendCustomermodel->update($tbl_info_id,$data);
	      if ($edit) {
	        $this->session->set_flashdata('success', 'Customer Updated Successfully.');
	        redirect('Customer/FrontendCustomer/manageFrontendCustomer');
	      }
  	}

    public function deleteFrontendCustomer($id) {
      $delete = $this->FrontendCustomermodel->delete($id);
      $this->session->set_flashdata('success', 'Customer deleted.');
      redirect('Customer/FrontendCustomer/manageFrontendCustomer');
    }

    public function changestatus($id) {
      $edit = $this->FrontendCustomermodel->changeStatus($id);
      $this->session->set_flashdata('success', 'Customer '.$edit.' Successfully');
      redirect('Customer/FrontendCustomer/manageFrontendCustomer');
    }

}