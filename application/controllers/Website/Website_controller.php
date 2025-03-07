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
    $this->load->view('Ssgwebsite/website/bannersection',$data);
    $this->load->view('Ssgwebsite/website/index',$data);
    $this->load->view('Ssgwebsite/website/footer',$data);
 
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

    $recaptchaResponse = $this->input->post('g-recaptcha-response');
    // Secret key from Google reCAPTCHA
    $secretKey = '6LfU5qwqAAAAAAfJGEMd5r6Rr8hHfQyB-t7Bzdf8';
            
    // Verify the reCAPTCHA response
    $response = $this->verifyRecaptcha($recaptchaResponse, $secretKey);
            
    if ($response->success) {

      $data['email'] = $this->input->post('email');
      $data['name'] = $this->input->post('name');
      $data['password'] = $this->input->post('password'); 
      $data['confirmpassword'] = $this->input->post('confirmpassword'); 
      $data['ip_address'] = $_SERVER['REMOTE_ADDR']; 
      if((!empty($data['password'])) && (!empty($data['confirmpassword'])) && (!empty($data['email'])) && ($data['password'] == $data['confirmpassword'])){
        $customerData=$this->FrontendCustomermodel->getDataByEmail($data['email']);
        if(empty($customerData)){
          $this->FrontendCustomermodel->InsertData($data);
          $this->session->set_flashdata('success', 'Thank you. Your account has been created successfully. Please use your credentials to log in to my portal.');
          $this->customerlogin();
        }else{
          $this->session->set_flashdata('error', 'This email is already registered. Please try using a different email.');
          $this->customerlogin();
        }
      }else{
        $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        $this->customerlogin();
      }

    } else {
      // reCAPTCHA validation failed
      //echo "Please verify that you are not a robot.";
      $this->session->set_flashdata('error', 'Please verify that you are not a robot.');
      $this->customerlogin();
    }  
    
  }


   private function verifyRecaptcha($recaptchaResponse, $secretKey) {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse
        ];

        // Use cURL to send the request to Google
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);
        curl_close($ch);

        // Decode the response from Google
        return json_decode($result);
    }

  public function logincustomer(){

    $data['email'] = $this->input->post('email');
    $data['password'] = $this->input->post('password'); 
    $this->FrontendCustomermodel->checkdata($data);
    $this->session->set_flashdata('success', 'Logged in successfully.');
    redirect(base_url());
  }

/*=====================================================*/
 
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
      $this->session->set_flashdata('error', 'Invalid email ID or password. Please enter the correct credentials and try again.'); 
      
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
  }else{
    redirect(base_url());
  }
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

  public function savenewslatteremail(){
    $email=$this->input->post('newslatteremail');
    $getData=$this->Nice_webmodel->getNewslatterbyId($email);
    if(!empty($email) && empty($getData)){
      $data = array(
          'newslatteremail'  =>     $email,
          'system_ip'     =>     $_SERVER['REMOTE_ADDR'],       
      );
      $result=$this->Nice_webmodel->savenewslatteremail($data);
      if($result){
        echo  1;
      }else{
        echo  0;
      }
    }else{
      echo  0;
    }
  }


  public function newoffers(){
    $data['page_active']='newoffers';
    $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/offerspage',$data);
    $this->load->view('Ssgwebsite/website/footer',$data);
  }

  public function offers(){
    $data['page_active']='newoffers';
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/newoffers',$data);
    $this->load->view('Ssgwebsite/website/footer',$data);
  }

  public function customer_update(){
    $loggedincusomterid= $this->session->userdata('customer_session_id');
    if(!empty($loggedincusomterid)){
      $add_info = $this->Infomodel->getInfoDataById($loggedincusomterid);
      $data['name'] = $this->input->post('name');
      $data['mobile'] = $this->input->post('mobile');
      $data['address'] = $this->input->post('address');
      $data['pincode'] = $this->input->post('pincode');
      $data['country'] = $this->input->post('country');
      $data['state'] = $this->input->post('state');
      $data['district'] = $this->input->post('district');
      $data['update_ip_address'] = $_SERVER['REMOTE_ADDR'];
      if ($_FILES['customerimage']['name']) { 
        $data['customerimage'] = $this->doUpload('customerimage');
      }  
      if(!empty($data['name']) && !empty($data['mobile'])){
        $edit = $this->FrontendCustomermodel->update($loggedincusomterid,$data);
        if ($edit) {
          $this->session->set_flashdata('success', 'Profile Updated Successfully.');
          redirect('Website/Website_controller/customeraccount');
        }else{
          $this->session->set_flashdata('error', 'Something went wrong.Please try again.');
          redirect('Website/Website_controller/customeraccount');
        }
      }else{
        $this->session->set_flashdata('error', 'Please Fill required Fields.');
        redirect('Website/Website_controller/customeraccount');
      }
    }else{
      $this->session->set_flashdata('error', 'Something went wrong.Please try again.');
      redirect('Website/Website_controller/customeraccount');
    }
  }



  public function doUpload($file) {
      $config['upload_path'] = './ssgassests/img/customerimage';
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