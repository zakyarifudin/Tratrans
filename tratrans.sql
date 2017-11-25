-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Nov 2017 pada 02.39
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tratrans`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(12) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `terminal_asal` varchar(30) NOT NULL,
  `kota_asal` varchar(30) NOT NULL,
  `terminal_tujuan` varchar(30) DEFAULT NULL,
  `kota_tujuan` varchar(30) DEFAULT NULL,
  `waktu` time NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `perusahaan`, `terminal_asal`, `kota_asal`, `terminal_tujuan`, `kota_tujuan`, `waktu`, `harga`) VALUES
(3, 'nusantara', 'jombor', 'yogyakarta', 'terboyo', 'semarang', '12:00:00', 60000),
(4, 'nusantara', 'jombor', 'yogyakarta', 'terboyo', 'semarang', '14:00:00', 60000),
(5, 'nusantara', 'jombor', 'yogyakarta', 'terboyo', 'semarang', '16:00:00', 60000),
(6, 'ramayana', 'jombor', 'yogyakarta', 'terboyo', 'semarang', '09:00:00', 65000),
(7, 'ramayana', 'jombor', 'yogyakarta', 'terboyo', 'semarang', '11:00:00', 65000),
(8, 'ramayana', 'jombor', 'yogyakarta', 'terboyo', 'semarang', '13:00:00', 65000),
(9, 'Nusantara', 'jombor', 'yogyakarta', 'Banyumanik', 'Semarang', '09:15:00', 63000),
(10, 'Nusantara', 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', '10:30:00', 80000),
(11, 'Nusantara', 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', '13:30:00', 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(12) NOT NULL,
  `pemesan` varchar(30) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `waktu` time NOT NULL,
  `jenis` enum('offline','online') NOT NULL,
  `status` enum('belum dibayar','dibayar') NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `admin` varchar(30) NOT NULL,
  `jml_kursi` int(11) NOT NULL,
  `terminal_asal` varchar(30) NOT NULL,
  `kota_asal` varchar(30) NOT NULL,
  `terminal_tujuan` varchar(30) NOT NULL,
  `kota_tujuan` varchar(30) NOT NULL,
  `biaya` int(20) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `pemesan`, `tanggal_pesan`, `tanggal_berangkat`, `waktu`, `jenis`, `status`, `perusahaan`, `admin`, `jml_kursi`, `terminal_asal`, `kota_asal`, `terminal_tujuan`, `kota_tujuan`, `biaya`, `bukti`) VALUES
(1, 'arif', '2017-11-01', '2017-11-02', '09:00:00', 'offline', 'dibayar', 'Nusantara', 'udin', 2, 'Jombor', 'Yogyakarta', 'Terboyo', 'Semarang', 130000, ''),
(2, 'suyono', '2017-11-01', '2017-11-02', '09:00:00', 'offline', 'dibayar', 'Nusantara', 'udin', 3, 'Jombor', 'Yogyakarta', 'Terboyo', 'Semarang', 195000, ''),
(3, 'zakyar', '2017-11-01', '2017-11-02', '12:00:00', 'offline', 'dibayar', 'Nusantara', 'udin', 2, 'Jombor', 'Yogyakarta', 'Terboyo', 'Semarang', 130000, ''),
(4, 'jojo', '2017-11-01', '2017-11-02', '09:00:00', 'offline', 'dibayar', 'Nusantara', 'artha', 1, 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', 80000, ''),
(9, 'arif', '2017-11-18', '2017-11-20', '13:00:00', 'online', 'dibayar', 'ramayana', '', 1, 'jombor', 'yogyakarta', 'terboyo', 'semarang', 65000, 'assets/images/bukti/tabel join mysql.png'),
(10, 'arif', '2017-11-18', '2017-11-19', '10:30:00', 'online', 'dibayar', 'Nusantara', 'udin', 1, 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', 80000, 'assets/images/bukti/simcard.jpg'),
(11, 'arif', '2017-11-19', '2017-11-22', '12:00:00', 'online', 'belum dibayar', 'nusantara', '', 2, 'jombor', 'yogyakarta', 'terboyo', 'semarang', 120000, 'assets/images/bukti/wwwww.jpg'),
(12, 'arif', '2017-11-19', '2017-11-23', '10:30:00', 'online', 'belum dibayar', 'Nusantara', '', 2, 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', 160000, ''),
(13, 'Mbake', '2017-11-19', '2017-11-20', '13:30:00', 'offline', 'dibayar', 'Nusantara', 'udin', 3, 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', 240000, ''),
(15, 'coba', '2017-11-21', '2017-11-22', '13:30:00', 'online', 'belum dibayar', 'Nusantara', '', 2, 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', 160000, 'assets/images/bukti/conann.png'),
(16, 'coba', '2017-11-21', '2017-11-22', '09:15:00', 'online', 'belum dibayar', 'Nusantara', '', 3, 'jombor', 'yogyakarta', 'Banyumanik', 'Semarang', 189000, 'assets/images/bukti/obrolan-kocak-guru-dan-murid-1-12.jpg'),
(17, 'coba', '2017-11-21', '2017-11-24', '14:00:00', 'online', 'belum dibayar', 'nusantara', '', 2, 'jombor', 'yogyakarta', 'terboyo', 'semarang', 120000, ''),
(18, 'arif', '2017-11-24', '2017-11-25', '09:15:00', 'online', 'belum dibayar', 'Nusantara', '', 3, 'jombor', 'yogyakarta', 'Banyumanik', 'Semarang', 189000, ''),
(19, 'Joko', '2017-11-24', '2017-11-25', '10:30:00', 'offline', 'dibayar', 'Nusantara', 'udin', 2, 'Jombor', 'Yogyakarta', 'Jati', 'Kudus', 160000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis` enum('pusat','cabang','member') NOT NULL,
  `terminal` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `noktp` varchar(16) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `perusahaan`, `email`, `username`, `nama`, `password`, `jenis`, `terminal`, `kota`, `noktp`, `nohp`, `alamat`) VALUES
(1, 'Nusantara', '', 'zaky', '', 'zaky', 'pusat', '', '', '', '', ''),
(2, '', '', 'arif', '', 'arif', 'member', '', '', '', '', ''),
(3, 'Nusantara', 'udin111@mail.com', 'udin', 'Bang Udin', 'udin', 'cabang', 'Jombor', 'Yogyakarta', '8378483249923', '089999222345', 'Sleman , Yogyakarta'),
(5, '', 'zakyarifudin@yahoo.com', 'zakyar', 'zaky arifudin', 'arif', 'member', '', '', '', '08122685864', 'jepara'),
(6, 'Ramayana', 'ilham@mail.com', 'ilham', 'ilham muh', 'salsa', 'cabang', 'Jombor', 'Yogyakarta', '9898989898', '08122685000', 'Kudus'),
(7, 'Nusantara', 'artha@mail.com', 'artha', 'sugiharta', 'artha', 'cabang', 'Jombor', 'Yogyakarta', '84858488292859', '081112223334', 'Gunung Kidul , Yogyakarta'),
(8, 'Nusantara', 'yummy@mail.com', 'yummy', 'enak enak', 'yummy', 'cabang', 'Jombor', 'Yogyakarta', '98989865656', '08122685222', 'Wates , Yogyakarta'),
(9, '', 'coba@gmail.com', 'coba', 'coba coba', 'coba', 'member', '', '', '', '08122685909', 'Yogyakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
