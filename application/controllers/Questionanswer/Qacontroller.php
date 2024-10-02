<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qacontroller extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Category_model/Category_model');
    $this->load->model('Qanswer_model/Qa_model');
    $this->load->model('Brand_model/tbl_brand');
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->model('Admin_model/Adminmodel');
    $this->load->model('Menu_model/Menu');
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
    public function ManageQuestionanswer()
    {
       $id= $this->session->userdata('session_id');
       $data['admin']=$this->Adminmodel->getadmin($id);
       $data['menu_groups']=$this->Menu->getAllMenuGroup();
       $data['menu_details']=$this->Menu->getAllMenu();
       $data['admin_role']=$this->Menu->adminrole();
              //============================ Start Pager Code ==============================
       $name=($this->input->post('question')) ? $this->input->post('question') :0;
       $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
       $this->load->config('bootstrap_pagination');
       $config = $this->config->item('pagination_config');;
       $config['base_url'] = base_url() ."Questionanswer/Qacontroller/ManageQuestionanswer"."/$name";
       $config['total_rows'] = $this->Qa_model->get_count($name);
       $config['per_page'] = 40;
       $config['uri_segment'] = 5;
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
       $data['links'] = $this->pagination->create_links();
            //============================ End Pager Code ==============================
       $data["allData"] = $this->Qa_model->getAllData($config['per_page'],$page,$name);
       $this->load->view('Dashboard/header.php',$data);
       $this->load->view('Dashboard/side.php');
         $this->load->view('Question_Answer/managequestionanswer', $data);
         $this->load->view('Dashboard/footer.php');

     }

     public function deleteQa($tbl_id) {
      $delete = $this->Qa_model->delete($tbl_id);
      $this->session->set_flashdata('success', 'Record deleted');
      redirect('Questionanswer/Qacontroller/ManageQuestionanswer');
    }

    public function changeStatus($tbl_id) {
      $edit = $this->Qa_model->changeStatus($tbl_id);
      $this->session->set_flashdata('success', 'Record '.$edit.' Successfully');
      redirect('Questionanswer/Qacontroller/ManageQuestionanswer');
    }

    public function addQa() {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $this->load->view('Question_Answer/addquestionanswer',$data);
      $this->load->view('Dashboard/footer.php');
    }

    public function addQuestionPost() {
      $data['question'] = $this->input->post('question');
      $data['status'] = $this->input->post('status');
      $data['answer'] = $this->input->post('answer');
      $data['options'] = $this->input->post('options');
      $this->Qa_model->insert($data);
      $this->session->set_flashdata('success', 'Question added Successfully.');
      redirect('Questionanswer/Qacontroller/ManageQuestionanswer');

    }

    public function editQa($qa_id) {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $data['qa_id'] = $qa_id;
      $data['qa_data'] = $this->Qa_model->getDataByQa_id($qa_id);
      $this->load->view('Question_Answer/editquestionanswer', $data);
      $this->load->view('Dashboard/footer.php');
      }


      public function updateQuestion() {
      $qa_id = $this->input->post('qa_id');
      $data['question'] = $this->input->post('question');
      $data['answer'] = $this->input->post('answer');
      $data['options'] = $this->input->post('options');
      $edit = $this->Qa_model->updateQa($qa_id,$data);
      if ($edit) {
        $this->session->set_flashdata('success', 'Question Updated Successfully.');
        redirect('Questionanswer/Qacontroller/ManageQuestionanswer');
      }
    }

     public function ManageText_status()
     {
      
      $id= $this->session->userdata('session_id');
     $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
     $data['menu_details']=$this->Menu->getAllMenu();
     $data['admin_role']=$this->Menu->adminrole();
    
      //============================ Start Pager Code ==============================
    $name=($this->input->post('cate_id')) ? $this->input->post('cate_id') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Category/Category_Controller/ManageText_status"."/$name";
    $config['total_rows'] = $this->Category_model->get_textstatuscount($name);
    $config['per_page'] = 20;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["textStatus_data"] = $this->Category_model->getAlltextstatus($config['per_page'],$page,$name);
     $data["categorydropdown"] = $this->Category_model->all_text_category();
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('category/manageText_status',$data);
    $this->load->view('Dashboard/footer.php');
     }
    /*
    function for  add Tbl_brand get
    created by your name
    created at 18-08-20.
    */
    
    /*
    function for add Tbl_brand post
    created by your name
    created at 18-08-20.
    */
    
     public function addText_categoryPost() {
      $data['cate_name'] = $this->input->post('category_name');
      $this->Category_model->textcategoryinsert($data);
      $this->session->set_flashdata('success', 'Category added Successfully');
        //redirect('manage-tbl_category');
      redirect('Category/Category_Controller/ManageText_category');

    }

    public function addText_statusPost() {
      $data['text_status'] = $this->input->post('text_status');
      $data['cate_id'] = $this->input->post('cate_id');
      $this->Category_model->textstatusinsert($data);
      $this->session->set_flashdata('success', 'Text Status added Successfully');
        //redirect('manage-tbl_category');
      redirect('Category/Category_Controller/manageText_status');

    }

    public function ManageText_category()
    {
     $id= $this->session->userdata('session_id');
     $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
     $data['menu_details']=$this->Menu->getAllMenu();
     $data['admin_role']=$this->Menu->adminrole();
    
      //============================ Start Pager Code ==============================
    $name=($this->input->post('cate_name')) ? $this->input->post('cate_name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Category/Category_Controller/ManageText_category"."/$name";
    $config['total_rows'] = $this->Category_model->get_textcount($name);
    $config['per_page'] = 20;
    $config['uri_segment'] = 5;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["category_data"] = $this->Category_model->getAlltextcategory($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('category/manage-Text_category',$data);
    $this->load->view('Dashboard/footer.php');

    }
    /*
    function for edit Tbl_brand get
    returns  Tbl_brand by category_id.
    created by your name
    created at 18-08-20.
    */
    


    public function editText_category($tbl_brand_category_id) {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data['tbl_brand_category_id'] = $tbl_brand_category_id;
        $data['tbl_Category'] = $this->Category_model->getTextBycategory_id($tbl_brand_category_id);
        $this->load->view('category/edit-text_category', $data);
        $this->load->view('Dashboard/footer.php');
    }


     public function editText_status($tbl_status_id) {
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $data['tbl_status_id'] = $tbl_status_id;
        $data['txt_st_data'] = $this->Category_model->getTextBystatus_id($tbl_status_id);
        $data['categorydropdown'] = $this->Category_model->all_text_category();
        $this->load->view('category/edit-textstatus_category', $data);
        $this->load->view('Dashboard/footer.php');
    }
    /*
    function for edit Tbl_brand post
    created by your name
    created at 18-08-20.
    */
    public function editTbl_categoryPost() {
      $tbl_brand_category_id = $this->input->post('category_id');
      $tbl_brand = $this->Category_model->getDataBycategory_id($tbl_brand_category_id);
      $data['category_name'] = $this->input->post('category_name');
      $data['parent_id'] = $this->input->post('parent_id');
      $edit = $this->Category_model->update($tbl_brand_category_id,$data);
      if ($edit) {
        $this->session->set_flashdata('success', 'Category Updated');
        redirect('Category/Category_Controller/ManageTbl_category');
      }
    }

    public function editTbl_statusPost() {
      $text_status_id = $this->input->post('text_status_id');
      $data['text_status'] = $this->input->post('text_status');
      $data['cate_id'] = $this->input->post('cate_id');
      $edit = $this->Category_model->Textstatusupdate($text_status_id,$data);
      if ($edit) {
        $this->session->set_flashdata('success', 'Text Status Updated');
        redirect('Category/Category_Controller/ManageText_status');
      }
    }


    public function editText_categoryPost() {
      $tbl_brand_category_id = $this->input->post('cate_id');
      $tbl_brand = $this->Category_model->getTextBycategory_id($tbl_brand_category_id);
      $data['cate_name'] = $this->input->post('cate_name');
      $edit = $this->Category_model->Textupdate($tbl_brand_category_id,$data);
      if ($edit) {
        $this->session->set_flashdata('success', 'Category Updated');
        redirect('Category/Category_Controller/ManageText_category');
      }
    }
    /*
    function for view Tbl_brand get
    created by your name
    created at 18-08-20.
    */
    public function viewTbl_category($tbl_brand_category_id) {
      $data['tbl_brand_category_id'] = $tbl_brand_category_id;
      $data['tbl_brand'] = $this->Category_model->getDataBycategory_id($tbl_brand_category_id);
      $data['getparent']=function($id){
        return $this->Category_model->getparent($id);};
        $this->load->view('category/view-tbl_category', $data);
      }
    /*
    function for delete Tbl_brand    created by your name
    created at 18-08-20.
    */
    

     public function textdeleteTbl_category($tbl_brand_category_id) {
      $delete = $this->Category_model->textdelete($tbl_brand_category_id);
      $this->session->set_flashdata('success', 'Category deleted');
      redirect('Category/Category_Controller/ManageText_category');
    }

     public function textdeleteTbl_status($tbl_brand_category_id) {
      $delete = $this->Category_model->textstatusdelete($tbl_brand_category_id);
      $this->session->set_flashdata('success', 'Text status deleted');
      redirect('Category/Category_Controller/ManageText_status');
    }
    /*
    function for activation and deactivation of Tbl_brand.
    created by your name
    created at 18-08-20.
    */
    public function changeStatusTbl_category($tbl_brand_category_id) {
      $edit = $this->Category_model->changeStatus($tbl_brand_category_id);
      $this->session->set_flashdata('success', 'Category '.$edit.' Successfully');
      redirect('Category/Category_Controller/ManageTbl_category');
    }

    public function changeStatusText_category($tbl_brand_category_id) {

      $edit = $this->Category_model->TextchangeStatus($tbl_brand_category_id);
      $this->session->set_flashdata('success', 'Category '.$edit.' Successfully');
      redirect('Category/Category_Controller/ManageText_category');
    }


    public function changeStatusText_status($tbl_id) {

      $edit = $this->Category_model->TextstatuschangeStatus($tbl_id);
      $this->session->set_flashdata('success', 'Status '.$edit.' Successfully');
      redirect('Category/Category_Controller/ManageText_status');
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




    public function addText_category() {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $data['categorydropdown'] = $this->Category_model->parent_zero_category();
      $this->load->view('category/add-text_category',$data);
      $this->load->view('Dashboard/footer.php');
    }


    public function addText_status()
    {
      $id= $this->session->userdata('session_id');
      $data['admin']=$this->Adminmodel->getadmin($id);
      $data['menu_groups']=$this->Menu->getAllMenuGroup();
      $data['menu_details']=$this->Menu->getAllMenu();
      $data['admin_role']=$this->Menu->adminrole();
      $this->load->view('Dashboard/header.php',$data);
      $this->load->view('Dashboard/side.php');
      $data['categorydropdown'] = $this->Category_model->all_text_category();
      $this->load->view('category/add-text_status',$data);
      $this->load->view('Dashboard/footer.php');
    }
    
  }