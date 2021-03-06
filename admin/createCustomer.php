<?php ob_start();
session_start(); ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pinnacle ERP</title>
    <meta name="description" content="Pinnacle ERP">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->
    <?php
        if(!isset($_SESSION['admin']))
            {
                header("location:login.php?s=103");
            } 
        include '../config.php';
        include 'includes/sidebar.php';
    ?>
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php 
            include 'includes/header.php';
        ?>
        <!-- Header-->

        <div class="content mt-3">

            <div class="col-sm-12">
                <?php if (isset($_GET['s']) && $_GET['s']==101) { ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                        A new Customer has been added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                    }
                    elseif (isset($_GET['s']) && $_GET['s']==102) { 
                ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Warning</span>
                        Enter a valid 10 digit mobile number.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-8">
                <form action="" method="post" class="">
                <div class="card">
                    <div class="card-header">
                        <strong>Create</strong> Customer
                    </div>
                    <div class="card-body card-block">
                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Company Name</label><input type="text" placeholder="Company Name" class="form-control" name="companyName" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Owner Name</label><input type="text" placeholder="Owner Name" class="form-control" name="ownerName" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Mobile No.</label><input type="text" placeholder="Mobile No." class="form-control" name="mobile" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-control-label">Email ID</label><input type="text" placeholder="Email ID" class="form-control" name="email" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-control-label">Address</label><textarea class="form-control" rows="3" cols="50" name="address"  placeholder="Address" required></textarea></div>
                        </div> 
    
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="add">Add Customer</button>
                    <a href="customers.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                </div>
                </form>
                <?php 
                    if (isset($_POST['add'])) {
                        $companyName=mysql_real_escape_string($_POST['companyName']);
                        $ownerName=mysql_real_escape_string($_POST['ownerName']);
                        $mobile=mysql_real_escape_string($_POST['mobile']);
                        $email=mysql_real_escape_string($_POST['email']);
                        $address=mysql_real_escape_string($_POST['address']);
                            if(preg_match("/^\d+\.?\d*$/",$mobile) && strlen($mobile)==10){
                                $query="insert into customers (companyName,ownerName,mobile,email,address) VALUES ('$companyName','$ownerName','$mobile','$email','$address')";
                                mysqli_query($con,$query) or die(mysqli_error($con));
                                header("location:createCustomer.php?s=101");    
                            }
                            else{
                                header("location:createCustomer.php?s=102");   
                            }
                    }
                ?>
            </div>
        </div> <!-- .content -->
    </div>
    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
</body>
</html>
