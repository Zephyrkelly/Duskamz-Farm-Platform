<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'db_connect.php';

// Example stats
$totalOrders = pg_fetch_result(pg_query($conn, "SELECT COUNT(*) FROM orders"), 0, 0);
$pendingOrders = pg_fetch_result(pg_query($conn, "SELECT COUNT(*) FROM orders WHERE status='Pending'"), 0, 0);
$fulfilledOrders = pg_fetch_result(pg_query($conn, "SELECT COUNT(*) FROM orders WHERE status='Fulfilled'"), 0, 0);
?>
<h2>Dashboard</h2>
<p>Total Orders: <?php echo $totalOrders; ?></p>
<p>Pending Orders: <?php echo $pendingOrders; ?></p>
<p>Fulfilled Orders: <?php echo $fulfilledOrders; ?></p>
<a href="admin.php">Go to Orders</a>
