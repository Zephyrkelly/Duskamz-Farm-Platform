<?php
include("db_connect.php");

$result = pg_query($conn, "SELECT * FROM products");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Duskamz Farm - Products</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand text-white" href="index.html">Duskamz Farm</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link text-white" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="products.php">Products</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="order.php">Order</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Products Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Our Farm Products</h2>
      <div class="row">

        <!-- Pigs -->
        <div class="col-md-2 mb-4">
          <div class="card h-100">
            <img src="images/pigs.jpg" class="card-img-top" alt="Pigs">
            <div class="card-body">
              <h5 class="card-title">Pigs</h5>
              <p class="card-text">Healthy farm pigs available for sale.</p>
              <a href="order.php?product=Pigs" class="btn btn-success">Order Now</a>
            </div>
          </div>
        </div>

        <!-- Eggs -->
        <div class="col-md-2 mb-4">
          <div class="card h-100">
            <img src="images/eggs.jpg" class="card-img-top" alt="Eggs">
            <div class="card-body">
              <h5 class="card-title">Eggs</h5>
              <p class="card-text">Fresh farm eggs delivered daily.</p>
              <a href="order.php?product=Eggs" class="btn btn-success">Order Now</a>
            </div>
          </div>
        </div>

        <!-- Catfish -->
        <div class="col-md-2 mb-4">
          <div class="card h-100">
            <img src="images/catfish.jpg" class="card-img-top" alt="Catfish">
            <div class="card-body">
              <h5 class="card-title">Catfish</h5>
              <p class="card-text">Freshwater catfish harvested from our ponds.</p>
              <a href="order.php?product=Catfish" class="btn btn-success">Order Now</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center py-3">
    <p>&copy; 2026 Duskamz Farm | Powered by Bootstrap</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
