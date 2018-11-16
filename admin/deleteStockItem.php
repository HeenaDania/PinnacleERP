<?php 
	include '../config.php';
	$delete = "delete from stock where id = '$_GET[id]'";
	mysqli_query($con,$delete) or die(mysqli_error($con));
	header("location:stockItems.php?&s=103");
 ?>