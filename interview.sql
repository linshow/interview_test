-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2019 年 08 月 27 日 03:57
-- 伺服器版本: 5.6.35
-- PHP 版本： 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `interview`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account_info`
--

CREATE TABLE `account_info` (
  `id` int(11) NOT NULL,
  `account` varchar(11) NOT NULL,
  `accountName` varchar(11) NOT NULL,
  `accountSex` varchar(11) NOT NULL,
  `birthDate` date NOT NULL,
  `accountEmail` varchar(30) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `account_info`
--

INSERT INTO `account_info` (`id`, `account`, `accountName`, `accountSex`, `birthDate`, `accountEmail`, `remark`) VALUES
(2, 'show', 'showlin', 'boy', '2019-08-14', 'show@show', 'dsd'),
(4, 'tttrrr', 'ttttt', 'boy', '2019-08-13', 'sssssfds', 'dsfds'),
(6, 'r', 'r', 'boy', '2019-08-14', 'r', '123'),
(7, 'rr', 'r', 'girl', '2019-08-14', 'rshow.com', 'rrr'),
(8, 'you', 'youuur', 'boy', '2019-08-26', 'show@show.com', 'eee');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
