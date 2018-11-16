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
                
            </div>
            <div class="col-lg-7">
                <form action="" method="post" class="">
                <div class="card">
                    <div class="card-header">
                        <strong>Add</strong> Stock Item
                    </div>
                    <div class="card-body card-block">
                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Item Name</label><input type="text" placeholder="Item Name" class="form-control" name="name" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Item Code</label><input type="text" value="ITEM" class="form-control" name="code" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Quantity</label><input type="text" placeholder="Quantity" class="form-control" name="quantity" required></div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="add">Add Item</button>
                    <a href="stockItems.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                </div>
                </form>
                <?php 
                    if (isset($_POST['add'])) {
                        $name=mysql_real_escape_string($_POST['name']);
                        $code=mysql_real_escape_string($_POST['code']);
                        $quantity=mysql_real_escape_string($_POST['quantity']);
                        $query="insert into stock (itemName,code,quantity) VALUES ('$name','$code','$quantity')";
                        mysqli_query($con,$query) or die(mysqli_error($con));
                        header("location:stockItems.php?s=101");
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
