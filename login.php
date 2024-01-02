<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Sign_In Form</title>
</head>
<body>

<video autoplay muted loop >
    <source src="background-video3.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="container">
    <form method="post" action="" name="loginForm">
        <!-- your existing form elements -->
        <h2 style="font-family: 'Helvetica', sans-serif;">Sign In</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
        </div>
        <button class="btn-primary" type="submit">Sign In</button>
        <!-- Use a submit button for Sign Up -->
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "3atarny";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $passwordInput = $_POST["password"];

    // Check the users table
    $queryUsers = "SELECT email, password FROM users WHERE email = ?";
    $stmtUsers = $conn->prepare($queryUsers);

    if (!$stmtUsers) {
        die("Error in users query preparation: " . $conn->error);
    }

    $stmtUsers->bind_param("s", $email);
    $stmtUsers->execute();
    $stmtUsers->bind_result($emailUsers, $hashedPasswordUsers);

    if ($stmtUsers->fetch() && password_verify($passwordInput, $hashedPasswordUsers)) {
        session_start();
        $_SESSION["email"] = $emailUsers;
        $stmtUsers->close();
        $conn->close();
        header("Location: index2.html");
        exit();
    }

    $stmtUsers->close();

    // Check the admin table if not found in users table
    $queryAdmin = "SELECT email, password FROM admin WHERE email = ?";
    $stmtAdmin = $conn->prepare($queryAdmin);

    if (!$stmtAdmin) {
        die("Error in admin query preparation: " . $conn->error);
    }

    $stmtAdmin->bind_param("s", $email);
    $stmtAdmin->execute();
    $stmtAdmin->bind_result($emailAdmin, $hashedPasswordAdmin);

    if ($stmtAdmin->fetch() && password_verify($passwordInput, $hashedPasswordAdmin)) {
        session_start();
        $_SESSION["email"] = $emailAdmin;
        $stmtAdmin->close();
        $conn->close();
        header("Location: Admin_Home_page.php");
        exit();
    } else {
        echo "<p class='text-danger'>Invalid email or password. Please try again.</p>";
    }

    $stmtAdmin->close();
    $conn->close();
}
?>

</div>

</body>
</html>

