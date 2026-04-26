<?php
// config.php - VÉGLEGES VERZIÓ

$host = "localhost";
$dbname = "beauty_nails";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

// Session csak egyszer induljon
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Függvények csak egyszer definiálódjanak
if (!function_exists('isLoggedIn')) {
    function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
?>
