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
                        Employee details has been modified successfully.
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
                        <strong>Modify</strong> Employee
                    </div>
                    <div class="card-body card-block">
                        <?php 
                            $select = "select * from employees where id = '$_GET[id]'";
                            $res = mysqli_query($con, $select);
                            $data = mysqli_fetch_assoc($res);  
                        ?>
                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Employee Name</label><input type="text" value="<?php echo $data['name']; ?>" class="form-control" name="name" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Designation</label><input type="text" value="<?php echo $data['designation']; ?>" class="form-control" name="designation" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Mobile No.</label><input type="text" value="<?php echo $data['mobile']; ?>" class="form-control" name="mobile" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-control-label">Account number</label><input type="text" value="<?php echo $data['accountNo']; ?>" class="form-control" name="accountNo" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-control-label">Salary</label><input type="number" value="<?php echo $data['salary']; ?>" class="form-control" name="salary" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-control-label">Contact Person</label><input type="text" value="<?php echo $data['contactPerson']; ?>" class="form-control" name="contactPerson" required></div>
                        </div>
    
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="save">Save</button>
                    <a href="employees.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                </div>
                </form>
                <?php 
                    if (isset($_POST['save'])) {
                        $name=mysql_real_escape_string($_POST['name']);
                        $designation=mysql_real_escape_string($_POST['designation']);
                        $mobile=mysql_real_escape_string($_POST['mobile']);
                        $accountNo=mysql_real_escape_string($_POST['accountNo']);
                        $salary=mysql_real_escape_string($_POST['salary']);
                        $contactPerson=mysql_real_escape_string($_POST['contactPerson']);
                            if(preg_match("/^\d+\.?\d*$/",$mobile) && strlen($mobile)==10){
                                $query="update employees set name='$name', designation='$designation', contactPerson='$contactPerson', mobile='$mobile', accountNo='$accountNo', salary='$salary' where id = '$_GET[id]'";
                                mysqli_query($con,$query) or die(mysqli_error($con));
                                header("location:editEmployee.php?id=$_GET[id]&s=100");    
                            }
                            else{
                                header("location:editEmployee.php?id=$_GET[id]&s=102");   
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
