<?php

//---------------------------------------------------------------------------------
//        USER ATTRIBUTES MSQL FUNCTIONS
//---------------------------------------------------------------------------------

function get_user_menu_access($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM atributos ";
    $query .= "WHERE user_id =  '{$safe_id}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

//---------------------------------------------------------------------------------
//        REDIRECTS
//---------------------------------------------------------------------------------

function redirect_to($location)
{
    if (!headers_sent($file, $line)) {
        header("Location: " . $location);
    } else {
        printf("<script>location.href='%s';</script>", urldecode($location));
        # or deal with the problem
    }
    printf('<a href="%s">Moved</a>', urlencode($location));
    exit;
}

function redirect_to_id($location)
{
    if (!headers_sent($file, $line)) {
        header("Location: " . $location);
    } else {
        printf("<script>location.href='%s';</script>", ($location));
        # or deal with the problem
    }
    printf('<a href="%s">Moved</a>', urlencode($location));
    exit;
}

function redirect_to_de($location)
{
    if (!headers_sent($file, $line)) {
        header("Location: " . $location);
    } else {
        printf("<script>location.href='%s';</script>", urldecode($location));
        # or deal with the problem
    }
    printf('<a href="%s">Moved</a>', urldecode($location));
    exit;
}

//---------------------------------------------------------------------------------
//        FIRMA-E QR GEN FUNCTIONS
//---------------------------------------------------------------------------------

function qr_id_gen($id)
{

// data init
    $data    = 'http://190.106.199.92/base/html/pages/expqr.php?id=' . $id;
    $size    = '200x200';
    $logo    = true;
    $save_to = "qr/$id.png";

    header('Content-type: image/png');
// Get QR Code image from Google Chart API
    // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
    $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));
    if ($logo !== false) {
        $logo_path = "logo/black-qr.png";
        $logo      = imagecreatefromstring(file_get_contents($logo_path));

        $QR_width  = imagesx($QR);
        $QR_height = imagesy($QR);

        $logo_width  = imagesx($logo);
        $logo_height = imagesy($logo);

        // Scale logo to fit in the QR Code
        $logo_qr_width  = $QR_width / 3;
        $scale          = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;

        imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    }

// save png to path
    imagepng($QR, $save_to);
// free space
    imagedestroy($QR);
}

function qr_dua_gen()
{

// data init
    $data = 'https://farm2.sat.gob.gt/sat-movil/a_consulta_dua.html?a=Y4m/tyu18Ic46tElvek5gMY0rVF30sAN&amp;b=kAT0loGTz6gYjCu6MkaD7w==';
    // 'http://190.106.199.94/base/html/pages/expqr.php?id='.$id;
    $size    = '200x200';
    $logo    = true;
    $save_to = "qr/test.png";

    header('Content-type: image/png');
// Get QR Code image from Google Chart API
    // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
    $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));
    if ($logo !== false) {
        $logo_path = "logo/black-qr.png";
        $logo      = imagecreatefromstring(file_get_contents($logo_path));

        $QR_width  = imagesx($QR);
        $QR_height = imagesy($QR);

        $logo_width  = imagesx($logo);
        $logo_height = imagesy($logo);

        // Scale logo to fit in the QR Code
        $logo_qr_width  = $QR_width / 3;
        $scale          = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;

        imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    }

// save png to path
    imagepng($QR, $save_to);
// free space
    imagedestroy($QR);
}

function qr_duca_resumida_gen($id)
{

    // data init
    $data = get_duca_qr($id);

    // UPDATE POLIZA QR LINK
    $query = "UPDATE DUA_POLIZA SET ";
    $query .= "QR                 = '{$data}' ";
    $query .= "WHERE NUMERO_ORDEN = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    //$data = 'https://farm2.sat.gob.gt/sat-movil/a_consulta_declaracion.html?a=Kz90Z7UIw69wzVUINO0yH5OStGfj+dgZ&amp;b=jBW1trYVFbIWtb4MUscq3Q==';
    // 'http://190.106.199.94/base/html/pages/expqr.php?id='.$id;
    $size    = '200x200';
    $logo    = true;
    $save_to = "qr/" . $id . ".png";

    header('Content-type: image/png');
// Get QR Code image from Google Chart API
    // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
    $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));
    if ($logo !== false) {
        //     $logo_path = "logo/black-qr.png";
        $logo = imagecreatefromstring(file_get_contents($logo_path));

        $QR_width  = imagesx($QR);
        $QR_height = imagesy($QR);

        $logo_width  = imagesx($logo);
        $logo_height = imagesy($logo);

        // Scale logo to fit in the QR Code
        $logo_qr_width  = $QR_width / 3;
        $scale          = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;

        imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    }

// save png to path
    imagepng($QR, $save_to);
// free space
    imagedestroy($QR);
}

function remoteFileExists($url)
{
    $curl = curl_init($url);

    //don't fetch the actual page, you only want to check the connection is ok
    curl_setopt($curl, CURLOPT_NOBODY, true);

    //do request
    $result = curl_exec($curl);

    $ret = false;

    //if request did not fail
    if ($result !== false) {
        //if request was ok, check response code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($statusCode == 200) {
            $ret = true;
        }
    }

    curl_close($curl);

    return $ret;
}

//---------------------------------------------------------------------------------
//        SEND XML OVER POST
//---------------------------------------------------------------------------------

function sendXmlPost($url, $xml)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    // For xml, change the content-type.
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: text/xml"]);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned

    // Send to remote and return data to caller.
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

//---------------------------------------------------------------------------------
//        MYSQL QUERIES
//---------------------------------------------------------------------------------

function mysql_prep($string)
{
    global $connection;

    $escaped_string = mysqli_real_escape_string($connection, $string);

    return $escaped_string;
}

function confirm_query($result_set)
{
    if (!$result_set) {
        die("Database query failed ");
    }
}

//mysqli_error($connection)

//---------------------------------------------------------------------------------
//        TRACE FUNCTIONS
//---------------------------------------------------------------------------------

function get_user_ip()
{
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        //check for ip from share internet
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        // Check for the Proxy User
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }

    return $ip;
}

function get_actual_link()
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function trace_for_exp($search)
{
    global $connection_trace;
    $safe_search = mysqli_real_escape_string($connection_trace, $search);
    $query       = "SELECT * ";
    $query .= "FROM operations ";
    $query .= "WHERE exp_id = '$safe_search' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $trace_set = mysqli_query($connection_trace, $query);
    confirm_query($trace_set);

    return $trace_set;
}

function trace_for_date($search)
{
    global $connection_trace;
    $safe_search = mysqli_real_escape_string($connection_trace, $search);
    $query       = "SELECT * ";
    $query .= "FROM operations ";
    $query .= "WHERE action_timestamp LIKE '%$safe_search%' ";
//    $query .= "OR empresa LIKE '%$safe_search%' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $trace_set = mysqli_query($connection_trace, $query);
    confirm_query($trace_set);

    return $trace_set;
}

function get_trace_for_id($id)
{
    global $connection_trace;
    $query = "SELECT * ";
    $query .= "FROM operations ";
    $query .= "WHERE id = '$id' ";
    $trace_set = mysqli_query($connection_trace, $query);
    confirm_query($trace_set);

    return $trace_set;
}

function set_trace($action_type, $user_id, $user_type, $source_id, $source_module, $value_id, $previous_value, $new_value, $details)
{

    $device_id = "MACBOOKPRO";
    $device_ip = "192.168.1.1";
    //$device_ip         = get_user_ip();
    $device_gps  = "";
    $current_url = $_SERVER['REQUEST_URI'];
    $status      = "1";

    $query = "INSERT INTO operations (";
    $query .= "  action_type, user_id, user_type, device_id, device_ip, device_gps, source_id, source_name, value_id, previous_value, new_value, details, status";
    $query .= ") VALUES (";
    $query .= "  '{$action_type}', '{$user_id}', '{$user_type}', '{$device_id}', '{$device_ip}', '{$device_gps}', '{$source_gps}', '{$source_name}', '{$value_id}', '{$previous_value}', '{$new_value}', '{$details}' , '{$status}'";
    $query .= ")";
    $result = mysqli_query($connection_trace, $query);

}

/*
function set_activity_monitor() {

$device_id         = "MACBOOKPRO";
$user_type        = "0";
$user_id            =    "1";    //$_SESSION["admin_id"];
$device_ip         = "190.106.199.89";    //get_user_ip();
$device_lat     = "14.61144112664859";
$device_lon     = "-90.51649232744688";
$current_url    = "admin.php"//$_SERVER['REQUEST_URI'];
$status             = "1";

$query  = "INSERT INTO activity_monitor (";
$query .= " user_id, user_type, device_id, device_ip, device_latitude, device_longitude, source_url, details, status";
$query .= ") VALUES (";
$query .= " '{$user_id}', '{$user_type}', '{$device_id}', '{$device_ip}', '{$device_latitude}', '{$device_longitude}', '{$source_url}', '{$details}' , '{$status}'";
$query .= ")";
$result = mysqli_query($connection_trace, $query);
}
 */

//---------------------------------------------------------------------------------
//        FILE EXTENSION TYPE
//---------------------------------------------------------------------------------

function get_extension($file)
{
    $extension = end(explode(".", $file));

    return $extension ? $extension : false;
}

//---------------------------------------------------------------------------------
//        WHAT IS THIS ??  QUERIES
//---------------------------------------------------------------------------------

function get_dua_field_by_source()
{

    switch ($fuente_dato) {

        case "manual":
            $input = "<input type=\"text\" name=\"$campo\" placeholder=\"$detalle\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\"  value=\"$valor\" />";
            break;

        case "tablas_asociadas":

            $input         = "<select class=\"form-control\" id=\"$campo\" name=\"$campo\" >	";
            $fuente_detail = get_table_by_db_name($id_fuente);
            while ($order = mysqli_fetch_assoc($fuente_detail)) {
                $op_val         = $order["$option_value"];
                $op_description = $order["$option_description"];
                $input .= "<option value=\"$op_val\" ";

                if ($valor == $op_val) {$input .= " selected ";}
                $input .= " >";
                $input .= $op_val;
                $input .= " (" . $op_description . ")";
                $input .= "</option>";

            }

            $input .= "</select>";

            break;

        case "funciones_sistema":
            $input = "<input type=\"text\" name=\"$id_dato\" placeholder=\"$campo\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\" value=\"$valor\" /><br>";

            break;
    }

    return $input;

}

//---------------------------------------------------------------------------------
//        MYSQL - FORM ERRORS
//---------------------------------------------------------------------------------

function form_errors($errors = [])
{
    $output = "";
    if (!empty($errors)) {
        $output .= "<div class=\"error\">";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>";
            $output .= htmlentities($error);
            $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }

    return $output;
}

//---------------------------------------------------------------------------------
//        MYSQL - TABLE GETTER
//---------------------------------------------------------------------------------

function get_table_by_db_name_order($table_name, $order)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM $table_name "; //
    $query .= "ORDER BY $order ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_table_by_db_name_order_enabled($table_name, $order)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM $table_name "; //
    $query .= "WHERE status = '1' "; //
    $query .= "ORDER BY $order ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_table_by_db_name($table_name)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM $table_name "; //
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_table_by_db_name_like_partida($table_name, $partida)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM $table_name "; //
    $query .= "WHERE partida LIKE '$partida%' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_randoms_for_table_by_db_name($table_name)
{
    global $connection;
    $query    = "SELECT * FROM $table_name ORDER BY RAND() LIMIT 5;";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_columns_for_db($table_name)
{
    global $connection;
    $query    = "SHOW COLUMNS FROM $table_name ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_columns_by_table_name($table_name)
{
    global $connection;
    $query = "SELECT `COLUMN_NAME` ";
    $query = "FROM `INFORMATION_SCHEMA`.`COLUMNS` ";
    $query = "WHERE `TABLE_SCHEMA`='codecominter_42' ";
    $query = "AND `TABLE_NAME`='{$table_name}'; ";
    $query .= "FROM sat_aduanas "; // '{$table_name}'
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_xml_by_modalidad_tipo($modalidad, $tipo_declaracion)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_validacion_regimenes_tipo "; //
    $query .= "WHERE tipo_declaracion LIKE '$tipo_declaracion%' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_xml_by_dtd($regimen, $modalidad)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_dtd_duca_$regimen "; //
    $query .= "WHERE $modalidad <> 'NA' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - FIRMA E FUNCTIONS
//---------------------------------------------------------------------------------

function users_firmae_admins()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM cert_users ";
    $query .= "WHERE user_type = 'admins' ";
//    $query .= "OR empresa LIKE '%$safe_search%' ";
    //    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function users_firmae_clientes()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM cert_users ";
    $query .= "WHERE user_type = 'usuarios' ";
//    $query .= "OR empresa LIKE '%$safe_search%' ";
    //    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function users_firmae_clientes_terceros()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM cert_users ";
    $query .= "WHERE user_type = 'usuarios_clientes' ";
//    $query .= "OR empresa LIKE '%$safe_search%' ";
    //    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function cert_for_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM certificados_firma ";
    $query .= "WHERE cert_user_id ='{$safe_id}' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - SEARCH RESULTS FUNCTIONS
//---------------------------------------------------------------------------------

function numero_orden_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM DUA_NUMERO_ORDEN ";
    $query .= "WHERE NUMERO_ORDEN LIKE '%$safe_search%' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function referencia_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE referencia LIKE '%$safe_search%' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function numero_orden_search_for_user($search, $user)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM DUA_NUMERO_ORDEN ";
    $query .= "WHERE NUMERO_ORDEN LIKE '%$safe_search%' ";
    $query .= "AND status <> '0' ";
    //    $query .= "AND user_id = '{$user_id}' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function referencia_search_for_user($search, $user_id)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE referencia LIKE '%$safe_search%' ";
    $query .= "AND user_id = '{$user_id}' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function tlc_partida($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM sat_tlc ";
    $query .= "WHERE codigo LIKE '%$safe_search%' ";
    //$query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function get_union_for_country($country)
{
    global $connection;
    $safe_country = mysqli_real_escape_string($connection, $country);
    $query        = "SELECT * ";
    $query .= "FROM catalogo_uniones ";
    $query .= "WHERE codigo = '{$safe_country}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $data = htmlentities($db_var[union]);
        break;
    }

    return $data;
}

function tlc_tarifa_partida_pais($partida, $pais)
{
    global $connection;
    $safe_partida = mysqli_real_escape_string($connection, $partida);
    $safe_pais    = mysqli_real_escape_string($connection, $pais);
    $query        = "SELECT * ";
    $query .= "FROM tlc ";
    $query .= "WHERE codigo LIKE '%$safe_partida%' ";
    $query .= "AND id_pais LIKE '%$safe_pais%' ";
    //    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $data = htmlentities($db_var[tarifa]);
        break;
    }

    return $data;
}

function acuerdo_uno_for_pais($pais)
{
    global $connection;
    $safe_pais = mysqli_real_escape_string($connection, $pais);
    $query     = "SELECT * ";
    $query .= "FROM sat_acuerdo_uno ";
    $query .= "WHERE pais LIKE '%$safe_pais%' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $data = htmlentities($db_var[codigo]);
        break;
    }

    return $data;
}

function cuota_tarifa_partida_pais($partida, $pais)
{
    global $connection;
    $safe_partida = mysqli_real_escape_string($connection, $partida);
    $safe_pais    = mysqli_real_escape_string($connection, $pais);
    $query        = "SELECT * ";
    $query .= "FROM sat_cuota_contingente ";
    $query .= "WHERE partida LIKE '%$safe_partida%' ";
    $query .= "AND pais LIKE '%$safe_pais%' ";
    //    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $data = htmlentities($db_var[dai]);
        break;
    }

    return $data;
}

function cuota_codigo_partida_pais($partida, $pais)
{
    global $connection;
    $safe_partida = mysqli_real_escape_string($connection, $partida);
    $safe_pais    = mysqli_real_escape_string($connection, $pais);
    $query        = "SELECT * ";
    $query .= "FROM sat_cuota_contingente ";
    $query .= "WHERE partida LIKE '%$safe_partida%' ";
    $query .= "AND pais LIKE '%$safe_pais%' ";
    //    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $data = htmlentities($db_var[codigo_adicional1]);
        break;
    }

    return $data;
}

function cuota_contingente_partida_pais($partida, $pais)
{
    global $connection;
    $safe_partida = mysqli_real_escape_string($connection, $partida);
    $safe_pais    = mysqli_real_escape_string($connection, $pais);
    $query        = "SELECT * ";
    $query .= "FROM sat_cuota_contingente ";
    $query .= "WHERE partida LIKE '%$safe_partida%' ";
    $query .= "AND pais LIKE '%$safe_pais%' ";
    //    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $data = htmlentities($db_var[cuota_contingente]);
        break;
    }

    return $data;
}

function tlc_partida_origen($search, $origen)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM sat_tlc ";
    $query .= "WHERE codigo LIKE '%$safe_search%' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $data = htmlentities($ord[$origen]);
        break;
    }

    return $data;
}

function unidades_inciso($inciso)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_unidades_medida_arancel ";
    $query .= "WHERE inciso = '{$inciso}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function forma_de_pago_by_regimen_grupo($id_grupo, $id_regimen)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_regimenes ";
    $query .= "WHERE id_grupo = '{$id_grupo}' ";
    $query .= "AND id_regimen = '{$id_regimen}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $returnable = htmlentities($db_var["forma_pago"]);
    }

    return $returnable;
}

function forma_de_pago_by_regimen_modalida_clase_tributo($regimen, $modalidad, $clase, $tributo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_forma_pago_regimen ";
    $query .= "WHERE regimen    = '{$regimen}' ";
    $query .= "AND modalidad    = '{$modalidad}' ";
    $query .= "AND clase        = '{$clase}' ";
    $query .= "AND tributo      = '{$tributo}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $returnable = htmlentities($db_var["forma_pago"]);
    }

    return $returnable;
}

function uses_dva_by_regimen_grupo($id_grupo, $id_regimen)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_regimenes ";
    $query .= "WHERE id_grupo = '{$id_grupo}' ";
    $query .= "AND id_regimen = '{$id_regimen}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $returnable = htmlentities($db_var["dva"]);
    }

    return $returnable;
}

function tipo_declaracion_by_regimen_grupo($id_grupo, $id_regimen)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_regimenes ";
    $query .= "WHERE id_grupo = '{$id_grupo}' ";
    $query .= "AND id_regimen = '{$id_regimen}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $returnable = htmlentities($db_var["tipo"]);
    }

    return $returnable;
}

function all_permisos_capitulo($capitulo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM permisos_no_arancelarios ";
    $query .= "WHERE capitulo = '{$capitulo}' ";
    $query .= "ORDER BY id ASC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function all_permisos_capitulo_partida($capitulo, $partida)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM permisos_no_arancelarios ";
    $query .= "WHERE capitulo = '{$capitulo}' ";
    $query .= "AND partida = '{$partida}' ";
    $query .= "ORDER BY id ASC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function permisos_capitulo($capitulo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM permisos_no_arancelarios ";
    $query .= "WHERE capitulo = '{$capitulo}' ";
    $query .= "ORDER BY id ASC ";
    $query .= "LIMIT 1 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function permisos_capitulo_partida($capitulo, $partida)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM permisos_no_arancelarios ";
    $query .= "WHERE capitulo = '{$capitulo}' ";
    $query .= "AND partida = '{$partida}' ";
    $query .= "ORDER BY id ASC ";
    $query .= "LIMIT 1 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function permisos_capitulo_partida_subpartida($capitulo, $partida, $subpartida)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM permisos_no_arancelarios ";
    $query .= "WHERE capitulo = '{$capitulo}' ";
    $query .= "AND partida = '{$partida}' ";
    $query .= "AND subpartida = '{$subpartida}' ";
    $query .= "ORDER BY id ASC ";
    $query .= "LIMIT 1 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function permisos_capitulo_partida_subpartida_fraccion($capitulo, $partida, $subpartida, $fraccion)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM permisos_no_arancelarios ";
    $query .= "WHERE capitulo = '{$capitulo}' ";
    $query .= "AND partida = '{$partida}' ";
    $query .= "AND subpartida = '{$subpartida}' ";
    $query .= "AND fraccion = '{$fraccion}' ";
    $query .= "ORDER BY id ASC ";
    $query .= "LIMIT 1 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function services_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function services_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 6 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function full_services_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios_completos ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function full_services_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios_completos ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 6 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function services_for_user_search($search, $id)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $safe_id     = mysqli_real_escape_string($connection, $id);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_servicios ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND user_id =  '{$safe_id}' ";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function full_services_for_user_search($search, $id)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $safe_id     = mysqli_real_escape_string($connection, $id);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_servicios_completos ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND user_id =  '{$safe_id}' ";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function coti_for_user_search($search, $id)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $safe_id     = mysqli_real_escape_string($connection, $id);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_servicios ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND user_id =  '{$safe_id}' ";
    $query .= "AND estado = '2' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function full_coti_for_user_search($search, $id)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $safe_id     = mysqli_real_escape_string($connection, $id);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_servicios_completos ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    $query .= "AND user_id =  '{$safe_id}' ";
    $query .= "AND estado = '2' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function get_exp_for_doc_numero_q($search)
{
    global $connection;
    $exps        = [];
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'NUMERO DE DOCUMENTO' ";
    $query .= "AND valor LIKE '%$safe_search%' ";
//    $query .= "AND status = '1' ";
    //    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["exp_id"]);
        array_push($exps, $value);
    }

    return $exps;
}

function users_exp_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status <> '0' ";
    //    $query .= "WHERE nit LIKE '%$safe_search% ' ";
    //    $query .= "OR empresa LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 50 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function users_exp_for_sede_search($search, $sede)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status <> '0' ";
    $query .= "AND sede = '{$sede}' ";
    //    $query .= "WHERE nit LIKE '%$safe_search% ' ";
    //    $query .= "OR empresa LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function users_exp_for_sede($sede)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status <> '0' ";
    $query .= "AND sede = '{$sede}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function notificaciones_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM cedulas_notificacion ";
    $query .= "WHERE numero_cedula LIKE '%$safe_search%' ";
    $query .= "OR numero_orden LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function notificacion_for_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM cedulas_notificacion ";
    $query .= "WHERE id =  '{$safe_id}' ";
    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function users_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE razon LIKE '%$safe_search%' ";
//        $query .= "OR empresa LIKE '%$safe_search%' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function users_for_sede_search($search, $sede)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE razon LIKE '%$safe_search%' ";
//        $query .= "OR empresa LIKE '%$safe_search%' ";
    $query .= "AND sede =  '{$sede}' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function users_clients_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_clientes ";
    $query .= "WHERE razon LIKE '%$safe_search%' ";
    $query .= "AND estado <> '0' ";
    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;

}

function users_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE razon LIKE '%$safe_search%' ";
//        $query .= "OR empresa LIKE '%$safe_search%' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function users_for_sede_recent($sede)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE sede = '{$sede}' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function admins_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE firstname LIKE '%$safe_search%'";
    $query .= "OR lastname LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function admins_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE firstname LIKE '%$safe_search%'";
    $query .= "OR lastname LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function docto_servicio_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR codigo LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function docto_servicio_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR codigo LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function docto_usuario_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM documentos_usuarios ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR codigo LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function docto_usuario_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM documentos_usuarios ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR codigo LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function docto_asociado_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM documentos_asociados ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR detalle LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function docto_asociado_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM documentos_asociados ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR detalle LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function tabla_asociada_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM tablas_asociadas ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR detalle LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function tabla_asociada_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM tablas_asociadas ";
    $query .= "WHERE nombre LIKE '%$safe_search%'";
    $query .= "OR detalle LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function step_servicio_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE actividad LIKE '%$safe_search%'";
    $query .= "OR etapa LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function step_servicio_for_categoria($categoria)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE categoria LIKE '%$categoria%'";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function step_servicio_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE actividad LIKE '%$safe_search%'";
    $query .= "OR etapa LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function products_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE modelo LIKE '%$safe_search%'";
    $query .= "OR descripcion LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function products_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE modelo LIKE '%$safe_search%'";
    $query .= "OR descripcion LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 8 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function products_for_descripcion_and_caracteristica($descripcion, $caracteristicas)
{
    global $connection;
    $safe_descripcion     = mysqli_real_escape_string($connection, $descripcion);
    $safe_caracteristicas = mysqli_real_escape_string($connection, $caracteristicas);
    $query                = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE caracteristicas LIKE '%$safe_caracteristicas%'";
    $query .= "and descripcion LIKE '%$safe_descripcion%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 8 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function products_for_descripcion_caracteristica_modelo($descripcion, $caracteristicas, $modelo)
{
    global $connection;
    $safe_descripcion     = mysqli_real_escape_string($connection, $descripcion);
    $safe_caracteristicas = mysqli_real_escape_string($connection, $caracteristicas);
    $safe_modelo          = mysqli_real_escape_string($connection, $modelo);
    $query                = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE caracteristicas LIKE '%$safe_caracteristicas%' ";
    $query .= "AND descripcion LIKE '%$safe_descripcion%' ";
    $query .= "AND modelo = LIKE '%$safe_modelo%' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 8 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function products_for_descripcion_caracteristica_modelo_proveedor_arancel_medida($descripcion, $caracteristicas, $modelo, $proveedor, $arancel, $medida)
{
    global $connection;
    $safe_descripcion     = mysqli_real_escape_string($connection, $descripcion);
    $safe_caracteristicas = mysqli_real_escape_string($connection, $caracteristicas);
    $safe_modelo          = mysqli_real_escape_string($connection, $modelo);
    $safe_proveedor       = mysqli_real_escape_string($connection, $proveedor);
    $safe_arancel         = mysqli_real_escape_string($connection, $arancel);
    $safe_medida          = mysqli_real_escape_string($connection, $medida);

    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE caracteristicas = '$safe_caracteristicas' ";
    $query .= "AND descripcion = '$safe_descripcion' ";
    $query .= "AND modelo =  '$safe_modelo' ";
    $query .= "AND proveedor =  '$safe_proveedor' ";
    $query .= "AND partida =  '$safe_arancel' ";
    $query .= "AND medida =  '$safe_medida' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 8 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function paged_services_for_search($start_from, $howmany, $search)
{
    global $connection;
    $safe_start  = mysqli_real_escape_string($connection, $start_from);
    $safe_many   = mysqli_real_escape_string($connection, $howmany);
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM servicios ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT {$start_from}, {$safe_many}";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function paged_services_for_search_count($search)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $category_id);
    $query   = "SELECT * ";
    $query .= "FROM servicios ";
    $query .= "WHERE servicio LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);
    $row_cnt = mysqli_num_rows($products_set);

    return $row_cnt;

}

//---------------------------------------------------------------------------------
//        MYSQL - PROVEEDORES FUNCTIONS
//---------------------------------------------------------------------------------

function get_all_proveedores()
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM proveedores ";
    $query .= "ORDER BY proveedor DESC ";
    $query .= "AND status = '1' ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function proveedor_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM proveedores ";
    $query .= "WHERE id =  '{$safe_id}' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function proveedores_for_search($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM proveedores ";
    $query .= "WHERE proveedor LIKE '%$safe_search%' ";
    $query .= "OR codigo_sat LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function proveedores_for_search_recent($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM proveedores ";
    $query .= "WHERE proveedor LIKE '%$safe_search%' ";
    $query .= "OR codigo_sat LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 8 ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function proveedor_name_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM proveedores ";
    $query .= "WHERE id =  '{$safe_id}' ";
    $query .= "ORDER BY id DESC ";
    $query_set = mysqli_query($connection, $query);
    confirm_query($query_set);
    while ($db_var = mysqli_fetch_assoc($query_set)) {
        $returnable = strtoupper($db_var["proveedor"]);
        break;
    }

    return $returnable;
}

function get_last_proveedor_id()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM proveedores ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

//---------------------------------------------------------------------------------
//        MYSQL - ZONA FRANCA FUNCTIONS
//---------------------------------------------------------------------------------

function is_zona_franca($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM regimen_zona_franca ";
    $query .= "WHERE id_regimen = '{$safe_search}'";
    $query .= "ORDER BY id DESC ";
    $data_set = mysqli_query($connection, $query);
    while ($data = mysqli_fetch_assoc($data_set)) {
        $returnable = htmlentities($data["id_clase_10"]);
        break;
    }

    return $returnable;
}

//---------------------------------------------------------------------------------
//        MYSQL - PRODUCT CATALOG FUNCTIONS
//---------------------------------------------------------------------------------

function catalog_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE status = 1 ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function products_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE id =  '{$safe_id}' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function user_products_for_search($search, $id)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $safe_id     = mysqli_real_escape_string($connection, $id);
    $query       = "SELECT * ";
    $query .= "FROM usuarios_productos ";
    $query .= "WHERE descripcion LIKE '%$safe_search%' ";
    $query .= "AND user_id =  '{$safe_id}' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function user_products_for_exp_id($id)
{

    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT DISTINCT product_catalog_id ";
    $query .= "FROM DUA_FRACCION ";
    $query .= "WHERE exp_id =  '{$safe_id}'";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

/*
function count_dua_items_for_exp_id($id) {
global $connection;
$safe_id = mysqli_real_escape_string($connection, $id);
$query  = "SELECT * ";
$query .= "FROM DUA_FRACCION ";
$query .= "WHERE exp_id =  '{$safe_id}'";
$query .= "AND status = '1' ";
$products_set = mysqli_query($connection, $query);
confirm_query($products_set);
$row_cnt = mysqli_num_rows($products_set);
return $row_cnt;

}
 */

function user_products_for_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_productos ";
    $query .= "WHERE user_id =  '{$safe_id}'";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function get_user_service_doctos_for_user_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_doctos_servicio ";
    $query .= "WHERE user_id =  '{$safe_id}'";
    $query .= "AND estado = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_last_service_docto()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_doctos_servicio ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_last_gestion_docto()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_doctos_gestion ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_user_client_doctos_for_client_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM user_client_doctos ";
    $query .= "WHERE client_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_last_docto_client()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM user_client_doctos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

//---------------------------------------------------------------------------------
//        MYSQL - BIBLIOTECA FUNCTIONS
//---------------------------------------------------------------------------------

function get_biblioteca_categorias()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM biblioteca_categorias ";
    $query .= "WHERE status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_articulos_for_docto_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_articulos ";
    $query .= "WHERE docto_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_doctos_for_subarticulo_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_doctos ";
    $query .= "WHERE subarticulo_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_actividad_doctos_for_actividad_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_expedientes_actividades_doctos ";
    $query .= "WHERE actividad_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_doctos_doctos_for_docto_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_doctos ";
    $query .= "WHERE docto_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_fondos_doctos_for_fondo_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM expedientes_fondos_doctos ";
    $query .= "WHERE fondos_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_links_for_subarticulo_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_links ";
    $query .= "WHERE subarticulo_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_subarticulos_for_articulo_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_subarticulos ";
    $query .= "WHERE articulo_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_documento_for_categoria_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_documentos ";
    $query .= "WHERE categoria_id =  '{$safe_id}'";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_documento_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_documentos ";
    $query .= "WHERE id =  '{$safe_id}'";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_articulo_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_articulos ";
    $query .= "WHERE id =  '{$safe_id}'";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_subarticulo_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_subarticulos ";
    $query .= "WHERE id =  '{$safe_id}'";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_categoria_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM biblioteca_categorias ";
    $query .= "WHERE id =  '{$safe_id}'";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_biblioteca_doctos()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM biblioteca_documentos";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_last_docto_subarticulo()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM biblioteca_doctos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_last_docto_actividad()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_actividades_doctos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_last_docto_docto()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_doctos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_last_docto_fondos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM expedientes_fondos_doctos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

//---------------------------------------------------------------------------------
//        MYSQL - CSV
//---------------------------------------------------------------------------------

function get_last_factura_csv()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_csv_factura ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_unidad_medida_csv($medida)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_medidas ";
    $query .= "WHERE descripcion = '{$medida}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["unidad_medida_sat"]);
        break;
    }

    return $value;
}

function get_tipo_bulto_csv($bulto)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_bulto ";
    $query .= "WHERE descripcion = '{$bulto}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["clase"]);
        break;
    }

    return $value;
}

//---------------------------------------------------------------------------------
//        MYSQL - NAMES AUTOCOMPLETE FUNCTIONS
//---------------------------------------------------------------------------------

function name_all_services()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM servicios ";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

function name_all_users()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "ORDER BY razon ASC ";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

function name_all_fletes()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM fletes ";
    $query .= "ORDER BY departamento ASC ";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

function name_all_deptos()
{
    global $connection;

    $query = "SELECT departamento ";
    $query .= "FROM fletes ";
    $query .= "ORDER BY departamento ASC ";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

function name_all_municipios()
{
    global $connection;

    $query = "SELECT municipio ";
    $query .= "FROM fletes ";+
    $query .= "ORDER BY municipio ASC ";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - SERVICES
//---------------------------------------------------------------------------------

function paged_services($start_from)
{
    global $connection;
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $query      = "SELECT * ";
    $query .= "FROM servicios ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT {$start_from}, 20";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_services_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function paged_full_services($start_from)
{
    global $connection;
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $query      = "SELECT * ";
    $query .= "FROM servicios_completos ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT {$start_from}, 20";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_full_services_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_completos ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function services_for_full_service($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_detalle ";
    $query .= "WHERE id_servicio_completo = '{$safe_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY orden ASC ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function order_for_full_service($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_detalle ";
    $query .= "WHERE id_servicio_completo = '{$safe_id}' ";
    $query .= "ORDER BY orden DESC ";
    $query .= "LIMIT 1 ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_service($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios ";
    $query .= "WHERE id = '{$safe_id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_service_activities($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_actividades_detalle ";
    $query .= "WHERE service_id = '{$safe_id}' ";
    $query .= "AND status = '1' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_service_activities_for_stage($id, $stage)
{
    global $connection;
    $safe_id    = mysqli_real_escape_string($connection, $id);
    $safe_stage = mysqli_real_escape_string($connection, $stage);
    $query      = "SELECT * ";
    $query .= "FROM servicios_actividades_detalle ";
    $query .= "WHERE service_id = '{$safe_id}' ";
    $query .= "AND status = '1' ";
    $query .= "AND etapa = '{$safe_stage}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_activities()
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "ORDER BY actividad ASC ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_gestiones()
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "ORDER BY actividad ASC ";
    //    $query .= "WHERE etapa = 'Gestión' ";
    //    $query .= "AND estado = '1' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_activities_gestiones()
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE etapa = 'Gestión' ";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY actividad ASC ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_activities_transporte()
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE departamento = 'TRANSPORTE' ";
    $query .= "AND estado = '1' ";
    $query .= "ORDER BY actividad ASC ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_complementarios($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_complementarios ";
    $query .= "WHERE id_servicio = '{$id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_actividad($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE id = '{$safe_id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_actividad_for_exp($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_expedientes_actividades ";
    $query .= "WHERE id = '{$safe_id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_actividad_for_stage($id, $stage)
{
    global $connection;
    $safe_id    = mysqli_real_escape_string($connection, $id);
    $safe_stage = mysqli_real_escape_string($connection, $stage);
    $query      = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE id = '{$safe_id}' ";
    $query .= "AND etapa = '{$safe_stage}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_exp_gastos($exp)
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM usuarios_expedientes_gastos ";
    $query .= "WHERE exp_id = '{$safe_exp}' ";
    $query .= "AND status = '1' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_exp_activities($id, $exp)
{
    global $connection;
    $safe_id  = mysqli_real_escape_string($connection, $id);
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM usuarios_expedientes_actividades ";
    $query .= "WHERE service_id = '{$safe_id}' ";
    $query .= "AND exp_id = '{$safe_exp}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_exp_activities_gestor($id, $exp, $gestor_id)
{
    global $connection;
    $safe_id  = mysqli_real_escape_string($connection, $id);
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $safe_gid = mysqli_real_escape_string($connection, $gestor_id);
    $query    = "SELECT * ";
    $query .= "FROM usuarios_expedientes_actividades ";
    $query .= "WHERE service_id = '{$safe_id}' ";
    $query .= "AND exp_id = '{$safe_exp}' ";
    $query .= "AND gestor_id = '{$safe_gid}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_all_exp_activities($exp)
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM usuarios_expedientes_actividades ";
    $query .= "WHERE exp_id = '{$safe_exp}' ";
    $query .= "AND status <> '2' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_all_fondos()
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM expedientes_fondos ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_pending_fondos()
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM expedientes_fondos ";
    $query .= "WHERE estado = '1' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_all_exp_fondos($exp)
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM expedientes_fondos ";
    $query .= "WHERE exp_id = '{$safe_exp}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_pending_exp_fondos($exp)
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM expedientes_fondos ";
    $query .= "WHERE exp_id = '{$safe_exp}' ";
    $query .= "AND estado = '1' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_active_exp_fondos($exp)
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM expedientes_fondos ";
    $query .= "WHERE exp_id = '{$safe_exp}' ";
    $query .= "AND estado = '2' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_exp_fondos_for_id($exp, $id)
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM expedientes_fondos ";
    $query .= "WHERE exp_id = '{$safe_exp}' ";
    $query .= "AND id = '{$id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_exp_todos($exp)
{
    global $connection;
    $safe_exp = mysqli_real_escape_string($connection, $exp);
    $query    = "SELECT * ";
    $query .= "FROM usuarios_expedientes_actividades ";
    $query .= "WHERE exp_id = '{$safe_exp}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_actividad_for_stage_and_exp($id, $stage, $exp)
{
    global $connection;
    $safe_id    = mysqli_real_escape_string($connection, $id);
    $safe_stage = mysqli_real_escape_string($connection, $stage);
    $safe_exp   = mysqli_real_escape_string($connection, $exp);
    $query      = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "WHERE id = '{$safe_id}' ";
    $query .= "AND etapa = '{$safe_stage}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_last_corretalivo()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["correlativo"]);
        break;
    }

    return $orderid;
}

function get_dua_responses($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_RESPUESTA ";
    $query .= "WHERE dua = '{$dua_number}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dua_transmit_status($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TX ";
    $query .= "WHERE dua = '{$dua_number}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    while ($db_var = mysqli_fetch_assoc($admin_set)) {
        $status = $db_var["status"];
    }

    if (strlen($status) < 1) {
        return null;
    } else {
        return $status;

    }
}

function get_ws_transmit_id($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TX_WS ";
    $query .= "WHERE dua = '{$dua_number}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    while ($db_var = mysqli_fetch_assoc($admin_set)) {
        $counter = $db_var["counter"];
    }

    if (strlen($counter) < 1) {
        return "001";
    } else {
        return sprintf('%03d', $counter + 1);
    }
}

function get_dua_transmit_id($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TX ";
    $query .= "WHERE dua = '{$dua_number}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    while ($db_var = mysqli_fetch_assoc($admin_set)) {
        $counter = $db_var["counter"];
    }

    if (strlen($counter) < 1) {
        return "001";
    } else {
        return sprintf('%03d', $counter + 1);
    }
}

function get_all_dua_transmit_id($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TX ";
    $query .= "WHERE dua = '{$dua_number}' ";
    $query .= "ORDER BY id DESC ";
    $tx_set = mysqli_query($connection, $query);
    confirm_query($tx_set);

    return $tx_set;
}

function get_all_duca_ws_transmit_id($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TX_WS ";
    $query .= "WHERE dua = '{$dua_number}' ";
    $query .= "ORDER BY id DESC ";
    $tx_set = mysqli_query($connection, $query);
    confirm_query($tx_set);

    return $tx_set;
}

function get_dua_transmit_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TX ";
    $query .= "WHERE id = '{$id}' ";
    $tx_set = mysqli_query($connection, $query);
    confirm_query($tx_set);

    return $tx_set;
}

function get_duca_ws_transmit_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TX_WS ";
    $query .= "WHERE id = '{$id}' ";
    $tx_set = mysqli_query($connection, $query);
    confirm_query($tx_set);

    return $tx_set;
}

function get_asignacion_id_for_user($user_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_servicios ";
    $query .= "WHERE servicio = 'ASIGNACION AUXILIAR' ";
    $query .= "AND user_id = '{$user_id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_service_id_for_user($user_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_servicios ";
    $query .= "WHERE servicio = 'ELABORACION DE DUAS DE IMPORTACION Y EXPORTACION' ";
    $query .= "AND user_id = '{$user_id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_last_actividad()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_actividades ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_full_service($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_completos ";
    $query .= "WHERE id = '{$safe_id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_service_flow_for_type($type)
{
    global $connection;
    $safe_type = mysqli_real_escape_string($connection, $type);
    $query     = "SELECT * ";
    $query .= "FROM servicios_flujo ";
    $query .= "WHERE categoria = '{$safe_type}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_service_flow_by_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM servicios_flujo ";
    $query .= "WHERE id = '{$safe_id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - COSTEO SERVICES
//---------------------------------------------------------------------------------

function get_costeo()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM costeo ";
    $query .= "WHERE status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - USER SERVICES
//---------------------------------------------------------------------------------

function get_user_service($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_servicios ";
    $query .= "WHERE id = '{$safe_id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_user_full_service($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_servicios_completos ";
    $query .= "WHERE id = '{$safe_id}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function get_all_service_categories()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_categorias ";
    $query .= "WHERE estado = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_fondos_categories()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM fondos_categorias ";
    $query .= "WHERE estado = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_correlativos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_some_correlativos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_remaining_corr_for_user_count($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE user_id = '{$id}' ";
    $query .= "AND status = '2' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    $row_cnt = mysqli_num_rows($order_set);

    return $row_cnt;
}

function get_done_corr_for_user_count($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE user_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    $row_cnt = mysqli_num_rows($order_set);

    return $row_cnt;
}

function get_user_correlativos_remaining($user_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE user_id = '{$user_id}' ";
    $query .= "AND status = '2' ";
    $query .= "ORDER BY id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_user_correlativos_done($user_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE user_id = '{$user_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_correlativos_for_exp($user_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE user_id = '{$user_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - USER DOCTOS
//---------------------------------------------------------------------------------

//---------------------------------------------------------------------------------
//        MYSQL - SERVICE DOCTOS
//---------------------------------------------------------------------------------

function get_last_dato_docto()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_datos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_service_doctos($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_detalle ";
    $query .= "WHERE service_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_servicios_complementarios($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_complementarios ";
    $query .= "WHERE id_servicio = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_service_doctos_generar($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_generar_detalle ";
    $query .= "WHERE service_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_doctos_creados()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_creados ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_doctos_impresos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_impresos ";
    $query .= "WHERE status = '1' ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_doctos_impresos_for_exp($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_impresos ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_doctos_gestion_for_exp($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_doctos_gestion ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_doctos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_aduana_doctos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE categoria = 'ADUANA' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_juridico_doctos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE categoria = 'JURIDICO' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_contabilidad_doctos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE categoria = 'CONTABILIDAD' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_transporte_doctos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE categoria = 'TRANSPORTE' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_user_doctos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_usuarios ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_user_doctos_for_user_type($type)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_usuarios ";
    $query .= "WHERE tipo_persona = '{$type}' ";
    $query .= "ORDER BY nombre ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_detail($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_detalle ";
    $query .= "WHERE docto_id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_for_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE codigo = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_asociado_for_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_asociados ";
    $query .= "WHERE nombre = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_generar_for_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_creados ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_for_exp_docto_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_for_codigo($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE codigo = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_docto_for_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_user_docto_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_usuarios ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_user_docto_by_docto_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_doctos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_validar ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_docto($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_validar ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_by_id_exp($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_validar ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_docto_exp($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_validar ";
    $query .= "WHERE docto_id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_datos ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_docto($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_datos ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_docto_by_codigo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_datos ";
    $query .= "WHERE  = '{$codigo}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_docto_por_docto_y_exp($id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_validar ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_docto_por_docto_y_exp($id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - DOCUMENTOS DE USUARIO
//---------------------------------------------------------------------------------

function get_dato_user_docto($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_usuarios_datos ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_user_docto($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_usuarios_validar ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_docto_por_docto_y_user($id, $user_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_doctos_validar ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND user_id = '{$user_id}' ";
    //    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_docto_por_docto_y_user($id, $user_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_doctos_datos ";
    $query .= "WHERE docto_id = '{$id}' ";
    //    $query .= "AND user_id = '{$user_id}' ";
    //    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - DOCUMENTOS ASOCIADOS
//---------------------------------------------------------------------------------

function get_docto_asociado_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_asociados ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_asociado_by_docto($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_datos ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_asociado_by_docto_and_seccion($id, $seccion)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_datos ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND seccion = '{$seccion}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY campo ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_asociado_by_docto_and_seccion_campo($id, $seccion, $campo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_datos ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND seccion = '{$seccion}' ";
    $query .= "AND campo = '{$campo}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_validar_docto_asociado($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_asociados ";
    $query .= "WHERE docto_id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_doctos_asociados()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_asociados ";
    $query .= "WHERE status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_datos_asociados()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_datos ";
    $query .= "WHERE status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_dato_asociado_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_datos ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_last_dato_asociado()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_datos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

//---------------------------------------------------------------------------------
//        MYSQL - TABLAS ASOCIADOS
//---------------------------------------------------------------------------------

function get_tablas_asociadas()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM tablas_asociadas ";
    $query .= "WHERE status = '1' ";
    $query .= "ORDER BY nombre DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_tabla_asociada_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM tablas_asociadas ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - TABLAS ASOCIADOS
//---------------------------------------------------------------------------------

function get_funciones_sistema()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM funciones_sistema ";
    //    $query .= "WHERE status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_funcion_sistema_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM funciones_sistema ";
    $query .= "WHERE id = '{$id}' ";
    //    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - DAI FUNCTIONS
//---------------------------------------------------------------------------------

function dai_search_by_description($search)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $search);
    $query       = "SELECT * ";
    $query .= "FROM sat_dai ";
    $query .= "WHERE descripcion LIKE '%$safe_search%'";
    //    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $products_set = mysqli_query($connection, $query);
    confirm_query($products_set);

    return $products_set;
}

function partida_format_8_inciso($partida)
{
    $indice              = str_replace(".", "", $partida);
    $p_a_r_t_i_d_a       = str_split($indice);
    $partida_arancelaria = $p_a_r_t_i_d_a[0] . $p_a_r_t_i_d_a[1] . $p_a_r_t_i_d_a[2] . $p_a_r_t_i_d_a[3] . $p_a_r_t_i_d_a[4] . $p_a_r_t_i_d_a[5] . $p_a_r_t_i_d_a[6] . $p_a_r_t_i_d_a[7];

    return $partida_arancelaria;
};

function partida_format_8($partida)
{
    $indice              = str_replace(".", "", $partida);
    $p_a_r_t_i_d_a       = str_split($indice);
    $partida_arancelaria = $p_a_r_t_i_d_a[0] . $p_a_r_t_i_d_a[1] . $p_a_r_t_i_d_a[2] . $p_a_r_t_i_d_a[3] . "." . $p_a_r_t_i_d_a[4] . $p_a_r_t_i_d_a[5] . "." . $p_a_r_t_i_d_a[6] . $p_a_r_t_i_d_a[7];

    return $partida_arancelaria;
};

function partida_format_10($partida)
{
    $indice              = str_replace(".", "", $partida);
    $p_a_r_t_i_d_a       = str_split($indice);
    $partida_arancelaria = $p_a_r_t_i_d_a[0] . $p_a_r_t_i_d_a[1] . $p_a_r_t_i_d_a[2] . $p_a_r_t_i_d_a[3] . "." . $p_a_r_t_i_d_a[4] . $p_a_r_t_i_d_a[5] . "." . $p_a_r_t_i_d_a[6] . $p_a_r_t_i_d_a[7] . "." . $p_a_r_t_i_d_a[8] . $p_a_r_t_i_d_a[9];

    return $partida_arancelaria;
};

function partida_format($partida)
{
    $indice              = str_replace(".", "", $partida);
    $p_a_r_t_i_d_a       = str_split($partida);
    $partida_arancelaria = $p_a_r_t_i_d_a[0] . $p_a_r_t_i_d_a[1] . $p_a_r_t_i_d_a[2] . $p_a_r_t_i_d_a[3] . "." . $p_a_r_t_i_d_a[4] . $p_a_r_t_i_d_a[5] . "." . $p_a_r_t_i_d_a[6] . $p_a_r_t_i_d_a[7] . "." . $p_a_r_t_i_d_a[8] . $p_a_r_t_i_d_a[9];

    return $partida_arancelaria;
};

function partida_numeric_format($partida)
{
    $indice = str_replace(".", "", $partida);

    return $indice;
};

function format_index_partida($index)
{
    $indice = str_replace(".", "", $index);
    if (strlen($indice) < 4) {$indice = str_pad($indice, 4, '0', STR_PAD_LEFT);}

    return $indice;
};

function partida_format_index($partida, $index)
{
    $indice = str_replace(".", "", $index);
    if (strlen($indice) < 4) {$indice = str_pad($indice, 4, '0', STR_PAD_LEFT);}
    $i_n_d_i_c_e         = str_split($indice);
    $p_a_r_t_i_d_a       = str_split($partida);
    $partida_arancelaria = $i_n_d_i_c_e[0] . $i_n_d_i_c_e[1] . $i_n_d_i_c_e[2] . $i_n_d_i_c_e[3] . "." . $p_a_r_t_i_d_a[4] . $p_a_r_t_i_d_a[5] . "." . $p_a_r_t_i_d_a[6] . $p_a_r_t_i_d_a[7] . "." . $p_a_r_t_i_d_a[8] . $p_a_r_t_i_d_a[9];

    return $partida_arancelaria;
};

function partida_format_points($partida)
{
    $p_a_r_t_i_d_a       = str_split($partida);
    $partida_arancelaria = $p_a_r_t_i_d_a[0] . $p_a_r_t_i_d_a[1] . $p_a_r_t_i_d_a[2] . $p_a_r_t_i_d_a[3] . "." . $p_a_r_t_i_d_a[4] . $p_a_r_t_i_d_a[5] . "." . $p_a_r_t_i_d_a[6] . $p_a_r_t_i_d_a[7] . "." . $p_a_r_t_i_d_a[8] . $p_a_r_t_i_d_a[9];

    return $partida_arancelaria;
};

function partida_index_title($partida)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_dai ";
    $query .= "WHERE partida LIKE '$partida%'";
    $query .= "LIMIT 1 ";
    $dai_set = mysqli_query($connection, $query);
    confirm_query($dai_set);
    while ($dai_data = mysqli_fetch_assoc($dai_set)) {
        $title = htmlentities($dai_data["descripcion"]);
        break;
    }

    return $title;
}

function dva_estado_mercancia_por_codigo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_estados_mercancias ";
    $query .= "WHERE codigo = '{$codigo}'";
    $query .= "LIMIT 1 ";
    $dai_set = mysqli_query($connection, $query);
    confirm_query($dai_set);
    while ($db_data = mysqli_fetch_assoc($dai_set)) {
        $returnable = "(" . $codigo . ") " . strtoupper($db_data["descripcion"]);
        break;
    }

    return $returnable;
}

function dai_search($search)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_dai ";
    $query .= "WHERE partida LIKE '%$search%' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1 ";
    $dai_set = mysqli_query($connection, $query);
    confirm_query($dai_set);
    while ($dai_data = mysqli_fetch_assoc($dai_set)) {
        $dai = htmlentities($dai_data["arancel"]);
        break;
    }

    return $dai;
}

function find_partida_dai($partida)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_dai ";
    $query .= "WHERE partida = '{$partida}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1 ";
    $dai_set = mysqli_query($connection, $query);
    confirm_query($dai_set);
    while ($dai_data = mysqli_fetch_assoc($dai_set)) {
        $dai = htmlentities($dai_data["arancel"]);
        break;
    }

    return $dai;
}

function dai_index_search($search)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_dai_indice ";
    $query .= "WHERE partida LIKE '%$search%'";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1 ";
    $dai_set = mysqli_query($connection, $query);
    confirm_query($dai_set);

    return $dai_set;
}

function dai_index()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_dai_indice ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1 ";
    $dai_set = mysqli_query($connection, $query);
    confirm_query($dai_set);

    return $dai_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - EXPEDIENTES
//---------------------------------------------------------------------------------

function exp_total_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status <> 0 ";
    //    $query .= "WHERE status = 1 ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function exp_activos_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status = 1 ";
    //    $query .= "WHERE status = 1 ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function exp_finalizados_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status = 2 ";
    //    $query .= "WHERE status = 1 ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

//DINO
function exp_total_count_month()
{
    global $connection;
    $query = "SELECT count(id) as total_expedientes ";
    $query .= "FROM usuarios_expedientes_estados ";
    $query .= "WHERE EXTRACT(MONTH FROM usuarios_expedientes_estados.time) = EXTRACT(MONTH FROM now()) ";
    $query .= "AND EXTRACT(YEAR FROM usuarios_expedientes_estados.time) = EXTRACT(YEAR FROM now())";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $ordenes = htmlentities($ord["total_expedientes"]);
        break;
    }

    return $ordenes;
}

function exp_total_count_last_month()
{
    global $connection;
    $query = "SELECT count(id) as total_expedientes ";
    $query .= "FROM usuarios_expedientes_estados ";
    $query .= "WHERE EXTRACT(MONTH FROM usuarios_expedientes_estados.time) = ";
    $query .= "IF((DATE_SUB(curdate(), INTERVAL 1 MONTH) > 0), ";
    $query .= "EXTRACT(MONTH FROM DATE_SUB(curdate(), INTERVAL 1 MONTH)), 12) ";
    $query .= "AND EXTRACT(YEAR FROM usuarios_expedientes_estados.time) = ";
    $query .= "IF((DATE_SUB(curdate(), INTERVAL 1 MONTH) < 0), ";
    $query .= "EXTRACT(YEAR FROM DATE_SUB(curdate(), INTERVAL 1 YEAR)), ";
    $query .= "EXTRACT(YEAR FROM now()))";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $ordenes = htmlentities($ord["total_expedientes"]);
        break;
    }

    return $ordenes;

}

//=======================================================================
// HANDLES LAST MONTH'S COUNT IF CURRENT MONTH IS JANUARY
//=======================================================================

function exp_total_count_last_december($date)
{
    global $connection;
    $query = "SELECT count(id) as total_expedientes ";
    $query .= "FROM usuarios_expedientes_estados ";
    $query .= "WHERE time LIKE '{$date}' ";

    //  echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $ordenes = htmlentities($ord["total_expedientes"]);
        //   echo '<script type="text/javascript">alert("' . $ordenes . '")</script>';
        break;
    }

    return $ordenes;

}

//=======================================================================

function exp_total_sede_count($sede)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE sede = '{$sede}' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function get_user_name_by_id($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    while ($ord = mysqli_fetch_assoc($set)) {
        $user_name = htmlentities($ord["empresa"]);
        break;
    }

    return $user_name;
}

function get_user_condicion_by_id($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    while ($ord = mysqli_fetch_assoc($set)) {
        $user_name = htmlentities($ord["condicion_comercial"]);
        break;
    }

    return $user_name;
}

function get_correlativo_var_by_user_id($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    while ($ord = mysqli_fetch_assoc($set)) {
        $var_Data = htmlentities($ord["correlativo"]);
        break;
    }

    return $var_Data;
}

function get_last_expediente()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_recent_expedientes()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status <> 0 ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 10";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_month_expedientes($date)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status <> 0 ";
    $query .= "AND created_on LIKE '$date%' ";
    $query .= "ORDER BY id DESC ";
    //   $query .= "LIMIT 10";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_recent_active_expedientes()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status = 1 ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 6";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_active_expedientes()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE status <> 0 ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 6";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exps_for_admin_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM expedientes_admins ";
    $query .= "WHERE admin_id = '{$id}' ";
    $query .= "ORDER BY id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_admins_for_exp_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM expedientes_admins ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "ORDER BY rank ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_user_for_exp_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $user_id = htmlentities($ord["user_id"]);
        break;
    }

    return $user_id;
}

function get_location_for_exp_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $user_id = htmlentities($ord["lugar_fisico"]);
        break;
    }

    return $user_id;
}

function get_admins_for_exp_by_id_and_rank($id, $rank)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM expedientes_admins ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "AND rank = '{$rank}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_by_sede_id($sede, $id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$id}' ";
    //   $query .= "AND sede = '{$sede}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_doctos($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_facturas($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND docto_id = '380' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_facturas_order_by_proveedor($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_DOCUMENTOS_SOPORTE ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND TIPO_DOCUMENTO = '380' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY proveedor_id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_facturas_for_proveedor($exp_id, $proveedor_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_DOCUMENTOS_SOPORTE ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND proveedor_id = '{$proveedor_id}' ";
    $query .= "AND TIPO_DOCUMENTO = '380' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY proveedor_id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_distinct_proveedor_for_exp_id($exp_id)
{
    global $connection;
    $query = "SELECT DISTINCT proveedor_id ";
    $query .= "FROM DUA_DOCUMENTOS_SOPORTE ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND TIPO_DOCUMENTO = '380' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function uses_duca_resumida($exp_id)
{
    $returnable = 0;
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_DOCUMENTOS_SOPORTE ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND TIPO_DOCUMENTO = '301' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = 1;
        break;
    }

    return $returnable;
}

function get_last_exp_docto()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_exp_docto_by_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_services($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_servicios ";
    $query .= "WHERE exp_id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_for_user($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE user_id = '{$id}' ";
    $query .= "AND status <> '0' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_for_user_dec($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE user_id = '{$id}' ";
    $query .= "AND status <> '0' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_for_user_count($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE user_id = '{$id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    $row_cnt = mysqli_num_rows($order_set);

    return $row_cnt;
}

function get_active_exp_for_user_count($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE user_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    $row_cnt = mysqli_num_rows($order_set);

    return $row_cnt;
}

function get_active_exp_for_user($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE user_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_closed_exp_for_user($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE user_id = '{$id}' ";
    $query .= "AND status = '2' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_status($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_estados ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_exp_by_id_and_date($date, $type)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE date_created LIKE '$date%' ";
    $query .= "AND tipopago LIKE '$type' ";
    $query .= "AND estado = 'Cancelada' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_exp_last_status($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_estados ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - AGENTES ADUANEROS
//---------------------------------------------------------------------------------

function get_agentes_aduaneros()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE status = '1' ";
//        $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - BITACORA EXPEDIENTES
//---------------------------------------------------------------------------------

function get_exp_bitacora($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM expedientes_bitacora ";
    $query .= "WHERE exp_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function notificaciones_for_flow_and_id_count($id, $flow)
{

    global $connection;

    $query = "SELECT * ";
    $query .= "FROM notificaciones ";
    $query .= "WHERE flow =  '{$flow}' ";
    if ($flow == 0) {
        $query .= "AND  user_id=  '{$id}'  ";
    } else if ($flow == 1) {
        $query .= "AND  admin_id=  '{$id}'  ";
    }
    $query .= "AND status = 1 ";

    $notificacion = mysqli_query($connection, $query);
    confirm_query($notificacion);
    $row_cnt = mysqli_num_rows($notificacion);

    return $row_cnt;

}

function notificaciones_for_flow_and_id($id, $flow)
{

    global $connection;

    $query = "SELECT * ";
    $query .= "FROM notificaciones ";
    $query .= "WHERE flow =  '{$flow}' ";
    if ($flow == 0) {
        $query .= "AND  user_id=  '{$id}'  ";
    } else if ($flow == 1) {
        $query .= "AND  admin_id=  '{$id}'  ";
    }
    $query .= "AND status = 1 ";
    $query .= "ORDER BY id DESC ";

    $notificacion = mysqli_query($connection, $query);
    confirm_query($notificacion);

    return $notificacion;

}

//---------------------------------------------------------------------------------
//        MYSQL - ADUANAS SAT
//---------------------------------------------------------------------------------

function get_empresas()
{
    global $connection;
    //    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query = "SELECT * ";
    $query .= "FROM empresas ";
    //    $query .= "AND estado = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_all_aduanas()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_aduanas ";
    $query .= "WHERE estado = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_all_sedes()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sedes ";
    $query .= "WHERE estado = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - USER FUNCTIONS
//---------------------------------------------------------------------------------

function users_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE status = 1 ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;
}

function potential_users_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE status = 2 ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function get_user($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_user_clients($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios_clientes ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "AND estado = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_all_user_contacts()
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios_contactos ";
    $query .= "WHERE status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_user_contacts($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios_contactos ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_user_contacts_by_contact_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_contactos ";
    $query .= "WHERE id = {$safe_id} ";
    //    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_user_client_by_client_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM usuarios_clientes ";
    $query .= "WHERE id = {$safe_id} ";
    //    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_user_doctos($user_id)
{
    //modificado por DSCA para que tampoco muestre documentos_asociados
    //que han sobrepasado la fecha de expiración
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios_doctos ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "AND DATEDIFF(fecha_vencimiento, now()) > 0 ";
    $query .= "AND estado  <> '0' ";
    $query .= "ORDER BY nombre";
//        $query .= "OR estado = '3' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_docto_id()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_doctos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_user_addresses($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios_direcciones ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

function get_user_social($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM usuarios_redes ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "AND status = '1' ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);

    return $set;
}

//---------------------------------------------------------------------------------
//        MYSQL - SERVICIOS GLOBALES
//---------------------------------------------------------------------------------

//---------------------------------------------------------------------------------
//        MYSQL - FLETES
//---------------------------------------------------------------------------------

function get_all_fletes()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM fletes ";
    $query .= "WHERE status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_flete_for_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM fletes ";
    $query .= "WHERE flete_id = '{$safe_id}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - CIERRES
//---------------------------------------------------------------------------------

function paged_cierre($start_from, $howmany)
{
    global $connection;
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $safe_many  = mysqli_real_escape_string($connection, $howmany);
    $query      = "SELECT * ";
    $query .= "FROM resultados ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT {$start_from}, {$safe_many}";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_cierre_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM resultados ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function cierre_dia()
{
    global $connection;
    $safe_user_name = mysqli_real_escape_string($connection, $user_name);
    $query          = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE name = '{$safe_user_name}' ";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

function find_orders_by_day($date)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE date_created LIKE '$date%'";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_orders_by_current_month($date)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE date_created LIKE '$date%'";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_orders_by_current_week($start, $finish)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE date_created BETWEEN '$start' AND '$finish'";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - NAMES FIND FUNCTIONS
//---------------------------------------------------------------------------------

function all_productnames()
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT name ";
    $query .= "FROM prices ";
    $query .= "WHERE status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - PRODUCTS FUNCTIONS
//---------------------------------------------------------------------------------

function get_all_products()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM prices ";
    $query .= "WHERE status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_product_by_name($name)
{
    global $connection;
    $safe_name = mysqli_real_escape_string($connection, $name);
    $query     = "SELECT * ";
    $query .= "FROM prices ";
    $query .= "WHERE name = '{$safe_name}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_product_for_id($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM prices ";
    $query .= "WHERE product_id = '{$safe_id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - QUOTES
//---------------------------------------------------------------------------------

function get_invoice_id()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM cotizacion ";
    $query .= "ORDER BY cotization_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $id = htmlentities($ord["cotization_id"]);
        break;
    }

    return $id;
}

function get_invoice_for_user($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM cotizaciones ";
    $query .= "WHERE user_id = '{$safe_id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_invoices()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM cotizaciones ";
    $query .= "WHERE status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_quote_for_user($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT * ";
    $query .= "FROM cotizaciones ";
    $query .= "WHERE user_id = '{$safe_id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - USER FIND FUNCTIONS
//---------------------------------------------------------------------------------

function find_id_by_name($user_name)
{
    global $connection;
    $safe_user_name = mysqli_real_escape_string($connection, $user_name);
    $query          = "SELECT * ";
    $query .= "FROM clients ";
    $query .= "WHERE name = '{$safe_user_name}' ";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

function find_parent_by_id($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    //$query .= "ORDER BY order_id ASC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function parent_id($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    //$query .= "ORDER BY order_id ASC";
    $parent_set = mysqli_query($connection, $query);
    confirm_query($parent_set);
    while ($parid = mysqli_fetch_assoc($parent_set)) {
        $name = htmlspecialchars($parid["name"]);
    }

    return $name;
}

function find_id_for_parent($user_name)
{
    global $connection;
    $safe_user_name = mysqli_real_escape_string($connection, $user_name);
    $query          = "SELECT *";
    $query .= "FROM users ";
    $query .= "WHERE name = '{$safe_user_name}' ";
    $patient_set = mysqli_query($connection, $query);
    confirm_query($patient_set);
    while ($patid = mysqli_fetch_assoc($patient_set)) {
        $parentId = htmlentities($patid["user_id"]);
    }

    return $parentId;
}

function find_user_by_id($user_id)
{
    global $connection;

    $safe_user_id = mysqli_real_escape_string($connection, $user_id);

    $query = "SELECT * ";
    $query .= "FROM clients ";
    $query .= "WHERE client_id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;

}

function all_users()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "ORDER BY user_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function paged_users($start_from, $howmany)
{
    global $connection;
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $safe_many  = mysqli_real_escape_string($connection, $howmany);
    $query      = "SELECT * ";
    $query .= "FROM users ";
    $query .= "ORDER BY user_id DESC ";
    $query .= "LIMIT {$start_from}, {$safe_many}";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_users_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM users ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

//---------------------------------------------------------------------------------
//        MYSQL - ORDERS FIND FUNCTIONS
//---------------------------------------------------------------------------------

function get_order_id()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "ORDER BY order_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["order_id"]);
        break;
    }

    return $orderid;
}

function find_orders_for_user($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY order_id ASC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_user_for_order($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT user_id ";
    $query .= "FROM orders ";
    $query .= "WHERE order_id = {$safe_id} ";
    $query .= "ORDER BY order_id ASC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_coti_for_user($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    $query .= "AND status = '2' ";
    $query .= "ORDER BY order_id ASC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_orders_for_patient($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE patient_id = {$safe_user_id} ";
    $query .= "ORDER BY order_id DESC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_last_week_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE date_created >= UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ";
//        $query .= "AND date_created < UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY) ";
    $query .= "ORDER BY order_id DESC ";
    //$query .= "LIMIT 8 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_orders_between($begin, $finish)
{
    global $connection;
    $from  = UNIX_TIMESTAMP($begin);
    $to    = UNIX_TIMESTAMP($finish);
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE date_created >= UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ";
//        $query .= "AND date_created < UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY) ";
    $query .= "ORDER BY order_id DESC ";
    //$query .= "LIMIT 8 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function recent_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "ORDER BY order_id DESC ";
    $query .= "LIMIT 4";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function activa_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Activa' ";
    $query .= "ORDER BY order_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function paged_canceladas($start_from, $howmany)
{
    global $connection;
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $safe_many  = mysqli_real_escape_string($connection, $howmany);
    $query      = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Cancelada' ";
    $query .= "ORDER BY order_id DESC ";
    $query .= "LIMIT {$start_from}, {$safe_many}";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_canceladas_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Cancelada' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function cancelada_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Cancelada' ";
    $query .= "ORDER BY order_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function paged_anuladas($start_from, $howmany)
{
    global $connection;
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $safe_many  = mysqli_real_escape_string($connection, $howmany);
    $query      = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Anulada' ";
    $query .= "ORDER BY order_id DESC ";
    $query .= "LIMIT {$start_from}, {$safe_many}";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_anuladas_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Anulada' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function anulada_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Anulada' ";
    $query .= "ORDER BY order_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function pendiente_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado = 'Pendiente' ";
    $query .= "ORDER BY order_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function pendiente_pago_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE estado <> 'Cancelada' ";
    $query .= "AND estado <> 'Anulada' ";
    $query .= "ORDER BY order_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function recent_20orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "ORDER BY order_id DESC ";
    $query .= "LIMIT 20";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function all_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "ORDER BY order_id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function paged_orders_count_for()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM resultados ";
    $query .= "WHERE doctor = 'Christian Farrington' ";
    $query .= "AND aprovado = '1' ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function paged_orders_for($user, $start_from, $howmany)
{
    global $connection;
    $safe_user  = mysqli_real_escape_string($connection, $user);
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $safe_many  = mysqli_real_escape_string($connection, $howmany);
    $query      = "SELECT * ";
    $query .= "FROM resultados ";
    $query .= "WHERE doctor = '{$safe_user}' ";
    $query .= "AND aprovado = '1' ";
    $query .= "ORDER BY order_id DESC ";
    $query .= "LIMIT {$start_from}, {$safe_many}";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_orders($start_from, $howmany)
{
    global $connection;
    $safe_start = mysqli_real_escape_string($connection, $start_from);
    $safe_many  = mysqli_real_escape_string($connection, $howmany);
    $query      = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "ORDER BY order_id DESC ";
    $query .= "LIMIT {$start_from}, {$safe_many}";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);

    return $package_set;
}

function paged_orders_count()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;

}

function find_order_by_id($order_id)
{
    global $connection;
    $safe_order_id = mysqli_real_escape_string($connection, $order_id);
    //    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "WHERE  order_id = {$safe_order_id} ";
    //    $query .= "AND user_id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_orders()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM orders ";
    $query .= "ORDER BY order_id ASC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//        MYSQL - ACCOUNT FIND FUNCTIONS
//---------------------------------------------------------------------------------

function find_all_admins()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE status = '1' ";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    return $admin_set;
}

function find_all_correlativos_users()
{

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE correlativo = '1' ";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    return $admin_set;
}

function find_all_admins_for_sede($sede)
{

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE sede = '{$sede}' ";
    $query .= "AND status = '1' ";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    return $admin_set;
}

function find_all_gestores_for_sede($sede)
{

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE sede = '{$sede}' ";
    $query .= "AND rank = 'Gestor' ";
    $query .= "AND status = '1' ";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    return $admin_set;
}

function find_supervisores()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE status = '1' ";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    return $admin_set;
}

function find_users_juridico()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE status = '1' ";
    $query .= "AND role LIKE '%juridico%' ";
    //    $query .= "AND rank = 'Coordinador' ";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);

    return $admin_set;
}

function get_admin_by_id($admin_id)
{
    global $connection;
    $safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
    $query         = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE id = {$safe_admin_id} ";
    //$query .= "ORDER BY order_id ASC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function find_all_users()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "ORDER BY username ASC";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

function get_user_info($user_id)
{
    global $connection;
    $safe_user_id = mysqli_real_escape_string($connection, $user_id);
    $query        = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE user_id = {$safe_user_id} ";
    //$query .= "ORDER BY order_id ASC";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

//---------------------------------------------------------------------------------
//                        ACCOUNT FUNCTIONS
//---------------------------------------------------------------------------------

function find_user_name_by_id($id)
{
    global $connection;

    $safe_id = mysqli_real_escape_string($connection, $id);

    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE id = '{$safe_id}' ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    while ($order = mysqli_fetch_assoc($admin_set)) {

        $admin = htmlspecialchars(($order["empresa"]));

    }

    return $admin;
}

function find_admin_name_by_id($id)
{
    global $connection;

    $safe_id = mysqli_real_escape_string($connection, $id);

    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE id = '{$safe_id}' ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    while ($order = mysqli_fetch_assoc($admin_set)) {
        $admin_name = htmlspecialchars(($order["firstname"]));
        $admin_last = htmlspecialchars(($order["lastname"]));
        $admin      = $admin_name . " " . $admin_last;
    }

    return $admin;
}

function find_admin_email_by_id($id)
{
    global $connection;

    $safe_id = mysqli_real_escape_string($connection, $id);

    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE id = '{$safe_id}' ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    while ($order = mysqli_fetch_assoc($admin_set)) {
        $email_admin = htmlspecialchars(($order["username"]));
    }

    return $email_admin;
}

function find_admin_by_username($username)
{
    global $connection;

    $safe_username = mysqli_real_escape_string($connection, $username);

    $query = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE username = '{$safe_username}' ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    if ($admin = mysqli_fetch_assoc($admin_set)) {
        return $admin;
    } else {
        return null;
    }
}

function find_user_by_username($username)
{
    global $connection;

    $safe_username = mysqli_real_escape_string($connection, $username);

    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE correo = '{$safe_username}' ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);
    if ($user = mysqli_fetch_assoc($user_set)) {
        return $user;
    } else {
        return null;
    }
}

function find_user_by_name($username)
{
    global $connection;
    $safe_username = mysqli_real_escape_string($connection, $username);
    $query         = "SELECT * ";
    $query .= "FROM clients ";
    $query .= "WHERE name = '{$username}' ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    return $user_set;
}

//---------------------------------------------------------------------------------
//        XML & STRING FUNCTIONS
//---------------------------------------------------------------------------------

function formatXmlString($xml)
{
    $xml     = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
    $token   = strtok($xml, "\n");
    $result  = '';
    $pad     = 0;
    $matches = [];
    while ($token !== false):
        if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)):
            $indent = 0;
        elseif (preg_match('/^<\/\w/', $token, $matches)):
            $pad--;
            $indent = 0;
        elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)):
            $indent = 1;
        else:
            $indent = 0;
        endif;
        $line = str_pad($token, strlen($token) + $pad, ' ', STR_PAD_LEFT);
        $result .= $line . "\n";
        $token = strtok("\n");
        $pad += $indent;
    endwhile;

    return $result;
}

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini    = strpos($string, $start);
    if ($ini == 0) {
        return '';
    }

    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;

    return substr($string, $ini, $len);
}

function getStringBetween($str, $from, $to)
{
    $sub = substr($str, strpos($str, $from) + strlen($from), strlen($str));

    return substr($sub, 0, strpos($sub, $to));
}

/*
$fullstring = 'this is my [tag]dog[/tag]';
$parsed = get_string_between($fullstring, '[tag]', '[/tag]');

echo $parsed; // (result = dog)
 */

//---------------------------------------------------------------------------------
//                        UNIQUE TOKEN FUNCTIONS
//---------------------------------------------------------------------------------

function token_encrypt($token)
{
    $hash_format     = "$2y$10$"; // Tells PHP to use Blowfish with a "cost" of 10
    $salt_length     = 22; // Blowfish salts should be 22-characters or more
    $salt            = generate_salt($salt_length);
    $format_and_salt = $hash_format . $salt;
    $hash            = crypt($password, $format_and_salt);

    return $hash;
}

//---------------------------------------------------------------------------------
//                        LOGIN FUNCTIONS
//---------------------------------------------------------------------------------

function password_encrypt($password)
{
    $hash_format     = "$2y$10$"; // Tells PHP to use Blowfish with a "cost" of 10
    $salt_length     = 22; // Blowfish salts should be 22-characters or more
    $salt            = generate_salt($salt_length);
    $format_and_salt = $hash_format . $salt;
    $hash            = crypt($password, $format_and_salt);

    return $hash;
}

function generate_salt($length)
{
    // Not 100% unique, not 100% random, but good enough for a salt
    // MD5 returns 32 characters
    $unique_random_string = md5(uniqid(mt_rand(), true));

    // Valid characters for a salt are [a-zA-Z0-9./]
    $base64_string = base64_encode($unique_random_string);

    // But not '+' which is valid in base64 encoding
    $modified_base64_string = str_replace('+', '.', $base64_string);

    // Truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);

    return $salt;
}

function password_check($password, $existing_hash)
{
    // existing hash contains format and salt at start
    $hash = crypt($password, $existing_hash);
    if ($hash === $existing_hash) {
        return true;
    } else {
        return false;
    }
}

function attempt_login($username, $password)
{
    $admin = find_admin_by_username($username);
    if ($admin) {
        // found admin, now check password
        if (password_check($password, $admin["hashed_password"])) {
            // password matches
            return $admin;
        } else {
            // password does not match
            return false;
        }
    } else {
        // admin not found
        return false;
    }
}

function attempt_user_login($username, $password)
{
    $user = find_user_by_username($username);
    if ($user) {
        // found user, now check password
        if (password_check($password, $user["hashed_password"])) {
            // password matches
            return $user;
        } else {
            // password does not match
            return false;
        }
    } else {
        // admin not found
        return false;
    }
}

function adm_logged_in()
{
    if ($_SESSION['rank'] == "adm") {
        return true;
    } else {
        return false;
    }
}

function admin_logged_in()
{
    return isset($_SESSION['admin_id']);
}

function logged_in()
{
    return isset($_SESSION['user_id']);
}

function confirm_admin_logged_in()
{
    if (!adm_logged_in()) {
        redirect_to("login.php");
    }
}

function confirm_logged_in()
{
    if (!admin_logged_in()) {
        redirect_to("login.php");
    }
}

function confirm_user_logged_in()
{
    if (!logged_in()) {
        redirect_to("user-login.php");
    }
}

// -------------------------------------------------------------------
//    FORM CREATOR FOR ASSOC DOCS
// -------------------------------------------------------------------

function get_input_field($fuente_dato, $id_fuente, $campo, $detalle, $valor, $tipo_dato, $option_value, $option_description, $id_dato, $exp_id, $nit, $dua_number, $placeholder)
{
    // fuente dato     = ingreso manual, de tabla, documento o funcion
    // id_fuente         =    source id
    // campo                =

    $input_name = str_replace(".", "", $campo);

    switch ($fuente_dato) {

        // ingreso manual
        case "manual":
            // $input = "<input type=\"$tipo_dato\"class=\"form-control\"  name=\"$input_name\" placeholder=\"$detalle\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\"  value=\"$valor\" />";

            $input = "<input type=\"$tipo_dato\"class=\"form-control\"  name=\"$input_name\" placeholder=\"$detalle\" style=\"width:100%; height:35px\"  value=\"$valor\"/>";
            break;

        // seleccion de tablas
        case "tablas_asociadas":

            if (strlen($valor) < 1) {$valor = $placeholder;}

            $input = "<select class=\"form-control\" id=\"$campo\" name=\"$input_name\" style=\"width:100%; height:35px\">	";

            $input .= "<option value=\"\"> NA </option>";
            $fuente_detail = get_table_by_db_name($id_fuente);
            while ($order = mysqli_fetch_assoc($fuente_detail)) {
                $op_val         = $order["$option_value"];
                $op_description = $order["$option_description"];

                if ($valor == $op_val) {
                    $selected_var = "selected";
                } else {
                    $selected_var = "";
                }

                $input .= "<option value=\"$op_val\" ";
                $input .= $selected_var;
                $input .= ">";
                $input .= $op_val;
                $input .= " (" . $op_description . ")";
                $input .= "</option>";
            }

            $input .= "<option value=\"\"> NA </option>";

            $input .= "</select>";
            break;

        // documento servicio
        case "servicios_doctos":
            $value_field = get_value_for_doc_field($id_fuente, $option_value, $exp_id);
            $input       = "<input type=\"text\" name=\"$input_name\" class=\"form-control\" placeholder=\"$option_value\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\" value=\"$value_field\" /><br>";

            break;

        // funcion de sistema
        case "funciones_sistema":
            eval('$value_field=' . $id_fuente);
            $input = "<input type=\"text\" name=\"$input_name\" class=\"form-control\" placeholder=\"$campo\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\" value=\"$value_field\" /><br>";

            break;

    }

    return $input;

}

function get_input_field_function($fuente_dato, $id_fuente, $campo, $detalle, $valor, $tipo_dato, $option_value, $option_description, $id_dato, $exp_id, $nit, $dua_number, $placeholder, $placeholder_function)
{
    // fuente dato     = ingreso manual, de tabla, documento o funcion
    // id_fuente         =    source id
    // campo                =

    $input_name = str_replace(".", "", $campo);

    switch ($fuente_dato) {

        // ingreso manual
        case "manual":
            // $input = "<input type=\"$tipo_dato\"class=\"form-control\"  name=\"$input_name\" placeholder=\"$detalle\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\"  value=\"$valor\" />";

            $input = "<input type=\"$tipo_dato\"class=\"form-control\"  name=\"$input_name\" placeholder=\"$detalle\" style=\"width:100%; height:35px\"  value=\"$valor\"/>";
            break;

        // seleccion de tablas
        case "tablas_asociadas":

            if (strlen($valor) < 1) {$valor = $placeholder;}

            if (strlen($placeholder_function) < 1) {
                $valor = $placeholder_function;
            }

            $input = "<select class=\"form-control\" id=\"$campo\" name=\"$input_name\" style=\"width:100%; height:35px\">  ";

            $input .= "<option value=\"\"> NA </option>";
            $fuente_detail = get_table_by_db_name($id_fuente);
            while ($order = mysqli_fetch_assoc($fuente_detail)) {
                $op_val         = $order["$option_value"];
                $op_description = $order["$option_description"];

                if ($valor == $op_val) {
                    $selected_var = "selected";
                } else {
                    $selected_var = "";
                }

                $input .= "<option value=\"$op_val\" ";
                $input .= $selected_var;
                $input .= ">";
                $input .= $op_val;
                $input .= " (" . $op_description . ")";
                $input .= "</option>";
            }

            $input .= "<option value=\"\"> NA </option>";

            $input .= "</select>";
            break;

        // documento servicio
        case "servicios_doctos":
            $value_field = get_value_for_doc_field($id_fuente, $option_value, $exp_id);
            $input       = "<input type=\"text\" name=\"$input_name\" class=\"form-control\" placeholder=\"$option_value\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\" value=\"$value_field\" /><br>";

            break;

        // funcion de sistema
        case "funciones_sistema":
            eval('$value_field=' . $id_fuente);
            $input = "<input type=\"text\" name=\"$input_name\" class=\"form-control\" placeholder=\"$campo\" data-content=\"$detalle\" data-trigger=\"hover\" data-toggle=\"popover\" style=\"width:100%; height:35px\" value=\"$value_field\" /><br>";

            break;

    }

    return $input;

}

// -------------------------------------------------------------------
//    CORRELATIVOS FUNCTIONS
// -------------------------------------------------------------------

function check_if_dua_exits_for_service($service_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos_generar_detalle ";
    $query .= "WHERE service_id = '{$service_id}' ";
    $query .= "AND docto_id = 'DUA' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    if ($dua = mysqli_fetch_assoc($order_set)) {
        return 1;
    } else {
        return 0;
    }
}

// -------------------------------------------------------------------
//    DUA SYSTEM FUNCTIONS
// -------------------------------------------------------------------

function get_grupo_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["CODIGO_REGIMEN"]);
        break;
    }
    $returnable_array = (explode("-", $returnable_data));

    return $returnable_array[0];
}

function get_modalidad_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["CODIGO_REGIMEN"]);
        break;
    }
    $returnable_array = (explode("-", $returnable_data));

    return $returnable_array[1];
}

function check_correlativo_for_exp($exp_id)
{
    // get agente for exp
    $agente_exp = get_agente_for_exp($exp_id);

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
//  $query .= "LIMIT 1 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($var = mysqli_fetch_assoc($order_set)) {
        $dua_number = $var["correlativo"];
    }

    if ($dua_number > 1) {
        return $agente_exp . $dua_number;
    } else {
        $last_corr = get_last_correlativo_for_agent($agente_exp);
        $new_corr  = $last_corr + 1;
        $admin_id  = $_SESSION["admin_id"];
        $status    = 1;
        $estado    = "TX";

        $query = "INSERT INTO DUA_CORRELATIVO (";
        $query .= "  agente, correlativo, exp_id, user_id, status";
        $query .= ") VALUES (";
        $query .= "  '{$agente_exp}', '{$new_corr}', '{$exp_id}', '{$admin_id}', '{$status}' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        // DATE UPDATE
        $date_updated = date("Y-m-d H:i:s");

        // $query = "INSERT INTO DUA_LOG (";
        // $query .= "  NUMERO_ORDEN, exp_id, admin_id, seccion, date_updated ";
        // $query .= ") VALUES (";
        // $query .= " '{$dua_number}', '{$exp_id}', '{$_SESSION['admin_id']}', '{$estado}', '{$date_updated}' ";
        // $query .= ")";
        // $result = mysqli_query($connection, $query);

        return $agente_exp . $new_corr;
    }
}

function check_dua_number_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_NUMERO_ORDEN ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
//  $query .= "LIMIT 1 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($var = mysqli_fetch_assoc($order_set)) {
        $dua_number = $var["NUMERO_ORDEN"];
        break;
    }

    if ($dua_number > 1) {
        return $dua_number;
    } else {
        $agente_exp   = get_agente_for_exp($exp_id);
        $last_dua     = get_last_dua_number_for_agent($agente_exp);
        $dua_trail    = $last_dua + 1;
        $dua_number   = $agente_exp . substr($dua_trail, 3);
        $order_number = substr($dua_trail, 3);
        $admin_id     = $_SESSION["admin_id"];
        $estado       = "A";
        $status       = 1;

        $query = "INSERT INTO DUA_NUMERO_ORDEN (";
        $query .= "  NUMERO_ORDEN, exp_id, admin_id, estado, status";
        $query .= ") VALUES (";
        $query .= "  '{$dua_number}', '{$exp_id}', '{$admin_id}', '{$estado}', '{$status}' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        // NO ASIGNAR CORRELATIVO HASTA TRANSMISION DEFINITIVA

        // $query = "INSERT INTO DUA_CORRELATIVO (";
        // $query .= "  agente, correlativo, exp_id, admin_id, status";
        // $query .= ") VALUES (";
        // $query .= "  '{$agente_exp}', '{$order_number}', '{$exp_id}', '{$admin_id}', '{$status}' ";
        // $query .= ")";
        // $result = mysqli_query($connection, $query);

        $query = "INSERT INTO DUA_POLIZA (";
        $query .= "  NUMERO_ORDEN, exp_id,status";
        $query .= ") VALUES (";
        $query .= "  '{$dua_number}', '{$exp_id}', '{$status}' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        // DATE UPDATE
        $date_updated = date("Y-m-d H:i:s");

        $query = "INSERT INTO DUA_LOG (";
        $query .= "  NUMERO_ORDEN, exp_id, admin_id, seccion, date_updated ";
        $query .= ") VALUES (";
        $query .= " '{$dua_number}', '{$exp_id}', '{$_SESSION['admin_id']}', '{$estado}', '{$date_updated}' ";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        $new_dua = get_last_dua_number_for_agent($agente_exp);

        return $new_dua;
    }
}

function get_dua_number_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_NUMERO_ORDEN ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["NUMERO_ORDEN"]);
        break;
    }

    return $returnable_data;
}

function get_last_dua_number()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_NUMERO_ORDEN ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["NUMERO_ORDEN"]);
        break;
    }

    return $returnable_data;
}

function get_last_dua_number_for_agent($agent)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_NUMERO_ORDEN ";
    $query .= "WHERE NUMERO_ORDEN LIKE '$agent%' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["NUMERO_ORDEN"]);
        break;
    }

    return $returnable_data;
}

function get_correlativo_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE exp_id = '{$exp_id}'  ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["correlativo"]);
        break;
    }

    return $returnable_data;
}

function get_last_correlativo_for_agent($agent)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CORRELATIVO ";
    $query .= "WHERE agente = '{$agent}'  ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["correlativo"]);
        break;
    }

    return $returnable_data;
}

function get_agente_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    //    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["agente"]);
        break;
    }

    return $returnable_data;
}

function numero_orden_dua($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id LIKE '%$exp_id%' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["id"]);
        break;
    }
    //    return $returnable_data;

    return "3048500000";
}

function numero_dua($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id LIKE '%$exp_id%'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["id"]);
        break;
    }
    $numero_dua = "GTSTCST-" . sprintf('%08d', $returnable_data);

    return $numero_dua;
    /* return "304-7521644";  */
}

function get_user_name_for_dua($nit)
{

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit = '$nit' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["razon"]);
        break;
    }

    if ($returnable_data == null) {
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit = '$nit' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["razon"]);
            break;
        }
    }

    return $returnable_data;
}

function get_telefono_importador_for_dua($nit)
{

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit = '$nit' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["telefono"]);
        break;
    }

    if ($returnable_data == null) {
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit = '$nit' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["telefono"]);
            break;
        }
    }

    return $returnable_data;
}

function get_fax_importador_for_dua($nit)
{

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit = '$nit' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["fax"]);
        break;
    }

    if ($returnable_data == null) {
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit = '$nit' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["fax"]);
            break;
        }
    }

    return $returnable_data;
}

function get_correo_importador_for_dua($nit)
{

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit = '$nit' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["correo"]);
        break;
    }

    if ($returnable_data == null) {
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit = '$nit' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["correo"]);
            break;
        }
    }

    return $returnable_data;
}

function get_user_domicilio_fiscal($nit)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit LIKE '%$nit%' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["domicilio"]);
        break;
    }

    if ($returnable_data == null) {
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit LIKE '%$nit%' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["domicilio"]);
            break;
        }
    }

    return $returnable_data;
}

function get_user_condicion_comercial($nit)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit LIKE '%$nit%'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["condicion_comercial"]);
        break;
    }
    if ($returnable_data == null) {
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit LIKE '%$nit%' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["condicion_comercial"]);
            break;
        }
    }

    return $returnable_data;
}

function get_user_city($nit)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit LIKE '%$nit%'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["ciudad"]);
        break;
    }
    if ($returnable_data == null) {
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit LIKE '%$nit%' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["ciudad"]);
            break;
        }
    }

    return $returnable_data;
}

function get_bl_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE exp_id = '{$exp_id}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["ciudad"]);
        break;
    }

    return $returnable_data;
}

function get_service_docto_codigo_for_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM servicios_doctos ";
    $query .= "WHERE id = '{$id}' ";
    //    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["codigo"]);
        break;
    }

    return $returnable_data;
}

function get_exp_docto_for_id_for_codigo($exp_id, $codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE docto_id = '{$codigo}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["id"]);
        break;
    }

    return $returnable_data;
}

function get_value_for_doc_field($doc_id, $doc_field, $exp_id)
{

    $service_docto_codigo = get_service_docto_codigo_for_id($doc_id);
    $exp_docto_id         = get_exp_docto_for_id_for_codigo($exp_id, $service_docto_codigo);

    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre LIKE '%$doc_field%' ";
    $query .= "AND docto_id = {$exp_docto_id} ";
    $query .= "AND exp_id = {$exp_id} ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["valor"]);
        break;
    }

    return $returnable_data;

}

function get_user_id_type()
{
    return "ARE";
}

function get_user_nit($nit)
{
    return $nit;
}

function get_manifiesto($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'NUMERO DE MANIFIESTO' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_documento_embarque($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'NUMERO DE DOCUMENTO DE EMBARQUE' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_documento_transporte($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'NUMERO DE DOCUMENTO DE TRANSPORTE' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_incoterm_factura($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'INCOTERM' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_cantidad_items_factura_id($docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'CANTIDAD DE ITEMS' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_pais_emision_factura_id($docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'PAIS DE EMISIÓN' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_incoterm_factura_id($docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'INCOTERM' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_dua_transportistas_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TRANSPORTISTAS ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    //    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_dua_conductores_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_CONDUCTORES ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_equipamientos_for_duca($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUCA_EQUIPAMIENTOS ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_pais_exportacion($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'CODIGO DE PAIS DE LUGAR DE EMBARQUE' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_fecha_exportacion($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'FECHA DE DOCUMENTO DE TRANSPORTE' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_pais_destino($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'LUGAR DE DESTINO' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_pais_procedencia($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'CODIGO DE PAIS DE LUGAR DE EMBARQUE' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_codigo_de_moneda($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'MONEDA DE FACTURA' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_frequent_puertos_for_user_id($user_id)
{
    global $connection;
    $query = "SELECT DISTINCT puerto ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE user_id = '{$user_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_puertos_for_country($country_code)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_puertos ";
    $query .= "WHERE codigo_pais = '{$country_code}' ";
    $query .= "ORDER BY id ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_puerto_name_for_code($code)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_puertos ";
    $query .= "WHERE codigo = '{$code}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["puerto"]);
        break;
    }

    return $value;
}

function get_puerto_for_code($code)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_puertos ";
    $query .= "WHERE codigo = '{$code}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = ($ord["puerto"]) . ", " . $ord["codigo"];
        break;
    }

    return $value;
}

function get_lugar_entrega_by_puerto($puerto)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_puertos ";
    $query .= "WHERE codigo = '{$puerto}' ";
    $query .= "LIMIT 1 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["puerto"]);
        break;
    }

    return $value;
}

function get_condicion_comercial_importador($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_condicion_comercial_importador ";
    $query .= "WHERE codigo = '{$id}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["descripcion"]);
        break;
    }

    return $value;
}

function get_tipo_intermediario($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_tipo_intermediario ";
    $query .= "WHERE codigo = '{$id}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["descripcion"]);
        break;
    }

    return $value;
}

function get_forma_de_envio($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_forma_envio ";
    $query .= "WHERE codigo = '{$id}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["descripcion"]);
        break;
    }

    return $value;
}

function get_forma_de_pago_dva($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_forma_pago_dva ";
    $query .= "WHERE codigo = '{$id}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["descripcion"]);
        break;
    }

    return $value;
}

function get_condicion_comercial_proveedor($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_condicion_comercial_proveedor ";
    $query .= "WHERE codigo = '{$id}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $value = htmlentities($ord["descripcion"]);
        break;
    }

    return $value;
}

function get_fecha_de_llegada($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'FECHA DE MANIFESTO' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_total_valor_aduana($exp_id)
{
    $facturas     = get_exp_facturas($exp_id);
    $valor_aduana = 0;
    while ($db_var = mysqli_fetch_assoc($facturas)) {
        $doc_id          = $db_var["id"];
        $monto_documento = get_docto_monto_for_doc_and_exp($doc_id, $exp_id);
        $valor_aduana += $monto_documento;
    }

    return $valor_aduana;
}

function get_total_bultos($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'BULTOS' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_total_peso_bruto($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'TOTAL PESO BRUTO' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_total_peso_neto($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'TOTAL PESO NETO' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_total_items($exp_id)
{

    $total_items_expediente = 0;
    $facturas               = get_exp_facturas($exp_id);
    while ($db_var = mysqli_fetch_assoc($facturas)) {
        $doc_id     = $db_var["id"];
        $items_data = get_items_for_factura($doc_id);
        while ($order = mysqli_fetch_assoc($items_data)) {
            $total_items_expediente++;
        }
    }

    return $total_items_expediente;

    // global $connection;
    // $query  = "SELECT * ";
    // $query .= "FROM usuarios_expedientes_doctos_datos ";
    // $query .= "WHERE nombre = 'CANTIDAD DE ITEMS' ";
    // $query .= "AND exp_id = '{$exp_id}' ";
    // $query .= "ORDER BY id DESC ";
    // $order_set = mysqli_query($connection, $query);
    // confirm_query($order_set);
    // while($ord = mysqli_fetch_assoc($order_set)) {
    //     $value= htmlentities($ord["valor"]);
    // break;
    // }
    //  return $value;
}

function get_proveedor_de_factura($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'PROVEEDOR/DESTINATARIO' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_intcoterm_dva_factura($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'INCOTERM DVA' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

// ----------------

function get_aduana_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    while ($ord = mysqli_fetch_assoc($order_set)) {
        $data  = htmlentities($ord["aduana"]);
        $query = "SELECT * ";
        $query .= "FROM sat_aduanas ";
        $query .= "WHERE aduana = '{$data}' ";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["codigo"]);
            break;
        }

        return $returnable_data;
        break;
    }
}

function get_recti_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["rectificacion"]);
    }

    return $returnable_data;
}

function get_puerto_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["puerto"]);
    }

    return $returnable_data;
}

function get_regimen_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["regimen"]);
    }

    return $returnable_data;
}

function get_modalidad_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $regimen = htmlentities($ord["regimen"]);
    }
    $COD_MOD_EXP = explode("-", $regimen);
    $modalidad   = ($COD_MOD_EXP[0]) . "-" . ($COD_MOD_EXP[1]);

    return $modalidad;
}

function get_clase_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $regimen = htmlentities($ord["regimen"]);
    }
    $COD_MOD_EXP = explode("-", $regimen);
    $clase       = ($COD_MOD_EXP[2]);

    return $clase;
}

function get_puerto_desembarque_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities((isset($ord["puerto_desembarque"]) ? $ord["puerto_desembarque"] : ''));
    }

    return $returnable_data;
}

function get_modo_transporte_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $data  = htmlentities($ord["aduana"]);
        $query = "SELECT * ";
        $query .= "FROM sat_aduanas ";
        $query .= "WHERE aduana = '{$data}' ";
        $query .= "ORDER BY id ASC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["modo"]);
            break;
        }

        return $returnable_data;
        break;
    }
}

function get_modo_transporte_for_codigo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_modo_transporte ";
    $query .= "WHERE codigo = '{$codigo}' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["modo"]);
        break;
    }

    return $returnable_data;
}

function get_codigo_modo_transporte_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $data  = htmlentities($ord["aduana"]);
        $query = "SELECT * ";
        $query .= "FROM sat_aduanas ";
        $query .= "WHERE aduana = '{$data}' ";
        $query .= "ORDER BY id ASC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["codigo_modo"]);
            break;
        }

        return $returnable_data;
        break;
    }
}

function get_descripcion_for_aduana($aduana)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_aduanas ";
    $query .= "WHERE aduana = '{$aduana}' ";
    $query .= "ORDER BY id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["descripcion"]);
        break;
    }

    return $returnable_data;
}

function get_deposito_temporal_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $data  = htmlentities($ord["aduana"]);
        $query = "SELECT * ";
        $query .= "FROM sat_depositos_temporales ";
        $query .= "WHERE aduana = '{$data}' ";
        $query .= "ORDER BY id ASC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["codigo"]);
            break;
        }

        return $returnable_data;
        break;
    }
}

function get_deposito_temporal_for_codigo($codigo_deposito)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_depositos_temporales ";
    $query .= "WHERE codigo = '{$codigo_deposito}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1";

    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $returnable_data = htmlentities($ord["descripcion"]);
        break;
    }

    return $returnable_data;
}

function get_deposito_fiscal_for_codigo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_depositos_fiscales ";
    $query .= "WHERE codigo = '{$codigo}' ";
    $query .= "ORDER BY id DESC ";
    $query .= "LIMIT 1";

    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $returnable_data = htmlentities($ord["nombre"]);
        break;
    }

    return $returnable_data;
}

// <PETICION_QR><DECLARACION_MERCANCIAS>GTPRQPQ-19-080342-0001</DECLARACION_MERCANCIAS> <FIRMA_ELECTRONICA>5WNWDRRWP</FIRMA_ELECTRONICA></PETICION_QR>

function get_duca_qr($duca_number)
{

    $declaracion = get_duca_poliza_for_numero_orden($duca_number);
    $firma       = get_firma_for_numero_orden($duca_number);

    $poliza_array = (str_split($declaracion));
    $declaracion  = $poliza_array[0] . $poliza_array[1] . $poliza_array[2] . $poliza_array[3] . $poliza_array[4] . $poliza_array[5] . $poliza_array[6] . "-" . $poliza_array[7] . $poliza_array[8] . "-" . $poliza_array[9] . $poliza_array[10] . $poliza_array[11] . $poliza_array[12] . $poliza_array[13] . $poliza_array[14] . "-" . $poliza_array[15] . $poliza_array[16] . $poliza_array[17] . $poliza_array[18] . "-" . $poliza_array[19];

    try {
        $soapClient = new SoapClient("https://farm3.sat.gob.gt/declaracion-mercancias-qr/ws/qr?WSDL");
        $params_str = "<PETICION_QR><DECLARACION_MERCANCIAS>" . $declaracion . "</DECLARACION_MERCANCIAS><FIRMA_ELECTRONICA>" . $firma . "</FIRMA_ELECTRONICA></PETICION_QR>";
        $parameters = new SoapParam((string) $params_str, 'pMensajeXml');
        $info       = $soapClient->solicitarQr($parameters);
        $returnable = get_string_between($info, "<QR>", "</QR>");

        return $returnable;

    } catch (Exception $e) {
        return "WSDL NOT WORKING" . $e;
    }

}

function tx_duca_prueba($duca_number)
{

    $declaracion = get_duca_poliza_for_numero_orden($duca_number);
    $firma       = get_firma_for_numero_orden($duca_number);

    $poliza_array = (str_split($declaracion));
    $declaracion  = $poliza_array[0] . $poliza_array[1] . $poliza_array[2] . $poliza_array[3] . $poliza_array[4] . $poliza_array[5] . $poliza_array[6] . "-" . $poliza_array[7] . $poliza_array[8] . "-" . $poliza_array[9] . $poliza_array[10] . $poliza_array[11] . $poliza_array[12] . $poliza_array[13] . $poliza_array[14] . "-" . $poliza_array[15] . $poliza_array[16] . $poliza_array[17] . $poliza_array[18] . "-" . $poliza_array[19];

    try {
        $soapClient = new SoapClient("https://farm3.sat.gob.gt/declaracion-mercancias-qr/ws/qr?WSDL");
        $params_str = "<PETICION_QR><DECLARACION_MERCANCIAS>" . $declaracion . "</DECLARACION_MERCANCIAS><FIRMA_ELECTRONICA>" . $firma . "</FIRMA_ELECTRONICA></PETICION_QR>";
        $parameters = new SoapParam((string) $params_str, 'pMensajeXml');
        $info       = $soapClient->solicitarQr($parameters);
        $returnable = get_string_between($info, "<QR>", "</QR>");

        return $returnable;

    } catch (Exception $e) {
        return "WSDL NOT WORKING" . $e;
    }

}

function get_tipo_cambio($day)
{

    try {
        $soapClient = new SoapClient("http://www.banguat.gob.gt/variables/ws/TipoCambio.asmx?wsdl", ["trace" => 1]);
        $info       = $soapClient->__call("TipoCambioDia", []);
        $returnable = $info->TipoCambioDiaResult->CambioDolar->VarDolar->referencia;

        return number_format($returnable, 4) . "0";
    } catch (Exception $e) {
        return 0;
    }

}

function get_tipo_cambio_by_moneda($moneda)
{
    switch ($moneda) {
        case USD:

            try {
                $soapClient = new SoapClient("http://www.banguat.gob.gt/variables/ws/TipoCambio.asmx?wsdl", ["trace" => 1]);
                $info       = $soapClient->__call("TipoCambioDia", []);

                return $info->TipoCambioDiaResult->CambioDolar->VarDolar->referencia;
            } catch (Exception $e) {
                return 0;
            }

            break;
        case EUR:
            return "8.53";
            break;
        default:

            try {
                $soapClient = new SoapClient("http://www.banguat.gob.gt/variables/ws/TipoCambio.asmx?wsdl", ["trace" => 1]);
                $info       = $soapClient->__call("TipoCambioDia", []);

                return $info->TipoCambioDiaResult->CambioDolar->VarDolar->referencia;
            } catch (Exception $e) {
                return 0;
            }

    }
}

function get_numero_formatos($exp_id)
{
    $total_items = get_total_items($exp_id);
    if ($total_items == 1) {
        return "1";
    } else {
        $total_items = $total_items - 1;
        $pages       = ceil($total_items / 6) + 1;

        return $pages;
    }
}

function get_numero_items($exp_id)
{
    return "1";
}

// ----------------

function get_user_pais_for_nit($nit)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios ";
    $query .= "WHERE nit LIKE '%$nit%'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["pais"]);
        break;
    }
    if (strlen($returnable_data) < 1) {
        global $connection;
        $query = "SELECT * ";
        $query .= "FROM usuarios_clientes ";
        $query .= "WHERE nit LIKE '%$nit%'";
        $query .= "ORDER BY id DESC ";
        $order_set = mysqli_query($connection, $query);
        confirm_query($order_set);
        while ($ord = mysqli_fetch_assoc($order_set)) {
            $returnable_data = htmlentities($ord["pais"]);
            break;
        }
    }

    return $returnable_data;

}

function get_declarante_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes ";
    $query .= "WHERE id = '{$exp_id}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["agente"]);
        break;
    }

    return $returnable_data;
}

function get_declarante_tipo_id($exp_id)
{
    $agente = get_declarante_for_exp($exp_id);
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE codigo = '{$agente}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["tipo_id"]);
        break;
    }

    return $returnable_data;
}

function get_declarante_name($exp_id)
{
    $agente = get_declarante_for_exp($exp_id);
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE codigo = '{$agente}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["agente"]);
        break;
    }

    return $returnable_data;
}

function get_declarante_tipo($exp_id)
{
    $agente = get_declarante_for_exp($exp_id);
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE codigo = '{$agente}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["tipo_declarante"]);
        break;
    }

    return $returnable_data;
}

function get_declarante_pais($exp_id)
{
    $agente = get_declarante_for_exp($exp_id);
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE codigo = '{$agente}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["pais"]);
        break;
    }

    return $returnable_data;
}

function get_declarante_domicilio_fiscal($exp_id)
{
    $agente = get_declarante_for_exp($exp_id);
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE codigo = '{$agente}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["domicilio_fiscal"]);
        break;
    }

    return $returnable_data;
}

function get_declarante_city($exp_id)
{
    $agente = get_declarante_for_exp($exp_id);
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE codigo = '{$agente}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["ciudad"]);
        break;
    }

    return $returnable_data;
}

function get_declarante_id($exp_id)
{
    $agente = get_declarante_for_exp($exp_id);
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM agentes ";
    $query .= "WHERE codigo = '{$agente}'";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable_data = htmlentities($ord["identificacion"]);
        break;
    }

    return $returnable_data;
}

function get_data_for_dua_number($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_NUMERO_ORDEN ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    //    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_poliza_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_exp_id_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($dua_var = mysqli_fetch_assoc($data_set)) {
        $exp_id = utf8_encode($dua_var["exp_id"]);
    }

    return $exp_id;
}

function get_agente_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($dua_var = mysqli_fetch_assoc($data_set)) {
        $exp_id = utf8_encode($dua_var["AGENTE_ORDEN"]);
    }

    return $exp_id;
}

function get_selectivo_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($db_var = mysqli_fetch_assoc($data_set)) {
        $returnable = utf8_encode($db_var["SELECTIVO"]);
    }

    return $returnable;
}

function get_dva_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_DVA ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_dva_for_exp_and_proveedor($exp_id, $proveedor_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_DVA ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND proveedor_id = '{$proveedor_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_cartadeporte_for_exp_and_docto_id($exp_id, $docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_cartadeporte ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND usuarios_expedientes_doctos_id = '{$docto_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_manifiestoterrestre_for_exp_and_docto_id($exp_id, $docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_manifiestoterrestre ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND usuarios_expedientes_doctos_id = '{$docto_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_duca_poliza_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $returnable_data = htmlentities($ord["DUCA_POLIZA"]);
        break;
    }

    return $returnable_data;
}

function get_duca_exp_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $returnable_data = htmlentities($ord["exp_id"]);
        break;
    }

    return $returnable_data;
}

function get_firma_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $returnable_data = htmlentities($ord["FIRMA"]);
        break;
    }

    return $returnable_data;
}

function get_tipo_cambio_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_POLIZA ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    while ($ord = mysqli_fetch_assoc($data_set)) {
        $returnable_data = htmlentities($ord["TIPO_CAMBIO"]);
        break;
    }

    return $returnable_data;
}

function get_documentos_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_DOCUMENTOS_SOPORTE ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY TIPO_DOCUMENTO, id ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_tributos_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TRIBUTOS ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY CODIGO_TRIBUTO ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_tributos_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TRIBUTOS ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY CODIGO_TRIBUTO ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_fraccion_tributos_for_dua($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TRIBUTOS_FRACCION ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY CODIGO_TRIBUTO ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_fraccion_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_FRACCION ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_dua_equipamientos_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_EQUIPAMIENTOS ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_documentos_soporte_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_DOCUMENTOS_SOPORTE ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_fraccion_tributos_for_numero_orden($dua_number, $fraccion)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TRIBUTOS_FRACCION ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND SECUENCIA_FRACCION = '{$fraccion}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY CODIGO_TRIBUTO ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_fraccion_tributos_for_numero_orden_and_codigo($dua_number, $fraccion, $codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_TRIBUTOS_FRACCION ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND SECUENCIA_FRACCION = '{$fraccion}' ";
    $query .= "AND CODIGO_TRIBUTO = '{$codigo}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY CODIGO_TRIBUTO ASC ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_equipamientos_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_EQUIPAMIENTOS ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_equipamientos_for_doc_and_exp($doc_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_contenedores ";
    $query .= "WHERE docto_id = '{$doc_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_equipamientos_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_contenedores ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_marcas_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_MARCAS ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_observaciones_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_OBSERVACIONES ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_FRACCION ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_for_numero_orden_with_acuerdo2($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_FRACCION ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND ACUERDO_PREFERENCIAL2 LIKE '%00' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_for_numero_orden_and_proveedor($dua_number, $proveedor_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_FRACCION ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND proveedor_id = '{$proveedor_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_for_exp_and_factura($exp_id, $factura_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_FRACCION ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND factura_id = '{$factura_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_vehiculos_for_numero_orden($dua_number)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM DUA_FRACCION ";
    $query .= "WHERE NUMERO_ORDEN = '{$dua_number}' ";
    $query .= "AND status = '1' ";
    $query .= "AND vehiculo = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_for_factura($doc_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_items ";
    $query .= "WHERE doc_id = '{$doc_id}' ";
    $query .= "AND status = '1' ";
    //    $query .= "LIMIT 150 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_items ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_with_tlc_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_items ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND tlc = '1' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_unset_items_with_tlc_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_items ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND tlc = '1' ";
    $query .= "AND tlc_id = '' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_items_with_tlc_for_exp_and_doc($exp_id, $docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_items ";
    $query .= "WHERE exp_id = '{$exp_id}' ";
    $query .= "AND tlc_id = '{$docto_id}' ";
    $query .= "AND tlc = '1' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_flete_internacional_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'VALOR DE FLETE INTERNACIONAL' ";
//        $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_flete_interno_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'VALOR DE FLETE INTERNO' ";
//        $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_factura_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'NÚMERO DE FACTURA' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_facturas_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE docto_id = '380' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id ASC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_doctos_for_exp($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE docto_id <> '380' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_docto_fob_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FOB' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_flete_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FLETE' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_seguro_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'SEGURO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_nombre_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'NOMBRE DOCUMENTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_tipo_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'TIPO DE DOCUMENTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_emisor_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'EMISOR' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_numero_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'NUMERO DE DOCUMENTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_moneda_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'CODIGO DE MONEDA' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_monto_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'MONTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_tipo_cambio_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'TASA DE CAMBIO US$' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_fraccion_precedente_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'LINEA PRECEDENTE' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    //  $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_inciso_1_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'INCISO 1' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    //  $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_inciso_2_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'INCISO 2' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    //  $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_fecha_vencimiento_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FECHA DE VENCIMIENTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_fecha_emision_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FECHA DE EMISION' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_pais_emision_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'PAIS DE EMISION' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_docto_proveedor_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'PROVEEDOR/DESTINATARIO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_tipo_de_carga_description($tipo_carga)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_tipo_carga_equipamiento ";
    $query .= "WHERE codigo = '{$tipo_carga}' ";
    $query .= "LIMIT 1 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["descripcion"]);
        break;
    }

    return $value;
}

function get_estado_mercancia_codigo_by_descripcion($descripcion)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_estados_mercancias ";
    $query .= "WHERE descripcion = '{$descripcion}' ";
    $query .= "LIMIT 1 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($db_var = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($db_var["codigo"]);
        break;
    }

    return $value;
}

function get_estado_mercancia_descripcion_by_codigo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_estados_mercancias ";
    $query .= "WHERE codigo = '{$codigo}' ";
    $query .= "LIMIT 1 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($db_var = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($db_var["descripcion"]);
        break;
    }

    return $value;
}

function get_docto_description_for_tipo_documento($tipo_documento)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_tipo_documento ";
    $query .= "WHERE codigo = '{$tipo_documento}' ";
    $query .= "LIMIT 1 ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["descripcion"]);
        break;
    }

    return $value;
}

function get_facturas_for_exp_count($exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE detalle = 'NÚMERO DE FACTURA' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    $row_cnt = mysqli_num_rows($order_set);

    return $row_cnt;

}

function get_facturas_status_for_docto_id($docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos ";
    $query .= "WHERE id = '{$docto_id}' ";
    $query .= "AND status = '1' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["status"]);
        break;
    }

    return $value;
}

function get_factura_cif_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'CIF' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_factura_fob_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FOB' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_factura_seguro_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'SEGURO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_factura_flete_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FLETE' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_factura_otros_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'OTROS' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_factura_neto_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'PESO NETO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_factura_bruto_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'PESO BRUTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_tipo_docto_for_docto_id($docto_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'TIPO DE DOCUMENTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

//

function get_factura_cif_id_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'CIF' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["id"]);
        break;
    }

    return $value;
}

function get_factura_fob_id_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FOB' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["id"]);
        break;
    }

    return $value;
}

function get_factura_seguro_id_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'SEGURO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["id"]);
        break;
    }

    return $value;
}

function get_factura_flete_id_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'FLETE' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["id"]);
        break;
    }

    return $value;
}

function get_factura_otros_id_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'OTROS' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["id"]);
        break;
    }

    return $value;
}

function get_factura_neto_id_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'PESO NETO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["id"]);
        break;
    }

    return $value;
}

function get_factura_bruto_id_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'PESO BRUTO' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["id"]);
        break;
    }

    return $value;
}

//

function get_incoterm_for_doc_and_exp($docto_id, $exp_id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM usuarios_expedientes_doctos_datos ";
    $query .= "WHERE nombre = 'INCOTERM' ";
    $query .= "AND docto_id = '{$docto_id}' ";
    $query .= "AND exp_id = '{$exp_id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $value = htmlentities($ord["valor"]);
        break;
    }

    return $value;
}

function get_last_product_id_for_factura()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["id"]);
        break;
    }

    return $orderid;
}

function get_productos_clasificar()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE partida = '' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_is_vehicle_for_product($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $orderid = htmlentities($ord["vehiculo"]);
        break;
    }

    return $orderid;
}

function get_estado_mercancia_for_product($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = htmlentities($ord["estado"]);
        break;
    }

    return $returnable;
}

function get_caracteristicas_for_product($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = htmlentities($ord["caracteristicas"]);
        break;
    }

    return $returnable;
}

function get_descripcion_for_product($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = htmlentities($ord["descripcion"]);
        break;
    }

    return $returnable;
}

function get_marca_for_product($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = htmlentities($ord["marca"]);
        break;
    }

    return $returnable;
}

function get_modelo_for_product($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_productos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = htmlentities($ord["modelo"]);
        break;
    }

    return $returnable;
}

function get_vehiculo_for_product($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM catalogo_vehiculos ";
    $query .= "WHERE catalogo_id = '{$id}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_marca_for_codigo_vehiculo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_vehiculos_codigo_marca ";
    $query .= "WHERE codigo = '{$codigo}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = ($ord["descripcion"]);
        break;
    }

    return $returnable;
}

function get_combustible_for_codigo_vehiculo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_vehiculos_combustible ";
    $query .= "WHERE codigo = '{$codigo}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = ($ord["descripcion"]);
        break;
    }

    return $returnable;
}

function get_tipo_vehiculo_for_codigo($codigo)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM sat_vehiculos_tipo ";
    $query .= "WHERE codigo = '{$codigo}' ";
    $query .= "ORDER BY id DESC ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);
    while ($ord = mysqli_fetch_assoc($order_set)) {
        $returnable = ($ord["descripcion"]);
        break;
    }

    return $returnable;
}

//---------------------------------------------------------------------------------
//        MYSQL - INVOICE FUNCTIONS
//---------------------------------------------------------------------------------

function update_invoice_by_type_and_id($service_type, $id)
{

    if ($service_type == 1) {
        $query = "UPDATE usuarios_servicios_completos SET ";
        $query .= "estado 	= '3'  ";
        $query .= "WHERE id = {$id} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);
    } else {
        $query = "UPDATE usuarios_servicios SET ";
        $query .= "estado 	= '3'  ";
        $query .= "WHERE id = {$id} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);
    }

}

//---------------------------------------------------------------------------------
//        MYSQL - DOCUMENTOS CREADOS
//---------------------------------------------------------------------------------

function get_documentos_creados()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_creados ";
    $query .= "WHERE status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_documentos_impresos()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_impresos ";
    $query .= "WHERE status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_documento_creado_for_id($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_creados ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_documento_creado_detalle($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_creados_detalle ";
    $query .= "WHERE docto_id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function get_documento_creado_datos($id)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM documentos_creados_datos ";
    $query .= "WHERE id = '{$id}' ";
    $query .= "AND status = '1' ";
    $order_set = mysqli_query($connection, $query);
    confirm_query($order_set);

    return $order_set;
}

function set_documento_creado($nombre, $tipo, $plantilla, $fondo, $redirect, $exp_id, $admin_id, $user_id)
{

    date_default_timezone_set("America/Guatemala");

    // DOCTO CREADO INSERT
    $date_created = date("Y-m-d H:i:s");
    $status       = 1;

    $query = "INSERT INTO documentos_creados (";
    $query .= "  nombre, tipo, plantilla, fondo, redirect, exp_id, admin_id, user_id, date_created, status ";
    $query .= ") VALUES (";
    $query .= " '{$nombre}', '{$tipo}', '{$plantilla}', '{$fondo}', '{$redirect}', '{$exp_id}', '{$admin_id}', '{$user_id}', '{$date_created}', '{$status}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    return null;

}

function set_documento_creado_datos($docto_id, $detalle_id, $valor)
{

    // DOCTO CREADO DATOS INSERT
    $status = 1;

    $query = "INSERT INTO documentos_creados_datos (";
    $query .= "  docto_id, detalle_id, valor, status ";
    $query .= ") VALUES (";
    $query .= " '{$docto_id}', '{$detalle_id}', '{$valor}', '{$status}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
}

function set_documento_creado_detalle($docto_id, $campo)
{

    // DOCTO CREADO DETALLE INSERT
    $status = 1;

    $query = "INSERT INTO documentos_creados_detalle (";
    $query .= "  docto_id, campo, status ";
    $query .= ") VALUES (";
    $query .= " '{$docto_id}', '{$campo}', '{$status}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
}

/*

$id = $_POST['id'];

$docto_set = get_documento_creado_for_id($id);
while($docto_data = mysqli_fetch_assoc($docto_set)) {
$nombre         = $docto_data["nombre"];
$plantilla         = $docto_data["plantilla"];
$fondo             = $docto_data["fondo"];
$redirect         = $docto_data["redirect"];
}

$docto_detalle_set = get_documento_creado_detalle($id);
while($docto_detalle = mysqli_fetch_assoc($docto_detalle_set)) {
$campo_id         = $docto_detalle["campo"];
$campo         = $docto_detalle["campo"];

$docto_datos_set = get_documento_creado_datos($campo_id);
while($docto_dato = mysqli_fetch_assoc($docto_datos_set)) {
$valor         = $docto_dato["valor"];

// Aca podes re-escribir el valor en el campo :D

}
}

$user_set=get_user($id);
while($user_data = mysqli_fetch_assoc($user_set)) {
$id             = $user_data["id"];
$codigo         = $user_data["codigo"];
$nit             = $user_data["nit"];
$razon             = $user_data["razon"];
$empresa         = $user_data["empresa"];
$representante     = $user_data["representante"];
$domicilio         = $user_data["domicilio"];
$correo         = $user_data["correo"];
$ciudad = $user_data["ciudad"];
$admin_id = $user_data["admin_id"];
}

$admin_set =get_admin_by_id($id);
while($admin_data = mysqli_fetch_assoc($admin_set )) {

$id             = $admin_data["id"];
$username         = $admin_data["username"];
$firstname         = $admin_data["firstname"];
$lastname         = $admin_data["lastname"];
$sede             = $admin_data["sede"];
}

 */
//---------------------------------------------------------------------------------
//        CLIENT DOCUMENTS COUNT - this function disables the user from any operations
//                               if the user's documents are not completely uploaded
//---------------------------------------------------------------------------------

function count_user_documents($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT count(user_id) AS total_documentos ";
    $query .= "FROM usuarios_doctos ";
    $query .= "WHERE user_id =  '{$safe_id}' ";
    $query .= "AND estado =  '1'";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function count_user_accreditation_documents($tipo_persona)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT count(id) as total_documentos ";
    $query .= "FROM documentos_usuarios ";
    $query .= "WHERE tipo_persona = '{$tipo_persona}'";
    $query .= "AND status =  '1'";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function count_expired_user_documents($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT count(user_id) AS total_documentos ";
    $query .= "FROM usuarios_doctos ";
    $query .= "WHERE user_id =  '{$safe_id}' ";
    $query .= "AND fecha_vencimiento >=  NOW()";
    $query .= "AND estado =  '1'";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_uploaded_documents($id, $tipo_persona)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT nombre ";
    $query .= "FROM documentos_usuarios ";
    $query .= "WHERE tipo_persona='{$tipo_persona}' ";
    $query .= "AND id NOT IN ";
    $query .= "(SELECT tipo FROM usuarios_doctos ";
    $query .= "WHERE user_id =  '{$safe_id}' ";
    $query .= "AND estado =  '1')";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_expired_documents($id, $tipo_persona)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT nombre ";
    $query .= "FROM documentos_usuarios ";
    $query .= "WHERE tipo_persona='{$tipo_persona}' ";
    $query .= "AND id IN ";
    $query .= "(SELECT tipo FROM usuarios_doctos ";
    $query .= "WHERE user_id =  '{$safe_id}' ";
    $query .= "AND estado =  '1' ";
    $query .= "AND fecha_vencimiento <=  NOW())";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_expired_documents_2($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT a.nombre, DATEDIFF(now(), b.fecha_vencimiento) as dias_vencidos  ";
    $query .= "FROM documentos_usuarios a ";
    $query .= "JOIN usuarios_doctos b on b.tipo = a.id ";
    $query .= "WHERE fecha_vencimiento IS NOT NULL AND ";
    $query .= "DATEDIFF(now(), fecha_vencimiento) > 0 ";
    $query .= "AND estado='1' AND b.user_id =  '{$safe_id}' ";
    $query .= "ORDER BY fecha_vencimiento ASC";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_user_type($id)
{
    global $connection;
    $safe_search = mysqli_real_escape_string($connection, $id);
    $query       = "SELECT tipo_persona ";
    $query .= "FROM usuarios ";
    $query .= "WHERE id =  '{$safe_id}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_dias_expiracion($id, $tipo)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT DATEDIFF(a.fecha_vencimiento, now()) AS caducidad ";
    $query .= "FROM usuarios_doctos a ";
    $query .= "WHERE user_id =  '{$safe_id}' ";
    $query .= "AND tipo='{$tipo}' ";
    $query .= "AND estado='1'";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_exp_gestion()
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM vw_expedientes_en_gestion ";
    $query .= "WHERE YEAR(fecha_creacion) = YEAR(now())";
    $package_set = mysqli_query($connection, $query);
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;
}

//===================================================================================
//ADDED BY DSCA AUG 21 2019: FOR A MORE ACCURATE COUNT OF DOSSIERS PROCESSED @ SAT
//===================================================================================
function get_exp_firmados()
{
    //echo '<script type="text/javascript">alert("start query")</script>';
    global $connection;
    $query = "SELECT status ";
    $query .= "FROM DUA_TX ";
    $query .= "WHERE status = '3'";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    $row_cnt = mysqli_num_rows($data_set);
    //echo '<script type="text/javascript">alert("' .$query .'")</script>';
    //echo '<script type="text/javascript">alert("' .$row_cnt .'")</script>';
    //return $row_cnt;

    return $row_cnt;
}

function count_expired_documents($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT a.nombre, DATEDIFF(now(), b.fecha_vencimiento) as dias_vencidos  ";
    $query .= "FROM documentos_usuarios a ";
    $query .= "JOIN usuarios_doctos b on b.tipo = a.id ";
    $query .= "WHERE fecha_vencimiento IS NOT NULL AND ";
    $query .= "DATEDIFF(now(), fecha_vencimiento) > 0 ";
    $query .= "AND estado='1' AND b.user_id =  '{$safe_id}' ";
    $query .= "ORDER BY fecha_vencimiento ASC";
    $package_set = mysqli_query($connection, $query);
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    confirm_query($package_set);
    $row_cnt = mysqli_num_rows($package_set);

    return $row_cnt;
}

function count_missing_documents($id)
{
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    $query   = "SELECT count(a.nombre) as total ";
    $query .= "FROM documentos_usuarios a ";
    $query .= "JOIN usuarios_doctos b on b.tipo = a.id ";
    $query .= "WHERE estado = '0' AND b.user_id =  '{$safe_id}' ";
    $query .= "ORDER BY fecha_vencimiento ASC";
    $data_set = mysqli_query($connection, $query);
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    confirm_query($data_set);

    return $data_set;
}

//---------------------------------------------------------------------------------
//        REGISTRO DE LLAMADAS
//---------------------------------------------------------------------------------

function get_admins_by_full_name($sede)
{
    global $connection;
    $query = "SELECT id, CONCAT(FIRSTNAME, ' ', LASTNAME) AS nombre ";
    $query .= "FROM admins ";
    $query .= "WHERE sede='{$sede}' ";
    $query .= "ORDER BY lastname ASC";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_call_list()
{
    global $connection;
    // $safe_id = mysqli_real_escape_string($connection, $id);
    $query = "SELECT a.telefono, a.llamante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.empresa, a.fecha, a.asunto, a.comentarios ";
    $query .= "FROM registro_llamadas a ";
    $query .= "JOIN admins b on a.llamado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "ORDER BY fecha DESC ";
    $query .= "LIMIT 10 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_call_list_by_name($name)
{
    global $connection;
    // $safe_id = mysqli_real_escape_string($connection, $id);
    $query = "SELECT a.telefono, a.llamante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.empresa, a.fecha, a.asunto, a.comentarios ";
    $query .= "FROM registro_llamadas a ";
    $query .= "JOIN admins b on a.llamado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND llamante LIKE  '%{$name}%' ";
    $query .= "ORDER BY fecha DESC ";
    $query .= "LIMIT 10 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_call_list_by_called_name($name)
{
    global $connection;
    $query = "SELECT a.telefono, a.llamante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.empresa, a.fecha, a.asunto, a.comentarios ";
    $query .= "FROM registro_llamadas a ";
    $query .= "JOIN admins b on a.llamado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) LIKE  '%{$name}%' ";
    $query .= "ORDER BY fecha DESC ";
    $query .= "LIMIT 10 ";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_call_list_by_date($name)
{
    global $connection;

    $query = "SELECT a.telefono, a.llamante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.empresa, a.fecha, a.asunto, a.comentarios ";
    $query .= "FROM registro_llamadas a ";
    $query .= "JOIN admins b on a.llamado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND fecha LIKE '{$name}%' ";
    $query .= "ORDER BY fecha DESC ";
    $query .= "LIMIT 10";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_call_list_by_phone_number($name)
{
    global $connection;

    $query = "SELECT a.telefono, a.llamante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.empresa, a.fecha, a.asunto, a.comentarios ";
    $query .= "FROM registro_llamadas a ";
    $query .= "JOIN admins b on a.llamado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND a.telefono LIKE '%{$name}%' ";
    $query .= "ORDER BY fecha DESC ";
    $query .= "LIMIT 10";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_call_list_by_business_name($name)
{
    global $connection;

    $query = "SELECT a.telefono, a.llamante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.empresa, a.fecha, a.asunto, a.comentarios ";
    $query .= "FROM registro_llamadas a ";
    $query .= "JOIN admins b on a.llamado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND a.empresa LIKE '%{$name}%' ";
    $query .= "ORDER BY fecha DESC ";
    $query .= "LIMIT 10";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_call_list_by_subject($name)
{
    global $connection;

    $query = "SELECT a.telefono, a.llamante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.empresa, a.fecha, a.asunto, a.comentarios ";
    $query .= "FROM registro_llamadas a ";
    $query .= "JOIN admins b on a.llamado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND a.asunto LIKE '%{$name}%' ";
    $query .= "ORDER BY fecha DESC ";
    $query .= "LIMIT 10";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

//---------------------------------------------------------------------------------
//        REGISTRO DE VISITAS
//---------------------------------------------------------------------------------

function get_visit_list_by_date($name)
{
    global $connection;
    $query = "SELECT a.id, a.fecha_visita, a.visitante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.visitado, a.tipo_visita, a.empresa, a.hora_salida, a.comentario ";
    $query .= "FROM registro_visitas a ";
    $query .= "JOIN admins b on a.visitado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND fecha_visita LIKE '{$name}%' ";
    $query .= "ORDER BY fecha_visita DESC ";
    $query .= "LIMIT 10";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_visit_list_by_name($name)
{
    global $connection;
    $query = "SELECT a.id, a.fecha_visita, a.visitante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.visitado, a.tipo_visita, a.empresa, a.hora_salida, a.comentario ";
    $query .= "FROM registro_visitas a ";
    $query .= "JOIN admins b on a.visitado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND visitante LIKE  '%{$name}%' ";
    $query .= "ORDER BY fecha_visita DESC ";
    $query .= "LIMIT 10 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_visit_list()
{
    global $connection;
    $query = "SELECT a.id, a.fecha_visita, a.visitante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.visitado, a.tipo_visita, a.empresa, a.hora_salida, a.comentario ";
    $query .= "FROM registro_visitas a ";
    $query .= "JOIN admins b on a.visitado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND hora_salida IS NULL ";
    $query .= "ORDER BY fecha_visita DESC ";
    $query .= "LIMIT 10 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_visit_list_by_visited_name($name)
{
    global $connection;
    $query = "SELECT a.id, a.fecha_visita, a.visitante, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.visitado, a.tipo_visita, a.empresa, a.hora_salida, a.comentario ";
    $query .= "FROM registro_visitas a ";
    $query .= "JOIN admins b on a.visitado = b.id ";
    $query .= "WHERE estatus = '1' ";
    $query .= "AND hora_salida IS NULL ";
    $query .= "AND CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) LIKE  '%{$name}%' ";
    $query .= "ORDER BY fecha_visita DESC ";
    $query .= "LIMIT 10 ";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

//---------------------------------------------------------------------------------
//        REGISTRO DE DOCUMENTOS
//---------------------------------------------------------------------------------
function get_document_list_by_date($name)
{
    global $connection;
    $query = "SELECT a.id, a.fecha_ingreso, a.remitente, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.destinatario, a.numero_guia, a.descripcion, a.fecha_entrega, a.comentarios ";
    $query .= "FROM registro_documentos a ";
    $query .= "JOIN admins b on a.destinatario = b.id ";
    $query .= "WHERE a.status = '1' ";
    $query .= "AND fecha_ingreso LIKE '{$name}%' ";
    $query .= "ORDER BY fecha_ingreso DESC ";
    $query .= "LIMIT 10";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_document_list_by_sender($name)
{
    global $connection;
    $query = "SELECT a.id, a.fecha_ingreso, a.remitente, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.destinatario, a.numero_guia, a.descripcion, a.fecha_entrega, a.comentarios ";
    $query .= "FROM registro_documentos a ";
    $query .= "JOIN admins b on a.destinatario = b.id ";
    $query .= "WHERE a.status = '1' ";
    $query .= "AND a.remitente LIKE  '%{$name}%' ";
    $query .= "ORDER BY fecha_ingreso DESC ";
    $query .= "LIMIT 10 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_document_list()
{
    global $connection;
    $query = "SELECT a.id, a.fecha_ingreso, a.remitente, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.destinatario, a.numero_guia, a.descripcion, a.fecha_entrega, a.comentarios ";
    $query .= "FROM registro_documentos a ";
    $query .= "JOIN admins b on a.destinatario = b.id ";
    $query .= "WHERE a.status = '1' ";
    $query .= "AND a.fecha_entrega IS NULL ";
    $query .= "ORDER BY a.fecha_ingreso DESC ";
    $query .= "LIMIT 10 ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';

    return $data_set;
}

function get_document_list_by_recipient($name)
{
    global $connection;
    $query = "SELECT a.id, a.fecha_ingreso, a.remitente, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.destinatario, a.numero_guia, a.descripcion, a.fecha_entrega, a.comentarios ";
    $query .= "FROM registro_documentos a ";
    $query .= "JOIN admins b on a.destinatario = b.id ";
    $query .= "WHERE a.status = '1' ";
    $query .= "AND a.fecha_entrega IS NULL ";
    $query .= "AND CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) LIKE  '%{$name}%' ";
    $query .= "ORDER BY fecha_ingreso DESC ";
    $query .= "LIMIT 10 ";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_received_document_list()
{
    global $connection;
    $query = "SELECT a.id, a.fecha_ingreso, a.remitente, CONCAT(b.FIRSTNAME, ' ', b.LASTNAME) AS nombre, a.destinatario, a.numero_guia, a.descripcion, a.fecha_entrega, a.comentarios ";
    $query .= "FROM registro_documentos a ";
    $query .= "JOIN admins b on a.destinatario = b.id ";
    $query .= "WHERE a.status = '1' ";
    $query .= "ORDER BY fecha_ingreso DESC ";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

//---------------------------------------------------------------------------------
//        CONSULTA DE CUENTA DE ESTATUS POR TIPO
//---------------------------------------------------------------------------------
//tipos de status:
//0 = anulada
//1 = esperando respuesta
//2 = rechazada
//3 = aceptada
//una vez aceptada
//4 = selectivo rojo
//5 = selectivo verde

function count_declarations_by_status_type($status, $expid)
{
    global $connection;
    $query = "SELECT count(id) as total ";
    $query .= "FROM DUA_TX ";
    $query .= "WHERE status = '{$status}' ";
    $query .= "AND exp_id = '{$expid}' ";
    $query .= "AND DATE_FORMAT(tx_timestamp,  '%Y' ) = year(curdate())";
    $data_set = mysqli_query($connection, $query);
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    confirm_query($data_set);
    while ($estatus = mysqli_fetch_assoc($data_set)) {
        $total_estatus = htmlentities($estatus["total"]);
        break;
    }

    return $total_estatus;
}

//--------------------------------------------------------------------------------
// manejo de sesiones DSCA 22/01/2020
//--------------------------------------------------------------------------------

function close_session($userid, $sessionid)
{
    // date_default_timezone_set('America/Guatemala');
    // $closetime = date("Y-m-d H:i:s");

    global $connection;
    $query = "UPDATE admin_sessions SET ";
    $query .= "status = 0, cerrado_externo = 0 ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND session_id = '{$sessionid}' ";
    $query .= "AND status = '1' ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $result = mysqli_query($connection, $query);
    confirm_query($result);
}

function update_last_used($userid, $sessionid)
{
    date_default_timezone_set("America/Guatemala");
    $rightnow = date("Y-m-d H:i:s");

    //echo '<script type="text/javascript">alert("' . $rightnow . '")</script>';
    global $connection;
    $query = "UPDATE admin_sessions SET ";
    $query .= "last_used = '{$rightnow}' ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND session_id = '{$sessionid}' ";
    $query .= "AND status = '1' ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $result = mysqli_query($connection, $query);
    confirm_query($result);
}

function update_admin_trace($userid, $navigation)
{

    date_default_timezone_set("America/Guatemala");
    $rightnow     = date("Y-m-d H:i:s");
    $machine_name = gethostname();
    $mysession    = session_id();
    if ($navigation == 'logout') {
        $navigate_to = '/sadecja/base/html/pages/logout.php';
    } else {
        $navigate_to = $_SERVER['REQUEST_URI'];
    }
    global $connection;
    $query = "INSERT INTO admin_navigation_trace (";
    $query .= "admin_id, session_id, device_name, navigated_to) ";
    $query .= "VALUES ('{$userid}','{$mysession}','{$machine_name}', '{$navigate_to}') ";

    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $result = mysqli_query($connection, $query);
    confirm_query($result);

}

function force_close_session($myid)
{
    // echo '<script type="text/javascript">alert("' . $_SESSION["admin_id"] . '")</script>';
    //$mysession = session_id();
    // $time = strtotime(now());
    // $logout_time = date('Y-m-d h:m:s', $time);
    // $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

    //$mydate = date('Y-m-d H:i:s');
    global $connection;
    $query = "UPDATE admin_sessions SET ";
    $query .= "status = 0, cerrado_externo = 1 ";
    $query .= "WHERE id = '{$myid}' ";
    $result = mysqli_query($connection, $query);

}

function force_close_all_sessions($usrid)
{

    echo '<script type="text/javascript">alert("' . $_SESSION["admin_id"] . '")</script>';
    //$mydate = date('Y-m-d H:i:s');
    global $connection;
    $query = "UPDATE admin_sessions SET ";
    $query .= "status = 0, cerrado_externo = 1 ";
    $query .= "WHERE admin_id = '{$usrid}' ";
    $result = mysqli_query($connection, $query);

}

function delete_admin_license($myid, $newquantity)
{
    // echo '<script type="text/javascript">alert("' . $_SESSION["admin_id"] . '")</script>';
    //$mysession = session_id();
    // $time = strtotime(now());
    // $logout_time = date('Y-m-d h:m:s', $time);
    // $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

    //$mydate = date('Y-m-d H:i:s');
    global $connection;
    $query = "UPDATE admin_license_cost SET ";
    $query .= "status = 0 ";
    $query .= "WHERE id = '{$myid}' ";

    $result = mysqli_query($connection, $query);

    $query = "UPDATE admins_concurrent_sessions SET ";
    $query .= "maximum_sessions_allowed = '{$newquantity}' ";
    $query .= "WHERE id = '{$myid}' ";

    $result = mysqli_query($connection, $query);

}

function save_new_session($userid, $ipaddress)
{
    $mysession    = session_id();
    $machine_name = gethostname();
    $browser      = get_browser_name($_SERVER['HTTP_USER_AGENT']);
    //$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    // $ipaddress1 = $_SERVER['HTTP_X_FORWARDED_FOR'] ;
    // $ipaddress2 = $_SERVER['REMOTE_ADDR'];
    $myIP = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
    //$user_os = getOS();
    $user_os = $_SERVER['HTTP_USER_AGENT'];

    global $connection;
    $query = "INSERT INTO admin_sessions (";
    $query .= "  admin_id, session_id, device_name, user_os, browser, ip_address, status";
    $query .= ") VALUES (";
    $query .= "  '{$userid}', '{$mysession}', '{$machine_name}', '{$user_os}', '{$browser}', '{$myIP}','1' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    //echo '<script type="text/javascript">alert("' . $ipaddress . '")</script>';
    //$data_set = mysqli_query($connection, $query);
    // confirm_query($data_set);

    // return $data_set;
}

function check_active_sessions($userid)
{
    global $connection;
    $query = "SELECT Count('id') as TTL ";
    $query .= "FROM admin_sessions ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND status = 1 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

//se debe hacer una tabla donde se especifica el numero de logins concurrentes por cuenta
//se debe hacer una tabla en donde queda registrada la session iniciada por usuario.  esta
//debe tener la hora de inicio, hora de ultima operacion, nombre de maquina desde la cual
//se esta accediendo, ip si se pudiera,

//cuando un usuario haya "topado" su numero permitido de concurrencias, se le debe mandar a una
//pagina en donde se muestran las sesiones activas, dandole la oportunidad de cerrar alguna otra

function get_allowed_concurrent_sessions($userid)
{
    global $connection;
    $query = "SELECT maximum_sessions_allowed ";
    $query .= "FROM admins_concurrent_sessions ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND blocked = 0 AND status = 1 ";
    $query .= "Limit 1 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    //echo '<script type="text/javascript">alert("' . $data_set . '")</script>';

    return $data_set;
}

function check_existance_of_userid_allowed_sessions($userid)
{
    global $connection;
    $query = "SELECT Count('id') as TTL ";
    $query .= "FROM admins_concurrent_sessions ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND blocked = 0 AND status = 1 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';

    return $data_set;
}

function get_open_sessions($userid)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM admin_sessions ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND status = 1 ";
    $query .= "ORDER BY login_time DESC";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    //echo '<script type="text/javascript">alert("' . $data_set . '")</script>';

    return $data_set;
}

function is_my_session($userid, $sessionid)
{
    global $connection;
    $query = "SELECT COUNT(id) as TTL ";
    $query .= "FROM admin_sessions ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND session_id = '{$sessionid}' ";
    $query .= "AND status = 1 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    //echo '<script type="text/javascript">alert("desde funcion de verificacion : ' . session_id() . '")</script>';
    //echo '<script type="text/javascript">alert("' . $data_set . '")</script>';

    return $data_set;

}

function get_logged_admin_by_id($userid)
{
    global $connection;
    $query = "SELECT CONCAT(FIRSTNAME, ' ', LASTNAME) AS nombre ";
    $query .= "FROM admins ";
    $query .= "WHERE sede='{$userid}' ";
    //$query .= "ORDER BY firstname ASC";
    // echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;
}

function get_license_details($userid)
{
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM admin_license_cost ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND status = 1 ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
    //echo '<script type="text/javascript">alert("' . $data_set . '")</script>';

    return $data_set;
}

function get_admin_fullname_by_id($usrid)
{
    global $connection;
    $query = "SELECT CONCAT(FIRSTNAME, ' ', LASTNAME) AS nombre ";
    $query .= "FROM admins a ";
    $query .= "INNER JOIN admin_license_cost b ON b.added_by = a.id ";
    $query .= "WHERE b.added_by='{$usrid}' ";
    $query .= "LIMIT 1";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;

}

function get_admin_license_fullname_by_id($usrid)
{
    global $connection;
    $query = "SELECT CONCAT(FIRSTNAME, ' ', LASTNAME) AS nombre ";
    $query .= "FROM admins a ";
    $query .= "INNER JOIN admin_license_cost b ON b.admin_id = a.id ";
    $query .= "WHERE b.admin_id='{$usrid}' ";
    $query .= "LIMIT 1";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;

}

function get_disabled_users($userid)
{
    global $connection;
    $query = "SELECT blocked ";
    $query .= "FROM admins_concurrent_sessions ";
    $query .= "WHERE admin_id = '{$userid}' ";
    $query .= "AND status = '1' ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;

}

function block_user($licenseid)
{
    global $connection;
    $query = "UPDATE admins_concurrent_sessions ";
    $query .= "SET blocked = '1' "; // 1 inidicates that the license IS blocked: 0=NO; 1=YES.
    $query .= "WHERE admin_id = '{$licenseid}' ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
}

function unblock_user($licenseid)
{
    global $connection;
    $query = "UPDATE admins_concurrent_sessions ";
    $query .= "SET blocked = '0' "; // 1 inidicates that the license IS blocked: 0=NO; 1=YES.
    $query .= "WHERE admin_id = '{$licenseid}' ";
    echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);
}

function block_license($licenseid, $cantidad)
{
    global $connection;
    $query = "UPDATE admin_license_cost ";
    $query .= "SET status = '0' ";
    $query .= "WHERE id = '{$licenseid}' ";
    //$query .= "AND status = '1' ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    global $connection;
    $query = "UPDATE admins_concurrent_sessions ";
    $query .= "SET status = '{$cantidad}' ";
    $query .= "WHERE id = '{$licenseid}' ";
    //$query .= "AND status = '1' ";
    //echo '<script type="text/javascript">alert("' . $query . '")</script>';
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

}

function check_usr_status($licenseid)
{
    global $connection;
    $query = "SELECT blocked ";
    $query .= "FROM admins_concurrent_sessions ";
    $query .= "WHERE admin_id = '{$licenseid}' ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    return $data_set;

}

//--------------------------------------------------------------------------------
// informacion de navegacion DSCA 22/01/2020
//--------------------------------------------------------------------------------

function get_browser_name($user_agent)
{
    // Make case insensitive.
    $t = strtolower($user_agent);

    // If the string *starts* with the string, strpos returns 0 (i.e., FALSE). Do a ghetto hack and start with a space.
    // "[strpos()] may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE."
    //     http://php.net/manual/en/function.strpos.php
    $t = " " . $t;

    // Humans / Regular Users
    if (strpos($t, 'opera') || strpos($t, 'opr/')) {
        return 'Opera';
    } elseif (strpos($t, 'edge')) {
        return 'Edge';
    } elseif (strpos($t, 'chrome')) {
        return 'Chrome';
    } elseif (strpos($t, 'safari')) {
        return 'Safari';
    } elseif (strpos($t, 'firefox')) {
        return 'Firefox';
    } elseif (strpos($t, 'msie') || strpos($t, 'trident/7')) {
        return 'Internet Explorer';
    }

    // Search Engines
    elseif (strpos($t, 'google')) {
        return '[Bot] Googlebot';
    } elseif (strpos($t, 'bing')) {
        return '[Bot] Bingbot';
    } elseif (strpos($t, 'slurp')) {
        return '[Bot] Yahoo! Slurp';
    } elseif (strpos($t, 'duckduckgo')) {
        return '[Bot] DuckDuckBot';
    } elseif (strpos($t, 'baidu')) {
        return '[Bot] Baidu';
    } elseif (strpos($t, 'yandex')) {
        return '[Bot] Yandex';
    } elseif (strpos($t, 'sogou')) {
        return '[Bot] Sogou';
    } elseif (strpos($t, 'exabot')) {
        return '[Bot] Exabot';
    } elseif (strpos($t, 'msn')) {
        return '[Bot] MSN';
    }

    // Common Tools and Bots
    elseif (strpos($t, 'mj12bot')) {
        return '[Bot] Majestic';
    } elseif (strpos($t, 'ahrefs')) {
        return '[Bot] Ahrefs';
    } elseif (strpos($t, 'semrush')) {
        return '[Bot] SEMRush';
    } elseif (strpos($t, 'rogerbot') || strpos($t, 'dotbot')) {
        return '[Bot] Moz or OpenSiteExplorer';
    } elseif (strpos($t, 'frog') || strpos($t, 'screaming')) {
        return '[Bot] Screaming Frog';
    }

    // Miscellaneous
    elseif (strpos($t, 'facebook')) {
        return '[Bot] Facebook';
    } elseif (strpos($t, 'pinterest')) {
        return '[Bot] Pinterest';
    }

    // Check for strings commonly used in bot user agents
    elseif (strpos($t, 'crawler') || strpos($t, 'api') ||
        strpos($t, 'spider') || strpos($t, 'http') ||
        strpos($t, 'bot') || strpos($t, 'archive') ||
        strpos($t, 'info') || strpos($t, 'data')) {
        return '[Bot] Other';
    }

    return 'Other (Unknown)';
}

// function get_browser_name($user_agent)
// {
//     if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
//     elseif (strpos($user_agent, 'Edge')) return 'Edge';
//     elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
//     elseif (strpos($user_agent, 'Safari')) return 'Safari';
//     elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
//     elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

//     return 'Other';
// }

function getOS()
{

    global $user_agent;

    $os_platform = "Unknown OS Platform";

    $os_array = [
        '/windows nt 10/i'      => 'Windows 10',
        '/windows nt 6.3/i'     => 'Windows 8.1',
        '/windows nt 6.2/i'     => 'Windows 8',
        '/windows nt 6.1/i'     => 'Windows 7',
        '/windows nt 6.0/i'     => 'Windows Vista',
        '/windows nt 5.2/i'     => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     => 'Windows XP',
        '/windows xp/i'         => 'Windows XP',
        '/windows nt 5.0/i'     => 'Windows 2000',
        '/windows me/i'         => 'Windows ME',
        '/win98/i'              => 'Windows 98',
        '/win95/i'              => 'Windows 95',
        '/win16/i'              => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i'        => 'Mac OS 9',
        '/linux/i'              => 'Linux',
        '/ubuntu/i'             => 'Ubuntu',
        '/iphone/i'             => 'iPhone',
        '/ipod/i'               => 'iPod',
        '/ipad/i'               => 'iPad',
        '/android/i'            => 'Android',
        '/blackberry/i'         => 'BlackBerry',
        '/webos/i'              => 'Mobile',
    ];

    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }

    return $os_platform;
}

function getRealIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $_SERVER['REMOTE_ADDR'];
}

// function getUserIpAddr(){
//     if(!empty($_SERVER['HTTP_CLIENT_IP'])){
//         //ip from share internet
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
//         //ip pass from proxy
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }else{
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     return $ip;
// }

function get_mac()
{
    ob_start(); // Turn on output buffering
    system('ipconfig /all'); //Execute external program to display output
    $mycom = ob_get_contents(); // Capture the output into a variable
    ob_clean(); // Clean the output buffer

    $find_word = "Physical";
    $pmac      = strpos($mycom, $find_word); // Find the position of Physical text in array
    $mac       = substr($mycom, ($pmac + 36), 17); // Get Physical Address

    return $mac;
}

//echo '<script type="text/javascript">alert("' . get_mac() . '")</script>';
//$mac = system('arp -an');
//echo $mac;
//echo '<script type="text/javascript">alert("' . $mac . '")</script>';
