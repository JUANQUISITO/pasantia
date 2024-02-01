<?php
require('Assets/pdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    /*
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
    */
}

// Page footer
function Footer()
{
    //$this->Image('logo.png',0,0,210);
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);

}
}
$a='Gustavo Campos';
$b='12345678';
$c='INFORMATICA INDUSTRIAL';
$d='TECNICO SUPERIOR';
$e='2568947';
// Instanciation of inherited class
$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','I',12);
$pdf->Cell(0,75,'                                                                                                                                            '.' 19 de Junio de 2021',0,1);
$pdf->Cell(0,138,'                                                                                               '.$a,0,1);
$pdf->Cell(0,-128,'                                                                                               '.$b,0,1);
$pdf->Cell(0,137,'                                                                                               '.$c,0,1);
$pdf->Cell(0,-129,'                                                                                               '.$d,0,1);
$pdf->Cell(0,138,'                                                                                               '.$e,0,1);
$pdf->Image('Assets/pdf/logo.png' , 80 ,22, 35 , 38,'PNG', '');
$pdf->Output();
?>