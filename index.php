<html>
	<head>
		<title>Simple Blog</title>
		<link rel="stylesheet" href="css/style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/blog-home.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	</head>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		.h1,
		.h2,
		.h3,
		.h4,
		.h5,
		.h6 {
			font-family: 'Open Sans', sans-serif;
		}
		p,h1,h2{
			--x-height-multiplier: 0.35;
			--baseline-multiplier: 0.179;
			letter-spacing: .01rem;
			font-weight: 400;
			font-style: normal;
			line-height: 1.58;
			letter-spacing: -.003em;
		}
		body{
			padding-top:0px !important;
		}
	</style>
	<body>
		<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">iOBJECT</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
	      </ul>
	      <form class="navbar-form navbar-right">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
		<div class="jumbotron">
			<div class="overlay">

			<div class="container">
				<h1 class="page-header">
						iOBJECT
						<small>Petition bills in the 21st Century</small>
				</h1>
			</div>
						</div>
		</div>
		<div id="sub-line">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
		<div class="container">
			<?php
				include_once("connection.php");
				// Select all items from blog post.
				$sql = "SELECT * FROM blog ORDER BY id DESC;";
				$result = mysqli_query($dbCon,$sql);

				//loop through info in DB
				while ($row = mysqli_fetch_array($result)) {
					$title = $row["title"];
					$subtitle = $row["subtitle"];
					$content = $row["content"];
					$image = $row["image"];
					$timestamp = $row["ts"];
					$time = strtotime($timestamp);
			 ?>

			 	<div class="row" id="article">
 					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
 							<div id="meta" class="lead">
 									<a id="author" href="index.php">Frank</a>
									<p><?php echo 'Posted on: ' . date('M', $time) . ' ' . date('d', $time) . ', ' . date('Y', $time); ?></p>
 							</div>
							<div id="content">
									<img class="img-fluid" alt="Responsive image" src="<?php 	echo 'data:image;base64,'.$row['image']; ?>"alt="">
								<h2 id="title">
										<?php  echo '<a href="page.php?id='.$row['id'].'">'.$row['title'].'</a>'; ?>
								</h2>
	 							<p id="subtitle"><?php echo $subtitle;?></p>
								<?php  echo '<a id="more"href="page.php?id='.$row['id'].'">'.'Read more'.'<span class="glyphicon glyphicon-chevron-right"></span>' .'</a>'; ?>
							</div>
 						</div>
				</div>
				<hr>
		 <?php
		 	}
		 ?>
	 </div>
	 <footer class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			 <div class="row">
					 <div class="col-lg-12">
						<p>Copyright &copy; iOBJECT 2016</p>
						<a href="admin.php">Admin</a>
					 </div>
			 </div>
	 </footer>
	</body>
</html>

<!-- SELECT image FROM images WHERE img_id IN ( SELECT img_id FROM blog WHERE
img_id IN (SELECT MAX(img_id) FROM blog)) -->
