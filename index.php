<?php
    include 'components/Navigation__Bar.php';
    // ===========Condition==============
        if(isset($_SESSION['IS_LOGGIN'])){
            if($_SESSION['ROLE'] == 0){
                echo "<script>window.location='pages/Dashboard.php?type=n'</script>";
            }else{
                echo "<script>window.location='pages/Customers.php?type=n'</script>";
            }
        }
    // ========X===Condition===x=========   
?>

    <!-- ---------------Home Page--------------- -->
       <div class="container-fluid d-flex justify-content-center align-items-center" id="home__page">
           <div class="row">
               <div class="col-12 text-center">
                    <h2>Welcome to the</h2>
                    <h1>Spark Foundation Bank</h1>
                    <a href="<?php echo SITE__PATH; ?>/pages/Login.php?type=n"><button class="btn">Login Now</button></a>
               </div>
           </div>
       </div>
    <!-- ------------X---Home Page---X------------ -->
<?php
    include 'components/Footer.php';
?>