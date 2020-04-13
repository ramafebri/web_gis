-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2020 pada 18.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangunan`
--

CREATE TABLE `bangunan` (
  `bangunan_id` int(11) NOT NULL,
  `bangunan_nama` varchar(255) NOT NULL,
  `bangunan_lat` varchar(255) NOT NULL,
  `bangunan_long` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bangunan`
--

INSERT INTO `bangunan` (`bangunan_id`, `bangunan_nama`, `bangunan_lat`, `bangunan_long`, `keterangan`, `gambar`) VALUES
(1, 'Queenstown', '-41.290957', '174.77834', 'Wisata', 'queenstown2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangunan_polygon`
--

CREATE TABLE `bangunan_polygon` (
  `id_polygon` int(11) NOT NULL,
  `name_polygon` varchar(255) NOT NULL,
  `coordinates` text NOT NULL,
  `information` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bangunan_polygon`
--

INSERT INTO `bangunan_polygon` (`id_polygon`, `name_polygon`, `coordinates`, `information`, `photo`) VALUES
(16, 'Danau', '[[174.780185,-41.290507],[174.781172,-41.289636],[174.782653,-41.289604],[174.783254,-41.290201],[174.783275,-41.291023],[174.782696,-41.291474],[174.780185,-41.290507]]', 'baju', 'queenstown1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `level`) VALUES
(2, 'ramafebri', '202cb962ac59075b964b07152d234b70', 'Rama Febriansyah', 'admin'),
(3, 'danar123', '202cb962ac59075b964b07152d234b70', 'Naufal Yudanars', 'regular'),
(4, 'abhin', '202cb962ac59075b964b07152d234b70', 'Aryo Anindyo', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`bangunan_id`);

--
-- Indeks untuk tabel `bangunan_polygon`
--
ALTER TABLE `bangunan_polygon`
  ADD PRIMARY KEY (`id_polygon`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bangunan`
--
ALTER TABLE `bangunan`
  MODIFY `bangunan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bangunan_polygon`
--
ALTER TABLE `bangunan_polygon`
  MODIFY `id_polygon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
