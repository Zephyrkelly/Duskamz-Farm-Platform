<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Place an Order - Duskamz Farm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <header class="bg-dark text-light p-3 d-flex justify-content-between">
    <h1>Duskamz Farm</h1>
    <nav>
      <a href="homepage.php" class="text-light me-3">Home</a>
      <a href="product.php" class="text-light me-3">Products</a>
      <a href="order_form.php" class="text-light">Order</a>
    </nav>
  </header>

  <main class="container my-5">
    <h2 class="text-center mb-4">Place Your Order</h2>
    <form action="order.php" method="POST" class="mx-auto" style="max-width:600px;">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" class="form-control" name="phone" required>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" required>
      </div>
      <div class="mb-3">
        <label for="product" class="form-label">Product</label>
        <input type="text" class="form-control" name="product" required>
      </div>
      <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity" min="1" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Submit Order</button>
    </form>
  </main>
</body>
</html>
