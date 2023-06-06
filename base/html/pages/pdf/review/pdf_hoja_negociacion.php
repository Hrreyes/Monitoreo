<?php
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('../../conexion.php');
require_once('../../funciones.php');
if (isset($_GET['id'])) {
	// Extend the TCPDF class to create custom Header and Footer
	class MYPDF extends TCPDF {
	    //Page header
	    public function Header() {
	        // Logo
	        //$image_file = K_PATH_IMAGES.'logo.jpg';
	        $image_file = 'images/logo-seguros.png';
	        $this->Image($image_file, 16, 6, 55, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        // Set font
	        $this->SetFont('helvetica', 'B', 10);
	        // Title
	        //$this->SetXY(164,12);
	        //$this->Cell(0, 5, "No.".date('Y')." - 00".$_GET['id'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
	    }

		public function Footer() {
			//Logo
			//$image_file = K_PATH_IMAGES."footer.PNG"; 
			$image_file = 'images/footer.PNG';
			$this->Image($image_file, 0, 283, 210, "", "PNG", "", "T", false, 300, '', false, false, 0, false, false, false);
			// Set font 
			$this->SetFont("dejavusans", "", 9);
			// Page number
			// Logo 
		}
	}

	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Arrend');
	$pdf->SetTitle('Formulario');
	$pdf->SetSubject('Check List Seguros');
	$pdf->SetKeywords('Formulario, PDF');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	//$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
	//$pdf->setPrintFooter(false);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
		require_once(dirname(__FILE__).'/lang/spa.php');
		$pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	// set default font subsetting mode
	$pdf->setFontSubsetting(true);

	// Set font
	// dejavusans is a UTF-8 Unicode font, if you only need to
	// print standard ASCII chars, you can use core fonts like
	// helvetica or times to reduce file size.
	$pdf->SetFont('dejavusans', '', 14, '', true);
	//$pdf->SetLeftMargin(15);


	// Add a page
	// This method has several options, check the source code documentation for more information.
	$pdf->AddPage();

	//Ancho de la hoja 630
	//Rojo: #ff3a1e
	//Gris: #566464

	// set text shadow effect
	$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		$id= $_GET['id'];

		$exp_data = get_hoja_negociacion($id);
						
		while($data= mysqli_fetch_assoc($exp_data)){	
			$Formulario_No = $data['Formulario_No'];
			$cliente_fecha = $data['created_at'];
			$cliente_nombre = $data['cliente_nombre'];
			$contacto_nombre = $data['contacto_nombre'];
			$contacto_telefono = $data['contacto_telefono'];
			$cliente_direccion = $data['cliente_direccion'];
			$cliente_tipo = $data['cliente_tipo'];
			$tipo_financiamiento = $data['tipo_financiamiento'];
			$moneda = $data['moneda'];
			$moneda_otros = $data['moneda_otros'];
			$descripcion_bien = $data['descripcion_bien'];
			$plazo = $data['plazo'];
			$renta_inicial_porcentaje = $data['renta_inicial_porcentaje'];
			$pagadero_en = $data['pagadero_en'];
			$gastos_iniciales_porcentaje = $data['gastos_iniciales_porcentaje'];
			$pagadero2_en = $data['pagadero2_en'];
			$opcion_compra_porcentaje = $data['opcion_compra_porcentaje'];
			$tir_porcenaje = $data['tir_porcenaje'];
			$condiciones_seguro = $data['condiciones_seguro'];
			$condiciones_seguro_mejocoti = $data['condiciones_seguro_mejocoti'];
			$vendedor = $data['vendedor'];
			$vendedor_ejecutivo = $data['vendedor_ejecutivo'];
			$telefono_ejecutivo = $data['telefono_ejecutivo'];
			$asesor_financiero = $data['asesor_financiero'];
			break;
		}

		$html = '
			<h4 style="text-align: center; color: #566464;">HOJA DE NEGOCIACION</h4>
			<table border="0" cellpadding="5" color="#566464" style="font-size:11px; text-align: left;">
				<tbody>
					<tr>
						<td width="120">No. Expediente:</td>
						<td width="110" style="text-align: right; border-bottom: 1px solid #566464;">'. $Formulario_No .'</td>
						<td width="188">&nbsp;</td>
						<td width="60">Fecha:</td>
						<td width="160" style="text-align: center; border-bottom: 1px solid #566464;">'. $cliente_fecha .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					<tr>
						<td width="auto"><h4 style="text-align: left;">DATOS DEL CLIENTES</h4></td>
					</tr>
					<tr>
						<td width="70">Nombres Cliente:</td>
						<td width="250" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $cliente_nombre .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Contacto:</td>
						<td width="250" style="text-align: center; border-bottom: 1px solid #566464;">'. $contacto_nombre .'</td>
					</tr>

					<tr>
						<td width="100">Teléfono fijo:</td>
						<td width="150" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $contacto_telefono .'</td>
						<td width="50">&nbsp;</td>
						<td width="150">Direccion de domicilio:</td>
						<td width="250" style="text-align: center; border-bottom: 1px solid #566464;">'. $cliente_direccion .'</td>
					</tr>

					<tr>
						<td width="100">Tipo de Cliente:</td>
						<td width="180" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $cliente_tipo .'</td>
						<td width="50">&nbsp;</td>
						<td width="100">Tipo de financiamiento:</td>
						<td width="200" style="text-align: center; border-bottom: 1px solid #566464;">'. $tipo_financiamiento .'</td>
					</tr>

					<tr>
						<td width="70">Moneda:</td>
						<td width="100" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $moneda .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Bien:</td>
						<td width="350" style="text-align: center; border-bottom: 1px solid #566464;">'. $descripcion_bien .'</td>
					</tr>

					<tr>
						<td width="70">Plazo:</td>
						<td width="200" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $plazo .'</td>
						<td width="50">&nbsp;</td>
						<td width="100">Renta Inicial:</td>
						<td width="200" style="text-align: center; border-bottom: 1px solid #566464;">'. $renta_inicial_porcentaje .'</td>
					</tr>

					<tr>
						<td width="90">Pagadero En:</td>
						<td width="200" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $pagadero_en .'</td>
						<td width="50">&nbsp;</td>
						<td width="100">Gastos Iniciales:</td>
						<td width="200" style="text-align: center; border-bottom: 1px solid #566464;">'. $gastos_iniciales_porcentaje .'</td>
					</tr>

					<tr>
						<td width="90">Pagadero En:</td>
						<td width="200" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $pagadero2_en .'</td>
						<td width="50">&nbsp;</td>
						<td width="120">Opción de Compra:</td>
						<td width="200" style="text-align: center; border-bottom: 1px solid #566464;">'. $opcion_compra_porcentaje .'</td>
					</tr>

					<tr>
						<td width="70">TIR:</td>
						<td width="200" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $tir_porcenaje .'</td>
						<td width="50">&nbsp;</td>
					</tr>

					<tr>
						<td width="70">Condición:</td>
						<td width="250" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $condiciones_seguro_mejocoti .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Vendedor:</td>
						<td width="250" style="text-align: center; border-bottom: 1px solid #566464;">'. $vendedor .'</td>
					</tr>

					<tr>
						<td width="70">Ejecutivo Vendedor:</td>
						<td width="250" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $vendedor_ejecutivo .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Teléfono:</td>
						<td width="250" style="text-align: center; border-bottom: 1px solid #566464;">'. $telefono_ejecutivo .'</td>
					</tr>

					<tr>
						<td width="200">Nombre ejecutivo Arrend: Sr.</td>
						<td width="250" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $asesor_financiero .'</td>
						
					</tr>
				</tbody>
			</table>';
	}
	
	$pdf->writeHTML($html, true, 0, true, 0);

	/*Seccion de firmas*/
	/*$pdf->SetFont('helvetica', 'B', 9);
	$pdf->SetTextColor(92,97,99);	
	
	$pdf->SetXY(15,235);	
	$pdf->MultiCell(48, 1,"Asesor responsable", 0, 'C', 0, 0, '', '', true);
	$pdf->Line(15, 233, 63, 233, 0);	
	
	$pdf->SetXY(85,235);
	$pdf->MultiCell(48, 1,"Revisado por Riesgos", 0, 'C', 0, 0, '', '', true);
	$pdf->Line(85, 233, 133, 233, 0);
	
	$pdf->SetXY(147,235);
	$pdf->MultiCell(48, 1,"Revisado por Seguros", 0, 'C', 0, 0, '', '', true);
	$pdf->Line(147, 233, 195, 233, 0);
	
	$pdf->SetXY(147,255);
	$pdf->MultiCell(48, 1,"No. Póliza", 0, 'C', 0, 0, '', '', true);
	$pdf->Line(147, 254, 195, 254, 0);*/
	/*Seccion de firmas*/

	/* Limpiamos la salida del búfer y lo desactivamos */
	  ob_end_clean();
	// ---------------------------------------------------------

	// Close and output PDF document
	// This method has several options, check the source code documentation for more information.
	$pdf->Output('Check-List-Seguro_'. $id .'.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+