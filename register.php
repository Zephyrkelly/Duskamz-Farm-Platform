<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';

$error = "";

if (isset($_POST['register'])) {
    $fullname   = trim($_POST['name']); // matches 'fullname' column
    $email      = trim($_POST['email']);
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role       = 'customer'; // default role
    $created_at = date('Y-m-d H:i:s');

    // Secure parameterized query
    $query = "INSERT INTO users (fullname, email, password, role, created_at)
              VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $query, array($fullname, $email, $password, $role, $created_at));

    if ($result) {
        // Redirect straight to login with flag
        header("Location: login.php?registered=1");
        exit;
    } else {
        $error = pg_last_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Duskamz Farm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color:#6D9773; font-family:'Poppins',sans-serif; }
    header { background-color:#0C3B2E; color:#F7E7CE; padding:15px 40px; display:flex; justify-content:space-between; align-items:center; }
    header h1 { font-size:1.8em; color:#F7E7CE; }
    nav a { color:#F7E7CE; text-decoration:none; margin-left:20px; font-weight:500; }
    nav a:hover { color:#C8E3D4; }
    form { background-color:#C8E3D4; max-width:500px; margin:50px auto; padding:30px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); }
    form h2 { text-align:center; color:#0C3B2E; margin-bottom:20px; }
    label { display:block; margin-top:15px; color:#0C3B2E; font-weight:500; }
    input { width:100%; padding:10px; margin-top:5px; border:1px solid #0C3B2E; border-radius:6px; }
    button { background-color:#0C3B2E; color:#F7E7CE; border:none; padding:12px 25px; font-size:1em; border-radius:6px; cursor:pointer; margin-top:20px; width:100%; }
    button:hover { background-color:#0C2C47; }
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

  <form method="POST" action="register.php">
    <h2>Customer Registration</h2>

    <?php if (!empty($error)) { ?>
      <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php } ?>

    <label>Full Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit" name="register">Register</button>
  </form>
</body>
</html>
