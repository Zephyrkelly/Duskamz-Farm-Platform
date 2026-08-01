?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';

$error = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Secure query to prevent SQL injection
    $query = "SELECT * FROM users WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));
    $user = pg_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Store session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($_SESSION['role'] === 'admin') {
            header("Location: admin.php"); // Admin dashboard
        } else {
            header("Location: customer_dashboard.php"); // Customer dashboard
        }
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Login - Duskamz Farm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#C8E3D4; font-family:'Poppins',sans-serif;">

  <!-- Sign Up button -->
  <div style="position:absolute; top:20px; right:30px;">
    <a href="register.php" class="btn btn-outline-warning fw-bold">Sign Up</a>
  </div>

  <!-- Centered login box -->
  <div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card p-4 shadow-lg" style="width:340px; border-radius:12px; background-color:#F7E7CE;">
      <h4 class="text-center mb-4" style="color:#0C3B2E; font-weight:700;">Customer Login</h4>

      <!-- Show error if login fails -->
      <?php if (!empty($error)) { ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
      <?php } ?>

      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label" style="color:#0C3B2E;">Email:</label>
          <input type="email" name="email" class="form-control form-control-sm" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label" style="color:#0C3B2E;">Password:</label>
          <input type="password" name="password" class="form-control form-control-sm" required>
        </div>
        <button type="submit" name="login" class="btn w-100 mt-3" style="background-color:#0C3B2E; color:#F7E7CE; font-weight:bold;">Login</button>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3" style="background-color:#0C3B2E; color:#F7E7CE; font-size:0.9em;">
    <p>&copy; 2026 Duskamz Farm — All rights reserved.</p>
  </footer>

</body>
</html>
