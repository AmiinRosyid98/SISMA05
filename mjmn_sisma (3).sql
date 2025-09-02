-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2025 pada 09.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mjmn_sisma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `billing_date` date NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `status` enum('unpaid','paid','failed') DEFAULT 'unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_pembayaran` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga`
--

CREATE TABLE `lembaga` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `nama_lembaga` varchar(150) DEFAULT NULL,
  `lembaga_naungan` varchar(150) DEFAULT NULL,
  `status_lembaga` enum('NEGERI','SWASTA') DEFAULT NULL,
  `pemerintah` enum('KOTA','KABUPATEN','PROVINSI','PUSAT') DEFAULT NULL,
  `jumlah_siswa` int(11) DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `nomor_telp` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `nama_kepala_sekolah` varchar(150) DEFAULT NULL,
  `nip_nuptk` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kab_kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `logo_lembaga` varchar(255) DEFAULT NULL,
  `status_pengajuan` enum('waiting','aktif','nonaktif','rejected') DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `alasan_ditolak` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lembaga`
--

INSERT INTO `lembaga` (`id`, `user_id`, `npsn`, `nama_lembaga`, `lembaga_naungan`, `status_lembaga`, `pemerintah`, `jumlah_siswa`, `periode`, `nomor_telp`, `email`, `website`, `nama_kepala_sekolah`, `nip_nuptk`, `alamat`, `kab_kota`, `provinsi`, `kode_pos`, `latitude`, `longitude`, `logo_lembaga`, `status_pengajuan`, `created_at`, `updated_at`, `deleted_at`, `alasan_ditolak`) VALUES
(6, 2, '213124', 'SMA SOLUTION', 'MGE SOLUTION', 'SWASTA', 'KOTA', 1000, 1, '08883558303', 'shodiqulad98@gmail.com', 'mge.sakola.com', 'AAM', '23423', 'Jl. Nginden intan utara', 'Surabaya', 'Jawa Timur', '12321', '-7.306606', '112.767950', 'logo_1756195232_2824.png', 'aktif', '2025-08-26 03:00:32', '2025-08-29 14:53:24', NULL, ''),
(7, 5, '234234', 'LEMBAGA One And Only', 'OJK', 'NEGERI', 'KOTA', 100, 3, '085784325916', 'rindah@gmail.com', 'sdasd.com', 'RINDAH CANTIK', '23423423452322', 'Lamongan', 'Lamongan', 'Jawa Timur', '231232', '-7.311791', '112.676055', 'logo_1756479909_9860.png', 'aktif', '2025-08-29 15:05:09', '2025-08-29 16:18:12', NULL, 'Data Kurang Lengkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `biaya_langganan` int(11) DEFAULT NULL,
  `masa_trial` int(11) DEFAULT NULL,
  `tripay_link` text DEFAULT NULL,
  `tripay_api_key` text DEFAULT NULL,
  `tripay_private_key` text DEFAULT NULL,
  `tripay_merchant_id` varchar(255) DEFAULT NULL,
  `send_wa_url` varchar(255) DEFAULT NULL,
  `send_wa_api_key` text DEFAULT NULL,
  `send_wa_sender_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `biaya_langganan`, `masa_trial`, `tripay_link`, `tripay_api_key`, `tripay_private_key`, `tripay_merchant_id`, `send_wa_url`, `send_wa_api_key`, `send_wa_sender_number`) VALUES
(1, 4000, 7, 'https://tripay.co.id/api-sandbox/', 'DEV-JFgjJz5prcYoGm5mqk9B4sRgBUD0sqlCFBgNKxeM', '8TJSt-Ec102-9UHnQ-L9ip5-2Nbrg', 'T7222', 'https://app.saifudin.web.id/send-message', 'CT8wXjOMsa4WtVWHeLHpar5uPq4WkJ', '628883558303');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lembaga_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `trial_end` date NOT NULL,
  `next_billing` date NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` enum('trial','active','expired') DEFAULT 'trial',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `merchant_ref` varchar(100) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `amount_awal` decimal(15,2) NOT NULL,
  `biayaadmin` decimal(15,2) DEFAULT 0.00,
  `status` varchar(50) NOT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_email` varchar(150) DEFAULT NULL,
  `pay_code` varchar(100) DEFAULT NULL,
  `qr_url` text DEFAULT NULL,
  `barcode_url` text DEFAULT NULL,
  `id_invoice` int(11) DEFAULT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `wa` varchar(20) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lembaga` varchar(150) DEFAULT NULL,
  `role` enum('admin','lembaga') DEFAULT NULL,
  `status` enum('waiting','aktif','nonaktif','ditolak') DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `approved_at` timestamp NULL DEFAULT NULL,
  `reject_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `wa`, `kota`, `password`, `nama_lembaga`, `role`, `status`, `created_at`, `updated_at`, `approved_at`, `reject_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', '08883558303', 'Bandung', '$2y$10$x5hEDkT0fYwVK4KQ0prI9.gvYQBycDUfeTNpSTkteaKPXapSt6lM6', 'admin', 'admin', 'aktif', '2025-08-24 02:12:14', '2025-08-24 07:13:42', NULL, NULL, NULL),
(2, 'AAM edit', 'shodiqulad98@gmail.com', '085784325916', 'Lamongan', '$2y$10$AFDAJsUDTHalUMsUdZ4ypuhRkz/J/lYKrVePhImpyBU4AsNYnu6k2', 'SMA AL HIKMAH', 'lembaga', 'aktif', '2025-08-24 02:13:18', '2025-08-29 07:27:42', NULL, NULL, NULL),
(3, 'Rindah', 'niarindahfatimah@gmail.com', '085704703714', 'Lamongan', '$2y$10$c4Pt9PSz9PTXi8xcXRb9s.1Qly4f3KpS6e0dq.GTIrdIaQqeko3d.', 'LEMBAGA 1', 'lembaga', 'waiting', '2025-08-29 06:57:24', NULL, NULL, NULL, NULL),
(4, 'RINDAH', 'nia@gmail.com', '085704703714', 'Lamongan', '$2y$10$kuoP1p5yr3B4mZ5rNk0dNOvahjQdaWw3U/xl43THzOcOBUFj0HJky', 'LEMBAGA 2', 'lembaga', 'aktif', '2025-08-29 07:03:04', '2025-08-30 15:28:47', NULL, NULL, NULL),
(5, 'RINDAH CANTIK', 'rindah@gmail.com', '085704703714', 'Lamongan', '$2y$10$Mc0oyAkw3bNI54HHHWwQdObtllqB6scH4x.7IGTFt7p0GqDjGf/aS', 'Lembaga 3', 'lembaga', 'aktif', '2025-08-29 07:05:25', '2025-08-29 15:35:07', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
