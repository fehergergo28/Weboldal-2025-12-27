<?php
// galéria.php
include 'config.php';
$page_title = "Galéria - Beauty Nails";
include 'includes/header.php';
?>

<main>
    <section class="gallery-section">
        <h1 class="section-title">Galéria</h1>
        <p class="gallery-subtitle">Fedezd fel legújabb körömdizájnjainkat! Minden kép egyedi munkánkat mutatja be.</p>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="img/köröm1.jpeg" alt="köröm1">
            </div>
            <div class="gallery-item">
                <img src="img/köröm2.jpeg" alt="köröm2">
            </div>
            <div class="gallery-item">
                <img src="img/körön3.jpeg" alt="köröm3">
            </div>
            <div class="gallery-item">
                <img src="img/köröm4.jpeg" alt="köröm4">
            </div>
            <div class="gallery-item">
                <img src="img/köröm5.jpeg" alt="köröm5">
            </div>
            <div class="gallery-item">
                <img src="img/köröm6.jpeg" alt="köröm6">
            </div>
            <div class="gallery-item">
                <img src="img/köröm7.jpeg" alt="köröm7">
            </div>
            <div class="gallery-item">
                <img src="img/köröm8.jpeg" alt="köröm8">
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>