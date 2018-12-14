-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 06:25 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ljc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint`
--

CREATE TABLE `fingerprint` (
  `fingerprint_id` int(11) NOT NULL,
  `r_ic` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ljc_admin`
--

CREATE TABLE `ljc_admin` (
  `admin_username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ljc_admin`
--

INSERT INTO `ljc_admin` (`admin_username`, `admin_name`, `admin_password`) VALUES
('alyazylan', 'ALYA SYAFIQAH ZAILAN', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `ljc_resident`
--

CREATE TABLE `ljc_resident` (
  `r_ic` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_contact` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_house_no` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fingerprint_id` int(11) NOT NULL,
  `r_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `fingerprint_id` int(11) NOT NULL,
  `time_in_out` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ljc_admin`
--
ALTER TABLE `ljc_admin`
  ADD PRIMARY KEY (`admin_username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
