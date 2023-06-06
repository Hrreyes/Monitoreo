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

			$img_file = 'images/SOLICITUD-DE-LEASING-COMERCIANTE_2021.jpg';				

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
	$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
	if(isset($_GET['FormNo']))
	{
		//Datos tabla principal
	 	$listadoIndividual = "SELECT * FROM solicitud_leasing_comercial WHERE Formulario_No = '$id' order by id $order limit 1";
	    $executeIndividual = mysqli_query($connection, $listadoIndividual);
	    $data = mysqli_fetch_array($executeIndividual);

		/*TABLA items referencias Personal*/
		$itemsReferenciasPersonal = "SELECT * FROM solicitud_leasing_comercial_referencias_personales WHERE Formulario_No = '$id'";
		$itemsPersonal=mysqli_query($connection,$itemsReferenciasPersonal);
		mysqli_fetch_array($itemsPersonal);

		/*TABLA items referencias familiares*/
		$itemsRefernciasFamiliares = "SELECT * FROM solicitud_leasing_comercial_referencias_familiares WHERE Formulario_No = '$id'";
		$itemsFamiliares=mysqli_query($connection,$itemsRefernciasFamiliares);
		mysqli_fetch_array($itemsFamiliares);


	    //$pdf->SetFont('helvetica', 'B', 8);
		//X ---> Horinzontal 
		//Y ---> Vertial
		$pdf->SetXY(30,17);
		$pdf->MultiCell(25, 0, $data['fecha'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(155,17);
		$pdf->MultiCell(30, 0, 'Formulario No: ' , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(185,17);
		$pdf->MultiCell(15, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);
		$pdf->SetXY(32,25);
		$pdf->MultiCell(50, 0, $data['arrendatario_nombres'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(101,25);
		$pdf->MultiCell(50, 0, $data['arrendatario_apellidos'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(168,25);
		$pdf->MultiCell(33, 0, $data['arrendatario_telefono'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(37,33.5);
		$pdf->MultiCell(160, 0, $data['arrendatario_direccion'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(51,40.5);
		$pdf->MultiCell(40, 0, $data['arrendatario_identificaionNo'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(110,40.5);
		$pdf->MultiCell(35, 0, $data['arrendatario_nit'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(162,40.5);
		$pdf->MultiCell(35, 0, $data['arrendatario_celular'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(30,50);
		$pdf->MultiCell(150, 0, $data['arrendatario_email'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(38,58);
		$pdf->MultiCell(100, 0, $data['arrendatario_empresa'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(167,58);
		$pdf->MultiCell(40, 0, $data['arrendatario_empresa_telefono'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(34,65.6);
		$pdf->MultiCell(100, 0, $data['arrendatario_direccion_empresa'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(160,65.6);
		$pdf->MultiCell(40, 0, $data['arrendatario_fechaInicio'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(36,73.4);
		$pdf->MultiCell(80, 0, $data['arrendatario_empresa_actividad_economica'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(125,73.4);
		$pdf->MultiCell(80, 0, $data['arrendatario_empresa_paginaweb'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(38,89.4);
		$pdf->MultiCell(40, 0, $data['tipo_bien'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(114,89.4);
		$pdf->MultiCell(35, 0, $data['tipo_financiamiento'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(175,89.4);
		$pdf->MultiCell(23, 0, $data['monto_financiar'] , 0, 'R', 0, 20, '', '', true);

		//Si la moneda es Otras pone la tipo_moneda_otra
		$pdf->SetXY(32,98);
		if($data['tipo_moneda']=='Otras'){
			$pdf->MultiCell(30, 0, $data['tipo_moneda_otra'] , 0, 'L', 0, 20, '', '', true);
		}else{
			$pdf->MultiCell(30, 0, $data['tipo_moneda'] , 0, 'L', 0, 20, '', '', true);
		}

		$pdf->SetXY(78,98);
		$pdf->MultiCell(34, 0, $data['plazo'] , 0, 'C', 0, 20, '', '', true);
		$pdf->SetXY(137,98);
		$pdf->MultiCell(60, 0, $data['uso_bien'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(47,107);
		$pdf->MultiCell(95, 0, $data['beneficiario_fiscal'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(158,107);
		$pdf->MultiCell(40, 0, $data['beneficiario_fiscal_nit'] , 0, 'C', 0, 20, '', '', true);

		//Items referencias personales-----------------------------------
		$nlinea = 126;
		foreach($itemsPersonal as $key => $items){
			
			//Sale del Foreach si es mayor de 3 lineas
			if($key > 2){
				break;
			}

			$pdf->SetXY(19,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencia_personal_nombre'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(65,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencia_personal_direccion'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(113,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencia_personal_relacion'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(160,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencia_personal_telefono'] , 0, 'L', 0, 20, '', '', true);

			$nlinea = $nlinea + 6;
		}

		//Items referencias familiares--------------------------------------
		$nlinea = 156;
		foreach($itemsFamiliares as $key => $items){
			
			//Sale del Foreach si es mayor de 2 lineas
			if($key > 1){
				break;
			}

			$pdf->SetXY(19,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencias_familiares_nombre'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(65,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencias_familiares_direccion'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(113,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencias_familiares_relacion'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(160,$nlinea);
			$pdf->MultiCell(40, 0, $items['referencias_familiares_telefono'] , 0, 'L', 0, 20, '', '', true);

			$nlinea = $nlinea + 6;
		}

		$pdf->SetXY(41,177.5);
		$pdf->MultiCell(43, 0, $data['vendor_nombre'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(116,177.5);
		$pdf->MultiCell(83, 0, $data['vendor_direccion'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(33,186.5);
		$pdf->MultiCell(38, 0, $data['vendor_nombre_ejecutivo'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(90,186.5);
		$pdf->MultiCell(31, 0, $data['vendor_telefono'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(139,186.5);
		$pdf->MultiCell(60, 0, $data['vendor_email_ejecutivo'] , 0, 'L', 0, 20, '', '', true);
		$pdf->SetXY(51,196.5);
		$pdf->MultiCell(58, 0, $data['ejecutivo_arrend'] , 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(150,196.5);
		$pdf->MultiCell(58, 0, $data['ejecutivo_arrendjr'] , 0, 'L', 0, 20, '', '', true);
		
		//Validacones de Radio Botton
		if($data['uso_uber']=='SI'){
			$pdf->SetXY(72,207.5);
			$pdf->MultiCell(30, 0, "SI" , 0, 'L', 0, 20, '', '', true);
		}else{
			$pdf->SetXY(84,207.5);
			$pdf->MultiCell(30, 0, "NO" , 0, 'L', 0, 20, '', '', true);
		}

	}

	if (ob_get_contents()) ob_end_clean();
	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
