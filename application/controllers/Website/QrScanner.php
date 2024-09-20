<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrScanner extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
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
        
        // Define questions for Hindi, GK, and GS with four options each
        $hindi_questions = [
            ['question' => 'What is the capital of India?', 'correct_answer' => 'New Delhi', 'options' => ['New Delhi', 'Mumbai', 'Kolkata', 'Chennai']],
            ['question' => 'What is the national language of India?', 'correct_answer' => 'Hindi', 'options' => ['Hindi', 'English', 'Bengali', 'Telugu']],
            ['question' => 'What is the currency of India?', 'correct_answer' => 'Rupee', 'options' => ['Rupee', 'Dollar', 'Yen', 'Euro']]
        ];
        
        $gk_questions = [
            ['question' => 'What is the capital of France?', 'correct_answer' => 'Paris', 'options' => ['Paris', 'London', 'Berlin', 'Madrid']],
            ['question' => 'What is the largest ocean?', 'correct_answer' => 'Pacific', 'options' => ['Atlantic', 'Indian', 'Pacific', 'Arctic']],
            ['question' => 'What is the currency of Japan?', 'correct_answer' => 'Yen', 'options' => ['Yen', 'Won', 'Dollar', 'Euro']]
        ];
        
        $gs_questions = [
            ['question' => 'Which is the smallest continent?', 'correct_answer' => 'Australia', 'options' => ['Asia', 'Africa', 'Australia', 'Europe']],
            ['question' => 'What is the currency of India?', 'correct_answer' => 'Rupee', 'options' => ['Dollar', 'Pound', 'Rupee', 'Yen']]
        ];

        // Randomly choose a question category
        $categories = [$hindi_questions, $gk_questions, $gs_questions];
        $selected_questions = $categories[array_rand($categories)];

        // Randomly select a question from the selected category
        $question_data = $selected_questions[array_rand($selected_questions)];

        // Check if it's a math question
        if (strpos($question_data['question'], '+') !== false || strpos($question_data['question'], '-') !== false || strpos($question_data['question'], '*') !== false) {
            // Generate random numbers and a random operation
            $num1 = rand(1, 10);
            $num2 = rand(1, 10);
            $operation = array_rand(['+', '-', '*']);
            $question = "$num1 $operation $num2";
            
            // Calculate the correct answer based on the operation
            switch ($operation) {
                case '+':
                    $correct_answer = $num1 + $num2;
                    break;
                case '-':
                    $correct_answer = $num1 - $num2;
                    break;
                case '*':
                    $correct_answer = $num1 * $num2;
                    break;
            }

            $data['question'] = $question; // Math question
            $data['correct_answer'] = $correct_answer;
            $data['category'] = 'math';
        } else {
            // Prepare the question and correct answer
            $data['question'] = $question_data['question'];
            $data['correct_answer'] = $question_data['correct_answer'];
            $data['options'] = $question_data['options'];

            // Ensure the correct answer is included in the options and shuffle
            if (!in_array($data['correct_answer'], $data['options'])) {
                $data['options'][] = $data['correct_answer'];
            }
            shuffle($data['options']);
            $data['category'] = 'gk_or_gs';
        }

        // Store the correct answer in session
        $this->session->set_userdata('correct_answer', $data['correct_answer']);

        $this->load->view('Ssgwebsite/website/scan/scan_result', $data);
    }

    public function checkanswer() {
        $answer = $this->input->post('answer');
        $correctAnswer = $this->session->userdata('correct_answer');

        // Validate the answer
        if ($answer == $correctAnswer) {
            $data['message'] = 'Thank you! You passed the puzzle!';
        } else {
            $data['message'] = 'Sorry, that\'s not correct. Please try again.';
        }

        $this->load->view('Ssgwebsite/website/scan/checkanswer', $data);
    }
}
