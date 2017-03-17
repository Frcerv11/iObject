<?php
	session_start();
	include_once("connection.php");
	global $image;
	global $errorFields;
	global $cssDisplay;
	global $cssPaddingBottom;
	global $imageError;
	$cssDisplay = "none";
	$imageError = "";
	$cssPaddingBottom = 360;
	if(isset($_SESSION['username'])){
		$username = ucfirst($_SESSION['username']);
		if(isset($_POST["submit"])){

			$fields = array('title', 'subtitle', 'content');
			$error = false; //No errors yet
			foreach($fields AS $fieldname) { //Loop trough each field
			  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
			    $errorFields .= 'Field '.$fieldname.' missing!<br />'; //Display error with field
			    $error = true;
					$cssDisplay .= "block";
					$cssPaddingBottom = 430;
			  }
			}
			if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
				$image = addslashes($_FILES['image']['tmp_name']);
				$image = file_get_contents($image);
				$image = base64_encode($image);
			}else{
				$error = true;
				$imageError .= 'Image not uploaded!';
			}
			if(!$error){
				$title =  mysqli_real_escape_string($dbCon, trim($_POST["title"]));
				$subtitle = mysqli_real_escape_string($dbCon, trim($_POST["subtitle"]));
				$content = mysqli_real_escape_string($dbCon, trim($_POST["content"]));
				include_once("connection.php");
				$sql = "INSERT INTO blog (title,subtitle,content,image) VALUE ('$title','$subtitle','$content','$image')";
				$result = mysqli_query($dbCon,$sql);
				if($result){
					echo "Blog Entry Posted";
				}else{
					echo "Error: Blog entry not uploaded.";
				}
			}
		}
	}else{
		header("Location: login.php");
		die();
	}
 ?>
<html>
	<head>
		<link rel="stylesheet" href="css/admin.css">
		<title>Admin Page</title>
		<style media="screen">
			#form-cont{
				padding:20 90 <?php echo $cssPaddingBottom ?> 90;
			}

			#errorPanel{
				display: <?php echo $cssDisplay; ?>;
			}
		</style>
	</head>
	<body>
		<body>

		<div class="container">

			<div id="form-cont">
				<h1>iOBJECT</h1>
				<h2>Welcome <?php echo $username;?>!</h2>
				<div id="errorPanel">
					<?php echo $errorFields; echo $imageError;?>
				</div>
				<form action="admin.php" method="post" enctype="multipart/form-data">
					<input type="text" name="title" placeholder="Title"> <br>
					<input type="text" name="subtitle" placeholder="Subtitle"> <br>
					<h3 >Post</h3>
					<textarea name="content"></textarea> <br>
					<input type="file" name="image" ><br>
					<input type="submit" name="submit" value="Post Blog Entry">
				</form>
					<a href="index.php">View Home Page</a>|<a href="logout.php">Logout</a>
			</div>
						<footer></footer>
		</div>


		<br>
		<br>
	</body>
</html>
