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

            <div class="col-lg-8">
                <form action="" method="post" class="">
                <div class="card">
                    <div class="card-header">
                        <strong>Pay Advance</strong> Salary
                    </div>
                    <div class="card-body card-block">
                        <?php 
                            $select = "select * from employees where id = '$_GET[id]'";
                            $res = mysqli_query($con, $select);
                            $data = mysqli_fetch_assoc($res);
                            $totalSalary=$data['salary'];
                        ?>
                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Employee Name</label><input type="text" value="<?php echo $data['name']; ?>" class="form-control" name="name" required readonly></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Designation</label><input type="text" value="<?php echo $data['designation']; ?>" class="form-control" name="designation" required readonly></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Mobile No.</label><input type="text" value="<?php echo $data['mobile']; ?>" class="form-control" name="mobile" required readonly></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-control-label">Account number</label><input type="text" value="<?php echo $data['accountNo']; ?>" class="form-control" name="accountNo" required readonly></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-control-label">Enter Amount</label><input type="number" placeholder="Enter amount to be paid" class="form-control" name="advanceSalary" required></div>
                        </div>
    
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="pay">Pay</button>
                    <a href="payAdvanceSalary.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                </div>
                </form>
                <?php 
                    if (isset($_POST['pay'])) {
                        $advanceSalary=mysql_real_escape_string($_POST['advanceSalary']);
                        $salaryLeft=$totalSalary-$advanceSalary;
                        $query="update employees set salaryLeft='$salaryLeft', advanceStatus='1' where id = '$_GET[id]'";
                                mysqli_query($con,$query) or die(mysqli_error($con));
                                header("location:payAdvanceSalary.php?id=$_GET[id]&s=100");    
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
