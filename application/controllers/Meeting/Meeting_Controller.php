<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting_Controller extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel'));
        $this->load->model('Menu_model/Menu');
        $this->load->model(array('Admin_model/Role_model',"Admin_model/User_model",'Compaign_model/Compaign_model'));
        $this->load->model(array('Meeting/Meeting_model'));
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
      
  }
  public function manage_meeting()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
    $meeting_date=($this->input->post('meeting_date')) ? $this->input->post('meeting_date') :0;
    $meeting_date=($this->uri->segment(4)) ?  $this->uri->segment(4) :$meeting_date;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Meeting/Meeting_Controller/manage_meeting"."/$meeting_date";
    $config['total_rows'] = $this->Meeting_model->get_count($meeting_date);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["meeting"] = $this->Meeting_model->getAll_Meeting($config['per_page'],$page,$meeting_date);
    $data['allowed_meeting']=$this->Meeting_model->get_allowed_meeting(); 
    $data['findrole']=function($id)
    {
        return $this->Role_model->getDataById($id);
    };
    $data['findcomp']=function($id)
    {
        return $this->Meeting_model->findcompDataById($id);
    };
    if(!empty( $meeting_date)){
        $data['meeting_date']= $meeting_date; }
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('Meeting/Manage_meeting',$data);
        $this->load->view('Dashboard/footer.php');
    }

    public function Add_meeting()
    {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $data['role']=$this->User_model->getAll_role();
        $data['compaign']=$this->Compaign_model->all_Compaign();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('Meeting/Add_meeting',$data); 
        $this->load->view('Dashboard/footer.php');
    }

    public function addTbl_meeting()
    {

        $this->load->helper(array('url','form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_id[]','Role','trim|required');
        $this->form_validation->set_rules('camp_id[]', 'Compaign', 'trim|required');
        $this->form_validation->set_rules('meeting_title', 'Meeting Title', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
           $this->Add_meeting();
       }
       else
       {
        $datarray=$this->input->post('role_id');
        $data['role_id']=implode(',',$datarray); 
        $datarray=$this->input->post('camp_id');
        $data['camp_id']=implode(',',$datarray); 
        $data['meeting_date'] = $this->input->post('meeting_date');
        $data['meeting_time'] = $this->input->post('meeting_time');
        $data['meeting_title'] = $this->input->post('meeting_title');

        $insert=$this->Meeting_model->insert($data);
        $this->session->set_flashdata('success', 'Meeting added Successfully');
        redirect('Meeting/Meeting_Controller/manage_meeting');
    }
}

/*--------------- Code for delete the tble role ------------*/
public function deleteTbl_meeting($meeting_id) {

    $delete = $this->Meeting_model->delete($meeting_id);
    $this->session->set_flashdata('delete', 'Meeting deleted');
    redirect('Meeting/Meeting_Controller/manage_meeting');
}

/*---------- Code for change the status ---------------*/

public function changeStatusTbl_role($id) {
    $edit = $this->Role_model->changeStatus($id);
    $this->session->set_flashdata('success', 'Role '.$edit.' Successfully');
    redirect('Admin/Role_Controller/manage_role');
}

/*------------ Code for Edit the role --------------*/
public function editTbl_meeting($sid)
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['role']=$this->User_model->getAll_role();
    $data['compaign']=$this->Compaign_model->all_Compaign();

    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['meeting'] = $this->Meeting_model->getMeetingById($sid);
    $this->load->view('Meeting/edit_meeting', $data);
    $this->load->view('Dashboard/footer.php');
}

/*---------------------- Code for update the post the role---------------*/

public function editmeetingPost() {
    $meeting_id = $this->input->post('meeting_id');
    $datarray=$this->input->post('role_id');
    $data['role_id']=implode(',',$datarray); 
    $datarray=$this->input->post('camp_id');
    $data['camp_id']=implode(',',$datarray); 
    $data['meeting_date'] = $this->input->post('meeting_date');
    $data['meeting_time'] = $this->input->post('meeting_time');
    $data['meeting_title'] = $this->input->post('meeting_title');

    $edit = $this->Meeting_model->update($meeting_id,$data);

    if ($edit) {
        $this->session->set_flashdata('success', 'Meeting Updated');
        redirect('Meeting/Meeting_Controller/manage_meeting');
    }
}


public function meeting_comment(){
   $data['admin_id']=$_POST['admin_id'];
   $meeting_id=$_POST['meeting_id'];
   $data['role_id']=$_POST['role_id'];
   $data['meeting']=$this->Meeting_model->getMeetingById( $meeting_id);
   $this->load->view('User/meeting_comment',$data);
}

public function add_meeting_comment()
{

   $data['user_id'] = $this->input->post('admin_id');
   $data['role_id'] = $this->input->post('role_id');
   $data['meeting_id'] = $this->input->post('meeting_id');
   $data['comment'] = $this->input->post('comment');
   $ip = $_SERVER['REMOTE_ADDR'];
   $data['add_ip'] = $ip;
   $insert=$this->Meeting_model->add_meeting_comment($data);
   $this->session->set_flashdata('success', 'Comment successfully added.');
   redirect('Admin/User_Controller/user_meeting');

}

public function list_meeting_comment($mtid="")
{
   
   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['menu_groups']=$this->Menu->getAllMenuGroup();
   $data['menu_details']=$this->Menu->getAllMenu();
   $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
/* $meeting_date=($this->input->post('meeting_date')) ? $this->input->post('meeting_date') :0;
 $meeting_date=($this->uri->segment(4)) ?  $this->uri->segment(4) :$meeting_date;
 */$this->load->config('bootstrap_pagination');
 $config = $this->config->item('pagination_config');;
 $config['base_url'] = base_url() ."Meeting/Meeting_Controller/list_meeting_comment"."/$mtid";
 $config['total_rows'] = $this->Meeting_model->get_count_comment($mtid);
 $config['per_page'] = 10;
 $config['uri_segment'] = 5;
 $this->pagination->initialize($config);
 $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
 $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
 $data["comment"] = $this->Meeting_model->getAll_Meeting_comment($config['per_page'],$page,$mtid);
 $data['allowed_meeting']=$this->Meeting_model->get_allowed_meeting(); 
 $data['findrole']=function($id)
 {
    return $this->Role_model->getDataById($id);
};
$data['finduser']=function($id)
{
    return $this->User_model->getDataById($id);
};
$data['findcomment']=function($id)
{
    return $this->Meeting_model->getMeetingById($id);
};
if(!empty( $meeting_date)){
    $data['meeting_date']= $meeting_date; }
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Meeting/list_meeting_comment',$data);
    $this->load->view('Dashboard/footer.php');


}




}