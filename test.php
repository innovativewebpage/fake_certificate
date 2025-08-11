<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "", 3306);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "✅ Connected successfully!";
?>
