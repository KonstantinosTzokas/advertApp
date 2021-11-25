--
-- Database: `realEstate`
--
CREATE DATABASE IF NOT EXISTS `realEstate` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `realEstate`;

--
-- Table Structure for table `realEstate`
--

DROP TABLE IF EXISTS `advert`;
CREATE TABLE IF NOT EXISTS `advert` (
  `adv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userName` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `available_for` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `square_meters` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`adv_id`),
  KEY `userName` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 