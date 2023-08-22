-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 08:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safety_voice`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` bigint(20) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `name` varchar(100) DEFAULT NULL,
  `dept` varchar(500) DEFAULT NULL,
  `area` varchar(1000) DEFAULT NULL,
  `spec_area` varchar(1000) DEFAULT NULL,
  `unsafe_activity` text DEFAULT NULL,
  `unsafe_envi` text DEFAULT NULL,
  `file_name` longtext DEFAULT NULL,
  `recom` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `assign` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `created_at`, `name`, `dept`, `area`, `spec_area`, `unsafe_activity`, `unsafe_envi`, `file_name`, `recom`, `status`, `assign`, `updated_at`) VALUES
(2, '2022-12-02', 'Pak Bayu', NULL, 'HCM', 'Kursi Pak Bayu', 'Meja retak', 'tidak ada', NULL, 'harus diganti', 'Done', 0, '2022-12-28 04:54:01'),
(3, '2022-12-02', 'Pak Bayu', NULL, 'Pak Bayu', 'Pak Bayu', 'Pak Bayu', 'Pak BayuPak Bayu', NULL, 'Pak Bayu', 'Done', 0, '2022-12-28 06:51:36'),
(4, '2022-12-02', 'Pak Bayu 1', NULL, 'Pak Bayu 1', 'Pak Bayu 1', 'Pak Bayu 1', 'Pak Bayu 1', NULL, 'Pak Bayu 1', 'Done', 1, '2022-12-28 07:53:22'),
(9, '2022-12-02', 'etetetet', NULL, 'etetetet', 'etetetet', 'etetetet', 'etetetet', NULL, 'etetetet', 'Done', 0, '2022-12-28 08:17:53'),
(11, '2022-12-02', 'gas', NULL, 'gas', 'gas', 'gas', 'gas', NULL, 'gas', 'Open', 0, '2022-12-28 03:56:02'),
(14, '2022-12-02', 'Pak Bayu HCM', NULL, 'HCM', 'Meja Pak Bayu', 'Meja Pak Bayu', 'Meja Pak Bayu', 'bg1.jpg', 'Beli baru aja', 'Open', 0, '2022-12-28 04:24:01'),
(15, '2022-12-02', 'Pak Bayu & Bang Adit', NULL, 'Di depan imcoco', 'Di depan HCM', 'Mobil L300', NULL, 'C:\\xampp\\tmp\\phpA200.tmp', 'Gaskeun', 'Open', 0, '2022-12-27 04:01:32'),
(16, '2022-12-02', 'Pak Bayu & Bang Adit 2', NULL, 'Pak Bayu & Bang Adit 2', 'Pak Bayu & Bang Adit 2', 'Pak Bayu & Bang Adit 2', 'Pak Bayu & Bang Adit 2', 'C:\\xampp\\tmp\\php53.tmp', 'Pak Bayu & Bang Adit 2', 'Open', 0, '2022-12-28 04:24:06'),
(19, '2022-12-07', 'Pojul', 'HCM', 'Kantor', 'Kantor HCM', 'kursi patah', 'diancam warlok', 'bg1.jpg', 'gaskeun', 'Open', 0, '2022-12-27 03:47:54'),
(22, '2022-12-27', 'Fauzul', 'HCM', 'INACO belakang', 'QC', NULL, NULL, 'MKnightWalp.jpg', 'asas', 'On Progress', 0, '2022-12-28 06:27:33'),
(23, '2022-12-28', 'Test', 'Test', 'Test', 'Test', NULL, NULL, 'MKnightWalp.jpg', 'Test', 'On Progress', 1, '2022-12-28 07:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` bigint(20) NOT NULL,
  `complaint_id` bigint(20) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `complaint_id`, `email`, `status`, `divisi`, `created_at`, `updated_at`) VALUES
(11, 4, 'adityawellyandi@gmail.com', 'Done', 'Eng', '2022-12-28 14:50:53', NULL),
(12, 23, 'adityawellyandi@gmail.com', 'On Progress', 'Eng', '2022-12-28 14:52:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
