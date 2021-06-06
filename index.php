<?php require'database.php' ?>
<?php
session_start();
if(isset($_SESSION['user_id'])){
	header("Location: home.php");
}
if(isset($_POST['signin'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$res = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
  	$row = mysqli_fetch_array($res);
  	$count = mysqli_num_rows($res);
    if($count == 1 && $row['password']==$password){ //MD5()
    	session_start();
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: home.php");
	}else{
        $errMSG = "<div class=\"alert alert-danger\" role=\"alert\">Username atau Password Salah! </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Portal Online Simulasi CPNS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Masuk</h4>
							<?php 
							if(isset($errMSG)){
								echo $errMSG;
								} ?>
							<form method="POST" class="my-login-validation" novalidate="" action="">
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback">
										Username tidak valid!
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
								    	Password tidak boleh kosong!
							    	</div>
								</div>

								<div class="form-group m-0">
									<button id="signin" name="signin" type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Belum punya akun? <a href="register.php">Daftar Di sini.</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2021 &mdash; Kelompok 5 PemWeb PTI2019B
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
