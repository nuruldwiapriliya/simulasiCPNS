<?php
//subjects
$subjects_result = mysqli_query($conn,'SELECT * FROM subjects');
$subjects = mysqli_fetch_all($subjects_result, MYSQLI_ASSOC);
	if(isset($_POST['add_subject'])){
		$subject = $_POST['subject'];
		$add_subject = "INSERT INTO subjects(subject) VALUES('$subject')";
		mysqli_query($conn,$add_subject);
		header("Location: adminHome.php");
	}

//tests
$tests_result = mysqli_query($conn,'SELECT * FROM test');
$tests = mysqli_fetch_all($tests_result, MYSQLI_ASSOC);

//new-test
	if(isset($_POST['add_test'])){
		$test_name = $_POST['test_name'];
		$subject = $_POST['subject'];
		$sdatetime = $_POST['sdatetime'];
		$edatetime = $_POST['edatetime'];
		$test_duration = $_POST['test_duration'];
		$attempts = $_POST['attempts'];
		$yes_no = $_POST['yes_no'];
		$add_test = " INSERT INTO test(subject, test_name, sdatetime, edatetime, test_duration, attempts, yes_no) VALUES('$subject','$test_name','$sdatetime','$edatetime','$test_duration','$attempts','$yes_no') ";
		mysqli_query($conn,$add_test);
		header("Location: adminHome.php");
	}

//search-users
$searchusers_result = mysqli_query($conn,'SELECT * FROM users');
$usernames = mysqli_fetch_all($searchusers_result, MYSQLI_ASSOC);

//settings

?>

<div id="subjects" class="tab-pane in fade active">
	<h3>Jenis Soal</h3>
	<ul class="list-group">
	<?php foreach($subjects as $subject) : ?>
		<li class="list-group-item"><?php echo $subject['subject']; ?></li>
	<?php endforeach; ?>
	</ul>
	<form method="post" action="">
		<input class="form-control" type="text" name="subject" placeholder="Tambah Jenis Soal"><br>
		<input type="submit" name="add_subject" value="Tambah" class="btn btn-danger btn-block">
	</form>
</div>
<div id="tests" class="tab-pane fade">
	<h3>Daftar Soal</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Soal</th>
                <th>Jenis Soal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Tambah Pertanyaan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $test): ?>
                    <tr>
                        <td><?php echo $test['test_name'];?></td>
                        <td><?php echo $test['subject']; ?></td>
                        <td><?php echo $test['sdatetime']; ?></td>
                        <td><?php echo $test['edatetime']; ?></td>
                        <td><a href='editTest.php?var=<?php echo $test['test_id']; ?> ' class="btn btn-primary">Tambah</a></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id="new-test" class="tab-pane fade">
<h3>Buat Soal</h3>
<form method="post" action="">
		<div class="form-group">
			<input class="form-control" type="text" name="test_name" placeholder="Test Name" style="width: 300px;">
		</div>
		<div class="form-group">
	     	<select name="subject" class="form-control" id="sel1" style="width: 300px;">
	     		<option disabled>Pilih Jenis Soal</option>
	     		<?php foreach($subjects as $subject) : ?>
	        		<option value="<?php echo $subject['subject']; ?>"><?php echo $subject['subject']; ?></option>
	        	<?php endforeach; ?>
	      	</select>
	    </div>
	    <div class="form-inline form-group">
			<input class="form-control" type="datetime-local" name="sdatetime" style="width: 300px;">
			Waktu Mulai
		</div>
		<div class="form-inline form-group">
			<input class="form-control" type="datetime-local" name="edatetime" style="width: 300px;">
			Waktu Selesai
		</div>
		<div class="form-group">
			<input class="form-control" type="number" name="test_duration" placeholder="Durasi Pengerjaan (Menit)" style="width: 300px;">
		</div>
		<div class="form-group">
			<input class="form-control" type="number" name="attempts" placeholder="Jumlah Uji Coba" style="width: 300px;">
		</div>
		<div class="form-group">
	     	<select name="yes_no" class="form-control" id="sel1" style="width: 300px;">
	     		<option disabled>Tampilkan Langsung Soal</option>
	     		<option>Yes</option>
	     		<option>No</option>
	      </select>
	    </div>
      	<br>
		<input type="submit" name="add_test" value="Buat Soal" class="btn btn-danger" style="height: 40px; width:300px;">
</form>
<p>* Note: Setelah membuat soal, Klik halaman soal untuk nenambahkan pertanyaan.</p>
</div>
<div id="search-users" class="tab-pane fade">
    <h3>Cari Anggota</h3>
    <div class="search-box">
        <form class="form-inline" style="padding:0;">
            <input class="form-control" type="text" autocomplete="off" placeholder="Cari Anggota..." style="width:720px;" />
            <input type="submit" name="search_user" value="Search" class="btn btn-info" style="width:150px;">
            <div class="result-display" style="cursor: pointer;"></div>
        </form>
    </div>
    <br>
			<table class="table">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Username</th>
						<th>Email</th>
						<th>Lihat Hasil</th>
						<th>Hapus Anggota</th>
					</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach($usernames as $username) : ?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $username['username']; ?></td>
							<td><?php echo $username['email']; ?></td>
							<td><a class="btn btn-info" href='viewProfile.php?user_id= <?php echo $username['user_id']; ?> ' >Lihat Hasil<a></td>
							<td><a href='deleteUser.php?user_id= <?php echo $username['user_id']; ?> ' class="btn btn-danger">Hapus Anggota</a></td>
						</tr>
						<?php $i++; endforeach; ?>
					</tbody>
        </table>
</div>
<div id="settings" class="tab-pane fade">
	<h3>Pengaturan</h3><br>
		<form class="form-inline">
			<div class="form-group">Ganti Password:&emsp;<input class="form-control" type="password" name="password" placeholder="Password Baru"></div>
			<input class="btn btn-success" type="submit" name="change_password" value="Change Password">
		</form>
		<br><hr>
		<form class="form-inline">
			<div class="form-group">Tambah Role Baru:&emsp;<input class="form-control" type="text" name="username" placeholder="Name"></div>
			<div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
			<div class="form-group"><select class="form-control" name="role"><option>Admin</option><option>Guru</option></select></div>
			<input class="btn btn-success" type="submit" name="add_role" value="Save" >
		</form>

</div>
