-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2024 pada 11.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kodebr` varchar(20) NOT NULL,
  `namabr` varchar(100) NOT NULL,
  `keteranganbr` text DEFAULT NULL,
  `qtybr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kodebr`, `namabr`, `keteranganbr`, `qtybr`) VALUES
('b2', 'Barang', 'Ada', 1),
('br4', 'dongel', 'ada', 2),
('br7', 'spidol', 'warna hitam', 8),
('PR1', 'Proyektor', 'Ada', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `namadosen` varchar(100) NOT NULL,
  `matakuliah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `namadosen`, `matakuliah`) VALUES
('DO1', 'Febry', 'PBO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `koderu` varchar(20) NOT NULL,
  `namaru` varchar(100) NOT NULL,
  `keteranganru` text DEFAULT NULL,
  `qtyru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`koderu`, `namaru`, `keteranganru`, `qtyru`) VALUES
('A.2.1', 'Ruang Kelas', 'Gedung A Lt. 2', 1),
('A.2.4', 'Ruang Kelas', 'Gedung A Lt. 2', 1),
('A.4.3', 'Ruang Kelas', 'Gedung A Lt. 4', 1),
('A.5.1', 'Lab Jaringan', 'Gedung A Lt. 5', 1),
('A.5.2', 'Lab CAD', 'Gedung A Lt. 5', 1),
('B.2.1', 'Ruang Kelas', 'Gedung B Lt. 2', 1),
('B.3.2', 'Ruang Kelas', 'Gedung B Lt. 3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksibr`
--

CREATE TABLE `transaksibr` (
  `kodetrbr` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `kodebr` varchar(20) DEFAULT NULL,
  `peminjamanbr` datetime NOT NULL,
  `selesaibr` datetime DEFAULT NULL,
  `pengembalianbr` datetime DEFAULT NULL,
  `qtybr` int(11) NOT NULL,
  `keteranganbr` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksibr`
--

INSERT INTO `transaksibr` (`kodetrbr`, `id`, `username`, `nip`, `kodebr`, `peminjamanbr`, `selesaibr`, `pengembalianbr`, `qtybr`, `keteranganbr`) VALUES
(64, 1322067, 'Fajar Shadiq Saputra', 'DO1', 'b2', '2024-07-03 09:00:00', '2024-07-03 10:00:00', '2024-07-03 10:53:00', 1, 'OK'),
(65, 1322067, 'Fajar Shadiq Saputra', 'DO1', 'PR1', '2024-07-06 09:00:00', '2024-07-06 09:00:00', '0000-00-00 00:00:00', 1, 'Ada'),
(71, 121, 'pesulap merah', 'DO1', 'PR1', '2024-07-12 11:41:00', '2024-07-08 11:41:00', '0000-00-00 00:00:00', 2, 'ah males'),
(74, 1322057, 'rafi saputra', 'DO1', 'b2', '2024-07-08 13:30:00', '2024-07-08 15:31:00', '0000-00-00 00:00:00', 1, 'buat lu aje');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksiru`
--

CREATE TABLE `transaksiru` (
  `kodetrru` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `koderu` varchar(20) DEFAULT NULL,
  `peminjamanru` datetime NOT NULL,
  `selesairu` datetime DEFAULT NULL,
  `pengembalianru` datetime DEFAULT NULL,
  `qtyru` int(11) NOT NULL,
  `keteranganru` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksiru`
--

INSERT INTO `transaksiru` (`kodetrru`, `id`, `username`, `nip`, `koderu`, `peminjamanru`, `selesairu`, `pengembalianru`, `qtyru`, `keteranganru`) VALUES
(7, 1322067, 'Fajar Shadiq Saputra', 'DO1', 'A.5.1', '2024-07-06 08:31:00', '2024-07-06 08:31:00', '2024-07-09 09:51:00', 1, 'Ada'),
(11, 212, 'rapis', 'DO1', 'A.2.1', '2024-07-08 09:59:00', '2024-07-08 12:59:00', '2024-07-16 14:34:00', 1, 'gatau'),
(12, 123, 'aman', 'DO1', 'A.4.3', '2024-07-08 14:11:00', '2024-07-10 14:12:00', '2024-07-08 17:36:00', 1, 'kelas pengganti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pjkelas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(121, '2', '2', 'admin'),
(123, 'Admin', 'Admin123', 'admin'),
(212, '1', '1', 'pjkelas'),
(1234, 'Fajar', '12345678', 'pjkelas'),
(1322057, 'rafi saputra', '021203', 'admin'),
(1322067, 'Fajar Shadiq Saputra', '1322067', 'pjkelas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebr`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`koderu`);

--
-- Indeks untuk tabel `transaksibr`
--
ALTER TABLE `transaksibr`
  ADD PRIMARY KEY (`kodetrbr`),
  ADD KEY `id` (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kodebr` (`kodebr`);

--
-- Indeks untuk tabel `transaksiru`
--
ALTER TABLE `transaksiru`
  ADD PRIMARY KEY (`kodetrru`),
  ADD KEY `id` (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `koderu` (`koderu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksibr`
--
ALTER TABLE `transaksibr`
  MODIFY `kodetrbr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `transaksiru`
--
ALTER TABLE `transaksiru`
  MODIFY `kodetrru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1322068;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksibr`
--
ALTER TABLE `transaksibr`
  ADD CONSTRAINT `transaksibr_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksibr_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `transaksibr_ibfk_3` FOREIGN KEY (`kodebr`) REFERENCES `barang` (`kodebr`);

--
-- Ketidakleluasaan untuk tabel `transaksiru`
--
ALTER TABLE `transaksiru`
  ADD CONSTRAINT `transaksiru_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksiru_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `transaksiru_ibfk_3` FOREIGN KEY (`koderu`) REFERENCES `ruangan` (`koderu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
