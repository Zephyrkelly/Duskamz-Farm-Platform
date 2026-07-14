<?php
// Load .env file manually
function loadEnv($path) {
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // skip comments
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        putenv("$name=$value");       // set system environment
        $_ENV[$name] = $value;        // set PHP environment
        $_SERVER[$name] = $value;     // set server environment
    }
}

// Load .env file from project root
loadEnv(__DIR__ . '/.env');

// Use variables
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

// Connect to PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if ($conn) {
    echo "Connected successfully!";
} else {
    echo "Connection failed.";
}
?>
