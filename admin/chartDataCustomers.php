 <?php 
	include '../config.php';
	$json=[];
	$get="SELECT * FROM `customers` ";
	$exe=mysqli_query($con,$get);
	while($data=mysqli_fetch_array($exe)){

		$companyName=$data['companyName'];
		$balance=0;

		$get1="SELECT * FROM sales where customer='$companyName'";
		$exe1=mysqli_query($con,$get1);
		while($data1=mysqli_fetch_array($exe1)){
			$balance += $data1['price'];
		}
		$json[]= [$companyName, (int)$balance];
	}
	echo json_encode($json);
  ?>