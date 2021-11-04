-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` int NOT NULL,
  `gambar` varchar(30) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `menu` (`id_menu`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(1,	'Gado-gado',	'Gado-gado adalah makanan khas indonesia!',	500000,	'gado-gado.jpeg'),
(2,	'Rendang',	'Ini rendang',	600000,	'rendang.jpeg'),
(3,	'Soto',	'Ini soto',	565000,	'soto.jpeg'),
(4,	'Nasi Goreng',	'Ini nasgor',	510000,	'nasgor.jpg'),
(5,	'Sate',	'Ini sate!',	700000,	'sate.jpg'),
(6,	'Tempe Salad',	'Ini tempe salad',	450000,	'tempe-salad.jpg');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1,	'wiormiw',	'$2y$10$TjQJxqb1NAvPNdhB.wKBQebPM/dmLIYLe3SOmd6795t/9g197sMZS',	'2021-11-03 22:46:35');

-- 2021-11-03 22:41:07
