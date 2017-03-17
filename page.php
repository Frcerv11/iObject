<!DOCTYPE html>
<html>
  <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-home.css" rel="stylesheet">
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.slim.min.js"type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <title></title>
    <link rel="stylesheet" href="css/page.css">
  </head>
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
            <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
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
  <?php
    include_once("connection.php");
    // Select all items from blog post.
    $sql = "SELECT * FROM blog WHERE id = " . mysqli_real_escape_string($dbCon,$_GET['id']);
    $result = mysqli_query($dbCon,$sql);

    while ($row = mysqli_fetch_array($result)) {
      $title = $row["title"];
      $subtitle = $row["subtitle"];
      $content = $row["content"];
      $image = $row["image"];
      $timestamp = $row["ts"];
      $time = strtotime($timestamp);
   ?>
  <div class="container">
    <div id="article-cont">
      <!-- ouput row items from DB.  -->
      <div id="meta">
        <h1><?php echo $title;?></h1>
        <h2><?php echo $subtitle;?></h2>
        <?php echo '<div id="db-timestamp">' . 'Posted: ' . date('M', $time) . ' ' . date('d', $time) . ', ' . date('Y', $time) . '</div>'; ?>
        <div id="petition-button" type="button">Petition</div>
      </div>

      <div class="image-cont">
          <?php 	echo '<img id="db-image"src="data:image;base64,'.$row['image'].' ">'; ?>
      </div>
      <p><?php echo $content;?></p>
    </div>

  </div>
  <div id="petition-form">
    <div id="form-cont">
      <span id="exit-form">X</span>
      <h1>iOBJECT</h1>
      <h2>Petition Form</h2>
      <form action="page.php"method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="First name"> <br>
        <input type="text" name="subtitle" placeholder="Last name"> <br>
        <input type="text" name="subtitle" placeholder="Email"> <br>
        <input type="text" name="subtitle" placeholder="Street Address"> <br>
        <input type="text" name="subtitle" placeholder="Zip code"> <br>
        <input type="submit" name="submit" value="SIGN">
      </form>
    </div>
  </div>
  <footer class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class="row">
          <div class="col-lg-12">
           <p>Copyright &copy; iOBJECT 2016</p>
           <a href="admin.php">Admin</a>
          </div>
      </div>
  </footer>
   <?php
    }
   ?>
    <script type="text/javascript">
    $( document ).ready(function() {
      $('#petition-button').click(function() {
        $('#petition-form').css({
          "display":"block"
        })
      });
      $('#exit-form').click(function() {
        $('#petition-form').css({
          "display":"none"
        })
      });
    });



    </script>
  </body>
</html>
