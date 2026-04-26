<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapcsolat-Beauty Nails</title>
    <link rel="stylesheet" href="stayle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="footer.css">
<style>
        
        main {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .contact-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 40px;
            width: 100%;
        }

        .contact-info {
            flex: 1 1 300px;
            min-width: 300px;
            background: linear-gradient(135deg, #f2b3ff, #98e7ff);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;  
            box-sizing: border-box;
        }

        .contact-info h2 {
            color: #fff;
            margin-bottom: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 40px;
        }

        .contact-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-info li {
            margin: 20px 0;
            color: #fff;
            font-size: 18px;
        }

        .contact-info a {
            color: #fff;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        
        .social-links {
            margin-top: 30px;
        }

        .social-links a {
            display: inline-block;
            font-size: 40px;
            color: white;
            margin-right: 15px;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: scale(1.2);
        }

        .map-container {
            flex: 1 1 300px;
            width: 100%;
            box-sizing: border-box;
        }

        .map-container iframe {
            height: 350px;
        }

        .directions-btn {
            display: inline-block;
            margin-top: 30px;
            background: #98e7ff;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            transition: background 0.3s;
        }
        
        .directions-btn {
            display: block;
                text-align: center;
                width: 100%;
                box-sizing: border-box;
        }

        .directions-btn:hover {
            background: #7acfff;
        }

        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
                gap: 30px;
            }
        }

        @media (max-width: 480px) {
            .contact-info {
                padding: 20px;  
            }
        }
        .contact-info,
            .map-container {
                flex: 1 1 auto;  
                min-width: 0;    
            }
    </style>
</head>
<body>
    
<?php
include 'config.php';
$page_title = "Kapcsolat - Beauty Nails";
include 'includes/header.php';
?>
<main>
        <h1 style="text-align:center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 font-size:50px; color:#98e7ff;">Kapcsolat</h1>

        <div class="contact-container">
            <div class="contact-info">
                <h2>Keress minket!</h2>
                <ul>
                    <li>📍 <strong>Cím:</strong> Budapest, Gyönyör utca 12, 1094 Magyarország</li>
                    <li>📞 <strong>Telefon:</strong> <a href="tel:06707769515">06 70 776 9515</a></li>
                    <li>✉️ <strong>Email:</strong> <a href="mailto:beautynails@gmail.com">beautynails@gmail.com</a></li>
                    <li>🕒 <strong>Nyitvatartás:</strong> H-P: 9:00-19:00, Szo-V: Zárva </li>
                </ul>

                
                <div class="social-links">
                    <p style="color:white; margin-bottom:10px; font-size:18px;">Kövess minket Instagramon!</p>
                    <a href="https://www.instagram.com/beautynails_budapest/" target="_blank" aria-label="Instagram oldalunk">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

                
                <a href="https://www.google.com/maps/dir/?api=1&destination=Budapest+P%C3%A9lda+utca+12+1054+Magyarorsz%C3%A1g&travelmode=driving" 
                   target="_blank" 
                   class="directions-btn">
                   🗺️ Útvonaltervezés ide: Beauty Nails
                </a>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.6914567890123!2d19.050000000000004!3d47.4979123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc0000000000%3A0x1234567890abcdef!2sBeauty%20Nails!5e0!3m2!1shu!2shu!4v1700000000000" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>


<script src="app.js"></script>
</body>
</html>