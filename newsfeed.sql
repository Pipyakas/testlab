-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 04:33 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slum`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE IF NOT EXISTS `newsfeed` (
`id` bigint(20) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `avt` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`, `avt`) VALUES
(8, 'iouoi', '<p>uiou</p>', 7, '2017-03-01 23:21:59', '2017-03-04 08:39:17', 'uploads/avts/09_2017/10b53ccc3a2a6f66f44b93964dafd84d.jpg'),
(9, 'jkh', '<p>jkhjk</p>', 7, '2017-03-01 23:23:04', '2017-03-04 08:38:33', 'uploads/avts/09_2017/6893a3f1f61193fc543f9b5a4de7a0af.jpg'),
(10, 'l;k', '<p>;lk</p>', 7, '2017-03-01 23:23:18', '2017-03-04 08:39:31', 'uploads/avts/09_2017/08f3e202359748bb6c0638958ed8a1ba.jpg'),
(11, 'oiuoi', '<p>uio</p>', 7, '2017-03-01 23:24:27', '2017-03-04 08:38:53', 'uploads/avts/09_2017/4f1268e38163e97793ab723606804347.jpg'),
(12, 'hih', '<p>hihihihihi</p>', 7, '2017-03-01 23:26:27', '2017-03-04 08:39:45', 'uploads/avts/09_2017/ef12947c005639972933a4f38b2b1e25.jpg'),
(13, 'Khai trương cửa hàng', '<p>Ng&agrave;y 5/5/2017, cửa h&agrave;ng tiến h&agrave;nh khai trương</p>', 16, '2017-04-29 16:25:01', '2017-04-29 16:25:02', 'uploads/avts/17_2017/bbcd48165a8fae8da21dcf318a11cc2d.jpg'),
(14, 'Tin khuyến mại', '<p>Khuyến mại</p>', 16, '2017-04-29 16:26:12', '2017-04-29 16:26:13', 'uploads/avts/17_2017/1deb55e31df58f6fdaf4d8fbd976e936.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
