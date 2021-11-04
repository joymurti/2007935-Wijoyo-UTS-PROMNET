-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `detail_tanaman`;
CREATE TABLE `detail_tanaman` (
  `id` int NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hasil` int NOT NULL,
  `lama` int NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `detail_tanaman` (`id`, `nama`, `hasil`, `lama`, `tanggal`) VALUES
(1635984362,	'Tanaman A',	100,	13,	'2021-11-04'),
(1635984632,	'Tanaman B',	112,	25,	'2021-11-26'),
(1635984892,	'Tanaman C',	230,	12,	'2021-11-18');

-- 2021-11-04 00:19:12
