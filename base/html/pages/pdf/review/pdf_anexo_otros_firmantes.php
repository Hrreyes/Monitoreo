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

			$img_file = 'images/AnexoOtrosFirmantes.jpg';				

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
	// $pdf->setCellMargins(1, 0, 1, 1);

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
	 	$listadoIndividual = "SELECT * FROM anexo_otros_firmantes WHERE Formulario_No = '$formNo'";
	    $executeIndividual = mysqli_query($connection, $listadoIndividual);
	    $data = mysqli_fetch_array($executeIndividual);
        /*************************consulta para la tabla anexo_otros_firmantes********************/


		// /*************************consulta para la tabla solicitud_leasing_individual_referencias_personales********************/
		// $listadoReferenciasPersonales = "SELECT * FROM solicitud_leasing_individual_referencias_personales WHERE Formulario_No = '$formNo'";
		// $executeReferenciasPersonales = mysqli_query($connection, $listadoReferenciasPersonales);
		// mysqli_fetch_all($executeReferenciasPersonales);		
		// /*************************consulta para la tabla solicitud_leasing_individual_referencias_personales********************/		

		
		// /*************************consulta para la tabla solicitud_leasing_individual_referencias_familiares********************/
		// $listadoReferenciasFamiliares = "SELECT * FROM solicitud_leasing_individual_referencias_familiares WHERE Formulario_No = '$formNo'";
		// $executeReferenciasFamiliares = mysqli_query($connection, $listadoReferenciasFamiliares);
		// mysqli_fetch_all($executeReferenciasFamiliares);		
		
		// /*************************consulta para la tabla solicitud_leasing_individual_referencias_familiares********************/


	    $pdf->SetFont('helvetica', 'B', 6);
		$pdf->SetTextColor(92,97,99);

		// $pdf->SetXY(182,15.5);
		// $pdf->MultiCell(15, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);	
		
		$pdf->SetXY(57,31.5);
		$pdf->MultiCell(52, 0, $data['lugar'] , 0, 'C', 0, 0, '', '', true);	

		$pdf->SetXY(144,31.5);
		$pdf->MultiCell(53, 0, $data['fecha'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,39);
		$pdf->MultiCell(120, 0, $data['razon_social'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,45);
		$pdf->MultiCell(125, 0, $data['nombre_central_sucursal'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(144,45);
		$pdf->MultiCell(53, 0, $data['codigo_sucursual'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,56);
		$pdf->MultiCell(58, 0, $data['primer_apellido_representante'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,56);
		$pdf->MultiCell(67, 0, $data['segundo_apellido_representante'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(144,56);
		$pdf->MultiCell(53, 0, $data['otro_apellido_representante'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,62);
		$pdf->MultiCell(57, 0, $data['primer_nombre_representante'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,62);
		$pdf->MultiCell(66.5, 0, $data['segundo_nombre_representante'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(144,62);
		$pdf->MultiCell(53, 0, $data['otro_nombre_representante'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,65.5);
		$pdf->MultiCell(120, 0, $data['razon_social2'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,71.5);
		$pdf->MultiCell(178, 0, $data['direccion_sede'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(31,74.5);
		$pdf->MultiCell(25, 0, $data['direccion_zona'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(70,74.5);
		$pdf->MultiCell(39, 0, $data['direccion_departamento'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(120,74.5);
		$pdf->MultiCell(40, 0, $data['direccion_municipio'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(167,74.5);
		$pdf->MultiCell(30, 0, $data['direccion_pais'] , 0, 'C', 0, 0, '', '', true);

	    
		switch($data['relacion_con_titular']){
			case 'Parentesco':
				$pdf->SetXY(79,85);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Laboral':
				$pdf->SetXY(103,85);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Comerciales':
				$pdf->SetXY(128.5,85);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Negocios':
				$pdf->SetXY(155.5,85);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Profesional':
				$pdf->SetXY(180,85);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Mandatario':
				$pdf->SetXY(79,87);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Representante legal':
				$pdf->SetXY(128.5,87);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Accionista':
				$pdf->SetXY(155.5,87);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Otros':
				$pdf->SetXY(79.5,90);
				$pdf->MultiCell(54.5, 0, $data['relacion_con_titular_otro'], 0, 'C', 0, 0, '', '', true);	
			break;
		}

		$pdf->SetXY(19,95.5);
		$pdf->MultiCell(58, 0, $data['otros_firmantes_primer_apellido'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,95.5);
		$pdf->MultiCell(67, 0, $data['otros_firmantes_segundo_apellido'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(144,95.5);
		$pdf->MultiCell(53, 0, $data['otros_firmantes_tercer_apellido'] , 0, 'C', 0, 0, '', '', true);
		
		$pdf->SetXY(19,102);
		$pdf->MultiCell(58, 0, $data['otros_firmantes_primer_nombre'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,102);
		$pdf->MultiCell(67, 0, $data['otros_firmantes_segundo_nombre'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(144,102);
		$pdf->MultiCell(53, 0, $data['otros_firmantes_tercer_nombre'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,108);
		$pdf->MultiCell(58, 0, $data['otros_firmantes_fecha_nacimiento'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,108);
		$pdf->MultiCell(33, 0, $data['otros_firmantes_nacionalidad'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(110,108);
		$pdf->MultiCell(33, 0, $data['otros_firmantes_otra_nacionalidad'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(144,108);
		$pdf->MultiCell(53, 0, $data['otros_firmantes_lugar_nacimiento'] , 0, 'C', 0, 0, '', '', true);

		switch($data['otros_firmantes_condicion_migratoria']){
			case 'Residente temporal':
				$pdf->SetXY(85,111);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Residente permanente':
				$pdf->SetXY(128,111);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Persona en tránsito':
				$pdf->SetXY(176,111);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Turista o visitante':
				$pdf->SetXY(85,113.4);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Permiso de trabajo':
				$pdf->SetXY(128,113.4);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Permiso consular o similar':
				$pdf->SetXY(176,113.4);
				$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			break;
			case 'Otra':
				$pdf->SetXY(80,116);
				$pdf->MultiCell(60, 0, $data['otros_firmantes_condicion_migratoria_otra'], 0, 'C', 0, 0, '', '', true);
			break;
		}
		
		if($data['otros_firmantes_genero']=='MASCULINO'){
			$pdf->SetXY(30,122);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(46,122);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}

		$pdf->SetXY(57,122);
		$pdf->MultiCell(53, 0, $data['otros_firmantes_estado_civil'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(110,122);
		$pdf->MultiCell(87, 0, $data['otros_firmantes_profesion_oficio'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,131);
		$pdf->MultiCell(37, 0, $data['otros_firmantes_tipo_identificacion'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(57,131);
		$pdf->MultiCell(36, 0, $data['otros_firmantes_documento_numero'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(107,131);
		$pdf->MultiCell(20, 0, $data['otros_firmantes_lugar_emision_departamento'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(136,131);
		$pdf->MultiCell(25, 0, $data['otros_firmantes_lugar_emision_municipio'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(165,131);
		$pdf->MultiCell(32, 0, $data['otros_firmantes_lugar_emision_pais'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,137.5);
		$pdf->MultiCell(57.5, 0, $data['otros_firmantes_nit'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,137.5);
		$pdf->MultiCell(57.5, 0, $data['otros_firmantes_nit'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,137.5);
		$pdf->MultiCell(33, 0, $data['otros_firmantes_telefono'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(110.5,137.5);
		$pdf->MultiCell(33, 0, $data['otros_firmantes_celular'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(143.5,137.5);
		$pdf->MultiCell(53, 0, $data['otros_firmantes_email'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(19,144);
		$pdf->MultiCell(178, 0, $data['otros_firmantes_direccion'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(31,147.2);
		$pdf->MultiCell(25, 0, $data['otros_firmantes_direccion_zona'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(70,147.2);
		$pdf->MultiCell(40, 0, $data['otros_firmantes_direccion_departamento'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(121,147.2);
		$pdf->MultiCell(40, 0, $data['otros_firmantes_direccion_municipio'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(166,147.2);
		$pdf->MultiCell(31, 0, $data['otros_firmantes_direccion_pais'], 0, 'C', 0, 0, '', '', true);

		if($data['otros_firmantes_pep']=='SI'){
			$pdf->SetXY(167,150);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(186,150);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}

		if($data['otros_firmantes_parentezco_pep']=='SI'){
			$pdf->SetXY(167,153.5);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(186,153.5);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}

		if($data['otros_firmantes_cercano_pep']=='SI'){
			$pdf->SetXY(167,157.2);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(186,157.2);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}


// /**********************************REFERENCIAS FAMILIARES***************************************/
// 		$LnF=156.5;
// 		foreach($executeReferenciasFamiliares as $key => $familiares){
// 			if($key > 1){
// 				break;
// 			}
// 			$pdf->SetXY(18,$LnF);
// 			$pdf->MultiCell(38, 0, $familiares['referencia_familiar_nombre'], 0, 'L', 0, 20, '', '', true);
// 			$pdf->SetXY(60,$LnF);
// 			if(strlen($familiares['referencia_familiar_direccion'])>60){
// 				$pdf->SetFont('helvetica', '','7');
// 			}
// 			$pdf->MultiCell(80, 0, $familiares['referencia_familiar_direccion'], 0, 'L', 0, 20, '', '', true);
// 			$pdf->SetFont('helvetica', 'B', '8');
// 			$pdf->SetXY(146,$LnF);
// 			$pdf->MultiCell(25, 0, $familiares['referencia_familiar_relacion'], 0, 'C', 0, 20, '', '', true);
// 			$pdf->SetXY(175.5,$LnF);
// 			$pdf->MultiCell(25, 0, $familiares['referencia_familiar_telefono'], 0, 'C', 0, 20, '', '', true);

// 			$LnF=$LnF+6;
// 		}
		

// /**********************************REFERENCIAS FAMILIARES***************************************/



	}

	ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
