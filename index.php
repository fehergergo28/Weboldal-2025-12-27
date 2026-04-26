
<?php
include 'config.php';
$page_title = "Kezdőlap - Beauty Nails";
include 'includes/header.php';
?>
<main>
        
        <section class="hero-section">
            <h1 class="hero-title">Üdvözlünk a Beauty Nails-nél!</h1>
            <p class="hero-subtitle">Fedezd fel a tökéletes körömápolást Budapest szívében. Professzionális szolgáltatások, egyedi dizájnok és pihentető környezet vár rád.</p>
            <a href="/beautynails/idopont.php" class="cta-btn hero-cta">Foglalj időpontot most!</a>
        </section>

        
        <section class="about-section">
            <h2 class="section-title">Rólunk</h2>
            <p class="about-text">A Beauty Nails egy modern körömszalon Budapesten, ahol a legújabb trendek és minőségi anyagok találkoznak a szakértő kezekkel. Több éves tapasztalattal rendelkezünk a gél lakk, körömépítés és egyéb szépségápolási szolgáltatások terén. Célunk, hogy minden vendégünk elégedetten távozzon, szép, igényes körmökkel .</p>
            <p class="about-text">Látogass el hozzánk a Gyönyör utca 12-be, és tapasztald meg a különbséget!</p>
        </section>

        
        <section class="about-section">
            <h2 class="section-title">Szolgáltatásaink</h2>
            <div class="services-grid">
                <div class="service-card">
                    
                    <i class="fas fa-gem service-icon"></i>
                    <h3 class="service-title">Erősített Gél Lakk</h3>
                    <p class="service-desc">Tartós és fényes körmök különböző méretekben, már 6.000 Ft-tól.</p>
                    <a href="/beautynails/arak.php" class="cta-btn" style="display: inline-block; padding: 10px 20px; font-size: 1rem;">Tudj meg többet</a>
                </div>
                <div class="service-card">
                    
                    <i class="fas fa-paint-brush service-icon"></i>
                    <h3 class="service-title">Körömépítés & Töltés</h3>
                    <p class="service-desc">Professzionális építés és töltés, S-től XL-ig, kedvező árakon.</p>
                    <a href="/beautynails/arak.php" class="cta-btn" style="display: inline-block; padding: 10px 20px; font-size: 1rem;">Tudj meg többet</a>
                </div>
                <div class="service-card">
                    
                    <i class="fas fa-hand-sparkles service-icon"></i>
                    <h3 class="service-title">Egyéb Szolgáltatások</h3>
                    <p class="service-desc">Pótlás, korrigálás és eltávolítás szakértő kezekkel.</p>
                    <a href="/beautynails/arak.php" class="cta-btn" style="display: inline-block; padding: 10px 20px; font-size: 1rem;">Tudj meg többet</a>
                </div>
            </div>
        </section>

       
        <section class="promo-section">
            <h2 class="promo-title">Különleges Akció!</h2>
            <p class="promo-text">Regisztrálj most, és kapj 30% kedvezményt az első szolgáltatásodra! Ne maradj le erről a kivételes lehetőségről – foglalj időpontot regisztrált felhasználóként. Ha további akciókról és szolgáltatásokról szerenél tudni, iratkozz fel hírlevelünkre!</p>
            <a href="/beautynails/regi.php" class="cta-btn" style="background: white; color: rgb(242, 179, 255);">Regisztrálj most!</a>
        </section>

       
        <section class="gallery-teaser">
            <h2 class="section-title">Legújabb Munkáink</h2>
            <div class="gallery-grid-teaser">
                <div class="gallery-item-teaser">
                    <img src="img/köröm1.jpeg" alt="Köröm1">
                </div>
                <div class="gallery-item-teaser">
                    <img src="img/köröm2.jpeg" alt="Köröm2">
                </div>
                <div class="gallery-item-teaser">
                    <img src="img/körön3.jpeg" alt="Köröm3">
                </div>
                <div class="gallery-item-teaser">
                    <img src="img/köröm4.jpeg" alt="Köröm4">
                </div>
            </div>
           <div class="gallery-btn-wrapper">
        <a href="/beautynails/galeria.php" class="cta-btn gallery-cta-btn">Nézd meg a teljes galériát</a>
           </div>
        </section>
    </main>
<?php include 'includes/footer.php'; ?>

    <script src="app.js"></script>
</body>
</html>