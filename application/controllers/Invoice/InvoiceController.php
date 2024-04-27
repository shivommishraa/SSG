<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InvoiceController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Project/Project');
    $this->load->model('Brand_model/tbl_brand');
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->model('Menu_model/Menu');
    $this->load->model('Admin_model/Adminmodel');
    $this->load->model(array('Admin_model/User_model','Compaign_model/Compaign_model','Admin_model/Role_model','Task/Task_model','Location/Location','Designation/Designation_model'));
    $this->load->model(array('Invoice/Invoice'));
    $this->load->library('session');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }

  }



  public function addInvoices()
  {

    $id= $this->session->userdata('session_id');
    $this->load->helper(array('url','form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('warehouse','Warehouse','required|min_length[1]|max_length[40]');
    $this->form_validation->set_rules('client_id','Client Id','required|min_length[1]|max_length[40]');
    if($this->form_validation->run() == FALSE)
    {
      $pr_id=$this->input->post('pr_id');
      if(!empty($pr_id)){
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $data["Project"] = $this->Project->getDataById($pr_id);
        $data['getadmin']=function($idd){
          return $this->User_model->getDataById($idd);
        };
        $data['All_agent']=$this->User_model->get_alluser();
        $data['All_tax']=$this->Project->get_alltax();
        $data['warehouse']=$this->Location->getall_warehouse();
        $data['payment_terms']=$this->Invoice->getall_payment_terms();
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('Project/projectinvoice');
        $this->load->view('Dashboard/footer.php');
      }else{
       $this->load->view('Page_Not_Found/404_error');
     }

   }
   else
   {

     $pr_id=$this->input->post('pr_id');
     $data['pr_id']=$this->input->post('pr_id');
     $data['client_id']=$this->input->post('client_id');
     $data['warehouse']=$this->input->post('warehouse');
     $data['inc_number']=$this->input->post('inc_number');
     $data['inc_reference'] = $this->input->post('inc_reference');
     $data['add_by']= $this->session->userdata('session_id');
     $ip = $_SERVER['REMOTE_ADDR'];
     $data['add_ip']=$ip;
     $data['inc_date']=$this->input->post('inc_date');
     $data['inc_due_date']=$this->input->post('inc_due_date');
     $data['inc_tax'] = $this->input->post('inc_tax');
     $data['inc_discount']=$this->input->post('inc_discount');
     $data['inc_note']=$this->input->post('inc_note');
     $data['total_tax'] = $this->input->post('total_tax');
     $data['total_discount'] = $this->input->post('total_discount');
     $data['shipping_charge'] = $this->input->post('shipping_charge');
     $data['extra_discount'] = $this->input->post('extra_discount');
     $data['user_id']=$this->input->post('user_id');
     $data['grand_total']=$this->input->post('grand_total');
     $data['payment_terms'] = $this->input->post('payment_terms');

     $client_state=$this->input->post('client_state');
     $com_state=$this->input->post('com_state');
     if($client_state==$com_state){
      $to_tax=$data['total_tax']/2;
      $data['CGST']=$to_tax;
      $data['SGST']=$to_tax;
      $data['IGST']=0;
    }else{

      $data['CGST']=0;
      $data['SGST']=0;
      $data['IGST']=$data['total_tax'];
    }

    $q= $this->Invoice->insert_invoice($data);
    $datas['pr_id']=$this->input->post('pr_id');
    $datas['invoice_id']=$q;
    $x=count($this->input->post('itm_name'));
    for($y=0;$y<$x-1;$y++)
    {

      $datas['itm_name'] = $this->input->post('itm_name')[$y];
      $datas['itm_qty'] = $this->input->post('itm_qty')[$y];
      $datas['itm_rate'] =$this->input->post('itm_rate')[$y];
      $datas['itm_tax_per'] =$this->input->post('itm_tax_per')[$y];
      $datas['itm_tax'] = $this->input->post('itm_tax')[$y];
      $datas['itm_discount'] =$this->input->post('itm_discount')[$y];
      $datas['itm_amount'] = $this->input->post('itm_amount')[$y];
      $datas['itm_remark'] = $this->input->post('itm_remark')[$y];

      $insert=$this->Invoice->insert_item_details($datas);
    }



    if($q){

     $project_id=$this->input->post('pr_id');
     $this->session->set_flashdata('success', 'Success: Invoice has been created successfully!');
     $id= $this->session->userdata('session_id');
     $data['admin']=$this->Adminmodel->getadmin($id);
     $data['menu_groups']=$this->Menu->getAllMenuGroup();
     $data['menu_details']=$this->Menu->getAllMenu();
     $data['admin_role']=$this->Menu->adminrole();
     $data["Project"] = $this->Project->getDataById($pr_id);
     $data['invoice_id']=$q;
     $data['getadmin']=function($idd){
      return $this->User_model->getDataById($idd);
    };
    $this->load->view('Dashboard/header.php',$data);
    $this->load->view('Dashboard/side.php');
    $this->load->view('Invoice/successInvoice');
    $this->load->view('Dashboard/footer.php');

  }
}

}

public function cal()
{
  $this->load->view('Invoice/cal');
}


public function viewInvoice($in_id)
{
  $data['invoice_id']=$in_id;
  $id= $this->session->userdata('session_id');
  $data['admin']=$this->Adminmodel->getadmin($id);
  $data['menu_groups']=$this->Menu->getAllMenuGroup();
  $data['menu_details']=$this->Menu->getAllMenu();
  $data['admin_role']=$this->Menu->adminrole();
  $data['designation']=$this->Designation_model->all_designation();
  $data['invoice_detail']=$this->Invoice->all_invoice_data($in_id);
  $data['setting']=$this->Invoice->setting();
  $data['itm_data']=$this->Invoice->all_itm_data($in_id);
  $data['getclientname']=function($eid){
    return $this->Invoice->getclientdata($eid);  };
    $data['term_con']=function($eid){
      return $this->Invoice->getterm_con($eid);  };

      $data['getinc_status']=function($eid){
        return $this->Invoice->getinc_status($eid);  };

        $data['item_cal_detail']=$this->Invoice->item_cal_detail($in_id);
        $this->load->view('Dashboard/header.php',$data);
        $this->load->view('Dashboard/side.php');
        $this->load->view('Invoice/viewInvoice',$data); 
        $this->load->view('Dashboard/footer.php');

      }

      public function printInvoice($in_id){

        $data['invoice_id']=$in_id;
        $id= $this->session->userdata('session_id');
        $data['admin']=$this->Adminmodel->getadmin($id);
        $data['menu_groups']=$this->Menu->getAllMenuGroup();
        $data['menu_details']=$this->Menu->getAllMenu();
        $data['admin_role']=$this->Menu->adminrole();
        $data['designation']=$this->Designation_model->all_designation();
        $data['invoice_detail']=$this->Invoice->all_invoice_data($in_id);
        $data['setting']=$this->Invoice->setting();
        $data['itm_data']=$this->Invoice->all_itm_data($in_id);
        $data['getclientname']=function($eid){
          return $this->Invoice->getclientdata($eid);  };
          $data['term_con']=function($eid){
            return $this->Invoice->getterm_con($eid);  };
            $data['item_cal_detail']=$this->Invoice->item_cal_detail($in_id);
   // $this->load->view('Dashboard/header.php',$data);
   // $this->load->view('Dashboard/side.php');
            $this->load->view('Invoice/printInvoice',$data); 
            $this->load->view('Dashboard/footer.php');

          }



          public function previewInvoice($in_id){

            $data['invoice_id']=$in_id;
            if(!empty($data['invoice_id'])){
              $id= $this->session->userdata('session_id');
              $data['admin']=$this->Adminmodel->getadmin($id);
              $data['menu_groups']=$this->Menu->getAllMenuGroup();
              $data['menu_details']=$this->Menu->getAllMenu();
              $data['admin_role']=$this->Menu->adminrole();
              $data['designation']=$this->Designation_model->all_designation();
              $data['invoice_detail']=$this->Invoice->all_invoice_data($in_id);
              $data['setting']=$this->Invoice->setting();
              $data['itm_data']=$this->Invoice->all_itm_data($in_id);
              $data['getclientname']=function($eid){
                return $this->Invoice->getclientdata($eid);  };
                $data['term_con']=function($eid){
                  return $this->Invoice->getterm_con($eid);  };
                  $data['item_cal_detail']=$this->Invoice->item_cal_detail($in_id);
                  $this->load->view('Invoice/previewInvoice',$data); 
                  $this->load->view('Dashboard/footer.php');
                }
                else{
                  $this->load->view('Page_Not_Found/404_error',$data);
                }

              }

              public function editInvoice($in_id)
              {

                $data['invoice_id']=$in_id;
                $id= $this->session->userdata('session_id');
                $data['admin']=$this->Adminmodel->getadmin($id);
                $data['menu_groups']=$this->Menu->getAllMenuGroup();
                $data['menu_details']=$this->Menu->getAllMenu();
                $data['admin_role']=$this->Menu->adminrole();
                $data['designation']=$this->Designation_model->all_designation();
                $data['invoice_detail']=$this->Invoice->all_invoice_data($in_id);
                $data['All_agent']=$this->User_model->get_alluser();
                $data['All_tax']=$this->Project->get_alltax();
                $data['warehouse']=$this->Location->getall_warehouse();
                $data['payment_terms']=$this->Invoice->getall_payment_terms();
                $data['getItem']=function($eid){
                  return $this->Invoice->all_itm_data($eid);  };
                  $data['setting']=$this->Invoice->setting();
                  $data['itm_data']=$this->Invoice->all_itm_data($in_id);
                  $data['getclientname']=function($eid){
                    return $this->Invoice->getclientdata($eid);  };
                    $data['term_con']=function($eid){
                      return $this->Invoice->getterm_con($eid);  };
                      $this->load->view('Dashboard/header.php',$data);
                      $this->load->view('Dashboard/side.php');
                      $this->load->view('Invoice/editInvoice',$data); 
                      $this->load->view('Dashboard/footer.php');
                    }
                    public function editPostInvoices()
                    {
                      $id= $this->session->userdata('session_id');
                      $this->load->helper(array('url','form'));
                      $this->load->library('form_validation');
                      $this->form_validation->set_rules('warehouse','Warehouse','required|min_length[1]|max_length[40]');
                      /*  $this->form_validation->set_rules('client_id','Client Id','required|min_length[1]|max_length[40]');*/
                      if($this->form_validation->run() == FALSE)
                      {
                        $inc_id=$this->input->post('inc_id');

                        if(!empty($inc_id)){

                          $data['invoice_id']=$inc_id;
                          $id= $this->session->userdata('session_id');
                          $data['admin']=$this->Adminmodel->getadmin($id);
                          $data['menu_groups']=$this->Menu->getAllMenuGroup();
                          $data['menu_details']=$this->Menu->getAllMenu();
                          $data['admin_role']=$this->Menu->adminrole();
                          $data['designation']=$this->Designation_model->all_designation();
                          $data['invoice_detail']=$this->Invoice->all_invoice_data($inc_id);
                          $data['All_agent']=$this->User_model->get_alluser();
                          $data['All_tax']=$this->Project->get_alltax();
                          $data['warehouse']=$this->Location->getall_warehouse();
                          $data['payment_terms']=$this->Invoice->getall_payment_terms();
                          $data['getItem']=function($eid){
                            return $this->Invoice->all_itm_data($eid);  };
                            $data['setting']=$this->Invoice->setting();
                            $data['itm_data']=$this->Invoice->all_itm_data($inc_id);
                            $data['getclientname']=function($eid){
                              return $this->Invoice->getclientdata($eid);  };
                              $data['term_con']=function($eid){
                                return $this->Invoice->getterm_con($eid);  };
                                $this->load->view('Dashboard/header.php',$data);
                                $this->load->view('Dashboard/side.php');
                                $this->load->view('Invoice/editInvoice',$data); 
                                $this->load->view('Dashboard/footer.php');
                              }else{
                               $this->load->view('Page_Not_Found/404_error');
                             }

                           }
                           else
                           {

                             $inc_id=$this->input->post('inc_id');
                             $data['pr_id']=$this->input->post('pr_id');
                             $data['client_id']=$this->input->post('client_id');
                             $data['warehouse']=$this->input->post('warehouse');
                             $data['inc_number']=$this->input->post('inc_number');
                             $data['inc_reference'] = $this->input->post('inc_reference');
                             $data['add_by']= $this->session->userdata('session_id');
                             $ip = $_SERVER['REMOTE_ADDR'];
                             $data['add_ip']=$ip;
                             $data['inc_date']=$this->input->post('inc_date');
                             $data['inc_due_date']=$this->input->post('inc_due_date');
                             $data['inc_tax'] = $this->input->post('inc_tax');
                             $data['inc_discount']=$this->input->post('inc_discount');
                             $data['inc_note']=$this->input->post('inc_note');
                             $data['total_tax'] = $this->input->post('total_tax');
                             $data['total_discount'] = $this->input->post('total_discount');
                             $data['shipping_charge'] = $this->input->post('shipping_charge');
                             $data['extra_discount'] = $this->input->post('extra_discount');
                             $data['user_id']=$this->input->post('user_id');
                             $data['grand_total']=$this->input->post('grand_total');
                             $data['payment_terms'] = $this->input->post('payment_terms');

                             $q= $this->Invoice->update_invoice($inc_id,$data);

                             $datas['pr_id']=$this->input->post('pr_id');
                             $datas['invoice_id']=$this->input->post('inc_id');
                             $x=count($this->input->post('itm_name'));
                             for($y=0;$y<$x-1;$y++)
                             {

                              $datas['itm_name'] = $this->input->post('itm_name')[$y];
                              $datas['itm_qty'] = $this->input->post('itm_qty')[$y];
                              $datas['itm_rate'] =$this->input->post('itm_rate')[$y];
                              $datas['itm_tax_per'] =$this->input->post('itm_tax_per')[$y];
                              $datas['itm_tax'] = $this->input->post('itm_tax')[$y];
                              $datas['itm_discount'] =$this->input->post('itm_discount')[$y];
                              $datas['itm_amount'] = $this->input->post('itm_amount')[$y];
                              $datas['itm_remark'] = $this->input->post('itm_remark')[$y];
                              $data['itm_detail_id'] = $this->input->post('itm_detail_id')[$y];
                              print_r($data['itm_detail_id'].'fdf');
                              if( $data['itm_detail_id']=='noid'){
                                $datas['invoice_id']=$this->input->post('inc_id');
                                $insert=$this->Invoice->insert_item_details($datas);
                              }else{
                                $update=$this->Invoice->update_item_details( $data['itm_detail_id'],$datas);
                              }
                            }



                            if($q){

                             $project_id=$this->input->post('pr_id');
                             $this->session->set_flashdata('success', 'Success: Invoice has been Updated successfully!');
                             $id= $this->session->userdata('session_id');
                             $data['admin']=$this->Adminmodel->getadmin($id);
                             $data['menu_groups']=$this->Menu->getAllMenuGroup();
                             $data['menu_details']=$this->Menu->getAllMenu();
                             $data['admin_role']=$this->Menu->adminrole();
                             $data["Project"] = $this->Project->getDataById($project_id);
                             $data['invoice_id']=$this->input->post('inc_id');
                             $data['getadmin']=function($idd){
                              return $this->User_model->getDataById($idd);
                            };
                            $this->load->view('Dashboard/header.php',$data);
                            $this->load->view('Dashboard/side.php');
                            $this->load->view('Invoice/successInvoice');
                            $this->load->view('Dashboard/footer.php');

                          }
                        }
                      }


                      /*SELECT itm_tax_per,sum(itm_tax) itm_tax ,sum(itm_rate*itm_qty) gross_rate FROM `invoice_item_deatils` WHERE invoice_id=5 GROUP by itm_tax_per*/


                      public function status_data()
                      {
                        $data['inc_id']=$_POST['inc_id'];
                        $data['inc_status'] = $this->Invoice->getallIncstatus();
                        $data['invoice']=$this->Invoice->all_invoice_data($data['inc_id']);
                        $this->load->view('Invoice/Invoice_status.php',$data);
                      }

                      public function addStatus_invoice()
                      {
                       $inc_id=$this->input->post('inc_id');
                       $data['inc_status']=$this->input->post('inc_status');
                       $this->Invoice->update_inc_status($inc_id,$data);
                       if( $data['inc_status']=='00'){
                       $this->session->set_flashdata('success', 'Success: Invoice has been successfully canceled. All related payment transactions are deleted.');
                       }else{
                         $this->session->set_flashdata('success', 'Success: Details updated successfully !!');
                       }
                       redirect('Invoice/InvoiceController/viewInvoice/'.$inc_id);

                     }

                     public function inc_cancelconfirmation()
                     {
                       $data['inc_id']=$_POST['inc_id'];
                       $data['status']='00';
                       $data['inc_status'] = $this->Invoice->getallIncstatus();
                       $data['invoice']=$this->Invoice->all_invoice_data($data['inc_id']);
                       $this->load->view('Invoice/cancel_confirm.php',$data);
                     }


                   }