<?php
	// initialize session
	//	session_start();

	// To check if session is started.
	$location = "login.php";
	/*if(isset($_SESSION["user"])){		
		if((time() - $_SESSION["login_time_stamp"]) > 90000000){
			session_unset();
			$_SESSION = array();
			unset($_SESSION['user'],$_SESSION['access']);
			session_destroy();
			if (!headers_sent()) {
				header('Location: ' . $location);
				die();
			} else {
				echo '<script type="text/javascript">';
				echo 'window.location.href="' . $location . '";';
				echo '</script>';
				echo '<noscript>';
				echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
				echo '</noscript>';
				die();
			}
		}
	}else{
		if (!headers_sent()) {
			header('Location: ' . $location);
			die();
		} else {
			echo '<script type="text/javascript">';
			echo 'window.location.href="' . $location . '";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
			echo '</noscript>';
			die();
		}
	}*/
?>