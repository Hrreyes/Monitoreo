<?php	

	
	//funciones del controlador_web

	//ingreso usuario 
	function ingresoUsuario($connection,$usuario,/*$clave*/){
		global $connection;
		$query = "SELECT id,nombres,apellidos,id_rol,usuario,clave 
		FROM usuario WHERE usuario='$usuario'";
		$result = mysqli_query($connection, $query);
		return $result;
	}

	function ingresoPass($connection,$usuario){
		global $connection;
		$query = "SELECT id,nombres,apellidos,id_rol,usuario,clave 
		FROM usuario WHERE usuario='$usuario'";
		$result = mysqli_query($connection, $query);
		return $result;
	}


		//menu personalizado por usuario
		function obtener_menu($id_rol){
			global $connection;
			$query ="SELECT me.id,me.menu,me.url,mr.id,mr.id_menu,mr.id_rol_usuario
			FROM menu AS me
			INNER JOIN menu_rol AS mr
			ON me.id = mr.id_menu 
			WHERE mr.id_rol_usuario=$id_rol
			AND me.activo=1";
			$result = mysqli_query($connection,$query);
			$menu = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $menu;
			
		}

		function obtener_paginas(){
			global $connection;
			$query="SELECT * FROM paginas
			WHERE activo=1";
			$result=mysqli_query($connection,$query);
			$paginas=mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $paginas;

		}

		//// crear pagina == guardar usuario///
		function guardar_pagina($url,$nombre,$tiempo,$creado_por,$actualizado_por){
		global $connection;
		$query =("INSERT INTO paginas(
			`url`,
			nombre,
			tiempo_revision_pagina,
			id_creado_por,
			id_actualizado_por			
		)VALUES(
			'$url',
  			'$nombre',
  			'$tiempo',
			'$creado_por',
			'$actualizado_por')"
			);
			
			mysqli_query($connection,$query);
		
	}

	//obtener roles para el select asignar rol
	function obtener_rol(){
		global $connection;
		$query = "SELECT id,roles FROM rol_usuario";
		$result = mysqli_query($connection,$query);
		$rol = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $rol;
	}

			//// crear usuario == guardar usuario///
	function crear_usuario($nombres,$apellidos,$correo,$usuario,$contrasena,$seleccionar_rol){
		global $connection;
		$query =("INSERT INTO usuario(
			nombres,
			apellidos,
			correo,
			usuario,
			clave,
			id_rol			
		)VALUES(
			'$nombres',
  			'$apellidos',
  			'$correo',
			'$usuario',
			'$contrasena',
			'$seleccionar_rol')"
			);
			
			mysqli_query($connection,$query);
		
	}

		//obtener usuarios para lista
		function lista_usuarios(){
			global $connection;
			$query = "SELECT us.id,us.usuario,ru.roles,us.nombres,us.apellidos,
			us.correo,us.id_rol,us.activo
			FROM usuario AS us
			INNER JOIN rol_usuario AS ru
			ON us.id_rol=ru.id
			WHERE us.activo=1";
			$result = mysqli_query($connection,$query);
			$usuario_aplicacion = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $usuario_aplicacion;
		}

		//obtener usuarios para editar informacion 
	function editar_usuarios($id_usuario){
		global $connection;
		$query = "SELECT us.id,us.usuario,ru.roles,us.nombres,us.apellidos,
		us.correo,us.id_rol,us.activo
		FROM usuario AS us
		INNER JOIN rol_usuario AS ru
		ON us.id_rol=ru.id
		WHERE us.activo=1
		AND us.id=$id_usuario";
		$result = mysqli_query($connection,$query);
		$usuario = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $usuario;
	}


	//obtener datos de pagina para  actualizacion
	function obtener_datos_pagina($id_pag){
		global $connection;
		$query ="SELECT * FROM paginas
		WHERE activo=1 AND id=8";
		$result = mysqli_query($connection,$query);
		$ticket = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $ticket;

	}

	//actualizar datos MYSQL QUERY
	function actualizar_pagina($url,$nombre_pagina,$tiempo,$creado_por,$actualizado_por,$id_pagina_web){
		global $connection;
		$query ="UPDATE paginas SET
		`url`='$url',
		nombre='$nombre_pagina',
		tiempo_revision_pagina='$tiempo',
		id_creado_por='$creado_por',
		id_actualizado_por='$actualizado_por'
		WHERE id='$id_pagina_web'";
		mysqli_query($connection,$query);
		//return $result;

	}

	////  == guardar aplicaciones nuevas///
	function encargado_pagina($id_usuario,$id_paginas){
		global $connection;
		$query =("INSERT INTO notificaciones(
			id_paginas,
			id_usuario			
		)VALUES(
			'$id_usuario',
  			'$id_paginas')"
			);
			
		mysqli_query($connection,$query);
		
	}

		//obtener pagina para lista
	function lista_asignaciones(){
		global $connection;
		$query = "SELECT nt.id,nt.id_paginas,nt.id_usuario,nt.estado,nt.mensaje,us.usuario,pg.url,pg.nombre
		FROM  notificaciones AS nt
		INNER JOIN usuario AS us
		ON nt.id_usuario=us.id
		INNER JOIN paginas AS pg
		ON nt.id_paginas=pg.id
		WHERE nt.activo=1";
		$result = mysqli_query($connection,$query);
		$lista_paginas = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $lista_paginas;
	}

	//actualizar datos MYSQL QUERY asignaciones
	function actualizar_asignaciones($guardar_pagina,$guardar_usuario,$id_asignacion){
		global $connection;
		$query ="UPDATE notificaciones SET
		id_paginas='$guardar_pagina',
		id_usuario='$guardar_usuario'
		WHERE id='$id_asignacion'";
		mysqli_query($connection,$query);
		//print_r($guardar_usuario);
		//die();
		//return $result;

	}

		//obtener usuarios para editar informacion 
		function editar_asignacion($id_actualizar){
			global $connection;
			$query = "SELECT nt.id,nt.id_paginas,nt.id_usuario,nt.estado,nt.mensaje,us.usuario,pg.url,pg.nombre
			FROM  notificaciones AS nt
			INNER JOIN usuario AS us
			ON nt.id_usuario=us.id
			INNER JOIN paginas AS pg
			ON nt.id_paginas=pg.id
			WHERE nt.activo=1
			AND nt.id=$id_actualizar";
			$result = mysqli_query($connection,$query);
			$usuario_aplicacion = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $usuario_aplicacion;
		}

		function eliminar($id_asignacion){
			global $connection;
			$query = "DELETE FROM notificaciones 
			WHERE id_paginas = $id_asignacion";
			mysqli_query($connection,$query);
		}

	
		function obtener_usuario_notificaciones($id){
			global $connection;
			$query= "SELECT id_usuario from notificaciones
			WHERE id_paginas = $id";
			$result = mysqli_query($connection,$query);
			$rows=array();
			while ($row=mysqli_fetch_array($result)) {
				$rows[]=$row['id_usuario'];
			}
			//$modelo = $result->fetch_row(); //$result->fetch_array(MYSQLI_ASSOC);
			//$modelo= mysqli_fetch_all($result,MYSQLI_ASSOC);
			print_r($rows);
			//die();
			return $rows;
		
		}

		function bitacora($error,$id){
			global $connection;
			$query=("INSERT INTO bitacora(
			codigo,
			id_paginas			
			)VALUES(
			'$error',
			'$id')"
			);
						
			mysqli_query($connection,$query);

		}

		
	

	//obtener nombre para el usuaria crea ticket
	function obtener_Nombre(){
		global $connection;
		$query = "SELECT id,nombres,apellidos 
		 FROM usuario where usuario= '$_SESSION[usuario]'";
		$result = mysqli_query($connection,$query);
		$nombres = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $nombres;
		
	}

	

	//obtener ultima id de ticket para anexar imagenes
	function ultima_id(){
		global $connection;
		$query = "SELECT max(id) as id FROM ticket";
		$result = mysqli_query($connection,$query);
		$estatus = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $estatus;
	}


	//obtener roles para el select asignar rol
	function obtener_roles(){
		global $connection;
		$query = "SELECT id,roles FROM roles_usuarios";
		$result = mysqli_query($connection,$query);
		$rol = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $rol;
	}


	//obtener datos bitacora
	function obtener_datos_bitacora(){
		global $connection;
		$query = "SELECT bi.id,bi.id_paginas,bi.codigo,bi.fecha,pg.id,pg.url,pg.nombre,pg.tiempo_revision_pagina
		FROM bitacora AS bi
		INNER JOIN paginas AS pg
		ON bi.id_paginas=pg.id
		WHERE bi.fecha =(SELECT MAX(bi.fecha))
		ORDER BY bi.id 
		DESC LIMIT 1000";
		$result = mysqli_query($connection,$query);
		$bitacora = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $bitacora;
	}

	


	

	

	


	

	

	//// crear usuario == guardar usuario///
	function guardar_usuario($nombres,$apellidos,$correo,$clave,$guardar_rol,$usuario){
		global $connection;
		$query =("INSERT INTO usuario(
			nombres,
			apellidos,
			correo,
			contraseña,
			id_rol,
			usuario
		)VALUES(
			'$nombres',
  			'$apellidos',
  			'$correo',
			'$clave',
			'$guardar_rol',
			'$usuario')"
			);
			
			mysqli_query($connection,$query);
		
	}

	
	
	//guardar roles crear roles
	function guardar_rol($roles){
		global $connection;
		$query =("INSERT INTO roles_usuarios(
			roles	
		)VALUES(
  			'$roles')"
			);
				
			mysqli_query($connection,$query);
		
	}

	//guardar aplicacion crear aplicacion
	function guardar_aplicacion($aplicacion){
		global $connection;
		$query =("INSERT INTO aplicacion(
			aplicaciones	
		)VALUES(
  			'$aplicacion')"
			);
				
			mysqli_query($connection,$query);
		
	}

	//obtener ultima id de user asignar usuario
	function ultima_id_user(){
		global $connection;
		$query = "SELECT max(id) as id FROM usuario";
		$result = mysqli_query($connection,$query);
		$ultimaid = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $ultimaid;
	}

	//obtener usuarios para asignar aplicaciones del select asignar aplicacion
	function obtener_usuarios(){
		global $connection;
		$query = "SELECT us.id,us.usuario,ru.roles,us.nombres,us.apellidos,
		us.correo,us.id_rol,us.activo
		FROM usuario AS us
		INNER JOIN roles_usuarios AS ru
		ON us.id_rol=ru.id
		WHERE us.activo=1";
		$result = mysqli_query($connection,$query);
		$usuario_aplicacion = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $usuario_aplicacion;
	}

	

	//actualizar datos de usuario en  MYSQL QUERY
	function actualizar_usuario($nombres,$apellidos,$correo,$guardar_rol,
		$usuario,$estatus_user,$id_usuario,$clave){
		global $connection;
		$query ="UPDATE usuario SET
		nombres='$nombres',
		apellidos='$apellidos',
		correo='$correo',
		id_rol='$guardar_rol',
		usuario='$usuario',
		clave='$clave',
		activo='$estatus_user'
		WHERE id='$id_usuario'";
		mysqli_query($connection,$query);
		//return $result;

	}












	

	
	
	
	
	






	