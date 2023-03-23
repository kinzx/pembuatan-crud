-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 02:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps-siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `status` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `id_pekerjaan`, `id_perusahaan`, `id_pelamar`, `status`) VALUES
(23, 567, 344, 7932, 'Pelamar'),
(34, 234, 233, 3845, 'Pelamar'),
(54, 895, 568, 9452, 'Pelamar'),
(56, 432, 248, 6543, 'Pelamar'),
(78, 786, 556, 8734, 'Pelamar');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(30) NOT NULL,
  `nama_pekerjaan` varchar(120) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` varchar(120) NOT NULL,
  `gaji` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`, `deskripsi`, `lokasi`, `gaji`) VALUES
(234, 'host live instagram (freelance)', 'mengelola instagram perusahaan dan rutin mengadakan live instagram.', 'cibinong,sleman', 3500000),
(432, 'sales promotor elektronik', 'penjualan dan pemasaran barang elektronik.', 'Jakarta', 5400000),
(567, 'finance staff', 'mengurusi keuangan kantor.', 'sleman', 2500000),
(786, 'accounting finance', 'mengurus administrasi dan keuangan kantor.', 'sleman', 3500000),
(895, 'desk collection', 'mengurus keuangan dan administrasi kantor.', 'Yogyakarta', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `nama_pelamar` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `no_telp` varchar(120) NOT NULL,
  `pendidikan` varchar(120) NOT NULL,
  `pengalaman` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nama_pelamar`, `alamat`, `no_telp`, `pendidikan`, `pengalaman`) VALUES
(3845, 'Hananta Saputra', 'Yogyakarta', '085567834215', 'Sarjana', 'Pernah menjadi staff bagian administrasi'),
(6543, 'Anton Wijaya', 'Banguntapan bantul', '084563776543', 'Sarjana', 'Pernah kerja di bank selama 3 tahun'),
(7932, 'Khail Adnan', 'Bogor', '084563229164', 'Sarjana', 'Pernah menjadi agen promosi rumah dan funiture'),
(8734, 'Santi Kinasih', 'Sleman', '084558235466', 'Sarjana', 'Pernah kerja di ecommers'),
(9452, 'Mahesa Putra', 'Bantul', '084552921634', 'Sarjana', 'Pernah bekerja di pegadaian');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(30) NOT NULL,
  `nama_perusahaan` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `no_telp` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `no_telp`) VALUES
(233, 'PT Wijaya Inovasi Gemilang', 'Sleman', '087756423213'),
(248, 'PT Telmark Integrasi Indonesia', 'Yogyakarta', '084522378432'),
(344, 'PT Mitra Berkat Abadi', 'Jakarta', '084533756384'),
(556, 'Elenzio', 'cibinong sleman', '083645287456'),
(568, 'PT Bukit Alam Permata', 'Sleman', '084513324895');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `kelas_siswa` varchar(25) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `nomer_telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `kelas_siswa`, `alamat_siswa`, `nomer_telepon`) VALUES
(1, 'kinz', 'XI RPL', 'Jogja', '0895222395080'),
(2, 'tes', 'XI RPL', 'bantul', '0895222395898');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`,`id_perusahaan`,`id_pelamar`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
