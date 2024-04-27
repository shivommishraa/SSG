  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class User_Controller extends CI_Controller {
    
   
   public function __construct() {
    parent::__construct();
    $this->load->model(array('Admin_model/Adminmodel'));
    $this->load->model('Menu_model/Menu');
    $this->load->model(array('Admin_model/Role_model','Department/Department_model'));
    $this->load->model(array('Admin_model/User_model','Compaign_model/Compaign_model','Meeting/Meeting_model'));
    $this->load->library("pagination");
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
    
    
  }
  public function manage_user()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    
      //============================ Start Pager Code ==============================
    $name=($this->input->post('name')) ? $this->input->post('name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Admin/User_Controller/manage_user"."/$name";
    $config['total_rows'] = $this->User_model->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["user"] = $this->User_model->getAll_user($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('User/manage_user',$data);
    $this->load->view('Dashboard/footer.php');
  }
  
  public function managecontactus()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    
      //============================ Start Pager Code ==============================
    $name=($this->input->post('name')) ? $this->input->post('name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Admin/User_Controller/managecontactus"."/$name";
    $config['total_rows'] = $this->User_model->get_count_contactus($name);
    $config['per_page'] = 20;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
    if(!empty($name))
    {
      $data["selectdate"]=$name;
    }
          //============================ End Pager Code ==============================
    $data["contactus"] = $this->User_model->getAll_contactusquery($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('User/contactus',$data);
    $this->load->view('Dashboard/footer.php');
  }
  public function add_user()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data["role"] = $this->User_model->getAll_role();
    $data['department']=$this->Department_model->all_active_dept();
    $data['State']=$this->User_model->getAll_state();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('User/add_user',$data); 
    $this->load->view('Dashboard/footer.php');
  }

  public function ImportUserExcel()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data["role"] = $this->User_model->getAll_role();
    $data['department']=$this->Department_model->all_active_dept();
    $data['State']=$this->User_model->getAll_state();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('User/ImportUserExcel',$data); 
    $this->load->view('Dashboard/footer.php');
  }

  public function addTbl_role()
  {
    $data['role_name'] = $this->input->post('role_name');
    $insert=$this->Role_model->insert($data);
    $this->session->set_flashdata('success', 'Role added Successfully');
    redirect('Admin/Role_Controller/manage_role');
  }
  
  /*--------------- Code for delete the tble role ------------*/
  public function deleteTbl_user($id) {
    $delete = $this->User_model->delete($id);
    $this->session->set_flashdata('success', 'User deleted');
    redirect('Admin/User_Controller/manage_user');
  }

  /*--------------- Code for delete the tble role ------------*/
  public function deleteTbl_cus($id) {
    $delete = $this->User_model->deletecontactus($id);
    $this->session->set_flashdata('success', 'Contact Us deleted');
    redirect('Admin/User_Controller/managecontactus');
  }

  /*---------- Code for change the status ---------------*/

  public function changeStatusTbl_user($id) {
    $edit = $this->User_model->changeStatus($id);
    $this->session->set_flashdata('success', 'User '.$edit.' Successfully');
    redirect('Admin/User_Controller/manage_user');
  }

  /*------------ Code for Edit the role --------------*/
  public function editTbl_role($id)
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['State']=$this->User_model->getAll_state();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['role'] = $this->Role_model->getDataById($id);
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
      redirect('Admin/User_Controller/manage_user');
    }
  }


  public function submit_user()
  {
    $this->load->helper(array('url','form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name','User Name','required');
    $this->form_validation->set_rules('email_id','Email','trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
    $this->form_validation->set_rules('mobile','Mobile','trim|required');
    $this->form_validation->set_rules('role_id','Role','trim|required');
    $this->form_validation->set_rules('sex','Gender','trim|required');
    $this->form_validation->set_rules('qualification','Qualification','trim|required');
    $this->form_validation->set_rules('experience','Experience','trim|required');
    
    
    if($this->form_validation->run() == FALSE)
    {
     $id= $this->session->userdata('session_id');
     $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
     $data['menu_details']=$this->Menu->getAllMenu();
     $data['admin_role']=$this->Menu->adminrole();
     $data["role"] = $this->User_model->getAll_role();
     $data['department']=$this->Department_model->all_active_dept();
     $this->load->view('Dashboard/header.php',$data);
     $this->load->view('Dashboard/side.php');
     $this->load->view('User/add_user',$data); 
     $this->load->view('Dashboard/footer.php');
   }
   else
   {
    
    $data['name'] = $this->input->post('name');
    $data['email_id'] = $this->input->post('email_id');
    $data['password'] = $this->input->post('password');
    $data['role_id'] = $this->input->post('role_id');
    $data['dept_id'] = $this->input->post('dept_id');
    $data['mobile'] = $this->input->post('mobile');
    $data['dob']=$this->input->post('dob');
    $data['guardian_name']=$this->input->post('guardian_name');
    $data['address']=$this->input->post('address');
    $data['state']=$this->input->post('state');
    $data['country']=$this->input->post('country');
    $data['city']=$this->input->post('city');
    $data['nationality']=$this->input->post('nationality');
    $data['blood_gr']=$this->input->post('blood_gr');
    $data['sex']=$this->input->post('sex');
    $data['qualification'] = $this->input->post('qualification');
    $data['experience'] = $this->input->post('experience');
    $data['user_image'] = $this->input->post('user_image');
    if ($_FILES['user_image']['name']) { 
      $data['user_image'] = $this->doUpload('user_image');
    }
    
    $this->User_model->userinsert($data);
    $this->session->set_flashdata('success', 'User Added Successfully');
         //$this->session->set_flashdata('messSuccess',array('User Added Successfully'));
    
    redirect('Admin/User_Controller/manage_user');

  }
}

function doUpload($file) {
        //$config['upload_path'] = '../Nice_image/product_image';
  $config['upload_path'] = './uploads/user_image';
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


public function View_User()
{
  $userid=$_POST['admin_id'];
  $data['user'] = $this->User_model->getDataById($userid);
  $data['getdepartment']=function($eid){
    return $this->Department_model->getDataById($eid);};
    $data['getrole']=function($eid){
      return $this->User_model->getRoleById($eid);};
      $this->load->view('User/view_user_popup',$data);
    }

    public function editTbl_user($id)
    {

      $data['user'] = $this->User_model->getDataById($id);
      $data['getrole']=function($eid){
        return $this->User_model->getRoleById($eid);};
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $data['department']=$this->Department_model->all_active_dept();
        $data["role"] = $this->User_model->getAll_role();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('User/edit_user',$data);
        $this->load->view('Dashboard/footer.php');

      }

      public function update_user()
      {
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','User Name','required');
        $this->form_validation->set_rules('email_id','Email','trim|required|valid_email');
        $this->form_validation->set_rules('mobile','Mobile','trim|required');
        $this->form_validation->set_rules('role_id','Role','trim|required');
        $this->form_validation->set_rules('sex','Gender','trim|required');
        $this->form_validation->set_rules('qualification','Qualification','trim|required');
        $this->form_validation->set_rules('experience','Experience','trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
          $datas = $this->input->post('admin_id');
          
          redirect ("Admin/User_Controller/editTbl_user/$datas ");
        }
        else
        {
          $adminid=$this->input->post('admin_id');
          $data['name'] = $this->input->post('name');
          $data['email_id'] = $this->input->post('email_id');
          $data['role_id'] = $this->input->post('role_id');
          $data['dept_id'] = $this->input->post('dept_id');
          $data['mobile'] = $this->input->post('mobile');
          $data['dob']=$this->input->post('dob');
          $data['guardian_name']=$this->input->post('guardian_name');
          $data['address']=$this->input->post('address');
          $data['state']=$this->input->post('state');
          $data['country']=$this->input->post('country');
          $data['city']=$this->input->post('city');
          $data['nationality']=$this->input->post('nationality');
          $data['blood_gr']=$this->input->post('blood_gr');
          $data['sex']=$this->input->post('sex');
          $data['qualification'] = $this->input->post('qualification');
          $data['experience'] = $this->input->post('experience');
          $img = $this->User_model->getDataById($adminid);
          if ($_FILES['user_image']['name']) { 
            $data['user_image'] = $this->doUpload('user_image');
            unlink('./uploads/user_image/'.$img[0]->user_image);
          }
          $this->User_model->update($adminid,$data);
          $this->session->set_flashdata('success', 'Admin  updated Successfully');
          redirect('Admin/User_Controller/manage_user');
        }
      }


      /*-------------Start code for change password------------------------*/
      public function change_password()
      {
       $admin_id=$_POST['admin_id'];
       $data['user'] = $this->User_model->getDataById($admin_id);
       $this->load->view('User/change_password_popup',$data);

     }

     public function user_changepassword()
     {
      
      $this->load->helper(array('url','form'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('Eemail_id','user details','trim|required|valid_email');
      $this->form_validation->set_rules('email_id', 'User Id', 'required|matches[Eemail_id]');
      $this->form_validation->set_rules('old_password', 'Old Password', 'required');
      $this->form_validation->set_rules('new_password', 'New Password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
      
      if($this->form_validation->run())
      {
        $adminid=$this->input->post('admin_id');
        $data['password'] = $this->input->post('new_password');
        $this->User_model->update($adminid,$data);
        $array = array(
          'success' => '<div class="alert alert-success">Password updated Successfully.</div>'
        );
      }
      else
      {
       $array = array(
        'error'   => true,
        'email_id' => form_error('email_id'),
        'old_password' => form_error('old_password'),
        'new_password' => form_error('new_password'),
        'confirm_password' => form_error('confirm_password')
      );
     }
     echo json_encode($array);
     
   }


   /*-------------Start code for Assign Process Popup------------------------*/
   public function admincompaign()
   {
    $userid=$_POST['admin_id'];
    $data['user'] = $this->User_model->getDataById($userid);
    $data['history_data'] = $this->User_model->process_history_data($userid);
    $data['compaign'] = $this->Compaign_model->all_Compaign();
    $data['process_name']=function($pid)
    {
      return $this->Compaign_model->getDataById($pid);
    };
    $data['emp_name']=function($eid)
    {
      return $this->User_model->getDataById($eid);
    };
    $this->load->view('User/user_compaign_popup',$data);
  }


  /*-------------Start code for add process------------------------*/
  public function user_assignCompaign()
  {
    $this->load->helper(array('url','form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('compaign_id', 'Compaign', 'required');
    if($this->form_validation->run())
    {
     $data['compaign_id'] = $this->input->post('compaign_id');
     $adminid=$this->input->post('admin_id');
     $check=$this->User_model->check_alreadyprocess($adminid,$data['compaign_id']);
     if(empty($check))
     {
      $adminid=$this->input->post('admin_id');
      $this->User_model->update($adminid,$data);
      $ip = $_SERVER['REMOTE_ADDR'];
      $aid= $this->session->userdata('session_id');
      $data['mod_ip'] = $ip;
      $data['mod_by'] = $aid;
      $data['emp_id'] = $adminid;
      $this->User_model->add_processhistory($data);
      $this->User_model->add_process_auditlog($data);
      $array = array(
        'success' => '<div class="alert alert-success">Compaign Assign Successfully.</div>',
        'aid'=>$adminid
      );
    }
    else{
      $array = array(
        'already' => '<div class="alert alert-success">Sorry!!..this process is assign already.</div>',
        'aid'=>$adminid
      );
    }
    
  }
  else
  {
   $array = array(
    'error'   => true,
    'compaign_id' => form_error('compaign_id'),
    
  );
 }
 echo json_encode($array);

}


/*-------------Start code for process delete ------------------------*/
public function assignCompaigndelete()
{
  $pid=$this->input->get_post('pid');
  $delete=$this->User_model->assignprocessdelete($pid);
  if($delete)
    {$array = array(
      'success' => '<div class="alert alert-success">Process Deleted Successfully.</div>'
    );
}
else
{
 $array = array(
   'unsuccess' => '<div class="alert alert-success">Process not deleted. Error found. .</div>'
 );
}
echo json_encode($array);
}




/*-------------Start code for Add Team Popup------------------------*/
public function addteam()
{

  $userid=$_POST['admin_id'];
  $data['roleid']=$_POST['role_id'];
  $data['drop_team'] = $this->User_model->getRoleById($data['roleid']);
  $data['user'] = $this->User_model->getDataById($userid);
  $data['alluser'] = $this->User_model->get_alluser();
  $this->load->view('User/Addteam_popup',$data);
  
}


public function addteammember()
{
  $admin_id = $this->input->post('admin_id');
  $data['team_member_id'] = $this->input->post('team_member_id');
  $update=$this->User_model->update($admin_id,$data);
  if($update){

    $dataa['emp_id'] = $this->input->post('admin_id');
    $dataa['old_team_member_id'] = $this->input->post('old_team_member_id');
    $dataa['upd_team_member_id'] = $this->input->post('team_member_id');
    $dataa['add_by'] = $this->session->userdata('session_id');
    $dataa['add_ip'] =  $_SERVER['REMOTE_ADDR'];
    $this->User_model->insert_add_team_history($dataa);
  }
  $this->session->set_flashdata('success', 'Team member Added Successfully');
  redirect('Admin/User_Controller/manage_user');
}

public function user_meeting(){
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
  $config['base_url'] = base_url() ."Meeting/Meeting_Controller/user_meeting"."/$meeting_date";
  $config['total_rows'] = $this->Meeting_model->get_count($meeting_date);
  $config['per_page'] = 10;
  $config['uri_segment'] = 5;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
  $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
  $data["meeting"] = $this->Meeting_model->getAll_Meeting($config['per_page'],$page,$meeting_date);
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
    $this->load->view('User/User_meeting',$data);
    $this->load->view('Dashboard/footer.php');
    
  }



  public function import_user_details(){
   
    $path = 'uploads/importexcelsfiles/';
    require_once APPPATH . "/third_party/PHPExcel_FILE/Classes/PHPExcel.php";
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'xlsx|xls';
    $config['remove_spaces'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);            
    if (!$this->upload->do_upload('uploadFile')) {
      $error = array('error' => $this->upload->display_errors());
      PRINT_R($error);
    } else {
      $data = array('upload_data' => $this->upload->data());
    }
    if(empty($error)){
      if (!empty($data['upload_data']['file_name'])) {
        $import_xls_file = $data['upload_data']['file_name'];
      } else {
        $import_xls_file = 0;
      }
      $inputFileName = $path . $import_xls_file;
      
      try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $flag = true;
        $i=0;
        $m=1; $inserdata=array();$updatedata=array();
        foreach ($allDataInSheet as $key => $value) {
          $datam   =   $this->Adminmodel->get_emp_last_row();
          
          if($flag){
            $flag =false;
            continue;
          }
          $email = $this->Adminmodel->get_data_email($value['F']);
          $role=$this->Adminmodel->emp_role_id(ucwords($value['C']));
          $dsgn=$this->Adminmodel->emp_dsgn_id(ucwords($value['D']));
          $dept=$this->Adminmodel->emp_dept_id(ucwords($value['E']));
          if(!empty($dsgn)){ $designation=$dsgn['dsgn_id'];}else $designation='18';
          if(!empty($dept)){ $depatment=$dept['dept_id'];}else $depatment='3';
          if(!empty($role)) $roles=$role['role_id'];else $roles='5';
          if(!empty($value['L'])){
            $joining_date=date('Y-m-d',strtotime($value['L']));}else $joining_date='0000-00-00';
            if($email < 1) {
              $inserdata[$i]['name']     = $value['A'];
              $inserdata[$i]['sex']      = $value['B'];
              $inserdata[$i]['role_id']  = $roles;
              $inserdata[$i]['dept_id']  = $depatment;
              $inserdata[$i]['dsgn_id']  = $designation;
              $inserdata[$i]['email_id'] = $value['F'];
              $inserdata[$i]['mobile']   = $value['G'];
              $inserdata[$i]['password'] = $value['G'];
              $inserdata[$i]['dob']      = $value['H'];
              $inserdata[$i]['nationality']     = $value['I'];
              $inserdata[$i]['qualification']   = $value['J'];
              $inserdata[$i]['address']         = $value['K'];
              $inserdata[$i]['joing_date']      = $joining_date;
              $i++;
              $m++; 
            } if($email){
              $updatedata[$i]['name']     = $value['A'];
              $updatedata[$i]['sex']      = $value['B'];
              $updatedata[$i]['role_id']  = $roles;
              $updatedata[$i]['dept_id']  = $depatment;
              $updatedata[$i]['dsgn_id']  = $designation;
              $updatedata[$i]['email_id'] = $value['F'];
              $updatedata[$i]['mobile']   = $value['G'];
              $updatedata[$i]['password'] = $value['G'];
              $updatedata[$i]['dob']      = $value['H'];
              $updatedata[$i]['nationality'] =$value['I'];
              $updatedata[$i]['qualification']  = $value['J'];
              $updatedata[$i]['address']      = $value['K'];
              $updatedata[$i]['joing_date']   = $joining_date;
              
              $i++;
              $m++;  
            }}
            if(count($updatedata)>0){
             $this->Adminmodel->update_excel_emp($updatedata);
           }
           if(count($inserdata)>0){
            
            $result = $this->Adminmodel->import_excel_data($inserdata);   
            
            if($result){
              $this->session->set_flashdata('success', 'Excel Successfully Imported');
              redirect('Admin/User_Controller/manage_user');
              
            }else{
              echo "ERROR !";
            }     
          }else{
           $this->session->set_flashdata('success', 'Excel Successfully Updated');
           redirect('Admin/User_Controller/manage_user');
         }
         

       } catch (Exception $e) {
         die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
          . '": ' .$e->getMessage());
       }
     }else{
      echo $error['error'];
    } 
  }


}