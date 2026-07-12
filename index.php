<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duskamz Farm</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #6D9773; /* soft natural green */
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0C3B2E; /* deep forest green */
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

        .hero {
            background-color: #0C2C47; /* rich navy-green tone */
            color: #F7E7CE;
            text-align: center;
            padding: 80px 20px;
        }

        .hero h2 {
            font-size: 2.5em;
            color: #C8E3D4;
        }

        .hero p {
            font-size: 1.2em;
            margin-top: 10px;
        }

        .hero button {
            background-color: #0C3B2E;
            color: #F7E7CE;
            border: none;
            padding: 12px 25px;
            font-size: 1em;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 20px;
        }

        .hero button:hover {
            background-color: #0C2C47;
        }

        .featured {
            background-color: #C8E3D4;
            padding: 50px 20px;
            text-align: center;
        }

        .featured h3 {
            color: #0C3B2E;
            font-size: 2em;
            margin-bottom: 30px;
        }

        .product-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
        }

        .product-card {
            background-color: #F7E7CE;
            border-radius: 10px;
            width: 250px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .product-card img {
            width: 100%;
            border-radius: 8px;
        }

        .product-card h4 {
            color: #0C3B2E;
            margin-top: 10px;
        }

        footer {
            background-color: #0C3B2E;
            color: #F7E7CE;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Duskamz Farm</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="products.php">Products</a>
            <a href="order.php">Order</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <section class="hero">
        <h2>Welcome to Duskamz Farm</h2>
        <p>Fresh livestock, eggs, catfish, and BSF feed — straight from our farm to your table.</p>
        <button onclick="window.location.href='products.php'">Browse Products</button>
    </section>

    <section class="featured">
        <h3>Featured Products</h3>
        <div class="product-grid">
            <?php
            $result = pg_query($conn, "SELECT name, image, price FROM products ORDER BY id DESC LIMIT 3");
            if ($result && pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<div class='product-card'>
                            <img src='images/{$row['image']}' alt='{$row['name']}'>
                            <h4>{$row['name']}</h4>
                            <p>Price: {$row['price']} Le</p>
                          </div>";
                }
            } else {
                echo "<p>No products available yet.</p>";
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Duskamz Farm — All rights reserved.</p>
    </footer>
</body>
</html>
