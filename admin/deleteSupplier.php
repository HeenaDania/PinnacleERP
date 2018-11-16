<?php 
	include '../config.php';
	$delete = "delete from suppliers where id = '$_GET[id]'";
	mysqli_query($con,$delete) or die(mysqli_error($con));
	header("location:suppliers.php?&s=103");
 ?>