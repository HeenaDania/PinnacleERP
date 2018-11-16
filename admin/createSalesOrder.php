<?php ob_start();
session_start(); ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pinnacle ERP</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript">
          function getPrice(quantity, name, divid){
              var productName=document.getElementById(name).value;  
                $.ajax({
                    url: 'loadProductPrice.php?productName='+productName+'&quantity='+quantity,
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
                        Sales Order has been created successfully.
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
                            <strong>Create</strong> Sales Order
                        </div>
                        <div class="card-body card-block">
                        <div class="col-lg-6">
                          <?php $date= date('ymd');
                                $time= date('hi') ?>
                            <div class="form-group"><label  class=" form-control-label">Sales Invoice No.</label><input type="text" value="SSISAL<?php echo $date.$time ; ?>" class="form-control" name="salesNo" required></div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group"><label  class=" form-control-label">Customer Name</label><select class="form-control" name="customer" required>
                                <option disabled="" selected="">Select Customer Name</option>
                                <?php $get="select * from customers";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['companyName']; ?>"><?php echo $data['companyName']; ?> (<?php echo $data['ownerName']; ?>)</option>
                                  <?php } ?>
                            </select></div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group"><label class="form-control-label">Product No.</label><input type="text" placeholder="1" class="form-control" readonly=""></div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group"><label class="form-control-label">Product Name</label><select class="form-control" name="productName1" required="" id="productName1">
                                <option disabled="" selected="">Select Product Name</option>
                                <?php $get="select * from products";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                  <?php } ?>
                            </select></div>
                        </div>


                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Qunatity</label><input type="number" placeholder="Quantity" class="form-control" name="unit1" onkeyup="getPrice(this.value, 'productName1', 'price1')" required></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Price</label><input type="number" placeholder="Price" class="form-control" name="price1" id="price1" required></div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group"><label class="form-control-label">Product No.</label><input type="text" placeholder="2" class="form-control" readonly=""></div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group"><label class="form-control-label">Product Name</label><select class="form-control" name="productName2" required="" >
                                <option disabled="" selected="">Select Product Name</option>
                                <?php $get="select * from products";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                  <?php } ?>
                            </select></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Qunatity</label><input type="number" placeholder="Quantity" class="form-control" name="unit2" required onkeyup="getPrice(this.value, 'productName1', 'price2')"></div>
                        </div>
                      <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Price</label><input type="number" placeholder="Price" class="form-control" name="price2" id="price2" required></div>
                        </div>

                      <div class="col-lg-2">
                            <div class="form-group"><label class="form-control-label">Product No.</label><input type="text" placeholder="3" class="form-control" readonly=""></div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group"><label class="form-control-label">Product Name</label><select class="form-control" name="productName3" required="">
                                <option disabled="" selected="">Select Product Name</option>
                                <?php $get="select * from products";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                  <?php } ?>
                            </select></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Qunatity</label><input type="number" placeholder="Quantity" class="form-control" name="unit3" required onkeyup="getPrice(this.value, 'productName1', 'price3')"></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Price</label><input type="number" placeholder="Price" class="form-control" name="price3" id="price3" required></div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group"><label class="form-control-label">Product No.</label><input type="text" placeholder="4" class="form-control" readonly=""></div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group"><label class="form-control-label">Product Name</label><select class="form-control" name="productName4" required="">
                                <option disabled="" selected="">Select Product Name</option>
                                <?php $get="select * from products";
                                  $exe=mysqli_query($con,$get);
                                  while($data=mysqli_fetch_array($exe)){ ?>
                                  <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                  <?php } ?>
                            </select></div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Qunatity</label><input type="number" placeholder="Quantity" class="form-control" name="unit4" required onkeyup="getPrice(this.value, 'productName1', 'price4')"></div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group"><label class="form-control-label">Price</label><input type="number" placeholder="Price" class="form-control" name="price4" id="price4" required></div>
                        </div>

                      </div>
                      <div class="card-footer">
                           <button type="submit" class="btn btn-success" name="save">Save</button>
                            <a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
                      </div>
                </form>
                <?php 
                    if (isset($_POST['save'])) {
                        $salesNo=mysql_real_escape_string($_POST['salesNo']);
                        $customer=mysql_real_escape_string($_POST['customer']);
                        $productName1=mysql_real_escape_string($_POST['productName1']);
                        $price1=mysql_real_escape_string($_POST['price1']);
                        $unit1=mysql_real_escape_string($_POST['unit1']);
                        $productName2=mysql_real_escape_string($_POST['productName2']);
                        $price2=mysql_real_escape_string($_POST['price2']);
                        $unit2=mysql_real_escape_string($_POST['unit2']);
                        $productName3=mysql_real_escape_string($_POST['productName3']);
                        $price3=mysql_real_escape_string($_POST['price3']);
                        $unit3=mysql_real_escape_string($_POST['unit3']);
                        $productName4=mysql_real_escape_string($_POST['productName4']);
                        $price4=mysql_real_escape_string($_POST['price4']);
                        $unit4=mysql_real_escape_string($_POST['unit4']);
                        $currentDate=date('y-m-d');

                        $query1="insert into sales (salesNo,customer,productName, price,units,orderDate) VALUES ('$salesNo','$customer','$productName1','$price1','$unit1','$currentDate')";
                        $query2="insert into sales (salesNo,customer,productName, price,units,orderDate) VALUES ('$salesNo','$customer','$productName2','$price2','$unit2','$currentDate')";
                        $query3="insert into sales (salesNo,customer,productName, price,units,orderDate) VALUES ('$salesNo','$customer','$productName3','$price3','$unit3','$currentDate')";
                        $query4="insert into sales (salesNo,customer,productName, price,units,orderDate) VALUES ('$salesNo','$customer','$productName4','$price4','$unit4','$currentDate')";
                        mysqli_query($con,$query1) or die(mysqli_error($con));
                        mysqli_query($con,$query2) or die(mysqli_error($con));
                        mysqli_query($con,$query3) or die(mysqli_error($con));
                        mysqli_query($con,$query4) or die(mysqli_error($con));

                        $select1 = "select * from products where name = '$productName1'";
                        $res1 = mysqli_query($con, $select1);
                        $data1 = mysqli_fetch_assoc($res1);
                        $newQuantity1=$data1['quantity']-$unit1;
                        $query1="update products set quantity=$newQuantity1 where name = '$productName1'";
                        mysqli_query($con,$query1) or die(mysqli_error($con));

                        $select2 = "select * from products where name = '$productName2'";
                        $res2 = mysqli_query($con, $select2);
                        $data2 = mysqli_fetch_assoc($res2);
                        $newQuantity2=$data2['quantity']-$unit2;
                        $query2="update products set quantity=$newQuantity2 where name = '$productName2'";
                        mysqli_query($con,$query2) or die(mysqli_error($con));

                        $select3 = "select * from products where name = '$productName3'";
                        $res3 = mysqli_query($con, $select3);
                        $data3 = mysqli_fetch_assoc($res3);
                        $newQuantity3=$data3['quantity']-$unit3;
                        $query3="update products set quantity=$newQuantity3 where name = '$productName3'";
                        mysqli_query($con,$query3) or die(mysqli_error($con));

                        $select4 = "select * from products where name = '$productName4'";
                        $res4 = mysqli_query($con, $select4);
                        $data4 = mysqli_fetch_assoc($res4);
                        $newQuantity4=$data4['quantity']-$unit4;
                        $query4="update products set quantity=$newQuantity4 where name = '$productName4'";
                        mysqli_query($con,$query4) or die(mysqli_error($con));

                        header("location:createSalesOrder.php?s=101");


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
