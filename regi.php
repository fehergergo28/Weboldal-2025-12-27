<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, email, phone, password) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $phone, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Sikeres regisztráció!'); window.location='bejelent.php';</script>";
    } else {
        echo "Hiba: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció-Beauty Nails</title>
    <link rel="stylesheet" href="stayle.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <?php
include 'config.php';
$page_title = "Regisztráció - Beauty Nails";
include 'includes/header.php';
?>
<main>
        <div class="register-container">
            <h1 class="register-title">Regisztráció</h1>
            <p class="register-subtitle">Hozz létre fiókot, és foglalj időpontot könnyedén!</p>

            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="fullname">Teljes név</label>
                    <input type="text" id="fullname" name="fullname" required placeholder="Pl. Fehér Gergő">
                </div>

                <div class="form-group">
                    <label for="email">E-mail cím</label>
                    <input type="email" id="email" name="email" required placeholder="gergo@gmail.com">
                </div>

                <div class="form-group">
                    <label for="phone">Telefonszám</label>
                    <input type="tel" id="phone" name="phone" required placeholder="+36 30 123 4567">
                </div>

                <div class="form-group">
                    <label for="password">Jelszó</label>
                    <input type="password" id="password" name="password" required placeholder="Minimum 8 karakter">
                </div>

                <div class="form-group">
                    <label for="password2">Jelszó újra</label>
                    <input type="password" id="password2" name="password2" required placeholder="Írd be újra a jelszót">
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Elfogadom az <a href="#" style="color:rgb(242, 179, 255);">Adatkezelési tájékoztatót</a> és a <a href="#" style="color:rgb(242, 179, 255);">Felhasználási feltételeket</a></label>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">Szeretnék hírlevelet kapni akciókról, új szolgáltatásokról és szépségtippekről </label>
                </div>

                <button type="submit" class="submit-btn">Regisztráció</button>

                <p class="login-link">
                    Már van fiókod? <a href="bejelent.html">Jelentkezz be itt</a>
                </p>
            </form>
        </div>
    </main>
<?php include 'includes/footer.php'; ?>

<script src="app.js"></script>
</body>
</html>