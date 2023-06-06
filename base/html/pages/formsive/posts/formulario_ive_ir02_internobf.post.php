<?php

require_once "conexion.php";

$lugar=$_POST['lugar'];
$fecha=$_POST['fecha'];
$razon_social=$_POST['razon_social'];
$nombre_comercial=$_POST['nombre_comercial'];
$nit=$_POST['nit'];
$pais_constitucion=$_POST['pais_constitucion'];
$tipo_sociedad=$_POST['tipo_sociedad'];
$direccion_completa=$_POST['direccion_completa'];
$datos_personales_nombre_completo=$_POST['datos_personales_nombre_completo'];
$datos_personales_tipo_documento=$_POST['datos_personales_tipo_documento'];
$datos_personales_numero_documento=$_POST['datos_personales_numero_documento'];
$datos_personales_pais=$_POST['datos_personales_pais'];
$datos_personales_nacionalidad=$_POST['datos_personales_nacionalidad'];
$datos_personales_pais_nacimiento=$_POST['datos_personales_pais_nacimiento'];
$datos_personales_porcentaje_acciones=$_POST['datos_personales_porcentaje_acciones'];
$datos_personales_direccion=$_POST['datos_personales_direccion'];
$datos_personales_otraNacionalidad=$_POST['datos_personales_otraNacionalidad'];
$datos_personales_fechaNacimiento=$_POST['datos_personales_fechaNacimiento'];
$datos_personales_telefono=$_POST['datos_personales_telefono'];


/*************************************INICIA INSERTAR DATOS DEL FORMULARIO A LA TABLA  declaracion_jurada_participacion*************************************/
$saveFormData = "INSERT INTO declaracion_jurada_participacion(lugar,fecha,razon_social,nombre_comercial,nit,pais_constitucion,tipo_sociedad,direccion_completa,
                datos_personales_nombre_completo,datos_personales_tipo_documento,datos_personales_numero_documento,datos_personales_pais,datos_personales_nacionalidad,
                datos_personales_pais_nacimiento,datos_personales_porcentaje_acciones,datos_personales_direccion,datos_personales_otraNacionalidad,
                datos_personales_fechaNacimiento,datos_personales_telefono)
                VALUE('$lugar','$fecha','$razon_social','$nombre_comercial','$nit','$pais_constitucion','$tipo_sociedad','$direccion_completa','$datos_personales_nombre_completo',
                '$datos_personales_tipo_documento','$datos_personales_numero_documento','$datos_personales_pais','$datos_personales_nacionalidad','$datos_personales_pais_nacimiento',
                '$datos_personales_porcentaje_acciones','$datos_personales_direccion','$datos_personales_otraNacionalidad','$datos_personales_fechaNacimiento','$datos_personales_telefono')";
$execute = mysqli_query($connection, $saveFormData);
/*************************************INICIA INSERTAR DATOS DEL FORMULARIO A LA TABLA  declaracion_jurada_participacion*************************************/



/*INICIA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA declaracion_jurada_participacion PARA GENERAR EL NUMERO DE FORMULARIO*/
$obtenerId = "SELECT id FROM declaracion_jurada_participacion ORDER BY id DESC LIMIT 1";
$executeId = mysqli_query($connection, $obtenerId);  
$row = mysqli_fetch_array($executeId);


$id=$row['id'];
$base=0;
$formularioNo=$id;
/*FINALIZA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA declaracion_jurada_participacion PARA GENERAR EL NUMERO DE FORMULARIO*/





/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA declaracion_jurada_participacion  */
$establecerFormularioNo="UPDATE declaracion_jurada_participacion SET Formulario_No='$formularioNo' WHERE id='$id'";
$execute2=mysqli_query($connection, $establecerFormularioNo);
/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA declaracion_jurada_participacion  */

if($execute2){
    header('Location: home.php');
}else{
    echo 'Ocurrió un error mientras se guardaba la información, favor comunicarse con sistemas';
}


?>