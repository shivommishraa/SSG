<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrScanner extends CI_Controller {
    
 
  public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model/Adminmodel','Warehouse/Warehouse_model'));
        $this->load->model(array('Admin_model/Role_model','Designation/Designation_model'));
        $this->load->model('Nice_websitemodel/Nice_webmodel');
        $this->load->model('Menu_model/Menu');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->helper(array('url','form'));
       
      
       
  }

 	public function scan() {
        // This method will be called after QR code scanning
        $data['message'] = "Thanks for scanning";
        /*$this->load->view('scan_result', $data);*/
        $this->load->view('Ssgwebsite/website/scan/scan_result', $data);
    }
 

}

