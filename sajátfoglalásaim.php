<?php
// sajátfoglalásaim.php
include 'config.php';

if (!isLoggedIn()) {
    header("Location: bejelent.php");
    exit;
}

$page_title = "Saját Foglalásaim - Beauty Nails";
include 'includes/header.php';
?>

<main>
    <div class="booking-container">
        <h1 class="booking-title">Saját Foglalásaim</h1>
        <p class="booking-subtitle">Itt láthatod az eddig lefoglalt időpontjaidat</p>

        <?php
        $user_id = $_SESSION['user_id'];
        $result = $conn->query("
            SELECT id, booking_date, booking_time 
            FROM bookings 
            WHERE user_id = $user_id 
            ORDER BY booking_date DESC, booking_time DESC
        ");
        ?>

        <?php if ($result && $result->num_rows > 0): ?>
            <table class="my-bookings-table">
                <thead>
                    <tr>
                        <th>Dátum</th>
                        <th>Időpont</th>
                        <th>Státusz</th>
                        <th>Művelet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['booking_date']) ?></td>
                        <td><?= htmlspecialchars($row['booking_time']) ?></td>
                        <td><span class="status active">Aktív</span></td>
                        <td>
                            <button onclick="lemondas(<?= $row['id'] ?>)" class="cancel-btn">
                                Lemondás
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-bookings">Még nincs foglalásod.</p>
        <?php endif; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

<script>
function lemondas(id) {
    if (confirm("Biztosan le szeretnéd mondani ezt az időpontot?")) {
        fetch('/beautynails/lemondas.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'id=' + id
        })
        .then(r => r.text())
        .then(data => {
            alert(data);
            location.reload();
        });
    }
}
</script>