<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3atarny"; // Replace with your actual database name

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



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
  <title>Products</title>
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





  <link rel="stylesheet" href="products.css">
 
  

  
</head>
<body>

<!-- navigation-bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  
    <a class="navbar-brand fs-2 fw-bold" href="index.html"><i class="fa-solid fa-spray-can-sparkles"></i><span class="text-danger">Fragrance</span>Buy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse show" id="navbarDark">
      <ul class="navbar-nav ms-auto mb-2 mb-xl-0 fs-5 ms-auto p-2 text-center">
        <li class="nav-item me-3">
          <a class="nav-link " aria-current="page" href="products_men.php">Men</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="products_women.php">Women</a>
        </li>
        
        <li class="nav-item me-3">
          <a class="nav-link" href="login.php"><i class="fa-solid fa-user"></i> Login</a>
        </li>
       
       
      </ul>
      
    </div>
  
</div>
</nav> 
<!-- navigation-bar -->

<!-- banner -->
<div class="banner">
  <div class="banner-text">
    <h2>ALL PRODUCTS</h2>
    <h1>SALE</h1>
    
  </div>
</div> 
   <!-- banner -->

   <div class="card-container">
    <h1 class="text-center">MEN'S collection</h1> 
  </div>


<div class="card-container">
    <?php
    // Fetch products from the database
    $products = getProducts();

    // Display each product
    foreach ($products as $product) {
        echo '<div class="card">';
        echo '<img src="' . $product['image_path'] . '" alt="' . $product['product_name'] . '">';
        echo '<h3>' . $product['product_name'] . '</h3>';
        echo '<p>' . $product['description'] . '</p>';
        echo '<h5>' . $product['price'] . '$</h5>';
        echo '<a href="login.php" id="btn"><i class="fa-solid fa-cart-shopping"></i>Add To cart</a>';
        echo '</div>';
    }
    ?>
</div>



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

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->



</body>
</html>
