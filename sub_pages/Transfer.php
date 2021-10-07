<?php
    include '../components/Navigation__Bar.php';
    // ===========Condition==============
        if(!isset($_SESSION['IS_LOGGIN'])){
            echo "<script>window.location='../pages/Login.php?type=n'</script>";
        }
    // ========X===Condition===x=========

    // ==================Globle Variable================
        $customer_ac = '';
        $transaction_type = '';
        $transfer_ac = '';
        $amount = '';
        $transfer_by =  $_SESSION['USER_ID'];

        $msg = '';
    // ===============X===Globle Variable===X============

    // ============Get Massege Here===========
        if(isset($_GET["msg"])){
            $msg_get = mysqli_escape_string($con,$_GET["msg"]);
            if($msg_get == "msg"){
                $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <h4 class='alert-heading'>Well done!</h4>
                    <strong>Transfer Amount Is Sussesfuly Done!</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
    // =========X===Get Massege Here===X=======
        
    // =================Transaction=============
            if(isset($_POST['transfer'])){
                $customer_ac = mysqli_escape_string($con,$_POST['account_no']);
                $transaction_type = 'Transfer';
                $transfer_ac = mysqli_escape_string($con,$_POST['transfer_no']);
                $amount = mysqli_escape_string($con,$_POST['amount']);
                
                $sql_sender = "SELECT * FROM customer WHERE account_no='$customer_ac' LIMIT 1";
                $sql_sender_q = mysqli_query($con,$sql_sender);
                $sql_sender_fe = mysqli_fetch_assoc($sql_sender_q);

                $sql_resiver = "SELECT * FROM customer WHERE account_no='$transfer_ac' LIMIT 1";
                $sql_resiver_q = mysqli_query($con,$sql_resiver);
                $sql_resiver_fe = mysqli_fetch_assoc($sql_resiver_q);

                if(mysqli_num_rows( $sql_sender_q) > 0){
                    if(mysqli_num_rows($sql_resiver_q) > 0){
                        // Sender Account Balance
                        $sender_priv_balance =  $sql_sender_fe['acount_balance'];
                        // Resiver Account Balance
                        $resiver_priv_balance =  $sql_resiver_fe['acount_balance'];

                        if($sender_priv_balance > $amount){
                            $sender_final_balance = $sender_priv_balance - $amount;
                            // Update Database Sender Transfer Successfuly!
                            mysqli_query($con,"UPDATE customer SET acount_balance = '$sender_final_balance' WHERE account_no = '$customer_ac'");
    
                            mysqli_query($con,"INSERT INTO transaction (customer_ac,transaction_type,transfer_customer_ac,amount,transfer_by) VALUES ('$customer_ac','$transaction_type','$transfer_ac','$amount','$transfer_by')");

                            $resiver_final_balance = $resiver_priv_balance + $amount;
                             // Update Database Resiver Transfer Successfuly!
                             mysqli_query($con,"UPDATE customer SET acount_balance = '$resiver_final_balance' WHERE account_no = '$transfer_ac'");

                             echo "<script>window.location='Transfer.php?type=n&msg=msg'</script>";

                        }else{
                            $msg = "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                                <strong>Ooop!</strong> Account Balance Is Not Suffitiont ( Sender Account ) For Transfer. Please Enter Less Amount !
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                    }else{
                        $msg = "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                            <strong>Ooop!</strong> Account Number ( Resiver Costomer ) is Wrong! Please Recheck Account Number.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                }else{
                    $msg = "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                            <strong>Ooop!</strong> Account Number ( Sender Costomer ) is Wrong! Please Recheck Account Number.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
                
            }
    // ==============X===Transaction===X==========
?>
    <!----------------------- Deposite Transction Form ------------- -->
        <?php include '../components/User_Name.php'; ?>
        <?php echo $msg;?>
        <?php include '../components/SubNavigation.php'; ?>
        <div class="container">
            <form method="post" action="" class="row g-3 mt-2">
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Account Number</label>
                    <input type="text" name='account_no' class="form-control" id="inputEmail4" required>
                </div>
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Transfer To</label>
                    <input type="text" name='transfer_no' class="form-control" id="inputEmail4" required>
                </div>
                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">Ammount</label>
                    <input type="text" name="amount" class="form-control" id="inputAddress2" required>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" name="transfer" class="btn btn-primary">Transfered Now</button>
                </div>
            </form>
        </div>
    <!--------------------X--- Deposite Transction Form ---X---------- -->
<?php
    include '../components/Footer.php';
?>