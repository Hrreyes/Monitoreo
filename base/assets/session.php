<?php 
       
 //   session_save_path("/home/users/web/b806/moo.perceptioavenuecom/cgi-bin/tmp"); // path of the directory used to save session data.

    session_start(); 

	function message() {
		if (isset($_SESSION["message"])) {
			$output = "<div class=\"animated tada\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			
			// clear message after use
			$_SESSION["message"] = null;
			
			return $output;
		}
	}

	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			
			// clear message after use
			$_SESSION["errors"] = null;
			
			return $errors;
		}
	}
	
?>