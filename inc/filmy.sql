-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2020 at 08:52 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmy`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_cover_poster`
--

DROP TABLE IF EXISTS `movie_cover_poster`;
CREATE TABLE IF NOT EXISTS `movie_cover_poster` (
  `movie_id` int(11) NOT NULL,
  `movie_cover` tinyint(1) NOT NULL DEFAULT '0',
  `movie_cover_name` varchar(100) DEFAULT NULL,
  `movie_poster` tinyint(1) NOT NULL DEFAULT '0',
  `movie_poster_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_cover_poster`
--

INSERT INTO `movie_cover_poster` (`movie_id`, `movie_cover`, `movie_cover_name`, `movie_poster`, `movie_poster_name`) VALUES
(0, 1, '', 1, ''),
(10, 1, '', 1, ''),
(11, 1, '', 1, ''),
(21, 1, 'vd2.jpg', 0, NULL),
(22, 1, 'vd2.jpg', 1, 'pop5.jpg'),
(23, 0, NULL, 1, 'pop6.jpg'),
(24, 0, NULL, 1, 'cover2.jpg'),
(25, 1, 'scoob!ps.jpg', 1, 'scoob!.jpg'),
(26, 1, 'jokercs.jpg', 1, 'pop2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_details`
--

DROP TABLE IF EXISTS `movie_details`;
CREATE TABLE IF NOT EXISTS `movie_details` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `release_date` date DEFAULT NULL,
  `director_name` varchar(200) DEFAULT NULL,
  `imdb_ratings` varchar(11) DEFAULT NULL,
  `movie_country` varchar(100) DEFAULT NULL,
  `movie_language` varchar(100) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `production_cost` varchar(255) DEFAULT NULL,
  `trailer_url` varchar(2000) DEFAULT NULL,
  `720b` varchar(200) DEFAULT NULL,
  `1080b` varchar(200) DEFAULT NULL,
  `2160b` varchar(200) DEFAULT NULL,
  `720w` varchar(200) DEFAULT NULL,
  `1080w` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_details`
--

INSERT INTO `movie_details` (`movie_id`, `movie_name`, `release_date`, `director_name`, `imdb_ratings`, `movie_country`, `movie_language`, `genre`, `production_cost`, `trailer_url`, `720b`, `1080b`, `2160b`, `720w`, `1080w`) VALUES
(1, 'sad', '2020-06-19', '', '', '', '', 'biography', '', '', '', '', '', '', ''),
(2, 'sad', '2020-06-19', '', '', '', '', 'biography', '', '', '', '', '', '', ''),
(3, 'sad', '2020-06-19', '', '', '', '', 'biography', '', '', '', '', '', '', ''),
(4, 'sad', '2020-06-16', '', '', '', '', 'comedy', '', '', '', '', '', '', ''),
(5, 'sad', '2020-06-16', '', '', '', '', 'comedy', '', '', '', '', '', '', ''),
(6, 'sad', '2020-06-19', '', '', '', '', 'biography,crime', '', '', '', '', '', '', ''),
(7, 'sad', '2020-07-08', 'Osada', '7.6', 'Sri Lanka', 'Sinhala', 'adventure,drama', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '', ''),
(8, 'sad', '2020-07-08', 'Osada', '7.6', 'Sri Lanka', 'Sinhala', 'adventure,drama', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '', ''),
(9, 'sad', '2020-07-08', 'Osada', '7.6', 'Sri Lanka', 'Sinhala', 'comedy,drama', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '', ''),
(10, 'sad', '2020-07-08', 'Osada', '7.6', 'Sri Lanka', 'Sinhala', 'animation,documentary', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '', ''),
(11, 'sad', '2020-07-08', 'Osada', '7.6', 'Sri Lanka', 'Sinhala', 'animation,documentary', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '', ''),
(12, 'sad', '2020-04-13', '', '', '', '', 'adventure,biography', '', '', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php'),
(13, 'sad', '2020-04-13', '', '', '', '', 'adventure,biography', '', '', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php'),
(14, 'sad', '2020-06-01', 'Osada', '10', 'Sri Lanka', 'Sinhala', 'animation', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', ''),
(21, 'Moana', '2017-06-14', 'The Rock', '8.5', 'USA', 'English', 'adventure,family', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php'),
(22, 'Moana 1', '2020-06-22', 'The Rock', '8.5', 'USA', 'English', 'animation,family', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php', 'http://localhost/php/filmy/admin/admin-add.php'),
(23, 'Spider Man', '2020-06-20', 'Osada Manohara', '6.5', 'USA', 'English', 'animation,family', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '', ''),
(24, 'Wonder Momen', '2020-06-10', 'Osada', '8.9', 'USA', 'English', 'adventure,comedy', 'One Beleon', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '', ''),
(25, 'Scoob!', '2019-12-30', 'Shagei di alemd', '7.5', 'USA', 'English', 'adventure,animation,family', 'One Beleon', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vf1aW1z437I\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '', '', '', ''),
(26, 'Joker', '2019-12-10', 'Jonathan', '8.1', 'USA', 'English', 'crime,drama', 'DC universe', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-_DJEzZk2pc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'http://localhost/php/filmy/admin/admin-add.php', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `story_line`
--

DROP TABLE IF EXISTS `story_line`;
CREATE TABLE IF NOT EXISTS `story_line` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(100) NOT NULL,
  `story_line` varchar(5000) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story_line`
--

INSERT INTO `story_line` (`movie_id`, `movie_name`, `story_line`) VALUES
(17, '', '<p>asdasdasd as<strong>dasd<em>asdasasd</em>asd<s>sadas<em>das</em>dsa<em>dsa</em>dasdasda sa dsad asdasdasdsad</s>sadasdasd asdas<em>dasdasdsadasdsa</em></strong></p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 155px; top: -4.8px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n'),
(18, '', '<p>asdasdasd as<strong>dasd<em>asdasasd</em>asd<s>sadas<em>das</em>dsa<em>dsa</em>dasdasda sa dsad asdasdasdsad</s>sadasdasd asdas<em>dasdasdsadasdsa</em></strong></p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 155px; top: -4.8px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n'),
(21, 'Moana', '<p>This Story About HAWAi And asdasdfasfasf Fsaf d</p>\r\n'),
(22, 'Moana', '<p><strong>This Story About HAWAi And asdasdfasfasf Fssad</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(23, 'Spider Man', '<p>Spide Man Is ahdadasdasdasd sad</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati officiis ipsum tempore placeat laudantium, inventore nam, delectus saepe, fuga voluptates voluptate ducimus recusandae,</p>\r\n'),
(24, 'Wonder Momen', ''),
(25, 'Scoob!', '<h3>Sdasdasd asd sad sa dsad sadasd</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, autem illo eaque commodi magni porro totam sapiente ipsa natus nisi. Magnam sint praesentium atque, eaque nam consequatur aliquam harum magni!</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(26, 'Joker', '<p><strong>Joker</strong>&nbsp;is a 2019 American psychological thriller film directed and produced by Todd Phillips, who co-wrote the screenplay with Scott Silver. The film, based on DC Comics characters, stars Joaquin Phoenix as the&nbsp;<em>Joker</em>&nbsp;and provides a possible origin story for the character.</p>\r\n\r\n<p>&nbsp;</p>\r\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
