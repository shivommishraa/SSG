<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG HYPER MART</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* (Your existing CSS code here) */
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
            <input required type="text" name="name" placeholder="Enter Your Name">
            <input required type="text" name="mobile" placeholder="Enter Your Number">
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

            form.addEventListener('submit', function(event) {
                const nameInput = form.elements['name'];
                const mobileInput = form.elements['mobile'];

                // Validate name: first character should not be a space
                if (nameInput.value.trim() === "" || nameInput.value[0] === ' ') {
                    alert("Name cannot start with a space and must not be empty.");
                    nameInput.focus();
                    event.preventDefault();
                    return;
                }

                // Validate mobile: should be exactly 10 digits and no spaces
                const mobilePattern = /^\d{10}$/;
                if (!mobilePattern.test(mobileInput.value)) {
                    alert("Mobile number must be exactly 10 digits with no spaces.");
                    mobileInput.focus();
                    event.preventDefault();
                    return;
                }
            });
        });
    </script>
</body>
</html>
