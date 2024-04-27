<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuController extends CI_Controller {
    
   
	public function __construct() {
        parent::__construct();
        $this->load->model('Menu');
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        $this->load->database();
        if( ! $this->session->userdata('validated')){//====================
            redirect('login');
        }
    }
    public function index()
    {
       $this->load->view('menulist');
   }
   
   public function managemenu()
   {    
    $this->load->view('topbar');
    $user_email= $this->session->userdata('email');
    $data['admin_name']=$this->Menu->getadmin($user_email);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['child_menu']=$this->Menu->childmenu();
    $this->load->view('menulist',$data);
}


}