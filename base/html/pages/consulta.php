<?php
include("conexion.php");
global $connection;
$consulta= "SELECT id,`url`,nombre,tiempo_revision_pagina FROM paginas";
$result_consulta=mysqli_query($connection,$consulta);
$resultados_array = array();
while ($fila = mysqli_fetch_assoc($result_consulta)) {
    $resultados_array[] = $fila;
}
echo json_encode($resultados_array);

//$consulta_pagina = mysqli_fetch_all($result,MYSQLI_ASSOC);
//return $consulta_pagina;



?>