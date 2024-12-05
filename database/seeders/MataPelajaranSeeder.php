<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("
            INSERT INTO `mata_pelajarans` (`id`, `kelompok`, `kode`, `nourut`, `kel_mapel`, `mata_pelajaran`, `inisial_mp`, `semester_1`, `semester_2`, `semester_3`, `semester_4`, `semester_5`, `semester_6`, `created_at`, `updated_at`) VALUES
            (1, 'A', 'UM', '1', 'A-01-UM', 'Pendidikan Agama Islam dan Budi Pekerti', 'A-UM-01', 1, 1, 1, 1, 1, 1, '2024-09-27 06:01:56', '2024-10-03 17:49:03'),
            (2, 'A', 'UM', '2', 'A-02-UM', 'Pendidikan Pancasila', 'A-UM-02', 1, 1, 1, 1, 1, 1, '2024-09-27 06:05:45', '2024-10-03 17:49:22'),
            (3, 'A', 'UM', '3', 'A-03-UM', 'Bahasa Indonesia', 'A-UM-03', 1, 1, 1, 1, 1, 1, '2024-09-27 06:07:23', '2024-10-03 17:49:28'),
            (4, 'A', 'UM', '4', 'A-04-UM', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'A-UM-04', 1, 1, 1, 1, 0, 0, '2024-09-27 06:07:45', '2024-10-03 17:49:47'),
            (5, 'A', 'UM', '5', 'A-05-UM', 'Sejarah', 'A-UM-05', 1, 1, 1, 1, 0, 0, '2024-09-27 06:08:17', '2024-10-03 17:50:13'),
            (6, 'A', 'UM', '6', 'A-06-UM', 'Seni Budaya', 'A-UM-06', 1, 1, 0, 0, 0, 0, '2024-09-27 06:08:38', '2024-10-03 17:50:24'),
            (7, 'A', 'UM', '7', 'A-07-UM', 'Muatan Lokal (Bahasa Sunda)', 'A-UM-07', 1, 1, 1, 1, 0, 0, '2024-09-27 06:09:04', '2024-10-03 17:50:46'),
            (8, 'A', 'UM', '8', 'A-08-UM', 'Muatan Lokal (Penjas)', 'A-UM-08', 0, 0, 0, 0, 1, 0, '2024-09-27 06:09:33', '2024-10-03 17:50:57'),
            (9, 'B1', 'KJR', '1', 'B1-01-KJR', 'Matematika', 'B1-KJR-01', 1, 1, 1, 1, 1, 1, '2024-09-27 06:10:14', '2024-10-03 17:51:11'),
            (10, 'B1', 'KJR', '2', 'B1-02-KJR', 'Bahasa Inggris', 'B1-KJR-02', 1, 1, 1, 1, 1, 1, '2024-09-27 06:11:42', '2024-10-03 17:51:20'),
            (11, 'B1', 'KJR', '3', 'B1-03-KJR', 'Informatika', 'B1-KJR-03', 1, 1, 0, 0, 0, 0, '2024-09-27 06:11:55', '2024-10-03 17:51:35'),
            (12, 'B1', 'KJR', '4', 'B1-04-KJR', 'Projek Ilmu Pengetahuan Alam dan Sosial', 'B1-KJR-04', 1, 1, 0, 0, 0, 0, '2024-09-27 06:13:10', '2024-10-03 17:51:45'),
            (13, 'B2', 'DPK-AK', '1', 'B2-01-DPK-AK', 'Akuntansi Dasar', 'B2-DPK-AK-01', 1, 1, 0, 0, 0, 0, '2024-09-27 06:13:57', '2024-10-03 17:51:57'),
            (14, 'B2', 'DPK-AK', '2', 'B2-02-DPK-AK', 'Apliksasi Spreed Sheet', 'B2-DPK-AK-02', 1, 1, 0, 0, 0, 0, '2024-09-27 06:17:19', '2024-10-03 17:52:26'),
            (15, 'B2', 'DPK-AK', '3', 'B2-03-DPK-AK', 'Prinsip Profesional Bekerja dan K3LH', 'B2-DPK-AK-03', 1, 1, 0, 0, 0, 0, '2024-09-27 06:17:40', '2024-10-03 17:52:49'),
            (16, 'B3', 'KK-AK', '1', 'B3-01-KK-AK', 'Komputer Akuntansi', 'B3-KK-AK-01', 0, 0, 1, 1, 1, 0, '2024-09-27 06:27:04', '2024-10-03 17:53:08'),
            (17, 'B3', 'KK-AK', '2', 'B3-02-KK-AK', 'Akuntansi Keuangan', 'B3-KK-AK-02', 0, 0, 1, 1, 1, 0, '2024-09-27 06:27:39', '2024-10-03 17:53:18'),
            (18, 'B3', 'KK-AK', '3', 'B3-03-KK-AK', 'Ekonomi Bisnis dan Administrasi Umum', 'B3-KK-AK-03', 0, 0, 1, 0, 0, 0, '2024-09-27 06:28:26', '2024-10-03 17:53:27'),
            (19, 'B3', 'KK-AK', '4', 'B3-04-KK-AK', 'Prak Ak Perusahaan Jasa, Dagang, Manufaktur', 'B3-KK-AK-04', 0, 0, 1, 1, 1, 0, '2024-09-27 06:29:17', '2024-10-03 17:53:38'),
            (20, 'B3', 'KK-AK', '5', 'B3-05-KK-AK', 'Praktikum Akuntansi Lembaga Pemerintah', 'B3-KK-AK-05', 0, 0, 1, 1, 1, 0, '2024-09-27 06:32:45', '2024-10-03 17:53:49'),
            (21, 'B4', 'KJR', '1', 'B4-01-KJR', 'Project Kreatif Kewirausahaan', 'B4-KJR-01', 0, 0, 1, 1, 1, 0, '2024-09-27 06:33:45', '2024-10-03 17:56:02'),
            (22, 'B3', 'KK-AK', '6', 'B3-06-KK-AK', 'Administrasi Pajak', 'B3-KK-AK-06', 0, 0, 0, 1, 1, 0, '2024-09-27 06:35:09', '2024-10-03 17:57:34'),
            (23, 'B5', 'MPP-AK', '1', 'B5-01-MPP-AK', 'Layanan Lembaga Perbankan dan Keuangan Mikro', 'B5-MPP-AK-01', 0, 0, 1, 1, 0, 0, '2024-09-27 06:36:41', '2024-10-03 17:57:47'),
            (24, 'B5', 'MPP-AK', '2', 'B5-02-MPP-AK', 'Layanan Perbankan dan Keuangan Mikro', 'B5-MPP-AK-02', 0, 0, 1, 1, 0, 0, '2024-09-27 06:37:19', '2024-10-03 17:57:56'),
            (25, 'B5', 'MPP-AK', '3', 'B5-03-MPP-AK', 'Akuntansi UMKM', 'B5-MPP-AK-03', 0, 0, 0, 0, 1, 0, '2024-09-27 06:38:50', '2024-10-03 17:58:06'),
            (26, 'B2', 'DPK-BD', '1', 'B2-01-DPK-BD', 'K3 dan Komunikasi dengan Pelanggan', 'B2-DPK-BD-01', 1, 1, 0, 0, 0, 0, '2024-09-27 07:59:28', '2024-10-03 17:58:16'),
            (27, 'B2', 'DPK-BD', '2', 'B2-02-DPK-BD', 'Ekonomi Bisnis dan Administrasi Umum', 'B2-DPK-BD-02', 1, 1, 0, 0, 0, 0, '2024-09-27 07:59:50', '2024-10-03 17:58:26'),
            (28, 'B2', 'DPK-BD', '3', 'B2-03-DPK-BD', 'Perilaku, Pelayanan dan Kepuasan Pelanggan', 'B2-DPK-BD-03', 1, 1, 0, 0, 0, 0, '2024-09-27 08:36:08', '2024-10-03 17:58:35'),
            (29, 'B2', 'DPK-BD', '4', 'B2-04-DPK-BD', 'Proses Bisnis, Perkembangan Teknologi, Profil Peluang Usaha', 'B2-DPK-BD-04', 1, 1, 0, 0, 0, 0, '2024-09-27 08:37:16', '2024-10-03 17:58:43'),
            (30, 'B3', 'KK-BD', '1', 'B3-01-KK-BD', 'Ekonomi Bisnis, Administrasi Umum dan Marketing', 'B3-KK-BD-01', 0, 0, 1, 1, 0, 0, '2024-09-27 08:37:56', '2024-10-03 17:58:52'),
            (31, 'B3', 'KK-BD', '2', 'B3-02-KK-BD', 'Komunikasi Bisnis', 'B3-KK-BD-02', 0, 0, 1, 1, 0, 0, '2024-09-27 08:38:18', '2024-10-03 17:59:06'),
            (32, 'B3', 'KK-BD', '3', 'B3-03-KK-BD', 'Marketing dan Perencanaan Bisnis', 'B3-KK-BD-03', 0, 0, 1, 1, 1, 0, '2024-09-27 08:39:15', '2024-10-03 17:59:14'),
            (33, 'B3', 'KK-BD', '4', 'B3-04-KK-BD', 'Digital Marketing dan Operation', 'B3-KK-BD-04', 0, 0, 1, 1, 1, 0, '2024-09-27 08:40:20', '2024-10-03 17:59:22'),
            (34, 'B3', 'KK-BD', '5', 'B3-05-KK-BD', 'Digital Branding dan Onboarding', 'B3-KK-BD-05', 0, 0, 1, 1, 1, 0, '2024-09-27 08:40:44', '2024-10-03 17:59:31'),
            (35, 'B3', 'KK-BD', '6', 'B3-06-KK-BD', 'Perencanaan dan Komunikasi Bisnis', 'B3-KK-BD-06', 0, 0, 1, 1, 1, 0, '2024-09-27 08:41:20', '2024-10-03 17:59:40'),
            (36, 'B5', 'MPP-BD', '1', 'B5-01-MPP-BD', 'Akuntansi Perusahaan Dagang', 'B5-MPP-BD-01', 0, 0, 1, 1, 0, 0, '2024-09-27 08:44:02', '2024-10-03 17:59:50'),
            (37, 'B5', 'MPP-BD', '2', 'B5-02-MPP-BD', 'Administrasi Transaksi', 'B5-MPP-BD-02', 0, 0, 1, 1, 0, 0, '2024-09-27 08:44:45', '2024-10-03 18:00:06'),
            (38, 'B5', 'MPP-BD', '3', 'B5-03-MPP-BD', 'Akuntansi Perusahaan Dagang Lanjutan', 'B5-MPP-BD-03', 0, 0, 0, 0, 1, 0, '2024-09-27 08:45:05', '2024-10-03 18:00:15'),
            (39, 'B2', 'DPK-MP', '1', 'B2-01-DPK-MP', 'Otomatisasi Perkantoran', 'B2-DPK-MP-01', 1, 0, 0, 0, 0, 0, '2024-09-27 08:46:53', '2024-10-03 18:01:28'),
            (40, 'B2', 'DPK-MP', '2', 'B2-02-DPK-MP', 'Manajemen Perkantoran', 'B2-DPK-MP-02', 1, 0, 0, 0, 0, 0, '2024-09-27 08:47:24', '2024-10-03 18:01:40'),
            (41, 'B2', 'DPK-MP', '3', 'B2-03-DPK-MP', 'Teknologi Perkantoran', 'B2-DPK-MP-03', 1, 0, 0, 0, 0, 0, '2024-09-27 08:47:47', '2024-10-03 18:01:51'),
            (42, 'B2', 'DPK-MP', '4', 'B2-04-DPK-MP', 'Pelayanan Prima', 'B2-DPK-MP-04', 1, 0, 0, 0, 0, 0, '2024-09-27 08:49:29', '2024-10-03 18:02:15'),
            (43, 'B2', 'DPK-MP', '5', 'B2-05-DPK-MP', 'Enterprener', 'B2-DPK-MP-05', 0, 1, 0, 0, 0, 0, '2024-09-27 08:49:56', '2024-10-03 18:02:26'),
            (44, 'B2', 'DPK-MP', '6', 'B2-06-DPK-MP', 'Manajemen Logistik', 'B2-DPK-MP-06', 0, 1, 0, 0, 0, 0, '2024-09-27 08:50:47', '2024-10-03 18:05:06'),
            (45, 'B2', 'DPK-MP', '7', 'B2-07-DPK-MP', 'Dokumen Digital', 'B2-DPK-MP-07', 0, 1, 0, 0, 0, 0, '2024-10-02 23:17:10', '2024-10-03 18:05:14'),
            (46, 'B2', 'DPK-MP', '8', 'B2-08-DPK-MP', 'Komunikasi Kantor', 'B2-DPK-MP-08', 0, 1, 0, 0, 0, 0, '2024-10-02 23:18:18', '2024-10-03 18:05:37'),
            (47, 'B3', 'KK-MP', '1', 'B3-01-KK-MP', 'Pengelola Kearsipan', 'B3-KK-MP-01', 0, 0, 1, 1, 0, 0, '2024-10-02 23:18:50', '2024-10-03 18:05:50'),
            (48, 'B3', 'KK-MP', '2', 'B3-02-KK-MP', 'Teknologi Kantor', 'B3-KK-MP-02', 0, 0, 1, 1, 0, 0, '2024-10-02 23:19:08', '2024-10-03 18:05:58'),
            (49, 'B3', 'KK-MP', '3', 'B3-03-KK-MP', 'Komunikasi di Tempat Kerja', 'B3-KK-MP-03', 0, 0, 1, 1, 0, 0, '2024-10-02 23:19:40', '2024-10-03 18:06:06'),
            (50, 'B3', 'KK-MP', '4', 'B3-04-KK-MP', 'Ekonomi dan Bisnis', 'B3-KK-MP-04', 1, 0, 1, 1, 0, 0, '2024-10-02 23:20:27', '2024-10-03 18:06:21'),
            (51, 'B3', 'KK-MP', '5', 'B3-05-KK-MP', 'Pengelola Administrasi Umum', 'B3-KK-MP-05', 0, 0, 1, 1, 0, 0, '2024-10-02 23:21:23', '2024-10-03 18:06:29'),
            (52, 'B3', 'KK-MP', '6', 'B3-06-KK-MP', 'Pengelolaan Rapat/Pertemuan', 'B3-KK-MP-06', 0, 0, 0, 0, 1, 0, '2024-10-02 23:21:44', '2024-10-03 18:06:38'),
            (53, 'B3', 'KK-MP', '7', 'B3-07-KK-MP', 'Pengelolaan Keuangan Sederhana', 'B3-KK-MP-07', 0, 0, 0, 0, 1, 0, '2024-10-02 23:22:22', '2024-10-03 18:06:47'),
            (54, 'B3', 'KK-MP', '8', 'B3-08-KK-MP', 'Pengelolaan Sumber Daya Manusia (SDM)', 'B3-KK-MP-08', 0, 0, 0, 0, 1, 0, '2024-10-02 23:22:40', '2024-10-03 18:07:01'),
            (55, 'B3', 'KK-MP', '9', 'B3-09-KK-MP', 'Pengelolaan Sarana dan Prasarana', 'B3-KK-MP-09', 0, 0, 0, 0, 1, 0, '2024-10-02 23:22:56', '2024-10-03 18:07:10'),
            (56, 'B3', 'KK-MP', '10', 'B3-10-KK-MP', 'Pengelolaan Humas dan Keprotokolan', 'B3-KK-MP-10', 0, 0, 0, 0, 1, 0, '2024-10-02 23:23:37', '2024-10-03 18:07:20'),
            (57, 'B5', 'MPP-MP', '1', 'B5-01-MPP-MP', 'Digitalisasi Arsip', 'B5-MPP-MP-01', 0, 0, 1, 1, 0, 0, '2024-10-02 23:24:00', '2024-10-03 18:07:33'),
            (58, 'B5', 'MPP-MP', '2', 'B5-02-MPP-MP', 'Pemasaran Digital', 'B5-MPP-MP-02', 0, 0, 1, 1, 0, 0, '2024-10-02 23:24:20', '2024-10-03 18:07:43'),
            (59, 'B5', 'MPP-MP', '3', 'B5-03-MPP-MP', 'Layanan Informasi Dan Komunikasi', 'B5-MPP-MP-03', 0, 0, 0, 0, 1, 0, '2024-10-02 23:24:34', '2024-10-03 18:07:53'),
            (60, 'B2', 'DPK-RPL', '1', 'B2-01-DPK-RPL', 'Dasar Kejuruan PPLG', 'B2-DPK-RPL-01', 1, 1, 0, 0, 0, 0, '2024-10-02 23:25:59', '2024-10-03 18:08:05'),
            (61, 'B3', 'KK-RPL', '1', 'B3-01-KK-RPL', 'Pemrograman Berbasis Teks, Grafis, dan Multimedia', 'B3-KK-RPL-01', 0, 0, 1, 1, 0, 0, '2024-10-02 23:26:24', '2024-10-03 18:08:15'),
            (62, 'B3', 'KK-RPL', '2', 'B3-02-KK-RPL', 'Basis Data', 'B3-KK-RPL-02', 0, 0, 1, 1, 0, 0, '2024-10-02 23:26:51', '2024-10-03 18:08:24'),
            (63, 'B3', 'KK-RPL', '3', 'B3-03-KK-RPL', 'Pemograman Web', 'B3-KK-RPL-03', 0, 0, 1, 1, 0, 0, '2024-10-02 23:27:30', '2024-10-03 18:08:34'),
            (64, 'B3', 'KK-RPL', '4', 'B3-04-KK-RPL', 'Pemograman Perangkat Bergerak', 'B3-KK-RPL-04', 0, 0, 0, 0, 1, 0, '2024-10-02 23:27:52', '2024-10-03 18:08:43'),
            (65, 'B5', 'MPP-RPL', '1', 'B5-01-MPP-RPL', 'Pemograman Web', 'B5-MPP-RPL-01', 0, 0, 1, 0, 0, 0, '2024-10-02 23:28:43', '2024-10-03 18:08:53'),
            (66, 'B5', 'MPP-RPL', '2', 'B5-02-MPP-RPL', 'Jaringan Dasar', 'B5-MPP-RPL-02', 0, 0, 1, 1, 0, 0, '2024-10-02 23:29:02', '2024-10-03 18:09:02'),
            (67, 'B5', 'MPP-RPL', '3', 'B5-03-MPP-RPL', 'Desain grafis', 'B5-MPP-RPL-03', 0, 0, 0, 1, 0, 0, '2024-10-02 23:29:34', '2024-10-03 18:09:13'),
            (68, 'B5', 'MPP-RPL', '4', 'B5-04-MPP-RPL', 'Project work', 'B5-MPP-RPL-04', 0, 0, 0, 0, 1, 0, '2024-10-02 23:29:49', '2024-10-03 18:09:34'),
            (69, 'B2', 'DPK-TKJ', '1', 'B2-01-DPK-TKJ', 'Dasar Kejuruan TJKT', 'B2-DPK-TKJ-01', 1, 1, 0, 0, 0, 0, '2024-10-02 23:30:49', '2024-10-03 18:09:43'),
            (70, 'B3', 'KK-TKJ', '1', 'B3-01-KK-TKJ', 'Perencanaan dan Pengalamatan Jaringan', 'B3-KK-TKJ-01', 0, 0, 1, 0, 0, 0, '2024-10-02 23:31:16', '2024-10-03 18:09:55'),
            (71, 'B3', 'KK-TKJ', '2', 'B3-02-KK-TKJ', 'Administrasi Sistem Jaringan', 'B3-KK-TKJ-02', 0, 0, 1, 0, 0, 0, '2024-10-02 23:31:38', '2024-10-03 18:10:03'),
            (72, 'B3', 'KK-TKJ', '3', 'B3-03-KK-TKJ', 'Teknologi Jaringan Kabel dan Nirkabel', 'B3-KK-TKJ-03', 0, 0, 0, 1, 0, 0, '2024-10-02 23:31:55', '2024-10-03 18:10:13'),
            (73, 'B3', 'KK-TKJ', '4', 'B3-04-KK-TKJ', 'Pemasangan Perangkat Jaringan', 'B3-KK-TKJ-04', 0, 0, 1, 1, 1, 0, '2024-10-02 23:33:40', '2024-10-03 18:10:22'),
            (74, 'B3', 'KK-TKJ', '5', 'B3-05-KK-TKJ', 'Administrasi Sistem Jaringan', 'B3-KK-TKJ-05', 0, 0, 0, 0, 1, 0, '2024-10-02 23:33:56', '2024-10-03 18:10:31'),
            (75, 'B5', 'MPP-TKJ', '1', 'B5-01-MPP-TKJ', 'Cyber Security', 'B5-MPP-TKJ-01', 0, 0, 1, 1, 0, 0, '2024-10-02 23:34:23', '2024-10-03 18:10:39'),
            (76, 'B5', 'MPP-TKJ', '2', 'B5-02-MPP-TKJ', 'Mikrotik Fundamental', 'B5-MPP-TKJ-02', 0, 0, 0, 0, 1, 0, '2024-10-02 23:34:41', '2024-10-03 18:10:47');
        ");
    }
}
