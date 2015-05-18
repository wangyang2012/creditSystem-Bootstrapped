-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 05 月 17 日 15:22
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `creditsystem`
--

-- --------------------------------------------------------

--
-- 表的结构 `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(45) DEFAULT NULL,
  `client_type` int(11) DEFAULT NULL,
  `assets` varchar(255) DEFAULT NULL,
  `liabilities` varchar(255) DEFAULT NULL,
  `professions` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `spouse` varchar(255) DEFAULT NULL,
  `live` varchar(255) DEFAULT NULL,
  `insurance` varchar(255) DEFAULT NULL,
  `finance` varchar(255) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_type`, `assets`, `liabilities`, `professions`, `education`, `spouse`, `live`, `insurance`, `finance`, `business`, `level`) VALUES
(10, '小李', 1, '8000元以上', '无', '公司主管', '北大硕士', '结婚', '一子一女', '全款买房  三室两厅', '', '', 1),
(11, '小张', 1, '5000--8000', '无', '国企职员', '本科', '结婚', '无', '按揭买房', '', '', 1),
(12, '小刘', 1, '2000--5000', '无', '公司职员', '专科', '无', '无', '租房居住', '', '', 2),
(13, '小明', 1, '2000以下', '欠款10000元', '无', '高中', '离异', '一女', '寄居', '', '', 4),
(14, '国企一', 2, '', '', '', '', '', '', '', '盈利100万', '石油业务', 1),
(15, '私企一', 2, '', '', '', '', '', '', '', '损失10万', '服装业务', 3);

-- --------------------------------------------------------

--
-- 表的结构 `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `distribution`
--

CREATE TABLE IF NOT EXISTS `distribution` (
  `distribution_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`distribution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `distribution`
--

INSERT INTO `distribution` (`distribution_id`, `client_id`, `amount`, `duration`, `date`) VALUES
(9, 10, 20000, 3, '2015-05-13'),
(10, 12, 10000, 1, '2013-05-13');

-- --------------------------------------------------------

--
-- 表的结构 `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(6,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `interest`
--

INSERT INTO `interest` (`id`, `value`) VALUES
(1, '0.030');

-- --------------------------------------------------------

--
-- 表的结构 `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `interest` int(11) NOT NULL,
  `distribution_id` int(11) NOT NULL,
  PRIMARY KEY (`interest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `interests`
--

INSERT INTO `interests` (`interest_id`, `client_id`, `interest`, `distribution_id`) VALUES
(9, 0, 600, 9),
(10, 0, 300, 10);

-- --------------------------------------------------------

--
-- 表的结构 `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `record`
--

INSERT INTO `record` (`record_id`, `client_id`, `note`, `level`) VALUES
(3, 13, '欠款5000未还', 4);

-- --------------------------------------------------------

--
-- 表的结构 `repayment`
--

CREATE TABLE IF NOT EXISTS `repayment` (
  `repayment_id` int(11) NOT NULL AUTO_INCREMENT,
  `repayed` int(11) NOT NULL,
  `distribution_id` int(11) NOT NULL,
  PRIMARY KEY (`repayment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `repayment`
--

INSERT INTO `repayment` (`repayment_id`, `repayed`, `distribution_id`) VALUES
(9, 0, 9),
(10, 0, 10);

-- --------------------------------------------------------

--
-- 表的结构 `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `response_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `accepted` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`response_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `response`
--

INSERT INTO `response` (`response_id`, `client_id`, `amount`, `duration`, `accepted`, `date`) VALUES
(1, 13, 20000, 1, 2, '2015-05-14');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'user', 'user'),
(2, 'root', 'root'),
(3, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
