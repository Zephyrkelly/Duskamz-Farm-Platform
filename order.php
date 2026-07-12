<?php
include("db_connect.php"); // connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST['name']);
  $phone = trim($_POST['phone']);
  $address = trim($_POST['address']);
  $product = trim($_POST['product']);
  $quantity = intval($_POST['quantity']);

  // Basic validation
  if (!empty($name) && !empty($phone) && !empty($address) && !empty($product) && $quantity > 0) {
    $query = "INSERT INTO orders (customer_name, phone, address, product, quantity, status) 
              VALUES ('$name', '$phone', '$address', '$product', $quantity, 'Pending')";
    $result = pg_query($conn, $query);

    if ($result) {
      header("Location: confirmation.php"); // redirect to confirmation page
      exit;
    } else {
      echo "<script>alert('Error placing order.');</script>";
    }
  } else {
    echo "<script>alert('Please fill in all fields correctly.');</script>";
  }
}
?>
