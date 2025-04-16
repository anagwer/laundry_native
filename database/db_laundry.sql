-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 01:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `sisa_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `nm_barang`, `tgl_masuk`, `stok_masuk`, `tgl_keluar`, `stok_keluar`, `sisa_stok`) VALUES
(5, 1, 'Detergen Daia 1 Liter', '2024-12-03', 3, '0000-00-00', 0, 3),
(6, 1, 'Detergen Daia 1 Liter', '0000-00-00', 0, '2024-12-29', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_layanan`
--

CREATE TABLE `jenis_layanan` (
  `id_jenis_layanan` int(11) NOT NULL,
  `id_kategori_layanan` int(11) NOT NULL,
  `jenis_layanan` varchar(255) NOT NULL,
  `estimasi_waktu` int(2) NOT NULL,
  `tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_layanan`
--

INSERT INTO `jenis_layanan` (`id_jenis_layanan`, `id_kategori_layanan`, `jenis_layanan`, `estimasi_waktu`, `tarif`) VALUES
(1, 1, 'Reguler', 2, 5000),
(2, 1, 'Express', 1, 8000),
(3, 2, 'Reguler', 3, 6000),
(18, 2, 'Express', 1, 9000),
(24, 20, 'Express', 1, 9000),
(25, 20, 'Reguler', 3, 5000),
(26, 21, 'Express', 1, 7000),
(27, 21, 'Reguler', 3, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `id_kategori_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_layanan`
--

INSERT INTO `kategori_layanan` (`id_kategori_layanan`, `nama_layanan`) VALUES
(1, 'Cuci Komplit'),
(2, 'Cuci Satuan'),
(20, 'Hanya Cuci'),
(21, 'Cuci Kering');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jns_kelamin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `nama`, `no_telp`, `alamat`, `jns_kelamin`) VALUES
(1, 1, 'admin', '0823', 'surakarta', 'Laki-laki'),
(4, 10, 'anon', '082311', 'Jakarta', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_layanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status_bayar` varchar(11) NOT NULL,
  `status_ambil` varchar(15) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_jemput` date NOT NULL,
  `antar_jemput` varchar(10) NOT NULL,
  `alamat_antar` text NOT NULL,
  `berat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `metode_bayar` varchar(11) NOT NULL,
  `konfirmasi` varchar(11) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_jenis_layanan`, `id_pelanggan`, `status_bayar`, `status_ambil`, `tgl_transaksi`, `tgl_selesai`, `tgl_jemput`, `antar_jemput`, `alamat_antar`, `berat`, `total`, `metode_bayar`, `konfirmasi`, `bukti`) VALUES
(2, 1, 1, 1, 'Lunas', 'Belum diambil', '2024-12-29 22:58:45', '0000-00-00', '1970-01-01', 'Ya', 'jl.jalan', 2, 10000, 'Transfer', 'Ya', 'WhatsApp Image 2024-12-23 at 5.43.37 AM.jpeg'),
(4, 1, 1, 1, 'Lunas', 'Sudah diambil', '2024-12-29 17:25:03', '2024-12-31', '2024-12-30', 'Tidak', '', 4, 20000, 'Cash', 'Ya', ''),
(8, 1, 26, 1, 'Lunas', 'Belum Diambil', '2024-12-29 19:00:48', '2024-12-30', '0000-00-00', 'Tidak', '', 3, 21000, 'Cash', 'Ya', ''),
(9, 10, 27, 10, 'Lunas', 'Belum Diambil', '2024-12-30 22:56:22', '2025-01-02', '0000-00-00', 'Tidak', '', 2, 10000, 'Cash', 'Ya', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'GeIDg-OakAMWET1.jpg'),
(10, 'anon', '2ae66f90b7788ab8950e8f81b829c947', 'Pelanggan', 'GeKgcR9bYAAaiST.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id_jenis_layanan`),
  ADD KEY `id_kategori_layanan` (`id_kategori_layanan`);

--
-- Indexes for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`id_kategori_layanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  MODIFY `id_jenis_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  MODIFY `id_kategori_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
