-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 02:48 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnsp_23_nico_efendy`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` char(10) NOT NULL,
  `id_inventaris` char(10) NOT NULL,
  `id_peminjaman` char(10) NOT NULL,
  `kuantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` char(10) NOT NULL,
  `id_ruang` char(5) NOT NULL,
  `id_jenis` char(5) NOT NULL,
  `id_op` char(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `kuantity` int(10) NOT NULL,
  `kondisi` enum('Baik','Rusak') NOT NULL,
  `kode_inventaris` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `id_ruang`, `id_jenis`, `id_op`, `nama_barang`, `info`, `kuantity`, `kondisi`, `kode_inventaris`) VALUES
('II002', 'ir001', 'ij001', 'io001', 'Laptop', 'infooo', 12, 'Baik', 'KI002'),
('iin001', 'ir02', 'ij001', 'io001', 'Spidol', 'info', 2, 'Baik', 'ki001');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` char(5) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `info`) VALUES
('ij001', 'Barag Habis Pakai', 'kj02', 'info'),
('ij002', 'Barang Tetap', 'kj01', 'info');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_op` char(5) NOT NULL,
  `id_user` char(5) NOT NULL,
  `nip` int(18) NOT NULL,
  `nama_operator` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telephone` int(13) NOT NULL,
  `gender` enum('Laki-laki','Perempuan','','') NOT NULL,
  `status` enum('Aktif','Tidak-aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_op`, `id_user`, `nip`, `nama_operator`, `alamat`, `telephone`, `gender`, `status`) VALUES
('io001', 'IS01', 791879331, 'indah', 'kpdua', 1287813, 'Perempuan', 'Aktif'),
('io002', 'IS02', 1541241, 'astri', 'bintara 14', 878278321, 'Perempuan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` char(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(18) NOT NULL,
  `nis` int(9) NOT NULL,
  `alamat` text NOT NULL,
  `telephone` int(13) NOT NULL,
  `posisi` enum('Guru','Pegawai','Murid','') NOT NULL,
  `gender` enum('Laki-laki','Perempuan','','') NOT NULL,
  `status` enum('Aktif','Tidak-aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama`, `nip`, `nis`, `alamat`, `telephone`, `posisi`, `gender`, `status`) VALUES
('ip001', 'astri', 76736768, 16171036, 'bintara14', 858365112, 'Murid', 'Perempuan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` char(10) NOT NULL,
  `tanggal_peminjaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_pengembalian` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_peminjaman` enum('Pending','Dikonfirmasi','Dikembalikan','Ditolak') NOT NULL,
  `id_peminjam` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `id_peminjam`) VALUES
('ip001', '2019-04-14 17:00:00', '2019-04-04 17:00:00', 'Dikonfirmasi', 'ip001');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` char(5) NOT NULL,
  `nama_ruang` varchar(25) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `info`) VALUES
('ir001', 'D3', 'kr001', 'info'),
('ir02', 'D4', 'kr002', 'info');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(5) NOT NULL,
  `id_level` char(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_level`, `username`, `password`, `email`) VALUES
('IS01', 'IL02', 'nico', 'nico001', 'nicoefendy22@gmail.com'),
('IS02', 'IL03', 'eko', 'eko001', 'ekoario14@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_level` char(5) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_level`, `nama_level`) VALUES
('IL02', 'operator'),
('IL03', 'peminjam');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_inventaris`
-- (See below for the actual view)
--
CREATE TABLE `view_inventaris` (
`id_inventaris` char(10)
,`nama_ruang` varchar(25)
,`nama_jenis` varchar(25)
,`nama_operator` varchar(100)
,`nama_barang` varchar(50)
,`info` text
,`kuantity` int(10)
,`kondisi` enum('Baik','Rusak')
,`kode_inventaris` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
-- (See below for the actual view)
--
CREATE TABLE `view_user` (
`id_user` char(5)
,`username` varchar(50)
,`password` varchar(50)
,`nama_level` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_inventaris`
--
DROP TABLE IF EXISTS `view_inventaris`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_inventaris`  AS  select `i`.`id_inventaris` AS `id_inventaris`,`r`.`nama_ruang` AS `nama_ruang`,`j`.`nama_jenis` AS `nama_jenis`,`o`.`nama_operator` AS `nama_operator`,`i`.`nama_barang` AS `nama_barang`,`i`.`info` AS `info`,`i`.`kuantity` AS `kuantity`,`i`.`kondisi` AS `kondisi`,`i`.`kode_inventaris` AS `kode_inventaris` from (((`inventaris` `i` join `ruang` `r` on((`i`.`id_ruang` = `r`.`id_ruang`))) join `jenis` `j` on((`i`.`id_jenis` = `j`.`id_jenis`))) join `operator` `o` on((`i`.`id_op` = `o`.`id_op`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS  select `u`.`id_user` AS `id_user`,`u`.`username` AS `username`,`u`.`password` AS `password`,`l`.`nama_level` AS `nama_level` from (`user` `u` join `user_level` `l` on((`u`.`id_level` = `l`.`id_level`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_tipe` (`id_jenis`),
  ADD KEY `id_op` (`id_op`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_op`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_peminjam` (`id_peminjam`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
