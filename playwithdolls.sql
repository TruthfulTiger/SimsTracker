-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 22, 2020 at 12:52 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `acl`
--

DROP TABLE IF EXISTS `acl`;
CREATE TABLE IF NOT EXISTS `acl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) DEFAULT NULL,
  `groupId` int(11) DEFAULT NULL,
  `rule` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acl`
--

INSERT INTO `acl` (`id`, `action`, `groupId`, `rule`) VALUES
(1, 'Admin-read', 0, 1),
(2, 'Admin-create', 0, 2),
(3, 'Admin-edit', 0, 4),
(4, 'Admin-delete', 0, 8),
(5, 'Member-read', 1, 1),
(6, 'Member-create', 1, 2),
(7, 'Member-edit', 1, 4),
(8, 'Member-delete', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hhID` int(11) NOT NULL DEFAULT 0,
  `nhID` int(11) NOT NULL DEFAULT 0,
  `userID` int(11) NOT NULL DEFAULT 0,
  `owner` int(11) DEFAULT NULL,
  `busName` varchar(50) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `rank` int(11) DEFAULT 0,
  `review` varchar(10) DEFAULT NULL,
  `bestAward` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`id`, `userID`, `nhID`, `hhID`, `challengeName`, `type`) VALUES
(2, 1, NULL, 2, 'Garland Redux', 'Legacy Challenge'),
(3, 1, NULL, 1, 'Aurora', 'Legacy Challenge');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `hood`
--

DROP TABLE IF EXISTS `hood`;
CREATE TABLE IF NOT EXISTS `hood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `gameVersion` int(11) NOT NULL DEFAULT 2,
  `type` varchar(50) NOT NULL,
  `parentHood` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hood`
--

INSERT INTO `hood` (`id`, `userID`, `name`, `gameVersion`, `type`, `parentHood`) VALUES
(1, 1, 'West Weasels', 2, 'Main hood', NULL),
(2, 1, 'Académie Le Tour', 2, 'University', 1);

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

DROP TABLE IF EXISTS `household`;
CREATE TABLE IF NOT EXISTS `household` (
  `hhID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT 0,
  `nhID` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `money` int(11) NOT NULL DEFAULT 20000,
  `friends` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hhID`),
  KEY `fk_user` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`hhID`, `userID`, `nhID`, `name`, `money`, `friends`) VALUES
(1, 1, 1, 'Aurora', 96784, 12),
(2, 1, 1, 'Garland', 115357, 17);

-- --------------------------------------------------------

--
-- Table structure for table `legacygen`
--

DROP TABLE IF EXISTS `legacygen`;
CREATE TABLE IF NOT EXISTS `legacygen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `challengeID` int(11) NOT NULL,
  `generation` int(11) NOT NULL,
  `simID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Challenge` (`challengeID`),
  KEY `FK_Sim` (`simID`),
  KEY `FK_Generation` (`generation`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `legacygen`
--

INSERT INTO `legacygen` (`id`, `userID`, `challengeID`, `generation`, `simID`) VALUES
(1, 1, 2, 1, 4),
(2, 1, 2, 2, 6),
(3, 1, 2, 3, 9),
(4, 1, 3, 1, 1),
(5, 1, 3, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin` varchar(5) DEFAULT NULL,
  `generation` int(11) DEFAULT NULL,
  `careerTrack` int(11) DEFAULT NULL,
  `jobLevel` int(11) NOT NULL DEFAULT 0,
  `learnedSit` tinyint(4) DEFAULT NULL,
  `learnedStay` tinyint(4) DEFAULT NULL,
  `learnedCome` tinyint(4) DEFAULT NULL,
  `learnedRoll` tinyint(4) DEFAULT NULL,
  `learnedSpeak` tinyint(4) DEFAULT NULL,
  `learnedShake` tinyint(4) DEFAULT NULL,
  `learnedDead` tinyint(4) DEFAULT NULL,
  `toiletTrained` tinyint(4) DEFAULT NULL,
  `userID` int(11) NOT NULL DEFAULT 0,
  `hhID` int(11) NOT NULL DEFAULT 0,
  `nhID` int(11) NOT NULL DEFAULT 0,
  `name` varchar(20) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `species` varchar(10) DEFAULT NULL,
  `age` varchar(6) NOT NULL,
  `parent1` int(11) DEFAULT NULL,
  `parent2` int(11) DEFAULT NULL,
  `intelligence` int(11) NOT NULL DEFAULT 1,
  `activeness` int(11) NOT NULL DEFAULT 1,
  `friendliness` int(11) NOT NULL DEFAULT 1,
  `aggression` int(11) NOT NULL DEFAULT 1,
  `cleanliness` int(11) NOT NULL DEFAULT 1,
  `starSign` varchar(25) DEFAULT NULL,
  `lifeState` varchar(10) NOT NULL DEFAULT 'Alive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `origin`, `generation`, `careerTrack`, `jobLevel`, `learnedSit`, `learnedStay`, `learnedCome`, `learnedRoll`, `learnedSpeak`, `learnedShake`, `learnedDead`, `toiletTrained`, `userID`, `hhID`, `nhID`, `name`, `gender`, `species`, `age`, `parent1`, `parent2`, `intelligence`, `activeness`, `friendliness`, `aggression`, `cleanliness`, `starSign`, `lifeState`) VALUES
(2, 'stray', 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 2, 1, 'Clover', 'M', 'Large dog', 'Adult', 0, 0, 1, 2, 3, 1, 2, 'Libra', 'Alive');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

DROP TABLE IF EXISTS `relationships`;
CREATE TABLE IF NOT EXISTS `relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT 0,
  `nhID` int(11) NOT NULL DEFAULT 0,
  `sim1` int(11) DEFAULT NULL,
  `sim2` int(11) DEFAULT NULL,
  `str` int(11) NOT NULL DEFAULT 0,
  `ltr` int(11) NOT NULL DEFAULT 0,
  `relName` varchar(30) DEFAULT NULL,
  `isFamily` tinyint(1) DEFAULT NULL,
  `isEnemy` tinyint(4) DEFAULT NULL,
  `isFriend` tinyint(1) DEFAULT NULL,
  `isBF` tinyint(1) DEFAULT NULL,
  `isCrush` tinyint(1) DEFAULT NULL,
  `isLove` tinyint(1) DEFAULT NULL,
  `isSteady` tinyint(4) DEFAULT NULL,
  `isEngaged` tinyint(1) DEFAULT NULL,
  `isMarried` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id`, `userID`, `nhID`, `sim1`, `sim2`, `str`, `ltr`, `relName`, `isFamily`, `isEnemy`, `isFriend`, `isBF`, `isCrush`, `isLove`, `isSteady`, `isEngaged`, `isMarried`) VALUES
(3, 1, 1, 6, 7, 100, 100, 'Partner', 1, 0, 1, 1, 1, 1, 0, 0, 1),
(4, 1, 1, 3, 11, 98, 98, 'Siblings', 1, 0, 1, 1, 0, 0, 0, 0, 0),
(5, 1, 1, 3, 10, 88, 88, 'Parent-child', 1, 0, 1, 1, 0, 0, 0, 0, 0),
(6, 1, 1, 11, 12, 100, 57, 'Acquaintance', 0, 0, 1, 1, 1, 0, 0, 0, 0);

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
  `novels` int(11) NOT NULL DEFAULT 0,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s2legacy`
--

INSERT INTO `s2legacy` (`id`, `userID`, `hhID`, `cid`, `isRainbow`, `currentGen`, `portraits`, `novels`, `busgens`, `badgecount`, `casfounder`, `adopted`, `other`, `topbilling`, `tree`, `fish`, `juice`, `mementototal`, `vhome`, `vhfounder`, `souvenirs`, `familyhobby`, `fhmax`, `pdhobby`, `alienpreg`, `platgraves`, `elixirs`, `allwants`, `allbugs`, `allhobbies`, `allcareers`, `sheep`, `bunnies`, `spotless`, `started`, `prodigy`, `birthday`, `regrets`, `capitalist`, `league`, `hhorse`, `finish`, `nowhere`, `dressed`, `green`, `diy`, `noble`, `fearless`, `isbi`, `jobs`, `obey`, `behind`, `large`, `patriarchy`, `oneway`, `aspiring`, `extreme`, `love`, `familyvals`, `fitness`, `hypo`, `paranoid`, `ghosts`, `entrepreneur`, `storyteller`, `apocalypse`, `gas`, `cultured`, `turmoil`, `zone`, `oldage`, `cow`, `drown`, `sparky`, `lifts`, `fire`, `flies`, `fright`, `hail`, `illness`, `rallyforth`, `crushed`, `scissors`, `starved`, `sun`, `kaching`, `shrink`, `sw`, `repo`, `dropout`, `visitordeath`, `diva`, `reload`, `aspchange`, `neglect`, `runaway`, `retrieved`, `badvacation`, `familycount`, `wealthcount`, `knowledgecount`, `friendshipcount`, `romancecount`, `pleasurecount`, `cheesecount`, `childrencount`, `grandkidscount`, `earncount`, `opencount`, `skillscount`, `alienscount`, `bestiescount`, `lovescount`, `woohoocount`, `firstdatescount`, `dreamdatescount`, `sarniescount`, `omoney`, `ofriends`, `owants`, `ograves`, `obusiness`, `opets`, `oseasons`, `osets`, `ohandicaps`, `grandtotal`, `legacytotal`, `moneytotal`, `friendstotal`, `wantstotal`, `gravestotal`, `ghoststotal`, `biztotal`, `petstotal`, `seasonstotal`, `bvtotal`, `fttotal`, `setstotal`, `mastertotal`, `handicapstotal`, `overflowtotal`, `penaltiestotal`, `freekaching`) VALUES
(2, 1, 2, 2, 1, 2, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 'nature', 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '19.75', '2.00', '1.00', '4.25', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1.00', '0.50', '1.00', '1.00', '9.00', '0.00', '0.00', 0),
(3, 1, 1, 3, 1, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 26, 0, 0, 0, 'nature', 1, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '13.00', '1.50', '1.00', '3.00', '1.00', '0.00', '0.00', '0.00', '0.00', '1.00', '2.00', '1.50', '2.00', '1.00', '0.00', '-1.00', '-1.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sims`
--

DROP TABLE IF EXISTS `sims`;
CREATE TABLE IF NOT EXISTS `sims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `makeup` varchar(6) DEFAULT NULL,
  `flowers` varchar(6) DEFAULT NULL,
  `cashier` varchar(6) DEFAULT NULL,
  `restocking` varchar(6) DEFAULT NULL,
  `robotics` varchar(6) DEFAULT NULL,
  `sales` varchar(6) DEFAULT NULL,
  `toysbadge` varchar(6) DEFAULT NULL,
  `gardening` varchar(6) DEFAULT NULL,
  `fishing` varchar(6) DEFAULT NULL,
  `sewing` varchar(6) DEFAULT NULL,
  `pottery` varchar(6) DEFAULT NULL,
  `userID` int(11) NOT NULL DEFAULT 0,
  `hhID` int(11) NOT NULL DEFAULT 0,
  `nhID` int(11) NOT NULL DEFAULT 0,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `origin` varchar(10) NOT NULL DEFAULT 'cas',
  `generation` int(11) NOT NULL DEFAULT 0,
  `age` varchar(30) NOT NULL DEFAULT 'Infant',
  `parent1` int(11) DEFAULT NULL,
  `parent2` int(11) DEFAULT NULL,
  `lifeState` varchar(25) NOT NULL DEFAULT 'Alive',
  `aspiration` varchar(30) NOT NULL DEFAULT 'Grow Up',
  `secondAsp` varchar(30) DEFAULT NULL,
  `skintone` varchar(10) DEFAULT NULL,
  `hair` varchar(10) DEFAULT NULL,
  `eyes` varchar(10) DEFAULT NULL,
  `preference` varchar(10) DEFAULT NULL,
  `turnon1` varchar(30) DEFAULT NULL,
  `turnon2` varchar(30) DEFAULT NULL,
  `turnoff` varchar(30) DEFAULT NULL,
  `LTW` varchar(50) DEFAULT NULL,
  `ltwctr` int(11) NOT NULL DEFAULT 0,
  `ltwDone` tinyint(4) NOT NULL DEFAULT 0,
  `starSign` varchar(30) DEFAULT NULL,
  `neatPoints` int(11) NOT NULL DEFAULT 0,
  `outgoingPoints` int(11) NOT NULL DEFAULT 0,
  `activePoints` int(11) NOT NULL DEFAULT 0,
  `playfulPoints` int(11) NOT NULL DEFAULT 0,
  `nicePoints` int(11) NOT NULL DEFAULT 0,
  `isAlien` tinyint(1) DEFAULT NULL,
  `isZombie` tinyint(1) DEFAULT NULL,
  `isVampire` tinyint(1) DEFAULT NULL,
  `isServo` tinyint(1) DEFAULT NULL,
  `isWerewolf` tinyint(1) DEFAULT NULL,
  `isPlantSim` tinyint(1) DEFAULT NULL,
  `isWitch` tinyint(1) DEFAULT NULL,
  `death` varchar(30) DEFAULT NULL,
  `walking` tinyint(1) DEFAULT NULL,
  `talking` tinyint(1) DEFAULT NULL,
  `housebroken` tinyint(1) DEFAULT NULL,
  `rhyme` tinyint(4) NOT NULL DEFAULT 0,
  `cooking` int(11) NOT NULL DEFAULT 0,
  `mechanical` int(11) NOT NULL DEFAULT 0,
  `charisma` int(11) NOT NULL DEFAULT 0,
  `body` int(11) NOT NULL DEFAULT 0,
  `logic` int(11) NOT NULL DEFAULT 0,
  `creativity` int(11) NOT NULL DEFAULT 0,
  `cleaning` int(11) NOT NULL DEFAULT 0,
  `environment` int(11) NOT NULL DEFAULT 0,
  `weather` int(11) NOT NULL DEFAULT 0,
  `money` int(11) NOT NULL DEFAULT 0,
  `paranormal` int(11) NOT NULL DEFAULT 0,
  `fashion` int(11) NOT NULL DEFAULT 0,
  `crime` int(11) NOT NULL DEFAULT 0,
  `entertainment` int(11) NOT NULL DEFAULT 0,
  `work` int(11) NOT NULL DEFAULT 0,
  `toys` int(11) NOT NULL DEFAULT 0,
  `food` int(11) NOT NULL DEFAULT 0,
  `culture` int(11) NOT NULL DEFAULT 0,
  `politics` int(11) NOT NULL DEFAULT 0,
  `health` int(11) NOT NULL DEFAULT 0,
  `travel` int(11) NOT NULL DEFAULT 0,
  `sports` int(11) NOT NULL DEFAULT 0,
  `animals` int(11) NOT NULL DEFAULT 0,
  `school` int(11) NOT NULL DEFAULT 0,
  `scifi` int(11) NOT NULL DEFAULT 0,
  `schoolType` varchar(10) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `careerTrack` int(11) DEFAULT 0,
  `jobLevel` int(11) NOT NULL DEFAULT 0,
  `earnedAthletics` tinyint(4) DEFAULT NULL,
  `earnedCharisma` tinyint(4) DEFAULT NULL,
  `earnedHygienics` tinyint(4) DEFAULT NULL,
  `earnedCulinary` tinyint(4) DEFAULT NULL,
  `earnedGenius` tinyint(4) DEFAULT NULL,
  `earnedEngineering` tinyint(4) DEFAULT NULL,
  `earnedArts` tinyint(4) DEFAULT NULL,
  `earnedYEA` tinyint(4) DEFAULT NULL,
  `earnedScholar` tinyint(4) DEFAULT NULL,
  `earnedBilliards` tinyint(4) DEFAULT NULL,
  `earnedFootwork` tinyint(4) DEFAULT NULL,
  `earnedUndead` tinyint(4) DEFAULT NULL,
  `earnedOrphan` tinyint(4) DEFAULT NULL,
  `earnedET` tinyint(4) DEFAULT NULL,
  `major` int(11) DEFAULT 0,
  `term` int(11) NOT NULL DEFAULT 1,
  `class` int(11) NOT NULL DEFAULT 1,
  `studyStatus` int(11) DEFAULT NULL,
  `cash1` tinyint(4) DEFAULT NULL,
  `cash2` tinyint(4) DEFAULT NULL,
  `cash3` tinyint(4) DEFAULT NULL,
  `cash4` tinyint(4) DEFAULT NULL,
  `cash5` tinyint(4) DEFAULT NULL,
  `wholesale1` tinyint(4) DEFAULT NULL,
  `wholesale2` tinyint(4) DEFAULT NULL,
  `wholesale3` tinyint(4) DEFAULT NULL,
  `wholesale4` tinyint(4) DEFAULT NULL,
  `wholesale5` tinyint(4) DEFAULT NULL,
  `perception1` tinyint(4) DEFAULT NULL,
  `perception2` tinyint(4) DEFAULT NULL,
  `perception3` tinyint(4) DEFAULT NULL,
  `perception4` tinyint(4) DEFAULT NULL,
  `perception5` tinyint(4) DEFAULT NULL,
  `motivation1` tinyint(4) DEFAULT NULL,
  `motivation2` tinyint(4) DEFAULT NULL,
  `motivation3` tinyint(4) DEFAULT NULL,
  `motivation4` tinyint(4) DEFAULT NULL,
  `motivation5` tinyint(4) DEFAULT NULL,
  `connections1` tinyint(4) DEFAULT NULL,
  `connections2` tinyint(4) DEFAULT NULL,
  `connections3` tinyint(4) DEFAULT NULL,
  `connections4` tinyint(4) DEFAULT NULL,
  `connections5` tinyint(4) DEFAULT NULL,
  `goodHols` tinyint(4) DEFAULT NULL,
  `goodHols3` tinyint(4) DEFAULT NULL,
  `goodHols5` tinyint(4) DEFAULT NULL,
  `tour` tinyint(4) DEFAULT NULL,
  `tours5` tinyint(4) DEFAULT NULL,
  `allTours` tinyint(4) DEFAULT NULL,
  `allGestures` tinyint(4) DEFAULT NULL,
  `roomService` tinyint(4) DEFAULT NULL,
  `photoAlbum` tinyint(4) DEFAULT NULL,
  `secretMap` tinyint(4) DEFAULT NULL,
  `secretLot` tinyint(4) DEFAULT NULL,
  `secretLotAll` tinyint(4) DEFAULT NULL,
  `mountainHols` tinyint(4) DEFAULT NULL,
  `flapjacks` tinyint(4) DEFAULT NULL,
  `chestPound` tinyint(4) DEFAULT NULL,
  `slapDance` tinyint(4) DEFAULT NULL,
  `dtMassage` tinyint(4) DEFAULT NULL,
  `tent` tinyint(4) DEFAULT NULL,
  `logRoll` tinyint(4) DEFAULT NULL,
  `axes` tinyint(4) DEFAULT NULL,
  `treeRing` tinyint(4) DEFAULT NULL,
  `bigfoot` tinyint(4) DEFAULT NULL,
  `islandHols` tinyint(4) DEFAULT NULL,
  `pineapple` tinyint(4) DEFAULT NULL,
  `hangLoose` tinyint(4) DEFAULT NULL,
  `hulaDance` tinyint(4) DEFAULT NULL,
  `fireDance` tinyint(4) DEFAULT NULL,
  `hsMassage` tinyint(4) DEFAULT NULL,
  `monkeyOffering` tinyint(4) DEFAULT NULL,
  `playPirate` tinyint(4) DEFAULT NULL,
  `seaChantey` tinyint(4) DEFAULT NULL,
  `beachTreasure` tinyint(4) DEFAULT NULL,
  `treasureChest` tinyint(4) DEFAULT NULL,
  `mrMickles` tinyint(4) DEFAULT NULL,
  `easternHols` tinyint(4) DEFAULT NULL,
  `chirashi` tinyint(4) DEFAULT NULL,
  `bow` tinyint(4) DEFAULT NULL,
  `taiChi` tinyint(4) DEFAULT NULL,
  `apMassage` tinyint(4) DEFAULT NULL,
  `drankTea` tinyint(4) DEFAULT NULL,
  `zen` tinyint(4) DEFAULT NULL,
  `mahjong` tinyint(4) DEFAULT NULL,
  `shrine` tinyint(4) DEFAULT NULL,
  `teleport` tinyint(4) DEFAULT NULL,
  `dragon` tinyint(4) DEFAULT NULL,
  `cuisine` int(11) NOT NULL DEFAULT 0,
  `film` int(11) NOT NULL DEFAULT 0,
  `tinkering` int(11) NOT NULL DEFAULT 0,
  `sport` int(11) NOT NULL DEFAULT 0,
  `music` int(11) NOT NULL DEFAULT 0,
  `fitness` int(11) NOT NULL DEFAULT 0,
  `arts` int(11) NOT NULL DEFAULT 0,
  `science` int(11) NOT NULL DEFAULT 0,
  `games` int(11) NOT NULL DEFAULT 0,
  `nature` int(11) NOT NULL DEFAULT 0,
  `pdHobby` varchar(25) DEFAULT NULL,
  `artsplq` tinyint(1) DEFAULT NULL,
  `filmplq` tinyint(1) DEFAULT NULL,
  `fitplq` tinyint(1) DEFAULT NULL,
  `cusplaq` tinyint(1) DEFAULT NULL,
  `gamesplq` tinyint(1) DEFAULT NULL,
  `musicplq` tinyint(1) DEFAULT NULL,
  `natplq` tinyint(1) DEFAULT NULL,
  `sciplq` tinyint(1) DEFAULT NULL,
  `sportplq` tinyint(1) DEFAULT NULL,
  `tinkplq` tinyint(1) DEFAULT NULL,
  `dpBeetle` tinyint(4) DEFAULT NULL,
  `pBeetle` tinyint(4) DEFAULT NULL,
  `cpBeetle` tinyint(4) DEFAULT NULL,
  `gmBeetle` tinyint(4) DEFAULT NULL,
  `jBeetle` tinyint(4) DEFAULT NULL,
  `prBeetle` tinyint(4) DEFAULT NULL,
  `thgBeetle` tinyint(4) DEFAULT NULL,
  `rBeetle` tinyint(4) DEFAULT NULL,
  `mlBeetle` tinyint(4) DEFAULT NULL,
  `gbBeetle` tinyint(4) DEFAULT NULL,
  `jButterfly` tinyint(4) DEFAULT NULL,
  `pbButterfly` tinyint(4) DEFAULT NULL,
  `eButterfly` tinyint(4) DEFAULT NULL,
  `bfwButterfly` tinyint(4) DEFAULT NULL,
  `mgButterfly` tinyint(4) DEFAULT NULL,
  `mButterfly` tinyint(4) DEFAULT NULL,
  `vButterfly` tinyint(4) DEFAULT NULL,
  `pButterfly` tinyint(4) DEFAULT NULL,
  `cpButterfly` tinyint(4) DEFAULT NULL,
  `sButterfly` tinyint(4) DEFAULT NULL,
  `ssSpider` tinyint(4) DEFAULT NULL,
  `gwSpider` tinyint(4) DEFAULT NULL,
  `pSpider` tinyint(4) DEFAULT NULL,
  `mSpider` tinyint(4) DEFAULT NULL,
  `ibSpider` tinyint(4) DEFAULT NULL,
  `hdSpider` tinyint(4) DEFAULT NULL,
  `qcSpider` tinyint(4) DEFAULT NULL,
  `hpSpider` tinyint(4) DEFAULT NULL,
  `sfbSpider` tinyint(4) DEFAULT NULL,
  `tbSpider` tinyint(4) DEFAULT NULL,
  `learnedFire` tinyint(4) DEFAULT NULL,
  `learnedAnger` tinyint(4) DEFAULT NULL,
  `learnedHappiness` tinyint(4) DEFAULT NULL,
  `learnedPhysio` tinyint(4) DEFAULT NULL,
  `learnedCounseling` tinyint(4) DEFAULT NULL,
  `learnedParenting` tinyint(4) NOT NULL DEFAULT 0,
  `reputation` int(11) NOT NULL DEFAULT 0,
  `alignment` int(11) NOT NULL DEFAULT 0,
  `magicLevel` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_simhh` (`hhID`),
  KEY `fk_simuser` (`userID`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sims`
--

INSERT INTO `sims` (`id`, `makeup`, `flowers`, `cashier`, `restocking`, `robotics`, `sales`, `toysbadge`, `gardening`, `fishing`, `sewing`, `pottery`, `userID`, `hhID`, `nhID`, `firstName`, `lastName`, `gender`, `origin`, `generation`, `age`, `parent1`, `parent2`, `lifeState`, `aspiration`, `secondAsp`, `skintone`, `hair`, `eyes`, `preference`, `turnon1`, `turnon2`, `turnoff`, `LTW`, `ltwctr`, `ltwDone`, `starSign`, `neatPoints`, `outgoingPoints`, `activePoints`, `playfulPoints`, `nicePoints`, `isAlien`, `isZombie`, `isVampire`, `isServo`, `isWerewolf`, `isPlantSim`, `isWitch`, `death`, `walking`, `talking`, `housebroken`, `rhyme`, `cooking`, `mechanical`, `charisma`, `body`, `logic`, `creativity`, `cleaning`, `environment`, `weather`, `money`, `paranormal`, `fashion`, `crime`, `entertainment`, `work`, `toys`, `food`, `culture`, `politics`, `health`, `travel`, `sports`, `animals`, `school`, `scifi`, `schoolType`, `grade`, `careerTrack`, `jobLevel`, `earnedAthletics`, `earnedCharisma`, `earnedHygienics`, `earnedCulinary`, `earnedGenius`, `earnedEngineering`, `earnedArts`, `earnedYEA`, `earnedScholar`, `earnedBilliards`, `earnedFootwork`, `earnedUndead`, `earnedOrphan`, `earnedET`, `major`, `term`, `class`, `studyStatus`, `cash1`, `cash2`, `cash3`, `cash4`, `cash5`, `wholesale1`, `wholesale2`, `wholesale3`, `wholesale4`, `wholesale5`, `perception1`, `perception2`, `perception3`, `perception4`, `perception5`, `motivation1`, `motivation2`, `motivation3`, `motivation4`, `motivation5`, `connections1`, `connections2`, `connections3`, `connections4`, `connections5`, `goodHols`, `goodHols3`, `goodHols5`, `tour`, `tours5`, `allTours`, `allGestures`, `roomService`, `photoAlbum`, `secretMap`, `secretLot`, `secretLotAll`, `mountainHols`, `flapjacks`, `chestPound`, `slapDance`, `dtMassage`, `tent`, `logRoll`, `axes`, `treeRing`, `bigfoot`, `islandHols`, `pineapple`, `hangLoose`, `hulaDance`, `fireDance`, `hsMassage`, `monkeyOffering`, `playPirate`, `seaChantey`, `beachTreasure`, `treasureChest`, `mrMickles`, `easternHols`, `chirashi`, `bow`, `taiChi`, `apMassage`, `drankTea`, `zen`, `mahjong`, `shrine`, `teleport`, `dragon`, `cuisine`, `film`, `tinkering`, `sport`, `music`, `fitness`, `arts`, `science`, `games`, `nature`, `pdHobby`, `artsplq`, `filmplq`, `fitplq`, `cusplaq`, `gamesplq`, `musicplq`, `natplq`, `sciplq`, `sportplq`, `tinkplq`, `dpBeetle`, `pBeetle`, `cpBeetle`, `gmBeetle`, `jBeetle`, `prBeetle`, `thgBeetle`, `rBeetle`, `mlBeetle`, `gbBeetle`, `jButterfly`, `pbButterfly`, `eButterfly`, `bfwButterfly`, `mgButterfly`, `mButterfly`, `vButterfly`, `pButterfly`, `cpButterfly`, `sButterfly`, `ssSpider`, `gwSpider`, `pSpider`, `mSpider`, `ibSpider`, `hdSpider`, `qcSpider`, `hpSpider`, `sfbSpider`, `tbSpider`, `learnedFire`, `learnedAnger`, `learnedHappiness`, `learnedPhysio`, `learnedCounseling`, `learnedParenting`, `reputation`, `alignment`, `magicLevel`) VALUES
(3, '', '', '', '', '', '', '', 'gold', 'silver', '', '', 1, 1, 1, 'Ginger', 'Aurora', 'M', 'big', 2, 'Adult', 10, 9998, 'Alive', 'Knowledge', 'Family', 'Alien', 'Black', 'Alien', 'Males', 'Glasses', 'Good Cook', 'Formal wear', 'Become Celebrity Chef', 0, 1, 'Capricorn', 10, 2, 6, 10, 7, 1, 0, 0, 0, 0, 1, 0, '', 1, 1, 1, 0, 10, 10, 10, 10, 10, 10, 10, 8, 9, 2, 0, 9, 4, 9, 7, 5, 10, 10, 0, 2, 4, 0, 7, 4, 9, 'public', 'A+', 4, 10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 4, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 0, 0, 0, 3, 0, 0, 0, 9, 4, 'games', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 37, 3, 0),
(4, '', '', '', '', '', '', '', '', '', '', '', 1, 2, 1, 'Hunter', 'Garland', 'M', 'cas', 1, 'Elder', 0, 0, 'Deceased', 'Knowledge', 'Wealth', 'Light', 'Grey', 'Dark Blue', 'Females', 'Blond hair', 'Red hair', 'Stink', 'Become Media Magnate', 0, 0, 'Cancer', 7, 4, 5, 5, 0, 1, 0, 0, 0, 0, 0, 0, 'Old Age', 0, 0, 0, 0, 10, 9, 10, 0, 6, 10, 7, 10, 10, 8, 0, 6, 2, 7, 6, 8, 9, 10, 0, 5, 0, 3, 0, 3, 4, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'tinkering', 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '', '', '', '', '', '', '', '', 'gold', '', '', 1, 2, 1, 'Sapphire', 'Garland', 'F', 'big', 2, 'Adult', 4, 9998, 'Alive', 'Knowledge', 'Wealth', 'Alien', 'Black', 'Alien', 'Males', 'Red hair', 'Brown hair', 'Logical', 'Become Mad Scientist', 0, 0, 'Sagittarius', 8, 0, 10, 10, 0, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 7, 5, 3, 10, 8, 6, 6, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '', '', 'silver', '', '', '', '', '', '', '', '', 1, 2, 1, 'Sky', 'Garland', 'M', 'big', 2, 'Adult', 4, 9998, 'Alive', 'Pleasure', 'Knowledge', 'Alien', 'Black', 'Alien', 'Females', 'Makeup', 'Red hair', 'Swimwear', 'Become Education Minister', 0, 0, 'Libra', 6, 10, 5, 4, 10, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 8, 8, 10, 10, 10, 10, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 'Michelle', 'Garland', 'F', 'townie', 0, 'Adult', NULL, NULL, 'Alive', 'Popularity', 'Knowledge', 'Mid', 'Black', 'Brown', 'Males', 'Red hair', 'Black hair', 'Cologne', NULL, 0, 0, 'Gemini', 4, 7, 7, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 3, 2, 5, 4, 1, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(8, '', '', '', '', '', '', '', '', '', '', '', 1, 2, 1, 'Violet', 'Brink', 'F', 'big', 3, 'Teen', 7, 6, 'Alive', 'Pleasure', 'Grilled Cheese', 'Mid', 'Black', 'Alien', '', '', '', '', '', 0, 0, 'Libra', 0, 10, 5, 10, 10, 0, 0, 0, 0, 0, 0, 0, '', 1, 1, 1, 0, 0, 0, 7, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'public', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 3, 'nature', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '', '', '', '', '', '', '', '', '', '', '', 1, 2, 1, 'Tyrian', 'Garland', 'M', 'big', 3, 'Toddler', 7, 6, 'Alive', 'Grow Up', NULL, 'Light', 'Black', 'Alien', '', '', '', '', '', 0, 0, 'Pisces', 6, 3, 5, 4, 10, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '', '', '', '', '', '', '', 'gold', 'silver', '', '', 1, 1, 1, 'Crimson', 'Aurora', 'M', 'cas', 1, 'Elder', 0, 0, 'Alive', 'Knowledge', 'Popularity', 'Dark', 'Red', 'Green', 'Males', '', '', '', '', 0, 0, 'Aquarius', 4, 4, 4, 7, 6, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 3, 4, 10, 1, 2, 8, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 3, 0, 0, 10, 'nature', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '', '', '', '', '', '', '', 'bronze', '', '', '', 1, 1, 1, 'Amber', 'Aurora', 'F', 'big', 2, 'Adult', 10, 9998, 'Alive', 'Family', 'Knowledge', 'Alien', 'Black', 'Alien', '', 'Custom hair', 'Charismatic', 'Works Hard', 'Have 6 Grandchildren', 0, 0, 'Gemini', 4, 10, 10, 1, 10, 1, 0, 0, 0, 0, 0, 0, '', 1, 1, 1, 0, 9, 10, 10, 10, 10, 10, 10, 9, 8, 6, 6, 8, 0, 10, 8, 1, 8, 10, 2, 0, 1, 3, 10, 4, 8, NULL, '', 11, 8, 1, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 6, 4, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 4, 0, 2, 1, 3, 9, 'fitness', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(12, '', '', '', '', '', '', '', '', '', 'silver', '', 1, 1, 1, 'Alon', 'Rissanen', 'M', 'townie', 0, 'Adult', 0, 0, 'Alive', 'Knowledge', '', 'Tan', 'Red', 'Brown', '', '', '', '', 'Become World Class Ballet Dancer', 0, 0, 'Pisces', 5, 3, 7, 3, 7, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 1, 2, 4, 10, 7, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', 22, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 4, 2, 2, 1, 2, 2, 1, 0, 'tinkering', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0),
(13, '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 'Mustard', 'Aurora', 'M', 'big', 3, 'Child', 11, 12, 'Alive', 'Grow Up', NULL, 'Dark', 'Black', 'Brown', '', '', '', '', '', 0, 0, 'Pisces', 5, 7, 7, 6, 10, 0, 0, 0, 0, 0, 0, 0, '', 1, 1, 1, 0, 0, 6, 4, 0, 2, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 'tinkering', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 'Primrose', 'Aurora', 'F', 'big', 3, 'Adult', 3, 9999, 'Alive', 'Pleasure', '', '', 'Black', '', 'Males', '', '', '', 'Become Game Designer', 0, 0, 'Aquarius', 10, 2, 6, 10, 7, 0, 0, 0, 0, 0, 1, 0, '', 1, 1, 1, 1, 10, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', 16, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 'Canary', 'Aurora', 'F', 'big', 3, 'Toddler', 11, 12, 'Alive', 'Grow Up', NULL, 'Alien', 'Red', 'Brown', '', '', '', '', '', 0, 0, 'Pisces', 8, 3, 10, 3, 10, 0, 0, 0, 0, 0, 0, 0, '', 1, 0, 1, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'tinkering', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `usercolour`
--

DROP TABLE IF EXISTS `usercolour`;
CREATE TABLE IF NOT EXISTS `usercolour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `challengeID` int(11) NOT NULL,
  `generation` int(11) NOT NULL,
  `colour` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercolour`
--

INSERT INTO `usercolour` (`id`, `userID`, `challengeID`, `generation`, `colour`) VALUES
(1, 1, 2, 1, 'Green'),
(2, 1, 2, 2, 'Blue'),
(3, 1, 2, 3, 'Purple'),
(4, 1, 2, 4, 'Pink'),
(6, 1, 2, 6, 'Brown'),
(7, 1, 2, 7, 'Orange'),
(8, 1, 2, 8, 'Yellow'),
(9, 1, 2, 9, 'Black'),
(10, 1, 2, 10, 'White'),
(11, 1, 3, 1, 'Red'),
(12, 1, 3, 2, 'Orange'),
(15, 1, 2, 5, 'Red'),
(16, 1, 3, 3, 'Yellow'),
(17, 1, 3, 4, 'Lime'),
(18, 1, 3, 5, 'Green'),
(19, 1, 3, 6, 'Turquoise'),
(20, 1, 3, 7, 'Blue'),
(21, 1, 3, 9, 'Black'),
(22, 1, 3, 8, 'Purple'),
(23, 1, 3, 10, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(100) DEFAULT 'https://placekitten.com/512/512',
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$qZjGwIDYaLBIlUzzvK78Xu2iQEzhPJ9PXoZCkpa.I73BP0cv/xr9G',
  `role` varchar(25) NOT NULL DEFAULT 'Member',
  `groupId` int(11) NOT NULL DEFAULT 1,
  `sims2` tinyint(4) DEFAULT NULL,
  `sims3` tinyint(4) DEFAULT NULL,
  `sims4` tinyint(4) DEFAULT NULL,
  `uni` tinyint(4) DEFAULT NULL,
  `nl` tinyint(4) DEFAULT NULL,
  `ofb` tinyint(4) DEFAULT NULL,
  `pets` tinyint(4) DEFAULT NULL,
  `sns` tinyint(4) DEFAULT NULL,
  `bv` tinyint(4) DEFAULT NULL,
  `ft` tinyint(4) DEFAULT NULL,
  `al` tinyint(4) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastLogin` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `password`, `role`, `groupId`, `sims2`, `sims3`, `sims4`, `uni`, `nl`, `ofb`, `pets`, `sns`, `bv`, `ft`, `al`, `created`, `lastLogin`) VALUES
(1, 'https://placekitten.com/512/512', 'Sam', 'samgoacher79@gmail.com', '$2y$10$8wzIvUscQefcgvmnO5PpEebAamOq/x/T6GFog66V.Gw3kL18xj5T6', 'Admin', 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, '2018-10-30 06:41:56', '2020-04-19 18:28:16'),
(2, 'https://placekitten.com/512/512', 'Hernandez', 'plinio.sanchez@elchamuco.org', '$2y$10$v.j6z6pCQki/XobkzCVZoO8VdV7vn5GwiwLIIsViaEfxW6iBakAqS', 'Member', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-24 00:49:33', '2019-05-24 05:41:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
