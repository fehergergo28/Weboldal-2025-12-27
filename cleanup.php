<?php
// cleanup.php - Lejárt foglalások automatikus törlése
include 'config.php';

$currentDate = date('Y-m-d');
$currentTime = date('H:i');

// 15 perces türelmi idő
$deadline = date('H:i', strtotime('-15 minutes'));

$sql = "
    DELETE FROM bookings 
    WHERE booking_date < ? 
       OR (booking_date = ? AND booking_time < ?)
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $currentDate, $currentDate, $deadline);
$stmt->execute();

echo "✅  Törölt foglalások: " . $stmt->affected_rows;
?>