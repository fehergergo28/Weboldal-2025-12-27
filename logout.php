<?php
// logout.php
include 'config.php';

session_destroy();

echo "<script>
    alert('Sikeresen kiléptél!');
    window.location.href = '/beautynails/index.php';
</script>";
exit;
?>