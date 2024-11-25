<?php 
require('fpdf186/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage(); 

$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(200, 10, 'Papeleria CRICRI HIELO ', 0, 1, 'C'); // Título centrado
$pdf->Ln(10); 

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(40, 10, 'Producto', 1, 0, 'C');
$pdf->Cell(40, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(40, 10, 'Precio Unitario', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(40, 10, 'Lapis', 1, 0, 'C');
$pdf->Cell(40, 10, '10', 1, 0, 'C');
$pdf->Cell(40, 10, '$1.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$10.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Pegamento', 1, 0, 'C');
$pdf->Cell(40, 10, '5', 1, 0, 'C');
$pdf->Cell(40, 10, '$2.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$10.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Tijeras', 1, 0, 'C');
$pdf->Cell(40, 10, '2', 1, 0, 'C');
$pdf->Cell(40, 10, '$3.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$6.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Cuadernos', 1, 0, 'C');
$pdf->Cell(40, 10, '2', 1, 0, 'C');
$pdf->Cell(40, 10, '$10.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$15.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Engrapadora', 1, 0, 'C');
$pdf->Cell(40, 10, '2', 1, 0, 'C');
$pdf->Cell(40, 10, '$15.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$30.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Copias', 1, 0, 'C');
$pdf->Cell(40, 10, '2', 1, 0, 'C');
$pdf->Cell(40, 10, '$1.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$2.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Carpeta', 1, 0, 'C');
$pdf->Cell(40, 10, '2', 1, 0, 'C');
$pdf->Cell(40, 10, '$5.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$10.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Juego de geometria', 1, 0, 'C');
$pdf->Cell(40, 10, '2', 1, 0, 'C');
$pdf->Cell(40, 10, '$50.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$30.00', 1, 1, 'C');

$pdf->Cell(40, 10, 'Colores', 1, 0, 'C');
$pdf->Cell(40, 10, '2', 1, 0, 'C');
$pdf->Cell(40, 10, '$10.00', 1, 0, 'C');
$pdf->Cell(40, 10, '$15.00', 1, 1, 'C');

$pdf->Cell(120, 10, 'Total', 1, 0, 'R');
$pdf->Cell(40, 10, '$127.00', 1, 1, 'C');

$pdf->Ln(10);


$pdf->Output();
?>
