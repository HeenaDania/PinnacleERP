<?php ob_start();
session_start();
$purchaseDate=$_GET['purchaseDate']; ?>
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

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Date Wise Purchase Orders</strong>
                        <button type="button" class="btn btn-success" style="float:right" onclick="location.href='createPurchaseOrder.php';"><i class="fa fa-plus"></i>&nbsp; Create Purchase Order</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Order  No</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Date of Order</th>
                                    <th scope="col">Generate PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sno=1;
                                $get="SELECT DISTINCT purchaseNo, supplier, purchaseDate FROM purchases where purchaseDate = '$purchaseDate'";
                                $exe=mysqli_query($con,$get);
                                while($data=mysqli_fetch_array($exe)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $sno; ?></th>
                                    <td><?php echo $data['purchaseNo']; ?></td>
                                    <td><?php echo $data['supplier']; ?></td>
                                    <td><?php echo $data['purchaseDate']; ?></td>
                                    <td>
                                        <a href="purchaseOrderPDF.php?purchaseNo=<?php echo $data['purchaseNo'] ?>" style="color: blue;">Generate PDF </a>
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
