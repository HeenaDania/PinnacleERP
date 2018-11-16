<?php 
	include '../config.php';
	$delete = "delete from products where id = '$_GET[id]'";
	mysqli_query($con,$delete) or die(mysqli_error($con));
	header("location:products.php?&s=103");
 ?>