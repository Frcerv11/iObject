<?php 
	session_start(); 
	include_once("connection.php");
	$ID = $_POST['user'];
	$Password = $_POST['pass'];
	if(isset($_POST['submit'])){
		if(!empty($_POST['user'])){ 
			$query = mysqli_query($dbCon,"SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysqli_error()); 
			$row = mysqli_fetch_array($query); 
			if(!empty($row['userName']) AND !empty($row['pass'])) { 
				$_SESSION['userName'] = $row['pass']; 
				echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
			} 
			else { 
				echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
			} 
		}
	}
?>
<html>
	<head></head>
	<body>
		 <div class="container">
			<form method="POST" action="login_test.php"> 
				User <br><input type="text" name="user" size="40"><br> 
				Password <br><input type="password" name="pass" size="40"><br> 
				<input id="button" type="submit" name="submit" value="Log-In"> 
			</form>
		 </div>
	</body>
</html>