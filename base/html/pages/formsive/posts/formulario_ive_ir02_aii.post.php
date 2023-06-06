<?php
require_once "conexion.php";

$lugar=$_POST['lugar'];
$fecha=$_POST['fecha'];
$razon_social=$_POST['razon_social'];
$nombre_central_sucursal=$_POST['nombre_central_sucursal'];
$codigo_sucursual=$_POST['codigo_sucursual'];
$primer_apellido_representante=$_POST['primer_apellido_representante'];
$segundo_apellido_representante=$_POST['segundo_apellido_representante'];
$otro_apellido_representante=$_POST['otro_apellido_representante'];
$primer_nombre_representante=$_POST['primer_nombre_representante'];
$segundo_nombre_representante=$_POST['segundo_nombre_representante'];
$otro_nombre_representante=$_POST['otro_nombre_representante'];
$razon_social2=$_POST['razon_social2'];
$direccion_sede=$_POST['direccion_sede'];
$direccion_zona=$_POST['direccion_zona'];
$direccion_pais=$_POST['direccion_pais'];
$direccion_departamento=$_POST['direccion_departamento'];
$direccion_municipio=$_POST['direccion_municipio'];
$relacion_con_titular=$_POST['relacion_con_titular'];
$otros_firmantes_primer_apellido=$_POST['otros_firmantes_primer_apellido'];
$otros_firmantes_segundo_apellido=$_POST['otros_firmantes_segundo_apellido'];
$otros_firmantes_tercer_apellido=$_POST['otros_firmantes_tercer_apellido'];
$otros_firmantes_primer_nombre=$_POST['otros_firmantes_primer_nombre'];
$otros_firmantes_segundo_nombre=$_POST['otros_firmantes_segundo_nombre'];
$otros_firmantes_tercer_nombre=$_POST['otros_firmantes_tercer_nombre'];
$otros_firmantes_fecha_nacimiento=$_POST['otros_firmantes_fecha_nacimiento'];
$otros_firmantes_nacionalidad=$_POST['otros_firmantes_nacionalidad'];
$otros_firmantes_otra_nacionalidad=$_POST['otros_firmantes_otra_nacionalidad'];
$otros_firmantes_lugar_nacimiento=$_POST['otros_firmantes_lugar_nacimiento'];
$otros_firmantes_condicion_migratoria=$_POST['otros_firmantes_condicion_migratoria'];
$otros_firmantes_genero=$_POST['otros_firmantes_genero'];
$otros_firmantes_estado_civil=$_POST['otros_firmantes_estado_civil'];
$otros_firmantes_profesion_oficio=$_POST['otros_firmantes_profesion_oficio'];
$otros_firmantes_tipo_identificacion=$_POST['otros_firmantes_tipo_identificacion'];
$otros_firmantes_documento_numero=$_POST['otros_firmantes_documento_numero'];
$otros_firmantes_lugar_emision_pais=$_POST['otros_firmantes_lugar_emision_pais'];
$otros_firmantes_lugar_emision_departamento=$_POST['otros_firmantes_lugar_emision_departamento'];
$otros_firmantes_lugar_emision_municipio=$_POST['otros_firmantes_lugar_emision_municipio'];
$otros_firmantes_nit=$_POST['otros_firmantes_nit'];
$otros_firmantes_telefono=$_POST['otros_firmantes_telefono'];
$otros_firmantes_celular=$_POST['otros_firmantes_celular'];
$otros_firmantes_email=$_POST['otros_firmantes_email'];
$otros_firmantes_direccion=$_POST['otros_firmantes_direccion'];
$otros_firmantes_direccion_zona=$_POST['otros_firmantes_direccion_zona'];
$otros_firmantes_direccion_pais=$_POST['otros_firmantes_direccion_pais'];
$otros_firmantes_direccion_departamento=$_POST['otros_firmantes_direccion_departamento'];
$otros_firmantes_direccion_municipio=$_POST['otros_firmantes_direccion_municipio'];
$otros_firmantes_pep=$_POST['otros_firmantes_pep'];
$otros_firmantes_parentezco_pep=$_POST['otros_firmantes_parentezco_pep'];
$otros_firmantes_cercano_pep=$_POST['otros_firmantes_cercano_pep'];

$estado='ACTIVO';



/*************************************INICIA INSERTAR DATOS DEL FORMULARIO A LA TABLA anexo_otros_firmantes *************************************/

$camposFormulario = "INSERT INTO anexo_otros_firmantes (lugar, fecha, razon_social, nombre_central_sucursal, codigo_sucursual, primer_apellido_representante,
segundo_apellido_representante, otro_apellido_representante, primer_nombre_representante, segundo_nombre_representante, otro_nombre_representante, razon_social2,
direccion_sede, direccion_zona, direccion_pais, direccion_departamento, direccion_municipio, relacion_con_titular, otros_firmantes_primer_apellido,
otros_firmantes_segundo_apellido, otros_firmantes_tercer_apellido, otros_firmantes_primer_nombre, otros_firmantes_segundo_nombre, otros_firmantes_tercer_nombre,
otros_firmantes_fecha_nacimiento, otros_firmantes_nacionalidad, otros_firmantes_otra_nacionalidad, otros_firmantes_lugar_nacimiento, otros_firmantes_condicion_migratoria,
otros_firmantes_genero, otros_firmantes_estado_civil, otros_firmantes_profesion_oficio, otros_firmantes_tipo_identificacion, otros_firmantes_documento_numero,
otros_firmantes_lugar_emision_pais, otros_firmantes_lugar_emision_departamento, otros_firmantes_lugar_emision_municipio, otros_firmantes_nit, otros_firmantes_telefono,
otros_firmantes_celular, otros_firmantes_email, otros_firmantes_direccion, otros_firmantes_direccion_zona, otros_firmantes_direccion_pais,
otros_firmantes_direccion_departamento, otros_firmantes_direccion_municipio, otros_firmantes_pep, otros_firmantes_parentezco_pep, otros_firmantes_cercano_pep, estado)
VALUES ('$lugar','$fecha','$razon_social','$nombre_central_sucursal','$codigo_sucursual','$primer_apellido_representante','$segundo_apellido_representante','$otro_apellido_representante',
'$primer_nombre_representante','$segundo_nombre_representante','$otro_nombre_representante','$razon_social2','$direccion_sede','$direccion_zona','$direccion_pais','$direccion_departamento',
'$direccion_municipio','$relacion_con_titular','$otros_firmantes_primer_apellido','$otros_firmantes_segundo_apellido','$otros_firmantes_tercer_apellido','$otros_firmantes_primer_nombre',
'$otros_firmantes_segundo_nombre','$otros_firmantes_tercer_nombre','$otros_firmantes_fecha_nacimiento','$otros_firmantes_nacionalidad','$otros_firmantes_otra_nacionalidad','$otros_firmantes_lugar_nacimiento',
'$otros_firmantes_condicion_migratoria','$otros_firmantes_genero','$otros_firmantes_estado_civil','$otros_firmantes_profesion_oficio','$otros_firmantes_tipo_identificacion','$otros_firmantes_documento_numero',
'$otros_firmantes_lugar_emision_pais','$otros_firmantes_lugar_emision_departamento','$otros_firmantes_lugar_emision_municipio','$otros_firmantes_nit','$otros_firmantes_telefono',
'$otros_firmantes_celular','$otros_firmantes_email','$otros_firmantes_direccion','$otros_firmantes_direccion_zona','$otros_firmantes_direccion_pais','$otros_firmantes_direccion_departamento',
'$otros_firmantes_direccion_municipio','$otros_firmantes_pep','$otros_firmantes_parentezco_pep','$otros_firmantes_cercano_pep','$estado')";
$executed = mysqli_query($connection, $camposFormulario);

/*************************************FINALIZA INSERTAR DATOS DEL FORMULARIO A LA TABLA anexo_otros_firmantes *************************************/





/*INICIA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA anexo_otros_firmantes PARA GENERAR EL NUMERO DE FORMULARIO*/
$obtenerId = "SELECT id FROM anexo_otros_firmantes ORDER BY id DESC LIMIT 1";
$executeId = mysqli_query($connection, $obtenerId);  
$row = mysqli_fetch_array($executeId);


  $id=$row['id'];
  $base=0;
  $formularioNo=$id;
/*FINALIZA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA anexo_otros_firmantes PARA GENERAR EL NUMERO DE FORMULARIO*/





/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA formulario_iveir2  */
$establecerFormularioNo="UPDATE anexo_otros_firmantes SET Formulario_No='$formularioNo' WHERE id='$id'";
$executed2=mysqli_query($connection, $establecerFormularioNo);
/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA formulario_iveir2  */




if($executed2){
    header('Location: formulario_ive_ir02_aii.php');
}else{
    echo 'error guardando la información, por favor comunicarse con soporte';
}

?>