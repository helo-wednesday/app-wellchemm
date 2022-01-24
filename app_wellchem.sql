-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 07:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_wellchem`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` int(12) NOT NULL,
  `npwp_c` varchar(128) NOT NULL,
  `nama_customer` varchar(128) NOT NULL,
  `no_telpon_c` varchar(16) NOT NULL,
  `alamat_customer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_customer`
--

INSERT INTO `data_customer` (`id_customer`, `npwp_c`, `nama_customer`, `no_telpon_c`, `alamat_customer`) VALUES
(5, '361763173671361', 'cv sendiri', '082136453716', 'jl nanas ');

-- --------------------------------------------------------

--
-- Table structure for table `data_item`
--

CREATE TABLE `data_item` (
  `id_item` int(12) NOT NULL,
  `nama_item` varchar(128) NOT NULL,
  `harga_item` bigint(20) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_item`
--

INSERT INTO `data_item` (`id_item`, `nama_item`, `harga_item`, `kategori`) VALUES
(6, 'kardus coklat uk 18', 1500, 'Per pcs'),
(7, 'Botol 500ml', 62000, 'Per Pack '),
(8, 'Botol 1500ml', 90000, 'Per Pack '),
(9, 'kardus coklat uk 20', 1700, 'Per pcs'),
(10, 'kardus coklat uk 22', 1900, 'Per pcs'),
(11, 'kresek damai tanggung', 34000, 'Per Pack '),
(12, 'kresek gading uk 28', 8000, 'Per Pack '),
(13, 'kresek gading uk 35 ', 10500, 'Per Pack '),
(14, 'karet 1/2 kg', 10000, 'Per Pack ');

-- --------------------------------------------------------

--
-- Table structure for table `data_itemin`
--

CREATE TABLE `data_itemin` (
  `id_itemin` int(11) NOT NULL,
  `no_bpb` varchar(128) NOT NULL,
  `no_sj` varchar(128) NOT NULL,
  `item` varchar(128) NOT NULL,
  `harga_in` bigint(20) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `jumlah_in` int(11) NOT NULL,
  `date_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_itemin`
--

INSERT INTO `data_itemin` (`id_itemin`, `no_bpb`, `no_sj`, `item`, `harga_in`, `kategori`, `jumlah_in`, `date_in`) VALUES
(3, '232', '32321', 'kardus coklat uk 18', 12000, 'Per Pack ', 123, '2021-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `data_itemout`
--

CREATE TABLE `data_itemout` (
  `id_itemout` int(11) NOT NULL,
  `no_doc` varchar(128) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `item` varchar(128) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `jumlah_out` int(11) NOT NULL,
  `date_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_itemout`
--

INSERT INTO `data_itemout` (`id_itemout`, `no_doc`, `customer`, `item`, `harga_jual`, `kategori`, `jumlah_out`, `date_out`) VALUES
(2, '2', 'cv sendiri', 'Botol 500ml', 2000, 'Per pcs', 3, '2022-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(12) NOT NULL,
  `nama_jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Staff Marketing'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` int(12) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Per Pack '),
(5, 'Per pcs'),
(6, 'Per lusin');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(12) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(128) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tgl_masuk`, `status`, `hak_akses`) VALUES
(3, '121112', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Laki-Laki', 'Admin', '2021-12-02', 'Pegawai Tetap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_supplier`
--

CREATE TABLE `data_supplier` (
  `id_supplier` int(12) NOT NULL,
  `npwp` varchar(128) NOT NULL,
  `nama_supplier` varchar(128) NOT NULL,
  `no_telpon` varchar(16) NOT NULL,
  `alamat_supplier` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_supplier`
--

INSERT INTO `data_supplier` (`id_supplier`, `npwp`, `nama_supplier`, `no_telpon`, `alamat_supplier`) VALUES
(4, '09.254.268.4-508.000', 'toko griya plastik', '081234466778', 'Jl. Flamboyan no. 12. Sidoarjo');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `data_item`
--
ALTER TABLE `data_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `data_itemin`
--
ALTER TABLE `data_itemin`
  ADD PRIMARY KEY (`id_itemin`);

--
-- Indexes for table `data_itemout`
--
ALTER TABLE `data_itemout`
  ADD PRIMARY KEY (`id_itemout`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_item`
--
ALTER TABLE `data_item`
  MODIFY `id_item` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_itemin`
--
ALTER TABLE `data_itemin`
  MODIFY `id_itemin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_itemout`
--
ALTER TABLE `data_itemout`
  MODIFY `id_itemout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_supplier`
--
ALTER TABLE `data_supplier`
  MODIFY `id_supplier` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
