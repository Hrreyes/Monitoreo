<?php
//---------------------------------------------------------------------------------
//		REDIRECTS
//---------------------------------------------------------------------------------

	
	function redirect_to($location)
	{
	    if (!headers_sent($file, $line))
	    {
	        header("Location: " . $location);
	    } else {
	        printf("<script>location.href='%s';</script>", urldecode($location));
	        # or deal with the problem
	    }
	    printf('<a href="%s">Moved</a>', urlencode($location));
	    exit;
	}
	
		function redirect_to_id($location)
	{
	    if (!headers_sent($file, $line))
	    {
	        header("Location: " . $location);
	    } else {
	        printf("<script>location.href='%s';</script>", ($location));
	        # or deal with the problem
	    }
	    printf('<a href="%s">Moved</a>', urlencode($location));
	    exit;
	}

//---------------------------------------------------------------------------------
//		MYSQL QUERIES
//---------------------------------------------------------------------------------

	function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

//---------------------------------------------------------------------------------
//		MYSQL - FORM ERRORS
//---------------------------------------------------------------------------------

	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}

//---------------------------------------------------------------------------------
//		MYSQL - NAMES AUTOCOMPLETE FUNCTIONS
//---------------------------------------------------------------------------------

	function name_all_users() {
		global $connection;
		
		$query  = "SELECT name ";
		$query .= "FROM users ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	
	function name_all_patients() {
		global $connection;
		
		$query  = "SELECT paciente ";
		$query .= "FROM pacientes ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function examnames() {
		global $connection;
		
		$query  = "SELECT name ";
		$query .= "FROM examenes ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function name_all_exams() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM exams ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	


//---------------------------------------------------------------------------------
//		MYSQL - CIERRES
//---------------------------------------------------------------------------------

	function paged_cierre($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_cierre_count() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	

	function cierre_dia() {
		global $connection;
		$safe_user_name = mysqli_real_escape_string($connection, $user_name);
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE name = '{$safe_user_name}' ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function find_orders_by_day($date) {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE date_created LIKE '$date%'";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function find_orders_by_day_and_type($date,$type) {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE date_created LIKE '$date%' ";
		$query .= "AND tipopago LIKE '$type' ";
		$query .= "AND estado = 'Cancelada' ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	
	function find_orders_by_current_month($date) {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE date_created LIKE '$date%'";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
		function find_orders_by_current_week($start,$finish) {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE date_created BETWEEN '$start' AND '$finish'";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
//---------------------------------------------------------------------------------
//		MYSQL - USER FIND FUNCTIONS
//---------------------------------------------------------------------------------

	function find_id_by_name($user_name) {
		global $connection;
		$safe_user_name = mysqli_real_escape_string($connection, $user_name);
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE name = '{$safe_user_name}' ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function find_parent_by_id($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = {$safe_user_id} ";
		$query .= "LIMIT 1";
		//$query .= "ORDER BY order_id ASC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}

	function parent_id($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = {$safe_user_id} ";
		$query .= "LIMIT 1";
		//$query .= "ORDER BY order_id ASC";
		$parent_set = mysqli_query($connection, $query);
		confirm_query($parent_set);
		while($parid = mysqli_fetch_assoc($parent_set)) {
			$name=htmlspecialchars($parid["name"]);
		}			
		return $name;
	}

	function find_id_for_parent($user_name) {
		global $connection;
		$safe_user_name = mysqli_real_escape_string($connection, $user_name);
		$query  = "SELECT *";
		$query .= "FROM users ";
		$query .= "WHERE name = '{$safe_user_name}' ";
		$patient_set = mysqli_query($connection, $query);
		confirm_query($patient_set);
		while($patid = mysqli_fetch_assoc($patient_set)) {
			$parentId=htmlentities($patid["user_id"]);
		}			
		return $parentId;
	}


	function find_user_by_id($user_id) {
		global $connection;
		
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = {$safe_user_id} ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
		
	}
	
	function all_users() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "ORDER BY user_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function paged_users($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "ORDER BY user_id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_users_count() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM users ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
//---------------------------------------------------------------------------------
//		MYSQL - PATIENT FIND FUNCTIONS
//---------------------------------------------------------------------------------

	
	function find_id_for_pac($user_name) {
		global $connection;
		$safe_user_name = mysqli_real_escape_string($connection, $user_name);
		$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$query .= "WHERE paciente = '{$safe_user_name}' ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function find_patients_for_userid($user_name) {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$query .= "WHERE user_id = '{$user_name}' ";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function find_id_for_patient($user_name) {
		global $connection;
		$safe_user_name = mysqli_real_escape_string($connection, $user_name);
		$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$query .= "WHERE paciente = '{$safe_user_name}' ";
		$patient_set = mysqli_query($connection, $query);
		confirm_query($patient_set);
		while($patid = mysqli_fetch_assoc($patient_set)) {
			$patientId=htmlentities($patid["patient_id"]);
		}
		return $patientId;
	}


	function find_patient_by_id($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$query .= "WHERE patient_id = {$safe_user_id} ";
		//$query .= "ORDER BY order_id ASC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
		
	function paged_patients($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$query .= "ORDER BY patient_id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_patients_count() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
	
	function all_patients() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM pacientes ";
		$query .= "ORDER BY patient_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
//---------------------------------------------------------------------------------
//		MYSQL - EXAM FIND FUNCTIONS
//---------------------------------------------------------------------------------



	function find_price_for_exam($name) {
		global $connection;
		$safe_name = mysqli_real_escape_string($connection, $name);
		$query  = "SELECT *";
		$query .= "FROM exams ";
		$query .= "WHERE exam_name = '{$safe_name}' ";
		$exam_set = mysqli_query($connection, $query);
		confirm_query($exam_set);
		while($examprice = mysqli_fetch_assoc($exam_set)) {
			$price=htmlentities($examprice["price"]);
		}			
		return $price;
	}

	function get_order_id() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "ORDER BY order_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		while($ord = mysqli_fetch_assoc($order_set)) {
	 	$orderid= htmlentities($ord["order_id"]);
		break;
		}
    	return $orderid;
	}	
	
//---------------------------------------------------------------------------------
//		MYSQL - RESULTS FIND FUNCTIONS
//---------------------------------------------------------------------------------
	
	
	function paged_results($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE estado != 'Anulada' ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_results_count() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
	function paged_ingresar_results($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE ingresado = 0 ";
		$query .= "AND estado = 'Cancelada' ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_ingresar_results_count() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE ingresado = 0 ";
		$query .= "AND estado = 'Cancelada' ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
	function all_results() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "ORDER BY id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function aprovados_results() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE aprovado = 1 ";
		$query .= "ORDER BY id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set; 
	}

	function por_aprovar_results() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE aprovado = 0 ";
		$query .= "AND ingresado = 1 ";
		$query .= "AND estado = 'Cancelada' ";
		$query .= "ORDER BY id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set; 
	}
	

	function find_result_by_id($id) {
		global $connection;
		$safe_id = mysqli_real_escape_string($connection, $id);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE id = {$safe_id} ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function find_result_by_id_for_user($id,$user) {
		global $connection;
		$safe_id = mysqli_real_escape_string($connection, $id);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE id = {$safe_id} ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function find_approved_result($id) {
		global $connection;
		$safe_id = mysqli_real_escape_string($connection, $id);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE order_id = {$safe_id} ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		while ($row = mysqli_fetch_assoc($order_set)) {
  		$approved = $row['aprovado'];
	}
		return $approved;
	}
	

	function find_result_for_exam($name) {
		if(strlen($name)>1){
		global $connection;
		$safe_name = mysqli_real_escape_string($connection, $name);
		$query  = "SELECT *";
		$query .= "FROM exams ";
		$query .= "WHERE exam_name = '{$safe_name}' ";
		$exam_set = mysqli_query($connection, $query);
		confirm_query($exam_set);
		while($examresult = mysqli_fetch_assoc($exam_set)) {
			$refe=htmlentities($examresult["referencia"]);	
		}			
	
		if ($refe=="ESPECIAL"){
		$query  = "SELECT *";
		$query .= "FROM special_exams ";
		$query .= "WHERE name = '{$safe_name}' ";
		$exam_set = mysqli_query($connection, $query);
		confirm_query($exam_set);
		while($examspecial = mysqli_fetch_assoc($exam_set)) {
			$output=($examspecial["content"]);
			}		
		} else {
			$output="<div class=\"table-responsive\"><table class=\"table table-bordered table-hover table-striped text-center\">
                     <thead><tr><th>Examen</th><th>Resultado</th><th>Rango de Referencia</th>
                     </tr></thead><tbody><tr><td>";
			$output.=$safe_name;
			$output.="</td><td><br></td><td>";
			$output.=$refe;
			$output.="</td></tr></tbody></table></div>";
		}	
		return ($output);
	  }
	  	return null;
		
	}
	
//---------------------------------------------------------------------------------
//		MYSQL - MSG FIND FUNCTIONS
//---------------------------------------------------------------------------------

	function find_active_msg() {
		global $connection;
		$query  = "SELECT *";
		$query .= "FROM mensajes ";
		$query .= "WHERE activo = 1 ";
		$query .= "ORDER BY id DESC";
		$msg_set = mysqli_query($connection, $query);
		confirm_query($msg_set);
		return $msg_set;
	}
	
	function find_active_msgdoc() {
		global $connection;
		$query  = "SELECT *";
		$query .= "FROM mensajes_doc ";
		$query .= "WHERE activo = 1 ";
		$query .= "ORDER BY id DESC";
		$msg_set = mysqli_query($connection, $query);
		confirm_query($msg_set);
		return $msg_set;
	}
	
//---------------------------------------------------------------------------------
//		MYSQL - ORDERS FIND FUNCTIONS
//---------------------------------------------------------------------------------
	
	function find_orders_for_user($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE user_id = {$safe_user_id} ";
		$query .= "ORDER BY order_id ASC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function find_orders_for_patient($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE patient_id = {$safe_user_id} ";
		$query .= "ORDER BY order_id DESC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}	
	
	function find_last_week_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE date_created >= UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ";
//		$query .= "AND date_created < UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY) ";
		$query .= "ORDER BY order_id DESC ";
		//$query .= "LIMIT 8 ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
		function find_orders_between($begin,$finish) {
		global $connection;
		$from = UNIX_TIMESTAMP($begin);
		$to = UNIX_TIMESTAMP($finish);
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE date_created >= UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY) ";
//		$query .= "AND date_created < UNIX_TIMESTAMP(curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY) ";
		$query .= "ORDER BY order_id DESC ";
		//$query .= "LIMIT 8 ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function recent_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "ORDER BY order_id DESC ";
		$query .= "LIMIT 4";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function activa_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Activa' ";
		$query .= "ORDER BY order_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
		
	function paged_canceladas($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Cancelada' ";
		$query .= "ORDER BY order_id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_canceladas_count() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Cancelada' ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
	function cancelada_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Cancelada' ";
		$query .= "ORDER BY order_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function paged_anuladas($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Anulada' ";
		$query .= "ORDER BY order_id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_anuladas_count() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Anulada' ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
	function anulada_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Anulada' ";
		$query .= "ORDER BY order_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
		
	function pendiente_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado = 'Pendiente' ";
		$query .= "ORDER BY order_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function pendiente_pago_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE estado <> 'Cancelada' ";
		$query .= "AND estado <> 'Anulada' ";
		$query .= "ORDER BY order_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	
		function recent_20orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "ORDER BY order_id DESC ";
		$query .= "LIMIT 20";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
	function all_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "ORDER BY order_id DESC ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	

	function paged_orders_edgar($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE doctor = 'Edgar Belteton' ";
		$query .= "AND aprovado = '1' ";
		$query .= "ORDER BY order_id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
		
	function paged_orders_count_edgar() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE doctor = 'Edgar Belteton' ";
		$query .= "AND aprovado = '1' ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
	function paged_orders_count_chris() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE doctor = 'Christian Farrington' ";
		$query .= "AND aprovado = '1' ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
		function paged_orders_chris($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM resultados ";
		$query .= "WHERE doctor = 'Christian Farrington' ";
		$query .= "AND aprovado = '1' ";
		$query .= "ORDER BY order_id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}

	

		function paged_orders($start_from,$howmany) {
		global $connection;
		$safe_start = mysqli_real_escape_string($connection, $start_from);
		$safe_many = mysqli_real_escape_string($connection, $howmany);
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "ORDER BY order_id DESC ";
		$query .= "LIMIT {$start_from}, {$safe_many}";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		return $package_set;
	}
	
	function paged_orders_count() {
		global $connection;
     	$query  = "SELECT * ";
		$query .= "FROM orders ";
		$package_set = mysqli_query($connection, $query);
		confirm_query($package_set);
		$row_cnt = mysqli_num_rows($package_set);		
    	return $row_cnt;

	}
	
	function find_order_by_id($order_id) {
		global $connection;
		$safe_order_id = mysqli_real_escape_string($connection, $order_id);
	//	$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE  order_id = {$safe_order_id} ";
	//	$query .= "AND user_id = {$safe_user_id} ";
		$query .= "LIMIT 1";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}

	function find_orders() {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "ORDER BY order_id ASC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
//---------------------------------------------------------------------------------
//		MYSQL - ACCOUNT FIND FUNCTIONS
//---------------------------------------------------------------------------------
	
	function find_all_admins() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "ORDER BY username ASC";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;
	}
	
	function find_all_users() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "ORDER BY username ASC";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function get_user_info($user_id) {
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = {$safe_user_id} ";
		//$query .= "ORDER BY order_id ASC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}
	
//---------------------------------------------------------------------------------
//						ACCOUNT FUNCTIONS
//---------------------------------------------------------------------------------
	
	
	function find_admin_name_by_id($id) {
		global $connection;
		
		$safe_id = mysqli_real_escape_string($connection, $id);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE id = '{$safe_id}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		while($order = mysqli_fetch_assoc($admin_set)) {	
		$admin_name=htmlspecialchars(($order["firstname"]));
		$admin_last=htmlspecialchars(($order["lastname"]));
		$admin=$admin_name." ".$admin_last;
		}
		return $admin;	
	}
	
		function find_admin_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

	function find_user_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE email = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}
	

//---------------------------------------------------------------------------------
//						LOGIN FUNCTIONS
//---------------------------------------------------------------------------------

	function password_encrypt($password) {
  	$hash_format = "$2y$10$";   				// Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 						// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}
	
	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}
	
	function attempt_user_login($username, $password) {
		$user = find_user_by_username($username);
		if ($user) {
			// found user, now check password
			if (password_check($password, $user["hashed_password"])) {
				// password matches
				return $user;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function adm_logged_in() {
		if($_SESSION['rank']=="adm"){
		return true;
		} else {
			return false;
		} 
	}
	
	function doc_logged_in() {
		if($_SESSION['rank']=="doc"){
		return true;
		} else {
			return false;
		} 
	}
	
	function rec_logged_in() {
		if($_SESSION['rank']=="rec"){
		return true;
		} else {
			return false;
		} 
	}
	
	function admin_logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_rec_logged_in() {
		if (!rec_logged_in()) {
			redirect_to("login.php");
		}
	}
	
	function confirm_admin_logged_in() {
		if (!adm_logged_in()) {
			redirect_to("login.php");
		}
	}
	function confirm_doc_logged_in() {
		if (!doc_logged_in()) {
			redirect_to("login.php");
		}
	}
	function confirm_logged_in() {
		if (!admin_logged_in()) {
			redirect_to("login.php");
		}
	}
	
	function confirm_user_logged_in() {
		if (!logged_in()) {
			redirect_to("userlogin.php");
		}
	}


?>

