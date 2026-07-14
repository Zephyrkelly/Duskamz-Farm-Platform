<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Duskamz Farm</title>
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
    .contact-section {
      background-color: #C8E3D4;
      max-width: 600px;
      margin: 50px auto;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .contact-section h2 {
      color: #0C3B2E;
      text-align: center;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-top: 15px;
      color: #0C3B2E;
      font-weight: 500;
    }
    input, textarea {
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
    .social-links {
      text-align: center;
      margin-top: 30px;
    }
    .social-links a {
      display: inline-block;
      background-color: #0C3B2E;
      color: #F7E7CE;
      padding: 10px 20px;
      margin: 5px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 500;
    }
    .social-links a:hover {
      background-color: #0C2C47;
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

  <!-- Contact Section -->
  <div class="contact-section">
    <h2>Contact Us</h2>
    <form action="send_message.php" method="POST">
      <label for="name">Full Name:</label>
      <input type="text" name="name" required>

      <label for="email">Email:</label>
      <input type="email" name="email" required>

      <label for="phone">Phone Number:</label>
      <input type="text" name="phone">

      <label for="message">Message:</label>
      <textarea name="message" rows="5" required></textarea>

      <button type="submit">Send Message</button>
    </form>

    <!-- Social Media Links -->
    <div class="social-links">
      <h3 style="color:#0C3B2E;">Connect with us:</h3>
      <a href="https://facebook.com/YourFarmPage" target="_blank">Facebook</a>
      <a href="https://instagram.com/YourFarmPage" target="_blank">Instagram</a>
      <a href="https://twitter.com/YourFarmPage" target="_blank">Twitter</a>
      <a href="https://wa.me/23276903471" target="_blank">WhatsApp</a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2026 Duskamz Farm | Powered by Bootstrap</p>
  </footer>
</body>
</html>
