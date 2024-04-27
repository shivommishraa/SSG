<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectController extends CI_Controller {


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Project/Project');
    $this->load->model('Brand_model/tbl_brand');
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->model('Menu_model/Menu');
    $this->load->model('Admin_model/Adminmodel');
    $this->load->model(array('Admin_model/User_model','Compaign_model/Compaign_model','Admin_model/Role_model','Task/Task_model','Location/Location','Invoice/Invoice'));
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }

  }
  public function index()
  {   
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['menu_groups']=$this->Project->getAllMenuGroup();
    $data['customer']=$this->Project->getAllCustomer();
    $data['menu_details']=$this->Project->getAllMenu();
    $this->load->view('Project/frm_project',$data);
    $this->load->view('Dashboard/footer.php');

  }
  /*========   start code for new project add in tbl project===================*/
  public function newaddproject()
  { 

    $datas['id']=$_POST['prospect_id'];
    $this->load->view('addprojectpopup',$datas);


  }

  public function addproject()
  {
    $id= $this->session->userdata('session_id');

    $this->load->helper(array('url','form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('pr_title','Title','required|min_length[2]|max_length[40]');
    $this->form_validation->set_rules('pr_worktype','Email','trim|required|min_length[2]|max_length[30]');
    $this->form_validation->set_rules('pr_startdate','Start Date','required');
    $this->form_validation->set_rules('pr_deadline','Deadline Date','required');
    $this->form_validation->set_rules('pr_description','Description','trim|required|min_length[2]|max_length[60]');
    $this->form_validation->set_rules('pr_budget','Budget','trim|required|min_length[2]|max_length[15]');
    $this->form_validation->set_rules('pr_installments','Installments','trim|required|min_length[2]|max_length[15]');
    $this->form_validation->set_rules('pr_inst_amt','Installments Ammount','trim|required|min_length[2]|max_length[20]');
    $this->form_validation->set_rules('pr_balance','Balance','trim|required|min_length[1]|max_length[20]');
    $this->form_validation->set_rules('ser_id','Service ID','trim|required|min_length[1]|max_length[30]');
    if($this->form_validation->run() == FALSE)
    {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $data['customer']=$this->Project->getAllCustomer();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $data['menu_groups']=$this->Project->getAllMenuGroup();
      $data['menu_details']=$this->Project->getAllMenu();
      $this->load->view('Project/frm_project',$data);
      $this->load->view('Dashboard/footer.php');
    }
    else
    {

     $datas['pr_title']=$this->input->post('pr_title');
     $datas['pr_worktype']=$this->input->post('pr_worktype');
     $datas['pr_startdate']=$this->input->post('pr_startdate');
     $datas['pr_deadline']=$this->input->post('pr_deadline');
     $datas['pr_description']=$this->input->post('pr_description');
     $datas['pr_budget']=$this->input->post('pr_budget');
     $datas['pr_installments']=$this->input->post('pr_installments');
     $datas['pr_inst_amt']=$this->input->post('pr_inst_amt');
     $datas['pr_balance']=$this->input->post('pr_balance');
     $datas['pr_status_id']=$this->input->post('pr_status_id');
     $datas['pr_mod_by']= $this->session->userdata('session_id');
     date_default_timezone_set("Asia/Kolkata");
     $datas['pr_mod_at'] = date('Y-m-d H:i:s'); 
     $datas['ser_id']=$this->input->post('ser_id');
     $datas['prospect_id']=$this->session->userdata('session_id');
     $ip = $_SERVER['REMOTE_ADDR'];
     $datas['pr_mod_ip']=$ip;

     $datas['pr_progress']= $this->input->post('pr_progress');
     $datas['pr_priority']= $this->input->post('pr_priority');
     $datas['pr_customer']= $this->input->post('pr_customer');
     if(!empty($this->input->post('pr_cus_view'))){ $cv=$this->input->post('pr_cus_view');}else{ $cv="off";}
     if(!empty($this->input->post('pr_cus_comment'))){ $cc=$this->input->post('pr_cus_comment');}else{ $cc="off";}
     $datas['pr_cus_view']= $cv;
     $datas['pr_cus_comment']= $cc;
     $datas['pr_note']= $this->input->post('pr_note');
    //print_r($datas['pr_cus_view']);exit();
     $q= $this->Project->insert($datas);
     if ($q) {

            $data['message'] = 'Project Added';  // For alert message after submit

            redirect('Project/ProjectController/projectlist');


          }

        }
      }

      public function projectlist()
      { 


       $id= $this->session->userdata('session_id');
       $data['admin']=$this->Adminmodel->getadmin($id);
       $data['menu_groups']=$this->Menu->getAllMenuGroup();
       $data['menu_details']=$this->Menu->getAllMenu();
       $data['admin_role']=$this->Menu->adminrole();
       //============================ Start Pager Code ==============================
       $pr_title=($this->input->post('pr_title')) ? $this->input->post('pr_title') :0;
       $pr_title=($this->uri->segment(4)) ?  $this->uri->segment(4) :$pr_title;
       $pr_worktype=($this->input->post('pr_worktype')) ? $this->input->post('pr_worktype') :0;
       $pr_worktype=($this->uri->segment(5)) ?  $this->uri->segment(5) :$pr_worktype;
       $this->load->config('bootstrap_pagination');
       $config = $this->config->item('pagination_config');;
       $config['base_url'] = base_url() ."Project/ProjectController/projectlist"."/$pr_title/$pr_worktype";
       $config['total_rows'] = $this->Project->get_count($pr_title,$pr_worktype);
       $config['per_page'] = 10;
       $config['uri_segment'] = 6;
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
       $data['links'] = $this->pagination->create_links();
                //============= End Pager Code ================
       $data["Project"] = $this->Project->getallproject($config['per_page'],$page,$pr_title,$pr_worktype);
       $this->load->view('Dashboard/header.php',$data);
       $this->load->view('Dashboard/side.php');
       $this->load->view('Project/listproject',$data);
       $this->load->view('Dashboard/footer.php');


     }


     /* ================= Code for Assign Project to Agent =================*/

     public function Agent_Project()
     { 


       $id= $this->session->userdata('session_id');
       $data['admin']=$this->Adminmodel->getadmin($id);
       $data['menu_groups']=$this->Menu->getAllMenuGroup();
       $data['menu_details']=$this->Menu->getAllMenu();
       $data['admin_role']=$this->Menu->adminrole();
            //================= Start Pager Code =================
       $admin_id=($this->input->post('admin_id')) ? $this->input->post('admin_id') :0;
       $admin_id=($this->uri->segment(4)) ?  $this->uri->segment(4) :$admin_id;

       $this->load->config('bootstrap_pagination');
       $config = $this->config->item('pagination_config');;
       $config['base_url'] = base_url() ."Project/ProjectController/Agent_Project"."/$admin_id";
       $config['total_rows'] = $this->Project->count_for_agent($admin_id);
       $config['per_page'] = 10;
       $config['uri_segment'] = 5;
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
       $data['links'] = $this->pagination->create_links();
                //=========== End Pager Code ================
       $data["Project"] = $this->Project->getAll_agent($config['per_page'],$page,$admin_id);

       $this->load->view('Dashboard/header.php',$data);
       $this->load->view('Dashboard/side.php');
       $this->load->view('Project/listAgent_Project',$data);
       $this->load->view('Dashboard/footer.php');


     }


     public function uploadNotes()
     {
      print_r($this->input->post('dataFile'));
      $data["project_id"]=$this->input->post('pr_id');
      $data['dataFile']=$this->input->post('dataFile');
      if ($_FILES['dataFile']['name']) { 
        $data['dataFile'] = $this->doUpload('dataFile');
      }
      $data['add_by']=$this->session->userdata('session_id');
      $ip = $_SERVER['REMOTE_ADDR'];
      $data['add_ip']=$ip;

      $result=$this->Project->uploadNotes($data);
      if(!empty($result)){
        $this->session->set_flashdata('success', 'Note added successfully..');
        redirect('Project/ProjectController/viewprojectdata/'.$data['project_id']);

      }
    }


    function doUpload($file) {
      $config['upload_path'] = './uploads/Project_file';
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


    public function deletelistdata($id)
    {
     $delete=$this->Project->delete($id);
     $this->session->set_flashdata('Success','Agent Deleted Successfullty');
     redirect('Project/ProjectController/projectlist');
   }

   public function assign_project()
   {

     $admin_id=$_POST['admin_id'];
     $data["admindata"]=$this->User_model->getDataById($admin_id);
     $data["Project"] = $this->Project->get_allproject(); 
     $this->load->view('Project/Project_assgin',$data);

   }

   public function viewprojectdata($pr_id)
   {

      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $data["Project"] = $this->Project->getDataById($pr_id);
      $login_id= $this->session->userdata('session_id');
      $data['userlogin']=$this->User_model->getDataById($login_id);
      $data['getadmin']=function($idd){
      return $this->User_model->getDataById($idd);
      };
      $data["task_status"]=function($id){
      return $this->Task_model->task_status($id);};
      $data['All_agent']=$this->User_model->get_alluser();
      $data['Added_member']=$this->Project->get_Added_member($pr_id);
      $data['team']=$this->Project->get_projectteam($pr_id);
      $data['getmember']=function($dd){
        return $this->Adminmodel->getadmin($dd);
      };

      $data['getrole']=function($ded){
        return $this->User_model->getRoleById($ded);
      };
       $data['getinc_status']=function($eid){
        return $this->Invoice->getinc_status($eid);  };
      $data['project_history']=$this->Project->get_projectteamhistory($pr_id);
      $data['alltask']=$this->Project->get_taskbyid($pr_id);
      $data['allmile']=$this->Project->get_milebyid($pr_id);
      $data['project_note']=$this->Project->get_project_note($pr_id);
      $data['all_invoice']=$this->Invoice->get_all_invoice($pr_id);//Invoice
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('Project/viewprojectdata');
      $this->load->view('Dashboard/footer.php');

    }

    public function deleteteam_member($id,$pr_id)
    {
      $delete=$this->Project->deleteteam_member($id);
      $this->session->set_flashdata('Delete','Member Deleted Successfullty');
      redirect('Project/ProjectController/viewprojectdata/'.$pr_id);
    }

    public function editprdetails($id)
    {

      $data['Project']=$id;
      $data['Project']=$this->Project->getDataById($id);
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $data['customer']=$this->Project->getAllCustomer();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $data['menu_groups']=$this->Project->getAllMenuGroup();
      $data['menu_details']=$this->Project->getAllMenu();
      $this->load->view('Project/editproject',$data);
      $this->load->view('Dashboard/footer.php');

    }


    public function updateproject()
    {

     $ag_unique = $this->input->post('pr_id');   

     $datas['pr_title']=$this->input->post('pr_title');

     $datas['pr_worktype']=$this->input->post('pr_worktype');

     $datas['pr_startdate']=$this->input->post('pr_startdate');

     $datas['pr_deadline']=$this->input->post('pr_deadline');

     $datas['pr_description']=$this->input->post('pr_description');

     $datas['pr_budget']=$this->input->post('pr_budget');

     $datas['pr_installments']=$this->input->post('pr_installments');

     $datas['pr_inst_amt']=$this->input->post('pr_inst_amt');

     $datas['pr_balance']=$this->input->post('pr_balance');

     $datas['pr_status_id']=$this->input->post('pr_status_id');

     $datas['pr_mod_by']=$this->session->userdata('session_id');

     date_default_timezone_set("Asia/Kolkata");
     $datas['pr_mod_at'] = date('Y-m-d H:i:s');

     $datas['ser_id']=$this->input->post('ser_id');

     $datas['prospect_id']=$this->session->userdata('session_id');
     $ip = $_SERVER['REMOTE_ADDR'];
     $datas['pr_mod_ip']=$ip;
     $datas['pr_progress']= $this->input->post('pr_progress');
     $datas['pr_priority']= $this->input->post('pr_priority');
     $datas['pr_customer']= $this->input->post('pr_customer');
     if(!empty($this->input->post('pr_cus_view'))){ $cv=$this->input->post('pr_cus_view');}else{ $cv="off";}
     if(!empty($this->input->post('pr_cus_comment'))){ $cc=$this->input->post('pr_cus_comment');}else{ $cc="off";}
     $datas['pr_cus_view']= $cv;
     $datas['pr_cus_comment']= $cc;
     $datas['pr_note']= $this->input->post('pr_note');
      //  print_r($datas['pr_customer']);
       // exit();
     $this->Project->update($ag_unique,$datas);
     $edit=$this->Project->update($ag_unique,$datas);
     if($edit) {

      $this->session->set_flashdata('success', 'Project Updated Successfully..');
      redirect('Project/ProjectController/projectlist');
    }
  }

  public function changeprstatus($agid)
  {
    $edit = $this->Project->changeStatuspr($agid);
    $this->session->set_flashdata('success', 'Agent'.$edit.' Successfully');
    redirect('listproject');
  }

  public function managemenu()
  {    
    $data['menu_groups']=$this->Project->getAllMenuGroup();
    $data['menu_details']=$this->Project->getAllMenu();
  }

  public function single_task_detail()
  {

    $data['project_id']=$_POST['project_id'];
    $data['task_id']=$_POST['task_id'];
    $data['task']=$this->Project->editmember_task($data['task_id']);
    $data['task_status_history']=$this->Task_model->task_status_history($data['project_id'],$data['task_id']);
    $data['getprojectname']=function($pid){
      return $this->Project->getDataById($pid);
    };
    $data["task_status"]=function($id){
      return $this->Task_model->task_status($id);};
      $data['findmember']=function($eid){
        return $this->User_model->getDataById($eid);};
        $data['findrole']=function($rid){
          return $this->Role_model->getDataById($rid);};
          $this->load->view('Project/viewprojectpopup',$data);
        }

        public function projectstatus()
        {
          $data['id']=$_POST['project_id'];
          $id=$data['id'];
          $data['status']=$this->Project->allprojectstatus();
          $data['phistory']=$this->Project->projecthistory($id);
          $this->load->view('Project/projectstatus',$data);
        }




        /*  ============ Start code for Add project Team =============================*/

        public function add_project_team()
        {

          $id= $this->session->userdata('session_id');

          $this->load->helper(array('url','form'));
          $this->load->library('form_validation');
          $this->form_validation->set_rules('id_role','Member Name','required|min_length[2]|max_length[40]');
          $this->form_validation->set_rules('remark','Remark','trim|required|min_length[1]|max_length[20]');


          if($this->form_validation->run() == FALSE)
          {
           $pr_id=$this->input->post('pr_id');
           $id= $this->session->userdata('session_id');
           $data['admin']=$this->Adminmodel->getadmin($id);
           $data['menu_groups']=$this->Menu->getAllMenuGroup();
           $data['menu_details']=$this->Menu->getAllMenu();
           $data['admin_role']=$this->Menu->adminrole();
           $data["Project"] = $this->Project->getDataById($pr_id);
           $data['getadmin']=function($idd){
            return $this->User_model->getDataById($idd);
          };
          $data['All_agent']=$this->User_model->get_alluser();
          $this->load->view('Dashboard/header.php',$data);
          $this->load->view('Dashboard/side.php');
          $this->load->view('Project/viewprojectdata');
          $this->load->view('Dashboard/footer.php');
        }
        else
        {

         $da=$this->input->post('id_role');
         $daa=array();
         $daa=explode(",",$da);
         $datas['member_id']=$daa[0];
         $datas['proj_role']=$daa[1];
         $datas['project_id']=$this->input->post('pr_id');
         $datas['remark']=$this->input->post('remark');
         $datas['add_by']= $this->session->userdata('session_id');
         $ip = $_SERVER['REMOTE_ADDR'];
         $datas['add_ip']=$ip;
         $check=$this->Project->check_already_member($datas['project_id'],$datas['member_id']);
         if(empty($check)){
          $this->Project->insert_projectTeam_history($datas);
          $q= $this->Project->insert_projectTeam($datas);
        }
        if (!empty($q)) {

          $this->session->set_flashdata('success', 'Team member added successfully..');
          redirect('Project/ProjectController/viewprojectdata/'.$datas['project_id']);


        }else{
          $member=$this->User_model->getDataById($datas['member_id']);

          $this->session->set_flashdata('Delete', 'Sorry!!.. '.$member[0]->name.' is already add. Select any other member.');
          redirect('Project/ProjectController/viewprojectdata/'.$datas['project_id']);
        }

      }
    }


    public function addtask()
    {

      $id= $this->session->userdata('session_id');
      $this->load->helper(array('url','form'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('task_name','Task Name','required|min_length[2]|max_length[40]');
      $this->form_validation->set_rules('id_role','Member','trim|required|min_length[1]|max_length[200]');
      $this->form_validation->set_rules('desciption','Description','trim|required|min_length[1]|max_length[200]');

      if($this->form_validation->run() == FALSE)
      {
        $pr_id=$this->input->post('pr_id');
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $data["Project"] = $this->Project->getDataById($pr_id);
        $data['getadmin']=function($idd){
          return $this->User_model->getDataById($idd);
        };
        $data['All_agent']=$this->User_model->get_alluser();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('Project/viewprojectdata');
        $this->load->view('Dashboard/footer.php');
      }
      else
      {


       $datas['task_name']=$this->input->post('task_name');
       $da=$this->input->post('id_role');

       $daa=array();
       $daa=explode(",",$da);
       $datas['member_id']=$daa[0];
       $datas['member_role']=$daa[1];
       $datas['project_id']=$this->input->post('pr_id');
       $datas['desciption'] = $this->input->post('desciption');
       $datas['add_by']= $this->session->userdata('session_id');
       $ip = $_SERVER['REMOTE_ADDR'];
       $datas['add_ip']=$ip;
       $q= $this->Project->insert_task($datas);
       $datas['task_id']=$q;
       $this->Project->insert_task_histry($datas);
       if($q){

         $project_id=$this->input->post('pr_id');
         $this->session->set_flashdata('success', 'Task added successfully..');
         redirect('Project/ProjectController/viewprojectdata/'.$project_id);

       }
     }

   }



   public function delete_member_task($id,$pr_id)
   {
    $this->Project->delete_member_task($id);
    $this->session->set_flashdata('Delete', 'Task deleted successfully..');
    redirect('Project/ProjectController/viewprojectdata/'.$pr_id);

  }

  public function editmember_task($eid,$pr_id)
  {

   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['menu_groups']=$this->Menu->getAllMenuGroup();
   $data['menu_details']=$this->Menu->getAllMenu();
   $data['admin_role']=$this->Menu->adminrole();
   $data['edit_task']=$this->Project->editmember_task($eid);
   $data['pr_id']=$pr_id;
   $data['All_agent']=$this->User_model->get_alluser();
   $this->load->view('Dashboard/header.php',$data);
   $this->load->view('Dashboard/side.php');
   $this->load->view('Project/edit_Membertask',$data);
   $this->load->view('Dashboard/footer.php');

 }

 public function updare_member_task()
 {

   $id= $this->session->userdata('session_id');
   $this->load->helper(array('url','form'));
   $this->load->library('form_validation');
   $this->form_validation->set_rules('task_name','Task Name','required|min_length[2]|max_length[400]');
   $this->form_validation->set_rules('id_role','Member','trim|required|min_length[1]|max_length[200]');
   $this->form_validation->set_rules('desciption','Description','trim|required|min_length[1]|max_length[200]');

   if($this->form_validation->run() == FALSE)
   {
    $pr_id=$this->input->post('pr_id');
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data["Project"] = $this->Project->getDataById($pr_id);
    $data['getadmin']=function($idd){
      return $this->User_model->getDataById($idd);
    };
    $data['All_agent']=$this->User_model->get_alluser();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Project/viewprojectdata');
    $this->load->view('Dashboard/footer.php');
  }
  else
  {

   $task_id=$this->input->post('task_id');
   $datas['task_name']=$this->input->post('task_name');
   $da=$this->input->post('id_role');

   $daa=array();
   $daa=explode(",",$da);
   $datas['member_id']=$daa[0];
   $datas['member_role']=$daa[1];

   $datas['desciption'] = $this->input->post('desciption');
   $datas['add_by']= $this->session->userdata('session_id');
   $ip = $_SERVER['REMOTE_ADDR'];
   $datas['add_ip']=$ip;
   $q= $this->Project->update_member_task($task_id,$datas);
   $datas['project_id'] = $this->input->post('pr_id');
   $datas['remark'] = "Task Modified";
   $datas['task_id']=$task_id;
   $this->Project->insert_task_histry($datas);
   if($q){

     $project_id=$this->input->post('pr_id');
     $this->session->set_flashdata('success', 'Task updated successfully..');
     redirect('Project/ProjectController/viewprojectdata/'.$project_id);

   }
 }
}



/*======================== Start code for add Milestone =========================*/

public function addmilestone()
{

  $id= $this->session->userdata('session_id');
  $this->load->helper(array('url','form'));
  $this->load->library('form_validation');
  $this->form_validation->set_rules('mile_name','Milestone Name','required|min_length[2]|max_length[40]');
  $this->form_validation->set_rules('id_role','Member','trim|required|min_length[1]|max_length[200]');
  $this->form_validation->set_rules('desciption','Description','trim|required|min_length[1]|max_length[200]');
  $this->form_validation->set_rules('complete','Complete','trim|required|min_length[1]|max_length[200]');

  if($this->form_validation->run() == FALSE)
  {
    $pr_id=$this->input->post('pr_id');
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data["Project"] = $this->Project->getDataById($pr_id);
    $data['getadmin']=function($idd){
      return $this->User_model->getDataById($idd);
    };
    $data['All_agent']=$this->User_model->get_alluser();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Project/viewprojectdata');
    $this->load->view('Dashboard/footer.php');
  }
  else
  {


   $datas['mile_name']=$this->input->post('mile_name');
   $da=$this->input->post('id_role');

   $daa=array();
   $daa=explode(",",$da);
   $datas['member_id']=$daa[0];
   $datas['member_role']=$daa[1];
   $datas['project_id']=$this->input->post('pr_id');
   $datas['complete']=$this->input->post('complete');
   
   $datas['desciption'] = $this->input->post('desciption');
   $datas['add_by']= $this->session->userdata('session_id');
   $ip = $_SERVER['REMOTE_ADDR'];

   $datas['add_ip']=$ip;
   $q= $this->Project->insert_mile($datas);
   $datas['mile_id']=$q;
   $this->Project->insert_mile_histry($datas);
   if($q){

     $project_id=$this->input->post('pr_id');
     $this->session->set_flashdata('success', 'Milestone added successfully..');
     redirect('Project/ProjectController/viewprojectdata/'.$project_id);

   }
 }

}



public function delete_member_mile($id,$pr_id)
{
  $this->Project->delete_member_mile($id);
  $this->session->set_flashdata('Delete', 'Milestone deleted successfully..');
  redirect('Project/ProjectController/viewprojectdata/'.$pr_id);

}


public function editmember_mile($eid,$pr_id)
{

 $id= $this->session->userdata('session_id');
 $data['admin']=$this->Adminmodel->getadmin($id);
 $data['menu_groups']=$this->Menu->getAllMenuGroup();
 $data['menu_details']=$this->Menu->getAllMenu();
 $data['admin_role']=$this->Menu->adminrole();
 $data['edit_mile']=$this->Project->editmember_mile($eid);
 $data['pr_id']=$pr_id;
 $data['All_agent']=$this->User_model->get_alluser();
 $this->load->view('Dashboard/header.php',$data);
 $this->load->view('Dashboard/side.php');
 $this->load->view('Project/edit_Membermile',$data);
 $this->load->view('Dashboard/footer.php');

}


public function updare_member_mile()
{

 $id= $this->session->userdata('session_id');
 $this->load->helper(array('url','form'));
 $this->load->library('form_validation');
 $this->form_validation->set_rules('mile_name','Milestone Name','required|min_length[2]|max_length[400]');
 $this->form_validation->set_rules('id_role','Member','trim|required|min_length[1]|max_length[200]');
 $this->form_validation->set_rules('desciption','Description','trim|required|min_length[1]|max_length[200]');
 $this->form_validation->set_rules('complete','Complete','trim|required|min_length[1]|max_length[200]');

 if($this->form_validation->run() == FALSE)
 {
  $pr_id=$this->input->post('pr_id');
  $id= $this->session->userdata('session_id');
  $data['admin']=$this->Adminmodel->getadmin($id);
  $data['menu_groups']=$this->Menu->getAllMenuGroup();
  $data['menu_details']=$this->Menu->getAllMenu();
  $data['admin_role']=$this->Menu->adminrole();
  $data["Project"] = $this->Project->getDataById($pr_id);
  $data['getadmin']=function($idd){
    return $this->User_model->getDataById($idd);
  };
  $data['All_agent']=$this->User_model->get_alluser();
  $this->load->view('Dashboard/header.php',$data);
  $this->load->view('Dashboard/side.php');
  $this->load->view('Project/viewprojectdata');
  $this->load->view('Dashboard/footer.php');
}
else
{

 $mile_id=$this->input->post('mile_id');
 $datas['mile_name']=$this->input->post('mile_name');
 $da=$this->input->post('id_role');

 $daa=array();
 $daa=explode(",",$da);
 $datas['member_id']=$daa[0];
 $datas['member_role']=$daa[1];

 $datas['complete'] = $this->input->post('complete');
 $datas['desciption'] = $this->input->post('desciption');
 $datas['add_by']= $this->session->userdata('session_id');
 $ip = $_SERVER['REMOTE_ADDR'];
 $datas['add_ip']=$ip;
 $q= $this->Project->update_member_mile($mile_id,$datas);
 $datas['project_id'] = $this->input->post('pr_id');
 $datas['remark'] = "Milestone Modified";
 $datas['mile_id']=$mile_id;
 $this->Project->insert_mile_histry($datas);
 if($q){

   $project_id=$this->input->post('pr_id');
   $this->session->set_flashdata('success', 'Milestone updated successfully..');
   redirect('Project/ProjectController/viewprojectdata/'.$project_id);

 }
}
}

public function single_mail_detail()
{

  $data['project_id']=$_POST['project_id'];
  $data['mile_id']=$_POST['mile_id'];
  $data['mile']=$this->Project->editmember_mile($data['mile_id']);
  $data['mile_status_history']=$this->Task_model->mile_status_history($data['project_id'],$data['mile_id']);
  $data['getprojectname']=function($pid){
    return $this->Project->getDataById($pid);
  };
  $data["task_status"]=function($id){
    return $this->Task_model->task_status($id);};
    $data['findmember']=function($eid){
      return $this->User_model->getDataById($eid);};
      $data['findrole']=function($rid){
        return $this->Role_model->getDataById($rid);};
        $this->load->view('Project/viewmailpopup',$data);
      }


      public function upd_project_note()
      {
        $pr_id=$this->input->post('pr_id');
        $data['pr_note']=$this->input->post('pr_note');
        $update=$this->Project->update($pr_id,$data);
        if(!empty($update))
        {
         $project_id=$this->input->post('pr_id');
         $this->session->set_flashdata('success', 'Note updated successfully..');
         redirect('Project/ProjectController/viewprojectdata/'.$project_id);
       }

     }

     public function deleteprojectfile($id,$pr_id)
     {

       $this->Project->deleteprojectfile($id);
       $this->session->set_flashdata('Delete', 'Project File deleted successfully..');
       redirect('Project/ProjectController/viewprojectdata/'.$pr_id);


     }


     public function frmProjectInvoice($pr_id){

      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $data["Project"] = $this->Project->getDataById($pr_id);
      $data['getadmin']=function($idd){
        return $this->User_model->getDataById($idd);
      };
      $data['All_agent']=$this->User_model->get_alluser();
      $data['All_tax']=$this->Project->get_alltax();
      $data['warehouse']=$this->Location->getall_warehouse();
      $data['payment_terms']=$this->Invoice->getall_payment_terms();
       $data['setting']=$this->Invoice->setting();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('Project/projectinvoice');
      $this->load->view('Dashboard/footer.php');
    }

    public function frmaddClient()
    {
     $id= $this->session->userdata('session_id');
     $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
     $data['menu_details']=$this->Menu->getAllMenu();
     $data['admin_role']=$this->Menu->adminrole();
     $data['State']=$this->User_model->getAll_state();
     $this->load->view('Dashboard/header.php',$data);
     $this->load->view('Dashboard/side.php');
     $this->load->view('Project/frmaddClient');
     $this->load->view('Dashboard/footer.php');
   }
   public function addclient()
   {

    $id= $this->session->userdata('session_id');
    $this->load->helper(array('url','form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('cus_name','Client Name','required|min_length[2]|max_length[40]');
    $this->form_validation->set_rules('cus_mobile','Client Number','required|min_length[2]|max_length[40]');
    $this->form_validation->set_rules('cus_email','Email','trim|required|valid_email');
    
    if($this->form_validation->run() == FALSE)
    {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $data['State']=$this->User_model->getAll_state();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('Project/frmaddClient');
      $this->load->view('Dashboard/footer.php');
    }
    else
    {

     $datas['cus_name']=$this->input->post('cus_name');
     $datas['cus_mobile']=$this->input->post('cus_mobile');
     $datas['cus_email']=$this->input->post('cus_email');
     $datas['cus_address']=$this->input->post('cus_address');
     $datas['pin']=$this->input->post('pin');
     $datas['cus_country']=$this->input->post('cus_country');
     $datas['cus_state']=$this->input->post('cus_state');
     $datas['cus_city']=$this->input->post('cus_city');
     $datas['company']=$this->input->post('company');
     $datas['tax_id']=$this->input->post('tax_id');
     
     $datas['same_name']=$this->input->post('same_name');
     $datas['same_mobile']=$this->input->post('same_mobile');
     $datas['same_email']=$this->input->post('same_email');
     $datas['same_address']=$this->input->post('same_address');
     $datas['same_pin']=$this->input->post('same_pin');
     $datas['same_country']=$this->input->post('same_country');
     $datas['same_state']=$this->input->post('same_state');
     $datas['same_city']=$this->input->post('same_city');
     
     
     $datas['add_by']= $this->session->userdata('session_id');
     date_default_timezone_set("Asia/Kolkata");
     $datas['add_at'] = date('Y-m-d H:i:s'); 
     $ip = $_SERVER['REMOTE_ADDR'];
     $datas['add_ip']=$ip;
     $q= $this->Project->addclient($datas);
     if ($q) {

            $data['message'] = 'Client Added';  // For alert message after submit

            redirect('Project/ProjectController/projectlist');


          }

        }

      }

      public function findclientdata()
      {
        $client_name=$_POST['client_name'];
        $data['client']=$this->Project->getclientbyname($client_name);
        if(empty($client_name)){
          $data['client']="";
        }
        
        $this->load->view('Project/Ajax_client_data', $data);

      }
      public function findclientdatabyid(){
       $client_id=$_POST['client_id'];
       $data['client_data']=$this->Project->findclientdatabyid($client_id);
       $this->load->view('Project/ajaxclientdatabyid', $data);
     }

   }