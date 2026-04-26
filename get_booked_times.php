<?php
// get_booked_times.php
include 'config.php';

$date = $_GET['date'] ?? '';

if (empty($date)) {
    echo json_encode([]);
    exit;
}

$sql = "SELECT booking_time FROM bookings WHERE booking_date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();

$booked = [];

while ($row = $result->fetch_assoc()) {
    $startTime = $row['booking_time'];
    $time = strtotime($startTime);

    // 2 órás blokk generálása
    for ($i = 0; $i <= 4; $i++) {
        $booked[] = date('H:i', $time);
        $time += 1800; // +30 perc
    }
}

// Ha MAI dátum van, akkor a múltbeli időpontokat is foglaltnak tekintjük
if ($date === date('Y-m-d')) {
    $currentTime = date('H:i');
    foreach ($availableSlots as $slot) {  // ezt majd JS-ben is kezeljük, de itt is hozzáadjuk
        if ($slot < $currentTime) {
            $booked[] = $slot;
        }
    }
}

$booked = array_unique($booked);
sort($booked);

header('Content-Type: application/json');
echo json_encode($booked);
?>