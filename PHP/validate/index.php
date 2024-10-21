<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
</head>

<body>
    <h1>User Registration Form</h1>

    <?php
    include 'db.php';

    // Initialize variables
    $name = $email = $phone = "";
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Validate name
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors[] = "Name can only contain letters and spaces.";
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        // Validate phone
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $errors[] = "Phone number must be 10 digits.";
        }

        // If no errors, insert into database
        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $phone);

            if ($stmt->execute()) {
                echo "<h3>Registration successful!</h3>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    ?>

    <!-- Display errors -->
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="post" action="">
        <input type="text" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($name); ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
        <input type="text" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($phone); ?>"
            required>
        <input type="submit" value="Register">
    </form>
</body>

</html>