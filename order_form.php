<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place an Order - Duskamz Farm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Place Your Order</h1>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="products.php">Products</a>
            <a href="order_form.php">Order</a>
            <a href="login.php">Login</a>
        </nav>
    </header>

    <main>
        <form action="order.php" method="POST">
            <label for="name">Full Name:</label><br>
            <input type="text" name="name" required><br><br>

            <label for="phone">Phone Number:</label><br>
            <input type="text" name="phone" required><br><br>

            <label for="address">Address:</label><br>
            <input type="text" name="address" required><br><br>

            <label for="product">Product:</label><br>
            <input type="text" name="product" required><br><br>

            <label for="quantity">Quantity:</label><br>
            <input type="number" name="quantity" min="1" required><br><br>

            <button type="submit">Submit Order</button>
        </form>
    </main>
</body>
</html>
