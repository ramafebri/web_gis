-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 13.45
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
(1, 'Queenstown', '-45.039843', '168.673639', 'Queenstown adalah sebuah kota yang berada di South Island. Kota ini memiliki reputasi yang sangat terkenal sebagai pusat tempat petualangan di New Zealand. Jika kamu berkunjung ke tempat ini saat musim dingin, maka kamu bisa mencoba bermain ski di tempat ', 'queenstown.jpg'),
(2, 'Hobitton', '-37.8700757', '175.6746189', 'Kalau kamu adalah penggemar film The Lord of the Rings atau The Hobbit, maka kamu wajib banget buat datang ke Matamata. Di sini kamu bisa merasakan hidup di kampung hobbit alias Hobbiton yang ada di dalam kedua film itu.', 'Hobbiton.jpg'),
(3, 'Christchurch', '-43.5264199', '172.629163', 'Salah satu destinasi wisata yang terkenal di kota ini adalah Christchurch Botanic Gardens yang merupakan sebuah taman botani. Di sini kamu bisa melihat pohon tertua, tertinggi, dan terbesar yang ada di New Zealand.', 'Christchurch.jpg');

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
  MODIFY `bangunan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
