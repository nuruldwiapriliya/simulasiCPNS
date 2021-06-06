<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header("Location: index.php");
}
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
          <li ><a href="home.php" class="fas fa-home"> Beranda</a></li>
          <li><a href="studentHome.php" class="fas fa-question"> Simulasi</a></li>
          <li><a href="studentResults.php" class="fas fa-poll"> Hasil Simulasi</a></li>
          <li><a href="forum.php" class="fas fa-users"> Forum</a></li>
          <li class="active"><a href="studentInformations.php" class="fas fa-info-circle"> Informasi</a></li>
          <li><a href="testimoni.php" class="fas fa-comments"> Testimoni</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="studentProfile.php"><span class="fas fa-user"></span> Profil</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Informasi!</h4>
        <hr>
        <p align="justify">Selamat Datang di Halaman Informasi.</p>

        <p>Untuk layanan informasi saat ini hanya bisa dilakukan melalui:</p>
        <ol>
          <li>Email : simulasi@cpns.com</li>
          <li>Whatsapp : 085855234435</li>
        </ol> 

        <p>Tim kami akan membalas secepatnya.</p>
        <p>Terima kasih.</p>
        
      </div>
    </div>
  </body>
</html>
