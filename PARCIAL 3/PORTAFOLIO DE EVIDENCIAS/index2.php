 <?php
require('fpdf186/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('courier', 'B', 16);
$pdf->MultiCell(0, 10, 
    "!Centro de Estudios Tecnologicos industrial y de servicios No. 84!\n" .
    "Desarrollo de gestion de usuarios,\nGUZMAN COBIAN CRISTHIAN ALEJANDRO", 
    0, 'C'
);
$pdf->Output();
?>