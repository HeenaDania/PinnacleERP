<?php 
require('fpdf/fpdf.php');

$host="localhost";
$user="root";
$pass="";
$db="pinnacleERP";
$con=mysqli_connect($host,$user,$pass,$db)or die(mysqli_error($con));
$reqN = 'customersReport.pdf';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',14);

$pdf->Cell(189	,10,'',0,1);

$pdf->Cell(130	,5,'Subhash Sood Industries',0,0);
$pdf->Cell(59	,5,'Customers Report',0,1);

$pdf->Cell(189	,10,'',0,1);


$pdf->SetFont('Helvetica','',12);
$pdf->Cell(146	,5,'Plot No. 5. St. No. 3, Friends Colony, Jamalpur',0,0);
$pdf->Cell(10	,5,'Date',0,0);
$pdf->Cell(39	,5,date('d-m-y'),0,1);

$pdf->Cell(125	,5,'Chandigarh Road, Ludhiana, Punjab, 141010',0,1);

$pdf->Cell(125	,5,'Phone - 8872867901',0,1);

$pdf->Cell(125	,5,'Email - subhashsood08@gmail.com',0,1);

$pdf->Cell(189	,10,'',0,1);

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(15	,7,'Sr No.',1,0,'R');
$pdf->Cell(80	,7,'Company Name',1,0);
$pdf->Cell(60	,7,'Owner Name',1,0);
$pdf->Cell(34	,7,'Sales',1,1);

$sno=1;
$get="SELECT * FROM `customers` ";
$exe=mysqli_query($con,$get);
while($data=mysqli_fetch_array($exe)){

$pdf->SetFont('Helvetica','',12);
$pdf->Cell(15	,6,$sno.'. ',1,0,'R');
$pdf->Cell(80	,6,$data['companyName'],1,0);
$pdf->Cell(60	,6,$data['ownerName'],1,0);

$companyName=$data['companyName'];
$balance=0;

$get1="SELECT * FROM sales where customer='$companyName'";
$exe1=mysqli_query($con,$get1);
while($data1=mysqli_fetch_array($exe1)){
	$balance += $data1['price'];
}

$pdf->Cell(34	,6,$balance,1,1,'R');

$sno++; 
}


$pdf->Cell(189	,20,'',0,1);

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(154	,7,'',0,0);
$pdf->Cell(35	,7,'(Auth. Signatory)',0,1);


$pdf->Output($reqN, 'I');
 ?>