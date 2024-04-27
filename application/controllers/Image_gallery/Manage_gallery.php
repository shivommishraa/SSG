<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Manage_gallery extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
        $this->load->helper('form'); 
        $this->load->library("pagination");
        $this->load->library('form_validation'); 
        $this->load->helper(array('url','form'));
        $this->load->model('Gallery_model/gallery'); 
        $this->load->model('Product_model/tbl_product');
        $this->controller = 'Image_gallery/manage_gallery'; 
        $this->load->model('Admin_model/Adminmodel');
        $this->load->model('Menu_model/Menu');
        $this->load->model('Admin_model/Role_model');
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
  } 
  
  public function index(){ 
    $data = array(); 
    if($this->session->userdata('success_msg')){ 
        $data['success_msg'] = $this->session->userdata('success_msg'); 
        $this->session->unset_userdata('success_msg'); 
    } 
    if($this->session->userdata('error_msg')){ 
        $data['error_msg'] = $this->session->userdata('error_msg'); 
        $this->session->unset_userdata('error_msg'); 
    } 
        //============================ Start Pager Code ==============================
         //$name=($this->input->post('product_id')) ? $this->input->post('product_id') :0;
        // $name=($this->uri->segment(3)) ?  $this->uri->segment(3) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Image_gallery/manage_gallery/index";
    $config['total_rows'] = $this->gallery->get_count();
    $config['per_page'] = 20;
    $config['uri_segment'] = 4;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
         //$data["product_images"] = $this->product_image->getAllbrand($config['per_page'],$page,$name);
    
    $data['gallery'] = $this->gallery->getRowsdata($config['per_page'],$page); 
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['getproductname']=function($id){
        return $this->tbl_product->getDataById($id);};
        $this->load->view('Dashboard/header', $data); 
        $this->load->view('Dashboard/side.php');
        $this->load->view('gallery/index', $data); 
        $this->load->view('Dashboard/footer.php');
    } 



    
    public function view($id){ 
        $data = array(); 
        
        // Check whether id is not empty 
        if(!empty($id)){ 
            $data['gallery'] = $this->gallery->getRows($id); 
            $data['title'] = $data['gallery']['title']; 
            
            // Load the details page view 
            $id= $this->session->userdata('session_id');
            $data['admin']=$this->Adminmodel->getadmin($id);
            $data['getproductname']=function($id){
                return $this->tbl_product->getDataById($id);};
                $this->load->view('Dashboard/header', $data); 
                $this->load->view('Dashboard/sidebar.php');
                $this->load->view('gallery/view', $data); 
                $this->load->view('Dashboard/footer.php');
            }else{ 
                redirect($this->controller); 
            } 
        } 
        
        public function add(){ 
            $data = $galleryData = array(); 
            $errorUpload = ''; 
            
        // If add request is submitted 
            if($this->input->post('imgSubmit')){ 
            // Form field validation rules 
                $this->form_validation->set_rules('gallery_id', 'gallery title', 'required'); 
                
            // Prepare gallery data 
                $galleryData = array( 
                    'title' => $this->input->post('gallery_id') 
                ); 
                
            // Validate submitted form data 
                if($this->form_validation->run() == true){ 
                // Insert gallery data 
                    $insert = $this->gallery->insert($galleryData); 
                    $galleryID = $insert;  
                    
                    if($insert){ 
                        if(!empty($_FILES['images']['name'])){ 
                            $filesCount = count($_FILES['images']['name']); 
                            for($i = 0; $i < $filesCount; $i++){ 
                                $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                                $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                                $_FILES['file']['error']    = $_FILES['images']['error'][$i]; 
                                $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                                
                            // File upload configuration 
                                $uploadPath = 'uploads/images/'; 
                                $config['upload_path'] = $uploadPath; 
                                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                                
                            // Load and initialize upload library 
                                $this->load->library('upload', $config); 
                                $this->upload->initialize($config); 
                                
                            // Upload file to server 
                                if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                    $fileData = $this->upload->data(); 
                                    $uploadData[$i]['gallery_id'] = $galleryID; 
                                    /*$uploadData[$i]['brand_id'] = $this->input->post('brand_id') ; */
                                    $uploadData[$i]['file_name'] = $fileData['file_name']; 
                                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                                }else{ 
                                    $errorUpload .= $fileImages[$key].'('.$this->upload->display_errors('', '').') | ';  
                                } 
                            } 
                            
                        // File upload error message 
                            $errorUpload = !empty($errorUpload)?' Upload Error: '.trim($errorUpload, ' | '):''; 
                            
                            if(!empty($uploadData)){ 
                            // Insert files info into the database 
                                $insert = $this->gallery->insertImage($uploadData); 
                            } 
                        } 
                        
                        $this->session->set_userdata('success_msg', 'Gallery has been added successfully.'.$errorUpload); 
                        redirect($this->controller); 
                    }else{ 
                        $data['error_msg'] = 'Some problems occurred, please try again.'; 
                    } 
                } 
            } 
            
            $data['gallery'] = $galleryData; 
            $data['title'] = 'Create Gallery'; 
            $data['action'] = 'Add'; 
            
            $id= $this->session->userdata('session_id');
            $data['admin']=$this->Adminmodel->getadmin($id);
            $data['menu_groups']=$this->Menu->getAllMenuGroup();
            $data['menu_details']=$this->Menu->getAllMenu();
            $data['admin_role']=$this->Menu->adminrole();
            $this->load->view('Dashboard/header', $data); 
            $this->load->view('Dashboard/side.php');
            $this->load->view('gallery/add-edit', $data); 
            $this->load->view('Dashboard/footer'); 
        } 
        
        public function edit($id){ 

            $data = $galleryData = array(); 
            
        // Get gallery data 
            $galleryData = $this->gallery->getRows($id); 

        // If update request is submitted 
            if($this->input->post('imgSubmit')){ 
            // Form field validation rules 
                $this->form_validation->set_rules('gallery_id', 'gallery title', 'required'); 
                
            // Prepare gallery data 
                $galleryData = array( 
                    'title' => $this->input->post('title') 
                ); 
                
            // Validate submitted form data 
                if($this->form_validation->run() == true){ 
                // Update gallery data 
                    $update = $this->gallery->update($galleryData, $id); 

                    
                    if($update){ 
                        if(!empty($_FILES['images']['name'])){ 
                            $filesCount = count($_FILES['images']['name']); 
                            for($i = 0; $i < $filesCount; $i++){ 
                                $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                                $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                                $_FILES['file']['error']    = $_FILES['images']['error'][$i]; 
                                $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                                
                            // File upload configuration 
                                $uploadPath = './uploads/product_image'; 
                                $config['upload_path'] = $uploadPath; 
                                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                                
                            // Load and initialize upload library 
                                $this->load->library('upload', $config); 
                                $this->upload->initialize($config); 
                                
                            // Upload file to server 
                                if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                    $fileData = $this->upload->data(); 
                                    $uploadData[$i]['gallery_id'] = $id;
                                    $uploadData[$i]['brand_id'] = $this->input->post('brand_id'); 
                                    $uploadData[$i]['file_name'] = $fileData['file_name']; 
                                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                                }else{ 
                                    $errorUpload .= $fileImages[$key].'('.$this->upload->display_errors('', '').') | ';  
                                } 
                            } 
                            
                        // File upload error message 
                            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                            
                            if(!empty($uploadData)){ 
                            // Insert files data into the database 
                                $insert = $this->gallery->insertImage($uploadData); 
                            } 
                        } 
                        
                        $this->session->set_userdata('success_msg', 'Gallery has been updated successfully.'.$errorUpload); 
                        redirect($this->controller); 
                    }else{ 
                        $data['error_msg'] = 'Some problems occurred, please try again.'; 
                    } 
                } 
            } 
            
            
            $data['gallery'] = $galleryData; 
            $data['title'] = 'Update Product Gallery'; 
            $data['action'] = 'Edit'; 
            
            $data["productdropdown"]=$this->tbl_product->getAll();
            $id= $this->session->userdata('session_id');
            $data['admin']=$this->Adminmodel->getadmin($id);
            $data['menu_groups']=$this->Menu->getAllMenuGroup();
            $data['menu_details']=$this->Menu->getAllMenu();
            $data['admin_role']=$this->Menu->adminrole();
            $this->load->view('Dashboard/header', $data); 
            $this->load->view('Dashboard/side.php');
            $this->load->view('gallery/add-edit', $data); 
            $this->load->view('Dashboard/footer.php');
        } 
        
        public function block($id){ 
        // Check whether gallery id is not empty 
            if($id){ 
            // Update gallery status 
                $data = array('status' => 0); 
                $update = $this->gallery->update($data, $id); 
                
                if($update){ 
                    $this->session->set_userdata('success_msg', 'Gallery has been blocked successfully.'); 
                }else{ 
                    $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
                } 
            } 
            
            redirect($this->controller); 
        } 
        
        public function unblock($id){ 
        // Check whether gallery id is not empty 
            if($id){ 
            // Update gallery status 
                $data = array('status' => 1); 
                $update = $this->gallery->update($data, $id); 
                
                if($update){ 
                    $this->session->set_userdata('success_msg', 'Gallery has been activated successfully.'); 
                }else{ 
                    $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
                } 
            } 
            
            redirect($this->controller); 
        } 
        
        public function delete($id){ 
        // Check whether id is not empty 
            if($id){ 
                $galleryData = $this->gallery->getRows($id); 
                
            // Delete gallery data 
                $delete = $this->gallery->delete($id); 
                
                if($delete){ 
                // Delete images data  
                    $condition = array('gallery_id' => $id);  
                    $deleteImg = $this->gallery->deleteImage($condition);  
                    
                // Remove files from the server  
                    if(!empty($galleryData['images'])){  
                        foreach($galleryData['images'] as $img){  
                            @unlink('./uploads/product_image/'.$img['file_name']);  
                        }  
                    }  
                    
                    $this->session->set_userdata('success_msg', 'Gallery has been removed successfully.'); 
                }else{ 
                    $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
                } 
            } 
            
            redirect($this->controller); 
        } 
        
        public function deleteImage(){ 
        //$status  = 'err';  
        // If post request is submitted via ajax 
            if($this->input->post('id')){ 
                $id = $this->input->post('id'); 

                $imgData = $this->gallery->getImgRow($id); 
                
            // Delete image data 
                $con = array('id' => $id); 

                $delete = $this->gallery->deleteImage($con); 

                
                if($delete){ 
                // Remove files from the server  
                    @unlink('./uploads/product_image/'.$imgData['file_name']);  
                    echo $status = 'ok';  
                } 
                else{
                  echo  $status  = ''; 
              }
          } 
          

      } 
  }










/* Use url for check code.... https://www.codexworld.com/multiple-image-upload-view-edit-delete-in-codeigniter/    */