<?php

include 'config.php';

if (!isAdmin()) {
    echo "Nincs jogosultságod!";
    exit;
}

$id = (int)$_POST['id'];

$sql = "DELETE FROM bookings WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    echo "✅ Foglalás sikeresen lemondva admin által!";
} else {
    echo "❌ Nem található a foglalás!";
}
?>