<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            max-width: 300px;
            background-color: #f9f9f9;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <h2>Simple Calculator</h2>
    <form method="post" action="">
        <input type="text" name="num1" placeholder="Enter first number" required>
        <input type="text" name="num2" placeholder="Enter second number" required>
        <select name="operation" required>
            <option value="">Select operation</option>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select>
        <input type="submit" name="calculate" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        if ($operation == "add") {
            $result = $num1 + $num2;
            echo "<h3>Result: $num1 + $num2 = $result</h3>";
        } elseif ($operation == "subtract") {
            $result = $num1 - $num2;
            echo "<h3>Result: $num1 - $num2 = $result</h3>";
        } elseif ($operation == "multiply") {
            $result = $num1 * $num2;
            echo "<h3>Result: $num1 * $num2 = $result</h3>";
        } elseif ($operation == "divide") {
            if ($num2 != 0) {
                $result = $num1 / $num2;
                echo "<h3>Result: $num1 / $num2 = $result</h3>";
            } else {
                echo "<h3 style='color:red;'>Error: Division by zero is not allowed.</h3>";
            }
        } else {
            echo "<h3 style='color:red;'>Error: Invalid operation.</h3>";
        }
    }
    ?>

</body>

</html>