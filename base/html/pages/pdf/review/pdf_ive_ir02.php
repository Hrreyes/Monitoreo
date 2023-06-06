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

			$img_file = 'images/FormularioIVEIR02.jpg';				

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
		/*************************consulta para la tabla formulario_iveir2********************/
	 	$listadoIndividual = "SELECT * FROM formulario_iveir2 WHERE Formulario_No = '$formNo'";
	    $executeIndividual = mysqli_query($connection, $listadoIndividual);
	    $data = mysqli_fetch_array($executeIndividual);
        /*************************consulta para la tabla formulario_iveir2********************/		

		
		/*************************consulta para la tabla formulario_iveir2_items_escritura********************/
		$listadoItemsEscritura = "SELECT * FROM formulario_iveir2_items_escritura WHERE Formulario_No = '$formNo'";
		$executeItemsEscritura = mysqli_query($connection, $listadoItemsEscritura);
		mysqli_fetch_all($executeItemsEscritura);			
		/*************************consulta para la tabla formulario_iveir2_items_escritura********************/


		/*************************consulta para la tabla formulario_iveir2_items_moneda********************/
		$listadoItemsMoneda = "SELECT * FROM formulario_iveir2_items_moneda WHERE Formulario_No = '$formNo'";
		$executeItemsMoneda = mysqli_query($connection, $listadoItemsMoneda);
		mysqli_fetch_all($executeItemsMoneda);			
		/*************************consulta para la tabla formulario_iveir2_items_moneda********************/
		

	    //$pdf->SetFont('helvetica', 'B', 10);
		$pdf->SetTextColor(92,97,99);

		// $pdf->SetXY(182,12);
		// $pdf->MultiCell(15, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);
		
		$pdf->SetFont('helvetica', 'B', 6);

		$pdf->SetXY(55,26.5);
		$pdf->MultiCell(55, 0, $data['lugar'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(150,26.5);
		$pdf->MultiCell(53, 0, $data['fecha'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(75,33.5);
		$pdf->MultiCell(128, 0, $data['razon_social_nombre_comercial'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(13,38.5);
		$pdf->MultiCell(136, 0, $data['nombre_central_sucursal'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(150,38.5);
		$pdf->MultiCell(52.5, 0, $data['codigo_sucursual'] , 0, 'C', 0, 0, '', '', true);

        
		switch($data['tipo_sociedad']){
			case 'Anónima':
				$pdf->SetXY(68,44.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Asociación ONG':
				$pdf->SetXY(98,44.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Institución Entidad Pública':
				$pdf->SetXY(144,44.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case 'Institución Financiera':
				$pdf->SetXY(185.5,44.4);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;			
			case 'Otra':
                $pdf->SetXY(68,46.8);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
				$pdf->SetXY(87,46.8);
				$pdf->MultiCell(54.5, 0, $data['tipo_sociedad_otros'], 0, 'L', 0, 0, '', '', true);	
			break;
		}
        
        $pdf->SetXY(91,50);
        $pdf->MultiCell(112, 0, $data['razon_social2'], 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(54,52.5);
        $pdf->MultiCell(149, 0, $data['nombre_comercial'], 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(91,55);
        $pdf->MultiCell(112, 0, $data['actividad_economica'], 0, 'C', 0, 0, '', '', true);

        $pdf->SetXY(75,57.5);
        $pdf->MultiCell(36, 0, $data['nit'], 0, 'C', 0, 0, '', '', true);
        $pdf->SetXY(170.5,57.5);
        $pdf->MultiCell(32, 0, $data['pais_constitucion'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(29.5,63.5);
        $pdf->MultiCell(45, 0, $data['escritura_numero'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(81,63.5);
        $pdf->MultiCell(30, 0, $data['escritura_fecha'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(129.5,63.5);
        $pdf->MultiCell(73, 0, $data['escritura_notario'], 0, 'C', 0, 0, '', '', true);


/**********************************ITEMS ESCRITURA***************************************/
		
		foreach($executeItemsEscritura as $key => $escritura){
			if($key > 0){
				break;
			}
			$pdf->SetXY(30,69.5);
			$pdf->MultiCell(44, 0, $escritura['modificaciones_escritura_publica_numero'], 0,'C', 0, 0, '', '', true);

			$pdf->SetXY(81,69.5);
			$pdf->MultiCell(29.5, 0, $escritura['modificaciones_escritura_publica_fecha'], 0,'C', 0, 0, '', '', true);

			$pdf->SetXY(130,69.5);
			$pdf->MultiCell(73, 0, $escritura['modificaciones_escritura_publica_notario_autorizo'], 0,'C', 0, 0, '', '', true);			
		}		

/**********************************ITEMS ESCRITURA***************************************/


		$pdf->SetXY(29,76);
        $pdf->MultiCell(25, 0, $data['patente_sociedad_escritura_numero'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(60,76);
        $pdf->MultiCell(30.5, 0, $data['patente_sociedad_escritura_folio'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(96,76);
        $pdf->MultiCell(53.5, 0, $data['patente_sociedad_escritura_libro'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(163,76);
        $pdf->MultiCell(39.5, 0, $data['patente_sociedad_sescritura_numero_expediente'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(29,82);
        $pdf->MultiCell(25, 0, $data['patente_empresa_escritura_numero'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(60,82);
        $pdf->MultiCell(30.5, 0, $data['patente_empresa_escritura_folio'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(96,82);
        $pdf->MultiCell(53.5, 0, $data['patente_empresa_escritura_libro'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(163,82);
        $pdf->MultiCell(39.5, 0, $data['patente_empresa_escritura_numero_expediente'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(29.5,88.5);
        $pdf->MultiCell(45, 0, $data['sinoesempre_numero'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(80.5,88.5);
        $pdf->MultiCell(30, 0, $data['sinoesempre_fecha'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(119.5,88.5);
        $pdf->MultiCell(83, 0, $data['sinoesempre_autoriza'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(40,95);
        $pdf->MultiCell(50.5, 0, $data['registro_nombre'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(99,95);
        $pdf->MultiCell(30.5, 0, $data['registro_numero'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(135,95);
        $pdf->MultiCell(35, 0, $data['registro_folio'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(176,95);
        $pdf->MultiCell(26.5, 0, $data['registro_libro'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(13,101);
        $pdf->MultiCell(189.5, 0, $data['direccion_comple'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(27,104);
        $pdf->MultiCell(27, 0, $data['direccion_zona'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(67,104);
        $pdf->MultiCell(43.5, 0, $data['direccion_depar'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(135,104);
        $pdf->MultiCell(35, 0, $data['direccion_muni'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(176,104);
        $pdf->MultiCell(26.5, 0, $data['direccion_pais'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(13,109.5);
        $pdf->MultiCell(77, 0, $data['telefono'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(91,109.5);
        $pdf->MultiCell(58.5, 0, $data['pagina_web'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(150.5,109.5);
        $pdf->MultiCell(52, 0, $data['correo_electro'], 0, 'C', 0, 0, '', '', true);


		if($data['con_pro_estado']=='SI'){
				$pdf->SetXY(177.5,112);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			}else{
				$pdf->SetXY(195,112);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
			}

			

		$pdf->SetXY(13,129);
		$pdf->MultiCell(117, 0, $data['refer_comer_nomb'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(130,129);
		$pdf->MultiCell(40, 0, $data['refer_comer_telfo'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(170.5,129);
		$pdf->MultiCell(32, 0, $data['refer_comer_celu'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(13,132);
		$pdf->MultiCell(117, 0, $data['refer_comer_nomb2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(130,132);
		$pdf->MultiCell(40, 0, $data['refer_comer_telfo2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(170.5,132);
		$pdf->MultiCell(32, 0, $data['refer_comer_celu2'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(13,137);
		$pdf->MultiCell(117, 0, $data['refer_finan_nomb'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(130,137);
		$pdf->MultiCell(40, 0, $data['refer_finan_telfo'], 0, 'C', 0, 0, '', '', true);

		if(strlen($data['refer_finan_tippro'])>15){
			$pdf->SetFont('helvetica', 'B', 4);
			$pdf->SetXY(170.5,138);
			$pdf->MultiCell(32, 0, $data['refer_finan_tippro'], 0, 'C', 0, 0, '', '', true);
		}else{
			$pdf->SetFont('helvetica', 'B', 6);
			$pdf->SetXY(170.5,137.5);
			$pdf->MultiCell(32, 0, $data['refer_finan_tippro'], 0, 'C', 0, 0, '', '', true);
		}
		

		$pdf->SetFont('helvetica', 'B', 6);
		$pdf->SetXY(13,140);
		$pdf->MultiCell(117, 0, $data['refer_finan_nomb2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(130,140);
		$pdf->MultiCell(40, 0, $data['refer_finan_telfo2'], 0, 'C', 0, 0, '', '', true);

		if(strlen($data['refer_finan_tippro2'])>15){
			$pdf->SetFont('helvetica', 'B', 4);
			$pdf->SetXY(170.5,140.5);
			$pdf->MultiCell(32, 0, $data['refer_finan_tippro2'], 0, 'C', 0, 0, '', '', true);
		}else{
			$pdf->SetFont('helvetica', 'B', 6);
			$pdf->SetXY(170.5,140);
			$pdf->MultiCell(32, 0, $data['refer_finan_tippro2'], 0, 'C', 0, 0, '', '', true);
		}
		

		$pdf->SetFont('helvetica', 'B', 6);
		$pdf->SetXY(13,152);
		$pdf->MultiCell(136.5, 0, $data['consejoadmin_nombre'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetFont('helvetica', 'B', 5);
		$pdf->SetXY(150.5,152.8);
		$pdf->MultiCell(52, 0, $data['consejoadmin_cargo'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetFont('helvetica', 'B', 6);
		$pdf->SetXY(13,155);
		$pdf->MultiCell(136.5, 0, $data['consejoadmin_nombre2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetFont('helvetica', 'B', 5);
		$pdf->SetXY(150.5,156);
		$pdf->MultiCell(52, 0, $data['consejoadmin_cargo2'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetFont('helvetica', 'B', 6);
		$pdf->SetXY(13,158);
		$pdf->MultiCell(136.5, 0, $data['consejoadmin_nombre3'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetFont('helvetica', 'B', 5);
		$pdf->SetXY(150.5,159);
		$pdf->MultiCell(52, 0, $data['consejoadmin_cargo3'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetFont('helvetica', 'B', 6);
		if($data['cuenta_con_accionistas']=='SI'){
			$pdf->SetXY(166.5,161);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(191,161);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}


		if($data['cuenta_con_accionistas_extranjero']=='SI'){
			$pdf->SetXY(166.5,163.7);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(191,163.7);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		}


		$pdf->SetXY(13,176.5);
		$pdf->MultiCell(61, 0, $data['nombre_pais_proveedor'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(75,176.5);
		$pdf->MultiCell(35.5, 0, $data['ubicacion_pais_proveedor'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(111.5,176.5);
		$pdf->MultiCell(58.5, 0, $data['nompais_cliente'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(170.5,176.5);
		$pdf->MultiCell(32, 0, $data['ubicacionpais_cliente'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(13,179.5);
		$pdf->MultiCell(61, 0, $data['nompais_proveedor2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(75,179.5);
		$pdf->MultiCell(35.5, 0, $data['ubicacionpais_proveedor2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(111.5,179.5);
		$pdf->MultiCell(58.5, 0, $data['nompais_cliente2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(170.5,179.5);
		$pdf->MultiCell(32, 0, $data['ubicacionpais_cliente2'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(13,182.5);
		$pdf->MultiCell(61, 0, $data['nompais_proveedor3'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(75,182.5);
		$pdf->MultiCell(35.5, 0, $data['ubicacionpais_proveedor3'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(111.5,182.5);
		$pdf->MultiCell(58.5, 0, $data['nompais_cliente3'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(170.5,182.5);
		$pdf->MultiCell(32, 0, $data['ubicacionpais_cliente3'], 0, 'C', 0, 0, '', '', true);


		$pdf->SetXY(13,193);
		$pdf->MultiCell(190, 0, $data['actividad_economica_negocio'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(75,196);
		$pdf->MultiCell(35.5, 0, $data['numero_subsidiaria'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(184,196);
		$pdf->MultiCell(18.5, 0, $data['numero_empleados'], 0, 'C', 0, 0, '', '', true);


/**********************************ITEMS MONEDAS***************************************/		
		foreach($executeItemsMoneda as $key => $moneda){
			if($moneda['tipo_moneda_ingreso']=='Quetzales'){
				$pdf->SetXY(103.5,199.2);
				$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
			}			
			if($moneda['tipo_moneda_ingreso']=='USD Dólares'){
				$pdf->SetXY(126.5,199.2);
				$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
			}
			if($moneda['tipo_moneda_ingreso']=='Euros'){
				$pdf->SetXY(142.5,199.2);
				$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);		
			}
			if($moneda['tipo_moneda_ingreso']=='Otras'){
				$pdf->SetXY(170,199.2);
				$pdf->MultiCell(33, 0, $data['tipo_moneda_ingreso_otra'], 0,'C', 0, 0, '', '', true);
			}



			if($moneda['tipo_moneda_egreso']=='Quetzales'){
				$pdf->SetXY(103.5,202.5);
				$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
			}			
			if($moneda['tipo_moneda_egreso']=='USD Dólares'){
				$pdf->SetXY(126.5,202.5);
				$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
			}
			if($moneda['tipo_moneda_egreso']=='Euros'){
				$pdf->SetXY(142.5,202.5);
				$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);		
			}
			if($moneda['tipo_moneda_egreso']=='Otras'){
				$pdf->SetXY(170,202.5);
				$pdf->MultiCell(33, 0, $data['tipo_moneda_egreso_otra'], 0,'C', 0, 0, '', '', true);
			}
			

			
		}
/**********************************ITEMS MONEDAS***************************************/





		switch($data['rangoingresos_qtz']){
			case '0.01 - 25,000.00':
				$pdf->SetXY(54.5,213);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '25,000.01 - 100,000.00':
				$pdf->SetXY(54.5,216);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '100,000.01 - 400,000.00':
				$pdf->SetXY(54.5,218.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '400,000.01 - 700,000.00':
				$pdf->SetXY(54.5,221.25);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '700,000.01 - 1,0000,000.00':
				$pdf->SetXY(54.5,224.15);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '1,000,000.01 y Mayor':
				$pdf->SetXY(54.5,228);
				$pdf->MultiCell(36, 0, $data['rangoingresos_qtz_mayor'], 0, 'C', 0, 0, '', '', true);	
			break;			
		}


		switch($data['rangoegreso_qtz']){
			case '0.01 - 25,000.00':
				$pdf->SetXY(150,213);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '25,000.01 - 100,000.00':
				$pdf->SetXY(150,215.65);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '100,000.01 - 400,000.00':
				$pdf->SetXY(150,218.5);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '400,000.01 - 700,000.00':
				$pdf->SetXY(150,221.25);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '700,000.01 - 1,0000,000.00':
				$pdf->SetXY(150,224.15);
				$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
			break;
			case '1,000,000.01 y Mayor':
				$pdf->SetXY(150,228);
				$pdf->MultiCell(33, 0, $data['rangoegreso_qtz_mayor'], 0, 'C', 0, 0, '', '', true);	
			break;			
		}



		
	$pdf->AddPage();
	$img_file = 'images/FormularioIVEIR02_2.jpg';	
	$pdf->Image($img_file, 0, 0, 215.9, 279.4, 'jpg', '', 'C', false, 1200, '', false, false, 0,false, false, false);
// set the starting point for the page content permite establecer la imagen como si fuera la primera	
	$pdf->setPageMark();

	// $pdf->SetFont('helvetica', 'B', 10);
	// $pdf->SetXY(182,12);
	// $pdf->MultiCell(15, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);	

	$pdf->SetFont('helvetica', 'B', 6);

	$pdf->SetXY(13,31.3);
	$pdf->MultiCell(61.5, 0, $data['representa_apellido'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(75,31.3);
	$pdf->MultiCell(74.5, 0, $data['representa_apellido2'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(150,31.3);
	$pdf->MultiCell(52.5, 0, $data['representa_apellido3'], 0, 'C', 0, 0, '', '', true);


	$pdf->SetXY(13,36.5);
	$pdf->MultiCell(61.5, 0, $data['representa_nombre'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(75,36.5);
	$pdf->MultiCell(74.5, 0, $data['representa_nombre2'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(150,36.5);
	$pdf->MultiCell(52.5, 0, $data['representa_nombre3'], 0, 'C', 0, 0, '', '', true);


	$pdf->SetXY(13,41.9);
	$pdf->MultiCell(61.5, 0, $data['representa_fechanac'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(75,41.9);
	$pdf->MultiCell(35.5, 0, $data['representa_nacionali'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(111,41.9);
	$pdf->MultiCell(38.5, 0, $data['representa_otranacio'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(150,41.9);
	$pdf->MultiCell(52.3, 0, $data['representa_lugarnaci'], 0, 'C', 0, 0, '', '', true);


	switch($data['condicion_residente']){
		case 'Residente temporal':
			$pdf->SetXY(80.3,44.3);
			$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		break;
		case 'Residente permanente':
			$pdf->SetXY(131.8,44.7);
			$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		break;
		case 'Persona en tránsito':
			$pdf->SetXY(183,44.6);
			$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		break;
		case 'Turista o visitante':
			$pdf->SetXY(80.3,46.8);
			$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		break;
		case 'Permiso de trabajo':
			$pdf->SetXY(131.5,47);
			$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		break;
		case 'Permiso consular o similar':
			$pdf->SetXY(183,47);
			$pdf->MultiCell(5.5, 0, 'X', 0, 'C', 0, 0, '', '', true);
		break;
		case 'Otra':
			$pdf->SetXY(75,49.5);
			$pdf->MultiCell(60, 0, $data['condicion_residente'], 0, 'C', 0, 0, '', '', true);
		break;
	}


		
	if($data['genero']=='MASCULINO'){
		$pdf->SetXY(26,55.2);
		$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
	}else{
		$pdf->SetXY(42,55.2);
		$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);
	}

	$pdf->SetXY(57,55.2);
	$pdf->MultiCell(53.5, 0, $data['estado_civil'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(111,55.2);
	$pdf->MultiCell(92, 0, $data['profesion_oficio'], 0, 'C', 0, 0, '', '', true);

	$pdf->SetXY(13,64);
	$pdf->MultiCell(41, 0, $data['tipodocumento_identi'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(55,64);
	$pdf->MultiCell(35.5, 0, $data['tipodocumento_numero'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(104,64);
	$pdf->MultiCell(25.5, 0, $data['emision_departamento'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(138,64);
	$pdf->MultiCell(32, 0, $data['emision_municipio'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(175,64);
	$pdf->MultiCell(28, 0, $data['emision_pais'], 0, 'C', 0, 0, '', '', true);

	$pdf->SetXY(13,70);
	$pdf->MultiCell(61, 0, $data['numero_identificacion_tributaria'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(75,70);
	$pdf->MultiCell(35.5, 0, $data['telefono_respresentante_legal'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(111,70);
	$pdf->MultiCell(38.5, 0, $data['celular_representante_legal'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(150,70);
	$pdf->MultiCell(52.5, 0, $data['correo_electronico_representante_legal'], 0, 'C', 0, 0, '', '', true);

	$pdf->SetXY(13,75);
	$pdf->MultiCell(189.3, 0, $data['direccion_particular'], 0, 'C', 0, 0, '', '', true);

	$pdf->SetXY(29,78.5);
	$pdf->MultiCell(25, 0, $data['direc_zona2'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(70,78.5);
	$pdf->MultiCell(40.5, 0, $data['direc_departa2'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(121,78.5);
	$pdf->MultiCell(49, 0, $data['direc_municipio'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(175,78.5);
	$pdf->MultiCell(27.5, 0, $data['direc_pais'], 0, 'C', 0, 0, '', '', true);

	$pdf->SetXY(93,82);
	$pdf->MultiCell(36.5, 0, $data['actan_numero_inscrip'], 0, 'C', 0, 0, '', '', true);

	$pdf->SetXY(141,82);
	$pdf->MultiCell(29, 0, $data['actan_fechaini'], 0, 'C', 0, 0, '', '', true);
	
	if($data['fecha_indefinida']=='NO'){
		$pdf->SetXY(180,82);
		$pdf->MultiCell(22.5, 0, $data['actan_fechafin'], 0, 'C', 0, 0, '', '', true);
	}else{
		$pdf->SetXY(180,82);
		$pdf->MultiCell(22.5, 0,"Fecha Indefinida", 0, 'C', 0, 0, '', '', true);
	}

	$pdf->SetXY(41,85.5);
	$pdf->MultiCell(88.5, 0, $data['notario_autorizo'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(156,85.5);
	$pdf->MultiCell(47, 0, $data['cargo_nombro'], 0, 'C', 0, 0, '', '', true);



	if($data['actua_mandatario']=='SI'){
		$pdf->SetXY(163,88.5);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}else{
		$pdf->SetXY(190.5,88.5);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}


	$pdf->SetXY(39,92.5);
	$pdf->MultiCell(52, 0, $data['nombre_registro'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(97,92.5);
	$pdf->MultiCell(32.5, 0, $data['actua_numero'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(135,92.5);
	$pdf->MultiCell(35, 0, $data['actua_folio'], 0, 'C', 0, 0, '', '', true);
	$pdf->SetXY(175,92.5);
	$pdf->MultiCell(27.5, 0, $data['actua_libro'], 0, 'C', 0, 0, '', '', true);


	if($data['paraefec_actuaunica']=='SI'){
		$pdf->SetXY(163,96.2);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}else{
		$pdf->SetXY(190.5,96);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}


	//Muestra o Oculta los datos
	if($data['paraefec_actuaunica']=='NO') {
		
		$pdf->SetXY(13,105.3);
		$pdf->MultiCell(61.3, 0, $data['actua2_apellido'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(75,105.3);
		$pdf->MultiCell(74.5, 0, $data['actua2_apellido2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(150,105.3);
		$pdf->MultiCell(52.5, 0, $data['actua2_apellido3'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(13,110.5);
		$pdf->MultiCell(61.3, 0, $data['actua2_nombre'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(75,110.5);
		$pdf->MultiCell(54.5, 0, $data['actua2_nombre2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(130,110.5);
		$pdf->MultiCell(40, 0, $data['actua2_nombre3'], 0, 'C', 0, 0, '', '', true);


		if($data['actua2_genero']=='MASCULINO'){
			$pdf->SetXY(179.5,110.5);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}else{
			$pdf->SetXY(195,110.2);
			$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
		}


		$pdf->SetXY(111,113);
		$pdf->MultiCell(91.5, 0, $data['razon_social3'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(13,121);
		$pdf->MultiCell(97.5, 0, $data['infogene_fechanac2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(111,121);
		$pdf->MultiCell(59, 0, $data['infogene_pais'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(170.5,121);
		$pdf->MultiCell(32, 0, $data['infogene_otranacio'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(13,126.5);
		$pdf->MultiCell(61.5, 0, $data['infogene_identifi'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(75,126.5);
		$pdf->MultiCell(35.5, 0, $data['infogene_idennumero'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(111,126.5);
		$pdf->MultiCell(59, 0, $data['infogene_lugaremisi'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(175,126.5);
		$pdf->MultiCell(27.5, 0, $data['infogene_pais2'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(13,131.8);
		$pdf->MultiCell(77.5, 0, $data['infogene_nit2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(91,131.8);
		$pdf->MultiCell(58.5, 0, $data['infogene_telefono2'], 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(150,131.8);
		$pdf->MultiCell(52.5, 0, $data['infogene_celular2'], 0, 'C', 0, 0, '', '', true);
	}

	if($data['represen_espep']=='SI'){
		$pdf->SetXY(167,134.4);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}else{
		$pdf->SetXY(190.5,134.2);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}


	switch($data['origen_riquezapep']){
		case 'Herencia':
			$pdf->SetXY(32,142);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
		break;
		case 'Negocio Propio':
			$pdf->SetXY(54,142);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
		break;
		case 'Servicios profesionales':
			$pdf->SetXY(83,142);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
		break;
		case 'Préstamos bancarios':
			$pdf->SetXY(113,142);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
		break;
		case 'Trabajos anteriores':
			$pdf->SetXY(144,142);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
		break;	
		case 'Trabajo actual':
			$pdf->SetXY(168,142);
			$pdf->MultiCell(5, 0, 'X', 0, 'C', 0, 0, '', '', true);	
		break;				
		case 'Otros (especifique)':
			$pdf->SetXY(54,144.5);
			$pdf->MultiCell(80, 0, $data['origen_riqueza_pep_otro'], 0, 'C', 0, 0, '', '', true);			
		break;
	}


	
	if($data['represen_parentezcopep']=='SI'){
		$pdf->SetXY(167,147.2);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}else{
		$pdf->SetXY(191,147.7);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}


	if($data['represen_asociadopep']=='SI'){
		$pdf->SetXY(167.2,150.2);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}else{
		$pdf->SetXY(191,150.7);
		$pdf->MultiCell(5, 0, 'X', 0,'C', 0, 0, '', '', true);
	}


	
	foreach($executeItemsEscritura as $key => $escritura){
		if($key > 1){
			$pdf->AddPage();
			$img_file = 'images/FormularioIVEIR02_3.jpg';	
			$pdf->Image($img_file, 0, 0, 215.9, 279.4, 'jpg', '', 'C', false, 1200, '', false, false, 0,false, false, false);
// set the starting point for the page content permite establecer la imagen como si fuera la primera	
			$pdf->setPageMark();

			$pdf->SetFont('helvetica', 'B', 10);
			$pdf->SetXY(19,12);
			$pdf->MultiCell(180, 0, 'Modificaciones a la escritura pública de constitución de sociedad o entidad', 1, 'C', 0, 0, '', '', true);	

			$brLine=18;
			foreach($executeItemsEscritura as $key => $escritura){
				$pdf->SetFont('helvetica', 'B', 8);
				$pdf->SetXY(19,$brLine);
				$pdf->MultiCell(45, 0, 'Número:', 1, 'L', 0, 0, '', '', true);	
				$pdf->SetXY(19,$brLine);
				$pdf->MultiCell(45, 0, $escritura['modificaciones_escritura_publica_numero'], 0, 'C', 0, 0, '', '', true);	


				$pdf->SetXY(64,$brLine);
				$pdf->MultiCell(45, 0, 'Fecha:', 1, 'L', 0, 0, '', '', true);	
				$pdf->SetXY(64,$brLine);
				$pdf->MultiCell(45, 0, $escritura['modificaciones_escritura_publica_fecha'], 0, 'C', 0, 0, '', '', true);	

				$pdf->SetXY(109,$brLine);
				$pdf->MultiCell(90, 0, 'Notario que autorizó:', 1, 'L', 0, 0, '', '', true);
				$pdf->SetFont('helvetica', 'B', 6);
				$pdf->SetXY(139,$brLine+1);
				$pdf->MultiCell(60, 0, $escritura['modificaciones_escritura_publica_notario_autorizo'], 0, 'C', 0, 0, '', '', true);
				$brLine=$brLine+3.8;
			}
		}

	
		
	}	

		
	 



	}

	ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
