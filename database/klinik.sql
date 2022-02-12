-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 02:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_penyakit` int(11) NOT NULL,
  `penyakit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_penyakit`, `penyakit`) VALUES
(1, 'Batuk & Flu'),
(2, 'Demam');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `kategori_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(25) NOT NULL,
  `jenis_obat` varchar(15) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `kategori_obat`, `nama_obat`, `jenis_obat`, `harga_obat`, `stok_obat`) VALUES
(1, '1', 'Tremenza', 'Sirup', 25000, 59),
(2, '1', 'Tremenza', 'Tablet', 5000, 100),
(4, '1', 'Hufagrip Flu & Batuk', 'Sirup', 30000, 24),
(5, '2', 'Paracetamol', 'Kaplet', 6000, 100),
(6, '2', 'Sanmol Forte', 'Tablet', 2000, 169);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_psn` int(11) NOT NULL,
  `nama_psn` varchar(25) NOT NULL,
  `jk_psn` varchar(10) NOT NULL,
  `alamat_psn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_psn`, `nama_psn`, `jk_psn`, `alamat_psn`) VALUES
(1, 'Rakha Firdausi', 'L', 'Jl. Rungkut No. 69 Surabaya'),
(2, 'Vindia Aksandra', 'P', 'Jl. Singsosari No. 28 Surabaya'),
(3, 'Fikri Nuril Ramadhan', 'L', 'Jl. Demak Barat No. 10 Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pgw` int(11) NOT NULL,
  `nama_pgw` varchar(25) NOT NULL,
  `jabatan_pgw` varchar(25) NOT NULL,
  `bidang_pgw` varchar(25) DEFAULT NULL,
  `alamat_pgw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pgw`, `nama_pgw`, `jabatan_pgw`, `bidang_pgw`, `alamat_pgw`) VALUES
(1, 'Adriana Wahid', 'Dokter', 'Umum', 'Jl. Diponegoro No. 10 Surabaya'),
(2, 'Sinta Tiara', 'Suster', '', 'Jl. Gubeng No. 18 Surabaya'),
(3, 'Dewi Fitriani', 'Administrasi', '', 'Jl. Demak No. 5 Surabaya'),
(4, 'Siska Tiara', 'Dokter', 'Umum', 'Jl. Rungkut No 19 Surabaya'),
(5, 'Fitri Cinta', 'Suster', '', 'Jl. Kegangsaan Timur Surabaya'),
(8, 'Gisella Anastasya', 'Dokter', 'Gigi', 'Jl. Timur Raya No. 27 Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `rekmed`
--

CREATE TABLE `rekmed` (
  `id_rekmed` int(11) NOT NULL,
  `psn_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `pgw_id` int(11) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `tdk_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekmed`
--

INSERT INTO `rekmed` (`id_rekmed`, `psn_id`, `tgl`, `keluhan`, `pgw_id`, `diagnosa`, `tdk_id`, `obat_id`, `total`) VALUES
(6, 1, '2022-02-11', 'Demam Tinggi Semalaman', 1, 'Demam Biasa tanpa Batuk dan Flu', 1, 6, 17000),
(7, 2, '2022-02-12', 'Batuk Berdahak', 4, 'Batuk Berdahak Disertai Flu', 1, 1, 40000),
(8, 3, '2022-02-12', 'Batuk & Flu', 1, 'Batuk & Flu Biasa', 1, 4, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id_spe` int(11) NOT NULL,
  `nama_spe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesialis`
--

INSERT INTO `spesialis` (`id_spe`, `nama_spe`) VALUES
(1, 'Umum'),
(2, 'Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tdk` int(11) NOT NULL,
  `jenis_tdk` varchar(50) NOT NULL,
  `biaya_tdk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tdk`, `jenis_tdk`, `biaya_tdk`) VALUES
(1, 'Pemeriksaan Umum', 15000),
(2, 'Pemeriksaan Gigi', 50000),
(3, 'Pemeriksaan Laboratorium', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `level`) VALUES
(1, 'admin', 'admin', 'Fariz Sujatmiko', 'admin'),
(4, 'pegawai', 'pegawai', 'Nuril Firdausi HS', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_psn`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pgw`);

--
-- Indexes for table `rekmed`
--
ALTER TABLE `rekmed`
  ADD PRIMARY KEY (`id_rekmed`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`id_spe`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tdk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_psn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pgw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rekmed`
--
ALTER TABLE `rekmed`
  MODIFY `id_rekmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spesialis`
--
ALTER TABLE `spesialis`
  MODIFY `id_spe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tdk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
