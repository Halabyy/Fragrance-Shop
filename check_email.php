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

// Process AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_to_check = $_POST["email"];

    // Check if email already exists
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email_to_check);
    $stmt->execute();
    $stmt->store_result();
    
    $email_exists = $stmt->num_rows > 0;
    
    $stmt->close();

    // Send response to JavaScript
    echo json_encode(["email_exists" => $email_exists]);
}

$conn->close();
?>
