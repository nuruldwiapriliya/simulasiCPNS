<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
}

$query = mysqli_query($conn,"SELECT * FROM test");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

$user_id = $_SESSION['user_id'];

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
          <li  class="active"><a href="studentHome.php" class="fas fa-question"> Simulasi</a></li>
          <li><a href="studentResults.php" class="fas fa-poll"> Hasil Simulasi</a></li>
          <li><a href="forum.php" class="fas fa-users"> Forum</a></li>
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
		<h1>Soal</h1>
		<div id="active_test" class="well">
			<h3>Soal Aktif</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Judul Soal</th>
						<th>Jenis Soal</th>
						<th>Jumlah Percobaan</th>
						<th>Durasi Pengerjaan</th>
						<th>Waktu Berakhir</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($results as $result):
						if((strtotime($result['sdatetime']) <= strtotime(date("Y-m-d h:i:sa")))  && (strtotime($result['edatetime']) > strtotime(date("Y-m-d h:i:sa")))  ){ ?>
							<tr>
								<?php 
								$test_id = $result['test_id'];

								  $u_query = mysqli_query($conn,"SELECT COUNT(tr.test_id) as 'Result' FROM test_result tr INNER JOIN test ts ON tr.test_id = ts.test_id and tr.user_id = '$user_id' WHERE tr.test_id = '$test_id'");
								  $u_results = mysqli_fetch_array($u_query, MYSQLI_ASSOC);
								?>
								<td><?php echo $result['test_name'];?></td>
								<td><?php echo $result['subject']; ?></td>
								<td><?php echo $result['attempts']; ?></td>
								<td><?php echo $result['test_duration']; ?></td>
								<td><?php echo $result['edatetime']; ?></td>
								<?php 

								  if($u_results['Result'] == $result['attempts']){
									echo "<td>Anda Sudah Pernah Mengerjakan Soal Ini.</td>";
								} else{

									echo "<td><a href=\"solveTest.php?var=".$result['test_id']."\" class=\"btn btn-primary\">Mulai Mengerjakan</a></td>";
								}
								?>
							</tr>
						<?php 
								} ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div id="active_test" class="well">
			<h3>Soal Mendatang</h3>
			<table class="table">
				<thead>
					 <tr>
						<th>Judul Soal</th>
						<th>Jenis Soal</th>
						<th>Waktu Mulai</th>
					 </tr>
					</thead>
					<tbody>
						<?php foreach ($results as $result):
							if(strtotime($result['sdatetime']) > strtotime(date("Y-m-d h:i:sa"))){ ?>
								<tr>
									<td><?php echo $result['test_name'];?></td>
									<td><?php echo $result['subject']; ?></td>
									<td><?php echo $result['sdatetime']; ?></td>
								</tr>
							<?php } ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
