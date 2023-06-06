<?php  
	echo "Welcome <br>";
	 
	$attributes = get_user_menu_access(); 

	while($db_var = mysqli_fetch_assoc($attributes)) { 				
		$id 						= $db_var["id"];	 				/*

		$requerimiento 	= $db_var["requerimiento"];	 				
		$expedientes 		= $db_var["expedientes"];	 				
		$resumen_global = $db_var["resumen_global"];			
		$resumen_sede 	= $db_var["resumen_sede"];	
*/
		echo "ID : $id<br>";
	}	



	echo "Requerimientos : $requerimiento";
	// $requerimiento = $attributes["requerimiento"];
	// if (requerimiento == "1") { 
	
	// echo "el acceso a requerimiento es 1";
	
	// }
?>
	