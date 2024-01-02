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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_to_cart"])) {
    $productIdToAdd = $_POST["product_id"];

    // Fetch product details from the database
    $stmt = $conn->prepare("SELECT product_id, product_name, price FROM products_men_test WHERE product_id = ?");
    $stmt->bind_param("i", $productIdToAdd);
    $stmt->execute();

    // Check for errors in the query execution
    if ($stmt->error) {
        die("Query execution error: " . $stmt->error);
    }

    $result = $stmt->get_result();

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        $productDetails = $result->fetch_assoc();

        // Add the product to the cart
        $_SESSION["cart"][] = [
            "id" => $productDetails["product_id"],
            "name" => $productDetails["product_name"],
            "price" => $productDetails["price"],
            // Add more product information as needed
        ];
    } else {
        die("No product found with ID: " . $productIdToAdd);
    }

    $stmt->close();
}

// Redirect back to the products page or wherever you want
header("Location: products_signed_men.php");
exit();
?>
