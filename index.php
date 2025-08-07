<?php
session_start();
$conn = new mysqli("localhost", "root", "", "dbtb");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE username = ? and password =?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['username'] = $username;
        header("Location: /ticketbooking/modules/office/views/home.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            background: linear-gradient(to right, #4facfe, #00f2fe); /* Gradient background */
        }
        .container { 
            width: 350px; 
            padding: 30px; 
            border-radius: 10px; 
            background: white; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); 
            text-align: center; /* Center text */
        }
        h2 { 
            margin-bottom: 20px; 
            color: #333; 
        }
        label { 
            margin-top: 10px; 
            display: block; 
            text-align: left; 
        }
        input[type="text"], input[type="password"] { 
            width: 100%; 
            padding: 10px; 
            margin: 10px 0; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }
        input[type="submit"] { 
            width: 100%; 
            padding: 10px; 
            background-color: #4facfe; 
            border: none; 
            border-radius: 5px; 
            color: white; 
            font-size: 16px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
        }
        input[type="submit"]:hover { 
            background-color: #00f2fe; 
        }
        .error { 
            color: red; 
            margin-top: 10px; 
        }
        .footer { 
            margin-top: 20px; 
            font-size: 14px; 
            color: #777; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
            <p><a href="registration.php">New User? Register Here</a></p>
        </form>
        <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
        ?>
        <div class="footer">© 2024 Ticket Booking</div>
    </div>
</body>
</html>

