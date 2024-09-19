<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Puzzle</title>

    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: white;
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: fadeInDown 1s ease;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
            animation: fadeInUp 1.5s ease;
        }

        form {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            animation: fadeIn 2s ease;
        }

        input[type="number"] {
            padding: 10px;
            width: 100px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            text-align: center;
            outline: none;
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #ff4081;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff1f66;
        }

        /* Animations */
        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
    <h1>Solve the Puzzle</h1>

    <?php if (isset($num1) && isset($num2)): ?>
        <p>What is <?php echo $num1; ?> + <?php echo $num2; ?>?</p>
    <?php endif; ?>

    <form method="post" action="<?php echo base_url('Website/QrScanner/checkanswer'); ?>">
        <input type="number" name="answer" required>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
