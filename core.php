<?php 
	ob_start();
	@session_start();
	$current_file = $_SERVER['SCRIPT_NAME'];
	@$http_r = $_SERVER['HTTP_REFERER'];
?>