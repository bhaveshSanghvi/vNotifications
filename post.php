<?php	
	require 'core.php';
	require 'connect.inc.php';

	require 'menubar.php';
	echo '<title>vNOTIFICATION</title>';
	echo '<link rel="stylesheet" type="text/css" href="css/viewTable.inc.css">';
	echo '<link rel="stylesheet" type="text/css" href="css/table.css">';
	echo '<link rel="stylesheet" type="text/css" href="css/error.css">';
	echo '<table align=\'center\' id="table">';
	echo '<br><br>';
	echo '<br><br><br><br>';
	echo "<caption><b>POST NOTIFICATIONS</b></caption>";

	if(isset($_POST['group']) && isset($_POST['title']) && isset($_POST['msg'])) {

		$group = $_POST['group'];
		$title = $_POST['title'];
		$msg = $_POST['msg'];
		$time = time();
		$user_id = $_SESSION['user_id'];
		$user_name= $_SESSION['user_name'];
		if(!empty($group) && !empty($title) && !empty($msg)) {
			$query = "INSERT INTO `post_temp` VALUES ('','$user_id','".mysql_real_escape_string($group)."','".mysql_real_escape_string($title)."','".mysql_real_escape_string($msg)."',CURRENT_TIMESTAMP,'$user_name')";
			if($query_run = mysql_query($query)) {
				//echo 'ok';
			} 
		}
		else {
			echo '<div id="container"><div class="error"><b>PLEASE FILL IN ALL DETAILS</b></div></div>';
		}
	}
	echo '<form action="post.php" method="POST">';
	?>
	<tr class='alt'>
		<th>POST TO</th>
		<td>
			<select name='group'>
			<?php 
				$query = "SELECT `group_name` from `groups` WHERE `user_id` = '".$_SESSION['user_id']."'";

				if($query_run = mysql_query($query)) {
					while ($query_row=mysql_fetch_assoc($query_run)){
						//$group= $query_row['group_id'];
						$group=$group_name= $query_row['group_name'];
						echo '<option value='.$group.'>'.$group_name.'</option>';
					}
				}
			?>
			</select>
		</td>
	</tr>
	<tr class='alt'>
		<th>TITLE</th>
		<td><textarea rows='2' cols='100' name='title'></textarea></td>
	</tr>
	<tr class='alt'>
		<th>COMPOSE</th>
		<td><textarea rows='10' cols='100' name='msg'></textarea></td>
	</tr>
	<tr class='alt'>
		<td class='animation' colspan='2' align='center'><input type='submit' name='submit'></td>
	</tr>
	</form>';
	</table>';
