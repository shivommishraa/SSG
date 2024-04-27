<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {
  
 
	public function __construct() {
    parent::__construct();
    $this->load->model(array('Admin_model/Adminmodel'));
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    $this->load->database();
    
    
  }
  
  
  public function login()
  {
    if($this->session->userdata('session_id')!='')
    {
      redirect('Dashboard');
    }
    else
    {
      $this->load->view('Dashboard/login.php');
    }
    
  }
  
  
  function login_valid()  
  {  
   $this->load->library('form_validation');  
   $this->form_validation->set_rules('email_id', 'email_id', 'required');  
   $this->form_validation->set_rules('password', 'Password', 'required');  
   if($this->form_validation->run())  
   {  
    
    $result=$this->Adminmodel->validate();
    if($result)
    {
      $mdate=$this->session->set_userdata('admin','1'); 
      redirect('Dashboard');    
    }
    else
    {
      $this->session->set_flashdata('success', 'Invalid Email Id Or Password'); 
      
      redirect('login');
    }
    
    
    
  }  
  else  
  {  
    
    
    $this->login();  
  }  
}  


function logout()
{

  $array_items = array('password', 'email_id','session_id');

  $this->session->unset_userdata($array_items);
  
  $this->session->sess_destroy();

  redirect('login');
}
//  redirect('Admin/Role_Controller/error_page');
}


/*https://stackoverflow.com/questions/6159186/how-do-i-write-text-over-a-picture-in-android-and-save-it*/