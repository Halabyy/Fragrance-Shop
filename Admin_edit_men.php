<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3atarny";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get all products
function getProducts() {
    global $conn;
    $result = $conn->query("SELECT * FROM products_men_test");
    $products = array();

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

// Function to update product details
function updateProduct($productId, $productName, $description, $price) {
    global $conn;
    $sql = "UPDATE products_men_test SET product_name=?, description=?, price=? WHERE product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $productName, $description, $price, $productId);
    $stmt->execute();
    $stmt->close();
}
function deleteProduct($productId) {
    global $conn;
    $sql = "DELETE FROM products_men_test WHERE product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["update"])) {
        $productId = $_POST["product_id"];
        $productName = $_POST["product_name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        updateProduct($productId, $productName, $description, $price);
    } elseif (isset($_POST["delete"])) {
        $productId = $_POST["product_id"];
        deleteProduct($productId);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <!-- Add your CSS styles or links here if needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 100px;
        }

        .card-container h1 {
            color: #0b0b0a;
            text-shadow: 1px 1px 1px black;
            border-bottom: 2px solid #f0be0a;
        }

        .card {
            width: 300px;
            background-color: #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 16px;
            color: #666;
            font-size: 15px;
        }

        .card-content h3 {
            font-size: 28px;
            margin-bottom: 8px;
            text-align: center;
        }

        .card-container p {
            color: #665c5c;
            font-size: 20px;
            line-height: 1.3;
        }

        h5 {
            font-size: 26px;
            text-align: center;
            color: #222f3e;
            margin: 0;
        }

        ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 0;
        }

        li {
            padding-top: 5px;
        }

        .fa {
            font-size: 26px;
            transition: .4s;
            margin: 3px;
        }

        .checked {
            color: #f0be0a;
        }

        li {
            size: 20px;
        }

        .card-content #btn {
            display: inline-block;
            margin-left: 25%;
            padding: 8px 16px;
            background-color: #291b1b;
            text-decoration: none;
            border-radius: 10px;
            margin-top: 16px;
            color: #ffffff;
            text-align: center;
        }
    </style>
</head>
<h1>Product Display</h1>

<div class="card-container">
    <?php
    // Fetch products from the database
    $products = getProducts();

    // Display each product with inline editing form
    foreach ($products as $product) {
        echo '<div class="card">';
        echo '<img src="' . $product['image_path'] . '" alt="' . $product['product_name'] . '">';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="product_id" value="' . $product['product_id'] . '">';
        echo '<input type="text" name="product_name" value="' . $product['product_name'] . '" required>';
        echo '<textarea name="description" required>' . $product['description'] . '</textarea>';
        echo '<input type="number" name="price" value="' . $product['price'] . '" required>';
        echo '<h3>' . $product['product_name'] . '</h3>';
        echo '<p>' . $product['description'] . '</p>';
        echo '<h5>' . $product['price'] . '$</h5>';
        echo '<button type="submit" name="update">Update</button>';
        echo '</form>';
        // Add delete button
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="product_id" value="' . $product['product_id'] . '">';
        echo '<button type="submit" name="delete">Delete</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>