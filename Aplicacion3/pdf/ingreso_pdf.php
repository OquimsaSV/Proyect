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
			$this->Cell(120,10, 'Reporte de Ingreso de Mercaderia',0,0,'C');
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

	$resultado = $conexion->query("SELECT * FROM ingreso");
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Producto',1,0,'C',1);
	$pdf->Cell(70,6,'Cantidad',1,0,'C',1);
	$pdf->Cell(30,6,'Fecha',1,1,'C',1);
	
	$pdf->SetFont('Arial','',7);
	
	while($row = $resultado->fetch_assoc())
	{
		$row1=$conexion->query("SELECT * FROM productos WHERE Id_Producto='".$row['Id_Producto']."'");
		$row1=$row1->fetch_assoc();
		$pdf->Cell(70,6,utf8_decode($row1['Nombre']),1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['Cantidad']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['Fecha']),1,1,'C');
	}
	$pdf->Output();
?>