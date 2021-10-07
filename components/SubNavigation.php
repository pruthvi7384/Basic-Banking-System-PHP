<?php
    $active_d = '';
    $active_w = '';
    $active_t = '';
    if(isset($_GET['tab']) && $_GET['tab'] !=''){
        $tab = mysqli_escape_string($con,$_GET['tab']);
        if($tab == 'd'){
            $active_d = 'active';
        }else if($tab == 'w'){
            $active_w = 'active';
        }else if($tab == 't'){
            $active_t = 'active';
        }
    }

?>
<!-- -----------Transaction Functionality------------ -->
    <div class="container" id="transaction">
        <div class="row text-center">
                <h2>Transaction</h2>
                <p>Select Tab And Proside To Transaction</p>
            </div>
        <div class="row">
            <div class="col-xl-12 mt-2">
                <ul class="nav nav-tabs d-flex  justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-info text-uppercase <?php echo $active_d; ?>" aria-current="page" href="<?php echo SITE__PATH; ?>/sub_pages/Deposite.php?type=n&tab=d">Deposite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info text-uppercase <?php echo $active_w; ?>" href="<?php echo SITE__PATH; ?>/sub_pages/Withdrwal.php?type=n&tab=w">Withdrawal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info text-uppercase <?php echo $active_t; ?>" href="<?php echo SITE__PATH; ?>/sub_pages/Transfer.php?type=n&tab=t">Transfer</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!-- --------X---Transaction Functionality---X--------- -->
