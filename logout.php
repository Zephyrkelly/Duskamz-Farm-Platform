<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logout - Duskamz Farm</title>
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
    .message {
      background-color: #C8E3D4;
      max-width: 500px;
      margin: 80px auto;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .message h2 {
      color: #0C3B2E;
      margin-bottom: 20px;
    }
    .message a {
      display: inline-block;
      background-color: #0C3B2E;
      color: #F7E7CE;
      padding: 12px 25px;
      border-radius: 6px;
      text-decoration: none;
      margin-top: 20px;
    }
    .message a:hover {
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
      <a href="products.php">Products</a>
      <a href="order.php">Order</a>
      <a href="contact.php">Contact</a>
      <a href="login.php">Login</a>
    </nav>
  </header>

  <div class="message">
    <h2>You have been logged out successfully.</h2>
    <a href="login.php">Login Again</a>
  </div>
</body>
</html>
