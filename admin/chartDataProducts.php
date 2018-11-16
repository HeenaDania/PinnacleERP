 <?php 
	include '../config.php';
	$json=[];
	$get="SELECT * FROM products";
	$exe=mysqli_query($con,$get);
	while($data=mysqli_fetch_array($exe)){
		$json[]= [$data['name'], (int)$data['quantity']];
	}
	echo json_encode($json);
  ?>