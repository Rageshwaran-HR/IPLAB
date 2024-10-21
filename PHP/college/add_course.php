<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];

    $sql = "INSERT INTO courses (course_name) VALUES ('$course_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New course added successfully. <a href='view_courses.php'>View Courses</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>

<body>
    <h2>Add Course</h2>
    <form method="POST" action="">
        <input type="text" name="course_name" placeholder="Course Name" required>
        <input type="submit" value="Add Course">
    </form>
    <a href="index.php">Back to Home</a>
</body>

</html>