<?php
$conn = pg_connect("host=" . getenv("PGHOST") .
                   " port=" . getenv("PGPORT") .
                   " dbname=" . getenv("PGDATABASE") .
                   " user=" . getenv("PGUSER") .
                   " password=" . getenv("PGPASSWORD") .
                   " sslmode=require");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
} else {
    echo "Connected to Render PostgreSQL!";
}
?>
