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
            <?php if (isset($_GET['s']) && $_GET['s']==101) { ?>
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Warning</span>
                        The Email Id that you have entered does not exist.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
                }
            elseif (isset($_GET['s']) && $_GET['s']==102) { ?>
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Warning</span>
                        Enter a valid email address.
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
                        <strong>Forget</strong> Passsword
                    </div>
                    <div class="card-body card-block">
                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Email Id</label><input type="text" placeholder="Email Id" class="form-control" name="email" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><a href="login.php"><label class="form-control-label" style="color: blue; text-decoration: underline;">Log In!</label></a></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="send">Send</button>
                </div>
            </form>
            <?php 
                if (isset($_POST['send'])) {
                    $email=mysql_real_escape_string($_POST['email']);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
                    {
                        header("location:forgetPassword.php?s=102");
                    }
                    else
                    {
                        $query = "select id FROM admin where email='".$email."'";
                        $result = mysqli_query($con,$query);
                        $Results = mysqli_fetch_array($result);
                        $id=$Results['id'];
                 
                        if(count($Results)!=0)
                        {
                            $encrypt = ($Results['id']);
                            $to      = $email; 
                            $subject = 'Reset Password'; // Give the email a subject 
                            $message = '
                                         
                                        Reset Passowrd :

                                        Click on the link given below to to reset your password :

                                        http://localhost/pinnacleERP/admin/resetPassword.php?encrypt='.$encrypt.'
                                         
                                        '; // Our message above including the link
                                                             
                                        $headers = 'From:pinnacleERP@gmail.com' . "\r\n"; // Set from headers
                                        mail($to, $subject, $message, $headers); // Send our email
                            header("location:login.php?s=101");

                        }
                        else
                        {
                            header("location:forgetPassword.php?s=101");
                        }
                    }}
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
