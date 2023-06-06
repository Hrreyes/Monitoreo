<?php
confirm_logged_in();
//  $details = "Testing Monitor";
//  set_monitor($details);
//  echo $details;
//---------------------------------
//ADDED BY DSCA 22/01/2020
//---------------------------------
include ("session_handler.php");
//---------------------------------


ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
?>


<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">

       <img class="navbar-brand-logo" src="../../assets/images/logo.png" title="Maqueta">
        <span class="navbar-brand-text hidden-xs-down">CUSTOMS LAW<?php //echo $_SESSION["admin_sede"]; ?></span>
      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon md-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="nav-item hidden-sm-down" id="toggleFullscreen">
            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
          <li class="nav-item hidden-float">
            <a class="nav-link icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
            role="button">
              <span class="sr-only">Toggle Search</span>
            </a>
          </li>


        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link waves-effect waves-light waves-round" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up" aria-expanded="false" role="button">
              <span class="flag-icon flag-icon-gt"></span>
            </a>
            <!-- Language selection dropdown -->
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-us"></span> English</a>
              <a class="dropdown-item waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-ca"></span> Francais</a>
              <a class="dropdown-item waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-br"></span> Portugues</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="admin-pics/<?php $path = "admin-pics/" . $_SESSION["admin_id"] . "-thm.jpeg";if (file_exists($path)) {echo $_SESSION["admin_id"] . "-thm.jpeg";} else {echo "0.jpg";}?>" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="logout.php" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Salir</a>
            </div>
          </li>

        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search" action="sede-search-user.php" method="post">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="search" placeholder="Buscar usuario por nombre">
              <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Cerrar"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
<!-- ======================================================================================== -->
 <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-item">
<!--             <li class="site-menu-category">General</li> -->
              <li class="site-menu-item">
                <a class="animsition-link" href="admin.php">
                  <i class="site-menu-icon md-collection-text" aria-hidden="true"></i>
                  <span class="site-menu-title">Catalogo General</span>
                </a>
              </li>
            </li>
            <li class="site-menu-item">
<!--             <li class="site-menu-category">General</li> -->
              <li class="site-menu-item">
                <a class="animsition-link" href="display-pdf-list-by-user.php">
                  <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i>
                  <span class="site-menu-title">Mis Documentos</span>
                </a>
              </li>
            </li>
<!--             <li class="site-menu-item">
                  <li class="site-menu-item has-sub">
                    <a href="javascript:void(0)">
                      <i class="site-menu-icon md-library" aria-hidden="true"></i>
                      <span class="site-menu-title">Documentos por Tipo</span> <span class="site-menu-arrow"></span>
                    </a> -->
<!-- FRACCION ARANCELARIA PERSONA INDIVIDUAL -->
<!--                     <ul class="site-menu-sub">
                      <li class="site-menu-item has-sub">
                        <a class="animsition-link" href="javascript:void(0)">
                          <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i> <span class="site-menu-title">Cambio Fracción Arancelaria Persona Individual</span>
                        </a>
                        <ul class="site-menu-sub">
                          <li class="site-menu-item">
                            <a class="animsition-link" href="cfa-ind-faa1.php">
                              <i class="site-menu-icon md-file" aria-hidden="true"></i> <span class="site-menu-title">Firmada por Agente Aduanero</span>
                            </a>
                          </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="cfa-ind-fim1.php">
                              <i class="site-menu-icon md-file" aria-hidden="true"></i> <span class="site-menu-title">Firmada por Importador</span>
                            </a>
                          </li>
                        </ul>
                      </li> -->
                    <!-- </ul> -->
<!-- FIN FRACCION ARANCELARIA PERSONA INDIVIDUAL -->
<!-- FRACCION ARANCELARIA PERSONA JURIDICA -->
                    <!-- <ul class="site-menu-sub"> -->
<!--                       <li class="site-menu-item has-sub">
                        <a class="animsition-link" href="javascript:void(0)">
                          <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i> <span class="site-menu-title">Cambio Fracción Arancelaria Persona Jurídica</span>
                        </a>
                        <ul class="site-menu-sub">
                          <li class="site-menu-item">
                            <a class="animsition-link" href="cfa-jur-faa1.php">
                              <i class="site-menu-icon md-file" aria-hidden="true"></i> <span class="site-menu-title">Firmada por Agente Aduanero</span>
                            </a>
                          </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="cfa-jur-fim1.php">
                              <i class="site-menu-icon md-file" aria-hidden="true"></i> <span class="site-menu-title">Firmada por Representante Legal</span>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul> -->
<!-- FIN FRACCION ARANCELARIA PERSONA JURIDICA -->
<!--                 </li> -->


  <!--          <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Servicios</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/menu-collapsed.html">
                    <span class="site-menu-title">Buscar Cliente</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/menu-expended.html">
                    <span class="site-menu-title">Buscar Contacto</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/menu-expended.html">
                    <span class="site-menu-title">Cliente Nuevo</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="layouts/grids.html">
                    <span class="site-menu-title">Resumen de Clientes</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                <span class="site-menu-title">Expedientes</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="pages/faq.html">
                    <span class="site-menu-title">Nuevo Requeriento</span>
                  </a>
                </li>

                <li class="site-menu-item">
                  <a class="animsition-link" href="pages/faq.html">
                    <span class="site-menu-title">Resumen Expedientes</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="pages/gallery.html">
                    <span class="site-menu-title">Buscar Expedientes</span>
                  </a>
                </li>
-->
<!--               </ul>
            </li> -->
          </ul>
        </div>
      </div>
    </div>

    <div class="site-menubar-footer">
      <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="Settings">
        <span class="icon md-settings" aria-hidden="true"></span>
      </a>
      <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <span class="icon md-eye-off" aria-hidden="true"></span>
      </a>
      <a href="logout.php" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
      </a>
    </div>
  </div>
