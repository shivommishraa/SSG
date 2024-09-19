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
            color: #3498db;
            margin: 20px 0;
            position: relative;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
        }

        .animated-text::before {
            content: 'SSG HYPER MART';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #3498db;
            font-size: 2rem;
            opacity: 0;
            animation: fadeInScale 3s ease forwards;
        }

        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
            }
            50% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1.1);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
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
