<?php
include("header.php");

require_once "conexion.php";
require_once "funciones.php";




$listar_usuario=lista_usuarios();
 
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
			<!-- <h1 class="page-title">LISTADO USUARIOS</h1>
			<ol class="breadcrumb">
              <header class="panel-heading">
                <h3 class="panel-title">
                 Menu Actualizar e Inactivar Usuarios 
                  <span class="panel-desc">
                  </span> --->
                  
				  	<class="d-grid gap-2 d-md-flex justify-content-md-">
                  <!--  
                  <button type="submit" class="btn btn-light"><a href="crear_rol.php"><b>Crear Rol</b></button></a>

                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="crear_aplicacion.php"><b>Crear Aplicacion</b></button></a>
                    
                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="asignar_aplicacion.php"><b>Asignar Aplicaciones</b></button></a>
                  
                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="listado_usuario.php"><b>Listado de Usuario</b></button></a>
                  
                    <class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-light"><a href="usuario.php"><b>Registrar Usuario</b></button></a>
                  --->

                    
                </h3>
            </header>
         </ol>  
      <div class="page-content">
        <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <h3 class="panel-title">LISTADO DE USUARIOS</h3>
          </header>
          <!--<a href="solicitud_leasing_lista_seguros.php"><button class="btn btn-success float-right mr-40">Crear Nueva <i class="icon md-plus"></i></button></a>-->
            
          <div class="panel-body container-fluid">
         
            <div class="row row-lg">
              <div class="col-md-12">
              <a href="usuario.php" class="btn btn-primary float-right mr-40">
                Crear Nuevo
                <i class="icon md-plus"></i>
              </a>
         


                <div class="panel-body">
                  <table class="tablesaw table-striped table-bordered table-hover" data-tablesaw-mode="swipe"
                    data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                    data-tablesaw-mode-switch id="TableTools-arl-2">
                    <thead>
                      <tr class="col-xl-12">
                        <th class="col-1" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="persist">Id Usuario</th>
                        <th class="col-1" data-tablesaw-sortable-col data-tablesaw-priority="">Nombres</th>
                        <th class="col-1" data-tablesaw-sortable-col data-tablesaw-priority="">Apellidos</th>
                        <th class="col-3"data-tablesaw-sortable-col data-tablesaw-priority="">Correo</th>
                        <th class="col-1"data-tablesaw-sortable-col data-tablesaw-priority="">Rol</th>
                        <th class="col-1"data-tablesaw-sortable-col data-tablesaw-priority="">Usuario</th>
                        <th class="col-2"data-tablesaw-sortable-col data-tablesaw-priority="">Detalle</th>

                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       
                        foreach($listar_usuario as $cargar){ ?>
                        <tr class="col-2">
                          <td><?php echo $cargar['id'];?></td>
                          <td><?php echo $cargar['nombres'];?></td>
                          <td><?php echo $cargar['apellidos'];?></td>
                          <td><?php echo $cargar['correo'];?></td>
                          <td><?php echo $cargar['roles'];?></td>
                          <td><?php echo $cargar['usuario'];?></td>
                          <td><a class="btn btn-light" href="http://localhost/controlador_web/base/html/pages/editar_usuario.php?idus=<?php echo $cargar['id'];?>" role="button">Editar</a></td>

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