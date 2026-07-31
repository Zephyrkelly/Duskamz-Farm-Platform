<?php
include("db_connect.php"); // connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST['name']);
  $phone = trim($_POST['phone']);
  $address = trim($_POST['address']);
  $product = trim($_POST['product']);
  $quantity = intval($_POST['quantity']);

  if (!empty($name) && !empty($phone) && !empty($address) && !empty($product) && $quantity > 0) {
    $query = "INSERT INTO order (customer_name, phone, address, product, quantity, status) 
              VALUES ($1, $2, $3, $4, $5, $6)";
    $result = pg_query_params($conn, $query, [$name, $phone, $address, $product, $quantity, 'Pending']);

    if ($result) {
      header("Location: confirmation.php");
      exit;
    } else {
      die("Error placing order: " . pg_last_error($conn));
    }
  } else {
    die("Invalid input. Please fill in all fields.");
  }
}
?>
