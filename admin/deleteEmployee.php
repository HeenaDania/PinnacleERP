<?php 
	include '../config.php';
	$delete = "delete from employees where id = '$_GET[id]'";
	mysqli_query($con,$delete) or die(mysqli_error($con));
	header("location:employees.php?&s=103");
 ?>