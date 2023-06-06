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
  <title>Expediente | Maqueta</title>
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
  <link rel="stylesheet" href="../../../global/vendor/blueimp-file-upload/jquery.fileupload.css">
  <link rel="stylesheet" href="../../../global/vendor/dropify/dropify.css">
  <link rel="stylesheet" href="../../../global/vendor/summernote/summernote.css">
  <link rel="stylesheet" href="../../assets/examples/css/pages/project.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="../../../global/fonts/font-awesome/font-awesome.css">
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
<!--

  <script src="https://cdn.rawgit.com/qaap/pdf417-generator/master/lib/libbcmath.js" type="text/javascript"></script>
	<script src="https://cdn.rawgit.com/qaap/pdf417-generator/master/lib/bcmath.js" type="text/javascript"></script>
	<script src="https://cdn.rawgit.com/qaap/pdf417-generator/master/lib/pdf417.js" type="text/javascript"></script>

-->
</head>
<body class="animsition page-project  site-menubar-fold site-menubar-keep">

  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <?php

date_default_timezone_set("America/Guatemala");

if (isset($_POST['add-docto'])) {

    $id         = $_POST['exp_id'];
    $exp_id     = $_POST['exp_id'];
    $doc_codigo = $_POST['doc_id'];

    // INSERT DOCUMENTS FOR PROJECT TO DB
    $query = "INSERT INTO usuarios_expedientes_doctos (";
    $query .= " exp_id, docto_id, estado, status";
    $query .= ") VALUES (";
    $query .= "   '{$exp_id}', '{$doc_codigo}', '1', '1' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    // GET DOCUMENTS ID FROM DOCUMENT CODE
    $docto_details = get_docto_for_codigo($doc_codigo);
    while ($db_var = mysqli_fetch_assoc($docto_details)) {
        $documento_id = $db_var["id"];
    }

    // GET EXP DOCTO ID

    $exp_docto_id = get_last_exp_docto();

    // GET DOCUMENTS FIELDS FOR PROJECT TO DB
    $validar = get_dato_docto($documento_id);

    while ($db_var = mysqli_fetch_assoc($validar)) {
        $nombre             = $db_var["nombre"];
        $detalle            = $db_var["detalle"];
        $tipo_dato          = $db_var["tipo_dato"];
        $tipo               = $db_var["tipo"];
        $id_fuente          = $db_var["id_fuente"];
        $fuente_dato        = $db_var["fuente_dato"];
        $option_value       = $db_var["option_value"];
        $option_description = $db_var["option_description"];

        // INSERT DOCUMENTS FIELDS FOR PROJECT TO DB
        $query = "INSERT INTO usuarios_expedientes_doctos_datos (";
        $query .= " exp_id, docto_id, nombre, detalle, tipo_dato, tipo, id_fuente, fuente_dato, option_value, option_description, status";
        $query .= ") VALUES (";
        $query .= " '{$exp_id}', '{$exp_docto_id}', '{$nombre}', '{$detalle}', '{$tipo_dato}' , '{$tipo}', '{$id_fuente}', '{$fuente_dato}', '{$option_value}', '{$option_description}', '1' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);
    } // end get_dato_docto

    // GET DOCUMENTS VALIDATE FOR PROJECT TO DB

    $validar = get_validar_docto($documento_id);
    while ($db_var = mysqli_fetch_assoc($validar)) {
        //$id_validar = $db_var["id"];
        $campo   = $db_var["campo"];
        $detalle = $db_var["detalle"];
        // INSERT DOCUMENTS VALIDATE FOR PROJECT TO DB
        $query = "INSERT INTO usuarios_expedientes_doctos_validar (";
        $query .= " exp_id, docto_id, campo, detalle, status";
        $query .= ") VALUES (";
        $query .= " '{$exp_id}', '{$exp_docto_id}', '{$campo}',  '{$detalle}',  '0' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);
    } // end get_validar_docto

    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        $_SESSION["message"] = "Documento agregado";
        //redirect_to("user.php");
    } else {
        // Failure
        $_SESSION["message"] = "No se agrego documento";
    }

}

if (isset($_POST['delete-docto'])) {

    $id       = $_POST["id"];
    $exp_id   = $_POST["id"];
    $id_docto = $_POST["document_id"];
    $status   = 0;

    $query = "UPDATE usuarios_expedientes_doctos SET ";
    $query .= "status = '{$status}' ";
    $query .= "WHERE id = {$id_docto} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        $_SESSION["message"] = "Documentos actualizados";
        //redirect_to("user.php");
    } else {
        // Failure
        $_SESSION["message"] = "No se actualizaron los documentos";
    }

}

if (isset($_POST['update-stage'])) {

    $id                     = $_POST["id"];
    $exp_id                 = $_POST["id"];
    $service_id             = $_POST["service_id"];
    $flow_id_proxima_etapa  = $_POST["flow_id"];
    $creator_type           = 0;
    $admin_id               = $_POST["admin_id"];
    $etapa                  = $_POST["etapa"];
    $time_created           = date("Y-m-d H:i:s");
    $total_activities_stage = 1;
    $status                 = 1;

    $todos = get_exp_activities($service_id, $id);
    while ($db_var = mysqli_fetch_assoc($todos)) {
        $actividad_exp_id = $db_var["id"];
        $actividad_id     = $db_var["actividad_id"];
        $actividad_status = $_POST["actividad-" . $actividad_exp_id];
        if ($actividad_status != 1) {$actividad_status = 0;}
        $status_actividad = $db_var["status"];
        $req_act          = get_actividad_for_stage($actividad_id, $etapa);
        while ($db_var = mysqli_fetch_assoc($req_act)) {
            $id_actividad           = $db_var["id"];
            $actividad              = $db_var["actividad"];
            $total_activities_stage = $actividad_status * $total_activities_stage;
            $query                  = "UPDATE usuarios_expedientes_actividades SET ";
            $query .= "status 	= '{$actividad_status}' ";
            $query .= "WHERE id = {$actividad_exp_id} ";
            $query .= "LIMIT 1";
            $result              = mysqli_query($connection, $query);
            $_SESSION["message"] = "Actividades de Expediente actualizadas";
        }
    }

    if ($total_activities_stage) {

        $next_flow = get_service_flow_by_id($flow_id_proxima_etapa);
        while ($data = mysqli_fetch_assoc($next_flow)) {
            $next_step = $data["titulo"];
            $detalle   = "Inicio de etapa " . $next_step;
        }

        // INSERT PROJECT STATUS TO STATUS_DB

        $query = "INSERT INTO usuarios_expedientes_estados (";
        $query .= " exp_id, estado, detalle, admin_id, time";
        $query .= ") VALUES (";
        $query .= "   '{$exp_id}', '{$next_step}', '{$detalle}', '{$admin_id}', '{$time_created}' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        $query = "UPDATE usuarios_expedientes SET ";
        $query .= "step 	= '{$flow_id_proxima_etapa}' ";
        $query .= "WHERE id = {$id} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            // Success
            $_SESSION["message"] = "Estados actualizados";
            //redirect_to("user.php");
        } else {
            // Failure
            $_SESSION["message"] = "No se actualizaron los estados";
        }

        redirect_to("expediente-$flow_id_proxima_etapa.php?id=$exp_id");

    }

}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    //$id=1;
}

$exp_data = get_exp_by_id($id);

while ($db_var = mysqli_fetch_assoc($exp_data)) {
    $exp_id       = $db_var["id"];
    $user_id      = $db_var["user_id"];
    $exp_step     = $db_var["step"];
    $created_on   = $db_var["created_on"];
    $admin_id     = $db_var["admin_id"];
    $timestamp    = strtotime($created_on);
    $date         = date('d-m-Y', $timestamp);
    $date_counter = date('Y-m-d G:i:s', $timestamp);
    $time         = date('G:i:s', $timestamp);
}

$user_data = get_user($user_id);

while ($db_var = mysqli_fetch_assoc($user_data)) {
    $nit                = $db_var["nit"];
    $razon              = $db_var["razon"];
    $empresa            = $db_var["empresa"];
    $tipo_cliente       = $db_var["tipo_cliente"];
    $representante      = $db_var["representante"];
    $tipo_persona       = $db_var["tipo_persona"];
    $domicilio          = $db_var["domicilio"];
    $correo             = $db_var["correo"];
    $moneda             = $db_var["moneda"];
    $fecha_constitucion = $db_var["fecha_constitucion"];
    $credito            = $db_var["credito"];
    $dias_credito       = $db_var["dias_credito"];
    $agente             = $db_var["agente"];
}

$exp_service = get_exp_services($exp_id);

while ($ser_var = mysqli_fetch_assoc($exp_service)) {
    $service_id       = $ser_var["service_id"];
    $service_complete = $ser_var["service_type"];

    if ($service_complete == 1) {

        $service_full = get_user_full_service($service_id);

        while ($order = mysqli_fetch_assoc($service_full)) {
            $service_id = $order["full_service_id"];
            $servicio   = $order["servicio"];
            $costo      = $order["costo"];
        }

        $service_full = get_full_service($service_id);

        while ($order = mysqli_fetch_assoc($service_full)) {
            $service_type   = $order["categoria"];
            $service_aduana = $order["aduana"];
            $service_sede   = $order["sede"];
        }

    } else {

        $service = get_user_service($service_id);

        while ($order = mysqli_fetch_assoc($service)) {
            $service_id = $order["service_id"];
            $servicio   = $order["servicio"];
            $costo      = $order["costo"];
        }

        $service_single = get_service($service_id);

        while ($order = mysqli_fetch_assoc($service_single)) {
            $service_type   = $order["categoria"];
            $service_aduana = $order["aduana"];
            $service_sede   = $order["sede"];
        }

    }

}

$categoria_servicio = $service_type;

// REDIRECT IF JURIDICO
if ($_SESSION["admin_depto"] == "JURIDICO") {
    redirect_to("expediente.php?id=$id");
}

$dua_number = get_dua_number_for_exp($exp_id);

?>



<?php include "../layouts/pages-navbar.php";?>


  <div class="page">
    <div class="page-content">
      <div class="row">
        <div class="col-xxl-9 col-xl-8 col-lg-12">
          <div class="card">
            <div class="card-block">
              <h4 class="card-title project-title">
               <a class="btn btn-block btn-primary" href="expediente.php?id=<?php echo $id; ?>" role="">Expediente #<?php echo $exp_id ?> | (<?php echo $servicio; ?>)</a>
              </h4>
              <a class="avatar img-bordered avatar-100 float-right" href="javascript:void(0)" >
              	<img src="user-pics/<?php $path = "user-pics/$user_id.jpeg";if (file_exists($path)) {echo $user_id . ".jpeg";} else {echo "0.jpg";}?>" alt="...">
              </a>

              <p class="card-text">
                Cliente:<a href="user-review.php?id=<?php echo $user_id ?>" class="ml-5"><?php echo $razon; ?> | <?php echo $nit; ?></a>
              <?php echo message(); ?>
              </p>
            </div>

		  			<div class="panel" id="projects">
					  	<div class="card-block project-comments">
				        <div class="row">

							  	<div class="col-md-4">

			            	<h4 class="m-0">Actividades de Etapa</h4>
			            	<br>

				            <div class="tab-content">
				             	<form action="expediente-3.php?id=<?php echo $id; ?>" method="post">
							         	<div class="card-block project-checklist">
							 		<!--
		              <div class="progress progress-xs" data-plugin="progress" data-labeltype="percentage">
		                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemax="100"
		                aria-valuemin="0" aria-valuenow="0">
		                </div>
		                <div class="progress-label progress-percent blue-grey-400"></div>
		              </div>
		               -->

		               <?php
$titulo = "Transmisión";

$todos                  = get_all_exp_activities($exp_id);
$total_activities_stage = 0;
$actividades_done       = 1;

while ($db_var = mysqli_fetch_assoc($todos)) {
    $actividad_exp_id = $db_var["id"];
    $actividad_id     = $db_var["actividad_id"];
    $status_actividad = $db_var["status"];

    $req_act = get_actividad_for_stage($actividad_id, $titulo);

    while ($db_var = mysqli_fetch_assoc($req_act)) {
        if ($status_actividad != 1) {$status_actividad = 0;}
        $actividades_done = $actividades_done * $status_actividad;
        $total_activities_stage++;
        $id_actividad    = $db_var["id"];
        $actividad       = $db_var["actividad"];
        $encargado       = $db_var["encargado"];
        $departamento    = $db_var["departamento"];
        $lugar_gestion   = $db_var["lugar_gestion"];
        $nombre_contacto = $db_var["nombre_contacto"];
        $info_contacto   = $db_var["info_contacto"];
        ?>

					      <div class="checkbox-custom checkbox-primary mb-15">
					        <input type="checkbox" <?php if ($status_actividad == 1) {
            echo "checked";
        }
        ?> name="actividad-<?php echo $actividad_exp_id; ?>" value="1">
					        <label class="title" data-content="<?php echo $encargado . " - " . $lugar_gestion; ?>"
                  data-trigger="hover" data-toggle="popover" ><?php echo $actividad; ?></label>
					      </div>


					  <?php
}
}
?>

		            </div>
		            <input type="hidden" name="service_id" 			value="<?php echo $service_id; ?>">
								<input type="hidden" name="flow_id" 				value="4">
								<input type="hidden" name="etapa" 					value="<?php echo $titulo; ?>">
								<input type="hidden" name="id" 							value="<?php echo $id; ?>">
								<input type="hidden" name="admin_id" 				value="<?php echo $_SESSION["admin_id"]; ?>">
							  <button type="submit" name="update-stage" 	value="Submit" class="btn  btn-primary btn-sm btn-block" <?php if ($actividades_done == 1) {echo "disabled";}?>> 	Actualizar <?php echo $titulo; ?>
							  </button>
							</form>
<!--
							<br><br>

				      <form action="dua-just-create-xml.php" class="form-material" method="post">
				      	<div class="form-group">
						      <div class="input-group">
						      	<select class="form-control" id="IDENTIFICADOR_MENSAJE" name="IDENTIFICADOR_MENSAJE">
						      		<option value="1"> PRUEBA (1) </option>
						      		<option value="6"> DEFINITIVO (6) </option>
						      	</select>
            				<input type="hidden" name="dua_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-default btn-pill-right btn-xs" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> XML <strong><?php echo $dua_number; ?> </strong>
				            </button>
						      </div>
								</div>
							</form>  -->

							<br><br>
				      <form action="duca-just-create-xml.php" class="form-material" method="post">
				      	<div class="form-group">
						      <div class="input-group">
						      	<select class="form-control" id="IDENTIFICADOR_MENSAJE" name="IDENTIFICADOR_MENSAJE">
						      		<option value="1"> PRUEBA (1) </option>
						      	<!-- 	<option value="6"> DEFINITIVO (6) </option>  -->
						      	</select>
            				<input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-default btn-pill-right btn-xs" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> DUCA
				            </button>
						      </div>
								</div>
							</form>
							<br><br>


              <a href="transmit-duca.php?dua=<?php echo $dua_number; ?>&exp=<?php echo $exp_id; ?>" class="btn btn-info btn-md btn-block">
	              <i class="icon icon-md md-arrow-right-top mr-0"></i> TRANSMITIR WS DUCA - SAT
	            </a>
              <br>
              <br>

					  <button class="btn  btn-dark btn-md btn-block" data-target="#aduanaSinPapeles" data-toggle="modal"> VERIFICAR DECLARACIONES SAT</button>

							<br><br>
					  <a class="btn  btn-info btn-md btn-block" href="https://declaraguate.sat.gob.gt/declaraguate-web/" target="_blank"> FORMULARIOS DECLARAGUATE - PAGO DECLARACION </a>
            </div>
          </div>

				  <div class="col-md-8">
              <h2 class="m-0"><?php echo $titulo; ?></h2>
					  <br>

              <h4 class="card-title mb-0"><i class="icon md-file"></i>  Documentos a Transmitir</h4>

              <ul class="list-group list-group-full list-group-dividered mb-0">

              <?php

$docto_details = get_docto_asociado_by_id(1);

while ($order = mysqli_fetch_assoc($docto_details)) {
    $nombre    = $order["nombre"];
    $detalle   = $order["detalle"];
    $categoria = $order["categoria"];
}

?>

          <li class="list-group-item">
          <div class="media">
            <div class="media-body">

							<br> <br>

	          <?php
if (is_null(get_dua_transmit_status($dua_number))) {
    ?>

<!--               <form action="dua-create-xml.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		              	<select class="form-control" id="IDENTIFICADOR_MENSAJE" name="IDENTIFICADOR_MENSAJE">
						      		<option value="1"> DEFINITIVO (1) </option>
						      		<option value="6"> PRUEBA (6) </option>
						      	</select>
		                <input type="hidden" name="dua_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-info btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> TRANSMITIR DUA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form> -->

							<form action="duca-create-xml.php" method="post" class="form-material">
				      			<div class="form-group">
									<div class="input-group">
		              					<select class="form-control" id="IDENTIFICADOR_MENSAJE" name="IDENTIFICADOR_MENSAJE">
								      		<option value="1"> PRUEBA (1) </option>
								      		<option value="6"> DEFINITIVO (6) </option>
								      	</select>
		                				<input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-info btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> TRANSMITIR DUCA <strong><?php echo $dua_number; ?> </strong>
							            </button>
							    	</div>
						        </div>
							</form>


							<?php
} else {

    $tx_log  = get_all_dua_transmit_id($dua_number);
    $tx_flag = 1;
    while ($db_var = mysqli_fetch_assoc($tx_log)) {
        $tx_id        = $db_var["id"];
        $tx_agente    = $db_var["agente"];
        $tx_counter   = $db_var["counter"];
        $tx_timestamp = $db_var["timestamp"];
        $tx_date_ext  = $db_var["date_ext"];
        $tx_status    = $db_var["status"];

        if ($tx_status == 1) {
            $tx_flag = 0;

            ?>

							<!-- 	 <button class="btn btn-icon btn-primary btn-block btn-sm" type="submit" onclick="refreshTable();" >
									REVISAR RESPUESTA <strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
		            </button> -->
							<div class="btn-group btn-group-justified" role="group">
								<div class="btn-group" role="group">
                  <button type="button" class="btn btn-default text-left" data-toggle="modal" data-target="#txmodal<?php echo $tx_id; ?>">
                    <i class="icon icon-md md-file-text mr-0"></i> XML <strong> D<?php echo $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?> </strong>
                  </button>
                </div>
              	<div class="btn-group" role="group">
               		<button class="btn btn-icon btn-primary btn-block btn-sm" type="submit" onclick="refreshTable<?php echo $tx_id; ?>();" >
										REVISAR RESPUESTA DUCA<strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
		            	</button>
                </div>
              </div>

							<!-- Tx Modal -->
							<div id="txmodal<?php echo $tx_id; ?>" class="modal fade modal-fill-in" role="dialog">
                    <div class="modal-dialog modal-simple">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">SOLICITUD <?php echo $tx_type . " D" . $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?></h4>
							      </div>
							      <div class="modal-body">
								      <textarea style="width: 100%; height: 600px;"><?php
$xml_content = file_get_contents('ducas-xml-tx/D' . $tx_agente . $exp_id . $tx_counter . '.' . $tx_date_ext);
            $xml         = utf8_encode($xml_content);
            $xml         = formatXmlString($xml);
            echo $xml;
            ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>




		            <div id="tableHolder"><br></div>

<!-- 								<script type="text/javascript">
									function refreshTable(){

										var xmlhttp = new XMLHttpRequest();
										xmlhttp.onreadystatechange = function() {
										  if (this.readyState == 4 && this.status == 200) {
										      document.getElementById("tableHolder").innerHTML = this.responseText;
										  }
										};
										xmlhttp.open("GET", "ajax/get_tx_status.php?id=<?php echo $tx_id; ?>", true);
										xmlhttp.send();


										//setTimeout(refreshTable(), 5000);
									}
								</script>  -->

								<script type="text/javascript">
									function refreshTable<?php echo $tx_id; ?>(){

										var xmlhttp = new XMLHttpRequest();
										xmlhttp.onreadystatechange = function() {
										  if (this.readyState == 4 && this.status == 200) {
										      document.getElementById("tableHolder").innerHTML = this.responseText;
										  }
										};
										xmlhttp.open("GET", "ajax/get_duca_tx_status.php?id=<?php echo $tx_id; ?>", true);
										xmlhttp.send();


									//	setTimeout(refreshTable(), 5000);
									}

								</script>

							<?php
} else if ($tx_status == 2) {

            ?>
								<?php $button_status = "btn-danger";?>
								<div class="btn-group btn-group-justified" role="group">
								<div class="btn-group" role="group">
                  <button type="button" class="btn btn-default text-left" data-toggle="modal" data-target="#txmodal<?php echo $tx_id; ?>">
                    <i class="icon icon-md md-file-text mr-0"></i> XML <strong> D<?php echo $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?> </strong>
                  </button>
                </div>
              	<div class="btn-group" role="group">
                  <button type="button" class="btn <?php echo $button_status; ?> text-left" data-toggle="modal" data-target="#rxmodal<?php echo $tx_id; ?>">
                  <!-- <button type="button" class="btn <?php echo $button_status; ?> text-left" onclick="window.open('ducas-xml-rx/W<?php echo $tx_agente . $exp_id . $tx_counter; ?>.err')" > -->
                    <i class="icon icon-md md-file mr-0"></i>  <?php echo $tx_type; ?> <strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
                  </button>
                </div>
              </div>

							<!-- Tx Modal -->
							<div id="txmodal<?php echo $tx_id; ?>" class="modal fade modal-fill-in" role="dialog">
                    <div class="modal-dialog modal-simple">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">SOLICITUD <?php echo $tx_type . " D" . $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?></h4>
							      </div>
							      <div class="modal-body">
								      <textarea style="width: 100%; height: 600px;"><?php
$xml_content = file_get_contents('ducas-xml-tx/D' . $tx_agente . $exp_id . $tx_counter . '.' . $tx_date_ext);
            $xml         = utf8_encode($xml_content);
            $xml         = formatXmlString($xml);
            echo $xml;
            ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>


									<!-- Rx Modal -->
							<div id="rxmodal<?php echo $tx_id; ?>"  class="modal fade modal-fill-in" role="dialog">
                    <div class="modal-dialog modal-simple">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">RESPUESTA <?php echo $tx_type . " D" . $tx_agente . $exp_id . $tx_counter . ".err"; ?></h4>
							      </div>
							      <div class="modal-body">


								      <textarea style="width: 100%; height: 400px;"><?php
$xml_content = file_get_contents('ducas-xml-rx/D' . $tx_agente . $exp_id . $tx_counter . '.err');
            $xml         = utf8_encode($xml_content);
            $xml         = formatXmlString($xml);
            echo $xml;
            ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>




				<!-- 				<a  href="rx-error.php?exp=<?php echo $exp_id; ?>&doc=A<?php echo $tx_agente . $exp_id . $tx_counter; ?>.err" class="btn btn-danger btn-block btn-xs">
									RECHAZADA<strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
		            </a>
								<br>
 -->
		<!-- 						<a  href="rx-error.php?exp=<?php echo $exp_id; ?>&doc=D<?php echo $tx_agente . $exp_id . $tx_counter; ?>.err" class="btn btn-danger btn-block btn-xs">
									RECHAZADA<strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
		            </a>
								<br>   -->

							<?php
} else if ($tx_status == 3) {
            $tx_flag = 0;
            ?>

		<!-- 						<a  href="duas-xml-rx/A<?php echo $tx_agente . $exp_id . $tx_counter; ?>.err" target="_blank" class="btn btn-success btn-block btn-x;">
									TX ACEPTADA <strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
		            </a>
								<br>
								<br>
 -->

						<!-- 		<a  href="ducas-xml-rx/D<?php echo $tx_agente . $exp_id . $tx_counter; ?>.err" target="_blank" class="btn btn-success btn-block btn-x;">
									TX ACEPTADA <strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
		            </a>
								<br>
								<br>
 -->
				<?php $button_status = "btn-success";?>
								<div class="btn-group btn-group-justified" role="group">
								<div class="btn-group" role="group">
                  <button type="button" class="btn btn-default text-left" data-toggle="modal" data-target="#txmodal<?php echo $tx_id; ?>">
                    <i class="icon icon-md md-file-text mr-0"></i> XML <strong> D<?php echo $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?> </strong>
                  </button>
                </div>
              	<div class="btn-group" role="group">
                  <button type="button" class="btn <?php echo $button_status; ?> text-left" data-toggle="modal" data-target="#rxmodal<?php echo $tx_id; ?>">
                  <!-- <button type="button" class="btn <?php echo $button_status; ?> text-left" onclick="window.open('ducas-xml-rx/W<?php echo $tx_agente . $exp_id . $tx_counter; ?>.err')" > -->
                    <i class="icon icon-md md-file mr-0"></i>  <?php echo $tx_type; ?> <strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
                  </button>
                </div>
              </div>

							<!-- Tx Modal -->
							<div id="txmodal<?php echo $tx_id; ?>" class="modal fade modal-fill-in" role="dialog">
                    <div class="modal-dialog modal-simple">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">SOLICITUD <?php echo $tx_type . " D" . $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?></h4>
							      </div>
							      <div class="modal-body">
								      <textarea style="width: 100%; height: 600px;"><?php
$xml_content = file_get_contents('ducas-xml-tx/D' . $tx_agente . $exp_id . $tx_counter . '.' . $tx_date_ext);
            $xml         = utf8_encode($xml_content);
            $xml         = formatXmlString($xml);
            echo $xml;
            ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>



									<!-- Rx Modal -->
							<div id="rxmodal<?php echo $tx_id; ?>"  class="modal fade modal-fill-in" role="dialog">
                    <div class="modal-dialog modal-simple">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">RESPUESTA <?php echo $tx_type . " D" . $tx_agente . $exp_id . $tx_counter . ".err"; ?></h4>
							      </div>
							      <div class="modal-body">


								      <textarea style="width: 100%; height: 400px;"><?php
$xml_content = file_get_contents('ducas-xml-rx/D' . $tx_agente . $exp_id . $tx_counter . '.err');
            $xml         = utf8_encode($xml_content);
            $xml         = formatXmlString($xml);
            echo $xml;
            ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>



							<?php
}
    }

    if ($tx_flag == 1) {
        ?>
									<br>
<!-- 								<form action="dua-create-xml.php" method="post">
					      	<div class="form-group">
										<div class="input-group">
			              	<select class="form-control" id="IDENTIFICADOR_MENSAJE" name="IDENTIFICADOR_MENSAJE">
							      		<option value="1"> DEFINITIVO (1) </option>
							      		<option value="6"> PRUEBA (6) </option>
							      	</select>
			                <input type="hidden" name="dua_numero" value="<?php echo $dua_number; ?>" >
											<button class="btn btn-icon btn-info btn-xl" type="submit">
												<i class="icon icon-md md-file-text mr-0"></i> RE-TRANSMITIR DUA <strong><?php echo $dua_number; ?> </strong>
					            </button>
					          </div>
					        </div>
										</form>  -->
										<br>
							<!--
								<form action="duca-create-xml.php" method="post">
					      	<div class="form-group">
										<div class="input-group">
			              	<select class="form-control" id="IDENTIFICADOR_MENSAJE" name="IDENTIFICADOR_MENSAJE">
							      		<option value="1"> PRUEBA (1) </option>
							      		<option value="6"> DEFINITIVO (6) </option>
							      	</select>
			                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
											<button class="btn btn-icon btn-info btn-xl" type="submit">
												<i class="icon icon-md md-file-text mr-0"></i> RE-TRANSMITIR DUCA <strong><?php echo $dua_number; ?> </strong>
					            </button>
					          </div>
					        </div>
					      </form>  -->

									<?php
}
}
?>




              <?php // if ( get_firma_for_numero_orden($dua_number)=="FIRMA_PRUEBA" ){ ?>

              <?php if (1) {?>

								<form action="duca-create-xml.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		              	<select class="form-control" id="IDENTIFICADOR_MENSAJE" name="IDENTIFICADOR_MENSAJE">
						      		<option value="1"> PRUEBA (1) </option>
						      		<option value="6"> DEFINITIVO (6) </option>
						      	</select>
		                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-info btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> TRANSMITIR DUCA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form>

							<?php }?>


							 <hr>



              <h4 class="card-title mb-0"><i class="icon md-file"></i>  Documentos Declaración</h4>
					  <br>

							<?php if (strlen(get_firma_for_numero_orden($dua_number)) > 1 && get_firma_for_numero_orden($dua_number) != "FIRMA_PRUEBA") {
    ?>
								<form action="duca-form-signed.php" method="post" target="_blank">
                 <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
								 <button class="btn btn-icon btn-primary btn-block btn-sm" type="submit">
									<i class="icon icon-md md-print mr-0"></i> PDF DUCA FIRMADA
                 </button>
                </form>

                <?php
if (uses_duca_resumida($exp_id)) {

        ?>
					  		<button class="btn  btn-dark btn-md btn-block" data-target="#ducaResumida" data-toggle="modal"><i class="icon icon-md md-print mr-0"></i> DUCA RESUMIDA</button>
								<?php

    } // end if uses_duca_resumida

    $regimen_dva = get_regimen_for_exp($exp_id);
    $COD_MOD_EXP = explode("-", $regimen_dva);
    $id_grupo    = ($COD_MOD_EXP[0]);
    $id_regimen  = ($COD_MOD_EXP[1]);

    $uses_dva = uses_dva_by_regimen_grupo($id_grupo, $id_regimen);
    if ($uses_dva) {

        // GET DVA PROVEEDORES LIST
        $proveedores_exp = get_distinct_proveedor_for_exp_id($exp_id);
        while ($db_var = mysqli_fetch_assoc($proveedores_exp)) {
            $proveedor_id   = $db_var["proveedor_id"];
            $proveedor_name = proveedor_name_by_id($proveedor_id);
            ?>
      					<form action="dva-form.php" method="post"target="_blank">
                 	<input type="hidden" name="dua_numero" value="<?php echo $dua_number; ?>" >
	                <input type="hidden" name="proveedor_id" value="<?php echo $proveedor_id; ?>" >
									<button class="btn btn-icon btn-default btn-block btn-sm" type="submit">
										<i class="icon icon-md md-print mr-0"></i> PDF DVA - <?php echo $proveedor_name; ?>
                  </button>
                </form>

<?php }}?>
								<br><hr>

<?php }?>




<!--
							<a href="transmit-test-duca.php?dua=<?php echo $dua_number; ?>&exp=<?php echo $exp_id; ?>" class="btn btn-info btn-md btn-block">
	              <i class="icon icon-md md-arrow-right-top mr-0"></i> TRANSMITIR DUCA - SAT
	            </a>
              <br>

              <a href="transmit-test.php?dua=<?php echo $dua_number; ?>&exp=<?php echo $exp_id; ?>" class="btn btn-info btn-md btn-block">
	              <i class="icon icon-md md-arrow-right-top mr-0"></i> TRANSMITIR DUA - SAT
	            </a>
              <br>
              <br>

              <a href="transmit-responses.php?dua=<?php echo $dua_number; ?>&exp=<?php echo $exp_id; ?>" class="btn btn-success btn-md btn-block">
	              <i class="icon icon-md md-arrow-right-top mr-0"></i> RXs DUA - SAT
	            </a>
              <br>
              <br>
-->


	<!-- 				  <button class="btn  btn-warning btn-xs btn-block" data-target="#aduanaPagos" data-toggle="modal"> FORMULARIOS DECLARAGUATE - PAGO DECLARACION </button>   -->




					<!-- BEGIN SAT MODAL  -->
                  <div class="modal fade modal-fill-in" id="aduanaSinPapeles" aria-hidden="false" aria-labelledby="aduanaSinPapeles" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-simple">
                      <div class="modal-content" style="width: 100%">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="exampleFillInModalTitle">VERIFICADOR DE DECLARACIONES SAT</h4>
                        </div>
                        <div class="modal-body">
                        	<br>
                        <!-- 	<iframe src="https://portal.sat.gob.gt/portal/consulta-declaracion-unica-aduanera/" style="width:100%; height: 800px"></iframe> -->
                        </div>
                      </div>
                    </div>
                  </div>
          <!-- END SAT MODAL -->

					<!-- BEGIN DUCA RESUMIDA MODAL  -->
                  <div class="modal fade modal-fill-in" id="ducaResumida" aria-hidden="false" aria-labelledby="ducaResumida" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-simple">
                      <div class="modal-content" style="width: 50%">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="exampleFillInModalTitle">OPCIONES DE IMPRESION DUCA RESUMIDA</h4>
                        </div>
                        <div class="modal-body">
                        	<br>
                        	<form action="duca-resumida-form.php" method="post" target="_blank">
                        		<div class="row">
                        			<div class="col-md-6">
												      	<div class="checkbox-custom checkbox-primary mb-15">
													        <input type="checkbox" name="selectivo" value="1" checked>
													        <label class="title" data-content="" data-trigger="hover" data-toggle="popover">SELECTIVO DUCA</label>
													      </div>
                        			</div>
                        			<div class="col-md-6">
												      	<div class="checkbox-custom checkbox-primary mb-15">
													        <input type="checkbox" name="bultos" value="1" checked>
													        <label class="title" data-content="" data-trigger="hover" data-toggle="popover">TOTAL DE BULTOS</label>
													      </div>
                        			</div>
                        			<div class="col-md-6">
												      	<div class="checkbox-custom checkbox-primary mb-15">
													        <input type="checkbox" name="deposito" value="1" checked>
													        <label class="title" data-content="" data-trigger="hover" data-toggle="popover">DEPOSTITO</label>
													      </div>
                        			</div>
                        			<div class="col-md-6">
												      	<div class="checkbox-custom checkbox-primary mb-15">
													        <input type="checkbox" name="almacen" value="1" checked>
													        <label class="title" data-content="" data-trigger="hover" data-toggle="popover">ALMACEN</label>
													      </div>
                        			</div>
                        			<div class="col-md-6">
												      	<div class="checkbox-custom checkbox-primary mb-15">
													        <input type="checkbox" name="numero_orden" value="1" checked>
													        <label class="title" data-content="" data-trigger="hover" data-toggle="popover">NÚMERO DE ORDEN</label>
													      </div>
                        			</div>
                        			<div class="col-md-12">
	<table class="table table-hover table-responsive" data-plugin="floatThead">
		                    <thead>
		                      <tr>
		                        <th>
		                          DESCRIPCIÓN
		                        </th>
		                        <th>
		                          NÚMERO DOCUMENTO
		                        </th>
		                        <th class="text-center	w-40">
			                     		SELECCIÓN
		                        </th>
		                      </tr>
		                    </thead>

		                    <tbody class="table-responsive " >
	                        <?php
$doctos_data = get_documentos_for_numero_orden($dua_number);
while ($order = mysqli_fetch_assoc($doctos_data)) {
    $id_docto            = $order["id"];
    $tipo_documento      = $order["TIPO_DOCUMENTO"];
    $descripcion         = $order["DESCRIPCION_DOCUMENTO"];
    $secuencia_inicial   = $order["SECUENCIA_DOCUMENTO_INICIAL"];
    $secuencia_final     = $order["SECUENCIA_DOCUMENTO_FINAL"];
    $numero_docto        = $order["NUMERO_DOCUMENTO"];
    $entidad_emite       = $order["ENTIDAD_EMITE"];
    $fecha_emision       = $order["FECHA_EMISION"];
    $fecha_vencimiento   = $order["FECHA_VENCIMIENTO"];
    $codigo_moneda       = $order["CODIGO_MONEDA"];
    $monto_documento     = $order["MONTO_DOCUMENTO"];
    $fraccion_precedente = $order["FRACCION_PRECEDENTE"];
    ?>

								                <tr>
							                        <td>
							                         (<?php echo $tipo_documento; ?>) <?php echo $descripcion; ?>
							                        </td>
							                        <td>
							                         	<?php echo $numero_docto; ?>
							                        </td>
							                        <td class="text-center">
																      	<div class="checkbox-custom checkbox-primary mb-15">
																	        <input type="checkbox" name="docto-<?php echo $id_docto; ?>" value="1">
																	        <label class="title" data-content="" data-trigger="hover" data-toggle="popover">IMPRIMIR</label>
																	      </div>
							                        </td>

												 </tr>

						                    <?php }

$total_general = $total + $otros;
?>

						                    </tbody>
						                   </table>
                        			</div>
					                 <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
													 <button class="btn btn-icon btn-info btn-block btn-sm" type="submit">
														<i class="icon icon-md md-print mr-0"></i> PDF DUCA RESUMIDA
					                 </button>
					               </form>
                        </div>
                      </div>
                    </div>
                  </div>
          <!-- END DUCA RESUMIDA MODAL -->



					<!-- BEGIN SAT MODAL  -->
                  <div class="modal fade modal-fill-in" id="aduanaPagos" aria-hidden="false" aria-labelledby="aduanaPagos" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-simple">
                      <div class="modal-content" style="width: 100%">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="exampleFillInModalTitle">VERIFICADOR DE DECLARACIONES SAT</h4>
                        </div>
                        <div class="modal-body">
                        	<br>
                        <!-- 	<iframe src="https://declaraguate.sat.gob.gt/declaraguate-web/" style="width:100%; height: 800px"></iframe> -->
                        </div>
                      </div>
                    </div>
                  </div>
          <!-- END SAT MODAL -->


                    </div>
                  </div>
                </li>

              </ul>

				  </div>




			  </div>
            </div>

		  </div>
        </div>


          <div class="card">
            <div class="card-block">
            <div class="row">

				  <div class="col-md-4">

			            	<h4 class="m-0">Solicitud de Web Service - SAT</h4>
			            	<br>
						<?php
if (1) {
    //     if (strlen(get_firma_for_numero_orden($dua_number))<1 || get_firma_for_numero_orden($dua_number)=="FIRMA_PRUEBA"){
    // if ( $duca_firmada ) {

    //     if ( $selectivo_recuperado ) {
    if (1) {
        ?>


								<form action="duca-selectivo-request.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		                <input type="hidden" name="IDENTIFICADOR_MENSAJE" value="FIRMA" >
		                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-primary btn-block btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> RECUPERACION DE FIRMA SAT DUCA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form>

							<form action="duca-selectivo-request.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		                <input type="hidden" name="IDENTIFICADOR_MENSAJE" value="SELECTIVO" >
		                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-info btn-block btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> SOLICITUD DE SELECTIVO DUCA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form>

							<form action="duca-selectivo-request.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		                <input type="hidden" name="IDENTIFICADOR_MENSAJE" value="RECSELECTIVO" >
		                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-default btn-block btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> RECUPERACION DE SELECTIVO SAT DUCA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form>

							<?php } else {
        ?>
							<form action="duca-selectivo-request.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		                <input type="hidden" name="IDENTIFICADOR_MENSAJE" value="RECSELECTIVO" >
		                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-primary btn-block btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> RECUPERACION DE SELECTIVO SAT DUCA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form>

							<form action="duca-selectivo-request.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		                <input type="hidden" name="IDENTIFICADOR_MENSAJE" value="SELECTIVO" >
		                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-info btn-block btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i>SOLICITUD  DE SELECTIVO DUCA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form>

							<?php
}
} else {
    ?>
							<form action="duca-selectivo-request.php" method="post" class="form-material">
				      	<div class="form-group">
									<div class="input-group">
		                <input type="hidden" name="IDENTIFICADOR_MENSAJE" value="FIRMA" >
		                <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
										<button class="btn btn-icon btn-primary btn-block btn-xl" type="submit">
											<i class="icon icon-md md-file-text mr-0"></i> SOLICITUD DE FIRMA SAT DUCA <strong><?php echo $dua_number; ?> </strong>
				            </button>
				          </div>
			        	</div>
							</form>
							<?php
}
?>


					</div>
				  <div class="col-md-8">
              <h2 class="m-0">Respuestas de WS</h2>
					  	<br>
              <h4 class="card-title mb-0"><i class="icon md-file"></i>  Solicitud Enviada y Respuesta</h4>
							<br>
							 <?php
$duca_firmada         = 0;
$selectivo_recuperado = 0;
$tx_log               = get_all_duca_ws_transmit_id($dua_number);
while ($db_var = mysqli_fetch_assoc($tx_log)) {
    $tx_id        = $db_var["id"];
    $tx_agente    = $db_var["agente"];
    $tx_counter   = $db_var["counter"];
    $tx_type      = $db_var["type"];
    $tx_date_ext  = $db_var["date_ext"];
    $tx_timestamp = $db_var["timestamp"];
    $tx_status    = $db_var["status"];

    // CHECK FOR SUCCESFULL FIRMA
    if ($tx_status == 3 && $tx_type == "FIRMA") {$duca_firmada = 1;}
    // CHECK FOR SUCCESFULL FIRMA
    if ($tx_status == 3 && $tx_type == "RECSELECTIVO") {$selectivo_recuperado = 1;}
    // CHECK FOR SUCCESFULL FIRMA
    if ($tx_status == 3 && $tx_type == "SELECTIVO") {$selectivo_recuperado = 1;}

    if ($tx_status == 1) {
        ?>

							<div class="btn-group btn-group-justified" role="group">
								<div class="btn-group" role="group">
                  <button type="button" class="btn btn-default text-left" data-toggle="modal" data-target="#wstxmodal<?php echo $tx_id; ?>">
                  	<!-- onclick="window.open('ducas-xml-tx/W<?php echo $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?>')" -->
                    <i class="icon icon-md md-file-text mr-0"></i> SOLICITUD <strong> W<?php echo $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?> </strong>
                  </button>
                </div>
              	<div class="btn-group" role="group">
                  <button type="button" class="btn btn-primary text-left" onclick="refreshWebservice<?php echo $tx_id; ?>();"  >
                    <i class="icon icon-md md-file mr-0"></i>  VERIFICAR <?php echo $tx_type; ?><strong> </strong>
                  </button>
                </div>
              </div>

							<!-- Modal -->
							<div id="wstxmodal<?php echo $tx_id; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">SOLICITUD <?php echo $tx_type . " W" . $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?></h4>
							      </div>
							      <div class="modal-body">
								      <textarea style="width: 100%; height: 200px;"><?php
$xml_content = file_get_contents('ducas-xml-tx/W' . $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext);
        $xml         = utf8_encode($xml_content);
        $xml         = formatXmlString($xml);
        echo $xml;
        ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>

		            <div id="WStableHolder"><br></div>

								<script type="text/javascript">

									function refreshWebservice<?php echo $tx_id; ?>(){

										var xmlhttp = new XMLHttpRequest();
										xmlhttp.onreadystatechange = function() {
										  if (this.readyState == 4 && this.status == 200) {
										      document.getElementById("WStableHolder").innerHTML = this.responseText;
										  }
										};
										xmlhttp.open("GET", "ajax/get_duca_ws_tx_status.php?id=<?php echo $tx_id; ?>", true);
										xmlhttp.send();

										//setTimeout(refreshTable(), 5000);
									}


								</script>

							<?php
} else {

        if ($tx_status == 2) {$button_status = "btn-danger";} else { $button_status = "btn-success";}
        ?>
							<div class="btn-group btn-group-justified" role="group">
								<div class="btn-group" role="group">
                  <button type="button" class="btn btn-default text-left" data-toggle="modal" data-target="#wstxmodal<?php echo $tx_id; ?>">
                    <i class="icon icon-md md-file-text mr-0"></i> SOLICITUD <strong> W<?php echo $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?> </strong>
                  </button>
                </div>
              	<div class="btn-group" role="group">
                  <button type="button" class="btn <?php echo $button_status; ?> text-left" data-toggle="modal" data-target="#wsrxmodal<?php echo $tx_id; ?>">
                  <!-- <button type="button" class="btn <?php echo $button_status; ?> text-left" onclick="window.open('ducas-xml-rx/W<?php echo $tx_agente . $exp_id . $tx_counter; ?>.err')" > -->
                    <i class="icon icon-md md-file mr-0"></i>  <?php echo $tx_type; ?> <strong> <?php echo $dua_number . " - " . $tx_counter; ?> </strong>
                  </button>
                </div>
              </div>

							<!-- Tx Modal -->
							<div id="wstxmodal<?php echo $tx_id; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">SOLICITUD <?php echo $tx_type . " W" . $tx_agente . $exp_id . $tx_counter . "." . $tx_date_ext; ?></h4>
							      </div>
							      <div class="modal-body">
								      <textarea style="width: 100%; height: 200px;"><?php
$xml_content = file_get_contents('ducas-xml-tx/W' . $tx_agente . $exp_id . $tx_counter . '.' . $tx_date_ext);
        $xml         = utf8_encode($xml_content);
        $xml         = formatXmlString($xml);
        echo $xml;
        ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>


									<!-- Rx Modal -->
							<div id="wsrxmodal<?php echo $tx_id; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">RESPUESTA <?php echo $tx_type . " W" . $tx_agente . $exp_id . $tx_counter . ".err"; ?></h4>
							      </div>
							      <div class="modal-body">


								      <textarea style="width: 100%; height: 200px;"><?php
$xml_content = file_get_contents('ducas-xml-rx/W' . $tx_agente . $exp_id . $tx_counter . '.err');
        $xml         = utf8_encode($xml_content);
        $xml         = formatXmlString($xml);
        echo $xml;
        ?>
								      </textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
							      </div>
							    </div>

							  </div>
							</div>

							<?php
}
}
?>

							<br> <br>

</div>	</div>

            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-12">
          <div class="card">
            <div class="card-block">
              <nav>
                <ul class="pagination">
                  <li class="page-item"><a class="btn btn-info" href="expediente-1.php?id=<?php echo $exp_id ?>">REQ</a></li>
                  <li class="page-item"><a class="btn btn-info" href="expediente-2.php?id=<?php echo $exp_id ?>">FOR</a></li>
                  <li class="page-item"><a class="btn btn-primary" href="expediente-3.php?id=<?php echo $exp_id ?>">TRA</a></li>
                  <li class="page-item"><a class="btn" href="expediente-4.php?id=<?php echo $exp_id ?>">GES</a></li>
                  <li class="page-item"><a class="btn" href="expediente-5.php?id=<?php echo $exp_id ?>">CON</a></li>
                  <li class="page-item"><a class="btn" href="expediente-6.php?id=<?php echo $exp_id ?>">ARC</a></li>
                </ul>
              </nav>
              <hr>
              <h4 class="project-option-title"><i class="icon md-calendar"></i>  Fechas</h4>
              <p class="mb-10">
                <span class="float-right pl-10"><strong> <?php echo $date; ?> </strong> <?php echo $time; ?></span>
                Inicio Expediente
              </p>
              <p>
                <span class="float-right pl-10">
                <?php
$date2 = date_create($date_counter);
$date1 = date_create(date("Y-m-d G:i:s"));
$diff  = date_diff($date1, $date2);
echo $diff->format("%a Días %h Horas %i Minutos");
?>
				</span>
                Tiempo Transcurrido
              </p>
              </ul>
              <div class="progress progress-xs mb-10">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemax="100"
                aria-valuemin="0" aria-valuenow="60" style="width: 60%;">
                </div>
              </div>
            </div>

          <div class="card-block">
              <h4 class="project-option-title"><i class="icon md-city"></i>  Sede - Aduana</h4>
              <a href="#"><?php echo $service_sede; ?> - <?php echo $service_aduana; ?></a>
            </div>


            <div class="card-block project-participators">
              <h4 class="project-option-title"><i class="icon md-accounts-alt"></i> Equipo</h4>
              <?php

$admins = get_admins_for_exp_by_id($id);

while ($db_var = mysqli_fetch_assoc($admins)) {
    $admin_id   = $db_var["admin_id"];
    $admin_rank = $db_var["rank"];

    $admin_data = get_admin_by_id($admin_id);
    while ($data = mysqli_fetch_assoc($admin_data)) {
        $admin_name = $data["firstname"] . " " . $data["lastname"];
        $admin_sede = $data["sede"];
    }

    ?>

              <div class="media mt-0">
                <div class="pr-20 text-middle">
                  <a href="javascript:void(0)" class="avatar">
	                  <img src="admin-pics/<?php $path = "admin-pics/" . $admin_id . ".jpeg";if (file_exists($path)) {echo $admin_id . ".jpeg";} else {echo "0.jpg";}?>" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="mt-0 mb-5 font-size-16"><?php echo $admin_name ?></h4>
                  <span><?php echo $admin_rank ?> - <?php echo $admin_sede ?></span>
                </div>
              </div>
              <br>
              <?php }?>

              <br>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->

<?php include "../layouts/footer.php";?>

  <!-- Firma E Plugins -->
  <script src="../../../global/js/firmae.js"></script>

  <script src="../../assets/js/reimg.js"></script>
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
  <script src="../../../global/vendor/jquery-ui/jquery-ui.js"></script>
  <script src="../../../global/vendor/asprogress/jquery-asProgress.js"></script>
  <script src="../../../global/vendor/blueimp-tmpl/tmpl.js"></script>
  <script src="../../../global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js"></script>
  <script src="../../../global/vendor/blueimp-load-image/load-image.all.min.js"></script>
  <script src="../../../global/vendor/blueimp-file-upload/jquery.fileupload.js"></script>
  <script src="../../../global/vendor/blueimp-file-upload/jquery.fileupload-process.js"></script>
  <script src="../../../global/vendor/blueimp-file-upload/jquery.fileupload-image.js"></script>
  <script src="../../../global/vendor/blueimp-file-upload/jquery.fileupload-audio.js"></script>
  <script src="../../../global/vendor/blueimp-file-upload/jquery.fileupload-video.js"></script>
  <script src="../../../global/vendor/blueimp-file-upload/jquery.fileupload-validate.js"></script>
  <script src="../../../global/vendor/blueimp-file-upload/jquery.fileupload-ui.js"></script>
  <script src="../../../global/vendor/summernote/summernote.min.js"></script>
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
  <script src="../../../global/js/Plugin/asprogress.js"></script>
  <script src="../../../global/js/Plugin/summernote.js"></script>
  <script src="../../assets/examples/js/pages/project.js"></script>
</body>
</html>
