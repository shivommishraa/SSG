<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        class LocationController extends CI_Controller {
    
       public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel'));
        $this->load->model(array('Admin_model/Role_model','Designation/Designation_model','Location/Location'));
         $this->load->model('Menu_model/Menu');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
      
  }
        
         public function index()
         {
            
                $id= $this->session->userdata('session_id');
                $data['admin']=$this->Adminmodel->getadmin($id);
                $data['menu_groups']=$this->Menu->getAllMenuGroup();
                $data['menu_details']=$this->Menu->getAllMenu();
                $data['admin_role']=$this->Menu->adminrole();
                $data['designation']=$this->Designation_model->all_designation();
                $data['company']=$this->Location->getallcompany();
                $this->load->view('Dashboard/header.php',$data);
                $this->load->view('Dashboard/side.php');
                $this->load->view('Location/frm_location',$data); 
                $this->load->view('Dashboard/footer.php');

         
         }
    
        public function reg_location()
        {
            
             $this->load->helper(array('url','form'));
             $this->load->library('form_validation');
             $this->form_validation->set_rules('location_name','Location Name','trim|required|min_length[2]|max_length[40]');
             $this->form_validation->set_rules('comp_id','Company Name','trim|required|min_length[1]|max_length[40]');
            if($this->form_validation->run() == FALSE)
            {
            
                $id= $this->session->userdata('session_id');
                $data['admin']=$this->Adminmodel->getadmin($id);
                $data['menu_groups']=$this->Menu->getAllMenuGroup();
                $data['menu_details']=$this->Menu->getAllMenu();
                $data['admin_role']=$this->Menu->adminrole();
                $data['designation']=$this->Designation_model->all_designation();
                $data['company']=$this->Location->getallcompany();
                $this->load->view('Dashboard/header.php',$data);
                $this->load->view('Dashboard/side.php');
                $this->load->view('Location/frm_location',$data); 
                $this->load->view('Dashboard/footer.php');
         
            }
            else
            {
                
             $data['location_name'] = $this->input->post('location_name');
             $data['comp_id'] = $this->input->post('comp_id');
             $this->Location->insert($data);
             $this->session->set_flashdata('success', 'Location added Successfully');
             redirect('Location/LocationController/listLocation'); 
           
           }
        }
       
       
          public function listLocation()
          {

              $id= $this->session->userdata('session_id');
              $data['admin']=$this->Adminmodel->getadmin($id);
              $data['menu_groups']=$this->Menu->getAllMenuGroup();
              $data['menu_details']=$this->Menu->getAllMenu();
              $data['admin_role']=$this->Menu->adminrole();
                    
          
              //============================ Start Pager Code ==============================
                $name=($this->input->post('location_name')) ? $this->input->post('location_name') :0;
                $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
                $this->load->config('bootstrap_pagination');
                $config = $this->config->item('pagination_config');;
                $config['base_url'] = base_url() ."Location/LocationController/listLocation"."/$name";
                $config['total_rows'] = $this->Location->get_count($name);
                $config['per_page'] = 10;
                $config['uri_segment'] = 5;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                $data['links'] = $this->pagination->create_links();
                      //============================ End Pager Code ==============================
                if(!empty($name)){ $data['searchname']=$name;}
                $data["location"] = $this->Location->getalllocation($config['per_page'],$page,$name);
                $data['company']=$this->Location->getallcompany();
                $this->load->view('Dashboard/header.php',$data);
                $this->load->view('Dashboard/side.php');
                $this->load->view('Location/listLocation',$data);
                $this->load->view('Dashboard/footer.php');
                        
            
             }
     
      
            public function delLocation($id)
            {
             $delete = $this->Location->delete($id);
              $this->session->set_flashdata('success','Location details Deleted Successfully ');
              redirect('Location/LocationController/listLocation'); 
            }
  
             public function editLocation($cid)
            {

                $data['location']=$cid;
                $data['location']=$this->Location->getDataById($cid);
                $id= $this->session->userdata('session_id');
                $data['admin']=$this->Adminmodel->getadmin($id);
                $data['menu_groups']=$this->Menu->getAllMenuGroup();
                $data['menu_details']=$this->Menu->getAllMenu();
                $data['admin_role']=$this->Menu->adminrole();
                $data['designation']=$this->Designation_model->all_designation();
                $data['company']=$this->Location->getallcompany();
                $this->load->view('Dashboard/header.php',$data);
                $this->load->view('Dashboard/side.php');
                $this->load->view('Location/editLocation',$data); 
                $this->load->view('Dashboard/footer.php');
        
     
             }
   
    
              public function editsinglelocation()
              {

                $this->load->helper(array('url','form'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('location_name','Location Name','trim|required|min_length[1]|max_length[40]');
                $this->form_validation->set_rules('comp_id','Company Name','trim|required|min_length[1]|max_length[40]');

                if($this->form_validation->run() == FALSE)
                {
                   $datas = $this->input->post('location_id');
                   redirect ("Locagion/LocationController/editLocation/$datas ");
               }
               else
               {

                  $cate_id=$this->input->post('location_id');
                  $data['location_name'] = $this->input->post('location_name');
                  $data['comp_id']=$this->input->post('comp_id');
                  $this->Location->editsinglelocation($cate_id,$data);
                  $this->session->set_flashdata('success','Location details updated successfully ');
                  redirect('Location/LocationController/listLocation'); 

              }
              
          }
                
            public function changestatus($id)
            {
               $edit = $this->Location->changeStatus($id);
               $this->session->set_flashdata('success','Location Status Updated Successfully');
               redirect('Location/LocationController/listLocation');
            }


          
    
    
    
  }  
  