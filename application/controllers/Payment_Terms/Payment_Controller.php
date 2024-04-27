<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Controller extends CI_Controller {
    
 
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel','Payment_Terms/Paymentmodel'));
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
  public function manage_paymentterms()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
    $name=($this->input->post('trmc_name')) ? $this->input->post('trmc_name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Payment_Terms/Payment_Controller/manage_paymentterms"."/$name";
    $config['total_rows'] = $this->Paymentmodel->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["role"] = $this->Paymentmodel->getAll_Role($config['per_page'],$page,$name);
    if(!empty($name)){ $data['name']=$name;}
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Payment_Terms/Manage_Payment_Terms',$data);
    $this->load->view('Dashboard/footer.php');
}

public function addpaymentterms()
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['designation']=$this->Designation_model->all_designation();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Payment_Terms/addpaymentterms',$data); 
    $this->load->view('Dashboard/footer.php');
}

public function addTbl_paycon()
{

    $data['term_con_name'] = $this->input->post('term_con_name');
    $data['term_condition'] = $this->input->post('term_condition');
    $data['term_ip'] = $_SERVER['REMOTE_ADDR'];
    $data['term_addby'] = $this->session->userdata('session_id');
    
    $insert=$this->Paymentmodel->insert($data);
    $this->session->set_flashdata('success', 'Payment Terms added Successfully');
    redirect('Payment_Terms/Payment_Controller/manage_paymentterms');
}

/*--------------- Code for delete the tble role ------------*/
public function deleteTbl_paymentcon($role_id) {
    $delete = $this->Paymentmodel->delete($role_id);
    $this->session->set_flashdata('success', 'Payment Terms deleted');
   redirect('Payment_Terms/Payment_Controller/manage_paymentterms');
}

/*---------- Code for change the status ---------------*/

public function changeStatusTbl_edit($id) {
    $edit = $this->Paymentmodel->changeStatus($id);
    $this->session->set_flashdata('success', 'Payment Terms '.$edit.' Successfully');
    redirect('Payment_Terms/Payment_Controller/manage_paymentterms');
}

/*------------ Code for Edit the role --------------*/
public function editTbl_payment($sid)
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['designation']=$this->Designation_model->all_designation();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['paymentterms'] = $this->Paymentmodel->getDataById($sid);
    $this->load->view('Payment_Terms/edit_paymentterms', $data);
    $this->load->view('Dashboard/footer.php');
}

/*---------------------- Code for update the post the role---------------*/

public function editTbl_paycon() {
    $role_id = $this->input->post('term_con_id');
    $data['term_con_name'] = $this->input->post('term_con_name');
    $data['term_condition'] = $this->input->post('term_condition');
    $data['term_ip'] = $_SERVER['REMOTE_ADDR'];
    $data['term_addby'] = $this->session->userdata('session_id');
    $edit = $this->Paymentmodel->update($role_id,$data);

    if ($edit) {
        $this->session->set_flashdata('success', 'Payment Terms Updated Successfully!!');
       redirect('Payment_Terms/Payment_Controller/manage_paymentterms');
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