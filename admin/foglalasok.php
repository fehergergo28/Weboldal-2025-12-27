<?php
// admin/foglalasok.php
include '../config.php';

if (!isAdmin()) {
    die("Nincs jogosultságod az oldal megtekintéséhez!");
}

$page_title = "Foglalások - Admin";
include '../includes/header.php';
?>

<main>
    <div class="admin-container">
        <h1 class="admin-title">Összes Foglalás</h1>
        <p class="admin-subtitle">Adminisztrátor nézet • <?= date('Y. m. d.') ?></p>

        <?php
        $result = $conn->query("
            SELECT b.id, b.booking_date, b.booking_time, u.fullname, u.email 
            FROM bookings b 
            JOIN users u ON b.user_id = u.id 
            ORDER BY b.booking_date DESC, b.booking_time DESC
        ");
        ?>

        <?php if ($result && $result->num_rows > 0): ?>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Dátum</th>
                        <th>Időpont</th>
                        <th>Név</th>
                        <th>Email</th>
                        <th>Művelet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['booking_date']) ?></td>
                        <td><?= htmlspecialchars($row['booking_time']) ?></td>
                        <td><?= htmlspecialchars($row['fullname']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <button onclick="adminLemondas(<?= $row['id'] ?>)" class="cancel-btn">
                                Lemondás
                            </button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">Még nincs egyetlen foglalás sem az adatbázisban.</p>
        <?php endif; ?>
    </div>
</main>

<?php include '../includes/footer.php'; ?>

<script>
function adminLemondas(id) {
    if (confirm("Biztosan le szeretnéd mondani ezt a foglalást?")) {
        fetch('/beautynails/admin_lemondas.php', {
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