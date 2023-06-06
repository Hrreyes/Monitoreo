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
        $image_file = 'images/logo.png';
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
$pdf->SetSubject('Reporte de contacto');
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

//if (isset($_GET['id'])) {

	$id= $_GET['id'];

	$exp_data = get_form_reporte_contacto($id);
	
	while($data= mysqli_fetch_assoc($exp_data)){
		$fecha = $data['fecha'];
		$hora = $data['hora']; 
		$status = $data['status'];
		$nombre_cliente = $data['nombre_cliente'];
		$categoria_cliente = $data['categoria_cliente'];
		$telefono = $data['telefono'];
		$email = $data['email'];
		$vendor_ejecutivo = $data['vendor_ejecutivo'];
		$vendor = $data['vendor'];
		$check_list_id = $data['check_list_id'];
		$check_individual_id = $data['check_individual_id'];
		$check_juridica_id = $data['check_juridica_id'];
		$tipo_bien = $data['tipo_bien'];
		$tipo_bien_otro = $data['tipo_bien_otro'];
		$valor_bien = $data['valor_bien'];
		$con_iva = $data['con_iva'];
		$moneda = $data['moneda'];
		$plazos_id = $data['plazos_id'];
		$renta_inicial = $data['renta_inicial'];
		$renta_inicial_otro = $data['renta_inicial_otro'];
		$notas = $data['notas'];
		$precalificacion = $data['precalificacion'];
		$finiquito = $data['finiquito'];
		$reporte_visita_arrend = $data['reporte_visita_arrend'];
		$fecha_programada = $data['fecha_programada'];
		$ingreso_documentacion = $data['ingreso_documentacion'];
	}

	$check_list = explode(',',$check_list_id);

	$html = '
	<h4 style="text-align: center; color: #ff3a1e;">REPORTE DE CONTACTO</h4>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px; border: 1px solid #566464; text-align: left;">
		<tbody>
			<tr>
				<td width="100" style="border: 1px solid #566464;">Fecha:</td>
				<td width="110" style="text-align: center; border: 1px solid #566464;">'. $fecha .'</td>
				<td width="100" style="border: 1px solid #566464;">Hora:</td>
				<td width="110" style="text-align: center; border: 1px solid #566464;">'. $hora .'</td>
				<td width="65" style="border: 1px solid #566464;">Status:</td>
				<td width="145" style="text-align: center; border: 1px solid #566464;">'. $status .'</td>
			</tr>
			<tr>
				<td width="100" style="border: 1px solid #566464;">Cliente:</td>
				<td width="320" style="text-align: center;">'. $nombre_cliente .'</td>
				<td width="210" style="text-align: center;">
					<input type="checkbox" name="categoria_cliente_nuevo" value="nuevo" readonly="true"'; if ($categoria_cliente == "nuevo") { $html .= 'checked="checked"'; } $html .= ' /> <label>Nuevo</label>
					<input type="checkbox" name="categoria_cliente_usado" value="cartera" readonly="true"'; if ($categoria_cliente == "cartera") { $html .= 'checked="checked"'; } $html .= ' /> <label>Cartera</label>
				</td>
			</tr>
			<tr>
				<td width="100" style="border: 1px solid #566464;">Teléfono:</td>
				<td width="160" style="text-align: center; border: 1px solid #566464;">'. $telefono .'</td>
				<td width="70" style="border: 1px solid #566464;">E-mail:</td>
				<td width="300" style="text-align: center; border: 1px solid #566464;">'. $email .'</td>
			</tr>
			<tr>
				<td width="100" style="border: 1px solid #566464;">Ejecutivo/a:</td>
				<td width="160" style="text-align: center;">'. $vendor_ejecutivo .'</td>
				<td width="70" style="border: 1px solid #566464;">Vendor:</td>
				<td width="300" style="text-align: center;">'. $vendor .'</td>
			</tr>
		</tbody>
	</table>	

	<h5 style="text-align: center; color: #ff3a1e;">CHECKLIST</h5>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="120" style="text-align: left;">
					<input type="checkbox" name="check_list_1" value="1" readonly="true"'; foreach($check_list as $value) { if ($value == "1") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Solicitud de crédito firmada</label>
				</td>
				<td width="133" style="text-align: left;">
					<input type="checkbox" name="check_list_2" value="2" readonly="true"'; foreach($check_list as $value) { if ($value == "2") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Formulario IVE firmado</label>
				</td>
				<td width="239" style="text-align: left;">
					<input type="checkbox" name="check_list_3" value="3" readonly="true"'; foreach($check_list as $value) { if ($value == "3") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Carta de consentimiento para revisar referencias firmada</label>
				</td>
				<td width="145" style="text-align: left;">
					<input type="checkbox" name="check_list_4" value="4" readonly="true"'; foreach($check_list as $value) { if ($value == "4") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>RTU actualizado</label>
				</td>
			</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="235" style="text-align: left;">
					<input type="checkbox" name="check_list_5" value="5" readonly="true"'; foreach($check_list as $value) { if ($value == "5") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Estados de cuenta bancarios monetarios de los últimos 3 meses firmados y sellados</label>
				</td>
				<td width="182" style="text-align: left;">
					<input type="checkbox" name="check_list_6" value="6" readonly="true"'; foreach($check_list as $value) { if ($value == "6") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Copia de DPI o pasaporte completo si es extranjero</label>
				</td>
				<td width="213" style="text-align: left;">
					<input type="checkbox" name="check_list_7" value="7" readonly="true"'; foreach($check_list as $value) { if ($value == "7") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Recibo de servicios (últimos 2 meses)</label>
				</td>
			</tr>
		</tbody>
	</table>';

	if ($check_juridica_id != 0) {
		$check_juridica_list = explode(',',$check_juridica_id);
	$html .='<h6 style="color: #566464; text-align: center;">Persona Jurídica(S.A.)</h6>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="225">
					<input type="checkbox" name="check_juridica_1" value="1" readonly="true"'; foreach($check_juridica_list as $value) { if ($value == "1") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Nombramiento vigente.</label>
				</td>
				<td width="225">
					<input type="checkbox" name="check_juridica_2" value="2" readonly="true"'; foreach($check_juridica_list as $value) { if ($value == "2") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Escritura de constitución con modificaciones si hubiera.</label>
				</td>
				<td width="180">
					<input type="checkbox" name="check_juridica_3" value="3" readonly="true"'; foreach($check_juridica_list as $value) { if ($value == "3") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Patente de Comercio y Sociedad.</label>
				</td>
			</tr>
			<tr>
				<td width="400">
					<input type="checkbox" name="check_juridica_4" value="4" readonly="true"'; foreach($check_juridica_list as $value) { if ($value == "4") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Estados financieros de los últimos 2 años y parcial a la fecha firmados y sellados por el contador y firma del representante legal con sus respectivas integraciones firmadas por el contador.</label>
				</td>
				<td width="230">
					<input type="checkbox" name="check_juridica_5" value="5" readonly="true"'; foreach($check_juridica_list as $value) { if ($value == "5") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Declaraciones de impuesto de los últimos 3 pagos realizados (IVA e ISR), según aplique.</label>
				</td>
			</tr>
		</tbody>
	</table>';
	}else{
		$check_individual_list = explode(',',$check_individual_id);
		$html .='<h6 style="color: #566464; text-align: center;">Persona/Empresa Individual</h6>
		<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
			<tbody>
				<tr>
					<td width="210">
						<input type="checkbox" name="check_individual_1" value="1" readonly="true"'; foreach($check_individual_list as $value) { if ($value == "1") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Estado patrimonial firmado.</label>
					</td>
					<td width="420">
						<input type="checkbox" name="check_individual_2" value="2" readonly="true"'; foreach($check_individual_list as $value) { if ($value == "2") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Si es en relación de dependencia: constancia laboral de ingresos, membretada con firma y sello con número de teléfono (no más de 6 meses de antigüedad.</label>
					</td>
				</tr>
				<tr>
					<td width="440">
						<input type="checkbox" name="check_individual_3" value="3" readonly="true"'; foreach($check_individual_list as $value) { if ($value == "3") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Si es trabajo independiente (servicios profesionales): certificación de ingresos por contador, membretada con firma y sello con número de teléfono (no más de 6 meses de antigüedad.</label>
					</td>
					<td width="190">
						<input type="checkbox" name="check_individual_4" value="4" readonly="true"'; foreach($check_individual_list as $value) { if ($value == "4") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Declaraciones de IVA e ISR (según aplique) de los últimos 6 pagos realizados.</label>
					</td>
				</tr>
				<tr>
					<td width="auto">
						<input type="checkbox" name="check_individual_5" value="5" readonly="true"'; foreach($check_individual_list as $value) { if ($value == "5") { $html .= 'checked="checked"'; } }  $html .= ' /> <label>Patente (si aplica)</label>
					</td>
				</tr>
			</tbody>
		</table>';
	}

	$html .= '<h5 style="text-align: center; color: #ff3a1e;">CONDICIONES SOLICITADAS</h5>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="60">Bien:</td>
				<td width="425" style="text-align: center;">
					<input type="checkbox" name="tipo_bien_sedan" value="sedan" readonly="true" '; if ($tipo_bien == "sedan") { $html .= 'checked="checked"'; } $html .= ' /> <label>Sedán</label>
					<input type="checkbox" name="tipo_bien_pickup" value="pickup" readonly="true" '; if ($tipo_bien == "pickup") { $html .= 'checked="checked"'; } $html .= ' /> <label>Pickup</label>
					<input type="checkbox" name="tipo_bien_suv" value="suv" readonly="true"'; if ($tipo_bien == "suv") { $html .= 'checked="checked"'; } $html .= ' /> <label>SUV</label>
					<input type="checkbox" name="tipo_bien_camion" value="camion" readonly="true"'; if ($tipo_bien == "camion") { $html .= 'checked="checked"'; } $html .= '  /> <label>Camión</label>
					<input type="checkbox" name="tipo_bien_panel" value="panel" readonly="true"'; if ($tipo_bien == "panel") { $html .= 'checked="checked"'; } $html .= ' /> <label>Panel</label>
					<input type="checkbox" name="tipo_bien_otro" value="otro" readonly="true"'; if ($tipo_bien == "otro") { $html .= 'checked="checked"'; } $html .= ' /> <label>Otro</label>
				</td>';
				if ($tipo_bien == "otro") { $html .= '<td width="145" style="border-bottom: 1px solid black; text-align: left;">'.$tipo_bien_otro.'</td>';}
			$html .= '</tr>
		</tbody>
	</table>		

	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="130" >Valor del bien:</td>
				<td width="215" style="border-bottom: 1px solid black; text-align: center;">'; 
					if ($moneda == "quetzales"){ $html .= 'Q'. $valor_bien .'';}else{$html .= '$'. $valor_bien .'';}
		$html .= '</td>
				<td width="95" style="text-align: center;">
					<input type="checkbox" name="con_iva" value="si" readonly="true"'; if ($con_iva == "si") { $html .= 'checked="checked"'; } $html .= ' /> <label>Con IVA</label>
				</td>
				<td width="190" style="text-align: center;">
					<input type="checkbox" name="moneda_quetzales" value="quetzales" readonly="true"'; if ($moneda == "quetzales") { $html .= 'checked="checked"'; } $html .= ' /> <label>Quetzales</label>
					<input type="checkbox" name="moneda_dolares" value="dolares" readonly="true"'; if ($moneda == "dolares") { $html .= 'checked="checked"'; } $html .= ' /> <label>Dólares</label>
				</td>
			</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="140">Plazo en meses:</td>
				<td width="490" style="text-align: left;">
					<input type="checkbox" name="plazos_id_18" value="18" readonly="true"'; if ($plazos_id == "18") { $html .= 'checked="checked"'; } $html .= ' /> <label>18</label>
					<input type="checkbox" name="plazos_id_24" value="24" readonly="true"'; if ($plazos_id == "24") { $html .= 'checked="checked"'; } $html .= ' /> <label>24</label>
					<input type="checkbox" name="plazos_id_36" value="36" readonly="true"'; if ($plazos_id == "36") { $html .= 'checked="checked"'; } $html .= ' /> <label>36</label>
					<input type="checkbox" name="plazos_id_48" value="48" readonly="true"'; if ($plazos_id == "48") { $html .= 'checked="checked"'; } $html .= ' /> <label>48</label>
					<input type="checkbox" name="plazos_id_60" value="60" readonly="true"'; if ($plazos_id == "60") { $html .= 'checked="checked"'; } $html .= ' /> <label>60</label>
					<input type="checkbox" name="plazos_id_72" value="72" readonly="true"'; if ($plazos_id == "72") { $html .= 'checked="checked"'; } $html .= ' /> <label>72</label>
					<input type="checkbox" name="plazos_id_84" value="84" readonly="true"'; if ($plazos_id == "84") { $html .= 'checked="checked"'; } $html .= ' /> <label>84</label>
				</td>
			</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="115">Renta inicial:</td>
				<td width="185" style="text-align: center;">
					<input type="checkbox" name="renta_inicial_12" value="12%" readonly="true"'; if ($renta_inicial == "12%") { $html .= 'checked="checked"'; } $html .= ' /> <label>12%</label>
					<input type="checkbox" name="renta_inicial_20" value="20%" readonly="true"'; if ($renta_inicial == "20%") { $html .= 'checked="checked"'; } $html .= ' /> <label>20%</label>
					<input type="checkbox" name="renta_inicial_otro" value="otro" readonly="true"'; if ($renta_inicial == "otro") { $html .= 'checked="checked"'; } $html .= ' /> <label>Otro</label>
				</td>';
				if ($renta_inicial == "otro") { $html .= '<td width="100" style="border-bottom: 1px solid black; text-align: left;">'.$renta_inicial_otro.'</td>';}
			$html .= '</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="70">Notas:</td>
				<td width="560" style="border-bottom: 1px solid black; text-align: left;">'. $notas .'</td>
			</tr>
		</tbody>
	</table>	
	<br>
	<h6 style="color: #566464;">Pasos a completar:</h6>
	
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="140">1. Precalificación:</td>
				<td width="130" style="text-align: center;">
					<input type="checkbox" name="precalificacion_si" value="si" readonly="true"'; if ($precalificacion == "si") { $html .= 'checked="checked"'; } $html .= ' /> <label>Si</label>
					<input type="checkbox" name="precalificacion_no" value="no" readonly="true"'; if ($precalificacion == "no") { $html .= 'checked="checked"'; } $html .= ' /> <label>No</label>
				</td>
				<td width="190">Debe presentar finiquito:</td>
				<td width="130" style="text-align: center;">
					<input type="checkbox" name="finiquito_si" value="si" readonly="true"'; if ($finiquito == "si") { $html .= 'checked="checked"'; } $html .= ' /> <label>Si</label>
					<input type="checkbox" name="finiquito_no" value="no" readonly="true"'; if ($finiquito == "no") { $html .= 'checked="checked"'; } $html .= ' /> <label>No</label>
				</td>
			</tr>
		</tbody>
	</table>

	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="220">2. Reporte de visita ARREND:</td>
				<td width="145">Fecha programada</td>
				<td width="130" style="text-align: center;">
					<input type="checkbox" name="reporte_visita_arrend_si" value="si" readonly="true"'; if ($reporte_visita_arrend == "si") { $html .= 'checked="checked"'; } $html .= ' /> <label>Si</label>
					<input type="checkbox" name="reporte_visita_arrend_no" value="no" readonly="true"'; if ($reporte_visita_arrend == "no") { $html .= 'checked="checked"'; } $html .= ' /> <label>No</label>
				</td>'; 
				if ($reporte_visita_arrend == "si") { $html .= '<td width="135" style="border-bottom: 1px solid black; text-align: center;">'.$fecha_programada.'</td>';}
			$html .= '</tr>
		</tbody>
	</table>
	<br>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="365">3. Ingreso de documentación para resolución:</td>
				<td width="130" style="text-align: center;">
					<input type="checkbox" name="ingreso_documentacion_si" value="si" readonly="true"'; if ($ingreso_documentacion == "si") { $html .= 'checked="checked"'; } $html .= ' /> <label>Si</label>
					<input type="checkbox" name="ingreso_documentacion_no" value="no" readonly="true"'; if ($ingreso_documentacion == "no") { $html .= 'checked="checked"'; } $html .= ' /> <label>No</label>
				</td>
			</tr>
		</tbody>
	</table>';

	if ($check_individual_id != 0) {
		$html .= '<br><br><br>';
	}
	if ($check_juridica_id != 0) {
		$html .= '<br><br><br><br>';
	}
	
	$html .= '<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="90"></td>
				<td width="200" style="border-bottom: 1px solid black; text-align: center;"></td>
				<td width="50"></td>
				<td width="200" style="border-bottom: 1px solid black; text-align: center;"></td>
				<td width="90"></td>
			</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="90"></td>
				<td width="200" style="text-align: center;">ARREND</td>
				<td width="50"></td>
				<td width="200" style="text-align: center;">CLIENTE/EJECUTIVO</td>
				<td width="90"></td>
			</tr>
		</tbody>
	</table>';	
}
//Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML($html, true, 0, true, 0);

/* Limpiamos la salida del búfer y lo desactivamos */
  ob_end_clean();
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Reporte de contacto_'. $id .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+