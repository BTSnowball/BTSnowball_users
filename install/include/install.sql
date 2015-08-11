-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 08 月 12 日 00:17
-- 服务器版本: 5.5.38
-- PHP 版本: 5.4.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dbmyi`
--

-- --------------------------------------------------------

--
-- 表的结构 `btsu_admin`
--

CREATE TABLE IF NOT EXISTS `btsu_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(2) NOT NULL DEFAULT '2',
  `adminname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `btsu_admin`
--

INSERT INTO `btsu_admin` (`id`, `group`, `adminname`, `password`, `zt`) VALUES
(1, 1, 'admin', 'b7de44300446aa8658283f36929fb969', 1);

-- --------------------------------------------------------

--
-- 表的结构 `btsu_bh_list`
--

CREATE TABLE IF NOT EXISTS `btsu_bh_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Ibh` int(11) NOT NULL,
  `Ubh` int(11) NOT NULL,
  `dm` varchar(100) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  `date` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `dourl` varchar(150) NOT NULL,
  `apiurl` varchar(150) NOT NULL,
  `urlrep` varchar(200) NOT NULL DEFAULT 'http://',
  `from` int(2) NOT NULL DEFAULT '0',
  `lcadd` varchar(10) NOT NULL DEFAULT 'web',
  `stra` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_cookie`
--

CREATE TABLE IF NOT EXISTS `btsu_cookie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ckeya` int(11) NOT NULL,
  `ckeyb` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_e_black`
--

CREATE TABLE IF NOT EXISTS `btsu_e_black` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `text` varchar(245) NOT NULL DEFAULT '无',
  `zt` int(2) NOT NULL DEFAULT '1',
  `date` int(11) NOT NULL,
  `update` varchar(200) NOT NULL DEFAULT 'UnKnow',
  `ly` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `btsu_e_black`
--

INSERT INTO `btsu_e_black` (`id`, `email`, `text`, `zt`, `date`, `update`, `ly`) VALUES
(18, 'blackuser@example.example', 'example', 1, 1432479111, 'black.example', 3);

-- --------------------------------------------------------

--
-- 表的结构 `btsu_qxlist`
--

CREATE TABLE IF NOT EXISTS `btsu_qxlist` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `hand` varchar(100) NOT NULL DEFAULT 'all',
  `bz` varchar(400) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  `lx` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `btsu_qxlist`
--

INSERT INTO `btsu_qxlist` (`id`, `cname`, `hname`, `hand`, `bz`, `zt`, `lx`) VALUES
(1, 'username', 'username', 'all', '用户名', 1, 1),
(2, 'sex', 'sex', 'all', '性别', 1, 2),
(3, 'email', 'email', 'all', '邮件', 1, 1),
(4, 'nickname', 'nickname', 'all', '昵称', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `btsu_reslist`
--

CREATE TABLE IF NOT EXISTS `btsu_reslist` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `Ibh` int(12) NOT NULL,
  `key` varchar(200) NOT NULL,
  `val` varchar(400) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_tokenlist`
--

CREATE TABLE IF NOT EXISTS `btsu_tokenlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `date` int(11) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  `dm` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_userzt`
--

CREATE TABLE IF NOT EXISTS `btsu_userzt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Iusername` varchar(200) NOT NULL,
  `dm` varchar(200) NOT NULL,
  `from` int(2) NOT NULL DEFAULT '0',
  `zt` int(2) NOT NULL DEFAULT '1',
  `Uusername` varchar(200) NOT NULL,
  `Iuid` int(11) NOT NULL,
  `mmzt` int(2) NOT NULL DEFAULT '1',
  `email` varchar(150) NOT NULL DEFAULT 'none',
  `isbelive` int(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_u_yzm_list`
--

CREATE TABLE IF NOT EXISTS `btsu_u_yzm_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ss` int(2) NOT NULL,
  `bh` int(11) NOT NULL,
  `yzm` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  `dm` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_waterhub`
--

CREATE TABLE IF NOT EXISTS `btsu_waterhub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `act` varchar(20) NOT NULL DEFAULT 'fangwen',
  `username` varchar(50) NOT NULL DEFAULT 'UNknow',
  `zt` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_w_belivelist`
--

CREATE TABLE IF NOT EXISTS `btsu_w_belivelist` (
  `id` int(11) NOT NULL,
  `wname` varchar(200) NOT NULL DEFAULT 'Unkonw',
  `wdomain` varchar(200) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `zt` int(2) NOT NULL DEFAULT '2',
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_w_black`
--

CREATE TABLE IF NOT EXISTS `btsu_w_black` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wname` varchar(200) NOT NULL,
  `wdomain` varchar(200) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `zt` int(2) NOT NULL DEFAULT '1',
  `date` int(11) NOT NULL,
  `from` int(2) NOT NULL DEFAULT '3',
  `text` varchar(245) NOT NULL,
  `ly` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `btsu_w_black`
--

INSERT INTO `btsu_w_black` (`id`, `wname`, `wdomain`, `rank`, `zt`, `date`, `from`, `text`, `ly`) VALUES
(36, 'black', 'black.example', 4, 1, 1432224803, 3, 'example', 3);

-- --------------------------------------------------------

--
-- 表的结构 `btsu_w_friend`
--

CREATE TABLE IF NOT EXISTS `btsu_w_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wname` varchar(200) NOT NULL,
  `wdomain` varchar(200) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `fz` int(11) NOT NULL DEFAULT '0',
  `zt` int(2) NOT NULL DEFAULT '1',
  `date` int(11) NOT NULL,
  `from` int(2) NOT NULL DEFAULT '0',
  `txt` varchar(200) NOT NULL DEFAULT 'none',
  `sync` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `btsu_w_friend`
--

INSERT INTO `btsu_w_friend` (`id`, `wname`, `wdomain`, `rank`, `fz`, `zt`, `date`, `from`, `txt`, `sync`) VALUES
(1, 'BTSnowball', 'uhub.cloud.btsnowball.org', 1, 1, 1, 1426434811, 1, 'none', 1),
(29, 'BTSUTEST-SA', 'BTSA.GEILI.IN', 1, 0, 1, 1438580835, 1, 'none', 1),
(28, 'BTSUTEST-SA', 'btsa.geili.in', 1, 0, 1, 1438577848, 2, 'none', 1),
(30, 'BTSnowball_Users_PHPWINDExample', 'pwdemo.btsnowball.com', 1, 0, 1, 1438589221, 1, 'none', 1),
(31, 'BTSnowball_Users_WordpressExample', 'wpdemo.btsnowball.net', 1, 0, 1, 1438607906, 1, 'none', 1),
(32, 'BTSUTEST-D', 'buch.geili.in', 1, 0, 1, 1438617463, 2, 'none', 1),
(33, 'BTSnowball_Users_PHPWINDExample', 'pwdemo.btsnowball.com', 1, 0, 1, 1438617679, 2, 'none', 1),
(34, 'BTSnowball\\_Users\\_WordpressExample', 'wpdemo.btsnowball.net', 1, 0, 1, 1438697139, 2, 'none', 1),
(35, 'TIEBA\\_A\\_DEMO', 'tiebaa.btsnowball.com', 1, 0, 1, 1438881031, 1, 'none', 1);

-- --------------------------------------------------------

--
-- 表的结构 `btsu_w_goodfriend`
--

CREATE TABLE IF NOT EXISTS `btsu_w_goodfriend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wname` varchar(200) NOT NULL,
  `wdomain` varchar(200) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1',
  `fz` int(11) NOT NULL DEFAULT '0',
  `zt` int(2) NOT NULL DEFAULT '1',
  `date` int(11) NOT NULL,
  `from` int(2) NOT NULL DEFAULT '3',
  `ly` varchar(100) NOT NULL DEFAULT '未知',
  `bz` varchar(254) NOT NULL DEFAULT '无',
  `sync` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `btsu_w_goodfriend`
--

INSERT INTO `btsu_w_goodfriend` (`id`, `wname`, `wdomain`, `rank`, `fz`, `zt`, `date`, `from`, `ly`, `bz`, `sync`) VALUES
(1, 'BTSClouds', 'Forum.btsclouds.org', 1, 1, 1, 1431325812, 1, 'BTSclouds', 'BTSclouds官方网站', 0);

-- --------------------------------------------------------

--
-- 表的结构 `btsu_yzm_list`
--

CREATE TABLE IF NOT EXISTS `btsu_yzm_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ss` int(2) NOT NULL,
  `bh` int(11) NOT NULL,
  `yzm` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  `dm` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `btsu_zcloud`
--

CREATE TABLE IF NOT EXISTS `btsu_zcloud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `api` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `ms` varchar(254) NOT NULL,
  `zt` int(2) NOT NULL DEFAULT '1',
  `zb` int(2) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `btsu_zcloud`
--

INSERT INTO `btsu_zcloud` (`id`, `url`, `api`, `name`, `ms`, `zt`, `zb`, `rank`) VALUES
(3, 'Www.BTSClouds.org', 'ServerA.ZC.Cloud.BTSClouds.org', 'BTSClouds_Cloud', 'BTSClouds的官方非盈利数据云-A', 1, 1, 1),
(2, 'Www.BTSnowBall.org', 'ServerA.ZC.Cloud.BTSnowBall.org', 'BTSnowBall_ZCloud_A', 'BTSnowBall的官方非盈利数据云-A', 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
