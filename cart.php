<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- <meta name="description" content="">
  <meta name="author" content=""> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<title>Fragrance Buy</title>


<!-- Font Awesome Icons -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="cart.css">
    
    <style>
        /* Additional styles specific to the checkout form */
        #checkoutModalLabel {
            color: #291b1b; /* Brown color for the modal title */
        }
    </style>
</head>
<body>

<!-- navigation-bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  
    <a class="navbar-brand fs-2 fw-bold" href="index2.html"><i class="fa-solid fa-spray-can-sparkles"></i><span class="text-danger">Fragrance</span>Buy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse show" id="navbarDark">
      <ul class="navbar-nav ms-auto mb-2 mb-xl-0 fs-5 ms-auto p-2 text-center">
        <li class="nav-item me-3">
          <a class="nav-link " aria-current="page" href="products_signed_men.php">Men</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="products_signed_women.php">Women</a>
        </li>

        <li class="nav-item me-3">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-user"></i> Cart</a>
        </li>
        
        <li class="nav-item me-3">
          <a class="nav-link" href="index.html"><i class="fa-solid fa-user"></i> Log Out</a>
        </li>
       
       
      </ul>
      
    </div>
  
</div>
</nav> 
<!-- navigation-bar -->

<!-- Your Cart Content Goes Here -->
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3atarny";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the cart is not empty
if (!empty($_SESSION["cart"])) {
    echo "<table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>";

    $totalPrice = 0;

    foreach ($_SESSION["cart"] as $product) {
        echo "<tr>";
        
        // Check if the 'name' key exists in the product array
        echo "<td>";
        if (isset($product['name'])) {
            echo $product['name'];
        } else {
            echo "Product name: Not available";
        }
        echo "</td>";

        // Check if the 'price' key exists in the product array
        echo "<td>";
        if (isset($product['price'])) {
            echo "$" . number_format($product['price'], 2);
            $totalPrice += $product['price'];
        } else {
            echo "Price: Not available";
        }
        echo "</td>";

        // Add the remove button
        echo "<td class='cart-product'>
                <form action='removeFromCart.php' method='post'>
                    <input type='hidden' name='product_id' value='{$product['id']}'>
                    <button type='submit' name='remove_from_cart'>Remove from Cart</button>
                </form>
              </td>";

        echo "</tr>";
    }

    // Display the total price
    echo "<tr>
            <td colspan='2' class='total-price'>Total Price:</td>
            <td class='total-price'>$" . number_format($totalPrice, 2) . "</td>
          </tr>";

    // Checkout Button
    echo "<tr>
            <td colspan='3' class='checkout-button'>
                <button type='button' class='btn btn-success' data-toggle='modal' data-target='#checkoutModal'>
                    Checkout
                </button>
            </td>
          </tr>";

    echo "</table>";
} else {
    echo "<table>
            <tr>
                <td colspan='3' class='empty-cart-message'>
                    <P></p>
                    <P></p>
                    
                    <p>Your cart is empty.</p>
                </td>
            </tr>
          </table>";
}
?>


<!-- Your Cart Content Goes Here -->

<!-- Your Cart Content Goes Here -->

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Checkout Form -->
                <form action="process_checkout.php" method="post" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
    <div class="form-group">
        <label for="credit_card_number">Credit Card Number</label>
        <input type="text" class="form-control" id="credit_card_number" name="credit_card_number" pattern="\d{16}" title="Credit card number must be 16 digits" required>
    </div>
    <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" class="form-control" id="cvv" name="cvv" pattern="\d{3}" title="CVV must be 3 digits" required>
    </div>
    <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary d-block mx-auto">Pay</button>
    </div>
</form>

                <!-- Checkout Form -->
            </div>
        </div>
    </div>
</div>


<!-- Checkout Form -->
<script>
    function validateForm() {
        // Custom validation logic
        var credit_card_number = document.getElementById("credit_card_number").value;
        var cvv = document.getElementById("cvv").value;

        if (credit_card_number.length !== 16) {
            alert("Credit card number must be 16 digits");
            return false;
        }

        if (cvv.length !== 3) {
            alert("CVV must be 3 digits");
            return false;
        }

        // Additional validation logic if needed

        return true;
    }
</script>
                <!-- Checkout Form -->
            </div>
        </div>
    </div>
</div>
<!-- Checkout Modal -->
<!--
<!-- Checkout Button --
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#checkoutModal">
    Checkout
</button>
<!-- Checkout Button --
-->
<footer>
  <div class="container">
      <div class="row">
          <div class="col-lg-5 col-sm-6">
              <div class="single-box">
                <h2>About</h2> 
                <img src="img/logo.png" alt="">
              
              <p>
                Welcome to Fragrance Buy, your go-to destination for affordable luxury scents. We believe in making your favorite fragrances accessible to all. Discover a captivating range of aromas at unbeatable prices, where quality and authenticity meet style. Your signature scent is just a click away at Fragrance Buy – where indulgence meets affordability!</p>
              <h3>We Accect</h3>
              <div class="card-area">
                      <i class="fa fa-cc-visa"></i>
                      <i class="fa fa-credit-card"></i>
                      <i class="fa fa-cc-mastercard"></i>
                      <i class="fa fa-cc-paypal"></i>
              </div>
              </div>
          </div>
              
          <div class="col-lg-2 col-sm-6">
                                 
          </div>
          
          <div class="col-lg-5 col-sm-6">
              <div class="single-box">
                  <h2>Contact us</h2>
                  <h3 class="contact-heading"></h3>
					<p class="contact-info"><i class="fa fa-map-marker"></i> AAST Bulding A,5TH Floor, Smart village</p>
					<p class="contact-info"><i class="fa fa-phone"></i> 19277</p>
					<p class="contact-info"><i class="fa fa-envelope"></i>  info@FragranceBuy.com</p>
					<p class="contact-info"><i class="fa fa-globe"></i> www.FragranceBuy.com</p>

                  <h2>Follow us on</h2>
                  <p class="socials">
                      <i class="fa fa-facebook"></i>
                      <i class="fa fa-dribbble"></i>
                      <i class="fa fa-pinterest"></i>
                      <i class="fa fa-twitter"></i>
                  </p>
              </div>
          </div>
      </div>
  </div>
</footer>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js">

<script src="https://kit.fontawesome.com/1c9dfc250e.js" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<!-- Bootstrap and other scripts --
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/1c9dfc250e.js" crossorigin="anonymous"></script>
-->