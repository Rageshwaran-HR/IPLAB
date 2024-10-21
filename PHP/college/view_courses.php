<?php
include 'db.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
</head>

<body>
    <h2>Courses List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['course_name']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No courses found</td></tr>";
        }
        ?>
    </table>
    <a href="index.php">Back to Home</a>
</body>

</html>