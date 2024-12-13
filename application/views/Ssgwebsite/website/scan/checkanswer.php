<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG MART</title>
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
            min-height: 100vh; /* Use min-height instead of height for scrolling */
            color: #333;
            position: relative;
            overflow-y: auto; /* Enable vertical scrolling if content overflows */
            background: linear-gradient(135deg, #ff0081, #ff8c00, #4caf50, #00bcd4);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
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
            transition: opacity 0.8s ease, transform 0.8s ease;
            transform: translateY(-20px);
            background: linear-gradient(135deg, #4caf50, #00bcd4);
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1.2s ease forwards;
        }

        .result.correct {
            background: linear-gradient(135deg, #4caf50, #ff8c00);
        }

        .result.incorrect {
            background: linear-gradient(135deg, #f44336, #ff0081);
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message {
            font-size: 1.5rem;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* Emphasized "Message 2" styling */
        .fantastic-message {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin-top: 30px;
            border-radius: 10px;
            animation: fadeInUp 1.5s ease forwards;
        }

        /* Circular animation with SSG Hyper Mart inside */
        .circle {
            width: 150px;
            height: 150px;
            border: 10px solid transparent;
            border-radius: 50%;
            border-top-color: #ff0081; 
            border-right-color: #ff8c00;
            border-bottom-color: #4caf50;
            border-left-color: #00bcd4;
            animation: spin 3s linear infinite;
            margin: 20px auto;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 1.2rem;
            text-transform: uppercase;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Stop rotation on hover */
        .circle:hover {
            animation-play-state: paused;
        }

        /* Navy text color for "SSG HYPER MART" */
        .animated-text {
            position: absolute;
            z-index: 1;
            color: navy;
        }

        /* Buttons Styling */
        .buttons {
            display: flex;
            justify-content: center; /* Centers buttons horizontally */
            gap: 20px; /* Adds space between buttons */
            margin-top: 30px;
        }

        .home-button, .quiz-button {
            padding: 12px 25px;
            font-size: 1.2rem;
            color: #fff;
            background-color: #4caf50; 
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .home-button:hover, .quiz-button:hover {
            background-color: #388e3c; 
            transform: translateY(-3px);
        }

        /* Add for Order Section */
        .order-info {
            margin-top: 16px;
            padding: 10px;
            background: linear-gradient(135deg, #4caf50, #00bcd4);
            color: white;
            text-align: center;
            border-radius: 8px;
            font-size: 1.1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .order-info a {
            color: white;
            text-decoration: underline;
            margin-left: 5px;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .message {
                font-size: 1rem;
            }

            .circle {
                width: 100px;
                height: 100px;
            }

            .fantastic-message {
                font-size: 1rem;
            }

            .buttons {
                flex-direction: column;
            }

            .home-button, .quiz-button {
                width: 100%;
                margin-bottom: 10px;
            }

            .order-info {
                font-size: -2.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="overlay <?php echo htmlspecialchars($isCorrect ? 'correct' : 'incorrect'); ?>">
        <div class="container">
            <h1>Your Result</h1>
            <?php if (isset($message1)): ?>
                <div id="result" class="result <?php echo htmlspecialchars($isCorrect ? 'correct' : 'incorrect'); ?>">
                    <p class="message">
                        <?php echo htmlspecialchars($message1); ?>
                    </p>
                    <p class="message fantastic-message">
                        <?php echo htmlspecialchars($message2); ?>
                    </p>
                </div>
            <?php endif; ?>
            <!-- Rotating Circle with SSG Hyper Mart Text -->
            <div class="circle">
                <div class="animated-text">SSG HYPER MART</div>
            </div>

            <!-- Buttons for Home and Quiz -->
            <div class="buttons">
                <a href="<?php echo site_url(); ?>" class="home-button">Home</a>
                <a href="<?php echo site_url(); ?>Website/QrScanner/getList" class="home-button">Top Customers</a>
                <a href="<?php echo site_url(); ?>Website/QrScanner/scan" class="quiz-button">Quiz</a>
            </div>

            <!-- Order Information -->
            <div class="order-info">
                Phone: +91 9310523943<br/> Email: <a href="mailto:ssgmart9@gmail.com">ssgmart9@gmail.com</a>, Website: <a href="https://ssghypermart.com">ssghypermart.com</a>
            </div>
        </div>
    </div>

    <script>
        // Function to show the result message with animation
        function showMessage() {
            const messageElement = document.querySelector('.result');
            const overlay = document.querySelector('.overlay');
            if (messageElement) {
                messageElement.style.opacity = '1';
                messageElement.style.transform = 'translateY(0)';
                overlay.classList.add('visible'); // Show overlay
            }
        }

        // Example usage
        document.addEventListener('DOMContentLoaded', showMessage);
    </script>
</body>
</html>
