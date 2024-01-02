<?php
// Database connection parameters
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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // Upload image
    $image_path = "images/" . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);

    // Insert data into the database
    $sql = "INSERT INTO products_men_test (product_name, description, price, image_path) VALUES ('$product_name', '$description', '$price', '$image_path')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch data from the database
$sql = "SELECT * FROM products_men_test";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #291b1b;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #422f2f;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .return-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .return-button a {
            text-decoration: none;
            background-color: #291b1b;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        .return-button a:hover {
            background-color: #422f2f;
        }


    </style>
</head>
<body>
    <h2>Add Product</h2>
    <form action="Admin_men_add.php" method="post" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" required>

        <label for="image">Image Path:</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" value="Add Product">
    </form>

    <!-- Display data in a table -->
    <h2>Product Table</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image Path</th>
        </tr>
        <?php
        // Display fetched data in a table
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["image_path"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <div class="return-button">
        <a href="Admin_Home_page.php">Return to Admin Home Page</a>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
