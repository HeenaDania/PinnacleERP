<?php 
require('fpdf/fpdf.php');

$salesNo = $_GET['salesNo'];
$host="localhost";
$user="root";
$pass="";
$db="pinnacleERP";
$con=mysqli_connect($host,$user,$pass,$db)or die(mysqli_error($con));
$reqN = $salesNo . '.pdf';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',14);

$pdf->Cell(189	,10,'',0,1);

$pdf->Cell(130	,5,'Subhash Sood Industries',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);

$pdf->Cell(189	,10,'',0,1);


$pdf->SetFont('Helvetica','',12);
$pdf->Cell(130	,5,'Plot No. 5. St. No. 3, Friends Colony, Jamalpur',0,0);
$pdf->Cell(59	,5,'',0,1);

$get="SELECT DISTINCT customer, orderDate FROM sales where salesNo = '$salesNo'";
$exe=mysqli_query($con,$get);
$data=mysqli_fetch_array($exe);
$customer=$data['customer'];

$pdf->Cell(125	,5,'Chandigarh Road, Ludhiana, Punjab, 141010',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(39	,5,$data['orderDate'],0,1);

$pdf->Cell(125	,5,'Phone - 8872867901',0,0);
$pdf->Cell(25	,5,'Invoice No.',0,0);
$pdf->Cell(39	,5,$salesNo,0,1);

$pdf->Cell(125	,5,'Email - subhashsood08@gmail.com',0,1);


$pdf->Cell(189	,10,'',0,1);


$pdf->Cell(100	,5,'Bill To -',0,1);
$get1="SELECT * FROM customers where companyName = '$customer'";
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
$pdf->Cell(15	,7,'Sr No.',1,0,'R');
$pdf->Cell(115	,7,'Description',1,0);
$pdf->Cell(25	,7,'Qunatity',1,0);
$pdf->Cell(34	,7,'Amount',1,1);

$sno=1;
$totalCost=0;
$get2="SELECT * FROM sales where salesNo = '$salesNo'";
$exe2=mysqli_query($con,$get2);
while($data2=mysqli_fetch_array($exe2)){

$pdf->SetFont('Helvetica','',12);
$pdf->Cell(15	,6,$sno.'. ',1,0,'R');
$pdf->Cell(115	,6,$data2['productName'],1,0);
$pdf->Cell(25	,6,$data2['units'],1,0);
$pdf->Cell(34	,6,$data2['price'],1,1,'R');

$sno++; 
$totalCost += $data2['price']; }


$pdf->Cell(130	,6,'',0,0);
$pdf->Cell(25	,6,'Subtotal',0,0);
$pdf->Cell(9	,6,'Rs.',1,0);
$pdf->Cell(25	,6,$totalCost,1,1,'R');

$pdf->Cell(130	,6,'',0,0);
$pdf->Cell(25	,6,'SGST',0,0);
$pdf->Cell(9	,6,'@',1,0);
$pdf->Cell(25	,6,'9%',1,1,'R');
$sgst= 0.09* $totalCost;

$pdf->Cell(130	,6,'',0,0);
$pdf->Cell(25	,6,'CGST',0,0);
$pdf->Cell(9	,6,'@',1,0);
$pdf->Cell(25	,6,'9%',1,1,'R');
$cgst= 0.09* $totalCost;

$pdf->Cell(130	,6,'',0,0);
$pdf->Cell(25	,6,'IGST',0,0);
$pdf->Cell(9	,6,'@',1,0);
$pdf->Cell(25	,6,'- %',1,1,'R');

$totalCost += $sgst + $cgst;
$pdf->Cell(130	,6,'',0,0);
$pdf->Cell(25	,6,'Grand Total',0,0);
$pdf->Cell(9	,6,'Rs.',1,0);
$pdf->Cell(25	,6,$totalCost,1,1,'R');

$pdf->Cell(189	,20,'',0,1);

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(154	,7,'',0,0);
$pdf->Cell(35	,7,'(Auth. Signatory)',0,1);


$query="update sales set billStatus=1 where salesNo = '$salesNo'";
mysqli_query($con,$query) or die(mysqli_error($con));

$pdf->Output($reqN, 'I');
 ?>