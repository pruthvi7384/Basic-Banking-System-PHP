<?php
    session_start();
    unset($_SESSION['IS_LOGGIN']);
    echo "<script>window.location='../index.php?type=home'</script>";
    die();
?>