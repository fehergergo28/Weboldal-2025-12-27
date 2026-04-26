<?php 

?>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <svg width="220" height="110" viewBox="0 0 220 110">
                    <defs>
                        <linearGradient id="szinatmenet-footer" x1="0%" x2="0%" y1="0%" y2="100%">
                            <stop stop-color="rgb(242, 179, 255)" offset="0%"/>
                            <stop stop-color="white" offset="60%"/>
                            <stop stop-color="rgb(152, 231, 255)" offset="100%"/>
                        </linearGradient>
                    </defs>
                    <ellipse cx="110" cy="55" rx="110" ry="44" fill="url(#szinatmenet-footer)"/>
                    <text fill="rgb(152, 231, 255)" 
                          x="110" y="65" 
                          font-size="28" 
                          font-family="Brush Script MT" 
                          text-anchor="middle" 
                          dominant-baseline="middle">
                        Beauty Nails
                    </text>
                </svg>
                <p style="font-size:13px; margin-top:10px; text-align:center;">
                    © <?= date("Y") ?> Beauty Nails. Minden jog fenntartva.
                </p>
            </div>

            <div class="footer-links">
                <h3>Menü</h3>
                <ul>
                    <li><a href="index.php">Kezdőlap</a></li>
                    <li><a href="galeria.php">Galéria</a></li>
                    <li><a href="arak.php">Árak</a></li>
                    <li><a href="kapcsolat.php">Kapcsolat</a></li>
                    <li><a href="idopont.php">Időpontfoglalás</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h3>Kapcsolat</h3>
                <p>📍 Budapest, Gyönyör utca 12, 1094</p>
                <p>📞 <a href="tel:707769515">06 70 776 9515</a></p>
                <p>✉️ <a href="mailto:whitegeri12@gmail.com">whitegeri12@gmail.com</a></p>
            </div>

            <div class="footer-social">
                <h3>Kövess minket</h3>
                <a href="https://www.instagram.com/beautynails_budapest/" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </footer>

    <script src="assets/js/app.js"></script>
</body>
</html>