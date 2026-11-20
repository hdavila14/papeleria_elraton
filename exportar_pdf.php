<?php

require('fpdf/fpdf.php');
include("conexion.php");

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,'Reporte de Productos',0,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(20,10,'ID',1);
$pdf->Cell(30,10,'Codigo',1);
$pdf->Cell(50,10,'Nombre',1);
$pdf->Cell(40,10,'Categoria',1);
$pdf->Cell(25,10,'Precio',1);
$pdf->Cell(25,10,'Stock',1);

$pdf->Ln();

$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conexion,$sql);

$pdf->SetFont('Arial','',10);

while($fila = mysqli_fetch_assoc($resultado)){

    $pdf->Cell(20,10,$fila['id'],1);
    $pdf->Cell(30,10,$fila['codigo'],1);
    $pdf->Cell(50,10,$fila['nombre'],1);
    $pdf->Cell(40,10,$fila['categoria'],1);
    $pdf->Cell(25,10,$fila['precio_venta'],1);
    $pdf->Cell(25,10,$fila['stock'],1);

    $pdf->Ln();
}

$pdf->Output();

?>