<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addinfocontroller extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Category_model/Category_model');
    $this->load->model('Brand_model/tbl_brand');
    $this->load->model('AdditionInformation/Infomodel');
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->model('Admin_model/Adminmodel');
    $this->load->model('Menu_model/Menu');
    $this->load->model('Bannercategory/Bannercategory');
    $this->load->model('Admin_model/Role_model');
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
    public function manageInfo()
    {
     $id= $this->session->userdata('session_id');
     $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
     $data['menu_details']=$this->Menu->getAllMenu();
     $data['admin_role']=$this->Menu->adminrole();
            //============================ Start Pager Code ==============================
     $name=($this->input->post('category_name')) ? $this->input->post('category_name') :0;
     $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
     $this->load->config('bootstrap_pagination');
     $config = $this->config->item('pagination_config');;
     $config['base_url'] = base_url() ."Category/Category_Controller/ManageTbl_category"."/$name";
     $config['total_rows'] = $this->Category_model->get_count($name);
     $config['per_page'] = 20;
     $config['uri_segment'] = 5;
     $this->pagination->initialize($config);
     $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
     $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
     $data["tbl_brands"] = $this->Category_model->getAllcategory($config['per_page'],$page,$name);
     $this->load->view('Dashboard/header.php',$data);
     $this->load->view('Dashboard/side.php');
     $data['getparent']=function($id){
       return $this->Category_model->getparent($id);};
       $this->load->view('AdditionalInfo/manageaddinfo', $data);
       $this->load->view('Dashboard/footer.php');

     }
    public function updateHomeAddInfo($tbl_id) {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data['add_info'] = $this->Infomodel->getInfoDataById($tbl_id);
        $this->load->view('AdditionalInfo/homepageinfo',$data);
        $this->load->view('Dashboard/footer.php');
    }
    public function homePageInfo() {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('AdditionalInfo/homepageinfo',$data);
      $this->load->view('Dashboard/footer.php');
    }

    public function AddInfoPost() {
      $data['modelpopupenable'] = $this->input->post('modelpopupenable');
      $data['modelpopupbtnlink'] = $this->input->post('modelpopupbtnlink');
      $data['topheadingmsg'] = $this->input->post('topheadingmsg');
      $data['bannerdescription'] = $this->input->post('bannerdescription');
      $data['bannertitle'] = $this->input->post('bannertitle');
      $data['banneradditionalmsg'] = $this->input->post('banneradditionalmsg');
      $data['bannerbtntitle'] = $this->input->post('bannerbtntitle');
      $data['bannerbtnurl'] = $this->input->post('bannerbtnurl');
      $data['status'] = $this->input->post('status');
      if ($_FILES['modelpopupimage']['name']) { 
        $data['modelpopupimage'] = $this->doUpload('modelpopupimage');
      }
      if ($_FILES['bannerimage']['name']) { 
        $data['bannerimage'] = $this->doUpload('bannerimage');
      }
      $this->Infomodel->addInfoinsert($data);
      $this->session->set_flashdata('success', 'Information added Successfully');
      redirect('AddInfo/Addinfocontroller/manageInfo');
    }

    public function editAddInfoPost() {
      $tbl_info_id = $this->input->post('id');
      $add_info = $this->Infomodel->getInfoDataById($tbl_info_id);
      $data['modelpopupenable'] = $this->input->post('modelpopupenable');
      $data['modelpopupbtnlink'] = $this->input->post('modelpopupbtnlink');
      $data['topheadingmsg'] = $this->input->post('topheadingmsg');
      $data['bannerdescription'] = $this->input->post('bannerdescription');
      $data['bannertitle'] = $this->input->post('bannertitle');
      $data['banneradditionalmsg'] = $this->input->post('banneradditionalmsg');
      $data['bannerbtntitle'] = $this->input->post('bannerbtntitle');
      $data['bannerbtnurl'] = $this->input->post('bannerbtnurl');
      $data['status'] = $this->input->post('status');
      if ($_FILES['modelpopupimage']['name']) { 
        $data['modelpopupimage'] = $this->doUpload('modelpopupimage');
      }
      if ($_FILES['bannerimage']['name']) { 
        $data['bannerimage'] = $this->doUpload('bannerimage');
      }
                              
      $edit = $this->Infomodel->update($tbl_info_id,$data);

      if ($edit) {
        $this->session->set_flashdata('success', 'Additional Information Updated Successfully.');
        redirect('AddInfo/Addinfocontroller/manageInfo');
      }
  }


    public function doUpload($file) {
      $config['upload_path'] = './ssgassests/infodetailsupload';
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

    /* ================Start code for info banner gallery=========*/
   


    public function infobannergallery(){ 
            $id=1;
            $data = $galleryData = array(); 
            $bannercategory=$this->input->post('bannercategory');
            $galleryData = $this->Infomodel->getAllInfoBannerGalleryBy($id); 
            if($this->input->post('imgSubmit')){ 
           
                        if(!empty($_FILES['images']['name'])){ 
                            $filesCount = count($_FILES['images']['name']); 
                            for($i = 0; $i < $filesCount; $i++){ 
                                $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                                $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                                $_FILES['file']['error']    = $_FILES['images']['error'][$i]; 
                                $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                                
                            // File upload configuration 
                                $uploadPath = './ssgassests/infodetailsupload'; 
                                $config['upload_path'] = $uploadPath; 
                                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                                
                            // Load and initialize upload library 
                                $this->load->library('upload', $config); 
                                $this->upload->initialize($config); 
                                
                            // Upload file to server 
                                if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                    $fileData = $this->upload->data(); 
                                    $uploadData[$i]['tbl_additional_info_id'] = $id;
                                    /*$uploadData[$i]['brand_id'] = $this->input->post('brand_id'); */
                                    $uploadData[$i]['infobannerimage'] = $fileData['file_name']; 
                                    if(!empty($bannercategory)){
                                        $uploadData[$i]['bannercategory'] = $bannercategory;
                                    }
                                    /*$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); */
                                }else{ 
                                    $errorUpload .= $fileImages[$key].'('.$this->upload->display_errors('', '').') | ';  
                                } 
                                if(!empty($uploadData)){ 
                                // Insert files data into the database 
                                    $insert = $this->Infomodel->insertImagesImage($uploadData); 
                                } 
                            } 
                            
                        // File upload error message 
                            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                            
                            
                        } 
                        
                        $this->session->set_userdata('success_msg', 'Gallery has been updated successfully.'.$errorUpload); 
                        redirect('AddInfo/Addinfocontroller/infobannergallery/1');
                    
            } 
            
            
             $id= $this->session->userdata('session_id');
             $data['admin']=$this->Adminmodel->getadmin($id);
             $data['menu_groups']=$this->Menu->getAllMenuGroup();
             $data['menu_details']=$this->Menu->getAllMenu();
             $data['admin_role']=$this->Menu->adminrole();
                    //============================ Start Pager Code ==============================
             $bannercategory=($this->input->post('bannercategory')) ? $this->input->post('bannercategory') :0;
             $bannercategory=($this->uri->segment(4)) ?  $this->uri->segment(4) :$bannercategory;
             $this->load->config('bootstrap_pagination');
             $config = $this->config->item('pagination_config');;
             $config['base_url'] = base_url() ."AddInfo/Addinfocontroller/infobannergallery"."/$bannercategory";
             $config['total_rows'] = $this->Infomodel->get_count($bannercategory);
             $config['per_page'] = 15;
             $config['uri_segment'] = 5;
             $this->pagination->initialize($config);
             $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
             $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
     


            /*$data['gallery'] =  $this->Infomodel->getAllInfoBannerGalleryBy($id); */
            $data['title'] = 'Update Info Gallery'; 
            $data['action'] = 'Edit'; 
            $data["productdropdown"]=$this->Infomodel->getAllInfoBannerGallery();
            $data["infomodeldata"]=$this->Infomodel->getInfoDataById(1);
            $data["gallery"]=$this->Infomodel->getInfoDataByIdNew($config['per_page'],$page,$bannercategory);
            /*$id= $this->session->userdata('session_id');
            $data['admin']=$this->Adminmodel->getadmin($id);
            $data['menu_groups']=$this->Menu->getAllMenuGroup();
            $data['menu_details']=$this->Menu->getAllMenu();
            $data['admin_role']=$this->Menu->adminrole();*/
            $data['bannercategory']=$this->Bannercategory->getAllBannercategory();
            $data['bannercategorybyid']=function($bannercategory){
                return $this->Bannercategory->getBannercategoryById($bannercategory);
            };
            $this->load->view('Dashboard/header', $data); 
            $this->load->view('Dashboard/side.php');
            $this->load->view('AdditionalInfo/infobannergallery',$data);
            $this->load->view('Dashboard/footer.php');
        } 


        public function deleteImage(){ 
        
            if($this->input->post('id')){ 
                $id = $this->input->post('id'); 

                $imgData = $this->Infomodel->getImgRow($id); 
                
            // Delete image data 
                $con = array('id' => $id); 

                $delete = $this->Infomodel->deleteImage($con); 

                
                if($delete){ 
                // Remove files from the server  
                    @unlink('./ssgassests/infodetailsupload/'.$imgData['infobannerimage']);  
                    echo $status = 'ok';  
                } 
                else{
                  echo  $status  = ''; 
              }
          } 
          

      } 



       public function setImageAsModelPopup(){ 
        
            if($this->input->post('image')){ 
                $data['modelpopupimage'] = $this->input->post('image'); 
                $tbl_info_id=1;
                $edit = $this->Infomodel->updateforModelPopup($tbl_info_id,$data);
                if($edit){  
                    echo $status = 'ok';  
                } 
                else{
                  echo  $status  = ''; 
              }
          } 
          

      } 


       public function setImageForOffer(){ 
        
            if($this->input->post('image')){ 
                $data['offerimage'] = $this->input->post('image'); 
                $tbl_info_id=1;
                $edit = $this->Infomodel->setImageForOffer($tbl_info_id,$data);
                if($edit){  
                    echo $status = 'ok';  
                } 
                else{
                  echo  $status  = ''; 
              }
          } 
          

      } 
    
  }