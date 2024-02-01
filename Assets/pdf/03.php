<?php
require('fpdf.php');

class PDF extends FPDF
{


// Page footer
function Footer()
{
    $this->Image('prueba2.png',0,0,210);
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);

}
}

$matricula='598445GC';
$nombre='Gustavo Campos';
$ci='2659745LP';
$carrera='INFORMATICA INDUSTRIAL';
$nivel='TECNICO SUPERIOR';
$domicilio='Calle Pedro Baltazar 265';
$telefono='2568947';
$nombreapoderado='Rodrigo Campos';
$ciapoderado='6897456LP';
$domicilioapoderado='Calle Pedro Baltazar 265';
$telefonoapoderado='4897565';
$fechaautorizacion='21 de junio de 2021';
$fechaenvio='22 de junio de 2021';

// Instanciation of inherited class
$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','I',12);
$pdf->Cell(0,86,'                                                                                                      '.' II/2021',0,1);
$pdf->Cell(0,-86,'                                                                                                                                            '.$matricula,0,1);

$pdf->Cell(0,121,'                                                            '.$nombre,0,1);
$pdf->Cell(0,-121,'                                                                                                                                         '.$ci,0,1);

$pdf->Cell(0,134,'                                                            '.$carrera,0,1);
$pdf->Cell(0,-134,'                                                                                                                                         '.$nivel,0,1);

$pdf->Cell(0,147,'                                                            '.$domicilio,0,1);
$pdf->Cell(0,-147,'                                                                                                                                                  '.$telefono,0,1);

$pdf->Cell(0,160,'                                                                          '.$nombreapoderado,0,1);
$pdf->Cell(0,-160,'                                                                                                                                         '.$ciapoderado,0,1);

$pdf->Cell(0,173,'                                                            '.$domicilioapoderado,0,1);
$pdf->Cell(0,-173,'                                                                                                                                                  '.$telefonoapoderado,0,1);
 
$pdf->Cell(0,187,'                                                                                                '.$fechaautorizacion,0,1);
$pdf->Cell(0,-172,'                                                                                                '.$fechaenvio,0,1);
//$pdf->Cell(0,-128,'                                                                                               '.$b,0,1);
//$pdf->Cell(0,137,'                                                                                               '.$c,0,1);
//$pdf->Cell(0,-129,'                                                                                               '.$d,0,1);
//$pdf->Cell(0,138,'                                                                                               '.$e,0,1);
$pdf->Output();
?>