<?php ob_start();
session_start();
include '../config.php'; ?>
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
    <div class="content mt-3" style="margin-left: 350px; padding-top: 50px;">
        <div class="row">
        <div class="col-sm-6">
            <?php if (isset($_GET['s']) && $_GET['s']==100) { ?>
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Warning</span>
                        Passwords does not matches.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
                }
            ?>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-6">
            <form action="" method="post" class="">
                <div class="card">
                    <div class="card-header">
                        <strong>Reset</strong> Passsword
                    </div>
                    <div class="card-body card-block">
                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">New Password</label><input type="password" placeholder="New Password" class="form-control" name="password" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Confirm Password</label><input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" required></div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="reset">Reset</button>
                </div>
            </form>
                    <?php
                    $encrypt=$_GET['encrypt'];
                    if (isset($_POST['reset'])) {
                      $password= mysql_real_escape_string(base64_encode($_POST['password']));
                      $cpassword= mysql_real_escape_string(base64_encode($_POST['cpassword']));
                      if ($password!=$cpassword) {
                            header("location:resetPassword.php?encrypt=$encrypt&s=100");
                      } else {
                        $query = "SELECT id FROM admin where (id)='$encrypt'";
                        $result = mysqli_query($con,$query);
                        $Results = mysqli_fetch_array($result);
                        if (count($Results)>=1) {
                          $query = "update admin set password='".$password."' where id='".$Results['id']."'";
                            mysqli_query($con,$query);
                            header("location:login.php?s=102");
                        }
                        
                      }
                      
                    }
                    ?>
                </div>
            </div>
        </div>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
</body>
</html>
