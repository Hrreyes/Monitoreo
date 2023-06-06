
<?php


include("header.php");

require_once "conexion.php";
require_once "funciones.php";


if($_POST){
  //print_r($_POST);
  //die();
 
  //$guardar_aplicacion=$_POST['aplicacion']; 
     

    $guardar_aplicacion=$_POST['aplicacion'];
    $guardar_usuario=$_POST['usuario_aplicacion'];

    for ($i=0; $i <count($guardar_aplicacion) ; $i++){ 
      
    
        encargado_aplicacion($guardar_usuario,$guardar_aplicacion[$i]);

  } 
 

 
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
			<h1 class="page-title">Asignar Paginas</h1>
            <ol class="breadcrumb">
               <header class="panel-heading">
                  <h3 class="panel-title">
                    Asignar Pagina a Usuario 
                     <span class="panel-desc">
                     </span>

                <!--<class="d-grid gap-2 d-md-flex justify-content-md-">
                    <button type="submit" class="btn btn-light"><a href="crear_rol.php"><b>Crear Rol</b></button></a>

                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="crear_aplicacion.php"><b>Crear Aplicacion</b></button></a>
                    
                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="asignar_aplicacion.php"><b>Asignar Aplicaciones</b></button></a>
                -->
                    <class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-light"><a href="asignar_mail.php"><b>Listado de Usuario</b></button></a>
                  
                    <class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-light"><a href="control.php"><b>Registrar Usuario</b></button></a>
                     
                  </h3>
               </header>
      <!--<li class="breadcrumb-item"><a href="home.php">Inicio</a></li>-->
            </ol>
         <form method="post" action="" autocomplete="off" enctype="multipart/form-data">

		
               <div class="page-content">
                  <div class="panel">
                      <div class="panel-body container-fluid">
                        <div class="row row-lg">
                           <div class="col-md-12">

                  
                              <!-- Example Basic Form -->
                              <div class="example-wrap">
                                 <h4 class="example-title">Datos</h4>
                                <div class="example">
   
                                    <div class="row ">
                                        <div class="example-wrap col-md-6">
                                            <?php $cargar_usuario=obtener_usuarios();?>
                                            <label class="form-control-label" for="inputBasicPassword">Usuarios</label>
                                            <div class="example">
                                                <select class="form-control" data-plugin="select2" name="usuario_aplicacion" >

                                                    <?php
                                                    foreach($cargar_usuario as $us){?>

                                                    
                                                        
                                                    <option value="<?php echo $us['id'];?>"><?php echo $us['usuario'];?> <?php echo $us['roles'];?></option>
                                                    <?php }?>       
                                                            
                                                </select>
                                            </div>
                                                <?php $cargar_aplicacion=obtener_aplicaciones();?>
                                                <label class="form-control-label" for="inputBasicPassword">Asignar Aplicacion Usuarios</label>
                                            <div class="example">
                                                <select class="form-control" data-plugin="select2" name="aplicacion[]" multiple>

                                                    <?php
                                                    foreach($cargar_aplicacion as $aplicacion){?>

                                                    
                                                        
                                                    <option value="<?php echo $aplicacion['id'];?>"><?php echo $aplicacion['aplicaciones'];?></option>
                                                    <?php }?>       
                                                            
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary" value="agregar_rol">Asignar / Reasignar</button>

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



    </form>

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