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
require_once "../../providers/SapProvider.php";

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo.jpg';
        $image_file = 'images/logo.png';
        $this->Image($image_file, 75, 6, 55, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 15);
				$this->SetXY(140,8,70);
				$this->SetTextColor(150,150,150);
				$this->MultiCell(50, 0, 'RI-GT-FO-12A' , 0, 'C', 0, 0, '', '', true);
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 20, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Arrend');
$pdf->SetTitle('Formulario');
$pdf->SetSubject('Conozca a su cliente');
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
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

if (isset($_GET['id'])) {



	$id= $_GET['id'];
	$exp_data = get_form_pdf_ird_detail($id);

	while($data= mysqli_fetch_assoc($exp_data)){
		$pais_id = $data['pais'];
		$cardCode = $data['CardCode'];
		$nombre_cliente = $data['nombre_cliente'];
		$telefono_casa = $data['telefono_casa'];
		$telefono_celular = $data['telefono_celular'];
		$correo_personal = $data['correo_personal'];
		$direccion_vivienda = $data['direccion_vivienda'];
		$redes_sociales = $data['redes_sociales'];

		$beneficiario_fiscal = $data['beneficiario_fiscal'];
		$beneficiario_fiscal_nit = $data['beneficiario_fiscal_nit'];
		$telefono_beneficiario_fiscal = $data['telefono_beneficiario_fiscal'];
		$correo_beneficiario_fiscal = $data['correo_beneficiario_fiscal'];

		$nombre_cobros = $data['nombre_cobros'];
		$puesto_cobros = $data['puesto_cobros'];
		$telefono_cobros = $data['telefono_cobros'];
		$correo_cobros = $data['correo_cobros'];
		$nombre_recibe_facturas = $data['nombre_recibe_facturas'];
		$telefono_recibe_facturas = $data['telefono_recibe_facturas'];
		$email_recibe_facturas = $data['email_recibe_facturas'];

		$tipo_red_social = $data['tipo_red_social_n'];
		$tipo_cliente = $data['tipo_cliente'];

		$lugar_trabajo = $data['lugar_trabajo'];
		$fecha_laboral = $data['fecha_laboral'];
		$telefono_oficina = $data['telefono_oficina'];
		$celular_oficina = $data['celular_oficina'];
		$correo_laboral = $data['correo_laboral'];
		$direccion_oficina = $data['direccion_oficina'];
		$puesto = $data['puesto'];
		$fecha_visita = $data['fecha_visita'];
		$hora_visita = $data['hora_visita'];
		$entrevista_arrend = $data['entrevista_arrend'];
		$motivo_visita = $data['motivo_visita_nombre'];
		$tiene_pareja = $data['tiene_pareja'];
		$nombre_pareja = $data['nombre_pareja'];
		$lugar_trabajo_pareja = $data['lugar_trabajo_pareja'];
		$puesto_pareja = $data['puesto_pareja'];
		$telefono_pareja = $data['telefono_pareja'];
		$numero_dependientes = $data['numero_dependientes'];

		$usuario_bien = $data['usuario_bien'];
		$uso_bien = $data['uso_bien'];

		$cargo_usuario_bien = $data['cargo_usuario_bien'];
		$edad_usuario_bien = $data['edad_usuario_bien'];
		$tipo_financiamiento = $data['tipo_financiamiento'];

		$descripcion_bien = $data['descripcion_bien'];

		$moneda = $data['moneda'];
		$precio_iva = $data['precio_iva'];
		$desembolso = $data['desembolso'];

		$renta_bien = $data['renta_bien'];
		$plazo_bien = $data['plazo_bien'];
		$tir_bien = $data['tir_bien'];
		$opcion_compra_bien = $data['opcion_compra_bien'];
		$gastos_iniciales_bien = $data['gastos_iniciales_bien'];
		$seguro_bien = $data['seguro_bien'];
		$gps_bien = $data['gps_bien'];
		$notas_bien = $data['notas_bien'];

		$conocido_nombre_vendor = $data['conocido_nombre_vendor'];
		$direccion_vendor = $data['direccion_vendor'];
		$nombre_ejecutivo_vendor = $data['nombre_ejecutivo_vendor'];
		$telefono_vendor = $data['telefono_vendor'];
		$correo_vendor = $data['correo_vendor'];

		$conocido_nombre_cliente = $data['conocido_nombre_cliente'];
		$conocido_segmento_cliente = $data['conocido_segmento_cliente'];
		$conocido_nombre_redsocial = $data['conocido_nombre_redsocial_n'];
		$conocido_otros = $data['conocido_otros'];

		$numero_identificacion = $data['numero_identificacion'];
		$nit = $data['nit'];
		$actividad_economica = $data['actividad_economica'];
	}

	$inicioRelacionesArrend= null;
	$contratosTotales=null;
	$contratosCancelados=null;
	$contratosActivos=null;
	$maximoEndeudamiento=null;
	$comportamientoPago=null;

	if ($cardCode) {
		$provider = SapProvider::getInstance();
		
		$provider->getInicioRelaciones($cardCode);
		if ($provider->count() > 0) {
			$inicioRelacionesInfo = $provider->data();
			$inicioRelacionesArrend = $inicioRelacionesInfo[0]['fecha'];
		}
	
		$provider->getContratos($cardCode);
		if ($provider->count() > 0) {
			$contratosTotales = $provider->count();
		}
	
		$provider->getContratosCancelados($cardCode);
		if ($provider->count() > 0) {
			$contratosCancelados = $provider->count();
		}
	
		$provider->getContratosActivos($cardCode);
		if ($provider->count() > 0) {
			$contratosActivos = $provider->count();
		}
	
		$provider->getEndeudamiento($cardCode);
		if ($provider->count() > 0) {
			$maximoEndeudamientoInfo = $provider->data();
			$maximoEndeudamiento = $maximoEndeudamientoInfo[0]['endeudamiento'];
		}
	
	}

	if (strpos($entrevista_arrend, ".") !== false) {
		$nombre_asesor = str_replace('.', ' ', $entrevista_arrend);
	}

	$html = '<style>
		h1 { font-size: 18px; text-align:center; color: #757575;}
		label { font-size: 14px; line-height: 16px; color: #757575; margin:bottom:10px;}
		tr.border_bottom td { border-bottom: 1px solid #757575; padding:0px;}
		table{font-size:14px; padding:0px;}
	</style>
	<h1 class="page-title">FORMULARIO PERSONA INDIVIDUAL RELACIÓN DEPENDENCIA</h1>

	<label>0. DATOS DEL BIEN</label>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="310">Usuario del bien:</th>
				<th width="10">&nbsp;</th>
				<th width="310">Uso del bien:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="310">'. $usuario_bien .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="310">'. $uso_bien .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="310">Cargo del usuario:</th>
				<th width="10">&nbsp;</th>
				<th width="310">Edad del usuario:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="310">'. $cargo_usuario_bien .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="310">'. $edad_usuario_bien .'</td>
			</tr>
		</tbody>
	</table><br><br>

	<table color="#757575">
	<thead>
		<tr>
			<th width="310">Nombre de la persona contacto para cobros:</th>
			<th width="10">&nbsp;</th>
			<th width="310">Puesto de la persona de cobros:</th>
		</tr>
	</thead>
	<tbody>
		<tr class="border_bottom">
			<td color="#000" width="310">'. $nombre_cobros .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="310">'. $puesto_cobros .'</td>
		</tr>
	</tbody>
</table><br><br>
<table color="#757575">
	<thead>
		<tr>
			<th width="310">Telefono de cobros:</th>
			<th width="10">&nbsp;</th>
			<th width="310">Email de cobros:</th>
		</tr>
	</thead>
	<tbody>
		<tr class="border_bottom">
			<td color="#000" width="310">'. $telefono_cobros .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="310">'. $correo_cobros .'</td>
		</tr>
	</tbody>
</table><br><br>
<table color="#757575">
		<thead>
			<tr>
				<th width="160">Nombre de la persona que recibe las facturas:</th>
				<th width="10">&nbsp;</th>
				<th width="160">Telefono de la persona que recibe las facturas:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Email de la persona que recibe las facturas:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="160">'. $nombre_recibe_facturas .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="160">'. $telefono_recibe_facturas .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $email_recibe_facturas .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>


	<table color="#757575">
	<thead>
		<tr>
			<th width="310">Beneficiario Fiscal (si aplica):</th>
			<th width="10">&nbsp;</th>
			<th width="310">Nit Beneficiario Fiscal:</th>
		</tr>
	</thead>
	<tbody>
		<tr class="border_bottom">
			<td color="#000" width="310">'. $beneficiario_fiscal .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="310">'. $beneficiario_fiscal_nit .'</td>
		</tr>
	</tbody>
</table><br><br>';

	$get_formulario_datos_bien = get_formulario_datos_bien($id);

	$html .= '
	<label>Descripción del bien:</label><br><br>
	<table border="0" color="#757575" nobr="true">
	<thead>
		<tr>
			<th>Cantidad</th>
			<th>Tipo bien a financiar</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Línea</th>
		</tr>
	</thead>
	<tbody id="datos_bien">';

	foreach($get_formulario_datos_bien as $key => $data_datos_bien) {

		$cantidad_bien = $data_datos_bien['cantidad_bien'];
		$tipo_bien = $data_datos_bien['tipo_bien'];
		$marca_bien = $data_datos_bien['marca_bien'];
		$modelo_bien = $data_datos_bien['modelo_bien'];
		$linea_bien = $data_datos_bien['linea_bien'];

		$html .= '<tr class="border_bottom">
			<td>'. $cantidad_bien .'</td>
			<td color="#000">'. $tipo_bien .'</td>
			<td color="#000">'. $marca_bien .'</td>
			<td color="#000">'. $modelo_bien .'</td>
			<td color="#000">'. $linea_bien .'</td>
		</tr>';
	}

	$html .= '</tbody>
	</table>';




	$html.='<br><br>
	<label>Datos del financiamiento</label>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="310">Moneda:</th>
				<th width="10">&nbsp;</th>
				<th width="310">Tipo de financiamiento:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="310">'. $moneda .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="310">'. $tipo_financiamiento .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="150">Precio con IVA:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Desembolso:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Renta inicial:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Plazo:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="150">'. $moneda .''. $precio_iva .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="150">'. $moneda .''. $desembolso .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="150">'. $renta_bien .'%</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="150">'. $plazo_bien .' Meses</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="140">TIR:</th>
				<th width="10">&nbsp;</th>
				<th width="140">Opción de compra:</th>
				<th width="10">&nbsp;</th>
				<th width="140">Gastos iniciales:</th>
				<th width="10">&nbsp;</th>
				<th width="90">Seguro:</th>
				<th width="10">&nbsp;</th>
				<th width="80">GPS:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="140">'. $tir_bien .'%</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="140">'. $opcion_compra_bien .'%</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="140">'. $gastos_iniciales_bien .'%</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="90">'. $seguro_bien .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="80">'. $gps_bien .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="auto">Notas:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="auto">'. $notas_bien .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<label>I. DATOS GENERALES</label>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="230">País:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Nombre del cliente:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="230">'. $pais_id .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $nombre_cliente .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="160">Teléfono de casa:</th>
				<th width="10">&nbsp;</th>
				<th width="160">Teléfono celular:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Correo Electronico personal:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="160">'. $telefono_casa .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="160">'. $telefono_celular .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $correo_personal .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>

	<table color="#757575">
		<thead>
			<tr>
				<th width="160">Número de Identificación:</th>
				<th width="10">&nbsp;</th>
				<th width="160">NIT:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Actividad Económica:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="160">'. $numero_identificacion .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="160">'. $nit .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $actividad_economica .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>

	<table color="#757575">
		<thead>
			<tr>
				<th width="auto">Dirección de vivienda:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="auto">'. $direccion_vivienda .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="250">Como se encuentra en la redes sociales:</th>
				<th width="10">&nbsp;</th>
				<th width="250">Tipo de redes sociales:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="250">'. $redes_sociales .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="250">'. $tipo_red_social .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="250">Tipo de cliente:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="250">'. $tipo_cliente .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>';

	
	if($tipo_cliente == 'Cartera'){
		$html.='
			<label class="form-control-label pl-0" for="principales_productos" style="font-weight: bold;">Historial del cliente con Arrend</label>
			<br><br>
				<table border="0.5" style="padding:10px;" color="#757575" nobr="true">
					
						<tr>
							<td>Inicio relaciones con Arrend </td>
							<td>'. $inicioRelacionesArrend.'</td>
						</tr>
						<tr>
							<td>Contratos totales</td>
							<td>'. $contratosTotales.'</td>
						</tr>
						<tr>
							<td>Contratos cancelados</td>
							<td>'. $contratosCancelados.'</td>
						</tr>
						<tr>
							<td>Contratos activos</td>
							<td>'. $contratosActivos.'</td>
						</tr>
						<tr>
							<td>Maximo endeudamiento</td>
							<td>'. $maximoEndeudamiento.'</td>
						</tr>
						<tr>
							<td>Comportamiento de pago</td>
							<td>'. $comportamientoPago.'</td>
						</tr>
					
				</table><br><br><br>';
	}

	
	$html .='<table color="#757575">
		<thead>
			<tr>
				<th width="230">Lugar de trabajo:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Fecha de inicio laboral:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="230">'. $lugar_trabajo .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $fecha_laboral .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="160">Teléfono PBX:</th>
				<th width="10">&nbsp;</th>
				<th width="160">Teléfono celular oficina:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Correo Electronico laboral:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="160">'. $telefono_oficina .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="160">'. $celular_oficina .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $correo_laboral .'</td>
			</tr>
		</tbody>
	</table>
	<br><br><br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="230">Dirección de la oficina:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Puesto:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="230">'. $direccion_oficina .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $puesto .'</td>

			</tr>
		</tbody>
	</table>
	<br><br>
	<label>DATOS DE LA VISITA</label>
	<br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="160">Fecha:</th>
				<th width="10">&nbsp;</th>
				<th width="160">Hora:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Quien realiza la visita por Arrend:</th>			
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="160">'. $fecha_visita .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="160">'. $hora_visita .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $nombre_asesor .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<label>II. MOTIVO DE LA VISITA:</label>
	<br>
	<table color="#757575">
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="auto">'. $motivo_visita .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>


	<label>III. Referencias Personales:</label>
	<br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="150">Nombre:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Dirección:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Relación:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Teléfono:</th>
			</tr>
		</thead>
		<tbody>';
		$referenciasPersonalesList =get_form_referencias_personales($id);
		foreach($referenciasPersonalesList as $key => $data) {

			$referencia_personal_nombre = $data['referencia_personal_nombre'];
			$referencia_personal_direccion = $data['referencia_personal_direccion'];
			$referencia_personal_relacion = $data['referencia_personal_relacion'];
			$referencia_personal_telefono = $data['referencia_personal_telefono'];
	
			$html .= '<tr class="border_bottom">
			<td color="#000" width="150">'. $referencia_personal_nombre .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="150">'. $referencia_personal_direccion .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="150">'. $referencia_personal_relacion .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="150">'. $referencia_personal_telefono .'</td>
		</tr>';
		}
	
		$html .= '</tbody>
			
		</tbody>
	</table>
	<br><br>

	<label>III. Referencias Familiares:</label>
	<br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="150">Nombre:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Dirección:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Relación:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Teléfono:</th>
			</tr>
		</thead>
		<tbody>';
		$referenciasFamiliaresList =get_form_referencias_familiares($id);
		foreach($referenciasFamiliaresList as $key => $data) {

			$referencia_familiar_nombre = $data['referencia_familiar_nombre'];
			$referencia_familiar_direccion = $data['referencia_familiar_direccion'];
			$referencia_familiar_relacion = $data['referencia_familiar_relacion'];
			$referencia_familiar_telefono = $data['referencia_familiar_telefono'];
	
			$html .= '<tr class="border_bottom">
			<td color="#000" width="150">'. $referencia_familiar_nombre .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="150">'. $referencia_familiar_direccion .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="150">'. $referencia_familiar_relacion .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="150">'. $referencia_familiar_telefono .'</td>
		</tr>';
		}
	
		$html .= '</tbody>
			
		</tbody>
	</table>
	<br><br>


	
	<label>IX. DESCRIPCIÓN DEL CLIENTE</label>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="200">Tiene pareja:</th>
				<th width="10">&nbsp;</th>
				<th width="200">Numero de dependientes:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="200">'. $tiene_pareja .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="200">'. $numero_dependientes .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>';

	if ($tiene_pareja == "si") {
		$html .='<table color="#757575">
			<thead>
				<tr>
					<th width="310">Nombre de la pareja:</th>
					<th width="10">&nbsp;</th>
					<th width="310">Lugar de trabajo:</th>
					<th width="10">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $nombre_pareja .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $lugar_trabajo_pareja .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Puesto:</th>
					<th width="10">&nbsp;</th>
					<th width="310">Teléfono del trabajo:</th>
					<th width="10">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $puesto_pareja .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $telefono_pareja .'</td>
					<th width="10">&nbsp;</th>
				</tr>
			</tbody>
		</table>
		<br><br>';
	}

	if ($conocido_nombre_vendor != "") {
		$html .='<label>XII. COMO CONOCIO ARREND: <span style="color:#000;">Referido por Vendor</span></label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Nombre del vendor:</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="auto">'. $conocido_nombre_vendor .'</td>
				</tr>
			</tbody>
		</table>';
	}elseif ($conocido_nombre_cliente !="") {
		$html .='<label>XII. COMO CONOCIO ARREND: <span style="color:#000;">Referido por cliente existente ARREND</span></label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Nombre del cliente:</th>
					<th width="10">&nbsp;</th>
					<th width="310">Segmento:</th>
					<th width="10">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $conocido_nombre_cliente .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $conocido_segmento_cliente .'</td>
				</tr>
			</tbody>
		</table>';
	}elseif ($conocido_nombre_redsocial !="") {
		$html .='<label>XII. COMO CONOCIO ARREND: <span style="color:#000;">Lo encontre en medios digitales ARREND</span></label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Nombre del medio digital ARREND:</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $conocido_nombre_redsocial .'</td>
				</tr>
			</tbody>
		</table>';
	}elseif ($conocido_otros !="") {
		$html .='<label>XII. COMO CONOCIO ARREND: <span style="color:#000;">Otros</span></label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Nombre de otra opción:</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="auto">'. $conocido_otros .'</td>
				</tr>
			</tbody>
		</table>';
	}
	
	$html .='<br><br>
		<table color="#757575">
		<thead>
			<tr>
				<th width="310">Dirección Vendor:</th>
				<th width="10">&nbsp;</th>
				<th width="310">Nombre del ejecutivo:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="310">'. $direccion_vendor .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="310">'. $nombre_ejecutivo_vendor .'</td>
			</tr>
		</tbody>
	</table><br><br>
	
		<table color="#757575">
		<thead>
			<tr>
				<th width="310">Teléfono del vendedor:</th>
				<th width="10">&nbsp;</th>
				<th width="310">Correo del vendedor:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="310">'. $telefono_vendor .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="310">'. $correo_vendor .'</td>
			</tr>
		</tbody>
	</table><br><br>';
//Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

	$exp_data_img = get_form_ird_img_detail($id);
	$rowcount=mysqli_num_rows($exp_data_img);

	if ($rowcount != 0) {

	$pdf->startPageGroup();
	$pdf->AddPage();

	$html_2 = '<br><br>
		<label>XVI. FOTOGRAFIAS:</label>
		<br><br>
		<table color="#757575" border="1" cellpadding="12">
			<thead>
				<tr>
					<th width="310">Imagen</th>
					<th width="310">Comentario</th>
				</tr>
			</thead>
			<tbody>';
			foreach($exp_data_img as $key => $current) {
				$id_img = $current['formulario_id'];
				$nombre = $current['nombre'];
				$comentario = $current['comentario'];

				$html_2 .= '<tr nobr="true" style="height: 100px;">
					<td width="310">
						<br><br>
						<img src="../../upload/'. $id_img .'/'. $nombre .'" width="350px" height="350px;">
						<br>
					</td>
					<td width="310">
						<br><br>
						' . $comentario . '
					</td>
				</tr>';
			}
		$html_2 .= '</tbody>
		</table>';

	//Print text using writeHTMLCell()
	$pdf->writeHTMLCell(0, 0, '', '', $html_2, 0, 1, 0, true, '', true);
	}

	$pdf->startPageGroup();
	$pdf->AddPage();
	
	$html_3 = '<br><br><br><br><br><br>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="90"></td>
				<td width="200" style="border-bottom: 1px solid black; text-align: center;"></td>
				<td width="50"></td>
				<td width="200" style="border-bottom: 1px solid black; text-align: center;">'. $nombre_asesor .'</td>
				<td width="90"></td>
			</tr>
			<tr>
				<td width="90"></td>
				<td width="200" style="text-align: center;">SUPERVISOR</td>
				<td width="50"></td>
				<td width="200" style="text-align: center;">ASESOR</td>
				<td width="90"></td>
			</tr>
		</tbody>
	</table>
	<br><br><br><br><br><br>
	<table border="0" cellpadding="5" color="#566464" style="font-size:13px;">
		<tbody>
			<tr>
				<td width="215"></td>
				<td width="200" style="border-bottom: 1px solid black; text-align: center;"></td>
			</tr>
			<tr>
				<td width="215"></td>
				<td width="200" style="text-align: center;">ASESOR DE RIESGOS</td>
			</tr>
		</tbody>
	</table>';
}
//Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html_3, 0, 1, 0, true, '', true);

/* Limpiamos la salida del búfer y lo desactivamos */
  ob_end_clean();
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('FORMULARIO PERSONA INDIVIDUAL RELACIÓN DEPENDENCIA_'. $id .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+