<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrScanner extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load necessary models and helpers
        $this->load->model(array(
            'Admin_model/Adminmodel',
            'Warehouse/Warehouse_model',
            'Admin_model/Role_model',
            'Designation/Designation_model',
            'Nice_websitemodel/Nice_webmodel',
            'Menu_model/Menu'
        ));
        
        $this->load->library(array('session', 'pagination'));
        $this->load->helper(array('url', 'form'));
    }

    public function scan() {
        $data = [];
            // Generate a new puzzle
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        // Store the correct answer in session
        $this->session->set_userdata('correct_answer', $num1 + $num2);
        $data['num1'] = $num1;
        $data['num2'] = $num2;
        $this->load->view('Ssgwebsite/website/scan/scan_result', $data);
    }

    public function checkanswer(){
        $answer = $this->input->post('answer');
        echo $correctAnswer = $this->session->userdata('correct_answer');
        exit;
        // Validate the answer
        if ($answer == $correctAnswer) {
            $data['message'] = 'Thank you! You passed the puzzle!';
        } else {
            $data['message'] = 'Sorry, that\'s not correct. Please try again.';
        }

        $this->load->view('Ssgwebsite/website/scan/checkanswer', $data);
    }
}
