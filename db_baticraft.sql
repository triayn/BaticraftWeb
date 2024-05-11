-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2024 pada 01.04
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_baticraft`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(3, 3, 13, 1, '2024-05-04 15:39:08', '2024-05-04 15:39:08'),
(4, 3, 15, 1, '2024-05-04 15:40:01', '2024-05-04 15:40:01'),
(5, 3, 12, 1, '2024-05-05 04:01:16', '2024-05-05 04:01:16'),
(8, 3, 11, 1, '2024-05-11 22:50:18', NULL),
(9, 1, 10, 1, '2024-05-11 22:50:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `image_products`
--

CREATE TABLE `image_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_products`
--

INSERT INTO `image_products` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(6, 9, 'vcztH8WQrSJiZj3xFSitZo5VlezMswK35gIak7bK.png', '2024-04-28 07:29:41', '2024-04-28 07:29:41'),
(7, 9, 'LFEiv2JP2oM4yZTIqlqfyZyiXxFgQ0x4FnRrBYrH.png', '2024-04-28 07:29:41', '2024-04-28 07:29:41'),
(8, 10, 'FxdWugPL3QiVTSszWBHhng0dmXvxN85tiyPjKW8z.png', '2024-04-28 08:09:30', '2024-04-28 08:09:30'),
(9, 10, 'JoPqGiwKiiAWaMMtlPEV6BXnoTpR4RTvyUePwHqQ.png', '2024-04-28 08:09:30', '2024-04-28 08:09:30'),
(10, 10, '1AifcyhbwoR0dt0I1tIn3FsmzavmpHHUUxq6WCpA.png', '2024-04-28 08:09:30', '2024-04-28 08:09:30'),
(11, 11, 'kivTWzS7Y7XpDV3MrU0uRcUlUn1Z9zO4bRZFb2tv.png', '2024-04-28 11:22:22', '2024-04-28 11:22:22'),
(12, 11, 'w4lwyvIUG6mclfqFAslGlcvkPpJ8olaMD4ASXyMn.png', '2024-04-28 11:22:22', '2024-04-28 11:22:22'),
(13, 12, 'Fhvq9CXyY89PcD6mmQ5gZC974F13fnxKORJVwnqv.png', '2024-04-28 11:25:56', '2024-04-28 11:25:56'),
(14, 12, 'fXnv9I0clTQLolvOaeaRVqtUX2AJyFivOoyx5bZP.png', '2024-04-28 11:25:56', '2024-04-28 11:25:56'),
(15, 13, '64zod92h3ZdSJZoPbn0LBmJY9ZLR630pvRnbrTWv.png', '2024-04-28 23:53:17', '2024-04-28 23:53:17'),
(16, 13, 'QE3tfFFoiQyWl5NvnbGm7KLlr9I4B0iCOxneu0WG.png', '2024-04-28 23:53:17', '2024-04-28 23:53:17'),
(17, 14, 'CxcgEgEufAl5GeyQni6J4hPlhr8bSRrKflEh2Bfm.png', '2024-04-28 23:57:10', '2024-04-28 23:57:10'),
(18, 15, '1uycIt86q0Rxlm3ZJ0Ho3LIGaUHLIGHjBxjNEi4J.png', '2024-04-29 00:01:01', '2024-04-29 00:01:01'),
(19, 15, 'Ay8LhqOsgB38v1SrR3kPxKfzNLToc6otmGbQNA6x.png', '2024-04-29 00:01:01', '2024-04-29 00:01:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `akun_ig` varchar(255) DEFAULT NULL,
  `akun_fb` varchar(255) DEFAULT NULL,
  `akun_tiktok` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informations`
--

INSERT INTO `informations` (`id`, `nama_pemilik`, `nama_toko`, `alamat`, `lokasi`, `deskripsi`, `no_telpon`, `email`, `image`, `akun_ig`, `akun_fb`, `akun_tiktok`, `created_at`, `updated_at`) VALUES
(1, 'Sri Suwarsih Loceret', 'Griya Batik Sri Siji Nganjuk', 'Perumnas Candirejo Blok GG No. 10, Gejagan, Kec. Nganjuk, Kabupaten Nganjuk, Jawa Timur 64471', 'https://maps.app.goo.gl/m67hDUDyzmQaj3Qy9', 'Griya Batik Sri Siji adalah salah satu griya produksi batik handmade yang ada di Kabupaten Nganjuk. Griya ini memproduksi berbagai macam produk batik, seperti kain, kaos dan kemeja.', '6282338872002', 'baticraft@gmail.com', 'dVl87n34Nj4nXcMxR4SCrsXyh8IXu7osyaALj823.jpg', '@srisijibatik', 'Sri Siji Batik Nganjuk', '@srisiji', NULL, '2024-05-08 02:27:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_13_022347_create_produks_table', 1),
(7, '2024_03_15_152135_create_informations_table', 1),
(8, '2024_03_15_154008_create_transactions_tables', 2),
(9, '2024_03_16_054129_create_image_products_table', 3),
(10, '2024_03_16_054359_create_carts_table', 3),
(11, '2024_03_16_054756_create_transaction_details_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_product` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` enum('kain','kaos','kemeja') NOT NULL,
  `stok` int(11) NOT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `bahan` varchar(255) DEFAULT NULL,
  `panjang_kain` varchar(11) DEFAULT NULL,
  `lebar_kain` varchar(11) DEFAULT NULL,
  `jenis_batik` varchar(255) NOT NULL,
  `jenis_lengan` enum('pendek','panjang') DEFAULT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `kode_product`, `nama`, `deskripsi`, `harga`, `kategori`, `stok`, `ukuran`, `bahan`, `panjang_kain`, `lebar_kain`, `jenis_batik`, `jenis_lengan`, `status`, `created_at`, `updated_at`) VALUES
(9, 'BTK009', 'Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba', 'Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba , Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba , Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba , Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba', 175000, 'kain', 5, '30', 'Katun', '100 M', '200 M', 'Batik Sarimbitan', NULL, 'tidak tersedia', '2024-04-28 07:29:41', '2024-04-28 11:22:56'),
(10, 'BTK010', 'Kaos Anak Dengan Desain Khas Batik Jayastamba', 'Kaos Anak Dengan Desain Khas Batik Jayastamba, Kaos Anak Dengan Desain Khas Batik Jayastamba, Kaos Anak Dengan Desain Khas Batik Jayastamba, Kaos Anak Dengan Desain Khas Batik Jayastamba', 90000, 'kaos', 4, '37', 'Katun', NULL, NULL, 'Batik Sarimbitan', 'pendek', 'tersedia', '2024-04-28 08:09:29', '2024-04-28 08:09:29'),
(11, 'BTK011', 'Kemeja Batik Sarimbitan dengan Motif Khas Batik Jayastamba Warna Coklat', 'Kemeja Batik Sarimbitan dengan Motif Khas Batik Jayastamba Warna Coklat, Kemeja Batik Sarimbitan dengan Motif Khas Batik Jayastamba Warna Coklat, Kemeja Batik Sarimbitan dengan Motif Khas Batik Jayastamba Warna Coklat, Kemeja Batik Sarimbitan dengan Motif Khas Batik Jayastamba Warna Coklat', 175000, 'kemeja', 3, 'XL', 'Katun', NULL, NULL, 'Batik Cap', 'panjang', 'tersedia', '2024-04-28 11:22:21', '2024-04-28 11:22:21'),
(12, 'BTK012', 'Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba warna magenta', 'Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba Bisa digunakan untuk kondangan, Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba Bisa digunakan untuk kondangan, Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba Bisa digunakan untuk kondangan, Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba Bisa digunakan untuk kondangan, Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba Bisa digunakan untuk kondangan', 240000, 'kain', 2, '2,25 M', 'Katun', '100', '250', 'Batik Sarimbitan', NULL, 'tersedia', '2024-04-28 11:25:56', '2024-04-28 11:25:56'),
(13, 'BTK013', 'Kain Batik Pekalongan / Kain Batik Sogan', 'Dinamakan batik sogan karena pada awal mulanya, proses pewarnaan batik ini menggunakan pewarna alami yang diambil dari batang kayu pohon soga.', 120000, 'kain', 6, '80 g', 'Katun', '100', '250', 'Batik Tulis', NULL, 'tersedia', '2024-04-28 23:53:16', '2024-04-28 23:53:16'),
(14, 'BTK014', 'Kemeja Dewasa Dengan Desain Khas Batik Jayastamba', '\"Jayastamba artinya tugu kemenangan,\" ujar Kasi Sejarah, Seni Tradisi, Museum, dan Kepurbakalaan Dinas Pariwisata, Pemuda, Olahraga dan Kebudayaan (Disparporabud) Kabupaten Nganjuk Amin Fuadi.', 90000, 'kemeja', 9, '42', 'Katun', NULL, NULL, 'Batik Cap', 'panjang', 'tersedia', '2024-04-28 23:57:10', '2024-04-28 23:57:10'),
(15, 'BTK015', 'Kaos dewasa Dengan Desain Khas Batik Jayastamba', '\"Jayastamba artinya tugu kemenangan,\" ujar Kasi Sejarah, Seni Tradisi, Museum, dan Kepurbakalaan Dinas Pariwisata, Pemuda, Olahraga dan Kebudayaan (Disparporabud) Kabupaten Nganjuk Amin Fuadi.', 90000, 'kaos', 3, '37', 'Katun', NULL, NULL, 'Batik Cap', 'pendek', 'tersedia', '2024-04-29 00:01:01', '2024-04-29 00:01:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kasir` varchar(255) DEFAULT NULL,
  `jenis_transaksi` enum('pesan','langsung') NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `catatan_customer` varchar(255) DEFAULT NULL,
  `status_transaksi` enum('menunggu','diproses','ditolak','selesai') NOT NULL,
  `catatan_admin` varchar(255) DEFAULT NULL,
  `tanggal_konfirmasi` datetime DEFAULT NULL,
  `tanggal_expired` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `kode_transaksi`, `user_id`, `kasir`, `jenis_transaksi`, `total_item`, `total_harga`, `catatan_customer`, `status_transaksi`, `catatan_admin`, `tanggal_konfirmasi`, `tanggal_expired`, `created_at`, `updated_at`) VALUES
(2, '20040505JIKU', 3, '1', 'pesan', 3, 270000, 'Pesanan baju batik', 'menunggu', NULL, '2024-04-28 12:01:09', '2024-05-08 00:21:46', '2024-05-04 17:21:46', NULL),
(3, '20240805KLSJ', 3, NULL, 'pesan', 3, 385000, 'Pakai aja', 'ditolak', 'maaf yah bro, belum bisa dipesan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-08 01:41:25', '2024-05-10 15:19:50'),
(4, '20240812OKIJ', 3, NULL, 'pesan', 3, 440000, 'bisa nda?', 'selesai', '', '2024-05-31 09:10:00', '2024-06-07 19:10:00', '2024-05-12 01:43:22', '2024-05-11 16:14:54'),
(5, '20240810', 1, NULL, 'langsung', 3, 270000, NULL, 'selesai', NULL, NULL, NULL, '2024-05-11 01:45:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `nama_product`, `jumlah`, `harga_total`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 'Kaos Anak Dengan Desain Khas Batik Jayastamba', 1, 90000, '2024-05-04 17:24:23', NULL),
(2, 4, 15, 'Kaos dewasa Dengan Desain Khas Batik Jayastamba', 1, 90000, '2024-05-10 14:33:52', NULL),
(3, 4, 11, 'Kemeja Batik Sarimbitan dengan Motif Khas Batik Jayastamba Warna Coklat', 2, 350000, '2024-05-10 14:34:42', NULL),
(4, 3, 14, 'Kemeja Dewasa Dengan Desain Khas Batik Jayastamba', 1, 90000, '2024-05-10 15:12:02', NULL),
(6, 3, 13, 'Kain Batik Pekalongan / Kain Batik Sogan', 1, 120000, '2024-05-10 15:13:58', NULL);

--
-- Trigger `transaction_details`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `transaction_details` FOR EACH ROW BEGIN
UPDATE products
SET stok = stok - NEW.jumlah
WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `role` enum('pembeli','admin') DEFAULT 'pembeli',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `no_telpon`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Tria Yunita', '+62895342743004', 'Desa Gemenggeng Bagor Nganjuk Jawa Timur', 'perempuan', 'Nganjuk', '2003-06-04', 'admin', 'triaynta@gmail.com', NULL, '$2y$10$LTi4d1uP2WP6Fxi6knni2Os3fBZd9QiOEXkBrdugKQKKNLvQEeNCS', 'sOs8xRcdZYAXplYJEU71E6ToyyEIJPmQz34ISk3RjJfM0EqrSpTftsZeCocE', '2024-03-22 23:45:37', '2024-05-11 03:53:02', 'K8yNT6tRpaHm6Tv1tyTXEKpN0cgsavpFi6K7p9Vu.jpg'),
(3, 'Tria Yunita Loh', '089564321234', 'Kauman, Kec. Nganjuk, Kabupaten Nganjuk, Jawa Timur 64411', 'perempuan', 'Nganjuk', '2003-06-04', 'pembeli', 'admin@email.com', NULL, '$2y$10$p7628Ttuo7nYfGSc6gzlcOaQkt.YAESwWC.iTfXZfmaG0nePxYF9y', NULL, '2024-03-22 23:59:53', '2024-05-11 03:42:07', 'zvS8cLyIEGJMEmQCPDpWlGDz3drnUB41B1NajFfi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_products_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `informations_email_unique` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
