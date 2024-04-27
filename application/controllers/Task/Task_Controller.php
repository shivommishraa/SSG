<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_Controller extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel','Admin_model/User_model'));
        $this->load->model(array('Admin_model/Role_model','Task/Task_model','Project/Project'));
        $this->load->model('Menu_model/Menu');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
      
  }

  /*===========================Start code for assigned_task listing ===========================*/

  public function assigned_task()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    //============================ Start Pager Code ==============================
    /*$name=($this->input->post('name')) ? $this->input->post('name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;*/
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Task/Task_Controller/assigned_task";
    $config['total_rows'] = $this->Task_model->get_count($id);
    $config['per_page'] = 10;
    $config['uri_segment'] = 4;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
    //============================ End Pager Code ==============================
    $data["assigned_task"] = $this->Task_model->getAll_assigned_task($config['per_page'],$page,$id);
    $data["findadd_by"]=function($id){
        return $this->User_model->getDataById($id);  };
        $data["task_status"]=function($id){
            return $this->Task_model->task_status($id);};
            $data['find_project']=function($id){
                return $this->Task_model->find_project($id);};
                $this->load->view('Dashboard/header.php',$data);
                $this->load->view('Dashboard/side.php');
                $this->load->view('Task/Task_assigned',$data);
                $this->load->view('Dashboard/footer.php');
            }

            /*===========================End code for assigned_task listing ===========================*/


            /*===========================Start code for assigned_task status ===========================*/

            public function task_status()
            {
                $data['task_id']=$_POST['task_id'];
                $data['pr_id']=$_POST['pr_id'];
                $data['task_data']=$this->Task_model->get_task_byid($data['task_id']);
                $data['Task_status']=$this->Task_model->getall_task_status();
                $data['Project']=$this->Task_model->find_project($data['pr_id']);
                $this->load->view('Task/Task_status',$data);

            }
            public function task_statusforview(){
               $data['task_id']=$_POST['task_id'];
               $data['pr_id']=$_POST['pr_id'];
               $data['task_data']=$this->Task_model->get_task_byid($data['task_id']);
               $data['Task_status']=$this->Task_model->getall_task_status();
               $data['Project']=$this->Task_model->find_project($data['pr_id']);
               $this->load->view('Project/Task_statusforview',$data);
           }

           /*================= Start Code for update task Status ==========================*/

           public function Update_task_status()
           {
            $task_id = $this->input->post('task_id');
            $data['task_status'] = $this->input->post('task_status_id');
            $data['remark'] = $this->input->post('remark');
            $q=$this->Task_model->Update_task_status($task_id,$data);
            if(!empty($q)){
                $data['task_id'] = $task_id;
                $data['project_id']= $this->input->post('project_id');
                $data['task_name'] = $this->input->post('task_name');
                $data['member_id'] = $this->input->post('member_id');
                $data['member_role'] = $this->input->post('member_role');
                $data['desciption'] = $this->input->post('desciption');
                $data['add_by']= $this->session->userdata('session_id');
                $ip = $_SERVER['REMOTE_ADDR'];
                $data['add_ip']=$ip;
                $this->Project->insert_task_histry($data);

            }
            $this->session->set_flashdata('success', 'Status Updated Successfully');
            
            redirect('Task/Task_Controller/assigned_task');
        }

        /*===============End code for assigned_task Status =====================*/
        public function Update_task_statusforview()
        {
            $task_id = $this->input->post('task_id');
            $data['task_status'] = $this->input->post('task_status_id');
            $data['remark'] = $this->input->post('remark');
            $q=$this->Task_model->Update_task_status($task_id,$data);
            if(!empty($q)){
                $data['task_id'] = $task_id;
                $data['project_id']= $this->input->post('project_id');
                $data['task_name'] = $this->input->post('task_name');
                $data['member_id'] = $this->input->post('member_id');
                $data['member_role'] = $this->input->post('member_role');
                $data['desciption'] = $this->input->post('desciption');
                $data['add_by']= $this->session->userdata('session_id');
                $ip = $_SERVER['REMOTE_ADDR'];
                $data['add_ip']=$ip;
                $this->Project->insert_task_histry($data);

            }
            $this->session->set_flashdata('success', 'Status Updated Successfully');
            
            redirect('Project/ProjectController/viewprojectdata/'.$data['project_id']);
        } 
        /*================== Start Code for show Milestone status view =======================*/
        public function mile_statusforview(){
           $data['mile_id']=$_POST['mile_id'];
           $data['pr_id']=$_POST['pr_id'];
           $data['mile_data']=$this->Task_model->get_mail_byid($data['mile_id']);
           $data['Task_status']=$this->Task_model->getall_task_status();
           $data['Project']=$this->Task_model->find_project($data['pr_id']);
           $this->load->view('Project/Mile_statusforview',$data);
       }

       /*==================Start code for assigned_milestone Status ==================*/
       public function Update_mile_statusforview()
       {
        $mile_id = $this->input->post('mile_id');
        $data['mile_status'] = $this->input->post('task_status_id');
        $data['remark'] = $this->input->post('remark');
        $data['complete'] = $this->input->post('complete');
        $q=$this->Task_model->Update_mile_status($mile_id,$data);
        if(!empty($q)){
            $data['mile_id'] = $mile_id;
            $data['project_id']= $this->input->post('project_id');
            $data['mile_name'] = $this->input->post('mile_name');
            $data['member_id'] = $this->input->post('member_id');
            $data['member_role'] = $this->input->post('member_role');
            $data['desciption'] = $this->input->post('desciption');
            $data['complete'] = $this->input->post('complete');
            $data['add_by']= $this->session->userdata('session_id');
            $ip = $_SERVER['REMOTE_ADDR'];
            $data['add_ip']=$ip;
            $this->Project->insert_mile_histry($data);

        }
        $this->session->set_flashdata('success', 'Milestone Status Updated Successfully');
        
        redirect('Project/ProjectController/viewprojectdata/'.$data['project_id']);
    } 




}