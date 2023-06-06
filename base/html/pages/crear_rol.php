<?php
include("header.php");

require_once "conexion.php";
require_once "funciones.php";


if($_POST){
  //print_r($_POST);
  //die();
 
  $agregar_rol=$_POST['agregar_rol'];
  
  
 
      
    guardar_rol($agregar_rol);
 
 



 
   
 
}

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
			<h1 class="page-title">Agregar Rol</h1>
			<ol class="breadcrumb">
            <header class="panel-heading">
                <h3 class="panel-title">
                 Crear Roles 
                  <span class="panel-desc">
                  </span>

					<class="d-grid gap-2 d-md-flex justify-content-md-">
                    <button type="submit" class="btn btn-light"><a href="crear_rol.php"><b>Crear Rol</b></button></a>

                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="crear_aplicacion.php"><b>Crear Aplicacion</b></button></a>
                    
                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="asignar_aplicacion.php"><b>Asignar Aplicaciones</b></button></a>

                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="listado_usuario.php"><b>Listado de Usuario</b></button></a>
                  
                    <class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-light"><a href="registrar_usuario.php"><b>Registrar Usuario</b></button></a>
                     
                </h3>
            </header>
            
			</ol>
      <form method="post" action="" autocomplete="off" enctype="multipart/form-data">

		
         <div class="page-content">
            <div class="panel">
                  <div class="panel-body container-fluid">
                     <div class="row row-lg">
                        <div class="col-md-7">
                           <!-- Example Basic Form -->
                           <div class="example-wrap">
                              <h4 class="example-title">Datos</h4>
                              <div class="example">
                        
                                 <div class="row">			
                  
                                    <div class="form-group form-material col-md-9">
                                       <label class="form-control-label" for="inputBasicPassword">Agregar Rol</label>
                                       <input type="text" class="form-control" id="inputBasicPassword" name="agregar_rol"
                                       placeholder="+ rol" autocomplete="off" />
                                                                           
                                    
                                       <br>
                                       <button type="submit" class="btn btn-primary" value="agregar_rol">Agregar</button>

                                    </div>
                        

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

    
	               </div>
               </div>
            </div>
         </div>
    </form>
      </div>
   </div>

	<!-- End Page -->
	<!-- Footer -->
	<?php include("footer.php"); ?>

	
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