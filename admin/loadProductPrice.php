<?php
$productName = $_GET['productName'];
$quantity = $_GET['quantity'];
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysql_select_db("pinnacleERP", $connection); // Selecting Database
if (isset($productName)) {
    $query = " SELECT * FROM products WHERE name = '$productName'";
    $result = mysql_query($query);
    while($row = mysql_fetch_object($result)){
        $price = $row->pricePerunit;
    }
    $price = 100 * $quantity;
    // $price = $price * $quantity; not working..maybe because of string value
    echo $price;
}
mysql_close($connection); // Connection Closed
?>