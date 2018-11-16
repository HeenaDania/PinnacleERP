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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style type="text/css">
        body{
          background: #fff;
          height: 100%;
        }
        #container1{
          padding-top: 2%;
        }
        #container2{
          padding-top: 2%;
        }
    </style>
</head>
<body onload="myFunction()">
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

            <?php if (isset($_GET['s']) && $_GET['s']==100) { ?>
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Logged In successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-12">
                <h1>Welcome to</h1><h2>Pinnacle ERP</h2>
                <?php
                    $advanceCounter=0;
                    $currentDate= date('d');
                    if ($currentDate>=25) {
                        $get="select * from employees where advanceStatus='0'";
                        $exe=mysqli_query($con,$get);
                        while($data=mysqli_fetch_array($exe)){
                            $advanceCounter++;
                        }
                    }
                 ?>
                 <br>
                 <p style="color: #424448 ; font-size: 18px;">
                     S.S. Industries, a global leader in automotive seating and e-systems, with world-class products designed, engineered and manufactured by a diverse team of talented employees. Our vision is to be consistently recognized as the supplier of choice, an employer of choice, the investment of choice and a company that supports the communities where we do business.
                 </p>
                <div class="col-lg-6">
                    <div id="container1" style="width:100%; height:400px;"></div>
                </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var options ={
                                chart: {
                                    renderTo: 'container1',
                                    type: 'column'
                                },
                                title: {
                                    text: 'Products'
                                },
                                xAxis: {
                                    categories: ['Handle Bar BMX 1', 'Sandenser', 'Handle Bar BMX 2','Handle Bar BMX 3', 'BMX', 'Handle BMX','Phini', 'Handle Stamp (EMP BA2) 1', 'Handle Stamp','Handle Stamp (TATA)','Handle Stamp (ATLAS)','Handle Stamp (EMP BA2) 2']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Products in Store'
                                    }
                                },
                                series: [{}]
                            };
                            $.getJSON('chartDataProducts.php', function(data){
                                options.series[0].data = data;
                                var chart = new Highcharts.Chart(options);
                            });
                        });
                    </script>
                <div class="col-lg-6">
                    <div id="container2" style="width:100%; height:400px;"></div>
                </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var options ={
                                chart: {
                                    renderTo: 'container2',
                                    type: 'pie'
                                },
                                title: {
                                    text: 'Customers'
                                },
                                xAxis: {
                                    categories: ['Meera Industries', 'Eastman','Indushox Pvt. Limited', 'Kansal Enterprise', 'Shri Krishna Traders', 'Amber Cycle']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Customers Sale'
                                    }
                                },
                                series: [{}]
                            };
                            $.getJSON('chartDataCustomers.php', function(data){
                                options.series[0].data = data;
                                var chart = new Highcharts.Chart(options);
                            });
                        });
                    </script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="text/javascript">
        var d = new Date(); // for now
        d.getHours();
            function myFunction() {
                if (d.getHours()>20) {
                swal("Update Data", "Update the stock and product values.");
                }

                var advanceCounter = <?php echo json_encode($advanceCounter); ?>;
                if (advanceCounter>0) {
                        swal("Advance Salary !","Pay Advance Salary to the Employees");
                    }

            }
        
        
    </script>
</body>
</html>
