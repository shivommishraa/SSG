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
            max-height: 400px;
            overflow-y: auto;
            margin: 0 auto;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        /* Table styles */
        .customer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .customer-table th, .customer-table td {
            padding: 15px;
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

        .customer-table tr:hover {
            background-color: #f0f8ff;
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

        @media screen and (max-width: 600px) {
            .customer-table, .customer-table th, .customer-table td {
                display: block;
                width: 100%;
            }

            .customer-table th {
                text-align: center;
                background-color: #ff6600;
            }

            .customer-table td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <h1>SSG HYPER MART TOP CUSTOMER's</h1>

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

</body>
</html>
