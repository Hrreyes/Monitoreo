<?php 
	include("header.php");

	require_once "conexion.php";
	require_once "funciones.php";
	
	$paises_list = get_paises_list();	
	$departamentos_list = get_departamentos_list();
	$municipios_list = get_municipios_list();
	$tipomoneda_list = get_tiposmoneda_list();
	$procedenciafondos_list = get_procedenciafondos_list();
	
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
			<h1 class="page-title">ANEXO DE PRODUCTOS Y SERVICIOS</h1>
			<ol class="breadcrumb">
				 <li class="breadcrumb-item"><a href="formaulario_ive_home.php">Inicio</a></li>
			</ol>
	 </div>
	 <div class="page-content container-fluid">
			<div class="row">
				 <div class="col-lg-12">
						<div class="mb-30">
							 <div class="panel-group" id="exampleWizardAccordion" aria-multiselectable="true" role="tablist">
									<form method="POST" action="formulario_ive_ir02_ai.post.php" class="form-horizontal" id="exampleConstraintsFormTypes" enctype='multipart/form-data' autocomplete="off" onsubmit="return validate_form()">
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
																										<input class="form-control" type="text" id="vnombre_central_sucursal" name="nombre_central_sucursal"  >
																								 </div>
																							</div>
																					 </div>
																				</div>
																				<div class="col-lg-4">
																					 <div class="row">
																							<div class="col-lg-12">
																								 <div class="form-group form-material">
																										<label class="form-control-label pl-0" for="vcodigo_sucursual"> 3.2.1  Código de agencia o sucursal: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vcodigo_sucursual" name="codigo_sucursal" value="0000">																								 
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
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">4.1 Primer apellido:</label>
																									<input class="form-control" type="text" id="vrepresenta_apellido" name="solicitante_primer_apellido" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Segundo apellido:</label>
																									<input class="form-control" type="text" id="vrepresenta_apellido2" name="solicitante_segundo_apellido" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Apellido de casada:</label>
																									<input class="form-control" type="text" id="vrepresenta_apellido3" name="solicitante_tercer_apellido" >
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Primer nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre" name="solicitante_primer_nombre" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Segundo nombre:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre2" name="solicitante_segundo_nombre" >
																							</div>
																						</div>
																						<div class="col-lg-4">
																							<div class="form-group form-material">
																									<label class="form-control-label pl-0">Otros nombres:</label>
																									<input class="form-control" type="text" id="vrepresenta_nombre3" name="solicitante_tercer_nombre" >
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12">
																					<div class="row">	
																						<div class="col-lg-12"> 																										
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">4.2 Razón Social / Nombre Comercial:</label>
																								<input class="form-control" type="text" id="vrepresenta_lugarnaci" name="solicitante_razon_social" >
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-12"> 
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">4.3 Dirección de sede social completa (calle o avenida, número de casa, colonia, sector, lote, manzana, otros):</label>
																								<input class="form-control" type="text" id="vdireccion_particular" name="solicitante_direccion" >
																							</div>
																						</div>
																					</div>
																			    </div>
																				 <div class="col-lg-12"> 
																					<div class="row">
																								<div class="col-lg-3">
																									<div class="form-group form-material mb-0">
																										<label class="form-control-label pl-0" for="vdirec_zona2">Zona: <span style="color: rgba(240,62,41,1);">*</span></label>
																										<input class="form-control" type="text" id="vdirec_zona2" name="solicitante_zona" >
																									</div>
																								</div>																							

																								<div class="col-lg-3">
																									<div class="form-group">
																										<div class="form-group form-material mb-0">
																											<label class="form-control-label pl-0" for="vdirec_pais">País: <span style="color: rgba(240,62,41,1);">*</span></label>
																										</div>
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_pais" name="solicitante_pais" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												while ($valores = mysqli_fetch_array($paises_list)) {
																													echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
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
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_departa2" name="solicitante_departamento" >
																										<option value="">Seleccione una opción</option>
																											<?php
																												while ($valores = mysqli_fetch_array($departamentos_list)) {
																													echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
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
																										<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio" name="solicitante_municipio"> 
																										<option value="">Seleccione una opción</option>
																											<?php
																												while ($valores = mysqli_fetch_array($municipios_list)) {
																													echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
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
																		5. DATOS DEL PRODUCTO O SERVICIO SOLICITADO
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultThree" aria-labelledby="exampleHeadingDefaultThree" role="tabpanel">
																  	 <div class="panel-body">
																		 <div class="row">
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									 <label class="form-control-label pl-0" for="vnumero_subsidiaria">5.1 Tipo de producto o servicio a solicitar:  <span style="color: rgba(240,62,41,1);">*</span></label>
																									 <input class="form-control" type="text" id="vnumero_subsidiaria" name="producto_solicitar">
																								</div>
																						 </div>
																					</div>
																					<div class="col-lg-6">
																						 <div class="form-group">
																								<div class="form-group form-material">
																									 <label class="form-control-label pl-0" for="vnumero_empleados">5.2 Nombre del producto o servicio:  <span style="color: rgba(240,62,41,1);">*</span></label>
																									 <input class="form-control" type="text" id="vnumero_empleados" name="nombre_producto" >
																								</div>
																						 </div>
																					</div>
																				</div>  
																			</div> 

																			<div class="col-lg-12">
																				<div class="row">

																						<div class="col-lg-4"> 
																								<!-- <div class="form-group form-material"> -->
																									<label class="form-control-label pl-0" for="vtipomoneda_ingresousuario_bien">5.3 Moneda</label>
																								<!-- </div> -->
																								<div class="form-group">
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio" name="tipo_moneda" onChange="tipoMonedaOtra(this.value);">
																									<option value="">Seleccione una opción</option>
																										<?php
																											while ($valores = mysqli_fetch_array($tipomoneda_list)) {
																												echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
																												}
																										?>
																									</select>
																								</div>
																						</div>		

																						<div class="col-lg-6">
																							<div style="display:none;" id="moneda_otros_show" class=" mb-20">
																								<div class="col-lg-12">
																									<div class="form-group form-material m-0" >
																										<div class="col-lg-4 float-left">
																											<label>Otras (Especifique):</label>
																										</div>	
																										<div class="col-lg-6 float-left">
																											<input class="form-control" type="text" id="vtipomoneda_ingreso_otra" name="tipo_moneda_otra">
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
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.4 Cobertura a nivel (cuando aplique)</label>
																						</div>
																					</div>	 
																					<div class="col-lg-6">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.5 No. de cuenta o de identificación del producto o servicio:</label>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-6">
																						<div class="form-group form-material">
																							<div class="radio-custom float-left radio-primary pr-10">
																								<!-- <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" /> -->
																								<input type="radio"  name="nivel_cobertura" id="vcuentacon_accionistas_no" checked value="NO" />
																								<label for="inputRadiosChecked">Local</label>
																							</div>
																							<div class="radio-custom float-left radio-primary pr-10">
																								<input type="radio" type="radio"  name="nivel_cobertura" id="vcuentacon_accionistas_si" value="SI"/>
																								<label for="inputRadiosUnchecked">Internacional</label>
																							</div>	
																						</div>
																					</div>
																					<div class="col-lg-6">
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="form-group">
																									<div class="form-group form-material">
																										<input class="form-control" type="text" id="vnumero_empleados" name="identificacion_producto" >
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
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.6 Monto inicial a manejar en el producto o servicio:</label>
																							<input class="form-control" type="text" id="vnumero_empleados" name="monto_inicial_producto" >
																						</div>
																				  	 </div>	 
																				
																					<div class="col-lg-6">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.7 Monto inicial a manejar en el producto o servicio:</label>
																							<input class="form-control" type="text" id="vnumero_empleados" name="monto_inicial_producto2" >
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-12">	
																			 	  <div class="row">
																					<div class="col-lg-12">	
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.8 Propósito o destino del producto o servicio solicitado:</label>
																							<input class="form-control" type="text" id="vnumero_empleados" name="destino_producto" >
																						</div>
																				  	 </div>	 
																				</div>
																			</div>


																			<div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0" for="vtipomoneda_ingresousuario_bien">5.9 Procedencia de los fondos, valores o bienes para el inicio de relación o solicitud de producto(s) o servicio(s) -(marcar la(s) que aplique(n)-: <span style="color: rgba(240,62,41,1);">*</span></label>
																						</div>
																					</div>
																				</div>  
																			</div>  

																			<div class="col-lg-12">
																				<!-- <div class="row"> -->

																						<div class="col-lg-4"> 
																								<!-- <div class="form-group form-material"> -->
																								<!-- <label class="form-control-label pl-0" for="vtipomoneda_ingresousuario_bien">5.9 Procedencia de los fondos, valores o bienes para el inicio de relación o solicitud de producto(s) o servicio(s) -(marcar la(s) que aplique(n)-: <span style="color: rgba(240,62,41,1);">*</span></label> -->
																								<!-- </div> -->
																								<div class="form-group">
																									<select class="form-control border-right-0 border-left-0 border-top-0" id="vdirec_municipio" name="procedencia_fondos" onChange="procedenciaFondosOtra(this.value);" >
																									<option value="">Seleccione una opción</option>
																										<?php
																											while ($valores = mysqli_fetch_array($procedenciafondos_list)) {
																												echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
																												}
																										?>
																									</select>
																								</div>
																						</div>		

																						<div class="col-lg-6">
																							<div style="display:none;" id="procedencia_fondos_show" class=" mb-20">
																								<div class="col-lg-12">
																									<div class="form-group form-material m-0" >
																										<div class="col-lg-4 float-left">
																											<label>Otras (Especifique):</label>
																										</div>	
																										<div class="col-lg-6 float-left">
																											<input class="form-control" type="text" id="vtipomoneda_ingreso_otra" name="procedencia_fondos_otra">
																										</div>	
																									</div>
																								</div>
																							</div>
																						</div>	
																				<!-- </div>	 -> -->
																			</div>	
<!-- 

																				</div>		
																			</div>	 -->

																			<!-- <div class="col-lg-12">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="col-lg-2">
																								<div class="form-group">
																									<?php
																										// while ($valores = mysqli_fetch_array($procedenciafondos_list6)) {
																										// 	echo '
																										// 		<div class="checkbox-custom checkbox-danger ">
																										// 			<input type="checkbox" class="chkprocedeprestamo" id="chkprocedeprestamo"  name="chkprocedeprestamo[]" value="'.$valores['id'].'" onclick="procedenciafondos_prestamo(this.value);">
																										// 			<label>'.$valores['nombre'].'</label>
																										// 		</div>';
																											//}
																										?>
																								</div>
																							</div>
																							<div style="display:none;" id="procedenciafondos_prestamo_show">
																								<div class="col-lg-12">
																									<div class="form-group form-material" >
																										- <div class="col-lg-12 float-left">  -->
																												<!-- <label>Indicar nombre de la entidad que otorgó el préstamo:</label> -->
																										<!-- </div>	 -->
																										<!-- <div class="col-lg-12 float-left"> -->
																											<!-- <input class="form-control" type="text" id="vtipomoneda_egreso_otra" name="vtipomoneda_egreso_otra"> -->
																										<!-- </div>	 -->
																									<!-- </div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>		
																			</div>	 --> 
																		
																			<div class="col-lg-12">
																				<div class="row">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.10 Realizará transferencias o traslado de fondos, valores o bienes: (Si la respuesta es positiva, pasar al numeral 5.10.1)</label>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<!-- <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" /> -->
																								<input type="radio"  name="traslado_fondos" id="realiza_transferencia_no" checked value="NO" onclick="realiza_transferencia_check();" />
																								<label for="inputRadiosChecked">NO</label>
																							</div>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio" type="radio"  name="traslado_fondos" id="realiza_transferencia_si" value="SI" onclick="realiza_transferencia_check();"/>
																								<label for="inputRadiosUnchecked">SI</label>
																							</div>	
																					</div>		
																				</div>
																			</div>	
																			<div style="display:none;" id="realiza_transferencia_show">																																																					
																				<div class="col-lg-12">
																					<div class="row">
																							<div class="form-group form-material">
																								<label class="form-control-label pl-0">5.10.1  Las transferencias o traslado de fondos, valores o bienes se realizaran a nivel: </label>
																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<!-- <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" /> -->
																									<input type="radio"  name="traslado_fondos_nivel" id="vdelosaccion_extrajero_no" checked value="LOCAL" />
																									<label for="inputRadiosChecked">Local</label>
																								</div>
																								<div class="radio-custom float-right radio-primary pr-10 pt-0">
																									<input type="radio" type="radio"  name="traslado_fondos_nivel" id="vdelosaccion_extrajero_si" value="INTERNACIONAL"/>
																									<label for="inputRadiosUnchecked">Internacional</label>
																								</div>	
																							</div>
																					</div>
																				</div>	
																			</div>	

																			<div class="col-lg-12">
																				<div class="row">
																						<div class="form-group form-material">
																							<label class="form-control-label pl-0">5.11  Tendrá otros firmantes (aplica también a tarjetahabientes adicionales) -Si la respuesta es positiva, indicar la información según Anexo A.II- </label>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<!-- <input type="radio" onclick="dedica_alquiler_check();" name="tiene_dedica_alquiler" id="dedica_alquiler_no" checked value="no" /> -->
																								<input type="radio"  name="otros_firmantes" id="vdelosaccion_extrajero_no" checked value="NO" />
																								<label for="inputRadiosChecked">No</label>
																							</div>
																							<div class="radio-custom float-right radio-primary pr-10 pt-0">
																								<input type="radio" type="radio"  name="otros_firmantes" id="vdelosaccion_extrajero_si" value="SI"/>
																								<label for="inputRadiosUnchecked">Si</label>
																							</div>	
																						</div>
																						<div class="form-group form-material" >
																								<label>1/ En caso de existir más de un producto o servicio, consignar los datos para cada uno de ellos, utilizando el presente Anexo.</label>
																								<label>2/ El monto inicial y mensual a manejar con el producto o servicio debe estar acorde con los  ingresos mensuales aproximados del solicitante provenientes de las fuentes de ingresos declaradas.</label>
																						</div>
																				</div>
																			</div>	


																		    </div>  <!-- Fin Row -->
																		</div>  <!-- Panel Body -->
																 </div>  <!--panel-collapse -->
															</div>   <!--panel -->
															
															<!-- <div class="panel"> -->
																 <!-- Carpeta 1 --> 
																 <!-- <div class="panel-heading" id="exampleHeadingDefaultSix" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultSix" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultSix">
																			6. COMENTARIOS, OBSERVACIONES O CAMPOS ADICIONALES DE LA PERSONA OBLIGADA
																		</a>
																 </div>
																 <div class="panel-collapse collapse" id="exampleCollapseDefaultSix" aria-labelledby="exampleHeadingDefaultSix" role="tabpanel">
																  	<div class="panel-body">
																		<div class="row">

																		 		<div class="col-lg-12">
																					<div class="row">																											
																						<div class="col-lg-12">
																							 <div class="form-group form-material">
																									<label class="form-control-label pl-0" for="descripcion_bien">Descripción del bien: <span style="color: rgba(240,62,41,1);">*</span></label>
																									<textarea class="form-control" id="" rows="7" name="descripcion_bien" required></textarea>
																							 </div>
																						</div>
																					</div>	
																				</div> -->

																	    <!-- </div>  Fin Row -->
																	<!--</div>   Panel Body -->
															 <!--</div>  panel-collapse -->
														<!--</div>   panel -->

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

			$("#modificaciones_escriturap tr:last").after("<tr id='modificaciones_escriturap_row"+$rowno3+"'><td><input type='text' name='vmodescritura_numero[]' required></td><td><div class='input-group'><span class='input-group-addon'><i class='icon md-calendar' aria-hidden='true'></i></span><input type='text' id='vescritura_fecha' name='vescritura_fecha[]' data-plugin='datepicker' value='<?php echo date('d/m/Y');?>' required></div></td><td><input type='text' name='principales_productos_vendidas[]' required></td><td><button onclick=delete_row_principales_productos('principales_productos_row"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
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


	function tipoMonedaOtra(data){
		if(data=='Otras'){
			document.getElementById("moneda_otros_show").style.display='block';
		}else{
			document.getElementById("moneda_otros_show").style.display='none';
		}
	}


	function procedenciaFondosOtra(data){
		if(data=='Otra'){
			document.getElementById("procedencia_fondos_show").style.display='block';
		}else{
			document.getElementById("procedencia_fondos_show").style.display='none';
		}
	}


	</script>

	<!-- Script -->
		<?php include("script.php"); ?>
	<!-- End Script -->
</body>
</html>