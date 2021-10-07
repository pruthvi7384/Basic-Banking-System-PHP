<?php
    include 'Top.php';
    // Coding For Navigation Bar Background Color
        $nav_id = 'navbar';
        if(isset($_GET['type'])){
            $type = $_GET['type'];
            if($type == 'n'){
                $nav_id = 'navbar_home';
            }
        }
?>

<!-- ------------------Navigation Bar--------------------- -->
    <div class="container-fluid" id="<?php echo $nav_id; ?>">
        <nav class="d-flex">
            <div class="nav__brand">
                <a href="<?php echo SITE__PATH; ?>/index.php?type=home"><img src="<?php echo SITE__PATH; ?>/assets/logo.png" alt="logo"/>
                <span>Spark Foundation Bank </span></a>
            </div>
            <div class="toggle">
             <i class="fas fa-bars"></i>
            </div>
            <div class="nav__menu">
                <ul class="d-flex">
                    <?php 
                       if(!isset($_SESSION['IS_LOGGIN'])){
                    ?>
                        <li>
                            <a href="<?php echo SITE__PATH; ?>/index.php">Home</a>
                        </li>
                        <li>
                            <a href="https://pruthviraj-rajput-portfolio.rf.gd">About</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE__PATH; ?>/pages/Login.php?type=n">Login</a>
                        </li>
                    <?php }else {?>
                        <?php if($_SESSION['ROLE'] == 0){ ?>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/Dashboard.php?type=n">Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/New__Customer.php?type=n">Add Customer</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/New__Employe.php?type=n">Add Employe</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/Customers.php?type=n">All Customers</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/Employes_Detailes.php?type=n">All Employes</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/All__Transction__History.php?type=n">All Transaction</a>
                            </li> 
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/Transaction.php?type=n">Transaction</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/components/Logout.php">Logout</a>
                            </li>
                        <?php }else{ ?>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/New__Customer.php?type=n">Add Customer</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/Customers.php?type=n">All Customers</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/Transaction.php?type=n">Transaction</a>
                            </li>
                            <?php  
                                $euser = $_SESSION['USER_NAME'];
                                $employe_id = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM employe WHERE employe_id = '$euser'"));
                            ?>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/pages/New__Employe.php?type=n&id=<?php echo $employe_id['id']?>&option=view">Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE__PATH; ?>/components/Logout.php">Logout</a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>

    <script>
        const toggle = document.querySelector('nav .toggle');
        const nav_bar = document.querySelector('nav .nav__menu');
        toggle.addEventListener('click',()=>{
            nav_bar.classList.toggle('nav__menu__show');
        })
    </script>
<!-- --------------X----Navigation Bar---X------------------ -->