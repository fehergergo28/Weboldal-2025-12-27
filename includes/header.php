<?php
// includes/header.php

// Abszolút útvonal a config.php-hoz (ez a legbiztonságosabb)
include_once $_SERVER['DOCUMENT_ROOT'] . '/beautynails/config.php';

$page_title = $page_title ?? 'Beauty Nails';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    
    <!-- CSS fájlok abszolút útvonallal -->
    <link rel="stylesheet" href="/beautynails/assets/css/style.css">
    <link rel="stylesheet" href="/beautynails/assets/css/footer.css">
    <link rel="stylesheet" href="/beautynails/assets/css/kezdőlap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <div id="logo">
            <svg width="400" height="200">
                <defs>
                    <linearGradient id="szinatmenet" x1="0%" x2="0%" y1="0%" y2="100%">
                        <stop stop-color="rgb(242, 179, 255)" offset="0%"/>
                        <stop stop-color="white" offset="60%"/>
                        <stop stop-color="rgb(152, 231, 255)" offset="100%"/>
                    </linearGradient>
                </defs>
                <ellipse cx="200" cy="100" rx="200" ry="80" fill="url(#szinatmenet)"/>
                <text fill="rgb(152, 231, 255)" x="90" y="110" font-size="50" font-family="Brush Script MT">Beauty Nails</text>
            </svg>
        </div>
    </header>

    <nav>
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        
        <ul id="menu">
    <li><a href="/beautynails/index.php">Kezdőlap</a></li>
    <li><a href="/beautynails/galeria.php">Galéria</a></li>
    <li><a href="/beautynails/arak.php">Árak</a></li>
    <li><a href="/beautynails/kapcsolat.php">Kapcsolat</a></li>
    <li><a href="/beautynails/idopont.php">Időpontfoglalás</a></li>
    <li><a href="/beautynails/sajátfoglalásaim.php">Saját Foglalásaim</a></li>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="/beautynails/logout.php">Kilépés</a></li>
    <?php else: ?>
        <li><a href="/beautynails/bejelent.php">Bejelentkezés</a></li>
        <li><a href="/beautynails/regi.php">Regisztráció</a></li>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <li><a href="/beautynails/admin/foglalasok.php" style="color: #ffd700;">👑 Admin</a></li>
    <?php endif; ?>
</ul>
    </nav>