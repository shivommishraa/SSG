<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSR_Controller extends CI_Controller {
  
 
	public function __construct() {
    parent::__construct();
    $this->load->model(array('Admin_model/Adminmodel'));
    $this->load->model('Menu_model/Menu');
    $this->load->model(array('Admin_model/Role_model','Admin_CSR/CSR_model','Compaign_model/Compaign_model','Admin_model/User_model'));
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
    
    
  }
  public function Manage_csr()
  {
   $fdate=$this->input->post('fdate');
   $last_date=$this->input->post('last_date');
   if(!empty($fdate)){
    $fdate = date('Y-m-d',strtotime($fdate));
  }else{ $fdate=date('Y-m-d',strtotime('-7 days'));}
  if(!empty($last_date)){
    $last_date = date('Y-m-d',strtotime($last_date));
  }else{ $last_date=date('Y-m-d');}
  
  $adminid= $this->session->userdata('session_id');
  $data['admin']=$this->Adminmodel->getadmin($adminid);
  $data['menu_groups']=$this->Menu->getAllMenuGroup();
  $data['menu_details']=$this->Menu->getAllMenu();
  $data['admin_role']=$this->Menu->adminrole();
          //============================ Start Pager Code ==============================
  
  $fdate=($this->uri->segment(4)) ?  $this->uri->segment(4) :$fdate;
  $last_date=($this->uri->segment(5)) ?  $this->uri->segment(5) :$last_date;
  $this->load->config('bootstrap_pagination');
  $config = $this->config->item('pagination_config');;
  $config['base_url'] = base_url() ."Admin_CSR/CSR_Controller/manage_CSR"."/$fdate/$last_date";
  $config['total_rows'] = $this->CSR_model->get_count();
  $config['per_page'] = 3;
  $config['uri_segment'] = 6;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
  $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
  $data['fdate']=$fdate;
  $data['last_date']=$last_date;
  $data["userlogindata"] = $this->CSR_model->getAll_CSR($config['per_page'],$page);
  $data['get_comp_value']=function($adminid,$compid,$date){
    return $this->CSR_model->get_comp_value($adminid,$compid,$date);
  };
  $data['get_sum_processvalue']=function($adminid,$date){
    return $this->CSR_model->get_sum_processvalue($adminid,$date);
  };
  $data["all_process"] = $this->Compaign_model->all_Compaign();
  $this->load->view('Dashboard/header.php',$data);
  $this->load->view('Dashboard/side.php');
  $this->load->view('Admin_CSR/manage_csr',$data);
  $this->load->view('Dashboard/footer.php');
}

public function add_csr()
{
  $id= $this->session->userdata('session_id');
  $data['admin']=$this->Adminmodel->getadmin($id);
  $data['menu_groups']=$this->Menu->getAllMenuGroup();
  $data['menu_details']=$this->Menu->getAllMenu();
  $data['admin_role']=$this->Menu->adminrole();
  $data['process']=$this->CSR_model->getProcessById($id); 
  $data['alluser']=$this->User_model->get_alluser();
  $data['allowed_csr']=$this->User_model->get_allowed_csruser(); 
  $data['allshift']=$this->CSR_model->allshift(); 
  $data['allprmanager']=$this->CSR_model->getadminbyroleid("2");
  $data['getmanager']=function($eid){
    return $this->CSR_model->getmanagerByIdCSR($eid);};
    $data['process_name']=function($eid){
      return $this->Compaign_model->getDataById($eid);};
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('Admin_CSR/add_csr',$data); 
      $this->load->view('Dashboard/footer.php');
    }

    public function addTbl_csr()
    {
      $this->load->helper(array('url','form'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('pro_date','Date','required');
      if($this->form_validation->run() == FALSE)
      {
       $id= $this->session->userdata('session_id');
       $data['admin']=$this->Adminmodel->getadmin($id);
       $data['menu_groups']=$this->Menu->getAllMenuGroup();
       $data['menu_details']=$this->Menu->getAllMenu();
       $data['admin_role']=$this->Menu->adminrole();
       $data['process_name']=function($eid){
         return $this->Compaign_model->getDataById($eid);};
         $data['allshift']=$this->CSR_model->allshift();
         $data['allprmanager']=$this->CSR_model->getadminbyroleid("2");
         $this->load->view('Dashboard/header.php',$data);
         $this->load->view('Dashboard/side.php');
         $this->load->view('Admin_CSR/add_csr',$data); 
         $this->load->view('Dashboard/footer.php');
       }
       else
       {
         $checkbox =$this->input->post('upd');
         $adminid =$this->input->post('admin_id');
         if(empty($adminid)){ 
           $id= $this->session->userdata('session_id');}else{
             $id=$adminid; 
           }
           $ip = $_SERVER['REMOTE_ADDR'];
           $data['pro_date'] = $this->input->post('pro_date');
           $data['shift_id'] = $this->input->post('shift_id');
           $data['emp_id'] = $id;
           $data['add_ip'] = $ip;
           $data['add_by_id'] = $this->session->userdata('session_id');
           
           foreach($this->input->post('pro_val') as $fkey => $fvalue ){
             $check=$this->CSR_model->check_already_addcsr($id,$fkey,$data['pro_date']);
             
             $data['camp_id'] = $fkey;
             $data['pro_val'] = $fvalue;
             if(empty($check)){

               $insert=$this->CSR_model->insert($data);
               $prinn="Added Successfully";
               $gomanagepage="insertsucess" ;
             }
             else{
              if($checkbox=="upd"){
                $datas['pro_val'] = $fvalue;
                $update=$this->CSR_model->update($id,$fkey,$data['pro_date'],$datas);
                
                $prinn="Updated Successfully";}else{  
                }
              }
              if(!empty($update))
              {
                $dataa['emp_id'] = $id; $dataa['upd_ip'] = $ip;
                $dataa['pro_date'] = $this->input->post('pro_date');
                $dataa['shift_id'] = $this->input->post('shiftt');

                $dataa['updated_by'] = $this->session->userdata('session_id');
                $dataa['pro_upd_val'] = $fvalue;
                $dataa['camp_id'] = $fkey;$dataa['pro_val']=$check[0]->pro_val;
                
                $this->CSR_model->insert_stat_upd_history($dataa);
                $gomanagepage="updatesucess" ;
              }

            }
            if($checkbox!="upd")
            {
             $data['checkbox']=$this->CSR_model->getdataforcheckbox($id,$data['pro_date'],$data['shift_id']);
             $data['ssshift']=$this->input->post('shift_id');
             $prin="already exists of given date if you want to update then click the checkbox and update process values ";
             $this->session->set_flashdata('success', 'CSR '.$prin.'.');
             $id= $this->session->userdata('session_id');
             $data['admin']=$this->Adminmodel->getadmin($id);
             $data['menu_groups']=$this->Menu->getAllMenuGroup();
             $data['menu_details']=$this->Menu->getAllMenu();
             $data['admin_role']=$this->Menu->adminrole();
             $data['process']=$this->CSR_model->getProcessById($id); 
             $data['process_name']=function($eid) {
               return $this->Compaign_model->getDataById($eid); };
               $data['alluser']=$this->User_model->get_alluser();
               $data['allprmanager']=$this->CSR_model->getadminbyroleid("2");
               $data['getmanager']=function($eid){
                return $this->CSR_model->getmanagerByIdCSR($eid);};
                $data['allowed_csr']=$this->User_model->get_allowed_csruser(); 
                $data['allshift']=$this->CSR_model->allshift();
                $this->load->view('Dashboard/header.php',$data);
                $this->load->view('Dashboard/side.php');
                $this->load->view('Admin_CSR/add_csr',$data); 
                $this->load->view('Dashboard/footer.php');
              }
              if(!empty($gomanagepage)){

                $this->session->set_flashdata('success', 'CSR '.$prinn.'.');
                redirect('Admin_CSR/CSR_Controller/manage_csr');}
              }
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
              
              $edit = $this->Role_model->update($role_id,$data);

              if ($edit) {
                $this->session->set_flashdata('success', 'Role Updated');
                redirect('Admin/Role_Controller/manage_role');
              }
            }


            public function findprocess()
            {

              $admin_id=$_POST['admin_id'];
              if(empty($admin_id)){
                $admin_id=$this->session->userdata('session_id');  
              }
              $shift_id=$_POST['shift_id'];
              $data['totalprocess']=$this->CSR_model->findprocess($admin_id);
              $data['shiftprocess']=$this->CSR_model->getprocessbyshift($shift_id);
              $this->load->view('Admin_CSR/Ajex_form_Process', $data);

            }
            public function updatefindprocess()
            {

              $admin_id=$_POST['admin_id'];
              if(empty($admin_id)){
                $admin_id=$this->session->userdata('session_id');  
              }
              $shift_id=$_POST['shift_id'];
              $date=$_POST['date'];
              $data['checkbox']=$this->CSR_model->getdataforcheckbox($admin_id,$date,$shift_id);
              $data['totalprocess']=$this->CSR_model->findprocess($admin_id);
              $data['shiftprocess']=$this->CSR_model->getprocessbyshift($shift_id);
              $this->load->view('Admin_CSR/Ajex_form_Process', $data);

            }

            function fetch_prmanager()
            {
              if($this->input->post('admin_id'))
              {
               echo $this->CSR_model->getadminteam_member_id($this->input->post('admin_id'));
             }
           }

         }