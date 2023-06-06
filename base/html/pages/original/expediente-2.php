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

        $req_act = get_actividad_for_stage($actividad_id, $etapa);
        while ($db_var = mysqli_fetch_assoc($req_act)) {
            $id_actividad = $db_var["id"];
            $actividad    = $db_var["actividad"];

            $total_activities_stage = $actividad_status * $total_activities_stage;

            $query = "UPDATE usuarios_expedientes_actividades SET ";
            $query .= "status 	= '{$actividad_status}' ";
            $query .= "WHERE id = {$actividad_exp_id} ";
            $query .= "LIMIT 1";
            $result = mysqli_query($connection, $query);

            // Success
            $_SESSION["message"] = "Actividades de Expediente actualizadas";
            //redirect_to("user.php");
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

        if ($result) {
            // Success
            $_SESSION["message"] = "Estados actualizados";
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
    $exp_conf     = $db_var["confirmacion"];
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

?>



<?php include "../layouts/pages-navbar.php";?>


  <div class="page">
    <div class="page-content">
      <div class="row">
        <div class="col-xxl-9 col-xl-8 col-lg-12">
          <div class="card">
            <div class="card-block">
              <h4 class="card-title project-title">
               <a class="btn btn-block btn-primary" href="expediente.php?id=<?php echo $id; ?>" role="">
                    Expediente #<?php echo $exp_id ?> | (<?php echo $servicio; ?>)</a>
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

              <input type="checkbox" onClick="toggle()" /> SELECCIONAR TODOS <br/>
                <script>
                function toggle() {
                   var inputs = document.getElementsByTagName("input");
                    for(var i = 0; i < inputs.length; i++) {
                        if(inputs[i].type == "checkbox") {
                            inputs[i].checked = true;
                        }
                    }
                }
                </script>
                  <div class="tab-content">


                   <form action="expediente-2.php?id=<?php echo $id; ?>" method="post">


			         <div class="card-block project-checklist">


		               <?php
$titulo = "Formulación";

$todos                  = get_exp_activities($service_id, $id);
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
			            <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
									<input type="hidden" name="flow_id" value="3">
									<input type="hidden" name="etapa" value="<?php echo $titulo; ?>">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="hidden" name="admin_id" value="<?php echo $_SESSION["admin_id"]; ?>">
							  	<button type="submit" name="update-stage" value="Submit" class="btn  btn-primary btn-sm btn-block" <?php if ($actividades_done == 1) {echo "disabled";}?>> Actualizar <?php echo $titulo; ?></button>
		            </form>

		            <br>
		            <br>

              <h4 class="m-0">Adjuntar Confirmación</h4>
              <br>

              <?php if (file_exists("exp-docs/$exp_id/conf/$exp_conf")) {?>
    				<img class="img img-responsive" style="width:100%" src="exp-docs/<?php echo $exp_id; ?>/conf/<?php echo $exp_conf; ?>" alt="...">
            <?php } else {?>

        	  <button  class="btn btn-xs btn-block btn-dark"  data-target="#confimacionBorrador" data-toggle="modal"><?php echo "Subir Confirmación"; ?></button>

        	<?php }?>
					<!-- Modal SUBIR DOCUMENTO  -->
            <div class="modal fade modal-fill-in" id="confimacionBorrador" aria-hidden="false" aria-labelledby="exampleDocument<?php echo $document_id; ?>"
            role="dialog" tabindex="-1">
              <div class="modal-dialog modal-simple">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleFillInModalTitle">SUBIR IMAGEN DE CONFIRMACIÓN DUCA</h4>
                  </div>
                  <div class="modal-body">
                  	<form action="upload-exp-confirmacion.php" method="post"  enctype="multipart/form-data">

                      <div class="row">
                      	<br>
                      	<div class="col-xl-12 form-group">

					<label class="form-control-label" for="doc_id">IMAGEN DE CONFIRMACIÓN</label>
                   <input type="file" name="fileToUpload" value=""/><br />
                  </div>
				  <br><br>

					  <label class="form-control-label" for="referencia">REFERENCIA DOCUMENTO</label>
					<input type="text" class="form-control form-material" id="referencia" name="referencia" value="<?php echo $referencia; ?>">

				   <input type="hidden" class="form-control" name="user" value="<?php echo $user_id; ?>">
				   <input type="hidden" class="form-control" name="eid" value="<?php echo $exp_id; ?>">


                      </div>

                     	 <br>
				  <div class="col-xl-12">
                      	  <button type="submit" name="confirmacion-submit" class="btn  btn-primary btn-sm btn-block">Subir</button>
				  </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal SUBIR DOCUMENTO -->


                  </div>


                </div>

				  <div class="col-md-8">
              <h2 class="m-0"><?php echo $titulo; ?></h2>
					  <br>
				 <!--
					  PARA LA FORMULACION DE DUA Y DVA UTILIZAR ASPRADCO Y SUBIR DUA COMO DOCUMENTO ADJUNTO

      -->
              <h4 class="card-title mb-0"><i class="icon md-file"></i>  Documentos a Formular</h4>
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

                        <?php $dua_number = get_dua_number_for_exp($exp_id);?>


	               <!--
                    	  <a href="expediente-<?php echo strtolower($nombre) ?>-a.php?eid=<?php echo $exp_id ?>" class="btn btn-info btn-sm btn-block">FORMULACIÓN <?php echo $nombre; ?></a>
                    	  <br>
 -->


                   	<?php if (strlen(get_firma_for_numero_orden($dua_number)) < 1 || get_firma_for_numero_orden($dua_number) == "FIRMA_PRUEBA") {
    ?>
                       	<a class="btn btn-primary btn-block btn-sm" href="expediente-duca-express-1.php?eid=<?php echo $exp_id ?>">
													FORMULACION DUCA
                        </a>
 													<br>
                          <form action="duca-form.php" method="post" target="_blank">
			                     <input type="hidden" name="duca_numero" value="<?php echo $dua_number; ?>" >
													 <button class="btn btn-icon btn-default btn-block btn-sm" type="submit">
														<i class="icon icon-md md-print mr-0"></i> BORRADOR DUCA
		                       </button>
	                        </form>

		                  <nav>
		                    <ul class="pagination pagination-no-border pagination-xs">
<!--
							  <li class="page-item"><a class="page-link" href="expediente-dua-a.php?eid=<?php echo $exp_id ?>">SEC A</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-b.php?eid=<?php echo $exp_id ?>">SEC B</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-c.php?eid=<?php echo $exp_id ?>">SEC C</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-d.php?eid=<?php echo $exp_id ?>">SEC D</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-e.php?eid=<?php echo $exp_id ?>">SEC E</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-f.php?eid=<?php echo $exp_id ?>">SEC F</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-g.php?eid=<?php echo $exp_id ?>">SEC G</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-i.php?eid=<?php echo $exp_id ?>">SEC I</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-j.php?eid=<?php echo $exp_id ?>">SEC J</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-k.php?eid=<?php echo $exp_id ?>">SEC K</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-n.php?eid=<?php echo $exp_id ?>">SEC N</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-dua-q.php?eid=<?php echo $exp_id ?>">SEC Q</a></li>
 -->
      						  <li class="page-item"><a class="page-link" href="expediente-duca-express-1.php?eid=<?php echo $exp_id ?>">POLIZA</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-duca-express-2.php?eid=<?php echo $exp_id ?>">EQUIPAMIENTOS</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-duca-express-3.php?eid=<?php echo $exp_id ?>">OBSERVACIONES</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-duca-express-4.php?eid=<?php echo $exp_id ?>">ITEMS</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-duca-express-6.php?eid=<?php echo $exp_id ?>">TRIBUTOS</a></li>
		                      <li class="page-item"><a class="page-link" href="expediente-duca-express-7.php?eid=<?php echo $exp_id ?>">DOCUMENTOS</a></li>
		                    </ul>
		                  </nav>

                         <?php

    $regimen_dva = get_regimen_for_exp($exp_id);
    $COD_MOD_EXP = explode("-", $regimen_dva);
    $id_grupo    = ($COD_MOD_EXP[0]);
    $id_regimen  = ($COD_MOD_EXP[1]);

    $uses_dva = uses_dva_by_regimen_grupo($id_grupo, $id_regimen);
    if ($uses_dva) {

        // GET DVA PROVEEDORES LIST
        $proveedores_exp = get_distinct_proveedor_for_exp_id($exp_id);
        $proveedor_list  = [];
        while ($db_var = mysqli_fetch_assoc($proveedores_exp)) {
            $proveedor_id   = $db_var["proveedor_id"];
            $proveedor_name = proveedor_name_by_id($proveedor_id);
            ?>
 													<br>



                       	<a class="btn btn-dark btn-block btn-sm" href="expediente-dva.php?eid=<?php echo $exp_id; ?>&pid=<?php echo $proveedor_id; ?>">
													FORMULACION DVA - <?php echo $proveedor_name; ?>
                        </a>

	                        <br>
                            <?php

            $dva_for_supplier = get_dva_for_exp_and_proveedor($exp_id, $proveedor_id);
            while ($db_var = mysqli_fetch_assoc($dva_for_supplier)) {
                ?>
            			<form action="dva-form.php" method="post"target="_blank">
	                     	<input type="hidden" name="dua_numero" value="<?php echo $dua_number; ?>" >
	                     	<input type="hidden" name="proveedor_id" value="<?php echo $proveedor_id; ?>" >
							<button class="btn btn-icon btn-default btn-block btn-sm" type="submit">
								<i class="icon icon-md md-print mr-0"></i> PDF DVA - <?php echo $proveedor_name; ?>
                            </button>
                        </form>


<?php
} // end while dva proveedor
        } // end while proveedores
    } // end uses dva
    ?>

               	     <?php } // end if duca firmada

else {?>
               	     		<a class="btn btn-block btn-dark" href="expediente-3.php?id=<?php echo $exp_id ?>">VER DECLARACION CON FIRMA</a>
               	     	<?php } // end else declaracion con firma

?>



							<br><br>
              <h4 class="card-title mb-0"><i class="icon md-file"></i>  Documento a Transmitir</h4>
					  <br>
				      <form action="duca-just-create-xml.php" class="form-material" method="post" target="_blank">
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

						<?php
$duca_xml = "ducas-xml/" . $dua_number . ".xml";
if (file_exists($duca_xml)) {?>
              <a href="transmit-duca.php?dua=<?php echo $dua_number; ?>&exp=<?php echo $exp_id; ?>" class="btn btn-info btn-md btn-block">
	              <i class="icon icon-md md-arrow-right-top mr-0"></i> TRANSMITIR WS DUCA - SAT
	            </a>
	          <?php }?>
              <br>

                      <hr>

                      <br>

				  	<h4 class="m-0">Bitácora de Expediente</h4>
				  	<div class="comments">
		        <?php
$bitacora = get_exp_bitacora($id);
while ($db_var = mysqli_fetch_assoc($bitacora)) {

    $id_bitacora  = $db_var["id"];
    $creator_type = $db_var["creator_type"];
    $creator_id   = $db_var["creator_id"];
    $content      = $db_var["content"];
    $time_created = $db_var["time_created"];
    ?>

		                <div class="comment media">
		                  <div class="pr-15">
		                    <a href="#" class="avatar avatar-sm">

		                      <?php if ($creator_type == 0) {?>
							<img src="admin-pics/<?php $path = "admin-pics/" . $creator_id . ".jpeg";if (file_exists($path)) {echo $creator_id . ".jpeg";} else {echo "0.jpg";}?>" alt="...">
		                     <?php } else {?>
		                	<img src="user-pics/<?php $path = "user-pics/" . $creator_id . ".jpeg";if (file_exists($path)) {echo $creator_id . ".jpeg";} else {echo "0.jpg";}?>" alt="...">
		                     <?php }?>



							</a>
		                  </div>
		                  <div class="comment-body media-body">
		                    <div class="comment-title">
		                      <div class="comment-meta float-right">
		                        <span><?php echo $time_created ?></span>
		                      </div>
		                     <a href="javascript:void(0)" class="comment-author">
		                      <?php if ($creator_type == 0) {echo find_admin_name_by_id($creator_id);} else {echo $empresa;}?>
		                    </a>


		                    </div>
		                    <div class="comment-content">
		                      <p>
		                      <?php echo $content; ?>
		                      </p>
		                      <br>

		                      <form action="expediente.php?id=<?php echo $id; ?>" method="post">
								<input type="hidden" name="id_bitacora" value="<?php echo $id_bitacora; ?>">
		                      	<button type="submit" name="delete-log" class="btn btn-pure btn-default icon md-delete p-0 btn-trash"  <?php if ($creator_type == 1) {echo "disabled";}?>></button>
		                      </form>
		                    </div>
						  </div>
		                </div>


		                <?php }?>



		                  <div class="comments-add media mt-25">
		                  <div class="pr-20">
		                    <a class="avatar avatar-sm" href="javascript:void(0)">

								<img src="admin-pics/<?php $path = "admin-pics/" . $_SESSION["admin_id"] . ".jpeg";if (file_exists($path)) {echo $_SESSION["admin_id"] . ".jpeg";} else {echo "0.jpg";}?>" alt="...">
		                    </a>
		                  </div>

		                  <div class="media-body">
		                    <form action="expediente.php?id=<?php echo $id; ?>" method="post">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<input type="hidden" name="admin_id" value="<?php echo $_SESSION["admin_id"]; ?>">
								<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
		                    	<textarea style="width: 100%; height: 80px;" name="content"> </textarea>
							  	<button type="submit" name="update-log" value="Submit" class="btn  btn-primary btn-sm btn-block" >Actualizar Bitacora</button>
		                    </form>
		                  </div>
		                </div>
		              </div>

                    </div>
                  </div>
                </li>

              </ul>

				  </div>




			  </div>
            </div>

		  </div>
        </div>

        </div>




        <div class="col-xxl-3 col-xl-4 col-lg-12">
          <div class="card">
            <div class="card-block">
              <nav>
                <ul class="pagination">
                  <li class="page-item"><a class="btn btn-info" href="expediente-1.php?id=<?php echo $exp_id ?>">REQ</a></li>
                  <li class="page-item"><a class="btn btn-primary" href="expediente-2.php?id=<?php echo $exp_id ?>">FOR</a></li>
                  <li class="page-item"><a class="btn" href="expediente-3.php?id=<?php echo $exp_id ?>">TRA</a></li>
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
