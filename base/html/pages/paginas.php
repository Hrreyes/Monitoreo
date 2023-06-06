<?php
include("header.php");

require_once "conexion.php";
require_once "funciones.php";





$obtener_paginas=obtener_paginas();
//print_r($obtener_paginas);
//die();



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

	
<!--<div class="page">
		<div class="page-header">
			<h1 class="page-title">PAGINAS WEB</h1>
			<ol class="breadcrumb">
			</ol>
		</div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-md-12">-->
                <!-- Stylesheets -->

            <!--<link rel="stylesheet" href="../../../global/css/bootstrap.min.css">
                <link rel="stylesheet" href="../../../global/css/bootstrap-extend.min.css">
                <link rel="stylesheet" href="../../assets/css/site.min.css">
                <!-- Plugins -->
            <!--<link rel="stylesheet" href="../../../global/vendor/animsition/animsition.css">
                <link rel="stylesheet" href="../../../global/vendor/asscrollable/asScrollable.css">
                <link rel="stylesheet" href="../../../global/vendor/switchery/switchery.css">
                <link rel="stylesheet" href="../../../global/vendor/intro-js/introjs.css">
                <link rel="stylesheet" href="../../../global/vendor/slidepanel/slidePanel.css">
                <link rel="stylesheet" href="../../../global/vendor/flag-icon-css/flag-icon.css">
                <link rel="stylesheet" href="../../../global/vendor/waves/waves.css">
                <link rel="stylesheet" href="../../../global/vendor/gauge-js/gauge.css">
                <!-- Fonts -->
            <!--<link rel="stylesheet" href="../../../global/fonts/material-design/material-design.min.css">
                <link rel="stylesheet" href="../../../global/fonts/brand-icons/brand-icons.min.css">
                <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
                <!--[if lt IE 9]>
                    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
                    <![endif]-->
                <!--[if lt IE 10]>
                    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
                    <script src="../../../global/vendor/respond/respond.min.js"></script>
                    <![endif]-->
                <!-- Scripts -->

                <!--<script src="../../../global/vendor/breakpoints/breakpoints.js"></script>
                <script>
                Breakpoints();
                </script>
                </head>-->
                           
                  <h4 class="example-title">Listado de Paginas Web</h4>
                  <br>
                          
                  <div class="page">
                      <div class="page-header">
                        <div class="page-content container-fluid">
                          <div class="row">
                            <div class="col-xl-12">
                              <!-- Panel Kitchen Sink -->
                              <div class="panel">
                                <header class="panel-heading">
                                  <h3 class="panel-title">
                                    Tabla Paginas Web 
                                    <span class="panel-desc">
                                      <p> Paginas</p>
                                    </span>
                                   
                                  </h3>
                                </header>
                                <div class="panel-body">
                                  <table class="tablesaw table-striped table-bordered table-hover" data-tablesaw-mode="swipe"
                                    data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                                    data-tablesaw-mode-switch>
                                    <thead>
                                      <tr class="col-xl-12">
                                        <th class="col-1" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="persist">Id Pagina</th>
                                        <th class="col-2" data-tablesaw-sortable-col data-tablesaw-priority="">Url</th>
                                        <th class="col-2" data-tablesaw-sortable-col data-tablesaw-priority="">Nombre</th>
                                        <th class="col-1"data-tablesaw-sortable-col data-tablesaw-priority="">Intervalo</th>
                                        <th class="col-1"data-tablesaw-sortable-col data-tablesaw-priority="">Ingresada Por</th>
                                        <th class="col-2"data-tablesaw-sortable-col data-tablesaw-priority="">Fecha creacion</th>
                                        <th class="col-2"data-tablesaw-sortable-col data-tablesaw-priority="">Fecha actualizacion</th>
                                        <th class="col-1"data-tablesaw-sortable-col data-tablesaw-priority="">Accion</th>


                                          <abbr title="Rotten Tomato Rating">Listado de Paginas</abbr>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                          foreach($obtener_paginas as $paginasweb){ ?>
                                          <tr class="col-2">
                                            <td><?php echo $paginasweb['id'];?></td>
                                            <td><?php echo $paginasweb['url'];?></td>
                                            <td><?php echo $paginasweb['nombre'];?></td>
                                            <td><?php echo $paginasweb['tiempo_revision_pagina'];?></td>
                                            <td><?php echo $paginasweb['usuario'];?></td>
                                            <td><?php echo $paginasweb['fecha_creacion'];?></td>
                                            <td><?php echo $paginasweb['fecha_actualizacion'];?></td>
                                            <td><a class="btn btn-light" href="detalle_pagina.php?idpag=<?php echo $paginasweb['id'];?>" role="button">Actualizar</a></td>

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

                                
               
                            

                            
                            

                       
                
                    
                <!-- Core  -->
                <script src="../../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
                <script src="../../../global/vendor/jquery/jquery.js"></script>
                <script src="../../../global/vendor/tether/tether.js"></script>
                <script src="../../../global/vendor/bootstrap/bootstrap.js"></script>
                <script src="../../../global/vendor/animsition/animsition.js"></script>
                <script src="../../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
                <script src="../../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
                <script src="../../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
                <script src="../../../global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
                <script src="../../../global/vendor/waves/waves.js"></script>
                <!-- Plugins -->
                <script src="../../../global/vendor/switchery/switchery.min.js"></script>
                <script src="../../../global/vendor/intro-js/intro.js"></script>
                <script src="../../../global/vendor/screenfull/screenfull.js"></script>
                <script src="../../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
                <script src="../../../global/vendor/gauge-js/gauge.min.js"></script>
                <!-- Scripts -->
                <script src="../../../global/js/State.js"></script>
                <script src="../../../global/js/Component.js"></script>
                <script src="../../../global/js/Plugin.js"></script>
                <script src="../../../global/js/Base.js"></script>
                <script src="../../../global/js/Config.js"></script>
                <script src="../../assets/js/Section/Menubar.js"></script>
                <script src="../../assets/js/Section/GridMenu.js"></script>
                <script src="../../assets/js/Section/Sidebar.js"></script>
                <script src="../../assets/js/Section/PageAside.js"></script>
                <script src="../../assets/js/Plugin/menu.js"></script>
                <script src="../../../global/js/config/colors.js"></script>
                <script src="../../assets/js/config/tour.js"></script>
                <script>
                Config.set('assets', '../../assets');
                </script>
                <!-- Page -->
                <script src="../../assets/js/Site.js"></script>
                <script src="../../../global/js/Plugin/asscrollable.js"></script>
                <script src="../../../global/js/Plugin/slidepanel.js"></script>
                <script src="../../../global/js/Plugin/switchery.js"></script>
                <script src="../../../global/js/Plugin/gauge.js"></script>
                <script src="../../../global/js/Plugin/donut.js"></script>
                <script src="../../assets/examples/js/charts/gauges.js"></script>
                </body>
                            


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
</body>

</html>