<?php
$itemName = $_GET['itemName'];
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysql_select_db("pinnacleERP", $connection); // Selecting Database
if (isset($itemName)) {
    $query = " SELECT * FROM stock WHERE itemName = '$itemName'";
    $result = mysql_query($query);
    while($row = mysql_fetch_object($result)){
        echo $row->code;
    }
}
mysql_close($connection); // Connection Closed
?>