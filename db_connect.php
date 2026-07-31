<?php
echo "Host: " . getenv('PGHOST') . PHP_EOL;
echo "Port: " . getenv('PGPORT') . PHP_EOL;
echo "Database: " . getenv('PGDATABASE') . PHP_EOL;
echo "User: " . getenv('PGUSER') . PHP_EOL;
echo "Password: " . getenv('PGPASSWORD') . PHP_EOL;



// Load .env locally (Render injects variables automatically)
if (file_exists(__DIR__ . '/env.php')) {
    include __DIR__ . '/env.php';
}

// Prefer Render PG* variables if available, otherwise use local DB_* variables
$host = getenv('PGHOST') ?: getenv('DB_HOST');
$port = getenv('PGPORT') ?: getenv('DB_PORT');
$dbname = getenv('PGDATABASE') ?: getenv('DB_NAME');
$user = getenv('PGUSER') ?: getenv('DB_USER');
$password = getenv('PGPASSWORD') ?: getenv('DB_PASS');

// Build connection string
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";
echo "Connection string: $conn_string\n";
$conn = pg_connect($conn_string);

if (!$conn) {
    die("❌ Connection failed: " . pg_last_error());
}

// Optional test query
$result = pg_query($conn, "SELECT NOW()");
if ($result) {
    $row = pg_fetch_row($result);
    echo "✅ Connected successfully! Server time: " . $row[0];
} else {
    echo "⚠️ Connected but query failed.";
}
?>
