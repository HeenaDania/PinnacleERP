<?php ob_start();
session_start(); ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pinnacle ERP</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript">
            function getData(itemName, divid){
                $.ajax({
                    url: 'loadItemCode.php?itemName='+itemName,
                    success: function(html) {
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.value = html;
                    }
                });
            }
        </script>
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
                <?php if (isset($_GET['s']) && $_GET['s']==101) { ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                        Puchase Order has been created successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                    }
                ?>
            </div>
            <div class="col-lg-12">
                <form action="" method="post" class="">
                <div class="card">
                        <div class="card-header">
                            <strong>Create</strong> Purchase Order
                        </div>
                        <div class="card-body card-block">
                        <div class="col-lg-6">
                          <?php $date= date('ymd');
                                $time= date('hi') ?>
                            <div class="form-group"><label  class=" form-control-label">Purchase Invoice No.</label><input type="text" value="SSIPUR<?php echo $date.$time ; ?>" class="form-control" name="purchaseNo" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Supplier Name</label><select class="form-control" name="supplier" required>
                                <option disabled="" selected="">Select Supplier Name</option>
                                <?php $get="select * from suppliers";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['companyName']; ?>"><?php echo $data['companyName']; ?> (<?php echo $data['ownerName']; ?>)</option>
                                  <?php } ?>
                            </select></div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group"><label class="form-control-label">Item No.</label><input type="text" placeholder="1" class="form-control" readonly=""></div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group"><label class="form-control-label">Item Name</label><select class="form-control" name="itemName1" required="" onchange="getData(this.value, 'code1')">
                                <option disabled="" selected="">Select Item Name</option>
                                <?php $get="select * from stock";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['itemName']; ?>"><?php echo $data['itemName']; ?></option>
                                  <?php } ?>
                            </select></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Item Code</label><input type="text" placeholder="Code" class="form-control" id="code1" name="code1" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Qunatity</label><input type="number" placeholder="Quantity" class="form-control" name="unit1" required></div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group"><label class="form-control-label">Item No.</label><input type="text" placeholder="2" class="form-control" readonly=""></div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group"><label class="form-control-label">Item Name</label><select class="form-control" name="itemName2" required="" onchange="getData(this.value, 'code2')">
                                <option disabled="" selected="">Select Item Name</option>
                                <?php $get="select * from stock";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['itemName']; ?>"><?php echo $data['itemName']; ?></option>
                                  <?php } ?>
                            </select></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Item Code</label><input type="text" placeholder="Code" class="form-control" id="code2" name="code2" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Qunatity</label><input type="number" placeholder="Quantity" class="form-control" name="unit2" required></div>
                        </div>  



                      </div>

                      <div class="card-footer">
                           <button type="submit" class="btn btn-success" name="save">Save</button>
                            <a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                      </div>
                </form>
                <?php 
                    if (isset($_POST['save'])) {
                        $purchaseNo=mysql_real_escape_string($_POST['purchaseNo']);
                        $supplier=mysql_real_escape_string($_POST['supplier']);
                        $currentDate=date('y-m-d');

                        $itemName1=mysql_real_escape_string($_POST['itemName1']);
                        $code1=mysql_real_escape_string($_POST['code1']);
                        $unit1=mysql_real_escape_string($_POST['unit1']);

                        $itemName2=mysql_real_escape_string($_POST['itemName2']);
                        $code2=mysql_real_escape_string($_POST['code2']);
                        $unit2=mysql_real_escape_string($_POST['unit2']);

                        $sql = "insert into purchases (purchaseNo,supplier,itemName,itemCode,units,purchaseDate) VALUES ";
                        $sql .= "('$purchaseNo','$supplier','$itemName1','$code1','$unit1','$currentDate'),";
                        $sql .= "('$purchaseNo','$supplier','$itemName2','$code2','$unit2','$currentDate');";
                        mysqli_query($con,$sql) or die(mysqli_error($con));

                        $select1 = "select * from stock where code = '$code1'";
                        $res1 = mysqli_query($con, $select1);
                        $data1 = mysqli_fetch_assoc($res1);
                        $newQuantity1=$data1['quantity']+$unit1;
                        $query1="update stock set quantity=$newQuantity1 where code = '$code1'";
                        mysqli_query($con,$query1) or die(mysqli_error($con));

                        $select2 = "select * from stock where code = '$code2'";
                        $res2 = mysqli_query($con, $select2);
                        $data2 = mysqli_fetch_assoc($res2);
                        $newQuantity2=$data2['quantity']+$unit2;
                        $query2="update stock set quantity=$newQuantity2 where code = '$code2'";
                        mysqli_query($con,$query2) or die(mysqli_error($con));

                        header("location:createPurchaseOrder.php?s=101");


                    }
                ?>
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
