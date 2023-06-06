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

			$img_file = 'images/SOLICITUD-DE-LEASING-EMPRESARIAL-new.jpg';		

			$this->Image($img_file, 0, 1, 215.9, 279.4, 'jpg', '', 'C', false, 1200, '', false, false, 0,false, false, false);			
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
	$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
	if(isset($_GET['FormNo']))
	{
	 	$listadoEmpresarial = "SELECT * FROM solicitud_leasing_empresarial WHERE id = '$formNo' order by id $order limit 1";
	    $executeEmpresarial = mysqli_query($connection, $listadoEmpresarial);
	    $data = mysqli_fetch_array($executeEmpresarial);

		$listadoEmpresarialAccionistas = "SELECT * FROM solicitud_leasing_empresarial_composicion_accionaria WHERE Formulario_No = '$formNo'";
		$executeEmpresarialAccionistas = mysqli_query($connection, $listadoEmpresarialAccionistas);
		mysqli_fetch_all($executeEmpresarialAccionistas);

		$listadoEmpresarialReferencias = "SELECT * FROM solicitud_leasing_empresarial_referencias_familiares WHERE Formulario_No = '$formNo'";
		$executeEmpresarialReferencias = mysqli_query($connection, $listadoEmpresarialReferencias);
		mysqli_fetch_all($executeEmpresarialReferencias);




	    //$pdf->SetFont('helvetica', 'B', 8);
		$pdf->SetXY(22,15);
		$pdf->MultiCell(30, 0, $data['fecha'] , 0, 'L', 0, 0, '', '', true);

	    //$pdf->SetFont('helvetica', 'B', 10);
		//$pdf->SetTextColor(92,97,99);
		// $pdf->SetXY(150,19);
		// $pdf->MultiCell(30, 0, 'Formulario No: ' , 0, 'C', 0, 0, '', '', true);
		// $pdf->SetXY(180,19);
		// $pdf->MultiCell(15, 0, $data['Formulario_No'] , 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(30,23.5);
		$pdf->MultiCell(165, 0, $data['razon_social'] , 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(38,30.5);
		$pdf->MultiCell(157, 0, $data['nombre_comercial_empresa'] , 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(27,37);
		$pdf->MultiCell(168, 0, $data['direccion_empresa'] , 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(25,44);
		$pdf->MultiCell(36, 0, $data['telefono_empresa'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(72,44);
		$pdf->MultiCell(32, 0, $data['nit_empresa'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(124,44);
		$pdf->MultiCell(70, 0, $data['pagina_web_empresa'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(40,51.5);
		$pdf->MultiCell(155, 0, $data['direccion_planta_empresa'] , 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(59,58.5);
		$pdf->MultiCell(36, 0, $data['fecha_constitucion_sociedad'] , 0, 'C', 0, 20, '', '', true);

		if ($data['fechaindefinida'] =='NO') {
			$pdf->SetXY(134,58.5);
			$pdf->MultiCell(61, 0, $data['fecha_vencimiento_nombramiento'] , 0, 'C', 0, 20, '', '', true);
		}else{
			$pdf->SetXY(134,58.5);
			$pdf->MultiCell(61, 0, 'Fecha Indefinida' , 0, 'C', 0, 20, '', '', true);
		}

		$pdf->SetXY(40,66.5);
		$pdf->MultiCell(112, 0, $data['representante_legal_nombre'] , 0, 'L', 0, 20, '', '', true);

		$pdf->SetXY(163,66.5);
		$pdf->MultiCell(32, 0, $data['representante_legal_nit'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(36,74);
		$pdf->MultiCell(46, 0, $data['representante_legal_dpi'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(96,74);
		$pdf->MultiCell(99, 0, $data['representante_legal_email'] , 0, 'C', 0, 20, '', '', true);


		$pdf->SetXY(30,81);
		$pdf->MultiCell(55, 0, $data['nombre_cobros'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(99,81);
		$pdf->MultiCell(99, 0, $data['puesto_cobros'] , 0, 'C', 0, 20, '', '', true);


		$pdf->SetXY(27,88);
		$pdf->MultiCell(46, 0, $data['telefono_cobros'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(105,88);
		$pdf->MultiCell(99, 0, $data['correo_cobros'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(32,95);
		$pdf->MultiCell(70, 0, $data['nombre_recibe_facturas'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(15,102);
		$pdf->MultiCell(99, 0, $data['telefono_recibe_facturas'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(105,102);
		$pdf->MultiCell(99, 0, $data['email_recibe_facturas'] , 0, 'C', 0, 20, '', '', true);


		/*****************************ITEMS COMPOSICION ACCIONARIA****************************/
		$Ln=114.5;
		foreach($executeEmpresarialAccionistas as $indice => $accionista){
			if($indice > 5){
				break;
			}
			$pdf->SetXY(15,$Ln);
			$pdf->MultiCell(136, 0, $accionista['nombre_accionistas'] , 0, 'C', 0, 30, '', '', true);

			$pdf->SetXY(154,$Ln);
			$pdf->MultiCell(44, 0, $accionista['porcentaje_acciones'] , 0, 'C', 0, 20, '', '', true);
			
			$Ln=$Ln+6;
		}
		/*****************************ITEMS COMPOSICION ACCIONARIA****************************/


		$pdf->SetXY(30,158);
		$pdf->MultiCell(48, 0, $data['tipo_bien_financiar'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(108,158);
		$pdf->MultiCell(47, 0, $data['tipo_financiamiento'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(172,158);
		$pdf->MultiCell(26, 0, $data['monto_financiar'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(23,166.5);
		if($data['tipo_moneda_otra']){
			$pdf->MultiCell(34, 0, $data['tipo_moneda_otra'] , 0, 'C', 0, 20, '', '', true);	
		}else{
			$pdf->MultiCell(34, 0, $data['tipo_moneda'] , 0, 'C', 0, 20, '', '', true);
		}
		
		$pdf->SetXY(71,166.5);
		$pdf->MultiCell(33, 0, $data['plazo_financiar']  , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(126,166.5);
		$pdf->MultiCell(67, 0, $data['uso_bien'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(5,175);
		$pdf->MultiCell(89, 0, $data['beneficiario_fiscal'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(149,175);
		$pdf->MultiCell(43, 0, $data['nit_facturar'] , 0, 'C', 0, 20, '', '', true);

		/*****************************ITEMS REFERENCIAS COMERCIALES****************************/
		$Line=194.5;
		foreach($executeEmpresarialReferencias as $indice => $referencia) {
			if($indice > 2){
				break;
			}
			$pdf->SetXY(0,$Line);
			$pdf->MultiCell(45, 0, $referencia['referencia_personal_nombre'] , 0, 'C', 0, 20, '', '', true);

			$pdf->SetXY(53,$Line);
			if(strlen($referencia['referencia_personal_direccion'])>60){
				$pdf->SetFont('helvetica', '', '7');
			}
			$pdf->MultiCell(73, 0, $referencia['referencia_personal_direccion'] , 0, 'L', 0, 20, '', '', true);

			$pdf->SetFont('helvetica', 'B', '8');
			$pdf->SetXY(128,$Line);
			$pdf->MultiCell(31, 0, $referencia['referencia_personal_relacion'] , 0, 'C', 0, 20, '', '', true);

			$pdf->SetXY(163,$Line);
			$pdf->MultiCell(30, 0, $referencia['referencia_personal_telefono'] , 0, 'C', 0, 20, '', '', true);

			$Line=$Line+6.5;
		}
		/*****************************ITEMS REFERENCIAS COMERCIALES****************************/

		$pdf->SetXY(20,221);
		$pdf->MultiCell(45, 0, $data['nombre_vendor'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(95,221);
		$pdf->MultiCell(87, 0, $data['direccion_vendor'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(17,229.5);
		$pdf->MultiCell(42, 0, $data['nombre_ejecutivo_vendor'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(86,229.5);
		$pdf->MultiCell(32, 0, $data['telefono_ejecutivo_vendor'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(124,229.5);
		$pdf->MultiCell(64, 0, $data['email_ejecutivo_vendor'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(30,239);
		$pdf->MultiCell(64, 0, $data['ejecutivo_arrend'] , 0, 'C', 0, 20, '', '', true);

		$pdf->SetXY(100,239);
		$pdf->MultiCell(64, 0, 'Ejecutivo Arrend Jr.'.$data['ejecutivo_arrendjr'] , 0, 'C', 0, 20, '', '', true);

	}

	if (ob_get_contents()) ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
