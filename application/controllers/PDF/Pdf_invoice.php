<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_invoice extends CI_Controller {


  public function __construct() {
    parent::__construct();
    $this->load->model(array('Admin_model/Adminmodel','Report_pdf/Daywise_pdf_m'));
    $this->load->model('Menu_model/Menu');
    $this->load->model(array('Admin_model/User_model','Compaign_model/Compaign_model','Admin_model/Role_model','Task/Task_model','Location/Location','Designation/Designation_model'));
    $this->load->model(array('Invoice/Invoice'));
    $this->load->helper('url');
    $this->load->library("pagination");
    $this->load->library('session');
    $this->load->library('Pdf');
    $this->load->helper(array('url','form'));
    if(!$this->session->userdata('validated')){
      redirect('login');
    }

  }
  

  public function pdfInvoice($in_id)
  {

    $data=array();
    $htmlContent='';
    $data['date']=date('Y-m-d');
    $setting=$this->Daywise_pdf_m->setting();

    $data['designation']=$this->Designation_model->all_designation();
    $data['invoice_detail']=$this->Invoice->all_invoice_data($in_id);
    $data['setting']=$this->Invoice->setting();
    $data['getItem']=function($eid){
      return $this->Invoice->all_itm_data($eid);  };
      $data['itm_data']=$this->Invoice->all_itm_data($in_id);
      $data['getstatename']=function($eid){
        return $this->Invoice->getstatename($eid);  };
        $data['getclientname']=function($eid){
          return $this->Invoice->getclientdata($eid);  };
          $data['term_con']=function($eid){
            return $this->Invoice->getterm_con($eid);  };
            $date= $data['date'];
            $reportn='Invoice: '.$date;
            $htmlContent=$this->load->view('PDF/Pdf_invoice',$data,true); 
            $createPDFFile=time().'.pdf';
            $this->createPDF('Daywise Report'.$createPDFFile,$htmlContent,$reportn,$setting);
            redirect('balance-leave'.$createPDFFile);

          }



          public function createPDF($fileName,$html,$reportn,$setting) {
            
            ob_start(); 

            $this->load->library('Pdf');
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Madhur');
            $pdf->SetTitle('Invoice');
            $pdf->SetSubject('Invoice');
            $pdf->SetKeywords('PDF');
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
              require_once(dirname(__FILE__).'/lang/eng.php');
              require_once(dirname(__FILE__).'/lang/eng.php');
              $pdf->setLanguageArray($l);
            }

            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false); 
            $pdf->AddPage();
            //$pdf->Image('assets/images/firstrite_logo1.png', 15, 5, 45, 40, 'PNG', '', '', true, 150, 'R', false, false, 0, false, false, false);

            $pdf->SetRightMargin(0);
            $pdf->SetFont('helvetica', 'B', 20);
            $pdf->cell(0, 15, '<< INVOICE >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf->Ln();
            $pdf->SetFont('times', '', 13, 0, 'false');
            $pdf->cell(7,0,'From',0,0,'C'); 
            $pdf->SetFont('times', 'B', 13, 0, 'false');
            $pdf->Ln();
            $pdf->cell(39,0,$setting[2]->setting_value,0,0,'C'); 
            $pdf->Ln();
            $pdf->SetFont('times', 'L', 11); 

            $pdf->cell(55,0,$setting[3]->setting_value,0,0,'C'); 
            $pdf->Ln(); 
            $pdf->SetFont('times', 'L', 11);
            $pdf->cell(82,0,$setting[4]->setting_value,0,1,'C'); 
            $pdf->cell(20,0,$setting[5]->setting_value,0,1,'C');
            $pdf->cell(40,0,'Phone: '.$setting[7]->setting_value,0,1,'C');  
            $pdf->cell(33,0,'Email: '.$setting[6]->setting_value,0,1,'C'); 
            $pdf->Ln(); 
            $pdf->Ln(); 
            $pdf->SetFont('times', '', 13, 0, 'false');
            $pdf->cell(1,0,'To',0,0,'C'); 
            //$pdf->SetRightMargin(0);
            //$pdf->SetFont('Helvetica', '', 9);
            $pdf->writeHTMLCell(210,0,0,'',$html,0,'C');
            ob_end_clean();
           //$pdf->Output($fileName,'D');
            $pdf->Output($fileName,'i');
          }

    public function delivery_note($in_id)
    {
      
      $data=array();
      $htmlContent='';
      $data['date']=date('Y-m-d');
      $setting=$this->Daywise_pdf_m->setting();
      $data['designation']=$this->Designation_model->all_designation();
      $data['invoice_detail']=$this->Invoice->all_invoice_data($in_id);
      $invoice_detail=$this->Invoice->all_invoice_data($in_id);
      $data['setting']=$this->Invoice->setting();
      $data['adminji']=$this->Invoice->get_all_admin();
      $data['admin_role']=$this->Menu->adminrole();
      $data['getItem']=function($eid){
          return $this->Invoice->all_itm_data($eid);  };
      $data['itm_data']=$this->Invoice->all_itm_data($in_id);
      $data['getstatename']=function($eid){
            return $this->Invoice->getstatename($eid);  };
      $data['getclientname']=function($eid){
              return $this->Invoice->getclientdata($eid);  };
      $data['term_con']=function($eid){
                return $this->Invoice->getterm_con($eid);  };
      $date= $data['date'];
      $reportn='Delivery Note: '.$date;
      $htmlContent=$this->load->view('Invoice/delivery_note',$data,true); 
      $createPDFFile=time().'.pdf';
                $this->createPDF_Delivery('Delivery Note'.$createPDFFile,$htmlContent,$reportn,$setting,$invoice_detail);
      redirect('balance-leave'.$createPDFFile);


       
    }


     public function createPDF_Delivery($fileName,$html,$reportn,$setting,$invoice_detail) {
            
            ob_start(); 

            $this->load->library('Pdf');
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Madhur');
            $pdf->SetTitle('Delivery Note');
            $pdf->SetSubject('Invoice');
            $pdf->SetKeywords('PDF');
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
              require_once(dirname(__FILE__).'/lang/eng.php');
              require_once(dirname(__FILE__).'/lang/eng.php');
              $pdf->setLanguageArray($l);
            }

            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false); 
            $pdf->AddPage();
          
            $pdf->SetRightMargin(8);
            $pdf->SetLeftMargin(6);
            $pdf->SetFont('helvetica', 'B', 20);
           // $pdf->cell(0, 15, '-- Delivery Note --', 0, false, 'C', 0, '', 0, false, 'M', 'M');
          
            $pdf->Image('assets/images/firstrite_logo1.png', 25, 5, 75, 40, 'PNG', '', '', true, 150, 'R', false, false, 0, false, false, false);
            $pdf->Ln();
            $pdf->SetFont('times', 'B', 16, 0, 'false');

            $pdf->cell(39,0,'Delivery Note',0,0,'L');
             $pdf->Ln();
            $pdf->SetFont('times', 'L', 11);
            $pdf->Ln();
            $pdf->cell(0,0,'Delivery Order :  '.$invoice_detail[0]->inc_id,0,0,'L'); 
            $pdf->Ln(); 
            $pdf->SetFont('times', 'L', 11);
            $pdf->cell(55,0,'Invoice             :  '.$invoice_detail[0]->inc_id,0,0,'L');
            $pdf->Ln(); 
            $pdf->cell(55,0,'Due Date          :  '.$invoice_detail[0]->inc_due_date,0,0,'L');
           
            $pdf->SetTopMargin(60);
            $pdf->SetLeftMargin(8);
            $pdf->SetFont('times', '', 13, 0, 'false');
             $pdf->SetLeftMargin(6);
            $pdf->writeHTMLCell(210,0,0,'',$html,0,'C');
            ob_end_clean();
           //$pdf->Output($fileName,'D');
            $pdf->Output($fileName,'i');
          }



     public function proforma_invoice($in_id)
    {
          
      $data=array();
      $htmlContent='';
      $data['date']=date('Y-m-d');
      $setting=$this->Daywise_pdf_m->setting();
      $data['designation']=$this->Designation_model->all_designation();
      $data['invoice_detail']=$this->Invoice->all_invoice_data($in_id);
      $invoice_detail=$this->Invoice->all_invoice_data($in_id);
      $data['setting']=$this->Invoice->setting();
      $data['adminji']=$this->Invoice->get_all_admin();
      $data['admin_role']=$this->Menu->adminrole();
      $data['getItem']=function($eid){
          return $this->Invoice->all_itm_data($eid);  };
      $data['itm_data']=$this->Invoice->all_itm_data($in_id);
      $data['getstatename']=function($eid){
            return $this->Invoice->getstatename($eid);  };
      $data['getclientname']=function($eid){
              return $this->Invoice->getclientdata($eid);  };
      $data['term_con']=function($eid){
                return $this->Invoice->getterm_con($eid);  };
      $date= $data['date'];
      $reportn='Proforma Invoice: '.$date;
      $htmlContent=$this->load->view('Invoice/proforma_invoice',$data,true); 
      $createPDFFile=time().'.pdf';
                $this->createPDF_Proforma('Proforma Invoice'.$createPDFFile,$htmlContent,$reportn,$setting,$invoice_detail);
      redirect('balance-leave'.$createPDFFile);

    }

     public function createPDF_Proforma($fileName,$html,$reportn,$setting,$invoice_detail) {
            
            ob_start(); 

            $this->load->library('Pdf');
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Madhur');
            $pdf->SetTitle('Proforma Invoice');
            $pdf->SetSubject('Invoice');
            $pdf->SetKeywords('PDF');
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
              require_once(dirname(__FILE__).'/lang/eng.php');
              require_once(dirname(__FILE__).'/lang/eng.php');
              $pdf->setLanguageArray($l);
            }

            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false); 
            $pdf->AddPage();
          
            $pdf->SetRightMargin(15);
            $pdf->SetLeftMargin(6);
            $pdf->SetFont('helvetica', 'B', 20);
           // $pdf->cell(0, 15, '-- Proforma Invoice --', 0, false, 'C', 0, '', 0, false, 'M', 'M');
          
            $pdf->Image('assets/images/firstrite_logo1.png', 25, 5, 75, 40, 'PNG', '', '', true, 150, 'R', false, false, 0, false, false, false);
            $pdf->Ln();
            $pdf->SetFont('times', 'B', 16, 0, 'false');
            $pdf->cell(39,0,'Proforma Invoice',0,0,'L');
             $pdf->Ln();
            $pdf->SetFont('times', 'L', 11);
            $pdf->Ln();
            $pdf->cell(0,0,'Proforma Invoice :  '.$invoice_detail[0]->inc_id,0,0,'L'); 
            $pdf->Ln(); 
            $pdf->SetFont('times', 'L', 11);
            $pdf->cell(55,0,'Invoice Date         :  '.$invoice_detail[0]->inc_date,0,0,'L');
            $pdf->Ln(); 
            $pdf->cell(55,0,'Due Date               :  '.$invoice_detail[0]->inc_due_date,0,0,'L');
           
            $pdf->SetTopMargin(60);
            $pdf->SetLeftMargin(8);
            $pdf->SetFont('times', '', 13, 0, 'false');
             $pdf->SetLeftMargin(6);
            $pdf->writeHTMLCell(210,0,0,'',$html,0,'C');
            ob_end_clean();
           //$pdf->Output($fileName,'D');
            $pdf->Output($fileName,'i');
          }



        }