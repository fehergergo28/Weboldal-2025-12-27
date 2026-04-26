<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        echo "<script>alert('Sikeres belépés!'); window.location='időpont.php';</script>";

    } else {
        echo "<script>alert('Hibás adatok!'); window.history.back();</script>";
    }
}
?>




    <?php
include 'config.php';
$page_title = "Bejelentkezés - Beauty Nails";
include 'includes/header.php';
?>

<main>
        <div class="login-container">
            <h2 class="login-title">Bejelentkezés</h2>
            <p class="login-subtitle">Lépj be fiókodba, hogy időpontot foglalhass!</p>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">E-mail cím</label>
                    <input type="email" id="email" name="email" >
                </div>

                <div class="form-group">
                    <label for="password">Jelszó</label>
                    <input type="password" id="password" name="password" >
                </div>

                <button type="submit" class="submit-btn">Bejelentkezés</button>
            </form>

            <div class="login-link">
                <p>Még nincs fiókod? <a href="regi.html">Regisztrálj itt</a></p>
                <p><a href="#">Elfelejtetted a jelszavad?</a></p>
            </div>
        </div>
    </main>
<?php include 'includes/footer.php'; ?>

<script src="app.js"></script>
</body>
</html>