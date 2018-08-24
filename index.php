<?php 
	require 'core.php';
	require 'connect.inc.php';
	require 'function.php';

	if (loggedin()) {
		$username = getuserfield('username');
		include 'home.php';
	} else {
		include 'login.php';
	}
 ?>