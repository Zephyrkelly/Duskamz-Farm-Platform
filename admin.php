<?php
session_start();
include 'db_connect.php';

// Only admins can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Handle status update
if (isset($_GET['fulfill_id'])) {
    $orderId = intval($_GET['fulfill_id']);
    pg_query($conn, "UPDATE orders SET status='Fulfilled' WHERE id=$orderId");
}

// Handle new order form submission
if (isset($_POST['add_order'])) {
    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO orders (customer_name, phone, address, product, quantity, status)
              VALUES ('$customer_name', '$phone', '$address', '$product', '$quantity', 'Pending')";
    pg_query($conn, $query);
}

// Fetch all orders
$result = pg_query($conn, "SELECT * FROM orders");
if (!$result) {
    die("Query failed: " . pg_last_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Duskamz Farm Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">Admin Dashboard</div>
    <div class="container-flex">
        <!-- Orders Table -->
        <div class="box">
            <h2>Customer Orders</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result && pg_num_rows($result) > 0) {
                    while ($row = pg_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['customer_name']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['product']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['status']}</td>
                                <td><a class='btn' href='admin.php?fulfill_id={$row['id']}'>Fulfill</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No orders found.</td></tr>";
                }
                ?>
            </table>
        </div>

        <!-- Add Order Form -->
        <div class="box">
            <h2>Add New Order</h2>
            <div class="form-box">
                <form method="POST" action="admin.php">
                    <label>Customer Name:</label>
                    <input type="text" name="customer_name" required>

                    <label>Phone:</label>
                    <input type="text" name="phone" required>

                    <label>Address:</label>
                    <input type="text" name="address" required>

                    <label>Product:</label>
                    <input type="text" name="product" required>

                    <label>Quantity:</label>
                    <input type="number" name="quantity" required>

                    <button type="submit" name="add_order">Add Order</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
