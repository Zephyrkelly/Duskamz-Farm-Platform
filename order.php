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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Place an Order - Duskamz Farm</title>
  <style>
    body {
      background-color: #6D9773; /* soft natural green */
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
    header h1 {
      font-size: 1.8em;
      color: #F7E7CE;
    }
    nav a {
      color: #F7E7CE;
      text-decoration: none;
      margin-left: 20px;
      font-weight: 500;
    }
    nav a:hover {
      color: #C8E3D4;
    }
    form {
      background-color: #C8E3D4;
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    form h2 {
      text-align: center;
      color: #0C3B2E;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-top: 15px;
      color: #0C3B2E;
      font-weight: 500;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #0C3B2E;
      border-radius: 6px;
    }
    button {
      background-color: #0C3B2E;
      color: #F7E7CE;
      border: none;
      padding: 12px 25px;
      font-size: 1em;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 20px;
      width: 100%;
    }
    button:hover {
      background-color: #0C2C47;
    }
  </style>
</head>
<body>
  <!-- Seamless header with nav buttons -->
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

  <form action="order.php" method="POST">
    <h2>Place Your Order</h2>
    <label for="name">Full Name:</label>
    <input type="text" name="name" required>

    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" required>

    <label for="address">Address:</label>
    <input type="text" name="address" required>

    <label for="product">Product:</label>
    <input type="text" name="product" required>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" min="1" required>

    <button type="submit">Submit Order</button>
  </form>
</body>
</html>
