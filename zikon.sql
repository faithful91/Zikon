-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2015 at 09:15 PM
-- Server version: 5.6.22-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zikon`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `cover` varchar(45) NOT NULL,
  `dateSortie` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `nom`, `cover`, `dateSortie`) VALUES
(1, 'The new Classic', './image/albums/The_new_Classic.jpg', '2014-04-14'),
(2, 'My Everything', './image/albums/My_Everything.jpg', '2014-08-22'),
(3, 'In the Lonely Hour', './image/albums/In_the_Lonely_Hour.jpg', '2014-05-26'),
(4, 'V', './image/albums/V.jpg', '2014-09-01'),
(5, 'Only 17', './image/albums/Only_17.jpg', '2011-09-14'),
(6, '+', './image/albums/+.jpg', '2011-09-09'),
(7, 'Motion', './image/albums/Motion.jpg', '2014-10-31'),
(8, 'Talk Dirty', './image/albums/Talk_Dirty.jpg', '2014-04-15'),
(9, 'Speak Now', './image/albums/Speak_Now.jpg', '2010-10-25'),
(10, '1000 Forms of Fear', './image/albums/1000_Forms_of_Fear.jpg', '2014-07-04'),
(11, 'The PinkPrint', './image/albums/The_PinkPrint.jpg', '2010-11-19'),
(12, 'Trouble Man: Heavy Is the Head', './image/albums/Trouble_Man.jpg', '2012-12-18'),
(13, 'Waking Up', './image/albums/Waking_Up.jpg', '2015-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `artistes`
--

CREATE TABLE IF NOT EXISTS `artistes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `photo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `artistes`
--

INSERT INTO `artistes` (`id`, `nom`, `photo`) VALUES
(1, 'Iggy Azalea', './image/artistes/Iggy_Azalea.jpg'),
(2, 'Ariana Grande', './image/artistes/Ariana_Grande.jpg'),
(3, 'Sam Smith', './image/artistes/Sam_Smith.jpg'),
(4, 'Maroon 5', './image/artistes/Maroon_5.jpg'),
(5, 'Meghan Trainor', './image/artistes/Meghan_Trainor.jpg'),
(6, 'Ed Sheeran', './image/artistes/Ed_Sheeran.jpg'),
(7, 'Taylor Swift', './image/artistes/Taylor_Swift.jpg'),
(8, 'Jason Derulo', './image/artistes/Jason_Derulo.jpg'),
(9, 'Calvin Harris', './image/artistes/Calvin_Harris.jpg'),
(10, 'Florida Georgia Line', './image/artistes/Florida_Georgia_Line.jpg'),
(11, 'Sia', './image/artistes/Sia.jpg'),
(12, 'Nicki Minaj', './image/artistes/Nicki_Minaj.jpg'),
(13, 'Calvin Harris', './image/artistes/Calvin_Harris.jpg'),
(14, 'Tove Lo', './image/artistes/Tove_Lo.jpg'),
(15, 'OneRepublic', './image/artistes/OneRepublic.jpg'),
(16, 'Clean Bandit', './image/artistes/Clean_Bandit.jpg'),
(17, 'Pharrell Williams', './image/artistes/Pharrell_Williams.jpg'),
(18, 'John Legend', './image/artistes/John_Legend.jpg'),
(19, 'T.I.', './image/artistes/T.I.jpg'),
(20, 'Jeremih', './image/artistes/Jeremih.jpg'),
(21, 'Jason Aldean', './image/artistes/Jason Aldean.jpg'),
(22, 'Kenny Chesney', './image/artistes/Kenny Chesney.jpg'),
(23, 'Trey Songz', './image/artistes/Trey_Songz.jpg'),
(24, 'Charli XCX', './image/artistes/Charli_XCX.jpg'),
(25, 'Jessie J', './image/artistes/Jessie_J.jpg'),
(26, '5 Seconds of Summer', './image/artistes/5_Seconds_of_Summer.jpg'),
(27, 'Tinashe', './image/artistes/Tinashe.jpg'),
(28, 'Enrique Iglesias', './image/artistes/Enrique_Iglesias.jpg'),
(29, 'Rae Sremmurd', './image/artistes/Rae_Sremmurd.jpg'),
(30, 'Bobby Shmurda', './image/artistes/Bobby_ Shmurda.jpg'),
(31, 'Luke Bryan', './image/artistes/Luke_Bryan.jpg'),
(32, 'Pitbull', './image/artistes/Pitbull.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artistes_albums`
--

CREATE TABLE IF NOT EXISTS `artistes_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` int(11) NOT NULL,
  `artiste` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_artiste2_idx` (`artiste`),
  KEY `fk_album2_idx` (`album`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `artistes_albums`
--

INSERT INTO `artistes_albums` (`id`, `album`, `artiste`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 9),
(8, 8, 8),
(9, 7, 9),
(10, 10, 11),
(11, 11, 12),
(12, 12, 19),
(13, 13, 15);

-- --------------------------------------------------------

--
-- Table structure for table `artistes_titres`
--

CREATE TABLE IF NOT EXISTS `artistes_titres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artiste` int(11) NOT NULL,
  `titre` int(11) NOT NULL,
  `principal` enum('FALSE','TRUE') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_artiste_idx` (`artiste`),
  KEY `fk_titre_idx` (`titre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `artistes_titres`
--

INSERT INTO `artistes_titres` (`id`, `artiste`, `titre`, `principal`) VALUES
(1, 1, 1, 'TRUE'),
(2, 1, 2, 'TRUE'),
(3, 1, 3, 'TRUE'),
(4, 1, 4, 'TRUE'),
(5, 1, 5, 'TRUE'),
(6, 1, 6, 'TRUE'),
(7, 1, 7, 'TRUE'),
(8, 2, 8, 'TRUE'),
(9, 2, 9, 'TRUE'),
(10, 2, 10, 'TRUE'),
(11, 2, 11, 'TRUE'),
(12, 2, 12, 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `comptesutilisateurs`
--

CREATE TABLE IF NOT EXISTS `comptesutilisateurs` (
  `login` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comptesutilisateurs`
--

INSERT INTO `comptesutilisateurs` (`login`, `password`, `nom`) VALUES
('hazem@gmail.com', 'hazem', 'Hazem'),
('michael@gmail.com', 'michael', 'Michael');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `nom`) VALUES
(1, 'Pop'),
(2, 'Country'),
(3, 'Rock'),
(4, 'Hip-Hop'),
(5, 'R&B'),
(6, 'Electronic'),
(7, 'Latin'),
(8, 'Gospel'),
(9, 'Jazz'),
(10, 'Reggae');

-- --------------------------------------------------------

--
-- Table structure for table `titres`
--

CREATE TABLE IF NOT EXISTS `titres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `album` varchar(45) DEFAULT NULL,
  `path` varchar(45) NOT NULL,
  `genre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_genre_idx` (`genre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `titres`
--

INSERT INTO `titres` (`id`, `nom`, `album`, `path`, `genre`) VALUES
(1, 'Walk the Line', '1', './music/Iggy_Azalea/Walk the Line.mp3', 4),
(2, 'Don''t Need Y''all', '1', './music/Iggy_Azalea/Don''t Need Y''all.mp3', 4),
(3, 'New Bitch', '1', './music/Iggy_Azalea/New Bitch.mp3', 4),
(4, 'Fancy', '1', './music/Iggy_Azalea/Fancy.mp3', 4),
(5, 'Change Your Life', '1', './music/Iggy_Azalea/Change Your Life.mp3', 4),
(6, 'Fuck Love', '1', './music/Iggy_Azalea/Fuck Love.mp3', 4),
(7, 'Work', '1', './music/Iggy_Azalea/Work.mp3', 4),
(8, 'Intro', '2', './music/Ariana_Grande/Intro.mp3', 1),
(9, 'Problem', '2', './music/Ariana_Grande/Problem.mp3', 1),
(10, 'One Last Time', '2', './music/Ariana_Grande/One Last Time.mp3', 1),
(11, 'Why Try', '2', './music/Ariana_Grande/Why Try.mp3', 1),
(12, 'Break Free', '2', './music/Ariana_Grande/Break Free.mp3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `titres_albums`
--

CREATE TABLE IF NOT EXISTS `titres_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_titre_idx` (`titre`),
  KEY `fk_album_idx` (`album`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `titres_albums`
--

INSERT INTO `titres_albums` (`id`, `titre`, `album`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artistes_albums`
--
ALTER TABLE `artistes_albums`
  ADD CONSTRAINT `fk_album2` FOREIGN KEY (`album`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_artiste2` FOREIGN KEY (`artiste`) REFERENCES `artistes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artistes_titres`
--
ALTER TABLE `artistes_titres`
  ADD CONSTRAINT `fk_artiste` FOREIGN KEY (`artiste`) REFERENCES `artistes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_titre` FOREIGN KEY (`titre`) REFERENCES `titres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titres`
--
ALTER TABLE `titres`
  ADD CONSTRAINT `fk_genre` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titres_albums`
--
ALTER TABLE `titres_albums`
  ADD CONSTRAINT `fk_album` FOREIGN KEY (`album`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_titre2` FOREIGN KEY (`titre`) REFERENCES `titres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
