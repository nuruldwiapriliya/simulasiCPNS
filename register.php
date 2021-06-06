<?php require'database.php' ?>
<?php
session_start();
if(isset($_SESSION['user_id'])){
	header("Location: home.php");
}
if(isset($_POST['signup'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$res = mysqli_query($conn,"SELECT email FROM users WHERE email='$email' or username = '$username'");
	$count = mysqli_num_rows($res);
	echo $count;
	if($count > 0){
		$errMSG = "<div class=\"alert alert-danger\" role=\"alert\">Username atau Email Sudah Pernah Terdaftar! </div>";
	} else{

		$query = "INSERT INTO users(username, email, password) VALUES('$username','$email', '$password')"; //MD5('$password')
		if(mysqli_query($conn, $query)){
			$errMSG = "<div class=\"alert alert-success\" role=\"alert\">Pendaftaran Akun Berhasil! Silahkan Login <a href=\"index.php\">Di sini.</a> </div>";
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
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
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Daftar</h4>
							<?php 
							if(isset($errMSG)){
								echo $errMSG;
								} ?>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Username</label>
									<input id="username" name="username" type="text" class="form-control" name="name" required autofocus>
									<div class="invalid-feedback">
										Silahkan isi Username!
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" name="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Silahkan Isi Email yang Valid!
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" name="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password Tidak Boleh Kosong!
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">Setuju untuk melakukan pendaftaran akun</label>
										<div class="invalid-feedback">
											Silahkan Centang Setuju!
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button id="signup" name="signup" type="submit" class="btn btn-primary btn-block">
										Daftar
									</button>
								</div>
								<div class="mt-4 text-center">
									Sudah Punya Akun? <a href="index.php">Masuk</a>
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
				
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
	
</body>
</html>