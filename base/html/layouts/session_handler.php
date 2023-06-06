<?php
    //-----------------------------------------------------------------------------------------------
    //ADDED BY DSCA 22/01/2020: 
    //-----------------------------------------------------------------------------------------------
    // 1) verifica si el usuario y sesion ya estan registradas en la BD
	// 2) si no coinciden los registros con ambos criterios:
	//    2.1) obtiene el numero de sesiones concurrentes disponibles para el usuario
	//    2.2) obtiene el numero de conexiones activas para el usuario
	//    2.3) calcula a - b = r
	//    	2.3.1)  si r es mayor a 0, crea nueva sesion; si no, envia a la pagina de administracion
	//				de sesiones para ofrecer la oportunidad de cerrar una...
	//
    //-----------------------------------------------------------------------------------------------
	
	//set timezone to Guatemala
	date_default_timezone_set("America/Guatemala");

	//get the user id on a local variable to pass on to the functions...
    $usrid = $_SESSION["admin_id"];

    //obtengamos el nombre de la ultima pagina visitada...
    $_SESSION['page'] = $_SERVER['HTTP_REFERER'];
	//echo '<script type="text/javascript">alert("ultima pagina visitada: '. $_SESSION['page'] . '.")</script>';

    //actualizamos la bitacora de navegacion... no hay necesidad de pasar la direccion de la pagina pues
    //ya la estamos guardando en una variable de sesion...
    update_admin_trace($usrid,'');

    //siempre actualizamos el last used...
    update_last_used($usrid,session_id());

	// ========================================================================================================
	//BLOQUEO DE CUENTA
	// ========================================================================================================
	$cuenta_bloqueada = get_disabled_users($usrid);

	while($db_var = mysqli_fetch_assoc($cuenta_bloqueada)) { 

	  $estado_bloqueado = $db_var["blocked"]; 

		//echo '<script type="text/javascript">alert("estado de bloqueo: '. $estado_bloqueado . '")</script>';

	  if ($estado_bloqueado == '1')  {
		//TIENE ESTADO BLOQUEADO, saquemoslo a la hoja de login bloqueado...
		redirect_to("../pages/login-blq.php");
		}
	}

	// }
// =============================================================================================================

	//0) determinamos si se trata de mi sesion.... si es mi sesion no hago nada...
	$my_session_number = session_id();
	//echo '<script type="text/javascript">alert("esta sesion: '. $my_session_number . '")</script>';
		 
	$my_session = is_my_session($usrid, $my_session_number);

	while($result = mysqli_fetch_assoc($my_session)) { 

	  $mi_session_activa = $result["TTL"];
	  //echo '<script type="text/javascript">alert("es mi sesion la que esta activa? (0=no, 1=si) ' . $mi_session_activa . '")</script>';

	  	//no existe registro de sesion en la BD para mi sesion.... 
	  	if ($mi_session_activa == '0') {

	  		//---------------------------------------------------------------------------------------------------
	  		//si no tengo sesion activa y mi sesion no fue cerrada por otro usuario con mi cuenta..
	  		//de lo contrario, mandarlo a la pagina de login de una vez... 
	  		//en el futuro, se deberia poder "inabilitar el login desde ese browser/maquina por XXX tiempo"
	  		//---------------------------------------------------------------------------------------------------

	  			//no se encontro esta session registrada... quedan aun sesiones para este usuario disponibles?
	  		    //1) obtiene el numero de sesiones concurrentes permitidas:
	  			//echo '<script type="text/javascript">alert("obteniendo numero de sesiones que tiene permitidas este usuario...")</script>';
	  			//a) cuantas sesiones tiene permitidas mi usuario?
    			$db_var = get_allowed_concurrent_sessions($usrid);

			    while($result = mysqli_fetch_assoc($db_var)) { 

			      $numero_permitido = $result["maximum_sessions_allowed"];
			      //echo '<script type="text/javascript">alert("numero de sesiones permitidas : '. $numero_permitido .'")</script>';        
			     }


			    //2) contamos las sesiones que tengo activas en la BD
	  			//echo '<script type="text/javascript">alert("obteniendo numero de sesiones activas registradas en este momento en base de datos por este usuario...")</script>';		

	  		    $count_sessions = check_active_sessions($usrid);

			    while($result = mysqli_fetch_assoc($count_sessions)) { 

			      $sessiones_activas = $result["TTL"];
			       
			    }

			    // determinamos cuantas nos quedan y decidimos
				$remaining_sessions = ($numero_permitido - $sessiones_activas);
			 	//echo '<script type="text/javascript">alert("quedan ' . $remaining_sessions . ' sesiones por activar para este usuario.")</script>';

			    	if ($remaining_sessions == '0') {
			    		//no quedan... vamos a la pagina de manejador de sesiones...
						redirect_to("active_session.php");

			        } else {
			            //si quedan... abramos una nueva sesion para mi usuario...
				        // echo '<script type="text/javascript">alert("aun podemos iniciar sesiones con este usuario. creando una nueva ...")</script>';
				        $myIP = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
			            //$myIP = getrealIP();
			        	//$myIP = getUserIpAddr();
			            save_new_session($usrid, $myIP);
		   
		  			}



	  	} else {

			//redirect_to("active_session.php");

		}
		break;
	}


   //----------------------------------------------------------------------------



?>