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

$paises = get_paises_list();
$departamentosFeic = getDepartamentosFeic();	
$municipiosFeic = getMunicipiosFeic();	

$tipoEntidad = getTipoEntidad();
$detalleEntidadLucrativa = getDetalleEntidadLucrativa();
$detalleEntidadNoLucrativa = getDetalleEntidadNoLucrativa();

$_SESSION['user'];
$usuario = $_SESSION['user'];

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo.jpg';
        $image_file = 'images/logo.png';
        $this->Image($image_file, 75, 6, 55, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
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
$pdf->SetMargins(5, PDF_MARGIN_TOP, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
// 	require_once(dirname(__FILE__).'/lang/spa.php');
// 	$pdf->setLanguageArray($l);
// }

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 14, '', true);
//$pdf->SetLeftMargin(15);


// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.0, 'depth_h'=>0.0, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$id= $_GET['id'];
$query= "SELECT f.*, p.nombre AS nombre_pais
FROM `feic_informacion_general` f
LEFT JOIN pais p ON p.idSap = f.informacion_general_pais where f.id = 	$id;";

$result =mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);


$igPais= mysqli_fetch_array(getPaisById($row['informacion_general_pais']));
$igDepartamento= mysqli_fetch_array(getDepartamentoById($row['informacion_general_departamento']));
$igMunicipio= mysqli_fetch_array(getMunicipioById($row['informacion_general_municipio']));
$html = '<style>
		h1 { font-size: 18px; text-align:center; color: #000;}
		
		table th {font-size:12px; padding:0px;}
		table td {font-size:10px; padding:0px;}
	</style>
	<h1 class="page-title">FORMULARIO PERSONA JURIDICA</h1>
	
	<br><br>
	<table style="border:1px" color="#000" border="1" cellpadding="12">
		<thead>
			<tr bgcolor="#203347" color="#fff">
				<th  align="left" colspan="4">LUGAR y FECHA</th>
			</tr>
			<tr>
				<th>País</th>
				<th>Departamento</th>
				<th>Municipio</th>
				<th>Fecha</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center">'.$igPais['nombre'].'</td>
				<td align="center">'.$igDepartamento['nombre'].'</td>
				<td align="center">'.$igMunicipio['nombre'].'</td>
				<td align="center">'.date('d/m/Y', strtotime($row['created_at'])).'</td>
			</tr>
		</tbody>
	</table>';

$detalleTipoEntidad=null;
switch ($row['tipo_entidad']) {
	case 'A':
		$detalleTipoEntidad=$row['tipo_entidad_lucrativa'];
		break;
	case 'B':
		$detalleTipoEntidad=$row['tipo_entidad_no_lucrativa'];
		break;
	case 'E':
		$detalleTipoEntidad=$row['tipo_entidad_otra'];
		break;
	default:
	$detalleTipoEntidad=null;
		break;
}

$paisJurisdiccionConstitucion= mysqli_fetch_array(getPaisById($row['informacion_general_pais_constitucion']));
$direccionSocialPais= mysqli_fetch_array(getPaisById($row['informacion_general_direccion_pais']));
$direccionSocialDepartamento= mysqli_fetch_array(getDepartamentoById($row['informacion_general_departamento']));
$direccionSocialMunicipio= mysqli_fetch_array(getMunicipioById($row['informacion_general_municipio']));
$rlTelelefonos = getRepresentanteLegalTelefonos($row['codigo_cliente']);
$rlTelefonoArray= array();
while ($rlTelefonosList = mysqli_fetch_array($rlTelelefonos)) {
	array_push($rlTelefonoArray,$rlTelefonosList['telefono']);
}
$html .='<br><br>
	<table style="border:1px" color="#000" border="1" cellpadding="12">
		<thead>
			<tr bgcolor="#203347" color="#fff">
				<th align="left" colspan="6">DATOS DE IDENTIFICACIÓN DEL CLIENTE</th>
			</tr>
			<tr>
				<th ><b>NIT</b></th>
				<th ><b>Tipo de entidad</b> </th>
				<th ><b>Tipo de entidad</b></th>
				<th ><b>Especifique</b></th>
				<th ><b>Fecha de inscripción</b></th>
				<th ><b>País o Jurisdicción de constitución</b></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td color="#000">'. $row['informacion_general_nit'] .'</td>
				<td color="#000">'. $row['tipo_entidad'] .'</td>
				<td color="#000">'. $detalleTipoEntidad .'</td>
				<td color="#000"></td>
				<td color="#000">'. date('d/m/Y', strtotime($row['informacion_general_fecha_inscripcion'])) .'</td>
				<td color="#000">'. $paisJurisdiccionConstitucion['nombre'] .'</td>
			</tr>

			<tr>
				<td colspan="3" color="#000"><b>¿La entidad es una Sociedad en Formación?</b></td>
				<td colspan="3" color="#000"></td>
			</tr>

			<tr>
				<td colspan="3" color="#000"><b>Nombre, razón social o denominación completa</b></td>
				<td colspan="3" color="#000"><b>Nombre comercial</b></td>
			</tr>

			<tr>
				<td colspan="3" color="#000">'.$row['informacion_general_nombre_razon_social'].'</td>
				<td colspan="3" color="#000">'.$row['informacion_general_nombre_comercial'].'</td>
			</tr>

			<tr>
				<td colspan="6" color="#000">Dirección de sede social completa (calle o avenida, número de casa, colonia, sector, lote, manzana, otros)</td>
			</tr>
			<tr>
				<td colspan="6" color="#000">'.$row['informacion_general_direccion_completa'].'</td>
			</tr>


			<tr>
				<td colspan="2" color="#000"><b>País</b></td>
				<td colspan="2" color="#000"><b>Departamento</b></td>
				<td colspan="1" color="#000"><b>Municipio</b></td>
				<td colspan="1" color="#000"><b>Zona</b></td>
			</tr>

			<tr>
				<td colspan="2" color="#000">'.$direccionSocialPais['nombre'].'</td>
				<td colspan="2" color="#000">'.$direccionSocialDepartamento['nombre'].'</td>
				<td colspan="1" color="#000">'.$direccionSocialMunicipio['nombre'].'</td>
				<td colspan="1" color="#000">'.$row['informacion_general_direccion_zona'].'</td>
				
			</tr>

			<tr>
				<td colspan="3" color="#000"><b>Correo electrónico </b></td>
				<td colspan="3" color="#000">'.$row['informacion_general_correo_electronico'].'</td>
			</tr>

			<tr>
				<td colspan="3" color="#000"><b>Página de internet / sitio web </b></td>
				<td colspan="3" color="#000">'.$row['informacion_general_sitio_web'].'</td>
			</tr>

			<tr>
				<td colspan="3" color="#000"><b>Correo electrónico </b></td>
				<td colspan="3" color="#000">'.implode(', ', $rlTelefonoArray).'</td>
			</tr>
			
			<tr>
				<td colspan="6" bgcolor="#a2814b" color="#000"><b>SOCIEDADES MERCANTILES </b></td>
			</tr>
			<tr>
				<td colspan="6"  bgcolor="#97999b" color="#000"><b>Datos de la escritura pública de constitución del cliente </b></td>
			</tr>



			<tr>
				<td colspan="2" color="#000"><b>Número de escritura </b></td>
				<td colspan="2" color="#000"><b>Fecha de la escritura </b></td>
				<td colspan="2" color="#000"><b>Notario autorizante </b></td>
			</tr>

			<tr>
				<td colspan="2" color="#000">'.$row['sociedad_mercantil_escritura_numero'].'</td>
				<td colspan="2" color="#000">'.$row['sociedad_mercantil_escritura_fecha'].'</td>
				<td colspan="2" color="#000">'.$row['sociedad_mercantil_notario_autorizante'].'</td>
			</tr>

			


		</tbody>
	</table>

	<br><br>
	<table style="border:1px" color="#000" border="1" cellpadding="12">
		
		<tr>
			<td colspan="6" bgcolor="#a2814b" color="#000"><b>MODIFICACIONES A LA ESCRITURA PÚBLICA DE CONSTITUCIÓN DEL CLIENTE</b></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#97999b" color="#000"><b>Datos del registro (Patente de sociedad) </b></td>
		</tr>

		<tr>
			<td colspan="2" color="#000"><b>Número de Registro </b></td>
			<td colspan="2" color="#000"><b>Folio</b></td>
			<td colspan="2" color="#000"><b>Libro</b></td>
		</tr>

		<tr>
			<td colspan="2" color="#000">'.$row['patente_sociedad_numero_registro'].'</td>
			<td colspan="2" color="#000">'.$row['patente_sociedad_numero_folio'].'</td>
			<td colspan="2" color="#000">'.$row['patente_sociedad_numero_libro'].'</td>
		</tr>
	</table>';
	
	
	$html .='<br><br>
	<table style="border:1px" color="#000" border="1" cellpadding="12">
		
		<tr>
			<td colspan="6"  color="#000"><b>¿El cliente posee accionistas, socios, asociados con el 10% o más de acciones o participación bajo su control? </b></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#0099cb" color="#000"><b>III. ESTRUCTURA ACCIONARIA O DE PARTICIPACIÓN DEL CLIENTE</b></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#79cef7" color="#000"><b>Accionistas, socios, asociados con el 10% o más de acciones o participación bajo su control.</b></td>
		</tr>

		<tr>
			<td colspan="4" color="#000"><b>Accionista</b></td>
			<td colspan="1" color="#000"><b>% Participación</b></td>
			<td colspan="1" color="#000"><b>Extranjero</b></td>
		</tr>';

		$estructuraAccionariaIndividualList = get_estructura_accionaria_individual($row['id']);
		if (mysqli_num_rows($estructuraAccionariaIndividualList) > 0) {
			$eai = 1;
			while ($estructuraAccionariaIndividualListRow = mysqli_fetch_array($estructuraAccionariaIndividualList)) {


			$html .='<tr>
				<td colspan="4" color="#000">'.$row['accionista'].'</td>
				<td colspan="1" color="#000">'.$row['participacion'].'</td>
				<td colspan="1" color="#000">'.$row['extranjer'].'</td>
			</tr>';
			$eai++;
			}
		}

		$html .='</table>';


	$html .='<br><br>
	<table style="border:1px" color="#000" border="1" cellpadding="12">
		<tr>
			<td colspan="6" bgcolor="#ffc847" color="#000"><b>INTEGRACIÓN DEL ÓRGANO SUPERIOR DEL CLIENTE</b></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#fffcd8" color="#000"><b>Miembros del Consejo de Aministración, Junta Directiva, Órgano Superior, Administrador Único o similar</b></td>
		</tr>';

		$organoSuperiorList = get_organo_superior($row['id']);
		if (mysqli_num_rows($organoSuperiorList) > 0) {
			$osCounter = 1;
			while ($organoSuperiorListRow = mysqli_fetch_array($organoSuperiorList)) {

			$html .='
			<tr>
				<td colspan="4" color="#000"><b>Nombre del miembro</b></td>
				<td colspan="2" color="#000"><b>Extranjero</b></td>
			</tr>
			<tr>
				<td colspan="4" color="#000">'.$organoSuperiorListRow['primer_nombre'] .' '.$organoSuperiorListRow['segundo_nombre'] .' '.$organoSuperiorListRow['primer_apellido'] .' '.$organoSuperiorListRow['segundo_apellido'].'</td>
				<td colspan="2" color="#000">'.$organoSuperiorListRow['tipo_id'].'</td>
			</tr>
			
			<tr>
				<td colspan="1" color="#000"><b>Docto. ID</b></td>
				<td colspan="1" color="#000"><b>Número ID </b></td>
				<td colspan="2" color="#000"><b>País (Pasaporte)</b></td>
				<td colspan="2" color="#000"><b>Cargo que ocupa</b></td>
			</tr>

			<tr>
			<td colspan="1" color="#000">'.$organoSuperiorListRow['tipo_documento_concejo'].'</td>
			<td colspan="1" color="#000">'.$organoSuperiorListRow['numero_id'].'</td>
			<td colspan="2" color="#000">'.$organoSuperiorListRow['cargo_ocupa'].'</td>
			<td colspan="2" color="#000">'.$organoSuperiorListRow['miembro_concejo_extranjero'].'</td>
			</tr>
			
			';
			$osCounter++;
			}
		}
	
	
	$html .='</table>';

	$html .='<br><br>
	<table style="border:1px" color="#000" border="1" cellpadding="12">
		<tr>
			<td colspan="6" bgcolor="#203347" color="#fff"><b>OTRA INFORMACIÓN</b></td>
		</tr>

		<tr>
			<td colspan="4" color="#000"><b>¿La entidad solicitante es CPE?</b></td>
			<td colspan="2" color="#000">'.$row['entidad_solicitante_cpe'].'</td>
		</tr>
	</table>';




	$html .='<br><br>
	<table style="border:1px" color="#000" border="1" cellpadding="12">
		<tr>
			<td colspan="6" bgcolor="#203347" color="#fff"><b>DATOS DEL REPRESENTANTE LEGAL DEL CLIENTE</b></td>
		</tr>
		<tr>
			<td colspan="6" bgcolor="#97999b" color="#fff"><b>Información del representante</b></td>
		</tr>


		<tr>
			<td colspan="1" color="#000"><b>Primer nombre</b></td>
			<td colspan="1" color="#000"><b>Segundo nombre</b></td>
			<td colspan="1" color="#000"><b>Otros nombres</b></td>
			<td colspan="1" color="#000"><b>Primer apellido</b></td>
			<td colspan="1" color="#000"><b>Segundo apellido</b></td>
			<td colspan="1" color="#000"><b>Apellido casada</b></td>
		</tr>

		<tr>
			<td colspan="1" color="#000">'.$row['representante_legal_primer_nombre'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_segundo_nombre'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_otros_nombres'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_primer_apellido'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_segundo_apellido'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_otros_apellidos'].'</td>
		</tr>

		<tr>
			<td colspan="1" color="#000"><b>Docto. ID</b></td>
			<td colspan="1" color="#000"><b>Número ID</b></td>
			<td colspan="1" color="#000"><b>País (Pasaporte)</b></td>
			<td colspan="1" color="#000"><b>NIT</b></td>
			<td colspan="1" color="#000"><b>Sexo</b></td>
			<td colspan="1" color="#000"><b>Fecha nacimiento</b></td>
		</tr>

		<tr>
			<td colspan="1" color="#000">'.$row['representante_legal_tipoid'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_numero_id'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_pais_pasaporte'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_nit'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_sexo'].'</td>
			<td colspan="1" color="#000">'.date('d/m/Y', strtotime($row['representante_legal_fecha_nacimiento'])).'</td>
		</tr>

		<tr>
			<td colspan="2" bgcolor="#fff" color="#000"><b>Nacionalidades </b></td>
			<td colspan="4" bgcolor="#fff" color="#000"></td>
		</tr>


		<tr>
			<td colspan="2" color="#000"><b>País nacimiento</b></td>
			<td colspan="1" color="#000"><b>Departamento nacimiento</b></td>
			<td colspan="1" color="#000"><b>Municipio nacimiento</b></td>
			<td colspan="1" color="#000"><b>Condición migratoria</b></td>
			<td colspan="1" color="#000"><b>Especifique</b></td>
		</tr>

		<tr>
			<td colspan="2" color="#000">'.$row['representante_legal_pais_nacimiento'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_departamento_nacimiento'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_municipio_nacimiento'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_condicion_migratoria'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_condicion_migratoria_otra'].'</td>
		</tr>

		<tr>
			<td colspan="2" color="#000"><b>Estado civil</b></td>
			<td colspan="2" color="#000"><b>Profesión u oficio</b></td>
			<td colspan="2" color="#000"><b>Correo electrónico</b></td>
		</tr>

		<tr>
			<td colspan="2" color="#000">'.$row['representante_legal_estado_civil'].'</td>
			<td colspan="2" color="#000">'.$row['representante_legal_profesion'].'</td>
			<td colspan="2" color="#000">'.$row['representante_legal_correo_electronico'].'</td>
		</tr>

		<tr>
			<td colspan="6" color="#000"><b>Dirección de residencia completa del representante legal (calle o avenida, número de casa, colonia, sector, lote, manzana, otros)</b></td>
		</tr>

		<tr>
			<td colspan="6" color="#000">'.$row['representante_legal_direccion_completa'].'</td>
		</tr>

		<tr>
			<td colspan="2" color="#000"><b>País</b></td>
			<td colspan="2" color="#000"><b>Departamento</b></td>
			<td colspan="1" color="#000"><b>Municipio</b></td>
			<td colspan="1" color="#000"><b>Zona</b></td>
		</tr>

		<tr>
			<td colspan="2" color="#000">'.$row['representante_legal_direccion_pais'].'</td>
			<td colspan="2" color="#000">'.$row['representante_legal_direccion_departamento'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_direccion_municipio'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_direccion_zona'].'</td>
		</tr>

		<tr>
			<td colspan="3" color="#000"><b>Telefonos</b></td>
			<td colspan="3" color="#000"><b></b></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#97999b" color="#000"><b>Información de la Inscripción de la Representación Legal</b></td>
		</tr>

		<tr>
			<td colspan="1" color="#000"><b>Plazo de nombramiento</b></td>
			<td colspan="1" color="#000"><b>Fecha inicial </b></td>
			<td colspan="1" color="#000"><b>Fecha final</b></td>
			<td colspan="2" color="#000"><b>Nombre de quien autoriza el documento</b></td>
			<td colspan="1" color="#000"><b>Cargo para el que se le nombró</b></td>
		</tr>

		<tr>
			<td colspan="1" color="#000">'.$row['representante_legal_plazo_nombramiento'].'</td>
			<td colspan="1" color="#000">'.date('d/m/Y', strtotime($row['representante_legal_fecha_inicial'])).'</td>
			<td colspan="1" color="#000">'.date('d/m/Y', strtotime($row['representante_legal_fecha_final'])).'</td>
			<td colspan="2" color="#000">'.$row['representante_legal_nombre_quien_autoriza'].'</td>
			<td colspan="2" color="#000">'.$row['representante_legal_cargo_que_se_nombro'].'</td>
		</tr>

		<tr>
			<td colspan="1" color="#000"><b>Número de registro</b></td>
			<td colspan="1" color="#000"><b>Folio</b></td>
			<td colspan="1" color="#000"><b>Libro</b></td>
			<td colspan="3" color="#000"><b>Nombre del registro</b></td>
		</tr>

		<tr>
			<td colspan="1" color="#000">'.$row['representante_legal_numero_registro'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_numero_folio'].'</td>
			<td colspan="1" color="#000">'.$row['representante_legal_numero_libro'].'</td>
			<td colspan="3" color="#000">'.$row['representante_legal_nombre_del_registro'].'</td>
		</tr>

		<tr>
			<td colspan="4" bgcolor="#97999b" color="#000"><b>¿El representante legal del cliente es PEP?</b></td>
			<td colspan="2" bgcolor="#97999b" color="#000"><b>'.$row['representante_legal_es_pep'].'</b></td>
		</tr>

		<tr>
			<td colspan="4" bgcolor="#97999b" color="#000"><b>¿El representante legal del cliente tiene parentesco con una PEP?</b></td>
			<td colspan="2" bgcolor="#97999b" color="#000"><b>'.$row['representante_legal_pep_entidad'].'</b></td>
		</tr>

		<tr>
			<td colspan="4" bgcolor="#97999b" color="#000"><b>¿El representante legal del cliente es PEP?</b></td>
			<td colspan="2" bgcolor="#97999b" color="#000"><b>'.$row['representante_legal_pep_puesto'].'</b></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#203347" color="#fff"><b>INFORMACIÓN ECONÓMICA DEL CLIENTE</b></td>
		</tr>
		<tr>
			<td colspan="6" bgcolor="#97999b" color="#fff"><b>Información economica inicial</b></td>
		</tr>

		<tr>
			<td colspan="3"  color="#000"><b>Fecha</b></td>
			<td colspan="3"  color="#000"><b>'.$row['informacion_economica_fecha'].'</b></td>
		</tr>

		<tr>
			<td colspan="3"  color="#000"><b>Actividad económica según RTU</b></td>
			<td colspan="3"  color="#000"><b>'.$row['informacion_economica_actividad_economica_rtu'].'</b></td>
		</tr>

		<tr>
			<td colspan="3"  color="#000"><b>Detalle a qué se dedica especificamente el cliente</b></td>
			<td colspan="3"  color="#000"><b>'.$row['informacion_economica_actividad_economica_rtu'].'</b></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#ffc847" color="#000"><b>MONTOS DE INGRESOS</b></td>
		</tr>

		<tr>
			<td colspan="3" color="#000"><b>Moneda</b></td>
			<td colspan="3" color="#000"><b>Monto</b></td>
		</tr>

		<tr>
			<td colspan="3" color="#000">QUETZAL</td>
			<td colspan="3" color="#000">1111</td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#ffc847" color="#000"><b>MONTOS DE EGRESOS</b></td>
		</tr>

		<tr>
			<td colspan="3" color="#000"><b>Moneda</b></td>
			<td colspan="3" color="#000"><b>Monto</b></td>
		</tr>

		<tr>
			<td colspan="3" color="#000">QUETZAL</td>
			<td colspan="3" color="#000"></td>
		</tr>

		<tr>
			<td colspan="6" bgcolor="#ffc847" color="#000"><b>Propósito de la relación de negocios</b></td>
		</tr>
		<tr>
			<td colspan="6"  color="#000"></td>
		</tr>


	</table>';





$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html_3, 0, 1, 0, true, '', true);

/* Limpiamos la salida del búfer y lo desactivamos */
ob_end_clean();
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('FORMULARIO PERSONA JURIDICA_'. $id .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
