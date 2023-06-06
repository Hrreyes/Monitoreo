<?php require_once "../../assets/session.php";?>
<?php require_once "../../assets/db_connection.php";?>
<?php require_once "../../assets/functions.php";?>
<?php require_once "../../assets/validation_functions.php";?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>FORMULACION DUCA | Maqueta</title>
  <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="../../assets/images/favicon.ico">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../../../global/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="../../../global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="../../../global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="../../../global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="../../../global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="../../../global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="../../../global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="../../../global/vendor/waves/waves.css">
  <link rel="stylesheet" href="../../../global/vendor/slick-carousel/slick.css">
  <link rel="stylesheet" href="../../assets/examples/css/pages/profile-v2.css">
  <link rel="stylesheet" href="../../../global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="../../../global/fonts/material-design/material-design.min.css">
  <link rel="stylesheet" href="../../../global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="../../../global/vendor/breakpoints/breakpoints.js"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body class="animsition page-profile-v2  site-menubar-fold site-menubar-keep">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<?php include "../layouts/pages-navbar.php";?>

<?php

date_default_timezone_set("America/Guatemala");

if (isset($_GET['eid'])) {
    $exp_id = $_GET['eid'];
} else {
    redirect_to("search-expedientes.php");
}

if (isset($_POST['section-e1-submit'])) {
// CAMPOS GENERALES
    $exp_id     = $_POST["exp_id"];
    $admin_id   = $_POST["admin_id"];
    $dua_number = $_POST["dua_number"];

// CAMPOS SECCION A
    $ANNO_ORDEN              = date("Y");
    $AGENTE_ORDEN            = get_agente_for_exp($exp_id);
    $ADUANA_ENTRADA_SALIDA   = $_POST["A2"];
    $ADUANA_DESPACHO_DESTINO = $_POST["A5"];

// CAMPOS SECCION B
    $TIPO_DOCU_IMPOEXPO      = $_POST["B61"];
    $DOCUMENTO_IMPOEXPO      = $_POST["B62"];
    $PAIS_DOCU_IMPOEXPO      = $_POST["B63"];
    $RAZON_SOCIAL_IMPOEXPO   = $_POST["B64"];
    $DOMICILIO_IMPOEXPO      = $_POST["B65"];
    $CIUDAD_IMPOEXPO         = $_POST["B66"];
    $TIPO_DOCU_DECLARANTE    = $_POST["B71"];
    $DOCUMENTO_DECLARANTE    = $_POST["B72"];
    $PAIS_DOCU_DECLARANTE    = $_POST["B73"];
    $RAZON_SOCIAL_DECLARANTE = $_POST["B74"];
    $TIPO_DECLARANTE         = $_POST["B75"];
    $DOMICILIO_DECLARANTE    = $_POST["B76"];
    $CIUDAD_DECLARANTE       = $_POST["B77"];

// CAMPOS SECCION C
    $CODIGO_REGIMEN    = $_POST["C81"];
    $CLASE_DECLARACION = $_POST["C82"];

    // CHECK FOR TIPO MENSAJE
    $is_import = strpos($CODIGO_REGIMEN, "ID");
    $is_export = strpos($CODIGO_REGIMEN, "ED");

    if ($is_import > 0) {
        $TIPO_MENSAJE = "929";
    } else if ($is_export > 0) {
        $TIPO_MENSAJE = "830";
    } else {
        $TIPO_MENSAJE = "950";
    }

    // CHECK FUNCION MENSAJE
    if ($CLASE_DECLARACION == "36") {
        $FUNCION_MENSAJE = "9";
    } else {
        $FUNCION_MENSAJE = "4";
    }

// CAMPOS SECCION D
    $PAIS_PROCE_DESTINO = $_POST["D9"];
    $PAIS_EXPORTACION   = $_POST["D113"];
    $LUGAR_EMBARQUE     = $_POST["D111"];
    $LUGAR_DESEMBARQUE  = $_POST["D112"];
    $CODIGO_ALMACEN     = $_POST["D10"];
    $CODIGO_DEPOSITO    = $_POST["D11"];

// CAMPOS SECCION E
    $MODO_TRANSPORTE      = $_POST["E12"];
    $FECHA_LLEGADA_SALIDA = $_POST["E13"];

// CAMPOS DE SECCION F
    $NATURALEZA_TRANSACCION          = $_POST["F14"];
    $TIPO_CAMBIO                     = $_POST["F15"];
    $VALOR_ADUANA                    = $_POST["F16"] * $F15;
    $TOTAL_VALOR_TRANSACCION_DOLARES = $_POST["F17"];

// CAMPOS DE SECCION G
    $NUMERO_PAGINAS   = $_POST["G17"];
    $TOTAL_FRACCIONES = $_POST["G18"];
    $TOTAL_BULTOS     = $_POST["G19"];
    $TOTAL_PESO_BRUTO = $_POST["G20"];
    $TOTAL_PESO_NETO  = get_total_peso_neto($exp_id);

// LOG UPDATE
    $seccion      = "A-G";
    $date_updated = date("Y-m-d H:i:s");

// INSERT LOG
    $query = "INSERT INTO DUA_LOG (";
    $query .= "  NUMERO_ORDEN, exp_id, admin_id, seccion, date_updated ";
    $query .= ") VALUES (";
    $query .= " '{$dua_number}', '{$exp_id}', '{$admin_id}', '{$seccion}', '{$date_updated}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

// UPDATE TO DUA POLIZA
    $query = "UPDATE DUA_POLIZA SET ";
    $query .= "ANNO_ORDEN                       = '{$ANNO_ORDEN}', ";
    $query .= "AGENTE_ORDEN                     = '{$AGENTE_ORDEN}', ";
    $query .= "ADUANA_ENTRADA_SALIDA            = '{$ADUANA_ENTRADA_SALIDA}', ";
    $query .= "ADUANA_DESPACHO_DESTINO          = '{$ADUANA_DESPACHO_DESTINO}', ";
    $query .= "TIPO_DOCU_IMPOEXPO               = '{$TIPO_DOCU_IMPOEXPO}', ";
    $query .= "DOCUMENTO_IMPOEXPO               = '{$DOCUMENTO_IMPOEXPO}', ";
    $query .= "PAIS_DOCU_IMPOEXPO               = '{$PAIS_DOCU_IMPOEXPO}', ";
    $query .= "RAZON_SOCIAL_IMPOEXPO            = '{$RAZON_SOCIAL_IMPOEXPO}', ";
    $query .= "DOMICILIO_IMPOEXPO               = '{$DOMICILIO_IMPOEXPO}', ";
    $query .= "CIUDAD_IMPOEXPO                  = '{$CIUDAD_IMPOEXPO}', ";
    $query .= "TIPO_DOCU_DECLARANTE             = '{$TIPO_DOCU_DECLARANTE}', ";
    $query .= "DOCUMENTO_DECLARANTE             = '{$DOCUMENTO_DECLARANTE}', ";
    $query .= "TIPO_DECLARANTE                  = '{$TIPO_DECLARANTE}', ";
    $query .= "PAIS_DOCU_DECLARANTE             = '{$PAIS_DOCU_DECLARANTE}', ";
    $query .= "RAZON_SOCIAL_DECLARANTE          = '{$RAZON_SOCIAL_DECLARANTE}', ";
    $query .= "DOMICILIO_DECLARANTE             = '{$DOMICILIO_DECLARANTE}', ";
    $query .= "CIUDAD_DECLARANTE                = '{$CIUDAD_DECLARANTE}',  ";
    $query .= "CODIGO_REGIMEN                   = '{$CODIGO_REGIMEN}', ";
    $query .= "CLASE_DECLARACION                = '{$CLASE_DECLARACION}', ";
    $query .= "TIPO_MENSAJE                     = '{$TIPO_MENSAJE}', ";
    $query .= "FUNCION_MENSAJE                  = '{$FUNCION_MENSAJE}', ";
    $query .= "PAIS_PROCE_DESTINO               = '{$PAIS_PROCE_DESTINO}', ";
    $query .= "PAIS_EXPORTACION                 = '{$PAIS_EXPORTACION}', ";
    $query .= "LUGAR_EMBARQUE                   = '{$LUGAR_EMBARQUE}', ";
    $query .= "LUGAR_DESEMBARQUE                = '{$LUGAR_DESEMBARQUE}', ";
    $query .= "CODIGO_ALMACEN                   = '{$CODIGO_ALMACEN}', ";
    $query .= "CODIGO_DEPOSITO                  = '{$CODIGO_DEPOSITO}', ";
    $query .= "MODO_TRANSPORTE                  = '{$MODO_TRANSPORTE}', ";
    $query .= "FECHA_LLEGADA_SALIDA             = '{$FECHA_LLEGADA_SALIDA}', ";
    $query .= "NATURALEZA_TRANSACCION           = '{$NATURALEZA_TRANSACCION}', ";
    $query .= "TIPO_CAMBIO                      = '{$TIPO_CAMBIO}', ";
    $query .= "VALOR_ADUANA                     = '{$VALOR_ADUANA}', ";
    $query .= "TOTAL_VALOR_TRANSACCION_DOLARES  = '{$TOTAL_VALOR_TRANSACCION_DOLARES}', ";
    $query .= "NUMERO_PAGINAS                   = '{$NUMERO_PAGINAS}', ";
    $query .= "TOTAL_FRACCIONES                 = '{$TOTAL_FRACCIONES}', ";
    $query .= "TOTAL_BULTOS                     = '{$TOTAL_BULTOS}', ";
    $query .= "TOTAL_PESO_BRUTO                 = '{$TOTAL_PESO_BRUTO}', ";
    $query .= "TOTAL_PESO_NETO                  = '{$TOTAL_PESO_NETO}' ";
    $query .= "WHERE NUMERO_ORDEN               = {$dua_number} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        $_SESSION["message"] = "POLIZA ACTUALIZADA";

    } else {
        // Failure
        $_SESSION["message"] = "NO SE ACTUALIZO POLIZA";
    }

}

if (isset($_POST['delete-equipamiento'])) {

    $id_equipamiento = $_POST["id_equipamiento"];

    $query = "UPDATE DUA_EQUIPAMIENTOS SET ";
    $query .= "status 	= '0' ";
    $query .= "WHERE id = {$id_equipamiento} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        $_SESSION["message"] = "EQUIPAMIENTO ELIMINADO";
    } else {
        // Failure
        $_SESSION["message"] = "NO SE ELIMINO EQUIPAMIENTO";
    }

}

$dua_number = get_dua_number_for_exp($exp_id);

?>





  <!-- Page -->
  <div class="page">
    <div class="page-content container-fluid">
      <div class="row">


	   <?php

$exp_data = get_exp_by_id($exp_id);

while ($db_var = mysqli_fetch_assoc($exp_data)) {
    $exp_id       = $db_var["id"];
    $user_id      = $db_var["user_id"];
    $exp_step     = $db_var["step"];
    $nit          = $db_var["factura_nit"];
    $created_on   = $db_var["created_on"];
    $admin_id     = $db_var["admin_id"];
    $timestamp    = strtotime($created_on);
    $date         = date('d-m-Y', $timestamp);
    $date_counter = date('Y-m-d G:i:s', $timestamp);
    $time         = date('G:i:s', $timestamp);
}

$docto_details = get_docto_asociado_by_id(1);

while ($order = mysqli_fetch_assoc($docto_details)) {
    $id        = $order["id"];
    $nombre    = $order["nombre"];
    $detalle   = $order["detalle"];
    $categoria = $order["categoria"];
}

$seccion_actual = "J";
$field          = [26.1, 26.2, 26.3, 26.4, 27];
$seccion_title  = "CONTENEDORES/FURGONES";
$col_span       = "12";
?>



	  <div class="col-lg-12 col-xl-12">   <!--  Column -->

		<div class="panel">
	        <div class="panel-body container-fluid">
		    	<div class="row">
				     <div class="col-md-12">
                        <h4 class="card-title mb-0"><i class="icon md-assignment"></i>  FORMULACIÓN DUCA EQUIPAMIENTOS - <?php echo $dua_number; ?>
                        <a href="#next" style="float: right;"> <i class="icon md-long-arrow-down"></i></a></h4>
				     		<hr>
					 	<h4> No. de Orden: <?php echo $dua_number; ?> <?php echo "<small>" . $nit . "</small>" ?></h4>
					 	<?php echo message(); ?>

	                	<hr>

				     </div>


		     	     <div class="col-md-12">
						<h4 class="text-primary"> SECCIÓN <?php echo $seccion_actual; ?> <small><?php echo $seccion_title ?></small></h4>
						<hr>
						<table class="table table-hover table-responsive" data-plugin="floatThead">
		                    <thead>
		                      <tr>
		                        <th>
		                          TIPO EQUIPAMIENTO
		                        </th>
		                        <th>
		                          TAMAÑO EQUIPAMIENTO
		                        </th>
		                        <th>
		                          CARGA EQUIPAMIENTO
		                        </th>
		                        <th>
		                          NUMERO EQUIPAMIENTO
		                        </th>
		                        <th>
		                          ENTIDAD
		                        </th>
		                        <th>
			                     		NUMERO MARCHAMO
		                        </th>
				                    <th>
				                    	PLACA TRANSPORTE
				                    </th>
				                    <th>
				                   		PAIS TRANSPORTE
				                    </th>
				                    <th>
					                   	MARCA TRANSPORTE
				                    </th>
				                    <th>
				                   	 	CHASIS TRANSPORTE
				                    </th>
				                    <th>
				                   	 	NUMERO REMOLQUE
				                    </th>
				                    <th>
				                   		CANTIDAD UNIDADES CARGA
				                    </th>
		                        <th class="text-center w-100">
			                     ELIMINAR EQUIPAMIENTO
		                        </th>
		                      </tr>
		                    </thead>

		                    <tbody class="table-responsive " >


	                        <?php
$total              = 0;
$otros              = 0;
$equipamientos_data = get_equipamientos_for_numero_orden($dua_number);
while ($order = mysqli_fetch_assoc($equipamientos_data)) {
    $equipamiento_id           = $order["id"];
    $numero_equipamiento       = $order["NUMERO_EQUIPAMIENTO"];
    $tipo_tamanno_equipamiento = $order["TIPO_TAMANNO_EQUIPAMIENTO"];
    $tipo_equipamiento         = $order["TIPO_EQUIPAMIENTO"];
    $carga_equipamiento        = $order["TIPO_CARGA_TRANSPORTE"];
    $tamanno_equipamiento      = $order["TAMANNO_EQUIPAMIENTO"];
    $entidad_marchamo          = $order["ENTIDAD_MARCHAMO"];
    $numero_marchamo           = $order["NUMERO_MARCHAMO"];
    $PLACA_TRANSPORTE          = $order["PLACA_TRANSPORTE"];
    $PAIS_TRANSPORTE           = $order["PAIS_TRANSPORTE"];
    $MARCA_TRANSPORTE          = $order["MARCA_TRANSPORTE"];
    $CHASIS_TRANSPORTE         = $order["CHASIS_TRANSPORTE"];
    $NUMERO_REMOLQUE           = $order["NUMERO_REMOLQUE"];
    $CANTIDAD_UNIDADES_CARGA   = $order["CANTIDAD_UNIDADES_CARGA"];

    ?>


		                <tr>

	                        <td>
	                         	<?php echo $tipo_equipamiento; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $tamanno_equipamiento; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $carga_equipamiento; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $numero_equipamiento; ?></br>
	                        </td>

	                        <td>
	                         	<?php echo $entidad_marchamo; ?></br>
	                        </td>

	                        <td class="text-center">

	                         	<?php echo $numero_marchamo; ?>
	                        </td>

	                        <td>
	                         	<?php echo $PLACA_TRANSPORTE; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $PAIS_TRANSPORTE; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $MARCA_TRANSPORTE; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $CHASIS_TRANSPORTE; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $NUMERO_REMOLQUE; ?></br>
	                        </td>
	                        <td>
	                         	<?php echo $CANTIDAD_UNIDADES_CARGA; ?></br>
	                        </td>
	                        <td class="text-center">

	                         <form action="expediente-duca-express-2.php?eid=<?php echo $exp_id; ?>" method="post">
			                     <input type="hidden" name="id_equipamiento" value="<?php echo $equipamiento_id; ?>" >
								 <button class="btn btn-icon btn-danger btn-outline btn-round btn-xs" type="submit"  name="delete-equipamiento">
									<i class="icon icon-xs md-minus mr-0"></i>
		                         </button>
	                        </form>
	                        </td>

						 </tr>

                    <?php }

$total_general = $total + $otros;
?>

                    <tr>
                    </tr>
                   </tbody>
                 </table>


					<a href="expediente-duca-express-3.php?eid=<?php echo $exp_id; ?>" class="btn btn-sm btn-primary btn-block" id="next">Siguiente</a>

					  <a class="btn btn-sm btn-default btn-block" href="expediente-duca-express-1.php?eid=<?php echo $exp_id; ?>">Regresar a Poliza</a>


                      <a class="btn btn-sm btn-default btn-block" href="expediente-2.php?id=<?php echo $exp_id; ?>">Regresar a Expediente</a>

					  <!--
				     <form action="expediente-dua-j.php?eid=<?php echo $exp_id; ?>" method="post">
				     </div>
				     <hr>
				     <br><br>
	                   <div class="col-md-12">
						<hr>
						<h4 class="text-primary"> AGREGAR CONTENEDOR <small>INGRESAR OTRO CONTENEDOR/FURGÓN</small></h4>
						<hr>
	                   </div>
	                 <?php

foreach ($field as $campo_actual) {
    $validar = get_dato_asociado_by_docto_and_seccion_campo($id, $seccion_actual, $campo_actual);
    //$validar=get_dato_asociado_by_docto_and_seccion($id, $seccion_actual);

    while ($db_var = mysqli_fetch_assoc($validar)) {
        $id_dato            = $db_var["id"];
        $campo              = $db_var["campo"];
        $detalle            = $db_var["detalle"];
        $seccion            = $db_var["seccion"];
        $placeholder        = $db_var["placeholder"];
        $fuente_dato        = $db_var["fuente_dato"];
        $tipo_dato          = $db_var["tipo_dato"];
        $id_fuente          = $db_var["id_fuente"];
        $option_value       = $db_var["option_value"];
        $option_description = $db_var["option_description"];

        ?>

				     <div class="col-md-<?php echo $col_span; ?>">
			            <li class="list-group-item">
						  <div class="media">
		                    <div class="media-body">
			                 <h5 class="mt-0 mb-5"><?php echo $detalle ?> <small><?php echo $seccion; ?>-<?php echo $campo; ?></small> </h5>
		                     <?php echo get_input_field($fuente_dato, $id_fuente, $campo, $detalle, $valor, $tipo_dato, $option_value, $option_description, $id_dato, $exp_id, $nit, $dua_number, $placeholder); ?>
		                    </div>
						  </div>
		                </li>
				     </div>

					<?php
}
}
?>


			      <div class="col-md-12">
				      <hr>
				      <input type="hidden" name="exp_id" value="<?php echo $exp_id ?>"/>
				      <input type="hidden" name="seccion" value="<?php echo $seccion_actual ?>"/>
				      <input type="hidden" name="dua_number" value="<?php echo $dua_number ?>"/>
				      <input type="hidden" name="admin_id" value="<?php echo $_SESSION["admin_id"]; ?>"/>
				      <button type="submit" name="section-j-submit" class="btn btn-sm btn-warning btn-block">AGREGAR  CONTENEDOR/FURGÓN</button>
					  <a class="btn btn-sm btn-default btn-block" href="expediente-2.php?id=<?php echo $exp_id; ?>">Regresar a Expediente</a>
				  </div>
		    	  </form>
				     -->

				 	<br>

				</div><!-- End Row -->
	        </div>
	    </div> <!-- End  Panel Body Row -->

	  </div> 							<!-- End  Column -->

      </div>
    </div>
   </div> <!-- END PAGE -->

  <!-- Footer -->

<!-- Enter Event Listener -->
<script>
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});
</script>


<?php include "../layouts/footer.php";?>
  <!-- Core  -->
  <script src="../../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
  <script src="../../../global/vendor/jquery/jquery.js"></script>
  <script src="../../../global/vendor/tether/tether.js"></script>
  <script src="../../../global/vendor/bootstrap/bootstrap.js"></script>
  <script src="../../../global/vendor/animsition/animsition.js"></script>
  <script src="../../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="../../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
  <script src="../../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
  <script src="../../../global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
  <script src="../../../global/vendor/waves/waves.js"></script>
  <!-- Plugins -->
  <script src="../../../global/vendor/switchery/switchery.min.js"></script>
  <script src="../../../global/vendor/intro-js/intro.js"></script>
  <script src="../../../global/vendor/screenfull/screenfull.js"></script>
  <script src="../../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
  <script src="../../../global/vendor/slick-carousel/slick.js"></script>
  <script src="../../../global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <!-- Scripts -->
  <script src="../../../global/js/State.js"></script>
  <script src="../../../global/js/Component.js"></script>
  <script src="../../../global/js/Plugin.js"></script>
  <script src="../../../global/js/Base.js"></script>
  <script src="../../../global/js/Config.js"></script>
  <script src="../../assets/js/Section/Menubar.js"></script>
  <script src="../../assets/js/Section/GridMenu.js"></script>
  <script src="../../assets/js/Section/Sidebar.js"></script>
  <script src="../../assets/js/Section/PageAside.js"></script>
  <script src="../../assets/js/Plugin/menu.js"></script>
  <script src="../../../global/js/config/colors.js"></script>
  <script src="../../assets/js/config/tour.js"></script>
  <script>
  Config.set('assets', '../../assets');
  </script>
  <!-- Page -->
  <script src="../../assets/js/Site.js"></script>
  <script src="../../../global/js/Plugin/asscrollable.js"></script>
  <script src="../../../global/js/Plugin/slidepanel.js"></script>
  <script src="../../../global/js/Plugin/switchery.js"></script>
  <script src="../../../global/js/Plugin/bootstrap-datepicker.js"></script>
  <script src="../../assets/examples/js/pages/profile-v2.js"></script>
  <script src="../../../global/js/Plugin/input-group-file.js"></script>

</body>
</html>
