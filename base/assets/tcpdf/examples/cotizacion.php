<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'coti_header.png';
		$this->Image($image_file, 'C', 6, 200, '', 'PNG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, ' ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom

		//$this->SetY(-15);
		/*
		$image_file = K_PATH_IMAGES.'coti_footer.png';
		$this->Image($image_file, 'C', -15, 200, '', 'PNG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, ' ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
*/
	}
}



$user_id=($_GET['id']);
			
			
setlocale(LC_ALL,"es_ES");
$string = "18/09/2017";
$date = DateTime::createFromFormat("d/m/Y", $string);
$fecha = strftime("%d de %F del %Y",$date->getTimestamp());

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', ' ', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '
<br></br><br></br><br></br><br></br>
<br></br><br></br><br></br>
<p>Guatemala, '.$fecha.'<p>
</br></br>
</br></br>
<p>
<strong>CARNES PROCESADAS, S.A. / SANTA LUCIA</strong><br>
Presente
</p>
<p>
Attn: Licda. Karla Barrios Jefe de Compras <br>
Licenciada Barrios:
</p>
</br></br>
<p>
Con nuestro atento saludo, adjunto tenemos el gusto de presentarle la propuesta de nuestros servicios aduanales de importación, mismos que se detallan así:
</p>

<br></br><br></br><br></br><br></br>
<br></br><br></br><br></br><br></br><br></br>
<br></br><br></br><br></br><br></br>
<br></br><br></br><br></br><br></br><br></br>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->SetFont('dejavusans', ' ', 8);

$html = '
<p align="center">
<strong>NOTA:</strong><br>
</p>
<p>
 ✓ Como valor agregado a nuestros servicios, todas las acciones derivadas de cualquier asunto aduanal que genere gestión administrativa (evacuación de audiencia o cumplimiento con requerimientos de información) no tendrá costo alguno para CARNES PROCESADAS, S.A. y SANTA LUCIA Agotada ésta fase administrativa y proceda algún recurso legal se tasarán los honorarios previamente.<br>
✓ A partir del 2do. Contenedor aplica Q. 250.00 por contenedor adicional. ✓ Las tarifas anteriormente citadas incluyen IVA.<br>
✓ El Crédito de nuestros honorarios y cuenta ajena es de 15 días.<br>
Atentamente,
</p>

Oficinas Centrales:
7a. Avenida 3-33 zona 9 Torre Empresarial Nivel 4 of. 401 Guatemala, Ciudad 01009 Tel.: (502) 24638100 – 2209 6222 info@consultores.com.gt www.consultores.com.gt
  Con nuestro atento saludo, adjunto tenemos el gusto de presentarle la propuesta de nuestros servicios aduanales de importación, mismos que se detallan así:

  
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('cotizacion-id.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
