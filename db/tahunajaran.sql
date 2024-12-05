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

-- Dumping data for table lcks-skaone.semesters: ~26 rows (approximately)
INSERT INTO `semesters` (`id`, `tahun_ajaran_id`, `semester`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(2, 1, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(3, 2, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(4, 2, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(5, 3, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(6, 3, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(7, 4, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(8, 4, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(9, 5, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(10, 5, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(11, 6, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(12, 6, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(13, 7, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(14, 7, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(15, 8, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(16, 8, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(17, 9, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(18, 9, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(19, 10, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(20, 10, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(21, 11, 'Ganjil', 'Aktif', '2024-10-03 17:19:03', '2024-10-03 18:14:39'),
	(22, 11, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 18:14:39'),
	(23, 12, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(24, 12, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(25, 13, 'Ganjil', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03'),
	(26, 13, 'Genap', 'Non Aktif', '2024-10-03 17:19:03', '2024-10-03 17:19:03');

-- Dumping data for table lcks-skaone.tahun_ajarans: ~13 rows (approximately)
INSERT INTO `tahun_ajarans` (`id`, `tahunajaran`, `status`, `created_at`, `updated_at`) VALUES
	(1, '2013-2014', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(2, '2014-2015', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(3, '2015-2016', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(4, '2016-2017', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(5, '2017-2018', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(6, '2018-2019', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(7, '2019-2020', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(8, '2020-2021', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(9, '2021-2022', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(10, '2022-2023', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(11, '2023-2024', 'Aktif', NULL, NULL),
	(12, '2024-2025', 'Non Aktif', NULL, '2024-10-03 18:14:39'),
	(13, '2025-2026', 'Non Aktif', NULL, '2024-10-03 18:14:39');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
