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
                        Salary has been payed to employee successfully .
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                    }
                ?>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Pay Left Salary</strong>
                        <button type="button" class="btn btn-success" style="float:right" onclick="location.href='createUser.php';"><i class="fa fa-plus"></i>&nbsp; Add User</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Desination</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Account No.</th>
                                    <th scope="col">Salary Left</th>
                                    <th scope="col">Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sno=1;
                                $get="select * from employees where advanceStatus='1' && salaryLeft!='0'";
                                $exe=mysqli_query($con,$get);
                                while($data=mysqli_fetch_array($exe)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $sno; ?></th>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['designation']; ?></td>
                                    <td><?php echo $data['mobile']; ?></td>
                                    <td><?php echo $data['accountNo']; ?></td>
                                    <td><?php echo $data['salaryLeft']; ?></td>
                                    <td><a href="payLeftSalary1.php?id=<?php echo $data['id'] ?>"><button  class="btn btn-success">Pay</button></a></td>
                                </tr>
                                <?php $sno++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="POST">
                            <button type="submit" class="btn btn-success" name="reset">Reset all Employees' Salaries</button>
                        </form>
                        <?php 
                        if (isset($_POST['reset'])) {
                            $select = "select * from employees";
                                $res = mysqli_query($con, $select);
                                while ($data = mysqli_fetch_assoc($res)) {
                                    $salary=$data['salary'];
                                    $id=$data['id'];
                                    $query="update employees set salaryLeft='$salary', advanceStatus='0' where id = '$id'";
                                    mysqli_query($con,$query) or die(mysqli_error($con));
                                } 
                         } ?>
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
