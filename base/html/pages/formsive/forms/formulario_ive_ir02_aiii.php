<?php 
	include("header.php");

	require_once "conexion.php";
	require_once "funciones.php";
	
	$paises_list = get_paises_list();		
	$origenriqueza_list = get_origenriqueza_list();
	$parentesco_list = get_parentesco_list();
	

	



?>

<body class="animsition">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<?php include("navbar.php"); ?>
	<!-- Page -->

<div class="page">
	 <div class="page-header">
			<h1 class="page-title">ANEXO DE PERSONA EXPUESTA POLITACAMENTE -PEP-</h1>
			<ol class="breadcrumb">
				 <li class="breadcrumb-item"><a href="formaulario_ive_home.php">Inicio</a></li>
			</ol>
	 </div>
	 <div class="page-content container-fluid">
			<div class="row">
				 <div class="col-lg-12">
						<div class="mb-30">
							 <div class="panel-group" id="exampleWizardAccordion" aria-multiselectable="true" role="tablist">
									<form method="POST" action="formulario_ive_ir02_aiii.post.php" class="form-horizontal" id="exampleConstraintsFormTypes" enctype='multipart/form-data' autocomplete="off" onsubmit="return validate_form()">
										 <!--<input class="form-control" type="hidden" id="catalogo_formulario_id" name="catalogo_formulario_id" value="1">-->
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
																							<input class="form-control" type="text" id="vlugar" name="lugar" >
																					</div>
																				</div>
																				<div class="col-lg-6">
																					<div class="form-group form-material">
																						<label class="form-control-label pl-0" for="vfecha">FECHA (dd/mm/aaaa): <span style="color: rgba(240,62,41,1);">*</span></label>
																						<div class="input-group">
																							 <span class="input-group-addon">
																							 	<i class="icon md-calendar" aria-hidden="true"></i>
																							 </span>
																							 <input type="text" class="form-control" id="vfecha" name="fecha" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
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
																										<input class="form-control" type="text" id="vrazon_social" name="razon_social"  >																										
																								 </div>
																							</div>
																					 </div>
																				</div>
																				<div class="col-lg-8">
																					 <div class="row">
																							<div class="col-lg-12">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnombre_central_sucursal"> 3.2  Nombre de la central, sucursal o agencia donde se solicita el producto o servicio: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vnombre_central_sucursal" name="nombre_central_sucursal" >
																								 </div>
																							</div>
																					 </div>
																				</div>
																				<div class="col-lg-4">
																					 <div class="row">
																							<div class="col-lg-12">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vcodigo_sucursual"> 3.2.1  Código de agencia o sucursal: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vcodigo_sucursual" name="codigo_sucursual" value="0000">																								 
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
																			4. DATOS PERSONALES DE 1
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultTwo" aria-labelledby="exampleHeadingDefaultTwo" role="tabpanel">
																  	 <div class="panel-body">
																		 <div class="row">

																		 	<div class="col-lg-12">
																				<div class="row">	

																					<div class="col-lg-2"> 																										
																						<div class="form-group form-material">
																							 	<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio" type="radio"  name="datos_personales" id="datospersona41" value="Solicitante" />
																										<label for="inputRadiosUnchecked">4.1 Solicitante:</label>
																								</div>
																						</div>			
																					</div>	
																					<div class="col-lg-2"> 																										
																						<div class="form-group form-material">
																								 <div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio" type="radio"  name="datos_personales" id="datospersona42" value="Representante legal" />
																										<label for="inputRadiosUnchecked">4.2 Representante Legal:</label>
																								</div>	
																						</div>		
																					</div>		
																					<div class="col-lg-4"> 																										
																						<div class="form-group form-material">
																					
																								<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio" type="radio"  name="datos_personales" id="datospersona43" value="Otros firmantes" />
																										<label for="inputRadiosUnchecked">4.3 Otros firmates (y/o tarjetahabientes adicionales):</label>
																								</div>	
																						</div>	
																					</div>					
																					<div class="col-lg-3"> 																										
																						<div class="form-group form-material">
																					
																								<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio" type="radio"  name="datos_personales" id="datospersona44" value="Beneficiario 2" />
																										<label for="inputRadiosUnchecked">4.4 Beneficiario 2:</label>
																								</div>	
																							</div>	
																					</div>		
																					
																				</div>
																			</div>	
																				
																			<div class="col-lg-12">
																				<div class="row">																											
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">4.5 Primer apellido:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido" name="representa_primer_apellido" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">Segundo apellido:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido2" name="representa_segundo_apellido" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">Apellido de casada:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido3" name="representa_tercer_apellido" >
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-lg-12">
																				<div class="row">																											
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Primer nombre:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre" name="representa_primer_nombre" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Segundo nombre:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre2" name="representa_segundo_nombre" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Otros nombres:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre3" name="representa_tercer_nombre" >
																						</div>
																					</div>
																				</div>
																			</div>
																			
																			<div class="col-lg-12">
																				<div class="row">	
																					<div class="col-lg-12"> 																										
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">4.6 Razón Social / Nombre Comercial:</label>
																							<input class="form-control" type="text" id="vrepresenta_lugarnaci" name="representa_lugar_nacimiento" >
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
																			5. DATOS DE LA PERSONA QUE SE INDICO EN EL PUNTO ANTERIOR
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultThree" aria-labelledby="exampleHeadingDefaultThree" role="tabpanel">
																  	 <div class="panel-body">
																		 <div class="col-lg-12">

																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="form-group">
																							<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.1 PERSONA EXPUESTA POLITICAMENTE </label>
																						</div>
																					</div>
																				</div>  
																			</div> 

																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="form-group">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.1.1 Es Persona Expuesta Políticamente (PEP):</label>
																									<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio"  name="espersona_expuestapep" id="espersona_expuesta_no" checked value="NO"  checked onclick="persona_expuestapep();"/>
																										<label for="inputRadiosChecked">No</label>
																									</div>
																									<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio" type="radio"  name="espersona_expuestapep" id="espersona_expuesta_si" value="SI" onclick="persona_expuestapep();"/>
																										<label for="inputRadiosUnchecked">Si</label>
																									</div>	
																								</div>	
																							</div>		
																						</div>	
																					</div>		
																				</div>

																			<div style="display:none;" id="persona_expuestapep_show" class=" mb-20">   <!-- Inicia Bloque 5.2.1 -->	
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-6">
																							<div class="row">
																								<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0">5.1.2 Codición:</label>
																										<div class="radio-custom float-right radio-primary pr-20 pt-0">
																											<input type="radio"  name="condicion_pep" id="realiza_transferencia_no" checked value="NACIONAL"/>
																											<label for="inputRadiosChecked">Nacional</label>
																										</div>
																										<div class="radio-custom float-right radio-primary pr-20 pt-0">
																											<input type="radio" type="radio"  name="condicion_pep" id="realiza_transferencia_si" value="EXTRANJERO"/>
																											<label for="inputRadiosUnchecked">Extranjero</label>
																										</div>	
																									</div>	
																								</div>		
																							</div>	
																						</div>		
																					</div>
																				</div>	
																				
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.1.3 Nombre de la institución o ente donde trabaja:</label>
																										<input class="form-control" type="text" id="vnumero_subsidiaria" name="nombre_institucion_trabajo_pep">
																									</div>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_empleados">5.1.4 Puesto que desempeña:</label>
																										<input class="form-control" type="text" id="vnumero_empleados" name="puesto_institucion_trabajo_pep" >
																									</div>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_empleados">5.1.5 País de la institución o ente:</label>
																										
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vorigen_riqueza_pep" name="pais_institucion_trabajo_pep" >
																									<option value="">Seleccione una opción</option>
																										<?php
																											foreach ($paises_list as $pais) { 
																												echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
																											}
																										?>
																									</select>
																									</div>
																							</div>
																						</div>
																					</div>  
																				</div> 
																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-12">
																							<div class="form-group form-material mb-0">
																								<label class="form-control-label pl-0" for="pais">5.1.6 En el caso de que el solicitante o representante legal de la entidad solicitane sea PEP, indicar el origen o procedencia de su riqueza* (bienes muebles e inmuebles) -marcar la(s) que aplique(n)-:</label>
																							</div>
																						</div>
																					</div>
																				</div> 
																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-8">
																							<div class="form-material mb-0">
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vorigen_riqueza_pep" name="origen_riquezapep" onChange="mostrarOrigenRiquezaOtros(this.value);">
																									<option value="">Seleccione una opción</option>
																										<?php
																											foreach ($origenriqueza_list as $origenRiqueza) { 
																												echo '<option value="'.$origenRiqueza['nombre'].'">'.$origenRiqueza['nombre'].'</option>';
																											}
																										?>
																									</select>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<input type="text" class="form-control" id="vrepresen_asociadopep" style="display: none" name="origen_riquezapep_otro" placeholder="especifique...">
																							</div>
																						</div>
																					</div>
																				</div> 
																			</div>

																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="form-group">
																							<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.2 PARENTESCO CON UNA PERSONA EXPUESTA POLÍTICAMENTE (PEP) </label>
																						</div>
																					</div>
																				</div>  
																			</div> 
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="form-group">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.2.1 Tiene parentesco con una Persona Expuesta Políticamente (PEP): (Si es positiva, indicar lo siguiente):</label>
																									<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio"  name="tiene_parentesco_pep" id="tiene_parentesco_no" value="NO" checked onclick="tiene_parentesco();"/>
																										<label for="inputRadiosChecked">No</label>
																									</div>
																									<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio" type="radio"  name="tiene_parentesco_pep" id="tiene_parentesco_si" value="SI" onclick="tiene_parentesco();"/>
																										<label for="inputRadiosUnchecked">Si</label>
																									</div>	
																								</div>	
																							</div>		
																						</div>	
																					</div>		
																				</div>	
																			</div>		
																		
																			<div style="display:none;" id="tiene_parentesco_show" class=" mb-20">   <!-- Inicia Bloque 5.2.1 -->

																				<div class="col-lg-12">
																					<div class="col-lg-4"> 
																							<label class="form-control-label pl-0" for="vtipomoneda_ingresousuario_bien">5.2.2 Indicar parentesco: </label>
																							<div class="form-group">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio" name="indicar_parentezco" onChange="mostrarParentescoOtro(this.value)">
																								<option value="">Seleccione una opción</option>
																								<?php
																										foreach($parentesco_list as $parentesco){
																											echo '<option value="'.$parentesco['nombre'].'">'.$parentesco['nombre'].'</option>';
																										}																	

																									?>
																								</select>
																							</div>
																					</div>		

																					<div class="col-lg-8">
																						<div style="display:none;" id="moneda_otros_show" class=" mb-20">
																							<div class="col-lg-12">
																								<div class="form-group form-material m-0" >
																									<div class="col-lg-4 float-left">
																										<label>Otras (Especifique):</label>
																									</div>	
																									<div class="col-lg-7 float-left">
																										<input class="form-control" type="text" id="vtipomoneda_ingreso_otra" style="display: none;" name="indicar_parentezco_otros">
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
																								<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.2.3 Datos de la persona que desempeña el cargo público relevante: </label>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="row">
																								<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0">5.2.3.1 Codición:</label>
																										<div class="radio-custom float-right radio-primary pr-20 pt-0">
																											<input type="radio"  name="condicion_pep2" id="realiza_transferencia_no" checked value="NACIONAL"/>
																											<label for="inputRadiosChecked">Nacional</label>
																										</div>
																										<div class="radio-custom float-right radio-primary pr-20 pt-0">
																											<input type="radio" type="radio"  name="condicion_pep2" id="realiza_transferencia_si" value="EXTRANJERO"/>
																											<label for="inputRadiosUnchecked">Extranjero</label>
																										</div>	
																									</div>	
																								</div>		
																							</div>	
																						</div>		
																					</div>  
																				</div> 

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">5.2.3.2 Primer apellido:</label>
																								<input class="form-control" type="text" id="vrepresenta_apellido" name="representa_primer_apellido_pep" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">Segundo apellido:</label>
																								<input class="form-control" type="text" id="vrepresenta_apellido2" name="representa_segundo_apellido_pep" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">Apellido de casada:</label>
																								<input class="form-control" type="text" id="vrepresenta_apellido3" name="representa_tercer_apellido_pep" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Primer nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre" name="representa_primer_nombre_pep" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Segundo nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre2" name="representa_segundo_nombre_pep" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Otros nombres:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre3" name="representa_tercer_nombre_pep" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-3">
																					<div class="form-group form-material">
																						<label class="form-control-label pl-0">5.2.3.3 Género:</label>
																						<select class="form-control border-right-0 border-left-0 border-top-0" id="vgenero" name="genero">
																								<option value="MASCULINO">MASCULINO</option>
																								<option value="FEMENINO">FEMENINO</option>
																						</select>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.2.3.4 Nombre de la institución o ente donde trabaja:</label>
																										<input class="form-control" type="text" id="vnumero_subsidiaria" name="nombre_institucion_trabajo_pep2">
																									</div>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_empleados">5.2.3.5 Puesto que desempeña:</label>
																										<input class="form-control" type="text" id="vnumero_empleados" name="puesto_institucion_trabajo_pep2" >
																									</div>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_empleados">5.2.3.6 País de la institución o ente:</label>
																										
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vorigen_riqueza_pep" name="pais_institucion_trabajo_pep2" >
																									<option value="">Seleccione una opción</option>
																										<?php
																											foreach ($paises_list as $pais) { 
																												echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
																											}
																										?>
																									</select>
																									</div>
																							</div>
																						</div>
																					</div>  
																				</div> 
																			</div>  <!-- Termina Bloque 5.2.1 -->

																			
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="form-group">
																							<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.3 ASOCIADO CERCANO DE UNA PERSONA EXPUESTA POLÍTICAMENTE (PEP) </label>
																						</div>
																					</div>
																				</div>  
																			</div> 
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="form-group">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.3.1 Tiene parentesco con una Persona Expuesta Políticamente (PEP): (Si es positiva, indicar lo siguiente):</label>
																									<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio"  name="parentesco_pep" id="tiene_parentesco_empresa_no" value="NO" checked onclick="tiene_parentesco_empresa();"/>
																										<label for="inputRadiosChecked">No</label>
																									</div>
																									<div class="radio-custom float-right radio-primary pr-20 pt-0">
																										<input type="radio" type="radio"  name="parentesco_pep" id="tiene_parentesco_empresa_si" value="SI" onclick="tiene_parentesco_empresa();"/>
																										<label for="inputRadiosUnchecked">Si</label>
																									</div>	
																								</div>	
																							</div>		
																						</div>	
																					</div>		
																				</div>	
																			</div>		
																		
																			<div style="display:none;" id="tiene_parentesco_empresa_show" class=" mb-20">   <!-- Inicia Bloque 5.3.1 -->

																				<!-- <div class="col-lg-12">
																					<div class="col-lg-8">
																						<div class="form-group">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0" for="vtipomoneda_ingresousuario_bien">5.3.2 Indicar parentesco: </label>
																							</div>
																						</div>
																						<div class="col-lg-12">
																							<div class="form-group">
																								<?php
																									// while ($valores = mysqli_fetch_array($asociado_emp_list)) {
																									// 	echo '
																									// 		<div class="checkbox-custom checkbox-danger ">
																									// 			<input type="checkbox" class="chkotramonedaing" id="chkotroparentesco" name="chkotramonedaing[]" value="'.$valores['id'].'" onclick="chkotro_parentesco(this.value);">
																									// 			<label>'.$valores['nombre'].'</label>
																									// 		</div>';
																									// }
																								?>
																							</div> 
																						</div>
																						<div class="col-lg-12">
																							<div style="display:none;" id="parentesco_otro_show" class=" mb-20">
																								<div class="col-lg-12">
																									<div class="form-group form-material m-0" >
																										<div class="col-lg-4 float-left">
																											<label>Otro (Especifique):</label>
																										</div>	
																										<div class="col-lg-7 float-left">
																											<input class="form-control" type="text" id="vparentesco_otro" name="vparentesco_otro">
																										</div>	
																									</div>
																								</div>
																							</div>
																						</div>	
																					</div>
																				</div>	 -->
																				<div class="col-lg-12">
																					<div class="col-lg-4"> 
																					<label class="form-control-label pl-0" for="vtipomoneda_ingresousuario_bien">5.3.2 Indicar parentesco: </label>
																							<div class="form-group">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio" name="indicar_parentesco" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										foreach($parentesco_list as $parentesco){
																											echo '<option value="'.$parentesco['nombre'].'">'.$parentesco['nombre'].'</option>';
																										}																	

																									?>
																								</select>
																							</div>
																					</div>		

																					<div class="col-lg-8">
																						<div style="display:none;" id="moneda_otros_show" class=" mb-20">
																							<div class="col-lg-12">
																								<div class="form-group form-material m-0" >
																									<div class="col-lg-4 float-left">
																										<label>Otras (Especifique):</label>
																									</div>	
																									<div class="col-lg-7 float-left">
																										<input class="form-control" type="text" id="vtipomoneda_ingreso_otra" name="indicar_parentesco_otro">
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
																								<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.3.3 Datos de la persona que desempeña el cargo público relevante: </label>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="row">
																								<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0">5.3.3.1 Codición:</label>
																										<div class="radio-custom float-right radio-primary pr-20 pt-0">
																											<input type="radio"  name="indicar_parentesco_condicion" id="realiza_transferencia_no" checked value="NACIONAL"/>
																											<label for="inputRadiosChecked">Nacional</label>
																										</div>
																										<div class="radio-custom float-right radio-primary pr-20 pt-0">
																											<input type="radio" type="radio"  name="indicar_parentesco_condicion" id="realiza_transferencia_si" value="EXTRANJERO"/>
																											<label for="inputRadiosUnchecked">Extranjero</label>
																										</div>	
																									</div>	
																								</div>		
																							</div>	
																						</div>		
																					</div>  
																				</div> 

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">5.3.3.2 Primer apellido:</label>
																								<input class="form-control" type="text" id="vrepresenta_apellido" name="parentesco_primer_apellido" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">Segundo apellido:</label>
																								<input class="form-control" type="text" id="vrepresenta_apellido2" name="parentesco_segundo_apellido" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">Apellido de casada:</label>
																								<input class="form-control" type="text" id="vrepresenta_apellido3" name="parentesco_tercer_apellido" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Primer nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre" name="parentesco_primer_nombre" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Segundo nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre2" name="parentesco_segundo_nombre" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Otros nombres:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre3" name="parentesco_tercer_nombre" >
																							</div>
																						</div>
																					</div>
																				</div>

																				<div class="col-lg-3">
																					<div class="form-group form-material">
																						<label class="form-control-label pl-0">5.3.3.3 Género:</label>
																						<select class="form-control border-right-0 border-left-0 border-top-0" id="vgenero" name="parentesco_genero">
																								<option value="MASCULINO">MASCULINO</option>
																								<option value="FEMENINO">FEMENINO</option>
																						</select>
																					</div>
																				</div>

																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_subsidiaria">5.3.3.4 Nombre de la institución o ente donde trabaja:</label>
																										<input class="form-control" type="text" id="vnumero_subsidiaria" name="parentesco_institucion_trabaja">
																									</div>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_empleados">5.3.3.5 Puesto que desempeña:</label>
																										<input class="form-control" type="text" id="vnumero_empleados" name="parentesco_institucion_puesto" >
																									</div>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vnumero_empleados">5.3.3.6 País de la institución o ente:</label>
																										
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vorigen_riqueza_pep" name="parentesco_institucion_pais" >
																									<option value="">Seleccione una opción</option>
																										<?php
																											foreach ($paises_list as $pais) { 
																												echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
																											}
																										?>
																									</select>
																										
																									</div>
																							</div>
																						</div>
																					</div>  
																				</div> 
																			</div>  <!-- Termina Bloque 5.3.1 -->


																		    </div>  <!-- Fin Row -->
																		</div>  <!-- Panel Body -->
																 </div>  <!--panel-collapse -->
															</div>   <!--panel -->
															

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
		<?php include("footer.php"); ?>
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

		function tipomoneda_ingreso(id){
			if(id==6) {
				document.getElementById("tipomoneda_ingreso_show").style.display='block';
			}else{
				document.getElementById("tipomoneda_ingreso_show").style.display='none';
				document.getElementById("vhataingreso_qtz").value='';
			}
		}

		function tipomoneda_egreso(id){
			if(id==6) {
				document.getElementById("tipomoneda_egreso_show").style.display='block';
			}else{
				document.getElementById("tipomoneda_egreso_show").style.display='none';
				document.getElementById("vhataegreso_qtz").value='';
			}
		}

		function tipoSociedad_entidad(id){
			if(id==5) {
				document.getElementById("votrotipo_sociedad_show").style.display='block';
			}else{
				document.getElementById("votrotipo_sociedad_show").style.display='none';
				document.getElementById("votipo_sociedad").value='';
			}
		}

		function add_row_escriturapublica(){
			$rowno3=$("#modificaciones_escriturap tr").length;
			$rowno3=$rowno3+1;

			$("#modificaciones_escriturap tr:last").after("<tr id='modificaciones_escriturap_row"+$rowno3+"'><td><input type='text' name='vmodescritura_numero[]' required></td><td><div class='input-group'><span class='input-group-addon'><i class='icon md-calendar' aria-hidden='true'></i></span><input type='text' id='vescritura_fecha' name='vescritura_fecha[]' data-plugin='datepicker' value='<?php echo date('m/d/Y');?>' required></div></td><td><input type='text' name='principales_productos_vendidas[]' required></td><td><button onclick=delete_row_principales_productos('principales_productos_row"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
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
			if (document.getElementById('vparaefec_actuaunica_si').checked) {
					document.getElementById("efectos_solicitud_show").style.display='block';
				}else{
					document.getElementById("efectos_solicitud_show").style.display='none';
				}
		}

		//Uso en input Check - Procedimiento Focos PRODUCOS
		function procedenciafondos_prestamo(id){
			if (document.getElementById('chkprocedeprestamo').checked) {
					document.getElementById("procedenciafondos_prestamo_show").style.display='block';
			}else{
				document.getElementById("procedenciafondos_prestamo_show").style.display='none';
			}
		}
		
		function traspasocancelacion_fondos(id){
			if (document.getElementById('chktraspasocancelacion').checked) {
					document.getElementById("traspasocancelacion_fondos_show").style.display='block';
			}else{
				document.getElementById("traspasocancelacion_fondos_show").style.display='none';
			}
		}
		
		function procedenciafondos_otros_fondos(id){
			if (document.getElementById('chkotrofondos').checked) {
					document.getElementById("procedenciafondos_otros_show").style.display='block';
			}else{
				document.getElementById("procedenciafondos_otros_show").style.display='none';
			}
		}
		
		function realiza_transferencia_check(){
			//Si es Si
			if (document.getElementById('realiza_transferencia_si').checked) {
					document.getElementById("realiza_transferencia_show").style.display='block';
				}else{
					document.getElementById("realiza_transferencia_show").style.display='none';
				}
		}

		function chkotra_parentesco(id){
			var allElements = document.querySelectorAll('.chkotroparentesco');
			var chk = false;

			for(var i = 0; i < allElements.length; i++) {
				if(i == 5){   /*6 (otro parentesco)*/
					chk = allElements[i].checked
				}
			}

			if(chk == true && id==6){
				document.getElementById("parentesco_otro_show").style.display='block';
			}else{
				if(chk==true){
					document.getElementById("parentesco_otro_show").style.display='block';
				}else{
					document.getElementById("parentesco_otro_show").style.display='none';
					document.getElementById("vparentesco_otro").value='';
				}
			}
		}

		function tiene_parentesco(){
			//Si es Si
			if (document.getElementById('tiene_parentesco_si').checked) {
					document.getElementById("tiene_parentesco_show").style.display='block';
				}else{
					document.getElementById("tiene_parentesco_show").style.display='none';
				}
		}

		function tiene_parentesco_empresa(){
			//Si es Si
			if (document.getElementById('tiene_parentesco_empresa_si').checked) {
					document.getElementById("tiene_parentesco_empresa_show").style.display='block';
				}else{
					document.getElementById("tiene_parentesco_empresa_show").style.display='none';
				}
		}

		function persona_expuestapep(){
			//Si es Si
			if (document.getElementById('espersona_expuesta_si').checked) {
					document.getElementById("persona_expuestapep_show").style.display='block';
				}else{
					document.getElementById("persona_expuestapep_show").style.display='none';
				}
		}


		function mostrarOrigenRiquezaOtros(data){
			
			if(data=='Otros (especifique)') {
				document.getElementById("vrepresen_asociadopep").style.display='block';
			}else{
				document.getElementById("vrepresen_asociadopep").style.display='none';
				
			}
			
		}


		function mostrarParentescoOtro(data){
			
			if(data=='Otro') {
				document.getElementById("vtipomoneda_ingreso_otra").style.display='block';
			}else{
				document.getElementById("vtipomoneda_ingreso_otra").style.display='none';
				
			}
		}

	</script>

	<!-- Script -->
		<?php include("script.php"); ?>
	<!-- End Script -->
</body>
</html>