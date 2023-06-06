<?php

	ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);
	error_reporting(E_ALL);

	//===========================================================================
	//===========================================================================
	//===========================================================================
	//TCPDF FILE BEGINNING
	//==========================================================================
	// Include the main TCPDF library (search for installation path).
	require_once('tcpdf_include.php');
	require_once('../../conexion.php');
	require_once('../../funciones.php');

	// Extend the TCPDF class to create custom Header and Footer
	class MYPDF extends TCPDF {
		//Page header
		public function Header() {
			// get the current page break margin
			$bMargin = $this->getBreakMargin();
			// get current auto-page-break mode
			$auto_page_break = $this->AutoPageBreak;
			// disable auto-page-break
			$this->SetAutoPageBreak(false, 0);

			$img_file = 'images/Anexo Otros Productos.jpg';				

			$this->Image($img_file, 0, 0, 215.9, 279.4, 'jpg', '', 'C', false, 1200, '', false, false, 0,false, false, false);			
			$this->setPageMark();
		}

		// Page footer
	    public function Footer() {
	        // Position at 15 mm from bottom
	        $this->SetY(-15);
	        // Set font
	        //$this->SetFont('helvetica', 'I', 8);
	    }
	}

	//============================================================+
	// BEGINNING OF FILE
	//============================================================+
	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetDisplayMode($zoom='fullpage', $layout='OneColumn', $mode='UseThumbs');

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Arrend Leasing®');
	$pdf->SetTitle('Solicitud Leasing');
	$pdf->SetSubject('Comercial');
	$pdf->SetKeywords('');

	$pdf->setJPEGQuality(600);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	$pdf->SetHeaderMargin(0);
	$pdf->SetFooterMargin(0);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(0);
	$pdf->SetFooterMargin(0);

	// remove default footer
	$pdf->setPrintFooter(false);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set font
	$pdf->SetFont('helveticaB', 'B', 8);

	// add a page
	$pdf->AddPage('P', 'LETTER');

	// // set cell padding
	$pdf->setCellPaddings(0, 0, 0, 0);

	// // set cell margins
	// $pdf->setCellMargins(1, 1, 1, 1);

	// // set color for background
	$pdf->SetFillColor(255, 255, 255);

	// // set color text
	$pdf->SetTextColor(92,97,99);


	 $id = $_GET['FormNo'];
	//$id = "150";
	 if(isset($_GET['FormNo']))
	//if(isset($id))
	{
		//Datos tabla principal
	 	$listadoIndividual = "SELECT * FROM anexo_productos_servicios WHERE Formulario_No = '$id'";
	    $executeIndividual = mysqli_query($connection, $listadoIndividual);
	    $data = mysqli_fetch_array($executeIndividual);

		//Letra Font
	    $pdf->SetFont('helvetica', 'B', 7);

		//X ---> Horinzontal 
		//Y ---> Vertial
		// $pdf->SetXY(170,11.5);
		// $pdf->MultiCell(35, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(50,32.5);
		$pdf->MultiCell(50, 0, $data['lugar'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(165,32.5);
		$pdf->MultiCell(25, 0, $data['fecha'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(71,41);
		$pdf->MultiCell(135, 0, $data['razon_social'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(11,48);
		$pdf->MultiCell(133, 0, $data['nombre_central_sucursal'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(148,48);
		$pdf->MultiCell(58, 0, $data['codigo_sucursal'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(9,59);
		$pdf->MultiCell(60, 0, $data['solicitante_primer_apellido'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(72,59);
		$pdf->MultiCell(74, 0, $data['solicitante_segundo_apellido'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(148,59);
		$pdf->MultiCell(60, 0, $data['solicitante_tercer_apellido'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(9,66.5);
		$pdf->MultiCell(60, 0, $data['solicitante_primer_nombre'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(72,66.5);
		$pdf->MultiCell(74, 0, $data['solicitante_segundo_nombre'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(148,66.5);
		$pdf->MultiCell(60, 0, $data['solicitante_tercer_nombre'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(72,70);
		$pdf->MultiCell(135, 0, $data['solicitante_razon_social'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(9,76.6);
		$pdf->MultiCell(198, 0, $data['solicitante_direccion'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(23,80.5);
		$pdf->MultiCell(23, 0, $data['solicitante_zona'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(63,80.5);
		$pdf->MultiCell(46, 0, $data['solicitante_departamento'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(120,80.5);
	    $pdf->MultiCell(47, 0, $data['solicitante_municipio'] , 0, 'C', 0, 20, '', '', true);
	   	$pdf->SetXY(172,80.5);
		$pdf->MultiCell(35, 0, $data['solicitante_pais'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(9,92);
		$pdf->MultiCell(100, 0, $data['producto_solicitar'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(111,92);
		$pdf->MultiCell(97, 0, $data['nombre_producto'] , 0, 'L', 0, 20, '', '', true);

		//Si la moneda es Otras pone la tipo_moneda_otra
		$pdf->SetXY(9,99);
		if($data['tipo_moneda']=='Otras'){
			$pdf->MultiCell(38, 0, $data['tipo_moneda_otra'] , 0, 'L', 0, 20, '', '', true);
		}else{
			$pdf->MultiCell(38, 0, $data['tipo_moneda'] , 0, 'L', 0, 20, '', '', true);
		}

		//Cubertura
		if($data['nivel_cobertura']=='LOCAL'){
			$pdf->SetXY(61,99);
			$pdf->MultiCell(7, 0, "X" , 0, 'C', 0, 20, '', '', true);
		}else{
			$pdf->SetXY(97,99);
			$pdf->MultiCell(7, 0, "X" , 0, 'C', 0, 20, '', '', true);
		}

		$pdf->SetXY(111,99);
		$pdf->MultiCell(95, 0, $data['identificacion_producto'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(15,106);
		$pdf->MultiCell(90, 0, $data['monto_inicial_producto'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(111,106);
		$pdf->MultiCell(90, 0, $data['monto_inicial_producto2'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(10,113);
		$pdf->MultiCell(197, 0, $data['destino_producto'] , 0, 'L', 0, 20, '', '', true);

		//Varias Elecciones

		switch($data['procedencia_fondos']){
			case'Sueldos y Salarios':
				$pdf->SetXY(40,120);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Intereses':
				$pdf->SetXY(40,123.7);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Ventas del Negocio':
				$pdf->SetXY(40,127);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Préstamo':
				$pdf->SetXY(40,130.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
				$pdf->SetXY(115,130.3);
				$pdf->MultiCell(80, 0, $data['procedencia_fondos_otra'], 0, 'C', 0, 0, '', '', true);
			break;
			case'Remesas':
				$pdf->SetXY(79.5,120.2);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Compraventa Inmuebles':
				$pdf->SetXY(79.5,123.6);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Servicios del Negocio':
				$pdf->SetXY(79.5,127);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Manutención':
				$pdf->SetXY(119,120);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Compraventa Muebles':
				$pdf->SetXY(119,123.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Arrendamiento Bienes':
				$pdf->SetXY(119,127);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Pensiones por Jubilación':
				$pdf->SetXY(158,120);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Compraventa de Ganado':
				$pdf->SetXY(158,123.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Dividendos / Utilidades':
				$pdf->SetXY(158,126.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Ahorros personales':
				$pdf->SetXY(196.5,120);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Compraventa Agrícola':
				$pdf->SetXY(196.5,123.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Aporte de Capital':
				$pdf->SetXY(196.5,126.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case'Traspaso ó Cancelación de Cuenta/Inversión':
				$pdf->SetXY(79.5,134);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
				$pdf->SetXY(127,134.3);
				$pdf->MultiCell(80, 0, $data['procedencia_fondos_otra'], 0, 'C', 0, 0, '', '', true);
			break;
			case'Otra':
				$pdf->SetXY(45,137.5);
				$pdf->MultiCell(150, 0, $data['procedencia_fondos_otra'] , 0, 'C', 0, 0, '', '', true);
			break;
			

		}


		// if($data['procedencia_fondos']=='Otra'){
		// 	$pdf->SetXY(117,130);
		// 	$pdf->MultiCell(90, 0, $data['procedencia_fondos_otra'] , 0, 'L', 0, 20, '', '', true);
		// }else{
		// 	$pdf->SetXY(51,196.5);
		// 	$pdf->MultiCell(58, 0, $data['procedencia_fondos_otra'] , 0, 'L', 0, 20, '', '', true);
		// }

		if($data['traslado_fondos']=='SI'){
			$pdf->SetXY(173.5,142);
			$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);

			//Se muestra este campo 
			if($data['traslado_fondos_nivel']=='LOCAL'){
				$pdf->SetXY(157,146);
				$pdf->MultiCell(7, 0, "X" , 0, 'C', 0, 20, '', '', true);
			}else {
				$pdf->SetXY(193.5,146);
				$pdf->MultiCell(7, 0, "X" , 0, 'C', 0, 20, '', '', true);
			}

		}else {
			$pdf->SetXY(193,142);
			$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
		}

		if($data['otros_firmantes']=='SI'){
		 	$pdf->SetXY(173.5,151);
		 	$pdf->MultiCell(7, 0, "X" , 0, 'C', 0, 20, '', '', true);
		 }else {
			$pdf->SetXY(193,151);
			$pdf->MultiCell(7, 0, "X" , 0, 'C', 0, 20, '', '', true);
		}	
	}

	ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
