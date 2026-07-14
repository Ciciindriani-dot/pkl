-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2026 at 01:33 PM
-- Server version: 9.4.0
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int NOT NULL,
  `pendaftaran_id` int DEFAULT NULL,
  `isi_laporan` text,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_pkl`
--

CREATE TABLE `pendaftaran_pkl` (
  `id` int NOT NULL,
  `siswa_id` int DEFAULT NULL,
  `perusahaan_id` int DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `status` enum('pending','diterima','ditolak') DEFAULT 'pending',
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftaran_pkl`
--

INSERT INTO `pendaftaran_pkl` (`id`, `siswa_id`, `perusahaan_id`, `tanggal_daftar`, `status`, `keterangan`) VALUES
(2, 3, 6, '2026-05-07', 'ditolak', NULL),
(4, 5, 37, '2026-05-10', 'diterima', NULL),
(5, 7, 39, '2026-05-11', 'diterima', NULL),
(6, 8, 15, '2026-05-11', 'diterima', NULL),
(7, 11, 7, '2026-05-12', 'diterima', NULL),
(8, 12, 7, '2026-05-12', 'diterima', NULL),
(9, 14, 27, '2026-05-18', 'diterima', NULL),
(10, 16, 36, '2026-05-19', 'ditolak', NULL),
(11, 17, 13, '2026-05-19', 'diterima', NULL),
(12, 18, 18, '2026-06-01', 'pending', NULL),
(13, 13, 6, '2026-06-02', 'pending', NULL),
(14, 19, 36, '2026-06-02', 'pending', NULL),
(15, 20, 6, '2026-06-02', 'pending', NULL),
(16, 21, 8, '2026-06-02', 'diterima', NULL),
(17, 22, 36, '2026-06-07', 'pending', NULL),
(18, 22, 39, '2026-06-07', 'diterima', NULL),
(19, 22, 16, '2026-06-07', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int NOT NULL,
  `nama_perusahaan` varchar(150) DEFAULT NULL,
  `alamat` text,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `alamat`, `deskripsi`, `created_at`, `bidang`) VALUES
(1, 'PT Telkom Digital', 'Padang', 'Software development dan IT solution', '2026-05-07 13:44:54', 'RPL'),
(2, 'CV Coding Nusantara', 'Bukittinggi', 'Web development dan aplikasi', '2026-05-07 13:44:54', 'RPL'),
(3, 'PT Smart Tech', 'Padang Panjang', 'Pengembangan sistem informasi', '2026-05-07 13:44:54', 'RPL'),
(4, 'Digital Creative Studio', 'Solok', 'UI UX dan frontend development', '2026-05-07 13:44:54', 'RPL'),
(5, 'PT Cyber Software', 'Payakumbuh', 'Backend dan database development', '2026-05-07 13:44:54', 'RPL'),
(6, 'PT Cyber Network', 'Padang', 'Jaringan komputer dan server', '2026-05-07 13:44:54', 'TKJ'),
(7, 'Warnet Jaya Net', 'Bukittinggi', 'Internet dan networking', '2026-05-07 13:44:54', 'TKJ'),
(8, 'CV Fiber Optik Nusantara', 'Solok', 'Instalasi jaringan fiber optik', '2026-05-07 13:44:54', 'TKJ'),
(9, 'PT Router Indonesia', 'Padang Panjang', 'Maintenance jaringan dan mikrotik', '2026-05-07 13:44:54', 'TKJ'),
(10, 'Net Solution Center', 'Payakumbuh', 'Konfigurasi jaringan komputer', '2026-05-07 13:44:54', 'TKJ'),
(11, 'Studio Creative Art', 'Padang', 'Desain grafis dan branding', '2026-05-07 13:44:54', 'DKV'),
(12, 'Visual Media Agency', 'Bukittinggi', 'Editing video dan multimedia', '2026-05-07 13:44:54', 'DKV'),
(13, 'PT Desain Kreatif', 'Solok', 'Ilustrasi dan digital art', '2026-05-07 13:44:54', 'DKV'),
(14, 'Creative Motion Studio', 'Padang Panjang', 'Animasi dan motion graphic', '2026-05-07 13:44:54', 'DKV'),
(15, 'Pixel Studio', 'Payakumbuh', 'Desain visual dan poster', '2026-05-07 13:44:54', 'DKV'),
(16, 'PT Accounting Center', 'Padang', 'Administrasi dan pembukuan', '2026-05-07 13:44:54', 'AKL'),
(17, 'CV Finance Nusantara', 'Bukittinggi', 'Akuntansi dan laporan keuangan', '2026-05-07 13:44:54', 'AKL'),
(18, 'PT Audit Solution', 'Solok', 'Perpajakan dan audit', '2026-05-07 13:44:54', 'AKL'),
(19, 'Kantor Konsultan Pajak', 'Padang Panjang', 'Administrasi perpajakan', '2026-05-07 13:44:54', 'AKL'),
(20, 'PT Keuangan Mandiri', 'Payakumbuh', 'Pengelolaan data keuangan', '2026-05-07 13:44:54', 'AKL'),
(21, 'PT Administrasi Prima', 'Padang', 'Administrasi perkantoran', '2026-05-07 13:44:54', 'MPLB'),
(22, 'CV Arsip Digital', 'Bukittinggi', 'Manajemen dokumen kantor', '2026-05-07 13:44:54', 'MPLB'),
(23, 'PT Office Solution', 'Solok', 'Pelayanan administrasi', '2026-05-07 13:44:54', 'MPLB'),
(24, 'Kantor Pelayanan Publik', 'Padang Panjang', 'Administrasi dan pelayanan', '2026-05-07 13:44:54', 'MPLB'),
(25, 'PT Data Office', 'Payakumbuh', 'Pengelolaan data kantor', '2026-05-07 13:44:54', 'MPLB'),
(26, 'Bengkel Motor Jaya', 'Padang', 'Perbaikan kendaraan dan mesin', '2026-05-07 13:44:54', 'TKRO'),
(27, 'PT Otomotif Nusantara', 'Bukittinggi', 'Servis kendaraan roda empat', '2026-05-07 13:44:54', 'TKRO'),
(28, 'CV Teknik Mesin', 'Solok', 'Perawatan mesin otomotif', '2026-05-07 13:44:54', 'TKRO'),
(29, 'Auto Service Center', 'Padang Panjang', 'Maintenance kendaraan', '2026-05-07 13:44:54', 'TKRO'),
(30, 'PT Mobilindo', 'Payakumbuh', 'Perbaikan dan tune up mobil', '2026-05-07 13:44:54', 'TKRO'),
(31, 'Yamaha Service Center', 'Padang', 'Servis motor dan tune up', '2026-05-07 13:44:54', 'TBSM'),
(32, 'Honda Motor Workshop', 'Bukittinggi', 'Perawatan motor otomatis', '2026-05-07 13:44:54', 'TBSM'),
(33, 'CV Mekanik Motor', 'Solok', 'Perbaikan sepeda motor', '2026-05-07 13:44:54', 'TBSM'),
(34, 'Bengkel Racing Nusantara', 'Padang Panjang', 'Modifikasi dan servis motor', '2026-05-07 13:44:54', 'TBSM'),
(35, 'Motor Service Indo', 'Payakumbuh', 'Teknik dan mekanik motor', '2026-05-07 13:44:54', 'TBSM'),
(36, 'PT Industri Mesin', 'Padang', 'Industri mesin dan manufaktur', '2026-05-07 13:44:54', 'TM'),
(37, 'CV Teknik Produksi', 'Bukittinggi', 'Produksi dan perawatan mesin', '2026-05-07 13:44:54', 'TM'),
(38, 'PT Mekanikal Nusantara', 'Solok', 'Perawatan mesin industri', '2026-05-07 13:44:54', 'TM'),
(39, 'Workshop Mesin Teknik', 'Padang Panjang', 'Perbaikan dan instalasi mesin', '2026-05-07 13:44:54', 'TM'),
(40, 'PT Mesin Mandiri', 'Payakumbuh', 'Manufaktur dan teknik produksi', '2026-05-07 13:44:54', 'TM');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nis`, `kelas`, `jurusan`, `jenis_kelamin`, `no_hp`) VALUES
(1, 1, '123564', 'XI1', 'TKJ', 'Perempuan', '0831829453'),
(3, 5, '12345', 'XI TKJ 2', 'TKJ', 'Perempuan', '081268319164'),
(5, 9, '123', 'XI TM 1', 'TM', 'Laki-laki', '123131311231'),
(7, 14, '123', 'XI TM 1', 'TM', NULL, '12`312431313'),
(8, 15, '123', 'XI MPLB 1', 'MPLB', NULL, '353535645645'),
(9, 16, '12313', 'XI TBSM 1', 'TBSM', NULL, '23424243345'),
(10, 20, '123', 'XI TKRO 1', 'TKRO', 'Perempuan', '23244342'),
(11, 21, '1239847', 'XI TKJ 2', 'TKJ', 'Perempuan', '083182945322'),
(12, 22, '1234', 'XI TKJ 1', 'TKJ', 'Laki-laki', '324354565566'),
(13, 23, '2401162004', 'XI TKJ 2', 'TKJ', 'Laki-laki', '083182934954'),
(14, 24, '1234', 'XI TKRO 1', 'TKRO', 'Perempuan', '12313424454'),
(15, 25, '123', 'XI TBSM 1', 'TBSM', 'Perempuan', '2342342342'),
(16, 26, '123123', 'XI TM 1', 'TM', 'Perempuan', '231313131231'),
(17, 27, '123', 'XI MPLB 1', 'MPLB', 'Perempuan', '43345564564'),
(18, 28, '123', 'XI MPLB 1', 'MPLB', 'Perempuan', '12312312'),
(19, 29, '123', 'XI TM 1', 'TM', 'Perempuan', '2139871837813'),
(20, 30, '123456', 'XI TKJ 2', 'TKJ', 'Laki-laki', '081378682121'),
(21, 31, '321', 'XI RPL 1', 'DKV', 'Laki-laki', '083129345'),
(22, 32, '12313', 'XI TM 1', 'TM', 'Perempuan', '1231134343');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('siswa','admin','kepsek') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$oFqlB6cZh89JyKZgnGZZVOWLRw/6xRZcat3d99gSAemAsD.U1j2WO', 'siswa', '2026-05-03 13:03:40'),
(5, 'cici indriani', 'ci12@gmail.com', '$2y$10$pNcSBw0h7BFD/pW0KiAMZeiwCRCQR/hEjxpXza5thhutx0KfQrSgO', 'siswa', '2026-05-07 14:05:11'),
(8, 'admin pkl', 'admin@gmail.com', '$2y$10$/rD7e7Ja07FCsqj2ZlGsMuTZ1OB8ghjQF7po78ISOY7gMczkJmvxa', 'admin', '2026-05-07 14:30:19'),
(9, 'cicittttt', 'cicit@gmail.com', '$2y$10$r1Ix9MocF3eTS5A9FUPiZOyFo8VSLbGQa0PGiZGLMS4naBoJglUgO', 'siswa', '2026-05-09 14:38:50'),
(13, 'kepsek', 'kepsek@gmail.com', '$2y$10$AcdaY5tr3.hYwTGXb1jWEuAler/badmSFuYAZ3WXkti.Si.oshkhi', 'kepsek', '2026-05-11 05:58:07'),
(14, 'hayyuk', 'yuk@gmail.com', '$2y$10$/EDomVHhUjZWId71Zuaqi.HK3juske5skNGYKleQ0M5ym3BzFn/za', 'siswa', '2026-05-11 06:34:54'),
(15, 'pakde', 'pakde@gmail.com', '$2y$10$asmYoeKkk1aCl/zM6trFJOHH/2pUdw3QyQ2uN97EaNr.rJYmd.j.O', 'siswa', '2026-05-11 06:40:03'),
(16, 'hai', 'hai@gmail.com', '$2y$10$hLWeXJJeA1LqQf.jhLSIpe.4.W.50ymKEYb9UjwEhyZFSRj2OmUCu', 'siswa', '2026-05-11 07:22:22'),
(20, 'wyequweq', '123@gmail.com', '$2y$10$/Iuu1vz2ZhSPPCNg7TUh7.73Nk/.1UsQpB09c1YhQ6AqT1ia87A.a', 'siswa', '2026-05-11 07:31:11'),
(21, 'abdulbedul', 'abdul@Gmail.com', '$2y$10$fJZEyFbKChTpIhjDnXiqA.zfD4DQGwbkyouU5RlUfmHIEtlG4Bf2m', 'siswa', '2026-05-12 01:12:09'),
(22, 'abdul hadi', 'abdul12@gmail.com', '$2y$10$nkPbg1j.0LKk3UdEFZ.aY.AynVYs6HY8M9qTbwDXhTVEaeaIkcI3C', 'siswa', '2026-05-12 02:22:21'),
(23, 'Fakhrul Rozi', 'fakhrulrozi322@gmail.com', '$2y$10$95Co.hEEnCvtYrdKwk3u4eObgGvu25a/q2jtqLhXNwAK8kuw7idT.', 'siswa', '2026-05-18 04:04:17'),
(24, 'cici indriani', 'indrianicici53@gmail.com', '$2y$10$ivemimS0noikXzfolkpULOtWCy0x18rEHyRjmKQlgHMRjEedGe0e6', 'siswa', '2026-05-18 04:09:44'),
(25, 'cit', 'cie12@gmail.com', '$2y$10$mrJ0AjZEHTLe6Gk795df4uaS5WMOrX93msAUVzWkghOBiviAd8/lm', 'siswa', '2026-05-18 06:55:34'),
(26, 'hakim', 'hakim12@gmail.com', '$2y$10$anycnr.x3RLouyJl0P8gA.0kv2zgh6tL/pwsmU0ZhE36.v32uQF7e', 'siswa', '2026-05-19 01:03:09'),
(27, 'hakim cantik', 'hakimm@gmail.com', '$2y$10$RW0strpHLW7CLEkbGZ2BLeGZqKqoi5mrmC.btH7lFhbBZ2NkSHI3O', 'siswa', '2026-05-19 01:13:14'),
(28, 'hai', 'hai12@gmail.com', '$2y$10$yGkrN8QQmL0UAeBid1voj.vSTLRCmihavXrihCliJ7T5zXmHlg9.C', 'siswa', '2026-06-01 13:33:02'),
(29, 'pakde', 'pakde12@gmail.com', '$2y$10$Zw8vbdjrM1ynnwUYrNaU1OXna2gjYndBfLDaVCNr7qOrAEJObQx.m', 'siswa', '2026-06-02 01:20:42'),
(30, 'fakhrul rozi', 'apolloastro249@gmail.com', '$2y$10$hYvrKtiK4E11n0OM16hUvOCND7aESq9XLJZHW/ap8o4NHS/eITpDS', 'siswa', '2026-06-02 02:10:18'),
(31, 'abdulganteng', 'dulbedul@gmail.com', '$2y$10$c4sjBvUDDTxhTLruwMBjPOnUvguXVfMBhGboOpuarvAtT2y6mErdS', 'siswa', '2026-06-02 02:12:56'),
(32, 'ci', '1234@gmail.com', '$2y$10$Q2FBK38KznSI5LJBzir4Xuv8lYBnXE8OrJi6MdR7CPmGtMWMoRKGu', 'siswa', '2026-06-07 02:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `id` int NOT NULL,
  `pendaftaran_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `status` enum('diterima','ditolak') DEFAULT NULL,
  `catatan` text,
  `tanggal_validasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_id` (`pendaftaran_id`);

--
-- Indexes for table `pendaftaran_pkl`
--
ALTER TABLE `pendaftaran_pkl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_id` (`pendaftaran_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran_pkl`
--
ALTER TABLE `pendaftaran_pkl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `validasi`
--
ALTER TABLE `validasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran_pkl` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran_pkl`
--
ALTER TABLE `pendaftaran_pkl`
  ADD CONSTRAINT `pendaftaran_pkl_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_pkl_ibfk_2` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `validasi`
--
ALTER TABLE `validasi`
  ADD CONSTRAINT `validasi_ibfk_1` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran_pkl` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `validasi_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
