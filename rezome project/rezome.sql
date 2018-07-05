-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 06:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rez`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rezome`
--

CREATE TABLE `tbl_rezome` (
  `id_r` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `moadel` double(255,0) NOT NULL,
  `uni_state` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `home_state` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `uni_city` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `home_city` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `home_address` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `uni_address` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `reshte` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `grayesh` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `sal` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_rezome`
--

INSERT INTO `tbl_rezome` (`id_r`, `userid`, `title`, `moadel`, `uni_state`, `home_state`, `uni_city`, `home_city`, `home_address`, `uni_address`, `reshte`, `grayesh`, `sal`, `email`) VALUES
(5, 11, 'این یک رزومه می باشد', 13, 'تهران', 'شیراز', 'پردیس', 'فسا', 'اینم ادرس محل سکونت', 'پردیس-اینم ادرس', 'برق', 'الکترونیک', '1386', 'mahdi32@gmail.com'),
(7, 13, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(100) NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `fullname`, `password`, `type`) VALUES
(1, 'admin', 'مدیر اصلی', '73932595', 1),
(11, 'moradi32', 'مهدی مرادی', '73932595', 2),
(13, 'name karbary', 'کاربر تست', '32', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_rezome`
--
ALTER TABLE `tbl_rezome`
  ADD PRIMARY KEY (`id_r`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_rezome`
--
ALTER TABLE `tbl_rezome`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
