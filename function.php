<?php 
	
	function loggedin() {
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) return true;
		else return false;
	}

	function getuserfield($field) {
		$query = "SELECT `$field` FROM `admin` WHERE `id`='".$_SESSION['user_id']."'";
		if($query_run=mysql_query($query)) {
			return mysql_result($query_run,0,$field);
		}
	}
 ?>