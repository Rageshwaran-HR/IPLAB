<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Registration and Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            max-width: 400px;
            background-color: #f9f9f9;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #45a049;
        }

        #profile {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h2>Registration</h2>
    <div id="registration">
        <input type="text" id="regEmail" placeholder="Enter your email" required>
        <input type="password" id="regPassword" placeholder="Enter your password" required>
        <input type="button" value="Register" onclick="register()">
    </div>

    <h2>Login</h2>
    <div id="login">
        <input type="text" id="loginEmail" placeholder="Enter your email" required>
        <input type="password" id="loginPassword" placeholder="Enter your password" required>
        <input type="button" value="Login" onclick="login()">
    </div>

    <div id="profile">
        <h3>Profile</h3>
        <p id="profileEmail"></p>
    </div>

    <script>
        let user = null;

        function register() {
            const email = document.getElementById('regEmail').value;
            const password = document.getElementById('regPassword').value;

            // Simple email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            // Store user info (in a real app, you'd send this to a server)
            user = { email, password };
            alert('Registration successful!');
        }

        function login() {
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            // Validate login
            if (!user || user.email !== email || user.password !== password) {
                alert('Invalid email or password. Please try again.');
                return;
            }

            // Show profile after successful login
            document.getElementById('profileEmail').innerText = `Logged in as: ${user.email}`;
            document.getElementById('profile').style.display = 'block';
        }
    </script>

</body>

</html>