<?php
include("header.php");

require_once "conexion.php";
require_once "funciones.php";

$_SESSION['usuario'];
$_SESSION['id_usuario'];
//print_r($_SESSION['id_usuario']);
//die();


if($_POST){
  //print_r($_POST);
  //die();
  $url=$_POST['url'];
  $nombre_pagina=$_POST['nombre'];
  $tiempo=$_POST['tiempo_revision_pagina'];
  $creado_por=$_POST['id_creado_por'];
  $actualizado_por=$_POST['id_actualizado_por'];
  
  
 
  guardar_pagina($url,$nombre_pagina,$tiempo,$creado_por,$actualizado_por);
  
   
 
 



 //$ultimaid=ultima_id_user();
  //print_r($ultimaid);
  //die();
 
 
   
 
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
			<!--<h1 class="page-title">REGISTRAR PAGINA WEB</h1>-->
          <ol class="breadcrumb">
            <!--<header class="panel-heading">
                <h3 class="panel-title">
                 Menu Registro Paginas 
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
                    -->

                    
                </h3>
              </header>
            <!--<li class="breadcrumb-item"><a href="home.php">Inicio</a></li>-->
          </ol>
          <form method="post" action="" autocomplete="off" enctype="multipart/form-data">

		
        <div class="page-content">
          <div class="panel">
            <header class="panel-heading">
              <div class="panel-actions"></div>
              <h3 class="panel-title">AGREGAR PAGINAS</h3>
            </header>
            <div class="panel-body container-fluid">
              <div class="row row-lg">
                <div class="col-md-12">
                <a href="listado_asignaciones.php" class="btn btn-primary float-right mr-40">
                Regresar
                <i class="icon md-plus"></i>
              </a>

                  <div class="panel-body container-fluid">
                    <div class="row row-lg">
                      <div class="col-md-6">
                        <!-- Example Basic Form -->
                        <div class="example-wrap">
                          <h4 class="example-title">Datos Agregar Pagina</h4>
                          <div class="example">
                  
                            <div class="row">
                              <div class="form-group form-material col-md-12">
                                <label class="form-control-label" for="inputBasicFirstName">Url</label>
                                <input type="text" class="form-control" id="inputBasicFirstName" name="url"
                                placeholder="+ url" autocomplete="off" />
                              </div>
                                <!--<div class="form-group form-material col-md-6">
                                  <label class="form-control-label" for="inputBasicLastName">Segundo Nombre</label>
                                  <input type="text" class="form-control" id="inputBasicLastName" name="SegundoNombre"
                                  placeholder="nombre" autocomplete="off" />
                                </div>-->
                            </div>
                            <div class="row">
                              <div class="form-group form-material col-md-12">
                                <label class="form-control-label" for="inputBasicFirstName">Nombre Pagina</label>
                                <input type="text" class="form-control" id="inputBasicFirstName" name="nombre"
                                placeholder="+ nombre pagina" autocomplete="off" />
                              </div>
                              <!--<div class="form-group form-material col-md-6">
                                <label class="form-control-label" for="inputBasicLastName">Segundo Apellido</label>
                                <input type="text" class="form-control" id="inputBasicLastName" name="segundoApellido"
                                placeholder="apellido" autocomplete="off" />
                              </div>-->
                            </div>

                            <div class="form-group form-material">
                              <label class="form-control-label" for="inputBasicEmail">intervalo tiempo</label>
                              <input type="text" class="form-control" id="inputBasicEmail" name="tiempo_revision_pagina"
                              placeholder="+ Intervalo" autocomplete="off" />
                            </div>
                            <div hidden class="form-group form-material">
                              <label class="form-control-label" for="inputBasicPassword">creado por</label>
                              <input type="text" class="form-control" id="inputBasicPassword" name="id_creado_por"
                              value="<?php echo $_SESSION['id_usuario'] ?>" autocomplete="off" />
                            </div>
                                                                                
                                                               
                            <div class="form-group form-material">
                              <!--<label class="form-control-label">Inactivar Usuario</label>
                              <div>
                                <div class="radio-custom radio-default radio-inline">
                                  <input type="radio" id="inputBasicMale" name="activar"checked value="1" />
                                  <label for="inputBasicMale">Activo</label>
                              </div>
                              <div class="radio-custom radio-default radio-inline">
                                <input type="radio" id="inputBasicFemale" name="activar" value="0"  />
                                <label for="inputBasicFemale">Inactivo</label>
                              </div>
                              </div>-->
                            </div>
                            <div hidden class="form-group form-material col-md-6">
                              <label class="form-control-label" for="inputBasicFirstName">Actualizado por</label>
                              <input type="text" class="form-control" id="inputBasicFirstName" name="id_actualizado_por"
                              value="<?php echo $_SESSION['id_usuario']?>" autocomplete="off" />
                            </div>
                      
                            <br>
                            <div class="form-group form-material">
                              <button type="submit" class="btn btn-primary">Crear Pagina</button>
                            </div>
                          </div>
                        </div>
                        <!-- End Example Basic Form -->
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