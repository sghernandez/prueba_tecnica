-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2021 at 11:38 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `get_books`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_books` (IN `published_year` INT)  BEGIN

	SELECT 
		id, title, isbn, published_date as fecha
	FROM 
		books 
	WHERE year(published_date) > published_year;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `isbn` varchar(30) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `published_date`, `publisher_id`) VALUES
(1, 'Goodbye to All That', '9781541619883', '2013-01-05', 3),
(2, 'The Mercies', '9780316529235', '2020-01-28', 3),
(3, 'On the Farm', '9780763655914', '2012-03-27', 2),
(4, 'Joseph Had a Little Overcoat', '9780140563580', '1977-03-15', 2),
(5, 'Goodbye to All That', '9781541619883', '2013-01-05', 3),
(6, 'The Mercies', '9780316529235', '2020-01-28', 3),
(7, 'On the Farm', '9780763655914', '2012-03-27', 2),
(8, 'Joseph Had a Little Overcoat', '9780140563580', '1977-03-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `clave`) VALUES
(1, 'Alberto', 'Jacinto', 'albert2000@mail.com', 'jacaranda'),
(2, 'Alberto', 'Jacinto', 'albert2001@mail.com', 'jacaranda');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
