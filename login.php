<?php
		require 'core.php';
		echo '<link rel="stylesheet" type="text/css" href="css/viewTable.inc.css">';
		echo '<title>vNOTIFICATION</title>';
		echo '<link rel="stylesheet" type="text/css" href="css/error.css">';

		if(isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password= $_POST['password'];
			
			//$password_hash = md5($password);
			if(!empty($username) && !empty($password)) {
				$query = "SELECT `id`,`username`,`rights` FROM `admin` WHERE `username` = '".mysql_real_escape_string($username)."' AND `password` = '".mysql_real_escape_string($password)."'";
				if($query_run = mysql_query($query)) {	
					if(mysql_num_rows($query_run)==0) {
						echo '<div id="container"><div class="error">INVALID USERNAME OR PASSWORD</div></div>';
					} else if (mysql_num_rows($query_run)==1) {
						$user_id = mysql_result($query_run,0,'id');
						$user_right = mysql_result($query_run,0,'rights');
						$user_name = mysql_result($query_run,0,'username');
						$_SESSION['user_id'] = $user_id;
						$_SESSION['user_right'] = $user_right;
						$_SESSION['user_name'] = $user_name;
						header('Location:index.php');
					} 
				}
			}
			else {

				echo '<div id="container"><div class="error">PLEASE ENTER ALL THE FIELDS</div></div>';
			}
		}
?>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<style>
	img {
		position:absolute;
		top:30%;
		left:20%;
		}
	</style>
</head>
<body>
<img src="image/vnotifications final.png" height="200px" width="200px"></img>
<form action="<?php echo $current_file; ?>" method="POST">
	<div class="animation">
	<div class='login'>
		<div class= "in_login">
			<b>USER NAME </b><input type='text' name='username'>
			<br><br>
			<b>PASS WORD </b><input type='password' name='password'><br>
			<br>
			<div align='center'><input type="submit" name="submit" value="vLogin"></div>
			<!--<a href=""><div class='button'>LOGIN!</div></a>-->
		</div>
	</div>
	</div>
</form>	
</body>