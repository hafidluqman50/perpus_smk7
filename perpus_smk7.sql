-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2017 at 04:43 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_smk7`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode_scan`
--

CREATE TABLE `barcode_scan` (
  `id_barcode` int(10) UNSIGNED NOT NULL,
  `code_scanner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_buku` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_buku` bigint(21) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barcode_scan`
--

INSERT INTO `barcode_scan` (`id_barcode`, `code_scanner`, `kode_buku`, `id_buku`, `created_at`, `updated_at`) VALUES
(7, '110919000069733', 'NRwbBvpbZdODAGyishLFWfgNcKPmrQpyONwQcDRdhvmfWFrBbAPNKibLZgGs', 4, '2017-09-25 13:28:58', '2017-09-25 13:28:58'),
(8, 'HS611032', 'RXGUriTDznEpadQxjOAeyokWdLRwPNREROUXAaywWjkdQdeTxNrpoGzDiPnL', 5, '2017-09-25 13:29:38', '2017-09-25 13:29:38'),
(9, '123123123', 'vfLmsPNKzZWBIjTtyOmrbEeqkVQRwZetPfZKsZmwWmQqTjzyIVNBbkLOEvRr', 6, '2017-09-27 16:12:43', '2017-09-27 16:12:43'),
(10, '456789456789', 'kAMibFwqJxcZGfCDSEtQQRkUmaeIojDMAxojUtkiSfGkEQmwQFRCqJZeacbI', 3, '2017-09-27 16:13:03', '2017-09-27 16:13:03'),
(11, '123456789', 'msdQURjkzoDtVHLhRwpZTxYFcCdGJqwkDTRQUqzxFYJcZoCHmdGsLtdpVhjR', 5, '2017-09-29 18:38:37', '2017-09-29 18:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint(21) NOT NULL,
  `judul_buku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sn_penulis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_terbit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `id_sub_ktg` int(11) DEFAULT NULL,
  `klasifikasi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_eksemplar` int(11) NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `foto_buku` text COLLATE utf8mb4_unicode_ci,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `tanggal_upload` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `judul_slug`, `nomor_induk`, `pengarang`, `sn_penulis`, `penerbit`, `tempat_terbit`, `tahun_terbit`, `id_sub_ktg`, `klasifikasi`, `jumlah_eksemplar`, `stok_buku`, `foto_buku`, `keterangan`, `tanggal_upload`, `created_at`, `updated_at`) VALUES
(3, 'Belajar PHP 7.1', 'belajar-php-71', '-', 'Ilham Jagaw Ter', 'IJT', 'Gramedia', 'Samarinda', 2017, 1, '679.8', 10, 15, '39323034-programming-wallpapers.jpg', 'Jago', '2017-07-13', '2017-07-28 18:48:59', '2017-10-26 21:13:50'),
(4, 'Jajaw', 'jajaw', '-', 'Ilham', 'IHM', 'Halallllll', 'Samarinda', 2018, 2, '677.9', 120, 0, '2017-07-29_apakah penulisan di dipisah atau disambung.jpg', NULL, '2017-07-29', '2017-07-28 17:38:16', '2017-10-26 21:16:39'),
(5, 'Tes', 'tes', '-', 'asdasd', 'asdadsa', 'asdasd', 'asdasda', 2011, 1, '777.127.128', 123213, 3, '2017-07-30_39323034-programming-wallpapers.jpg', '-', '2017-07-30', '2017-07-30 03:49:58', '2017-10-26 21:15:34'),
(6, 'Kehebatan', 'kehebatan', '-', 'Daguy', 'DGY', 'Erlangga', 'samarinda', 2017, 1, '892.128.7', 100, 118, NULL, '-', '2017-09-04', '2017-09-03 19:48:17', '2017-10-26 21:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_transaksi`
--

CREATE TABLE `catatan_transaksi` (
  `id_catat` int(255) NOT NULL,
  `text` text NOT NULL,
  `tanggal_catat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` bigint(18) NOT NULL,
  `id_transaksi` bigint(21) NOT NULL,
  `id_buku` bigint(21) NOT NULL,
  `kode_buku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok_pinjam` int(11) DEFAULT NULL,
  `tanggal_pinjam_buku` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_transaksi` int(1) DEFAULT NULL COMMENT 'NULL=batal_pinjam;0=pinjam_pending;1=sedang_dpinjam',
  `denda` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_buku`, `kode_buku`, `stok_pinjam`, `tanggal_pinjam_buku`, `tanggal_jatuh_tempo`, `tanggal_kembali`, `status_transaksi`, `denda`, `created_at`, `updated_at`) VALUES
(31, 7, 3, 'kAMibFwqJxcZGfCDSEtQQRkUmaeIojDMAxojUtkiSfGkEQmwQFRCqJZeacbI', 1, '2017-10-27', '2017-11-10', '2017-11-23', 2, '45000', '2017-10-26 21:10:48', '2017-10-26 21:11:39'),
(32, 4, 3, 'kAMibFwqJxcZGfCDSEtQQRkUmaeIojDMAxojUtkiSfGkEQmwQFRCqJZeacbI', 1, '2017-10-27', '2017-11-10', '2017-11-30', 2, '45000', '2017-10-26 21:13:09', '2017-10-26 21:13:50'),
(33, 4, 5, 'RXGUriTDznEpadQxjOAeyokWdLRwPNREROUXAaywWjkdQdeTxNrpoGzDiPnL', 1, '2017-10-31', '2017-11-14', NULL, 2, NULL, '2017-10-26 21:15:33', '2017-10-26 21:15:33'),
(34, 4, 6, 'vfLmsPNKzZWBIjTtyOmrbEeqkVQRwZetPfZKsZmwWmQqTjzyIVNBbkLOEvRr', 1, '2017-10-31', '2017-11-14', NULL, 2, NULL, '2017-10-26 21:15:33', '2017-10-26 21:15:33'),
(35, 4, 4, 'NRwbBvpbZdODAGyishLFWfgNcKPmrQpyONwQcDRdhvmfWFrBbAPNKibLZgGs', 1, '2017-10-31', '2017-11-14', NULL, 2, NULL, '2017-10-26 21:16:39', '2017-10-26 21:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori_buku`, `nama_kategori`, `slug_kategori`, `deskripsi_kategori`, `last_modified`) VALUES
(1, 'Referensi', 'referensi', 'Bla bla bla bla bla', '2017-07-12 03:23:12'),
(2, 'Kejagoan', 'kejagoan', 'kejagoan lohhhhhh', '2017-10-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas`, `nama_kelas`) VALUES
(1, 'XII RPL 1'),
(2, 'XII RPL 2');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_06_17_145959_drop_table_password_resets', 2),
(3, '2017_06_18_130630_siswa', 3),
(4, '2017_06_18_132830_siswa', 4),
(5, '2017_06_18_133010_petugas', 5),
(6, '2017_06_18_133307_buku', 6),
(7, '2017_06_18_142458_jk_siswa', 6),
(8, '2017_06_18_142509_jk_petugas', 6),
(9, '2017_06_18_143152_barcode_scan', 6),
(10, '2017_06_18_143459_username_change_siswa', 7),
(11, '2017_06_18_143505_username_change_petugas', 7),
(12, '2017_06_18_143933_name_siswa', 7),
(13, '2017_06_18_144243_transaksi_buku', 7),
(14, '2017_06_18_144253_kategori_buku', 7),
(15, '2017_06_19_032646_buku', 8),
(16, '2017_06_19_032745_barcode_scanner', 9),
(17, '2017_06_19_032931_relationship_table', 10),
(18, '2017_06_21_025813_email_siswa', 11),
(19, '2017_07_09_144258_rating_buku', 12),
(20, '2017_07_13_132652_email_siswa', 13),
(21, '2017_07_13_160543_tanggal_publish_buku', 14),
(22, '2017_07_25_120458_wishtlist_buku', 15),
(23, '2017_07_28_011523_judul_slug', 15),
(24, '2017_07_28_100954_status_pinjam', 16),
(25, '2017_07_28_101007_status_kembali', 16),
(26, '2017_07_28_102322_nama_slug', 16),
(27, '2017_07_29_021725_update_buku', 17),
(28, '2017_07_30_150521_wishtlist_buku', 18);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL,
  `id_siswa` bigint(21) NOT NULL,
  `text` text NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profile` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `nama_petugas`, `nip`, `jenis_kelamin`, `foto_profile`, `created_at`, `updated_at`) VALUES
(1, 'petugas', 'Vick', '123131', 'Laki-laki', '1747_WallpaperPlay_developer-walp-w10-88515_1920x1080.jpg', '2017-06-24 02:10:05', '2017-06-24 02:10:05'),
(2, 'uhuy', NULL, NULL, NULL, NULL, '2017-09-10 07:33:30', '2017-09-10 07:33:30'),
(3, 'ahmad', NULL, NULL, NULL, NULL, '2017-09-24 22:02:32', '2017-09-24 22:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `rating_buku`
--

CREATE TABLE `rating_buku` (
  `id_rating` bigint(21) NOT NULL,
  `id_siswa` bigint(21) NOT NULL,
  `id_buku` bigint(21) NOT NULL,
  `rating` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(21) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmr_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `foto_profile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `username`, `nama_siswa`, `nama_slug`, `nmr_hp`, `nisn`, `email`, `jenis_kelamin`, `id_kelas`, `foto_profile`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'hafidlh', 'Hafiidh Luqmanul Hakim', 'hafiidh-luqmanul-hakim', '085391791228', '0002792083', 'hafidluqmanulhakim@gmail.com', 'Laki-Laki', 1, '2017-07-06_laravel_red_1280x800.jpg', '2017-08-16 20:07:38', '2017-08-16 20:07:38', NULL),
(3, 'ilham', 'M. Ilham', 'm-ilham', '085250654125', '0001403865', 'muhilham0603@gmail.com', 'Laki-Laki', 1, '2017-08-06 09:22:09_laravel-programming.jpg', '2017-08-06 01:22:09', '2017-08-06 01:22:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_ktg` int(11) NOT NULL,
  `id_kategori_buku` int(11) DEFAULT NULL,
  `nama_sub` varchar(100) NOT NULL,
  `slug_sub_ktg` varchar(100) NOT NULL,
  `deskripsi_sub` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_ktg`, `id_kategori_buku`, `nama_sub`, `slug_sub_ktg`, `deskripsi_sub`) VALUES
(1, 1, 'Rekayasa Perangkat Lunak', 'rekayasa-perangkat-lunak', 'Sub Kategori Rekayasa Perangkat Lunak adalah ....'),
(2, 1, 'Multimedia', 'multimedia', 'Sub Kategori Multimedia adalah ...'),
(3, 1, 'Teknik Komputer Jaringan\r\n', 'teknik-komputer-jaringan', 'Sub Kategori Teknik Komputer Jaringan adalah ...'),
(4, 2, 'Buku Untuk Orang Jago', 'buku-untuk-orang-jago', 'asdsdsassdsdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_buku`
--

CREATE TABLE `transaksi_buku` (
  `id_transaksi` bigint(21) NOT NULL,
  `id_siswa` bigint(21) NOT NULL,
  `ket` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_buku`
--

INSERT INTO `transaksi_buku` (`id_transaksi`, `id_siswa`, `ket`, `created_at`) VALUES
(4, 3, NULL, '2017-10-22 19:37:55'),
(7, 2, NULL, '2017-10-25 15:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(1) NOT NULL COMMENT '0=siswa; 1=petugas; 2=admin;',
  `status` tinyint(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `level`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(2, 'hafidlh', '$2y$10$8m8xD9WKDRkerGd9E7zRqez31IdG7S4uTtwwjUFTcx8ZqeJSVL6Ce', 'hSiSaYt76pLytNff7ne8mD709mEDOqXKSo9twgIMboZAWbpLdOiWsnAygP6u', 0, 1, '2017-10-27 05:10:40', '2017-09-07 15:54:05', '2017-10-26 21:10:40'),
(3, 'petugas', '$2y$10$oBu6gkuKPmrbFk7M.kGEO..yzPV7bqpN0qHkenalYbY6gdbr/6LI6', '5gSO1oT06BXFfenJKWTLeHBDyWLuxZNe3MwRGf7uBsGRA0sdmcIiKZZBTfH1', 1, 1, '2017-10-21 01:42:30', '2017-06-23 04:51:20', '2017-10-20 17:42:30'),
(4, 'admin', '$2y$10$x44D0Pclz570dxhOqAsD6.VNr9aDy04CX7w.gZ1nDjhAKxG/4Vu8C', 'p178GvGBQp4P2u854Ro5Z5tqLTrBMwo4oinEDj3ipWqCVLrQmk37sxYOYqEf', 2, 1, '2017-10-27 05:01:17', '2017-07-16 03:52:48', '2017-10-26 21:01:17'),
(5, 'ilham', '$2y$10$tD3vwSfLWgGAsBtLue/Dwuqs6sp1LsinmT4Z/B2frj6e7noh8BwXi', 'dkt6a1yRqUwe6KWip0P1PWfWsqQhlFZz8rEMK6egZF7qWSKQREG5ZwSGupmq', 0, 1, '2017-10-27 05:13:00', '2017-08-06 01:22:09', '2017-10-26 21:13:00'),
(6, 'uhuy', '$2y$10$0fCXR5aw2X3I315ObFj9mOEg/WAm9jjfFe6avTNuEPrEKMWvxGuyO', NULL, 1, 1, NULL, '2017-09-10 07:33:30', '2017-09-10 07:33:30'),
(7, 'ahmad', '$2y$10$9pgytQqHBOExXfY2dsE5F.5JXb9YPBvYSgT63bDwBoamfghp4rWUy', 'dun4lZyB9mGmvQ2RZKDNXwMQ3Th9QdbbuUmD7uKiyRy0Q5OqpW8qFjomfVIB', 1, 1, '2017-09-25 06:09:16', '2017-09-24 22:02:32', '2017-09-24 22:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `wishtlist_buku`
--

CREATE TABLE `wishtlist_buku` (
  `id_wishtlist` bigint(21) NOT NULL,
  `id_siswa` bigint(21) NOT NULL,
  `id_buku` bigint(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode_scan`
--
ALTER TABLE `barcode_scan`
  ADD PRIMARY KEY (`id_barcode`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori_buku` (`id_sub_ktg`);

--
-- Indexes for table `catatan_transaksi`
--
ALTER TABLE `catatan_transaksi`
  ADD PRIMARY KEY (`id_catat`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `relasi_transaksi` (`id_transaksi`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `rating_buku`
--
ALTER TABLE `rating_buku`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `rating_buku_id_siswa_foreign` (`id_siswa`),
  ADD KEY `rating_buku_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `username` (`username`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_ktg`),
  ADD KEY `kategori_buku` (`id_kategori_buku`);

--
-- Indexes for table `transaksi_buku`
--
ALTER TABLE `transaksi_buku`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wishtlist_buku`
--
ALTER TABLE `wishtlist_buku`
  ADD PRIMARY KEY (`id_wishtlist`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcode_scan`
--
ALTER TABLE `barcode_scan`
  MODIFY `id_barcode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catatan_transaksi`
--
ALTER TABLE `catatan_transaksi`
  MODIFY `id_catat` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating_buku`
--
ALTER TABLE `rating_buku`
  MODIFY `id_rating` bigint(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_ktg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_buku`
--
ALTER TABLE `transaksi_buku`
  MODIFY `id_transaksi` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishtlist_buku`
--
ALTER TABLE `wishtlist_buku`
  MODIFY `id_wishtlist` bigint(21) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barcode_scan`
--
ALTER TABLE `barcode_scan`
  ADD CONSTRAINT `barcode_scan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `sub_kategori_buku` FOREIGN KEY (`id_sub_ktg`) REFERENCES `sub_kategori` (`id_sub_ktg`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_buku` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_buku`
--
ALTER TABLE `rating_buku`
  ADD CONSTRAINT `rating_buku_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_siswa` (`id_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `sub_kategori_ibfk_1` FOREIGN KEY (`id_kategori_buku`) REFERENCES `kategori_buku` (`id_kategori_buku`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_buku`
--
ALTER TABLE `transaksi_buku`
  ADD CONSTRAINT `transaksi_buku_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishtlist_buku`
--
ALTER TABLE `wishtlist_buku`
  ADD CONSTRAINT `wishtlist_buku_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishtlist_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
