<?php 
	 confirm_user_logged_in(); 
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
        <span class="navbar-brand-text hidden-xs-down"> Maqueta</span>
      </div>
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
                <img src="user-pics/<?php $path="user-pics/".$_SESSION["user_id"].".jpeg"; if(file_exists($path)){ echo $_SESSION["user_id"].".jpeg"; } else { echo "0.jpg";}?>" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="user-user-profile.php" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Perfil</a>
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Historial</a>
              <div class="dropdown-divider" role="presentation"></div>
              <a class="dropdown-item" href="user-logout.php" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Salir</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
            aria-expanded="false" data-animation="scale-up" role="button">
              <i class="icon md-notifications" aria-hidden="true"></i>
              <span class="badge badge-pill badge-danger up"><?php $notificaciones_total= notificaciones_for_flow_and_id_count($_SESSION["user_id"],0); echo $notificaciones_total?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header">
                <h5>NOTIFICACIONES</h5>
              </div>
              <div class="list-group">
                <div data-role="container">
                  <div data-role="content">
	                 
	               <?php 
		               $notificaciones = notificaciones_for_flow_and_id($_SESSION["user_id"],0);
						       while($order = mysqli_fetch_assoc($notificaciones)) { 
							     $id_notificacion  = $order["id"]; 
							     $contenido_noti   = $order["contenido"]; 
							     $tipo_noti        = $order["tipo"]; 
							     $link             = $order["link"]; 
							     $created_on       = $order["created_on"]; 
	               ?> 
	                 
                    <a class="list-group-item dropdown-item" href="<?php echo $link?>" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><?php echo $contenido_noti?></h6>
						                <p>
							<span class="float-right pl-10">	
							<?php 
								$date2=date_create($created_on);
								$date1=date_create(date("Y-m-d G:i:s"));
								$diff=date_diff($date2,$date1);
								//echo $diff->format("Recibida hace %a días %h horas %i minutos");
							?>
							</span>
							<!--
							Tiempo Transcurrido
							-->
						  </p>
                          <time class="media-meta" datetime="<?php echo $created_on?>"><?php echo $diff->format("Recibida hace %a días %h horas %i minutos"); ?></time>
                        </div>
                      </div>
                    </a>
                    
                    <?php } ?>
                   </div>
                </div>
              </div>
              <div class="dropdown-menu-footer">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                  <i class="icon md-settings" aria-hidden="true"></i>
                </a>
				<!-- 
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    Todas las notificaciones
                  </a>
				  -->
              </div>
            </div>
          </li>
          
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
         </div>
  </nav>
  
  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">General</li>

            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-file" aria-hidden="true"></i>
                <span class="site-menu-title">Expedientes</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
	            <li class="site-menu-item ">
	              <a class="animsition-link" href="user-user-review.php">
	                <i class="site-menu-icon md-file-text" aria-hidden="true"></i>
	                <span class="site-menu-title">Expedientes Activos</span>
	              </a>
	            </li>
	            
	            <li class="site-menu-item ">
	              <a class="animsition-link" href="user-user-history.php">
	                <i class="site-menu-icon md-folder " aria-hidden="true"></i>
	                <span class="site-menu-title">Historial de Expedientes</span>
	              </a>
	            </li>

	            
              </ul> 
            </li>
            
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-codepen" aria-hidden="true"></i>
                <span class="site-menu-title">Servicios</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
	    
<?php
	 if(get_correlativo_var_by_user_id($_SESSION["user_id"])) { ?>

					    <li class="site-menu-item ">
	              <a class="animsition-link" href="user-user-correlativos.php">
	                <i class="site-menu-icon md-file" aria-hidden="true"></i>
	                <span class="site-menu-title">Correlativos</span>
	              </a>
	            </li>
	            
<?php } ?>

	            <li class="site-menu-item ">
	              <a class="animsition-link" href="user-user-cotizacion.php">
	                <i class="site-menu-icon md-plus-square" aria-hidden="true"></i>
	                <span class="site-menu-title">Cotizaciones</span>
	              </a>
	            </li>
	            
	            
	            	            
	            <li class="site-menu-item ">
	              <a class="animsition-link" href="user-user-services.php">
	                <i class="site-menu-icon md-file-plus" aria-hidden="true"></i>
	                <span class="site-menu-title">Nuevo Requerimiento</span>
	              </a>
	            </li>
	            	                
              </ul>
            </li>
            					
            <li class="site-menu-category">Clientes</li>       
						<li class="site-menu-item ">
	              <a class="animsition-link" href="user-user-clients.php">
	                <i class="site-menu-icon md-accounts" aria-hidden="true"></i>
	                <span class="site-menu-title">Clientes</span>
	              </a>
	            </li>

            <li class="site-menu-category">Contacto</li>          
            <li class="site-menu-item">
              <a href="mailto:sac@Maqueta.gt">
                <i class="site-menu-icon md-email" aria-hidden="true"></i>
                <span class="site-menu-title">Enviar Correo</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a href="tel:23331524">
                <i class="site-menu-icon md-phone-in-talk" aria-hidden="true"></i>
                <span class="site-menu-title">Llamar Ahora</span>
              </a>
            </li>
	


              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>

<!--
    <div class="site-menubar-footer">
      <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="Settings">
        <span class="icon md-settings" aria-hidden="true"></span>
      </a>
      <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <span class="icon md-eye-off" aria-hidden="true"></span>
      </a>
      <a href="user-logout.php" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
      </a>
    </div>
-->
    
  </div>
  
<!--
  <div class="site-gridmenu">
    <div>
      <div>
        <ul>
          <li>
            <a href="#">
              <i class="icon md-image"></i>
              <span>Expedientes</span>
            </a>
          </li>

          <li>
            <a href="admin.php">
              <i class="icon md-view-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
-->

  
