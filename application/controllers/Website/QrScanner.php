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



   /* public function checkanswer() {
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
}*/
public function checkanswer() {
    $answer = $this->input->post('answer');
    $correctAnswer = $this->session->userdata('correct_answer');

    // Initialize data array
    $data = [];
    
    // Get the number of attempts from the session
    $attempts = $this->session->userdata('attempts') ?? 0;

    // Validate the answer
    if ($answer == $correctAnswer) {
        // User answered correctly
        $data['message1'] = 'Thank you so much! You passed the puzzle!'; // Acknowledgment message
        
        if ($attempts >= 2) {
            $randomNumber = rand(1, 100); // Generates a number between 1 and 100
            
            switch ($randomNumber) {
                case 5:
                    $data['message2'] = 'Congratulations! Enjoy a delicious 5 rupee chocolate as a treat!';
                    break;
                case 1:
                    $data['message2'] = 'Awesome! Here’s a lovely pack of 5 rupee chips for you!';
                    break;
                case 10:
                    $data['message2'] = 'Fantastic! You’ve earned a 10 rupee discount on your total purchase!';
                    break;
                default:
                    $data['message2'] = 'Thank you for your efforts! Better luck next time!';
            }
        } else {
            // If fewer than 2 attempts
            $data['message2'] = ''; // No prize message for fewer than 2 attempts
        }

        $data['isCorrect'] = true; // Set a flag for correctness

        // Reset attempts since the answer is correct
        $this->session->set_userdata('attempts', 0);
    } else {
        // User answered incorrectly
        $data['message1'] = 'Sorry, that\'s not correct. Please try again!'; // Acknowledgment message
        $data['message2'] = ''; // No prize message
        
        // Increment the attempt count
        $attempts++;
        $this->session->set_userdata('attempts', $attempts);
    }

    // Load the view with the data
    $this->load->view('Ssgwebsite/website/scan/checkanswer', $data);
}


}
