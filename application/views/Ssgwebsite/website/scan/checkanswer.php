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
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #333;
        }

        /* Result messages */
        .result {
            margin-bottom: 20px;
        }

        .message {
            font-size: 1.5rem;
            padding: 15px;
            border-radius: 8px;
            color: #fff;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            transform: translateY(-20px);
        }

        .success {
            background-color: #28a745;
        }

        .fail {
            background-color: #dc3545;
        }

        /* Circular animation */
        .circle {
            width: 100px;
            height: 100px;
            border: 10px solid #3498db;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Animated Text */
        .animated-text {
            font-size: 2rem;
            font-weight: bold;
            color: #fff;
            margin: 20px 0;
            position: relative;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
        }

        .animated-text::before {
            content: 'SSG HYPER MART';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #ff0081, #ff8c00, #4caf50, #00bcd4);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            color: transparent;
            opacity: 0;
            animation: fadeIn 2s ease forwards, gradientAnimation 5s linear infinite;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
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
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Result</h1>
        <?php if (isset($message)): ?>
            <div id="result" class="result">
                <p class="message <?php echo htmlspecialchars($message); ?>">
                    <?php echo htmlspecialchars($message); ?>
                </p>
            </div>
        <?php endif; ?>
        <div class="circle"></div>
        <div class="animated-text"></div>
    </div>
    <script>
        // Function to show the result message with animation
        function showMessage() {
            const messageElement = document.querySelector('.message');
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
