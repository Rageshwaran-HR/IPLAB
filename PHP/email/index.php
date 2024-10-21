<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Validation</title>
</head>

<body>
    <h1>Email Validation Form</h1>

    <?php
    $email = "";
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Valid email address: $email";
        } else {
            $message = "Invalid email address: $email";
        }
    }
    ?>

    <!-- Display message -->
    <?php if (!empty($message)): ?>
        <div style="color: <?php echo strpos($message, 'Invalid') !== false ? 'red' : 'green'; ?>;">
            <p><?php echo $message; ?></p>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="post" action="">
        <input type="text" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>"
            required>
        <input type="submit" value="Validate Email">
    </form>
</body>

</html>