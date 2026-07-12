<?php
$conn = pg_connect("host=localhost dbname=duskamz_farm user=duskamz_user password=Kamara25");
if (!$conn) {
    die("Database connection failed: " . pg_last_error());
}
?>
<?php
$conn = pg_connect("host=localhost dbname=duskamz_farm user=postgres password=Kamara25");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
