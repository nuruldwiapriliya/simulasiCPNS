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

  if(isset($_POST['update_profile'])){
    $name = $_POST['name'];
    $tgl_lahir = $_POST['tgl_lahir'];

    $res=mysqli_query($conn,"SELECT * FROM profile WHERE userid = '$user_id'");
    $count = mysqli_num_rows($res);
    if($count == 1){ //MD5()
        $update_pr = " UPDATE profile SET name = '$name', tgl_lahir = '$tgl_lahir' WHERE userid = '$user_id' ";
        if(mysqli_query($conn, $update_pr)){
          $errMSG = "<div class=\"alert alert-success\" role=\"alert\">Profil Berhasil Diperbaharui!</div>";
        } else {
          echo 'ERROR: '. mysqli_error($conn);
        }
    }else{
        $update_pr = " INSERT INTO profile(userid, name, tgl_lahir) VALUES ('$user_id', '$name', '$tgl_lahir')";
        if(mysqli_query($conn, $update_pr)){
          $errMSG = "Profil Berhasil Diperbaharui!";
        } else {
          echo 'ERROR: '. mysqli_error($conn);
        }
    }

    
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
          <li><a href="studentInformations.php" class="fas fa-info-circle"> Informasi</a></li>
          <li><a href="testimoni.php" class="fas fa-comments"> Testimoni</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li  class="active"><a href="studentProfile.php"><span class="fas fa-user"></span> Profil</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <h2>Perbaharui Profil</h2>
      <?php 
              if(isset($errMSG)){
                echo $errMSG;
                } ?>
        <form class="form-horizontal" role="form" method="post" action="">
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" readonly="true" value="<?php echo $u_results['username'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama Lengkap:</label>
            <div class="col-lg-8">
              <input class="form-control" name="name" type="text" placeholder="Nama Lengkap Anda" value="<?php echo $results['name'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Tanggal Lahir:</label>
            <div class="col-lg-8">
              <input class="form-control" name="tgl_lahir" type="date" placeholder="Bishop" value="<?php echo $results['tgl_lahir'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="xxx@gmail.com" readonly="true" value="<?php echo $u_results['email'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button name="update_profile" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
            </div>
          </div>
        </form>
    </div>
  </body>
</html>
