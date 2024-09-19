<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Puzzle</title>
</head>
<body>
    <h1>Solve the Puzzle</h1>
    <p>What is <?php echo $num1; ?> + <?php echo $num2; ?>?</p>

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <input type="number" name="answer" required>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
