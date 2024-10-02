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
        $data['message1'] = 'Nice.. Correct answer!'; // Acknowledgment message
        $data['isCorrect'] = true;
        if ($attempts >= 5) {
            $randomNumber = rand(1, 100); // Generates a number between 1 and 100
            
            switch ($randomNumber) {
                case 1:
                    $data['message2'] = 'Congratulations! Enjoy a delicious 5 rupee chocolate as a treat!';
                    break;
                case 5:
                    $data['message2'] = 'Awesome! Here’s a lovely pack of 5 rupee chips for you!';
                    break;
                case 10:
                    $data['message2'] = 'Fantastic! You’ve earned a 10 rupee discount on your total purchase!';
                    break;
                case 15:
                    $data['message2'] = 'Fantastic! You are an SSG HYPER MART super customer!';
                    break;
                case 20:
                    $data['message2'] = 'Awesome! You are a valued customer at SSG HYPER MART!';
                    break;
                case 21:
                    $data['message2'] = 'Congratulations! Relish a yummy 5 rupee biscuit as a sweet reward!';
                    break;
                case 30:
                    $data['message2'] = 'Dazzling! You are an SSG HYPER MART amazing customer!';
                    break;
                case 40:
                    $data['message2'] = 'Spectacular! You are an SSG HYPER MART VIP customer!';
                    break;
                case 50:
                    $data['message2'] = 'Fantastic! Welcome to the SSG HYPER MART family, our amazing customer!';
                    break;
                case 60:
                    $data['message2'] = 'Wonderful! Thank you for being an extraordinary customer at SSG HYPER MART!';
                    break;
                case 70:
                    $data['message2'] = 'Remarkable! You are a super customer at SSG HYPER MART!';
                    break;
                case 80:
                    $data['message2'] = 'Incredible! You are an SSG HYPER MART exceptional customer!';
                    break;
                case 90:
                    $data['message2'] = 'Fabulous! You are an SSG HYPER MART outstanding customer!';
                    break;
                case 100:
                    $data['message2'] = 'Great news! You are a VIP customer at SSG HYPER MART!';
                    break;
                default:
                    $data['message2'] = 'We truly appreciate your efforts! Keep shining, and better luck next time!';
            }
        } else {
            // If fewer than 2 attempts
            $data['message2'] = 'Thank you for your efforts! Better luck next time!'; // No prize message for fewer than 2 attempts
        }

        $data['isCorrect'] = true; // Set a flag for correctness
        $attempts++;
        // Reset attempts since the answer is correct
        //$this->session->set_userdata('attempts', 0);
    } else {
        // User answered incorrectly
        $data['message1'] = 'Sorry, that\'s not correct. Please try again!'; // Acknowledgment message
        $data['message2'] = ''; // No prize message
        $data['isCorrect'] = false;
        // Increment the attempt count
        $attempts++;
        $this->session->set_userdata('attempts', $attempts);
    }

    // Load the view with the data
    $this->load->view('Ssgwebsite/website/scan/checkanswer', $data);
}


}
