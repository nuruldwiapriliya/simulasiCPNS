<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$q_query = mysqli_query($conn,"SELECT * FROM profile pr INNER JOIN users usr ON usr.user_id = pr.userid WHERE usr.user_id ='$user_id'");
$results = mysqli_fetch_array($q_query, MYSQLI_ASSOC);

$u_query = mysqli_query($conn,"SELECT * FROM users WHERE user_id ='$user_id'");
$u_results = mysqli_fetch_array($u_query, MYSQLI_ASSOC);

if(isset($_POST['send_Testimoni'])){
    $feed = $_POST['feedback'];

    $update_pr = " INSERT INTO testimoni(message, sender, date) VALUES ('$feed', '$user_id', now())";
    if(mysqli_query($conn, $update_pr)){
      $msg = "<div class=\"alert alert-success\" role=\"alert\">Feedback Berhasil Dikirim!</div>";
    } else {
      echo $msg = "ERROR: ". mysqli_error($conn);
    }
  }



$t_query = mysqli_query($conn,"SELECT * FROM testimoni WHERE sender ='$user_id'");
$count = mysqli_num_rows($t_query);

$res = mysqli_query($conn,"SELECT * FROM profile WHERE userid = '$user_id'");
$countProfile = mysqli_num_rows($res);
if($countProfile == 0){ //MD5()
  $msg = "<div class=\"alert alert-danger\" role=\"alert\">Lengkapi Profil Anda untuk Mengisi Testimoni!</div>";
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
      <h2 align="center">Silahkan Isi Testimoni Di bawah.</h2>
      <?php 
              if(isset($msg)){
                echo $msg;
                } ?>
      <form method="POST" action="">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Lengkap</label>
    <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda" value="<?php echo $results['name'] ?>" readonly="True">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Alamat Email</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $u_results['email'] ?>" readonly="True">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Testimoni</label>
    <?php

    if($count == 0  && $countProfile == 1){
      echo "<textarea name=\"feedback\" class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"5\" placeholder=\"Silahkan Isi Testimoni\"></textarea>";
    } else{
      echo "<textarea name=\"feedback\" class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"5\" placeholder=\"Silahkan Isi Testimoni\" readonly=\"True\"></textarea>";
    }
    ?>
  </div>

  <div class="form-group">
    <?php

    if($count == 0 && $countProfile == 1){
      echo "<button class=\"form-control\"  name=\"send_Testimoni\" id=\"submit\" class=\"btn btn-lg btn-primary btn-block\" type=\submit\">Kirim</button>";
    } else{
      echo "<h4 align=\"center\">Terima Kasih Telah Memberi Testimoni.</h4>";
    }
    ?>
    <div class="alert alert-info" role="alert">Lihat Testimoni <a href="testimoni_view.php">Di sini</a>.</div>
  </div>
</form>
    </div>
  </body>
</html>
