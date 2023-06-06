<?php

require_once "conexion.php";

$lugar=$_POST['lugar'];
$fecha=$_POST['fecha'];
$razon_social=$_POST['razon_social'];
$nombre_central_sucursal=$_POST['nombre_central_sucursal'];
$codigo_sucursal=$_POST['codigo_sucursal'];
$solicitante_primer_apellido=$_POST['solicitante_primer_apellido'];
$solicitante_segundo_apellido=$_POST['solicitante_segundo_apellido'];
$solicitante_tercer_apellido=$_POST['solicitante_tercer_apellido'];
$solicitante_primer_nombre=$_POST['solicitante_primer_nombre'];
$solicitante_segundo_nombre=$_POST['solicitante_segundo_nombre'];
$solicitante_tercer_nombre=$_POST['solicitante_tercer_nombre'];
$solicitante_razon_social=$_POST['solicitante_razon_social'];
$solicitante_direccion=$_POST['solicitante_direccion'];
$solicitante_zona=$_POST['solicitante_zona'];
$solicitante_pais=$_POST['solicitante_pais'];
$solicitante_departamento=$_POST['solicitante_departamento'];
$solicitante_municipio=$_POST['solicitante_municipio'];
$producto_solicitar=$_POST['producto_solicitar'];
$nombre_producto=$_POST['nombre_producto'];

$tipo_moneda=$_POST['tipo_moneda'];
$tipo_moneda_otra=$_POST['tipo_moneda_otra'];
if($tipo_moneda_otra){
    $tipo_moneda=$tipo_moneda_otra;
}

$identificacion_producto=$_POST['identificacion_producto'];
$monto_inicial_producto=$_POST['monto_inicial_producto'];
$monto_inicial_producto2=$_POST['monto_inicial_producto2'];
$destino_producto=$_POST['destino_producto'];

$procedencia_fondos=$_POST['procedencia_fondos'];
$procedencia_fondos_otra=$_POST['procedencia_fondos_otra'];
if($procedencia_fondos_otra){
    $procedencia_fondos=$procedencia_fondos_otra;
}

$traslado_fondos=$_POST['traslado_fondos'];
$traslado_fondos_nivel=$_POST['traslado_fondos_nivel'];
$otros_firmantes=$_POST['otros_firmantes'];


/*****************************************************GUARDAMOS LA INFORMACION EN LA TABLA anexo_productos_servicios***************************************************** */
$saveFormData = "INSERT INTO anexo_productos_servicios(lugar,fecha,razon_social,nombre_central_sucursal,codigo_sucursal,solicitante_primer_apellido,solicitante_segundo_apellido,
                solicitante_tercer_apellido,solicitante_primer_nombre,solicitante_segundo_nombre,solicitante_tercer_nombre,solicitante_razon_social,solicitante_direccion,
                solicitante_zona,solicitante_pais,solicitante_departamento,solicitante_municipio,producto_solicitar,nombre_producto,tipo_moneda,identificacion_producto,
                monto_inicial_producto,monto_inicial_producto2,destino_producto,procedencia_fondos,traslado_fondos,traslado_fondos_nivel,otros_firmantes)
                VALUES('$lugar','$fecha','$razon_social','$nombre_central_sucursal','$codigo_sucursal','$solicitante_primer_apellido','$solicitante_segundo_apellido',
                '$solicitante_tercer_apellido','$solicitante_primer_nombre','$solicitante_segundo_nombre','$solicitante_tercer_nombre','$solicitante_razon_social','$solicitante_direccion',
                '$solicitante_zona','$solicitante_pais','$solicitante_departamento','$solicitante_municipio','$producto_solicitar','$nombre_producto','$tipo_moneda',
                '$identificacion_producto','$monto_inicial_producto','$monto_inicial_producto2','$destino_producto','$procedencia_fondos','$traslado_fondos',
                '$traslado_fondos_nivel','$otros_firmantes')";
$execute = mysqli_query($connection, $saveFormData);

/*****************************************************GUARDAMOS LA INFORMACION EN LA TABLA anexo_productos_servicios***************************************************** */




 /*INICIA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA anexo_productos_servicios PARA GENERAR EL NUMERO DE FORMULARIO*/
 $obtenerId = "SELECT id FROM anexo_productos_servicios ORDER BY id DESC LIMIT 1";
 $executeId = mysqli_query($connection, $obtenerId);  
 $row = mysqli_fetch_array($executeId);


 $id=$row['id'];
 $base=0;
 $formularioNo=$id;
 /*FINALIZA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA anexo_productos_servicios PARA GENERAR EL NUMERO DE FORMULARIO*/




/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA anexo_productos_servicios  */
 $establecerFormularioNo="UPDATE anexo_productos_servicios SET Formulario_No='$formularioNo' WHERE id='$id'";
 $execute2=mysqli_query($connection, $establecerFormularioNo);
/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA anexo_productos_servicios  */

if($execute2){
    header('Location: home.php');
}else{
    echo 'Ocurrió un error mientras se guardaba la información, favor comunicarse con sistemas';
}

?>