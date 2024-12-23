<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller {
    
 
  public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel','Warehouse/Warehouse_model'));
        $this->load->model(array('Admin_model/Role_model','Designation/Designation_model'));
        $this->load->model('Nice_websitemodel/Nice_webmodel');
        $this->load->model('Menu_model/Menu');
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
    $this->load->view('Website/ms_header',$data);
    $this->load->view('Website/privacypolicy');
    $this->load->view('Website/ms_footer');

  }


  public function contactus(){

    $data['page_active']='contactus';
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/contactus');
    $this->load->view('Ssgwebsite/website/footer');

  }

   public function ordernow(){

    $data['page_active']='order';
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/order');
    $this->load->view('Ssgwebsite/website/footer');

  }

   public function aboutus(){

    $data['page_active']='aboutus';
    $this->load->view('Ssgwebsite/website/header',$data);
    $this->load->view('Ssgwebsite/website/about');
    $this->load->view('Ssgwebsite/website/footer');

  }



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



   public function newindex(){ 
    
    $data['page_active']='index_active';

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
    $this->load->view('Ssgwebsite/ssg/header',$data);
    /*$this->load->view('Ssgwebsite/ssg/bannersection');*/
    $this->load->view('Ssgwebsite/ssg/index');
    $this->load->view('Ssgwebsite/ssg/footer');
 
  }

}