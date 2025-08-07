<?php
session_start();
$conn = new mysqli("localhost", "root", "", "dbtb");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
    $email = $_POST['email'];

    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Username already exists.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO tblusers (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        if ($stmt->execute()) {
            header("Location: /ticketbooking/modules/office/views/home.php");
            exit();
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #1e3c72, #2a5298); /* Blue gradient */
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #1e3c72;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #2a5298;
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #1e3c72;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #163b67;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        .success {
            color: green;
            text-align: center;
            margin-top: 10px;
        }
        a {
            color: #2a5298;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
        .password-feedback {
            font-size: 0.875rem;
            color: #ff0000;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="" onsubmit="return validateForm()">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <small id="passwordStrength" class="password-feedback"></small>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <input type="submit" value="Register">
        </form>

        <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
        ?>
        <p><a href="index.php">Already have an account? Login here</a></p>
    </div>

    <script>
        const passwordField = document.getElementById('password');
        const passwordStrengthText = document.getElementById('passwordStrength');

        passwordField.addEventListener('input', function() {
            const password = passwordField.value;
            let strengthMessage = '';
            if (password.length < 6) {
                strengthMessage = 'Password is too short';
            } else if (!/[A-Z]/.test(password)) {
                strengthMessage = 'Password should include at least one uppercase letter';
            } else if (!/[0-9]/.test(password)) {
                strengthMessage = 'Password should include at least one number';
            } else {
                strengthMessage = 'Password is strong';
                passwordStrengthText.style.color = 'green';
            }
            passwordStrengthText.textContent = strengthMessage;
            passwordStrengthText.style.display = 'block';
        });

        function validateForm() {
            return true;
        }
    </script>
</body>
</html>
