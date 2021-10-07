<?php
    include '../components/Navigation__Bar.php';
    // ===========Condition==============
        if(!isset($_SESSION['IS_LOGGIN'])){
            echo "<script>window.location='Login.php?type=n'</script>";
        }
    // ========X===Condition===x=========

    //=========== Variable Declreation ==========
        $name = "";
        $gender = "";
        $birthday = "";
        $email = "";
        $phone_no = "";
        $state = "";
        $district = "";
        $city = "";
        $pin_code = "";
        $account_no = "";
        $acount_balance = 200;
        $aadhar_number = "";

        $checked_ac = "";
        $ac_number = "";

        $msg = "";
        $msg_get ="";

        $id = "";
        $option = "";

        $disabled = "";
    //======X=== Variable Declreation ===X========

    //============For Other Functionality=========
        if(isset($_GET['id']) && $_GET['id'] != "" && isset($_GET['option']) && $_GET['option']!=""){
            $id = mysqli_escape_string($con,$_GET['id']);
            $option = mysqli_escape_string($con,$_GET['option']);
        }
        //==========View Profile Functionality===============
            if($option == 'view'){
                $disabled = "disabled";
            }else{
                $disabled = "";
            }
            if($option == 'view' || $option == 'edit'){
                $res = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM customer WHERE account_no = '$id'"));
                $name = $res["name"];
                $gender = $res["gender"];
                $birthday = $res["birthday"];
                $email = $res["email"];
                $phone_no = $res["phone_no"];
                $state =  $res["state"];
                $district = $res["district"];
                $city = $res["city"];
                $pin_code = $res["pin_code"];
                $ac_number = $res["account_no"];
                $acount_balance = $res["acount_balance"];
                $aadhar_number = $res["aadhar_number"];
            }else{
                // ==========Genrate Account Number===========
                    $sql_ac = mysqli_query($con,"SELECT account_no FROM customer ORDER BY id DESC LIMIT 1");
                    $checked_ac = mysqli_fetch_assoc($sql_ac);

                    if(mysqli_num_rows($sql_ac)>0){
                        $prives_ac = $checked_ac['account_no'];
                        $get_ac = str_replace("AC", "", $prives_ac);
                        $ac_incrase = $get_ac+1;
                        $get_ac_string = str_pad($ac_incrase, 12,0, STR_PAD_LEFT);

                        $ac_number = "AC".$get_ac_string;
                    }else{
                        $ac_number = "AC677209939100";
                    }
                // ======X===Genrate Account Number===X=======
            }
        //========X==View Profile Functionality==X=============
    //=========X===For Other Functionality===X======

    // ============Get Massege Here===========
        if(isset($_GET["msg"]) && $_GET["msg"] != ""){
            $msg_get = mysqli_escape_string($con,$_GET["msg"]);
            if($msg_get == "msg"){
                $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <h4 class='alert-heading'>Well done!</h4>
                    <strong>Customer Detailes Added Successfully</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
    // =========X===Get Massege Here===X=======

    // ========= Send Records Functionality ========
        if(isset($_POST['add_customer'])){
            $name = mysqli_escape_string($con,$_POST['name']);
            $gender = mysqli_escape_string($con,$_POST['gender']);
            $birthday = mysqli_escape_string($con,$_POST['birthday']);
            $email = mysqli_escape_string($con,$_POST['email']);
            $phone_no = mysqli_escape_string($con,$_POST['phone_no']);
            $state = mysqli_escape_string($con,$_POST['state']);
            $district = mysqli_escape_string($con,$_POST['district']);
            $city = mysqli_escape_string($con,$_POST['city']);
            $pin_code =mysqli_escape_string($con,$_POST['pin_code']);
            $account_no = $ac_number;
            $acount_balance = mysqli_escape_string($con,$_POST['account_balance']);
            $aadhar_number = mysqli_escape_string($con,$_POST['aadhar_number']);

            $sql_fetch = mysqli_query($con,"SELECT * FROM customer WHERE aadhar_number = '$aadhar_number'");
            if($option == ''){
                if(mysqli_num_rows($sql_fetch)>0){
                    $msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Ooop!</strong> Cusstomer Account Alrady Exist! Because Addhar Number is Alrady Linked.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }else{
                    mysqli_query($con,"INSERT  INTO customer (name,gender,birthday,email,phone_no,state,district,city,pin_code,account_no,aadhar_number,acount_balance) VALUES ('$name','$gender',' $birthday','$email','$phone_no','$state','$district','$city','$pin_code','$account_no','$aadhar_number','$acount_balance')");

                    echo "<script>window.location='New__Customer.php?type=n&msg=msg'</script>";
                }
            }else{
                mysqli_query($con,"UPDATE customer SET name='$name',gender='$gender',birthday='$birthday',email='$email',phone_no='$phone_no',state='$state',district='$district',city='$city',pin_code='$pin_code',account_no='$account_no',aadhar_number='$aadhar_number',acount_balance='$acount_balance' WHERE account_no = '$id'");
           
                echo "<script>window.location='Customers.php?type=n&msg=msg'</script>";
            }
        
        }
    // ======X=== Send Records Functionality ===X===
?>
    <!-- ------------Employe Form---------------- -->
        <?php include '../components/User_Name.php' ?>
        <?php echo $msg;?>
        <div class="container" id="add_page">
            <div class="row text-center">
                <?php 
                    if($option == 'view'){
                        echo "
                            <h2>View Customer Detailes</h2>
                            <p><span class='text-primary'>$name</span> Detailes Here...</p>
                        ";
                    }else if ($option == 'edit'){
                        echo "
                            <h2>Edit Customer Details</h2>
                            <p><span class='text-primary'>$name</span> Edit Detailes Here...</p>
                        ";
                    }else{
                        echo "
                            <h2>Add Customer</h2>
                            <p>Add Customer Details Here</p>
                        ";
                    }
                ?>
            </div>
            <form method="post" action="" class="row g-3 mt-2 mb-2">
                <div class="col-xl-4">
                    <label for="inputAddress" class="form-label">Account Number</label>
                    <input type="text" disabled value="<?php echo  $ac_number; ?>" class="form-control text-primary" id="inputAddress" name="employe_id" required>
                </div>
                <div class="col-md-4">
                    <label for="inputAddress" class="form-label">Aadhar Number</label>
                    <input <?php echo $disabled; ?> type="text" class="form-control" value="<?php echo $aadhar_number ?>" id="inputAddress" name="aadhar_number" required>
                </div>
                <div class="col-md-4">
                    <label for="inputAddress" class="form-label">Account Balance</label>
                    <input <?php echo $disabled; ?> type="text" value="<?php echo $acount_balance ?>" class="form-control" id="inputAddress" name="account_balance" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Account Holder Name</label>
                    <input <?php echo $disabled; ?> type="text" value="<?php echo $name ?>" name="name" class="form-control" id="inputEmail4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Email Id</label>
                    <input <?php echo $disabled; ?> type="email" value="<?php echo $email ?>" class="form-control" name="email" id="inputPassword4" required>
                </div>
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Gender</label>
                    <select <?php echo $disabled; ?> name="gender" id="inputState" class="form-select" required>
                            <?php 
                                if($option == 'view'){
                                    echo "<option value= '$gender' selected>$gender</option>";
                                }else if($option == 'edit'){
                                    echo "
                                    <option value= '$gender' selected>$gender</option>
                                    <option value='Male'>Male</option>
                                    <option value='Female'>Femail</option>";
                                }else{
                                    echo "
                                        <option value= '' selected>Select Gender</option>
                                        <option value='Male'>Male</option>
                                        <option value='Female'>Femail</option>
                                    ";
                                }   
                            ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Phone Number</label>
                    <input <?php echo $disabled; ?> type="text" value="<?php echo $phone_no ?>" class="form-control" name="phone_no" id="inputPassword4" required>
                </div>
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Birth Date</label>
                    <input <?php echo $disabled; ?>
                        <?php if($option == 'view' || $option == 'edit'){
                                echo 'type=text';
                            }else{
                                echo 'type=date';
                            } 
                        ?> value="<?php echo $birthday ?>"  class="form-control" name="birthday" id="inputPassword4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">State</label>
                    <input <?php echo $disabled; ?> type="text" value="<?php echo $state ?>" class="form-control" name="state" id="inputPassword4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">District</label>
                    <input <?php echo $disabled; ?> type="text" value="<?php echo $district ?>" class="form-control" name="district" id="inputPassword4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">City</label>
                    <input <?php echo $disabled; ?> type="text" value="<?php echo $city ?>" class="form-control" id="inputAddress" name="city" required>
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Pin Code</label>
                    <input <?php echo $disabled; ?> type="text" value="<?php echo $pin_code ?>" class="form-control" id="inputAddress" name="pin_code" required>
                </div>
                <?php if($option == 'view'){ ?>

                <?php }else{ ?>
                    <div class="col-12 text-center">
                        <button type="submit" name="add_customer" class="btn btn-primary">
                            <?php
                                if($option == 'edit'){
                                    echo 'Edit Customer Detailes';
                                }else{
                                    echo 'Add Customer';
                                }
                            ?>
                        </button>
                    </div>
                <?php } ?>
            </form>
        </div>
    <!-- ---------X---Employe Form---X------------- -->
<?php
    include '../components/Footer.php';
?>