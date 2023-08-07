-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 09:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quees_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `csrf` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `security_` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `csrf`, `secret`, `security_`) VALUES
(1, 'armin', 'www.arminarmita@gmail.com', '58f2f41f55e898fb091b794a6745f5f5', '1dfd7d75e29beaefc6f27d12f8076020', 'be086ed08e2d49f10127bfb3f7b20eb7'),
(2, 'ali', 'www.ali13821382@gmail.com', '523de6a96ea62e55de2d2adddfba476b', 'c221ef70c20f3a8b039a3dad59893f4b', '53794221e6aef4ce39e463a276e18ef2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_avatar`
--

CREATE TABLE `tbl_avatar` (
  `id` int(255) NOT NULL,
  `img` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `coin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_avatar`
--

INSERT INTO `tbl_avatar` (`id`, `img`, `coin`) VALUES
(1, 'vs', 0),
(2, 'security', 0),
(3, 'scroll_cat1', 0),
(4, 'special_offer_2', 0),
(5, 'special_offer_3', 0),
(6, 'special_offer_4', 0),
(7, 'logo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`) VALUES
(1, 'ریاضیات'),
(2, 'تاریخی'),
(3, 'جغرافیا'),
(4, 'ریاضیات'),
(5, 'تاریخی'),
(6, 'جغرافیا');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online`
--

CREATE TABLE `tbl_online` (
  `id` int(255) NOT NULL,
  `csrf` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `category` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `game` int(255) NOT NULL,
  `player` int(255) NOT NULL,
  `payan` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `end_status` int(255) NOT NULL,
  `end_payan` text COLLATE utf8_persian_ci NOT NULL,
  `end_csrf` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `online` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ti` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_online`
--

INSERT INTO `tbl_online` (`id`, `csrf`, `category`, `status`, `game`, `player`, `payan`, `end_status`, `end_payan`, `end_csrf`, `online`, `ti`) VALUES
(1299, '09b3eb009197c1a7f32b3f1c26ee7e76', 1, 3, 1666407185, 1, 'a:10:{i:0;s:4:\"true\";i:1;s:2:\"30\";i:2;s:5:\"false\";i:3;s:2:\"40\";i:4;s:5:\"false\";i:5;s:2:\"50\";i:6;s:4:\"true\";i:7;s:2:\"60\";i:8;s:5:\"false\";i:9;s:1:\"0\";}', 1, 'a:3:{i:0;a:5:{i:0;i:2;i:1;i:3;i:2;i:0;i:3;i:90;i:4;a:5:{i:0;s:4:\"true\";i:1;s:5:\"false\";i:2;s:5:\"false\";i:3;s:4:\"true\";i:4;s:5:\"false\";}}i:1;a:5:{i:0;i:3;i:1;i:2;i:2;i:0;i:3;i:140;i:4;a:5:{i:0;s:4:\"true\";i:1;s:5:\"false\";i:2;s:4:\"true\";i:3;s:4:\"true\";i:4;s:5:\"false\";}}i:2;i:1;}', 'e9db6155b4d8d4f0bc71ebca9d8c34e3', 'online', 29),
(1300, 'e9db6155b4d8d4f0bc71ebca9d8c34e3', 1, 3, 1666407185, 1, 'a:10:{i:0;s:4:\"true\";i:1;s:2:\"30\";i:2;s:5:\"false\";i:3;s:2:\"40\";i:4;s:4:\"true\";i:5;s:2:\"50\";i:6;s:4:\"true\";i:7;s:2:\"60\";i:8;s:5:\"false\";i:9;s:1:\"0\";}', 0, 'a:3:{i:0;a:5:{i:0;i:3;i:1;i:2;i:2;i:0;i:3;i:140;i:4;a:5:{i:0;s:4:\"true\";i:1;s:5:\"false\";i:2;s:4:\"true\";i:3;s:4:\"true\";i:4;s:5:\"false\";}}i:1;a:5:{i:0;i:2;i:1;i:3;i:2;i:0;i:3;i:90;i:4;a:5:{i:0;s:4:\"true\";i:1;s:5:\"false\";i:2;s:5:\"false\";i:3;s:4:\"true\";i:4;s:5:\"false\";}}i:2;i:0;}', '09b3eb009197c1a7f32b3f1c26ee7e76', 'offline', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_on_ques`
--

CREATE TABLE `tbl_on_ques` (
  `id` int(255) NOT NULL,
  `ques` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `game` int(255) NOT NULL,
  `num` int(255) NOT NULL,
  `checker` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_on_ques`
--

INSERT INTO `tbl_on_ques` (`id`, `ques`, `game`, `num`, `checker`) VALUES
(393, 'a:5:{i:0;s:2:\"80\";i:1;s:2:\"83\";i:2;s:2:\"84\";i:3;s:2:\"85\";i:4;s:2:\"92\";}', 1666407185, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(255) NOT NULL,
  `category` int(255) NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `csrf` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` int(255) NOT NULL,
  `coin` int(255) NOT NULL,
  `answer` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `category`, `text`, `csrf`, `status`, `coin`, `answer`) VALUES
(77, 1, '2 2=', '09b3eb009197c1a7f32b3f1c26ee7e76', 0, 10, 'a:4:{i:1;a:3:{s:5:\"title\";s:1:\"4\";s:6:\"status\";s:6:\"g_true\";s:2:\"id\";i:1;}i:2;a:3:{s:5:\"title\";s:1:\"5\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:2;}i:3;a:3:{s:5:\"title\";s:1:\"6\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:3;}i:4;a:3:{s:5:\"title\";s:1:\"7\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:4;}}'),
(80, 1, '60*50*30*40=', '09b3eb009197c1a7f32b3f1c26ee7e76', 1, 30, 'a:4:{i:1;a:3:{s:5:\"title\";s:9:\"3.600.000\";s:6:\"status\";s:6:\"g_true\";s:2:\"id\";i:1;}i:2;a:3:{s:5:\"title\";s:6:\"36.000\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:2;}i:3;a:3:{s:5:\"title\";s:7:\"360.000\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:3;}i:4;a:3:{s:5:\"title\";s:5:\"3.600\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:4;}}'),
(83, 1, '3*5*6=', '09b3eb009197c1a7f32b3f1c26ee7e76', 1, 40, 'a:4:{i:1;a:3:{s:5:\"title\";s:2:\"45\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:1;}i:2;a:3:{s:5:\"title\";s:2:\"75\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:2;}i:3;a:3:{s:5:\"title\";s:2:\"60\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:3;}i:4;a:3:{s:5:\"title\";s:2:\"90\";s:6:\"status\";s:6:\"g_true\";s:2:\"id\";i:4;}}'),
(84, 1, '50*20*62=', '09b3eb009197c1a7f32b3f1c26ee7e76', 1, 50, 'a:4:{i:1;a:3:{s:5:\"title\";s:6:\"62.000\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:1;}i:2;a:3:{s:5:\"title\";s:5:\"6.200\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:2;}i:3;a:3:{s:5:\"title\";s:5:\"2.600\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:3;}i:4;a:3:{s:5:\"title\";s:6:\"26.000\";s:6:\"status\";s:6:\"g_true\";s:2:\"id\";i:4;}}'),
(85, 1, '2*90*2=', '09b3eb009197c1a7f32b3f1c26ee7e76', 1, 60, 'a:4:{i:1;a:3:{s:5:\"title\";s:3:\"360\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:1;}i:2;a:3:{s:5:\"title\";s:5:\"3.600\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:2;}i:3;a:3:{s:5:\"title\";s:5:\"1.800\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:3;}i:4;a:3:{s:5:\"title\";s:3:\"180\";s:6:\"status\";s:6:\"g_true\";s:2:\"id\";i:4;}}'),
(91, 2, 'ccn', '7e7743f1e9794ad9fecd98bb90268630', 2, 0, 'a:4:{i:1;a:3:{s:5:\"title\";s:2:\"ch\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:1;}i:2;a:3:{s:5:\"title\";s:1:\"v\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:2;}i:3;a:3:{s:5:\"title\";s:2:\"hf\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:3;}i:4;a:3:{s:5:\"title\";s:1:\"g\";s:6:\"status\";s:6:\"g_true\";s:2:\"id\";i:4;}}'),
(92, 1, 'efdfwe', '7e7743f1e9794ad9fecd98bb90268630', 1, 0, 'a:4:{i:1;a:3:{s:5:\"title\";s:4:\"dsfe\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:1;}i:2;a:3:{s:5:\"title\";s:4:\"efds\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:2;}i:3;a:3:{s:5:\"title\";s:5:\"esfsd\";s:6:\"status\";s:6:\"g_true\";s:2:\"id\";i:3;}i:4;a:3:{s:5:\"title\";s:6:\"fesfsd\";s:6:\"status\";s:7:\"g_false\";s:2:\"id\";i:4;}}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_security`
--

CREATE TABLE `tbl_security` (
  `id` int(255) NOT NULL,
  `code` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `csrf` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_security`
--

INSERT INTO `tbl_security` (`id`, `code`, `csrf`) VALUES
(1, '123456789', 'f1e1de63336b4bcd308aebf5d1be5f55'),
(2, '1770609544', '09b3eb009197c1a7f32b3f1c26ee7e76'),
(4, '2656547500', '7e7743f1e9794ad9fecd98bb90268630'),
(5, '2051202404', 'cbdd83ccb3c71211980ac4f7b69592c6'),
(6, '2208687772', '5bf9a42cc1abefc444a789fca6ea3f2e'),
(7, '2006795024', '0458a21f516049e4bd9a7423bbfbc636'),
(8, '2486169882', '9961cfd4d1f1fbc9b99a15e96fc55796'),
(9, '2253269108', 'e9db6155b4d8d4f0bc71ebca9d8c34e3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `csrf` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` int(255) NOT NULL,
  `coin` int(255) NOT NULL,
  `charge` int(255) NOT NULL,
  `time` int(255) NOT NULL,
  `ques_id` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `avatar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `csrf`, `status`, `coin`, `charge`, `time`, `ques_id`, `avatar`) VALUES
(22, 'آرمین اسلامی1', 'www.arminarmita@gmail.com', '09b3eb009197c1a7f32b3f1c26ee7e76', 0, 2680, 80, 1664951146, ',77,80,83,84,85', 2),
(46, 'آرمین', 'www.arminarmita1@gmail.com', 'f1e1de63336b4bcd308aebf5d1be5f55', 0, 315, 100, 1662565062, '', 3),
(48, 'ali', 'ali13821382@gmail.com', '7e7743f1e9794ad9fecd98bb90268630', 0, 145, 100, 1662788824, ',77,80,83,84,85', 6),
(49, 'آرمین', 'www.arminarm11ita@gmail.com', 'cbdd83ccb3c71211980ac4f7b69592c6', 0, 50, 80, 1662011453, '', 2),
(50, 'armin', 'www.arminarmitaaaa@gmail.com', '5bf9a42cc1abefc444a789fca6ea3f2e', 0, 0, 100, 1662452179, '', 0),
(51, 'ali', 'ali138213822@gmail.com', '0458a21f516049e4bd9a7423bbfbc636', 0, 0, 90, 1662452192, '', 0),
(52, 'armin', 'www.arminarmitaaaaaa@gmail.com', '9961cfd4d1f1fbc9b99a15e96fc55796', 0, 0, 100, 1662614227, '', 0),
(53, 'armin', 'www.arminarmita123@gmail.com', 'e9db6155b4d8d4f0bc71ebca9d8c34e3', 0, 20, 90, 1664953577, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_avatar`
--
ALTER TABLE `tbl_avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_online`
--
ALTER TABLE `tbl_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_on_ques`
--
ALTER TABLE `tbl_on_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_security`
--
ALTER TABLE `tbl_security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_avatar`
--
ALTER TABLE `tbl_avatar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_online`
--
ALTER TABLE `tbl_online`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1301;

--
-- AUTO_INCREMENT for table `tbl_on_ques`
--
ALTER TABLE `tbl_on_ques`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_security`
--
ALTER TABLE `tbl_security`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
