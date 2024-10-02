<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG HYPER MART</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(45deg, #ff9a8b, #ff6f61, #ffecb3, #fcb69f, #ff3b30);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
            text-align: center;
            color: #333;
        }

        /* Gradient animation */
        @keyframes gradientAnimation {
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

        select, input[type="text"], input[type="number"] {
            padding: 15px;
            width: 100%;
            border: 2px solid #fcb69f;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        select:focus, input[type="text"]:focus, input[type="number"]:focus {
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

        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Animated Text */
        .animated-text {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #ff6f61, #ff3b30, #ffecb3, #fcb69f, #ff9a8b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rainbowText 5s ease-in-out infinite;
            background-size: 200% 200%;
            margin-bottom: 20px;
        }

        @keyframes rainbowText {
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

        /* Footer Info within the container */
        .footer-info {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #fcb69f;
            text-align: center;
        }

        .footer-info p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .footer-info i {
            margin-right: 10px;
            color: #ff6f61;
        }

        .footer-info a {
            color: #ff6f61;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-info a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
                padding: 20px;
            }

            h1, h2 {
                font-size: 1.5rem;
            }

            .animated-text {
                font-size: 2rem;
            }

            button {
                font-size: 1rem;
                padding: 12px 18px;
            }

            select, input[type="text"], input[type="number"] {
                padding: 12px;
                font-size: 0.9rem;
            }

            p {
                font-size: 1.2rem;
            }

            .footer-info p {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                max-width: 100%;
                padding: 15px;
            }

            h1, h2 {
                font-size: 1.2rem;
            }

            .animated-text {
                font-size: 1.8rem;
            }

            button {
                font-size: 0.9rem;
                padding: 10px 15px;
            }

            select, input[type="text"], input[type="number"] {
                padding: 10px;
                font-size: 0.8rem;
            }

            p {
                font-size: 1rem;
            }

            .footer-info p {
                font-size: 0.8rem;
            }
        }

        /* Error message for mobile number */
        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="animated-text">SSG HYPER MART</h1>

        <h2>Are You an SSG Super Customer? Take the Quiz to Find Out!</h2>

        <p><?php echo $question; ?></p> <!-- Show the question here -->

        <form id="quizForm" method="post" action="<?php echo base_url('Website/QrScanner/checkanswer'); ?>">
            <select name="answer" required>
                <option value="">Select your answer</option>
                <?php foreach ($options as $option): ?>
                    <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>
            <input required type="hidden" name="question" value="<?php echo $question;?>">
            <input required type="hidden" name="qa_id" value="<?php echo $qa_id;?>">
            <input required type="text" name="name" placeholder="Enter Your Name" id="name">
            <input required type="number" name="mobile" placeholder="Enter Your Number" id="mobile">
            <div id="mobileError" class="error-message" style="display:none;"></div>
            <button type="submit" name="submit">Submit</button>
        </form>

        <!-- Footer with Contact Information inside the same div -->
        <div class="footer-info">
            <p><i class="fas fa-phone-alt"></i>Phone: +91 9310523943</p>
            <p><i class="fas fa-envelope"></i>Email: <a href="mailto:ssgmart9@gmail.com">ssgmart9@gmail.com</a></p>
            <p><i class="fas fa-globe"></i>Website: <a href="https://ssghypermart.com" target="_blank">ssghypermart.com</a></p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('quizForm');
            const nameInput = document.getElementById('name');
            const mobileInput = document.getElementById('mobile');
            const mobileError = document.getElementById('mobileError');

            // Disable spaces on input for name and mobile
            nameInput.addEventListener('keypress', function(event) {
                // Prevent first character from being a space
                if (nameInput.value.length === 0 && event.key === " ") {
                    event.preventDefault();
                }

                // Prevent consecutive spaces
                const value = nameInput.value;
                if (event.key === " " && value.endsWith(" ")) {
                    event.preventDefault();
                }
            });

            mobileInput.addEventListener('keypress', function(event) {
                // Prevent any spaces from being entered
                if (event.key === " ") {
                    event.preventDefault();
                }
            });

            mobileInput.addEventListener('input', function() {
                const mobileValue = mobileInput.value.trim();

                // Show error message if the number exceeds 10 digits
                if (mobileValue.length > 10) {
                    mobileError.textContent = "Please enter a valid mobile number (10 digits only, no spaces).";
                    mobileError.style.display = 'block';
                } else {
                    mobileError.style.display = 'none'; // Hide error message
                }

                // Validate mobile number only if it has exactly 10 digits
                if (mobileValue.length === 10 && !/^\d{10}$/.test(mobileValue)) {
                    mobileError.textContent = "Please enter a valid mobile number (10 digits only, no spaces).";
                    mobileError.style.display = 'block';
                } else {
                    mobileError.style.display = 'none'; // Hide error message
                }
            });

            form.addEventListener("submit", function(event) {
                const mobileValue = mobileInput.value.trim();

                // Validate mobile number only if it has exactly 10 digits
                if (mobileValue.length !== 10 || !/^\d{10}$/.test(mobileValue)) {
                    mobileError.textContent = "Please enter a valid mobile number (10 digits only, no spaces).";
                    mobileError.style.display = 'block';
                    mobileInput.focus();
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
</body>
</html>
