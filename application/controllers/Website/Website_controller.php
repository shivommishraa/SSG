<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller {
    
 
  public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel','Warehouse/Warehouse_model'));
        $this->load->model(array('Admin_model/Role_model','Designation/Designation_model'));
        $this->load->model('AdditionInformation/Infomodel');
        $this->load->model('Nice_websitemodel/Nice_webmodel');
        $this->load->model('Menu_model/Menu');
        $this->load->model('Customer/FrontendCustomermodel');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
       
      
       
  }


  public function hostinsert()
  {
    $data['user_name'] = $this->input->post('user_name');
    $data['password'] = $this->input->post('password');
    $today=date("d-m-Y");//check date if error found to login when 01 or 1 issues
    $ip = $_SERVER['REMOTE_ADDR'];
    $data['system_ip'] = $ip;
    if(ucwords($data['user_name'])=='Maa' && ucwords($data['password'])=='Durga' && $today == '08-07-2023'){
      $result=$this->Nice_webmodel->submit_for_hostdata($data);
      if(!empty($result)){
        redirect('Web');
      }
      
    }else{
      $data['errormess']="😔Hosting will be held only 06 July 2023 by someone special.😔";
      $this->load->view('Website/index2',$data);
      //redirect('Web');
    }
  }

  public function index(){ 
    
    $data['page_active']='index_active';
    $loggedincusomterid= $this->session->userdata('customer_session_id');
    if(!empty($loggedincusomterid)){
      $data['loggedinCusomter']=$this->FrontendCustomermodel->getloggedinCustomerData($loggedincusomterid);
      }else{
        $data['loggedinCusomter']="";
      }
    //============================ Start Pager Code ==============================
    $galleryid=($this->input->post('galleryid')) ? $this->input->post('galleryid') :0;
    $galleryid=($this->uri->segment(4)) ?  $this->uri->segment(4) :$galleryid;
    
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Website/Website_controller/index"."/$galleryid";
    $config['total_rows'] = $this->Nice_webmodel->get_count($galleryid);
    $config['per_page'] = 20;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
   
    $data["products"] = $this->Nice_webmodel->getAllProducts($config['per_page'],$page,$galleryid);
    if(!empty($galleryid)){ $data['searchdata']=$galleryid;}
    $data["allbrand"] = $this->Nice_webmodel->getproduct_brand();
    $data['product_image']=function($id){
    return $this->Nice_webmodel->getimage_datails($id);};
    $data['product_brand']=function($id){
    return $this->Nice_webmodel->getproduct_brand($id);};
           
    //$this->load->view('Website/ms_header',$data);
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/bannersection');
    $this->load->view('Ssgwebsite/website/index');
    $this->load->view('Ssgwebsite/website/footer');
 
  }

  public function text_page(){

    $data['page_active']='text_active';
     //============================ Start Pager Code ==============================
    $cate_id=($this->input->post('cate_id')) ? $this->input->post('cate_id') :0;
    $cate_id=($this->uri->segment(4)) ?  $this->uri->segment(4) :$cate_id;
    
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Website/Website_controller/text_page"."/$cate_id";
    $config['total_rows'] = $this->Nice_webmodel->get_countStatus($cate_id);
    $config['per_page'] = 20;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
   
    $data["txtSts_data"] = $this->Nice_webmodel->getAlltextstatus($config['per_page'],$page,$cate_id);
    if(!empty($cate_id)){ $data['searchdata']=$cate_id;}
    $data['category_data']=$this->Nice_webmodel->getTextStausCategory();
    $this->load->view('Website/ms_header',$data);
    $this->load->view('Website/text',$data);
    $this->load->view('Website/ms_footer');

  }

  public function videos_page(){

    $data['page_active']='videos_active';
    $this->load->view('Website/ms_header',$data);
    $this->load->view('Website/videos');
    $this->load->view('Website/ms_footer');

  }

  public function photodetails()
  {
    echo "heloo";
  }



  public function privacypolicy(){
    
    $data['page_active']='privacypolicy';
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Website/ms_header',$data);
    $this->load->view('Website/privacypolicy');
    $this->load->view('Website/ms_footer');

  }


  public function contactus(){
    $loggedincusomterid= $this->session->userdata('customer_session_id');
        if(!empty($loggedincusomterid)){
            $data['loggedinCusomter']=$this->FrontendCustomermodel->getloggedinCustomerData($loggedincusomterid);
        }else{
            $data['loggedinCusomter']="";
        }
    $data['page_active']='contactus';
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/contactus');
    $this->load->view('Ssgwebsite/website/footer');

  }

   public function ordernow(){
    $loggedincusomterid= $this->session->userdata('customer_session_id');
        if(!empty($loggedincusomterid)){
            $data['loggedinCusomter']=$this->FrontendCustomermodel->getloggedinCustomerData($loggedincusomterid);
        }else{
            $data['loggedinCusomter']="";
        }
    $data['page_active']='order';
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/order');
    $this->load->view('Ssgwebsite/website/footer');

  }

   public function aboutus(){
    $loggedincusomterid= $this->session->userdata('customer_session_id');
        if(!empty($loggedincusomterid)){
            $data['loggedinCusomter']=$this->FrontendCustomermodel->getloggedinCustomerData($loggedincusomterid);
        }else{
            $data['loggedinCusomter']="";
        }
    $data['page_active']='aboutus';
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/about');
    $this->load->view('Ssgwebsite/website/footer');

  }


  public function customerlogin(){

    $data['page_active']='login';
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/customer/account/login');
    $this->load->view('Ssgwebsite/website/footer');

  }

  public function registercustomer(){

    $data['email'] = $this->input->post('email');
    $data['name'] = $this->input->post('name');
    $data['password'] = $this->input->post('password'); 
    $data['confirmpassword'] = $this->input->post('confirmpassword'); 
    if((!empty($data['password'])) && (!empty($data['confirmpassword'])) && (!empty($data['email'])) && ($data['password'] == $data['confirmpassword'])){
      $customerData=$this->FrontendCustomermodel->getDataByEmail($data['email']);
      if(empty($customerData)){
        $this->FrontendCustomermodel->InsertData($data);
        $this->session->set_flashdata('success', 'Customer Added Successfully');
        redirect(base_url()); 
      }else{
        $this->session->set_flashdata('error', 'Email already exists. Please try with another email.');
        $this->customerlogin();
      }
    }else{
      $this->session->set_flashdata('error', 'Something went wrong. Please try with another again.');
      $this->customerlogin();
    }
    
  }

  public function logincustomer(){

    $data['email'] = $this->input->post('email');
    $data['password'] = $this->input->post('password'); 
    $this->FrontendCustomermodel->checkdata($data);
    $this->session->set_flashdata('success', 'Customer Added Successfully');
    redirect(base_url());
  }

/*=====================================================*/
 /*public function login()
  {
    if($this->session->userdata('session_id')!='')
    {
      redirect('Dashboard');
    }
    else
    {
      $this->load->view('Dashboard/login.php');
    }
    
  }*/
  
  
  function customer_login_valid()  
  {  
   $this->load->library('form_validation');  
   $this->form_validation->set_rules('email', 'email', 'required');  
   $this->form_validation->set_rules('password', 'Password', 'required');  
   if($this->form_validation->run())  
   {  
    
    $result=$this->FrontendCustomermodel->validateCustomer();
    if($result)
    {
      $customerData=$this->session->set_userdata('fcustomer','1'); 
      redirect(base_url());   
    }
    else
    {
      $this->session->set_flashdata('success', 'Invalid Email Id Or Password'); 
      
      $this->customerlogin();
    }
  }  
  else  
  {  
     $this->customerlogin();
  }  
}  


function customerlogout()
{
  $array_items = array('password', 'customer_email','customer_session_id');

  $this->session->unset_userdata($array_items);
  
  $this->session->sess_destroy();

  $this->session->set_flashdata('success', 'Account Logout Successfully.');

  $this->customerlogin();
}


public function customeraccount(){
  $loggedincusomterid= $this->session->userdata('customer_session_id');
        if(!empty($loggedincusomterid)){
            $data['loggedinCusomter']=$this->FrontendCustomermodel->getloggedinCustomerData($loggedincusomterid);
        }else{
            $data['loggedinCusomter']="";
        }
    $data['page_active']='customeraccount';
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/customer/account/customeraccount');
    $this->load->view('Ssgwebsite/website/footer');
}

/*=====================================================*/
  



  public function savedata()
  {
      
    $data = array(
          'name'          =>     $this->input->post('name'),  
          'mobile'        =>     $this->input->post("mobile"), 
          'email'         =>     $this->input->post("email"), 
          'message'       =>     $this->input->post("message"),
          'system_ip'     =>     $_SERVER['REMOTE_ADDR'],       
      );
    $result=$this->Nice_webmodel->saveData($data);
    if($result){
      echo  1;
    }else{
      echo  0;
    }

  }
   public function saveorder()
  {
      
    $data = array(
          'name'          =>     $this->input->post('name'),  
          'mobile'        =>     $this->input->post("mobile"), 
          'address'         =>     $this->input->post("address"), 
          'products'       =>     $this->input->post("products"),
          'system_ip'     =>     $_SERVER['REMOTE_ADDR'],       
      );
    $result=$this->Nice_webmodel->saveorder($data);
    if($result){
      echo  1;
    }else{
      echo  0;
    }

  }


  public function newoffers(){
    $this->load->view('Ssgwebsite/website/header');
    $this->load->view('Ssgwebsite/website/newoffers');
    $this->load->view('Ssgwebsite/website/footer');
  }

}