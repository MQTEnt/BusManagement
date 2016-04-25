-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 08:54 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.20-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `GoogleMap`
--

-- --------------------------------------------------------

--
-- Table structure for table `poi_example`
--

CREATE TABLE IF NOT EXISTS `poi_example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `des` text CHARACTER SET utf8 NOT NULL,
  `lat` text CHARACTER SET utf8 NOT NULL,
  `lon` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `poi_example`
--

INSERT INTO `poi_example` (`id`, `name`, `des`, `lat`, `lon`) VALUES
(10, 'Học viện An ninh nhân dân', 'Học viện An ninh nhân dân - Đường Nguyễn Trãi - Hà Đông', '20.981309613721816', '105.79842925049888'),
(8, 'ĐH Thăng Long', 'ĐH Thăng Long - Đường Nguyễn Xiển', '20.977062140916143', '105.81375002773711'),
(9, 'Học viện Công nghệ Bưu chính viễn thông', 'Học viện Công nghệ Bưu chính viễn thông - Đường Nguyễn Trãi - Hà Đông', '20.981208104109758', '105.78598380001495'),
(12, 'ĐH Hà Nội', 'ĐH Hà Nội - Hà Đông', '20.98853672174753', '105.79615473659942'),
(22, 'ĐH Khoa học Xã hội và Nhân văn', 'ĐH Khoa học Xã hội và Nhân văn - Đường Nguyễn Trãi - Thanh Xuân', '20.99554845740634', '105.80658316524932'),
(14, 'ĐH Khoa học tự nhiên', 'ĐH Khoa học tự nhiên - Đường Nguyễn Trãi - Thanh Xuân', '20.995067663190362', '105.808686017117'),
(15, 'Royal City', 'Royal City - Thanh Xuân', '21.000541946693303', '105.81666827114532'),
(16, 'ĐH Thủy Lợi', 'ĐH Thủy Lợi - Đường Tây Sơn', '21.006231038226968', '105.8255088320584'),
(18, 'Siêu thị Big C Thăng Long', 'Siêu thị Big C Thăng Long - Đường Trần Duy Hưng', '21.00675185960165', '105.79315066250274'),
(19, 'Học viện Ngân Hàng', 'Học viện Ngân Hàng - Chùa Bộc', '21.00900247124673', '105.8284185825687'),
(26, 'Cao dẳng Du lịch', 'Cao dẳng Du lịch - Đương Hoàng Quốc việt', '21.046167833953266', '105.7836632429462'),
(21, 'ĐH Luật - Hà Nội', 'ĐH Luật Hà Nội - Đường Nguyễn Chí Thanh', '21.020388719599563', '105.81030821660534'),
(25, 'ĐH Điện lực', 'ĐH Điện lực - Đường Hoàng Quốc Việt', '21.046401389690523', '105.7851666220813');

-- --------------------------------------------------------

--
-- Table structure for table `route_detail`
--

CREATE TABLE IF NOT EXISTS `route_detail` (
  `point_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  PRIMARY KEY (`point_id`,`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route_detail`
--

INSERT INTO `route_detail` (`point_id`, `route_id`) VALUES
(8, 2),
(8, 3),
(10, 2),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(19, 2),
(20, 2),
(20, 3),
(21, 2),
(21, 3),
(22, 2),
(22, 3),
(25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `route_example`
--

CREATE TABLE IF NOT EXISTS `route_example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `final` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `final_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `route_example`
--

INSERT INTO `route_example` (`id`, `name`, `start`, `final`, `start_time`, `final_time`) VALUES
(2, 'ĐH Hà Nội - HV Ngân Hàng', 'ĐH Hà Nội', 'HV Ngân Hàng', '07:30:00', '23:15:00'),
(3, 'ĐH Điện Lực - ĐH Thăng Long', 'ĐH Điện Lực', 'ĐH Thăng Long', '07:00:00', '23:30:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
