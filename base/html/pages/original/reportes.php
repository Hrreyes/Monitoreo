<?php

	require_once "conexion.php";
	require_once "funciones.php";
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
	  	<header class="mb-4" style="background: red;">
			<div class="container">
			    <h1 class="navbar-brand p-3" style="COLOR: #FFFF;">REPORTE CARMARKET</h1>
			</div>
	    </header>

		<div class="container-fluid">
			<div class= "col-lg-10 offset-1">
		        <div class="row">
					<p align=right>
						<a class="btnDownload btn btn-success" href="export.php">Exportar listado</a>
					</p>

					<form action="detalle.php" method="post">
                        <div class="box-body">
                            <div class="box-body table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">Registro</th>
											<th scope="col">Nombre cliente</th>
											<th scope="col">Email cliente</th>
											<th scope="col">Telefono cliente</th>
											<th scope="col">Nit cliente</th>
											<th scope="col">DPI cliente</th>
											<th scope="col">Datos del bien</th>
											<th scope="col">Valor del bien</th>
											<th scope="col">Fecha de cotizacion</th>
											<th scope="col">Agente Arrend</th>
											<th scope="col">Detalle</th>
										</tr>
									</thead>
									<tbody>
										<?php
											while ($db_var = mysqli_fetch_assoc($exp_data)) {
											    $id     = $db_var["id"];
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

											   if (array_key_exists('agent',$detalle['results'][0])) {	    	
											    	$agente_arrend = $detalle['results'][0]['agent']['name'];
											    }else{
											    	$agente_arrend = 'N/A';
											    }											  
										?>
							  
									    <tr>
									      <td><?php echo $id;?></td>
									      <td><?php echo $name;?></td>
									      <td><?php echo $email;?></td>
									      <td><?php echo $phone;?></td>
									      <td><?php echo $nit;?></td>
									      <td><?php echo $dpi;?></td>
									      <td><?php echo $vehicle;?></td>
									      <td><?php echo $moneda. number_format($valor_bien,2);?></td>
									      <td><?php echo $fecha_coti;?></td>
									      <td><?php echo $agente_arrend;?></td>
									      <td>
									      	<button class="btn btn-primary" type="submit" name="leads_id" value="<?php echo $id;?>" value="button1">Ver</button>
									      </td>
									    </tr>
							    		<?php } ?>
							  		</tbody>
							  	</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>