<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG HYPER MART</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #ff6600;
            font-size: 2em;
            margin-bottom: 20px;
            text-transform: uppercase;
            animation: color-change 3s infinite;
            position: sticky;
            top: 0;
            background-color: #f4f4f4;
            padding: 10px 0;
            z-index: 1000;
        }

        /* Animation for title */
        @keyframes color-change {
            0% { color: #ff6600; }
            50% { color: #33cc33; }
            100% { color: #ff6600; }
        }

        /* Scrollable table container */
        .table-container {
            overflow-x: auto; /* Make table horizontally scrollable */
            margin: 0 auto 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        /* Table styles */
        .customer-table {
            width: 100%;
            border-collapse: collapse; /* Merged borders */
            min-width: 600px; /* Ensure table doesn't shrink too much */
        }

        .customer-table th, .customer-table td {
            padding: 10px; /* Reduced padding */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .customer-table th {
            background-color: #ff6600;
            color: white;
            font-size: 1.2em;
            text-transform: uppercase;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        /* Alternate row colors for better readability */
        .customer-table tr:nth-child(even) {
            background-color: #f9f9f9; /* Light grey for even rows */
        }

        .customer-table tr:hover {
            background-color: #e0e0e0; /* Lighter hover effect */
            transition: background-color 0.3s;
        }

        .customer-name {
            color: #007bff;
            font-weight: bold;
        }

        .customer-mobile {
            color: #6c757d;
        }

        .customer-result {
            font-size: 1.1em;
        }

        .pass {
            color: green;
        }

        .fail {
            color: red;
        }

        /* Buttons */
        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .home-button, .quiz-button {
            display: inline-block;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .home-button:hover, .quiz-button:hover {
            background-color: #33cc33;
        }

        /* Contact info */
        .order-info {
            text-align: center;
            margin-top: 20px;
            font-size: 1em;
        }

        .order-info a {
            color: #007bff;
            text-decoration: none;
        }

        .order-info a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <h1>SSG HYPER MART TOP CUSTOMER</h1>

    <!-- Scrollable Table Container -->
    <div class="table-container">
        <table class="customer-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allData as $customer): ?>
                <tr>
                    <td class="customer-name"><?= htmlspecialchars($customer->name) ?></td>
                    <td class="customer-mobile">
                        <?= substr($customer->mobile, 0, 2) . '****' . substr($customer->mobile, -1) ?>
                    </td>
                    <td class="customer-result">
                        <?= $customer->result == 1 ? '<span class="pass">Pass</span>' : '<span class="fail">Fail</span>' ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Buttons Section -->
    <div class="buttons">
        <a href="<?php echo site_url(); ?>" class="home-button">Home</a>
        <a href="<?php echo site_url(); ?>Website/QrScanner/scan" class="quiz-button">Quiz</a>
    </div>

    <!-- Contact Information -->
    <div class="order-info">
        Phone: +91 9310523943<br/> 
        Email: <a href="mailto:ssgmart9@gmail.com">ssgmart9@gmail.com</a>, 
        Website: <a href="https://ssghypermart.com">ssghypermart.com</a>
    </div>

</body>
</html>
