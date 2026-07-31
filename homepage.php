<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Duskamz Farm - Homepage</title>
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #6D9773;
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #0C3B2E;
      color: #F7E7CE;
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 { font-size: 1.8em; color: #F7E7CE; }
    nav a {
      color: #F7E7CE; text-decoration: none; margin-left: 20px; font-weight: 500;
    }
    nav a:hover { color: #C8E3D4; }
    .hero {
      background-color: #0C2C47; color: #F7E7CE; text-align: center; padding: 80px 20px;
    }
    .hero h2 { font-size: 2.5em; color: #C8E3D4; }
    .hero p { font-size: 1.2em; margin-top: 10px; }
    .hero button {
      background-color: #0C3B2E; color: #F7E7CE; border: none;
      padding: 12px 25px; font-size: 1em; border-radius: 6px; cursor: pointer; margin-top: 20px;
    }
    .hero button:hover { background-color: #0C2C47; }
    .featured {
      background-color: #C8E3D4; padding: 50px 20px; text-align: center;
    }
    .featured h3 { color: #0C3B2E; font-size: 2em; margin-bottom: 30px; }
    .product-grid {
      display: flex; justify-content: center; flex-wrap: wrap; gap: 25px;
    }
    .product-card {
      background-color: #F7E7CE; border-radius: 10px; width: 250px; padding: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .product-card img {
      width: 100%; height: 180px; object-fit: cover; border-radius: 8px;
    }
    .product-card h4 { color: #0C3B2E; margin-top: 10px; }
    footer {
      background-color: #0C3B2E; color: #F7E7CE; text-align: center; padding: 15px; margin-top: 40px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Duskamz Farm</h1>
    <nav>
      <a href="homepage.php">Home</a>
      <a href="about.php">About</a>
      <a href="product.php">Products</a>
      <a href="order.php">Order</a>
      <a href="contact.php">Contact</a>
      <a href="login.php">Login</a>
    </nav>
  </header>

  <section class="hero">
    <h2>Welcome to Duskamz Farm</h2>
    <p>Fresh livestock, eggs, catfish, and BSF feed — straight from our farm to your table.</p>
    <button onclick="window.location.href='products.php'">Browse Products</button>
  </section>

  <section class="featured">
  <h3>Featured Products</h3>
  <div class="row justify-content-center">

    <!-- Product 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="images/eggs.jpg" class="card-img-top" alt="Eggs" style="height:200px; object-fit:cover;">
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
        <img src="images/pigs.jpg" class="card-img-top" alt="Pigs" style="height:200px; object-fit:cover;">
        <div class="card-body">
          <h5 class="card-title">Pigs</h5>
          <p class="card-text">Healthy pigs.</p>
          <p class="card-text"><strong>Price:</strong> 15 Le</p>
          <a href="order.php?product=Pigs" class="btn btn-success w-100">Order Now</a>
        </div>
      </div>
    </div>

    <!-- Product 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="images/catfish.jpg" class="card-img-top" alt="Catfish" style="height:200px; object-fit:cover;">
        <div class="card-body">
          <h5 class="card-title">Catfish</h5>
          <p class="card-text">Well bred stock.</p>
          <p class="card-text"><strong>Price:</strong> 10 Le</p>
          <a href="order.php?product=Catfish" class="btn btn-success w-100">Order Now</a>
        </div>
      </div>
    </div>

  </div>
</section>


  <footer>
    <p>&copy; 2026 Duskamz Farm — All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
