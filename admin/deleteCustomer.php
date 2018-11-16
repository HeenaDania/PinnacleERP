<?php 
	include '../config.php';
	$delete = "delete from customers where id = '$_GET[id]'";
	mysqli_query($con,$delete) or die(mysqli_error($con));
	header("location:customers.php?&s=103");
 ?>