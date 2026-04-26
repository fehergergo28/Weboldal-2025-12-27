<?php
// idopont.php
include 'config.php';
$page_title = "Időpontfoglalás - Beauty Nails";
include 'includes/header.php';
?>

<main id="booking">
    <div class="booking-container">
        <h1 class="booking-title">Időpontfoglalás</h1>
        <p class="booking-subtitle">Válassz egy szabad időpontot!</p>

        <div id="alertBox"></div>

        <div class="date-selector">
            <label for="dateInput"><strong>Válassz dátumot:</strong></label><br><br>
            <input type="date" id="dateInput" required>
        </div>

        <div class="time-slots" id="timeSlots"></div>

        <button class="confirm-btn" id="confirmBtn" disabled>Foglalás megerősítése</button>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

<script src="/beautynails/assets/js/app.js"></script>
<script src="/beautynails/assets/js/idofog.js"></script>