<?php
	require_once "conexion.php";
	require_once "funciones.php";

	if (isset($_POST['leads_id'])) {

		$id= $_POST['leads_id'];

		$exp_data = get_leads_detail($id);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>ARREND - Reporte carmarket</title>
  </head>
  <body>
    
    <header style="background: red;">
		<div class="container">
		    <h1 class="navbar-brand p-3" style="COLOR: #FFFF;">DETALLE DE COTIZACION</h1>    
		</div>
    </header>
    
    <div class="container">
		<div class= "col-lg-10 col-lg-offset-1">
	        <div class="row">
			    <?php
			    	while ($db_var = mysqli_fetch_assoc($exp_data)) {
					    $detalle = json_decode($db_var["preview"], true);

					    $fecha_coti = $detalle['results'][0]['fecha'];

					    $name_cli = $detalle['results'][0]['catalogo']['name'];
					    $phone_cli = $detalle['results'][0]['catalogo']['phone'];
					    $mail_cli = $detalle['results'][0]['catalogo']['mail'];

					    $marca = $detalle['results'][0]['vehicle']['brand'];
					    $modelo = $detalle['results'][0]['vehicle']['model'];
					    $anio = $detalle['results'][0]['vehicle']['year'];

					    $tipo_bien = $detalle['results'][0]['vehicle']['pdf']['detail'][0];
					    $motor = $detalle['results'][0]['vehicle']['pdf']['detail'][1];
					    $tipo_gasolina = $detalle['results'][0]['vehicle']['pdf']['detail'][2];
					    $anio_ = $detalle['results'][0]['vehicle']['pdf']['detail'][3];
					    $kilometraje = $detalle['results'][0]['vehicle']['pdf']['detail'][4];
					    $transmision = $detalle['results'][0]['vehicle']['pdf']['detail'][5];
					    $color = $detalle['results'][0]['vehicle']['pdf']['detail'][6];
					    $color_interior = $detalle['results'][0]['vehicle']['pdf']['detail'][7];
					    $placa = $detalle['results'][0]['vehicle']['pdf']['detail'][8];					    

					    $moneda = $detalle['results'][0]['moneda'];

					    if ($moneda_simbolo = 'Quetzales') {
					    	$moneda = 'Q';
					    }else{
					    	$moneda = '$';
					    }
					    $valor_bien = $detalle['results'][0]['valor'];

						$plazo = $detalle['results'][0]['catalogo']['plazo'];
					    $link = $detalle['results'][0]['catalogo']['extra_params']['hre_client'];
					    $envio_email = $detalle['results'][0]['catalogo']['send_email'];

					    if ($envio_email = 1) {
					    	$envio_email = 'Si';
					    }else{
					    	$envio_email = 'No';
					    }

					    $gastoInicial = $detalle['results'][0]['gastoInicial'];
					    $renta = $detalle['results'][0]['renta'][0][0];
						$seguro = $detalle['results'][0]['seguro'];

						 if (array_key_exists('agent',$detalle['results'][0])) {	    	
					    	$agente_name = $detalle['results'][0]['agent']['name'];
						    $agente_email = $detalle['results'][0]['agent']['email'];
						    $agente_phone = $detalle['results'][0]['agent']['phone'];
					    }else{
					    	$agente_arrend = 'N/A';
					    	$agente_name = 'N/A';
						    $agente_email = 'N/A';
						    $agente_phone = 'N/A';
					    }					    

						?>

						<div class="card-header mb-4 mt-2">
							<p class="card-text m-0">Numero de registro: <?php echo $id;?></p>
							<p class="card-text m-0">Fecha de cotizacion: <?php echo $fecha_coti;?></p>
							<p class="card-text m-0">Envio de correo: <?php echo $envio_email;?></p>
							<p class="card-text m-0">URL Carmarket: <a target="_blank" href="<?php echo $link;?>"><?php echo $link;?></a></p>
						</div>

						<div class="card bg-light mb-3 col-lg-12">
						  <div class="card-header">Datos del cliente</div>
						  <div class="card-body">
						    <p class="card-text">Nombre: <?php echo $name_cli;?></p>						    
							<p class="card-text">Email: <?php echo $mail_cli;?></p>	
							<p class="card-text">Telefono: <?php echo $phone_cli;?></p>						
						  </div>
						</div>

						<div class="card bg-light mb-3 col-lg-3">
						  <div class="card-header">Datos del Vehiculo</div>
						  <div class="card-body">
						  	<p class="card-text">Tipo de bien: <?php echo $tipo_bien;?></p>
						    <p class="card-text">Placa: <?php echo $placa;?></p>
						    <p class="card-text">Marca: <?php echo $marca;?></p>
							<p class="card-text">Modelo: <?php echo $modelo;?></p>
							<p class="card-text">Año: <?php echo $anio;?></p>
							<p class="card-text">Motor: <?php echo $motor;?></p>
							<p class="card-text">Tipo Gasolina: <?php echo $tipo_gasolina;?></p>
							<p class="card-text">Kilometraje: <?php echo $kilometraje;?></p>
							<p class="card-text">Transmision: <?php echo $transmision;?></p>
							<p class="card-text">Color: <?php echo $color;?></p>
							<p class="card-text">Color interior: <?php echo $color_interior;?></p>
						  </div>
						</div>

						<div class="card bg-light mb-3 col-lg-3 offset-lg-1">
						  <div class="card-header">Valores de cotizacion</div>
						  <div class="card-body">
						    <p class="card-text">Monto del bien: <?php echo $moneda . number_format($valor_bien,2);?></p>
						    <p class="card-text">Plazo: <?php echo $plazo;?></p>
						    <p class="card-text">Gastos iniciales: <?php echo $moneda . number_format($gastoInicial,2);?></p>
						    <p class="card-text">Renta: <?php echo $moneda . number_format($renta,2);?></p>
						    <p class="card-text">Seguro: <?php echo $moneda . number_format($seguro,2);?></p>
						  </div>
						</div>

						<div class="card bg-light mb-3 col-lg-4 offset-lg-1">
						  <div class="card-header">Datos del asesor</div>
						  <div class="card-body">
						    <p class="card-text">Nombre: <?php echo $agente_name;?></p>
						    <p class="card-text">Email: <?php echo $agente_email;?></p>
						    <p class="card-text">Telefono: <?php echo $agente_phone;?></p>						    
						  </div>
						</div>

				<?php
						}
			    ?>
			</div>
		</div>
	</div>
  </body>
</html>
<?php
	}
?>