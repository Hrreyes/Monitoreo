<?php
$id_usuario=$_GET['idus'];

include("header.php");

require_once "conexion.php";
require_once "funciones.php";


$cargar_usuario=editar_usuarios($id_usuario);

if($_POST){
  //print_r($_POST);
  //die();
  $nombres=$_POST['nombres'];
  $apellidos=$_POST['apellidos'];
  $correo=$_POST['correo'];
  $guardar_rol=$_POST['roles'];
  $usuario=$_POST['usuario'];
  $estatus_user=$_POST['activar'];
  $password=$_POST['clave'];
  $password_cript=password_hash($password,PASSWORD_BCRYPT);
  
 
  actualizar_usuario($nombres,$apellidos,$correo,$guardar_rol,
  $usuario,$estatus_user,$id_usuario,$password_cript);
  
   
   
 
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
			<!--<h1 class="page-title">ACTUALIZACION USUARIOS</h1>
			<ol class="breadcrumb">
      <header class="panel-heading">
        <h3 class="panel-title">
                 Menu Actualizar e Inactivar Usuarios 
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
                    <button type="submit" class="btn btn-light"><a href="usuario.php"><b>Registrar Usuario</b></button></a>
                  
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
            <h3 class="panel-title">ACTUALIZAR USUARIOS</h3>
          </header>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-md-12">
            <a href="listado_usuario.php" class="btn btn-primary float-right mr-40">
                Regresar
                <i class="icon md-plus"></i>
              </a>

              <div class="panel-body container-fluid">
                <div class="row row-lg">
                  <div class="col-md-6">
                    <!-- Example Basic Form -->
                    <div class="example-wrap">
                      <h4 class="example-title">Datos Para Actualizar</h4>
                        <div class="example">

                          <?php foreach($cargar_usuario as $cargar){ ?>

                          <div class="row">
                            <div class="form-group form-material col-md-12">
                              <label class="form-control-label" for="inputBasicFirstName">Nombres</label>
                              <input type="text" class="form-control" id="inputBasicFirstName" name="nombres"
                              value="<?php echo $cargar['nombres'];?>" autocomplete="off" />
                            </div>
                              <!--<div class="form-group form-material col-md-6">
                                <label class="form-control-label" for="inputBasicLastName">Segundo Nombre</label>
                                <input type="text" class="form-control" id="inputBasicLastName" name="SegundoNombre"
                                placeholder="nombre" autocomplete="off" />
                              </div>-->
                          </div>
                          <div class="row">
                            <div class="form-group form-material col-md-12">
                              <label class="form-control-label" for="inputBasicFirstName">Apellidos</label>
                              <input type="text" class="form-control" id="inputBasicFirstName" name="apellidos"
                              value="<?php echo $cargar['apellidos'];?>" autocomplete="off" />
                            </div>
                            <!--<div class="form-group form-material col-md-6">
                              <label class="form-control-label" for="inputBasicLastName">Segundo Apellido</label>
                              <input type="text" class="form-control" id="inputBasicLastName" name="segundoApellido"
                              placeholder="apellido" autocomplete="off" />
                            </div>-->
                          </div>

                          <div class="form-group form-material">
                            <label class="form-control-label" for="inputBasicEmail">Correo Electronico</label>
                            <input type="email" class="form-control" id="inputBasicEmail" name="correo"
                            value="<?php echo $cargar['correo'];?>" autocomplete="off" />
                          </div>
                          <div class="form-group form-material">
                            <label class="form-control-label" for="inputBasicPassword">Contraseña</label>
                            <input type="password" class="form-control" id="inputBasicPassword" name="clave"
                            placeholder="Password" autocomplete="off" />
                          </div>
                                                            
                          <div class="example-wrap">
                                    <div>
                                        <?php $cargar_rol=obtener_rol();?>
                                            <label class="form-control-label" for="inputBasicPassword">Asignar Aplicacion Usuarios</label>
                                            <div class="example">
                                                <select class="form-control" data-plugin="select" name="roles">
                                                    <?php
                                                    foreach($cargar_rol as $roles){?>
                                                          
                                                    <option value="<?php echo $roles['id'];?>"><?php echo $roles['roles'];?></option>
                                                    <?php }?>       
                                                            
                                                </select>
                                            </div>
                                    </div>
                                        
                          
                              <div class="form-group form-material">
                                <!--<label class="form-control-label">Inactivar Usuario</label>
                                -->
                              </div>
                              <div class="form-group form-material col-md-6">
                                <label class="form-control-label" for="inputBasicFirstName">Usuario</label>
                                <input type="text" class="form-control" id="inputBasicFirstName" name="usuario"
                                value="<?php echo $cargar['usuario'];?>" autocomplete="off" />
                              </div>
                            <div>
                              <div class="radio-custom radio-default radio-inline">
                                <input type="radio" id="inputBasicMale" name="activar"checked value="1" />
                                <label for="inputBasicMale">Activo</label>
                              </div>
                              <div class="radio-custom radio-default radio-inline">
                                <input type="radio" id="inputBasicFemale" name="activar" value="0"  />
                                <label for="inputBasicFemale">Inactivo</label>
                              </div>
                            </div>
                            <?php } ?>
                            <br>
                          
                            <div class="form-group form-material">
                              <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
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