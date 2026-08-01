<?php
session_start();
include 'db_connect.php';

// Only admins can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Handle status update securely
if (isset($_GET['fulfill_id'])) {
    $orderId = intval($_GET['fulfill_id']);
    pg_query_params($conn, "UPDATE orders SET status=$1 WHERE id=$2", array('Fulfilled', $orderId));
}

// Handle delete order securely
if (isset($_GET['delete_id'])) {
    $orderId = intval($_GET['delete_id']);
    pg_query_params($conn, "DELETE FROM orders WHERE id=$1", array($orderId));
}

// Handle new order form submission securely
if (isset($_POST['add_order'])) {
    $query = "INSERT INTO orders (customer_name, phone, address, product, quantity, status)
              VALUES ($1, $2, $3, $4, $5, $6)";
    pg_query_params($conn, $query, array(
        $_POST['customer_name'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['product'],
        $_POST['quantity'],
        'Pending'
    ));
}

// Fetch all orders
$result = pg_query($conn, "SELECT * FROM orders ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Duskamz Farm Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#C8E3D4; font-family:'Poppins',sans-serif;">
    <div class="container my-5">
        <h1 class="text-center mb-4" style="color:#0C3B2E;">Admin Dashboard</h1>

        <!-- Orders Table -->
        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-light">Customer Orders</div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
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
                    </thead>
                    <tbody>
                        <?php
                        if ($result && pg_num_rows($result) > 0) {
                            while ($row = pg_fetch_assoc($result)) {
                                $badge = $row['status'] === 'Fulfilled' ? 'bg-success' : 'bg-warning';
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['customer_name']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['product']}</td>
                                        <td>{$row['quantity']}</td>
                                        <td><span class='badge $badge'>{$row['status']}</span></td>
                                        <td>
                                            <a class='btn btn-sm btn-primary me-2' href='admin.php?fulfill_id={$row['id']}'>Fulfill</a>
                                            <a class='btn btn-sm btn-danger' href='admin.php?delete_id={$row['id']}' 
                                               onclick=\"return confirm('Are you sure you want to delete this order?');\">Delete</a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>No orders found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Order Form -->
        <div class="card shadow">
            <div class="card-header bg-dark text-light">Add New Order</div>
            <div class="card-body">
                <form method="POST" action="admin.php">
                    <div class="mb-3">
                        <label class="form-label">Customer Name:</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product:</label>
                        <input type="text" name="product" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity:</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <button type="submit" name="add_order" class="btn btn-success w-100">Add Order</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
