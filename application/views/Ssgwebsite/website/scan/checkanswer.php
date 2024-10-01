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
            color: #333;
            position: relative;
            overflow: hidden;
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
            transition: opacity 0.5s ease, transform 0.5s ease;
            transform: translateY(-20px);
        }

        .result.correct {
            color: #4caf50;
            background: rgba(76, 175, 80, 0.1);
        }

        .result.incorrect {
            color: #f44336;
            background: rgba(244, 67, 54, 0.1);
        }

        .message {
            font-size: 1.5rem;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* Emphasized "Message 2" styling */
        .fantastic-message {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            background: transparent;
            padding: 20px;
            margin-top: 30px;
            border-radius: 10px;
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
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Animated Text with Color Transition */
        .animated-text {
            font-size: 2.5rem; 
            font-weight: bold;
            margin: 20px 0;
            position: relative;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            background: linear-gradient(135deg, #ff0081, #ff8c00, #4caf50, #00bcd4);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: colorChange 3s infinite alternate;
        }

        @keyframes colorChange {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
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
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-left: auto; /* Centering */
            margin-right: auto; /* Centering */
        }

        .home-button:hover {
            background-color: #388e3c; 
            transform: translateY(-3px);
        }

        /* Overlay for results */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none; /* Initially hidden */
            justify-content: center;
            align-items: center;
            z-index: 0; /* Below the container */
        }

        .overlay.visible {
            display: flex; /* Show when needed */
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

            .fantastic-message {
                font-size: 1.5rem;
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
            <div class="circle"></div>
            <div class="animated-text">SSG HYPER MART</div>
            <a href="<?php echo site_url(); ?>" class="home-button">Home</a>
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
