<?php 
  confirm_logged_in(); 
//  $details = "Testing Monitor";
//  set_monitor($details);
//  echo $details;

//$_SESSION["requerimiento"]  
// $_SESSION["expedientes"]    
// $_SESSION["resumen_global"] 
// $_SESSION["resumen_sede"]   
//---------------------------------
//ADDED BY DSCA 22/01/2020
//---------------------------------
include("session_handler.php");
//---------------------------------
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
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="admin-pics/<?php $path="admin-pics/".$_SESSION["admin_id"]."-thm.jpeg"; if(file_exists($path)){ echo $_SESSION["admin_id"]."-thm.jpeg"; } else { echo "0.jpg";}?>" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Perfil</a>
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Equipo</a>
              <div class="dropdown-divider" role="presentation"></div>
              <a class="dropdown-item" href="logout.php" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Salir</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
            aria-expanded="false" data-animation="scale-up" role="button">
              <i class="icon md-notifications" aria-hidden="true"></i>
              <span class="badge badge-pill badge-danger up"><?php $notificaciones_total= notificaciones_for_flow_and_id_count($_SESSION["admin_id"],1); echo $notificaciones_total?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header">
                <h5>NOTIFICACIONES</h5>
              </div>
              <div class="list-group">
                <div data-role="container">
                  <div data-role="content">
	                 
	               <?php 
		               $notificaciones = notificaciones_for_flow_and_id($_SESSION["admin_id"],1);
		               while($order = mysqli_fetch_assoc($notificaciones)) { 
										$id_notificacion = $order["id"]; 
										$contenido_noti = $order["contenido"]; 
										$tipo_noti = $order["tipo"]; 
										$link = $order["link"]; 
										$created_on = $order["created_on"]; 
	               ?> 
	                 
                    <a class="list-group-item dropdown-item" href="<?php echo $link?>" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><?php echo $contenido_noti?></h6>
                          <time class="media-meta" datetime="<?php echo $created_on?>">Hace 5 horas</time>
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
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    Todas las notificaciones
                  </a>
              </div>
            </div>
          </li>
          
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search" action="search-user.php" method="post">
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
  
  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu" data-plugin="menu">

            <li class="site-menu-category">General</li>
            <li class="site-menu-item">
			<?php if($_SESSION["requerimiento"]=="1") { ?>
              <a class="animsition-link" href="requerimiento.php">
                <i class="site-menu-icon md-open-in-new" aria-hidden="true"></i>
                <span class="site-menu-title">Requerimiento</span>
              </a>
			<?php } ?>
            </li>

			<?php if($_SESSION["expedientes"]=="1") { ?>
			<li class="site-menu-item has-sub">
			  <a href="javascript:void(0)">
                <i class="site-menu-icon md-file" aria-hidden="true"></i>
                <span class="site-menu-title">Expedientes</span>
                <span class="site-menu-arrow"></span>
              </a>
			  <ul class="site-menu-sub">
	            <li class="site-menu-item ">
				<?php if($_SESSION["expedientes"]=="1") { ?>
	              <a class="animsition-link" href="search-expedientes.php">
	                <i class="site-menu-icon md-search" aria-hidden="true"></i>
	                <span class="site-menu-title">Buscar Expediente</span>
	              </a>
				<?php } ?>
	            </li>
	            <li class="site-menu-item ">
				<?php if($_SESSION["resumen_global"]=="1") { ?>
	              <a class="animsition-link" href="admin.php">
	                <i class="site-menu-icon md-globe" aria-hidden="true"></i>
	                <span class="site-menu-title">Resumen Global</span>
	              </a>
				<?php } ?>
	            </li>

				
	            <li class="site-menu-item ">
				<?php if($_SESSION["resumen_sede"]=="1") { ?>
	              <a class="animsition-link" href="sede-review.php">
	                <i class="site-menu-icon md-balance" aria-hidden="true"></i>
	                <span class="site-menu-title">Resumen Sede</span>
	              </a>
				<?php } ?>
	            </li>

              </ul> 
			  <?php } ?>
            </li>
            
            <?php if($_SESSION["usuarios"]=="1") { ?>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-accounts-alt" aria-hidden="true"></i>
                <span class="site-menu-title">Usuarios</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
	            <li class="site-menu-item ">
	              <a class="animsition-link" href="search-user.php">
	                <i class="site-menu-icon md-search" aria-hidden="true"></i>
	                <span class="site-menu-title">Buscar Usuario</span>
	              </a>
	            </li>
	            
	            
	            
	            <li class="site-menu-item ">
	              <a class="animsition-link" href="new-user.php">
	                <i class="site-menu-icon md-account-add" aria-hidden="true"></i>
	                <span class="site-menu-title">Crear Usuario</span>
	              </a>
	            </li>
				
				<?php  //if($_SESSION["admin_rank"]=="Administrador") {?>
				
	            <li class="site-menu-item has-sub">
	              <a href="javascript:void(0)">
	                <i class="site-menu-icon md-file" aria-hidden="true"></i>
	                <span class="site-menu-title">Administradores</span>
	                <span class="site-menu-arrow"></span>
	              </a>
	              <ul class="site-menu-sub">
			            <li class="site-menu-item ">
			              <a class="animsition-link" href="search-admins.php">
			                <i class="site-menu-icon md-search" aria-hidden="true"></i>
			                <span class="site-menu-title">Buscar Administradores</span>
			              </a>
			            </li>
			            
			            <li class="site-menu-item ">
			              <a class="animsition-link" href="new-admin.php">
			                <i class="site-menu-icon md-plus-square" aria-hidden="true"></i>
			                <span class="site-menu-title">Crear Administrador</span>
			              </a>
			            </li>               
	              </ul>
	            </li>
	            
				<?php  //} ?>
	                
              </ul>
            </li>
            <?php  } ?>
			
				<?php  //if($_SESSION["admin_rank"]=="Administrador") {?>
				
			<?php if($_SESSION["servicios"]=="1") { ?>	
        	<li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Servicios</span>
                <span class="site-menu-arrow"></span>
              </a>
              
              <ul class="site-menu-sub">
					<li class="site-menu-item ">
		              <a class="animsition-link" href="search-servicios.php">
		                <i class="site-menu-icon md-search" aria-hidden="true"></i>
		                <span class="site-menu-title">Buscar Servicio</span>
		              </a>
		            </li>
		            	            
		            <li class="site-menu-item ">
		              <a class="animsition-link" href="new-servicio.php">
		                <i class="site-menu-icon md-plus-square" aria-hidden="true"></i>
		                <span class="site-menu-title">Nuevo Servicio</span>
		              </a>
		            </li>
				
						<?php  //if($_SESSION["admin_id"]==8) {?>
					      
				        <li class="site-menu-item ">
				          <a class="animsition-link" href="correlativos.php">
				            <i class="site-menu-icon md-account-add " aria-hidden="true"></i> <span class="site-menu-title">Auxiliares</span>
				          </a>
				        </li>
		      
								<?php //} ?>
	            
          		<li class="site-menu-item has-sub">
		            <a href="javascript:void(0)">
		              <i class="site-menu-icon md-file" aria-hidden="true"></i>
		              <span class="site-menu-title">Documentos</span> <span class="site-menu-arrow"></span>
		            </a>
		            <ul class="site-menu-sub">			            
				          <li class="site-menu-item ">
				            <a class="animsition-link" href="search-doctos-servicios.php">
				              <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i> <span class="site-menu-title">Servicios Aduanales</span>
				            </a>
				          </li>
			            <li class="site-menu-item ">
			              <a class="animsition-link" href="plantilla-documentos.php">
			                <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i> <span class="site-menu-title">Servicios Generales</span>
			              </a>
			            </li>
			            <li class="site-menu-item ">
			              <a class="animsition-link" href="search-doctos-asociados.php">
			                <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i> <span class="site-menu-title">Formulación Aduanal</span>
			              </a>
			            </li>
			            <li class="site-menu-item ">
			              <a class="animsition-link" href="search-doctos-usuario.php">
			                <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i> <span class="site-menu-title">Documentos de Usuario</span>
			              </a>
			            </li>	            
			            <li class="site-menu-item ">
			              <a class="animsition-link" href="search-tablas-asociadas.php">
			                <i class="site-menu-icon md-search-in-file" aria-hidden="true"></i> <span class="site-menu-title">Tablas Asociados</span>
			              </a>
			            </li>          
		            </ul>
	          </li>
				
				</ul>
			</li>
			<?php } ?>
				<?php //} ?>
					           
    <?php if($_SESSION["notificaciones"]=="1") { ?>
     <li class="site-menu-item has-sub">
      <a href="javascript:void(0)">
        <i class="site-menu-icon md-assignment" aria-hidden="true"></i>
        <span class="site-menu-title">Notificaciones</span>
        <span class="site-menu-arrow"></span>
      </a>
      <ul class="site-menu-sub">
      <li class="site-menu-item ">
        <a class="animsition-link" href="search-notificaciones.php">
          <i class="site-menu-icon md-search" aria-hidden="true"></i>
          <span class="site-menu-title">Buscar Notificación</span>
        </a>
      </li>
      <li class="site-menu-item ">
        <a class="animsition-link" href="new-notificacion.php">
          <i class="site-menu-icon md-assignment-o" aria-hidden="true"></i>
          <span class="site-menu-title">Nueva Notificación</span>
        </a>
      </li>
      </ul> 
    </li>
	<?php } ?>

		<?php  //if($_SESSION["admin_rank"]=="Administrador") {?>
				
         <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-border-color" aria-hidden="true"></i>
                <span class="site-menu-title">Gestiones</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
	      
							<li class="site-menu-item has-sub">
	              <a href="javascript:void(0)">
	                <i class="site-menu-icon md-truck " aria-hidden="true"></i>
	                <span class="site-menu-title">Transporte</span>
	                <span class="site-menu-arrow"></span>
	              </a>
	              <ul class="site-menu-sub">
		              <li class="site-menu-item ">
			              <a class="animsition-link" href="new-mensajeria-step.php">
			                <i class="site-menu-icon md-plus" aria-hidden="true"></i>
			                <span class="site-menu-title">Nueva Gestion</span>
			              </a>
			            </li>
			            
			            <li class="site-menu-item ">
			              <a class="animsition-link" href="search-steps-mensajeria.php">
			                <i class="site-menu-icon md-label" aria-hidden="true"></i>
			                <span class="site-menu-title">Gestiones de Envio</span>
			              </a>
			            </li>
			        	</ul>
	            </li>		

							<li class="site-menu-item has-sub">
	              <a href="javascript:void(0)">
	                <i class="site-menu-icon md-money " aria-hidden="true"></i>
	                <span class="site-menu-title">Contabilidad</span>
	                <span class="site-menu-arrow"></span>
	              </a>
	              <ul class="site-menu-sub">
		    
	
		            <li class="site-menu-item ">
		              <a class="animsition-link" href="new-contabilidad-step.php">
		                <i class="site-menu-icon md-plus" aria-hidden="true"></i>
		                <span class="site-menu-title">Nueva Gestion</span>
		              </a>
		            </li>
		            
		            <li class="site-menu-item ">
		              <a class="animsition-link" href="search-steps-contabilidad.php">
		                <i class="site-menu-icon md-money-box" aria-hidden="true"></i>
		                <span class="site-menu-title">Gestiones Contables</span>
		              </a>
		            </li>
		           
		          </ul>
	            </li>		

				
	          <li class="site-menu-item has-sub">
	              <a href="javascript:void(0)">
	                <i class="site-menu-icon md-assignment" aria-hidden="true"></i>
	                <span class="site-menu-title">Actividades</span>
	                <span class="site-menu-arrow"></span>
	              </a>
	              <ul class="site-menu-sub">
		    
	
		            <li class="site-menu-item ">
		              <a class="animsition-link" href="search-steps-servicios.php">
		                <i class="site-menu-icon md-search" aria-hidden="true"></i>
		                <span class="site-menu-title">Buscar Actividad</span>
		              </a>
		            </li>
		            
		            
		            <li class="site-menu-item ">
		              <a class="animsition-link" href="new-servicio-step.php">
		                <i class="site-menu-icon md-plus-square" aria-hidden="true"></i>
		                <span class="site-menu-title">Crear Actividad</span>
		              </a>
		            </li>
		            	                
	              </ul>
	            </li>
	
		                
				</ul>
            </li>

				<?php //} ?>

				<?php  if($_SESSION["admin_depto"]=="ADUANA") {?>
			 <li class="site-menu-item">
              <a class="animsition-link" href="search-proveedores.php">
                <i class="site-menu-icon md-boat" aria-hidden="true"></i>
                <span class="site-menu-title">Proveedores</span>
              </a>
            </li>						
            
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-codepen" aria-hidden="true"></i>
                <span class="site-menu-title">Productos</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
	    

	            <li class="site-menu-item ">
	              <a class="animsition-link" href="search-products.php">
	                <i class="site-menu-icon md-search" aria-hidden="true"></i>
	                <span class="site-menu-title">Buscar Producto</span>
	              </a>
	            </li>
	            
	            
	            <li class="site-menu-item ">
	              <a class="animsition-link" href="new-product.php">
	                <i class="site-menu-icon md-plus-square" aria-hidden="true"></i>
	                <span class="site-menu-title">Crear Producto</span>
	              </a>
	            </li>


	            <li class="site-menu-item ">
	              <a class="animsition-link" href="search-products-classify.php">
	                <i class="site-menu-icon md-search" aria-hidden="true"></i>
	                <span class="site-menu-title">Pendientes de Clasificación</span>
	              </a>
	            </li>
	            
	            
	            	            	                
              </ul>
            </li>


				<?php } ?>

			<li class="site-menu-item">
              <a href="articulos/articulos-categorias.php">
                <i class="site-menu-icon md-library" aria-hidden="true"></i>
                <span class="site-menu-title">Biblioteca</span>
                <span class="site-menu-arrow"></span>
              </a>


            
            </li>

  
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
              </ul>
            </li>
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
      <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
      </a>
    </div>
  </div>
  
  <div class="site-gridmenu">
    <div>
      <div>
        <ul>
          <li>
            <a href="admin.php">
              <i class="icon md-view-dashboard"></i>
              <span>Expedientes</span>
            </a>
          </li>

          <li>
            <a href="sede-review.php">
              <i class="icon md-balance"></i>
              <span>Resumen Sede</span>
            </a>
          </li>

		  <li>
            <a href="indicadores.php">
              <i class="icon md-traffic"></i>
              <span>Indicadores Globales</span>
            </a>
          </li>

		  <li>
            <a href="indicadores-comparativos.php">
              <i class="icon md-chart"></i>
              <span>Indicadores Comparativos</span>
            </a>
          </li>


        </ul>
      </div>
    </div>
  </div>
  