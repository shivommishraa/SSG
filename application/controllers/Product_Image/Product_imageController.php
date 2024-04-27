<?php


class Product_imageController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Productimage_model/product_image');
    $this->load->model('Product_model/tbl_product');
    $this->load->model('Menu_model/Menu');
    $this->load->model('Admin_model/Role_model');
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->model('Admin_model/Adminmodel');
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
  }
  
  public function manageProduct_image() { 

   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['menu_groups']=$this->Menu->getAllMenuGroup();
   $data['menu_details']=$this->Menu->getAllMenu();
   $data['admin_role']=$this->Menu->adminrole();
        //============================ Start Pager Code ==============================
   $name=($this->input->post('product_id')) ? $this->input->post('product_id') :0;
   $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
   $this->load->config('bootstrap_pagination');
   $config = $this->config->item('pagination_config');;
   $config['base_url'] = base_url() ."Product_Image/Product_imageController/ManageProduct_image"."/$name";
   $config['total_rows'] = $this->product_image->get_count($name);
   $config['per_page'] = 10;
   $config['uri_segment'] = 5;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
   $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
   $data["product_images"] = $this->product_image->getAllbrand($config['per_page'],$page,$name);         
   $this->load->view('Dashboard/header.php',$data);
   $this->load->view('Dashboard/side.php');
   $data["productdropdown"] = $this->tbl_product->getAll();
   $data['getproductname']=function($id){
    return $this->tbl_product->getDataById($id);};
    $this->load->view('product_image/manage-product_image', $data);
    $this->load->view('Dashboard/footer.php');
  }

  public function addProduct_image() {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data["productdropdown"]=$this->tbl_product->getAll();
    $this->load->view('product_image/add-product_image',$data);
    $this->load->view('Dashboard/footer.php');
  }

  public function addProduct_imagePost() {
    $data['product_id'] = $this->input->post('product_id');
    if ($_FILES['product_image']['name']) { 
      $data['product_image'] = $this->doUpload('product_image');
    } 
    $this->product_image->insert($data);
    $this->session->set_flashdata('success', 'Product Image added Successfully');
    redirect('Product_Image/Product_imageController/ManageProduct_image');
  }

  public function editProduct_image($product_image_id) {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $data['product_image_id'] = $product_image_id;
    $data['product_image'] = $this->product_image->getDataById($product_image_id);
    $data["productdropdown"]=$this->tbl_product->getAll();
    $this->load->view('product_image/edit-product_image', $data);
    $this->load->view('Dashboard/footer.php');
  }

  public function editProduct_imagePost() {
    $product_image_id = $this->input->post('product_image_id');
    $product_image = $this->product_image->getDataById($product_image_id);
    $data['product_id'] = $this->input->post('product_id');
    if ($_FILES['product_image']['name']) { 
      $data['product_image'] = $this->doUpload('product_image');
      unlink('./uploads/product_image/'.$product_image[0]->product_image);
    } 
    $edit = $this->product_image->update($product_image_id,$data);
    if ($edit) {
      $this->session->set_flashdata('success', 'Product Image Updated');
      redirect('Product_Image/Product_imageController/ManageProduct_image');
    }
  }

  public function viewProduct_image($product_image_id) {
    $data['product_image_id'] = $product_image_id;
    $data['product_image'] = $this->product_image->getDataById($product_image_id);
    $data['getproductname']=function($id){
     return $this->tbl_product->getDataById($id);};
     $this->load->view('product_image/view-product_image', $data);
   }
   
   public function deleteProduct_image($product_image_id) {
    $delete = $this->product_image->delete($product_image_id);
    $this->session->set_flashdata('success', 'Product Image deleted successfully');
    redirect('Product_Image/Product_imageController/ManageProduct_image');
  }

  public function changeStatusProduct_image($product_image_id) {
    $edit = $this->product_image->changeStatus($product_image_id);
    $this->session->set_flashdata('success', 'Product Image '.$edit.' Successfully');
    redirect('Product_Image/Product_imageController/ManageProduct_image');
  }

  function doUpload($file) {
        //$config['upload_path'] = '../Nice_image/product_image';
    $config['upload_path'] = './uploads/product_image';
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