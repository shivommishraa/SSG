<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Menu_model/Menu');
    $this->load->model('Admin_model/Role_model');
    $this->load->model('Admin_model/Adminmodel');
    $this->load->model('Nice_websitemodel/Nice_webmodel');
    $this->load->model('Customer/FrontendCustomermodel');
    $this->load->model('Category_model/Category_model');
    $this->load->model('Product_model/tbl_product');
    $this->load->model('AdditionInformation/Infomodel');
    $this->load->library('session');
    $this->load->library("pagination");
    $this->load->helper(array('url','form'));
   
  }
 
 public function index(){

    $hostvalid=$this->Nice_webmodel->getHostpermit();  
    if($hostvalid=='1'){
        $loggedincusomterid= $this->session->userdata('customer_session_id');
        if(!empty($loggedincusomterid)){
            $data['loggedinCusomter']=$this->FrontendCustomermodel->getloggedinCustomerData($loggedincusomterid);
        }else{
            $data['loggedinCusomter']="";
        }
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
        $data["sliderProduct"] = $this->tbl_product->getSliderProduct();
        $data["productcategories"] = $this->Category_model->getAllEnabledProductCategories();
        $data["featuredcategory"] = $this->Category_model->getAllEnableFeatureddcategory();
        $data["enabledProductsForFeatured"] = $this->tbl_product->getAllEnabledProductsForFeatured();
        $data["mostViewedProduct"] = $this->tbl_product->getAllMostViewedProduct();
        $data["topRatedProduct"] = $this->tbl_product->getAlltopRatedProduct();
        $data["latestProduct"] = $this->tbl_product->getAlllatestProduct();
        $data["homepageInfo"] = $this->Infomodel->getInfoDataById(1);
        $data['product_image']=function($id){
        return $this->Nice_webmodel->getimage_datails($id);};
        $data['product_brand']=function($id){
        return $this->Nice_webmodel->getproduct_brand($id);};
        $this->load->view('Ssgwebsite/website/header',$data);
        $this->load->view('Ssgwebsite/website/bannersection',$data);
        $this->load->view('Ssgwebsite/website/index',$data);
        $this->load->view('Ssgwebsite/website/footer');
    }else{
        $data='';
        $this->load->view('Website/index2',$data);
    }
 }
 /* public function index(){
    $hostvalid=$this->Nice_webmodel->getHostpermit();  
    if($hostvalid=='1'){

        $data['page_active']='index_active';
        //============================ Start Pager Code ==============================
        $galleryid=($this->input->post('galleryid')) ? $this->input->post('galleryid') :0;
        $galleryid=($this->uri->segment(4)) ?  $this->uri->segment(4) :$galleryid;
        $this->load->config('bootstrap_pagination');
        $config = $this->config->item('pagination_config');;
        $config['base_url'] = base_url() ."Website/Website_controller/index"."/$galleryid";
        $config['total_rows'] = $this->Nice_webmodel->get_count($galleryid);
        $config['per_page'] = 10;
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
               
        $this->load->view('Website/ms_header',$data);
        $this->load->view('Website/index',$data);
        $this->load->view('Website/ms_footer');
        
    }else{
        $data='';
        $this->load->view('Website/index2',$data);
    }
  }*/



}