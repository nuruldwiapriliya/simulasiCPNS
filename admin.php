<?php require'database.php' ?>
<?php
if(isset($_POST['signin'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$res = mysqli_query($conn,"SELECT * FROM admin_users WHERE username='$username'");
  $row = mysqli_fetch_array($res);
  $count = mysqli_num_rows($res);
    if($count == 1 && $row['password']==$password){
    	  session_start();
        $_SESSION['admin_id'] = $row['user_id'];
        header("Location: adminHome.php");
	}else{
        $errMSG = "Username atau Password Salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Portal Online Simulasi CPNS</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<section id="main-section">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="main-frame text-center">
								<h1 style="font-size:400%;"><strong>Simulasi CPNS</strong></h1>
								<h3>Selamat Datang Di Website Latihan CPNS</h3>
							</div>
						</div>
						<div class="col-lg-4">
              <div class="login">
								<ul class="nav nav-pills nav-justified">
                  <li class="active"><a>Masuk sebagai Administrator</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane in fade active">
										<form class="form-signin" name="form1" method="post" action="" style="padding-left:20px; padding-right:20px">
									        <h2 class="form-signin-heading" align="center"></h2>
									        <div id="message"></div>
									        <div class="form-group"><input name="username" id="myusername" type="text" class="form-control" placeholder="Username" autofocus></div>
									        <div class="form-group"><input name="password" id="mypassword" type="password" class="form-control" placeholder="Password"></div>
									        <div class="form-group"><button name="signin" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button></div>
										</form>
									</div>
								</div>
								<br><center><span><?php if(isset($errMSG)){echo $errMSG;}?></span><center>
							</div>
            	</div>
				</div>
			</div>
		</div>
	</section>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
