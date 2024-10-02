<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG HYPER MART TOP CUSTOMER's</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #ff6600;
            font-size: 2em;
            margin-bottom: 20px;
            text-transform: uppercase;
            animation: color-change 3s infinite;
        }

        /* Animation for title */
        @keyframes color-change {
            0% { color: #ff6600; }
            50% { color: #33cc33; }
            100% { color: #ff6600; }
        }

        /* Responsive list styles */
        .customer-list {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .customer-item {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .customer-item:last-child {
            border-bottom: none;
        }

        .customer-item:hover {
            background-color: #f0f8ff;
        }

        .customer-name {
            font-weight: bold;
            font-size: 1.2em;
            color: #007bff;
        }

        .customer-result {
            font-size: 1.2em;
            color: #28a745;
        }

        .customer-mobile {
            font-size: 1.1em;
            color: #6c757d;
        }

        @media screen and (max-width: 600px) {
            .customer-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .customer-result {
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>

    <h1>SSG HYPER MART TOP CUSTOMER's</h1>

    <div class="customer-list">
        <?php foreach ($allData as $customer): ?>
        <div class="customer-item">
            <div class="customer-name"><?= htmlspecialchars($customer->name) ?></div>
            <div class="customer-mobile">
                <?= substr($customer->mobile_number, 0, 2) . '****' . substr($customer->mobile_number, -1) ?>
            </div>
            <div class="customer-result">
                <?= $customer->result == 1 ? '<span style="color: green;">Pass</span>' : '<span style="color: red;">Fail</span>' ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
