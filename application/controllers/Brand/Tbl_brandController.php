<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_brandController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Brand_model/tbl_brand');
         $this->load->model('Admin_model/Role_model');
         $this->load->model('Menu_model/Menu');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('Admin_model/Adminmodel');
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
  }
    /*
    function for manage Tbl_brand.
    return all Tbl_brands.
    created by your name
    created at 18-08-20.
    */
    public function index()
    {
     $data["tbl_brands"] = $this->tbl_brand->getAll();
     $this->load->view('tbl_brand/manage-tbl_brand', $data);
 }

 public function manageTbl_brand() { 
     
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
   $config['base_url'] = base_url() ."Brand/Tbl_brandController/manageTbl_brand"."/$name";
   $config['total_rows'] = $this->tbl_brand->get_count($name);
   $config['per_page'] = 20;
   $config['uri_segment'] = 5;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
   $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
   $data["tbl_brands"] = $this->tbl_brand->getAllbrand($config['per_page'],$page,$name);         

   $this->load->view('Dashboard/header.php',$data);
   $this->load->view('Dashboard/side.php');
   $this->load->view('tbl_brand/manage-tbl_brand', $data);
   $this->load->view('Dashboard/footer.php');

}
    /*
    function for  add Tbl_brand get
    created by your name
    created at 18-08-20.
    */
    public function addTbl_brand() {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
         $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('tbl_brand/add-tbl_brand');
        $this->load->view('Dashboard/footer.php');

    }
    /*
    function for add Tbl_brand post
    created by your name
    created at 18-08-20.
    */
    public function addTbl_brandPost() {
        
        $data['brand_name'] = $this->input->post('brand_name');
        if ($_FILES['brand_image']['name']) { 
            $data['brand_image'] = $this->doUpload('brand_image');
        } 
        $this->tbl_brand->insert($data);
        $this->session->set_flashdata('success', 'Brand added Successfully');
        
        //redirect('manage-tbl_brand');
        redirect('Brand/Tbl_brandController/ManageTbl_brand');
    }
    /*
    function for edit Tbl_brand get
    returns  Tbl_brand by brand_id.
    created by your name
    created at 18-08-20.
    */
    public function editTbl_brand($tbl_brand_brand_id) {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
         $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data['tbl_brand_brand_id'] = $tbl_brand_brand_id;
        $data['tbl_brand'] = $this->tbl_brand->getDataBybrand_id($tbl_brand_brand_id);
        $this->load->view('tbl_brand/edit-tbl_brand', $data);
        $this->load->view('Dashboard/footer.php');
    }
    /*
    function for edit Tbl_brand post
    created by your name
    created at 18-08-20.
    */
    public function editTbl_brandPost() {
        $tbl_brand_brand_id = $this->input->post('tbl_brand_brand_id');
        $tbl_brand = $this->tbl_brand->getDataBybrand_id($tbl_brand_brand_id);
        $data['brand_name'] = $this->input->post('brand_name');
        if ($_FILES['brand_image']['name']) { 
            $data['brand_image'] = $this->doUpload('brand_image');
            unlink('./uploads/tbl_brand/'.$tbl_brand[0]->brand_image);
        } 
        $edit = $this->tbl_brand->update($tbl_brand_brand_id,$data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Brand Updated');
            redirect('Brand/Tbl_brandController/ManageTbl_brand');
        }
    }
    /*
    function for view Tbl_brand get
    created by your name
    created at 18-08-20.
    */
    public function viewTbl_brand($tbl_brand_brand_id) {
        $data['tbl_brand_brand_id'] = $tbl_brand_brand_id;
        $data['tbl_brand'] = $this->tbl_brand->getDataBybrand_id($tbl_brand_brand_id);
        $this->load->view('tbl_brand/view-tbl_brand', $data);
    }
    /*
    function for delete Tbl_brand    created by your name
    created at 18-08-20.
    */
    public function deleteTbl_brand($tbl_brand_brand_id) {
        $delete = $this->tbl_brand->delete($tbl_brand_brand_id);
        $this->session->set_flashdata('success', 'Brand deleted');
        redirect('Brand/Tbl_brandController/ManageTbl_brand');
    }
    /*
    function for activation and deactivation of Tbl_brand.
    created by your name
    created at 18-08-20.
    */
    public function changeStatusTbl_brand($tbl_brand_brand_id) {
        $edit = $this->tbl_brand->changeStatus($tbl_brand_brand_id);
        $this->session->set_flashdata('success', 'Brand '.$edit.' Successfully');
        redirect('Brand/Tbl_brandController/ManageTbl_brand');
    }
        /*
    function for upload files
    return uploaded file name.
    created by your name
    created at 18-08-20.
    */
    function doUpload($file) {
        $config['upload_path'] = './uploads/tbl_brand';
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
  
}