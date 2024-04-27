<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
    
 
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel'));
        $this->load->model(array('Admin_model/Role_model'));
        $this->load->model(array('Department/Department_model'));
        $this->load->model('Menu_model/Menu');
        $this->load->model('Ordermodel/Order');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
      
  }
  public function manageorder()
  {
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
      //============================ Start Pager Code ==============================
    $name=($this->input->post('name')) ? $this->input->post('name') :0;
    $name=($this->uri->segment(4)) ?  $this->uri->segment(4) :$name;
    $this->load->config('bootstrap_pagination');
    $config = $this->config->item('pagination_config');;
    $config['base_url'] = base_url() ."Order/OrderController/manageorder"."/$name";
    $config['total_rows'] = $this->Order->get_count($name);
    $config['per_page'] = 10;
    $config['uri_segment'] = 5;
    
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    $data['links'] = $this->pagination->create_links();
          //============================ End Pager Code ==============================
    $data["orders"] = $this->Order->getOrders($config['per_page'],$page,$name);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Order/manageorder',$data);
    $this->load->view('Dashboard/footer.php');
}

/*--------------- Code for delete the tble role ------------*/
public function deleteorder($id) {
    $delete = $this->Order->delete($id);
    $this->session->set_flashdata('success', 'Order deleted.');
    redirect('Order/OrderController/manageorder');
}

public function viewOrder()
{
    $userid=$_POST['id'];
    $data['order'] = $this->Order->getDataById($userid);
    $this->load->view('Order/viewOrder',$data);
}

public function changeStatusOrder($id) {
 
    $edit = $this->Order->changeStatus($id);
    $this->session->set_flashdata('success', 'Order '.$edit.' Successfully');
    redirect('Order/OrderController/manageorder');
}

/*------------ Code for Edit the role --------------*/
public function editOrder($sid)
{
    $id= $this->session->userdata('session_id');
    $data['admin']=$this->Adminmodel->getadmin($id);
    $data['menu_groups']=$this->Menu->getAllMenuGroup();
    $data['menu_details']=$this->Menu->getAllMenu();
    $data['admin_role']=$this->Menu->adminrole();
    $data['order'] = $this->Order->getDataById($sid);
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Order/editOrder',$data);
    $this->load->view('Dashboard/footer.php');
}

/*---------------------- Code for update the post the role---------------*/

public function updateOrderDetails() {
    $id = $this->input->post('id');
    $data['name'] = $this->input->post('name');
    $data['mobile'] = $this->input->post('mobile');
    $data['address'] = $this->input->post('address');
    $data['products'] = $this->input->post('products');
    $edit = $this->Order->update($id,$data);
    if ($edit) {
        $this->session->set_flashdata('success', 'Order Updated Successfully.');
        redirect('Order/OrderController/manageorder');
    }
}


public function error_page()
{
    
 $id= $this->session->userdata('session_id');
 $data['admin']=$this->Adminmodel->getadmin($id);
 $data['total_admin']=$this->Adminmodel->total_admin();
 $this->load->view('Page_Not_Found/404_error.php',$data);
 
 
}


}