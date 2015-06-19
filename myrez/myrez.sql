SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rdate` datetime NOT NULL,
  `ryear` smallint(4) NOT NULL,
  `rweek` tinyint(2) NOT NULL,
  `rday` tinyint(1) NOT NULL,
  `rtime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rprice` float NOT NULL,
  `ruser_id` int(10) NOT NULL,
  `remail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
