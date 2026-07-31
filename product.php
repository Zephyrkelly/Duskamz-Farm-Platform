<?php
session_start();
include("db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Duskamz Farm - Products</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Header with seamless nav -->
  <header style="background-color:#0C3B2E; padding:15px 40px; display:flex; justify-content:space-between; align-items:center;">
    <h1 style="color:#F7E7CE; font-size:1.8em;">Duskamz Farm</h1>
    <nav>
      <a href="homepage.php" style="color:#F7E7CE; margin-left:20px; text-decoration:none;">Home</a>
      <a href="about.php" style="color:#F7E7CE; margin-left:20px; text-decoration:none;">About</a>
      <a href="products.php" style="color:#F7E7CE; margin-left:20px; text-decoration:none;">Products</a>
      <a href="order.php" style="color:#F7E7CE; margin-left:20px; text-decoration:none;">Order</a>
      <a href="contact.php" style="color:#F7E7CE; margin-left:20px; text-decoration:none;">Contact</a>
      <a href="login.php" style="color:#F7E7CE; margin-left:20px; text-decoration:none;">Login</a>
    </nav>
  </header>

  <!-- Products Section -->
  <section class="py-5" style="background-color:#C8E3D4;">
  <div class="container">
    <h2 class="text-center mb-4" style="color:#0C3B2E;">Our Farm Products</h2>
    <div class="row">

      <!-- Product 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="images/eggs.jpg" class="card-img-top" alt="Eggs">
          <div class="card-body">
            <h5 class="card-title">Eggs</h5>
            <p class="card-text">Fresh farm eggs.</p>
            <p class="card-text"><strong>Price:</strong> 20 Le</p>
            <a href="order.php?product=Eggs" class="btn btn-success w-100">Order Now</a>
          </div>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="images/pigs.jpg" class="card-img-top" alt="Pigs">
          <div class="card-body">
            <h5 class="card-title">Pigs</h5>
            <p class="card-text">Healthy pigs.</p>
            <p class="card-text"><strong>Price:</strong> 15 Le</p>
            <a href="order.php?product=pigs" class="btn btn-success w-100">Order Now</a>
          </div>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="images/catfish.jpg" class="card-img-top" alt="Corn">
          <div class="card-body">
            <h5 class="card-title">Catfish</h5>
            <p class="card-text">Well bred stock.</p>
            <p class="card-text"><strong>Price:</strong> 10 Le</p>
            <a href="order.php?product=Catfish" class="btn btn-success w-100">Order Now</a>
          </div>
        </div>
      </div>

      <!-- Add more products here in the same format -->

    </div>
  </div>
</section>



  <!-- Footer -->
  <footer class="text-center py-3" style="background-color:#0C3B2E; color:#F7E7CE;">
    <p>&copy; 2026 Duskamz Farm | Powered by Bootstrap</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>