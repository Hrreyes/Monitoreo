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

			$img_file = 'images/Anexo Pep.jpg';				

			$this->Image($img_file, 0, 0, 215.9, 279.4, 'jpg', '', 'C', false, 1200, '', false, false, 0,false, false, false);			
			$this->setPageMark();
		}

		// Page footer
	    public function Footer() {
	        // Position at 15 mm from bottom
	        $this->SetY(-15);
	       
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

	// // set color for background
	$pdf->SetFillColor(255, 255, 255);

	// // set color text
	$pdf->SetTextColor(92,97,99);


	 $id = $_GET['FormNo'];
	 //$id = "150";
	 //if(isset($_GET['FormNo']))
	if(isset($id))
	{
		//Datos tabla principal
	 	$listadoIndividual = "SELECT * FROM pep WHERE Formulario_No = '$id'";
	    $executeIndividual = mysqli_query($connection, $listadoIndividual);
	    $data = mysqli_fetch_array($executeIndividual);

		//Letra Font
	    $pdf->SetFont('helvetica', 'B', 6);

		//X ---> Horinzontal 
		//Y ---> Vertial
		// $pdf->SetXY(170,16);
		// $pdf->MultiCell(35, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(50,32.5);
		$pdf->MultiCell(50, 0, $data['lugar'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(165,32.5);
		$pdf->MultiCell(25, 0, $data['fecha'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(71,40.5);
		$pdf->MultiCell(135, 0, $data['razon_social'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(11,47);
		$pdf->MultiCell(133, 0, $data['nombre_central_sucursal'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(150,47);
		$pdf->MultiCell(58, 0, $data['codigo_sucursual'] , 0, 'C', 0, 20, '', '', true);
	
		//Campo radio Button 
		switch ($data['datos_personales']) {
			case "Solicitante":
				$pdf->SetXY(100.5,54.5);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
				break;
			case "Representante legal":
				$pdf->SetXY(177,54.5);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
				break;
			case "Otros firmantes":
				$pdf->SetXY(100.5,58);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
				break;
			case "Beneficiario2":
				$pdf->SetXY(177,58);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
				break;
		}

		$pdf->SetXY(8,65);
		$pdf->MultiCell(59, 0, $data['representa_primer_apellido'], 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(70,65);
		$pdf->MultiCell(78, 0, $data['representa_segundo_apellido'], 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(150,65);
		$pdf->MultiCell(58, 0, $data['representa_tercer_apellido'], 0, 'L', 0, 20, '', '', true);
		
		$pdf->SetXY(8,72);
		$pdf->MultiCell(59, 0, $data['representa_primer_nombre'], 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(70,72);
		$pdf->MultiCell(78, 0, $data['representa_segundo_nombre'], 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(150,72);
		$pdf->MultiCell(58, 0, $data['representa_tercer_nombre'], 0, 'L', 0, 20, '', '', true);
		
		$pdf->SetXY(70,76);
		$pdf->MultiCell(137, 0, $data['representa_razon_social'], 0, 'L', 0, 20, '', '', true);

		if($data['espersona_expuestapep']=='SI'){
			$pdf->SetXY(92,87.5);
			$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
		}else {
			$pdf->SetXY(113,87.5);
			$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
		}

		//Mostrar Datos
		if($data['espersona_expuestapep']=='SI'){

			if($data['condicion_pep']=='NACIONAL'){
				$pdf->SetXY(161.5,87.5);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
			}else {
				$pdf->SetXY(186,87.5);
				$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
			}
			
			$pdf->SetXY(8,94);
			$pdf->MultiCell(78, 0, $data['nombre_institucion_trabajo_pep'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(88,94);
			$pdf->MultiCell(60, 0, $data['puesto_institucion_trabajo_pep'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(150,94);
			$pdf->MultiCell(58, 0, $data['pais_institucion_trabajo_pep'] , 0, 'L', 0, 20, '', '', true);

			//Campo radio Button 
			switch ($data['origen_riqueza_pep']) {
				case "Herencia":
					$pdf->SetXY(22,103.8);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Negocio Propio":
					$pdf->SetXY(49.2,103.8);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Servicios profesionales":
					$pdf->SetXY(84,103.8);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Préstamos bancarios":
					$pdf->SetXY(118,103.8);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Trabajos anteriores":
					$pdf->SetXY(153,103.8);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;	
				case "Trabajo Actual":
					$pdf->SetXY(188.5,103.8);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Otros (especifique)":
					$pdf->SetXY(55,107.5);
					$pdf->MultiCell(150, 0,$data['origen_riqueza_pep'], 0,'L', 0, 20, '', '', true);
					break;
			}
		}	


		if($data['tiene_parentesco_pep']=='SI'){
			$pdf->SetXY(174.5,122);
			$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
		}else {
			$pdf->SetXY(192.5,122);
			$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
		}

		if($data['tiene_parentesco_pep']=='SI'){
			//Campo radio Button 
			switch ($data['indicar_parentesco_pep']) {
				case "Padre":
					$pdf->SetXY(63.2,125.5);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Madre":
					$pdf->SetXY(86.5,125.5);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Hijo(a)":
					$pdf->SetXY(117.5,125.5);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Hermano(a)":
					$pdf->SetXY(151,125.5);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Cónyuge":
					$pdf->SetXY(186,125.8);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;	
				case "Otro":
					$pdf->SetXY(63.2,128.5);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);

					$pdf->SetXY(90,129);
					$pdf->MultiCell(100, 0,$data['indicar_parentesco_pep'], 0,'L', 0, 20, '', '', true);
					break;
			}


			if($data['condicion_pep2']=='NACIONAL'){
				$pdf->SetXY(162,132.3);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
			}else{
				$pdf->SetXY(189,132.3);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
			}

			$pdf->SetXY(8,139.2);
			$pdf->MultiCell(59, 0, $data['representa_primer_apellido_pep'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(70,139.2);
			$pdf->MultiCell(78, 0, $data['representa_segundo_apellido_pep'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(150,139.2);
			$pdf->MultiCell(58, 0, $data['representa_tercer_apellido_pep'] , 0, 'L', 0, 20, '', '', true);
			
			$pdf->SetXY(8,145.8);
			$pdf->MultiCell(59, 0, $data['representa_primer_nombre_pep'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(69,145.8);
			$pdf->MultiCell(54, 0, $data['representa_segundo_nombre_pep'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(124.5,145.8);
			$pdf->MultiCell(43, 0, $data['representa_tercer_nombre_pep'] , 0, 'L', 0, 20, '', '', true);
			
			if($data['genero']=='MASCULINO'){
				$pdf->SetXY(178,145.4);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
			}else {
				$pdf->SetXY(195,145.4);
				$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
			}

			$pdf->SetXY(8,152.5);
			$pdf->MultiCell(77, 0, $data['nombre_institucion_trabajo_pep2'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(88,152.5);
			$pdf->MultiCell(60, 0, $data['puesto_institucion_trabajo_pep2'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(150,152.5);
			$pdf->MultiCell(58, 0, $data['pais_institucion_trabajo_pep2'] , 0, 'L', 0, 20, '', '', true);
		}	
			
		if($data['parentesco_pep']=='SI'){
			$pdf->SetXY(174.5,159);
			$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
		}else {
			$pdf->SetXY(192.5,159);
			$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
		}

		if($data['parentesco_pep']=='SI'){
			//Campo radio Button 
			switch ($data['indicar_parentesco']) {
				case "Profesionales":
					$pdf->SetXY(73,163);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Polítos":
					$pdf->SetXY(99.5,163);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Comerciales":
					$pdf->SetXY(128,163);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Negocios":
					$pdf->SetXY(162,163);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					break;
				case "Otro":
					$pdf->SetXY(189,163);
					$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
					$pdf->SetXY(75,166.3);
					$pdf->MultiCell(130, 0,$data['indicar_parentesco'], 0,'L', 0, 20, '', '', true);
					break;
			}

			if($data['indicar_parentesco_condicion']=='NACIONAL'){
				$pdf->SetXY(162,170);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
			}else {
				$pdf->SetXY(187.5,170);
				$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
			}

			$pdf->SetXY(8,177);
			$pdf->MultiCell(59, 0, $data['parentesco_primer_apellido'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(70,177);
			$pdf->MultiCell(78, 0, $data['parentesco_segundo_apellido'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(150,177);
			$pdf->MultiCell(58, 0, $data['parentesco_tercer_apellido'] , 0, 'L', 0, 20, '', '', true);
			
			$pdf->SetXY(8,183.8);
			$pdf->MultiCell(59, 0, $data['parentesco_primer_nombre'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(70,183.8);
			$pdf->MultiCell(53, 0, $data['parentesco_segundo_nombre'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(125,183.8);
			$pdf->MultiCell(42, 0, $data['parentesco_tercer_nombre'] , 0, 'L', 0, 20, '', '', true);
			
			if($data['parentesco_genero']=='MASCULINO'){
				$pdf->SetXY(175.5,183.5);
				$pdf->MultiCell(7, 0,"X", 0,'C', 0, 20, '', '', true);
			}else {
				$pdf->SetXY(195,183.5);
				$pdf->MultiCell(7, 0,"X", 0, 'C', 0, 20, '', '', true);
			}

			$pdf->SetXY(8,191.5);
			$pdf->MultiCell(77, 0, $data['parentesco_institucion_trabaja'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(87,191.5);
			$pdf->MultiCell(61,0, $data['parentesco_institucion_puesto'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(150,191.5);
			$pdf->MultiCell(58, 0, $data['parentesco_institucion_pais'] , 0, 'L', 0, 20, '', '', true);
		}
	}

	ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
