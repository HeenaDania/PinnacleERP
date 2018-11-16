<?php 
require('fpdf/fpdf.php');

$purchaseNo = $_GET['purchaseNo'];
$host="localhost";
$user="root";
$pass="";
$db="pinnacleERP";
$con=mysqli_connect($host,$user,$pass,$db)or die(mysqli_error($con));
$reqN = $purchaseNo . '.pdf';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',14);

$pdf->Cell(189	,10,'',0,1);

$pdf->Cell(130	,5,'Subhash Sood Industries',0,0);
$pdf->Cell(59	,5,'Puchase Order',0,1);

$pdf->Cell(189	,10,'',0,1);


$pdf->SetFont('Helvetica','',12);
$pdf->Cell(130	,5,'Plot No. 5. St. No. 3, Friends Colony, Jamalpur',0,0);
$pdf->Cell(59	,5,'',0,1);

$get="SELECT DISTINCT supplier, purchaseDate FROM purchases where purchaseNo = '$purchaseNo'";
$exe=mysqli_query($con,$get);
$data=mysqli_fetch_array($exe);
$supplier=$data['supplier'];

$pdf->Cell(125	,5,'Chandigarh Road, Ludhiana, Punjab, 141010',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(39	,5,$data['purchaseDate'],0,1);

$pdf->Cell(125	,5,'Phone - 8872867901',0,0);
$pdf->Cell(25	,5,'Order No.',0,0);
$pdf->Cell(39	,5,$purchaseNo,0,1);

$pdf->Cell(125	,5,'Email - subhashsood08@gmail.com',0,1);

$pdf->Cell(189	,10,'',0,1);


$pdf->Cell(100	,5,'Order From -',0,1);
$get1="SELECT * FROM suppliers where companyName = '$supplier'";
$exe1=mysqli_query($con,$get1);
$data1=mysqli_fetch_array($exe1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$data1['ownerName'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$data1['companyName'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$data1['address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'('.$data1['mobile'].')',0,1);

$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(189	,10,'',0,1);


$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(25	,7,'Sr No.',1,0,'R');
$pdf->Cell(115	,7,'Description',1,0);
$pdf->Cell(40	,7,'Qunatity',1,1);

$sno=1;
$get2="SELECT * FROM purchases where purchaseNo = '$purchaseNo'";
$exe2=mysqli_query($con,$get2);
while($data2=mysqli_fetch_array($exe2)){

$pdf->SetFont('Helvetica','',12);
$pdf->Cell(25	,6,$sno.'. ',1,0,'R');
$pdf->Cell(115	,6,$data2['itemName'],1,0);
$pdf->Cell(40	,6,$data2['units'],1,1);

$sno++; 
}

$pdf->Cell(189	,20,'',0,1);

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(145	,7,'',0,0);
$pdf->Cell(35	,7,'(Auth. Signatory)',0,1);


$pdf->Output($reqN, 'I');
 ?>