-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2018 at 07:06 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_depi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `level`) VALUES
(2, 'mam', 'mam', 'admin'),
(4, 'dia', 'dia', 'kp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftar`
--

CREATE TABLE `tbl_pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `nama_pendaftar` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `ttl_pendaftar` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `kwn_pendaftar` varchar(100) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jumlah_saudara` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `tinggal_dengan` varchar(100) NOT NULL,
  `goldar` varchar(100) NOT NULL,
  `pendidikan_sebelumnya` varchar(100) NOT NULL,
  `keahlian_yang_dipilih` varchar(100) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `ttl_ortu` varchar(100) NOT NULL,
  `agama_ortu` varchar(100) NOT NULL,
  `pendidikan_ortu` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(100) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `telpon_ortu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftar`
--

INSERT INTO `tbl_pendaftar` (`id_pendaftar`, `nama_pendaftar`, `jenis_kelamin`, `ttl_pendaftar`, `agama`, `kwn_pendaftar`, `anak_ke`, `jumlah_saudara`, `alamat`, `no_telp`, `tinggal_dengan`, `goldar`, `pendidikan_sebelumnya`, `keahlian_yang_dipilih`, `nama_ortu`, `ttl_ortu`, `agama_ortu`, `pendidikan_ortu`, `pekerjaan_ortu`, `alamat_rumah`, `telpon_ortu`) VALUES
(1, 'Kurniawan Gigih Lutfi Umam', 'L', '09/19/2018', 'Islam', 'INA', 1, 66, 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '085758547924', '444', 'B', 'SMP', 'TSM', 'Siapa', '10/03/2018', 'Islam', 'SD', 'Buruh', '  Mana aja ', '0988'),
(2, 'ganteng', 'L', '09/19/2018', 'Islam', 'INA', 1, 66, 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '085758547924', '444', 'B', 'SMP', 'TSM', 'Siapa', '10/03/2018', 'Islam', 'SD', 'Buruh', '  Mana aja ', '0988');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `score` float NOT NULL,
  `rangking` int(11) NOT NULL,
  `status_penerimaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_pendaftar`, `score`, `rangking`, `status_penerimaan`) VALUES
(1, 1, 0.53388, 1, '0'),
(2, 2, 0.46612, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`) VALUES
(1, 'Prestasi'),
(2, 'UN'),
(3, 'Jarak Tempuh'),
(4, 'Kepribadian'),
(5, 'Pendapatan Ortu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `kode_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_pendaftar`, `kode_kriteria`, `nilai`) VALUES
(21, 1, 1, 90),
(22, 1, 2, 90),
(23, 1, 3, 90),
(24, 1, 4, 90),
(25, 1, 5, 90),
(26, 2, 1, 76),
(27, 2, 2, 89),
(28, 2, 3, 65),
(29, 2, 4, 90),
(30, 2, 5, 74);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
