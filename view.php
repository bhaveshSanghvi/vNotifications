<?php
	require 'core.php';
	require 'connect.inc.php';

	include 'menubar.php';
	echo '<title>vNOTIFICATION</title>';
	echo '<link rel="stylesheet" type="text/css" href="css/viewTable.inc.css">';	
	
	echo'<br><br>';
	echo '<br><br><br><br>';
	//echo '<div class=first_div></div>';

	$query = "SELECT `id`,`username`,`group_permission`,`title`,`msg` FROM `post`";
	echo '<table align=\'center\' id="view"	>';
	echo "<caption><b>SENT NOTIFICATIONS</b></caption>";
	echo "<tr class='first_row'><th>NAME</th><th>GROUP</th><th>TITLE</th><th>MESSAGE</th></tr>";

	if ($query_run = mysql_query($query)) {
			while ($query_row=mysql_fetch_assoc($query_run)) {
				
				$id = $query_row['id'];
				$username = $query_row['username'];
				$group = $query_row['group_permission'];
				$title = $query_row['title'];
				$message = $query_row['msg'];

				
				echo '<tr align="center" class="row_height">'; 
			
				echo '<td class="username">'.$username.'</td>';
				echo '<td class="group">'.$group.'</td>';
				echo '<td class="title">'.$title.'</td>';
				echo '<td class="message">'.$message.'</td>';
				echo '</tr>';
			}
		} 
	else {
		echo mysql_error();
	}
	echo "</table>";
	echo "<br><br><br><br>";
?>
