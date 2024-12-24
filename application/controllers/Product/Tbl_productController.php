<?php
class Tbl_productController extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Product_model/tbl_product');
    $this->load->model('Brand_model/tbl_brand');
    $this->load->library('session');
    $this->load->library("pagination");
    $this->load->helper('url');
    $this->load->model('Gallery_model/gallery'); 
    $this->load->model('Menu_model/Menu');
    $this->load->model('Admin_model/Role_model');
    $this->load->model('Admin_model/Adminmodel');
    $this->load->model('Nice_websitemodel/Nice_webmodel');
    $this->load->model('Category_model/Category_model');
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }
  }
  
  public function manageTbl_product() { 

   $id= $this->session->userdata('session_id');
   $data['admin']=$this->Adminmodel->getadmin($id);
   $data['menu_groups']=$this->Menu->getAllMenuGroup();
   $data['menu_details']=$this->Menu->getAllMenu();
   $data['admin_role']=$this->Menu->adminrole();
   //============================ Start Pager Code ==============================
   $name=($this->input->post('product_name')) ? $this->input->post('product_name') :0;
   $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
   $brand=($this->input->post('product_brand')) ? $this->input->post('product_brand') :0;
   $brand=($this->uri->segment(5)) ?  $this->uri->segment(5) :$brand;
   $this->load->config('bootstrap_pagination');
   $config = $this->config->item('pagination_config');;
   $config['base_url'] = base_url() ."Product/Tbl_productController/manageTbl_product"."/$name/$brand";
   $config['total_rows'] = $this->tbl_product->get_count($name,$brand);
   $config['per_page'] = 20;
   $config['uri_segment'] = 6;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
   $data['links'] = $this->pagination->create_links();
   //============================ End Pager Code ==============================
   $data["tbl_products"] = $this->tbl_product->getAllproduct($config['per_page'],$page,$name,$brand);
   $this->load->view('Dashboard/header.php',$data);
   $this->load->view('Dashboard/side.php');
   $data['branddropdown']=$this->tbl_brand->getAll();
   $data['branddropdown']=$this->tbl_brand->getAll();
   $this->load->view('tbl_product/manage-tbl_product', $data);
   $this->load->view('Dashboard/footer.php');
 }
 
 public function addTbl_product() {
  $id= $this->session->userdata('session_id');
  $data['admin']=$this->Adminmodel->getadmin($id);
  $data['menu_groups']=$this->Menu->getAllMenuGroup();
  $data['menu_details']=$this->Menu->getAllMenu();
  $data['admin_role']=$this->Menu->adminrole();
  $this->load->view('Dashboard/header.php',$data);
  $this->load->view('Dashboard/side.php');
  $data['branddropdown']=$this->tbl_brand->getAll();
  $data['featureddropdown']=$this->Category_model->getAll();
  $data['categorydropdown']=$this->Category_model->all_text_category();
  $this->load->view('tbl_product/add-tbl_product',$data);
  $this->load->view('Dashboard/footer.php');
}

public function addTbl_productPost() {
  $data['product_name'] = $this->input->post('product_name');
  $data['product_brand'] = $this->input->post('product_brand');
  $data['product_description'] = $this->input->post('product_description');
  $data['actual_price'] = $this->input->post('actual_price');
  $data['discount_percentage'] = $this->input->post('discount_percentage');
  /*========================================================================*/
  $data['sell_price'] = $this->input->post('sell_price');
  $data['product_category'] = $this->input->post('product_category');
  $data['enable_for_scroll'] = $this->input->post('enable_for_scroll');
  $data['enable_featured_product'] = $this->input->post('enable_featured_product');
  $data['thumble_image'] = $this->input->post('thumble_image');
  if ($_FILES['thumble_image']['name']) { 
    $data['thumble_image'] = $this->doUpload('thumble_image');
  }
  /*========================================================================*/
  $data['created']=date("Y-m-d H:i:s");
  $percentage=$this->input->post('discount_percentage');
  $price=$this->input->post('actual_price');
  $discount=($price*$percentage)/100;
  $discount_price=$price-$discount;
  $data['discount_price'] =$discount_price;
  $insert=$this->tbl_product->insert($data);
  /*  $galleryID = $insert; 
  if($galleryID){ 
    $uploadData['gallery_id'] = $galleryID; 
    $uploadData['uploaded_on'] = date("Y-m-d H:i:s"); 
  }*/
  //$insert = $this->tbl_product->insertImage($uploadData); 
  $this->session->set_flashdata('success', 'Product added Successfully');
  redirect('Product/Tbl_productController/ManageTbl_product');
}

public function doUpload($file) {
  $config['upload_path'] = './ssgassests/productupload';
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
                            
                            public function editTbl_product($tbl_product_id) {
                              $id= $this->session->userdata('session_id');
                              $data['admin']=$this->Adminmodel->getadmin($id);
                              $data['menu_groups']=$this->Menu->getAllMenuGroup();
                              $data['menu_details']=$this->Menu->getAllMenu();
                              $data['admin_role']=$this->Menu->adminrole();
                              $this->load->view('Dashboard/header.php',$data);
                              $this->load->view('Dashboard/side.php');
                              $data['tbl_product_id'] = $tbl_product_id;
                              $data['tbl_product'] = $this->tbl_product->getDataById($tbl_product_id);
                              $data['branddropdown']=$this->tbl_brand->getAll();
                              $data['featureddropdown']=$this->Category_model->getAll();
                              $data['categorydropdown']=$this->Category_model->all_text_category();
                              $this->load->view('tbl_product/edit-tbl_product', $data);
                              $this->load->view('Dashboard/footer.php');
                            }
                            
                            public function editTbl_productPost() {
                              $tbl_product_id = $this->input->post('tbl_product_id');
                              $tbl_product = $this->tbl_product->getDataById($tbl_product_id);
                              $data['product_name'] = $this->input->post('product_name');
                              $data['product_brand'] = $this->input->post('product_brand');
                              $data['product_description'] = $this->input->post('product_description');
                              $data['actual_price'] = $this->input->post('actual_price');
                              $data['discount_percentage'] = $this->input->post('discount_percentage');
                              /*========================================================================*/
                              $data['sell_price'] = $this->input->post('sell_price');
                              $data['product_category'] = $this->input->post('product_category');
                              $data['enable_for_scroll'] = $this->input->post('enable_for_scroll');
                              $data['enable_featured_product'] = $this->input->post('enable_featured_product');
                              if(!empty($data['thumble_image'])){
                                $data['thumble_image'] = $this->input->post('thumble_image');
                                if ($_FILES['thumble_image']['name']) { 
                                  $data['thumble_image'] = $this->doUpload('thumble_image');
                                }
                              }
                              /*========================================================================*/
                              $data['modified']=date("Y-m-d H:i:s");
                              $percentage=$this->input->post('discount_percentage');
                              $price=$this->input->post('actual_price');
                              $discount=($price*$percentage)/100;
                              $discount_price=$price-$discount;
                              
                              $data['discount_price'] =$discount_price;
                              
                              $edit = $this->tbl_product->update($tbl_product_id,$data);

                              if ($edit) {
                               $dataa['uploaded_on']=date("Y-m-d H:i:s");
                               $this->tbl_product->updategallerydate($tbl_product_id,$dataa);
                               $this->session->set_flashdata('success', 'Product Updated');
                               redirect('Product/Tbl_productController/ManageTbl_product');
                             }
                           }
                           


                          public function productdata(){
                            $id  = $_POST['product_id'];
                            $data['tbl_product'] = $this->tbl_product->getDataById($id);
                            $data['getbrand']=function($eid){
                              return $this->tbl_brand->getDataBybrand_id($eid);};
                              $this->load->view('tbl_product/view-product_popup',$data);
                          }



                            public function deleteTbl_product($tbl_product_id) {
                              $delete = $this->tbl_product->delete($tbl_product_id);
                              $this->session->set_flashdata('success', 'Product deleted');
                              redirect('Product/Tbl_productController/ManageTbl_product');
                            }
                            
                            public function changeStatusTbl_product($tbl_product_id) {
                              $edit = $this->tbl_product->changeStatus($tbl_product_id);
                              $this->session->set_flashdata('success', 'Product '.$edit.' Successfully');
                              redirect('Product/Tbl_productController/ManageTbl_product');
                            }


                            public function manage_inquiry() { 

                             $id= $this->session->userdata('session_id');
                             $data['admin']=$this->Adminmodel->getadmin($id);
                             $data['menu_groups']=$this->Menu->getAllMenuGroup();
                             $data['menu_details']=$this->Menu->getAllMenu();
                             $data['admin_role']=$this->Menu->adminrole();
         //============================ Start Pager Code ==============================
                             $name=($this->input->post('name')) ? $this->input->post('name') :0;
                             $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
                             $email=($this->input->post('customer_email')) ? $this->input->post('customer_email') :0;
                             $email=($this->uri->segment(5)) ?  $this->uri->segment(5) :$email;
                             $this->load->config('bootstrap_pagination');
                             $config = $this->config->item('pagination_config');;
                             $config['base_url'] = base_url() ."Product/Tbl_productController/manage_inquiry"."/$name/$email";
                             $config['total_rows'] = $this->tbl_product->get_count_inquiry($name,$email);
                             $config['per_page'] = 10;
                             $config['uri_segment'] = 6;
                             $this->pagination->initialize($config);
                             $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
                             $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
                             $data["inquiry"] = $this->tbl_product->getAllInquiry($config['per_page'],$page,$name,$email);
                             $data['status_inq']=function($eid){
                              return $this->tbl_product->check_already($eid);
                            };
                            $data['status_name']=function($sid)
                            {
                              return $this->tbl_product->get_statusname($sid);
                            };
                            $this->load->view('Dashboard/header.php',$data);
                            $this->load->view('Dashboard/side.php');
                            $data['branddropdown']=$this->tbl_brand->getAll();
                            $this->load->view('tbl_product/manage_inquiry', $data);
                            $this->load->view('Dashboard/footer.php');
                          }

                          public function changeStatusInquiry($id) {
                            $edit = $this->tbl_product->changeStatus_inquiry($id);
                            $this->session->set_flashdata('success', 'Inquiry '.$edit.' Successfully');
                            redirect('Product/Tbl_productController/manage_inquiry');
                          }

                          public function deleteInquiry($id)
                          {
                           $delete = $this->tbl_product->deleteInquiry($id);
                           $this->session->set_flashdata('success', 'Customer Inquiry deleted');
                           redirect('Product/Tbl_productController/manage_inquiry');
                         }

                         public function product_Inquiry()
                         {
                           $inq_id=$_POST['inquiry_id'];

                           $data["inquiry"] = $this->tbl_product->getDataById_inquiry($inq_id);
                           $data['getbrand']=function($id) {return $this->Nice_webmodel->getproduct_brand($id);};
                           $data['getproduct']=function($iid){return $this->Nice_webmodel->getproduct_deatails($iid); };
                           $data['status_history']=function($sid)   { return $this->tbl_product->check_already($sid);  };
                           $data['status_name']=function($sid) {return $this->tbl_product->get_statusname($sid); };
                           $data['adminname']=function($id){
                            return $this->Adminmodel->getadmin($id);
                          };
                          $this->load->view('tbl_product/inquiryPopup',$data);

                        }

                        public function status_inquiry()
                        {
                         $inq_id=$_POST['inquiry_id'];
                         $data['inquiry_id']=$inq_id;
                         $data["status"] = $this->tbl_product->getAllStatus();
                         $data['status_history']=function($sid)   { return $this->tbl_product->check_already($sid);  };
                         $this->load->view('tbl_product/StatusPopup',$data);
                       }

                       public function submitupdate_status()
                       {
                        $data['status_id'] = $this->input->post('status_id');
                        $data['comment'] = $this->input->post('comment');
                        $data['inquiry_id'] = $this->input->post('inquiry_id');
                        $inquiry_id=$this->input->post('inquiry_id');
                        $ip=$_SERVER['REMOTE_ADDR'];
                        $data['ip_address'] =$ip;
                        $data['updated_by'] = $this->session->userdata('session_id');
                        $ql = $this->tbl_product->check_already($inquiry_id);
                        if($ql){
                         date_default_timezone_set("Asia/Kolkata");
                         $data['modify_at'] = date('Y-m-d H:i:s'); 

                         $update = $this->tbl_product->update_inquirystatus($data,$inquiry_id);

                       }
                       else{
                         $insert=$this->tbl_product->submitupdate_status($data);
                       }
                       $this->session->set_flashdata('success', 'Inquiry Status Updated Successfully');

                       redirect('Product/Tbl_productController/manage_inquiry');
                     }
                   }