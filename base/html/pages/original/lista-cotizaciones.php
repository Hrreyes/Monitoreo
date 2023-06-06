<?php  
  require_once "conexion.php";
  require_once "funciones.php";

if(isset($_GET['page_num'])){
    // if get page number through url and check it is a valid number
    $page_num = filter_var($_GET['page_num'], FILTER_VALIDATE_INT,[
        'options' => [
            'default' => 1,
            'min_range' => 1
        ]
    ]); 
    
}else{
    //default page number
    $page_num = 1;
}

// initialize the last updated search checkbox to false
$last_updated = "";
// set how much show posts in a single page
$page_limit = 10;
// Set Offset
$page_offset = $page_limit * ($page_num - 1);

// if(isset($_POST['busca-fechas'])){

//   $start = $_POST['start'];
//   $end = $_POST['end'];
//   $last_updated = $_POST['last-updated'];

//   if($last_updated == "on"){ $last_updated = "checked";}

//     if ($start <='' || $end <=''){

//         $exp_data = get_leads_list_with_paging($page_limit, $page_offset);
//         $total_records = mysqli_num_rows(count_leads_list());
//     }
//     else
//     {
//       if($_POST['last-updated']=="on")
//       {
//         echo '<script type="text/javascript">alert("by udpdated date")</script>';
//         $exp_data = get_leads_list_with_paging_by_updated_date($start . ' 00:00:00', $end . ' 11:59:00', $page_limit, $page_offset);
//         $total_records = mysqli_num_rows(count_leads_by_updated_date_list($start . ' 00:00:00', $end . ' 11:59:00'));

//        } else {

//         $exp_data = get_leads_list_with_paging_by_date($start . ' 00:00:00', $end . ' 11:59:00', $page_limit, $page_offset);
//         $total_records = mysqli_num_rows(count_leads_by_date_list($start . ' 00:00:00', $end . ' 11:59:00'));
//       }

// echo '<script type="text/javascript">alert("'. $total_records .'")</script>';
//   }


// }
// else
// {
//   if($page_num >=2)
//   {

//     $exp_data = get_leads_list_with_paging_by_updated_date($start . ' 00:00:00', $end . ' 11:59:00', $page_limit, $page_offset);
//     $total_records = mysqli_num_rows(count_leads_by_updated_date_list($start . ' 00:00:00', $end . ' 11:59:00'));

//   }
//   else
//   {
//   echo '<script type="text/javascript">alert("no debe entrar aqui")</script>';
//   $exp_data = get_leads_list_with_paging($page_limit, $page_offset);
//   $total_records = mysqli_num_rows(count_leads_list());
//   $last_updated = "checked";
//   }

// }


  $exp_data = get_leads_list_with_paging($page_limit, $page_offset);
  $total_records = mysqli_num_rows(count_leads_list());

//$total_records = mysqli_num_rows(count_leads_list());

// total number of pages
$total_pages = ceil($total_records / $page_limit);
// set next page number
//$next_page = $current_page_num+1; 
// set prev page number
//$prev_page = $current_page_num-1; 


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
<!--           <div class="col-md-4 col-xl-6">
            <p align="right">
              <form action="lista-cotizaciones.php" method="post">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="icon md-calendar" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="start" placeholder="AAAA-MM-DD">
                <span class="input-group-addon">hasta</span>
                <input type="text" class="form-control" name="end" placeholder="AAAA-MM-DD">
              </div><br>
              <li class="list-inline-item">
                <input type="checkbox" class="checkbox-custom checkbox-default" name="last-updated" <?php //echo $last_updated;?>>
                 <label>Update</label> -->
<!--                <button type="submit" class="btn btn-danger btn-md waves-effect waves-classic" name="busca-fechas" formmethod="post">
                  <i class="icon md-calendar" aria-hidden="true"></i>
                Busca Rango Fechas</button>
              </li>
              </form>
            </p>
          </div> -->
          <div class="col-sm-4 col-md-6 col-xl-12">
            <p align=right>
<!--               <a class="btnDownload btn btn-danger" href="listado-cotizaciones.php" target="_blank">Imprimir listado</a> -->
              <a class="btnDownload btn btn-success" href="export.php">Exportar listado</a>
            </p>
          </div>
          <div class="col-sm-4 col-md-6 col-lg-12">
            <div class="card">
              <div class="card-block">
                <h4 class="card-title">Lista de Cotizaciones</h4>
                

                  <form action="detalle-cotizacion.php" method="post">
                                <div class="box-body">
                                    <div class="box-body table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Registro</th>
                              <th scope="col">Nombre cliente</th>
                              <th scope="col">Email cliente</th>
                              <th scope="col">Telefono cliente</th>
<!--                               <th scope="col">Nit cliente</th>
                              <th scope="col">DPI cliente</th> -->
                              <th scope="col">Datos del bien</th>
                              <th scope="col">Valor del bien</th>
                              <th scope="col">Fecha de cotizacion</th>
                              <th scope="col">Agente Arrend</th>
                              <th scope="col">Detalle</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              while ($db_var = mysqli_fetch_assoc($exp_data)) {
                                  $id     = $db_var["id"];
                                  $name   = $db_var["name"];
                                  $email  = $db_var["email"];
                                  $phone  = $db_var["phone"];
                                  // $nit  = $db_var["nit"];
                                  // $dpi    = $db_var["dpi"];

                                  $detalle = json_decode($db_var["preview"], true);

                                  $vehicle = $detalle['results'][0]['vehicle']['brand'];
                                  $vehicle.= ", ". $detalle['results'][0]['vehicle']['model'];
                                  $vehicle.= ", ". $detalle['results'][0]['vehicle']['year'];                         
                                  $valor_bien = $detalle['results'][0]['valor'];

                                  $moneda_simbolo = $detalle['results'][0]['moneda'];

                                  if ($moneda_simbolo = 'Quetzales') {
                                    $moneda = 'Q';
                                  }else{
                                    $moneda = '$';
                                  }
                                  
                                  $vehicle.= ", ". $detalle['results'][0]['vehicle']['pdf']['detail'][8];
                                  $fecha_coti = $detalle['results'][0]['fecha'];

                                 if (array_key_exists('agent',$detalle['results'][0])) {        
                                    $agente_arrend = $detalle['results'][0]['agent']['name'];
                                  }else{
                                    $agente_arrend = 'N/A';
                                  }                       
                            ?>
                        
                              <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $phone;?></td>
<!--                                 <td><?php echo $nit;?></td>
                                <td><?php echo $dpi;?></td> -->
                                <td><?php echo $vehicle;?></td>
                                <td><?php echo $moneda. number_format($valor_bien,2);?></td>
                                <td><?php echo $fecha_coti;?></td>
                                <td><?php echo $agente_arrend;?></td>
                                <td>
                                  <button class="btn btn-danger btn-xs" type="submit" name="leads_id" value="<?php echo $id;?>">Ver</button>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </form>
              <!-- START PAGINATION BUTTONS -->
                <?php //if ($total_pages >=2) { ?>

                <table class="table-responsive-block">
                  <tr>
                    <td><a class="btn btn-danger waves-classic waves-effect" href="lista-cotizaciones.php?page_num=1"><b>|<</b></a></td>
                    <td><a class="btn btn-danger waves-classic waves-effect" href="<?php if($page_num <= 1){ echo "lista-cotizaciones.php?page_num=".($page_num); } else { echo "lista-cotizaciones.php?page_num=".($page_num - 1); } ?>"><b><<</b></a></td>
                    <td width="5"></td>
                    <td>&nbsp;<h4>Página <?php echo $page_num; ?> de <?php echo $total_pages;?></h4>&nbsp;</td>
                    <td width="5"></td>
                    <td><a class="btn btn-danger waves-classic waves-effect" href="<?php if($page_num >= $total_pages){ echo '#'; } else { echo "lista-cotizaciones.php?page_num=".($page_num + 1); } ?>"><b>>></b></a></td>
                    <td><a class="btn btn-danger waves-classic waves-effect" href="lista-cotizaciones.php?page_num=<?php echo $total_pages; ?>"><b>>|</b></a></td>
                  </tr>
                </table>

                <?php// } ?>
              <!-- END PAGINATION BUTTONS -->
              </div>
            </div>
            <!-- End Card #1 -->
          </div>
        </div>
    <!-- End Page Content -->
    </div>
   </div>
</div>

  <!-- End Page -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© 2017 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
    <div class="site-footer-right">
      Crafted with <i class="red-600 icon md-favorite"></i> by <a href="http://themeforest.net/user/amazingSurge">amazingSurge</a>
    </div>
  </footer>
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