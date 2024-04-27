<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daywise_Controller extends CI_Controller {
  
 
	public function __construct() {
    parent::__construct();
    $this->load->model(array('Admin_model/Adminmodel','Report/Daywise_model'));
    $this->load->model(array('Admin_model/Role_model','AgentCSR_model/CSR_model','Compaign_model/Compaign_model','Admin_model/User_model'));
    $this->load->model('Menu_model/Menu');
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
    
    
  }

  /*--------------Start Code For Daywise Report---------------------------*/
  public function daywise_report()
  {
   $date=$this->input->post('date');
   if(!empty($date)){
    $date = $this->input->post('date');
  }else{ $date=date('Y-m-d');}
  
  $adminid= $this->session->userdata('session_id');
  $data['admin']=$this->Adminmodel->getadmin($adminid);
  $data['menu_groups']=$this->Menu->getAllMenuGroup();
  $data['menu_details']=$this->Menu->getAllMenu();
  $data['admin_role']=$this->Menu->adminrole();
          //============================ Start Pager Code ==============================
  
  $fdate=($this->uri->segment(4)) ?  $this->uri->segment(4) :$date;
  $role_id=($this->input->post('role_id')) ? $this->input->post('role_id') :0;
  $role_id=($this->uri->segment(5)) ?  $this->uri->segment(5) :$role_id;
  $this->load->config('bootstrap_pagination');
  $config = $this->config->item('pagination_config');;
  $config['base_url'] = base_url() ."Report/Daywise_Controller/daywise_report"."/$date/$role_id";
  $config['total_rows'] = $this->Daywise_model->get_count($role_id);
  $config['per_page'] = 15;
  $config['uri_segment'] = 6;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
  $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
  $data['date']=$date;
  $data['Roles']=$role_id;
  $data["userlogindata"] = $this->Daywise_model->getAll_user($config['per_page'],$page,$role_id);
  $data['get_comp_value']=function($adminid,$compid,$date){
    return $this->Daywise_model->get_comp_value($adminid,$compid,$date);
  };
  $data['get_role']=function($adminid){
    return $this->Role_model->getDataById($adminid);
  };
  $data["all_process"] = $this->Compaign_model->all_Compaign();
  $data["all_role"] = $this->User_model->getAll_role();
  $this->load->view('Dashboard/header.php',$data);
  $this->load->view('Dashboard/side.php');
  $this->load->view('Report/Report_daywise',$data);
  $this->load->view('Dashboard/footer.php');
}

/*--------------End Code For Daywise Report---------------------------*/



}