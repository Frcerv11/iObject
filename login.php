<?php

	session_start();
	$output = "";
	if(isset($_POST["submit"])){
		//Admin login info
		$dbUserName = "admin";
		$dbPassword = "password";


		//Retrieve data from form and store in variables

		//strip_tags: Strip html,php tags from string
		//strtolower: Make string lowercase
		$username = strip_tags($_POST["username"]);
		$username = strtolower($username);
		$password = strip_tags($_POST["password"]);

		//If username and password input corrret
		if($username == $dbUserName && $password == $dbPassword){
			$_SESSION["username"] = $username;
			//Send admin to admin.php
			header("Location: admin.php");
		}else{
			$output .= "Wrong username or password.";
		}
	}
 ?>

<html>
	<head>
		<title>Login:Webapp</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="container">
			<div id="form-cont">
				<h1>iOBJECT</h1>
				<h2>Admin Login</h2>
				<form action="login.php" method="post">
					<input type="text" name="username" placeholder="Username"/><br>
					<input type="password" name="password" placeholder="Password"/><br>
					<input type="submit" name="submit" value="Login">
				</form>
				<?php echo $output ?>
			</div>
			<footer></footer>
		</div>
	</body>
</html>
