<?php
session_start();
include 'db_connect.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Redirect if admin (admins should use dashboard.php)
if ($_SESSION['role'] === 'admin') {
    header("Location: dashboard.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch only this customer's orders
$query = "SELECT order_id, product_name, status, created_at 
          FROM orders 
          WHERE customer_id = $user_id";
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <style>
        body {
            background-color: #C1E1C1; /* pastel green */
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #228B22; /* forest green */
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #228B22;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">My Orders</div>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['created_at']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
