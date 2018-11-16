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
                <?php if (isset($_GET['s']) && $_GET['s']==100) { ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                        Customer details has been modified successfully.
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
                        <strong>Modify</strong> Customer
                    </div>
                    <div class="card-body card-block">
                        <?php 
                            $select = "select * from customers where id = '$_GET[id]'";
                            $res = mysqli_query($con, $select);
                            $data = mysqli_fetch_assoc($res);  
                        ?>
                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Company Name</label><input type="text" value="<?php echo $data['companyName']; ?>" class="form-control" name="companyName" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Owner Name</label><input type="text" value="<?php echo $data['ownerName']; ?>" class="form-control" name="ownerName" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Mobile No.</label><input type="text" value="<?php echo $data['mobile']; ?>" class="form-control" name="mobile" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Email ID</label><input type="text" value="<?php echo $data['email']; ?>" class="form-control" name="email" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-control-label">Address</label><textarea class="form-control" rows="3" cols="50" name="address" required><?php echo $data['address']; ?></textarea></div>
                        </div> 
    
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="save">Save</button>
                    <a href="customers.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                </div>
                </form>
                <?php 
                    if (isset($_POST['save'])) {
                        $companyName=mysql_real_escape_string($_POST['companyName']);
                        $ownerName=mysql_real_escape_string($_POST['ownerName']);
                        $mobile=mysql_real_escape_string($_POST['mobile']);
                        $email=mysql_real_escape_string($_POST['email']);
                        $address=mysql_real_escape_string($_POST['address']);
                            if(preg_match("/^\d+\.?\d*$/",$mobile) && strlen($mobile)==10){
                                $query="update customers set companyName='$companyName', ownerName='$ownerName', mobile='$mobile', email='$email', address='$address' where id = '$_GET[id]'";
                                mysqli_query($con,$query) or die(mysqli_error($con));
                                header("location:editCustomer.php?id=$_GET[id]&s=100");    
                            }
                            else{
                                header("location:editCustomer.php?id=$_GET[id]&s=102");   
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
