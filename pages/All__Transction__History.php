<?php
    include '../components/Navigation__Bar.php';

    // ===========Condition==============
        if(!isset($_SESSION['IS_LOGGIN'])){
            echo "<script>window.location='Login.php?type=n'</script>";
        }
        if($_SESSION['ROLE'] != 0){
            header('Location:Customers.php?type=n');
            echo "<script>window.location='Customers.php?type=n'</script>";
        }
    // ========X===Condition===x=========

    $id= '';
    // ==============Get Data============
        if(isset($_GET['id'])){
            $id = mysqli_escape_string($con,$_GET['id']);
        }
    // ============X==Get Data===X=========

    // =============Get Record==============
        if($id == ''){
            $sql_command = "SELECT * FROM transaction ORDER BY id DESC";
        }else{
            $sql_command = "SELECT * FROM transaction WHERE customer_ac = '$id' ORDER BY id DESC";
        }
        $sql = mysqli_query($con,$sql_command);
    // =============Get Record==============
?>
    <!-- Display Customer Table -->
        <?php include '../components/User_Name.php' ?>
        <div class="container" id="display_record">
            <div class="row text-center">
                <?php 
                    if($id == ''){
                       echo "
                                <h2>All Transactions History</h2>
                                <p>All Transactions Details Here</p>
                            ";
                    }else{
                        echo "
                                <h2>All Transactions History</h2>
                                <p><span class='text-primary'> $id </span> Transactions Details Here</p>
                            ";
                    }
                ?>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th width="15%" scope="col">Account Number</th>
                            <th width="15%" scope="col">Transaction Type</th>
                            <th width="20%" scope="col">Transfer Account Number</th>
                            <th width="10%" scope="col">Amount</th>
                            <th width="20%" scope="col">Transaction Date</th>
                            <th width="10%" scope="col">Transaction By</th>
                            <th width="10%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($sql)){
                                $transacton_by = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id = ".$row['transfer_by']));
                        ?>
                            <tr>
                                <th scope="row" class="text-primary"><?php echo $row['customer_ac']; ?></th>
                                <th scope="row" class="text-info"><?php echo  $row['transaction_type']; ?></th>
                                <th scope="row" class="text-success"><?php echo  $row['transfer_customer_ac']; ?></th>
                                <td><?php echo $row['amount']?> &#8377;</td>
                                <td><?php 
                                        $dateStr=strtotime($row['transaction_on']);
                                        echo date('d-m-Y',$dateStr);
                                    ?>
                                </td>
                                <td><?php echo $transacton_by['usename']; ?></td>
                                <td class="d-flex justify-content-around">
                                    <a href="New__Customer.php?type=n&id=<?php echo $row['customer_ac']?>&option=view"><i class="far fa-eye text-primary"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <!--X- Display Customer Table -X-->
<?php
    include '../components/Footer.php';
?>