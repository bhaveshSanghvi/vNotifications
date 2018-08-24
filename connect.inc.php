<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'vnotification';

	if(!@mysql_connect($host,$user,$pass) || !@mysql_select_db($db)) {
		die($conn_error);
	}
?>