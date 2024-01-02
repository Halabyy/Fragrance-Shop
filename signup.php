<?php
// Database connection code here (replace with your own database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3atarny";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $verify_password = $_POST["verify_password"];

    // Validate password
    if ($password != $verify_password) {
        echo "Passwords do not match. Please try again.";
        exit();
    }

    // Check if the email already exists
    $stmt_check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $stmt_check_email->store_result();

    if ($stmt_check_email->num_rows > 0) {
        echo "<div class='error-message'>Email already exists. Please try another one.</div>";
        exit();
    }
    $stmt_check_email->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $stmt_insert_user = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt_insert_user->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

    if ($stmt_insert_user->execute()) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt_insert_user->error;
    }

    $stmt_insert_user->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign_Up Form</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   
<script>
    $(document).ready(function () {
        $("#email").on("input", function () {
            var email = $(this).val();

            // Make AJAX call to check_email.php
            $.ajax({
                type: "POST",
                url: "check_email.php",
                data: { email: email },
                dataType: "json",
                success: function (response) {
                    if (response.email_exists) {
                        $("#email-validation-message").html("This email is already in use. Please choose another.");
                    } else {
                        $("#email-validation-message").html("");
                    }
                },
                error: function (error) {
                    console.log("Error checking email:", error);
                }
            });
        });
    });
</script>
</head>
<body>

<video autoplay muted loop >
    <source src="background-video3.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="container mt-3">
    <form action="signup.php" method="post" class="form">
        <h2>Sign Up</h2>

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <div id="email-validation-message" style="color: red;"></div>
        </div> 

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required oninput="checkPasswordStrength()">
            <div class="password-strength" id="password-strength"></div>
        </div>

        <div class="form-group">
            <label for="verify_password">Verify Password:</label>
            <input type="password" name="verify_password" required>
        </div>

        <input type="submit" value="Sign Up" class="btn btn-primary">

        <p style="margin-top: 10px;">Already have an account? <a href="login.php">Log in</a></p>
    </form>
</div>

<script>
    function checkPasswordStrength() {
        var password = document.getElementById("password").value;
        var strengthIndicator = document.getElementById("password-strength");

        // Define password requirements
        var minLength = 8;
        var hasUppercase = /[A-Z]/.test(password);
        var hasLowercase = /[a-z]/.test(password);
        var hasDigit = /\d/.test(password);
        var hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password);

        // Check which requirements are not met
        var missingRequirements = [];
        if (!hasUppercase) missingRequirements.push("Uppercase letter");
        if (!hasLowercase) missingRequirements.push("Lowercase letter");
        if (!hasDigit) missingRequirements.push("Digit");
        if (!hasSpecialChar) missingRequirements.push("Special character");
        if (password.length < minLength) missingRequirements.push("Minimum " + minLength + " characters");

        // Check if all requirements are met
        var allRequirementsMet = missingRequirements.length === 0;

        // Update strength indicator
        var strengthText = allRequirementsMet ? "Strong" : "Incomplete Requirements";
        strengthIndicator.innerHTML = "Password Strength: " + strengthText;

        // Display missing requirements
        if (!allRequirementsMet) {
            var missingText = "Missing requirements: " + missingRequirements.join(", ");
            strengthIndicator.innerHTML += "<br>" + missingText;
        }
    }
</script>



</body>
</html>

