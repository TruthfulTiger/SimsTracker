-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 23, 2018 at 06:18 AM
-- Server version: 10.2.14-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playwithdolls`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

DROP TABLE IF EXISTS `challenge`;
CREATE TABLE IF NOT EXISTS `challenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `nhID` int(11) DEFAULT NULL,
  `hhID` int(11) DEFAULT NULL,
  `challengeName` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cuser` (`userID`),
  KEY `fk_chh` (`hhID`),
  KEY `fk_cnh` (`nhID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`id`, `userID`, `nhID`, `hhID`, `challengeName`, `type`) VALUES
(2, 1, NULL, 2, 'Garland Redux', 'Legacy Challenge');

-- --------------------------------------------------------

--
-- Table structure for table `hood`
--

DROP TABLE IF EXISTS `hood`;
CREATE TABLE IF NOT EXISTS `hood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gameVersion` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hood`
--

INSERT INTO `hood` (`id`, `userID`, `name`, `gameVersion`, `type`) VALUES
(1, 1, 'West Weasels', 'Sims 2', 'Main hood');

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

DROP TABLE IF EXISTS `household`;
CREATE TABLE IF NOT EXISTS `household` (
  `hhID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `nhID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `money` int(11) NOT NULL DEFAULT 20000,
  `friends` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hhID`),
  KEY `fk_user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`hhID`, `userID`, `nhID`, `name`, `money`, `friends`) VALUES
(1, 1, 1, 'Aurora', 41503, 2),
(2, 1, 1, 'Garland', 31937, 6);

-- --------------------------------------------------------

--
-- Table structure for table `s2legacy`
--

DROP TABLE IF EXISTS `s2legacy`;
CREATE TABLE IF NOT EXISTS `s2legacy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `hhID` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `isRainbow` tinyint(1) NOT NULL DEFAULT 0,
  `currentGen` int(11) NOT NULL DEFAULT 1,
  `portraits` int(11) NOT NULL DEFAULT 0,
  `busgens` int(11) NOT NULL DEFAULT 0,
  `badgecount` int(11) NOT NULL DEFAULT 0,
  `casfounder` tinyint(1) NOT NULL DEFAULT 0,
  `adopted` int(11) NOT NULL DEFAULT 0,
  `other` int(11) NOT NULL DEFAULT 0,
  `topbilling` int(11) NOT NULL DEFAULT 0,
  `tree` int(11) NOT NULL DEFAULT 0,
  `fish` tinyint(1) NOT NULL DEFAULT 0,
  `juice` tinyint(1) NOT NULL DEFAULT 0,
  `mementototal` int(11) NOT NULL DEFAULT 0,
  `vhome` tinyint(1) NOT NULL DEFAULT 0,
  `vhfounder` tinyint(1) NOT NULL DEFAULT 0,
  `souvenirs` tinyint(1) NOT NULL DEFAULT 0,
  `familyhobby` varchar(30) DEFAULT NULL,
  `fhmax` int(11) NOT NULL DEFAULT 0,
  `pdhobby` tinyint(1) NOT NULL DEFAULT 0,
  `alienpreg` int(11) NOT NULL DEFAULT 0,
  `platgraves` int(11) NOT NULL DEFAULT 0,
  `elixirs` int(11) NOT NULL DEFAULT 0,
  `allwants` tinyint(1) NOT NULL DEFAULT 0,
  `allbugs` tinyint(1) NOT NULL DEFAULT 0,
  `allhobbies` tinyint(1) NOT NULL DEFAULT 0,
  `allcareers` tinyint(1) NOT NULL DEFAULT 0,
  `sheep` tinyint(1) NOT NULL DEFAULT 0,
  `bunnies` tinyint(1) NOT NULL DEFAULT 0,
  `spotless` tinyint(1) NOT NULL DEFAULT 0,
  `started` tinyint(1) NOT NULL DEFAULT 0,
  `prodigy` tinyint(1) NOT NULL DEFAULT 0,
  `birthday` tinyint(1) NOT NULL DEFAULT 0,
  `regrets` tinyint(1) NOT NULL DEFAULT 0,
  `capitalist` tinyint(1) NOT NULL DEFAULT 0,
  `league` tinyint(1) NOT NULL DEFAULT 0,
  `hhorse` tinyint(1) NOT NULL DEFAULT 0,
  `finish` tinyint(1) NOT NULL DEFAULT 0,
  `nowhere` tinyint(1) NOT NULL DEFAULT 0,
  `dressed` tinyint(1) NOT NULL DEFAULT 0,
  `green` tinyint(1) NOT NULL DEFAULT 0,
  `diy` tinyint(1) NOT NULL DEFAULT 0,
  `noble` tinyint(1) NOT NULL DEFAULT 0,
  `fearless` tinyint(1) NOT NULL DEFAULT 0,
  `isbi` tinyint(1) NOT NULL DEFAULT 0,
  `jobs` tinyint(1) NOT NULL DEFAULT 0,
  `obey` tinyint(1) NOT NULL DEFAULT 0,
  `behind` tinyint(1) NOT NULL DEFAULT 0,
  `large` tinyint(1) NOT NULL DEFAULT 0,
  `patriarchy` tinyint(1) NOT NULL DEFAULT 0,
  `oneway` tinyint(1) NOT NULL DEFAULT 0,
  `aspiring` tinyint(1) NOT NULL DEFAULT 0,
  `extreme` tinyint(1) NOT NULL DEFAULT 0,
  `love` tinyint(1) NOT NULL DEFAULT 0,
  `familyvals` tinyint(1) NOT NULL DEFAULT 0,
  `fitness` tinyint(1) NOT NULL DEFAULT 0,
  `hypo` tinyint(1) NOT NULL DEFAULT 0,
  `paranoid` tinyint(1) NOT NULL DEFAULT 0,
  `ghosts` tinyint(1) NOT NULL DEFAULT 0,
  `entrepreneur` tinyint(1) NOT NULL DEFAULT 0,
  `storyteller` tinyint(1) NOT NULL DEFAULT 0,
  `apocalypse` tinyint(1) NOT NULL DEFAULT 0,
  `gas` tinyint(1) NOT NULL DEFAULT 0,
  `cultured` tinyint(1) NOT NULL DEFAULT 0,
  `turmoil` tinyint(1) NOT NULL DEFAULT 0,
  `zone` tinyint(1) NOT NULL DEFAULT 0,
  `oldage` tinyint(1) NOT NULL DEFAULT 0,
  `cow` tinyint(1) NOT NULL DEFAULT 0,
  `drown` tinyint(1) NOT NULL DEFAULT 0,
  `sparky` tinyint(1) NOT NULL DEFAULT 0,
  `lifts` tinyint(1) NOT NULL DEFAULT 0,
  `fire` tinyint(1) NOT NULL DEFAULT 0,
  `flies` tinyint(1) NOT NULL DEFAULT 0,
  `fright` tinyint(1) NOT NULL DEFAULT 0,
  `hail` tinyint(1) NOT NULL DEFAULT 0,
  `illness` tinyint(1) NOT NULL DEFAULT 0,
  `rallyforth` tinyint(1) NOT NULL DEFAULT 0,
  `crushed` tinyint(1) NOT NULL DEFAULT 0,
  `scissors` tinyint(1) NOT NULL DEFAULT 0,
  `starved` tinyint(1) NOT NULL DEFAULT 0,
  `sun` tinyint(1) NOT NULL DEFAULT 0,
  `kaching` int(11) NOT NULL DEFAULT 0,
  `shrink` int(11) NOT NULL DEFAULT 0,
  `sw` int(11) NOT NULL DEFAULT 0,
  `repo` int(11) NOT NULL DEFAULT 0,
  `dropout` int(11) NOT NULL DEFAULT 0,
  `visitordeath` int(11) NOT NULL DEFAULT 0,
  `diva` int(11) NOT NULL DEFAULT 0,
  `reload` int(11) NOT NULL DEFAULT 0,
  `aspchange` int(11) NOT NULL DEFAULT 0,
  `neglect` int(11) NOT NULL DEFAULT 0,
  `runaway` int(11) NOT NULL DEFAULT 0,
  `retrieved` int(11) NOT NULL DEFAULT 0,
  `badvacation` int(11) NOT NULL DEFAULT 0,
  `familycount` int(11) NOT NULL DEFAULT 0,
  `wealthcount` int(11) NOT NULL DEFAULT 0,
  `knowledgecount` int(11) NOT NULL DEFAULT 0,
  `friendshipcount` int(11) NOT NULL DEFAULT 0,
  `romancecount` int(11) NOT NULL DEFAULT 0,
  `pleasurecount` int(11) NOT NULL DEFAULT 0,
  `cheesecount` int(11) NOT NULL DEFAULT 0,
  `childrencount` int(11) NOT NULL DEFAULT 0,
  `grandkidscount` int(11) NOT NULL DEFAULT 0,
  `earncount` int(11) NOT NULL DEFAULT 0,
  `opencount` int(11) NOT NULL DEFAULT 0,
  `skillscount` int(11) NOT NULL DEFAULT 0,
  `alienscount` int(11) NOT NULL DEFAULT 0,
  `bestiescount` int(11) NOT NULL DEFAULT 0,
  `lovescount` int(11) NOT NULL DEFAULT 0,
  `woohoocount` int(11) NOT NULL DEFAULT 0,
  `firstdatescount` int(11) NOT NULL DEFAULT 0,
  `dreamdatescount` int(11) NOT NULL DEFAULT 0,
  `sarniescount` int(11) NOT NULL DEFAULT 0,
  `omoney` int(11) NOT NULL DEFAULT 0,
  `ofriends` int(11) NOT NULL DEFAULT 0,
  `owants` int(11) NOT NULL DEFAULT 0,
  `ograves` int(11) NOT NULL DEFAULT 0,
  `obusiness` int(11) NOT NULL DEFAULT 0,
  `opets` int(11) NOT NULL DEFAULT 0,
  `oseasons` int(11) NOT NULL DEFAULT 0,
  `osets` int(11) NOT NULL DEFAULT 0,
  `ohandicaps` int(11) NOT NULL DEFAULT 0,
  `grandtotal` decimal(10,2) NOT NULL DEFAULT 1.50,
  `legacytotal` decimal(10,2) NOT NULL DEFAULT 0.50,
  `moneytotal` decimal(10,2) NOT NULL DEFAULT 1.00,
  `friendstotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `wantstotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gravestotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ghoststotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `biztotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `petstotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `seasonstotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bvtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fttotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `setstotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mastertotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `handicapstotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `overflowtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `penaltiestotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `freekaching` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_hh` (`hhID`),
  KEY `fk_leguser` (`userID`),
  KEY `fk_challenge` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s2legacy`
--

INSERT INTO `s2legacy` (`id`, `userID`, `hhID`, `cid`, `isRainbow`, `currentGen`, `portraits`, `busgens`, `badgecount`, `casfounder`, `adopted`, `other`, `topbilling`, `tree`, `fish`, `juice`, `mementototal`, `vhome`, `vhfounder`, `souvenirs`, `familyhobby`, `fhmax`, `pdhobby`, `alienpreg`, `platgraves`, `elixirs`, `allwants`, `allbugs`, `allhobbies`, `allcareers`, `sheep`, `bunnies`, `spotless`, `started`, `prodigy`, `birthday`, `regrets`, `capitalist`, `league`, `hhorse`, `finish`, `nowhere`, `dressed`, `green`, `diy`, `noble`, `fearless`, `isbi`, `jobs`, `obey`, `behind`, `large`, `patriarchy`, `oneway`, `aspiring`, `extreme`, `love`, `familyvals`, `fitness`, `hypo`, `paranoid`, `ghosts`, `entrepreneur`, `storyteller`, `apocalypse`, `gas`, `cultured`, `turmoil`, `zone`, `oldage`, `cow`, `drown`, `sparky`, `lifts`, `fire`, `flies`, `fright`, `hail`, `illness`, `rallyforth`, `crushed`, `scissors`, `starved`, `sun`, `kaching`, `shrink`, `sw`, `repo`, `dropout`, `visitordeath`, `diva`, `reload`, `aspchange`, `neglect`, `runaway`, `retrieved`, `badvacation`, `familycount`, `wealthcount`, `knowledgecount`, `friendshipcount`, `romancecount`, `pleasurecount`, `cheesecount`, `childrencount`, `grandkidscount`, `earncount`, `opencount`, `skillscount`, `alienscount`, `bestiescount`, `lovescount`, `woohoocount`, `firstdatescount`, `dreamdatescount`, `sarniescount`, `omoney`, `ofriends`, `owants`, `ograves`, `obusiness`, `opets`, `oseasons`, `osets`, `ohandicaps`, `grandtotal`, `legacytotal`, `moneytotal`, `friendstotal`, `wantstotal`, `gravestotal`, `ghoststotal`, `biztotal`, `petstotal`, `seasonstotal`, `bvtotal`, `fttotal`, `setstotal`, `mastertotal`, `handicapstotal`, `overflowtotal`, `penaltiestotal`, `freekaching`) VALUES
(2, 1, 2, 2, 1, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'None', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '16.50', '2.00', '1.00', '1.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1.00', '1.00', '10.00', '0.00', '0.00', 0);

--
-- Triggers `s2legacy`
--
DROP TRIGGER IF EXISTS `chk_casfounder`;
DELIMITER $$
CREATE TRIGGER `chk_casfounder` BEFORE INSERT ON `s2legacy` FOR EACH ROW IF NEW.casfounder < 0 OR NEW.casfounder > 1 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error: Number must be 0 or 1';
  END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `chk_casfounder2`;
DELIMITER $$
CREATE TRIGGER `chk_casfounder2` BEFORE UPDATE ON `s2legacy` FOR EACH ROW IF NEW.casfounder < 0 OR NEW.casfounder > 1 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error: Number must be 0 or 1';
  END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `chk_currentGen`;
DELIMITER $$
CREATE TRIGGER `chk_currentGen` BEFORE INSERT ON `s2legacy` FOR EACH ROW IF NEW.currentGen < 1 OR NEW.currentGen > 10 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error: Number must be between 1 and 10';
  END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `chk_currentGen2`;
DELIMITER $$
CREATE TRIGGER `chk_currentGen2` BEFORE UPDATE ON `s2legacy` FOR EACH ROW IF NEW.currentGen < 1 OR NEW.currentGen > 10 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error: Number must be between 1 and 10';
  END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sims`
--

DROP TABLE IF EXISTS `sims`;
CREATE TABLE IF NOT EXISTS `sims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `hhID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` varchar(30) NOT NULL DEFAULT 'Infant',
  `aspiration` varchar(30) NOT NULL DEFAULT 'Grow Up',
  `secondAsp` varchar(30) DEFAULT NULL,
  `LTW` varchar(50) DEFAULT NULL,
  `starSign` varchar(30) DEFAULT NULL,
  `neatPoints` int(11) DEFAULT 0,
  `outgoingPoints` int(11) DEFAULT 0,
  `activePoints` int(11) DEFAULT 0,
  `playfulPoints` int(11) DEFAULT 0,
  `nicePoints` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_simhh` (`hhID`),
  KEY `fk_simuser` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sims`
--

INSERT INTO `sims` (`id`, `userID`, `hhID`, `firstName`, `lastName`, `gender`, `age`, `aspiration`, `secondAsp`, `LTW`, `starSign`, `neatPoints`, `outgoingPoints`, `activePoints`, `playfulPoints`, `nicePoints`) VALUES
(1, 1, 1, 'Crimson', 'Aurora', 'M', 'Adult', 'Wealth', 'Popularity', NULL, 'Aquarius', 4, 4, 4, 7, 6),
(2, 1, 1, 'Amber', 'Aurora', 'F', 'Teen', 'Family', 'Knowledge', NULL, 'Gemini', 4, 10, 10, 1, 10),
(3, 1, 1, 'Ginger', 'Aurora', 'M', 'Teen', 'Knowledge', 'Family', NULL, 'Capricorn', 10, 2, 6, 10, 7),
(4, 1, 2, 'Hunter', 'Garland', 'M', 'Elder', 'Knowledge', 'Wealth', NULL, 'Cancer', 7, 4, 5, 5, 10),
(5, 1, 2, 'Sapphire', 'Garland', 'F', 'Young Adult', 'Knowledge', 'Wealth', NULL, 'Sagittarius', 8, 0, 10, 10, 0),
(6, 1, 2, 'Sky', 'Garland', 'M', 'Young Adult', 'Pleasure', 'Knowledge', NULL, 'Libra', 6, 10, 5, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

DROP TABLE IF EXISTS `tmp`;
CREATE TABLE IF NOT EXISTS `tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp`
--

INSERT INTO `tmp` (`id`, `name`) VALUES
(1, 'test 1'),
(3, 'test 3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$qZjGwIDYaLBIlUzzvK78Xu2iQEzhPJ9PXoZCkpa.I73BP0cv/xr9G',
  `role` varchar(25) NOT NULL DEFAULT 'Member',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastLogin` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created`, `lastLogin`) VALUES
(1, 'Sam', 'samgoacher79@gmail.com', '$2y$10$Q3X1fSZ9fNE.rQR.umUg3u159vu4gCdnps52JP0lO9Ln7.uJum1GS', 'Admin', '2018-10-30 06:41:56', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `fk_chh` FOREIGN KEY (`hhID`) REFERENCES `household` (`hhID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cnh` FOREIGN KEY (`nhID`) REFERENCES `hood` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s2legacy`
--
ALTER TABLE `s2legacy`
  ADD CONSTRAINT `fk_challenge` FOREIGN KEY (`cid`) REFERENCES `challenge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hh` FOREIGN KEY (`hhID`) REFERENCES `household` (`hhID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leguser` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
