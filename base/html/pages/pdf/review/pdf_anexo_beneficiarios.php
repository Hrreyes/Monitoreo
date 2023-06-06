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

			$img_file = 'images/anexoBeneficiarios.jpg';				

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
	// $pdf->setCellMargins(1, 0, 0, 1);

	// // set color for background
	$pdf->SetFillColor(255, 255, 255);

	// // set color text
	$pdf->SetTextColor(92,97,99);

	require_once('../../conexion.php');
	require_once('../../funciones.php');

	$formNo = $_GET['FormNo'];
	

	
	if(isset($_GET['FormNo']))
	{
		/*************************consulta para la tabla anexo_otros_firmantes********************/
	 	$listadoIndividual = "SELECT * FROM anexo_beneficiarios WHERE Formulario_No = '$formNo'";
	    $executeIndividual = mysqli_query($connection, $listadoIndividual);
	    $data = mysqli_fetch_array($executeIndividual);
        /*************************consulta para la tabla anexo_otros_firmantes********************/
		

		
		/*************************consulta para la tabla solicitud_leasing_individual_referencias_familiares********************/
		$listadoItemsEscritura = "SELECT * FROM anexo_beneficiarios_items_escritura WHERE Formulario_No = '$formNo'";
		$executeItemsEscritura = mysqli_query($connection, $listadoItemsEscritura);
		mysqli_fetch_all($executeItemsEscritura);		
		
		/*************************consulta para la tabla solicitud_leasing_individual_referencias_familiares********************/


	    $pdf->SetFont('helvetica', 'B', 6);
		$pdf->SetTextColor(92,97,99);

		// $pdf->SetXY(182,16.5);
		// $pdf->MultiCell(15, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);	
		
		$pdf->SetXY(56,29.3);
		$pdf->MultiCell(54, 0, $data['lugar'] , 0, 'C', 0, 0, '', '', true);	

		$pdf->SetXY(145,29.3);
		$pdf->MultiCell(55, 0, $data['fecha'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(76,36);
		$pdf->MultiCell(124, 0, $data['razon_social'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(16,42.5);
		$pdf->MultiCell(129, 0, $data['nombre_central_sucursal'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(145,42.5);
		$pdf->MultiCell(55, 0, $data['codigo_agencia'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(16,53);
		$pdf->MultiCell(60, 0, $data['persona_obligada_primer_apellido'] , 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(76,53);
		$pdf->MultiCell(69, 0, $data['persona_obligada_segundo_apellido'] , 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(145,53);
		$pdf->MultiCell(55, 0, $data['persona_obligada_tercer_apellido'] , 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(16,59);
		$pdf->MultiCell(60, 0, $data['persona_obligada_primer_nombre'] , 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(76,59);
		$pdf->MultiCell(69, 0, $data['persona_obligada_segundo_nombre'] , 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(145,59);
		$pdf->MultiCell(55, 0, $data['persona_obligada_tercer_nombre'] , 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(76,62.5);
		$pdf->MultiCell(124, 0, $data['persona_obligada_razon_social'] , 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(16,69);
		$pdf->MultiCell(184, 0, $data['persona_obligada_direccion_sede'] , 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(31,72.5);
		$pdf->MultiCell(25, 0, $data['persona_obligada_zona'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(70,72.5);
		$pdf->MultiCell(40, 0, $data['persona_obligada_departamento'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(120,72.5);
		$pdf->MultiCell(43, 0, $data['persona_obligada_municipio'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(167,72.5);
		$pdf->MultiCell(33, 0, $data['persona_obligada_pais'] , 0, 'C', 0, 0, '', '', true);

		
	    
		switch($data['relacion_solicitante']){
			case 'Parentesco':
				$pdf->SetXY(79,83.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Laboral':
				$pdf->SetXY(103.5,83.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Comerciales':
				$pdf->SetXY(130,83.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Negocios':
				$pdf->SetXY(157.5,83.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Profesional':
				$pdf->SetXY(183,83.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Mandatario':
				//$pdf->SetXY(79,87);
				//$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Representante legal':
				//$pdf->SetXY(128.5,87);
				//$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Accionista':
				//$pdf->SetXY(155.5,87);
				//$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Otros':
				$pdf->SetXY(79.5,87);
				$pdf->MultiCell(54.5, 0, $data['relacion_solicitante_otra'], 0, 'C', 0, 0, '', '', true);	
			break;
		}

		$pdf->SetXY(16,96.5);
		$pdf->MultiCell(60, 0, $data['personal_individual_primer_apellido'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,96.5);
		$pdf->MultiCell(68, 0, $data['personal_individual_segundo_apellido'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(146,96.5);
		$pdf->MultiCell(53.5, 0, $data['personal_individual_tercer_apellido'] , 0, 'C', 0, 0, '', '', true);
		
		$pdf->SetXY(16,103);
		$pdf->MultiCell(60, 0, $data['personal_individual_primer_nombre'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,103);
		$pdf->MultiCell(68, 0, $data['personal_individual_segundo_nombre'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(146,103);
		$pdf->MultiCell(53.5, 0, $data['personal_individual_tercer_nombre'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(16,110);
		$pdf->MultiCell(60, 0, $data['personal_individual_fechaNacimiento'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,110);
		$pdf->MultiCell(33.5, 0, $data['personal_individual_nacionalidad'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(111,110);
		$pdf->MultiCell(34, 0, $data['personal_individual_nacionalidad_otra'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(146,110);
		$pdf->MultiCell(54, 0, $data['personal_individual_lugarNacimiento'] , 0, 'C', 0, 0, '', '', true);

		switch($data['personal_individual_condicion_migratoria']){
			case 'Residente temporal':
				$pdf->SetXY(85,113);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Residente permanente':
				$pdf->SetXY(129,113);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Persona en tránsito':
				$pdf->SetXY(178,113);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Turista o visitante':
				$pdf->SetXY(85,115.5);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Permiso de trabajo':
				$pdf->SetXY(129.5,115.5);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Permiso consular o similar':
				$pdf->SetXY(178,115.5);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Otra':
				//$pdf->SetXY(80,116);
				//$pdf->MultiCell(60, 0, $data['personal_individual_condicion_migratoria_otra'], 0, 'C', 0, 0, '', '', true);
			break;
		}
		
		if($data['persona_individual_genero']=='MASCULINO'){
			$pdf->SetXY(29,121.5);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(45,121.5);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}

		$pdf->SetXY(57,122);
		$pdf->MultiCell(53.5, 0, $data['persona_individual_estadoCivil'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(111,122);
		$pdf->MultiCell(89, 0, $data['persona_individual_profesion'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(16,132);
		$pdf->MultiCell(40, 0, $data['persona_individual_tipoDoc'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(57,132);
		$pdf->MultiCell(36, 0, $data['persona_individual_noIdentificacion'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(107,132);
		$pdf->MultiCell(20, 0, $data['persona_individual_emision_departamento'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(138,132);
		$pdf->MultiCell(25, 0, $data['persona_individual_emision_municipio'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(168,132);
		$pdf->MultiCell(32, 0, $data['persona_individual_emision_pais'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(16,138.5);
		$pdf->MultiCell(60, 0, $data['persona_individual_nit'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,138.5);
		$pdf->MultiCell(33, 0, $data['persona_individual_telefono'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(110.5,138.5);
		$pdf->MultiCell(35, 0, $data['persona_individual_celular'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(146,138.5);
		$pdf->MultiCell(54, 0, $data['persona_individual_email'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(16,144);
		$pdf->MultiCell(184, 0, $data['persona_individual_direccion'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(31,147.2);
		$pdf->MultiCell(25, 0, $data['persona_individual_zona'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(70,147.2);
		$pdf->MultiCell(40, 0, $data['persona_individual_departamento'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(121,147.2);
		$pdf->MultiCell(42, 0, $data['persona_individual_municipio'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(169,147.2);
		$pdf->MultiCell(31, 0, $data['persona_individual_pais'], 0, 'C', 0, 0, '', '', true);

		if($data['expuesto_pep']=='SI'){
			$pdf->SetXY(169,150.5);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(188.5,150.5);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}

		if($data['parentesco_pep']=='SI'){
			$pdf->SetXY(169,162.5);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(188,162.5);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}

		if($data['asociado_pep']=='SI'){
			$pdf->SetXY(169,166);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(188.5,166);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}

		$pdf->SetXY(16,177);
		$pdf->MultiCell(184, 0, $data['persona_juridica_razon_social'], 0,'C', 0, 0, '', '', true);


/**********************************ITEMS ESCRITURA***************************************/
		
		foreach($executeItemsEscritura as $key => $escritura){
			if($key > 0){
				break;
			}
			$pdf->SetXY(32,183);
			$pdf->MultiCell(44, 0, $escritura['escritura_numero'], 0,'C', 0, 0, '', '', true);

			$pdf->SetXY(82,183);
			$pdf->MultiCell(28, 0, $escritura['escritura_fecha'], 0,'C', 0, 0, '', '', true);

			$pdf->SetXY(130,183);
			$pdf->MultiCell(70, 0, $escritura['escritura_notario_autorizo'], 0,'C', 0, 0, '', '', true);			
		}		

/**********************************ITEMS ESCRITURA***************************************/





		$pdf->SetXY(32,189);
		$pdf->MultiCell(24, 0, $data['patente_sociedad_numero'], 0,'C', 0, 0, '', '', true);

		$pdf->SetXY(62,189);
		$pdf->MultiCell(31, 0, $data['patente_sociedad_folio'], 0,'C', 0, 0, '', '', true);

		$pdf->SetXY(98,189);
		$pdf->MultiCell(47, 0, $data['patente_sociedad_libro'], 0,'C', 0, 0, '', '', true);
		
		$pdf->SetXY(160,189);
		$pdf->MultiCell(40, 0, $data['patente_sociedad_expedienteNo'], 0,'C', 0, 0, '', '', true);


		$pdf->SetXY(32,195);
		$pdf->MultiCell(24, 0, $data['patente_empresa_numero'], 0,'C', 0, 0, '', '', true);

		$pdf->SetXY(62,195);
		$pdf->MultiCell(31, 0, $data['patente_empresa_folio'], 0,'C', 0, 0, '', '', true);

		$pdf->SetXY(98,195);
		$pdf->MultiCell(47, 0, $data['patente_empresa_libro'], 0,'C', 0, 0, '', '', true);
		
		$pdf->SetXY(160,195);
		$pdf->MultiCell(40, 0, $data['patente_empresa_expedienteNo'], 0,'C', 0, 0, '', '', true);

		$pdf->SetXY(16,201);
		$pdf->MultiCell(184, 0, $data['sede_social_direccion'], 0,'C', 0, 0, '', '', true);



		$pdf->SetXY(31,204);
		$pdf->MultiCell(25, 0, $data['sede_social_zona'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(70,204);
		$pdf->MultiCell(40, 0, $data['sede_social_departamento'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(121,204);
		$pdf->MultiCell(42, 0, $data['sede_social_departamento'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(169,204);
		$pdf->MultiCell(31, 0, $data['sede_social_pais'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(16,211);
		$pdf->MultiCell(77, 0, $data['sede_social_nit'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(94,211);
		$pdf->MultiCell(51, 0, $data['sede_social_telefono'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(146,211);
		$pdf->MultiCell(54, 0, $data['sede_social_email'], 0, 'C', 0, 0, '', '', true);

	}

	ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
