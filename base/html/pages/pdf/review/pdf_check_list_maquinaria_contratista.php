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

		$exp_data = get_check_list_seguros_maquinaria_contratista($id);
						
		while($data= mysqli_fetch_assoc($exp_data)){	
			$Formulario_No = $data['Formulario_No'];
			$cliente_expedienteNo = $data['cliente_expedienteNo'];
			$cliente_fecha = $data['cliente_fecha'];
			$cliente_nombre = $data['cliente_nombre'];
			$cliente_telefono = $data['cliente_telefono'];
			$cliente_direccion = $data['cliente_direccion'];
			$cliente_actividad = $data['cliente_actividad'];
			$cliente_movil = $data['cliente_movil'];
			$cliente_celular = $data['cliente_celular'];
			$contacto_nombre = $data['contacto_nombre'];
			$contacto_telefono_fijo = $data['contacto_telefono_fijo'];
			$contacto_cargo = $data['contacto_cargo'];
			$contacto_movil = $data['contacto_movil'];
			$garantia_financiar = $data['garantia_financiar'];
			$garantia_afinanciar_otros = $data['garantia_afinanciar_otros'];
			$cantidad_unidades= $data['cantidad_unidades'];
			$garantia_descripcion= $data['garantia_descripcion'];
			$garantia_liviana_pesada= $data['garantia_liviana_pesada'];
			$datos_departamento_movilizara= $data['datos_departamento_movilizara'];
			$datos_ubicacion_exacta= $data['datos_ubicacion_exacta'];
			$datos_proyecto_dondeestara = $data['datos_proyecto_dondeestara'];
			$datos_trabajos_efectuara = $data['datos_trabajos_efectuara'];
			$exposicion_garantia = $data['exposicion_garantia'];
			$exposicion_garantia_otros = $data['exposicion_garantia_otros'];
			$queseguro_necesita = $data['queseguro_necesita'];
			$queseguro_equipo_adicional = $data['queseguro_equipo_adicional'];
			$observaciones = $data['observaciones'];
			$created_by = $data['created_by'];
			$updated_by = $data['updated_by'];
			break;
		}
		$tipo_equipo="";
		if($garantia_fijo_movil ==="SI"){$tipo_equipo ='Fijo';}else{$tipo_equipo='Móvil';};
		$html = '
			<h4 style="text-align: center; color: #566464;">LEASING MAQUINARIA CONTRATISTA</h4>
			<table border="0" cellpadding="5" color="#566464" style="font-size:11px; text-align: left;">
				<tbody>
					<tr>
						<td width="120">No. Expediente:</td>
						<td width="110" style="text-align: right; border-bottom: 1px solid #566464;">'. $cliente_expedienteNo .'</td>
						<td width="188">&nbsp;</td>
						<td width="60">Fecha:</td>
						<td width="160" style="text-align: center; border-bottom: 1px solid #566464;">'. $cliente_fecha .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					<tr>
						<td width="auto"><h4 style="text-align: left;">DATOS DE LA PERSONA / EMPRESA</h4></td>
					</tr>
					<tr>
						<td width="70">Nombre:</td>
						<td width="328" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $cliente_nombre .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Teléfono:</td>
						<td width="120" style="text-align: center; border-bottom: 1px solid #566464;">'. $cliente_telefono .'</td>
					</tr>
					<tr>
						<td width="70">Dirección:</td>
						<td width="auto" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $cliente_direccion .'</td>
					</tr>
					<tr>
						<td width="70">Giro de la empresa:</td>
						<td width="328" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $cliente_actividad .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Móvil:</td>
						<td width="120" style="text-align: center; border-bottom: 1px solid #566464;">'. $cliente_movil .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					<tr>
						<td width="auto"><h4 style="text-align: left;">DATOS DE CONTACTO</h4></td>
					</tr>
					<tr>
						<td width="70">Nombre:</td>
						<td width="328" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $contacto_nombre .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Teléfono:</td>
						<td width="120" style="text-align: center; border-bottom: 1px solid #566464;">'. $contacto_telefono_fijo .'</td>
					</tr>
					<tr>
						<td width="70">Cargo:</td>
						<td width="328" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $contacto_cargo .'</td>
						<td width="50">&nbsp;</td>
						<td width="71">Móvil:</td>
						<td width="120" style="text-align: center; border-bottom: 1px solid #566464;">'. $cliente_movil .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					<tr>
						<td width="200"><h4 style="text-align: left;">GARANTIA A FINANCIAR</h4></td>
						<td width="165">&nbsp;</td>
						<td width="200"><h4 style="text-align: left;">Descripción maquinaria</h4></td>
					</tr>
					<tr>
						<td width="70"></td>
						<td width="185" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $garantia_financiar .'</td>
						<td width="70">Cantidad:</td>
						<td width="40" style="text-align: center; border-bottom: 1px solid #566464;">'. $cantidad_unidades .'</td>
						<td width="70"></td>
						<td width="200" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $garantia_descripcion .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					<tr>
						<td width="auto"><h4 style="text-align: left;">DATOS DE LA GARANTIA</h4></td>
					</tr>
					<tr>
						<td width="100">Tipo Maquinaria:</td>
						<td width="70" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $garantia_liviana_pesada .'</td>
						<td width="30">&nbsp;</td>
						<td width="200">Departamentos donde se movilizará:</td>
						<td width="70" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $datos_departamento_movilizara .'</td>
					</tr>
					<tr>
						<td width="100">Ubicación exacta:</td>
						<td width="150" style="font-size:12px; text-align: center; border-bottom: 1px solid #566464;">'. $datos_ubicacion_exacta .'</td>
						<td width="30">&nbsp;</td>
						<td width="200">Nombre del proyecto donde estará ubicada:</td>
						<td width="150" style="font-size:12px; text-align: center; border-bottom: 1px solid #566464;">'. $datos_proyecto_dondeestara .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>


					<tr>
						<td width="150">Trabajos que efectuará:</td>
						<td width="200" style="font-size:12px; text-align: center; border-bottom: 1px solid #566464;">'. $datos_trabajos_efectuara .'</td>
						<td width="30">&nbsp;</td>
						<td width="150">Exposición de la garantía:</td>
						<td width="150" style="font-size:12px; text-align: center; border-bottom: 1px solid #566464;">'. $exposicion_garantia .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					
					<tr>
						<td width="200">Que seguro adicional necesita?:</td>
						<td width="200" style="font-size:12px; text-align: center; border-bottom: 1px solid #566464;">'. $queseguro_necesita .'</td>
					</tr>
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					
					<tr>
						<td width="auto">&nbsp;</td>
					</tr>
					<tr>
						<td width="139">Notas:</td>
					</tr>
					<tr>
						<td width="auto" style="font-size:12px; text-align: left; border-bottom: 1px solid #566464;">'. $observaciones .'</td>
					</tr>
				</tbody>
			</table><br><br><br>';
	}
	
	$pdf->writeHTML($html, true, 0, true, 0);

	/*Seccion de firmas*/
	$pdf->SetFont('helvetica', 'B', 9);
	$pdf->SetTextColor(92,97,99);	
	
	$pdf->SetXY(15,250);	
	if($updated_by){
		$pdf->MultiCell(48, 1,strtoupper($updated_by), 0, 'C', 0, 0, '', '', true);
	}else{
		$pdf->MultiCell(48, 1,strtoupper($created_by), 0, 'C', 0, 0, '', '', true);
	}
	$pdf->Line(15, 255, 63, 255, 0);	
	
	$pdf->SetXY(85,250);
	$pdf->MultiCell(48, 1,"Revisado por Riesgos", 0, 'C', 0, 0, '', '', true);
	$pdf->Line(85, 255, 133, 255, 0);
	
	$pdf->SetXY(147,250);
	$pdf->MultiCell(48, 1,"Revisado por Seguros", 0, 'C', 0, 0, '', '', true);
	$pdf->Line(147, 255, 195, 255, 0);
	
	$pdf->SetXY(147,270);
	$pdf->MultiCell(48, 1,"No. Póliza", 0, 'C', 0, 0, '', '', true);
	$pdf->Line(147, 269, 195, 269, 0);
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