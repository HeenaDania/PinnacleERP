<?php 
require('fpdf/fpdf.php');

$host="localhost";
$user="root";
$pass="";
$db="pinnacleERP";
$con=mysqli_connect($host,$user,$pass,$db)or die(mysqli_error($con));
$reqN = 'productsReport.pdf';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',14);

$pdf->Cell(189	,10,'',0,1);

$pdf->Cell(130	,5,'Subhash Sood Industries',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);

$pdf->Cell(189	,10,'',0,1);


$pdf->SetFont('Helvetica','',12);
$pdf->Cell(130	,5,'Plot No. 5. St. No. 3, Friends Colony, Jamalpur',0,0);
$pdf->Cell(10	,5,'Date',0,0);
$pdf->Cell(39	,5,date('d-m-y'),0,1);

$pdf->Cell(125	,5,'Chandigarh Road, Ludhiana, Punjab, 141010',0,1);

$pdf->Cell(125	,5,'Phone - 8872867901',0,1);

$pdf->Cell(125	,5,'Email - subhashsood08@gmail.com',0,1);

$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(189	,10,'',0,1);

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(12	,7,'S No.',1,0);
$pdf->Cell(30	,7,'Code',1,0);
$pdf->Cell(60	,7,'Name',1,0);
$pdf->Cell(32	,7,'Type',1,0);
$pdf->Cell(23	,7,'Qunatity',1,0,'R');
$pdf->Cell(32	,7,'Price Per Unit',1,1,'R');

$sno=1;
$get="SELECT * FROM products";
$exe=mysqli_query($con,$get);
while($data=mysqli_fetch_array($exe)){

$pdf->SetFont('Helvetica','',12);
$pdf->Cell(12	,6,$sno,1,0,'R');
$pdf->Cell(30	,6,$data['code'],1,0);
$pdf->Cell(60	,6,$data['name'],1,0);
$pdf->Cell(32	,6,$data['type'],1,0);
$pdf->Cell(23	,6,$data['quantity'],1,0);
$pdf->Cell(32	,6,$data['pricePerUnit'],1,1,'R');

$sno++; 
}

$pdf->Cell(189	,20,'',0,1);

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(154	,7,'',0,0);
$pdf->Cell(35	,7,'(Auth. Signatory)',0,1);

$pdf->Output($reqN, 'I');
 ?>