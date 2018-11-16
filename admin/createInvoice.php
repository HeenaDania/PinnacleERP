<?php
require('fpdf/fpdf.php');
$sales_doc_no = $_GET['sales_doc_no'];
//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'pinnacleERP');
$reqN = $sales_doc_no . '.pdf';
//get invoices data
$query = mysqli_query($con,"select * from sales	where salesNo = '$sales_doc_no'");
$result = mysqli_fetch_array($query);
$queryC = mysqli_query($con,"select * from customers where companyName = '".$result['customer']."'");
$resultC = mysqli_fetch_array($queryC);
$querySO = mysqli_query($con,"select productCode, units, price from sales where salesNo = '$sales_doc_no'");
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetLeftMargin(floatval(30));
$pdf->SetRightMargin(floatval(30));
$pdf->SetTopMargin(floatval(60));
//set font to arial, bold, 14pt
$pdf->SetFont('Helvetica','B',16);
$pdf->Cell(150	,5,'INVOICE',0,1, 'C');
$pdf->Cell(155	,10,'',0,1);//end of line
$pdf->Cell(155	,10,'',0,1);//end of line

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(90	,8,'P.S. Enterprises',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Helvetica','',12);

$pdf->Cell(90	,8,'Industrial Area, Focal Point',0,0);
$pdf->Cell(65	,8,'',0,1);//end of line

$pdf->Cell(90	,8,'Ludhiana, Punjab, India',0,0);
$pdf->Cell(25	,8,'Date',0,0);
$pdf->Cell(40	,8,$result['orderDate'],0,1);//end of line

$pdf->Cell(90	,8,'Phone +919914802110',0,0);
$pdf->Cell(25	,8,'Invoice #',0,0);
$pdf->Cell(40	,8,$result['salesNo'],0,1);//end of line

$pdf->Cell(90	,8,'Fax +911615046210',0,0);
$pdf->Cell(25	,8,'Customer ID',0,0);
$pdf->Cell(40	,8,$result['customer'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(155,10,'',0,1);//end of line


$pdf->Cell(10,5,'Bill To ->',0,1);

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10,8,'',0,0);
$pdf->Cell(90,8,$resultC['companyName'],0,1);

$pdf->Cell(10,8,'',0,0);
$pdf->Cell(90,8,$resultC['address'],0,1);

$pdf->Cell(10,8,'',0,0);
$pdf->Cell(90,8,$resultC['email'],0,1);

$pdf->Cell(10,8,'',0,0);
$pdf->Cell(90,8,$resultC['mobile'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(155,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Courier','B',14);

$pdf->Cell(90,10,'Material Description',1,0,'C');
$pdf->Cell(27,10,'Quantity',1,'C');
$pdf->Cell(38,10,'Amount',1,1, 'C');//end of line

$pdf->SetFont('Courier','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

while($row = mysqli_fetch_row($querySO)){
$mquery = mysqli_query($con,"select name from products where code = 'PROD0001'");
while($item = mysqli_fetch_row($mquery)){
	$pdf->Cell(90	,8,$item[0],1,0);
	$pdf->Cell(27	,8,number_format($row[1]),1,0);
	$pdf->Cell(38	,8,number_format($row[2]),1,1,'R');//end of line
}
}

$pdf->Cell(150,5,'',0,1);

$pdf->Cell(90,8,'',0,0);
$pdf->Cell(27,8,'Total Due',0,0);
$pdf->Cell(11,8,'Rs. ',1,0);
$pdf->Cell(27,8,number_format($result['price']),1,1,'R');//end of line

$pdf->Output($reqN, 'I');
?>	