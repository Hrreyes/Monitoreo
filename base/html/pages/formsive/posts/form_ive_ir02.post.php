<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 include("header.php");
 require_once "funciones.php";

require_once "conexion.php";


$nit=$_POST['nit']; // nit
$lugar=$_POST['vlugar'];  // lugar
$fecha=$_POST['vfecha']; //fecha
$razon_social_nombre_comercial=$_POST['vrazon_social']; //razon_social
$nombre_central_sucursal=$_POST['vnombre_central_sucursal']; //nombre_central_sucursal
$codigo_sucursal=$_POST['vcodigo_sucursual']; //codigo_sucursal



/*cambia el valor de la variable si viene con 'Otra' y le asigna el valor correcto*/
$tipo_sociedad=$_POST['vtipo_sociedad']; //tipo_sociedad
$otro_tipo_sociedad=$_POST['otro_tipo_sociedad']; 
if($tipo_sociedad=='Otra'){
    $tipo_sociedad=$otro_tipo_sociedad;
}
/*cambia el valor de la variable si viene con 'Otra' y le asigna el valor correcto*/



$razon_socal2=$_POST['razon_social2']; //razon_social2
$nombre_comercial=$_POST['nombre_comercial']; //nombre_comercial
$actividad_economica=$_POST['actividad_economica']; //actividad_economica
$pais_constitucion=$_POST['pais_constitucion']; // pais_constitucion
$escritura_numero=$_POST['escritura_numero']; //escritura_numero
$escritura_fecha=$_POST['escritura_fecha']; //escritura_fecha
$escritura_notario=$_POST['escritura_notario']; //escritura_notario



/* items 4.8  *********************ITEMS SE GUARDAN EN TABLA DIFERENTE CON RELACION AL NUMERO DE FORMULARIO*/
$vmodescritura_numeros=$_POST['vmodescritura_numero'];
$vescritura_fechas=$_POST['vescritura_fecha'];
$modescritura_notarios=$_POST['modescritura_notario'];
/* items 4.8  *********************ITEMS SE GUARDAN EN TABLA DIFERENTE CON RELACION AL NUMERO DE FORMULARIO*/




$patente_sociedad_escritura_numero=$_POST['patente_sociedad_escritura_numero']; // patente_sociedad_escritura_numero
$patente_sociedad_escritura_folio=$_POST['patente_sociedad_escritura_folio']; // patente_sociedad_escritura_folio
$patente_sociedad_escritura_libro=$_POST['patente_sociedad_escritura_libro']; // patente_sociedad_escritura_libro
$patente_sociedad_sescritura_numero_expediente=$_POST['patente_sociedad_sescritura_numero_expediente']; // patente_sociedad_sescritura_numero_expediente
$patente_empresa_escritura_numero=$_POST['patente_empresa_escritura_numero']; // patente_empresa_escritura_numero
$patente_empresa_escritura_folio=$_POST['patente_empresa_escritura_folio']; // patente_empresa_escritura_folio
$patente_empresa_escritura_libro=$_POST['patente_empresa_escritura_libro']; // patente_empresa_escritura_libro
$patente_empresa_escritura_numero_expediente=$_POST['patente_empresa_escritura_numero_expediente']; // patente_empresa_escritura_numero_expediente

$no_es_empresa_numero=$_POST['no_es_empresa_numero']; //sinoesempre_numero
$no_es_empresa_fecha=$_POST['no_es_empresa_fecha']; //sinoesempre_fecha
$no_es_empresa_autoriza=$_POST['no_es_empresa_autoriza']; //sinoesempre_autoriza
$registro_nombre=$_POST['registro_nombre']; // registro_nombre
$registro_numero=$_POST['registro_numero']; // registro_numero
$registro_folio=$_POST['registro_folio']; // registro_folio
$registro_libro=$_POST['registro_libro']; // registro_libro
$direccion_completa=$_POST['direccion_completa']; // direccion_comple
$direccion_pais=$_POST['direccion_pais']; // direccion_pais
$direccion_zona=$_POST['direccion_zona']; //direccion_zona
$direccion_departamento=$_POST['direccion_departamento']; // direccion_depar
$direccion_municipio=$_POST['direccion_municipio']; // direccion_muni
$telefono=$_POST['telefono']; //telefono
$pagina_web=$_POST['pagina_web']; //pagina_web
$correo_electronico=$_POST['correo_electronico']; // correo_electro
$contratista_proveedor_del_estado=$_POST['contratista_proveedor_del_estado']; // con_pro_estado
$referencia_comercial_nombre=$_POST['referencia_comercial_nombre']; // refer_comer_nomb
$referencia_comercial_telefono=$_POST['referencia_comercial_telefono']; // refer_comer_telfo
$referencia_comercial_movil=$_POST['referencia_comercial_movil']; // refer_comer_celu
$referencia_comercial_nombre2=$_POST['referencia_comercial_nombre2']; // refer_comer_nomb2
$referencia_comercial_telefono2=$_POST['referencia_comercial_telefono2']; // refer_comer_telfo2
$referencia_comercial_movil2=$_POST['referencia_comercial_movil2']; // refer_comer_celu2

$referencia_financiera_nombre=$_POST['referencia_financiera_nombre']; // refer_finan_nomb
$referencia_financiera_telefono=$_POST['referencia_financiera_telefono']; // refer_finan_telfo
$referencia_financiera_tipo_producto=$_POST['referencia_financiera_tipo_producto']; // refer_finan_tippro
$referencia_financiera_nombre2=$_POST['referencia_financiera_nombre2']; // refer_finan_nomb2
$referencia_financiera_telefono2=$_POST['referencia_financiera_telefono2']; // refer_finan_telfo2
$referencia_financiera_tipo_producto2=$_POST['referencia_financiera_tipo_producto2']; // refer_finan_tippro2
$consejo_administracion_nombre=$_POST['consejo_administracion_nombre']; // concejo_admin_nombre
$consejo_administracion_cargo=$_POST['consejo_administracion_cargo']; // concejo_admin_cargo
$consejo_administracion_nombre2=$_POST['consejo_administracion_nombre2']; // concejo_admin_nombre2
$consejo_administracion_cargo2=$_POST['consejo_administracion_cargo2']; // concejo_admin_cargo2
$consejo_administracion_nombre3=$_POST['consejo_administracion_nombre3']; // concejo_admin_nombre3
$consejo_administracion_cargo3=$_POST['consejo_administracion_cargo3']; // concejo_admin_cargo3
$cuenta_con_accionistas=$_POST['cuenta_con_accionistas']; // cuenta_con_accionistas
$cuenta_con_accionistas_extrajero=$_POST['cuenta_con_accionistas_extrajero']; // cuenta_con_accionistas_extranjero
$nombre_pais_proveedor=$_POST['nombre_pais_proveedor']; // nombre_pais_proveedor
$ubicacion_pais_proveedor=$_POST['ubicacion_pais_proveedor']; //ubicacion_pais_proveedor
$nombre_pais_cliente=$_POST['nombre_pais_cliente']; // nompais_cliente
$ubicacion_pais_cliente=$_POST['ubicacion_pais_cliente']; // ubicacionpais_cliente

$nombre_pais_proveedor2=$_POST['nombre_pais_proveedor2']; // nompais_proveedor2
$ubicacion_pais_proveedor2=$_POST['ubicacion_pais_proveedor2']; // ubicacionpais_proveedor2
$nombre_pais_cliente2=$_POST['nombre_pais_cliente2']; // nompais_cliente2
$ubicacion_pais_cliente2=$_POST['ubicacion_pais_cliente2']; // ubicacionpais_cliente2
$nombre_pais_proveedor3=$_POST['nombre_pais_proveedor3']; // nompais_proveedor3
$ubicacion_pais_proveedor3=$_POST['ubicacion_pais_proveedor3']; // ubicacionpais_proveedor3
$nombre_pais_cliente3=$_POST['nombre_pais_cliente3']; // nompais_cliente3
$ubicacion_pais_cliente3=$_POST['ubicacion_pais_cliente3']; // ubicacionpais_cliente3
$actividad_economica_negocio=$_POST['actividad_economica_negocio']; // actividad_economica_negocio
$numero_subsidiarias=$_POST['numero_subsidiarias']; // numero_subsidiaria
$numero_empleados=$_POST['numero_empleados']; //numero_empleados




/* items tipo moneda ingreso y egreso ********************ITEMS SE GUARDAN EN TABLA DIFERENTE CON RELACION AL NUMERO DE FORMULARIO*/

$chkotrasmonedaing=$_POST['chkotramonedaing'];
$vtipomoneda_ingreso_otra=$_POST['vtipomoneda_ingreso_otra'];
if($vtipomoneda_ingreso_otra){
    array_push($chkotrasmonedaing, $vtipomoneda_ingreso_otra);
}
//eliminamos 'otras' del array
unset($chkotrasmonedaing[3]);


$chkotramonedaegr=$_POST['chkotramonedaegr'];
$vtipomoneda_egreso_otra=$_POST['vtipomoneda_egreso_otra'];
if($vtipomoneda_egreso_otra){
    array_push($chkotramonedaegr, $vtipomoneda_egreso_otra);
}
//eliminamos 'otras' dek array 
unset($chkotramonedaegr[3]);

/* items tipo moneda ingreso y egreso *********************ITEMS SE GUARDAN EN TABLA DIFERENTE CON RELACION AL NUMERO DE FORMULARIO*/



/* 6.9 ingresos y egresos  mensuales aproximados */
$rango_ingresos_qtz=$_POST['rango_ingresos_qtz']; // rangoingresos_qtz
$rangoegreso_qtz2=$_POST['rangoegreso_qtz2']; // 	rangoegreso_qtz

$otro_monto_ingreso_qtz=$_POST['otro_monto_ingreso_qtz'];
$otro_monto_egreso_qtz=$_POST['otro_monto_egreso_qtz'];

if($otro_monto_ingreso_qtz){
    $rango_ingresos_qtz = $otro_monto_ingreso_qtz;
}

if($otro_monto_egreso_qtz){
    $rangoegreso_qtz2 = $otro_monto_egreso_qtz;
}

/* 6.9 ingresos y egresos  mensuales aproximados */




$representante_primer_apellido=$_POST['representante_primer_apellido']; // representa_apellido
$representante_segundo_apellido=$_POST['representante_segundo_apellido']; //representa_apellido2
$representante_apellido_casada=$_POST['representante_apellido_casada']; // representa_apellido3
$representante_primer_nombre=$_POST['representante_primer_nombre']; // representa_nombre
$representante_segundo_nombre=$_POST['representante_segundo_nombre']; // representa_nombre2
$representante_otros_nombres=$_POST['representante_otros_nombres']; // representa_nombre3
$representante_fecha_nacimiento=$_POST['representante_fecha_nacimiento']; // representa_fechanac
$representante_nacionalidad=$_POST['representante_nacionalidad']; // representa_nacionali
$representante_otra_nacionalidad=$_POST['representante_otra_nacionalidad']; // representa_otranacio
$representante_lugar_nacimiento=$_POST['representante_lugar_nacimiento']; // representa_lugarnaci
$condicion_migratoria=$_POST['condicion_migratoria']; // condicion_residente
$genero=$_POST['genero']; // genero
$estado_civil=$_POST['estado_civil']; // estado_civil
$profesion_oficio=$_POST['profesion_oficio']; // profesion_oficio
$tipo_documento_identificacion=$_POST['tipo_documento_identificacion']; // 	tipodocumento_identi
$tipo_documento_identificacion_numero=$_POST['tipo_documento_identificacion_numero']; //tipodocumento_numero
$emision_pais=$_POST['emision_pais']; // emision_pais
$emision_departamento=$_POST['emision_departamento']; // emision_departamento
$emision_municipio=$_POST['emision_municipio']; // emision_municipio
$numero_identificacion_tributaria=$_POST['numero_identificacion_tributaria']; // numero_identificacion_tributaria
$telefono_respresentante_legal=$_POST['telefono_respresentante_legal']; // telefono_respresentante_legal
$celular_representante_legal=$_POST['celular_representante_legal']; // celular_representante_legal
$correo_electronico_representante_legal=$_POST['correo_electronico_representante_legal']; // correo_electronico_representante_legal
$direccion_sede_social_completa=$_POST['direccion_sede_social']; // direccion_particular

$direccion_sede_social_zona=$_POST['direccion_sede_social_zona']; // direc_zona2
$direccion_sede_social_departamento=$_POST['direccion_sede_social_departamento']; //direc_departa2
$direccion_sede_social_municipio=$_POST['direccion_sede_social_municipio']; //direc_municipio
$direccion_sede_social_pais=$_POST['direccion_sede_social_pais']; // direc_pais
$acta_notarial_numero_inscripcion=$_POST['acta_notarial_numero_inscripcion']; // actan_numero_inscrip
$vactan_fechaini=$_POST['vactan_fechaini']; // actan_fechaini
$vactan_fechafin=$_POST['vactan_fechafin']; // actan_fechafin
$vnotario_autorizo=$_POST['vnotario_autorizo']; // notario_autorizo
$vcargo_nombro=$_POST['vcargo_nombro']; // cargo_nombro


$vactua_mandatario=$_POST['vactua_mandatario']; // actua_mandatario

if($vactua_mandatario =='SI'){
    $vnombre_registro=$_POST['vnombre_registro']; //nombre_registro
    $vactua_numero=$_POST['vactua_numero']; // actua_numero
    $vactua_folio=$_POST['vactua_folio']; // actua_folio
    $vactua_libro=$_POST['vactua_libro']; // actua_libro
}

$vparaefec_actuaunica=$_POST['vparaefec_actuaunica']; // paraefec_actuaunica


if($vparaefec_actuaunica=='NO'){
    $vactua2_apellido=$_POST['vactua2_apellido']; // actua2_apellido
    $vactua2_apellido2=$_POST['vactua2_apellido2']; // actua2_apellido2
    $vactua2_apellido3=$_POST['vactua2_apellido3']; // actua2_apellido3
    $vactua2_nombre=$_POST['vactua2_nombre']; // actua2_nombre
    $vactua2_nombre2=$_POST['vactua2_nombre2']; // actua2_nombre2
    $vactua2_nombre3=$_POST['vactua2_nombre3']; // actua2_nombre3
    $vactua2_genero=$_POST['vactua2_genero']; // actua2_genero

    $vrazon_social3=$_POST['vrazon_social3']; // razon_social3
    $vinfogene_fechanac2=$_POST['vinfogene_fechanac2']; // infogene_fechanac2
    $vinfogene_pais=$_POST['vinfogene_pais']; // infogene_pais
    $vinfogene_otranacio=$_POST['vinfogene_otranacio']; // infogene_otranacio

    $vinfogene_identifi=$_POST['vinfogene_identifi']; // infogene_identifi
    $vinfogene_idennumero=$_POST['vinfogene_idennumero']; // infogene_idennumero
    $vinfogene_lugaremisi=$_POST['vinfogene_lugaremisi']; // infogene_lugaremisi
    $vinfogene_pais2=$_POST['vinfogene_pais2']; // infogene_pais2

    $vinfogene_nit2=$_POST['vinfogene_nit2']; // infogene_nit2
    $vinfogene_telefono2=$_POST['vinfogene_telefono2']; // infogene_telefono2
    $vinfogene_celular2=$_POST['vinfogene_celular2']; // infogene_celular2
}

$vrepresen_espep=$_POST['vrepresen_espep']; // represen_espep



$vorigen_riquezapep=$_POST['vorigen_riquezapep']; // origen_riquezapep

 if($vorigen_riquezapep =='Otros (especifique)'){
      $vrepresen_asociadopep=$_POST['vrepresen_asociadopep'];

      $vorigen_riquezapep=$vrepresen_asociadopep;
  }


$vrepresen_parentezcopepr=$_POST['vrepresen_parentezcopepr']; // represen_parentezcopep
$representante_cercano_pep=$_POST['representante_cercano_pep']; // represen_asociadopep

$estado="ACTIVO";



/*****************************************************  INICIA INSERTAMOS LOS CAMPOS DEL FORMULARIO EN LA TABLA formulario_iveir2       ****************************************************************************** */

 
 $camposFormulario="INSERT INTO formulario_iveir2 (nit, lugar, fecha, razon_social_nombre_comercial, nombre_central_sucursal, codigo_sucursual, tipo_sociedad, razon_social2, nombre_comercial, actividad_economica, pais_constitucion, escritura_numero, escritura_fecha, escritura_notario, patente_sociedad_escritura_numero, patente_sociedad_escritura_folio, patente_sociedad_escritura_libro, patente_sociedad_sescritura_numero_expediente, patente_empresa_escritura_numero, patente_empresa_escritura_folio, patente_empresa_escritura_libro, patente_empresa_escritura_numero_expediente, sinoesempre_numero, sinoesempre_fecha, sinoesempre_autoriza, registro_nombre, registro_numero, registro_folio, registro_libro, direccion_comple, direccion_pais, direccion_zona, direccion_depar, direccion_muni, telefono, pagina_web, correo_electro, con_pro_estado, refer_comer_nomb, refer_comer_telfo, refer_comer_celu, refer_comer_nomb2, refer_comer_telfo2, refer_comer_celu2, refer_finan_nomb, refer_finan_telfo, refer_finan_tippro, refer_finan_nomb2, refer_finan_telfo2, refer_finan_tippro2, consejoadmin_nombre, consejoadmin_cargo, consejoadmin_nombre2, consejoadmin_cargo2, consejoadmin_nombre3, consejoadmin_cargo3, cuenta_con_accionistas, cuenta_con_accionistas_extranjero, nombre_pais_proveedor, ubicacion_pais_proveedor, nompais_cliente, ubicacionpais_cliente, nompais_proveedor2, ubicacionpais_proveedor2, nompais_cliente2, ubicacionpais_cliente2, nompais_proveedor3, ubicacionpais_proveedor3, nompais_cliente3, ubicacionpais_cliente3, actividad_economica_negocio, numero_subsidiaria, numero_empleados, rangoingresos_qtz, rangoegreso_qtz, representa_apellido, representa_apellido2, representa_apellido3, representa_nombre, representa_nombre2, representa_nombre3, representa_fechanac, representa_nacionali, representa_otranacio, representa_lugarnaci, condicion_residente, genero, estado_civil, profesion_oficio, tipodocumento_identi, tipodocumento_numero, emision_pais, emision_departamento, emision_municipio, numero_identificacion_tributaria, telefono_respresentante_legal, celular_representante_legal, correo_electronico_representante_legal, direccion_particular, direc_zona2, direc_departa2, direc_municipio, direc_pais, actan_numero_inscrip, actan_fechaini, actan_fechafin, notario_autorizo, cargo_nombro, actua_mandatario, nombre_registro, actua_numero, actua_folio, actua_libro, paraefec_actuaunica, actua2_apellido, actua2_apellido2, actua2_apellido3, actua2_nombre, actua2_nombre2, actua2_nombre3, actua2_genero, razon_social3, infogene_fechanac2, infogene_pais, infogene_otranacio, infogene_identifi, infogene_idennumero, infogene_lugaremisi, infogene_pais2, infogene_nit2, infogene_telefono2, infogene_celular2, represen_espep, origen_riquezapep, represen_parentezcopep, represen_asociadopep, estado) VALUES ('$nit',
 '$lugar', '$fecha', '$razon_social_nombre_comercial', '$nombre_central_sucursal', '$codigo_sucursal', '$tipo_sociedad', '$razon_socal2', '$nombre_comercial', '$actividad_economica',
 '$pais_constitucion', '$escritura_numero', '$escritura_fecha','$escritura_notario','$patente_sociedad_escritura_numero','$patente_sociedad_escritura_folio','$patente_sociedad_escritura_libro',
 '$patente_sociedad_sescritura_numero_expediente','$patente_empresa_escritura_numero','$patente_empresa_escritura_folio','$patente_empresa_escritura_libro','$patente_empresa_escritura_numero_expediente',
 '$no_es_empresa_numero','$no_es_empresa_fecha','$no_es_empresa_autoriza','$registro_nombre','$registro_numero','$registro_folio','$registro_libro','$direccion_completa','$direccion_pais',
 '$direccion_zona','$direccion_departamento','$direccion_municipio','$telefono','$pagina_web','$correo_electronico','$contratista_proveedor_del_estado','$referencia_comercial_nombre','$referencia_comercial_telefono',
 '$referencia_comercial_movil','$referencia_comercial_nombre2','$referencia_comercial_telefono2','$referencia_comercial_movil2','$referencia_financiera_nombre','$referencia_financiera_telefono',
 '$referencia_financiera_tipo_producto','$referencia_financiera_nombre2','$referencia_financiera_telefono2','$referencia_financiera_tipo_producto2','$consejo_administracion_nombre','$consejo_administracion_cargo',
 '$consejo_administracion_nombre2','$consejo_administracion_cargo2','$consejo_administracion_nombre3','$consejo_administracion_cargo3','$cuenta_con_accionistas','$cuenta_con_accionistas_extrajero',
 '$nombre_pais_proveedor','$ubicacion_pais_proveedor','$nombre_pais_cliente','$ubicacion_pais_cliente','$nombre_pais_proveedor2','$ubicacion_pais_proveedor2','$nombre_pais_cliente2','$ubicacion_pais_cliente2',
 '$nombre_pais_proveedor3','$ubicacion_pais_proveedor3','$nombre_pais_cliente3','$ubicacion_pais_cliente3','$actividad_economica_negocio','$numero_subsidiarias','$numero_empleados','$rango_ingresos_qtz',
 '$rangoegreso_qtz2','$representante_primer_apellido','$representante_segundo_apellido','$representante_apellido_casada','$representante_primer_nombre','$representante_segundo_nombre','$representante_otros_nombres',
 '$representante_fecha_nacimiento','$representante_nacionalidad','$representante_otra_nacionalidad','$representante_lugar_nacimiento','$condicion_migratoria','$genero','$estado_civil','$profesion_oficio',
 '$tipo_documento_identificacion','$tipo_documento_identificacion_numero','$emision_pais','$emision_departamento','$emision_municipio','$numero_identificacion_tributaria','$telefono_respresentante_legal',
 '$celular_representante_legal','$correo_electronico_representante_legal','$direccion_sede_social_completa','$direccion_sede_social_zona','$direccion_sede_social_departamento','$direccion_sede_social_municipio',
 '$direccion_sede_social_pais','$acta_notarial_numero_inscripcion','$vactan_fechaini','$vactan_fechafin','$vnotario_autorizo','$vcargo_nombro','$vactua_mandatario','$vnombre_registro','$vactua_numero',
 '$vactua_folio','$vactua_libro','$vparaefec_actuaunica','$vactua2_apellido','$vactua2_apellido2','$vactua2_apellido3','$vactua2_nombre','$vactua2_nombre2','$vactua2_nombre3','$vactua2_genero','$vrazon_social3',
 '$vinfogene_fechanac2','$vinfogene_pais','$vinfogene_otranacio','$vinfogene_identifi','$vinfogene_idennumero','$vinfogene_lugaremisi','$vinfogene_pais2','$vinfogene_nit2','$vinfogene_telefono2',
 '$vinfogene_celular2','$vrepresen_espep','$vorigen_riquezapep','$vrepresen_parentezcopepr','$representante_cercano_pep','$estado')";
 $executed = mysqli_query($connection, $camposFormulario);
/*****************************************************  FINALIZA INSERTAMOS LOS CAMPOS DEL FORMULARIO EN LA TABLA formulario_iveir2       ****************************************************************************** */



/*INICIA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA formulario_iveir2 PARA GENERAR EL NUMERO DE FORMULARIO*/
  $obtenerId = "SELECT id FROM formulario_iveir2 ORDER BY id DESC LIMIT 1";
  $executeId = mysqli_query($connection, $obtenerId);  
  $row = mysqli_fetch_array($executeId);
  

    $id=$row['id'];
    $base=0;
    $formularioNo=$id;

//   echo 'id:'.$id."<br>".$formularioNo; 
/*FINALIZA OBTENEMOS EL ULTIMO ID DEL REGISTO DE LA DATA A LA TABLA formulario_iveir2 PARA GENERAR EL NUMERO DE FORMULARIO*/




/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA formulario_iveir2  */

    $establecerFormularioNo="UPDATE formulario_iveir2 SET Formulario_No='$formularioNo' WHERE id='$id'";
    $executed2=mysqli_query($connection, $establecerFormularioNo);
 

/* LE ESTABLECEMOS EL NUMERO DE FORMULARIO AL CAMPO Formulaio_No DE LA TABLA formulario_iveir2  */






/**********************GUARDAMOS LOS ITEMS EN LA TABLA formulario_iveir2_items_escritura Y ESTABLECEMOS EL NUMERO DE FORMULARIO COMO RELACION *************/ 
  $longEscritura = count($vmodescritura_numeros);
  for($i=0; $i < $longEscritura; $i ++){

      $camposItemsEscrituraPublica = "INSERT INTO formulario_iveir2_items_escritura (Formulario_No, modificaciones_escritura_publica_numero, 
      modificaciones_escritura_publica_fecha, modificaciones_escritura_publica_notario_autorizo) 
      VALUES ('$formularioNo', '$vmodescritura_numeros[$i]', '$vescritura_fechas[$i]', '$modescritura_notarios[$i]')";
      $executed3=mysqli_query($connection, $camposItemsEscrituraPublica);

  }
/**********************GUARDAMOS LOS ITEMS EN LA TABLA formulario_iveir2_items_escritura Y ESTABLECEMOS EL NUMERO DE FORMULARIO COMO RELACION *************/ 






/**********************GUARDAMOS LOS ITEMS EN LA TABLA formulario_iveir2_items_moneda Y ESTABLECEMOS EL NUMERO DE FORMULARIO COMO RELACION *************/ 
  $longMoneda = count($chkotrasmonedaing);
  for($i=0; $i < $longMoneda; $i ++){

      $camposItemsMonedas = "INSERT INTO  formulario_iveir2_items_moneda 
       (Formulario_No, tipo_moneda_ingreso, tipo_moneda_egreso) VALUES ('$formularioNo','$chkotrasmonedaing[$i]', '$chkotramonedaegr[$i]')";     
     $executed4 = mysqli_query($connection, $camposItemsMonedas);
     
  }
/**********************GUARDAMOS LOS ITEMS EN LA TABLA formulario_iveir2_items_moneda Y ESTABLECEMOS EL NUMERO DE FORMULARIO COMO RELACION *************/ 




if($executed4){
    header('Location: formulario_ive_ir02.php');
}



