-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2025 pada 16.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftar_karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_absensi`
--

CREATE TABLE `karyawan_absensi` (
  `NIP` int(12) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Umur` int(2) NOT NULL,
  `Jenis_kelamin` char(1) NOT NULL,
  `Departemen` varchar(25) NOT NULL,
  `Jabatan` varchar(25) NOT NULL,
  `Kota_asal` varchar(25) NOT NULL,
  `Tanggal_absensi` date NOT NULL,
  `Jam_masuk` time NOT NULL,
  `Jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan_absensi`
--

INSERT INTO `karyawan_absensi` (`NIP`, `Nama`, `Umur`, `Jenis_kelamin`, `Departemen`, `Jabatan`, `Kota_asal`, `Tanggal_absensi`, `Jam_masuk`, `Jam_pulang`) VALUES
(454545, 'sada', 28, 'L', 'Nyapu', 'Manajer', 'Pamekasan', '2025-05-28', '23:33:00', '04:43:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(7, 'wahyu', '$2y$10$T.mqGlCIzInrn2BVCWtog.M.HeN2Ow3FxqmhZ84TDeNvM0nbTE.6O');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan_absensi`
--
ALTER TABLE `karyawan_absensi`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
