<?php
	require 'core.php';
	require 'connect.inc.php';

	include 'menubar.php';
	echo '<title>vNOTIFICATION</title>';
	//echo '<link rel="stylesheet" type="text/css" href="css/button.inc.css">';
	echo '
		<style>
	input.button {
	display:block;
	width:70px;
	font-weight:bold;
	color:#FFFFFF;
	background-color:darkolivegreen;
	text-align:center;
	padding:4px;	
}
		</style>
	';
	echo '<link rel="stylesheet" type="text/css" href="css/viewTable.inc.css">';	
	echo'<br><br>';
	echo '<br><br><br><br>';
	//echo '<div class=first_div></div>';

	if(isset($_POST['send'])) {
		$id = $_POST['send'];
		$query3 = "SELECT `id`,`username`,`group_permission`,`title`,`msg` FROM `post_temp` WHERE `id`='$id'";

		if($query3_run = mysql_query($query3)) {
			$query3_row=mysql_fetch_assoc($query3_run);
			$username = $query3_row['username'];
			$group = $query3_row['group_permission'];
			$title = $query3_row['title'];
			$message = $query3_row['msg'];
			$user_id =  $_SESSION['user_id'];
			$query4 = mysql_query("INSERT INTO `post` VALUES('','$username','".mysql_real_escape_string($title)."','".mysql_real_escape_string($group)."','".mysql_real_escape_string($message)."',CURRENT_TIMESTAMP,'$user_id')");
			$query5 = mysql_query("DELETE FROM `post_temp` WHERE `id` = '$id'");
		}
	}
	if(isset($_POST['discard'])) {
		$id = $_POST['discard'];
		$query2 = mysql_query("DELETE FROM `post_temp` WHERE `id` = '$id'");
	}
	$query = "SELECT `id`,`username`,`group_permission`,`title`,`msg` FROM `post_temp`";
	echo '<table align=\'center\' id="view"	>';
	echo "<caption><b>PENDING NOTIFICATIONS</b></caption>";
	echo "<tr class='first_row'><th>NAME</th><th>GROUP</th><th>TITLE</th><th>MESSAGE</th><th>SEND</th><th>DISCARD</th><th>SUBMIT</th></tr>";


	if ($query_run = mysql_query($query)) {
			while ($query_row=mysql_fetch_assoc($query_run)) {
				
				$id = $query_row['id'];
				$username = $query_row['username'];
				$group = $query_row['group_permission'];
				$title = $query_row['title'];
				$message = $query_row['msg'];
				$send = $discard = $id;
				echo '<form action="moderate.php" method="POST">';
				echo '<tr align="center">';
				echo '<td class="username">'.$username.'</td>';
				echo '<td class="group">'.$group.'</td>';
				echo '<td class="title">'.$title.'</td>';
				echo '<td class="message">'.$message.'</td>';
				//echo '<td class="decision"><input type="submit" name="'.$send.'" value="send"><br><input type="submit" name="'.$discard.'" value="discard"></td>';
				  echo '<td class="decision"><input type="checkbox" name="send" value="'.$id.'"></td>';echo '<td class="decision"><input type="checkbox" name="discard" value="'.$id.'"></td>';
				echo'<td class="decision"><input type="submit" name="submit" value="submit" class="button"></td>';//<br><input type="submit" name="discard" value="discard"></td>';
				echo '</tr>';
				echo '</form>';
			}

			//if(isset($))
			// if discard then do $query2 = "DELETE FROM `post_temp` WHERE `id` = id
			// if send then do $query3 = "INSERT INTO `post` VALUES('','$user_id','".mysql_real_escape_string($group)."','".mysql_real_escape_string($title)."','".mysql_real_escape_string($msg)."',CURRENT_TIMESTAMP,'$user_name')";
		} 

	echo "</table>";
	echo "<br><br><br><br>";


?>
