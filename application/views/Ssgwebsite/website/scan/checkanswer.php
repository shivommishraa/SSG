<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG HYPER MART</title>
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
            font-size: 2rem; /* Reduced font size */
            color: #333;
        }

        /* Circular animation with SSG Hyper Mart inside */
        .circle {
            width: 120px; /* Smaller circle */
            height: 120px;
            border: 8px solid transparent;
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
            font-size: 1rem; /* Reduced font size */
            text-transform: uppercase;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Pause rotation on hover */
        .circle:hover {
            animation-play-state: paused;
        }

        /* Navy text color for "SSG HYPER MART" */
        .animated-text {
            position: absolute;
            z-index: 1;
            color: navy;
            font-size: 0.9rem; /* Reduced font size */
        }

        /* Buttons Styling */
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .home-button, .quiz-button {
            padding: 10px 20px;
            font-size: 1rem; /* Reduced font size */
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

        /* Order Info Section */
        .order-info {
            margin-top: 30px;
            padding: 10px;
            background: linear-gradient(135deg, #4caf50, #00bcd4);
            color: white;
            text-align: center;
            border-radius: 8px;
            font-size: 1rem; /* Reduced font size */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .order-info a {
            color: white;
            text-decoration: underline;
            margin-left: 5px;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            h1 {
                font-size: 1.5rem; /* Smaller heading */
            }

            .circle {
                width: 100px;
                height: 100px;
                font-size: 0.8rem; /* Smaller circle text */
            }

            .animated-text {
                font-size: 0.8rem; /* Smaller inside text */
            }

            .buttons {
                flex-direction: column;
            }

            .home-button, .quiz-button {
                font-size: 0.9rem; /* Smaller button text */
                width: 100%;
                margin-bottom: 10px;
            }

            .order-info {
                font-size: 0.9rem; /* Smaller order info text */
            }
        }

        @media (max-width: 400px) {
            h1 {
                font-size: 1.2rem; /* Even smaller heading */
            }

            .circle {
                width: 80px;
                height: 80px;
                font-size: 0.7rem; /* Smaller circle text */
            }

            .buttons {
                margin-top: 20px;
            }

            .home-button, .quiz-button {
                font-size: 0.8rem; /* Smaller button text */
            }

            .order-info {
                font-size: 0.8rem; /* Smaller order info text */
            }
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="container">
            <h1>Your Result</h1>
            <!-- Rotating Circle with SSG Hyper Mart Text -->
            <div class="circle">
                <div class="animated-text">SSG HYPER MART</div>
            </div>

            <!-- Buttons for Home and Quiz -->
            <div class="buttons">
                <a href="#" class="home-button">Home</a>
                <a href="#" class="quiz-button">Quiz</a>
            </div>

            <!-- Order Information -->
            <div class="order-info">
                Phone: +91 9310523943<br/> 
                Email: <a href="mailto:ssgmart9@gmail.com">ssgmart9@gmail.com</a>, 
                Website: <a href="https://ssghypermart.com">ssghypermart.com</a>
            </div>
        </div>
    </div>
</body>
</html>
