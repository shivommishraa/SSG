<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrScanner extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'Admin_model/Adminmodel',
            'Warehouse/Warehouse_model',
            'Qanswer_model/Qa_model',
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
    $allData = $this->Qa_model->getAll();

    // Check if there are questions available
    if (!empty($allData)) {
        // Randomly select a question
        $randomKey = array_rand($allData);
        $selectedQuestion = $allData[$randomKey];

        // Prepare the question and correct answer
        $data['question'] = $selectedQuestion->question; // Access as object property
        $data['correct_answer'] = $selectedQuestion->answer; // Access as object property

        // Ensure options are an array
        if (is_string($selectedQuestion->options)) {
            // Convert string to array (assuming options are comma-separated)
            $data['options'] = explode(',', $selectedQuestion->options);
        } else {
            $data['options'] = $selectedQuestion->options; // Assuming it's already an array
        }

        // Ensure the correct answer is included in the options and shuffle
        if (!in_array($data['correct_answer'], $data['options'])) {
            $data['options'][] = $data['correct_answer'];
        }
        shuffle($data['options']);

        // Store the correct answer in session
        $this->session->set_userdata('correct_answer', $data['correct_answer']);
    } else {
        // Handle case where there are no questions
        $data['error'] = "No questions available.";
    }

    $this->load->view('Ssgwebsite/website/scan/scan_result', $data);
}



    public function checkanswer() {
    $answer = $this->input->post('answer');
    $correctAnswer = $this->session->userdata('correct_answer');

    // Initialize data array
    $data = [];

    // Validate the answer
    if ($answer == $correctAnswer) {
        $data['message'] = 'Thank you! You passed the puzzle!';
        $data['isCorrect'] = true; // Set a flag for correctness
    } else {
        $data['message'] = 'Sorry, that\'s not correct. Please try again.';
        $data['isCorrect'] = false; // Set a flag for incorrectness
    }

    // Load the view with the data
    $this->load->view('Ssgwebsite/website/scan/checkanswer', $data);
}

}
