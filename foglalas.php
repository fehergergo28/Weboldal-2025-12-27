<?php
include 'config.php';

if (!isLoggedIn()) {
    echo "Kérlek előbb jelentkezz be!";
    exit;
}


include 'cleanup.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Hibás kérés!";
    exit;
}


$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';

if (empty($date) || empty($time)) {
    echo "Hiányos adatok!";
    exit;
}

$user_id = $_SESSION['user_id'];


$check_sql = "
    SELECT * FROM bookings 
    WHERE booking_date = ? 
    AND booking_time <= ? 
    AND ADDTIME(booking_time, '02:00:00') > ?
";

$stmt = $conn->prepare($check_sql);
$stmt->bind_param("sss", $date, $time, $time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "❌ Ez az időpont már foglalt!";
    exit;
}


$sql = "INSERT INTO bookings (user_id, booking_date, booking_time) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $date, $time);

if ($stmt->execute()) {
    echo "✅ Sikeres foglalás: " . $date . " " . $time;
} else {
    echo "❌ Hiba történt a foglalás során!";
}
?>