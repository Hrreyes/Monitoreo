<?php

require_once "../../../assets/db_connection.php";
require_once "../../../assets/functions.php";

// GET VARS
$id      = $_GET['id'];
$tx_data = get_dua_transmit_by_id($id);
while ($db_var = mysqli_fetch_assoc($tx_data)) {
    $tx_id        = $db_var["id"];
    $tx_agente    = $db_var["agente"];
    $tx_exp       = $db_var["exp_id"];
    $tx_counter   = $db_var["counter"];
    $tx_timestamp = $db_var["timestamp"];
    $tx_status    = $db_var["status"];
    $duca_number  = get_dua_number_for_exp($tx_exp);
}

if ($tx_agente == 304) {
    // FTP TX SERVER VARS INITs
    $ftp_server   = "ftp.artbiterstudios.com";
    $ftp_username = "corsinsa";
    $ftp_userpass = "cor\$in\$a202o";
    // $ftp_server   = "www.corsinsa.com";
    // $ftp_username = "consu@corsinsa.com";
    // $ftp_userpass = "vtldkp1zimg1";
} else {
    // FTP TX SERVER VARS INIT
    $ftp_server   = "192.168.10.18";
    $ftp_username = "poliza204";
    $ftp_userpass = "Consultores17++";
}

// set up a connection to the server we chose or die and show an error
$ftp_conn = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
$login    = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

$path             = "dua/"; // the path where the file is located
$file             = "D" . $tx_agente . $tx_exp . $tx_counter . ".err"; // the file you are looking for
$check_file_exist = $path . $file; // combine string for easy use
$local_file       = "../ducas-xml-rx/" . $file; // set name to ftp_get local file

$contents_on_server = ftp_nlist($ftp_conn, $path); //Returns an array of filenames from the specified directory on success or FALSE on error.

// Test if file is in the ftp_nlist array
// if (in_array($file, $contents_on_server)) {
echo "<strong>Se encontro </strong>" . $check_file_exist . "  <strong>path</strong>: " . $path;

// download server file
if (ftp_get($ftp_conn, $local_file, $check_file_exist, FTP_ASCII)) {
    echo "Successfully written to $local_file.";
    // fetch file
    $xml = file_get_contents('../ducas-xml-rx/' . $file);
    // get values
    $xml_status  = getStringBetween($xml, "<RESPUESTA_VALIDACION>", "</RESPUESTA_VALIDACION>");
    $xml_errores = getStringBetween($xml, "<ERRORES>", "</ERRORES>");
    $xml_firma   = getStringBetween($xml, "<FIRMA_ELECTRONICA>", "</FIRMA_ELECTRONICA>");
    $xml_fecha   = getStringBetween($xml, "<FECHA_TRANSMISION>", "</FECHA_TRANSMISION>");
    $xml_no_duca = getStringBetween($xml, "<NUMERO_DUCA>", "</NUMERO_DUCA>");
    // format date for db
    $xml_fecha = str_replace("/", "", $xml_fecha);
    $xml_fecha = str_replace(" ", "", $xml_fecha);
    $xml_fecha = str_replace(":", "", $xml_fecha);

    if ($xml_status == "RECHAZADA" || strlen($xml_errores) > 1) {
        $query = "UPDATE DUA_TX SET ";
        $query .= "status = '2' ";
        $query .= "WHERE id = {$tx_id} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);
    } else {
        $query = "UPDATE DUA_TX SET ";
        $query .= "status = '3' ";
        $query .= "WHERE id = {$tx_id} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);

        $query = "UPDATE DUA_POLIZA SET ";
        $query .= "DUCA_POLIZA = '{$xml_no_duca}', ";
        $query .= "FECHA_ACEPTACION = '{$xml_fecha}', ";
        $query .= "FIRMA = '{$xml_firma}' ";
        $query .= "WHERE exp_id = {$tx_exp} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);
    }

    if (strlen($xml_errores) > 1) {
        $_SESSION["message"] = "ERRORES TX: " . $xml_errores;
    }
    // go back to tx
    redirect_to("expediente-3.php?id=$tx_exp");
} else {
    echo "Error downloading $server_file.";
}

// } else {
// echo "  <strong> ESPERANDO RESPUESTA </strong>" . $check_file_exist;
//}
;

//     remember to always close your ftp connection
ftp_close($ftp_conn);
