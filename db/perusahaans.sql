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

-- Dumping data for table lcks-skaone-new.perusahaans: ~98 rows (approximately)
INSERT INTO `perusahaans` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'BADAN KEPEGAWAIAN, PENGEMBANGAN SUMBER DAYA MANUSIA PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. KH. Abdul Halim No. 107 Tlp. (0233) 281366 Majalengka 45418', NULL, NULL),
	(2, 'BADAN KEUANGAN DAN ASET DAERAH MAJALENGKA PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Jenderal Ahmad Yani No. 09 Majalengka 45411 Telp. (0233) 281167 Faximile (0233) 281167', NULL, NULL),
	(3, 'BADAN PENANGGULANGAN BENCANA DAERAH PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Gerakan Koperasi No. 43 Telp/Fax. (0233) 281127 â€“ 283044 Majalengka', NULL, NULL),
	(4, 'BAPENDA UPTD PUSAT PENGELOLAAN PENDAPATAN DAERAH PEMERINTAH PROVINSI JAWA BARAT', 'Jl. KH Abdul Halim No. 88 Majalengka Tlp. (0233) 081410 Fax. (0233) 081410', NULL, NULL),
	(5, 'BADAN PERTANAHAN NASIONAL PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. Gerakan Koperasi No. 41 Majalengka Telp. (0233) 281063', NULL, NULL),
	(6, 'BALAI PELATIHAN LINGKUNGAN HIDUP DAN KEHUTANAN KADIPATEN', 'Jl. Raya Timur Kadipaten Kotak Pos 11 Kadipaten Kab.Majalengka 45452 Kab.Majalengka', NULL, NULL),
	(7, 'BANK BJB KANTOR CABANG MAJALENGKA ', 'Jl. KH. Abdul Halim No. 107 Tlp. (0233) 28156 -105 Majalengka 45418', NULL, NULL),
	(8, 'BANK BJB KANTOR CABANG PEMBANTU KADIPATEN ', 'Jl. Raya Timur No. 45 Kadipaten Dawuan-Majalengka 45453', NULL, NULL),
	(9, 'BPJS KESEHATAN KABUPATEN MAJALENGKA', 'Ruko Kapital Poin Majalengka, Jl. K.H Abdul Halim, Majalengka Kulon-Majalengka', NULL, NULL),
	(10, 'DINAS PEKERJAAN UMUM DAN TATA RUANG PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Kyai Haji Abdul Halim No.99 Kabupaten Majalengka, Jawa Barat 45418', NULL, NULL),
	(11, 'DINAS KEPENDUDUKAN DAN CATATAN SIPIL PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Raya K.H. Abdul Halim No. 483 Majalengka-Jawa Barat 45414', NULL, NULL),
	(12, 'DINAS LINGKUNGAN HIDUP PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Gerakan Koperasi No. 38 Majalengka 45411', NULL, NULL),
	(13, 'DINAS PARIWISATA DAN KEBUDAYAAN PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. KH Abdul Halim No.333, Majalengka Wetan-Majalengka 45411', NULL, NULL),
	(14, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA (DPMD) PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Ahmad Kusumah No. 58  Kab. Majalengka, Jawa Barat', NULL, NULL),
	(15, 'DINAS PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK DAN KELUARGA BERENCANA PEMERINTAH KABUPATEN MAJALENGKA', 'Jl.Ahmad Yani - Majalengka', NULL, NULL),
	(16, 'DINAS PEMUDA DAN OLAH RAGA PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Siti Armilah No. 11 Tlp/Fax (0233) 8291739 Majalengka 45418 ', NULL, NULL),
	(17, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. KH. Abdul Halim No. 97 ,  Majalengka', NULL, NULL),
	(18, 'DINAS PENDIDIKAN PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. KH. Abdul Halim No. 233 Majalengka Tlp. (0233) 281097', NULL, NULL),
	(19, 'DINAS PERDAGANGAN PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Siti Armilah No. 8, Majalengka Kulon, Kec. Majalengka. Kab. Majalengka, Jawa Barat 45418', NULL, NULL),
	(20, 'DINAS PERHUBUNGAN PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. Pangeran Muhammad KM 5 Simpeureum - Majalengka', NULL, NULL),
	(21, 'DINAS PERTANIAN DAN KETAHANAN PANGAN KABUPATEN MAJALENGKA', 'Jalan KH. Abdul Halim No. 31  Telp. (0233) 281545 Fax. (0233) 281636 Majalengka 45417', NULL, NULL),
	(22, 'DINAS PERUMAHAN KAWASAN PERMUKIMAN DAN PERTANAHAN PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan K.H. Abdul Halim No.69 Telp. (0233) 281605 Fax. (0233) 282223 Majalengka 45417', NULL, NULL),
	(23, 'DINAS SOSIAL PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. KH. Abdul Halim Tonjong - Majalengka', NULL, NULL),
	(24, 'JC KOMPTER DISTRIBUTION & ACCECORIES', 'Jalan Pasar Balong No.34, Tlp. (0233) 662599 Kadipaten 45452', NULL, NULL),
	(25, 'KANTOR KEMENTRIAN AGAMA KABUPATEN MAJALENGKA', 'Jalan Siti Armilah No. 1, Majalengka Kulon-Majalengka 45418', NULL, NULL),
	(26, 'DIREKTORAT JENDRAL PAJAK KANTOR PELAYANAN, PENYULUHAN, DAN KONSULTASI PERPAJAKAN (KP2KP) MAJALENGKA', 'Jalan K.H. Abdul Halim No. 63 Munjul Kec.Majalengka Kab. Majalengka Telp./Fax 0233 281629 Majalengka', NULL, NULL),
	(27, 'KANTOR PMI KABUPATEN MAJALENGKA ', 'Jalan KH. Abdul Halim No. 313 Majalengka Telp./Fax. (0233) 281539', NULL, NULL),
	(28, 'KECAMATAN CIGASONG PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. Raya Tonjong Jatiwangi - Cigasong', NULL, NULL),
	(29, 'KECAMATAN DAWUAN PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Raya Kadipaten Cirebon, Sinarjati Dawuan-Majalengka 45453', NULL, NULL),
	(30, 'KECAMATAN JATITUJUH PEMERINTAH KABUPATEN MAJALENGKA', 'Jalan Raya Jatitujuh No. 1, Jatitujuh, Kabupaten Majalengka, Jawa Barat 45458', NULL, NULL),
	(31, 'KECAMATAN KADIPATEN PEMERINTAH KABUPATEN MAJALENGKA', 'Alamat: Jalan Raya Heuleut Nomor 2 Telp. (0233) 661005 Kadipaten-Majalengka 45452', NULL, NULL),
	(32, 'KECAMATAN KASOKANDEL PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. Desa Kasokandel No.01 Kasokandel 45478', NULL, NULL),
	(33, 'KECAMATAN KERTAJATI PEMERINTAH KABUPATEN MAJALENGKA', 'Kertajati', NULL, NULL),
	(34, 'KECAMATAN MAJALENGKA PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. Gerakan Koperasi Majalengka No 45, Majalengka', NULL, NULL),
	(35, 'KECAMATAN PANYINGKIRAN PEMERINTAH KABUPATEN MAJALENGKA', 'Jl. Siliwangi No 10 Panyingkiran 45459 , Majalengka', NULL, NULL),
	(36, 'KPRI HIKMAH KEMENTRIAN AGAMA MAJALENGKA', 'Alamat : Jalan Siti Armilah No. 27 Tlp. (0233) 281329 Majalengka 45418', NULL, NULL),
	(37, 'PRIMER KOPERASI KARTIKA SINDANGKASIH KODIM 0617 MAJALENGKA', 'Jl. KH. Abdul Halim Tlp. (0233) 283727 Tonjong-Majalengka 45414', NULL, NULL),
	(38, 'KPRI KOKARDAN KABUPATEN MAJALENGKA ', 'Jl. Gerakan Koperasi No. 43 Telp. (0233) 282472 Majalengka Wetan 45414 ', NULL, NULL),
	(39, 'KPRI MITRA SEJAHTERA RUMAH SAKIT UMUM DAERAH MAJALENGKA', 'JL. KESEHATAN NO.40 MAJALENGKA 45411 TELP.2835882', NULL, NULL),
	(40, 'NOTARIS & PPAT DWI SAPTA NINGRUM, SH,M.Kn. SUMEDANG', 'Jl Raya Tomo No 52,Tomo Sumedang', NULL, NULL),
	(41, 'PD. BERDIKARI MOTOR 1 DAWUAN ', 'Jl.Raya Cirebon-Paliman, Kasokandel, Kabupaten Majalengka 45453', NULL, NULL),
	(42, 'PERUSAHAAN DAERAH AIR MINUM (PDAM) MAJALENGKA ', 'Jl. Laswi No. 2 Tonjong Majalengka 45414', NULL, NULL),
	(43, 'PENGADILAN AGAMA MAJALENGKA KELAS I. A ', 'Jl. Siliwangi No. 9 KM. 7 Majalengka 45459', NULL, NULL),
	(44, 'PENGADILAN NEGERI MAJALENGKA ', 'Jalan KH. Abdul Halim No. 499 Telp. (0233) 281074 Fax. (0233) Majalengka 281134\nWebsite : www.pn-majalengka.go.id e-mail : pn.majalengka@gmail.com', NULL, NULL),
	(45, 'BANK MAJALENGKA KANTOR CABANG KADIPATEN', 'Jl. Pasar Balong No.26 Telp./Fax. (0233) 662398 Kadipaten-Majalengka 45452', NULL, NULL),
	(46, 'WIJAYA KARYA. PT KANTOR CABANG KAB. MAJALENGKA', 'JL. Raya Burujul Kulon, Jatiwangi, Burujul Kulon, Majalengka, Kabupaten Majalengka, Jawa Barat 45454, Indonesia', NULL, NULL),
	(47, 'KOPERASI SALUYU', 'Jl. Ahmad Yani No.41, Majalengka Wetan, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45418', NULL, NULL),
	(48, 'PT. BERDIKARI MOTOR JAYA II JATIWANGI - MAJALENGKA', 'Jalan Ahmad Yani  No. 1 Jatiwangi â€“ Majalengka 45454 ', NULL, NULL),
	(49, 'PT. BERDIKARI MOTOR HONDA KADIPATEN ', 'Jalan Siliwangi No. 1 Doar  Selatan. Kadipaten â€“ Majalengka Telepon (0233) 661145, Faksimile (0233) 663500 ', NULL, NULL),
	(50, 'PT. BPR MAJALENGKA JABAR KANTOR CABANG PANYINGKIRAN', 'Karyamukti, Panyingkiran, Kabupaten Majalengka, Jawa Barat 45459', NULL, NULL),
	(51, 'BANK MAJALENGKA KANTOR PUSAT ', 'Jalan K.H. Abdul Halim No.388 Majalengka Telp. (0233) 282395, 282499 Fax (0233) 282498', NULL, NULL),
	(52, 'PT. PG. RAJAWALI II UNIT JATITUJUH MAJALENGKA ', 'Desa Sumber Kulon Kecamatan Jatitujuh Kabupaten Majalengka', NULL, NULL),
	(53, 'PT. PLN (PERSERO) DISTRIBUSI JAWA BARAT AREA SUMEDANG RAYON MAJALENGKA', 'JL. KH. Abdul Halim No. 145, Majalengka', NULL, NULL),
	(54, 'PT. POS INDONESIA (PERSERO) KANTOR POS CABANG JATIWANGI - MAJALENGKA', 'Jl. Raya Ciborelang Jatiwangi - Majalengka', NULL, NULL),
	(55, 'PT. POS INDONESIA (PERSERO) KANTOR POS CABANG KADIPATEN - MAJALENGKA', 'JL. Raya Timur No. 9,  Kadipaten, Majalengka, Jawa Barat', NULL, NULL),
	(56, 'BANK MINI BINA SENTOSA SMK NEGERI 1 KADIPATEN', 'Jalan Siliwangi No 30 Kadipaten-Majalengka 45452', NULL, NULL),
	(57, 'SEKRETARIAT DAERAH KABUPATEN MAJALENGKA', 'Jalan Jenderal Ahmad Yani No. 1 Majalengka 45418, Telp. (0233) 281022-281217', NULL, NULL),
	(58, 'SEKRETARIAT DPRD KABUPATEN MAJALENGKA', 'Jl. KH. Abdul Halim No.247 Majalengka 45418 Tlp. (0233) 281094', NULL, NULL),
	(59, 'SMP NEGERI 1 KASOKANDEL ', 'Jalan Desa Kasokandel Kotak Pos 5 Kadipaten 45452', NULL, NULL),
	(60, 'UNIVERSITAS YPIB ', 'Jl. Gerakan Koperasi Majalengka', NULL, NULL),
	(61, 'TOSERBA SURYA KADIPATEN', 'Jl. Siliwangi No. 02 Kadipaten-Majalengka 45452', NULL, NULL),
	(62, 'YOGYA GRAND MAJALENGKA ', 'Jl. KH Abdul Halim No.146 Majalengka-Majalengka 45418', NULL, NULL),
	(63, 'UNIVERSITAS MAJALENGKA ', 'Jl. KH. Abdul Halim No. 103 Majalengka 45418', NULL, NULL),
	(64, 'DINAS PEKERJAAN UMUM DAN TATA RUANG UNIT PELAKSANA TEKNIS SUMBER DAYA AIR MAJALENGKA PEMERINTAH KABUPATEN MAJALENGKA', 'Komplek Bendung Tirtanegara, Jalan Sukajaya Timur - Majalengka', NULL, NULL),
	(65, 'PERUM PERHUTANI KPH MAJALENGKA DIVISI REGIONAL JAWA BARAT DAN BANTEN', 'Jl. Kehutanan No 205 Majalengka, Telp. 0233 281215  Fax. 0233 281513', NULL, NULL),
	(66, 'DINAS KETENAGAKERJAAN, KOPERASI DAN UKM PEMERINTAH KABUPATEN MAJALENGKA', 'JL. Suma No. 422 Majalengka 45411', NULL, NULL),
	(67, 'BANK MUAMALAT KANTOR CABANG PEMBANTU MAJALENGKA', 'Jl. KH. Abdul Halim No. 81 Rt/rw 03/11, Majalengka Kulon-Majalengka 45418', NULL, NULL),
	(68, 'POWER KOMPUTER', 'Jalan Raya Ciborelang - Jatiwangi', NULL, NULL),
	(69, 'CAHAYA KOMPUTER', 'Jl. Pasukan Sindangkasih No.84, Cigasong - Majalengka 45476', NULL, NULL),
	(70, 'CV ALALI DIGITALINIA', 'Lapangsari-Liangjulang', NULL, NULL),
	(71, 'KECAMATAN TOMO PEMERINTAH KABUPATEN SUMEDANG', 'Tomo, Kec. Tomo, Kabupaten Sumedang, Jawa Barat 45382', NULL, NULL),
	(72, 'KECAMATAN UJUNG JAYA PEMERINTAH KABUPATEN SUMEDANG', 'Jalan Raya Kosambian; Ujungjaya-Sumedang 45383', NULL, NULL),
	(73, 'KECAMATAN JATIGEDE', 'Jalan PLTA Parakankondang No.06, Cijeungjing, Jatigede-Sumedang45377', NULL, NULL),
	(74, 'TATA USAHA SMK NEGERI 1 KADIPATEN ', 'Jl. Siliwangi No. 30 Kadipaten', NULL, NULL),
	(75, 'BADAN PENDAPATAN DAERAH KABUPATEN MAJALENGKA', 'Jl. Tonjong Jatiwangi', NULL, NULL),
	(76, 'CALVIN COMPUTER &CELL', 'Jl. Raya Ciborelang No.84, Ciborelang, Kec. Jatiwangi, Kabupaten Majalengka, Jawa Barat 45454', NULL, NULL),
	(77, 'PERGURUAN DAARUL ULUUM PUI MAJALENGKA', 'Jalan Siti Armilah No.9, Majalengka Wetan, Majalengka Kulon, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45418', NULL, NULL),
	(78, 'MASTER PRINT PERCTAKAN DAN DIGITAL PRINTING', 'Jl. Raya Timur No.50 46, Dawuan, Kec. Dawuan, Kabupaten Majalengka, Jawa Barat 45452', NULL, NULL),
	(79, 'REP COMPUTER', 'Jl. Wargasentana No. 023 Rt. 02 Rw. Desa Ciborelang Kec. Jatiwangi 45454\nMajalengka-Jawa Barat', NULL, NULL),
	(80, 'INSTBUNAS', 'Jl. Siliwangi No.121, Heuleut, Kec. Kadipaten, Kabupaten Majalengka, Jawa Barat 45452', NULL, NULL),
	(81, 'BANK BJB SYARIAH CABANG MAJALENGKA', 'Jl. Raya K H Abdul Halim No.517, Cigasong 4541\nMajalengka', NULL, NULL),
	(82, 'BANK SYARIAH INDONESIA KCP ABDUL HALIM 1', 'Jl. KH. Abdul Halim Majalengka 45418\nMajalengka', NULL, NULL),
	(83, 'SOLARIS DIGITAL PRINTING MAJALENGKA', 'Jalan KH. Abdul Halim Depan ALFANET', NULL, NULL),
	(84, 'SKB KABUPATEN MAJALENGKA', 'Jl. K.H.Abdul Halim, Majalengka Kulon, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45418', NULL, NULL),
	(85, 'KANTOR KOMISI PEMILIHAN UMUM (KPU) KABUPATEN MAJALENGKA', 'Jalan Gerakan Koperasi No.18, Majalengka Wetan, Majalengka, Majalengka Wetan, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45411', NULL, NULL),
	(86, 'Ariera Service', 'Jl. Pakauman, Cideres', NULL, NULL),
	(87, 'HOTEL FITRA MAJALENGKA', 'Jl. K.H.Abdul Halim No.88, Munjul, Kec. Majalengka-Majalengka 45418', NULL, NULL),
	(88, 'KEJAKSAAN NEGERI MAJALENGKA', 'Jl. Jatiwangi - Cigasong Majalengka', NULL, NULL),
	(89, 'APTECH COMPUTER', 'Jl. Siliwangi, Telukjambe Utara Desa Kadipaten Kabupaten Majalengka 45452', NULL, NULL),
	(90, 'BD MART SMKN 1 KADIPATEN', 'Jl. Siliwangi No. 30 Kadipaten', NULL, NULL),
	(91, 'PUTRA JAYA HOTEL MAJALENGKA', 'Jl. K.H.Abdul Halim No.74, Majalengka Kulon 45418', NULL, NULL),
	(92, 'JAGAWALUNGAN CAFÃ‰ MAJALENGKA', 'Jln. Majalengka Ring Road no 333. Baribis Majalengka', NULL, NULL),
	(93, 'KANTOR AKUNTAN SUKMA JAYA', 'Jl. K.H Abdul Halim No. 73, Majalengka Kulon, Kec. Majalengka, Kab. Majalengka, Jawa Barat 45417', NULL, NULL),
	(94, 'PT. GIANDRA SAKA MEDIA', 'Jl. Ahmad Kusumah, Majalengka Wetan, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45411', NULL, NULL),
	(95, 'NOTARIS DAN PPAT NURHAYATI,SH,MKn.', 'Dusun Sukamaju Blok Banas Rt.007/Rw.003 No.94,Babakan,Kec. Kertajati,Kabupaten Majalengka,Jawa Barat 45457', NULL, NULL),
	(96, 'LP Majalengka/ Kanwil KemHUM dan HAM Jawa Barat', 'Jl. Jakarta No. 27 Kebonwaru Kec. Batununggal-Bandung 40272', NULL, NULL),
	(97, 'PT KRISNA SATYA TOUR', 'JALAN RAYA TONJONG-PINANGRAJA KM 1 BLOK. 1 Kabupaten Majalengka, Jawa Barat', NULL, NULL),
	(98, 'asdfasdfs asdf asdf', 'sad fasdf awer df waerf asdfasdf asdfasfd', '2024-11-03 03:31:20', '2024-11-03 03:31:20'),
	(99, 'Amanat Firma', 'Kadipaten', '2024-11-03 08:41:50', '2024-11-03 08:41:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
