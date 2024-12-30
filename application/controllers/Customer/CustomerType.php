<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CustomerType extends CI_Controller {

	  public function __construct() {
	    parent::__construct();
	    $this->load->model('Customer/Customertypemodel');
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
    
    public function manageCustomerType()
    {
     	$id= $this->session->userdata('session_id');
     	$data['admin']=$this->Adminmodel->getadmin($id);
     	$data['menu_groups']=$this->Menu->getAllMenuGroup();
     	$data['menu_details']=$this->Menu->getAllMenu();
     	$data['admin_role']=$this->Menu->adminrole();
            //============================ Start Pager Code ==============================
     	$name=($this->input->post('type')) ? $this->input->post('type') :0;
     	$name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    	 $this->load->config('bootstrap_pagination');
     	$config = $this->config->item('pagination_config');;
     	$config['base_url'] = base_url() ."Customer/CustomerType/manageCustomerType"."/$name";
     	$config['total_rows'] = $this->Customertypemodel->get_count($name);
     	$config['per_page'] = 20;
     	$config['uri_segment'] = 5;
     	$this->pagination->initialize($config);
     	$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
     	$data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
     	$data["customerType"] = $this->Customertypemodel->getAllCustomerType($config['per_page'],$page,$name);
     	$this->load->view('Dashboard/header.php',$data);
     	$this->load->view('Dashboard/side.php');
    	$this->load->view('Customer/managecustomertype', $data);
       	$this->load->view('Dashboard/footer.php');

     }

    public function addNewCustomerType() {
     $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('Customer/addcustomertype',$data);
        $this->load->view('Dashboard/footer.php');
    }
    public function addCustomerType() {
      $data['type'] = $this->input->post('type');
      $data['status'] = $this->input->post('status');
      $this->Customertypemodel->InsertData($data);
      $this->session->set_flashdata('success', 'Customer Type Added Successfully');
      redirect('Customer/CustomerType/manageCustomerType');
    }

    public function editCustomerType($tbl_id) {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data['ctdata'] = $this->Customertypemodel->getCustomerTypeById($tbl_id);
        $this->load->view('Customer/editcustomertype',$data);
        $this->load->view('Dashboard/footer.php');
    }

    public function customerTypeUpdatePost() {
	      $tbl_info_id = $this->input->post('id');
	      $ctdata = $this->Customertypemodel->getCustomerTypeById($tbl_info_id);
	      $data['type'] = $this->input->post('type');
	      $edit = $this->Customertypemodel->update($tbl_info_id,$data);
	      if ($edit) {
	        $this->session->set_flashdata('success', 'Customer Type Updated Successfully.');
	        redirect('Customer/CustomerType/manageCustomerType');
	      }
  	}

    public function deleteCustomerType($id) {
      $delete = $this->Customertypemodel->delete($id);
      $this->session->set_flashdata('success', 'Customer Type deleted.');
      redirect('Customer/CustomerType/manageCustomerType');
    }

    public function changestatus($id) {
      $edit = $this->Customertypemodel->changeStatus($id);
      $this->session->set_flashdata('success', 'Customer Type '.$edit.' Successfully');
      redirect('Customer/CustomerType/manageCustomerType');
    }

}