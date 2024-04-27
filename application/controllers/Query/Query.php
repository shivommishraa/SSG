<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Brand_model/tbl_brand');
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->model('Menu_model/Menu');
    $this->load->model('Admin_model/Role_model');
    $this->load->model('Admin_model/Adminmodel');
    $this->load->model('Query_model/Query_model');
    $this->load->model('Product_model/tbl_product');
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
  }
  
  public function manageQuery() { 
   
   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['menu_groups']=$this->Menu->getAllMenuGroup();
   $data['menu_details']=$this->Menu->getAllMenu();
   $data['admin_role']=$this->Menu->adminrole();
         //============================ Start Pager Code ==============================
   $name=($this->input->post('brand_name')) ? $this->input->post('brand_name') :0;
   $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
   $this->load->config('bootstrap_pagination');
   $config = $this->config->item('pagination_config');;
   $config['base_url'] = base_url() ."Query/Query/manageQuery"."/$name";
   $config['total_rows'] = $this->Query_model->get_count($name);
   $config['per_page'] = 10;
   $config['uri_segment'] = 5;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
   $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
   $data["Query"] = $this->Query_model->getAllQuery($config['per_page'],$page,$name);         
   $data['status_inq']=function($eid){
    return $this->Query_model->check_already($eid);
  };
  $data['status_name']=function($sid)
  {
    return $this->tbl_product->get_statusname($sid);
  };
  $this->load->view('Dashboard/header.php',$data);
  $this->load->view('Dashboard/side.php');
  $this->load->view('Query/Manage_Query', $data);
  $this->load->view('Dashboard/footer.php');

}

public function deleteQuery($id) {
  $delete = $this->Query_model->delete($id);
  $this->session->set_flashdata('success', 'Query deleted');
  redirect('Query/Query/manageQuery');
}

public function changeStatusQuery($id) {
  $edit = $this->Query_model->changeStatus($id);
  $this->session->set_flashdata('success', 'Query '.$edit.' Successfully');
  redirect('Query/Query/manageQuery');
}

public function querydata(){
 
  $id  = $_POST['contact_id'];
  $data['Query'] = $this->Query_model->getDataByid($id);
  $data['status_history']=function($sid)   { return $this->Query_model->check_already($sid);  };
  $data['status_name']=function($sid) {return $this->tbl_product->get_statusname($sid); };
  $data['adminname']=function($id){
    return $this->Adminmodel->getadmin($id);
  };
  $this->load->view('Query/Query_popup',$data);
  
}

public function status_inquiry()
{
 $inq_id=$_POST['contact_id'];
 $data['contact_id']=$inq_id;
 $data["status"] = $this->tbl_product->getAllStatus();
 $data['status_history']=function($sid)   { return $this->Query_model->check_already($sid);  };
 $this->load->view('Query/StatusQuerypopup',$data);
}

public function submitupdate_status()
{
  $data['status_id'] = $this->input->post('status_id');
  $data['comment'] = $this->input->post('comment');
  $data['contact_id'] = $this->input->post('contact_id');
  $contact_id=$this->input->post('contact_id');
  $ip=$_SERVER['REMOTE_ADDR'];
  $data['ip_address'] =$ip;
  $data['updated_by'] = $this->session->userdata('session_id');
  $ql = $this->Query_model->check_already($contact_id);

  if($ql){
   date_default_timezone_set("Asia/Kolkata");
   $data['modify_at'] = date('Y-m-d H:i:s'); 
   
   $update = $this->Query_model->update_contactstatus($data,$contact_id);

 }
 else{
   $insert=$this->Query_model->submitupdate_status($data);
 }
 $this->session->set_flashdata('success', 'Contact Status Updated Successfully');
 
 redirect('Query/Query/manageQuery');
}

}