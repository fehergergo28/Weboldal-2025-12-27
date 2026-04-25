<?php
$host = "localhost";
$dbname = "beauty_nails";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba: " . $conn->connect_error);
}

session_start();
?>
