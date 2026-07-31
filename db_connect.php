<?php
// Call env.php to load environment variables
require_once __DIR__ . '/env.php';

// Now you can safely use $_ENV values
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

$conn = pg_connect("host=dpg-d9b956ernols739ni3rg-a.oregon-postgres.render.com port=5432 dbname=duskamz_db user=duskamz_db_user password=g7CmJ7vuvJZTlArcnwkJtV4qNZ6xIXTX sslmode=require");

if ($conn) {
   // echo "Connected successfully!";
} else {
    echo "Connection failed.";
}
?>