-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-06-01 07:24:59
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ilanfun`
--

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `view_id` int(10) NOT NULL,
  `data` varchar(1000) NOT NULL,
  `score` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`id`, `view_id`, `data`, `score`) VALUES
(1, 1, '風景好棒~~~', 4),
(1, 2, '海灘安全，店員親切，家前公道', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `reservation`
--

CREATE TABLE `reservation` (
  `view_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `reservation_number` int(10) NOT NULL,
  `time` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `reservation`
--

INSERT INTO `reservation` (`view_id`, `id`, `reservation_number`, `time`) VALUES
(2, 1, 2, 1),
(2, 2, 3, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `account` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `authority` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `name`, `account`, `password`, `authority`) VALUES
(0, '訪客', '000', '000', 0),
(1, '小明', 'aaa', '111', 1),
(2, '蔡哥', 'bbb', '222', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `view`
--

CREATE TABLE `view` (
  `view_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `remain` int(10) DEFAULT NULL,
  `price` int(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `view`
--

INSERT INTO `view` (`view_id`, `title`, `post`, `remain`, `price`, `time`) VALUES
(1, '望龍埤', '好山好水', NULL, 0, '整天'),
(2, '烏石港衝浪', '衝浪板租借500元 副教學', 10, 500, '6:00~16:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
