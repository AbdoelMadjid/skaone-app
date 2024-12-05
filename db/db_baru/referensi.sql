-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table lcks-skaone.referensis: ~78 rows (approximately)
INSERT INTO `referensis` (`id`, `jenis`, `data`, `created_at`, `updated_at`) VALUES
	(1, 'Agama', 'Islam', NULL, NULL),
	(2, 'Agama', 'Protestan', NULL, NULL),
	(3, 'Agama', 'Katolik', NULL, NULL),
	(4, 'Agama', 'Hindu', NULL, NULL),
	(5, 'Agama', 'Budha', NULL, NULL),
	(6, 'Agama', 'Kong Hu Cu', NULL, NULL),
	(7, 'Agama', 'Advent', NULL, NULL),
	(8, 'Jabatan', 'Kepala Sekolah', NULL, NULL),
	(9, 'Jabatan', 'Wakil Kepala Sekolah', NULL, NULL),
	(10, 'Jabatan', 'Ketua Program Studi', NULL, NULL),
	(11, 'Jabatan', 'Kepala Laboratorium', NULL, NULL),
	(12, 'Jabatan', 'Staf Wakasek', NULL, NULL),
	(13, 'Jabatan Wakasek', 'Bidang Kurikulum/Akademik', NULL, NULL),
	(14, 'Jabatan Wakasek', 'Bidang Kesiswaan', NULL, NULL),
	(15, 'Jabatan Wakasek', 'Bidang Hubungan Industri/Masyarakat', NULL, NULL),
	(16, 'Jabatan Wakasek', 'Bidang Sarana Prasarana', NULL, NULL),
	(17, 'Jabatan Wakasek', 'Staf Wakasek Kurikulum/Akademik', NULL, NULL),
	(18, 'Jabatan Wakasek', 'Staf Wakasek Kesiswaan', NULL, NULL),
	(19, 'Jabatan Wakasek', 'Staf Wakasek Hubungan Industri/Masyarakat', NULL, NULL),
	(20, 'Jabatan Wakasek', 'Staf Wakasek Sarana Prasarana', NULL, NULL),
	(21, 'Pekerjaan', 'PNS', NULL, NULL),
	(22, 'Pekerjaan', 'TNI', NULL, NULL),
	(23, 'Pekerjaan', 'POLRI', NULL, NULL),
	(24, 'Pekerjaan', 'Pegawai BUMN', NULL, NULL),
	(25, 'Pekerjaan', 'Pegawai BUMB', NULL, NULL),
	(26, 'Pekerjaan', 'Pegawai Swasta', NULL, NULL),
	(27, 'Pekerjaan', 'Wiraswasta', NULL, NULL),
	(28, 'Pekerjaan', 'Buruh', NULL, NULL),
	(29, 'Pekerjaan', 'Buruh Pabrik', NULL, NULL),
	(30, 'Pekerjaan', 'Buruh Tani', NULL, NULL),
	(31, 'Pekerjaan', 'Ibu Rumah Tanggal', NULL, NULL),
	(32, 'Pekerjaan', 'Lainnya', NULL, NULL),
	(33, 'KodeMapel', 'UM', NULL, NULL),
	(34, 'KodeMapel', 'KJR', NULL, NULL),
	(35, 'KodeMapel', 'DPK-AK', NULL, NULL),
	(36, 'KodeMapel', 'KK-AK', NULL, NULL),
	(37, 'KodeMapel', 'MPP-AK', NULL, NULL),
	(38, 'KodeMapel', 'DPK-BD', NULL, NULL),
	(39, 'KodeMapel', 'KK-BD', NULL, NULL),
	(40, 'KodeMapel', 'MPP-BD', NULL, NULL),
	(41, 'KodeMapel', 'DPK-MP', NULL, NULL),
	(42, 'KodeMapel', 'KK-MP', NULL, NULL),
	(43, 'KodeMapel', 'MPP-MP', NULL, NULL),
	(44, 'KodeMapel', 'DPK-RPL', NULL, NULL),
	(45, 'KodeMapel', 'KK-RPL', NULL, NULL),
	(46, 'KodeMapel', 'MPP-RPL', NULL, NULL),
	(47, 'KodeMapel', 'DPK-TKJ', NULL, NULL),
	(48, 'KodeMapel', 'KK-TKJ', NULL, NULL),
	(49, 'KodeMapel', 'MPP-TKJ', NULL, NULL),
	(50, 'JabatanTeam', 'Programming & Scripting', NULL, NULL),
	(51, 'JabatanTeam', 'Database Management', NULL, NULL),
	(52, 'JabatanTeam', 'End-User Management', NULL, NULL),
	(53, 'JabatanTeam', 'Style Management', NULL, NULL),
	(54, 'JabatanTeam', 'Review & Feed-back Management', NULL, NULL),
	(55, 'JabatanTeam', 'Nettworking Management', NULL, NULL),
	(56, 'EskulWajib', 'Pramuka', '2024-10-18 23:16:41', '2024-10-18 23:16:41'),
	(57, 'EskulPilihan', 'Bola Basket', '2024-10-18 23:17:23', '2024-10-18 23:17:23'),
	(58, 'EskulPilihan', 'Bola Voli', '2024-10-18 23:17:46', '2024-10-18 23:17:46'),
	(59, 'EskulPilihan', 'Marching Band', '2024-10-18 23:18:27', '2024-10-18 23:18:27'),
	(60, 'EskulPilihan', 'Pasbraka', '2024-10-18 23:18:49', '2024-10-18 23:18:49'),
	(61, 'EskulPilihan', 'PMR', '2024-10-18 23:18:58', '2024-10-18 23:18:58'),
	(62, 'EskulPilihan', 'PKS', '2024-10-18 23:19:17', '2024-10-18 23:19:17'),
	(63, 'EskulPilihan', 'Karate', '2024-10-18 23:19:26', '2024-10-18 23:19:26'),
	(64, 'EskulPilihan', 'Futsal', '2024-10-18 23:19:40', '2024-10-18 23:19:40'),
	(65, 'EskulPilihan', 'Paduan Suara', '2024-10-18 23:19:55', '2024-10-18 23:19:55'),
	(66, 'EskulPilihan', 'Karya Ilmiah', '2024-10-18 23:20:04', '2024-10-18 23:20:04'),
	(67, 'EskulPilihan', 'Jurnalistik', '2024-10-18 23:20:21', '2024-10-18 23:20:21'),
	(68, 'EskulPilihan', 'Majalah Dinding (mading)', '2024-10-18 23:20:37', '2024-10-18 23:20:37'),
	(69, 'EskulPilihan', 'Kerohanian Bidang Dakwah', '2024-10-18 23:20:54', '2024-10-18 23:20:54'),
	(70, 'EskulPilihan', 'Pasukan Pramuka', '2024-10-18 23:21:09', '2024-10-18 23:21:09'),
	(71, 'EskulPilihan', 'Nasyid', '2024-10-18 23:21:25', '2024-10-18 23:21:25'),
	(72, 'EskulPilihan', 'Kaligrafi', '2024-10-18 23:21:36', '2024-10-18 23:21:36'),
	(73, 'EskulPilihan', 'Basa Tulis AL-Qur\'an', '2024-10-18 23:21:57', '2024-10-18 23:21:57'),
	(74, 'EskulPilihan', 'English Club', '2024-10-18 23:22:11', '2024-10-18 23:22:11'),
	(75, 'EskulPilihan', 'Taekwondo', '2024-10-18 23:22:27', '2024-10-18 23:22:27'),
	(76, 'EskulPilihan', 'Tenis Meja\'', '2024-10-18 23:22:45', '2024-10-18 23:22:45'),
	(77, 'EskulPilihan', 'Bulutangkis (badminton)', '2024-10-18 23:23:04', '2024-10-18 23:23:04'),
	(78, 'EskulPilihan', 'Pencak Silat', '2024-10-18 23:23:20', '2024-10-18 23:23:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
