<?php 
	include("../shared/header.php");

	require_once "../../conexion.php";
	require_once "../../funciones.php";

	
	$paises_list = get_paises_list();	
	$departamentos_list = get_departamentos_list();
	$municipios_list = get_municipios_list();
	$origenriqueza_list = get_origenriqueza_list();
	$rangosing_list = get_rangosing_list();
	$rangosegr_list = get_rangosing_list();
	$tipomoneda_list = get_tiposmoneda_list();
	$tiposociedad_list = get_tipossociedad_list();
	$condicionmigracion_list = get_concionesmigra_visita_list();

	$redes_sociales_list = get_redes_sociales_list();
	$cartera_list = get_cartera_list();
	$dedica_alquiler = get_dedica_alquiler_list();
	$motivo_visita_list = get_motivo_visita_list();

	//Solucion Temporal *REVISAR
	//---------------------------------------
	$paises_list61 = get_paises_list();
	$paises_list001 = get_paises_list();
	$paises_list612 = get_paises_list();
	$paises_list62 = get_paises_list();
	$paises_list622 = get_paises_list();

	$paises_list631 = get_paises_list();
	$paises_list632 = get_paises_list();
	$paises_list633 = get_paises_list();

	$paises_list634 = get_paises_list();
	$paises_list635 = get_paises_list();
	$paises_list636 = get_paises_list();

	$paises_list46 = get_paises_list();
	
	$tipomoneda_list62 = get_tiposmoneda_list();

	$paises_list71 = get_paises_list();
	$departamentos_list71 = get_departamentos_list();
	$municipios_list71 = get_municipios_list();

	$paises_list72 = get_paises_list();
	$departamentos_list72 = get_departamentos_list();
	$municipios_list72 = get_municipios_list();
	
	$paises_list73 = get_paises_list();
	$paises_list74 = get_paises_list();

	//---------------------------------------
	
	//  $redes_sociales_list = {};
	//  $cartera_list = {};
	//  $dedica_alquiler = {};
	//  $motivo_visita_list = {};


?>

<body class="animsition">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<?php include("../shared/navbar.php"); ?>
	<!-- Page -->

<div class="page">
	 <div class="page-header">
			<h1 class="page-title">FORMULARIO PARA INICIO DE RELACIONES   -Persona Jurídica-</h1>
			<ol class="breadcrumb">
				 <li class="breadcrumb-item"><a href="formaulario_ive_home.php">Inicio</a></li>
			</ol>
	 </div>
	 <div class="page-content container-fluid">
			<div class="row">
				 <div class="col-lg-12">
						<div class="mb-30">
							 <div class="panel-group" id="exampleWizardAccordion" aria-multiselectable="true" role="tablist">
									<form method="POST" action="form_ive_ir02.post.php" class="form-horizontal" id="exampleConstraintsFormTypes" enctype='multipart/form-data' autocomplete="off" onsubmit="return validate_form()">
										 <input class="form-control" type="hidden" id="catalogo_formulario_id" name="catalogo_formulario_id" value="1">
										 <div class="examle-wrap">
												<h4 class="example-title"></h4>
												<div class="example">

													 <div class="panel-group" id="exampleAccordionDefault" aria-multiselectable="true" role="tablist">
													 		<div class="panel">
																 <!-- Carpeta 1 -->
																 <div class="panel-heading" id="exampleHeadingDefaultOne" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultOne">
																		3. DATOS DE LA PERSONA OBLIGADA
																		</a>
																 </div>
																 <!-- "panel-collapse collapse show -->
																 <div class="panel-collapse collapse" id="exampleCollapseDefaultOne" aria-labelledby="exampleHeadingDefaultOne" role="tabpanel">
																	<div class="panel-body">
																			<div class="row"> 
																				<div class="col-lg-6">
																					<div class="form-group form-material">
																							<label class="form-control-label pl-0" for="vlugar">LUGAR: <span style="color: rgba(240,62,41,1);">*</span></label>
																							<input class="form-control" type="text" id="vlugar" name="vlugar" >
																					</div>
																				</div>
																				<div class="col-lg-6">
																					<div class="form-group form-material">
																						<label class="form-control-label pl-0" for="vfecha">FECHA (dd/mm/aaaa): <span style="color: rgba(240,62,41,1);">*</span></label>
																						<div class="input-group">
																							 <span class="input-group-addon">
																							 	<i class="icon md-calendar" aria-hidden="true"></i>
																							 </span>
																							 <input type="text" class="form-control" id="vfecha" name="vfecha" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																						</div>
																					</div>
																				</div>
																			</div>    <!-- Final Row -->

																			<div class="row">
																				<!-- <div class="col-lg-12">
																					 <div class="form-group form-material">
																							<label class="form-control-label pl-0">3. DATOS DE LA PERSONA OBLIGADA</label>
																					 </div>
																				</div> -->
																				<div class="col-lg-12">
																					 <div class="row">
																							<div class="col-lg-12">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vrazon_social">3.1  Razón Social y Nombre Comercial: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vrazon_social" name="vrazon_social" value="ARREND LEASING, S.A. / ARREND" >																										
																								 </div>
																							</div>
																					 </div>
																				</div>
																				<div class="col-lg-8">
																					 <div class="row">
																							<div class="col-lg-12">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnombre_central_sucursal"> 3.2  Nombre de la central, sucursal o agencia donde se solicita el producto o servicio: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vnombre_central_sucursal" name="vnombre_central_sucursal" value="CENTRAL ZONA 9" >
																								 </div>
																							</div>
																					 </div>
																				</div>
																				<div class="col-lg-4">
																					 <div class="row">
																							<div class="col-lg-12">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vcodigo_sucursual"> 3.2.1  Código de agencia o sucursal: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vcodigo_sucursual" name="vcodigo_sucursual" value="0000">																								 
																								 </div>
																							</div>
																					 </div>
																				</div>

																			 </div> <!-- Final Row -->
																  	   </div>  <!-- Panel Body -->
																  </div>  <!--panel-collapse -->
															</div>  <!--panel -->


															<div class="panel">
																 <!-- Carpeta 1 --> 
																 <div class="panel-heading" id="exampleHeadingDefaultTwo" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultTwo" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultTwo">
																		4. DATOS DE LA ENTIDAD SOLICITANTE
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultTwo" aria-labelledby="exampleHeadingDefaultTwo" role="tabpanel">
																  	 <div class="panel-body">
																		 <div class="row">

																				<div class="col-lg-12">
																					<div class="row">
																							<div class="col-lg-6">
																								<div class="row">
																									<div class="col-lg-4">
																										<div class="form-group">
																											<div class="form-group form-material mb-0">
																												<label class="form-control-label pl-0" for="vtipo_sociedad">4.1 Tipo de Sociedad o Entidad: <span style="color: rgba(240,62,41,1);">*</span></label>
																											</div>
																											<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_sociedad" name="vtipo_sociedad" onChange="tipoSociedad_entidad(this.value);">
																											<option value="">Seleccione una opción</option>
																												<?php
																													while ($valores = mysqli_fetch_array($tiposociedad_list)) {
																														echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																														}
																												?>
																											</select>
																										</div>
																									</div>	
																									<div class="col-lg-8">
																										<div class="form-group">
																											<div class="form-group form-material" style="display:none;" id="votrotipo_sociedad_show">
																												<div class="col-lg-2 float-left">
																													<label>Especifique:</label>
																												</div>	
																												<div class="col-lg-8 float-left">
																													<input class="form-control" type="text" id="votipo_sociedad" name="otro_tipo_sociedad">
																												</div>	
																											</div>
																										</div>
																									</div>
																								</div>		
																							</div>
																							<div class="col-lg-6">
																								<div class="form-group">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vrazon_social2">4.2  Nombre, razón social o denominación completa: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vrazon_social2" name="razon_social2"  >
																									</div>
																								</div>
																							</div>
																					</div>  
																				</div>   

																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-12">
																							 <div class="form-group">
																									<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="vnombre_comercial">4.3  Nombre comercial: <span style="color: rgba(240,62,41,1);">*</span></label>
																										 <input class="form-control" type="text" id="vnombre_comercial" name="nombre_comercial" >
																									</div>
																							 </div>
																						</div>
																					</div>  
																				</div>   

																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-12">
																							 <div class="form-group">
																									<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="vactividad_economica">4.4  Actividad económica principal u objeto de la entidad: <span style="color: rgba(240,62,41,1);">*</span></label>
																										 <input class="form-control" type="text" id="vactividad_economica" name="actividad_economica" >
																									</div>
																							 </div>
																						</div>
																					</div>  
																				</div> 

																				<div class="col-lg-12">
																					 <div class="row">
																					 		<div class="col-lg-6">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnit">4.5  Número de Identificación Tributaria (NIT): <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vnit" name="nit" >
																								 </div>
																							</div>
																							
																							<div class="col-lg-6">
																								 <div class="form-group form-material">
																										<!-- <label class="form-control-label pl-0" for="vpais_constitucion">4.6  País de Constitución: <span style="color: rgba(240,62,41,1);">*</span></label> -->
																										<div class="form-group">
																											<div class="form-group form-material mb-0">
																												<label class="form-control-label pl-0" for="vdireccion_pais">4.6  País de Constitución: <span style="color: rgba(240,62,41,1);">*</span></label>
																											</div>
																												<select class="form-control border-right-0 border-left-0 border-top-0" id="vdireccion_pais" name="pais_constitucion" >
																													<option value="">Seleccione una opción</option>
																													<?php
																														while ($valores = mysqli_fetch_array($paises_list46)) {
																															echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
																															}
																													?>
																												</select>
																											</div>
																									 </div>
																								 </div>
																							</div>
																					 </div>
																				</div> 

																				<div class="col-lg-12">
																					<div class="form-group form-material">
																						   <label class="form-control-label pl-0">4.7 Datos de la escritura pública de constitución de sociedad o entidad:</label>
																					 </div>
																					<div class="row">
																					 		<div class="col-lg-4">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vescritura_numero">Número: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vescritura_numero" name="escritura_numero" >
																								 </div>
																							</div>
																							
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vescritura_fecha">Fecha: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<div class="input-group">
																							 			<span class="input-group-addon">
																							 				<i class="icon md-calendar" aria-hidden="true"></i>
																							 			</span>
																								 		<input type="text" class="form-control" id="vescritura_fecha" name="vescritura_fecha" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																									</div>
																								</div>
																							</div>
																							
																							<div class="col-lg-5">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vescritura_notario">Notario que la autorizó:  <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vescritura_notario" name="escritura_notario" >
																								 </div>
																							</div>
																					 </div>
																				</div> 

																				<div class="col-lg-12">
																					 <div class="form-group form-material mb-0">
																						   <label class="form-control-label pl-0">4.8 Modificaciones a la escritura pública de constitución de sociedad o entidad: (de existir más de una, detallar en hojas aparte)</label>
																					 </div>
																					<div class="row">
																						<div class="col-lg-12">
																							<div class="example table-responsive">
																								<table class="table">
																									<thead>
																											<tr>
																												<th>#</th>
																												<th>Número</th>
																												<th>Fecha</th>
																												<th>Notario que la Autorizo</th>
																												<th>Accion</th>
																											</tr>
																									</thead>
																									<tbody id="modificaciones_escriturap">
																											<tr id="modificaciones_escriturap_row">
																												<td>1</td>
																												<td><input type="text" name="vmodescritura_numero[]"></td>
																												<td><div class="input-group"><span class="input-group-addon"><i class="icon md-calendar" aria-hidden="true"></i></span><input type="text" id="vmodescritura_fecha" name="vmodescritura_fecha[]" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>"></div></td>
																												<td><input type="text" name="modescritura_notario[]"></td>
																											</tr>
																									</tbody>
																								</table>
																								<button onclick="add_row_escriturapublica();" id="addToTable-ci" class="btn btn-success" type="button">
																									<i class="icon md-plus" aria-hidden="true"></i> Agregar fila
																								</button>
																							</div>
																						</div>	
																					</div>
																			 	</div>

																				<div class="col-lg-12"> 
																					<div class="form-group form-material">
																						   <label class="form-control-label pl-0">4.9 Patente de sociedad:</label>
																					 </div>
																					<div class="row">
																					 		<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpatsescritura_numero">Número: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpatsescritura_numero" name="patente_sociedad_escritura_numero" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpatsescritura_folioa">Folio: <span style="color: rgba(240,62,41,1);">*</span></label>
																							 		<input type="text" class="form-control" id="vpatsescritura_folioi" name="patente_sociedad_escritura_folio" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpatsescritura_libro">Libro: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpatsescritura_libro" name="patente_sociedad_escritura_libro" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpatsescritura_numexpe">Número de Exp.: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpatsescritura_numexpe" name="patente_sociedad_sescritura_numero_expediente" >
																								 </div>
																							</div>
																					 </div>
																				</div> 

																				<div class="col-lg-12"> 
																					<div class="form-group form-material">
																						   <label class="form-control-label pl-0">4.10 Patente de empresa:</label>
																					 </div>
																					<div class="row">
																					 		<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpateescritura_numero2">Número: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpateescritura_numero2" name="patente_empresa_escritura_numero" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpateescritura_folio2">Folio: <span style="color: rgba(240,62,41,1);">*</span></label>
																							 		<input type="text" class="form-control" id="vpateescritura_folio2" name="patente_empresa_escritura_folio" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpateescritura_libro2">Libro: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpateescritura_libro2" name="patente_empresa_escritura_libro" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpateescritura_numexpe2">Número de Exp.: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpateescritura_numexpe2" name="patente_empresa_escritura_numero_expediente" >
																								 </div>
																							</div>
																					 </div>
																				</div> 

																				<div class="col-lg-12"> 
																					<div class="form-group form-material">
																						   <label class="form-control-label pl-0">4.11 Si no es una Empresa o Sociedad Mercantil, deberá indicar la información siguiente, del Acuerdo Gubernativo  o documento similar:</label>
																					 </div>
																					<div class="row">
																						<div class="col-lg-4">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vsinoesempre_numero">Número: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vsinoesempre_numero" name="no_es_empresa_numero" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vsinoesempre_fecha">Fecha: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<div class="input-group">1
																							 			<span class="input-group-addon">
																							 				<i class="icon md-calendar" aria-hidden="true"></i>
																							 			</span>
																								 		<input type="text" class="form-control" id="vsinoesempre_fecha" name="no_es_empresa_fecha" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																									</div>
																								</div>
																							</div>
																							<div class="col-lg-5">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vsinoesempre_autoriza">Autoridad:  <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vsinoesempre_autoriza" name="no_es_empresa_autoriza" >
																								 </div>
																							</div>
																					</div>
																				</div> 

																				<div class="col-lg-12"> 
																					<div class="form-group form-material">
																							<label class="form-control-label pl-0">4.12 Datos de Registro:</label>
																						</div>
																						<div class="row">
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vregistro_nombre">Nombre del Registro: </label>
																									<input class="form-control" type="text" id="vregistro_nombre" name="registro_nombre" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vregistro_numero">Número: </label>
																									<input type="text" class="form-control" id="vregistro_numero" name="registro_numero" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vregistro_folio">Folio: </label>
																									<input class="form-control" type="text" id="vregistro_folio" name="registro_folio" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vregistro_libro">Libro: </label>
																									<input class="form-control" type="text" id="vregistro_libro" name="registro_libro" >
																								</div>
																							</div>
																						</div>
																				</div> 	
																				
																			<div class="col-lg-12"> 
																				<div class="form-group form-material">
																					<label class="form-control-label pl-0">4.13 Dirección de sede social completa (calle o avenida, número de casa, colonia, sector, lote, manzana, otros):</label>
																					<input type="text" class="form-control" id="vdireccion_comple" name="direccion_completa" >
																				</div>
																				<div class="row">
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0" for="vdireccion_zona">Zona: <span style="color: rgba(240,62,41,1);">*</span></label>
																								<input type="text" class="form-control" id="vdireccion_zona" name="vdireccion_zona" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vdireccion_pais">País: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdireccion_pais" name="direccion_pais" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($paises_list)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vdireccion_depar">Departamento: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdireccion_depar" name="direccion_departamento" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($departamentos_list)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>																							
																						<div class="col-lg-3">
																							<div class="form-group">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vdireccion_muni">Municipio: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdireccion_muni" name="direccion_municipio" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($municipios_list)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>
																					</div> 
																			</div> 	

																			<div class="col-lg-12"> 
																				<div class="row">
																				 		<div class="col-lg-4">
																							 <div class="form-group form-material">
																								<label class="form-control-label pl-0" for="vtelefono">4.14  Teléfonos: <span style="color: rgba(240,62,41,1);">*</span></label>
																								<input class="form-control" type="text" id="vtelefono" name="telefono" >
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0" for="vpagina_inter">4.15  Página de Internet / Sitio Web: <span style="color: rgba(240,62,41,1);">*</span></label>
																						 		<input type="text" class="form-control" id="vpagina_inter" name="pagina_web" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group form-material">
																								<label class="form-control-label pl-0" for="vcorreo_electro">4.16  Correo electrónico / e-mail: </label>
																								<input class="form-control" type="text" id="vcorreo_electro" name="correo_electronico" >
																						 </div>
																				 </div>
																			</div> 

																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-5">
																							<div class="form-group form-material">
																								 
																								<label class="form-control-label pl-0">4.17  La entidad solicitante es Contratista o Proveedor del Estado (CPE*):</label>

																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<!-- <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" /> -->
																									<input type="radio"  name="contratista_proveedor_del_estado" id="vcon_pro_estado" checked value="NO" />
																									<label for="inputRadiosChecked">No</label>
																								</div>
																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<input type="radio" type="radio"  name="contratista_proveedor_del_estado" id="vcon_pro_estado" value="SI"/>
																									<label for="inputRadiosUnchecked">Si</label>
																								</div>	
																							</div>
																						</div>		
																					</div>
																				</div>					

																			</div>  <!-- Fin Row -->
																		</div>  <!-- Panel Body -->
																 </div>  <!--panel-collapse -->
															</div>   <!--panel -->
															

															<div class="panel">
																 <!-- Carpeta 1 --> 
																 <div class="panel-heading" id="exampleHeadingDefaultThree" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultThree" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultThree">
																		5. REFERENCIAS DE LA ENTIDAD SOLICITANTE (Si es insuficiente, consignar en hojas adicionales)
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultThree" aria-labelledby="exampleHeadingDefaultThree" role="tabpanel">
																  	 <div class="panel-body">
																		 <div class="row">
																				<div class="col-lg-6">
																					 <div class="form-group form-material">
																							<label class="form-control-label pl-0">5.1 Comerciales: (nombre de las empresas)</label>
																					 </div>
																				</div>
																				<div class="col-lg-3">
																					<div class="form-group form-material">
																							<label class="form-control-label pl-0">Teléfono (línea fija):</label>
																					 </div>
																				</div>	 
																				<div class="col-lg-3">
																					 <div class="form-group form-material">
																							<label class="form-control-label pl-0">Celular / Móvil:</label>
																					 </div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-6">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_comer_nomb" name="referencia_comercial_nombre">
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_comer_telfo" name="referencia_comercial_telefono" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_comer_celu" name="referencia_comercial_movil" >
																								</div>
																							 </div>
																						</div>
																					</div>  
																				</div> 
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-6">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_comer_nomb2" name="referencia_comercial_nombre2" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_comer_telfo2" name="referencia_comercial_telefono2" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_comer_celu2" name="referencia_comercial_movil2" >
																								</div>
																							 </div>
																						</div>
																					</div>  
																				</div> 

																				<div class="col-lg-6">
																					 <div class="form-group form-material">
																							<label class="form-control-label pl-0">5.2 Financieras: (nombre de los bancos, aseguradoras, sociedades financieras, entre otras)</label>
																					 </div>
																				</div>
																				<div class="col-lg-3">
																					<div class="form-group form-material">
																							<label class="form-control-label pl-0">Teléfonos:</label>
																					 </div>
																				</div>	 
																				<div class="col-lg-3">
																					 <div class="form-group form-material">
																							<label class="form-control-label pl-0">Tipo de producto o servicio:</label>
																					 </div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-6">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_finan_nomb" name="referencia_financiera_nombre" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_finan_telfo" name="referencia_financiera_telefono" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_finan_tippro" name="referencia_financiera_tipo_producto" >
																								</div>
																							 </div>
																						</div>
																					</div>  
																				</div> 
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-6">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_finan_nomb2" name="referencia_financiera_nombre2" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_finan_telfo2" name="referencia_financiera_telefono2" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-3">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vrefer_finan_tippro2" name="referencia_financiera_tipo_producto2" >
																								</div>
																							 </div>
																						</div>
																					</div>  
																				</div> 
																	     </div>  <!-- Fin Row -->
																	  </div>  <!-- Panel Body -->
																 </div>  <!--panel-collapse -->
															</div>   <!--panel -->
															
															<div class="panel">
																 <!-- Carpeta 1 --> 
																 <div class="panel-heading" id="exampleHeadingDefaultFour" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultFour" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultFour">
																			6. INFORMACIÓN ECONÓMICO-FINANCIERA DE LA ENTIDAD SOLICITANTE
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultFour" aria-labelledby="exampleHeadingDefaultFour" role="tabpanel">
																  	 <div class="panel-body">
																	   <div class="row">
																			<div class="col-lg-12">
																				<div class="row">
																					 <div class="col-lg-12">
																						 <div class="form-group form-material">
																							<label class="form-control-label pl-0">6.1 Miembros del Consejo de Administración, Junta Directiva, Administrador Único u otro similar:</label>
																						 </div>
																					 </div>
																				</div>
																			</div>
																			
																			 <div class="col-lg-12">	
																			 	  <div class="row">
																					<div class="col-lg-8">	
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">Nombres y apellidos completos:</label>
																						</div>
																				  	 </div>	 
																				
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Cargo que ocupa:</label>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-8">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vconsejoadmin_nombre" name="consejo_administracion_nombre" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-4">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vconsejoadmin_cargo" name="consejo_administracion_cargo" >
																								</div>
																							 </div>
																						</div>
																					</div>  
																			</div> 
																			<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-8">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vconsejoadmin_nombre2" name="consejo_administracion_nombre2" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-4">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vconsejoadmin_cargo2" name="consejo_administracion_cargo2" >
																								</div>
																							 </div>
																						</div>
																					</div>  
																			</div> 
																			<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-8">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vconsejoadmin_nombre3" name="consejo_administracion_nombre3" >
																								</div>
																							 </div>
																						</div>
																						<div class="col-lg-4">
																							 <div class="form-group">
																								<div class="form-group form-material">
																									 <input class="form-control" type="text" id="vconsejoadmin_cargo3" name="consejo_administracion_cargo3" >
																								</div>
																							 </div>
																						</div>
																					</div>  
																			</div> 																																														
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-7">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">6.2  Cuenta con accionistas, socios o asociados con el 10% o más de acciones bajo su control:</label>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<!-- <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" /> -->
																								<input type="radio"  name="cuenta_con_accionistas" id="vcuentacon_accionistas_no" checked value="no" />
																								<label for="inputRadiosChecked">No</label>
																							</div>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio" type="radio"  name="cuenta_con_accionistas" id="vcuentacon_accionistas_si" value="si"/>
																								<label for="inputRadiosUnchecked">Si</label>
																							</div>	
																						</div>
																					</div>		
																				</div>
																			</div>																																																						
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-7">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">6.2.1  Dentro de los accionistas, socios o asociados con el 10% o más de participación, alguno es extranjero:</label>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<!-- <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" /> -->
																								<input type="radio"  name="cuenta_con_accionistas_extrajero" id="vdelosaccion_extrajero_no" checked value="no" />
																								<label for="inputRadiosChecked">No</label>
																							</div>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio" type="radio"  name="cuenta_con_accionistas_extrajero" id="vdelosaccion_extrajero_si" value="si"/>
																								<label for="inputRadiosUnchecked">Si</label>
																							</div>	
																						</div>
																					</div>		
																				</div>
																			</div>	

																			<div class="col-lg-12">																																																					
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">6.3 Nombre y país de ubicación de los principales proveedores y clientes:</label>
																						</div>
																					</div>
																				</div>	

																				<div class="row">
																					<div class="col-lg-3">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Nombre proveedor(es) </label>
																						</div>
																					</div>

																					<div class="col-lg-3">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0"> País ubicación proveedor(es)</label>
																						</div>
																					</div>

																					<div class="col-lg-3">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0"> Nombre cliente(s)</label>
																						</div>
																					</div>

																					<div class="col-lg-3">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0"> País ubicación cliente(s)</label>
																						</div>
																					</div>
																				</div>		
																			</div>

																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-3">
																						 <div class="form-group">
																							<div class="form-group form-material">
																								 <input class="form-control" type="text" id="vnompais_proveedor" name="nombre_pais_proveedor" >
																							</div>
																						 </div>
																					</div>
																					<div class="col-lg-3">
																						<div class="form-group">
																							<select class="form-control border-right-0 border-left-0 border-top-0" id="vubicacionpais_proveedor" name="ubicacion_pais_proveedor">
																							<option value="">Seleccione una opción</option>
																								<?php
																									while ($valores = mysqli_fetch_array($paises_list61)) {																										
																										echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																										}
																								?>
																							</select>
																						</div>
																					</div>
																					<div class="col-lg-3">
																						 <div class="form-group">
																							<div class="form-group form-material">
																								 <input class="form-control" type="text" id="vnompais_cliente" name="nombre_pais_cliente" >
																							</div>
																						 </div>
																					</div>
																					<div class="col-lg-3">
																						<div class="form-group">
																							<select class="form-control border-right-0 border-left-0 border-top-0" id="vubicacionpais_cliente" name="ubicacion_pais_cliente" >
																							<option value="">Seleccione una opción</option>
																								<?php
																									while ($valores = mysqli_fetch_array($paises_list612)) {
																										echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																										}
																								?>
																							</select>
																						</div>
																					</div>
																				</div>  
																			</div>

																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-3">
																						 <div class="form-group">
																							<div class="form-group form-material">
																								 <input class="form-control" type="text" id="vnompais_proveedor2" name="nombre_pais_proveedor2" >
																							</div>
																						 </div>
																					</div>

																					<div class="col-lg-3">
																						<div class="form-group">
																							<select class="form-control border-right-0 border-left-0 border-top-0" id="vubicacionpais_proveedor2" name="ubicacion_pais_proveedor2" >
																							<option value="">Seleccione una opción</option>
																								<?php
																									while ($valores = mysqli_fetch_array($paises_list62)) {
																										echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																										}
																								?>
																							</select>
																						</div>
																					</div>


																					<div class="col-lg-3">
																						 <div class="form-group">
																							<div class="form-group form-material">
																								 <input class="form-control" type="text" id="vnompais_cliente2" name="nombre_pais_cliente2" >
																							</div>
																						 </div>
																					</div>

																					<div class="col-lg-3">
																						<div class="form-group">
																							<select class="form-control border-right-0 border-left-0 border-top-0" id="vubicacionpais_cliente2s" name="ubicacion_pais_cliente2" >
																							<option value="">Seleccione una opción</option>
																								<?php
																									while ($valores = mysqli_fetch_array($paises_list622)) {
																										echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																										}
																								?>
																							</select>
																						</div>
																					</div>
																				</div>  
																			</div>

																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-3">
																						 <div class="form-group">
																							<div class="form-group form-material">
																								 <input class="form-control" type="text" id="vnompais_proveedor3" name="nombre_pais_proveedor3" >
																							</div>
																						 </div>
																					</div>
																					<div class="col-lg-3">
																						<div class="form-group">
																							<select class="form-control border-right-0 border-left-0 border-top-0" id="vubicacionpais_proveedor3" name="ubicacion_pais_proveedor3" >
																							<option value="">Seleccione una opción</option>
																								<?php
																									while ($valores = mysqli_fetch_array($paises_list001)) {
																										echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																										}
																								?>
																							</select>
																						</div>
																					</div>
																					<div class="col-lg-3">
																						 <div class="form-group">
																							<div class="form-group form-material">
																								 <input class="form-control" type="text" id="vnompais_cliente3" name="nombre_pais_cliente3" >
																							</div>
																						 </div>
																					</div>
																					<div class="col-lg-3">
																						<div class="form-group">
																							<select class="form-control border-right-0 border-left-0 border-top-0" id="vubicacionpais_cliente3" name="ubicacion_pais_cliente3" >
																							<option value="">Seleccione una opción</option>
																								<?php
																									while ($valores = mysqli_fetch_array($paises_list632)) {
																										echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																										}
																								?>
																							</select>
																						</div>
																					</div>
																				</div>  
																			</div>
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									 <label class="form-control-label pl-0" for="vnumero_subsidiaria1">6.4  Actividad económica en que la entidad, negocio o empresa se desarrolla:  <span style="color: rgba(240,62,41,1);">*</span></label>
																									 <input class="form-control" type="text" id="vnumero_subsidiaria1" name="actividad_economica_negocio" 
																									 >
																								</div>
																						 </div>
																					</div>
																				</div>  
																			</div> 
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									 <label class="form-control-label pl-0" for="vnumero_subsidiaria">6.5  Número de subsidiarias, agencias, oficinas, etc.:  <span style="color: rgba(240,62,41,1);">*</span></label>
																									 <input class="form-control" type="text" id="vnumero_subsidiaria" name="numero_subsidiarias" 
																									 >
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									 <label class="form-control-label pl-0" for="vnumero_empleados">6.6  Número estimado de empleados que laboran en la entidad:  <span style="color: rgba(240,62,41,1);">*</span></label>
																									 <input class="form-control" type="text" id="vnumero_empleados" name="numero_empleados" 
																									 >
																								</div>
																						 </div>
																					</div>
																				</div>  
																			</div> 
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vtipomoneda_ingresousuario_bien">6.7 Tipo de monedas de los ingresos -marcar la(s) que aplique(s)-:  <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vtipomoneda_egreso">6.8 Tipo de moneda(s) de los egresos -marcar la(s) que aplique(s)-:  <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																						 </div>
																					</div>
																				</div>  
																			</div> 
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-6">
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="form-group">
																									<?php

																										while ($valores = mysqli_fetch_array($tipomoneda_list)) {
																											echo '
																												<div class="checkbox-custom checkbox-danger ">
																													<input type="checkbox" class="chkotramonedaing" id="chkotramonedaing" name="chkotramonedaing[]" value="'.$valores['nombre'].'" onclick="chkotra_moneda_ing(this.value);" required>
																													<label>'.$valores['nombre'].'</label>
																												</div>';
																										}
																									?>
																								</div> 
																							</div>
																							<div style="display:none;" id="moneda_otros_show" class=" mb-20">
																								<div class="col-lg-12">
																									<div class="form-group form-material m-0" >
																										<div class="col-lg-4 float-left">
																												<label>Otras (Especifique):</label>
																										</div>	
																										<div class="col-lg-7 float-left">
																											<input class="form-control" type="text" id="vtipomoneda_ingreso_otra" name="vtipomoneda_ingreso_otra">
																										</div>	
																									</div>
																								</div>
																							</div>																							
																						</div>
																					</div>	

																					<div class="col-lg-6">
																							<div class="row">
																								<div class="col-lg-12">
																									<!-- <div class="row">
																										<span class="input-group-btn float-left mr-10">
																											<button type="button" class="btn btn-danger" onclick="checklistindividualAll()">Seleccionar todo</button>
																										</span>
																										<span class="input-group-btn float-left">
																											<button type="button" class="btn btn-danger" onclick="unchecklistindividualAll()">Quitar todo</button>
																										</span>
																									</div> -->
																									<div class="form-group">
																										<?php
																											while ($valores = mysqli_fetch_array($tipomoneda_list62)) {
																												echo '
																													<div class="checkbox-custom checkbox-danger ">
																														<input type="checkbox" class="chkotramonedaegr" id="chkotramonedaegr"  name="chkotramonedaegr[]" value="'.$valores['nombre'].'" onclick="chkotra_moneda_egr(this.value);" required>
																														<label>'.$valores['nombre'].'</label>
																													</div>';
																												}
																											?>
																									</div>
																								</div>
																								<div style="display:none;" id="moneda_otrose_show" class=" mb-20">
																								<div class="col-lg-12">
																									<div class="form-group form-material m-0" >
																										<div class="col-lg-4 float-left">
																												<label>Otras (Especifique):</label>
																										</div>	
																										<div class="col-lg-7 float-left">
																											<input class="form-control" type="text" id="vtipomoneda_egreso_otra" name="vtipomoneda_egreso_otra">
																										</div>	
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>		
																			</div>	

																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vrangoingresos_qtz">6.9 Ingresos mensuales aproximados de la entidad solicitante, provenientes de las fuentes de ingresos declaradas: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vrangoegreso_qtz">6.10 Egresos mensuales aproximados de la entidad solicitante, de acuerdo a las fuentes de ingresos declaradas: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																						 </div>
																					</div>
																				</div>  
																			</div> 
																			<div class="col-lg-12">
																				<div class="row">
																				
																					<div class="col-lg-3">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vrangoingresos_qtz" name="rango_ingresos_qtz" onChange="tipomoneda_ingreso1(this.value);">
																									<option value="">Seleccione una opción</option>
																										<?php
																											while ($valores = mysqli_fetch_array($rangosing_list)) {
																												echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																										?>
																									</select>
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-3">	
																						 <div class="form-group">																							 
																							 <div class="form-group form-material m-0" style="display:none;" id="tipomoneda_ingreso_show1">
																								<div class="col-lg-4 float-left">
																									<label>Indicar monto:</label>
																								</div>	
																								<div class="col-lg-8 float-left">
																										<input class="form-control" type="text" id="vhataingreso_qtz" name="otro_monto_ingreso_qtz" >
																								</div>																									
																							</div>
																						</div>
																					</div>
																					<div class="col-lg-3">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vrangoegreso_qtz" name="rangoegreso_qtz2" onChange="tipomoneda_egreso2(this.value);">
																									<option value="">Seleccione una opción</option>
																										<?php
																											while ($valores = mysqli_fetch_array($rangosegr_list)) {
																												echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																										?>
																									</select>
																								</div>
																						 </div>
																					</div>

																					<div class="col-lg-3">	
																						 <div class="form-group">																							 
																							 <div class="form-group form-material m-0" style="display:none;" id="tipomoneda_egreso_show2">
																								<div class="col-lg-4 float-left">
																									<label>Indicar monto:</label>
																								</div>	
																								<div class="col-lg-8 float-left">
																										<input class="form-control" type="text" id="vhataegreso_qtz" name="otro_monto_egreso_qtz" >
																								</div>																									
																							</div>
																						</div>
																					</div>

																				</div>  
																			</div> 

																		    </div>  <!-- Fin Row -->
																		</div>  <!-- Panel Body -->
																 </div>  <!--panel-collapse -->
															</div>   <!--panel -->
															
															<div class="panel">
																 <!-- Carpeta 1 --> 
																 <div class="panel-heading" id="exampleHeadingDefaultFive" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultFive" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultFive">
																			7. DATOS DEL REPRESENTANTE LEGAL DE LA ENTIDAD SOLICITANTE
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultFive" aria-labelledby="exampleHeadingDefaultFive" role="tabpanel">
																  	 <div class="panel-body">
																		 <div class="row">

																		 		<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.1 Primer apellido:</label>
																									<input class="form-control" type="text" id="vrepresenta_apellido" name="representante_primer_apellido" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Segundo apellido:</label>
																									<input class="form-control" type="text" id="vrepresenta_apellido2" name="representante_segundo_apellido" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Apellido de casada:</label>
																									<input class="form-control" type="text" id="vrepresenta_apellido3" name="representante_apellido_casada" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Primer nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre" name="representante_primer_nombre" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Segundo nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre2" name="representante_segundo_nombre" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									
																									<label class="form-control-label pl-0">Otros nombres:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre3" name="representante_otros_nombres" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">7.2 Fecha de nacimiento (dd/mm/aaaa):  <span style="color: rgba(240,62,41,1);">*</label>
																								<div class="input-group">
																									<span class="input-group-addon">
																										<i class="icon md-calendar" aria-hidden="true"></i>
																									</span>
																									<input type="text" class="form-control" id="vrepresenta_fechanac" name="representante_fecha_nacimiento" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.3 Nacionalidad:</label>
																									<input class="form-control" type="text" id="vrepresenta_nacionali" name="representante_nacionalidad" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.4 Otra nacionalidad:</label>
																									<input class="form-control" type="text" id="vrepresenta_otranacio" name="representante_otra_nacionalidad" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.5 Lugar de nacimiento:</label>
																									<input class="form-control" type="text" id="vrepresenta_lugarnaci" name="representante_lugar_nacimiento" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.6 Condición migratoria:</label>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vcondicion_residente" name="condicion_migratoria" onChange="condicion_migratoria_otros(this.value);">
																									<option value="">Seleccione una opción</option>
																										<?php
																											while ($valores = mysqli_fetch_array($condicionmigracion_list)) {
																												echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																										?>
																									</select>
																							</div>
																						</div>
																						<div class="col-lg-6">
																						   <div class="form-group">
																								<div class="form-group form-material">
																									<input class="form-control" type="text" id="condicion_migratoria_otro" style="display: none" name="condicion_migratoria_otro" placeholder="Especifique" > 
																								</div>
																						   </div>
																					    </div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">7.7 Genero:</label>
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vgenero" name="genero">
																									 <option value="Masculino">MASCULINO</option>
																									 <option value="Femenino">FEMENINO</option>
																								</select>
							 																</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-2">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.8 Estado Civil:</label>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vestado_civil" name="estado_civil">
																										<option value="SOLTERO">SOLTERO (a)</option>
																										<option value="CASADO">CASADO (a)</option>
																									 </select> 
																							</div>
																						</div>
																						<div class="col-lg-4">
																						   <div class="form-group">
																								<div class="form-group form-material">
																								    <label class="form-control-label pl-0">7.9 Profesión u oficio:</label>
																									<input class="form-control" type="text" id="vprofesion_oficio" name="profesion_oficio" >
																								</div>
																						   </div>
																					    </div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.10 Tipo de documento de identificación:</label>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipodocumento_identi" name="tipo_documento_identificacion">
																									 <option value="DPI">DPI</option>
																									 <option value="PASAPORTE">PASAPORTE</option>
																								</select>
																							</div>
																						</div>
																						<div class="col-lg-3">
																						   <div class="form-group">
																								<div class="form-group form-material">
																								    <label class="form-control-label pl-0">7.10.1 Número:</label>
																									<input class="form-control" type="text" id="vtipodocumento_numero" name="tipo_documento_identificacion_numero" >
																								</div>
																						   </div>
																					    </div>

																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">	
																						<div class="col-lg-12">
																							<label class="form-control-label pl-0">7.10.2 Lugar de emisión:  <span style="color: rgba(240,62,41,1);">*</label>				
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">		
																						<div class="col-lg-4">
																							<label class="form-control-label pl-0">País:  <span style="color: rgba(240,62,41,1);">*</label>				
																							<div class="form-group form-material">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_pais" name="emision_pais" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($paises_list71)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>	
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<label class="form-control-label pl-0">Departamento:  <span style="color: rgba(240,62,41,1);">*</label>				
																							<div class="form-group form-material">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_departa2" name="emision_departamento" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($departamentos_list71)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<label class="form-control-label pl-0">Municipio:  <span style="color: rgba(240,62,41,1);">*</label>				
																							<div class="form-group form-material">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_municipio" name="emision_municipio" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($municipios_list71)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																										}
																										?>
																								</select>
																							</div>
																						</div> 
																					</div> 
																				</div> 

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.11 Número de Identificación Tributaria (NIT):</label>
																									<input class="form-control" type="text" id="vtipodocumento_tribu" name="numero_identificacion_tributaria" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.12   Teléfono (línea fija):</label>
																									<input class="form-control" type="text" id="vtelefono2" name="telefono_respresentante_legal" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.13   Celular / Móvil:</label>
																									<input class="form-control" type="text" id="vceluar2" name="celular_representante_legal" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.14  Correo electrónico / e-mail:</label>
																									<input class="form-control" type="text" id="vcorreo_electronico2" name="correo_electronico_representante_legal" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-12"> 
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">7.15 Dirección de sede social completa (calle o avenida, número de casa, colonia, sector, lote, manzana, otros):</label>
																								<input class="form-control" type="text" id="vdireccion_particular" name="direccion_sede_social" >
																							</div>
																						</div>
																					</div>
																			    </div>

																				 <div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-3">
																							<div class="form-group form-material mb-0">
																								<label class="form-control-label pl-0" for="vdirec_zona2">Zona: <span style="color: rgba(240,62,41,1);">*</span></label>
																								<input class="form-control" type="text" id="vdirec_zona2" name="direccion_sede_social_zona" >
																							</div>
																						</div>																							

																						<div class="col-lg-3">
																							<div class="form-group">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vdirec_pais">País: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_pais" name="direccion_sede_social_pais" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($paises_list72)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>

																						<div class="col-lg-3">
																							<div class="form-group">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vdirec_departa2">Departamento: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_departa2" name="direccion_sede_social_departamento" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($departamentos_list72)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>		
																																											
																						<div class="col-lg-3">
																							<div class="form-group">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vdirec_municipio"> Municipio: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio"  name="direccion_sede_social_municipio" > 
																								<option value="">Seleccione una opción</option>
																									<?php
																										while ($valores = mysqli_fetch_array($municipios_list72)) {
																											echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>																							
																					</div>
																				</div> 

																					<!-- Saldo de 2 Lineas -->
																					<div class="col-lg-12"> 
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vactan_numero_inscrip"></span></label>
																									<!-- <input class="form-control" type="text" id="vactan_numero_inscrip" name="vactan_numero_inscrip" > -->
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vactan_numero_inscrip"></span></label>
																									<!-- <input class="form-control" type="text" id="vactan_numero_inscrip" name="vactan_numero_inscrip" > -->
																								</div>
																							</div>
																						</div>
																					</div>	

																					<div class="col-lg-12"> 
																						<div class="row">
																								<div class="col-lg-8">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vactan_numero_inscrip">7.16 Acta notarial de nombramiento -Número de inscripción- : <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vactan_numero_inscrip" name="acta_notarial_numero_inscripcion" >
																									</div>
																								</div>																							
																								<div class="col-lg-2">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0">Fecha Inicial:  <span style="color: rgba(240,62,41,1);">*</label>
																										<div class="input-group">
																											<span class="input-group-addon">
																												<i class="icon md-calendar" aria-hidden="true"></i>
																											</span>
																											<input type="text" class="form-control" id="vactan_fechaini" name="vactan_fechaini" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																										</div>

																									</div>
																								</div>
																								<div class="col-lg-2">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0">Fecha Final:  <span style="color: rgba(240,62,41,1);">*</label>
																										<div class="input-group">
																											<span class="input-group-addon">
																												<i class="icon md-calendar" aria-hidden="true"></i>
																											</span>
																											<input type="text" class="form-control" id="vactan_fechafin" name="vactan_fechafin" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																										</div>

																									</div>
																								</div>
																						</div>
																					</div> 

																					<div class="col-lg-12"> 
																						<div class="row">
																							<div class="col-lg-7">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="pais">Notario que la autorizó: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vnotario_autorizo" name="vnotario_autorizo" >
																								</div>
																							</div>																							
																							<div class="col-lg-5">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">Cargo para el que se le nombró:</label>
																										<input type="text" class="form-control" id="vcargo_nombro" name="vcargo_nombro" >
																								</div>
																							</div>
																						</div>
																					</div> 
																					<div class="col-lg-12"> 
																						<div class="row">
																							<div class="col-lg-6">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vactua_mandatario">7.17 Actúa como mandatario (Si la respuesta es positiva, indicar la información siguiente): <span style="color: rgba(240,62,41,1);">*</span></label>
																									<div class="radio-custom float-right radio-primary pr-10 pt-0">
																										<input type="radio"  name="vactua_mandatario" id="vactua_mandatario_no" value="NO" checked onclick="actua_mandatario();"/>
																										<label for="inputRadiosChecked">No</label>
																									</div>
																									<div class="radio-custom float-right radio-primary pr-10 pt-0">
																										<input type="radio" type="radio"  name="vactua_mandatario" id="vactua_mandatario_si" value="SI" onclick="actua_mandatario();"/>
																										<label for="inputRadiosUnchecked">Si</label>
																									</div>
																								</div>
																							</div>																							
																						</div>
																					</div> 

																					<div class="col-lg-12" style="display:none;" id="actua_mandatario_show" > 
																						<div class="row">
																							<div class="col-lg-6">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vnombre_registro">Nombre del Registro <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vnombre_registro" name="vnombre_registro" >
																								</div>
																							</div>																							
																							<div class="col-lg-2">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">Número:</label>
																										<input type="text" class="form-control" id="vactua_numero" name="vactua_numero" >
																								</div>
																							</div>
																							<div class="col-lg-2">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">Folio:</label>
																										<input type="text" class="form-control" id="vactua_folio" name="vactua_folio" >
																								</div>
																							</div>
																							<div class="col-lg-2">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">Libro:</label>
																										<input type="text" class="form-control" id="vactua_libro" name="vactua_libro" >
																								</div>
																							</div>
																						</div>
																					</div> 

																					<div class="col-lg-12"> 
																						<div class="row">
																							<div class="col-lg-11">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vparaefec_actuaunica">7.18 Para efectos de esta solicitud, actúa únicamente en beneficio de la entidad antes descrita (cuando la respuesta sea negativa pasar a los numerales 7.18.1, 7.18.2 y 7.18.3  según corresponda): <span style="color: rgba(240,62,41,1);">*</span></label>
																									<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<input type="radio"  name="vparaefec_actuaunica" id="vparaefec_actuaunica_no" value="NO" onclick="efectos_solicitud();"/>
																									<label for="inputRadiosChecked">No</label>
																								</div>
																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<input type="radio" type="radio"  name="vparaefec_actuaunica" id="vparaefec_actuaunica_si" value="SI" checked onclick="efectos_solicitud();"/>
																									<label for="inputRadiosUnchecked">Si</label>
																								</div>	
																							</div>
																						</div>																							
																					</div>
																				</div> 

																			    <div  style="display:none;" id="efectos_solicitud_show" >   <!--Inicia el Block 18-->
																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-12">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">7.18.1 Nombre completo de la persona individual en nombre de quién actúa:</label>
																										<!-- <input class="form-control" type="text" id="usuario_bien" name="usuario_bien" > -->
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-4">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">Primer apellido:</label>
																										<input class="form-control" type="text" id="vactua2_apellido" name="vactua2_apellido">
																								</div>
																							</div>
																							<div class="col-lg-4">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">Segundo apellido:</label>
																										<input class="form-control" type="text" id="vactua2_apellido2" name="vactua2_apellido2">
																								</div>
																							</div>
																							<div class="col-lg-4">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">Apellido de casada:</label>
																										<input class="form-control" type="text" id="vactua2_apellido3" name="vactua2_apellido3" >
																								</div>
																							</div>
																						</div>
																					</div>

																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-4">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">Primer nombre:</label>
																										<input class="form-control" type="text" id="vactua2_nombre" name="vactua2_nombre" >
																								</div>
																							</div>
																							<div class="col-lg-4">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">Segundo nombre:</label>
																										<input class="form-control" type="text" id="vactua2_nombre2" name="vactua2_nombre2">
																								</div>
																							</div>
																							<div class="col-lg-2">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">Otros nombres:</label>
																										<input class="form-control" type="text" id="vactua2_nombre3" name="vactua2_nombre3">
																								</div>
																							</div>
																							<div class="col-lg-2">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.18.1.1 Género:</label>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vactua2_genero" name="vactua2_genero">
																										<option value="MASCULINO">MASCULINO</option>
																										<option value="FEMENINO">FEMENINO</option>
																									</select>
																								</div>
																							</div>
																						</div>
																					</div>

																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-12">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.18.2 Razón Social/Nombre Comercial de la entidad en nombre de quién actúa:</label>
																									<input class="form-control" type="text" id="vrazon_social3" name="vrazon_social3" >
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-12">
																								<div class="form-group form-material">
																										<label class="form-control-label pl-0">7.18.3 Información general de la persona o entidad en nombre de quién actúa:</label>
																								</div>
																							</div>
																						</div>
																					</div>
																					
																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-5">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.18.3.1 Fecha de nacimiento, creación o constitución (dd/mm/aaaa):</label>
																									<div class="input-group">
																										<span class="input-group-addon">
																											<i class="icon md-calendar" aria-hidden="true"></i>
																										</span>
																										<input type="text" class="form-control" id="vinfogene_fechanac2" name="vinfogene_fechanac2" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																									</div>
																								</div>
																							</div>
																							<div class="col-lg-4">
																								<div class="form-group">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vinfogene_pais">7.18.3.2  País de Constitución/Nacionalidad: <span style="color: rgba(240,62,41,1);">*</span></label>
																									</div>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vinfogene_pais" name="vinfogene_pais" >
																									<option value="">Seleccione una opción</option>
																										<?php
																											while ($valores = mysqli_fetch_array($paises_list73)) {
																												echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
																												}
																										?>
																									</select>
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vinfogene_otranacio">7.18.3.3 Otra nacionalidad: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input type="text" class="form-control" id="vinfogene_otranacio" name="vinfogene_otranacio" >
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																					
																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">7.18.3.4  Tipo de documento de identificación:</label>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vinfogene_identifi" name="vinfogene_identifi">
																										<option value="DPI">DPI</option>
																										<option value="PASAPORTE">PASAPORTE</option>
																									</select>
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vinfogene_idennumero">7.18.3.4.1  Número: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input type="text" class="form-control" id="vinfogene_idennumero" name="vinfogene_idennumero" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vinfogene_lugaremisi">7.18.3.4.2   Lugar de emisión:  <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input type="text" class="form-control" id="vinfogene_lugaremisi" name="vinfogene_lugaremisi" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																									<div class="form-group">
																										<div class="form-group form-material mb-0">
																											<label class="form-control-label pl-0" for="vinfogene_pais2">País: <span style="color: rgba(240,62,41,1);">*</span></label>
																										</div>
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vinfogene_pais2" name="vinfogene_pais2" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												while ($valores = mysqli_fetch_array($paises_list74)) {
																													echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																													}
																											?>
																										</select>
																									</div>
																							</div>
																						</div>
																					</div>

																					<div class="col-lg-12">
																						<div class="row">																											
																							<div class="col-lg-4">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vinfogene_nit2">7.18.3.5 Número de Identificación Tributaria (NIT): <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input type="text" class="form-control" id="vinfogene_nit2" name="vinfogene_nit2" >
																								</div>
																							</div>
																							<div class="col-lg-4">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vinfogene_telefono2">7.18.3.6  Teléfono (línea fija): <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input type="text" class="form-control" id="vinfogene_telefono2" name="vinfogene_telefono2" >
																								</div>
																							</div>
																							<div class="col-lg-4">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vinfogene_celular2">Móvil:  <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input type="text" class="form-control" id="vinfogene_celular2" name="vinfogene_celular2" >
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>  <!--Termina el Block 18-->
																				 	
																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-6">
																							<div class="form-group form-material mb-0">
																								<label class="form-control-label pl-0" for="paivrepresen_espeps">7.19 El representante legal es una Persona Expuesta Políticamente (PEP**)2: <span style="color: rgba(240,62,41,1);">*</span></label>
																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio"  name="vrepresen_espep" id="vrepresen_espep_no" checked value="NO" />
																								<label for="inputRadiosChecked">No</label>
																							</div>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio" type="radio"  name="vrepresen_espep" id="vrepresen_espep_si" value="SI"/>
																								<label for="inputRadiosUnchecked">Si</label>
																							</div>	
																							</div>
																						</div>																							
																					</div>
																				</div> 
																				<div class="col-lg-12" style="display:none;" id="elrepresentante_pep_show"> 
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="pais">7.19.1 En el caso de que el representante legal de la entidad solicitante sea PEP, indicar el origen o procedencia de su riqueza*** (bienes muebles e inmuebles) -marcar la(s) que aplique(n)-: <span style="color: rgba(240,62,41,1);">*</span></label>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div> 
																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-8">
																							<div class="form-material mb-0">
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vorigen_riquezapep" name="vorigen_riquezapep" onClick="mostrarOtrosOrigenRiqueza(this.value)">
																									<option value="">Seleccione una opción</option>
																										<?php
																											while ($valores = mysqli_fetch_array($origenriqueza_list)) {
																												echo '<option value="'.$valores['nombre'].'" >'.$valores['nombre'].'</option>';
																												}
																										?>
																									</select>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material mb-0">
																									<input type="text" class="form-control" id="vrepresen_asociadopep" name="vrepresen_asociadopep" placeholder="especifique" style="display:none">
																							</div>
																						</div>
																					</div> 
																				</div>

																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-7">
																							<div class="form-group form-material mb-0">
																								<label class="form-control-label pl-0" for="vrepresen_parentezcopep">7.20 El representante legal tiene parentesco con una Persona Expuesta Políticamente (PEP**)2: <span style="color: rgba(240,62,41,1);">*</span></label>
																								
																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio"  name="vrepresen_parentezcopepr" id="vrepresen_parentezcopep_no" checked value="NO" />
																								<label for="inputRadiosChecked">No</label>
																							</div>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio" type="radio" name="vrepresen_parentezcopepr" id="vrepresen_parentezcopep_si" value="SI"/>
																								<label for="inputRadiosUnchecked">Si</label>
																							</div>
																						</div>																							
																					</div>
																				</div> 

																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-7">
																								<div class="form-group form-material mb-0">
																									<label class="form-control-label pl-0" for="vrepresen_asociadopep">7.21 El representante legal es asociado cercano de una Persona Expuesta Políticamente (PEP**)2: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<input type="radio"  name="representante_cercano_pep" id="vrepresen_asociadopep_no" checked value="NO" />
																									<label for="inputRadiosChecked">No</label>
																								</div>
																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<input type="radio" type="radio"  name="representante_cercano_pep" id="vrepresen_asociadopep_si" value="SI"/>
																									<label for="inputRadiosUnchecked">Si</label>
																								</div>	
																							</div>
																						</div>																							
																					</div>
																				</div> 
																			</div> 
																			
																		    </div>  <!-- Fin Row -->
																		</div>  <!-- Panel Body -->
																 </div>  <!--panel-collapse -->
															</div>   <!--panel -->

															<div class="panel">
																 <!-- Carpeta 1 --> 
																 <div class="panel-heading" id="exampleHeadingDefaultSix" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultSix" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultSix">
																			8. DOCUMENTOS QUE SE DEBEN ANEXAR AL FORMULARIO PARA INICIO DE RELACIONES
																		</a>
																 </div>
																 <div class="panel-collapse collapse" id="exampleCollapseDefaultSix" aria-labelledby="exampleHeadingDefaultSix" role="tabpanel">
																  	<div class="panel-body">
																		<div class="row">

																		 		<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.1 Cuando el espacio del formulario sea insuficiente, sírvase incluir la información en hojas por separado,  indicando el numeral al que corresponde.:</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2 Anexar al presente formulario la siguiente documentación:</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.1 Anexo A.I de Productos y Servicios.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.2 Anexo A.II de Otros Firmantes, Anexo A.III de Personas Expuestas Políticamente (PEP) y Anexo A.IV de Beneficiarios, cuando apliquen.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.3 Fotocopia legible del primer testimonio de la escritura pública de constitución, debidamente registrada.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.4 Fotocopia legible de la Patente de Sociedad.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.5 Fotocopia legible de la Patente de Empresa.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.6 Fotocopia legible del Acuerdo Gubernativo u otro documento similar (en el caso de Fundaciones, Iglesias, etc.) en el que se autorice su constitución.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.7 Fotocopia legible del nombramiento del representante legal, debidamente registrado o primer testimonio de la escritura de mandato debidamente registrado.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.8 Fotocopia de legible documento de identificación del representante legal.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.9 Fotocopia legible de los documentos de identificación de los firmantes de la cuenta.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.10 En caso de ser extranjeros, fotocopia legible de documento de identificación y del documento que acredite su condición migratoria, cuando aplique (pasaporte, tarjeta de visitante, pase especial de viaje).</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.2.11 Fotocopia legible de un recibo (ya sea de agua, luz o teléfono u otro servicio similar) u otro documento similar, que registre la sede o dirección comercial de la entidad solicitante.  </label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.3 Sociedades u otras entidades en formación:</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.3.1 Anexar al formulario carta de notario que certifique que tiene en proceso la constitución de la sociedad o entidad, en donde se indique, qué persona será designada como representante legal. </label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.3.2 En el plazo de  60  días contados a partir de la apertura de la cuenta, deberá presentar los documentos indicados.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">8.3.3 Es responsabilidad de la Persona Obligada velar por el cumplimiento de lo estipulado en el numeral inmediato anterior.</label>
																							</div>
																						</div>
																					</div>	
																				</div>

																				<!-- <div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Adjuntar Archivo Solicitados</label>
																							</div>
																							<div class="example table-responsive">
																								<table class="table">
																									<thead>
																										<tr>
																											<th>#</th>
																											<th>Imagen <span style="color: rgba(240,62,41,1);">*</span></th>
																											<th>Comentario <span style="color: rgba(240,62,41,1);">*</span></th>
																											<th>Accion</th>
																										</tr>
																									</thead>
																									<tbody id="fotografia">
																										<tr id="fotografia_row1">
																											<td>1</td>
																											<td><input type="file" name="fotografia_img[]" accept="image/*"  /></td>
																											<td><textarea class="form-control" id="textareaDefault" rows="3" name="fotografia_comentario[]" ></textarea></td>
																										</tr>
																									</tbody>
																								</table>
																								<button onclick="add_row_fotografia();" id="addToTable-ci" class="btn btn-primary" type="button">
																									<i class="icon md-plus" aria-hidden="true"></i> Agregar imagen
																								</button>
																					 		</div>
																						</div>	
																					</div>	
																				</div> -->

																	    </div>  <!-- Fin Row -->
																	</div>  <!-- Panel Body -->
															 </div>  <!--panel-collapse -->
														</div>   <!--panel -->
																														
															<!-- <div class="panel">
																 <div class="panel-heading" id="exampleHeadingDefaultThree" role="tab">
																		<a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultThree" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultThree">
																		Paso 3
																		</a>
																 </div>
																 <div class="panel-collapse collapse" id="exampleCollapseDefaultThree" aria-labelledby="exampleHeadingDefaultThree" role="tabpanel">
																		<div class="panel-body">
																			 <div class="row">
																					<div class="col-lg-12">
																						 <div class="form-group form-material">
																								<label class="form-control-label pl-0">IX. DESCRIPCIÓN DEL CLIENTE</label>
																						 </div>
																					</div>
																					<div class="col-lg-12">
																						 <div class="row">
																								<div class="col-lg-6">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0 float-left" for="tiene_pareja">Tiene pareja <span style="color: rgba(240,62,41,1);">*</span></label>
																										<div class="radio-custom radio-primary float-left pr-10 pt-0">
																											 <input type="radio" type="radio" onclick="javascript:parejacheck();" name="tiene_pareja" id="pareja_si" value="si"/>
																											 <label for="inputRadiosUnchecked">Si</label>
																										</div>
																										<div class="radio-custom radio-primary float-left pr-10 pt-0">
																											 <input type="radio" onclick="javascript:parejacheck();" name="tiene_pareja" id="pareja_no" checked value="no" />
																											 <label for="inputRadiosChecked">No</label>
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-12" >
																									<div id="pareja_show" style="display:none">
																										<div class="row">
																											<div class="col-lg-6">
																												<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="nombre_pareja">Nombre de la pareja: <span style="color: rgba(240,62,41,1);">*</span></label>
																													<input class="form-control" type="text" id="nombre_pareja" name="nombre_pareja">
																												</div>
																												<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="lugar_trabajo_pareja">Lugar de trabajo: <span style="color: rgba(240,62,41,1);">*</span></label>
																													<input class="form-control" type="text" id="lugar_trabajo_pareja" name="lugar_trabajo_pareja">
																												</div>
																											</div>
																											<div class="col-lg-6">
																												<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="puesto_pareja">Puesto: <span style="color: rgba(240,62,41,1);">*</span></label>
																													<input class="form-control" type="text" id="puesto_pareja" name="puesto_pareja">
																												</div>
																												<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="telefono_pareja">Teléfono del trabajo: <span style="color: rgba(240,62,41,1);">*</span></label>
																													<input class="form-control" type="text" id="telefono_pareja" name="telefono_pareja">
																												</div>
																											</div>  
																										</div>
																									</div>
																								</div>
																						 </div>
																						<div class="row">
																							<div class="col-lg-6">
																								<div class="form-group">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="numero_dependientes">Numero de dependientes: <span style="color: rgba(240,62,41,1);">*</span></label>                                                         
																									</div>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="numero_dependientes" name="numero_dependientes">
																										 <option value="0">0</option>
																										 <option value="1">1</option>
																										 <option value="2">2</option>
																										 <option value="3">3</option>
																										 <option value="4">4</option>
																										 <option value="5">5</option>
																										 <option value="6">6</option>
																									</select>
																								</div>
																							</div>  
																						</div>
																					</div>
																			 </div>
																			 <div class="form-group form-material">
																					<div class="example-wrap">
																						 <label class="form-control-label pl-0" for="empleados">Empleados (Número de empleados en cada casilla)</label>
																						 <div class="example table-responsive">
																								<table class="table">
																									 <thead>
																											<tr>
																												 <th>#</th>
																												 <th>Total de empleados</th>
																												 <th>Administrativos</th>
																												 <th>Ventas</th>
																												 <th>Producción</th>
																												 <th>Temporales</th>
																											</tr>
																									 </thead>
																									 <tbody id="empleados">
																											<tr id="row1">
																												 <td>1</td>
																												 <td><input type="text" name="empleados_total"></td>
																												 <td><input type="text" name="empleados_admon"></td>
																												 <td><input type="text" name="empleados_ventas"></td>
																												 <td><input type="text" name="empleados_produccion"></td>
																												 <td><input type="text" name="empleados_temporal"></td>
																											</tr>
																									 </tbody>
																								</table>
																						 </div>
																					</div>
																			 </div>
																			 <div class="form-group form-material">
																				 <label class="form-control-label pl-0" for="principales_productos">Principales productos (El precio del producto, tomar de referencia el ultimo trimestre)</label>
																				 <div class="example table-responsive">
																						<table class="table">
																							 <thead>
																									<tr>
																										 <th>#</th>
																										 <th>Producto</th>
																										 <th>Precio</th>
																										 <th>Unidades vendidas</th>
																										 <th>Descripcion del producto</th>
																										 <th>% de ventas</th>
																										 <th>Accion</th>
																									</tr>
																							 </thead>
																							 <tbody id="principales_productos">
																									<tr id="principales_productos_row1">
																										 <td>1</td>
																										 <td><input type="text" name="principales_productos_nombre[]"></td>
																										 <td><input type="text" name="principales_productos_precio[]"></td>
																										 <td><input type="text" name="principales_productos_vendidas[]"></td>
																										 <td><input type="text" name="principales_productos_descripcion[]"></td>
																										 <td><input type="text" name="principales_productos_porcentaje[]"></td>
																									</tr>
																							 </tbody>
																						</table>
																						<button onclick="add_row_principales_productos();" id="addToTable-ci" class="btn btn-success" type="button">
																							<i class="icon md-plus" aria-hidden="true"></i> Agregar fila
																						</button>
																				 </div>
																			 </div>
																			 <div class="row">
																				<div class="col-lg-12">
																					<div class="form-group form-material">
																					<label class="form-control-label pl-0">Logistica de ventas y distribucion</label>
																				</div>
																				</div>
																				<div class="col-lg-6">
																				<div class="form-group form-material">
																					<label class="form-control-label pl-0" id="utiliza_transporte" for="utiliza_transporte">Describir si utilizan transporte propio o los clientes llegan a recoger productos, etc. <span style="color: rgba(240,62,41,1);">*</span></label>
																					<div class="input-group">
																						 <textarea class="form-control" id="textareaDefault utiliza_transporte" rows="3" name="utiliza_transporte" ></textarea>
																					</div>
																				</div>
																			 </div>
																			 <div class="col-lg-6">
																				 <div class="form-group form-material">
																						<label class="form-control-label pl-0" id="marcas_propias" for="marcas_propias">Marcas propias: <span style="color: rgba(240,62,41,1);">*</span></label>
																						<div class="input-group">
																							 <textarea class="form-control" id="textareaDefault marcas_propias" rows="3" name="marcas_propias" ></textarea>
																						</div>
																				 </div>
																			 </div>  
																			 </div>

																			 <div class="">
																					<div class="form-group form-material">
																						 <label class="form-control-label pl-0">X. CLIENTES  (es importante en la entrevista con el cliente, saber quienes son sus principales fuentes de ingresos)</label>
																						 <div class="example table-responsive">
																								<table class="table">
																									 <thead>
																											<tr>
																												 <th>#</th>
																												 <th>Nombre <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Antiguedad <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Contacto</th>
																												 <th>Producto <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>% de ventas <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Pais <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Accion</th>
																											</tr>
																									 </thead>
																									 <tbody id="cliente_fuentes">
																											<tr id="cliente_fuentes_row1">
																												 <td>1</td>
																												 <td><input type="text" name="cliente_fuentes_nombre[]" ></td>
																												 <td><input type="text" name="cliente_fuentes_antiguedad[]" ></td>
																												 <td><input type="text" name="cliente_fuentes_contacto[]"></td>
																												 <td><input type="text" name="cliente_fuentes_producto[]" ></td>
																												 <td><input type="text" name="cliente_fuentes_porcentaje[]" ></td>
																												 <td><input type="text" name="cliente_fuentes_pais[]" ></td>
																											</tr>
																									 </tbody>
																								</table>
																								<button onclick="add_row_cliente_fuentes();" id="addToTable-ci" class="btn btn-success" type="button">
																									<i class="icon md-plus" aria-hidden="true"></i> Agregar fila
																								</button>
																						 </div>
																					</div>
																					<div class="row">
																						 <div class="col-lg-6">
																								<label class="form-control-label pl-0" for="cliente_composicion_ventas">Composición de sus ventas</label>
																								<div class="row">
																									<div class="col-lg-6">
																										<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="cliente_composicion_ventas_locales">% Locales</label>
																										 <input class="form-control" type="text" id="cliente_composicion_ventas_locales" name="cliente_composicion_ventas_locales">
																									</div>  
																									</div>
																									<div class="col-lg-6">
																										<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="cliente_composicion_ventas_exterior">% Exterior</label>
																										 <input class="form-control" type="text" id="cliente_composicion_ventas_exterior" name="cliente_composicion_ventas_exterior">
																									</div>
																									</div>  
																								</div>
																						 </div>
																						 <div class="col-lg-6">
																								<label class="form-control-label pl-0" for="cliente_mezcla_ventas">Mezcla de Ventas</label>
																								<div class="row">
																									<div class="col-lg-6">
																										<div class="form-group form-material">
																											 <label class="form-control-label pl-0" for="cliente_mezcla_ventas_contado">% Al contado</label>
																											 <input class="form-control" type="text" id="cliente_mezcla_ventas_contado" name="cliente_mezcla_ventas_contado">
																										</div>
																									</div>
																									<div class="col-lg-6">
																										<div class="form-group form-material">
																											 <label class="form-control-label pl-0" for="cliente_mezcla_ventas_credito">% Al credito</label>
																											 <input class="form-control" type="text" id="cliente_mezcla_ventas_credito" name="cliente_mezcla_ventas_credito">
																										</div>
																									</div>
																								</div>                                                
																						 </div>
																					</div>
																					<div class="col-lg-6">
																						<div class="form-group form-material">
																							 <label class="form-control-label pl-0" for="cliente_ventas_politica_cobrar">Política de Cuentas por Cobrar</label>
																							 <input class="form-control" type="text" id="cliente_ventas_politica_cobrar" name="cliente_ventas_politica_cobrar">
																						</div>  
																					</div>
																			 </div>
																			<div class="">
																					<div class="form-group form-material">
																						 <label class="form-control-label pl-0">XI. PROVEEDOR  (es importante en la entrevista con el cliente, conocer quienes son sus principales fuentes de materia prima o productos para revender)</label>
																						 <div class="example table-responsive">
																								<table class="table">
																									 <thead>
																											<tr>
																												 <th>#</th>
																												 <th>Nombre <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Antiguedad <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Contacto</th>
																												 <th>Producto <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>% de Compras <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Pais <span style="color: rgba(240,62,41,1);">*</span></th>
																												 <th>Accion</th>
																											</tr>
																									 </thead>
																									 <tbody id="proveedor_fuentes">
																											<tr id="proveedor_fuentes_row1">
																												 <td>1</td>
																												 <td><input type="text" name="proveedor_fuentes_nombre[]" ></td>
																												 <td><input type="text" name="proveedor_fuentes_antiguedad[]" ></td>
																												 <td><input type="text" name="proveedor_fuentes_contacto[]"></td>
																												 <td><input type="text" name="proveedor_fuentes_producto[]" ></td>
																												 <td><input type="text" name="proveedor_fuentes_porcentaje[]" ></td>
																												 <td><input type="text" name="proveedor_fuentes_pais[]" ></td>
																											</tr>
																									 </tbody>
																								</table>
																								<button onclick="add_row_proveedor_fuentes();" id="addToTable-ci" class="btn btn-success" type="button">
																									<i class="icon md-plus" aria-hidden="true"></i> Agregar fila
																								</button>
																						 </div>
																					</div>
																					<div class="row">
																						 <div class="col-lg-6">
																								<label class="form-control-label pl-0" for="proveedor_composicion_compras">Composición de sus compras</label>
																								<div class="row">
																									<div class="col-lg-6">
																									<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="proveedor_composicion_compras_locales">% Locales</label>
																										 <input class="form-control" type="text" id="proveedor_composicion_compras_locales" name="proveedor_composicion_compras_locales">
																									</div>  
																								</div>
																								<div class="col-lg-6">
																									<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="proveedor_composicion_compras_exterior">% Exterior</label>
																										 <input class="form-control" type="text" id="proveedor_composicion_compras_exterior" name="proveedor_composicion_compras_exterior">
																									</div>
																								</div>
																								</div>
																						 </div>
																						 <div class="col-lg-6">
																								<label class="form-control-label pl-0" for="proveedor_mezcla_compras">Mezcla de Compras</label>
																								<div class="row">
																									<div class="col-lg-6">
																										<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="proveedor_mezcla_compras_contado">% Al contado</label>
																										 <input class="form-control" type="text" id="proveedor_mezcla_compras_contado" name="proveedor_mezcla_compras_contado">
																									</div>    
																									</div>
																									<div class="col-lg-6">
																										<div class="form-group form-material">
																										 <label class="form-control-label pl-0" for="proveedor_mezcla_compras_credito">% Al credito</label>
																										 <input class="form-control" type="text" id="proveedor_mezcla_compras_credito" name="proveedor_mezcla_compras_credito">
																									</div>
																									</div>
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-6">
																						<div class="form-group form-material">
																							 <label class="form-control-label pl-0" for="proveedor_compras_politica_pagar">Política de Cuentas por Pagar</label>
																							 <input class="form-control" type="text" id="proveedor_compras_politica_pagar" name="proveedor_compras_politica_pagar">
																						</div>  
																					</div>                                          
																			 </div>
																		</div>
																 </div>
															</div>
															<div class="panel">
																 <div class="panel-heading" id="exampleHeadingDefaultFour" role="tab">
																		<a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultFour" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultFour">
																		Paso 4
																		</a>
																 </div>
																 <div class="panel-collapse collapse" id="exampleCollapseDefaultFour" aria-labelledby="exampleHeadingDefaultFour" role="tabpanel">
																		<div class="panel-body">
																			 <div class="row">
																					<div class="col-lg-12">
																						 <div class="form-group form-material">
																								<label class="form-control-label pl-0">XII. RIESGO AMBIENTAL</label>
																						 </div>
																						 <div class="row">
																								<div class="col-lg-6">
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="tiene_dedica_agricultura">Si se dedica a la agricultura (por ejemplo, café, banano, etc.)  indicar el tamaño de la propiedad donde se realizará la actividad en hectáreas</label>
																											<div class="row">
																												<div class="col-lg-3">
																													<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" onclick="dedica_agricultura_check();" name="tiene_dedica_agricultura" id="dedica_agricultura_no" checked value="no" />
																													 <label for="inputRadiosChecked">No</label>
																												</div>
																												<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" type="radio" onclick="dedica_agricultura_check();" name="tiene_dedica_agricultura" id="dedica_agricultura_si" value="si"/>
																													 <label for="inputRadiosUnchecked">Si</label>
																												</div>	
																												</div>
																												<div class="col-lg-9">
																													<div id="dedica_agricultura_show" style="display:none">
																														<span style="color: rgba(240,62,41,1);">*</span>
																														<input class="form-control" type="text" id="dedica_agricultura" name="dedica_agricultura">	
																													</div>		
																												</div>
																											</div>
																									 </div>
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="tiene_dedica_construccion">Si se dedica a construcción indicar el tamaño del área construida en el que se realizara la actividad en m2 (en metros cuadrados) y zona en la que se encuentra ubicada (rural o urbana)</label>
																											<div class="row">
																												<div class="col-lg-3">
																													<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" onclick="dedica_construccion_check();" name="tiene_dedica_construccion" id="dedica_construccion_no" checked value="no" />
																													 <label for="inputRadiosChecked">No</label>
																												</div>
																												<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" type="radio" onclick="dedica_construccion_check();" name="tiene_dedica_construccion" id="dedica_construccion_si" value="si"/>
																													 <label for="inputRadiosUnchecked">Si</label>
																												</div>	
																												</div>
																												<div class="col-lg-9">
																													<div id="dedica_construccion_show" style="display:none">
																														<span style="color: rgba(240,62,41,1);">*</span>
																														<input class="form-control" type="text" id="dedica_construccion" name="dedica_construccion">
																													</div>
																												</div>
																											</div>
																									 </div>
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="tiene_dedica_pecuario">Si se dedica a actividades del sector pecuario indicar número de cabezas de ganado</label>
																											<div class="row">
																												<div class="col-lg-3">
																													<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" onclick="dedica_pecuario_check();" name="tiene_dedica_pecuario" id="dedica_pecuario_no" checked value="no" />
																													 <label for="inputRadiosChecked">No</label>
																												</div>
																												<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" type="radio" onclick="dedica_pecuario_check();" name="tiene_dedica_pecuario" id="dedica_pecuario_si" value="si"/>
																													 <label for="inputRadiosUnchecked">Si</label>
																												</div>	
																												</div>
																												<div class="col-lg-9">
																													<div id="dedica_pecuario_show" style="display:none">
																														<span style="color: rgba(240,62,41,1);">*</span>
																														<input class="form-control" type="text" id="dedica_pecuario" name="dedica_pecuario">
																													</div>		
																												</div>
																											</div>
																									 </div>
																								</div>
																								<div class="col-lg-6">
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="tiene_dedica_entrenamiento">Si se dedica a actividades de entretenimiento, esparcimiento o deportivas indicar el número de ocupantes</label>
																											<div class="row">
																												<div class="col-lg-3">
																													<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" onclick="dedica_entrenamiento_check();" name="tiene_dedica_entrenamiento" id="dedica_entrenamiento_no" checked value="no" />
																													 <label for="inputRadiosChecked">No</label>
																												</div>
																												<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" type="radio" onclick="dedica_entrenamiento_check();" name="tiene_dedica_entrenamiento" id="dedica_entrenamiento_si" value="si"/>
																													 <label for="inputRadiosUnchecked">Si</label>
																												</div>	
																												</div>
																												<div class="col-lg-9">
																													<div id="dedica_entrenamiento_show" style="display:none">
																														<span style="color: rgba(240,62,41,1);">*</span>
																														<input class="form-control" type="text" id="dedica_entrenamiento" name="dedica_entrenamiento">
																													</div>		
																												</div>
																											</div>
																									 </div>
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="tiene_dedica_alquiler">Si se dedica al alquiler o arrendamiento de bienes inmuebles indica la antigüedad de este y si fue utilizado en actividades agrícolas, industriales o ganaderas</label>
																									 </div>
																									 <div class="row">
																												<div class="col-lg-3">
																													<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" />
																													 <label for="inputRadiosChecked">No</label>
																												</div>
																												<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_si" value="si"/>
																													 <label for="inputRadiosUnchecked">Si</label>
																												</div>	
																												</div>
																												<div class="col-lg-12">
																													<div id="dedica_alquiler_show" style="display:none">
																														<div class="row">
																															<div class="col-lg-6">
																																 <div class="form-group form-material">
																																 		<span style="color: rgba(240,62,41,1);">*</span>
																																		<input class="form-control" type="text" id="dedica_alquiler" name="dedica_alquiler">
																																 </div>
																															</div>
																															<div class="col-lg-6">
																																<span style="color: rgba(240,62,41,1);">*</span>
																																 <select class="form-control border-right-0 border-left-0 border-top-0" id="dedica_alquiler_actividad" name="dedica_alquiler_actividad">
																																		<option value="">Seleccione una opción</option>
																																		<?php
																																			// while ($valores = mysqli_fetch_array($dedica_alquiler)) {
																																			//	 echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
																																			 //}
																																		 ?>
																																 </select>
																															</div>
																													 </div>
																													</div>		
																												</div>
																											</div>
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="tiene_dedica_hoteleria">Si se dedica a hotelería indicar el número de habitaciones </label>
																											<div class="row">
																												<div class="col-lg-3">
																													<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" onclick="dedica_hoteleria_check();" name="tiene_dedica_hoteleria" id="dedica_hoteleria_no" checked value="no" />
																													 <label for="inputRadiosChecked">No</label>
																												</div>
																												<div class="radio-custom float-left radio-primary pr-10 pt-0">
																													 <input type="radio" type="radio" onclick="dedica_hoteleria_check();" name="tiene_dedica_hoteleria" id="dedica_hoteleria_si" value="si"/>
																													 <label for="inputRadiosUnchecked">Si</label>
																												</div>	
																												</div>
																												<div class="col-lg-9">
																													<div id="dedica_hoteleria_show" style="display:none">
																														<span style="color: rgba(240,62,41,1);">*</span>
																														<input class="form-control" type="text" id="dedica_hoteleria" name="dedica_hoteleria">
																													</div>		
																												</div>
																											</div>
																									 </div>
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-12">
																						 <div class="form-group form-material">
																								<label class="form-control-label pl-0">XIII. RESPONSABILIDAD SOCIAL EMPRESARIAL (si o no)</label>
																						 </div>
																						 <div class="row">
																								<div class="col-lg-6">
																									<div class="row">
																										<div class="col-lg-6">
																											<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="field1">¿Aplica medidas de impacto medio ambiental y social?</label>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosUnchecked medio_ambiental" name="medio_ambiental" value="si" />
																														 <label for="inputRadiosUnchecked">Si</label>
																													</div>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosChecked medio_ambiental" name="medio_ambiental" checked value="no" />
																														 <label for="inputRadiosChecked">No</label>
																													</div>
																											 </div>
																										</div>
																										<div class="col-lg-6">
																											<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="field1">Cuenta con un manual medioambiental y social</label>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosUnchecked manual_ambiental" name="manual_ambiental" value="si" />
																														 <label for="inputRadiosUnchecked">Si</label>
																													</div>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosChecked manual_ambiental" name="manual_ambiental" checked value="no" />
																														 <label for="inputRadiosChecked">No</label>
																													</div>
																											 </div>
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-6">
																									<div class="row">
																										<div class="col-lg-6">
																											<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="field1">Cuenta con un codigo de etica</label>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosUnchecked codigo_etica" name="codigo_etica" value="si" />
																														 <label for="inputRadiosUnchecked">Si</label>
																													</div>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosChecked codigo_etica" name="codigo_etica" checked value="no" />
																														 <label for="inputRadiosChecked">No</label>
																													</div>
																											 </div>   
																										</div>
																										<div class="col-lg-6">
																											<div class="form-group form-material">
																													<label class="form-control-label pl-0" for="field1">Cuenta con una politica anticorrupcion</label>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosUnchecked politica_anticorrupcion" name="politica_anticorrupcion" value="si" />
																														 <label for="inputRadiosUnchecked">Si</label>
																													</div>
																													<div class="radio-custom radio-primary">
																														 <input type="radio" id="inputRadiosChecked politica_anticorrupcion" name="politica_anticorrupcion" checked value="no" />
																														 <label for="inputRadiosChecked">No</label>
																													</div>
																											 </div>
																										</div>
																									</div>
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="col-lg-6">
																								<div class="form-group">
																									<div class="form-group form-material mb-0 mt-10">
																										 <label class="form-control-label pl-0" for="conocio_arrend">XII. COMO CONOCIO ARREND:</label>
																									</div>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="conocio_arrend" name="conocio_arrend" onChange="conocido(this.value);" ="">
																										 <option value="">Seleccione una opción</option>
																										 <option value="conocio-1">Referido por Vendor</option>
																										 <option value="conocio-2">Referido por cliente existente ARREND</option>
																										 <option value="conocio-3">Lo encontre en medios digitales ARREND</option>
																										 <option value="conocio-4">Otros</option>
																									</select>
																							 </div>
																							</div>
																							<div class="col-lg-6">
																								<div id="conocio-1" style="display: none;">
																								<div class="col-lg-6">
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="conocido_nombre_vendor">Ingrese el nombre del Vendor:</label>
																											<span style="color: rgba(240,62,41,1);">*</span>
																											<input class="form-control" type="text" id="conocido_nombre_vendor" name="conocido_nombre_vendor">
																									 </div>
																								</div>
																						 </div>
																						 <div id="conocio-2" style="display: none;">
																								<div class="col-lg-12">
																									 <div class="row">
																											<div class="col-lg-6">
																												 <div class="form-group form-material">
																														<label class="form-control-label pl-0" for="conocido_nombre_cliente">Ingrese el nombre del cliente:</label>
																														<span style="color: rgba(240,62,41,1);">*</span>
																														<input class="form-control" type="text" id="conocido_nombre_cliente" name="conocido_nombre_cliente">
																												 </div>
																											</div>
																											<div class="col-lg-6">
																												 <div class="form-group form-material mb-0">
																														<label class="form-control-label pl-0" for="conocido_segmento_cliente">Seleccione el segmento:</label>
																														<span style="color: rgba(240,62,41,1);">*</span>
																												 </div>
																												 <select class="form-control border-right-0 border-left-0 border-top-0" id="conocido_segmento_cliente" name="conocido_segmento_cliente">
																														<option value="">Seleccione una opción</option>
																														<?php
																															 //while ($valores = mysqli_fetch_array($cartera_list)) {
																															 //	 echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
																															 //}
																															 ?>
																												 </select>
																											</div>
																									 </div>
																								</div>
																						 </div>
																						 <div id="conocio-3" style="display: none;">
																								<div class="col-lg-6">
																									 <div class="form-group">
																											<div class="form-group form-material mb-0">
																												 <label class="form-control-label pl-0" for="conocido_nombre_redsocial">Seleccione el medio ARREND:</label>
																												 <span style="color: rgba(240,62,41,1);">*</span>
																											</div>
																											<select class="form-control border-right-0 border-left-0 border-top-0" id="conocido_nombre_redsocial" name="conocido_nombre_redsocial">
																												 <option value="">Seleccione una opción</option>
																												 <?php
																														//while ($valores = mysqli_fetch_array($redes_sociales_list)) {
																														//	echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
																														//}
																												 ?>
																											</select>
																									 </div>
																								</div>
																						 </div>
																						 <div id="conocio-4" style="display: none;">
																								<div class="col-lg-6">
																									 <div class="form-group form-material">
																											<label class="form-control-label pl-0" for="conocido_otros">Ingrese la opción:</label>
																											<span style="color: rgba(240,62,41,1);">*</span>
																											<input class="form-control" type="text" id="conocido_otros" name="conocido_otros">
																									 </div>
																								</div>
																						 </div>
																							</div>
																						</div>
																					</div>
																					<div class="col-lg-12">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">XVI. FOTOGRAFIAS</label>
																						</div>																			 		
																				 		<div class="example table-responsive">
																							<table class="table">
																								<thead>
																									<tr>
																										<th>#</th>
																										<th>Imagen <span style="color: rgba(240,62,41,1);">*</span></th>
																										<th>Comentario <span style="color: rgba(240,62,41,1);">*</span></th>
																										<th>Accion</th>
																									</tr>
																							 	</thead>
																							 	<tbody id="fotografia">
																									<tr id="fotografia_row1">
																										<td>1</td>
																										<td><input type="file" name="fotografia_img[]" accept="image/*"  /></td>
																										<td><textarea class="form-control" id="textareaDefault" rows="3" name="fotografia_comentario[]" ></textarea></td>
																									</tr>
																							 	</tbody>
																							</table>
																							<button onclick="add_row_fotografia();" id="addToTable-ci" class="btn btn-success" type="button">
																								<i class="icon md-plus" aria-hidden="true"></i> Agregar imagen
																							</button>
																				 	</div>
																				</div>
																			 </div>
																		</div>
																 </div> <--tablist -->

												</div>  
											</div>   
											<div class="col-lg-12">
												<div class="form-group form-material">
													<button type="submit" class="btn btn-block btn-success">Guardar datos</button>
												</div>
												<div id="campos-requeridos" class="alert alert-danger col-md-12 mt-15 text-center" style="display: none;">
														<button type="button" class="close" aria-label="Close" data-dismiss="alert">
															<span aria-hidden="true">×</span>
														</button>
														<p>Verifique los campos obligatorios marcados con <span class="font-weight-bold">*</span>, antes de probar nuevamente</p>
												</div>
											</div>
										</div>
									 </div>
								</form>
							 </div>
						</div>
				 </div>
			</div>
	 </div>
</div>
	<!-- End Page -->
	<!-- Footer -->
		<?php include("../shared/footer.php"); ?>
	<!-- End Footer -->

	<script type="text/javascript">

function check() {
    document.getElementById("myCheck").checked = true;
}

function uncheck() {
    document.getElementById("myCheck").checked = false;
}

         /*
		 	Rutina mostrar elemento seleccionando el Check Box Lista
			1.- Recorremos todos los checkbox
			2.- verificamos estado y guardamos cuando sea 4 (Otras monedas) en Chk
			3.- Si el input es 4 (otra moneda) abre el bloque
		*/
		function chkotra_moneda_ing(id) {

			var allElements = document.querySelectorAll('.chkotramonedaing');
			var chk = false;

  			for(var i = 0; i < allElements.length; i++) {
				if(i == 3){
					chk = allElements[i].checked
				}
			}
			
			if(chk == true && id==4){
				document.getElementById("moneda_otros_show").style.display='block';
			}else{
				if(chk==true){
					document.getElementById("moneda_otros_show").style.display='block';
				}else{
					document.getElementById("moneda_otros_show").style.display='none';
					document.getElementById("vtipomoneda_ingreso_otra").value='';
				}
			}

		}

		//Uso en input Check
		function chkotra_moneda_egr(id){
			var allElements = document.querySelectorAll('.chkotramonedaegr');
			var chk = false;

			for(var i = 0; i < allElements.length; i++) {
				if(i == 3){
					chk = allElements[i].checked
				}
			}

			if(chk == true && id==4){
				document.getElementById("moneda_otrose_show").style.display='block';
			}else{
				if(chk==true){
					document.getElementById("moneda_otrose_show").style.display='block';
				}else{
					document.getElementById("moneda_otrose_show").style.display='none';
					document.getElementById("vtipomoneda_egreso_otra").value='';
				}
			}
		}

		function tipomoneda_ingreso1(id){
			if(id == '1,000,000.01 y Mayor ') {
				document.getElementById("tipomoneda_ingreso_show1").style.display='block';
			}else{
				document.getElementById("tipomoneda_ingreso_show1").style.display='none';
				document.getElementById("vhataingreso_qtz").value='';
			}
		}

		function tipomoneda_egreso2(id){
			if(id == '1,000,000.01 y Mayor ') {
				document.getElementById("tipomoneda_egreso_show2").style.display='block';
			}else{
				document.getElementById("tipomoneda_egreso_show2").style.display='none';
				document.getElementById("vhataegreso_qtz").value='';
			}
		}

		function tipoSociedad_entidad(id){
			if(id=='Otra') {
				document.getElementById("votrotipo_sociedad_show").style.display='block';
			}else{
				document.getElementById("votrotipo_sociedad_show").style.display='none';
				document.getElementById("votipo_sociedad").value='';
			}
		}

		function add_row_escriturapublica(){
			$rowno3=$("#modificaciones_escriturap tr").length;
			$rowno3=$rowno3+1;
			$("#modificaciones_escriturap tr:last").after("<tr id='modificaciones_escriturap_row"+$rowno3+"'><td>"+$rowno3+"</td><td><input type='text' name='vmodescritura_numero[]' required></td><td><div class='input-group'><span class='input-group-addon'><i class='icon md-calendar' aria-hidden='true'></i></span><input type='text' id='vescritura_fecha' name='vescritura_fecha[]' data-plugin='datepicker' value='<?php echo date('d/m/Y');?>'></div></td><td><input type='text' name='modescritura_notario[]' ></td><td><button onclick=delete_row_escriturapublica('modificaciones_escriturap_row"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
		}		

		function delete_row_escriturapublica(rowno2){
			$('#'+rowno2).remove();
		}

		function actua_mandatario(){
			//Si es Si
			if (document.getElementById('vactua_mandatario_si').checked) {
					document.getElementById("actua_mandatario_show").style.display='block';
				}else{
					document.getElementById("actua_mandatario_show").style.display='none';
				}
		}

		function efectos_solicitud(){
			//Si es Si
			if (document.getElementById('vparaefec_actuaunica_no').checked) {
					document.getElementById("efectos_solicitud_show").style.display='block';
				}else{
					document.getElementById("efectos_solicitud_show").style.display='none';
				}
		}

		function condicion_migratoria_otros(id){
		if(id=='Otra') {
				document.getElementById("condicion_migratoria_otro").style.display='block';
			}else{
				document.getElementById("condicion_migratoria_otro").style.display='none';
				
			}
		}

		function mostrarOtrosOrigenRiqueza(dato){
			if(dato == 'Otros (especifique)'){
				document.getElementById("vrepresen_asociadopep").style.display='block';
			}else{
				document.getElementById("vrepresen_asociadopep").style.display='none';
			}
		}

	</script>

	<!-- Script -->
		<?php include("../shared/script.php"); ?>
	<!-- End Script -->
</body>
</html>