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

			$img_file = 'images/SOLICITUD-DE-LEASING-INDIVIDUAL-ai-new.jpg';				

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

	require_once('../../conexion.php');
	require_once('../../funciones.php');

	$formNo = $_GET['FormNo'];
	$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
	if(isset($_GET['FormNo']))
	{
		/*************************consulta para la tabla solicitud_leasing_individual********************/
	 	$listadoIndividual = "SELECT * FROM solicitud_leasing_individual WHERE Formulario_No = '$formNo' order by id $order limit 1 ";
		 //echo $listadoIndividual;
	    $executeIndividual = mysqli_query($connection, $listadoIndividual);
	    $data = mysqli_fetch_array($executeIndividual);
        /*************************consulta para la tabla solicitud_leasing_individual********************/


		/*************************consulta para la tabla solicitud_leasing_individual_referencias_personales********************/
		$listadoReferenciasPersonales = "SELECT * FROM solicitud_leasing_individual_referencias_personales WHERE Formulario_No = '$formNo'";
		$executeReferenciasPersonales = mysqli_query($connection, $listadoReferenciasPersonales);
		mysqli_fetch_all($executeReferenciasPersonales);		
		/*************************consulta para la tabla solicitud_leasing_individual_referencias_personales********************/		

		
		/*************************consulta para la tabla solicitud_leasing_individual_referencias_familiares********************/
		$listadoReferenciasFamiliares = "SELECT * FROM solicitud_leasing_individual_referencias_familiares WHERE Formulario_No = '$formNo'";
		$executeReferenciasFamiliares = mysqli_query($connection, $listadoReferenciasFamiliares);
		mysqli_fetch_all($executeReferenciasFamiliares);		
		
		/*************************consulta para la tabla solicitud_leasing_individual_referencias_familiares********************/


	    //$pdf->SetFont('helvetica', 'B', 8);
		$pdf->SetXY(30,17);
		$pdf->MultiCell(25, 0, $data['fecha'] , 0, 'C', 0, 0, '', '', true);

	    //$pdf->SetFont('helvetica', 'B', 10);
		//$pdf->SetTextColor(92,97,99);
		$pdf->SetXY(155,17);
		$pdf->MultiCell(30, 0, 'Formulario No: ' , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(185,17);
		$pdf->MultiCell(15, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(32,25);
		$pdf->MultiCell(50, 0, $data['arrendatario_nombres'] , 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(101,25);
		$pdf->MultiCell(50, 0, $data['arrendatario_apellidos'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(175,25);
		$pdf->MultiCell(50, 0, $data['arrendatario_telefono'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(38,33.5);
		$pdf->MultiCell(150, 0, $data['arrendatario_direccion'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(60,40.5);
		$pdf->MultiCell(50, 0, $data['arrendatario_identificacion_no'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(115,40.5);
		$pdf->MultiCell(50, 0, $data['arrendatario_nit'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(170,40.5);
		$pdf->MultiCell(50, 0, $data['arrendatario_celular'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(30,50);
		$pdf->MultiCell(50, 0, $data['arrendatario_email'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(130,50);
		$pdf->MultiCell(50, 0, $data['arrendatario_actividad_economica'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(50,58);
		$pdf->MultiCell(100, 0, $data['arrendatario_lugar_trabajo'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(175,58);
		$pdf->MultiCell(50, 0, $data['arrendatario_trabajo_telefono'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(35,66);
		$pdf->MultiCell(80, 0, $data['arrendatario_trabajo_direccion'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(160,66);
		$pdf->MultiCell(50, 0, $data['arrendatario_trabajo_fechaInicio'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(35,73.5);
		$pdf->MultiCell(50, 0, $data['arrendatario_trabajo_puesto'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(130,73.5);
		$pdf->MultiCell(50, 0, $data['arrendatario_trabajo_email'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(48,80.5);
		$pdf->MultiCell(70, 0, $data['nombre_cobros'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(142,80.5);
		$pdf->MultiCell(50, 0, $data['puesto_cobros'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(48,87.5);
		$pdf->MultiCell(50, 0, $data['telefono_cobros'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(142,87.5);
		$pdf->MultiCell(50, 0, $data['correo_cobros'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(60,94.5);
		$pdf->MultiCell(110, 0, $data['nombre_recibe_facturas'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(58,102.5);
		$pdf->MultiCell(50, 0, $data['telefono_recibe_facturas'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(152,102.5);
		$pdf->MultiCell(50, 0, $data['email_recibe_facturas'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(38,116);
		$pdf->MultiCell(52, 0, $data['tipo_bien_financiar'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(120,116);
		$pdf->MultiCell(50, 0, $data['tipo_financiamiento'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(180,116);
		$pdf->MultiCell(50, 0, $data['monto_financiamiento'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(35,125);
		$pdf->MultiCell(50, 0, $data['tipo_moneda'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(80,125);
		$pdf->MultiCell(50, 0, $data['plazo_financiamiento'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(140,125);
		$pdf->MultiCell(50, 0, $data['uso_bien'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(50,134);
		$pdf->MultiCell(80, 0, $data['beneficiario_fiscal'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(160,134);
		$pdf->MultiCell(50, 0, $data['beneficiario_fiscal_nit'], 0, 'L', 0, 20, '', '', true);
		
		
/**********************************REFERENCIAS PERSONALES***************************************/
		$Ln=152.6;
		foreach($executeReferenciasPersonales as $key => $personales){
			if($key > 2){
				break;
			}
			$pdf->SetXY(18,$Ln);
			$pdf->MultiCell(38, 0, $personales['referencia_personal_nombre'], 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(60,$Ln);
			 if(strlen($personales['referencia_personal_direccion'])>60){
			 	$pdf->SetFont('helvetica', '', '7');
			 }
			$pdf->MultiCell(80, 0, $personales['referencia_personal_direccion'], 0, 'L', 0, 20, '', '', true);
			$pdf->SetFont('helvetica', 'B', '8');
			$pdf->SetXY(146,$Ln-0.5);			
		 	$pdf->MultiCell(25, 0, $personales['referencia_personal_relacion'], 0, 'C', 0, 20, '', '', true);
			$pdf->SetXY(175.5,$Ln-0.5);
		 	$pdf->MultiCell(25, 0, $personales['referencia_personal_telefono'], 0, 'C', 0, 20, '', '', true);

			$Ln=$Ln+6.5;
		}
		
/**********************************REFERENCIAS PERSONALES***************************************/		


/**********************************REFERENCIAS FAMILIARES***************************************/
		$LnF=183.5;
		foreach($executeReferenciasFamiliares as $key => $familiares){
			if($key > 1){
				break;
			}
			$pdf->SetXY(18,$LnF);
			$pdf->MultiCell(38, 0, $familiares['referencia_familiar_nombre'], 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(60,$LnF);
			if(strlen($familiares['referencia_familiar_direccion'])>60){
				$pdf->SetFont('helvetica', '','7');
			}
			$pdf->MultiCell(80, 0, $familiares['referencia_familiar_direccion'], 0, 'L', 0, 20, '', '', true);
			$pdf->SetFont('helvetica', 'B', '8');
			$pdf->SetXY(146,$LnF);
			$pdf->MultiCell(25, 0, $familiares['referencia_familiar_relacion'], 0, 'C', 0, 20, '', '', true);
			$pdf->SetXY(175.5,$LnF);
			$pdf->MultiCell(25, 0, $familiares['referencia_familiar_telefono'], 0, 'C', 0, 20, '', '', true);

			$LnF=$LnF+6;
		}
		

/**********************************REFERENCIAS FAMILIARES***************************************/

		$pdf->SetXY(40,205.5);
		$pdf->MultiCell(47, 0, $data['nombre_vendor'], 0, 'L', 0, 20, '', '', true);
		
		$pdf->SetXY(117,205);
		$pdf->MultiCell(47, 0, $data['direccion_vendor'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(31,213.5);
		$pdf->MultiCell(42, 0, $data['nombre_ejecutivo_vendor'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(90,213.5);
		$pdf->MultiCell(33, 0, $data['telefono_ejecutivo_vendor'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(138,213.5);
		$pdf->MultiCell(63, 0, $data['email_ejecutivo_vendor'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(55,223.5);
		$pdf->MultiCell(50, 0, $data['nombre_ejecutivo_arrendsr'], 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(130,223.5);
		$pdf->MultiCell(64, 0, 'Ejecutivo Arrend Jr: '.$data['nombre_ejecutivo_arrendjr'] , 0, 'C', 0, 20, '', '', true);

		
		if($data['uso_uber']=='SI'){
			$pdf->SetXY(73,235.5);
			$pdf->MultiCell(50, 0, $data['uso_uber'], 0, 'L', 0, 20, '', '', true);
		}else{
			$pdf->SetXY(84,235.5);
			$pdf->MultiCell(50, 0, $data['uso_uber'], 0, 'L', 0, 20, '', '', true);
		}

		// $pdf->SetXY(84,230);
		// $sign = 'images/firma.png';
		// $pdf->Image($sign, 78, 240, 60, 20, 'png', '', 'C', false, 100, '', false, false, 0,false, false, false);			
		// $pdf->setPageMark();


	}

	if (ob_get_contents()) ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
