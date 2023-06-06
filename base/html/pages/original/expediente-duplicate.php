<?php require_once "../../assets/session.php";?>
<?php require_once "../../assets/db_connection.php";?>
<?php require_once "../../assets/functions.php";?>
<?php require_once "../../assets/validation_functions.php";?>
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
  <title>Maqueta</title>
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
<body class="animsition page-profile-v2 site-menubar-fold site-menubar-keep">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


<?php

// SERVICIO COMPLETO
if (isset($_POST['exp-full-submit'])) {
    // get numero de orden
    $numero_orden = ($_POST["numero_orden"]);
    // Process the form
    $og_exp_id = ($_POST["exp_id"]);
    $user_id   = ($_POST["uid"]);
    $is_recti  = ($_POST["RECTIFICACION"]);

    $exp_data = get_exp_by_id($og_exp_id);
    while ($db_var = mysqli_fetch_assoc($exp_data)) {
        $exp_id = $db_var["id"];
        //    $user_id            = $db_var["user_id"];
        $agente             = $db_var["agente"];
        $empresa_facturar   = $db_var["empresa_facturar"];
        $consignatario      = $db_var["consignatario"];
        $factura            = $db_var["factura"];
        $factura_nit        = $db_var["factura_nit"];
        $sede               = $db_var["sede"];
        $aduana             = $db_var["aduana"];
        $aduana_destino     = $db_var["aduana_destino"];
        $puerto             = $db_var["puerto"];
        $puerto_desembarque = $db_var["puerto_desembarque"];
        $regimen            = $db_var["regimen"];
        $usuario_zf         = $db_var["usuario_zf"];
        $timestamp          = strtotime($created_on);
        $date               = date('d-m-Y', $timestamp);
        $date_counter       = date('Y-m-d G:i:s', $timestamp);
        $time               = date('G:i:s', $timestamp);
    }

    $id           = ($_POST["id"]);
    $admin_id     = ($_SESSION["admin_id"]); // admin_id
    $admin_rank   = ($_SESSION["admin_rank"]); // admin_rank
    $status       = 1;
    $estado       = 1;
    $step         = 1; // codigo step de flow de servicio
    $service_type = 1;
    $detalle      = "Recepción de Requerimientos";
    date_default_timezone_set("America/Guatemala");
    $time_created = date("Y-m-d H:i:s"); // tiempo de solicitud
    if ($is_recti) {
        // GET DUA NUMBER RECTI
        $rectificacion = get_dua_number_for_exp($og_exp_id);
        // INSERT PROJECT TO DB
        $query = "INSERT INTO usuarios_expedientes (";
        $query .= "  user_id, agente, empresa_facturar, consignatario, factura, factura_nit, sede, aduana, aduana_destino, puerto, puerto_desembarque, rectificacion, regimen, admin_id, step, type, created_on, status ";
        $query .= ") VALUES (";
        $query .= "  '{$user_id}', '{$agente}',  '{$empresa_facturar}', '{$consignatario}',  '{$factura}', '{$factura_nit}', '{$sede}',  '{$aduana}', '{$aduana_destino}',  '{$puerto}', '{$puerto_desembarque}',  '{$rectificacion}', '{$regimen}','{$admin_id}', '{$step}', '{$service_type}', '{$time_created}', '{$status}' ";
        $query .= ")";

    } else {
        // INSERT PROJECT TO DB
        $query = "INSERT INTO usuarios_expedientes (";
        $query .= "  user_id, agente, empresa_facturar, consignatario, factura, factura_nit, sede, aduana, aduana_destino, puerto, puerto_desembarque, regimen, admin_id, step, type, created_on, status ";
        $query .= ") VALUES (";
        $query .= "  '{$user_id}', '{$agente}',  '{$empresa_facturar}', '{$consignatario}',  '{$factura}', '{$factura_nit}', '{$sede}',  '{$aduana}', '{$aduana_destino}',  '{$puerto}', '{$puerto_desembarque}',  '{$regimen}','{$admin_id}', '{$step}', '{$service_type}', '{$time_created}', '{$status}' ";
        $query .= ")";
    }
    $result = mysqli_query($connection, $query);
    // GET PROJECT ID
    $exp_id = get_last_expediente(); // codigo expediente
    // INSERT PROJECT DATA TO DB
    $query = "INSERT INTO usuarios_expedientes_servicios (";
    $query .= " exp_id, service_id, service_type";
    $query .= ") VALUES (";
    $query .= "   '{$exp_id}', '{$id}', '{$service_type}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    // GET SERVICE DETAILS/COST BY ID
    $service_details = get_user_full_service($id);
    while ($order = mysqli_fetch_assoc($service_details)) {
        $costo            = $order["costo"];
        $detalle_servicio = $order["servicio"];
    }

    // INSERT EXP COST TO DB
    $query = "INSERT INTO usuarios_expedientes_gastos (";
    $query .= " exp_id, costo, detalle, status";
    $query .= ") VALUES (";
    $query .= "   '{$exp_id}', '{$costo}', '{$detalle_servicio}', '1' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    // GET FULL SERVICE DETAILS
    $service_full = get_user_full_service($id); // user full service by id
    while ($order = mysqli_fetch_assoc($service_full)) {
        $service_id = $order["full_service_id"]; // servicio completo id
        $servicio   = $order["servicio"];
        $costo      = $order["costo"];
    }

    // GET SERVICES FOR FULL SERVICE
    $service_list = services_for_full_service($service_id);
    while ($order2 = mysqli_fetch_assoc($service_list)) {
        $simple_id = $order2["id_servicio"]; // servicio simple id
        // GET SERVICE ACTIVITIES
        $service_activities = get_service_activities($simple_id);
        while ($db_var = mysqli_fetch_assoc($service_activities)) {
            $actividad_id = $db_var["actividad_id"];
            // INSERT ACTIVITIES FOR PROJECT TO DB
            $query = "INSERT INTO usuarios_expedientes_actividades (";
            $query .= " exp_id, service_id, actividad_id, status";
            $query .= ") VALUES (";
            $query .= " '{$exp_id}', '{$simple_id}', '{$actividad_id}', '0' ";
            $query .= ")";
            $result = mysqli_query($connection, $query);
        }
    } // end get services for full

    // GET OG_EXP DOCTOS FOR TRANSFER
    $exp_doctos = get_exp_doctos($og_exp_id);
    while ($db_var = mysqli_fetch_assoc($exp_doctos)) {
        $document_id = $db_var["id"];
        $docto_id    = $db_var["docto_id"];
        $item        = $db_var["item"];
        //  $timestamp   = $db_var["timestamp"];
        $referencia = $db_var["referencia"];
        $estado     = $db_var["estado"];
        $status     = $db_var["status"];

        // TRANSFER EXPEDIENTES DOCTOS
        $query = "INSERT INTO usuarios_expedientes_doctos (";
        $query .= " exp_id, docto_id, item, user_id, timestamp, referencia, estado, status ";
        $query .= ") VALUES (";
        $query .= "  '{$exp_id}', '{$docto_id}', '{$item}', '{$user_id}',  '{$timestamp}', '{$referencia}', '{$estado}', '{$status}' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        // GET EXP DOCTO ID
        $exp_docto_id = get_last_exp_docto();
        // GET DOCUMENTS FIELDS FOR PROJECT TO DB
        $datos = get_dato_docto_por_docto_y_exp($document_id, $og_exp_id);
        while ($db_var = mysqli_fetch_assoc($datos)) {
            $nombre             = $db_var["nombre"];
            $valor              = $db_var["valor"];
            $detalle            = $db_var["detalle"];
            $tipo_dato          = $db_var["tipo_dato"];
            $tipo               = $db_var["tipo"];
            $id_fuente          = $db_var["id_fuente"];
            $fuente_dato        = $db_var["fuente_dato"];
            $option_value       = $db_var["option_value"];
            $option_description = $db_var["option_description"];
            $placeholder        = $db_var["placeholder"];
            // INSERT DOCUMENTS FIELDS FOR PROJECT TO DB
            $query = "INSERT INTO usuarios_expedientes_doctos_datos (";
            $query .= " exp_id, docto_id, valor, nombre, detalle, tipo_dato, tipo, id_fuente, fuente_dato, option_value, option_description, placeholder, status";
            $query .= ") VALUES (";
            $query .= " '{$exp_id}', '{$exp_docto_id}', '{$valor}','{$nombre}', '{$detalle}', '{$tipo_dato}' , '{$tipo}', '{$id_fuente}', '{$fuente_dato}', '{$option_value}', '{$option_description}', '{$placeholder}',  '1' ";
            $query .= ")";
            $result = mysqli_query($connection, $query);
        } // end get_dato_docto

        // GET DOCUMENTS VALIDATE FOR PROJECT TO DB
        $validar = get_validar_docto_por_docto_y_exp($document_id, $og_exp_id);
        while ($db_var = mysqli_fetch_assoc($validar)) {
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

        // IF DOCTO_ID FACTURA - 380
        if ($docto_id == "380") {
            $items_data = get_items_for_factura($document_id);
            while ($order = mysqli_fetch_assoc($items_data)) {
                $item_id                = $order["id"];
                $product_catalog_id     = $order["product_catalog_id"];
                $item_clasificacion     = $order["CLASIFICACION_ARANCELARIA"]; //  $item_clasificacion     = str_replace(".", "", $item_clasificacion);
                $item_bulto             = $order["CANTIDAD_BULTOS"];
                $item_tipo_bulto        = $order["CLASE_BULTOS"];
                $item_bruto             = $order["PESO_BRUTO"];
                $item_neto              = $order["PESO_NETO"];
                $item_medida            = $order["TIPO_UNIDADES"];
                $item_unidades          = $order["CANTIDAD_UNIDADES"];
                $item_unitario          = $order["VALOR_UNITARIO"];
                $item_total             = $order["VALOR_ADUANA"];
                $item_transaccion       = $order["VALOR_TRANSACCION"];
                $item_fob               = $order["FOB_DOLARES"];
                $item_flete             = $order["FLETE_DOLARES"];
                $item_seguro            = $order["SEGURO_DOLARES"];
                $item_otros             = $order["OTROS_DOLARES"];
                $item_acuerdo           = $order["ACUERDO_PREFERENCIAL1"];
                $item_acuerdo2          = $order["ACUERDO_PREFERENCIAL2"];
                $item_codigo1           = $order["CODIGO_ADICIONAL1"];
                $item_codigo2           = $order["CODIGO_ADICIONAL2"];
                $item_cuota             = $order["NUMERO_CUOTA"];
                $item_descripcion       = $order["DESCRIPCION"];
                $item_factor            = $order["FACTOR"];
                $item_bulto             = $order["CANTIDAD_BULTOS"];
                $item_tipo_bulto        = $order["CLASE_BULTOS"];
                $item_bruto             = $order["PESO_BRUTO"];
                $item_neto              = $order["PESO_NETO"];
                $item_pais_origen       = $order["PAIS_ORIGEN"];
                $item_codigo_adicional  = $order["codigo_adicional"];
                $item_codigo_adicional2 = $order["codigo_adicional2"];
                $item_tlc               = $order["tlc"];
                $item_cuota             = $order["cuota_contingente"];
                $item_pna               = $order["pna"];
                $item_tlc               = $order["tlc"];
                $item_tlc_id            = $order["tlc_id"];
                $status                 = $order["status"];
                $item_cif               = $item_fob + $item_flete + $item_seguro + $item_otros;

                $query = "INSERT INTO usuarios_expedientes_items (";
                $query .= "  product_catalog_id, doc_id, exp_id, DESCRIPCION, FACTOR, CODIGO_ADICIONAL1, CODIGO_ADICIONAL2, NUMERO_CUOTA, CLASIFICACION_ARANCELARIA, CANTIDAD_BULTOS, CLASE_BULTOS, PESO_NETO, PESO_BRUTO, TIPO_UNIDADES, CANTIDAD_UNIDADES, VALOR_UNITARIO, ACUERDO_PREFERENCIAL1, ACUERDO_PREFERENCIAL2, VALOR_ADUANA, FOB_DOLARES, FLETE_DOLARES, SEGURO_DOLARES, OTROS_DOLARES, status";
                $query .= ") VALUES (";
                $query .= "  '{$product_catalog_id}', '{$exp_docto_id}', '{$exp_id}', '{$item_descripcion}', '{$item_factor}', '{$item_codigo1}', '{$item_codigo2}', '{$item_cuota}', '{$item_clasificacion}', '{$item_bulto}', '{$item_tipo_bulto}', '{$item_neto}', '{$item_bruto}', '{$item_medida}', '{$item_unidades}', '{$item_unitario}', '{$item_acuerdo}', '{$item_acuerdo2}', '{$item_total}', '{$item_fob}', '{$item_flete}', '{$item_seguro}', '{$item_otros}', '{$status}' ";
                $query .= ")";
                $result = mysqli_query($connection, $query);
            }
            // IF HAS CONTENEDORES
        } else if ($docto_id == "705" || $docto_id == "730" || $docto_id == "740") {
            $equipamientos_data = get_equipamientos_for_doc_and_exp($document_id, $og_exp_id);
            while ($order = mysqli_fetch_assoc($equipamientos_data)) {
                $total++;
                $equipamiento_id           = $order["id"];
                $numero_equipamiento       = $order["NUMERO_EQUIPAMIENTO"];
                $tipo_tamanno_equipamiento = $order["TIPO_TAMANNO_EQUIPAMIENTO"];
                $tipo_equipamiento         = $order["TIPO_EQUIPAMIENTO"];
                $tamanno_equipamiento      = $order["TAMANNO_EQUIPAMIENTO"];
                $tipo_carga_transporte     = $order["TIPO_CARGA_TRANSPORTE"];
                $entidad_marchamo          = $order["ENTIDAD_MARCHAMO"];
                $numero_marchamo           = $order["NUMERO_MARCHAMO"];
                $PLACA_TRANSPORTE          = $order["PLACA_TRANSPORTE"];
                $PAIS_TRANSPORTE           = $order["PAIS_TRANSPORTE"];
                $MARCA_TRANSPORTE          = $order["MARCA_TRANSPORTE"];
                $CHASIS_TRANSPORTE         = $order["CHASIS_TRANSPORTE"];
                $NUMERO_REMOLQUE           = $order["NUMERO_REMOLQUE"];
                $CANTIDAD_UNIDADES_CARGA   = $order["CANTIDAD_UNIDADES_CARGA"];

                $query = "INSERT INTO usuarios_expedientes_contenedores (";
                $query .= "  NUMERO_EQUIPAMIENTO, TIPO_TAMANNO_EQUIPAMIENTO, TIPO_EQUIPAMIENTO, TAMANNO_EQUIPAMIENTO, TIPO_CARGA_TRANSPORTE, ENTIDAD_MARCHAMO, NUMERO_MARCHAMO, PLACA_TRANSPORTE, PAIS_TRANSPORTE, MARCA_TRANSPORTE, CHASIS_TRANSPORTE, NUMERO_REMOLQUE, CANTIDAD_UNIDADES_CARGA, NUMERO_ORDEN, exp_id, docto_id, status";
                $query .= ") VALUES (";
                $query .= "  '{$numero_equipamiento}', '{$tipo_tamanno_equipamiento}', '{$tipo_equipamiento}', '{$tamanno_equipamiento}', '{$tipo_carga_transporte}', '{$entidad_marchamo}', '{$numero_marchamo}', '{$PLACA_TRANSPORTE}', '{$PAIS_TRANSPORTE}', '{$MARCA_TRANSPORTE}', '{$CHASIS_TRANSPORTE}', '{$NUMERO_REMOLQUE}', '{$CANTIDAD_UNIDADES_CARGA}', '{$numero_orden}', '{$exp_id}', '{$exp_docto_id}', '{$status}' ";
                $query .= ")";
                $result = mysqli_query($connection, $query);
            }
        }
    } // end doctos transfer

    // INSERT PROJECT STATUS TO DB
    $estado  = "Requerimientos";
    $detalle = "Recepción de Requerimientos";
    // INSERT EXPEDIENTE ESTADO
    $query = "INSERT INTO usuarios_expedientes_estados (";
    $query .= " exp_id, estado, detalle, admin_id, time";
    $query .= ") VALUES (";
    $query .= "   '{$exp_id}', '{$estado}', '{$detalle}', '{$admin_id}', '{$time_created}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    // INSERT ADMIN TO EXPEDIENTE
    $query = "INSERT INTO expedientes_admins (";
    $query .= "  exp_id, admin_id, rank, status";
    $query .= ") VALUES (";
    $query .= "  '{$exp_id}', '{$admin_id}', '{$admin_rank}', '1' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    redirect_to("expediente.php?id=" . $exp_id);
} // end: if (isset($_POST['exp-full-submit']))

// SERVICIO SIMPLE
if (isset($_POST['exp-submit'])) {
    // get numero de orden
    $numero_orden = ($_POST["numero_orden"]);
    // Process the form
    $og_exp_id = ($_POST["exp_id"]);
    $user_id   = ($_POST["uid"]);
    $is_recti  = ($_POST["RECTIFICACION"]);

    $exp_data = get_exp_by_id($og_exp_id);
    while ($db_var = mysqli_fetch_assoc($exp_data)) {
        $exp_id = $db_var["id"];
        //    $user_id            = $db_var["user_id"];
        $agente             = $db_var["agente"];
        $empresa_facturar   = $db_var["empresa_facturar"];
        $consignatario      = $db_var["consignatario"];
        $factura            = $db_var["factura"];
        $factura_nit        = $db_var["factura_nit"];
        $sede               = $db_var["sede"];
        $aduana             = $db_var["aduana"];
        $aduana_destino     = $db_var["aduana_destino"];
        $puerto             = $db_var["puerto"];
        $puerto_desembarque = $db_var["puerto_desembarque"];
        $regimen            = $db_var["regimen"];
        $usuario_zf         = $db_var["usuario_zf"];
        $timestamp          = strtotime($created_on);
        $date               = date('d-m-Y', $timestamp);
        $date_counter       = date('Y-m-d G:i:s', $timestamp);
        $time               = date('G:i:s', $timestamp);
    }

    $id           = ($_POST["id"]);
    $admin_id     = ($_SESSION["admin_id"]); // admin_id
    $admin_rank   = ($_SESSION["admin_rank"]); // admin_rank
    $status       = 1;
    $estado       = 1;
    $step         = 1; // codigo step de flow de servicio
    $service_type = 0;
    $detalle      = "Recepción de Requerimientos";
    date_default_timezone_set("America/Guatemala");
    $time_created = date("Y-m-d H:i:s"); // tiempo de solicitud

    if ($is_recti) {
        // GET DUA NUMBER RECTI
        $rectificacion = get_dua_number_for_exp($og_exp_id);
        // INSERT PROJECT TO DB
        $query = "INSERT INTO usuarios_expedientes (";
        $query .= "  user_id, agente, empresa_facturar, consignatario, factura, factura_nit, sede, aduana, aduana_destino, puerto, puerto_desembarque, rectificacion, regimen, admin_id, step, type, created_on, status ";
        $query .= ") VALUES (";
        $query .= "  '{$user_id}', '{$agente}',  '{$empresa_facturar}', '{$consignatario}',  '{$factura}', '{$factura_nit}', '{$sede}',  '{$aduana}', '{$aduana_destino}',  '{$puerto}', '{$puerto_desembarque}',  '{$rectificacion}', '{$regimen}','{$admin_id}', '{$step}', '{$service_type}', '{$time_created}', '{$status}' ";
        $query .= ")";

    } else {
        // INSERT PROJECT TO DB
        $query = "INSERT INTO usuarios_expedientes (";
        $query .= "  user_id, agente, empresa_facturar, consignatario, factura, factura_nit, sede, aduana, aduana_destino, puerto, puerto_desembarque, regimen, admin_id, step, type, created_on, status ";
        $query .= ") VALUES (";
        $query .= "  '{$user_id}', '{$agente}',  '{$empresa_facturar}', '{$consignatario}',  '{$factura}', '{$factura_nit}', '{$sede}',  '{$aduana}', '{$aduana_destino}',  '{$puerto}', '{$puerto_desembarque}',  '{$regimen}','{$admin_id}', '{$step}', '{$service_type}', '{$time_created}', '{$status}' ";
        $query .= ")";
    }
    $result = mysqli_query($connection, $query);

    // GET PROJECT ID
    $exp_id = get_last_expediente(); // codigo expediente

    // INSERT PROJECT DATA TO DB
    $query = "INSERT INTO usuarios_expedientes_servicios (";
    $query .= " exp_id, service_id, service_type";
    $query .= ") VALUES (";
    $query .= "   '{$exp_id}', '{$id}', '{$service_type}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    // GET SERVICE DETAILS
    $service_simple = get_user_service($id);
    while ($order = mysqli_fetch_assoc($service_simple)) {
        $simple_id = $order["service_id"];
        $servicio  = $order["servicio"];
        $costo     = $order["costo"];
    }

    // GET SERVICE ACTIVITIES
    $service_activities = get_service_activities($simple_id);
    while ($db_var = mysqli_fetch_assoc($service_activities)) {
        $actividad_id = $db_var["actividad_id"];
        // INSERT ACTIVITIES FOR PROJECT TO DB
        $query = "INSERT INTO usuarios_expedientes_actividades (";
        $query .= " exp_id, service_id, actividad_id, status";
        $query .= ") VALUES (";
        $query .= " '{$exp_id}', '{$simple_id}', '{$actividad_id}', '0' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);
    }

    // INSERT EXP COST TO DB
    $query = "INSERT INTO usuarios_expedientes_gastos (";
    $query .= " exp_id, costo, detalle, status";
    $query .= ") VALUES (";
    $query .= "   '{$exp_id}', '{$costo}', '{$servicio}', '1' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    // GET OG_EXP DOCTOS FOR TRANSFER
    $exp_doctos = get_exp_doctos($og_exp_id);
    while ($db_var = mysqli_fetch_assoc($exp_doctos)) {
        $document_id = $db_var["id"];
        $docto_id    = $db_var["docto_id"];
        $item        = $db_var["item"];
        //  $timestamp   = $db_var["timestamp"];
        $referencia = $db_var["referencia"];
        $estado     = $db_var["estado"];
        $status     = $db_var["status"];

        // TRANSFER EXPEDIENTES DOCTOS
        $query = "INSERT INTO usuarios_expedientes_doctos (";
        $query .= " exp_id, docto_id, item, user_id, timestamp, referencia, estado, status ";
        $query .= ") VALUES (";
        $query .= "  '{$exp_id}', '{$docto_id}', '{$item}', '{$user_id}',  '{$timestamp}', '{$referencia}', '{$estado}', '{$status}' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        // GET EXP DOCTO ID
        $exp_docto_id = get_last_exp_docto();
        // GET DOCUMENTS FIELDS FOR PROJECT TO DB
        $datos = get_dato_docto_por_docto_y_exp($document_id, $og_exp_id);
        while ($db_var = mysqli_fetch_assoc($datos)) {
            $nombre             = $db_var["nombre"];
            $valor              = $db_var["valor"];
            $detalle            = $db_var["detalle"];
            $tipo_dato          = $db_var["tipo_dato"];
            $tipo               = $db_var["tipo"];
            $id_fuente          = $db_var["id_fuente"];
            $fuente_dato        = $db_var["fuente_dato"];
            $option_value       = $db_var["option_value"];
            $option_description = $db_var["option_description"];
            $placeholder        = $db_var["placeholder"];
            // INSERT DOCUMENTS FIELDS FOR PROJECT TO DB
            $query = "INSERT INTO usuarios_expedientes_doctos_datos (";
            $query .= " exp_id, docto_id, valor, nombre, detalle, tipo_dato, tipo, id_fuente, fuente_dato, option_value, option_description, placeholder, status";
            $query .= ") VALUES (";
            $query .= " '{$exp_id}', '{$exp_docto_id}', '{$valor}','{$nombre}', '{$detalle}', '{$tipo_dato}' , '{$tipo}', '{$id_fuente}', '{$fuente_dato}', '{$option_value}', '{$option_description}', '{$placeholder}',  '1' ";
            $query .= ")";
            $result = mysqli_query($connection, $query);
        } // end get_dato_docto

        // GET DOCUMENTS VALIDATE FOR PROJECT TO DB
        $validar = get_validar_docto_por_docto_y_exp($document_id, $og_exp_id);
        while ($db_var = mysqli_fetch_assoc($validar)) {
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

        // IF DOCTO_ID FACTURA - 380
        if ($docto_id == "380") {
            $items_data = get_items_for_factura($document_id);
            while ($order = mysqli_fetch_assoc($items_data)) {
                $item_id                = $order["id"];
                $product_catalog_id     = $order["product_catalog_id"];
                $item_clasificacion     = $order["CLASIFICACION_ARANCELARIA"]; //  $item_clasificacion     = str_replace(".", "", $item_clasificacion);
                $item_bulto             = $order["CANTIDAD_BULTOS"];
                $item_tipo_bulto        = $order["CLASE_BULTOS"];
                $item_bruto             = $order["PESO_BRUTO"];
                $item_neto              = $order["PESO_NETO"];
                $item_medida            = $order["TIPO_UNIDADES"];
                $item_unidades          = $order["CANTIDAD_UNIDADES"];
                $item_unitario          = $order["VALOR_UNITARIO"];
                $item_total             = $order["VALOR_ADUANA"];
                $item_transaccion       = $order["VALOR_TRANSACCION"];
                $item_fob               = $order["FOB_DOLARES"];
                $item_flete             = $order["FLETE_DOLARES"];
                $item_seguro            = $order["SEGURO_DOLARES"];
                $item_otros             = $order["OTROS_DOLARES"];
                $item_acuerdo           = $order["ACUERDO_PREFERENCIAL1"];
                $item_acuerdo2          = $order["ACUERDO_PREFERENCIAL2"];
                $item_codigo1           = $order["CODIGO_ADICIONAL1"];
                $item_codigo2           = $order["CODIGO_ADICIONAL2"];
                $item_cuota             = $order["NUMERO_CUOTA"];
                $item_descripcion       = $order["DESCRIPCION"];
                $item_factor            = $order["FACTOR"];
                $item_bulto             = $order["CANTIDAD_BULTOS"];
                $item_tipo_bulto        = $order["CLASE_BULTOS"];
                $item_bruto             = $order["PESO_BRUTO"];
                $item_neto              = $order["PESO_NETO"];
                $item_pais_origen       = $order["PAIS_ORIGEN"];
                $item_codigo_adicional  = $order["codigo_adicional"];
                $item_codigo_adicional2 = $order["codigo_adicional2"];
                $item_tlc               = $order["tlc"];
                $item_cuota             = $order["cuota_contingente"];
                $item_pna               = $order["pna"];
                $item_tlc               = $order["tlc"];
                $item_tlc_id            = $order["tlc_id"];
                $status                 = $order["status"];
                $item_cif               = $item_fob + $item_flete + $item_seguro + $item_otros;

                $query = "INSERT INTO usuarios_expedientes_items (";
                $query .= "  product_catalog_id, doc_id, exp_id, DESCRIPCION, FACTOR, CODIGO_ADICIONAL1, CODIGO_ADICIONAL2, NUMERO_CUOTA, CLASIFICACION_ARANCELARIA, CANTIDAD_BULTOS, CLASE_BULTOS, PESO_NETO, PESO_BRUTO, TIPO_UNIDADES, CANTIDAD_UNIDADES, VALOR_UNITARIO, ACUERDO_PREFERENCIAL1, ACUERDO_PREFERENCIAL2, VALOR_ADUANA, FOB_DOLARES, FLETE_DOLARES, SEGURO_DOLARES, OTROS_DOLARES, status";
                $query .= ") VALUES (";
                $query .= "  '{$product_catalog_id}', '{$exp_docto_id}', '{$exp_id}', '{$item_descripcion}', '{$item_factor}', '{$item_codigo1}', '{$item_codigo2}', '{$item_cuota}', '{$item_clasificacion}', '{$item_bulto}', '{$item_tipo_bulto}', '{$item_neto}', '{$item_bruto}', '{$item_medida}', '{$item_unidades}', '{$item_unitario}', '{$item_acuerdo}', '{$item_acuerdo2}', '{$item_total}', '{$item_fob}', '{$item_flete}', '{$item_seguro}', '{$item_otros}', '{$status}' ";
                $query .= ")";
                $result = mysqli_query($connection, $query);
            }
            // IF HAS CONTENEDORES
        } else if ($docto_id == "705" || $docto_id == "730" || $docto_id == "740") {
            $equipamientos_data = get_equipamientos_for_doc_and_exp($document_id, $og_exp_id);
            while ($order = mysqli_fetch_assoc($equipamientos_data)) {
                $total++;
                $equipamiento_id           = $order["id"];
                $numero_equipamiento       = $order["NUMERO_EQUIPAMIENTO"];
                $tipo_tamanno_equipamiento = $order["TIPO_TAMANNO_EQUIPAMIENTO"];
                $tipo_equipamiento         = $order["TIPO_EQUIPAMIENTO"];
                $tamanno_equipamiento      = $order["TAMANNO_EQUIPAMIENTO"];
                $tipo_carga_transporte     = $order["TIPO_CARGA_TRANSPORTE"];
                $entidad_marchamo          = $order["ENTIDAD_MARCHAMO"];
                $numero_marchamo           = $order["NUMERO_MARCHAMO"];
                $PLACA_TRANSPORTE          = $order["PLACA_TRANSPORTE"];
                $PAIS_TRANSPORTE           = $order["PAIS_TRANSPORTE"];
                $MARCA_TRANSPORTE          = $order["MARCA_TRANSPORTE"];
                $CHASIS_TRANSPORTE         = $order["CHASIS_TRANSPORTE"];
                $NUMERO_REMOLQUE           = $order["NUMERO_REMOLQUE"];
                $CANTIDAD_UNIDADES_CARGA   = $order["CANTIDAD_UNIDADES_CARGA"];

                $query = "INSERT INTO usuarios_expedientes_contenedores (";
                $query .= "  NUMERO_EQUIPAMIENTO, TIPO_TAMANNO_EQUIPAMIENTO, TIPO_EQUIPAMIENTO, TAMANNO_EQUIPAMIENTO, TIPO_CARGA_TRANSPORTE, ENTIDAD_MARCHAMO, NUMERO_MARCHAMO, PLACA_TRANSPORTE, PAIS_TRANSPORTE, MARCA_TRANSPORTE, CHASIS_TRANSPORTE, NUMERO_REMOLQUE, CANTIDAD_UNIDADES_CARGA, NUMERO_ORDEN, exp_id, docto_id, status";
                $query .= ") VALUES (";
                $query .= "  '{$numero_equipamiento}', '{$tipo_tamanno_equipamiento}', '{$tipo_equipamiento}', '{$tamanno_equipamiento}', '{$tipo_carga_transporte}', '{$entidad_marchamo}', '{$numero_marchamo}', '{$PLACA_TRANSPORTE}', '{$PAIS_TRANSPORTE}', '{$MARCA_TRANSPORTE}', '{$CHASIS_TRANSPORTE}', '{$NUMERO_REMOLQUE}', '{$CANTIDAD_UNIDADES_CARGA}', '{$numero_orden}', '{$exp_id}', '{$exp_docto_id}', '{$status}' ";
                $query .= ")";
                $result = mysqli_query($connection, $query);
            }
        }

    } // end doctos transfer

    // INSERT PROJECT STATUS TO DB
    $estado  = "Requerimientos";
    $detalle = "Recepción de Requerimientos";
    // INSERT EXPEDIENTE ESTADO
    $query = "INSERT INTO usuarios_expedientes_estados (";
    $query .= " exp_id, estado, detalle, admin_id, time";
    $query .= ") VALUES (";
    $query .= "   '{$exp_id}', '{$estado}', '{$detalle}', '{$admin_id}', '{$time_created}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    // INSERT ADMIN TO EXPEDIENTE
    $query = "INSERT INTO expedientes_admins (";
    $query .= "  exp_id, admin_id, rank, status";
    $query .= ") VALUES (";
    $query .= "  '{$exp_id}', '{$admin_id}', '{$admin_rank}', '1' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    redirect_to("expediente.php?id=" . $exp_id);
} // end: if (isset($_POST['submit'])) - SIMPLE

// GET EXP DATA
if (isset($_POST["duplicate-exp"])) {
    $exp_id   = $_POST["exp_id"];
    $new_user = $_POST["usuario"];
//    $duplicar_docs             = $_POST["DUPLICAR_DOCTOS"];
    $duplicar_details = $_POST["DUPLICAR_DUCA"];
    $duplicar_usuario = $_POST["DUPLICAR_USUARIO"];
    $numero_orden     = $_POST["numero_orden"];
    $servicio_name    = $_POST["servicio"];
    $exp_data         = get_exp_by_id($exp_id);
    while ($db_var = mysqli_fetch_assoc($exp_data)) {
        $exp_id        = $db_var["id"];
        $user_id       = $db_var["user_id"];
        $consignatario = $db_var["consignatario"];
        $exp_step      = $db_var["step"];
        $created_on    = $db_var["created_on"];
        $admin_id      = $db_var["admin_id"];
        $exp_status    = $db_var["status"];
        $importador    = get_user_name_for_dua($consignatario);
        //    $dua_number = get_dua_number_for_exp($exp_id);
    }

}

// GET USER DATA
// $user_data = get_user($user_id);
$user_data = get_user($new_user);
while ($db_var = mysqli_fetch_assoc($user_data)) {
    $nit         = $db_var["nit"];
    $empresa     = $db_var["empresa"];
    $user_status = $db_var["status"];
    $razon       = $db_var["razon"];
    $agente      = $db_var["agente"];
}

?>



<?php include "../layouts/pages-navbar.php";?>

  <!-- Page -->
  <div class="page">
    <div class="page-content container-fluid">
      <div class="row">


        <!-- Middle Column -->

	  <div class="col-lg-12">
      <div class="panel">
        <div class="panel-body container-fluid">
              <!-- Example Basic Form -->
              <div class="example-wrap">
              <h4 class="card-title mb-0"><i class="icon md-account"></i>  SELECCION DE SERVICIO A DUPLICAR - EXPEDIENTE <?php echo $servicio_name; ?> </h4>
                <div class="example">


	                	<?php echo message(); ?>
	                	<!--
                  <form autocomplete="off" action="expediente-duplicate.php" method="post">

                    <div class="row">
                    	<?php
if ($duplicar_usuario) {
    ?>
                      <div class="form-group form-material col-md-7">
                        <label class="form-control-label" for="usuario">Cliente de expediente: </label>
                    		<input class="form-control"  type="hidden" name="usuario" value="<?php echo $user_id; ?>">
                    		<input class="form-control"  type="text" name="detalle_usuario" value="<?php echo $razon . " - " . $nit; ?>" readonly>
		                  </div>
											<?php
} else {
    ?>

                      <div class="form-group form-material col-md-7">
                        <label class="form-control-label" for="usuario">Seleccionar cliente para expediente: </label>
	                      <select class="form-control" id="usuario" name="usuario">
	                      	<?php
$allnames = name_all_users();
    $names    = [];
    while ($order = mysqli_fetch_assoc($allnames)) {
        echo "<option value=\"" . $order["id"] . "\">" . $order["razon"] . " - " . $order["nit"] . "</option>";
    }
    ?>
			                  </select>
		                  </div>
											<?php }?>

	                   	<div class="form-group form-material col-md-5">
		                    <label class="form-control-label" for="moneda" >Tipo de Formulación</label>
		                      <select class="form-control" id="tipo" name="tipo">
			                    <option value="reformulation">Duplicar documentos para reformulación</option>
			                    <option value="declaration">Adjuntar unicamente declaración</option>
			                    <option value="abortation">No duplicar documentos</option>
			                  </select>
		                  </div>
                    </div>

                    <div class="form-group form-material">
                      <button type="button" class="btn btn-primary btn-block" name="duplicate-submit">Confirmar Duplicado de Expediente</button>
                    </div>
                  </form> -->

		 							<table class="table table-hover table-responsive" data-plugin="floatThead">
                    <thead>
                      <tr>
                        <th class="w-50">
	                      </th>
                        <th class="w-50">
                          ID
                        </th>
                        <th class="w-200">
                          Servicio
                        </th>
                        <th class="w-50">
                          Aduana
                        </th>
                        <th class="w-200">
                          Sede
                        </th>
                        <th class="w-50">
                          Categoria
                        </th>
                        <th class="w-50">
                          Costo
                        </th>
                        <th class="w-50">
                          Seleccionar
                        </th>
                      </tr>
                    </thead>


<?php
$services_detail = full_services_for_user_search($search, $new_user);
while ($order = mysqli_fetch_assoc($services_detail)) {

    $id         = $order["id"];
    $service_id = $order["full_service_id"];
    $costo      = $order["costo"];
    $servicio   = $order["servicio"];

    $service_full = get_full_service($service_id);

    while ($order = mysqli_fetch_assoc($service_full)) {

        $aduana    = $order["aduana"];
        $sede      = $order["sede"];
        $categoria = $order["categoria"];
        $estado    = $order["estado"];
    }

    ?>




                    <tbody class="table-section " data-plugin="tableSection">
                      <tr>
                        <td class="text-center"><i class="table-section-arrow"></i></td>
                        <td class="font-weight-medium">
                          <?php echo $id; ?>
                        </td>
                        <td>
                         <?php echo $servicio; ?>
                        </td>
                        <td>
                         <?php echo $aduana; ?>
                        </td>
                        <td>
                         <?php echo $sede; ?>
                        </td>
                        <td>
                         <?php echo $categoria; ?>
                        </td>
                        <td>
                         <?php echo $costo; ?>
                        </td>

                        <td>
                              <form action="expediente-duplicate.php" method="post">
		                         <input type="hidden" name="numero_orden" value="<?php echo $numero_orden; ?>"/>
		                         <input type="hidden" name="id" value="<?php echo $id ?>"/>
		                         <input type="hidden" name="exp_id" value="<?php echo $exp_id ?>"/>
		                         <input type="hidden" name="aduana" value="<?php echo $aduana; ?>"/>
		                         <input type="hidden" name="sede" value="<?php echo $sede; ?>"/>
                                 <input type="hidden" name="RECTIFICACION" value="<?php echo $_POST['RECTIFICACION']; ?>"/>
		                         <input type="hidden" name="uid" value="<?php echo $new_user ?>"/>
                             <button type="submit" class="btn btn-icon btn-success btn-outline btn-round btn-xs" name="exp-full-submit"  <?php if ($categoria_servicio != $_SESSION["admin_depto"]) {echo "";}?>><i class="icon icon-xs md-plus mr-0"></i> </button>

	                            </form>

                        </td>


                      </tr>
                    </tbody>

                    <tbody>
                    <?php
$service_list = services_for_full_service($service_id);
    while ($order2 = mysqli_fetch_assoc($service_list)) {
        $servicio_id = $order2["id_servicio"];
        $service     = get_service($servicio_id);
        while ($order3 = mysqli_fetch_assoc($service)) {
            $id_servicio        = $order3["id"];
            $servicio_simple    = $order3["servicio"];
            $aduana_servicio    = $order3["aduana"];
            $sede_servicio      = $order3["sede"];
            $categoria_servicio = $order3["categoria"];
            $estado_servicio    = $order3["estado"];
        }

        ?>


                      <tr>
                        <td></td>
                       <td class="font-weight-medium">
                           <?php echo $id_servicio; ?>
                        </td>
                        <td  data-content="Pequeña descripción del servicio" data-trigger="hover" data-toggle="popover" data-original-title="Descripción" tabindex="0">
	                        <?php echo $servicio_simple; ?>
                        </td>
                        <td>
	                        <?php echo $aduana_servicio; ?>
                        </td>
                        <td>
	                        <?php echo $sede_servicio; ?>
                        </td>
                        <td>
	                        <?php echo $categoria_servicio; ?>
                        </td>
                      </tr>


					  <?php }?>

                    </tbody>

                    <?php }?>



						 <?php
$services_detail = services_for_user_search($search, $user_id);
?>

                        <?php while ($order = mysqli_fetch_assoc($services_detail)) {

    $id              = $order["id"];
    $service_id      = $order["service_id"];
    $servicio_simple = $order["servicio"];
    $costo_servicio  = $order["costo"];

    $service = get_service($service_id);
    while ($order3 = mysqli_fetch_assoc($service)) {
        $id_servicio        = $order3["id"];
        $aduana_servicio    = $order3["aduana"];
        $sede_servicio      = $order3["sede"];
        $categoria_servicio = $order3["categoria"];
        $estado_servicio    = $order3["estado"];
    }

    ?>


                    <tbody>
                      <tr>
	                    <td></td>
                        <td class="font-weight-medium">
                          <?php echo $id; ?>
                        </td>
                        <td>
                         <?php echo $servicio_simple; ?>
                        </td>
                        <td>
                         <?php echo $aduana_servicio; ?>
                        </td>
                        <td>
                         <?php echo $sede_servicio; ?>
                        </td>
                        <td>
                         <?php echo $categoria_servicio; ?>
                        </td>

                        <td>
                         <?php echo $costo_servicio; ?>
                        </td>


                         <td>

	                           <form action="expediente-duplicate.php" method="post">
		                         <input type="hidden" name="numero_orden" value="<?php echo $numero_orden; ?>"/>
		                         <input type="hidden" name="id" value="<?php echo $id ?>"/>
		                         <input type="hidden" name="exp_id" value="<?php echo $exp_id ?>"/>
		                         <input type="hidden" name="sede" value="<?php echo $sede_servicio; ?>"/>
		                         <input type="hidden" name="aduana" value="<?php echo $aduana_servicio; ?>"/>
                                 <input type="hidden" name="uid" value="<?php echo $new_user ?>"/>
                                 <input type="hidden" name="RECTIFICACION" value="<?php echo $_POST['RECTIFICACION']; ?>"/>
	                           <button type="submit" class="btn btn-icon btn-success btn-outline btn-round btn-xs" name="exp-submit" <?php if ($categoria_servicio != $_SESSION["admin_depto"]) {echo " ";}?>><i class="icon icon-xs md-plus mr-0"></i> </button>

	                            </form>
	                            <?php echo $_SESSION["admin-depto"] ?>

                        </td>


                      </tr>
                    </tbody>

                    <?php }?>



                  </table>

                </div>
              </div>
              <!-- End Example Basic Form -->
          </div>
        </div>

        </div>
        <!-- End Middle Column -->


      </div>
    </div>
  </div>
  </div>
  <!-- Footer -->

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
  <script src="../../../global/vendor/cropper/cropper.min.js"></script>
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
  <script> Config.set('assets', '../../assets');</script>
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
