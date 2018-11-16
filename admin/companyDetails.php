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
                        Company Details have been saved successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                    }
                    elseif (isset($_GET['s']) && $_GET['s']==103) { 
                ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Warning</span>
                        Enter a valid 10 digit mobile number.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } 
                    elseif (isset($_GET['s']) && $_GET['s']==102) { 
                ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Warning</span>
                        Enter a valid 10 digit phone number.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-12">
                <form action="" method="post" class="">
                <div class="card">
                        <div class="card-header">
                            <strong>Company</strong> Details
                        </div>
                        <div class="card-body card-block">
                        <?php 
                            $select = "select * from companyDetails where id = '1'";
                            $res = mysqli_query($con, $select);
                            $data = mysqli_fetch_assoc($res);  
                        ?>
                        <div class="col-lg-3">
                            <div class="form-group"><label  class=" form-control-label">Company Name</label><input type="text" value="<?php echo $data['name']; ?>" class="form-control" name="companyName" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label  class=" form-control-label">Owner Name</label><input type="text" value="<?php echo $data['ownerName']; ?>" class="form-control" name="ownerName" required></div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Type of Company</label><input type="text" value="<?php echo $data['type']; ?>" class="form-control" name="type" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Mobile Number</label><input type="text" value="<?php echo $data['mobileNo']; ?>" class="form-control" name="mobile" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Account number</label><input type="text" value="<?php echo $data['accountNo']; ?>" class="form-control" name="accountNo" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">PAN number</label><input type="text" value="<?php echo $data['PANNo']; ?>" class="form-control" name="PANNo" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">GST number</label><input type="text" value="<?php echo $data['GSTNo']; ?>" class="form-control" name="GSTNo" required></div>
                        </div>

                        <div class="col-lg-3">
                           <div class="form-group"> 
                                    <label class=" form-control-label">Starting Year</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" value="<?php echo $data['startingYear']; ?>"  name="startingYear" required>
                                    </div>
                                    <small class="form-text text-muted">eg. yyyy/mm/dd</small>
                                </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Email ID</label><input type="email" value="<?php echo $data['email']; ?>" class="form-control" name="email" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Mailing Name</label><input type="text" value="<?php echo $data['mailingPerson']; ?>" class="form-control" name="mailingPerson" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-control-label">Address</label><textarea class="form-control" rows="2" cols="50" name="address" required><?php echo $data['address']; ?></textarea></div>
                        </div>                        

                      </div>

                      <div class="card-footer">
                           <button type="submit" class="btn btn-success" name="save">Save</button>
                            <a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                      </div>
                </form>
                <?php 
                    if (isset($_POST['save'])) {
                        $companyName=mysql_real_escape_string($_POST['companyName']);
                        $ownerName=mysql_real_escape_string($_POST['ownerName']);
                        $type=mysql_real_escape_string($_POST['type']);
                        $mobile=mysql_real_escape_string($_POST['mobile']);
                        $accountNo=mysql_real_escape_string($_POST['accountNo']);
                        $PANNo=mysql_real_escape_string($_POST['PANNo']);
                        $GSTNo=mysql_real_escape_string($_POST['GSTNo']);
                        $startingYear=mysql_real_escape_string($_POST['startingYear']);
                        $mailingPerson=mysql_real_escape_string($_POST['mailingPerson']);
                        $email=mysql_real_escape_string($_POST['email']);
                        $address=mysql_real_escape_string($_POST['address']);

                            if(preg_match("/^\d+\.?\d*$/",$mobile) && strlen($mobile)==10){
                                $query="update companyDetails set name='$companyName', ownerName='$ownerName', type='$type', mobileNo='$mobile', accountNo='$accountNo', PANNo='$PANNo', GSTNo='$GSTNo', startingYear='$startingYear', mailingPerson='$mailingPerson', email='$email', address='$address' where id = '1'";
                                mysqli_query($con,$query) or die(mysqli_error($con));
                                header("location:companyDetails.php?s=101");
                            }
                            else{
                                header("location:companyDetails.php?s=103");   
                            }
                    }
                ?>
            </div>
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
