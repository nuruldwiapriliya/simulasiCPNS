<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
if(isset($_POST['sendchat'])){
    $message = $_POST['msg'];
    $query = mysqli_query($conn,"INSERT INTO chat(sender, message) VALUES ('$user_id','$message') ");
    if(mysqli_query($conn, $query)){
        header("Location: forum.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset = "UTF-8">
		<title>Portal Online Simulasi CPNS</title>
		<link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel = "stylesheet" type="text/css" href="css/stylesheet.css">
		<link rel = "stylesheet" type="text/css" href="css/style.css">

		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
		<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
          <li class="active"><a href="forum.php" class="fas fa-users"> Forum</a></li>
          <li><a href="studentInformations.php" class="fas fa-info-circle"> Informasi</a></li>
          <li><a href="testimoni.php" class="fas fa-comments"> Testimoni</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
          <li><a href="studentProfile.php"><span class="fas fa-user"></span> Profil</a></li>
		      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		    </ul>
		  </div>
		</nav>
    <div class="container">
    	<div class="alert alert-info" role="alert">
  			Silahkan Download Materi Soal <a href="">Di sini</a>
  		</div>
		
			<div class="wrapper panel panel-default">
				<div class="panel-heading">
					Berbincang dengan teman
				</div>
				<div id="msg" class="panel-body">
				</div>
				
				<div class="panel-footer">
					<form id="sendform" method="POST" class="input-group" action="">
						<input name="msg" id="text" type="text" name="text" autocomplete="off" class="form-control" placeholder="Enter chat message.."/>
						<span class="input-group-btn">
							<input name="sendchat" id="send" type="submit" value="Send" class="btn btn-default" />
						</span>
					</form>
				</div>
			</div>
	</div>

		<script src="css/chat.js"></script>	
	</body>
</html>
