<?php
 
 //$_SESSION['usuario']=$nombreUsuario;
 $id_pagina_web=$_GET['idpag'];
 //print_r($id);
 //die();
    
 
 
include("header.php");


$nombreUser=$_SESSION['usuario'];
$idUser=$_SESSION['id_usuario'];



//echo $_SESSION['usuario'];



require_once "conexion.php";
require_once "funciones.php";

$cargar_pagina=obtener_datos_pagina($id_pagina_web);
//print_r($cargar_ticket_usuario);
//die();

if($_POST){
 //print_r($_POST);
 //die();
 $url=$_POST['url'];
 $nombre_pagina=$_POST['nombre'];
 $tiempo=$_POST['tiempo_revision_pagina'];
 $creado_por=$_POST['id_creado_por'];
 $actualizado_por=$_POST['id_actualizado_por'];
 $estatus_pagina=$_POST['activar'];

   actualizar_pagina($url,$nombre_pagina,$tiempo,$creado_por,$actualizado_por,$id_pagina_web,$estatus_pagina);

   //guardar_bitacora($estado_ticket,$creado_por, $aplicaciones,$id_ticket_usuario);



  //$id=ultima_id();//id
  //echo $id[0]['id'];
  //print_r($_FILES);
  //print_r($_POST);
  //die();

  

}



/*if (($_FILES['miarchivo'])) {
  $miarchivo=$_FILES['miarchivo'];

    /*  for ($i=0; $i <count($miarchivo) ; $i++) { 
      guardar_archivo($miarchivo[$i],$id[0]);
    }
}*/


/*$paises_list = get_paises_list();
$redes_sociales_list = get_redes_sociales_list();
$redes_sociales_list_2 = get_redes_sociales_list();
$cartera_list = get_cartera_list();
$motivo_visita_list = get_motivo_visita_list();*/


   include("navbar.php"); 
  
   
?>


<body class="animsition">


	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	
	<div class="page">
		<div class="page-header">
			<!--<h1 class="page-title">EDITAR PAGINAS</h1>
			<ol class="breadcrumb">
				/<li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
			</ol>-->
            
            </div>
                <div class="page-content">
                    <div class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions"></div>
                            <h3 class="panel-title">EDITAR PAGINA</h3>
                        </header>

                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-md-12">
                                    <a href="listado_asignaciones.php" class="btn btn-primary float-right mr-40">
                                        Regresar
                                        <i class="icon md-plus"></i>
                                    </a>

                                    <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                            <?php
                                            foreach($cargar_pagina as $cargar){?>
                                                                                             

                                                    <div class="panel-body container-fluid">
                                                        <div class="row row-lg">
                                                        <div class="col-md-6">
                                                            <!-- Example Basic Form -->
                                                            <div class="example-wrap">
                                                            <h4 class="example-title">Datos Pagina</h4>
                                                            <div class="example">
                                                    
                                                                <div class="row">
                                                                <div class="form-group form-material col-md-12">
                                                                    <label class="form-control-label" for="inputBasicFirstName">Url</label>
                                                                    <input type="text" class="form-control" id="inputBasicFirstName" name="url"
                                                                    value="<?php echo $cargar['url']?>" autocomplete="off" />
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
                                                                    value="<?php echo $cargar['nombre']?>" autocomplete="off" />
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
                                                                value="<?php echo $cargar['tiempo_revision_pagina']?>" autocomplete="off" />
                                                                </div>
                                                                <div hidden class="form-group form-material">
                                                                <label class="form-control-label" for="inputBasicPassword">creado por</label>
                                                                <input type="text" class="form-control" id="inputBasicPassword" name="id_creado_por"
                                                                value="<?php echo $cargar['id_creado_por']?>" autocomplete="off" />
                                                                </div>
                                                                                                                    
                                                                                                
                                                                <div class="form-group form-material">
                                                                <label class="form-control-label">Inactivar Pagina</label>
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
                                                                </div>
                                                                <div hidden class="form-group form-material col-md-6">
                                                                <label class="form-control-label" for="inputBasicFirstName">Actualizado por</label>
                                                                <input type="text" class="form-control" id="inputBasicFirstName" name="id_actualizado_por"
                                                                value="<?php echo $_SESSION['id_usuario']?>" autocomplete="off" />
                                                                </div>
                                                        
                                                                <br>
                                                                <div class="form-group form-material">
                                                                <button type="submit" class="btn btn-primary">Actualizar Pagina</button>
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

                            <?php } ?>                    
                        </div>
                    </div>
           </div>
        </div>
    
	</div>

    </form>

	<!-- End Page -->
	<!-- Footer -->
    
	<?php// include("footer.php"); ?>

	
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

</body>

</html>