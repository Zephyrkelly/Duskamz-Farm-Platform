<?php
include("db_connect.php"); // connect to database

// Handle status update
if (isset($_GET['fulfill_id'])) {
  $orderId = intval($_GET['fulfill_id']);
  pg_query($conn, "UPDATE orders SET status='Fulfilled' WHERE id=$orderId");
}

// Fetch all orders
$result = pg_query($conn, "SELECT * FROM orders ORDER BY order_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Duskamz Farm - Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container">
    <a class="navbar-brand text-white" href="index.html">Duskamz Farm Admin</a>
  </div>
</nav>

<!-- Orders Table -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Customer Orders</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Customer Name</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Order Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result) {
          while ($row = pg_fetch_assoc($result)) {
            echo "
            <tr>
              <td>{$row['id']}</td>
              <td>{$row['customer_name']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['address']}</td>
              <td>{$row['product']}</td>
              <td>{$row['quantity']}</td>
              <td>{$row['order_date']}</td>
            </tr>
            ";
          }
        } else {
          echo "<tr><td colspan='7'>No orders found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</section>

</body>
</html>
