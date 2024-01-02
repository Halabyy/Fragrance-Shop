<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3atarny";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Validate the form data (perform additional validation as needed)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["first_name"], $_POST["last_name"], $_POST["credit_card_number"], $_POST["cvv"], $_POST["totalPrice"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $credit_card_number = hash('sha256', $_POST["credit_card_number"]); // Hash credit card number
    $cvv = hash('sha256', $_POST["cvv"]); // Hash CVV
    $totalPrice = $_POST["totalPrice"];

    // Sanitize and validate the data (you should use prepared statements to prevent SQL injection)
    $first_name = htmlspecialchars($first_name);
    $last_name = htmlspecialchars($last_name);
    $credit_card_number = htmlspecialchars($credit_card_number);
    $cvv = htmlspecialchars($cvv);
    $totalPrice = floatval($totalPrice);

    // Insert data into the 'orders' table
    $sql = "INSERT INTO orders (first_name, last_name, credit_card_number, cvv, order_total) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $first_name, $last_name, $credit_card_number, $cvv, $totalPrice);

    if ($stmt->execute()) {
        // Order successfully placed

        // Clear the shopping cart
        if (!empty($_SESSION["cart"])) {
            unset($_SESSION["cart"]);
        }

        // You can redirect the user to a confirmation page or perform additional actions
        header("Location: index2.html");
        exit();
    } else {
        die("Error executing the query: " . $stmt->error);
    }

    $stmt->close();
} else {
    // Invalid form submission
    echo "Invalid form submission.";
}
?>
