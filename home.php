<?php require'database.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "UTF-8">
    <title>Portal Online Simulasi CPNS</title>
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" type="text/css" href="css/stylesheet.css">
    <!-- Font Awesome -->
    <link rel = "stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="home.php">Simulasi CPNS</a>
        </div>
        <ul class="nav navbar-nav">
          <li  class="active"><a href="home.php" class="fas fa-home"> Beranda</a></li>
          <li><a href="studentHome.php" class="fas fa-question"> Simulasi</a></li>
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
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Pemberitahuan!</h4>
        <hr>
        <p align="justify">CPNS adalah Calon Pegawai Negeri Sipil. Menurut PP 11 Tahun 2017 tentang Manajemen PNS, PNS adalah warga negara Indonesia yang telah memenuhi syarat yang ditentukan, diangkat oleh pejabat yang berwenang dan diserahi tugas dalam suatu jabatan negeri, atau diserahi tugas negara lainnya. Jika memenuhi persyaratan dan dinyatakan lolos ujian, maka CPNS akan diangkat menjadi Pegawai Negeri Sipil (PNS). PNS dapat mengisi seluruh jabatan ASN, memiliki jenjang karier dan bisa menempati hingga jenjang pimpinan utama. PNS berstatus pegawai tetap sedangkan PPPK merupakan pegawai kontrak dengan jangka waktu tertentu. PNS memiliki NIP secara nasional. Usia paling rendah untuk menjadi PNS adalah 18 tahun dan paling tinggi 35 tahun. </p>

        <p>Mengacu pada seleksi CPNS sebelumnya, seleksi terdiri dari beberapa tahap, yaitu:</p>
        <ol>
          <li>Seleksi Administrasi</li>
          <li>Seleksi Komepetensi Dasar (SKD)</li>
          <li>Seleksi Kompetensi Bidang (SKB).</li>
        </ol> 

        <b>Seleksi Kompetensi Dasar (SKD) </b>
        <p>Ada tiga jenis tes SKD, setiap jenis tes akan memiliki nilai ambang batas yang berbeda-beda. Yaitu : </p>
        <ol>
          <li>Tes Karakteristik Pribadi (TKP)</li>
          Peserta akan mengerjakan soal TKP dengan penilaian meliputi:
          <ul>
            <li>Pelayanan publik</li>
            <li>Jejaring kerja</li>
            <li>Sosial budaya</li>
            <li>Teknologi informasi dan komunikasi</li>
            <li>Profesionalisme</li>
          </ul>
          <li>Tes Wawasan Kebangsaan (TWK)</li>
          Soal TWK dinilai berdasarkan:
          <ul>
            <li>Penguasaan pengetahuan dan kemampuan mengimplementasikan nasionalisme</li>
            <li>Integritas</li>
            <li>Bela negara</li>
            <li>Pilar negara</li>
            <li>Bahasa Indonesia</li>
          </ul>
          <li>Tes Intelegensi Umum (TIU).</li>
          Penilaian TIU meliputi:
          <ul>
            <li>Kemampuan verbal (analogi, silogisme, dan analitis).</li>
            <li>Kemampuan numerik (berhitung, deret angka, perbandingan kuantitatif, dan soal cerita)</li>
            <li>Kemampuan figural (analogi, ketidaksamaan, dan serial).</li>
          </ul>
        </ol>

        <b>Seleksi Kompetensi Bidang (SKB)</b>
        <p>Seleksi Kompetensi Bidang (SKB) terdiri dari beberapa jenis tes sesuai dengan jenis jabatan dan instansi, misalnya:</p>
        <ol>
          <li>Tes potensi akademik</li>
          <li>Tes praktik kerja</li>
          <li>Tes bahasa asing</li>
          <li>Tes fisik atau kesampataan </li>
          <li>Psikotes</li>
          <li>Tes kesehatan jiwa</li>
          <li>Wawancara</li>
        </ol> 
      </div>
    </div>
  </body>
</html>
