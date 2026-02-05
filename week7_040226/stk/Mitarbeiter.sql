-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 11:13 AM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it-network`
--

-- --------------------------------------------------------

--
-- Table structure for table `Mitarbeiter`
--

CREATE TABLE IF NOT EXISTS `Mitarbeiter` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_vorname` varchar(30) NOT NULL,
  `m_nachname` varchar(30) NOT NULL,
  `m_geburtsdatum` date NOT NULL,
  `m_gehalt` int(11) NOT NULL,
  `m_geschlecht` varchar(1) NOT NULL,
  `m_einstellung` year(4) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Mitarbeiter`
--

INSERT INTO `Mitarbeiter` (`m_id`, `m_vorname`, `m_nachname`, `m_geburtsdatum`, `m_gehalt`, `m_geschlecht`, `m_einstellung`) VALUES
(1, 'Eva', 'Klein', '1990-01-13', 2000, 'w', 2014),
(2, 'Kai', 'Blei', '1967-10-28', 3500, 'm', 2001),
(3, 'Udo', 'Ax', '1980-05-20', 1500, 'm', 2001),
(4, 'Ernst', 'Klein', '1988-02-02', 1000, 'm', 2006);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
