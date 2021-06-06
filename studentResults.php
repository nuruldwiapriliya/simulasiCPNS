<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
}
$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn,"SELECT * FROM test_result WHERE user_id='$user_id' ");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
$query_test = mysqli_query($conn,"SELECT test_id, test_name, subject FROM test ");
$results_test = mysqli_fetch_all($query_test, MYSQLI_ASSOC);
$count = mysqli_num_rows($query);
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
          <li class="active"><a href="studentResults.php" class="fas fa-poll"> Hasil Simulasi</a></li>
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
    	<?php 
    		if($count > 0){
    			echo "<div class=\"alert alert-success\" role=\"alert\"> <p>Download Pembahasan Soal <a href=\"\files\PEMBAHASAN SOAL LATIHAN CPNS.docx\"><i class=\"fas fa-download\"> Di sini </i></a>.</p> </div>";
    		} else{
    			echo  "<h3><p align=\"center\">Silahkan Ambil Soal untuk Melihat Hasil. </p></h3>";
    		}
    	?>
		<table class="table">
        <thead>
          <tr>
			<th>Percobaan</th>
			<th>Jenis Soal</th>
			<th>Judul Soal</th>
            <th>Total Soal</th>
            <th>Jumlah Benar</th>
            <th>Jumlah Salah</th>
            <th>Jumlah Tidak Dijawab</th>
            <th>Persentase Nilai</th>
          </tr>
        </thead>
        <tbody>

		<?php $i=1; foreach ($results as $res): ?>
          <tr>
						<td><?php echo $i; ?></td>
						<?php foreach ($results_test as $result_test): ?>
							<?php if($res['test_id']==$result_test['test_id']){
									echo '<td>'.$result_test['subject'].'</td>';
									echo '<td>'.$result_test['test_name'].'</td>';
								}
							?>
						<?php endforeach; ?>
            <td><?php echo ($res['right_ans']+$res['wrong_ans']+$res['no_attempt']); ?></td>
            <td align="center"><?php echo $res['right_ans']; ?></td>
            <td align="center"><?php echo $res['wrong_ans']; ?></td>
            <td align="center"><?php echo $res['no_attempt']; ?></td>
            <td align="center"><?php echo number_format((float) $res['score'],2, '.', '').' %'; ?></td>
          </tr>
				<?php $i++; endforeach; ?>
        </tbody>
      </table>
		</div>
	</body>
</html>
