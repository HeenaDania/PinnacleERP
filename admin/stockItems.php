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
                <?php if (isset($_GET['s']) && $_GET['s']==103) { ?>
                <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                    <span class="badge badge-pill badge-primary">Success</span>
                    A Stock Item has been deleted successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } 
                if (isset($_GET['s']) && $_GET['s']==101) { ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                        A new Stock Item has been added successfully.
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
                        <strong class="card-title">All Stock Items</strong>
                        <button type="button" class="btn btn-success" style="float:right" onclick="location.href='createStockItem.php';"><i class="fa fa-plus"></i>&nbsp; Add Item</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sno=1;
                                $get="select * from stock";
                                $exe=mysqli_query($con,$get);
                                while($data=mysqli_fetch_array($exe)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $sno; ?></th>
                                    <td><?php echo $data['itemName']; ?></td>
                                    <td><?php echo $data['code']; ?></td>
                                    <td><?php echo $data['quantity']; ?></td>
                                    <td>
                                        <a href="editStockItem.php?id=<?php echo $data['id'] ?>"><i class="fa fa-edit"></i></a>
                                        <a href="deleteStockItem.php?id=<?php echo $data['id'] ?>"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php $sno++; } ?>
                            </tbody>
                        </table>
                    </div>
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
