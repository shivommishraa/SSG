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
        $this->load->library('session');
      
       
  }

 	/*public function scan() {
    // This method will be called after QR code scanning
    $data['message'] = "Thanks for scanning";
    $this->load->view('Ssgwebsite/website/scan/scan_result', $data);
  }*/
 
    public function scan() {
        $data = [];

        // Check if form is submitted
        if ($this->input->post('submit')) {
            $answer = intval($this->input->post('answer'));
            $correctAnswer = $this->session->userdata('correct_answer');

            // Validate the answer
            if ($answer === $correctAnswer) {
                $data['message'] = 'Thank you! You passed the puzzle!';
            } else {
                $data['message'] = 'Sorry, that\'s not correct. Please try again.';
            }
        } else {
            // Generate a new puzzle
            $num1 = rand(1, 100);
            $num2 = rand(1, 100);

            // Store the correct answer in session
            $this->session->set_userdata('correct_answer', $num1 + $num2);

            $data['num1'] = $num1;
            $data['num2'] = $num2;
        }

        // Load the view with data
        $this->load->view('Ssgwebsite/website/scan/scan_result', $data);
    }
}

