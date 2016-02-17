-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2015 at 09:35 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `diary_id` int(11) NOT NULL,
  `content` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `diary_id`, `content`, `time_on`) VALUES
(37, 1, 31, 'lkfnsdlnsdn', '2015-12-05 05:03:00'),
(38, 1, 30, 'sdnvlsdnlv', '2015-12-05 05:04:06'),
(39, 1, 34, 'bkbvbsdvsdob', '2015-12-05 05:04:24'),
(40, 1, 33, 'snclncla', '2015-12-05 05:04:35'),
(41, 1, 33, 'dnvldnslvn', '2015-12-05 05:06:28'),
(42, 1, 34, 'lasfbalsb', '2015-12-05 05:07:09'),
(43, 1, 34, 'ndfslsdnflda', '2015-12-05 05:12:02'),
(44, 1, 33, 'aaaaaaaa', '2015-12-05 05:12:18'),
(45, 1, 31, '111111111111', '2015-12-05 05:12:29'),
(46, 1, 29, 'test', '2015-12-05 05:12:53'),
(47, 1, 31, '222', '2015-12-05 05:19:58'),
(48, 1, 20, '123', '2015-12-05 05:20:19'),
(49, 1, 32, 'comment', '2015-12-05 05:25:17'),
(50, 1, 28, '000000000000', '2015-12-05 05:28:24'),
(51, 1, 34, 'ndskjslds', '2015-12-05 05:34:07'),
(52, 1, 34, 'kswkbckwj', '2015-12-05 05:36:38'),
(53, 2, 24, '111', '2015-12-05 03:27:52'),
(54, 1, 25, 'kgkkk', '2015-12-05 04:53:30'),
(55, 2, 37, 'test notyfity', '2015-12-05 05:30:04'),
(56, 2, 37, 'test', '2015-12-05 11:31:16'),
(57, 2, 25, 'kkhk', '2015-12-05 06:01:19'),
(58, 1, 25, 'dasdas', '2015-12-06 02:14:17'),
(59, 1, 25, 'aadafas', '2015-12-06 03:40:44'),
(60, 1, 37, 'thu', '2015-12-06 03:50:10'),
(61, 1, 22, 'thu', '2015-12-06 04:29:12'),
(62, 1, 23, 'thth', '2015-12-06 04:30:45'),
(63, 1, 22, 'comment', '2015-12-06 04:32:22'),
(64, 1, 25, 'kbksdbkb', '2015-12-06 04:34:53'),
(65, 1, 22, '', '2015-12-06 04:35:26'),
(66, 1, 22, 'kjfkd', '2015-12-06 04:40:15'),
(67, 1, 22, '', '2015-12-06 04:41:39'),
(68, 1, 22, '', '2015-12-06 04:46:16'),
(69, 1, 35, 'bdskjb', '2015-12-06 04:47:23'),
(70, 1, 35, '', '2015-12-06 04:50:57'),
(71, 1, 35, 'thu2', '2015-12-06 04:53:27'),
(72, 1, 38, 'bsdkjbvsbk', '2015-12-06 06:14:08'),
(73, 1, 39, 'jdvsjd', '2015-12-06 06:38:53'),
(74, 1, 39, 'thu', '2015-12-06 07:20:25'),
(75, 1, 39, 'bsckakasj', '2015-12-06 08:33:48'),
(76, 1, 40, 'gui ket ban', '2015-12-06 08:34:07'),
(77, 12, 24, 'bkjsdbkbjks', '2015-12-06 08:48:25'),
(78, 12, 41, 'bkdsbk', '2015-12-06 08:54:09'),
(79, 12, 41, 'jcj', '2015-12-06 09:02:55'),
(80, 1, 41, 'jgdsjgfsj', '2015-12-06 12:10:35'),
(81, 1, 36, 'thu', '2015-12-06 01:20:10'),
(82, 3, 39, 'comment', '2015-12-06 02:47:44'),
(83, 3, 39, 'comment', '2015-12-06 02:48:01'),
(84, 3, 41, 'mhb', '2015-12-06 02:48:18'),
(85, 11, 43, 'thu notify', '2015-12-07 11:00:06'),
(86, 11, 43, '1111111111', '2015-12-07 11:31:54'),
(87, 1, 39, 'kjdnvsdnv', '2015-12-07 12:54:08'),
(88, 1, 39, 'thu thong bao', '2015-12-07 02:13:47'),
(89, 4, 39, 'tra loi', '2015-12-07 08:20:21'),
(90, 1, 44, 'friend', '2015-12-07 02:44:23'),
(91, 11, 29, 'bdkcbsk', '2015-12-07 04:43:47'),
(92, 11, 43, 'kjgkj', '2015-12-07 04:46:08'),
(93, 11, 24, 'kjbfksd', '2015-12-07 04:46:21'),
(94, 1, 40, 'klsdvnlkdsn', '2015-12-07 05:48:07'),
(95, 1, 43, 'dskvsdkvs', '2015-12-07 11:49:24'),
(96, 2, 43, 'bnbvn', '2015-12-07 05:51:04'),
(97, 2, 43, 'lcnlsd', '2015-12-07 05:51:34'),
(98, 1, 35, 'ckjacka', '2015-12-07 05:54:26'),
(99, 1, 43, 'cbdh', '2015-12-07 11:54:57'),
(100, 4, 45, 'kbckabdkv', '2015-12-07 06:04:26'),
(101, 1, 40, 'hjhsahbsa', '2015-12-07 06:06:32'),
(102, 1, 45, 'gigi', '2015-12-07 08:24:01'),
(103, 1, 43, 'nksnk', '2015-12-07 02:58:41'),
(104, 1, 43, ',xcb,', '2015-12-07 03:14:35'),
(105, 1, 43, 'thu comment', '2015-12-08 03:26:02'),
(106, 1, 43, 'thu comment2', '2015-12-08 03:30:03'),
(107, 1, 45, 'aaabbb', '2015-12-08 09:31:18'),
(108, 1, 43, '###', '2015-12-08 03:33:20'),
(109, 1, 45, 'jdsjdfsvj', '2015-12-08 09:42:26'),
(110, 1, 43, 'thu thong bao', '2015-12-08 06:25:43'),
(111, 11, 45, 'jkaksj', '2015-12-08 06:28:01'),
(112, 1, 46, 'comment', '2015-12-08 05:54:15'),
(113, 1, 46, 'thu', '2015-12-08 06:01:51'),
(114, 1, 34, 'fhkjsdfskj', '2015-12-09 02:42:05'),
(115, 1, 34, 'thu', '2015-12-09 02:42:54'),
(116, 1, 34, 'thử thời gian', '2015-12-09 08:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE IF NOT EXISTS `diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_on` datetime NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `user_id`, `content`, `time_on`, `subject`, `type`) VALUES
(48, 1, '<p>public&nbsp;<img src="../bootstrap/tinymce/plugins/emoticons/img/smiley-cool.gif" alt="cool" /></p>', '2015-12-09 09:47:55', 'public', 3),
(49, 1, '<p>friend</p>', '2015-12-09 09:48:23', 'friend', 2),
(50, 1, '<p>chi minh toi</p>', '2015-12-09 09:48:57', 'chi minh toi', 1),
(51, 4, '<p>public</p>', '2015-12-09 09:50:38', 'public', 3),
(52, 9, '<h1 style="color: #ff0000;">kbdskvbsdk</h1>', '2015-12-09 10:16:19', 'public', 3),
(53, 1, '<p>Noi dung bai viet</p>', '2015-12-10 09:50:48', 'subject', 2);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`user_id1`,`user_id2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`user_id1`, `user_id2`, `flag`) VALUES
(1, 2, 1),
(1, 4, 1),
(1, 11, 1),
(2, 1, 1),
(2, 11, 2),
(4, 1, 1),
(9, 1, 2),
(11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ifuser_type`
--

CREATE TABLE IF NOT EXISTS `ifuser_type` (
  `user_id` int(11) NOT NULL,
  `email_type` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `addr` int(11) NOT NULL,
  `sothich` int(11) NOT NULL,
  `job` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifuser_type`
--

INSERT INTO `ifuser_type` (`user_id`, `email_type`, `phone`, `addr`, `sothich`, `job`, `name`) VALUES
(1, 3, 1, 3, 2, 2, 2),
(2, 2, 1, 3, 3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `like_diary`
--

CREATE TABLE IF NOT EXISTS `like_diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `like_diary`
--

INSERT INTO `like_diary` (`id`, `diary_id`, `user_id`) VALUES
(99, 43, 11),
(100, 45, 1),
(101, 33, 1),
(102, 33, 1),
(103, 33, 1),
(104, 33, 1),
(105, 33, 1),
(106, 33, 1),
(107, 33, 1),
(108, 33, 1),
(109, 33, 1),
(110, 33, 1),
(111, 33, 1),
(112, 33, 1),
(113, 43, 1),
(114, 31, 1),
(115, 37, 1),
(116, 34, 1),
(117, 20, 1),
(118, 35, 2),
(119, 37, 4),
(120, 46, 1),
(121, 35, 1),
(122, 24, 1),
(123, 25, 1),
(124, 34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `content` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_on` datetime NOT NULL,
  `flag` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `id_from`, `id_to`, `content`, `time_on`, `flag`, `page_id`) VALUES
(35, 1, 11, ' comment', '2015-12-07 06:06:32', 0, 40),
(36, 11, 1, ' like', '2015-12-07 06:29:41', 0, 43),
(37, 1, 11, ' comment', '2015-12-07 08:24:01', 0, 45),
(38, 1, 11, ' like', '2015-12-07 08:24:05', 0, 45),
(39, 1, 11, ' comment', '2015-12-08 09:31:18', 0, 45),
(40, 1, 11, ' comment', '2015-12-08 09:42:26', 0, 45),
(41, 2, 11, ' addfriend', '2015-12-08 05:28:49', 1, 11),
(42, 4, 1, ' like', '2015-12-08 05:50:30', 0, 37),
(43, 1, 2, ' like', '2015-12-09 12:03:15', 0, 35),
(44, 1, 3, ' like', '2015-12-09 08:37:21', 1, 25),
(45, 2, 1, ' like', '2015-12-09 09:20:55', 0, 34),
(46, 9, 1, ' addfriend', '2015-12-09 10:51:28', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `addr` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `sothich` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `job`, `password`, `email`, `addr`, `img`, `phone`, `sothich`) VALUES
(1, 'vu thi hien', 'vuhien', 'job', '12345678', 'abc@gmail.com', '', 'luffy.png', '0898789687', 'da bong, xem phim'),
(2, 'to hai', 'haidien', 'kdksdj', '111', 'hai@gmail.com', 'kdnsdkj', 'default.png', '', 'dkjsdnkjnk'),
(3, '', 'mhb', '', '123', '123@gmail.com', '', 'chopper2.jpg', '', ''),
(4, '', 'aaa', '', '123', 'aaa@gmail.com', '', 'default.png', '', ''),
(7, '', 'abc', '', '123', 'abc@gmail.com', '', 'default.png', '', ''),
(8, '', 'thu2', '', '123456', 'vuhien@gmail.com', '', 'default.png', '', ''),
(9, '', 'thu', '', '123', 'thu@gmail.com', '', 'default.png', '', ''),
(10, '', 'hien', '', '123', 'hien@gmail.com', '', 'default.png', '', ''),
(11, '', 'thuabc', '', '123', 'thuabc@gmail.com', '', 'default.png', '', ''),
(12, '', 'bbb', '', '123', 'bbb@gmail.com', '', 'default.png', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
