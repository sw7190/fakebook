-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 17-08-16 15:12
-- 서버 버전: 10.1.25-MariaDB
-- PHP 버전: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `fakebook`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `date` date NOT NULL,
  `img` varchar(1000) NOT NULL DEFAULT '0',
  `cnt` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` varchar(9999) NOT NULL,
  `img` varchar(100) NOT NULL,
  `lidx` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`idx`, `id`, `name`, `content`, `img`, `lidx`, `datetime`) VALUES
(26, 'sw7190', '상우', '가', 'sw7190', 23, '2017-08-15 18:11:38'),
(27, 'sw7190', '상우', 'ㅇ', 'sw7190', 23, '2017-08-15 18:11:39'),
(28, 'sw7190', '상우', 'ㅂ', 'sw7190', 23, '2017-08-15 18:11:40'),
(29, 'sw7190', '상우', 'ㅁ', 'sw7190', 23, '2017-08-15 18:11:42'),
(30, 'sw7190', '상우', 'ㄷ', 'sw7190', 23, '2017-08-15 18:11:45'),
(31, 'sw7190', '상우', 'ㅇ', 'sw7190', 23, '2017-08-15 18:12:11'),
(32, 'sw7190', '상우', '되나연', 'sw7190', 23, '2017-08-15 18:12:26'),
(33, 'sw7190', '상우', '어', 'sw7190', 23, '2017-08-15 18:12:27'),
(34, 'sw7190', '상우', '니', 'sw7190', 23, '2017-08-15 18:12:28'),
(35, 'sw7190', '상우', '비', 'sw7190', 23, '2017-08-15 18:12:29'),
(36, 'sw7190', '상우', '이', 'sw7190', 23, '2017-08-15 18:12:30'),
(37, 'sw7190', '상우', '아니', 'sw7190', 23, '2017-08-15 18:15:59'),
(38, 'sw7190', '상우', '닷홈에', 'sw7190', 23, '2017-08-15 18:16:00'),
(39, 'sw7190', '상우', '올리면', 'sw7190', 23, '2017-08-15 18:16:01'),
(40, 'sw7190', '상우', '안되는', 'sw7190', 23, '2017-08-15 18:16:03'),
(41, 'sw7190', '상우', '이유좀', 'sw7190', 23, '2017-08-15 18:16:03'),
(42, 'sw7190', '상우', '이유좀', 'sw7190', 23, '2017-08-15 18:16:13'),
(43, 'sw7190', '상우', '제발', 'sw7190', 23, '2017-08-15 19:03:43'),
(44, 'sw7190', '상우', '되라', 'sw7190', 23, '2017-08-15 19:03:45'),
(45, 'sw7190', '상우', '하', 'sw7190', 23, '2017-08-15 19:03:46'),
(46, 'sw7190', '상우', '아아악', 'sw7190', 23, '2017-08-15 19:03:48'),
(47, 'sw7190', '상우', 'ㅡ', 'sw7190', 20, '2017-08-15 19:04:00'),
(48, 'sw7190', '상우', 'ㅗ', 'sw7190', 20, '2017-08-15 19:04:01'),
(49, 'test12', '테스트', '엿', '0', 20, '2017-08-15 19:04:27'),
(50, 'sw7190', '상우', 'ㅜ', 'sw7190', 20, '2017-08-15 19:04:36'),
(51, 'sw7190', '상우', 'ㅋ', 'sw7190', 20, '2017-08-15 19:04:45'),
(52, 'test12', '테스트', 'ddd', '0', 20, '2017-08-15 19:05:04'),
(53, 'sw7190', '상우', 'dd', 'sw7190', 20, '2017-08-15 19:05:10'),
(54, 'sw7190', '상우', 'zz', 'sw7190', 20, '2017-08-15 19:05:11'),
(55, 'test12', '테스트', 'q', '0', 20, '2017-08-15 19:05:18'),
(56, 'test12', '테스트', 'da', 'test12', 20, '2017-08-15 19:12:35'),
(57, 'test12', '테스트', 'daewq', 'test12', 20, '2017-08-15 19:12:36'),
(58, 'test12', '테스트', 'daewqeqwew', 'test12', 20, '2017-08-15 19:12:37'),
(59, 'test12', '테스트', 'daewqeqwewdsad', 'test12', 20, '2017-08-15 19:12:37'),
(60, 'test12', '테스트', 'daewqeqwewdsadsa', 'test12', 20, '2017-08-15 19:12:37'),
(61, 'test12', '테스트', 'daewqeqwewdsadsa', 'test12', 20, '2017-08-15 19:12:37'),
(62, 'test12', '테스트', 'daewqeqwewdsadsacx', 'test12', 20, '2017-08-15 19:12:38'),
(63, 'test12', '테스트', 'daewqeqwewdsadsacxe', 'test12', 20, '2017-08-15 19:12:39'),
(64, 'test12', '테스트', 'daewqeqwewdsadsacxeq', 'test12', 20, '2017-08-15 19:12:39'),
(65, 'test12', '테스트', 'ewqe', 'test12', 20, '2017-08-15 19:12:50'),
(66, 'test12', '테스트', 'dasdsa', 'test12', 20, '2017-08-15 19:12:51'),
(67, 'test12', '테스트', 'ewqeqw', 'test12', 20, '2017-08-15 19:12:53'),
(68, 'test12', '테스트', 'cds', 'test12', 20, '2017-08-15 19:12:53'),
(69, 'test12', '테스트', 'qqew', 'test12', 20, '2017-08-15 19:12:54'),
(70, 'test12', '테스트', 'q', 'test12', 20, '2017-08-15 19:12:55'),
(71, 'test12', '테스트', 'ewqeq', 'test12', 16, '2017-08-15 19:13:33'),
(72, 'test12', '테스트', '아아아', 'test12', 16, '2017-08-15 19:13:37'),
(73, 'test12', '테스트', '테스트', 'test12', 16, '2017-08-15 19:13:38');

-- --------------------------------------------------------

--
-- 테이블 구조 `cuser`
--

CREATE TABLE `cuser` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `usertime` datetime NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `like_board`
--

CREATE TABLE `like_board` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `lidx` int(11) NOT NULL,
  `like_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT '0',
  `aboutme` varchar(200) DEFAULT NULL,
  `nosee` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `cuser`
--
ALTER TABLE `cuser`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `like_board`
--
ALTER TABLE `like_board`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- 테이블의 AUTO_INCREMENT `cuser`
--
ALTER TABLE `cuser`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2092;
--
-- 테이블의 AUTO_INCREMENT `like_board`
--
ALTER TABLE `like_board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
