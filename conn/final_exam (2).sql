-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-26 01:36:54
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `final_exam`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_message`
--

DROP TABLE IF EXISTS `admin_message`;
CREATE TABLE IF NOT EXISTS `admin_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_message`
--

INSERT INTO `admin_message` (`id`, `name`, `password`) VALUES
(1, 'xch', '123'),
(2, 'lm', '123'),
(19, '3343', 'rerer'),
(18, '1232', '443'),
(17, 'dfsd', '122'),
(12, 'xch1', '1234'),
(20, 'wwww1111', '123'),
(21, 'eeeee123', '123'),
(23, 'xch1', '123'),
(24, '1', '1'),
(25, '12', '12');

-- --------------------------------------------------------

--
-- 表的结构 `users_message`
--

DROP TABLE IF EXISTS `users_message`;
CREATE TABLE IF NOT EXISTS `users_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `run_id` int(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users_message`
--

INSERT INTO `users_message` (`id`, `run_id`, `nickname`, `password`, `phone_number`, `address`, `add_time`) VALUES
(53, 152002, '1', '1', '1', '1', '2019-06-24 15:48:58'),
(30, 117642, '11111111111', '11', '123', '23123', '2019-06-17 20:11:27'),
(14, 295133, 'xch1', '123', 'q', '1', '2019-06-24 01:59:02'),
(23, 866415, '34324', '123', '12321', '313', '2019-06-17 12:27:43'),
(46, 591831, '', '', '', '', '2019-06-20 18:44:59'),
(48, 820023, '', '', '', '', '2019-06-20 18:45:01'),
(50, 489953, 'img/9.jpg', '', '', '', '2019-06-20 22:35:55');

-- --------------------------------------------------------

--
-- 表的结构 `vegetable_message`
--

DROP TABLE IF EXISTS `vegetable_message`;
CREATE TABLE IF NOT EXISTS `vegetable_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(100) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `ori_place` varchar(30) DEFAULT NULL,
  `pur_price` int(10) DEFAULT NULL,
  `sell_price` int(10) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vegetable_message`
--

INSERT INTO `vegetable_message` (`id`, `picture`, `name`, `ori_place`, `pur_price`, `sell_price`, `add_time`) VALUES
(13, 'picture/黄瓜.jpg', '黄瓜', '天津', 1, 2, '2019-06-23 15:28:23'),
(14, 'picture/土豆.jpg', '土豆', '山东', 1, 2, '2019-06-21 01:05:13'),
(15, 'picture/西红柿.jpg', '西红柿', '天津', 1, 2, '2019-06-21 01:06:07'),
(16, 'picture/圆白菜.jpg', '圆白菜', '云南', 0, 1, '2019-06-21 01:06:37'),
(18, 'picture/大葱.jpg', '大葱', '山东', 1, 3, '2019-06-21 01:15:42'),
(19, 'picture/姜.jpg', '姜', '河南', 4, 5, '2019-06-21 01:16:08'),
(20, 'picture/韭菜.jpg', '韭菜', '天津', 1, 2, '2019-06-21 01:16:41'),
(21, 'picture/香菜.jpg', '香菜', '天津', 4, 5, '2019-06-21 01:36:18'),
(22, 'picture/尖椒.jpg', '尖椒', '云南', 1, 2, '2019-06-21 01:36:45'),
(23, 'picture/南瓜.jpg', '南瓜', '河南', 1, 2, '2019-06-21 15:21:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
