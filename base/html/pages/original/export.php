<?php

	require_once "conexion.php";
	require_once "funciones.php";

	$exp_data = export_to_csv();

	//$query = "SELECT * FROM leads ORDER BY id ASC ";
	//$result = mysqli_query($conn, $query);

	//$num_column = mysqli_num_fields($exp_data);
	//echo $num_column;
	//var_dump($num_column);

	//$csv_header = '';
	//for($i=0;$i<$num_column;$i++) {
	  //  $csv_header .=  mysqli_fetch_field_direct($exp_data,$i)->name . ',';
	//}
	
	$h_nombre = "Nombre cliente";
	$h_email = "Email cliente";
	$h_telefono = "Telefono cliente";
	$h_nit = "Nit cliente";
	$h_dpi = "DPI cliente";
	$h_datos_bien = "Datos del bien";
	$h_valor_bien = "Valor del bien";
	$h_fecha = "Fecha de cotizacion";
	$h_agente = "Agente Arrend";

	$csv_header = $h_nombre . ";" . $h_email . ";" . $h_telefono . ";" . $h_nit . ";" .	$h_dpi . ";" . $h_datos_bien . ";" . $h_valor_bien . ";" . $h_fecha . ";" . $h_agente . "\n";

	//}

	$csv_row ='';
	//while($row = mysqli_fetch_row($exp_data)) {
		//for($i=0;$i<$num_column;$i++) {
		//	$csv_row .= $row[$i] . ',';
		//}
		//$csv_row .= "\n";
	while($db_var = mysqli_fetch_assoc($exp_data)) {
		
	    $name 	= $db_var["name"];
	    $email  = $db_var["email"];
	    $phone  = $db_var["phone"];
	    $nit 	= $db_var["nit"];
	    $dpi    = $db_var["dpi"];

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

	    //$agente_arrend = $detalle['results'][0]['agent'];

	    if (array_key_exists('agent',$detalle['results'][0])) {
	    	$agente_arrend = $detalle['results'][0]['agent']['name'];
	    }else{
	    	$agente_arrend = 'N/A';
	    }

	    $csv_row .= $name . ";" . $email . ";" . $phone . ";" . $nit . ";" . $dpi . ";" . $vehicle . ";" . $moneda. number_format($valor_bien,2) . ";" . $fecha_coti . ";" . $agente_arrend . "\n";
	}	
	

	/* Download as CSV File */
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=Listado de Leads.csv');
	echo $csv_header . $csv_row;
	

?>