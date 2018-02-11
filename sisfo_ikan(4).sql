-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 07:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_ikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek`
--

CREATE TABLE `aspek` (
  `id_aspek` int(4) NOT NULL,
  `nama_aspek` varchar(25) NOT NULL,
  `id_ikan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek`
--

INSERT INTO `aspek` (`id_aspek`, `nama_aspek`, `id_ikan`) VALUES
(1, 'Kualitas 1', 1),
(2, 'Kualitas 2', 1),
(3, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drp`
--

CREATE TABLE `drp` (
  `id_drp` int(3) NOT NULL,
  `hasil` double NOT NULL,
  `id_supplier` int(3) NOT NULL,
  `id_jenis_ikan` int(3) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `lead_time` int(11) NOT NULL,
  `safety_stok` double NOT NULL,
  `kebutuhan_bersih` double NOT NULL,
  `jadwal_terima` double NOT NULL,
  `pelepasan` double NOT NULL,
  `stok_tersisa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `id_ikan` int(3) NOT NULL,
  `id_jenis_ikan` int(3) NOT NULL,
  `nama_ikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`id_ikan`, `id_jenis_ikan`, `nama_ikan`) VALUES
(1, 1, 'Nila'),
(2, 1, 'Patin'),
(3, 1, 'Gurami'),
(4, 1, 'Lele'),
(5, 2, 'Patin'),
(6, 2, 'Lele');

-- --------------------------------------------------------

--
-- Table structure for table `isi_ikan`
--

CREATE TABLE `isi_ikan` (
  `id_ukuran_ikan` int(3) NOT NULL,
  `id_ikan` int(3) NOT NULL,
  `ket_ukuran_ikan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_ikan`
--

INSERT INTO `isi_ikan` (`id_ukuran_ikan`, `id_ikan`, `ket_ukuran_ikan`) VALUES
(1, 1, '5 ekor'),
(2, 1, '6 ekor'),
(3, 1, '7 ekor'),
(4, 2, '0,5 ekor'),
(5, 2, '1 ekor'),
(6, 2, '2 ekor'),
(7, 2, '3 ekor'),
(8, 3, '2 ekor'),
(9, 3, '3 ekor'),
(10, 3, '4 ekor'),
(11, 4, '6 ekor'),
(12, 4, '7 ekor'),
(13, 4, '8 ekor');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ikan`
--

CREATE TABLE `jenis_ikan` (
  `id_jenis_ikan` int(3) NOT NULL,
  `jenis_ikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_ikan`
--

INSERT INTO `jenis_ikan` (`id_jenis_ikan`, `jenis_ikan`) VALUES
(1, 'Konsumsi'),
(2, 'Indukan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_konsumen`
--

CREATE TABLE `jenis_konsumen` (
  `id_jenis_konsumen` int(3) NOT NULL,
  `jenis_konsumen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_konsumen`
--

INSERT INTO `jenis_konsumen` (`id_jenis_konsumen`, `jenis_konsumen`) VALUES
(1, 'Pasar'),
(2, 'Distributor'),
(3, 'Kolam Pancing'),
(4, 'Pabrik');

-- --------------------------------------------------------

--
-- Table structure for table `konsisi_ikan`
--

CREATE TABLE `konsisi_ikan` (
  `id_kondisi_ikan` int(3) NOT NULL,
  `ket_kondisi_ikan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsisi_ikan`
--

INSERT INTO `konsisi_ikan` (`id_kondisi_ikan`, `ket_kondisi_ikan`) VALUES
(1, 'Segar'),
(2, 'Sedang'),
(3, 'Tidak Segar');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_jenis_konsumen` int(3) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_konsumen` varchar(20) NOT NULL,
  `alamat_konsumen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `username`, `id_jenis_konsumen`, `password`, `nama_konsumen`, `alamat_konsumen`) VALUES
(1, 'iswati', 1, 'iswati1', 'Iswati', 'Sumberdawesari'),
(2, 'jum', 1, 'jum1', 'Jum', 'Sumberdawesari'),
(3, 'eni', 1, 'eni1', 'Eni', 'Sumberdawesari'),
(4, 'mistini', 1, 'mistini1', 'Mistini', 'Sumberdawesari'),
(5, 'indah', 1, 'indah1', 'Indah', 'Sumberdawesari'),
(6, 'yuli', 1, 'yuli1', 'Yuli', 'Sumberdawesari'),
(7, 'bibi', 3, 'bibi3', 'Bibi', 'Pasuruan'),
(8, 'buadi', 3, 'buadi3', 'Buadi', 'Pasuruan'),
(9, 'suryanto', 3, 'suryanto3', 'Suryanto', 'Pasuruan'),
(10, 'mulyono', 3, 'mulyono3', 'Mulyono', 'Pasuruan'),
(11, 'bambang', 2, 'bambang2', 'Bambang', 'Pasuruan'),
(12, 'agung', 4, 'agung4', 'Agung', 'Pasuruan'),
(13, 'yuyun', 4, 'yuyun4', 'Yuyun', 'Pasuruan'),
(14, 'abuadi', 1, 'abuadi1', 'Buadi', 'Parasan'),
(15, 'suryanti', 1, 'suryanti1', 'Suryanti', 'Parasan'),
(16, 'adit', 4, 'adit4', 'Adit', 'Bangil'),
(17, 'budi', 4, 'budi4', 'Budi', 'Sidoarjo'),
(18, 'sugiono', 3, 'sugiono3', 'Sugiono', 'Bangil'),
(19, 'mbambang', 2, 'mbambang2', 'Bambang', 'Lumajang'),
(20, 'rosyid', 1, 'rosyid1', 'Rosyid', 'Parasan'),
(21, 'tono', 1, 'tono1', 'Tono', 'Parasan'),
(22, 'yani', 3, 'yani3', 'Yani', 'Pandaan'),
(23, 'wiri', 3, 'wiri3', 'Wiri', 'Pandaan'),
(24, 'rohman', 3, 'rohman3', 'Rohman', 'Singosari'),
(25, 'Ratih', 1, '12345', 'Ratih P', 'Pasuruan');

-- --------------------------------------------------------

--
-- Table structure for table `kualitas`
--

CREATE TABLE `kualitas` (
  `id_kualitas` int(3) NOT NULL,
  `kualitas` varchar(25) NOT NULL,
  `id_jenis_ikan` int(3) NOT NULL,
  `bobot_jenis` int(2) NOT NULL,
  `id_usia` int(3) NOT NULL,
  `bobot_usia` int(2) NOT NULL,
  `id_ukuran_ikan` int(3) NOT NULL,
  `bobot_ukuran` int(2) NOT NULL,
  `id_kondisi_ikan` int(3) NOT NULL,
  `bobot_kondisi` int(2) NOT NULL,
  `id_warna_ikan` int(3) NOT NULL,
  `bobot_warna` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(3) NOT NULL,
  `id_konsumen` int(3) NOT NULL,
  `id_ikan` int(3) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `id_usia` int(3) NOT NULL,
  `id_ukuran_ikan` int(3) NOT NULL,
  `id_kondisi_ikan` int(3) NOT NULL,
  `id_warna_ikan` int(3) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `id_status_pemesanan` int(2) NOT NULL,
  `kualitas` varchar(10) DEFAULT NULL,
  `hasil` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_konsumen`, `id_ikan`, `tanggal_pesan`, `id_usia`, `id_ukuran_ikan`, `id_kondisi_ikan`, `id_warna_ikan`, `jumlah`, `id_status_pemesanan`, `kualitas`, `hasil`) VALUES
(1, 1, 1, '2017-01-31', 1, 1, 1, 1, 15, 2, NULL, NULL),
(2, 1, 1, '2017-04-12', 1, 1, 1, 1, 1, 2, NULL, NULL),
(4, 1, 1, '2017-04-12', 1, 1, 1, 1, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status_pemesanan` int(2) NOT NULL,
  `status_pemesanan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status_pemesanan`, `status_pemesanan`) VALUES
(1, 'Belum Disetujui'),
(2, 'Telah Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(5) NOT NULL,
  `id_ikan` int(3) NOT NULL,
  `id_supplier` int(3) NOT NULL,
  `id_usia` int(3) NOT NULL,
  `id_ukuran_ikan` int(3) NOT NULL,
  `id_kondisi_ikan` int(3) NOT NULL,
  `id_warna_ikan` int(11) NOT NULL,
  `persediaan` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `kualitas` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_ikan`, `id_supplier`, `id_usia`, `id_ukuran_ikan`, `id_kondisi_ikan`, `id_warna_ikan`, `persediaan`, `harga`, `kualitas`) VALUES
(1, 1, 1, 1, 1, 1, 1, 27300, 25000, 1),
(2, 1, 1, 1, 1, 1, 1, 1, 5000, NULL),
(3, 3, 1, 1, 1, 1, 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `username`, `password`, `nama_supplier`) VALUES
(1, 'sari', 'sari', 'Minasari'),
(2, 'makmur', 'makmur', 'Minamakmur'),
(3, 'tirta', 'tirta', 'Minatirtajaya');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(6) NOT NULL,
  `id_stok` int(5) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `id_status_pemesanan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usia`
--

CREATE TABLE `usia` (
  `id_usia` int(3) NOT NULL,
  `id_ikan` int(3) NOT NULL,
  `ket_usia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usia`
--

INSERT INTO `usia` (`id_usia`, `id_ikan`, `ket_usia`) VALUES
(1, 1, '2,5 bulan sampai <3 bulan'),
(2, 1, '< 2,5 bulan'),
(3, 1, '> 3 bulan'),
(4, 2, '4 bulan sampai <5 bulan'),
(5, 2, '< 4 bulan'),
(6, 2, '>5 bulan'),
(7, 3, '3 bulan sampai <4 bulan'),
(8, 3, '<3 bulan'),
(9, 3, '>4 bulan'),
(10, 4, '3 bulan sampai <4 bulan'),
(11, 4, '< 3 bulan'),
(12, 4, '>4 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `warna_ikan`
--

CREATE TABLE `warna_ikan` (
  `id_warna_ikan` int(3) NOT NULL,
  `ket_warna_ikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna_ikan`
--

INSERT INTO `warna_ikan` (`id_warna_ikan`, `ket_warna_ikan`) VALUES
(1, 'Gelap Mengkilap'),
(2, 'Tidak Begitu Gelap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`id_aspek`),
  ADD KEY `id_ikan` (`id_ikan`);

--
-- Indexes for table `drp`
--
ALTER TABLE `drp`
  ADD PRIMARY KEY (`id_drp`);

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id_ikan`),
  ADD KEY `id_jenis_ikan` (`id_jenis_ikan`);

--
-- Indexes for table `isi_ikan`
--
ALTER TABLE `isi_ikan`
  ADD PRIMARY KEY (`id_ukuran_ikan`);

--
-- Indexes for table `jenis_ikan`
--
ALTER TABLE `jenis_ikan`
  ADD PRIMARY KEY (`id_jenis_ikan`);

--
-- Indexes for table `jenis_konsumen`
--
ALTER TABLE `jenis_konsumen`
  ADD PRIMARY KEY (`id_jenis_konsumen`);

--
-- Indexes for table `konsisi_ikan`
--
ALTER TABLE `konsisi_ikan`
  ADD PRIMARY KEY (`id_kondisi_ikan`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_jenis_konsumen` (`id_jenis_konsumen`);

--
-- Indexes for table `kualitas`
--
ALTER TABLE `kualitas`
  ADD PRIMARY KEY (`id_kualitas`),
  ADD KEY `id_jenis_ikan` (`id_jenis_ikan`),
  ADD KEY `id_usia` (`id_usia`),
  ADD KEY `id_ukuran_ikan` (`id_ukuran_ikan`),
  ADD KEY `id_kondisi_ikan` (`id_kondisi_ikan`),
  ADD KEY `id_warna_ikan` (`id_warna_ikan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_status` (`id_status_pemesanan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status_pemesanan`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_ikan` (`id_ikan`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_usia` (`id_usia`),
  ADD KEY `id_ukuran_ikan` (`id_ukuran_ikan`),
  ADD KEY `id_kondisi_ikan` (`id_kondisi_ikan`),
  ADD KEY `id_warna_ikan` (`id_warna_ikan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_stok` (`id_stok`),
  ADD KEY `id_status` (`id_status_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `usia`
--
ALTER TABLE `usia`
  ADD PRIMARY KEY (`id_usia`);

--
-- Indexes for table `warna_ikan`
--
ALTER TABLE `warna_ikan`
  ADD PRIMARY KEY (`id_warna_ikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspek`
--
ALTER TABLE `aspek`
  MODIFY `id_aspek` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drp`
--
ALTER TABLE `drp`
  MODIFY `id_drp` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id_ikan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jenis_ikan`
--
ALTER TABLE `jenis_ikan`
  MODIFY `id_jenis_ikan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_konsumen`
--
ALTER TABLE `jenis_konsumen`
  MODIFY `id_jenis_konsumen` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kualitas`
--
ALTER TABLE `kualitas`
  MODIFY `id_kualitas` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status_pemesanan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usia`
--
ALTER TABLE `usia`
  MODIFY `id_usia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ikan`
--
ALTER TABLE `ikan`
  ADD CONSTRAINT `ikan_ibfk_1` FOREIGN KEY (`id_jenis_ikan`) REFERENCES `jenis_ikan` (`id_jenis_ikan`);

--
-- Constraints for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD CONSTRAINT `konsumen_ibfk_1` FOREIGN KEY (`id_jenis_konsumen`) REFERENCES `jenis_konsumen` (`id_jenis_konsumen`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`),
  ADD CONSTRAINT `pemesanan_ibfk_5` FOREIGN KEY (`id_status_pemesanan`) REFERENCES `status` (`id_status_pemesanan`);

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_ikan`) REFERENCES `ikan` (`id_ikan`),
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `stok_ibfk_3` FOREIGN KEY (`id_usia`) REFERENCES `usia` (`id_usia`),
  ADD CONSTRAINT `stok_ibfk_4` FOREIGN KEY (`id_kondisi_ikan`) REFERENCES `konsisi_ikan` (`id_kondisi_ikan`),
  ADD CONSTRAINT `stok_ibfk_5` FOREIGN KEY (`id_warna_ikan`) REFERENCES `warna_ikan` (`id_warna_ikan`),
  ADD CONSTRAINT `stok_ibfk_6` FOREIGN KEY (`id_ukuran_ikan`) REFERENCES `isi_ikan` (`id_ukuran_ikan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
