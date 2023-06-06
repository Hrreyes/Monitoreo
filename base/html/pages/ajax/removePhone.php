<?php
require_once "../conexion.php";
global $connection;
$id= $_REQUEST['id'];

$query = "DELETE FROM feic_informacion_general_telefonos WHERE id =$id";
$result = mysqli_query($connection, $query);
return $result;


?>