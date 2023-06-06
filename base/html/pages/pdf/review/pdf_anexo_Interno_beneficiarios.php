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

$id= $_GET['FormNo'];		

class MYPDF extends TCPDF {
    //Page header
    public function Header() {		
        // Logo        
        $image_file = 'images/logo.png';
        $this->Image($image_file, 16, 6, 55, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
       
        $this->SetFont('helvetica', 'B', 11);
        $this->SetXY(60,10);
        $this->MultiCell(150, 0, 'Declaración Jurada de Participación Accionarias (Beneficiarios Finales)' , 0, 'C', 0, 0, '', '', true);

        $this->SetFont('helvetica', 'B', 7);
        $this->SetXY(12,30);
        $this->MultiCell(20, 0, 'Código cliente:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(33,30);
        $this->MultiCell(60, 0, '___________________________________________' , 0, 'L', 0, 0, '', '', true);		

        $this->SetXY(95,30);
        $this->MultiCell(20, 0, 'Lugar y fecha:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(115,30);
        $this->MultiCell(75, 0, '______________________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(12,33);
        $this->MultiCell(30, 0, 'Nombre, razón social o denominación completa:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(43.5,36);
        $this->MultiCell(146.5, 0, '__________________________________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(12,40);
        $this->MultiCell(25, 0, 'Nombre comercial:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(39.2,40);
        $this->MultiCell(151, 0, '_____________________________________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(12,44);
        $this->MultiCell(50, 0, 'Número de identificación tributaria (NIT):' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(62,44);
        $this->MultiCell(50, 0, '____________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(113,44);
        $this->MultiCell(27, 0, 'País de Constitución:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(139.5,44);
        $this->MultiCell(50, 0, '____________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(12,48);
        $this->MultiCell(35, 0, 'Tipo de Sociedad o Entidad:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(47.5,48);
        $this->MultiCell(142, 0, '_______________________________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(12,52);
        $this->MultiCell(25, 0, 'Dirección Completa:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(39.2,52);
        $this->MultiCell(151, 0, '_____________________________________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

    }

	public function Footer() {
	
		$this->SetXY(7,-67);
		$this->SetFont('helvetica', 'B', 6);
		//$this->Cell(10, 0, 'En mi calidad de representante legal,...', 1, false, 'C', 0, '', 0, false, 'T', 'M');	
		$this->MultiCell(202, 0, 'En mi calidad de representante legal, hago constar: a) que los datos personales anteriormente indicados fueron tomados directamente de los registros de la entidad jurídica, por lo que estoy consiente de las implicaciones jurídicas que conllevan si la informacion proporcionada no es verdadera, exonerando desde ya a Arrend Leasing, S.A., de cualquier responsabilidad que pueda surgir producto de ella información cada consignada, b) me comprometo a informar de inmediato a Arrend Leasing, S.A., sobre cualquier cambio en la información acá consignada durante la relación comercial y C) Manifiesto que la documentación que se adjunta a la presente Declaración es verdadera y constituye una fotocopia fiel de su original, por lo que autorizo a Arrend Leasing, S.A. para que pueda confirmar y verificar la información acá proporcionada.' , 1, 'L', 0, 0, '', '', true);
		
        $this->SetXY(7, -25);
        $this->MultiCell(90, 0, 'Firma de Representante Legal:__________________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(98, -25);
        $this->MultiCell(110, 0, 'Lugar y Fecha:________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(7, -21);
        $this->MultiCell(202, 0, 'Nombre del Representante Legal:______________________________________________________________________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(7, -17);
        $this->MultiCell(60, 0, 'Tipo de documento:________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(67, -17);
        $this->MultiCell(60, 0, 'Número:___________________________________________' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(127, -17);
        $this->MultiCell(90, 0, 'Sello de la empresa:' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(7, -10);
        $this->MultiCell(202, 0, 'Nota I: Se deberá anexar copia de documento de identificación, DPI, Pasaporte, NIT, u otro documento que identifique a los beneficiarios finales.' , 0, 'L', 0, 0, '', '', true);

        $this->SetXY(7, -8);
        $this->MultiCell(202, 0, 'Nota II: Al momento de completar el formulario, entregarlo al asesor asignado con el cual realizó su gestión, en un periodo no mayor a 90 días, contados a partir de la fecha de impresión.' , 0, 'L', 0, 0, '', '', true);


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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

$pdf->SetFont('helveticaB', 'B', 8);

// add a page
$pdf->AddPage('P', 'LETTER');

// set cell padding
$pdf->setCellPaddings(0, 0, 0, 0);

// set color for background
$pdf->SetFillColor(255, 255, 255);

// set color text
$pdf->SetTextColor(92,97,99);

	if(isset($id))
	{
		$listadoHeader = "SELECT * FROM beneficiario_socios_accionistas_cabecera WHERE Formulario_No = '$id'";
	    $executeHeader = mysqli_query($connection, $listadoHeader);
		$header = mysqli_fetch_array($executeHeader);		
		
		$itemsReferenciasPersonal = "SELECT * FROM beneficiario_socios_accionistas WHERE Formulario_No = '$id'";
		$itemsPersonal=mysqli_query($connection,$itemsReferenciasPersonal);
		$data = mysqli_fetch_array($itemsPersonal);		

		$listadoConcejo = "SELECT * FROM beneficiario_socios_concejo WHERE Formulario_No = '$id'";
		$executeConcejo = mysqli_query($connection, $listadoConcejo);
		mysqli_fetch_array($executeConcejo);	

		$listadoIve = "SELECT * FROM formulario_iveir2 WHERE Formulario_No = '$id'";
		$executeIve = mysqli_query($connection, $listadoIve);
		$ive = mysqli_fetch_array($executeIve);		
	

		$pdf->SetFont('helvetica', 'B', 7);
		$pdf->SetXY(32,29);
		$pdf->MultiCell(60, 0, $header['codigo_cliente'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(115,29);
		$pdf->MultiCell(50, 0, $header['lugar'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(165,29);
		$pdf->MultiCell(23, 0, $header['fecha'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(44,35.5);
		$pdf->MultiCell(145, 0, $header['razon_social'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(44,39.5);
		$pdf->MultiCell(145, 0, $header['nombre_comercial'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(62,44);
		$pdf->MultiCell(50, 0, $header['nit'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(140,44);
		$pdf->MultiCell(50, 0, $header['pais_constitucion'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(47,48);
		$pdf->MultiCell(50, 0, $header['tipo_sociedad'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(40,52);
		$pdf->MultiCell(149, 0, $header['direccion_completa'], 0, 'C', 0, 0, '', '', true);

		$pdf->SetXY(35,65);
		$pdf->MultiCell(25, 0, $ive['representa_nombre'], 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(60,65);
		$pdf->MultiCell(25, 0, $ive['representa_nombre2'], 0, 'L', 0, 0, '', '', true);
		
		$pdf->SetXY(85,65);
		$pdf->MultiCell(25, 0, $ive['representa_nombre3'], 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(110,65);
		$pdf->MultiCell(25, 0, $ive['representa_apellido'], 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(135,65);
		$pdf->MultiCell(25, 0, $ive['representa_apellido2'], 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(160,65);
		$pdf->MultiCell(25, 0, $ive['representa_apellido3'], 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(50,71);
		$pdf->MultiCell(150, 0, $ive['razon_social2'], 0, 'L', 0, 0, '', '', true);

		$pdf->SetFont('helvetica', 'B', 8);
	    $pdf->SetXY(7,60);
		$pdf->SetLineStyle(array('width' => 0, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
		//$pdf->SetFillColor(0,0,0);
		$pdf->SetTextColor(0,0,0);
		$pdf->MultiCell(202, 4, 'El objetivo de este formulario es identificar socios accinistas, cuyas titularidades de acciones o participación de la misma sean igual o mayor al 10%', 1, 'C', 1, 0);

		$pdf->SetXY(12,65);
		$pdf->MultiCell(23, 0, 'Por lo tanto yo,' , 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(36,65);
		$pdf->MultiCell(164, 0, '________________________________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(12,68);
		$pdf->MultiCell(35, 0, 'en mi calidad de representante legal de,' , 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(48.5,71);
		$pdf->MultiCell(152, 0, '________________________________________________________________________________________________' , 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(12,75);
		$pdf->MultiCell(180, 0, 'declaro que las siguientes personas son los socios o accionistas titulares de la entidad a la cual represento.' , 0, 'L', 0, 0, '', '', true);

		$pdf->SetXY(7,80);
		$pdf->SetLineStyle(array('width' => 0, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
		
		$pdf->SetTextColor(0,0,0);
		$pdf->MultiCell(202, 4, 'DATOS PERSONALES DE LOS SOCIOS ACCIONISTAS', 1, 'C', 1, 0);

		
		

		$nLinea = 85;
		foreach($itemsPersonal as $key => $data){

			if($key>2){
				break;
			}
			$pdf->SetFont('helvetica', 'B', 7);

			$pdf->SetXY(7,$nLinea);
			$pdf->MultiCell(40, 0, 'Nombe Completo / Razón Social:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(48,$nLinea);
			$pdf->MultiCell(100, 0, $data['nombre_completo'] , 0, 'L', 0, 20, '', '', true);
			$pdf->SetXY(150,$nLinea);
			$pdf->MultiCell(28, 0, 'Tipo de identificación:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(180,$nLinea);
			$pdf->MultiCell(25, 0, $data['tipo_identificacion'] , 0, 'L', 0, 20, '', '', true);

			$nLinea = $nLinea + 5;
			$pdf->SetXY(7,$nLinea);
			$pdf->MultiCell(31, 0, 'Numero de Identficación:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(39,$nLinea);
			$pdf->MultiCell(31, 0,  $data['numero_identificacion'] , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(76,$nLinea);
			$pdf->MultiCell(25, 0, 'País de Nacimiento:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(102,$nLinea);
			$pdf->MultiCell(38, 0,  $data['pais_nacimiento'] , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(146,$nLinea);
			$pdf->MultiCell(18, 0, 'Nacionalidad:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(165,$nLinea);
			$pdf->MultiCell(40, 0,  $data['nacionalidad'] , 0, 'L', 0, 0, '', '', true);

			$nLinea = $nLinea + 5;
			$pdf->SetXY(7,$nLinea);
			$pdf->MultiCell(29, 0, 'País de Residencia:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(37,$nLinea);
			$pdf->MultiCell(38, 0,  $data['pais_residencia'] , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(76,$nLinea);
			$pdf->MultiCell(33, 0, 'Porcentaje Accionaria (%):' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(110,$nLinea);
			$pdf->MultiCell(30, 0,  $data['porcentaje_acciones'] , 0, 'L', 0, 0, '', '', true);

			$nLinea = $nLinea + 5;
			$pdf->SetXY(7,$nLinea);
			$pdf->MultiCell(29, 0, 'Dirección Domiciliaria:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(37,$nLinea);
			$pdf->MultiCell(165, 0,  $data['direccion'] , 0, 'L', 0, 0, '', '', true);
			
			$nLinea = $nLinea + 5;
			$pdf->SetXY(7,$nLinea);
			$pdf->MultiCell(29, 0, 'Otro Nacionalidad:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(37,$nLinea);
			$pdf->MultiCell(38, 0,  $data['otra_nacionalidad'] , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(76,$nLinea);
			$pdf->MultiCell(33, 0, 'Fecha de Nacimiento:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(110,$nLinea);
			$pdf->MultiCell(30, 0,  $data['fecha_nacimiento'] , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(146,$nLinea);
			$pdf->MultiCell(26, 0, 'Numero de Teléfono:' , 0, 'L', 0, 0, '', '', true);
			$pdf->SetXY(174,$nLinea);
			$pdf->MultiCell(30, 0,  $data['telefono'] , 0, 'L', 0, 0, '', '', true);

			$nLinea = $nLinea + 5;
			$pdf->SetXY(7,$nLinea);
			$pdf->MultiCell(150, 0, 'Anexe copia del documento de identificación (DPI, Pasaporte, RTU) u otro especifique.' , 0, 'L', 0, 0, '', '', true);
			
			$pdf->SetFont('helvetica', 'B', 10);
			$nLinea = $nLinea + 2;
			$pdf->SetXY(7,$nLinea);
			$pdf->MultiCell(200, 0, "_____________________________________________________________________________________________________" , 0, 'L', 0, 20, '', '', true);
	
			$nLinea = $nLinea + 10;
		}

		$pdf->SetFont('helvetica', 'B', 9);
		$pdf->SetXY(7,190);
		$pdf->SetLineStyle(array('width' => 0, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
		//$pdf->SetFillColor(0,0,0);
		$pdf->SetTextColor(0,0,0);
		$pdf->MultiCell(202, 4, 'Miembros de Concejo de Administración , Junta Directiva, Administrador Único, Directores, Funcionarios Gerenciales u otros similar.', 1, 'C', 1, 0);

		$pdf->setFont('helvetica', 'B', 7);
		$pdf->SetXY(7,194);
		$pdf->MultiCell(10, 0, 'No' , 1, 'C', 0, 0, '', '', true);

		$pdf->SetXY(17,194);
		$pdf->MultiCell(60, 0, 'Nombres y apellidos completos' , 1, 'C', 0, 0, '', '', true);

		$pdf->SetXY(77,194);
		$pdf->MultiCell(40, 0, 'Tipo y Número de Identificación' , 1, 'C', 0, 0, '', '', true);

		$pdf->SetXY(117,194);
		$pdf->MultiCell(30, 0, 'Cargo que Ocupa' , 1, 'C', 0, 0, '', '', true);

		$pdf->SetXY(147,194);
		$pdf->MultiCell(30, 0, 'Nacionalidad' , 1, 'C', 0, 0, '', '', true);

		$pdf->SetXY(177,194);
		$pdf->MultiCell(32, 0, 'Número de teléfono' , 1, 'C', 0, 0, '', '', true);

		

		$linea=197.1;
		$numero=1;
		foreach($executeConcejo as $key => $concejo){
			 if($key>4){
				 break;
			 }
			$pdf->SetXY(7, $linea);
			$pdf->MultiCell(10, 0, $numero, 1, 'C', 0, 0, '', '', true);

			$pdf->SetXY(17,$linea);
			$pdf->MultiCell(60, 0, $concejo['nombre_completo_concejo'], 1, 'C', 0, 0, '', '', true);

			$pdf->SetXY(77,$linea);
			$pdf->MultiCell(17, 0, $concejo['tipo_identificacion_concejo'].':', 0, 'C', 0, 0, '', '', true);

			$pdf->SetXY(77,$linea+0.2);
			$pdf->MultiCell(40, 0, '_____________________________', 0, 'C', 0, 0, '', '', true);

			$pdf->SetXY(94,$linea);
			$pdf->MultiCell(23, 0, $concejo['numero_identificacion_concejo'], 0, 'C', 0, 0, '', '', true);

			$pdf->SetXY(117,$linea);
			$pdf->MultiCell(30, 0, $concejo['cargo_concejo'] , 1, 'C', 0, 0, '', '', true);

			$pdf->SetXY(147,$linea);
			$pdf->MultiCell(30, 0, $concejo['nacionalidad_concejo'], 1, 'C', 0, 0, '', '', true);

			$pdf->SetXY(177,$linea);
			$pdf->MultiCell(32, 0, $concejo['numero_telefono_concejo'], 1, 'C', 0, 0, '', '', true);

			$linea+=3.1;
			$numero+=1;
		}				
	}	

	//$pdf->SetXY(7,256);
	//$pdf->MultiCell(32, 0, 'En mi calidad de ...' , 1, 'C', 0, 0, '', '', true);

	ob_end_clean();

	$pdf->Output('Arrend-cotizacion-.pdf', 'I');
?>
