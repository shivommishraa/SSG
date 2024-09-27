<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG Hyper Mart Puzzle</title>
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
        }
        .container {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
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
        }
        button:hover {
            background-color: #ff3b30;
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color:black">Grocery Puzzle</h1>

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
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Any additional JS can go here
        });
    </script>
</body>
</html>
