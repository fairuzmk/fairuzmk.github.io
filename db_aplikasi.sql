-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 09:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_experience`
--

CREATE TABLE `tb_experience` (
  `id` int(10) NOT NULL,
  `kegiatan` varchar(500) NOT NULL,
  `kerjasama` varchar(500) NOT NULL,
  `peran` varchar(500) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyailmiah`
--

CREATE TABLE `tb_karyailmiah` (
  `id` int(10) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `jurnal` varchar(500) NOT NULL,
  `author` varchar(500) NOT NULL,
  `year` int(20) NOT NULL,
  `reputasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyailmiah`
--

INSERT INTO `tb_karyailmiah` (`id`, `judul`, `jurnal`, `author`, `year`, `reputasi`) VALUES
(1, 'A comprehensive evaluation of cofiring biomass with coal and slagging-fouling tendency in pulverized coal-fired boilers', 'Ain Shams Engineering Journal', 'Hariana, Prabowo, E Hilmawan, FM Kuswa,', 2022, 'Tinggi'),
(2, 'Pemilihan Batubara Kalimantan untuk PLTU dengan PC Boiler Menggunakan Tinjauan Potensi Slagging dan Fouling', 'National Conference of Industry, Engineering and Technology 2020', 'Hariana, HP Putra, FM Kuswa, ...', 2020, 'Conference');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id` int(10) NOT NULL,
  `jenjang` varchar(500) NOT NULL,
  `kampus` varchar(500) NOT NULL,
  `jurusan` varchar(500) NOT NULL,
  `tahun` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_personal`
--

CREATE TABLE `tb_personal` (
  `id` int(10) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `tempatlahir` varchar(500) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `alamat_rumah` varchar(500) NOT NULL,
  `contact_hp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `no_karpeg` varchar(100) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `alamat_kantor` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Fairuz Milkiy', 'fairuz', 'sayaadmin', 'Admin'),
(2, 'Fairuz Kuswa', 'fairuz', 'fairuz29', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_experience`
--
ALTER TABLE `tb_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyailmiah`
--
ALTER TABLE `tb_karyailmiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_experience`
--
ALTER TABLE `tb_experience`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_karyailmiah`
--
ALTER TABLE `tb_karyailmiah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_personal`
--
ALTER TABLE `tb_personal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
