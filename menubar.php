<html>
<body>
	
	<link rel="stylesheet" type="text/css" href="css/menubar.css">
	<link rel="stylesheet" type="text/css" href="css/viewTable.inc.css">
</body>
<div class="animation">
<div class="list">
	<ul>
		<li><a href="home.php">HOME</a></li>
		<li><a href="post.php">POST</a></li>
		<li><a href="view.php">VIEW</a></li>
		<?php if($_SESSION['user_right'] == 0) { echo '<li><a href="moderate.php">MODERATE</a></li>';} ?>
		<li><a href="logout.php">LOGOUT</a></li>
	</ul>
</div>
</div>
</html>	