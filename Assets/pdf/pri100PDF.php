<?php
include_once('fpdf.php');

$doc=new FPDF();

$doc->AddPage();
$doc->SetFont('Arial','',11);

$doc->Cell(190,12,'Reporte',1,2,'c',0);


$pdf->Output();
?>