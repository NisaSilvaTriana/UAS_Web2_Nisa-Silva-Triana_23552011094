-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2026 at 05:55 PM
-- Server version: 10.4.32-MariaDB-log
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_website_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `nama_kegiatan`, `tanggal`, `jam`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Pramuka', '2026-07-02', '09:00:00', 'Sekolah', '2026-07-02 09:03:51', '2026-07-02 09:04:05'),
(2, 'Classmeet', '2026-07-13', '08:00:00', 'Lapang Sekolah', '2026-07-03 02:21:50', '2026-07-03 02:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) NOT NULL,
  `status` enum('Publish','Draft') NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `isi`, `gambar`, `penulis`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Juara Perlombaan Sekabupaten', 'Juara 1 Lomba Calistung', 'berita/GJESTPzXKkiwrJvn2izEOUfFHtbjt3bZ2AN4X9rc.jpg', 'staff', 'Publish', '2026-07-02 08:08:20', '2026-07-02 10:34:02'),
(2, 'Lomba Kebersihan Kelas Tingkat Sekolah', 'Dalam rangka menumbuhkan kepedulian terhadap lingkungan, SDN Kulinyar mengadakan Lomba Kebersihan Kelas yang diikuti seluruh siswa. Setiap kelas dinilai berdasarkan kebersihan, kerapian, serta kreativitas dalam menghias ruang belajar. Kegiatan ini diharapkan dapat membiasakan siswa menjaga kebersihan sejak dini.', 'berita/1l6AixXiCl7wfzJ8D8iUFA2mQV234zJW1Zp2VT9c.webp', 'Admin', 'Publish', '2026-07-03 02:52:28', '2026-07-03 02:52:28'),
(3, 'Peringatan Hari Kartini', 'Dalam rangka memperingati Hari Kartini, SDN Kulinyar mengadakan berbagai perlombaan yang diikuti oleh seluruh siswa. Kegiatan berlangsung meriah dengan lomba busana adat, membaca puisi, menyanyi, dan mewarnai.\r\n\r\nMelalui kegiatan ini, siswa diajak mengenal perjuangan R.A. Kartini serta menumbuhkan rasa percaya diri, kreativitas, dan semangat berkarya.\r\n\r\nAcara ditutup dengan penyerahan hadiah kepada para pemenang lomba serta sesi foto bersama seluruh peserta.', 'berita/yGTBCzrPcmmGDu1bdLTfwQVCewm4PcMxKC22CZlJ.jpg', 'Admin', 'Publish', '2026-07-07 02:52:49', '2026-07-07 02:52:49'),
(4, 'Budaya Literasi Pagi Meningkatkan Minat Baca', 'Program literasi pagi kembali dilaksanakan sebelum kegiatan belajar dimulai. Siswa membaca buku selama 15 menit sebagai upaya meningkatkan minat baca dan memperluas wawasan.', 'berita/VGyqIcbCcoiv5BSJM5530YiDrUqzr2ch6ISaS2CQ.jpg', 'Admin', 'Publish', '2026-07-07 21:52:24', '2026-07-07 21:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-humas@gmail.com|127.0.0.1', 'i:1;', 1783518534),
('laravel-cache-humas@gmail.com|127.0.0.1:timer', 'i:1783518534;', 1783518534),
('laravel-cache-publikasi@gmail.com|127.0.0.1', 'i:1;', 1783518566),
('laravel-cache-publikasi@gmail.com|127.0.0.1:timer', 'i:1783518566;', 1783518566);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `tanggal`, `keterangan`, `foto`, `created_at`, `updated_at`) VALUES
(1, '2026-07-02', 'Juara 1 Lomba Calistung', '1783003836.jpg', '2026-07-02 07:50:36', '2026-07-02 07:53:08'),
(2, '2026-07-06', 'Kegiatan Pramuka Siaga dilaksanakan untuk melatih kedisiplinan, kemandirian, kerja sama, dan rasa tanggung jawab siswa. Melalui berbagai permainan edukatif, latihan baris-berbaris, serta kegiatan di alam terbuka, siswa belajar mengembangkan karakter positif dan semangat gotong royong sejak usia dini.', '1783071473.jpg', '2026-07-03 02:37:53', '2026-07-03 02:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontaks`
--

CREATE TABLE `kontaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontaks`
--

INSERT INTO `kontaks` (`id`, `telepon`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(2, '087763221322', 'sekolah@gmail.com', 'Jl.Utama', '2026-07-07 04:19:25', '2026-07-07 04:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_02_051411_create_profil_sekolahs_table', 1),
(5, '2026_07_02_051424_create_beritas_table', 1),
(6, '2026_07_02_051433_create_pengumumen_table', 1),
(7, '2026_07_02_051441_create_agendas_table', 1),
(8, '2026_07_02_051452_create_galeris_table', 1),
(9, '2026_07_02_051459_create_kontaks_table', 1),
(10, '2026_07_02_051505_create_pesans_table', 1),
(11, '2026_07_02_151922_add_status_to_pengumumen_table', 2),
(12, '2026_07_02_152204_add_status_to_pengumumen_table', 3),
(13, '2026_07_02_154639_modify_agendas_table', 4),
(14, '2026_07_02_155044_rename_judul_to_nama_kegiatan_in_agendas_table', 5),
(15, '2026_07_02_155421_modify_agendas_table', 6),
(16, '2026_07_03_080809_add_balasan_to_pesans_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Publish','Draft') NOT NULL DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumen`
--

INSERT INTO `pengumumen` (`id`, `judul`, `isi`, `lampiran`, `tanggal`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Libur Sekolah', 'Libur sekolah sampai tanggal 15 juli 2026', NULL, '2026-07-02', '2026-07-02 08:06:30', '2026-07-03 03:10:32', 'Publish'),
(2, 'Libur Nasional', 'Libur Agustusan', NULL, '2026-08-17', '2026-07-02 08:30:57', '2026-07-03 05:21:51', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('baru','dibaca') NOT NULL DEFAULT 'baru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `nama`, `email`, `pesan`, `status`, `created_at`, `updated_at`, `balasan`) VALUES
(1, 'Nisa', 'nisa@gmail.com', 'info perlombaan', 'baru', '2026-07-02 23:49:36', '2026-07-02 23:49:36', NULL),
(2, 'Silva', 'silva@gmail.com', 'Informasi pentas seni', 'dibaca', '2026-07-03 01:29:21', '2026-07-03 02:02:37', 'coming soon'),
(4, 'Tria', 'tria@gmail.com', 'Halooo', 'dibaca', '2026-07-07 21:53:34', '2026-07-07 21:54:00', 'Hai'),
(5, 'avhagjhsk', 'bajbskna@gmail.com', 'jiojsjkansaoko', 'baru', '2026-07-07 21:54:43', '2026-07-07 21:54:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil_sekolahs`
--

CREATE TABLE `profil_sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_sekolahs`
--

INSERT INTO `profil_sekolahs` (`id`, `nama_sekolah`, `alamat`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'SDN KULINYAR', 'Jl.Utama', '-', '-', '2026-07-02 09:34:37', '2026-07-08 06:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('N4CC2qIGjwUiAuLP0zZyaJtGJuNkyJ81LO6uOrkl', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:152.0) Gecko/20100101 Firefox/152.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibE5SZUJ2aVIwRmdnWUtEVTd5SDZHeUpNcVMwVnByZ1JQZlBkTzRDWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb250YWsiO3M6NToicm91dGUiO3M6Njoia29udGFrIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7fQ==', 1783518789);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'admin@gmail.com', NULL, '$2y$12$V4qSb6XtT2oW383Z.mFxg.C4UbJNZBmRa.46mH3cEOq3O2WM4fEOK', NULL, '2026-07-08 05:17:58', '2026-07-08 05:17:58'),
(10, 'Operator', 'operator@gmail.com', NULL, '$2y$12$/srbQ5cIfMQuRfqkYi5a.OV5B/w/NBh8BfsDHhz77.H48Zf6NavlS', NULL, '2026-07-08 06:50:24', '2026-07-08 06:50:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontaks`
--
ALTER TABLE `kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_sekolahs`
--
ALTER TABLE `profil_sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil_sekolahs`
--
ALTER TABLE `profil_sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
