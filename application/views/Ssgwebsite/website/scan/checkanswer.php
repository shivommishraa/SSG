<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Puzzle</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0e0e0;
            color: #333;
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #333;
        }

        /* Result messages */
        .result {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            transform: translateY(-20px);
        }

        .result.correct {
            color: #4caf50; /* Green for correct */
            background: rgba(76, 175, 80, 0.1); /* Light green background */
        }

        .result.incorrect {
            color: #f44336; /* Red for incorrect */
            background: rgba(244, 67, 54, 0.1); /* Light red background */
        }

        .message {
            font-size: 1.5rem;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* Circular animation */
        .circle {
            width: 100px;
            height: 100px;
            border: 10px solid transparent;
            border-radius: 50%;
            border-top-color: #ff0081; 
            border-right-color: #ff8c00;
            border-bottom-color: #4caf50;
            border-left-color: #00bcd4;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Animated Text */
        .animated-text {
            font-size: 2.5rem; 
            font-weight: bold;
            margin: 20px 0;
            position: relative;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            color: #ff0081; 
            animation: bounce 1s infinite alternate;
        }

        @keyframes bounce {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }

        .home-button {
            display: inline-block;
            margin-top: 30px; 
            padding: 12px 25px;
            font-size: 1.2rem;
            color: #fff;
            background-color: #4caf50; 
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center; /* Centering the text */
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .home-button:hover {
            background-color: #388e3c; 
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .message {
                font-size: 1rem;
            }

            .circle {
                width: 80px;
                height: 80px;
            }

            .animated-text {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Result</h1>
        <?php if (isset($message)): ?>
            <div id="result" class="result <?php echo htmlspecialchars($isCorrect ? 'correct' : 'incorrect'); ?>">
                <p class="message">
                    <?php echo htmlspecialchars($message); ?>
                </p>
            </div>
        <?php endif; ?>
        <div class="circle"></div>
        <div class="animated-text">SSG HYPER MART</div>
        <a href="<?php echo site_url(); ?>" class="home-button">Home</a>
    </div>
    <script>
        // Function to show the result message with animation
        function showMessage() {
            const messageElement = document.querySelector('.result');
            if (messageElement) {
                messageElement.style.opacity = '1';
                messageElement.style.transform = 'translateY(0)';
            }
        }

        // Example usage
        document.addEventListener('DOMContentLoaded', showMessage);
    </script>
</body>
</html>
