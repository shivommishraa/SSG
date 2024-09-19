<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG Hyper Mart Puzzle</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            text-align: center;
            color: #333;
        }

        h1 {
            font-size: 3rem;
            color: #fff;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease;
        }

        .container {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        /* Animation Section */
        .animation-section {
            margin-bottom: 30px;
            position: relative;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff6f61;
            border-radius: 15px;
            overflow: hidden;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            animation: backgroundSlide 3s infinite alternate;
        }

        .animated-text {
            position: absolute;
            opacity: 0;
            animation: textFadeIn 2s forwards;
        }

        /* Animations */
        @keyframes backgroundSlide {
            0% {
                background-color: #ff6f61;
            }
            100% {
                background-color: #ffb46b;
            }
        }

        @keyframes textFadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        input[type="number"] {
            padding: 15px;
            width: 100%;
            border: 2px solid #fcb69f;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #ff6f61;
        }

        button {
            padding: 15px 20px;
            background-color: #ff6f61;
            border: none;
            color: white;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #ff3b30;
        }

        /* Responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            p {
                font-size: 1.2rem;
            }

            input[type="number"], button {
                font-size: 1rem;
            }

            .animation-section {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Grocery Puzzle</h1>

        <div class="animation-section">
            <div class="animated-text" id="animatedText">SSG HYPER MART</div>
        </div>

        <?php if (isset($num1) && isset($num2)): ?>
            <p>What is <?php echo $num1; ?> + <?php echo $num2; ?>?</p>
        <?php endif; ?>

        <form method="post" action="<?php echo base_url('Website/QrScanner/checkanswer'); ?>">
            <input type="number" name="answer" required placeholder="Enter your answer">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <!-- JavaScript to trigger animation -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fade in text after page load
            const textElement = document.getElementById("animatedText");
            textElement.style.animationDelay = "1s";
        });
    </script>
</body>
</html>