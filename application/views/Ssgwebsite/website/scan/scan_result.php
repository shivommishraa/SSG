<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG HYPER MART</title>
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
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
            text-align: center;
            color: #333;
        }
        .container {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h1, h2 {
            color: #ff6f61;
            margin-bottom: 20px;
        }
        input[type="number"], select {
            padding: 15px;
            width: 100%;
            border: 2px solid #fcb69f;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }
        input[type="number"]:focus, select:focus {
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
            margin-bottom: 20px;
        }
        button:hover {
            background-color: #ff3b30;
        }
        .home-button {
            background-color: #4CAF50; /* Green color for home button */
        }
        .home-button:hover {
            background-color: #388E3C; /* Darker green on hover */
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        /* Footer Info within the container */
        .footer-info {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #fcb69f;
            text-align: center;
        }
        .footer-info p {
            font-size: 1rem;
            color: #333;
            line-height: 1.6;
        }
        .footer-info a {
            color: #ff6f61;
            text-decoration: none;
        }
        .footer-info a:hover {
            text-decoration: underline;
        }

        /* Animated Text */
        .animated-text {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #ff6f61, #ff3b30, #ffecb3, #fcb69f, #ff9a8b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rainbow 5s ease-in-out infinite;
            background-size: 200% 200%;
            margin-bottom: 20px;
        }

        @keyframes rainbow {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
            .animated-text {
                font-size: 2rem;
            }
            button {
                font-size: 1rem;
            }
            p {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="animated-text">SSG HYPER MART</h1>

        <h2>Are You an SSG Super Customer? Take the Quiz to Find Out!</h2>

        <p><?php echo $question; ?></p> <!-- Show the question here -->

        <form method="post" action="<?php echo base_url('Website/QrScanner/checkanswer'); ?>">
           
            <select name="answer" required>
                <option value="">Select your answer</option>
                <?php foreach ($options as $option): ?>
                    <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="submit">Submit</button>
        </form>

        <!-- Buttons for Home and Quiz -->
        <div class="buttons">
            <a href="<?php echo site_url(); ?>" class="home-button button">Home</a>
        </div>

        <!-- Footer with Contact Information inside the same div -->
        <div class="footer-info">
            <p>Phone: +91 9310523943<br/>
               Email: <a href="mailto:ssgmart9@gmail.com">ssgmart9@gmail.com</a><br/>
               Website: <a href="https://ssghypermart.com" target="_blank">ssghypermart.com</a>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Any additional JS can go here
        });
    </script>
</body>
</html>
