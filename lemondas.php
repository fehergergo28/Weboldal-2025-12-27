<?php
// lemondas.php
include 'config.php';

if (!isLoggedIn()) {
    echo "Nincs jogosultságod!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM bookings WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $user_id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "✅ Időpont sikeresen lemondva!";
    } else {
        echo "❌ Nem sikerült lemondani az időpontot!";
    }
}
?>