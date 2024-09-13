CREATE DATABASE IF NOT EXISTS `search_app`;
USE `search_app`;

CREATE TABLE IF NOT EXISTS `searches` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
