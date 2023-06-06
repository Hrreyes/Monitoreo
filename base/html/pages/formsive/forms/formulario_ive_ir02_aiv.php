<?php 
	include("header.php");

	require_once "conexion.php";
	require_once "funciones.php";
	
/*********************************usadas para este archivo***********************/
	$paises_list = get_paises_list();	
	$departamentos_list = get_departamentos_list();
	$municipios_list = get_municipios_list();
	$tipomoneda_list = get_tiposmoneda_list();
/*********************************usadas para este archivo***********************/










	
	$procedenciafondos_list1 = get_procedenciafondos_list(1);
	$procedenciafondos_list2 = get_procedenciafondos_list(2);
	$procedenciafondos_list3 = get_procedenciafondos_list(3);
	$procedenciafondos_list4 = get_procedenciafondos_list(4);
	$procedenciafondos_list5 = get_procedenciafondos_list(5);
	$procedenciafondos_list6 = get_procedenciafondos_list(6);
	$procedenciafondos_list7 = get_procedenciafondos_list(7);
	$procedenciafondos_list8 = get_procedenciafondos_list(8);
	$origenriqueza_list = get_origenriqueza_list();
	$parentesco_list = get_parentesco_list();
	$asociado_emp_list = get_asociado_list();
    $relaciontitular_list = get_relaciontitular_list();
	$condicionmigracion_list = get_concionesmigra_visita_list();


	// $redes_sociales_list = get_redes_sociales_list();
	// $cartera_list = get_cartera_list();
	// $dedica_alquiler = get_dedica_alquiler_list();
	// $motivo_visita_list = get_motivo_visita_list();

	//Solucion Temporal *REVISAR
	//---------------------------------------
	
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

	<?php include("navbar.php"); ?>
	<!-- Page -->

<div class="page">
	 <div class="page-header">
			<h1 class="page-title">ANEXO DE BENEFICIARIOS (Obligatorio en el caso de Aseguradoras*)</h1>
			<ol class="breadcrumb">
				 <li class="breadcrumb-item"><a href="formaulario_ive_home.php">Inicio</a></li>
			</ol>
	 </div>
	 <div class="page-content container-fluid">
			<div class="row">
				 <div class="col-lg-12">
						<div class="mb-30">
							 <div class="panel-group" id="exampleWizardAccordion" aria-multiselectable="true" role="tablist">
									<form method="POST" action="formulario_ive_ir02_aiv.post.php" class="form-horizontal" id="exampleConstraintsFormTypes" enctype='multipart/form-data' autocomplete="off" onsubmit="return validate_form()">
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
																							 <input type="text" class="form-control" id="vfecha" name="fecha" data-plugin="datepicker" value="<?php echo date('m/d/Y');?>" >
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
																										<input class="form-control" type="text" id="vrazon_social" name="razon_social" >																										
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
																										<input class="form-control" type="text" id="vcodigo_sucursual" name="codigo_agencia">																								 
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
																			4. DATOS DE LA PERSONA OBLIGADA
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultTwo" aria-labelledby="exampleHeadingDefaultTwo" role="tabpanel">
																  	 <div class="panel-body">
																		 <div class="row">

																			<div class="col-lg-12">
																				<div class="row">																											
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">4.1 Primer apellido:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido" name="persona_obligada_primer_apellido" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">Segundo apellido:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido2" name="persona_obligada_segundo_apellido" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">Apellido de casada:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido3" name="persona_obligada_tercer_apellido" >
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-lg-12">
																				<div class="row">																											
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Primer nombre:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre" name="persona_obligada_primer_nombre" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Segundo nombre:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre2" name="persona_obligada_segundo_nombre" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Otros nombres:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre3" name="persona_obligada_tercer_nombre" >
																						</div>
																					</div>
																				</div>
																			</div>
																			
																			<div class="col-lg-12">
																				<div class="row">	
																					<div class="col-lg-12"> 																										
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">4.2 Razón Social / Nombre Comercial:</label>
																							<input class="form-control" type="text" id="vrepresenta_lugarnaci" name="persona_obligada_razon_social" >
																						</div>
																					</div>
																				</div>
																			</div>
																			
                                                                            <div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-12"> 
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">4.3 Dirección de sede social completa (calle o avenida, número de casa, colonia, sector, lote, manzana, otros):</label>
																								<input class="form-control" type="text" id="vdireccion_particular" name="persona_obligada_direccion_sede" >
																							</div>
																						</div>
																					</div>
																			    </div>

																				 <div class="col-lg-12"> 
																					<div class="row">
																								<div class="col-lg-3">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vdirec_zona2">Zona: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vdirec_zona2" name="persona_obligada_zona" >
																									</div>
																								</div>																							

																								<div class="col-lg-3">
																									<div class="form-group">
																										<div class="form-group form-material mb-0">
																											<label class="form-control-label pl-0" for="vdirec_pais">País: <span style="color: rgba(240,62,41,1);">*</span></label>
																										</div>
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_pais" name="persona_obligada_pais" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												foreach($paises_list as $pais){
																													echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
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
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_departa2" name="persona_obligada_departamento" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												foreach($departamentos_list as $departamento){
																													echo '<option value="'.$departamento['id'].'">'.$departamento['nombre'].'</option>';
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
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio" name="persona_obligada_municipio"> 
																										<option value="">Seleccione una opción</option>
																											<?php
																												foreach($municipios_list as $municipio){
																													echo '<option value="'.$municipio['id'].'">'.$municipio['nombre'].'</option>';
																												}
																											?>
																										</select>
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
																			5. DATOS DEL BENEFICIARIO DISTINTO AL SOLICITANTE   O CONTRAFIADOR  1/
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultThree" aria-labelledby="exampleHeadingDefaultThree" role="tabpanel">
																  	 <div class="panel-body">
                                                                       <div class="row">
		
																		   <div class="col-lg-12">
																			   <div clss="row">
																			   		<div class="form-group">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.1 PARENTESCO O RELACIÓN CON EL SOLICITANTE</label>
																						</div>
																					</div>	
																				</div>
																			</div>

																			<div class="col-lg-12">
																				<div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <div class="form-group form-material mb-0">
                                                                                                <label class="form-control-label pl-0" for="vdirec_pais">5.1.1 Relación con el titular del producto o servicio:<span style="color: rgba(240,62,41,1);">*</span></label>
                                                                                            </div>
                                                                                            <select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_pais" name="relacion_solicitante" >
                                                                                            <option value="">Seleccione una opción</option>
                                                                                                <?php
																									foreach($relaciontitular_list as $relacionTitular){
																										echo '<option value="'.$relacionTitular['nombre'].'">'.$relacionTitular['nombre'].'</option>';
																									}                                                                                               
                                                                                                     
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
																				</div>		
																			</div>	

																			<div class="col-lg-12">
																			   <div clss="row">
																			   		<div class="form-group">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.2 PERESONAL INDIVIDUAL</label>
																						</div>
																					</div>	
																				</div>
																			</div>

																			<div class="col-lg-12">
																				<div class="row">																											
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.2.1 Primer apellido:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido" name="personal_individual_primer_apellido" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">Segundo apellido:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido2" name="personal_individual_segundo_apellido" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">Apellido de casada:</label>
																							<input class="form-control" type="text" id="vrepresenta_apellido3" name="personal_individual_tercer_apellido" >
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-lg-12">
																				<div class="row">																											
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Primer nombre:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre" name="personal_individual_primer_nombre" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Segundo nombre:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre2" name="personal_individual_segundo_nombre" >
																						</div>
																					</div>
																					<div class="col-lg-4">
																						<div class="form-group form-material">
																								<label class="form-control-label pl-0">Otros nombres:</label>
																								<input class="form-control" type="text" id="vrepresenta_nombre3" name="personal_individual_tercer_nombre" >
																						</div>
																					</div>
																				</div>
																			</div>

                                                                            <div class="col-lg-12">
                                                                                <div class="row">																											
                                                                                    <div class="col-lg-3">
                                                                                        <div class="form-group form-material">
                                                                                                <label class="form-control-label pl-0">5.2.2 Fecha de nacimiento (dd/mm/aaaa):</label>
                                                                                                <div class="input-group">
                                                                                                    <span class="input-group-addon">
                                                                                                        <i class="icon md-calendar" aria-hidden="true"></i>
                                                                                                    </span>
                                                                                                    <input type="text" class="form-control" id="vrepresenta_fechanac" name="personal_individual_fechaNacimiento" data-plugin="datepicker" value="<?php echo date('m/d/Y');?>" >
                                                                                                </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3">
                                                                                        <div class="form-group form-material">
                                                                                                <label class="form-control-label pl-0">5.2.3 Nacionalidad:</label>
                                                                                                <input class="form-control" type="text" id="vrepresenta_nacionali" name="personal_individual_nacionalidad">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3">
                                                                                        <div class="form-group form-material">
                                                                                                <label class="form-control-label pl-0">5.2.4 Otra nacionalidad:</label>
                                                                                                <input class="form-control" type="text" id="vrepresenta_otranacio" name="personal_individual_nacionalidad_otra" >
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3">
                                                                                        <div class="form-group form-material">
                                                                                                <label class="form-control-label pl-0">5.2.5 Lugar de nacimiento:</label>
                                                                                                <input class="form-control" type="text" id="vrepresenta_lugarnaci" name="personal_individual_lugarNacimiento" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
																			</div>

                                                                             <div class="col-lg-12"> 
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group form-material mb-0">
                                                                                            <label class="form-control-label pl-0" for="vdirec_pais">5.2.6 Condición migratoria</label>
                                                                                        </div>
                                                                                        <div class="form-material mb-0">
                                                                                            <select class="form-control border-right-0 border-left-0 border-top-0" id="vorigen_riquezapep" name="personal_individual_condicion_migratoria" >
                                                                                            <option value="">Seleccione una opción</option>
                                                                                                <?php
																									foreach($condicionmigracion_list as $condicionMigratoria){
																										echo '<option value="'.$condicionMigratoria['nombre'].'">'.$condicionMigratoria['nombre'].'</option>';
																									}
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                     <div class="col-lg-3">
                                                                                        <div class="form-group form-material">
                                                                                            <label class="form-control-label pl-0">5.2.7 Genero:</label>
                                                                                            <select class="form-control border-right-0 border-left-0 border-top-0" id="vgenero" name="persona_individual_genero">
                                                                                                <option value="MASCULINO">MASCULINO</option>
                                                                                                <option value="FEMENINO">FEMENINO</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
																			</div> 
                                                                               
																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-2">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.2.8 Estado Civil:</label>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vestado_civil" name="persona_individual_estadoCivil">
																										<option value="SOLTERO">SOLTERO (a)</option>
																										<option value="CASADO">CASADO (a)</option>
																									 </select> 
																							</div>
																						</div>
																						<div class="col-lg-4">
																						   <div class="form-group">
																								<div class="form-group form-material">
																								    <label class="form-control-label pl-0">5.2.9 Profesión u oficio:</label>
																									<input class="form-control" type="text" id="vprofesion_oficio" name="persona_individual_profesion" >
																								</div>
																						   </div>
																					    </div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.2.10 Tipo de documento de identificación:</label>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipodocumento_identi" name="persona_individual_tipoDoc">
																									 <option value="DPI">DPI</option>
																									 <option value="PASAPORTE">PASAPORTE</option>
																								</select>
																							</div>
																						</div>
																						<div class="col-lg-3">
																						   <div class="form-group">
																								<div class="form-group form-material">
																								    <label class="form-control-label pl-0">5.2.10.1 Número:</label>
																									<input class="form-control" type="text" id="vtipodocumento_numero" name="persona_individual_noIdentificacion" >
																								</div>
																						   </div>
																					    </div>

																					</div>
																				</div>
																				<div class="col-lg-12">
																					<div class="row">	
																						<div class="col-lg-12">
																							<label class="form-control-label pl-0">5.2.10.2 Lugar de emisión::</label>				
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12">
																					<div class="row">		
																						<div class="col-lg-4">
																							<label class="form-control-label pl-0">País:</label>				
																							<div class="form-group form-material">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_pais" name="persona_individual_emision_pais" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										foreach($paises_list as $pais){
																											echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
																										}
																									?>
																								</select>	
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<label class="form-control-label pl-0">Departamento:</label>				
																							<div class="form-group form-material">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_departa2" name="persona_individual_emision_departamento" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										foreach($departamentos_list as $departamento){
																											echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
																											}
																									?>
																								</select>
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<label class="form-control-label pl-0">Municipio:</label>				
																							<div class="form-group form-material">
																								<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_municipio" name="persona_individual_emision_municipio" >
																								<option value="">Seleccione una opción</option>
																									<?php
																										foreach($municipios_list as $municipio){
																											echo '<option value="'.$municipio['id'].'">'.$municipio['nombre'].'</option>';
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
																									<label class="form-control-label pl-0">5.2.11 Número de Identificación Tributaria (NIT):</label>
																									<input class="form-control" type="text" id="vtipodocumento_tribu" name="persona_individual_nit" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.2.12   Teléfono (línea fija):</label>
																									<input class="form-control" type="text" id="vtelefono2" name="persona_individual_telefono" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.2.13   Celular / Móvil:</label>
																									<input class="form-control" type="text" id="vceluar2" name="persona_individual_celular" >
																							</div>
																						</div>
																						<div class="col-lg-3">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.2.14  Correo electrónico / e-mail:</label>
																									<input class="form-control" type="text" id="vcorreo_electronico2" name="persona_individual_email" >
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-12"> 
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">5.2.15 Dirección de sede social completa (calle o avenida, número de casa, colonia, sector, lote, manzana, otros):</label>
																								<input class="form-control" type="text" id="vdireccion_particular" name="persona_individual_direccion" >
																							</div>
																						</div>
																					</div>
																			    </div>

																				 <div class="col-lg-12"> 
																					<div class="row">
																								<div class="col-lg-3">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vdirec_zona2">Zona: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vdirec_zona2" name="persona_individual_zona" >
																									</div>
																								</div>																							

																								<div class="col-lg-3">
																									<div class="form-group">
																										<div class="form-group form-material mb-0">
																											<label class="form-control-label pl-0" for="vdirec_pais">País: <span style="color: rgba(240,62,41,1);">*</span></label>
																										</div>
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_pais" name="persona_individual_pais" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												foreach($paises_list as $pais){
																													echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
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
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_departa2" name="persona_individual_departamento" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												foreach($departamentos_list as $departamento){
																													echo '<option value="'.$departamento['id'].'">'.$departamento['nombre'].'</option>';
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
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio" name="persona_individual_municipio"> 
																										<option value="">Seleccione una opción</option>
																											<?php
																												foreach($municipios_list as $municipio){
																													echo '<option value="'.$municipio['id'].'">'.$municipio['nombre'].'</option>';
																												}
																											?>
																										</select>
																									</div>
																								</div>																							
																						</div>
																					</div> 

                                                                                    <div class="col-lg-12">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group form-material">
                                                                                                    <label class="form-control-label pl-0">5.2.16 Es Persona Expuesta Políticamente (PEP*)2:</label>
                                                                                                    <div class="radio-custom float-right radio-primary pr-20 pt-0">
                                                                                                        <input type="radio"  name="expuesto_pep" id="realiza_transferencia_no" checked value="NO"/>
                                                                                                        <label for="inputRadiosChecked">No</label>
                                                                                                    </div>
                                                                                                    <div class="radio-custom float-right radio-primary pr-20 pt-0">
                                                                                                        <input type="radio" type="radio"  name="expuesto_pep" id="realiza_transferencia_si" value="SI"/>
                                                                                                        <label for="inputRadiosUnchecked">Si</label>
                                                                                                    </div>	
                                                                                                </div>	
                                                                                            </div>		
                                                                                        </div>
                                                                                    </div>	
                                                                                    <div class="col-lg-12">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group form-material">
                                                                                                    <label class="form-control-label pl-0">5.2.17 Tiene parentesco con una Persona Expuesta Políticamente (PEP*)2:</label>
                                                                                                    <div class="radio-custom float-right radio-primary pr-20 pt-0">
                                                                                                        <input type="radio"  name="parentesco_pep" id="realiza_transferencia_no" checked value="NO"/>
                                                                                                        <label for="inputRadiosChecked">No</label>
                                                                                                    </div>
                                                                                                    <div class="radio-custom float-right radio-primary pr-20 pt-0">
                                                                                                        <input type="radio" type="radio"  name="parentesco_pep" id="realiza_transferencia_si" value="NO"/>
                                                                                                        <label for="inputRadiosUnchecked">Si</label>
                                                                                                    </div>	
                                                                                                </div>	
                                                                                            </div>		
                                                                                        </div>
                                                                                    </div>	
                                                                                    <div class="col-lg-12">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group form-material">
                                                                                                    <label class="form-control-label pl-0">5.2.18 Es asociado cercano de una Persona Expuesta Políticamente (PEP*)2:</label>
                                                                                                    <div class="radio-custom float-right radio-primary pr-20 pt-0">
                                                                                                        <input type="radio"  name="asociado_pep" id="realiza_transferencia_no" checked value="NO"/>
                                                                                                        <label for="inputRadiosChecked">No</label>
                                                                                                    </div>
                                                                                                    <div class="radio-custom float-right radio-primary pr-20 pt-0">
                                                                                                        <input type="radio" type="radio"  name="asociado_pep" id="realiza_transferencia_si" value="SI"/>
                                                                                                        <label for="inputRadiosUnchecked">Si</label>
                                                                                                    </div>	
                                                                                                </div>	
                                                                                            </div>		
                                                                                        </div>
                                                                                    </div>	

																				  <div class="col-lg-12">
																					<div clss="row">
																						
																					  		<div clss="row">
																								<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0"></label>
																									</div>
																								</div>

																								<div class="form-group">
																									<div class="form-group form-material">
																										<label class="form-control-label pl-0">5.3 PERSONA JURÍDICA</label>
																									</div>
																								</div>
																							</div>	
																						</div>
																					</div>

																					<div class="col-lg-12"> 
																						<div class="row">
																							<div class="col-lg-12"> 
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0">5.3.1 Razón social de la entidad:</label>
																									<input class="form-control" type="text" id="vdireccion_particular" name="persona_juridica_razon_social" >
																								</div>
																							</div>
																						</div>
																					</div>

																					<div class="col-lg-12">
																					 <div class="form-group form-material mb-0">
																						   <label class="form-control-label pl-0">5.3.2 Datps de la escritura pública de constitución de sociedad o entidad</label>
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
																												<th>Notario que la Autorizó</th>
																												<th>Accion</th>
																											</tr>
																									</thead>
																									<tbody id="modificaciones_escriturap">
																											<tr id="modificaciones_escriturap_row">
																												<td>1</td>
																												<td><input type="text" name="escritura_numero[]"></td>
																												<td><div class="input-group"><span class="input-group-addon"><i class="icon md-calendar" aria-hidden="true"></i></span><input type="text" id="vmodescritura_fecha" name="escritura_fecha[]" data-plugin="datepicker" value="<?php echo date('m/d/Y');?>"></div></td>
																												<td><input type="text" name="escritura_notario_autorizo[]"></td>
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
																						   <label class="form-control-label pl-0">5.3.3 Patente de sociedad:</label>
																					 </div>
																					<div class="row">
																					 		<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpatsescritura_numero">Número: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpatsescritura_numero" name="escritura_publica_numero" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpatsescritura_folioa">Folio: <span style="color: rgba(240,62,41,1);">*</span></label>
																							 		<input type="text" class="form-control" id="vpatsescritura_folioi" name="escritura_publica_folio" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vpatsescritura_libro">Libro: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vpatsescritura_libro" name="escritura_publica_libro" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vpatsescritura_numexpe">Número de Exp.: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vpatsescritura_numexpe" name="escritura_publica_expedienteNo" >
																								 </div>
																							</div>
																					 </div>
																				</div> 
																				<div class="col-lg-12"> 
																					<div class="form-group form-material">
																						   <label class="form-control-label pl-0">5.3.4 Patente de empresa:</label>
																					 </div>
																					<div class="row">
																					 		<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpateescritura_numero2">Número: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vpateescritura_numero2" name="patente_numero" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vpateescritura_folio2">Folio: <span style="color: rgba(240,62,41,1);">*</span></label>
																							 		<input type="text" class="form-control" id="vpateescritura_folio2" name="patente_folio" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vpateescritura_libro2">Libro: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vpateescritura_libro2" name="patente_libro" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vpateescritura_numexpe2">Número de Exp.: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vpateescritura_numexpe2" name="patente_expedienteNo" >
																								 </div>
																							</div>
																					 </div>
																				</div> 
																				
																				<div class="col-lg-12"> 
																					<div class="form-group form-material">
																						   <label class="form-control-label pl-0">5.3.5 Dirección de sede social completa (calle o avenida, número de casa, colonia, sector, lote, manzana, otros):</label>
																						   <input type="text" class="form-control" id="vdireccion_comple" name="sede_social_direccion" >
																					 </div>
																					<div class="row">
																							<div class="col-lg-3">
																								<div class="form-group">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vdireccion_pais">País: <span style="color: rgba(240,62,41,1);">*</span></label>
																									</div>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_pais" name="sede_social_pais" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												foreach($paises_list as $pais){
																													echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
																												}																										
																											?>
																										</select>
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vdireccion_zona">Zona: <span style="color: rgba(240,62,41,1);">*</span></label>
																							 		<input type="text" class="form-control" id="vdireccion_zona" name="sede_social_zona" >
																								</div>
																							</div>
																							<div class="col-lg-3">
																								<div class="form-group">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vdireccion_depar">Departamento: <span style="color: rgba(240,62,41,1);">*</span></label>
																									</div>
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vdireccion_depar" name="sede_social_departamento" >
																									<option value="">Seleccione una opción</option>
																										<?php
																											foreach($departamentos_list as $departamento){
																												echo '<option value="'.$departamento['id'].'">'.$departamento['nombre'].'</option>';
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
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vdireccion_muni" name="sede_social_municipio" >
																									<option value="">Seleccione una opción</option>
																										<?php
																										foreach($municipios_list as $municipio){
																											echo '<option value="'.$municipio['id'].'">'.$municipio['nombre'].'</option>';
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
																									<label class="form-control-label pl-0" for="vpagina_inter">5.3.6  Número de Identificación Tributaria (NIT):<span style="color: rgba(240,62,41,1);">*</span></label>
																							 		<input type="text" class="form-control" id="vpagina_inter" name="sede_social_nit" >
																								</div>
																							</div>
																					 		<div class="col-lg-4">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vtelefono">5.3.7  Teléfonos: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<input class="form-control" type="text" id="vtelefono" name="sede_social_telefono" >
																								 </div>
																							</div>
																							<div class="col-lg-3">
																								 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="vcorreo_electro">5.3.8  Correo electrónico / e-mail: </label>
																									<input class="form-control" type="text" id="vcorreo_electro" name="sede_social_correo" >
																								 </div>
																							</div>
																					 </div>
																				</div> 

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

			$("#modificaciones_escriturap tr:last").after("<tr id='modificaciones_escriturap_row"+$rowno3+"'><td><input type='text' name='escritura_numero[]' required></td><td><div class='input-group'><span class='input-group-addon'><i class='icon md-calendar' aria-hidden='true'></i></span><input type='text' id='vescritura_fecha' name='escritura_fecha[]' data-plugin='datepicker' value='<?php echo date('m/d/Y');?>' required></div></td><td><input type='text' name='escritura_notario_autorizo[]' required></td><td><button onclick=delete_row_principales_productos('principales_productos_row"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
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

	</script>

	<!-- Script -->
		<?php include("script.php"); ?>
	<!-- End Script -->
</body>
</html>