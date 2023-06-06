<?php 
	include("header.php");

	require_once "conexion.php";
	require_once "funciones.php";
	
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
	$paises_list612 = get_paises_list();
	$paises_list62 = get_paises_list();
	$paises_list622 = get_paises_list();
	$paises_list63 = get_paises_list();
	$paises_list632 = get_paises_list();
	
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
			<h1 class="page-title">DECLARACION JURADA DE PARTICIPACION ACCIONARIAS (Beneficiarios Finales)</h1>
			<ol class="breadcrumb">
				 <li class="breadcrumb-item"><a href="formaulario_ive_home.php">Inicio</a></li>
			</ol>
	 </div>
	 <div class="page-content container-fluid">
			<div class="row">
				 <div class="col-lg-12">
						<div class="mb-30">
							 <div class="panel-group" id="exampleWizardAccordion" aria-multiselectable="true" role="tablist">
									<form method="POST" action="formulario_ive_ir02_internobf.post.php" class="form-horizontal" id="exampleConstraintsFormTypes" enctype='multipart/form-data' autocomplete="off" onsubmit="return validate_form()">
										 <input class="form-control" type="hidden" id="catalogo_formulario_id" name="catalogo_formulario_id" value="1">
										 <div class="examle-wrap">
												<h4 class="example-title"></h4>
												<div class="example">

													 <div class="panel-group" id="exampleAccordionDefault" aria-multiselectable="true" role="tablist">
													 		<div class="panel">
																 <!-- Carpeta 1 -->
																 <div class="panel-heading" id="exampleHeadingDefaultOne" role="tab">
																		<a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultOne">
																		DATOS DE LA PERSONA OBLIGADA
																		</a>
																 </div>
																 <!-- "panel-collapse collapse show -->
																 <div class="panel-collapse collapse" id="exampleCollapseDefaultOne" aria-labelledby="exampleHeadingDefaultOne" role="tabpanel">
																	<div class="panel-body">
                                                                           <div class="col-lg-12"> 
                                                                               <div class="row"> 
                                                                                   <div class="col-lg-12"> 
                                                                                        <div class="row"> 
                                                                                            <!-- <div class="col-lg-3">
                                                                                                <div class="form-group form-material">
                                                                                                    <label class="form-control-label pl-0" for="vlugar">CODIGO CLIENTE: <span style="color: rgba(240,62,41,1);">*</span></label>
                                                                                                    <input class="form-control" type="text" id="vlugar" name="vlugar" >
                                                                                                </div>
                                                                                            </div> -->
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
                                                                                            <div class="col-lg-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12">
                                                                                                        <div class="form-group form-material">
                                                                                                            <label class="form-control-label pl-0" for="vrazon_social">Nombre, razón social o denominación completa: <span style="color: rgba(240,62,41,1);">*</span></label>
                                                                                                            <input class="form-control" type="text" id="vrazon_social" name="razon_social" >																										
                                                                                                        </div>
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
                                                                                                            <label class="form-control-label pl-0" for="vnombre_comercial">Nombre comercial: <span style="color: rgba(240,62,41,1);">*</span></label>
                                                                                                            <input class="form-control" type="text" id="vnombre_comercial" name="nombre_comercial" >
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
                                                                                                        <label class="form-control-label pl-0" for="vnit">Número de Identificación Tributaria (NIT): <span style="color: rgba(240,62,41,1);">*</span></label>
                                                                                                        <input class="form-control" type="text" id="vnit" name="nit" >
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                                <div class="col-lg-6">
                                                                                                    <div class="form-group form-material">
                                                                                                        <label class="form-control-label pl-0" for="vpais_constitucion">País de Constitución: <span style="color: rgba(240,62,41,1);">*</span></label>
                                                                                                        <input class="form-control" type="text" id="vpais_constitucion" name="pais_constitucion" >
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    </div> 
                                                                                    <div class="col-lg-12">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group form-material">
                                                                                                    <label class="form-control-label pl-0" for="vtipo_sociedad">Tipo de Sociedad o Entidad:</label>
                                                                                                    <input type="text" class="form-control" id="vdireccion_comple" name="tipo_sociedad" >
                                                                                                </div>
                                                                                            </div>    
                                                                                        </div>		
                                                                                    </div>
                                                                                    <div class="col-lg-12"> 
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <div class="form-group form-material">
                                                                                                    <label class="form-control-label pl-0">Dirección Completa:</label>
                                                                                                    <input type="text" class="form-control" id="vdireccion_comple" name="direccion_completa" >
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
																		4. DATOS PERSONALES DE LOS SOCIOS A ACCIONISTAS
																		</a>
																 </div>
																  <div class="panel-collapse collapse" id="exampleCollapseDefaultTwo" aria-labelledby="exampleHeadingDefaultTwo" role="tabpanel">
																  	 <div class="panel-body">

																	<div id="datos_personales" >
																		<div class="row">
																				<div class="col-md-8">
																					<table id="example1" class="table table-bordered table-hover">
																						<thead>
																							<tr>
																								<th>#</th>
																								<th>Nombre Completo</th>
																									<th>Accion</th> 
																							</tr>
																						</thead>
																						<tbody>

																							<tr id="modificaciones_escriturap_row">
																								<td>1</td>
																								<td><input type="text" name="vmodescritura_numero[]"></td>
																								<!-- <td><input type="text" name="vmodescritura_notario[]"></td> -->
																								<td>
																									<button onclick="add_row_escriturapublica();" id="addToTable-ci" class="btn btn-danger" type="button">
																											<i class="icon md-delete" aria-hidden="true"></i> 
																									</button>
																								</td>
																							</tr>
																							
																						</tbody>
																					</table>
																				</div>
																				<div class="text-right">
																									<button type="" class="btn btn-success" id="validateButton3">Agregar Linea
																										<i class="icon md-plus" aria-hidden="true"></i> 
																									</button>
																								</div>
																			<div class="col-lg-8">
																				<!-- Panel Summary Mode -->
																				<div class="panel">
																						
																						<div class="panel-heading">
																							<h3 class="panel-title">DATOS PERSONALES</h3>
																						</div>

																						<div class="panel-body">
																							<form class="form-horizontal" id="exampleSummaryForm" autocomplete="off">
																							<div class="col-lg-12">
																											<div class="row">
																											<div class="col-lg-12">
																												<div class="row">
																													<div class="col-lg-12">
																														<div class="form-group">
																															<div class="form-group form-material">
																																<label class="form-control-label pl-0" for="vnombre_comercial">Nombre Completo / Razon Social:</span></label>
																																<input class="form-control" type="text" id="vnombre_comercial" name="datos_personales_nombre_completo" >
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
																														<label class="form-control-label pl-0">Tipo de identificación:</label>
																														<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipodocumento_identi" name="datos_personales_tipo_documento">
																															<option value="DPI">DPI</option>
																															<option value="PASAPORTE">PASAPORTE</option>
																													</select>
																												</div>
																											</div>
																											<div class="col-lg-4">
																												<div class="form-group">
																													<div class="form-group form-material">
																														<label class="form-control-label pl-0">Número Identificación:</label>
																														<input class="form-control" type="text" id="vtipodocumento_numero" name="datos_personales_numero_documento" >
																													</div>
																												</div>
																											</div>

																											<div class="col-lg-4">
																												<label class="form-control-label pl-0 mb-0">País Nacimeinto:</label>				
																												<div class="form-group form-material">
																													<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_pais" name="datos_personales_pais" >
																													<option value="">Seleccione una opción</option>
																													<?php
																															while ($valores = mysqli_fetch_array($paises_list71)) {
																																echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
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
																														<label class="form-control-label pl-0">Nacionalidad:</label>
																														<input class="form-control" type="text" id="vtipodocumento_numero" name="datos_personales_nacionalidad" >
																												</div>
																											</div>
																											<div class="col-lg-4">
																												<label class="form-control-label pl-0 mb-0">País Nacimeinto:</label>				
																												<div class="form-group form-material">
																													<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_pais" name="datos_personales_pais_nacimiento" >
																													<option value="">Seleccione una opción</option>
																														<?php
																															while ($valores = mysqli_fetch_array($paises_list72)) {
																																echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
																																}
																														?>
																													</select>	
																												</div>  
																											</div>    
																											<div class="col-lg-4">
																												<div class="form-group">
																													<div class="form-group form-material">
																														<label class="form-control-label pl-0">Porcentaje Accionaria (%):</label>
																														<input class="form-control" type="text" id="vtipodocumento_numero" name="datos_personales_porcentaje_acciones" >
																													</div>
																												</div>
																											</div>

																										</div>
																									</div>

																									<div class="col-lg-12">
																											<div class="row">
																											<div class="col-lg-12">
																												<div class="row">
																													<div class="col-lg-12">
																														<div class="form-group">
																															<div class="form-group form-material">
																																<label class="form-control-label pl-0" for="vnombre_comercial">Dirección Domiciliaria:</span></label>
																																<input class="form-control" type="text" id="vnombre_comercial" name="datos_personales_direccion" >
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
																														<label class="form-control-label pl-0">Otra Nacionalidad:</label>
																														<input class="form-control" type="text" id="vtipodocumento_numero" name="datos_personales_otraNacionalidad" >
																												</div>
																											</div>
																											<div class="col-lg-4">
																												<div class="form-group">
																													<div class="form-group form-material">
																														<label class="form-control-label pl-0">Fecha de Nacimiento:</label>
																														<input type="text" class="form-control" id="vfecha" name="datos_personales_fechaNacimiento" data-plugin="datepicker" value="<?php echo date('d/m/Y');?>" >
																														<!--<input class="form-control" type="text" id="vtipodocumento_numero" name="datos_personales_fechaNacimiento" >-->
																													</div>
																												</div>
																											</div>
																											<div class="col-lg-4">
																												<div class="form-group">
																													<div class="form-group form-material">
																														<label class="form-control-label pl-0">Numero de Teléfono:</label>
																														<input class="form-control" type="text" id="vtipodocumento_numero" name="datos_personales_telefono" >
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																								
																							</form>
																						</div>
																				</div>
																				<!-- End Panel Summary Mode -->
																			</div>
																	</div>
																	<!-- Panel Full Example -->

																		<!-- <div class="col-lg-12">
																			<div class="form-group form-material mb-0">
																				<label class="form-control-label pl-0">4.8 Modificaciones a la escritura pública de constitución de sociedad o entidad: (de existir más de una, detallar en hojas aparte)</label>
																			</div>
																		<div class="row">
																			<div class="col-lg-12"> -->
																				<!-- <div class="table-responsive-bf">
																					<table class="table-bordered"> -->

																				<!-- <div class="example table-responsive">
																					<table class="table">

																						<thead>
																								<tr>
																									<th>#</th>
																									<th>Nombre Apellido</th>
																									<th>Tipo Numero de Identficacion</th>
																									<th>Cargo que Ocupa</th>
																									<th>Nacionalidad</th>
																									<th>Número de Teléfono</th>
																									<th>Accion</th>
																								</tr>
																						</thead>
																						<tbody id="modificaciones_datoII">
																								<tr id="modificaciones_datoII_row">
																									<td>1</td>
																									<td><input type="text" name="vnombre_dato[]"></td>
																									<td><input type="text" name="vtiponumeroi_dato[]"></td>
																									<td><input type="text" name="vcargoucupa_dato[]"></td>
																									<td><input type="text" name="vnacional_dato[]"></td>
																									<td><input type="text" name="vnumerotel_dato[]"></td>
																								</tr>
																						</tbody>
																					</table>
																					<button onclick="add_row_datospersonalesII();" id="addToTable-ci" class="btn btn-success" type="button">
																						<i class="icon md-plus" aria-hidden="true"></i> Agregar fila
																					</button>
																				</div>
																			</div>	
																		</div>
																	</div> -->


																			<!-- ESTO HICIMOS CON YORCH 23-11-2021 -->
																				 <!-- <div class="row">
																						<div class="col-lg-12">
																							<div class="table-responsive">
																								<table class="table-bordered" >
																									<thead>
																										<tr>
																											<th>#</th>
																											<th>Nombre Razon Social</th>
																											<th>Tipo ID</th>
																											<th>Numero ID</th>
																											<th>País Nacimiento</th>
																											<th>Nacionalidad</th>
																											<th>País Residencia</th>
																											<th>Porcentaje Accionaria (%)</th>
																											<th>Acción</th>
																										</tr>
																									</thead>
																									<tbody id="modificaciones_escriturap">
																										<tr id="modificaciones_escriturap_row">
																											<td rowspan="2">1</td>
																											<td><input type="text" name="vmodescritura_numero[]"></td>
																											<td><input type="text" name="vmodescritura_numero[]"></td>
																											<td><input type="text" name="vmodescritura_numero[]"></td>
																											<td><input type="text" name="vmodescritura_numero[]"></td>
																											<td><input type="text" name="vmodescritura_numero[]"></td>
																											<td><input type="text" name="vmodescritura_numero[]"></td>
																											<td><input type="text" name="vmodescritura_numero[]"></td>	
																											<td>
																												<table>
																												<tr>
																											<td>
																												<table class="table-bordered">
																													<thead>
																														<tr>
																															<th>column 1</th>																														
																														</tr>
																													</thead>
																													<tbody>
																														<tr>
																															<td><input type="text" name="vmodescritura_numero[]"></td>
																														</tr>
																													</tbody>
																												</table>
																											</td>
																											<td>
																												<table class="table-bordered">
																													<thead>
																														<tr>
																															<th>column 2</th>
																														</tr>
																													</thead>
																													<tbody>
																														<tr>
																															<td><input type="text" name="vmodescritura_numero[]"></td>
																														</tr>
																													</tbody>
																												</table>
																											</td>
																											<td>
																												<table class="table-bordered">
																													<thead>
																														<tr>
																															<th>column 3</th>																										
																														</tr>
																													</thead>
																													<tbody>
																														<tr>
																															<td><input type="text" name="vmodescritura_numero[]"></td>
																														</tr>
																													</tbody>
																												</table>
																											</td>
																											<td>
																												<table class="table-bordered">
																													<thead>
																														<tr>
																															<th>column 4</th>																															
																														</tr>
																													</thead>
																													<tbody>
																														<tr>
																															<td><input type="text" name="vmodescritura_numero[]"></td>
																														</tr>
																													</tbody>
																												</table>
																											</td>
																										</tr>
																												</table>
																											</td>
																										</tr>
																										
																									</tbody>
																									
																								</table> 
																								<button onclick="add_row_escriturapublica();" id="addToTable-ci" class="btn btn-success" type="button">
																									<i class="icon md-plus" aria-hidden="true"></i> Agregar fila
																								</button>
																							</div>
																						</div>	
																					</div> -->
																			</div> 
                                                                       </div>  <!-- Fin Row -->
																	   
																	   <!-- <div class="col-lg-12">
																	    	<div class="row">	
																				<div class="form-group">
																					<div class="form-group form-material">
																						<label class="form-control-label pl-0">Numero de Teléfono:</label>
																						<input class="form-control" type="text" id="vtipodocumento_numero" name="vtipodocumento_numero" >
																				</div>
																			</div>
																			</div>	 
																	   </div>  -->




																	   <!-- <div class="example table-responsive" id ="nuevo_interno_benficiario">                                
																			<div class="col-lg-12">
																				<button onclick="add_row_datospersonales();" id="addToTable-ci" class="btn btn-success" type="button">
																					<i class="icon md-plus" aria-hidden="true"></i> Agregar fila
																				</button>
																			</div>                               
																		</div>  -->

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

		function add_row_datospersonales(){
			// $rowno3=$("#modificaciones_escriturap tr").length;			
			// $rowno3=($rowno3/10)+1;
			// console.log($rowno3);

		    //$("#modificaciones_escriturap tr:last").after("<tr id='modificaciones_escriturap_row"+$rowno3+"'><td>"+$rowno3+"</td><td><input type='text' name='vmodescritura_numero[]' required></td><td><div class='input-group'><span class='input-group-addon'><i class='icon md-calendar' aria-hidden='true'></i></span><input type='text' id='vescritura_fecha' name='vescritura_fecha[]' data-plugin='datepicker' value='<?php echo date('m/d/Y');?>' required></div></td><td><input type='text' name='principales_productos_vendidas[]' required></td><td><button onclick=delete_row_escriturapublica('add_row_escriturapublica"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
			// $("#modificaciones_escriturap tr:first").after("<tbody id='modificaciones_escriturap_row"+$rowno3+"'><tr><td rowspan='2'>"+$rowno3+"</td><td><input type='text' name='vmodescritura_numero[]'></td><td><input type='text' name='vmodescritura_numero[]'></td><td><input type='text' name='vmodescritura_numero[]'></td><td><input type='text' name='vmodescritura_numero[]'></td><td><input type='text' name='vmodescritura_numero[]'></td><td><input type='text' name='vmodescritura_numero[]'></td><td><input type='text' name='vmodescritura_numero[]'></td><td rowspan='2'><button onclick=delete_row_escriturapublica('add_row_escriturapublica"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr><tr><td><table class='table-bordered'><thead><tr><th>column 1</th></tr></thead><tbody><tr><td><input type='text' name='vmodescritura_numero[]'></td></tr></tbody></table></td><td><table class='table-bordered'><thead><tr><th>column 2</th></tr></thead><tbody><tr><td><input type='text' name='vmodescritura_numero[]'></td></tr></tbody></table></td><td><table class='table-bordered'><thead><tr><th>column 3</th></tr></thead><tbody><tr><td><input type='text' name='vmodescritura_numero[]'></td></tr></tbody></table></td><td><table class='table-bordered'><thead><tr><th>column 4</th></tr></thead><tbody><tr><td><input type='text' name='vmodescritura_numero[]'></td></tr></tbody></table></td></tr></tbody>");
		
				// var i;
				// var slides = document.getElementsByClassName("panel-body");
				// var dots = document.getElementById("modificaciones_escriturap1");
				
				// console.log(dots);


				// var divs = document.getElementsByTagName("panel-body");
				// var numDivs = divs.length;
				// var contador = 0;
				// for(var i = 0; i &lt; numDivs; i++) {
				// 	if(divs[i].TagName == "newFila"){
				// 		contador++;		
				// 	} 	
				// }

				// console.log(contador);
				
			
		// 	// var a = 1, b = 2;
            
			var vbusca = $("#datos_personales");			

			console.log(vbusca);

			$rowno3=vbusca.length;			
			$rowno3=($rowno3) + 1 ;

			console.log($rowno3);

            var html = [
								'<div class="col-lg-12">',
									'<div class="row">',
										'<div class="col-lg-12">',
											'<div class="row">',
												'<div class="col-lg-12">',
													'<div class="form-group">',
														'<div class="form-group form-material">',
															'<label class="form-control-label pl-0" for="vnombre_comercial">Nombre Completo / Razon Social:</span></label>',
															'<input class="form-control" type="text" id="vnombre_comercial" name="vnombre_comercial" >',
														'</div>',
													'</div>',
												'</div>',
												'</div>',
											'</div>',   
										'</div>',
								'</div>', 
								
								'<div class="col-lg-12">',
									'<div class="row">',	
										'<div class="col-lg-4">',
											'<div class="form-group form-material">',
													'<label class="form-control-label pl-0">Tipo de identificación:</label>',
													'<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipodocumento_identi" name="vtipodocumento_identi">',
														'<option value="DPI">DPI</option>',
														'<option value="PASAPORTE">PASAPORTE</option>',
												'</select>',
											'</div>',
										'</div>',
										'<div class="col-lg-4">',
											'<div class="form-group">',
												'<div class="form-group form-material">',
													'<label class="form-control-label pl-0">Número Identificación:</label>',
													'<input class="form-control" type="text" id="vtipodocumento_numero" name="vtipodocumento_numero" >',
												'</div>',
											'</div>',
										'</div>',

										'<div class="col-lg-4">',
											'<label class="form-control-label pl-0 mb-0">País Nacimeinto:</label>',
											'<div class="form-group form-material">',
												'<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_pais" name="vtipo_pais" >',
												'<option value="">Seleccione una opción</option>',
													<?php
														while ($valores = mysqli_fetch_array($paises_list71)) {
															echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
															}
													?>
												'</select>',	
											'</div>',
										'</div>',    
									'</div>',
								'</div>',

								'<div class="col-lg-12">',
									'<div class="row">',	
										'<div class="col-lg-4">',
											'<div class="form-group form-material">',
													'<label class="form-control-label pl-0">Nacionalidad:</label>',
													'<input class="form-control" type="text" id="vtipodocumento_numero" name="vtipodocumento_numero" >',
											'</div>',
										'</div>',
										'<div class="col-lg-4">',
											'<label class="form-control-label pl-0 mb-0">País Nacimeinto:</label>',
											'<div class="form-group form-material">',
												'<select class="form-control border-right-0 border-left-0 border-top-0" id="vtipo_pais" name="vtipo_pais" >',
												'<option value="">Seleccione una opción</option>',
													<?php
														while ($valores = mysqli_fetch_array($paises_list72)) {
															echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
															}
													?>
												'</select>',	
											'</div>',
										'</div>',    
										'<div class="col-lg-4">',
											'<div class="form-group">',
												'<div class="form-group form-material">',
													'<label class="form-control-label pl-0">Porcentaje Accionaria (%):</label>',
													'<input class="form-control" type="text" id="vtipodocumento_numero" name="vtipodocumento_numero" >',
												'</div>',
											'</div>',
										'</div>',
									'</div>',
								'</div>',

								'<div class="col-lg-12">',
									'<div class="row">',
										'<div class="col-lg-12">',
											'<div class="row">',
												'<div class="col-lg-12">',
													'<div class="form-group">',
														'<div class="form-group form-material">',
															'<label class="form-control-label pl-0" for="vnombre_comercial">Dirección Domiciliaria:</span></label>',
															'<input class="form-control" type="text" id="vnombre_comercial" name="vnombre_comercial" >',
														'</div>',
													'</div>',
												'</div>',
											'</div>',
										'</div>',   
									'</div>',
								'</div>', 

								'<div class="col-lg-12">',
									'<div class="row">',	
										'<div class="col-lg-4">',
											'<div class="form-group form-material">',
													'<label class="form-control-label pl-0">Otra Nacionalidad:</label>',
													'<input class="form-control" type="text" id="vtipodocumento_numero" name="vtipodocumento_numero" >',
											'</div>',
										'</div>',
										'<div class="col-lg-4">',
											'<div class="form-group">',
												'<div class="form-group form-material">',
													'<label class="form-control-label pl-0">Fecha de Nacimiento:</label>',
													'<input class="form-control" type="text" id="vtipodocumento_numero" name="vtipodocumento_numero" >',
												'</div>',
											'</div>',
										'</div>',
										'<div class="col-lg-4">',
											'<div class="form-group">',
												'<div class="form-group form-material">',
													'<label class="form-control-label pl-0">Numero de Teléfono:</label>',
													'<input class="form-control" type="text" id="vtipodocumento_numero" name="vtipodocumento_numero" >',
												'</div>',
											'</div>',
										'</div>',
									'</div>',
								'</div>',

                       ].join('');


         	var div = document.createElement('div');

            //  console.log(div);
			 div.id = "datos_personales"+$rowno3	
			 
			 console.log(div);
             div.innerHTML = html;
             document.getElementById('datos_personales').appendChild(div);

	}		


    function delete_row_escriturapublica(rowno3){
	        $('#'+rowno3).remove();
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

	function efectos_solicitud(){
		//Si es Si
		if (document.getElementById('vparaefec_actuaunica_si').checked) {
				document.getElementById("efectos_solicitud_show").style.display='block';
			}else{
				document.getElementById("efectos_solicitud_show").style.display='none';
			}
	}

	function add_row_datospersonalesII(){
			$rowno3=$("#modificaciones_datoII tr").length;			
			$rowno3=$rowno3 + 1;

		    $("#modificaciones_datoII tr:last").after("<tr id='modificaciones_datoII_row"+$rowno3+"'><td>"+$rowno3+"</td><td><input type='text' name='vnombre_dato[]'></td><td><input type='text' name='vtiponumeroi_dato[]'></td><td><input type='text' name='vcargoucupa_dato[]'></td><td><input type='text' name='vnacional_dato[]'></td><td><input type='text' name='vnumerotel_dato[]'></td><td><button onclick=delete_row_datoII('modificaciones_datoII_row"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
	}		

    function delete_row_datoII(rowno3){
	        $('#'+rowno3).remove();
    }



	</script>

	<!-- Script -->
		<?php include("script.php"); ?>
	<!-- End Script -->
</body>
</html>