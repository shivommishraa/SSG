<?php


class Tbl_pagesController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pages_model/tbl_pages');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('Admin_model/Adminmodel');
        $this->load->model('Menu_model/Menu');
        $this->load->model('Admin_model/Role_model');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
  }
    /*
    function for manage Tbl_pages.
    return all Tbl_pagess.
    created by your name
    created at 02-09-20.
    */
    public function manageTbl_pages() {
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
        $config['base_url'] = base_url() ."Pages/Tbl_pagesController/manageTbl_pages"."/$name";
        $config['total_rows'] = $this->tbl_pages->get_count($name);
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data["tbl_pagess"] = $this->tbl_pages->getAll($config['per_page'],$page,$name);
        $this->load->view('tbl_pages/manage-tbl_pages', $data);
        $this->load->view('Dashboard/footer.php');
    }
    /*
    function for  add Tbl_pages get
    created by your name
    created at 02-09-20.
    */
    public function addTbl_pages() {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('tbl_pages/add-tbl_pages');
        $this->load->view('Dashboard/footer.php');
    }
    /*
    function for add Tbl_pages post
    created by your name
    created at 02-09-20.
    */
    public function addTbl_pagesPost() {
        $data['route'] = $this->input->post('route');
        $data['content'] = $this->input->post('content');
        $this->tbl_pages->insert($data);
        $this->session->set_flashdata('success', 'Page added Successfully');
        redirect('Pages/Tbl_pagesController/manageTbl_pages');
    }
    /*
    function for edit Tbl_pages get
    returns  Tbl_pages by id.
    created by your name
    created at 02-09-20.
    */
    public function editTbl_pages($tbl_pages_id) {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data['tbl_pages_id'] = $tbl_pages_id;
        $data['tbl_pages'] = $this->tbl_pages->getDataById($tbl_pages_id);
        $this->load->view('tbl_pages/edit-tbl_pages', $data);
        $this->load->view('Dashboard/footer.php');

    }
    /*
    function for edit Tbl_pages post
    created by your name
    created at 02-09-20.
    */
    public function editTbl_pagesPost() {
        $tbl_pages_id = $this->input->post('tbl_pages_id');
        $tbl_pages = $this->tbl_pages->getDataById($tbl_pages_id);
        $data['route'] = $this->input->post('route');
        $data['content'] = $this->input->post('content');
        $edit = $this->tbl_pages->update($tbl_pages_id,$data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Page Updated');
            redirect('Pages/Tbl_pagesController/manageTbl_pages');
        }
    }
    /*
    function for view Tbl_pages get
    created by your name
    created at 02-09-20.
    */
    public function viewTbl_pages($tbl_pages_id) {
        $data['tbl_pages_id'] = $tbl_pages_id;
        $data['tbl_pages'] = $this->tbl_pages->getDataById($tbl_pages_id);
        $this->load->view('tbl_pages/view-tbl_pages', $data);
    }
    /*
    function for delete Tbl_pages    created by your name
    created at 02-09-20.
    */
    public function deleteTbl_pages($tbl_pages_id) {
        $delete = $this->tbl_pages->delete($tbl_pages_id);
        $this->session->set_flashdata('success', 'Page deleted');
        redirect('Pages/Tbl_pagesController/manageTbl_pages');
    }
    /*
    function for activation and deactivation of Tbl_pages.
    created by your name
    created at 02-09-20.
    */
    public function changeStatusTbl_pages($tbl_pages_id) {
        $edit = $this->tbl_pages->changeStatus($tbl_pages_id);
        $this->session->set_flashdata('success', 'Page Status '.$edit.' Successfully');
        redirect('Pages/Tbl_pagesController/manageTbl_pages');
    }

    public function pagesdata()
    {

        $id  = $_POST['page_id'];
        $data['tbl_pages'] = $this->tbl_pages->getDataById($id);
        $this->load->view('tbl_pages/view-pages_popup',$data);
    }
    
}