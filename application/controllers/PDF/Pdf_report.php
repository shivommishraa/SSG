<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_report extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel','Report_pdf/Daywise_pdf_m'));
        $this->load->model(array('Admin_model/Role_model','AgentCSR_model/CSR_model','Compaign_model/Compaign_model','Admin_model/User_model'));
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->library('Pdf');
        $this->load->helper(array('url','form'));
        if(!$this->session->userdata('validated')){
          redirect('login');
      }
      
  }
  
  public function Daywise_report_pdf($date=''){
    
    $data=array();
    $htmlContent='';
    if(!empty($date)){
        $data['date']=$date;
    }else{
     $data['date']=date('Y-m-d');}
     $setting=$this->Daywise_pdf_m->setting();
     $data["userlogindata"] = $this->Daywise_pdf_m->getAll_user();
     $data['get_comp_value']=function($adminid,$compid,$date){
        return $this->Daywise_pdf_m->get_comp_value($adminid,$compid,$date);
    };
    $data['get_role']=function($adminid){
        return $this->Role_model->getDataById($adminid);
    };
    $data["all_process"] = $this->Compaign_model->all_Compaign();
    $data["all_role"] = $this->User_model->getAll_role();
    $date= $data['date'];
    $reportn='Daywise Report for Date: '.$date;
    $htmlContent=$this->load->view('Report_PDF/Daywise_pdf',$data,true); 
    $createPDFFile=time().'.pdf';
    $this->createPDF('Daywise Report'.$createPDFFile,$htmlContent,$reportn,$setting);
    redirect('balance-leave'.$createPDFFile);
    
}

public function createPDF($fileName,$html,$reportn,$setting) {
    ob_start(); 
    
    $this->load->library('Pdf');
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Neo');
    $pdf->SetTitle('Daywise Report');
    $pdf->SetSubject('Report');
    $pdf->SetKeywords('PDF');
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false); 
    $pdf->AddPage();
    $pdf->SetFont('times', 'B', 13, 0, 'false');
    $pdf->cell(198,0,$setting[2]->setting_value,0,0,'C'); 
    $pdf->Ln();
    $pdf->SetFont('times', 'L', 8); 
    $pdf->SetMargins(0, 120,0); 
    $pdf->cell(193,0,$setting[3]->setting_value,0,0,'C'); 
    $pdf->Ln(); 
    $pdf->SetFont('times', 'R', 8);
    $pdf->cell(217,0,$setting[4]->setting_value,0,1,'C'); 
    $pdf->Ln();
    $pdf->SetFont('Helvetica', '', 10);
    $pdf->cell(220,0,$reportn,0,1,'C'); 
    $pdf->Ln();
    $pdf->SetFont('Helvetica', '', 9);
    $pdf->writeHTMLCell(210,0,0,'',$html,0,'C');
     //$pdf->writeHTML($html, true, false, false, false, '');
    ob_end_clean();
     //$pdf->Output($fileName,'D');
    $pdf->Output($fileName,'i');
}


}