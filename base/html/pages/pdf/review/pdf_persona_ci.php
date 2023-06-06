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
				$this->MultiCell(50, 0, 'RI-GT-FO-12B' , 0, 'C', 0, 0, '', '', true);
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
		$usuario_bien = $data['usuario_bien'];
		$uso_bien = $data['uso_bien'];
		$cardCode = $data['CardCode'];

		$nombre_recibe_facturas = $data['nombre_recibe_facturas'];
		$telefono_recibe_facturas = $data['telefono_recibe_facturas'];
		$email_recibe_facturas = $data['email_recibe_facturas'];

		$cargo_usuario_bien = $data['cargo_usuario_bien'];
		$edad_usuario_bien = $data['edad_usuario_bien'];
		$tipo_financiamiento = $data['tipo_financiamiento'];
		$tipo_cliente = $data['tipo_cliente'];

		$beneficiario_fiscal = $data['beneficiario_fiscal'];
		$beneficiario_fiscal_nit = $data['nit'];
		$telefono_beneficiario_fiscal = $data['telefono_beneficiario_fiscal'];
		$correo_beneficiario_fiscal = $data['correo_beneficiario_fiscal'];

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
		$nit_sociedad = $data['nit_sociedad'];
		$pais_id = $data['pais'];
		$nombre_cliente = $data['nombre_cliente'];
		$telefono_casa = $data['telefono_casa'];
		$nombre_empresa = $data['nombre_empresa'];
		$razon_social = $data['razon_social'];
		$telefono_celular = $data['telefono_celular'];
		$correo_personal = $data['correo_personal'];
		$numero_identificacion = $data['numero_identificacion'];
		$direccion_vivienda = $data['direccion_vivienda'];
		$nombre_empresa = $data['nombre_empresa'];
		$fecha_inicio = $data['fecha_inicio'];
		$telefono_oficina = $data['telefono_oficina'];
		$correo_laboral = $data['correo_laboral'];
		$direccion_oficina = $data['direccion_oficina'];
		$pagina_web = $data['pagina_web'];
		$redes_sociales = $data['redes_sociales'];
		$redes_sociales_followers = $data['redes_sociales_followers'];
		$actividad_economica = $data['actividad_economica'];
		

		$tipo_red_social = $data['tipo_red_social_n'];

		$nombre_cobros = $data['nombre_cobros'];

		$puesto_cobros = $data['puesto_cobros'];

		$telefono_cobros = $data['telefono_cobros'];
		$correo_cobros = $data['correo_cobros'];
		$fecha_visita = $data['fecha_visita'];
		$hora_visita = $data['hora_visita'];
		$entrevista_arrend = $data['entrevista_arrend'];
		$motivo_visita = $data['motivo_visita_nombre'];
		
		$tiene_pareja = $data['tiene_pareja'];
		$numero_dependientes = $data['numero_dependientes'];
		$nombre_pareja = $data['nombre_pareja'];
		$lugar_trabajo_pareja = $data['lugar_trabajo_pareja'];
		$puesto_pareja = $data['puesto_pareja'];
		$telefono_pareja = $data['telefono_pareja'];

		$utiliza_transporte = $data['utiliza_transporte'];
		$marcas_propias = $data['marcas_propias'];		

		$cliente_composicion_ventas_locales = $data['cliente_composicion_ventas_locales'];		
		$cliente_composicion_ventas_exterior = $data['cliente_composicion_ventas_exterior'];
		$cliente_mezcla_ventas_contado = $data['cliente_mezcla_ventas_contado'];
		$cliente_mezcla_ventas_credito = $data['cliente_mezcla_ventas_credito'];
		$cliente_ventas_politica_cobrar = $data['cliente_ventas_politica_cobrar'];		

		$proveedor_composicion_compras_locales = $data['proveedor_composicion_compras_locales'];
		$proveedor_composicion_compras_exterior = $data['proveedor_composicion_compras_exterior'];
		$proveedor_mezcla_compras_contado = $data['proveedor_mezcla_compras_contado'];
		$proveedor_mezcla_compras_credito = $data['proveedor_mezcla_compras_credito'];
		$proveedor_compras_politica_pagar = $data['proveedor_compras_politica_pagar'];

		$tiene_dedica_agricultura = $data['tiene_dedica_agricultura'];
		$dedica_agricultura = $data['dedica_agricultura'];
		$tiene_dedica_construccion = $data['tiene_dedica_construccion'];
		$dedica_construccion = $data['dedica_construccion'];
		$tiene_dedica_pecuario = $data['tiene_dedica_pecuario'];
		$dedica_pecuario = $data['dedica_pecuario'];
		$tiene_dedica_entrenamiento = $data['tiene_dedica_entrenamiento'];
		$dedica_entrenamiento = $data['dedica_entrenamiento'];
		$tiene_dedica_alquiler = $data['tiene_dedica_alquiler'];
		$dedica_alquiler = $data['dedica_alquiler'];
		$dedica_alquiler_actividad = $data['dedica_alquiler_actividad_nombre'];
		$tiene_dedica_hoteleria = $data['tiene_dedica_hoteleria'];
		$dedica_hoteleria = $data['dedica_hoteleria'];

		$medio_ambiental = $data['medio_ambiental'];
		$manual_ambiental = $data['manual_ambiental'];
		$codigo_etica = $data['codigo_etica'];
		$politica_anticorrupcion = $data['politica_anticorrupcion'];

		$conocido_nombre_vendor = $data['conocido_nombre_vendor'];
		$direccion_vendor = $data['direccion_vendor'];
		$nombre_ejecutivo_vendor = $data['nombre_ejecutivo_vendor'];
		$telefono_vendor = $data['telefono_vendor'];
		$correo_vendor = $data['correo_vendor'];

		$conocido_nombre_cliente = $data['conocido_nombre_cliente'];
		$conocido_segmento_cliente = $data['conocido_segmento_cliente'];
		$conocido_nombre_redsocial = $data['conocido_nombre_redsocial_n'];
		$conocido_otros = $data['conocido_otros'];
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
	<h1 class="page-title">FORMULARIO COMERCIANTE INDIVIDUAL</h1>

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
</table><br><br>
<table color="#757575" style="display:none;">
	<thead>
		<tr>
			<th width="310">Email Beneficiario Fiscal (si aplica):</th>
			<th width="10">&nbsp;</th>
			<th width="310">Telefono Beneficiario Fiscal (si aplica):</th>
		</tr>
	</thead>
	<tbody>
		<tr class="border_bottom">
			<td color="#000" width="310">'. $correo_beneficiario_fiscal .'</td>
			<th width="10">&nbsp;</th>
			<td color="#000" width="310">'. $telefono_beneficiario_fiscal .'</td>
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

	$html.='<br><br><label>Datos del financiamiento</label>
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
				<th width="160">País:</th>
				<th width="10">&nbsp;</th>
				<th width="160">Nombre del cliente:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Número de Identificación:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="160">'. $pais_id .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="160">'. $nombre_cliente .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $numero_identificacion .'</td>
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
				<th width="450">Nombre de la empresa:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Fecha de inicio de operaciones o inicio:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="450">'. $nombre_empresa .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $fecha_inicio .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="230">Teléfono PBX:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Correo Electronico laboral:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="230">'. $telefono_oficina .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $correo_laboral .'</td>
			</tr>
		</tbody>
	</table>	
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="230">Dirección de la oficina:</th>
				<th width="10">&nbsp;</th>
				<th width="auto">Actividad economica:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="230">'. $direccion_oficina .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="auto">'. $actividad_economica .'</td>
			</tr>
		</tbody>
	</table>
	<br><br><br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="210">Pagina WEB:</th>
				<th width="10">&nbsp;</th>
				<th width="160">Como se encuentra en redes sociales:</th>
				<th width="10">&nbsp;</th>
				<th width="130">Cuantos Followers tiene:</th>
				<th width="10">&nbsp;</th>
				<th width="100">Tipo de red social:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="210">'. $pagina_web .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="160">'. $redes_sociales .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="130">'. $redes_sociales_followers .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="100">'. $tipo_red_social .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="250">Nombre de la persona contacto para cobros:</th>
				<th width="10">&nbsp;</th>
				<th width="210">Puesto de la persona de cobros:</th>
				<th width="10">&nbsp;</th>
				<th width="150">Telefono de cobros:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="250">'. $nombre_cobros .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="210">'. $puesto_cobros .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="150">'. $telefono_cobros .'</td>
			</tr>
		</tbody>
	</table>
	<br><br>
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
				<th width="450">Email de cobros:</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="450">'. $correo_cobros .'</td>
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

	
	$html .='<label>DATOS DE LA VISITA</label>
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
	</table>';

	if ($tiene_pareja == "si") {
		$html .='<br><br>
		<table color="#757575">
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

	$exp_data_empleados = get_form_ird_empleados_detail($id);

	while($data_empleados= mysqli_fetch_assoc($exp_data_empleados)){

		$empleados_total = $data_empleados['total'];
		$empleados_admon = $data_empleados['administrativos'];
		$empleados_ventas = $data_empleados['ventas'];
		$empleados_produccion = $data_empleados['produccion'];
		$empleados_temporal = $data_empleados['temporales'];
	}

	$html .='
	<label>Empleados</label>
	<br>
	<table color="#757575">
		<thead>
			<tr>
				<th width="150">Total de empleados</th>
				<th width="10">&nbsp;</th>
				<th width="120">Administrativos</th>
				<th width="10">&nbsp;</th>
				<th width="107">Ventas</th>
				<th width="10">&nbsp;</th>
				<th width="107">Producción</th>
				<th width="10">&nbsp;</th>
				<th width="107">Temporales</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border_bottom">
				<td color="#000" width="150" style="text-align:center">'. $empleados_total .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="120" style="text-align:center">'. $empleados_admon .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="107" style="text-align:center">'. $empleados_ventas .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="107" style="text-align:center">'. $empleados_produccion .'</td>
				<th width="10">&nbsp;</th>
				<td color="#000" width="107" style="text-align:center">'. $empleados_temporal .'</td>
			</tr>
		</tbody>
	</table>';

	$exp_data_principales_productos = get_form_ird_principales_productos_detail($id);

	$html .= '<br><br>
		<label>Principales productos (El precio del producto, tomar de referencia el ultimo trimestre)</label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="120">Nombre</th>
					<th width="10">&nbsp;</th>
					<th width="60">Precio</th>
					<th width="10">&nbsp;</th>
					<th width="80">Unidades Vendidas</th>
					<th width="10">&nbsp;</th>
					<th width="250">Descripcion</th>
					<th width="10">&nbsp;</th>
					<th width="80">Porcentaje</th>
				</tr>
			</thead>
			<tbody>';
			foreach($exp_data_principales_productos as $key => $data_principales_productos) {

				$principales_productos_nombre = $data_principales_productos['nombre'];
				$principales_productos_precio = $data_principales_productos['precio'];
				$principales_productos_vendidas = $data_principales_productos['unidades_vendidas'];
				$principales_productos_descripcion = $data_principales_productos['descripcion'];
				$principales_productos_porcentaje = $data_principales_productos['porcentaje'];

				$html .= '<tr class="border_bottom">
					<td color="#000" width="120">'. $principales_productos_nombre .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="60" style="text-align:center">'. $principales_productos_precio .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="80" style="text-align:center">'. $principales_productos_vendidas .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="250">'. $principales_productos_descripcion .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="80" style="text-align:center">'. $principales_productos_porcentaje .'</td>
				</tr>';
			}
		$html .= '</tbody>
		</table>
		<br><br>';

	$html .= '<label>Logistica de ventas y distribucion</label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Describir si utilizan transporte propio o los clientes llegan a recoger productos, etc.</th>
					<th width="10">&nbsp;</th>
					<th width="310">Marcas propias:</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $utiliza_transporte .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $marcas_propias .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>';

	$exp_data_cliente_principales_fuentes = get_form_ird_cliente_principales_fuentes_detail($id);

	$html .= '<br><br>
		<label>X. CLIENTES (es importante en la entrevista con el cliente, saber quienes son sus principales fuentes de ingresos)</label>
		<br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="130">Nombre</th>
					<th width="5">&nbsp;</th>
					<th width="90">Antiguedad</th>
					<th width="5">&nbsp;</th>
					<th width="100">Contacto / Teléfono</th>
					<th width="5">&nbsp;</th>
					<th width="130">Producto</th>
					<th width="5">&nbsp;</th>
					<th width="55">% de ventas</th>
					<th width="5">&nbsp;</th>
					<th width="55">País</th>
					
				</tr>
			</thead>
			<tbody>';
			foreach($exp_data_cliente_principales_fuentes as $key => $data_cliente_principales_fuentes) {

				$cliente_fuentes_nombre = $data_cliente_principales_fuentes['nombre'];
				$cliente_fuentes_antiguedad = $data_cliente_principales_fuentes['antiguedad'];
				$cliente_fuentes_contacto = $data_cliente_principales_fuentes['contacto'];
				$cliente_fuentes_producto = $data_cliente_principales_fuentes['producto'];
				$cliente_fuentes_porcentaje = $data_cliente_principales_fuentes['porcentaje_ventas'];
				$cliente_fuentes_pais = $data_cliente_principales_fuentes['pais'];
				$cliente_fuentes_telefono = $data_cliente_principales_fuentes['telefono'];
				$cliente_fuentes_relacion = $data_cliente_principales_fuentes['relacion'];

				$html .= '<tr class="border_bottom">
					<td color="#000" width="130">'. $cliente_fuentes_nombre .'</td>
					<th width="5">&nbsp;</th>
					<td color="#000" width="90" style="text-align:center">'. $cliente_fuentes_antiguedad .'</td>
					<th width="5">&nbsp;</th>
					<td color="#000" width="100" style="text-align:center">'. $cliente_fuentes_contacto .'</td>
					<th width="5">&nbsp;</th>
					<td color="#000" width="130">'. $cliente_fuentes_producto .'</td>
					<th width="5">&nbsp;</th>
					<td color="#000" width="55" style="text-align:center">'. $cliente_fuentes_porcentaje .'</td>
					<th width="5">&nbsp;</th>
					<td color="#000" width="55" style="text-align:center">'. $cliente_fuentes_pais .'</td>
					
				</tr>';
			}
		$html .= '</tbody>
		</table>
		<br><br>';

	$html .= '<label>Composición de sus ventas</label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">% Locales</th>
					<th width="10">&nbsp;</th>
					<th width="310">% Exterior</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $cliente_composicion_ventas_locales .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $cliente_composicion_ventas_exterior .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>

		<label>Mezcla de Ventas</label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">% Al contado</th>
					<th width="10">&nbsp;</th>
					<th width="310">% Al credito</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $cliente_mezcla_ventas_contado .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $cliente_mezcla_ventas_credito .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>

		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Política de Cuentas por Cobrar</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="auto">'. $cliente_ventas_politica_cobrar .'</td>
				</tr>
			</tbody>
		</table>';
	
	$proveedor_principales_fuentes_detail = get_form_ird_proveedor_principales_fuentes_detail($id);

	$html .= '<br><br>
		<label>XI. PROVEEDOR (es importante en la entrevista con el cliente, conocer quienes son sus principales fuentes de materia prima o productos para revender)</label>
		<br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="150">Nombre</th>
					<th width="10">&nbsp;</th>
					<th width="90">Antiguedad</th>
					<th width="10">&nbsp;</th>
					<th width="80">Contacto / Teléfono</th>
					<th width="10">&nbsp;</th>
					<th width="150">Producto</th>
					<th width="10">&nbsp;</th>
					<th width="55">% de ventas</th>
					<th width="10">&nbsp;</th>
					<th width="55">País</th>
				</tr>
			</thead>
			<tbody>';
			foreach($proveedor_principales_fuentes_detail as $key => $data_proveedor_principales_fuentes) {

				$proveedor_fuentes_nombre = $data_proveedor_principales_fuentes['nombre'];
				$proveedor_fuentes_antiguedad = $data_proveedor_principales_fuentes['antiguedad'];
				$proveedor_fuentes_contacto = $data_proveedor_principales_fuentes['contacto'];
				$proveedor_fuentes_producto = $data_proveedor_principales_fuentes['producto'];
				$proveedor_fuentes_porcentaje = $data_proveedor_principales_fuentes['porcentaje_compras'];
				$proveedor_fuentes_pais = $data_proveedor_principales_fuentes['pais'];

				$html .= '<tr class="border_bottom">
					<td color="#000" width="150">'. $proveedor_fuentes_nombre .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="90" style="text-align:center">'. $proveedor_fuentes_antiguedad .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="80" style="text-align:center">'. $proveedor_fuentes_contacto .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="150">'. $proveedor_fuentes_producto .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="55" style="text-align:center">'. $proveedor_fuentes_porcentaje .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="55" style="text-align:center">'. $proveedor_fuentes_pais .'</td>
				</tr>';
			}
		$html .= '</tbody>
		</table>
		<br><br>';

	$html .= '<label>Composición de sus compras</label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">% Locales</th>
					<th width="10">&nbsp;</th>
					<th width="310">% Exterior</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $cliente_composicion_ventas_locales .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $cliente_composicion_ventas_exterior .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>

		<label>Mezcla de Compras</label>
		<br><br>
		<table color="#757575">
			<thead>
				<tr>
					<th width="310">% Al contado</th>
					<th width="10">&nbsp;</th>
					<th width="310">% Al credito</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="310">'. $cliente_mezcla_ventas_contado .'</td>
					<th width="10">&nbsp;</th>
					<td color="#000" width="310">'. $cliente_mezcla_ventas_credito .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>

		<table color="#757575">
			<thead>
				<tr>
					<th width="310">Política de Cuentas por Pagar</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border_bottom">
					<td color="#000" width="auto">'. $cliente_ventas_politica_cobrar .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>';

	$html .= '<label>XII. RIESGO AMBIENTAL</label>
		<br><br>
		<table border="1" cellpadding="6" color="#757575">
			<tbody>
				<tr>
					<td width="500">Si se dedica a la agricultura (por ejemplo, café, banano, etc.) indicar el tamaño de la propiedad donde se realizará la actividad en hectáreas</td>';

					if ($tiene_dedica_agricultura == 'si') {
						$html .=' <td color="#000" width="130" style="text-align:center">'. $tiene_dedica_agricultura .', '. $dedica_agricultura .'</td>';
					}else{
						$html .=' <td color="#000" width="130" style="text-align:center">'. $tiene_dedica_agricultura .'</td>';
					}

	  $html .= '</tr>
				<tr>
					<td width="500">Si se dedica a construcción indicar el tamaño del área construida en el que se realizara la actividad en m2 (en metros cuadrados) y zona en la que se encuentra ubicada (rural o urbana)</td>';
					if ($tiene_dedica_construccion == 'si') {
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_construccion .', '. $dedica_construccion .'</td>';
					}else{
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_construccion .'</td>';
					}
	  $html .= '</tr>
				<tr>
					<td width="500">Si se dedica a actividades del sector pecuario indicar número de cabezas de ganado</td>';
				if ($tiene_dedica_pecuario == 'si') {
					$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_pecuario .', '. $dedica_pecuario .'</td>';
				}else{
					$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_pecuario .'</td>';
					}
	  $html .= '</tr>
				<tr>
					<td width="500">Si se dedica a actividades de entretenimiento, esparcimiento o deportivas indicar el número de ocupantes</td>';
					if ($tiene_dedica_entrenamiento == 'si') {
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_entrenamiento .', '. $dedica_entrenamiento .'</td>';
					}else{
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_entrenamiento .'</td>';
				}
	  $html .= '</tr>
				<tr>
					<td width="500">Si se dedica al alquiler o arrendamiento de bienes inmuebles indica la antigüedad de este y si fue utilizado en actividades agrícolas, industriales o ganaderas</td>';
					if ($tiene_dedica_alquiler == 'si') {
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_alquiler .', '. $dedica_alquiler .', '. $dedica_alquiler_actividad .'</td>';
					}else{
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_alquiler .'</td>';
					}
	  $html .= '</tr>
				<tr>
					<td width="500">Si se dedica a hotelería indicar el número de habitaciones</td>';
					if ($tiene_dedica_hoteleria == 'si') {
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_hoteleria .', '. $dedica_hoteleria .'</td>';
					}else{
						$html .= '<td color="#000" width="130" style="text-align:center">'. $tiene_dedica_hoteleria .'</td>';
					}
	  $html .= '</tr>
			</tbody>
		</table>
		<br><br>';

	$html .= '<label>XIII. RESPONSABILIDAD SOCIAL EMPRESARIAL (si o no)</label>
		<br><br>
		<table border="1" cellpadding="5" color="#757575">
			<tbody>
				<tr>
					<td width="580">¿Aplica medidas de impacto medio ambiental y social?</td>
					<td color="#000" width="50" style="text-align:center">'. $medio_ambiental .'</td>
				</tr>
				<tr>
					<td width="580">Cuenta con un manual medioambiental y social</td>
					<td color="#000" width="50" style="text-align:center">'. $manual_ambiental .'</td>
				</tr>
				<tr>
					<td width="580">Cuenta con un codigo de etica</td>
					<td color="#000" width="50" style="text-align:center">'. $codigo_etica .'</td>
				</tr>
				<tr>
					<td width="580">Cuenta con una politica anticorrupcion</td>
					<td color="#000" width="50" style="text-align:center">'. $politica_anticorrupcion .'</td>
				</tr>
			</tbody>
		</table>
		<br><br>';

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

	$html_3 = '<br><br><br><br><br><br><br><br><br>
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
$pdf->Output('FORMULARIO COMERCIANTE INDIVIDUAL_'. $id .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+