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
                        You have entered incorrect password.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
                }
               elseif (isset($_GET['s']) && $_GET['s']==101) { ?>
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                      <span class="badge badge-pill badge-success">Success</span> The reset Password link has been mailed you.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php 
                    }
                elseif (isset($_GET['s']) && $_GET['s']==102) { ?>
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                      <span class="badge badge-pill badge-success">Success</span> Password  has been been changed successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php 
                    }
                elseif (isset($_GET['s']) && $_GET['s']==103) { ?>
                <div class="col-sm-12">
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" role="alert">
                      Please Login to continue.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php 
                    }
               elseif (isset($_GET['s']) && $_GET['s']==104) { ?>
                <div class="col-sm-12">
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Warning</span>
                        You have been Logged Out.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                        <strong>Log In</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">User Name</label><input type="text" placeholder="Username" class="form-control" name="uname" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-control-label">Password</label><input type="password" placeholder="Password" class="form-control" name="password" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><a href="forgetPassword.php"><label class="form-control-label" style="color: blue; text-decoration: underline;">Forget Password</label></a></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="login">Log Me In!</button>
                </div>
            </form>
            <?php 
                if (isset($_POST['login'])) {
                    $uname=mysql_real_escape_string($_POST['uname']);
                    $password=mysql_real_escape_string(base64_encode($_POST['password']));
                    $query="select * from admin where uname='$uname' and password='$password'";
                    $exe=mysqli_query($con,$query) or die(mysqli_error($con));
                    if (mysqli_num_rows($exe)==1) {
                    $data=mysqli_fetch_array($exe);
                    if ($data['uname']==$uname && $data['password']==$password) {
                        $_SESSION['admin']=$data['uname'];
                        header("location:index.php?s=100");
                    }
                    }else header("location:login.php?s=100");
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
