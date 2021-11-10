<?php 
	session_start();

	include_once("Controller/router.php");
	include_once("Model/dbConnect.php");
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
	<title>My project</title>
	<link rel="stylesheet" type="text/css" href="Assets/style.css">
	<script type="text/javascript" src="Assets/jquery-3.4.1.js"></script>
</head>
<body>
	<header>
		<div class="menu">
		<a href="?page=home"><img src="Img/logo.PNG"></a>
		<a href="?page=post">Posts</a>
		<?php echo (isset($_SESSION['nickname'])) ? '<a href="?page=me">
		Profile(' . $_SESSION['nickname'] . ')</a><a href="?page=signout"> 
		Signout </a>' : '<a href="?page=login"> Login </a><a href="?page=register"> Register </a>' ?>
		</div>
	</header>
	<div class="container">
	<?php
	$Route = new Route();

	$page = (isset($_GET["page"])) ? $_GET["page"] : "";
	$Route->allRoute($page);
	var_dump($_SESSION);
	?>
	</div>
</body>
</html>



