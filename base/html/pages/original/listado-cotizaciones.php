<?php
//============================================================+
// File name   : 
// Begin       : 
// Last Update : 
//
// Description : 
//               
//
// Author: 
//
// (c) Copyright:
//============================================================+
require_once "conexion.php";
require_once "funciones.php";

// if (isset($_POST['submit'])) {

// 	$detalle_id = html_entity_decode($_POST['detalle']);
// 	$id = html_entity_decode($_POST['id']);
// }

// echo $detalle_id; 
// echo $id;
        // echo '<script type="text/javascript">alert("'. $detalle_id .'")</script>';
        // die;



setlocale(LC_ALL, 'es_GT');


$fecha_documento = date('d-m-Y');
$id == 1;

//DISCIERNE ENTRE DESPLEGAR LA HOJA EN ESPECIFICO O 
//TODAS LAS QUE TIENE EL USUARIO
// if ($id >=1) {
// 	//echo "uno..."; die;
// 	include('assets/db/busca-detalle.php');

// } else {
// 	//echo 'todos...'; echo $id_equipo; die;
// 	include('assets/db/busca-detalle-hr.php');

// }


$exp_data = get_leads_list();
$total_records = mysqli_num_rows(count_leads_list());
$total_pages = ceil($total_records / $page_limit);

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
		// set bacground image
		//Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false);
		$img_file = 'images/header_logo.png';	
		$this->Image($img_file, 2, 2, 45, 15, 'png', '', 'L', false, 600, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}

	    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        //$this->Cell(0, 10,"PAGINA " . $current_page. " DE ". $total_pages, 0, 'L', 0, 0, '', '', true);
    }
}




//============================================================+
// BEGINNING OF FILE
//============================================================+
$height = "279.4";
$width = "215.9";
$pagesize = array($width,$height);

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ArrendLeasing');
$pdf->SetTitle('Listado de Cotizaciones');
$pdf->SetSubject('Carmarket Listado de Cotizaciones');
$pdf->SetKeywords('');

$pdf->setJPEGQuality(300);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(5, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(true);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
// 	require_once(dirname(__FILE__).'/lang/eng.php');
// 	$pdf->setLanguageArray($l);
// }

// --------------------------------------------------------

$page_limit = "20";



while ($db_var = mysqli_fetch_assoc($exp_data)) {
    $id     = $db_var["id"];
    $name   = $db_var["name"];
    $email  = $db_var["email"];
    $phone  = $db_var["phone"];


    $detalle = json_decode($db_var["preview"], true);

    $vehicle = $detalle['results'][0]['vehicle']['brand'];
    $vehicle.= ", ". $detalle['results'][0]['vehicle']['model'];
    $vehicle.= ", ". $detalle['results'][0]['vehicle']['year'];                         
    $valor_bien = $detalle['results'][0]['valor'];

    $moneda_simbolo = $detalle['results'][0]['moneda'];

    if ($moneda_simbolo = 'Quetzales') {
      $moneda = 'Q';
    }else{
      $moneda = '$';
    }
    
    $vehicle.= ", ". $detalle['results'][0]['vehicle']['pdf']['detail'][8];
    $fecha_coti = $detalle['results'][0]['fecha'];

    if (array_key_exists('agent',$detalle['results'][0])) {        
      $agente_arrend = $detalle['results'][0]['agent']['name'];
    }else{
      $agente_arrend = 'N/A';
    } 

}


// echo $id;
// echo $name;
// echo $email;
// echo $phone;
// echo $nit;
// echo $dpi;
// echo $vehicle;
// echo $moneda. number_format($valor_bien,2);
// echo $fecha_coti;
// echo $agente_arrend;



	$current_page = "1";
	//$total_pages = "1";

	// // add a page
	$pdf->AddPage('L', $pagesize);

	// // // set cell padding
	$pdf->setCellPaddings(0, 0, 0, 0);

	// // // set cell margins
	$pdf->setCellMargins(1, 1, 1, 1);

	// // // set color for background
	$pdf->SetFillColor(255, 255, 255);

	$pdf->SetFont('helveticaB', 'B', 10);
	$pdf -> SetXY(110,10);
	$pdf->MultiCell(105, 0, "LISTADO DE COTIZACIONES - CARMARKET", 0, 'L', 0, 0, '', '', true);

	// //============================================================================================
	// // STRUCTURE OF CELL AND MULTICELL FUNCTIONS
	// //============================================================================================
	// //Cell( $w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '', $stretch = 0, $ignore_min_height = false, $calign = 'T', $valign = 'M' )

	// // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
	// //============================================================================================

	// $pdf->SetFont('helveticaB', 'B', 10);
	// $pdf -> SetXY(180,4);
	// $pdf->MultiCell(105, 0,"PAGINA " . $current_page. " DE ". $total_pages, 0, 'L', 0, 0, '', '', true);

	// // // ---------------------------------------------------------
	// // // NOMBRE DEL COLABORADOR
	// // // ---------------------------------------------------------

	// $pdf->SetFont('helveticaB', 'B', 10);
	// $pdf -> SetXY(42,37);
	// $pdf->MultiCell(105, 0, $nombre, 0, 'L', 0, 0, '', '', true);
	// // //echo '<script type="text/javascript">alert("' . $serie_dte . '")</script>';
	// // // ---------------------------------------------------------

	// // // ---------------------------------------------------------
	// // // PUESTO
	// // // ---------------------------------------------------------
	// $pdf->SetFont('helveticaB', 'B', 10);
	// $pdf -> SetXY(42,44.5);
	// $pdf->MultiCell(105, 0, $puesto, 0, 'L', 0, 0, '', '', true);
	// // // ---------------------------------------------------------
	// // // ---------------------------------------------------------
	// // // DEPARTAMENTO
	// // // ---------------------------------------------------------
	// $pdf->SetFont('helveticaB', 'B', 10);
	// $pdf -> SetXY(42,51.5);
	// $pdf->MultiCell(105, 0, $departamento, 0, 'L', 0, 0, '', '', true);

	// // // ---------------------------------------------------------
	// // // ---------------------------------------------------------
	// $image_path = "assets/code-39/" . $serial_number . ".png";
	
	// ---------------------------------------------------------
	// LOGO
	// ---------------------------------------------------------


	// $logo_path = "images/header_logo.png";


	// if(is_readable($logo_path)){
	// // echo '<script type="text/javascript">alert("' . $logo_path . '")</script>';
	// // die;	

	// 	$pdf -> SetXY(1,1);
	// 	$html = '<div>
	// 	<table border="0">
	// 		<tr>
	// 			<td align="left" width="681">
	// 				<img src="' . $logo_path . '" alt="Arrend Leasing" width="300" height="82" border="0" />
	// 			</td>
	// 		</tr>
	// 	</table>
	// 	</div>';
	// 	//echo $html; die;
	// 	$pdf -> writeHTML($html, true, false, true, false, '');
	// }



	

// 	// // ---------------------------------------------------------
// 	// // TIPO DE BIEN
// 	// // ---------------------------------------------------------
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,73.5);
// 	$pdf->MultiCell(105, 0, $tipo_bien, 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // DETALLE
// 	// // ---------------------------------------------------------
// 	$detalle = "MARCA : " . $brand."\n" . "MODELO : " . $model."\n" . "S/O : " . $os."\n" . "COLOR : " . $finish;
// 	$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,82.5);
// 	$pdf->MultiCell(105, 10, $detalle , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------
 
// 	// // ---------------------------------------------------------
// 	// // DETALLE
// 	// // ---------------------------------------------------------
// 	$caracteristicas = "PROCESADOR : " . $processor."\n" . "ALMACENAMIENTO : " .  $storage."\n" . "RAM : " .  $ram."\n" . "GRAFICOS : " .  $graphics_card."\n" . "PUERTOS : " .  $ports;
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,115.5);
// 	$pdf->MultiCell(105, 10, $caracteristicas , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // PERIFERICOS
// 	// // ---------------------------------------------------------
// 	$perifericos = "Keyboard / Mouse : " . $keyboard_mouse."\n" . "Bluetooth : ". $bluetooth;
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,160.5);
// 	$pdf->MultiCell(105, 10, $perifericos , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // CONECTIVIDAD
// 	// // ---------------------------------------------------------
// 	$conectividad = "WiFi : " . $wi_fi;
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,183);
// 	$pdf->MultiCell(105, 10, $conectividad , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // AUDIO
// 	// // ---------------------------------------------------------
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,201.5);
// 	$pdf->MultiCell(105, 10, $audio , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // EXTRAS
// 	// // ---------------------------------------------------------
// 	$extras = "Camara : " . $camera ."\n" . "Bateria : " . $battery."\n" . "Garantia :". $warranty_exp_date;
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,217);
// 	$pdf->MultiCell(105, 10, $extras , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// } else {


// 	for ($x = 1; $x <= $pages; $x++) {
// 		$current_page = $x;
// 		$total_pages = $pages;

// 	// // add a page
// 	$pdf->AddPage('P', $pagesize);

// 	// // // set cell padding
// 	$pdf->setCellPaddings(0, 0, 0, 0);

// 	// // // set cell margins
// 	// // $pdf->setCellMargins(1, 1, 1, 1);

// 	// // // set color for background
// 	$pdf->SetFillColor(255, 255, 255);

// 	// //============================================================================================
// 	// // STRUCTURE OF CELL AND MULTICELL FUNCTIONS
// 	// //============================================================================================
// 	// //Cell( $w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '', $stretch = 0, $ignore_min_height = false, $calign = 'T', $valign = 'M' )

// 	// // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
// 	// //============================================================================================

// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(180,4);
// 	$pdf->MultiCell(105, 0,"PAGINA " . $current_page. " DE ". $total_pages, 0, 'L', 0, 0, '', '', true);

// 	// // ---------------------------------------------------------
// 	// // NOMBRE DEL COLABORADOR
// 	// // ---------------------------------------------------------

// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,37);
// 	$pdf->MultiCell(105, 0, $nombre[$x], 0, 'L', 0, 0, '', '', true);
// 	// //echo '<script type="text/javascript">alert("' . $serie_dte . '")</script>';
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // PUESTO
// 	// // ---------------------------------------------------------
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,44.5);
// 	$pdf->MultiCell(105, 0, $puesto[$x], 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------
// 	// // ---------------------------------------------------------
// 	// // DEPARTAMENTO
// 	// // ---------------------------------------------------------
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,51.5);
// 	$pdf->MultiCell(105, 0, $departamento[$x], 0, 'L', 0, 0, '', '', true);

// 	// ---------------------------------------------------------
// 	// // ---------------------------------------------------------
// 	$image_path = "assets/code-39/" . $serial_number[$x] . ".png";

// 	// ---------------------------------------------------------
// 	// CODIGO QR
// 	// ---------------------------------------------------------
// 	 //echo '<script type="text/javascript">alert("codigo qr")</script>';
// 	if(is_readable($image_path)){

// 		$pdf -> SetXY(201,34.5);
// 		$html = '<div>
// 		<table border="0">
// 			<tr>
// 				<td align="right" width="681">
// 					<img src="' . $image_path . '" alt="Codigo 3 de 9" width="189" height="82" border="0" />
// 				</td>
// 			</tr>
// 		</table>
// 		</div>';
// 	//echo $html; die;
// 	$pdf -> writeHTML($html, true, false, true, false, '');

// 	} 


// 	// // ---------------------------------------------------------
// 	// // TIPO DE BIEN
// 	// // ---------------------------------------------------------
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,73.5);
// 	$pdf->MultiCell(105, 0, $tipo_bien[$x], 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // DETALLE
// 	// // ---------------------------------------------------------
// 	$detalle = "MARCA : " . $brand[$x]."\n" . "MODELO : " . $model[$x]."\n" . "S/O : " . $os[$x]."\n" . "COLOR : " . $finish[$x];
// 	$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,82.5);
// 	$pdf->MultiCell(105, 10, $detalle , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------



 
// 	// // ---------------------------------------------------------
// 	// // DETALLE
// 	// // ---------------------------------------------------------
// 	$caracteristicas = "PROCESADOR : " . $processor[$x]."\n" . "ALMACENAMIENTO : " .  $storage[$x]."\n" . "RAM : " .  $ram[$x]."\n" . "GRAFICOS : " .  $graphics_card[$x]."\n" . "PUERTOS : " .  $ports;
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,115.5);
// 	$pdf->MultiCell(105, 10, $caracteristicas , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // PERIFERICOS
// 	// // ---------------------------------------------------------
// 	$perifericos = "Keyboard / Mouse : " . $keyboard_mouse[$x]."\n" . "Bluetooth : ". $bluetooth[$x];
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,160.5);
// 	$pdf->MultiCell(105, 10, $perifericos , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // CONECTIVIDAD
// 	// // ---------------------------------------------------------
// 	$conectividad = "WiFi : " . $wi_fi[$x];
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,183);
// 	$pdf->MultiCell(105, 10, $conectividad , 0, 'L', 0, 0, '', '', true);
// 	// ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // AUDIO
// 	// // ---------------------------------------------------------
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,201.5);
// 	$pdf->MultiCell(105, 10, $audio[$x] , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------

// 	// // ---------------------------------------------------------
// 	// // EXTRAS
// 	// // ---------------------------------------------------------
// 	$extras = "Camara : " . $camera[$x] ."\n" . "Bateria : " . $battery[$x]."\n" . "Garantia :". $warranty_exp_date[$x];
// 	//$pdf->SetFillColor(249,249,249); // Grey
// 	$pdf->SetFont('helveticaB', 'B', 10);
// 	$pdf -> SetXY(42,217);
// 	$pdf->MultiCell(105, 10, $extras , 0, 'L', 0, 0, '', '', true);
// 	// // ---------------------------------------------------------






	//}

// }

// //============================================================================================
// //============================================================================================
// //
// // IMPRIMIMOS EL DOCUMENTO A PANTALLA CON EL NUMERO DE FACTURA COMO NOMBRE:
// // I: send the file inline to the browser (default). The name given by name is used when one selects the “Save as” option on the link generating the PDF.
// // D: send to the browser and force a file download with the name given by name.
// // F: save to a local server file with the name given by name.
// // S: return the document as a string (name is ignored).
// // FI: equivalent to F + I option
// // FD: equivalent to F + D option
// // E: return the document as base64 mime multi-part email attachment (RFC 2045)
// //
// //============================================================================================
ob_clean();
$pdf->Output('ArrendLeasing'. "" . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  // $query  = "UPDATE documento_header_admins SET ";
  // $query .= "impreso = 1 ";
  // $query .= "WHERE id = '{$id_documento}' ";

  // $sql = mysqli_query($connection_dte, $query);
?>
