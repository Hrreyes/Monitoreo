<?php require_once "../../assets/session.php";?>
<?php require_once "../../assets/db_connection.php";?>
<?php require_once "../../assets/functions.php";?>

<?php

function dd($valor)
{
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    die('menene');
}

include_once 'duca.php';

if (isset($_POST['duca_numero'])) {
    $dua_numero = $_POST['duca_numero'];
} else {
    // $dua_numero = "2039500770";
    redirect_to('search-expedientes.php');
}

// $dua_numero = "2039500770";

$duca           = new Duca();
$duca_name      = $dua_numero . ".pdf";
$duca_name_path = "ducas/" . $dua_name;

if (file_exists($duca_name_path)) {
    chmod($duca_name_path, 0777);
    unlink($duca_name_path);
}

$dua_poliza = get_poliza_for_numero_orden($dua_numero);

// DUA POLIZA
while ($dua_var = mysqli_fetch_assoc($dua_poliza)) {
    $exp_id                  = ($dua_var["exp_id"]);
    $NUMERO_ORDEN            = ($dua_var["NUMERO_ORDEN"]);
    $CODIGO_DECLARANTE       = ($dua_var["AGENTE_ORDEN"]);
    $ADUANA_ENTRADA_SALIDA   = ($dua_var["ADUANA_ENTRADA_SALIDA"]);
    $ADUANA_DESPACHO_DESTINO = ($dua_var["ADUANA_DESPACHO_DESTINO"]);
    $CODIGO_REGIMEN          = ($dua_var["CODIGO_REGIMEN"]);
    $CLASE_DECLARACION       = ($dua_var["CLASE_DECLARACION"]);
    $TIPO_DOCU_IMPOEXPO      = ($dua_var["TIPO_DOCU_IMPOEXPO"]);
    $DOCUMENTO_IMPOEXPO      = ($dua_var["DOCUMENTO_IMPOEXPO"]);
    $RAZON_SOCIAL_IMPOEXPO   = (strtoupper($dua_var["RAZON_SOCIAL_IMPOEXPO"]));
    $DOMICILIO_IMPOEXPO      = ($dua_var["DOMICILIO_IMPOEXPO"]);
    $PAIS_DOCU_IMPOEXPO      = ($dua_var["PAIS_DOCU_IMPOEXPO"]);
    $CIUDAD_IMPOEXPO         = ($dua_var["CIUDAD_IMPOEXPO"]);
    $TIPO_DOCU_DECLARANTE    = ($dua_var["TIPO_DOCU_DECLARANTE"]);
    $DOCUMENTO_DECLARANTE    = ($dua_var["DOCUMENTO_DECLARANTE"]);
    $PAIS_DOCU_DECLARANTE    = ($dua_var["PAIS_DOCU_DECLARANTE"]);
    $TIPO_DECLARANTE         = ($dua_var["TIPO_DECLARANTE"]);
    $LUGAR_EMBARQUE          = ($dua_var["LUGAR_EMBARQUE"]);
    $LUGAR_DESEMBARQUE       = ($dua_var["LUGAR_DESEMBARQUE"]);
    $RAZON_SOCIAL_DECLARANTE = ($dua_var["RAZON_SOCIAL_DECLARANTE"]);
    $DOMICILIO_DECLARANTE    = ($dua_var["DOMICILIO_DECLARANTE"]);
    $CIUDAD_DECLARANTE       = ($dua_var["CIUDAD_DECLARANTE"]);
    $PAIS_PROCE_DESTINO      = ($dua_var["PAIS_PROCE_DESTINO"]);
    $PAIS_EXPORTACION        = ($dua_var["PAIS_EXPORTACION"]);
    $CODIGO_ALMACEN          = ($dua_var["CODIGO_ALMACEN"]);
    $CODIGO_DEPOSITO         = ($dua_var["CODIGO_DEPOSITO"]);
    $MODO_TRANSPORTE         = ($dua_var["MODO_TRANSPORTE"]);
    $FECHA_LLEGADA_SALIDA    = ($dua_var["FECHA_LLEGADA_SALIDA"]);
    $NATURALEZA_TRANSACCION  = ($dua_var["NATURALEZA_TRANSACCION"]);
    $TIPO_CAMBIO_TRANSACCION = ($dua_var["TIPO_CAMBIO"]);
    $VALOR_FACTURA           = ($dua_var["VALOR_FACTURA"]);
    $MONEDA_TRANSACCION      = ($dua_var["MONEDA_TRANSACCION"]);
    $VALOR_ADUANA            = ($dua_var["VALOR_ADUANA"]);
    $VALOR_ADUANA_TOTAL      = ($dua_var["VALOR_ADUANA_TOTAL"]);
    $NUMERO_PAGINAS          = ($dua_var["NUMERO_PAGINAS"]);
    $TIPO_MENSAJE            = ($dua_var["TIPO_MENSAJE"]);
    $TOTAL_FRACCIONES        = ($dua_var["TOTAL_FRACCIONES"]);
    $FUNCION_MENSAJE         = ($dua_var["FUNCION_MENSAJE"]);
    $TOTAL_BULTOS            = ($dua_var["TOTAL_BULTOS"]);
    $TOTAL_PESO_BRUTO        = ($dua_var["TOTAL_PESO_BRUTO"]);
    $TOTAL_PESO_NETO         = get_total_peso_neto($exp_id); //($dua_var["TOTAL_PESO_NETO"]);
    $TOTAL_UNIDADES          = ($dua_var["TOTAL_UNIDADES"]);
    $TOTAL_FOB_DOLARES       = ($dua_var["TOTAL_FOB_DOLARES"]);
    $TOTAL_FLETE_DOLARES     = ($dua_var["TOTAL_FLETE_DOLARES"]);
    $TOTAL_SEGURO_DOLARES    = ($dua_var["TOTAL_SEGURO_DOLARES"]);
    $TOTAL_OTROS_DOLARES     = ($dua_var["TOTAL_OTROS_DOLARES"]);
    $TOTAL_AUTOLIQUIDADO     = ($dua_var["TOTAL_AUTOLIQUIDADO"]);
    $TOTAL_OTROS_PAGOS       = ($dua_var["TOTAL_OTROS_PAGOS"]);
    $TOTAL_GENERAL           = ($dua_var["TOTAL_GENERAL"]);
}

// GET EXP DATA
$exp_data = get_exp_by_id($exp_id);
while ($db_var = mysqli_fetch_assoc($exp_data)) {
    $exp_id         = $db_var["id"];
    $user_id        = $db_var["user_id"];
    $exp_step       = $db_var["step"];
    $aduana_destino = $db_var["aduana_destino"];
    $created_on     = $db_var["created_on"];
    $admin_id       = $db_var["admin_id"];
    $timestamp      = strtotime($created_on);
    $date           = date('d-m-Y', $timestamp);
    $date_counter   = date('Y-m-d G:i:s', $timestamp);
    $time           = date('G:i:s', $timestamp);
}

// PUERTO DE EMBARQUE
$PUERTO_EXPEDIENTE = get_puerto_for_exp($exp_id);

// GET PROVEEDOR DATA
$proveedor_id   = get_proveedor_de_factura($exp_id);
$proveedor_data = proveedor_by_id($proveedor_id);
while ($db_var = mysqli_fetch_assoc($proveedor_data)) {
    $id                  = $db_var["id"];
    $codigo_interno      = $db_var["codigo_interno"];
    $NOMBRE_PROVEEDOR    = $db_var["proveedor"];
    $NIT_PROVEEDOR       = $db_var["nit"];
    $DIRECCION_PROVEEDOR = $db_var["direccion"];
    $CIUDAD_PROVEEDOR    = $db_var["ciudad"];
    $PAIS_PROVEEDOR      = $db_var["pais"];
    $detalle             = $db_var["detalle"];
    $TELEFONO_PROVEEDOR  = $db_var["telefono"];
    $fax                 = $db_var["fax"];
    $moneda              = $db_var["moneda"];
    $CORREO_PROVEEDOR    = $db_var["email"];
    $web                 = $db_var["web"];
    $CONDICION_PROVEEDOR = $db_var["condicion_comercial"];
    $NO_ID_PROVEEDOR     = $db_var["codigo_sat"];
    $registro_fiscal     = $db_var["registro_fiscal"];
    $intcoterm           = $db_var["intcoterm"];
}

// FACTURAS
$facturas       = get_exp_facturas($exp_id);
$total_facturas = 0;
$FACTURAS       = " ";
while ($data_var = mysqli_fetch_assoc($facturas)) {
    //   $NUMERO_ORDEN         = ($data_var["NUMERO_ORDEN"]);
    $doc_id               = $data_var["id"];
    $numero_documento     = get_docto_numero_for_doc_and_exp($doc_id, $exp_id);
    $FACTURA_FECHA        = get_docto_fecha_emision_for_doc_and_exp($doc_id, $exp_id) . " ";
    $FACTURAS             = $numero_documento . " ";
    $CONDICIONES_INCOTERM = get_intcoterm_dva_factura($exp_id);
    $codigo_moneda        = get_docto_moneda_for_doc_and_exp($doc_id, $exp_id);
    $monto_documento      = get_docto_monto_for_doc_and_exp($doc_id, $exp_id);
    $total_facturas++;
}

// GET TRANSPORTISTAS DATA
$transportistas_data = get_dua_transportistas_for_exp($exp_id);
while ($db_var = mysqli_fetch_assoc($transportistas_data)) {
    $CODIGO_TRANSPORTISTA = $db_var["CODIGO_TRANSPORTISTA"];
    $NOMBRE_TRANSPORTISTA = $db_var["NOMBRE_TRANSPORTISTA"];
}
// GET CONDUCTORES DATA
$conductores_data = get_dua_conductores_for_exp($exp_id);
while ($db_var = mysqli_fetch_assoc($conductores_data)) {
    $ID_CONDUCTOR       = $db_var["ID_CONDUCTOR"];
    $LICENCIA_CONDUCTOR = $db_var["LICENCIA_CONDUCTOR"];
    $PAIS_ID_CONDUCTOR  = $db_var["PAIS_ID_CONDUCTOR"];
    $NOMBRE_CONDUCTOR   = $db_var["NOMBRE_CONDUCTOR"];
}

// DECLARACION MERCANCIAS
$NOA        = str_split($dua_numero);
$NUMERO     = $NOA[0] . $NOA[1] . $NOA[2] . "-" . $NOA[3] . $NOA[4] . $NOA[5] . $NOA[6] . $NOA[7] . $NOA[8] . $NOA[9];
$ACEPTACION = "";

// DECLARANTE
$CODIGO_DECLARANTE    = $CODIGO_DECLARANTE;
$NO_ID_DECLARANTE     = $DOCUMENTO_IMPOEXPO;
$NOMBRE_DECLARANTE    = $DOMICILIO_IMPOEXPO . ", " . $PAIS_DOCU_DECLARANTE;
$DIRECCION_DECLARANTE = $CIUDAD_IMPOEXPO;

// MODO TRANSPORTE
$MODO_TRANSPORTE = "(" . $MODO_TRANSPORTE . ")" . (strtoupper(get_modo_transporte_for_codigo($MODO_TRANSPORTE)));

// REGIMEN ADUANERO
$E_COD            = explode("-", $CODIGO_REGIMEN);
$REGIMEN_ADUANERO = $E_COD[0];
$MODALIDAD        = $E_COD[1];
$CLASE            = $CLASE_DECLARACION;

// GET TIPO DECLARACION
$TIPO_DECLARACION = tipo_declaracion_by_regimen_grupo($REGIMEN_ADUANERO, $MODALIDAD);

// PROVEEDOR
$NOMBRE_PROVEEDOR_SPLIT = str_split($NOMBRE_PROVEEDOR, 55);
$NOMBRE_PROVEEDOR       = $NOMBRE_PROVEEDOR_SPLIT[0];
$NOMBRE_PROVEEDOR2      = $NOMBRE_PROVEEDOR_SPLIT[1];
$DIRECCION_PROVEEDOR    = $DIRECCION_PROVEEDOR;
$CIUDAD_PROVEEDOR       = $CIUDAD_PROVEEDOR;
$PAIS_PROVEEDOR         = $PAIS_PROVEEDOR;
$CONDICION_PROVEEDOR    = get_condicion_comercial_proveedor($CONDICION_PROVEEDOR);
$TIPO_ID_PROVEEDOR      = "ARE";

// IMPORTADOR
$NOMBRE_IMPORTADOR       = $RAZON_SOCIAL_IMPOEXPO;
$NOMBRE_IMPORTADOR_SPLIT = str_split($NOMBRE_IMPORTADOR, 55);
$NOMBRE_IMPORTADOR2      = $NOMBRE_IMPORTADOR_SPLIT[1];
if (strlen($NOMBRE_IMPORTADOR2) > 1) {
    $NOMBRE_IMPORTADOR = $NOMBRE_IMPORTADOR_SPLIT[0] . "-";
} else {
    $NOMBRE_IMPORTADOR = $NOMBRE_IMPORTADOR_SPLIT[0];
}
$NO_ID_IMPORTADOR     = $DOCUMENTO_IMPOEXPO;
$CIUDAD_IMPORTADOR    = $CIUDAD_IMPOEXPO;
$DIRECCION_IMPORTADOR = $DOMICILIO_IMPOEXPO . ", " . $CIUDAD_IMPORTADOR;
$PAIS_IMPORTADOR      = $PAIS_DOCU_IMPOEXPO;
$CONDICION_IMPORTADOR = get_condicion_comercial_importador(get_user_condicion_by_id($user_id));
$TIPO_ID_IMPORTADOR   = "ARE";

// VALIDACION TIPO DOCTO

if ($TIPO_ID_IMPORTADOR == "ARE" && $PAIS_IMPORTADOR == "GT") {
    $TIPO_ID_IMPORTADOR = "NIT";
}

if ($TIPO_ID_PROVEEDOR == "ARE" && $PAIS_PROVEEDOR == "GT") {
    $TIPO_ID_PROVEEDOR = "NIT";
}

// PAIS PROCEDENCIA
$PAIS_PROCEDENCIA = $PAIS_PROCE_DESTINO;
$PAIS_EXPORTACION = $PAIS_EXPORTACION; //get_pais_exportacion($exp_id);

// PAIS DESTINO
$PAIS_DESTINO      = get_pais_destino($exp_id);
$DEPOSITO_ADUANERO = $CODIGO_DEPOSITO;

// EMBARQUE
$LUGAR_EMBARQUE    = get_puerto_for_exp($exp_id); //$PAIS_PROCE_DESTINO; // CONCAT PUERTO EMBARQUE
$LUGAR_DESEMBARQUE = get_puerto_desembarque_for_exp($exp_id); //$PAIS_DESTINO; // CONCAT ADUANA RX

// VALOR ADUANA TOTAL
//$VALOR_ADUANA_TOTAL = (float) $TOTAL_FOB_DOLARES + (float) $TOTAL_FLETE_DOLARES + (float) $TOTAL_SEGURO_DOLARES + (float) $TOTAL_OTROS_DOLARES;

// CARACTERISTICAS
$LUGAR_ENTREGA                = $LUGAR_ENTREGA;
$PAIS_TRANSACCION             = $PAIS_DOCU_IMPOEXPO;
$INCOTERMS                    = $CONDICIONES_INCOTERM;
$INCOTERM                     = $CONDICIONES_INCOTERM;
$FACTURAS_TRANSACCION         = $FACTURAS;
$FECHAS_FACTURAS_TRANSACCION  = $FACTURA_FECHA;
$CONTRATO_TRANSACCION         = $CONTRATO;
$FECHA_CONTRATO_TRANSACCION   = $CONTRATO_FECHA;
$OTROS_TRANSACCION            = $FORMA_PAGO_OTRO;
$FORMA_PAGO_TRANSACCION       = $FORMA_PAGO_TRANSACCION;
$OTROS_PAGO_TRANSACCION       = $OTROS_PAGO_TRANSACCION;
$LUGAR_EMBARQUE_TRANSACCION   = $PUERTO_EXPEDIENTE;
$PAIS_EMBARQUE_TRANSACCION    = $PAIS_PROCE_DESTINO;
$PAIS_EXPORTACION_TRANSACCION = $PAIS_PROCE_DESTINO;
$FECHA_EXPORTACION            = $FECHA_LLEGADA_SALIDA;
$INCOTERM                     = get_incoterm_factura($exp_id);
//$TIPO_CAMBIO_TRANSACCION      = "1.0000";

// VALIDACION POR MODALIDAD
if ($MODALIDAD == "MI") {
    $ADUANA_REGISTRO_PDF = "";
    $ADUANA_SALIDA_PDF   = "";
    $ADUANA_INGRESO_PDF  = $ADUANA_ENTRADA_SALIDA;
    $ADUANA_DESPACHO_PDF = $ADUANA_DESPACHO_DESTINO;
} else if ($MODALIDAD == "ED" || $MODALIDAD == "MR") {
    $ADUANA_REGISTRO_PDF = "";
    $ADUANA_SALIDA_PDF   = $ADUANA_ENTRADA_SALIDA;
    $ADUANA_INGRESO_PDF  = $ADUANA_DESPACHO_DESTINO;
    $ADUANA_DESPACHO_PDF = $ADUANA_DESPACHO_DESTINO;
} else if ($MODALIDAD == "ZR") {
    $ADUANA_REGISTRO_PDF = $ADUANA_DESPACHO_DESTINO;
    $ADUANA_SALIDA_PDF   = $ADUANA_DESPACHO_DESTINO;
    $ADUANA_INGRESO_PDF  = $ADUANA_DESPACHO_DESTINO;
    $ADUANA_DESPACHO_PDF = $aduana_destino;
} else if ($MODALIDAD == "ZI") {
    $ADUANA_REGISTRO_PDF = $ADUANA_DESPACHO_DESTINO;
    $ADUANA_SALIDA_PDF   = "";
    $ADUANA_INGRESO_PDF  = $ADUANA_DESPACHO_DESTINO;
    $ADUANA_DESPACHO_PDF = $aduana_destino;
} else {
    $ADUANA_REGISTRO_PDF = "";
    $ADUANA_SALIDA_PDF   = "";
    $ADUANA_INGRESO_PDF  = $ADUANA_DESPACHO_DESTINO;
    $ADUANA_DESPACHO_PDF = $ADUANA_ENTRADA_SALIDA;
}

// validacion incoterm

if ($CONDICIONES_INCOTERM == "CIFF") {
    $VALOR_TRANSACCION = $VALOR_ADUANA_TOTAL;
} else {
    $VALOR_TRANSACCION = $TOTAL_FOB_DOLARES;
}

$TOTAL_TRIBUTOS = number_format($TOTAL_TRIBUTOS, 2, '.', ',');

//DECLARACION
$duca->setCampo('CORRELATIVO', $NUMERO);
$duca->setCampo('NO_DUCA', $NO_DUCA);
$duca->setCampo('FECHA_ACEPTACION', $FECHA_ACEPTACION);

// SI ES EXPO
if ($TIPO_DECLARACION == "E&nbsp;") {

// PROVEEDOR
    $duca->setCampo('NO_ID_PROVEEDOR', $NO_ID_IMPORTADOR);
    $duca->setCampo('NOMBRE_PROVEEDOR', $NOMBRE_IMPORTADOR);
    $duca->setCampo('NOMBRE_PROVEEDOR2', $NOMBRE_IMPORTADOR2);
    $duca->setCampo('TIPO_ID_PROVEEDOR', $TIPO_ID_IMPORTADOR);
    $duca->setCampo('DIRECCION_PROVEEDOR', $DIRECCION_IMPORTADOR);
    $duca->setCampo('PAIS_PROVEEDOR', $PAIS_IMPORTADOR);

// IMPORTADOR
    $duca->setCampo('NO_ID_IMPORTADOR', $NO_ID_PROVEEDOR);
    $duca->setCampo('TIPO_ID_IMPORTADOR', $TIPO_ID_PROVEEDOR);
    $duca->setCampo('PAIS_IMPORTADOR', $PAIS_PROVEEDOR);
    $duca->setCampo('NOMBRE_IMPORTADOR', $NOMBRE_PROVEEDOR);
    $duca->setCampo('NOMBRE_IMPORTADOR2', $NOMBRE_PROVEEDOR2);
    $duca->setCampo('DIRECCION_IMPORTADOR', $DIRECCION_PROVEEDOR);

} else {

// PROVEEDOR
    $duca->setCampo('NO_ID_PROVEEDOR', $NO_ID_PROVEEDOR);
    $duca->setCampo('NOMBRE_PROVEEDOR', $NOMBRE_PROVEEDOR);
    $duca->setCampo('NOMBRE_PROVEEDOR2', $NOMBRE_PROVEEDOR2);
    $duca->setCampo('TIPO_ID_PROVEEDOR', $TIPO_ID_PROVEEDOR);
    $duca->setCampo('DIRECCION_PROVEEDOR', $DIRECCION_PROVEEDOR);
    $duca->setCampo('PAIS_PROVEEDOR', $PAIS_PROVEEDOR);

// IMPORTADOR
    $duca->setCampo('NO_ID_IMPORTADOR', $NO_ID_IMPORTADOR);
    $duca->setCampo('TIPO_ID_IMPORTADOR', $TIPO_ID_IMPORTADOR);
    $duca->setCampo('PAIS_IMPORTADOR', $PAIS_IMPORTADOR);
    $duca->setCampo('NOMBRE_IMPORTADOR', $NOMBRE_IMPORTADOR);
    $duca->setCampo('NOMBRE_IMPORTADOR2', $NOMBRE_IMPORTADOR2);
    $duca->setCampo('DIRECCION_IMPORTADOR', $DIRECCION_IMPORTADOR);

}

// DECLARANTE

$duca->setCampo('CODIGO_DECLARANTE', $CODIGO_DECLARANTE);
$duca->setCampo('NO_ID_DECLARANTE', $DOCUMENTO_DECLARANTE);
$duca->setCampo('NOMBRE_DECLARANTE', $RAZON_SOCIAL_DECLARANTE);
$duca->setCampo('DIRECCION_DECLARANTE', $DOMICILIO_DECLARANTE);

// ADUANA
$duca->setCampo('ADUANA_REGISTRO', $ADUANA_REGISTRO_PDF);
$duca->setCampo('ADUANA_SALIDA', $ADUANA_SALIDA_PDF);
$duca->setCampo('ADUANA_INGRESO', $ADUANA_INGRESO_PDF);
$duca->setCampo('ADUANA_DESPACHO', $ADUANA_DESPACHO_PDF);

// TRANSPORTISTAS
$duca->setCampo('CODIGO_TRANSPORTISTA', $CODIGO_TRANSPORTISTA);
$duca->setCampo('NOMBRE_TRANSPORTISTA', $NOMBRE_TRANSPORTISTA);

// MODO TRANSPORTE
$duca->setCampo('MODO_TRANSPORTE', $MODO_TRANSPORTE);

// CONDUCTORES
$duca->setCampo('ID_CONDUCTOR', $ID_CONDUCTOR);
$duca->setCampo('LICENCIA_CONDUCTOR', $LICENCIA_CONDUCTOR);
$duca->setCampo('PAIS_ID_CONDUCTOR', $PAIS_ID_CONDUCTOR);
$duca->setCampo('NOMBRE_CONDUCTOR', $NOMBRE_CONDUCTOR);

// REGIMEN ADUANERO
$duca->setCampo('REGIMEN_ADUANERO', $REGIMEN_ADUANERO);
$duca->setCampo('MODALIDAD', $MODALIDAD);
$duca->setCampo('CLASE', $CLASE);
$duca->setCampo('FECHA_VENCIMIENTO', $FECHA_VENCIMIENTO);

//  PAIS PROCEDENDIA
$duca->setCampo('PAIS_PROCEDENCIA', $PAIS_PROCEDENCIA);
$duca->setCampo('PAIS_EXPORTACION', $PAIS_EXPORTACION);

//  PAIS DESTINO
$duca->setCampo('PAIS_DESTINO', $PAIS_DESTINO);
$duca->setCampo('DEPOSITO_ADUANERO', $DEPOSITO_ADUANERO);

//  EMBARQUE
$duca->setCampo('LUGAR_EMBARQUE', $LUGAR_EMBARQUE);
$duca->setCampo('LUGAR_DESEMBARQUE', $LUGAR_DESEMBARQUE);

// VALORES TOTALES
$duca->setCampo('VALOR_FOB', number_format($TOTAL_FOB_DOLARES, 2));
$duca->setCampo('VALOR_TRANSACCION', number_format($VALOR_TRANSACCION, 2));
$duca->setCampo('GASTOS_TRANSPORTE', number_format($TOTAL_FLETE_DOLARES, 2));
$duca->setCampo('GASTOS_SEGURO', number_format($TOTAL_SEGURO_DOLARES, 2));
$duca->setCampo('OTROS_GASTOS', number_format($TOTAL_OTROS_DOLARES, 2));
$duca->setCampo('VALOR_ADUANA_TOTAL', number_format($VALOR_ADUANA_TOTAL, 2));
$duca->setCampo('INCOTERM', $INCOTERM);
$duca->setCampo('TASA_CAMBIO', number_format($TIPO_CAMBIO_TRANSACCION, 5));

// PESOS
$duca->setCampo('PESO_BRUTO', number_format($TOTAL_PESO_BRUTO, 2, '.', ','));
$duca->setCampo('PESO_NETO', number_format($TOTAL_PESO_NETO, 2, '.', ','));

// EQUIPAMIENTOS
$equipamentos       = [];
$equipamientos_data = get_equipamientos_for_numero_orden($dua_numero);
while ($order = mysqli_fetch_assoc($equipamientos_data)) {
    $equipamentos[] = [
        'equipamiento_id'         => ($order["id"]),
        'PLACA_TRANSPORTE'        => ($order["PLACA_TRANSPORTE"]),
        'PAIS_TRANSPORTE'         => ($order["PAIS_TRANSPORTE"]),
        'MARCA_TRANSPORTE'        => ($order["MARCA_TRANSPORTE"]),
        'CHASIS_TRANSPORTE'       => ($order["CHASIS_TRANSPORTE"]),
        'NUMERO_REMOLQUE'         => ($order["NUMERO_REMOLQUE"]),
        'CANTIDAD_UNIDADES_CARGA' => ($order["CANTIDAD_UNIDADES_CARGA"]),
        'numero_equipamiento'     => ($order["NUMERO_EQUIPAMIENTO"]),
        'tipo_equipamiento'       => ($order["TIPO_EQUIPAMIENTO"]),
        'tamanno_equipamiento'    => ($order["TAMANNO_EQUIPAMIENTO"]),
        'entidad_marchamo'        => ($order["ENTIDAD_MARCHAMO"]),
        'numero_marchamo'         => ($order["NUMERO_MARCHAMO"]),
        'tipo_carga'              => (strtoupper((get_tipo_de_carga_description($order["TIPO_CARGA_TRANSPORTE"])))),
    ];
}
$duca->setEquipamentos($equipamentos);

// MERCANCIAS
$mercancias = [];
$dua_items  = get_items_for_numero_orden($dua_numero);
while ($dua_var = mysqli_fetch_assoc($dua_items)) {
    $dua_var['FRACCIONES'] = [];
    $fracciones            = get_fraccion_tributos_for_numero_orden($dua_numero, $dua_var['SECUENCIA_FRACCION']);
    while ($fraccion = mysqli_fetch_assoc($fracciones)) {
        $dua_var['FRACCIONES'][] = $fraccion;
    }

    $mercancias[] = $dua_var;
}

$duca->setMercancias($mercancias);

// TRIBUTOS
$tributos      = [];
$tributos_data = get_tributos_for_numero_orden($dua_numero);
while ($order = mysqli_fetch_assoc($tributos_data)) {
    $tributos[] = [
        'TRIBUTO_ID'        => ($order["id"]),
        'TIPO_TRIBUTO'      => ($order["CODIGO_TRIBUTO"]),
        'MODALIDAD_TRIBUTO' => ($order["FORMA_PAGO"]),
        'CUOTA_TRIBUTO'     => ($order["VALOR_TRIBUTO"]),
        'BASE_DISPONIBLE'   => ($order["BASE_IMPONIBLE"]),
    ];
}
$duca->setTributos($tributos);

// DOCUMENTOS DE SOPORTE
$documentos  = [];
$doctos_data = get_documentos_for_numero_orden($dua_numero);
while ($order = mysqli_fetch_assoc($doctos_data)) {
    $documentos[] = [
        'id'                          => $order['id'],
        'TIPO_DOCUMENTO'              => $order['TIPO_DOCUMENTO'],
        'DESCRIPCION_DOCUMENTO'       => $order['DESCRIPCION_DOCUMENTO'],
        'SECUENCIA_DOCUMENTO_INICIAL' => $order['SECUENCIA_DOCUMENTO_INICIAL'],
        'SECUENCIA_DOCUMENTO_FINAL'   => $order['SECUENCIA_DOCUMENTO_FINAL'],
        'NUMERO_DOCUMENTO'            => $order['NUMERO_DOCUMENTO'],
        'ENTIDAD_EMITE'               => $order['ENTIDAD_EMITE'],
        'FECHA_EMISION'               => $order['FECHA_EMISION'],
        'FECHA_VENCIMIENTO'           => $order['FECHA_VENCIMIENTO'],
        'CODIGO_MONEDA'               => $order['CODIGO_MONEDA'],
        'MONTO_DOCUMENTO'             => $order['MONTO_DOCUMENTO'],
        'PAIS_EMISION'                => $order['PAIS_EMISION'],
        'FRACCION_PRECEDENTE'         => $order['FRACCION_PRECEDENTE'],
    ];
}
$duca->setDocumentos($documentos);

// OBSERVACIONES
$observaciones      = [];
$observaciones_data = get_observaciones_for_numero_orden($dua_numero);
while ($order = mysqli_fetch_assoc($observaciones_data)) {
    $newArr = str_split($order['DESCRIPCION'], 50);
    foreach ($newArr as $obs) {
        $observaciones[] = $obs;
    }
}

// PAD IF NEEDED
$howmany = count($observaciones);
while ($howmany < 7) {
    $observaciones[] = " ";
    $howmany++;
}

// VALIDACIONES DATOS ADICIONALES

if (strlen($CODIGO_DEPOSITO) > 1) {
    $DESCRIPCION_DEPOSITO = get_deposito_temporal_for_codigo($CODIGO_DEPOSITO);
    // $DESCRIPCION_DEPOSITO = (get_deposito_fiscal_for_codigo($CODIGO_DEPOSITO));
    $observaciones[] = "CODIGO DEPOSITO: " . $CODIGO_DEPOSITO . " - " . $DESCRIPCION_DEPOSITO;
}

if (strlen($CODIGO_ALMACEN) > 1) {
    //  $DESCRIPCION_ALMACEN = (get_deposito_fiscal_for_codigo($CODIGO_ALMACEN));
    $DESCRIPCION_ALMACEN = get_deposito_temporal_for_codigo($CODIGO_ALMACEN);
    $observaciones[]     = "CODIGO ALMACEN: " . $CODIGO_ALMACEN . " - " . $DESCRIPCION_ALMACEN;
}

if (strlen($TOTAL_BULTOS) >= 1) {
    $observaciones[] = "TOTAL BULTOS: " . $TOTAL_BULTOS;
}

// if (strlen($CODIGO_DEPOSITO) > 1) {
//        $observaciones[] = "ZONA FRANCA: ";
// }

$fracciones_acuerdo2       = get_items_for_numero_orden_with_acuerdo2($dua_numero);
$fraccion_acuerdo2_counter = 0;
while ($db_var = mysqli_fetch_assoc($fracciones_acuerdo2)) {
    if ($fraccion_acuerdo2_counter == 0) {
        $observaciones[] = " ";
        $observaciones[] = "ACUERDO 2:";
        $observaciones[] = "SECUENCIA FRACCION           CLASIFICACION ARANCELARIA                ACUERDO 2";
    }

    $fraccion_acuerdo2_counter++;
    $SECUENCIA_FRACCION        = $db_var["SECUENCIA_FRACCION"];
    $ACUERDO_PREFERENCIAL2     = $db_var["ACUERDO_PREFERENCIAL2"];
    $CLASIFICACION_ARANCELARIA = $db_var["CLASIFICACION_ARANCELARIA"];
    $observaciones[]           = $SECUENCIA_FRACCION . "                                                " . $CLASIFICACION_ARANCELARIA . "                                               " . $ACUERDO_PREFERENCIAL2;
}

$dua_vehiculos = get_vehiculos_for_numero_orden($dua_numero);
while ($dua_var = mysqli_fetch_assoc($dua_vehiculos)) {
    $vehicle_data = get_vehiculo_for_product($dua_var['product_catalog_id']);
    while ($db_var = mysqli_fetch_assoc($vehicle_data)) {
        $VEHICLE_ID          = $db_var["id"];
        $NUMERO_VIN          = $db_var["NUMERO_VIN"];
        $CHASIS              = $db_var["CHASIS"];
        $NUMERO_MOTOR        = $db_var["NUMERO_MOTOR"];
        $CENTIMETROS_CUBICOS = $db_var["CENTIMETROS_CUBICOS"];
        $CILINDRAJE          = $db_var["CILINDRAJE"];
        $CODIGO_MARCA        = $db_var["CODIGO_MARCA"];
        $TIPO_VEHICULO       = $db_var["TIPO_VEHICULO"];
        $TONELAJE            = $db_var["TONELAJE"];
        $NUMERO_PUERTAS      = $db_var["NUMERO_PUERTAS"];
        $NUMERO_ASIENTOS     = $db_var["NUMERO_ASIENTOS"];
        $NUMERO_EJES         = $db_var["NUMERO_EJES"];
        $COMBUSTIBLE         = $db_var["COMBUSTIBLE"];
        $MODELO              = $db_var["MODELO"];
        $COLOR               = $db_var["COLOR"];
        $LINEA               = $db_var["LINEA"];
    }

    $observaciones[] = " ";
    $observaciones[] = "VEHICULOS:";
    $observaciones[] = "NUMERO DE LINEA " . $dua_var['SECUENCIA_FRACCION'] . " - CODIGO SAC: " . $dua_var['CLASIFICACION_ARANCELARIA'];
    $observaciones[] = strtoupper(get_tipo_vehiculo_for_codigo($TIPO_VEHICULO)) . ", MARCA:(" . $CODIGO_MARCA . ")" . get_marca_for_codigo_vehiculo($CODIGO_MARCA) . ", MODELO: " . $MODELO . ", " . strtoupper(get_combustible_for_codigo_vehiculo($COMBUSTIBLE)) . ", PTAS: " . $NUMERO_PUERTAS;
    $observaciones[] = "LINEA: " . $LINEA . ", CC:" . $CENTIMETROS_CUBICOS . ", CILINDROS: " . $CILINDRAJE . ", ASIENTOS: " . $NUMERO_ASIENTOS . ", EJES: " . $NUMERO_EJES . ", TON: " . $TONELAJE;
    $observaciones[] = "CHASIS: " . $CHASIS . ", COLOR: " . $COLOR;
    $observaciones[] = "VIN: " . $NUMERO_VIN . ", MOTOR: " . $NUMERO_MOTOR;

}

$duca->setObservaciones($observaciones);

$duca->generar($dua_numero);

// 2039500770
