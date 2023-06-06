<?php  
  require_once "conexion.php";
  require_once "funciones.php";

  if (isset($_POST['leads_id'])) {

    $id= $_POST['leads_id'];

    $exp_data = get_leads_detail($id);

            while ($db_var = mysqli_fetch_assoc($exp_data)) {
              $detalle = json_decode($db_var["preview"], true);

              $fecha_coti = $detalle['results'][0]['fecha'];

              $name_cli = $detalle['results'][0]['catalogo']['name'];
              $phone_cli = $detalle['results'][0]['catalogo']['phone'];
              $mail_cli = $detalle['results'][0]['catalogo']['mail'];

              $marca = $detalle['results'][0]['vehicle']['brand'];
              $modelo = $detalle['results'][0]['vehicle']['model'];
              $anio = $detalle['results'][0]['vehicle']['year'];

              $tipo_bien = $detalle['results'][0]['vehicle']['pdf']['detail'][0];
              $motor = $detalle['results'][0]['vehicle']['pdf']['detail'][1];
              $tipo_gasolina = $detalle['results'][0]['vehicle']['pdf']['detail'][2];
              $anio_ = $detalle['results'][0]['vehicle']['pdf']['detail'][3];
              $kilometraje = $detalle['results'][0]['vehicle']['pdf']['detail'][4];
              $transmision = $detalle['results'][0]['vehicle']['pdf']['detail'][5];
              $color = $detalle['results'][0]['vehicle']['pdf']['detail'][6];
              $color_interior = $detalle['results'][0]['vehicle']['pdf']['detail'][7];
              $placa = $detalle['results'][0]['vehicle']['pdf']['detail'][8];             

              $moneda = $detalle['results'][0]['moneda'];

              if ($moneda_simbolo = 'Quetzales') {
                $moneda = 'Q';
              }else{
                $moneda = '$';
              }
              $valor_bien = $detalle['results'][0]['valor'];

            $plazo = $detalle['results'][0]['catalogo']['plazo'];
              $link = $detalle['results'][0]['catalogo']['extra_params']['hre_client'];
              $envio_email = $detalle['results'][0]['catalogo']['send_email'];

              if ($envio_email = 1) {
                $envio_email = 'Si';
              }else{
                $envio_email = 'No';
              }

              $gastoInicial = $detalle['results'][0]['gastoInicial'];
              $renta = $detalle['results'][0]['renta'][0][0];
            $seguro = $detalle['results'][0]['seguro'];

             if (array_key_exists('agent',$detalle['results'][0])) {        
                $agente_name = $detalle['results'][0]['agent']['name'];
                $agente_email = $detalle['results'][0]['agent']['email'];
                $agente_phone = $detalle['results'][0]['agent']['phone'];
              }else{
                $agente_arrend = 'N/A';
                $agente_name = 'N/A';
                $agente_email = 'N/A';
                $agente_phone = 'N/A';
              }             

?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>ARREND | Reporteria Carmarket</title>
  <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="icons/favicon.png">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../../../global/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="../../../global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="../../../global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="../../../global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="../../../global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="../../../global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="../../../global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="../../../global/vendor/waves/waves.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="../../../global/fonts/material-design/material-design.min.css">
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
  <script src="../../../global/vendor/breakpoints/breakpoints.js"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body class="animsition site-menu-bar-keep site-menubar-fold" style="animation-duration: 800ms; opacity: 1;">

<?php include("navbar.php"); ?>

  <!-- Page -->
  <div class="page">
    <!-- Page Content -->
   <div class="page-content container-fluid">
     
    <div class="example-wrap">
        <!-- Card #1 -->

        <div class="row">
            <div class="col-sm-4 col-md-8 ">
              <div class="card"> <!-- card-bordered card-outline-danger"> -->
                <!-- <div class="card-header card-header-transparent card-header-bordered" style="background-color: DarkSlateBlue"></div> -->
                <div class="card-block">
                  <h4 class="card-title">Datos del Cliente</h4>
                    <p class="card-text"><font color=#999>Nombre: </font><b><?php echo $name_cli;?></b></p>                
                    <p class="card-text"><font color=#999>Email: </font><b><?php echo $mail_cli;?></b></p> 
                    <p class="card-text"><font color=#999>Telefono:</font><b><?php echo $phone_cli;?></b></p>     
                  <!-- <a href="#" class="btn btn-primary">Button</a> -->
                </div>
              </div>
              <div class="card"> <!-- card-bordered card-outline-danger"> -->
                <div class="card-block">
                  <h4 class="card-title">Datos del Asesor</h4>
                    <p class="card-text"><font color=#999>Nombre: </font><b><?php echo $agente_name;?></b></p>
                    <p class="card-text"><font color=#999>Email: </font><b><?php echo $agente_email;?></b></p>
                    <p class="card-text"><font color=#999>Telefono: </font><b><?php echo $agente_phone;?></b></p>  
                 <!--  <a href="#" class="btn btn-primary">Button</a> -->
                </div>
              </div>
              <!-- End Card #1 -->
            </div>
            <div class="col-sm-4">
              <div class="card"> <!-- card-bordered card-outline-danger"> -->
                <div class="form-group">
                  <div class="card-block" align="middle">
                    <h4 class="card-title">Foto Cliente</h4>
                    <img src="user-pics/0.jpg" width="300" height="270">
                  </div>
                </div>
              </div>
              <!-- End Card #2 -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-6 col-lg-12">
              <div class="card"> <!-- card-bordered card-outline-danger"> -->
                <div class="card-block">
                  <h4 class="card-title">Datos Generales de la Cotización</h4>
                    <p class="card-text m-0"><font color=#999>Numero de registro: </font><b><?php echo $id;?></b></p>
                    <p class="card-text m-0"><font color=#999>Fecha de cotizacion: </font><b><?php echo $fecha_coti;?></b></p>
                    <p class="card-text m-0"><font color=#999>Envio de correo: </font><b><?php echo $envio_email;?></b></p>
                    <p class="card-text m-0"><font color=#999>URL Carmarket: </font><b><a target="_blank" href="<?php echo $link;?>"><?php echo $link;?></b></a></p>
                  <!-- <a href="#" class="btn btn-primary">Button</a> -->
                </div>
              </div>
              <!-- End Card #3 -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 ">
              <div class="card"> <!-- card-bordered card-outline-danger"> -->
                <div class="card-block">
                  <div class="form-group">
                  <h4 class="card-title">Datos del Vehiculo</h4>
                    <p class="card-text"><font color=#999>Tipo de bien: </font><b><?php echo $tipo_bien;?></b></p>
                    <p class="card-text"><font color=#999>Placa: </font><b><?php echo $placa;?></b></p>
                    <p class="card-text"><font color=#999>Marca: </font><b><?php echo $marca;?></b></p>
                    <p class="card-text"><font color=#999>Modelo: </font><b><?php echo $modelo;?></b></p>
                    <p class="card-text"><font color=#999>Año: </font><b><?php echo $anio;?></b></p>
                    <p class="card-text"><font color=#999>Motor: </font><b><?php echo $motor;?></b></p>
                    <p class="card-text"><font color=#999>Tipo Gasolina: </font><b><?php echo $tipo_gasolina;?></b></p>
                    <p class="card-text"><font color=#999>Kilometraje: </font><b><?php echo $kilometraje;?></b></p>
                    <p class="card-text"><font color=#999>Transmision: </font><b><?php echo $transmision;?></b></p>
                    <p class="card-text"><font color=#999>Color: </font><b><?php echo $color;?></b></p>
                    <p class="card-text"><font color=#999>Color interior: </font><b><?php echo $color_interior;?></b></p>
                  <!-- <a href="#" class="btn btn-primary">Button</a> -->
                </div>
                </div>
              </div>
              <!-- End Card #3 -->
            </div>
            <div class="col-sm-4 col-md-4 ">
              <div class="card"> <!-- card-bordered card-outline-danger"> -->
                <div class="card-block">
                  <div class="form-group">
                  <h4 class="card-title">Valores de la Cotización</h4>
                    <p class="card-text"><font color=#999>Monto del bien: </font><b><?php echo $moneda . number_format($valor_bien,2);?></b></p>
                    <p class="card-text"><font color=#999>Plazo: </font><b><?php echo $plazo;?></b></p>
                    <p class="card-text"><font color=#999>Gastos iniciales: </font><b><?php echo $moneda . number_format($gastoInicial,2);?></b></p>
                    <p class="card-text"><font color=#999>Renta: </font><b><?php echo $moneda . number_format($renta,2);?></b></p>
                    <p class="card-text"><font color=#999>Seguro: </font><b><?php echo $moneda . number_format($seguro,2);?></b></p>
                  <!-- <a href="#" class="btn btn-primary">Button</a> -->
                  </div>
                </div>
              </div>
              <!-- End Card #4 -->
            </div>
            <div class="col-md-4">
              <div class="card"> <!-- card-bordered card-outline-danger"> -->
                <div class="card-block" align="middle">
                  <h4 class="card-title">Foto del Bien</h4>
                  <img src="user-pics/car-covered-tarp.png" width="300" height="150">
                </div>
              </div>
              <!-- End Card #2 -->
            </div>
<!--             <div class="col-sm-4 col-md-4 ">

              <div class="card">
                <div class="card-block">
                  <h4 class="card-title">Datos del Asesor</h4>
                    <p class="card-text">Nombre: <?php echo $agente_name;?></p>
                    <p class="card-text">Email: <?php echo $agente_email;?></p>
                    <p class="card-text">Telefono: <?php echo $agente_phone;?></p>  
                  <a href="#" class="btn btn-primary">Button</a>
                </div>
              </div> -->
              <!-- End Card #5 -->
<!--             </div> -->
        </div>
    <!-- End Page Content -->
    </div>
   </div>
</div>
        <?php
            }
          ?>
  <!-- End Page -->
  <!-- Footer -->
<?php include("footer.php")?>
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
  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>
</body>
</html>
<?php }?>