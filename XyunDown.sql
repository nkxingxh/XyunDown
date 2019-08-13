-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-08-12 19:14:57
-- 服务器版本： 5.5.62-log
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ab`
--

-- --------------------------------------------------------

--
-- 表的结构 `hbdx_baseinfo`
--

CREATE TABLE `hbdx_baseinfo` (
  `ID` int(11) NOT NULL,
  `TAGFIRST` varchar(64) NOT NULL,
  `TAGSECOND` varchar(64) NOT NULL,
  `CODE` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hbdx_baseinfo`
--

INSERT INTO `hbdx_baseinfo` (`ID`, `TAGFIRST`, `TAGSECOND`, `CODE`) VALUES
(1, 'SYSTEMINFO', 'FILESHOW', '50'),
(2, 'SYSTEMINFO', 'PAGENUM', '30'),
(47, 'LIST', '1', '工具类'),
(48, 'LIST', '2', '游戏类'),
(49, 'LIST', '3', '安卓应用'),
(50, 'LIST', '4', '编程开发');

-- --------------------------------------------------------

--
-- 表的结构 `hbdx_blue`
--

CREATE TABLE `hbdx_blue` (
  `ID` int(11) NOT NULL,
  `FILETITLE` varchar(128) NOT NULL,
  `FILENAME` varchar(255) NOT NULL,
  `FILESIZE` varchar(255) NOT NULL,
  `FILETYPE` varchar(255) NOT NULL,
  `FILEURL` varchar(255) NOT NULL,
  `FILEEXT` varchar(255) NOT NULL,
  `FILENUM` int(10) NOT NULL,
  `LOADDATE` date NOT NULL,
  `FILEUSER` varchar(60) NOT NULL,
  `FILETAG` varchar(16) NOT NULL,
  `FILETEXT` longtext NOT NULL,
  `TOP` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hbdx_fav`
--

CREATE TABLE `hbdx_fav` (
  `ID` int(11) NOT NULL,
  `FAV_VIEWID` int(10) NOT NULL,
  `FAV_VIEWTITLE` varchar(60) NOT NULL,
  `FAV_USERNAME` varchar(20) NOT NULL,
  `FAV_DATE` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hbdx_seacher`
--

CREATE TABLE `hbdx_seacher` (
  `ID` int(11) NOT NULL,
  `SEACHERDATA` varchar(255) NOT NULL,
  `SEACHERNUM` int(10) NOT NULL,
  `DATETIME` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hbdx_tag`
--

CREATE TABLE `hbdx_tag` (
  `ID` int(11) NOT NULL,
  `TAG_NAME` varchar(64) NOT NULL DEFAULT '',
  `TAG_NUM` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hbdx_tag`
--

INSERT INTO `hbdx_tag` (`ID`, `TAG_NAME`, `TAG_NUM`) VALUES
(64, 'Windows', 0),
(65, '安卓', 0),
(66, '绿色软件', 0),
(67, '我的世界', 0);

-- --------------------------------------------------------

--
-- 表的结构 `hbdx_users`
--

CREATE TABLE `hbdx_users` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(60) NOT NULL,
  `USER_PASS` varchar(64) NOT NULL,
  `USER_DISPLAYNAME` varchar(250) NOT NULL,
  `USER_QQ` varchar(15) NOT NULL,
  `USER_MAIL` varchar(100) NOT NULL,
  `USER_LOGINNUM` int(10) NOT NULL,
  `REGISTERDATE` datetime NOT NULL,
  `LOGINDATE` datetime NOT NULL,
  `USER_GROUP` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hbdx_users`
--

INSERT INTO `hbdx_users` (`ID`, `USER_NAME`, `USER_PASS`, `USER_DISPLAYNAME`, `USER_QQ`, `USER_MAIL`, `USER_LOGINNUM`, `REGISTERDATE`, `LOGINDATE`, `USER_GROUP`) VALUES
(115, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1438723268', 'admin@xyundown.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '管理员');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hbdx_baseinfo`
--
ALTER TABLE `hbdx_baseinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hbdx_blue`
--
ALTER TABLE `hbdx_blue`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hbdx_fav`
--
ALTER TABLE `hbdx_fav`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hbdx_seacher`
--
ALTER TABLE `hbdx_seacher`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hbdx_tag`
--
ALTER TABLE `hbdx_tag`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hbdx_users`
--
ALTER TABLE `hbdx_users`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `hbdx_baseinfo`
--
ALTER TABLE `hbdx_baseinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 使用表AUTO_INCREMENT `hbdx_blue`
--
ALTER TABLE `hbdx_blue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2232;

--
-- 使用表AUTO_INCREMENT `hbdx_fav`
--
ALTER TABLE `hbdx_fav`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用表AUTO_INCREMENT `hbdx_seacher`
--
ALTER TABLE `hbdx_seacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- 使用表AUTO_INCREMENT `hbdx_tag`
--
ALTER TABLE `hbdx_tag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- 使用表AUTO_INCREMENT `hbdx_users`
--
ALTER TABLE `hbdx_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
