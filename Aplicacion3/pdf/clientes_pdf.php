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
			$this->Cell(120,10, 'Reporte de Clientes',0,0,'C');
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

	$resultado = $conexion->query("SELECT * FROM cliente");
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Nombre',1,0,'C',1);
	$pdf->Cell(70,6,'Direccion',1,0,'C',1);
	$pdf->Cell(30,6,'Telefono',1,1,'C',1);
	
	$pdf->SetFont('Arial','',7);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['Nombre']),1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['Direccion']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['Telefono']),1,1,'C');
	}
	$pdf->Output();
?>