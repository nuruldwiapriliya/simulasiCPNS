-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 04:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `sender` varchar(15) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `sender`, `message`) VALUES
(22, '17', 'Halo gaiss, gimana simulasi kalian??'),
(23, '18', 'Aman terkendali nihh'),
(24, '19', 'Huft, ternyata soalnya lumayan susah yaa'),
(25, '20', 'iyaa, lumayan susah si menurutku'),
(26, '21', 'Mangatt berjuang gaiss. yok yok kita pasti bisa'),
(27, '20', 'yokkk mangatt gaiss');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileid`, `userid`, `name`, `tgl_lahir`) VALUES
(1, 3, 'Reyga EE', '1996-09-18'),
(2, 0, '', '0000-00-00'),
(3, 5, 'Nilam kll', '2021-06-24'),
(4, 6, 'Nilam kak', '1997-01-07'),
(5, 14, 'Ramdhan Rama', '2021-06-24'),
(6, 15, 'nilam', '2021-06-04'),
(7, 16, 'nilam arum', '2021-06-26'),
(8, 17, 'Kristina Yuliana', '2001-07-12'),
(9, 18, 'Nilam Setyoningrum', '2021-04-26'),
(10, 19, 'Nurul Dwi Apriliya', '2001-04-08'),
(11, 20, 'Fatahriza Aulia Ramadhani', '2001-12-10'),
(12, 21, 'Zia Puspita', '2001-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `option_e` text NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `test_id`, `question`, `image`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`) VALUES
(1, 1, '1.	Secara harfiah, pancasila itu diartikan ... ', 'questions/', 'Lima pedoman kebangsaan ', 'Dasar yang memiliki lima unsur ', 'Lima komponen penting ', 'Lima unsur hidup manusia ', 'Falsafah yang memiliki lima pedoman bernegara', 'b'),
(2, 1, '2.	Di antara negara-negara berikut ini, yang menerapkan sistem pemerintahan referendum adalah ... ', 'questions/', 'Swiss ', 'Inggris ', 'Italia ', 'Belanda ', 'Belgia', 'a'),
(3, 1, '3.	Suatu model atau pola berpikir sebagai upaya untuk melaksanakan perubahan yang direncanakan disebut ... ', 'questions/', 'Rencana pembangunan ', 'Paradigma pembangunan ', 'Strategi pembangunan ', 'Pola pembangunan', 'Upaya pembangunan', 'b'),
(4, 2, '1. Norma mampu mengendalikan perilaku manusia dalam masyarakat. Bentuk kalimat pasif dari kalimat tersebut adalah ... ', 'questions/', 'Perilaku manusia mampu dikendalikan oleh norma dalam masyarakat.', 'Perilaku masyarakat tidak dapat dikendalikan oleh norma dalam masyarakat. ', 'Dalam norma masyarakat mampu mengendalikan perilaku manusia. ', 'Manusia mampu dikendalikan oleh norma dalam perilaku masyarakat. ', 'Norma masyarakat dalam perilaku manusia mampu dikendalikan.', 'a'),
(5, 2, '2. Tugas utama seorang guru adalah mengajar siswa di sekolah, bukan memberi les tambahan di rumah. Fokus pada pemberian les di rumah akan berpengaruh pada efisiensi pendidikan, dan bukan tidak mungkin akan menurunkan kualitas dedikasi seorang guru. Pemberian les tambahan sebaiknya dilakukan hanya untuk meningkatkan kualitas siswa yang kurang, dan bukan sebagai sarana menambah penghasilan. \r\n\r\n\r\nIde pokok dari paragraf di atas adalah ... \r\n', 'questions/', 'Fokus utama seorang guru adalah mengajar siswa di sekolah ', 'Fokus pada pemberian les tambahan di rumah akan berpengaruh terhadap efisiensi pendidikan ', 'Pemberian les tambahan akan menurunkan kualitas dedikasi seorang guru', 'Pemberian les tambahan adalah sarana menambah penghasilan ', 'Pemberian les tambahan akan meningkatkan kualitas dedikasi seorang guru ', 'a'),
(6, 2, '3. ELITIS = _____', 'questions/', 'Terpadu', 'Terbatas ', 'Terpercaya ', 'Terbalik ', 'Terpandang ', 'e'),
(7, 3, '1. Suatu desa terdiri atas 238 keluarga dengan rata-rata jumlah anggota setiap keluarga adalah 4 orang dan jumlah orang dewasa seluruhnya 580 orang. Suatu saat desa itu terserang wabah virus adalah 0,5 bagi anak-anak. Berapa orang anak yang diperkirakan akan tertular virus itu?', 'questions/', '186 ', '372 ', '261 ', '380 ', '290', 'a'),
(8, 3, '2. Ada 3 jenis tiket yang tersedia untuk sebuah pertunjukkan musik: VIP Rp 25.000; kelas I Rp 12.000, dan kelas II Rp 9.000. Dalam pertunjukkan tersebut, sejumlah P tiket kelas I, B tiket kelas II, dan R tiket kelas VIP berhasil terjual. Dari pilihan dibawah ini, manakah yang menunjukkan prosentase hasil penjualan tiket kelas I ?', 'questions/', '100 × [P/(P + B + R)] ', '100 × [12P/(12P + 9B + 25R)] ', '12P/(12P + 9B + 25R) ', '100 × [(9B + 25R)/(12P + 9B + 25R)] ', '100 × 12P[(12P + 9B + 25R)]', 'c'),
(9, 3, '3. X W U V T S Q R P O ...', 'questions/', 'L dan M', 'N dan M ', 'M dan L', 'M dan N ', 'N dan L', 'd'),
(10, 4, '1. Pancasila dikatakan sebagai ideologi terbuka karena nilai-nilai yang dianggap baik, benar oleh masyarakat Indonesi. Hal ini berarti Pancasila memiliki dimensi...', 'questions/', 'Dimensi realitas ', 'Dimensi subjektifitas ', 'Dimensi idealitas ', 'Dimensi objektifitas ', 'Dimensi normatif', 'c'),
(11, 4, '2. Berdasarkan UUD 1945, yang memegang kekuasaan eksekutif adalah ...', 'questions/', 'Presiden ', 'MA ', 'Presiden dan para menteri (kabinet)', 'DPR ', 'MPR', 'a'),
(12, 4, '3. Pembukaan UUD 1945 tercantum dalam Piagam Jakarta yang disahkan pada tanggal …', 'questions/', '29 Mei 1945 ', '1 Juni 1955', '22 Juni 1945', '14 Juni 1945', '17 Agustus 1945', 'c'),
(13, 2, '4. MAWAR : TANAMAN = ... : ... ', 'questions/', 'Pohon : Jati ', 'Anak : Ibu ', 'Kamar : Rumah ', 'Kucing : Tikus ', 'Singa : Binatang', 'e'),
(14, 2, '5. Tertumbuk biduk dikelokkan, tertumbuk kata dipikiri. Makna peribahasa di atas adalah ...', 'questions/', 'Menemukan masalah dalam pekerjaan ', 'Bila mengerjakan sesuatu pekerjaan, harus beraturan ', 'Mengerjakan suatu pekerjaan yang tidak dipikirkan ', 'Mengerjakan sesuatu pekerjaan yang diperintahkan orang lain ', 'Masalah datang setelah pekerjaan telah dilakukan', 'b'),
(15, 3, '4. Suatu kelompok belajar mempunyai anggota 7 orang. Jika setiap belajar semua anggota kelompok duduk dengan posisi melingkar, banyaknya cara untuk mengatur posisi duduk anggota kelompok tersebut adalah ...', 'questions/', '720 ', '1440 ', '2520', '5040', '5420', 'a'),
(16, 3, '5. Perbandingan jumlah kelereng Amat dengan Cemen adalah 7 : 5, sedangkan perbandingan jumlah kelereng Bagio dan Amat adalah 3 : 4. Jika selisih jumlah kelereng Amat dan Cemen adalah 16 buah, maka banyaknya kelereng Bagio adalah ...', 'questions/', '56 ', '42', '40 ', '28', '30', 'b'),
(17, 4, '4. Runtuhnya Negara Yugoslavia akibat dari...', 'questions/', 'Terjadi pertentangan antar etnis ', 'Runtuhnya negara komunis Uni Soviet ', 'Kekuatan militer negara tersebut melemah ', 'Ada keinginan dari Serbia untuk mendirikan negara sendiri ', 'Terlepasnya negara-negara yang merupakan bagian dari negara Yugoslavia', 'e'),
(18, 4, '5. Teks Sumpah Pemuda dibuat oleh ... ', 'questions/', 'Moh. Yamin ', 'Bung Hatta ', 'M. Tabrani ', 'Amir Syarifudin ', 'Ir. Soekarno', 'a'),
(19, 1, '4. Sumber hukum yang berasal dari keyakinan kesadaran individu dan pendapat umum disebut sumber hukum ...', 'questions/', 'Formal ', 'Materiel', 'Yurisprudensi ', 'Traktat ', 'Konvensi', 'e'),
(20, 1, '5. Tata urutan perundang-undangan yang memegang urutan paling rendah adalah … ', 'questions/', 'Peraturan daerah ', 'Peraturan Pemerintah', 'Keppres ', 'UU ', 'Perpu', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `questions_desc`
--

CREATE TABLE `questions_desc` (
  `question_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` varchar(400) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`) VALUES
(1, 'CPNS'),
(2, 'Matematika'),
(3, 'PKN'),
(4, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `sdatetime` datetime NOT NULL,
  `edatetime` datetime NOT NULL,
  `test_duration` int(11) NOT NULL,
  `attempts` int(11) NOT NULL,
  `yes_no` varchar(3) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `subject`, `test_name`, `sdatetime`, `edatetime`, `test_duration`, `attempts`, `yes_no`, `created`) VALUES
(1, 'CPNS', 'Latihan CPNS', '2017-01-06 08:30:00', '2021-06-25 09:01:00', 60, 1, 'Yes', '2021-06-03 02:01:36'),
(2, 'Bahasa Indonesia', 'Latihan Bahasa Indonesia', '2017-01-06 08:30:00', '2021-06-25 09:01:00', 60, 1, 'Yes', '2021-06-05 17:33:08'),
(3, 'Matematika', 'Latihan Matematika', '2017-01-06 08:30:00', '2021-06-25 09:01:00', 60, 1, 'Yes', '2021-06-05 17:37:04'),
(4, 'PKN', 'Latihan PKN', '2017-01-06 08:30:00', '2021-06-25 09:01:00', 60, 1, 'Yes', '2021-06-05 17:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `idtesti` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`idtesti`, `message`, `sender`, `date`) VALUES
(4, 'Soalnya menantang bangettt nih. mantap dah', '17', '2021-06-05'),
(5, 'Keren abis sih soal-soalnya. Jadi lebih tau kemampuan diri udah sejauh mana.', '18', '2021-06-05'),
(6, 'Soal-soalnya ntapp abis. Ke depannya bisa dibuat lebih banyak lagi', '19', '2021-06-05'),
(7, 'Menurutku dah cukup bagus soal- soal simulasinya, tapi cuman bisa ikut sekali.', '20', '2021-06-05'),
(8, 'Terima kasih telah membuat latihan CPNS yang bisa mengasah kemampuan saya dan terus belajar ke depannya.\r\n', '21', '2021-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `result_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `right_ans` int(11) NOT NULL,
  `wrong_ans` int(11) NOT NULL,
  `no_attempt` int(11) NOT NULL,
  `score` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`result_id`, `test_id`, `user_id`, `right_ans`, `wrong_ans`, `no_attempt`, `score`, `time`) VALUES
(5, 1, 17, 1, 2, 0, 33.3333, '2021-06-05 15:15:50'),
(6, 1, 18, 1, 2, 0, 33.3333, '2021-06-05 16:25:04'),
(7, 1, 19, 1, 2, 0, 33.3333, '2021-06-05 16:28:38'),
(8, 1, 20, 1, 2, 0, 33.3333, '2021-06-05 16:35:09'),
(9, 1, 21, 3, 0, 0, 100, '2021-06-05 17:03:40'),
(10, 3, 18, 1, 0, 0, 100, '2021-06-05 17:39:11'),
(11, 2, 21, 3, 0, 0, 100, '2021-06-05 17:45:31'),
(12, 3, 21, 2, 1, 0, 66.6667, '2021-06-05 17:45:53'),
(13, 4, 21, 1, 1, 0, 50, '2021-06-05 17:46:15'),
(14, 4, 18, 2, 0, 0, 100, '2021-06-05 18:00:52'),
(15, 2, 20, 3, 2, 0, 60, '2021-06-05 18:20:17'),
(16, 3, 20, 4, 1, 0, 80, '2021-06-05 18:20:40'),
(17, 4, 20, 4, 0, 1, 80, '2021-06-05 18:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `test_result_desc`
--

CREATE TABLE `test_result_desc` (
  `result_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `marks` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(17, 'kristinayuliana', 'kristina054@gmail.com', '19054'),
(18, 'nilamsty', 'nilamsty047@gmail.com', '19047'),
(19, 'prili', 'apriliya055@gmail.com', '19055'),
(20, 'fatahrizaar', 'fatahrizaar051@gmail.com', '19051'),
(21, 'ziaaa', 'zia12345@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profileid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `questions_desc`
--
ALTER TABLE `questions_desc`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`idtesti`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions_desc`
--
ALTER TABLE `questions_desc`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `idtesti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
