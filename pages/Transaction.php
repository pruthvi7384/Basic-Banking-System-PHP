<?php
    include '../components/Navigation__Bar.php';
    // ===========Condition==============
        if(!isset($_SESSION['IS_LOGGIN'])){
            echo "<script>window.location='Login.php?type=n'</script>";
        }
    // ========X===Condition===x=========
?>

<!-- -----------Transaction Functionality------------ -->
    <?php include '../components/User_Name.php'; ?>
    <?php include '../components/SubNavigation.php'; ?>
<!-- --------X---Transaction Functionality---X--------- -->

<?php
    include '../components/Footer.php';
?>