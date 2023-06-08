<?php
include("header.php");

require_once "conexion.php";
require_once "funciones.php";




$listar_asignaciones=obtener_paginas();
 
 //$ultimaid=ultima_id_user();
  //print_r($ultimaid);
  //die();  
 

/*$paises_list = get_paises_list();
$redes_sociales_list = get_redes_sociales_list();
$redes_sociales_list_2 = get_redes_sociales_list();
$cartera_list = get_cartera_list();
$motivo_visita_list = get_motivo_visita_list();*/
?>

<body class="animsition">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<?php include("navbar.php"); ?>
	<div class="page">
		<div class="page-header">
			<!--<h1 class="page-title">LISTADO ASINACIONES</h1>
			<ol class="breadcrumb">
            <header class="panel-heading">
                <h3 class="panel-title">
                 Menu Asignar Paginas 
                  <span class="panel-desc">
                  </span>
                  
				  	<class="d-grid gap-2 d-md-flex justify-content-md-">
                    
                  <button type="submit" class="btn btn-light"><a href="crear_rol.php"><b>Crear Rol</b></button></a>

                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="crear_aplicacion.php"><b>Crear Aplicacion</b></button></a>    
               
                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="listado_asignaciones.php"><b>Listado Asignaciones</b></button></a>
                    
                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="asignar_mail.php"><b>Asignar Paginas</b></button></a>
                  
                    <class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-light"><a href="control.php"><b>Agregar Paginas</b></button></a>
                     --->

                    
                </h3>
            </header>
         </ol>  
      <div class="page-content">
        <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <h3 class="panel-title">LISTADO DE PAGINAS</h3>
          </header>
          
          <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-md-12">
              <!--<a href="asignar_mail.php" class="btn btn-primary float-right mr-40">
                configurar Notificaciones
                <i class="icon md-plus"></i>
              </a>-->
              <a href="control.php" class="btn btn-primary float-right mr-40">
                Agregar Paginas
                <i class="icon md-plus"></i>
              </a>

                <div class="panel-body">
                  <table class="tablesaw table-striped table-bordered table-hover" data-tablesaw-mode="swipe"
                    data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                    data-tablesaw-mode-switch id="TableTools-arl-2">
                    <thead>
                      <tr class="col-xl-12">
                        <th class="col-1 hidden" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="persist">Id Notificacion</th>
                        <th class="col-1" data-tablesaw-sortable-col data-tablesaw-priority="">Url</th>
                        <th class="col-1" data-tablesaw-sortable-col data-tablesaw-priority="">Paginas</th>
                        <th class="col-1" data-tablesaw-sortable-col data-tablesaw-priority="">Intervalo</th>
                        <th class="col-1 hidden"data-tablesaw-sortable-col data-tablesaw-priority="">Fec</th>
                        <th class="col-1 hidden"data-tablesaw-sortable-col data-tablesaw-priority="">Mensaje</th>
                        <th class="col-3"data-tablesaw-sortable-col data-tablesaw-priority="">Acciones</th>
         
                          <abbr title="Rotten Tomato Rating"> &nbsp;</abbr>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       
                        foreach($listar_asignaciones as $paginasweb){ ?>
                        <tr class="col-2">
                          <td class="hidden"><?php echo $listar['id'];?></td>
                          <td><?php echo $paginasweb['url'];?></td>
                          <td><?php echo $paginasweb['nombre'];?></td>
                          <td ><?php echo $paginasweb['tiempo_revision_pagina'];?></td>
                          <td class="hidden"><?php echo $paginasweb['estado'];?></td>
                          <td class="hidden"><?php echo $paginasweb['mensaje'];?></td>
                          <!--<td><a class="btn btn-light" href="http://localhost/controlador_web/base/html/pages/editar_asignaciones.php?ids=<?php echo $listar['id'];?>" role="button">Editar</a></td>-->
                          <td >
                            <a class="btn btn-light" href="detalle_pagina.php?idpag=<?php echo $paginasweb['id'];?>" role="button">Editar</a>
                            <a class="btn btn-light" href="editar_asignaciones.php?ids=<?php echo $paginasweb['id'];?>" role="button">Configurar/Editar Notificacion</a>
                          
                          </td>


                        </tr>
                      <?php } ?>
                    
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    
	



	<!-- End Page -->
	<!-- Footer -->
	<?php //include("footer.php"); ?>

	
	<!-- End Footer -->
	<!-- Script -->
	<?php include("script.php"); ?>
	<script type="text/javascript">

		/*$(document).ready(function() {
			$('.float-number').keypress(function(event) {
				if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
						event.preventDefault();
				}
			});
		});

		function otraMoneda(data){
			if(data=='Otras') {
				document.getElementById("moneda_otros_show").style.display='block';
			}else{
				document.getElementById("moneda_otros_show").style.display='none';
				
			}
		}

		//Agrega una linea en 3. REFERENCIAS PERSONALES
		function add_row_referenciaspersonales(){
			$rowno3=$("#modificaciones_referencias_personales tr").length;
			$rowno3=$rowno3+1;

			$("#modificaciones_referencias_personales tr:last").after("<tr id='referencias_personales_row"+$rowno3+"'><td>"+$rowno3+"</td><td><input type='text' name='referencia_personal_nombre[]'></td><td><input type='text' name='referencia_personal_direccion[]'></td><td><input type='text' name='referencia_personal_relacion[]'></td><td><input type='text' name='referencia_personal_telefono[]'></td></td><td><button onclick=delete_row_referenciaspersonales('referencias_personales_row"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
			
		}		

		function delete_row_referenciaspersonales(rowno2){
			$('#'+rowno2).remove();
		}

		//----------------------------------------------------- 


		//Agrega una linea en 4. REFERENCIAS FAMILIARES
		function add_row_referenciasfamiliares(){
			$rowno3=$("#modificaciones_referencias_familiares tr").length;
			$rowno3=$rowno3+1;

			$("#modificaciones_referencias_familiares tr:last").after("<tr id='referencias_familiares_row"+$rowno3+"'><td>"+$rowno3+"</td><td><input type='text' name='referencia_familiar_nombre[]'></td><td><input type='text' name='referencia_familiar_direccion[]'></td><td><input type='text' name='referencia_familiar_relacion[]'></td><td><input type='text' name='referencia_familiar_telefono[]'></td></td><td><button onclick=delete_row_referenciasfamiliares('referencias_familiares_row"+$rowno3+"') class='btn btn-warning' type='button'><i class='icon md-minus' aria-hidden='true'></i> Eliminar fila</button></td></tr>");
			
		}		

		function delete_row_referenciasfamiliares(rowno2){
			$('#'+rowno2).remove();
		}*/

		//----------------------------------------------------- 

	</script>
	<!-- End Script -->
  </form>
</body>

</html>