<?php

require_once "conexion.php";


$lugar=$_POST['lugar'];
$fecha=$_POST['fecha'];
$razon_social=$_POST['razon_social'];
$nombre_central_sucursal=$_POST['nombre_central_sucursal'];
$codigo_agencia=$_POST['codigo_agencia'];
$persona_obligada_primer_apellido=$_POST['persona_obligada_primer_apellido'];
$persona_obligada_segundo_apellido=$_POST['persona_obligada_segundo_apellido'];
$persona_obligada_tercer_apellido=$_POST['persona_obligada_tercer_apellido'];
$persona_obligada_primer_nombre=$_POST['persona_obligada_primer_nombre'];
$persona_obligada_segundo_nombre=$_POST['persona_obligada_segundo_nombre'];
$persona_obligada_tercer_nombre=$_POST['persona_obligada_tercer_nombre'];
$persona_obligada_razon_social=$_POST['persona_obligada_razon_social'];
$persona_obligada_direccion_sede=$_POST['persona_obligada_direccion_sede'];
$persona_obligada_zona=$_POST['persona_obligada_zona'];
$persona_obligada_pais=$_POST['persona_obligada_pais'];
$persona_obligada_departamento=$_POST['persona_obligada_departamento'];
$persona_obligada_municipio=$_POST['persona_obligada_municipio'];

$relacion_solicitante=$_POST['relacion_solicitante'];
// $relacion_solicitante_otra=$_POST['relacion_solicitante_otra'];
// if($relacion_solicitante_otra){
//     $relacion_solicitante=$relacion_solicitante_otra;
// }

$personal_individual_primer_apellido=$_POST['personal_individual_primer_apellido'];
$personal_individual_segundo_apellido=$_POST['personal_individual_segundo_apellido'];
$personal_individual_tercer_apellido=$_POST['personal_individual_tercer_apellido'];
$personal_individual_primer_nombre=$_POST['personal_individual_primer_nombre'];
$personal_individual_segundo_nombre=$_POST['personal_individual_segundo_nombre'];
$personal_individual_tercer_nombre=$_POST['personal_individual_tercer_nombre'];
$personal_individual_fechaNacimiento=$_POST['personal_individual_fechaNacimiento'];
$personal_individual_nacionalidad=$_POST['personal_individual_nacionalidad'];
$personal_individual_nacionalidad_otra=$_POST['personal_individual_nacionalidad_otra'];
$personal_individual_lugarNacimiento=$_POST['personal_individual_lugarNacimiento'];

$personal_individual_condicion_migratoria=$_POST['personal_individual_condicion_migratoria'];
// $personal_individual_condicion_migratoria_otra=$_POST['personal_individual_condicion_migratoria_otra'];
// if($personal_individual_condicion_migratoria_otra){
//     $personal_individual_condicion_migratoria=$personal_individual_condicion_migratoria_otra;
// }

$persona_individual_genero=$_POST['persona_individual_genero'];
$persona_individual_estadoCivil=$_POST['persona_individual_estadoCivil'];
$persona_individual_profesion=$_POST['persona_individual_profesion'];
$persona_individual_tipoDoc=$_POST['persona_individual_tipoDoc'];
$persona_individual_noIdentificacion=$_POST['persona_individual_noIdentificacion'];
$persona_individual_emision_pais=$_POST['persona_individual_emision_pais'];
$persona_individual_emision_departamento=$_POST['persona_individual_emision_departamento'];
$persona_individual_emision_municipio=$_POST['persona_individual_emision_municipio'];
$persona_individual_nit=$_POST['persona_individual_nit'];
$persona_individual_telefono=$_POST['persona_individual_telefono'];
$persona_individual_celular=$_POST['persona_individual_celular'];
$persona_individual_email=$_POST['persona_individual_email'];
$persona_individual_direccion=$_POST['persona_individual_direccion'];
$persona_individual_zona=$_POST['persona_individual_zona'];
$persona_individual_pais=$_POST['persona_individual_pais'];
$persona_individual_departamento=$_POST['persona_individual_departamento'];
$persona_individual_municipio=$_POST['persona_individual_municipio'];
$expuesto_pep=$_POST['expuesto_pep'];
$parentesco_pep=$_POST['parentesco_pep'];
$asociado_pep=$_POST['asociado_pep'];
$persona_juridica_razon_social=$_POST['persona_juridica_razon_social'];
$escritura_publica_numero=$_POST['escritura_publica_numero'];
$escritura_publica_folio=$_POST['escritura_publica_folio'];
$escritura_publica_libro=$_POST['escritura_publica_libro'];
$escritura_publica_expedienteNo=$_POST['escritura_publica_expedienteNo'];
$patente_numero=$_POST['patente_numero'];
$patente_folio=$_POST['patente_folio'];
$patente_libro=$_POST['patente_libro'];
$patente_expedienteNo=$_POST['patente_expedienteNo'];
$sede_social_direccion=$_POST['sede_social_direccion'];
$sede_social_pais=$_POST['sede_social_pais'];
$sede_social_zona=$_POST['sede_social_zona'];
$sede_social_departamento=$_POST['sede_social_departamento'];
$sede_social_municipio=$_POST['sede_social_municipio'];
$sede_social_nit=$_POST['sede_social_nit'];




/**********************ITEMS*****************/
$escritura_numero=$_POST['escritura_numero'];
$escritura_fecha=$_POST['escritura_fecha'];
$escritura_notario_autorizo=$_POST['escritura_notario_autorizo'];
/**********************ITEMS*****************/




/*************************************INICIA INSERTAR DATOS DEL FORMULARIO A LA TABLA anexo_beneficiarios *************************************/
$saveFormData = "INSERT INTO anexo_beneficiarios(lugar,fecha,razon_social,nombre_central_sucursal,codigo_agencia,persona_obligada_primer_apellido,
            persona_obligada_segundo_apellido,persona_obligada_tercer_apellido,persona_obligada_primer_nombre,persona_obligada_segundo_nombre,persona_obligada_tercer_nombre,
            persona_obligada_razon_social,persona_obligada_direccion_sede,persona_obligada_zona,persona_obligada_pais,persona_obligada_departamento,persona_obligada_municipio,
            relacion_solicitante,personal_individual_primer_apellido,personal_individual_segundo_apellido,personal_individual_tercer_apellido,personal_individual_primer_nombre,
            personal_individual_segundo_nombre,personal_individual_tercer_nombre,personal_individual_fechaNacimiento,personal_individual_nacionalidad,personal_individual_nacionalidad_otra,
            personal_individual_lugarNacimiento,personal_individual_condicion_migratoria,persona_individual_genero,persona_individual_estadoCivil,persona_individual_profesion,
            persona_individual_tipoDoc,persona_individual_noIdentificacion,persona_individual_emision_pais,persona_individual_emision_departamento,
            persona_individual_emision_municipio,persona_individual_nit,persona_individual_telefono,persona_individual_celular,persona_individual_email,
            persona_individual_direccion,persona_individual_zona,persona_individual_pais,persona_individual_departamento,persona_individual_municipio,
            expuesto_pep,parentesco_pep,asociado_pep,persona_juridica_razon_social,escritura_publica_numero,escritura_publica_folio,escritura_publica_libro,
            escritura_publica_expedienteNo,patente_numero,patente_folio,patente_libro,patente_expedienteNo,sede_social_direccion,sede_social_pais,sede_social_zona,
            sede_social_departamento,sede_social_municipio,sede_social_nit)
                VALUES('$lugar','$fecha','$razon_social','$nombre_central_sucursal','$codigo_agencia','$persona_obligada_primer_apellido','$persona_obligada_segundo_apellido',
                '$persona_obligada_tercer_apellido','$persona_obligada_primer_nombre','$persona_obligada_segundo_nombre','$persona_obligada_tercer_nombre','$persona_obligada_razon_social',
                '$persona_obligada_direccion_sede','$persona_obligada_zona','$persona_obligada_pais','$persona_obligada_departamento','$persona_obligada_municipio','$relacion_solicitante',
                '$personal_individual_primer_apellido','$personal_individual_segundo_apellido','$personal_individual_tercer_apellido','$personal_individual_primer_nombre',
                '$personal_individual_segundo_nombre','$personal_individual_tercer_nombre','$personal_individual_fechaNacimiento','$personal_individual_nacionalidad',
                '$personal_individual_nacionalidad_otra','$personal_individual_lugarNacimiento','$personal_individual_condicion_migratoria','$persona_individual_genero',
                '$persona_individual_estadoCivil','$persona_individual_profesion','$persona_individual_tipoDoc','$persona_individual_noIdentificacion','$persona_individual_emision_pais',
                '$persona_individual_emision_departamento','$persona_individual_emision_municipio','$persona_individual_nit','$persona_individual_telefono',
                '$persona_individual_celular','$persona_individual_email','$persona_individual_direccion','$persona_individual_zona','$persona_individual_pais','$persona_individual_departamento',
                '$persona_individual_municipio','$expuesto_pep','$parentesco_pep','$asociado_pep','$persona_juridica_razon_social','$escritura_publica_numero',
                '$escritura_publica_folio','$escritura_publica_libro','$escritura_publica_expedienteNo','$patente_numero','$patente_folio','$patente_libro',
                '$patente_expedienteNo','$sede_social_direccion','$sede_social_pais','$sede_social_zona','$sede_social_departamento','$sede_social_municipio','$sede_social_nit')";
$execute = mysqli_query($connection, $saveFormData);


/*************************************INICIA INSERTAR DATOS DEL FORMULARIO A LA TABLA anexo_beneficiarios *************************************/






/*INICIA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA anexo_beneficiarios PARA GENERAR EL NUMERO DE FORMULARIO*/
$obtenerId = "SELECT id FROM anexo_beneficiarios ORDER BY id DESC LIMIT 1";
$executeId = mysqli_query($connection, $obtenerId);  
$row = mysqli_fetch_array($executeId);


$id=$row['id'];
$base=0;
$formularioNo=$id;
/*FINALIZA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA anexo_beneficiarios PARA GENERAR EL NUMERO DE FORMULARIO*/





/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA anexo_beneficiarios  */
$establecerFormularioNo="UPDATE anexo_beneficiarios SET Formulario_No='$formularioNo' WHERE id='$id'";
$execute2=mysqli_query($connection, $establecerFormularioNo);
/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA anexo_beneficiarios  */




/* GUARDAMOS LOS ITEMS EN LA TABLA  anexo_beneficiarios_items_escritura  */
$longItems = count($escritura_numero);
for($i=0; $i < $longItems; $i ++){

    $saveItems = "INSERT INTO anexo_beneficiarios_items_escritura (Formulario_No,escritura_numero,escritura_fecha,escritura_notario_autorizo) 
        VALUE('$formularioNo','$escritura_numero[$i]','$escritura_fecha[$i]','$escritura_notario_autorizo[$i]')";
    $executeItems = mysqli_query($connection, $saveItems);
}

/* GUARDAMOS LOS ITEMS EN LA TABLA  anexo_beneficiarios_items_escritura  */



if($executeItems){
    header('Location: home.php');
}else{
    echo "¡hubo un error mientras se guardaba la data, comunicarse con sistemas!";
}



?>