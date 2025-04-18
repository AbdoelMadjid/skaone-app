<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranPerJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("
            INSERT INTO `mata_pelajaran_per_jurusans` (`id`, `kode_kk`, `kel_mapel`, `kode_mapel`, `mata_pelajaran`, `semester_1`, `semester_2`, `semester_3`, `semester_4`, `semester_5`, `semester_6`, `created_at`, `updated_at`) VALUES
            (1, '411', 'A-01-UM', '411-A-01-UM', 'Pendidikan Agama Islam dan Budi Pekerti', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:03', '2024-10-03 17:49:03'),
            (2, '421', 'A-01-UM', '421-A-01-UM', 'Pendidikan Agama Islam dan Budi Pekerti', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:03', '2024-10-03 17:49:03'),
            (3, '811', 'A-01-UM', '811-A-01-UM', 'Pendidikan Agama Islam dan Budi Pekerti', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:03', '2024-10-03 17:49:03'),
            (4, '821', 'A-01-UM', '821-A-01-UM', 'Pendidikan Agama Islam dan Budi Pekerti', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:03', '2024-10-03 17:49:03'),
            (5, '833', 'A-01-UM', '833-A-01-UM', 'Pendidikan Agama Islam dan Budi Pekerti', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:03', '2024-10-03 17:49:03'),
            (6, '411', 'A-02-UM', '411-A-02-UM', 'Pendidikan Pancasila', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:22', '2024-10-03 17:49:22'),
            (7, '421', 'A-02-UM', '421-A-02-UM', 'Pendidikan Pancasila', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:22', '2024-10-03 17:49:22'),
            (8, '811', 'A-02-UM', '811-A-02-UM', 'Pendidikan Pancasila', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:22', '2024-10-03 17:49:22'),
            (9, '821', 'A-02-UM', '821-A-02-UM', 'Pendidikan Pancasila', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:22', '2024-10-03 17:49:22'),
            (10, '833', 'A-02-UM', '833-A-02-UM', 'Pendidikan Pancasila', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:22', '2024-10-03 17:49:22'),
            (11, '411', 'A-03-UM', '411-A-03-UM', 'Bahasa Indonesia', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:28', '2024-10-03 17:49:28'),
            (12, '421', 'A-03-UM', '421-A-03-UM', 'Bahasa Indonesia', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:28', '2024-10-03 17:49:28'),
            (13, '811', 'A-03-UM', '811-A-03-UM', 'Bahasa Indonesia', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:28', '2024-10-03 17:49:28'),
            (14, '821', 'A-03-UM', '821-A-03-UM', 'Bahasa Indonesia', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:29', '2024-10-03 17:49:29'),
            (15, '833', 'A-03-UM', '833-A-03-UM', 'Bahasa Indonesia', 1, 1, 1, 1, 1, 1, '2024-10-03 17:49:29', '2024-10-03 17:49:29'),
            (16, '411', 'A-04-UM', '411-A-04-UM', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 1, 1, 1, 1, 0, 0, '2024-10-03 17:49:47', '2024-10-03 17:49:47'),
            (17, '421', 'A-04-UM', '421-A-04-UM', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 1, 1, 1, 1, 0, 0, '2024-10-03 17:49:47', '2024-10-03 17:49:47'),
            (18, '811', 'A-04-UM', '811-A-04-UM', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 1, 1, 1, 1, 0, 0, '2024-10-03 17:49:47', '2024-10-03 17:49:47'),
            (19, '821', 'A-04-UM', '821-A-04-UM', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 1, 1, 1, 1, 0, 0, '2024-10-03 17:49:47', '2024-10-03 17:49:47'),
            (20, '833', 'A-04-UM', '833-A-04-UM', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 1, 1, 1, 1, 0, 0, '2024-10-03 17:49:47', '2024-10-03 17:49:47'),
            (21, '411', 'A-05-UM', '411-A-05-UM', 'Sejarah', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:13', '2024-10-03 17:50:13'),
            (22, '421', 'A-05-UM', '421-A-05-UM', 'Sejarah', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:13', '2024-10-03 17:50:13'),
            (23, '811', 'A-05-UM', '811-A-05-UM', 'Sejarah', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:13', '2024-10-03 17:50:13'),
            (24, '821', 'A-05-UM', '821-A-05-UM', 'Sejarah', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:13', '2024-10-03 17:50:13'),
            (25, '833', 'A-05-UM', '833-A-05-UM', 'Sejarah', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:13', '2024-10-03 17:50:13'),
            (26, '411', 'A-06-UM', '411-A-06-UM', 'Seni Budaya', 1, 1, 0, 0, 0, 0, '2024-10-03 17:50:24', '2024-10-03 17:50:24'),
            (27, '421', 'A-06-UM', '421-A-06-UM', 'Seni Budaya', 1, 1, 0, 0, 0, 0, '2024-10-03 17:50:24', '2024-10-03 17:50:24'),
            (28, '811', 'A-06-UM', '811-A-06-UM', 'Seni Budaya', 1, 1, 0, 0, 0, 0, '2024-10-03 17:50:24', '2024-10-03 17:50:24'),
            (29, '821', 'A-06-UM', '821-A-06-UM', 'Seni Budaya', 1, 1, 0, 0, 0, 0, '2024-10-03 17:50:24', '2024-10-03 17:50:24'),
            (30, '833', 'A-06-UM', '833-A-06-UM', 'Seni Budaya', 1, 1, 0, 0, 0, 0, '2024-10-03 17:50:24', '2024-10-03 17:50:24'),
            (31, '411', 'A-07-UM', '411-A-07-UM', 'Muatan Lokal (Bahasa Sunda)', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:46', '2024-10-03 17:50:46'),
            (32, '421', 'A-07-UM', '421-A-07-UM', 'Muatan Lokal (Bahasa Sunda)', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:46', '2024-10-03 17:50:46'),
            (33, '811', 'A-07-UM', '811-A-07-UM', 'Muatan Lokal (Bahasa Sunda)', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:46', '2024-10-03 17:50:46'),
            (34, '821', 'A-07-UM', '821-A-07-UM', 'Muatan Lokal (Bahasa Sunda)', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:46', '2024-10-03 17:50:46'),
            (35, '833', 'A-07-UM', '833-A-07-UM', 'Muatan Lokal (Bahasa Sunda)', 1, 1, 1, 1, 0, 0, '2024-10-03 17:50:46', '2024-10-03 17:50:46'),
            (36, '411', 'A-08-UM', '411-A-08-UM', 'Muatan Lokal (Penjas)', 0, 0, 0, 0, 1, 0, '2024-10-03 17:50:57', '2024-10-03 17:50:57'),
            (37, '421', 'A-08-UM', '421-A-08-UM', 'Muatan Lokal (Penjas)', 0, 0, 0, 0, 1, 0, '2024-10-03 17:50:57', '2024-10-03 17:50:57'),
            (38, '811', 'A-08-UM', '811-A-08-UM', 'Muatan Lokal (Penjas)', 0, 0, 0, 0, 1, 0, '2024-10-03 17:50:57', '2024-10-03 17:50:57'),
            (39, '821', 'A-08-UM', '821-A-08-UM', 'Muatan Lokal (Penjas)', 0, 0, 0, 0, 1, 0, '2024-10-03 17:50:57', '2024-10-03 17:50:57'),
            (40, '833', 'A-08-UM', '833-A-08-UM', 'Muatan Lokal (Penjas)', 0, 0, 0, 0, 1, 0, '2024-10-03 17:50:57', '2024-10-03 17:50:57'),
            (41, '411', 'B1-01-KJR', '411-B1-01-KJR', 'Matematika', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:11', '2024-10-03 17:51:11'),
            (42, '421', 'B1-01-KJR', '421-B1-01-KJR', 'Matematika', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:11', '2024-10-03 17:51:11'),
            (43, '811', 'B1-01-KJR', '811-B1-01-KJR', 'Matematika', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:11', '2024-10-03 17:51:11'),
            (44, '821', 'B1-01-KJR', '821-B1-01-KJR', 'Matematika', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:11', '2024-10-03 17:51:11'),
            (45, '833', 'B1-01-KJR', '833-B1-01-KJR', 'Matematika', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:11', '2024-10-03 17:51:11'),
            (46, '411', 'B1-02-KJR', '411-B1-02-KJR', 'Bahasa Inggris', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:20', '2024-10-03 17:51:20'),
            (47, '421', 'B1-02-KJR', '421-B1-02-KJR', 'Bahasa Inggris', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:20', '2024-10-03 17:51:20'),
            (48, '811', 'B1-02-KJR', '811-B1-02-KJR', 'Bahasa Inggris', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:20', '2024-10-03 17:51:20'),
            (49, '821', 'B1-02-KJR', '821-B1-02-KJR', 'Bahasa Inggris', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:20', '2024-10-03 17:51:20'),
            (50, '833', 'B1-02-KJR', '833-B1-02-KJR', 'Bahasa Inggris', 1, 1, 1, 1, 1, 1, '2024-10-03 17:51:20', '2024-10-03 17:51:20'),
            (51, '411', 'B1-03-KJR', '411-B1-03-KJR', 'Informatika', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:35', '2024-10-03 17:51:35'),
            (52, '421', 'B1-03-KJR', '421-B1-03-KJR', 'Informatika', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:35', '2024-10-03 17:51:35'),
            (53, '811', 'B1-03-KJR', '811-B1-03-KJR', 'Informatika', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:35', '2024-10-03 17:51:35'),
            (54, '821', 'B1-03-KJR', '821-B1-03-KJR', 'Informatika', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:35', '2024-10-03 17:51:35'),
            (55, '833', 'B1-03-KJR', '833-B1-03-KJR', 'Informatika', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:35', '2024-10-03 17:51:35'),
            (56, '411', 'B1-04-KJR', '411-B1-04-KJR', 'Projek Ilmu Pengetahuan Alam dan Sosial', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:45', '2024-10-03 17:51:45'),
            (57, '421', 'B1-04-KJR', '421-B1-04-KJR', 'Projek Ilmu Pengetahuan Alam dan Sosial', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:45', '2024-10-03 17:51:45'),
            (58, '811', 'B1-04-KJR', '811-B1-04-KJR', 'Projek Ilmu Pengetahuan Alam dan Sosial', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:45', '2024-10-03 17:51:45'),
            (59, '821', 'B1-04-KJR', '821-B1-04-KJR', 'Projek Ilmu Pengetahuan Alam dan Sosial', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:45', '2024-10-03 17:51:45'),
            (60, '833', 'B1-04-KJR', '833-B1-04-KJR', 'Projek Ilmu Pengetahuan Alam dan Sosial', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:45', '2024-10-03 17:51:45'),
            (61, '833', 'B2-01-DPK-AK', '833-B2-01-DPK-AK', 'Akuntansi Dasar', 1, 1, 0, 0, 0, 0, '2024-10-03 17:51:57', '2024-10-03 17:51:57'),
            (62, '833', 'B2-02-DPK-AK', '833-B2-02-DPK-AK', 'Apliksasi Spreed Sheet', 1, 1, 0, 0, 0, 0, '2024-10-03 17:52:26', '2024-10-03 17:52:26'),
            (63, '833', 'B2-03-DPK-AK', '833-B2-03-DPK-AK', 'Prinsip Profesional Bekerja dan K3LH', 1, 1, 0, 0, 0, 0, '2024-10-03 17:52:49', '2024-10-03 17:52:49'),
            (64, '833', 'B3-01-KK-AK', '833-B3-01-KK-AK', 'Komputer Akuntansi', 0, 0, 1, 1, 1, 0, '2024-10-03 17:53:08', '2024-10-03 17:53:08'),
            (65, '833', 'B3-02-KK-AK', '833-B3-02-KK-AK', 'Akuntansi Keuangan', 0, 0, 1, 1, 1, 0, '2024-10-03 17:53:18', '2024-10-03 17:53:18'),
            (66, '833', 'B3-03-KK-AK', '833-B3-03-KK-AK', 'Ekonomi Bisnis dan Administrasi Umum', 0, 0, 1, 0, 0, 0, '2024-10-03 17:53:27', '2024-10-03 17:53:27'),
            (67, '833', 'B3-04-KK-AK', '833-B3-04-KK-AK', 'Prak Ak Perusahaan Jasa, Dagang, Manufaktur', 0, 0, 1, 1, 1, 0, '2024-10-03 17:53:38', '2024-10-03 17:53:38'),
            (68, '833', 'B3-05-KK-AK', '833-B3-05-KK-AK', 'Praktikum Akuntansi Lembaga Pemerintah', 0, 0, 1, 1, 1, 0, '2024-10-03 17:53:49', '2024-10-03 17:53:49'),
            (69, '411', 'B4-01-KJR', '411-B4-01-KJR', 'Project Kreatif Kewirausahaan', 0, 0, 1, 1, 1, 0, '2024-10-03 17:56:02', '2024-10-03 17:56:02'),
            (70, '421', 'B4-01-KJR', '421-B4-01-KJR', 'Project Kreatif Kewirausahaan', 0, 0, 1, 1, 1, 0, '2024-10-03 17:56:02', '2024-10-03 17:56:02'),
            (71, '811', 'B4-01-KJR', '811-B4-01-KJR', 'Project Kreatif Kewirausahaan', 0, 0, 1, 1, 1, 0, '2024-10-03 17:56:02', '2024-10-03 17:56:02'),
            (72, '821', 'B4-01-KJR', '821-B4-01-KJR', 'Project Kreatif Kewirausahaan', 0, 0, 1, 1, 1, 0, '2024-10-03 17:56:02', '2024-10-03 17:56:02'),
            (73, '833', 'B4-01-KJR', '833-B4-01-KJR', 'Project Kreatif Kewirausahaan', 0, 0, 1, 1, 1, 0, '2024-10-03 17:56:02', '2024-10-03 17:56:02'),
            (74, '833', 'B3-06-KK-AK', '833-B3-06-KK-AK', 'Administrasi Pajak', 0, 0, 0, 1, 1, 0, '2024-10-03 17:57:34', '2024-10-03 17:57:34'),
            (75, '833', 'B5-01-MPP-AK', '833-B5-01-MPP-AK', 'Layanan Lembaga Perbankan dan Keuangan Mikro', 0, 0, 1, 1, 0, 0, '2024-10-03 17:57:47', '2024-10-03 17:57:47'),
            (76, '833', 'B5-02-MPP-AK', '833-B5-02-MPP-AK', 'Layanan Perbankan dan Keuangan Mikro', 0, 0, 1, 1, 0, 0, '2024-10-03 17:57:56', '2024-10-03 17:57:56'),
            (77, '833', 'B5-03-MPP-AK', '833-B5-03-MPP-AK', 'Akuntansi UMKM', 0, 0, 0, 0, 1, 0, '2024-10-03 17:58:06', '2024-10-03 17:58:06'),
            (78, '811', 'B2-01-DPK-BD', '811-B2-01-DPK-BD', 'K3 dan Komunikasi dengan Pelanggan', 1, 1, 0, 0, 0, 0, '2024-10-03 17:58:16', '2024-10-03 17:58:16'),
            (79, '811', 'B2-02-DPK-BD', '811-B2-02-DPK-BD', 'Ekonomi Bisnis dan Administrasi Umum', 1, 1, 0, 0, 0, 0, '2024-10-03 17:58:26', '2024-10-03 17:58:26'),
            (80, '811', 'B2-03-DPK-BD', '811-B2-03-DPK-BD', 'Perilaku, Pelayanan dan Kepuasan Pelanggan', 1, 1, 0, 0, 0, 0, '2024-10-03 17:58:35', '2024-10-03 17:58:35'),
            (81, '811', 'B2-04-DPK-BD', '811-B2-04-DPK-BD', 'Proses Bisnis, Perkembangan Teknologi, Profil Peluang Usaha', 1, 1, 0, 0, 0, 0, '2024-10-03 17:58:43', '2024-10-03 17:58:43'),
            (82, '811', 'B3-01-KK-BD', '811-B3-01-KK-BD', 'Ekonomi Bisnis, Administrasi Umum dan Marketing', 0, 0, 1, 1, 0, 0, '2024-10-03 17:58:52', '2024-10-03 17:58:52'),
            (83, '811', 'B3-02-KK-BD', '811-B3-02-KK-BD', 'Komunikasi Bisnis', 0, 0, 1, 1, 0, 0, '2024-10-03 17:59:06', '2024-10-03 17:59:06'),
            (84, '811', 'B3-03-KK-BD', '811-B3-03-KK-BD', 'Marketing dan Perencanaan Bisnis', 0, 0, 1, 1, 1, 0, '2024-10-03 17:59:14', '2024-10-03 17:59:14'),
            (85, '811', 'B3-04-KK-BD', '811-B3-04-KK-BD', 'Digital Marketing dan Operation', 0, 0, 1, 1, 1, 0, '2024-10-03 17:59:22', '2024-10-03 17:59:22'),
            (86, '811', 'B3-05-KK-BD', '811-B3-05-KK-BD', 'Digital Branding dan Onboarding', 0, 0, 1, 1, 1, 0, '2024-10-03 17:59:31', '2024-10-03 17:59:31'),
            (87, '811', 'B3-06-KK-BD', '811-B3-06-KK-BD', 'Perencanaan dan Komunikasi Bisnis', 0, 0, 1, 1, 1, 0, '2024-10-03 17:59:40', '2024-10-03 17:59:40'),
            (88, '811', 'B5-01-MPP-BD', '811-B5-01-MPP-BD', 'Akuntansi Perusahaan Dagang', 0, 0, 1, 1, 0, 0, '2024-10-03 17:59:51', '2024-10-03 17:59:51'),
            (89, '811', 'B5-02-MPP-BD', '811-B5-02-MPP-BD', 'Administrasi Transaksi', 0, 0, 1, 1, 0, 0, '2024-10-03 18:00:06', '2024-10-03 18:00:06'),
            (90, '811', 'B5-03-MPP-BD', '811-B5-03-MPP-BD', 'Akuntansi Perusahaan Dagang Lanjutan', 0, 0, 0, 0, 1, 0, '2024-10-03 18:00:15', '2024-10-03 18:00:15'),
            (91, '821', 'B2-01-DPK-MP', '821-B2-01-DPK-MP', 'Otomatisasi Perkantoran', 1, 0, 0, 0, 0, 0, '2024-10-03 18:01:28', '2024-10-03 18:01:28'),
            (92, '821', 'B2-02-DPK-MP', '821-B2-02-DPK-MP', 'Manajemen Perkantoran', 1, 0, 0, 0, 0, 0, '2024-10-03 18:01:40', '2024-10-03 18:01:40'),
            (93, '821', 'B2-03-DPK-MP', '821-B2-03-DPK-MP', 'Teknologi Perkantoran', 1, 0, 0, 0, 0, 0, '2024-10-03 18:01:51', '2024-10-03 18:01:51'),
            (94, '821', 'B2-04-DPK-MP', '821-B2-04-DPK-MP', 'Pelayanan Prima', 1, 0, 0, 0, 0, 0, '2024-10-03 18:02:15', '2024-10-03 18:02:15'),
            (95, '821', 'B2-05-DPK-MP', '821-B2-05-DPK-MP', 'Enterprener', 0, 1, 0, 0, 0, 0, '2024-10-03 18:02:26', '2024-10-03 18:02:26'),
            (98, '821', 'B2-06-DPK-MP', '821-B2-06-DPK-MP', 'Manajemen Logistik', 0, 1, 0, 0, 0, 0, '2024-10-03 18:05:06', '2024-10-03 18:05:06'),
            (99, '821', 'B2-07-DPK-MP', '821-B2-07-DPK-MP', 'Dokumen Digital', 0, 1, 0, 0, 0, 0, '2024-10-03 18:05:14', '2024-10-03 18:05:14'),
            (100, '821', 'B2-08-DPK-MP', '821-B2-08-DPK-MP', 'Komunikasi Kantor', 0, 1, 0, 0, 0, 0, '2024-10-03 18:05:37', '2024-10-03 18:05:37'),
            (101, '821', 'B3-01-KK-MP', '821-B3-01-KK-MP', 'Pengelola Kearsipan', 0, 0, 1, 1, 0, 0, '2024-10-03 18:05:50', '2024-10-03 18:05:50'),
            (102, '821', 'B3-02-KK-MP', '821-B3-02-KK-MP', 'Teknologi Kantor', 0, 0, 1, 1, 0, 0, '2024-10-03 18:05:58', '2024-10-03 18:05:58'),
            (103, '821', 'B3-03-KK-MP', '821-B3-03-KK-MP', 'Komunikasi di Tempat Kerja', 0, 0, 1, 1, 0, 0, '2024-10-03 18:06:06', '2024-10-03 18:06:06'),
            (104, '821', 'B3-04-KK-MP', '821-B3-04-KK-MP', 'Ekonomi dan Bisnis', 1, 0, 1, 1, 0, 0, '2024-10-03 18:06:21', '2024-10-03 18:06:21'),
            (105, '821', 'B3-05-KK-MP', '821-B3-05-KK-MP', 'Pengelola Administrasi Umum', 0, 0, 1, 1, 0, 0, '2024-10-03 18:06:29', '2024-10-03 18:06:29'),
            (106, '821', 'B3-06-KK-MP', '821-B3-06-KK-MP', 'Pengelolaan Rapat/Pertemuan', 0, 0, 0, 0, 1, 0, '2024-10-03 18:06:38', '2024-10-03 18:06:38'),
            (107, '821', 'B3-07-KK-MP', '821-B3-07-KK-MP', 'Pengelolaan Keuangan Sederhana', 0, 0, 0, 0, 1, 0, '2024-10-03 18:06:47', '2024-10-03 18:06:47'),
            (108, '821', 'B3-08-KK-MP', '821-B3-08-KK-MP', 'Pengelolaan Sumber Daya Manusia (SDM)', 0, 0, 0, 0, 1, 0, '2024-10-03 18:07:01', '2024-10-03 18:07:01'),
            (109, '821', 'B3-09-KK-MP', '821-B3-09-KK-MP', 'Pengelolaan Sarana dan Prasarana', 0, 0, 0, 0, 1, 0, '2024-10-03 18:07:10', '2024-10-03 18:07:10'),
            (110, '821', 'B3-10-KK-MP', '821-B3-10-KK-MP', 'Pengelolaan Humas dan Keprotokolan', 0, 0, 0, 0, 1, 0, '2024-10-03 18:07:20', '2024-10-03 18:07:20'),
            (111, '821', 'B5-01-MPP-MP', '821-B5-01-MPP-MP', 'Digitalisasi Arsip', 0, 0, 1, 1, 0, 0, '2024-10-03 18:07:33', '2024-10-03 18:07:33'),
            (112, '821', 'B5-02-MPP-MP', '821-B5-02-MPP-MP', 'Pemasaran Digital', 0, 0, 1, 1, 0, 0, '2024-10-03 18:07:43', '2024-10-03 18:07:43'),
            (113, '821', 'B5-03-MPP-MP', '821-B5-03-MPP-MP', 'Layanan Informasi Dan Komunikasi', 0, 0, 0, 0, 1, 0, '2024-10-03 18:07:53', '2024-10-03 18:07:53'),
            (114, '411', 'B2-01-DPK-RPL', '411-B2-01-DPK-RPL', 'Dasar Kejuruan PPLG', 1, 1, 0, 0, 0, 0, '2024-10-03 18:08:05', '2024-10-03 18:08:05'),
            (115, '411', 'B3-01-KK-RPL', '411-B3-01-KK-RPL', 'Pemrograman Berbasis Teks, Grafis, dan Multimedia', 0, 0, 1, 1, 0, 0, '2024-10-03 18:08:15', '2024-10-03 18:08:15'),
            (116, '411', 'B3-02-KK-RPL', '411-B3-02-KK-RPL', 'Basis Data', 0, 0, 1, 1, 0, 0, '2024-10-03 18:08:24', '2024-10-03 18:08:24'),
            (117, '411', 'B3-03-KK-RPL', '411-B3-03-KK-RPL', 'Pemograman Web', 0, 0, 1, 1, 0, 0, '2024-10-03 18:08:34', '2024-10-03 18:08:34'),
            (118, '411', 'B3-04-KK-RPL', '411-B3-04-KK-RPL', 'Pemograman Perangkat Bergerak', 0, 0, 0, 0, 1, 0, '2024-10-03 18:08:43', '2024-10-03 18:08:43'),
            (119, '411', 'B5-01-MPP-RPL', '411-B5-01-MPP-RPL', 'Pemograman Web', 0, 0, 1, 0, 0, 0, '2024-10-03 18:08:53', '2024-10-03 18:08:53'),
            (120, '411', 'B5-02-MPP-RPL', '411-B5-02-MPP-RPL', 'Jaringan Dasar', 0, 0, 1, 1, 0, 0, '2024-10-03 18:09:02', '2024-10-03 18:09:02'),
            (121, '411', 'B5-03-MPP-RPL', '411-B5-03-MPP-RPL', 'Desain grafis', 0, 0, 0, 1, 0, 0, '2024-10-03 18:09:13', '2024-10-03 18:09:13'),
            (122, '411', 'B5-04-MPP-RPL', '411-B5-04-MPP-RPL', 'Project work', 0, 0, 0, 0, 1, 0, '2024-10-03 18:09:34', '2024-10-03 18:09:34'),
            (123, '421', 'B2-01-DPK-TKJ', '421-B2-01-DPK-TKJ', 'Dasar Kejuruan TJKT', 1, 1, 0, 0, 0, 0, '2024-10-03 18:09:43', '2024-10-03 18:09:43'),
            (124, '421', 'B3-01-KK-TKJ', '421-B3-01-KK-TKJ', 'Perencanaan dan Pengalamatan Jaringan', 0, 0, 1, 0, 0, 0, '2024-10-03 18:09:55', '2024-10-03 18:09:55'),
            (125, '421', 'B3-02-KK-TKJ', '421-B3-02-KK-TKJ', 'Administrasi Sistem Jaringan', 0, 0, 1, 0, 0, 0, '2024-10-03 18:10:03', '2024-10-03 18:10:03'),
            (126, '421', 'B3-03-KK-TKJ', '421-B3-03-KK-TKJ', 'Teknologi Jaringan Kabel dan Nirkabel', 0, 0, 0, 1, 0, 0, '2024-10-03 18:10:13', '2024-10-03 18:10:13'),
            (127, '421', 'B3-04-KK-TKJ', '421-B3-04-KK-TKJ', 'Pemasangan Perangkat Jaringan', 0, 0, 1, 1, 1, 0, '2024-10-03 18:10:22', '2024-10-03 18:10:22'),
            (128, '421', 'B3-05-KK-TKJ', '421-B3-05-KK-TKJ', 'Administrasi Sistem Jaringan', 0, 0, 0, 0, 1, 0, '2024-10-03 18:10:31', '2024-10-03 18:10:31'),
            (129, '421', 'B5-01-MPP-TKJ', '421-B5-01-MPP-TKJ', 'Cyber Security', 0, 0, 1, 1, 0, 0, '2024-10-03 18:10:39', '2024-10-03 18:10:39'),
            (130, '421', 'B5-02-MPP-TKJ', '421-B5-02-MPP-TKJ', 'Mikrotik Fundamental', 0, 0, 0, 0, 1, 0, '2024-10-03 18:10:47', '2024-10-03 18:10:47');
        ");
    }
}
