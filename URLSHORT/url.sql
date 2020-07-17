-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2020 at 07:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shorturl`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `url_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url_code` varchar(5) NOT NULL,
  `url_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`url_id`, `url`, `url_code`, `url_time`) VALUES
(1, 'https://forms.office.com/Pages/ResponsePage.aspx?id=3bGz-Ior9EaZ-1z6UjJOqwVS6x3lavVNqFp2aQwZgztUMFAzV0FSMllBRUVTUUU5M1hKT1lFMVBMSS4u', 'W6XQQ', '2020-07-17 18:07:34'),
(2, 'https://www.youtube.com/watch?v=5qap5aO4i9A', 'mvyAk', '2020-07-17 18:09:17'),
(4, 'https://www.facebook.com/', 'kqAwQ', '2020-07-17 20:47:15'),
(5, 'https://www.olx.ba/', 'FqBM8', '2020-07-17 20:57:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`url_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `url_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
