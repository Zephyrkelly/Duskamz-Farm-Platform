<?php
session_start();

// Protect the page: only logged-in customers can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    header("Location: login.php");
    exit;
}

include 'db_connect.php';

// Fetch customer orders
$query = "SELECT id, product, quantity, status, address FROM orders WHERE customer_name = $1 ORDER BY id DESC";
$result = pg_query_params($conn, $query, array($_SESSION['user_id']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Dashboard - Duskamz Farm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#C8E3D4; font-family:'Poppins',sans-serif;">

  <!-- Navbar -->
   <nav class="navbar navbar-expand-lg" style="background-color:#0C3B2E;">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand fw-bold" 
       href="#" 
       style="font-size:1.8em; color:#228B22;"> <!-- Gold -->
       Duskamz Farm
    </a>
    <!-- If you prefer forest green instead of gold, use: color:#228B22; -->

    <!-- Nav links -->
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="product.php" style="color:#228B22;">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php" style="color:#228B22;">Place Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color:#228B22;">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <!-- Dashboard Content -->
  <div class="container py-5">
    <h2 class="text-center mb-4" style="color:#0C3B2E; font-weight:bold;">Welcome to Your Dashboard</h2>

    <div class="card shadow-lg p-4" style="background-color:#F7E7CE; border-radius:12px;">
      <h4 style="color:#0C3B2E; font-weight:bold;">Your Orders</h4>
      <table class="table table-bordered table-striped mt-3">
        <thead style="background-color:#6D9773; color:#fff;">
          <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result && pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
              echo "<tr>
                      <td>{$row['id']}</td>
                      <td>{$row['product']}</td>
                      <td>{$row['quantity']}</td>
                      <td>{$row['status']}</td>
                      <td>{$row['address']}</td>
                    </tr>";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No orders found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3" style="background-color:#0C3B2E; color:#F7E7CE; font-size:0.9em;">
    <p>&copy; 2026 Duskamz Farm — All rights reserved.</p>
  </footer>

</body>
</html>
