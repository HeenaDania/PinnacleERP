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
                        Product details has been modified successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                    }
                ?>
            </div>
            <div class="col-lg-7">
                <form action="" method="post" class="">
                <div class="card">
                    <div class="card-header">
                        <strong>Modify</strong> Product
                    </div>
                    <div class="card-body card-block">
                        <?php 
                            $select = "select * from products where id = '$_GET[id]'";
                            $res = mysqli_query($con, $select);
                            $data = mysqli_fetch_assoc($res);  
                        ?>
                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Product Name</label><input type="text" value="<?php echo $data['name']; ?>" class="form-control" name="name" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Product Type</label><input type="text" value="<?php echo $data['type']; ?>" class="form-control" name="type" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Product Size</label><input type="text" value="<?php echo $data['size']; ?>" class="form-control" name="size" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Product Code</label><input type="text" value="<?php echo $data['code']; ?>" class="form-control" name="code" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Quantity</label><input type="text" value="<?php echo $data['quantity']; ?>" class="form-control" name="quantity" required></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group"><label  class=" form-control-label">Price/Unit</label><input type="text" value="<?php echo $data['pricePerUnit']; ?>" class="form-control" name="price" required></div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="save">Save</button>
                    <a href="products.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                </div>
                </form>
                <?php 
                    if (isset($_POST['save'])) {
                        $name=mysql_real_escape_string($_POST['name']);
                        $type=mysql_real_escape_string($_POST['type']);
                        $size=mysql_real_escape_string($_POST['size']);
                        $code=mysql_real_escape_string($_POST['code']);
                        $quantity=mysql_real_escape_string($_POST['quantity']);
                        $pricePerUnit=mysql_real_escape_string($_POST['price']);
                        $query="update products set name='$name', type='$type', size='$size',code='$code', quantity='$quantity', pricePerUnit='$pricePerUnit' where id = '$_GET[id]'";
                                mysqli_query($con,$query) or die(mysqli_error($con));
                                header("location:editProduct.php?id=$_GET[id]&s=100");
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
