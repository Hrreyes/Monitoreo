<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'kidsheader.jpg';
		$this->Image($image_file, 'C', 6, 200, '', 'JPG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, ' ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, '2a. calle 25-19 zona 15, Edificio Multimédica 11o. nivel, oficina 1109, teléfono 2385-7664 al 66  QB DIRECTORA: Licda. Olga Torres de Matute', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Kids Lab');
$pdf->SetTitle('Resultados de Examenes');
$pdf->SetSubject('Laboratorio D.M.');
$pdf->SetKeywords(' ');

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
$pdf->SetFont('dejavusans', ' ', 12);

// add a page
$pdf->AddPage();

	
// database connection	
	define("DB_SERVER", "kidslab.accountsupportmysql.com");
	define("DB_USER", 	"kidslab");
	define("DB_PASS", 	"kidslabpass");
	define("DB_NAME", 	"kidslab_420");


  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  mysqli_query($connection, "SET NAMES 'utf8'");
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
  
  
// fetch functions  
  
  	function find_result_by_id_for_user($id,$user) {
		global $connection;
		$safe_id = mysqli_real_escape_string($connection, $id);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE id = {$safe_id} ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	
	function find_patient_by_id($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$query .= "WHERE patient_id = {$safe_user_id} ";
		//$query .= "ORDER BY order_id ASC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function find_parent_by_id($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = {$safe_user_id} ";
		$query .= "LIMIT 1";
		//$query .= "ORDER BY order_id ASC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
		
	function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}
				
	
 	$order_detail=find_result_by_id_for_user(($_GET["id"])); 

 	while($order = mysqli_fetch_assoc($order_detail)) {
	 $pat_id = ($order["paciente_id"]);
	 $pati = find_patient_by_id($pat_id);
	 while($pat = mysqli_fetch_assoc($pati)) {
	 $paciente=htmlspecialchars($pat["paciente"]);
	 $edad=htmlentities($pat["cumple"]);
	 $user_id=htmlentities($pat["user_id"]);
	 $doctor=htmlentities($pat["doctor"]);
 	} 
	 $pari=find_parent_by_id($user_id);
	 while($par = mysqli_fetch_assoc($pari)) {
	 $contacto=htmlspecialchars($par["name"]);
	 $lab=htmlspecialchars($par["lab"]);
	 $nit=htmlentities($par["nit"]);
 	}
 	 
    $fecha = date('d-m-Y', strtotime($order["fecha"]));
	
    $exam1 = mysql_prep($order["exam1"]);
    $exam2 = mysql_prep($order["exam2"]);
    $exam3 = mysql_prep($order["exam3"]);
    $exam4 = mysql_prep($order["exam4"]);
    $exam5 = mysql_prep($order["exam5"]);
    $exam6 = mysql_prep($order["exam6"]);
    $exam7 = mysql_prep($order["exam7"]);
    $exam8 = mysql_prep($order["exam8"]);
    $exam9 = mysql_prep($order["exam9"]);
    $exam10 = mysql_prep($order["exam10"]);
    $examp1 = mysql_prep($order["examresult1"]);
    $examp2 = mysql_prep($order["examresult2"]);
    $examp3 = mysql_prep($order["examresult3"]);
    $examp4 = mysql_prep($order["examresult4"]);
    $examp5 = mysql_prep($order["examresult5"]);
    $examp6 = mysql_prep($order["examresult6"]);
    $examp7 = mysql_prep($order["examresult7"]);
    $examp8 = mysql_prep($order["examresult8"]);
    $examp9 = mysql_prep($order["examresult9"]);
    $examp10 = mysql_prep($order["examresult10"]);
    $admin = mysql_prep($order["admin"]);
	$exams=array($exam1,$exam2,$exam3,$exam4,$exam5,
				$exam6,$exam7,$exam8,$exam9,$exam10);
	$prices=array($examp1,$examp2,$examp3,$examp4,$examp5,
				$examp6,$examp7,$examp8,$examp9,$examp10);
	$total=0;
	date_default_timezone_set('America/Guatemala');
	$h = date('G'); // Time - region 			
 }

	$actual=0;	

  	if ((strtotime($edad) < strtotime('1 year ago'))){
		$date1=date_create();
		$date2=date_create($edad);
		$diff=date_diff($date2,$date1);
		$actual = $diff->format("%Y años");
		} else {
		$date1=date_create();
		$date2=date_create($edad);
		$diff=date_diff($date2,$date1);
		$actual = $diff->format("%m Meses y %d Dias");}
		 

// Set header content to print

$txt = <<<EOD
Resultados de Laboratorio
EOD;

$pdf->SetFontSize(22, true);

// Print text using writeHTMLCell()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFontSize(12, true);

$pdf->Write(0, " ", '', 0, 'C', true, 0, false, false, 0);

//$style = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0));

//$pdf->Line(0, 31, 255, 31, $style);

$pdf->SetFontSize(10, true);

$txt = <<<EOD
<strong>Paciente:</strong> $paciente
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt = <<<EOD
<strong>Edad:</strong> $actual
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt = <<<EOD
<strong>Doctor:</strong> $doctor
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$txt = <<<EOD
<strong>Fecha de Examen:</strong> $fecha
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$pdf->Write(0, " ", '', 0, 'C', true, 0, false, false, 0);



// Set content to print


$pdf->writeHTML(" ", true, false, false, false, '');

$pdf->SetFontSize(8, true);

$count=0;
	foreach ($exams as $value) {
		if(strlen($value)>1){
	
		$pdf->writeHTML("<strong>$value</strong>", true, false, false, false, '');

		$pdf->Write(0, " ", '', 0, 'C', true, 0, false, false, 0);


		$display = (stripslashes(str_replace("\\n", ' ', $prices[$count])));	
	 	
	 	$pdf->writeHTML($display, true, false, false, false, '');
 
		$count++;
		}
	   } 
	   
$toolcopy = '<img src="admin/'.$admin.'.jpg" >';

$pdf->writeHTML($toolcopy, true, 0, true, 0);

// Print text using writeHTMLCell()
//$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('resultado_kidslab.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
