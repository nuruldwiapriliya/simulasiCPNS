<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header("Location: index.php");
}

$t_query = mysqli_query($conn,"SELECT * FROM testimoni ts inner join profile usr on ts.sender = usr.userid");
$results = mysqli_fetch_all($t_query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Portal Online Simulasi CPNS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="home.php">Simulasi CPNS</a>
        </div>
        <ul class="nav navbar-nav">
          <li  ><a href="home.php" class="fas fa-home"> Beranda</a></li>
          <li><a href="studentHome.php" class="fas fa-question"> Simulasi</a></li>
          <li><a href="studentResults.php" class="fas fa-poll"> Hasil Simulasi</a></li>
          <li><a href="forum.php" class="fas fa-users"> Forum</a></li>
          <li><a href="studentInformations.php" class="fas fa-info-circle"> Informasi</a></li>
          <li class="active"><a href="testimoni.php" class="fas fa-comments"> Testimoni</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="studentProfile.php"><span class="fas fa-user"></span> Profil</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <h2 align="center">Testimoni Pengguna Website</h2><br>
          <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">

                        <!-- Bootstrap inner [slides]-->
                        <div class="carousel-inner px-5 pb-4">

                        <?php foreach ($results as $result){?>
                            <!-- Carousel slide-->
                            <div class="carousel-item active">
                                <div class="media">
                                    <div class="media-body ml-3">
                                        <blockquote class="blockquote border-0 p-0">
                                            <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i><?php echo $result['message'];?></p>
                                            <footer class="blockquote-footer"><?php echo $result['name'];?>
                                                <!--<cite title="Source Title">Source Title</cite>-->
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
    </div>
  </body>
</html>








