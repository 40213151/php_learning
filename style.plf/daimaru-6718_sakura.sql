-- phpMyAdmin SQL Dump
-- version 3.3.10.5
-- http://www.phpmyadmin.net
--
-- ホスト: mysql612.db.sakura.ne.jp
-- 生成時間: 2017 年 7 月 19 日 20:39
-- サーバのバージョン: 5.5.54
-- PHP のバージョン: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `daimaru-6718_sakura`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `coment` text,
  `indate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `gs_bm_table`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `life_flg` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータをダンプしています `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `u_name`, `u_id`, `u_pw`, `indate`, `life_flg`) VALUES
(1, '大丸', '40213151', '5kdo5yys', '2017-06-21 00:12:10', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `plf_about_table`
--

CREATE TABLE IF NOT EXISTS `plf_about_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `photo` varchar(256) DEFAULT NULL,
  `hn` text NOT NULL,
  `gaku` text NOT NULL,
  `from` text NOT NULL,
  `ziman` text NOT NULL,
  `type` text NOT NULL,
  `zense` text NOT NULL,
  `syutyo` text NOT NULL,
  `yume` text NOT NULL,
  `real` text NOT NULL,
  `gest` text NOT NULL,
  `link` text NOT NULL,
  `indate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- テーブルのデータをダンプしています `plf_about_table`
--

INSERT INTO `plf_about_table` (`id`, `photo`, `hn`, `gaku`, `from`, `ziman`, `type`, `zense`, `syutyo`, `yume`, `real`, `gest`, `link`, `indate`) VALUES
(1, NULL, 'wwwwwwww', 'lab３期', '表参道', '優しい', '元気な人', 'あ', '眠い！！！！', 'いません', '未完成', '未完成', '未完成', '2017-06-29 02:55:55'),
(2, NULL, 'クソネミマン', 'lab3期', '表参道', '優しい', '巨乳', '？', '？', '？', '？', '？', '？', '2017-06-30 03:01:09'),
(3, NULL, '慶一郎さん', '２３歳', '茨城', '筋肉がない！！！', '可愛い', 'トノサマバッタ', '眠いです毎日が眠い', 'いません！！！', 'あ', 'あ', 'あ', '2017-07-07 01:24:33');

-- --------------------------------------------------------

--
-- テーブルの構造 `plf_gest_table`
--

CREATE TABLE IF NOT EXISTS `plf_gest_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `hn` varchar(64) NOT NULL,
  `naiyou` text NOT NULL,
  `indate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `plf_gest_table`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `plf_user_table`
--

CREATE TABLE IF NOT EXISTS `plf_user_table` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(128) NOT NULL,
  `u_id` varchar(64) NOT NULL,
  `u_pw` varchar(64) NOT NULL,
  `indate` datetime NOT NULL,
  `life_flg` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- テーブルのデータをダンプしています `plf_user_table`
--

INSERT INTO `plf_user_table` (`id`, `u_name`, `u_id`, `u_pw`, `indate`, `life_flg`) VALUES
(1, '大丸さん', '40213151', '5kdo5yys', '2017-06-29 02:54:45', 0),
(2, 'カメラ太郎', '40213151', '5kdo5yys', '2017-06-30 00:33:54', 0),
(3, 'クソネミマン', '40213151', '5kdo5yys', '2017-06-30 03:00:10', 0),
(4, 'daimaru0000', '40213151', '5kdo5yys', '2017-07-07 01:23:36', 0),
(5, 's', '40213151', '5kdo5yys', '2017-07-12 18:34:36', 0);
