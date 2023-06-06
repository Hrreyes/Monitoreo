<?php

require_once "conexion.php";



$lugar=$_POST['lugar'];
$fecha=$_POST['fecha'];	
$razon_social=$_POST['razon_social'];	
$nombre_central_sucursal=$_POST['nombre_central_sucursal'];	
$codigo_sucursual=$_POST['codigo_sucursual'];	
$datos_personales=$_POST['datos_personales'];	
$representa_primer_apellido=$_POST['representa_primer_apellido'];	
$representa_segundo_apellido=$_POST['representa_segundo_apellido'];	
$representa_tercer_apellido=$_POST['representa_tercer_apellido'];	
$representa_primer_nombre=$_POST['representa_primer_nombre'];	
$representa_segundo_nombre=$_POST['representa_segundo_nombre'];	
$representa_tercer_nombre=$_POST['representa_tercer_nombre'];	
$representa_lugar_nacimiento=$_POST['representa_lugar_nacimiento'];	
$espersona_expuestapep=$_POST['espersona_expuestapep'];	
$condicion_pep=$_POST['condicion_pep'];	
$nombre_institucion_trabajo_pep=$_POST['nombre_institucion_trabajo_pep'];	
$puesto_institucion_trabajo_pep=$_POST['puesto_institucion_trabajo_pep'];	
$pais_institucion_trabajo_pep=$_POST['pais_institucion_trabajo_pep'];	

$origen_riqueza_pep=$_POST['origen_riquezapep'];	
$origen_riquezapep_otro=$_POST['origen_riquezapep_otro'];

if($origen_riquezapep_otro){
    $origen_riqueza_pep=$origen_riquezapep_otro;
}

$tiene_parentesco_pep=$_POST['tiene_parentesco_pep'];

$indicar_parentezco=$_POST['indicar_parentezco'];	
$indicar_parentezco_otros=$_POST['indicar_parentezco_otros'];

if($indicar_parentezco_otros){
    $indicar_parentezco=$indicar_parentezco_otros;
}
	
$condicion_pep2=$_POST['condicion_pep2'];	
$representa_primer_apellido_pep=$_POST['representa_primer_apellido_pep'];	
$representa_segundo_apellido_pep=$_POST['representa_segundo_apellido_pep'];	
$representa_tercer_apellido_pep=$_POST['representa_tercer_apellido_pep'];	
$representa_primer_nombre_pep=$_POST['representa_primer_nombre_pep'];
$representa_segundo_nombre_pep=$_POST['representa_segundo_nombre_pep'];	
$representa_tercer_nombre_pep=$_POST['representa_tercer_nombre_pep'];	
$genero=$_POST['genero'];	
$nombre_institucion_trabajo_pep2=$_POST['nombre_institucion_trabajo_pep2'];	
$puesto_institucion_trabajo_pep2=$_POST['puesto_institucion_trabajo_pep2'];	
$pais_institucion_trabajo_pep2=$_POST['pais_institucion_trabajo_pep2'];	
$parentesco_pep=$_POST['parentesco_pep'];	

$indicar_parentesco=$_POST['indicar_parentesco'];
$indicar_parentesco_otro=$_POST['indicar_parentesco_otro'];

$indicar_parentesco_condicion=$_POST['indicar_parentesco_condicion'];	
$parentesco_primer_apellido=$_POST['parentesco_primer_apellido'];	
$parentesco_segundo_apellido=$_POST['parentesco_segundo_apellido'];	
$parentesco_tercer_apellido=$_POST['parentesco_tercer_apellido'];	
$parentesco_primer_nombre=$_POST['parentesco_primer_nombre'];	
$parentesco_segundo_nombre=$_POST['parentesco_segundo_nombre'];	
$parentesco_tercer_nombre=$_POST['parentesco_tercer_nombre'];	
$parentesco_genero=$_POST['parentesco_genero'];	
$parentesco_institucion_trabaja=$_POST['parentesco_institucion_trabaja'];	
$parentesco_institucion_puesto=$_POST['parentesco_institucion_puesto'];	
$parentesco_institucion_pais=$_POST['parentesco_institucion_pais'];


/*************************************INICIA INSERTAR DATOS DEL FORMULARIO A LA TABLA pep *************************************/
$saveForm="INSERT INTO pep (lugar,fecha,razon_social,nombre_central_sucursal,codigo_sucursual,datos_personales,representa_primer_apellido,representa_segundo_apellido,
representa_tercer_apellido,representa_primer_nombre,representa_segundo_nombre,representa_tercer_nombre,representa_lugar_nacimiento,espersona_expuestapep,condicion_pep,
nombre_institucion_trabajo_pep,puesto_institucion_trabajo_pep,pais_institucion_trabajo_pep,origen_riqueza_pep,tiene_parentesco_pep,indicar_parentezco,condicion_pep2,
representa_primer_apellido_pep,representa_segundo_apellido_pep,representa_tercer_apellido_pep,representa_primer_nombre_pep,representa_segundo_nombre_pep,representa_tercer_nombre_pep,
genero,nombre_institucion_trabajo_pep2,puesto_institucion_trabajo_pep2,pais_institucion_trabajo_pep2,parentesco_pep,indicar_parentesco,indicar_parentesco_condicion,
parentesco_primer_apellido,parentesco_segundo_apellido,parentesco_tercer_apellido,parentesco_primer_nombre,parentesco_segundo_nombre,parentesco_tercer_nombre,
parentesco_genero,parentesco_institucion_trabaja,parentesco_institucion_puesto,parentesco_institucion_pais) VALUES('$lugar','$fecha','$razon_social','$nombre_central_sucursal','$codigo_sucursual','$datos_personales','$representa_primer_apellido','$representa_segundo_apellido',
'$representa_tercer_apellido','$representa_primer_nombre','$representa_segundo_nombre','$representa_tercer_nombre','$representa_lugar_nacimiento','$espersona_expuestapep','$condicion_pep',
'$nombre_institucion_trabajo_pep','$puesto_institucion_trabajo_pep','$pais_institucion_trabajo_pep','$origen_riqueza_pep','$tiene_parentesco_pep','$indicar_parentezco','$condicion_pep2',
'$representa_primer_apellido_pep','$representa_segundo_apellido_pep','$representa_tercer_apellido_pep','$representa_primer_nombre_pep','$representa_segundo_nombre_pep','$representa_tercer_nombre_pep',
'$genero','$nombre_institucion_trabajo_pep2','$puesto_institucion_trabajo_pep2','$pais_institucion_trabajo_pep2','$parentesco_pep','$indicar_parentesco','$indicar_parentesco_condicion',
'$parentesco_primer_apellido','$parentesco_segundo_apellido','$parentesco_tercer_apellido','$parentesco_primer_nombre','$parentesco_segundo_nombre','$parentesco_tercer_nombre',
'$parentesco_genero','$parentesco_institucion_trabaja','$parentesco_institucion_puesto','$parentesco_institucion_pais')";

$execute = mysqli_query($connection, $saveForm);
/*************************************FINALIZA INSERTAR DATOS DEL FORMULARIO A LA TABLA pep *************************************/





/*INICIA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA pep PARA GENERAR EL NUMERO DE FORMULARIO*/
$obtenerId = "SELECT id FROM pep ORDER BY id DESC LIMIT 1";
$executeId = mysqli_query($connection, $obtenerId);  
$row = mysqli_fetch_array($executeId);


$id=$row['id'];
$base=0;
$formularioNo=$id;
/*FINALIZA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA pep PARA GENERAR EL NUMERO DE FORMULARIO*/





/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA pep  */
$establecerFormularioNo="UPDATE pep SET Formulario_No='$formularioNo' WHERE id='$id'";
$execute2=mysqli_query($connection, $establecerFormularioNo);
/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA pep  */

if($execute2){
    header('Location: home.php');
}else{
    echo "¡hubo un error mientras se guardaba la data, comunicarse con sistemas!";
}
?>