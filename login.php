<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Kérlek töltsd ki mindkét mezőt!'); window.history.back();</script>";
        exit;
    }

    $sql = "SELECT id, fullname, email, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

   
    if ($user) {
        echo "<script>alert('✅ Felhasználó megtalálva: " . htmlspecialchars($user['fullname']) . "');</script>";

       
        if ($password === 'admin123') {
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['fullname']  = $user['fullname'];
            $_SESSION['role']      = $user['role'];

            echo "<script>
                alert('✅ SIKERES BEJELENTKEZÉS! (teszt mód)');
                window.location.href = 'idopont.php';
            </script>";
        } else {
            echo "<script>alert('❌ A megadott jelszó NEM admin123 volt!');</script>";
        }
    } else {
        echo "<script>alert('❌ Nincs ilyen email a rendszerben!');</script>";
    }
   

} else {
    header("Location: bejelent.php");
    exit;
}
?>