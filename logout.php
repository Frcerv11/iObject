<?php
	session_start();
	session_destroy();
 ?>

<html>
	<head>
		<link rel="stylesheet" href="css/logout.css">
	</head>
	<body>
		<div id="form-cont">
			<h1>iOBJECT</h1>
			<h3>You are logged out.</h3>
			<a href="index.php">Home Page</a> | <a href="login.php">Login</a>
		</div>

	</body>
</html>
