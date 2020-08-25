-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                10.4.13-MariaDB - mariadb.org binary distribution
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- aysun için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `aysun` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `aysun`;

-- tablo yapısı dökülüyor aysun.bolumler
CREATE TABLE IF NOT EXISTS `bolumler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakulte_id` int(11) NOT NULL DEFAULT 0,
  `bolum_adi` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- aysun.bolumler: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
DELETE FROM `bolumler`;
/*!40000 ALTER TABLE `bolumler` DISABLE KEYS */;
INSERT INTO `bolumler` (`id`, `fakulte_id`, `bolum_adi`) VALUES
	(1, 3811, 'Bilgisayar muh'),
	(2, 5011, 'aşçılık');
/*!40000 ALTER TABLE `bolumler` ENABLE KEYS */;

-- tablo yapısı dökülüyor aysun.fakulteler
CREATE TABLE IF NOT EXISTS `fakulteler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakulte_id` int(11) NOT NULL DEFAULT 0,
  `fakulte_ismi` varchar(300) NOT NULL DEFAULT '0',
  `universite_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- aysun.fakulteler: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
DELETE FROM `fakulteler`;
/*!40000 ALTER TABLE `fakulteler` DISABLE KEYS */;
INSERT INTO `fakulteler` (`id`, `fakulte_id`, `fakulte_ismi`, `universite_id`) VALUES
	(1, 5011, 'Turizm Otelcilik', 501),
	(2, 3811, 'muhendislk', 381);
/*!40000 ALTER TABLE `fakulteler` ENABLE KEYS */;

-- tablo yapısı dökülüyor aysun.universiteler
CREATE TABLE IF NOT EXISTS `universiteler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_id` int(11) DEFAULT NULL,
  `universite_adi` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- aysun.universiteler: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
DELETE FROM `universiteler`;
/*!40000 ALTER TABLE `universiteler` DISABLE KEYS */;
INSERT INTO `universiteler` (`id`, `uni_id`, `universite_adi`) VALUES
	(1, 501, 'Nevşehir uni'),
	(2, 381, 'erciyes üni');
/*!40000 ALTER TABLE `universiteler` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
