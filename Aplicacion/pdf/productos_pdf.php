<?php
	require '../bd/conexion.php';
	date_default_timezone_set('America/El_Salvador');
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../images/logo2.jpg', 5, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte de Productos',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
			$this->SetX(150);
			$this->Cell(0,10,date("Y-m-d H:i:s"),0,0,'C' );
		}		
	}

	$resultado = $conexion->query("SELECT * FROM productos");
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(35,6,'Nombre',1,0,'C',1);
	$pdf->Cell(60,6,'Descripcion',1,0,'C',1);
	$pdf->Cell(45,6,'Categoria',1,0,'C',1);
	$pdf->Cell(20,6,'Existencia',1,0,'C',1);
	$pdf->Cell(20,6,'Precio',1,1,'C',1);

	
	$pdf->SetFont('Arial','',7);
	
	while($row = $resultado->fetch_assoc())
	{
		$row1=$conexion->query("SELECT * FROM categoria WHERE Id_Categoria='".$row['Id_Categoria']."'");
		$row1=$row1->fetch_assoc();
		
		$pdf->Cell(35,6,utf8_decode($row['Nombre']),1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['Descripcion']),1,0,'C');
		$pdf->Cell(45,6,utf8_decode($row1['Nombre']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['Existencia']),1,0,'C');
		$pdf->Cell(20,6,'$'.utf8_decode($row['Precio']),1,1,'C');
	}
	$pdf->Output();
?>