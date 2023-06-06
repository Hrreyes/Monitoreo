<?php
  // include("authenticate.php");
  
  require_once "conexion.php";
  require_once "funciones.php";

  session_start();
  
  
  if($_POST){
    $usuario=$_POST['userLogin'];
    $clave=$_POST['userPassword'];
    

  $iniciarSecion=ingresoUsuario($connection,$usuario/*,$clave*/);
    //print_r($iniciarSecion);
    //die();
    
    $session = mysqli_num_rows($iniciarSecion);
    //print_r($session);
    //die();

    $pass= mysqli_fetch_array($iniciarSecion);
    //print_r($pass);
    //die();

    $pass_encript=$pass['clave'];
    //print_r($pass_encript);
    //print_r($clave);
    //die();
    //echo $clave."<br>" ;
    //echo $pass_encript."<br>";
    //echo password_hash('$clave',PASSWORD_BCRYPT);
   //print_r(password_verify($clave,$pass_encript));
   //die();  

    if($session==1){
    
      if(password_verify($clave,$pass_encript)){
      

        foreach($iniciarSecion as $datosUser){
          /*$datosUser['id']=$_SESSION['id'];
          $datosUser['nombres']=$_SESSION['nombres'];
          $datosUser['apellidos']=$_SESSION['apellidos'];
          $datosUser['id_rol']=$_SESSION['id_rol'];*/
          //echo $datosUser['apellidos'];
          //die();
          $_SESSION['usuario']=$datosUser['usuario'];
          $_SESSION['id_usuario']=$datosUser['id'];
          $_SESSION['id_rol']=$datosUser['id_rol'];
          //echo $_SESSION['id_usuario'];
          //die();
        }  
        
    
          header('location:home.php');
            //exit();
          
          }  
      
        }else{
        header('location:login.php?error_mensaje=1'); 
        
    }
  }
  
  
  
  // check to see if user is logging out
  if(isset($_GET['out'])) {
    // destroy session
    session_unset();
    $_SESSION = array();
    unset($_SESSION['user'],$_SESSION['access']);
    session_destroy();
  }
   
  // // check to see if login form has been submitted
  // if(isset($_POST['userLogin'])){
  //   // run information through authenticator
  //   if(authenticate($_POST['userLogin'],$_POST['userPassword']))
  //   {
  //     // Login time is stored in a session variable
  //     $_SESSION["login_time_stamp"] = time();

  //     //verify that the user exists in DB:
  //     $resultado = user_exists($_POST['userLogin']);
  //     $total = mysqli_num_rows($resultado);
  //     $rowResult = mysqli_fetch_array($resultado);
      
  //     if($resultado > 0){
  //       // authentication passed
  //       $_SESSION["usuario"] = $_POST['userLogin'];
  //       $_SESSION["level"] = $rowResult['level'];
  //       $_SESSION["pais"] = $rowResult['pais'];
  //       // authentication passed
  //       if($rowResult['pais'] == 'gt'){
  //         header("Location: home.php");
  //       }else {
  //         header("Location: ".$rowResult['pais']."/home.php");
  //       }
        
  //       die();               
  //     } else {
  //       $error = 2;
  //     }
  //   } else {
  //     // authentication failed
  //     $error = 1;
  //   }
  // }
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>CONTROLADOR</title>
  <link rel="apple-touch-icon" href="../../assets/images/controla.jpg">
  <link rel="shortcut icon" href="../../assets/images/icon.ico">
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
  <link rel="stylesheet" href="../../assets/examples/css/pages/login-v2.css">
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
<body class="animsition page-login-v2 layout-full" style="background-image: url(../../assets/images/city.JPG)";>
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content ">
      <div class="page-brand-info">
        <!--div class="brand">
          <img class="brand-img" src="../../assets/images/logo.png" alt="..." width="250" height="auto">
        </div>
        <p class="font-size-20">Plataforma de formularios "conozca su cliente".</p>
      </div-->
      <div class="page-login-main" style="background-color: white">
        <!--div class="brand hidden-md-up">
          <img class="brand-img" src="../../assets/images/logo.png" alt="...">
        </div-->
        <h3 class="font-size-40" style="text-color: ligth;">Inicio de sesión</h3>
        <form method="post" action="login.php" autocomplete="off">
          <div class="form-group form-material floating " data-plugin="formMaterial">
            <input type="text" class="form-control empty" id="userLogin" name="userLogin" required>
            <label class="floating-label" for="userLogin">Usuario</label>
          </div>
          <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="password" class="form-control empty " id="userPassword" name="userPassword" required>
            <label class="floating-label" for="userPassword">Contraseña</label>
          </div>
          <button type="submit" class="btn btn-info btn-block">Ingresar</button>
          <br>

          <?php
            if (isset($_GET['error_mensaje'])) {?>

                <div class="alert alert-danger" role="alert">
                Aviso: Verifique su nombre de usuario y/o contraseña!
                </div>
            <?php } 
            ?>
            
            <?php
              if(isset($error)){
                if($error == 1) {
            ?>
                <div id="alert" class="alert alert-warning mt-10" role="alert">
                  <?php echo "Aviso: Verifique su nombre de usuario y/o contraseña"; ?>
                </div>
            <?php }else if ($error = 2){?>
                <div id="alert" class="alert alert-danger mt-10" role="alert">
                  <?php echo "Aviso: Su usuario no está configurado para utilizar este sistema."; ?>
                </div>
            <?php } ?>
            <?php 
              }
            ?>
            <?php
              if(isset($_GET['out'])){
            ?>
                <div id="alert" class="alert alert-primary mt-10" role="alert">
                  <?php echo "Usted salio del programa correctamente"; ?>
                </div>
            <?php 
              }
            ?>       
        </form>
        <!--<footer class="page-copyright">
          <p>Hecho por Sistemas Arrend</p>
          <p>© <?php echo date('Y');?>. Derechos reservados - Intranet.</p>
          <div class="social">
            <a class="btn btn-icon btn-round social-facebook mx-5" href="https://www.facebook.com/ArrendLeasingGuatemala" target="_blank">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-instagram mx-5" href="https://www.instagram.com/arrend_leasing/" target="_blank">
              <i class="icon bd-instagram" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-twitter mx-5" href="https://twitter.com/ArrendLeasing" target="_blank">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-linkedin mx-5" href="https://www.linkedin.com/company/arrend-leasing-centroam%C3%A9rica/" target="_blank">
              <i class="icon bd-linkedin" aria-hidden="true"></i>
            </a>
          </div>
        </footer>-->
      </div>
    </div>
  </div>
  <!-- End Page -->
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
  <script src="../../../global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
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
  <script src="../../../global/js/Plugin/jquery-placeholder.js"></script>
  <script src="../../../global/js/Plugin/material.js"></script>
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