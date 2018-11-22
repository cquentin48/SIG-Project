-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2018 at 03:45 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `geo_arc`
--

DROP TABLE IF EXISTS `geo_arc`;
CREATE TABLE IF NOT EXISTS `geo_arc` (
  `GEO_ARC_ID` int(11) DEFAULT NULL,
  `GEO_ARC_DEB` int(11) DEFAULT NULL,
  `GEO_ARC_FIN` int(11) DEFAULT NULL,
  `GEO_ARC_TEMPS` double DEFAULT NULL,
  `GEO_ARC_DISTANCE` double DEFAULT NULL,
  `GEO_ARC_SENS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geo_arc`
--

INSERT INTO `geo_arc` (`GEO_ARC_ID`, `GEO_ARC_DEB`, `GEO_ARC_FIN`, `GEO_ARC_TEMPS`, `GEO_ARC_DISTANCE`, `GEO_ARC_SENS`) VALUES
(1, 218, 219, 1, 1, 3),
(2, 217, 218, 1, 1, 3),
(3, 216, 217, 1, 1, 3),
(4, 215, 216, 1, 1, 3),
(5, 214, 215, 1, 1, 3),
(6, 213, 214, 1, 1, 3),
(7, 212, 213, 1, 1, 3),
(8, 210, 211, 1, 1, 3),
(9, 209, 210, 1, 1, 3),
(10, 208, 209, 1, 1, 3),
(11, 207, 208, 1, 1, 3),
(12, 206, 207, 1, 1, 3),
(13, 205, 206, 1, 1, 3),
(14, 204, 205, 1, 1, 3),
(15, 203, 204, 1, 1, 3),
(16, 202, 203, 1, 1, 3),
(17, 201, 202, 1, 1, 3),
(18, 200, 201, 1, 1, 3),
(19, 199, 200, 1, 1, 3),
(20, 198, 199, 1, 1, 3),
(21, 197, 198, 1, 1, 3),
(22, 196, 197, 1, 1, 3),
(23, 195, 196, 1, 1, 3),
(24, 194, 195, 1, 1, 3),
(25, 193, 194, 1, 1, 3),
(26, 192, 193, 1, 1, 3),
(27, 191, 192, 1, 1, 3),
(28, 190, 191, 1, 1, 3),
(29, 189, 190, 1, 1, 3),
(30, 188, 189, 1, 1, 3),
(31, 187, 188, 1, 1, 3),
(32, 185, 186, 1, 1, 3),
(33, 184, 185, 1, 1, 3),
(34, 183, 184, 1, 1, 3),
(35, 182, 183, 1, 1, 3),
(36, 181, 182, 1, 1, 3),
(37, 180, 181, 1, 1, 3),
(38, 179, 180, 1, 1, 3),
(39, 178, 179, 1, 1, 3),
(40, 177, 178, 1, 1, 3),
(41, 176, 177, 1, 1, 3),
(42, 175, 176, 1, 1, 3),
(43, 174, 175, 1, 1, 3),
(44, 173, 174, 1, 1, 3),
(45, 172, 173, 1, 1, 3),
(46, 171, 172, 1, 1, 3),
(47, 170, 171, 1, 1, 3),
(48, 169, 170, 1, 1, 3),
(49, 168, 169, 1, 1, 3),
(50, 167, 168, 1, 1, 3),
(51, 166, 167, 1, 1, 3),
(52, 165, 166, 1, 1, 3),
(53, 164, 165, 1, 1, 3),
(54, 163, 164, 1, 1, 3),
(55, 162, 163, 1, 1, 3),
(56, 161, 162, 1, 1, 3),
(57, 160, 161, 1, 1, 3),
(58, 159, 160, 1, 1, 3),
(59, 158, 159, 1, 1, 3),
(60, 157, 158, 1, 1, 3),
(61, 156, 157, 1, 1, 3),
(62, 154, 155, 1, 1, 3),
(63, 153, 154, 1, 1, 3),
(64, 152, 153, 1, 1, 3),
(65, 151, 152, 1, 1, 3),
(66, 150, 151, 1, 1, 3),
(67, 149, 150, 1, 1, 3),
(68, 148, 149, 1, 1, 3),
(69, 147, 148, 1, 1, 3),
(70, 146, 147, 1, 1, 3),
(71, 145, 146, 1, 1, 3),
(72, 144, 145, 1, 1, 3),
(73, 143, 144, 1, 1, 3),
(74, 142, 143, 1, 1, 3),
(75, 141, 142, 1, 1, 3),
(76, 140, 141, 1, 1, 3),
(77, 139, 140, 1, 1, 3),
(78, 138, 139, 1, 1, 3),
(79, 137, 138, 1, 1, 3),
(80, 136, 137, 1, 1, 3),
(81, 135, 136, 1, 1, 3),
(82, 134, 135, 1, 1, 3),
(83, 133, 134, 1, 1, 3),
(84, 132, 133, 1, 1, 3),
(85, 131, 132, 1, 1, 3),
(86, 130, 131, 1, 1, 3),
(87, 129, 130, 1, 1, 3),
(88, 128, 129, 1, 1, 3),
(89, 127, 128, 1, 1, 3),
(90, 126, 127, 1, 1, 3),
(91, 125, 126, 1, 1, 3),
(92, 124, 125, 1, 1, 3),
(93, 123, 124, 1, 1, 3),
(94, 122, 123, 1, 1, 3),
(95, 121, 122, 1, 1, 3),
(96, 120, 121, 1, 1, 3),
(97, 119, 120, 1, 1, 3),
(98, 118, 119, 1, 1, 3),
(99, 117, 118, 1, 1, 3),
(100, 116, 117, 1, 1, 3),
(101, 115, 116, 1, 1, 3),
(102, 114, 115, 1, 1, 3),
(103, 113, 114, 1, 1, 3),
(104, 112, 113, 1, 1, 3),
(105, 110, 111, 1, 1, 3),
(106, 109, 110, 1, 1, 3),
(107, 108, 109, 1, 1, 3),
(108, 107, 108, 1, 1, 3),
(109, 106, 107, 1, 1, 3),
(110, 105, 106, 1, 1, 3),
(111, 104, 105, 1, 1, 3),
(112, 103, 104, 1, 1, 3),
(113, 102, 103, 1, 1, 3),
(114, 101, 102, 1, 1, 3),
(115, 100, 101, 1, 1, 3),
(116, 99, 100, 1, 1, 3),
(117, 98, 99, 1, 1, 3),
(118, 97, 98, 1, 1, 3),
(119, 96, 97, 1, 1, 3),
(120, 95, 96, 1, 1, 3),
(121, 94, 95, 1, 1, 3),
(122, 93, 94, 1, 1, 3),
(123, 92, 93, 1, 1, 3),
(124, 91, 92, 1, 1, 3),
(125, 90, 91, 1, 1, 3),
(126, 89, 90, 1, 1, 3),
(127, 88, 89, 1, 1, 3),
(128, 87, 88, 1, 1, 3),
(129, 86, 87, 1, 1, 3),
(130, 85, 86, 1, 1, 3),
(131, 84, 85, 1, 1, 3),
(132, 82, 83, 1, 1, 3),
(133, 81, 82, 1, 1, 3),
(134, 80, 81, 1, 1, 3),
(135, 79, 80, 1, 1, 3),
(136, 78, 79, 1, 1, 3),
(137, 77, 78, 1, 1, 3),
(138, 76, 77, 1, 1, 3),
(139, 75, 76, 1, 1, 3),
(140, 74, 75, 1, 1, 3),
(141, 73, 74, 1, 1, 3),
(142, 72, 73, 1, 1, 3),
(143, 71, 72, 1, 1, 3),
(144, 70, 71, 1, 1, 3),
(145, 69, 70, 1, 1, 3),
(146, 68, 69, 1, 1, 3),
(147, 67, 68, 1, 1, 3),
(148, 66, 67, 1, 1, 3),
(149, 65, 66, 1, 1, 3),
(150, 64, 65, 1, 1, 3),
(151, 63, 64, 1, 1, 3),
(152, 62, 63, 1, 1, 3),
(153, 61, 62, 1, 1, 3),
(154, 60, 61, 1, 1, 3),
(155, 59, 60, 1, 1, 3),
(156, 58, 59, 1, 1, 3),
(157, 57, 58, 1, 1, 3),
(158, 56, 57, 1, 1, 3),
(159, 55, 56, 1, 1, 3),
(160, 54, 55, 1, 1, 3),
(161, 52, 53, 1, 1, 3),
(162, 51, 52, 1, 1, 3),
(163, 50, 51, 1, 1, 3),
(164, 49, 50, 1, 1, 3),
(165, 48, 49, 1, 1, 3),
(166, 47, 48, 1, 1, 3),
(167, 46, 47, 1, 1, 3),
(168, 45, 46, 1, 1, 3),
(169, 44, 45, 1, 1, 3),
(170, 43, 44, 1, 1, 3),
(171, 42, 43, 1, 1, 3),
(172, 41, 42, 1, 1, 3),
(173, 40, 41, 1, 1, 3),
(174, 39, 40, 1, 1, 3),
(175, 38, 39, 1, 1, 3),
(176, 37, 38, 1, 1, 3),
(177, 36, 37, 1, 1, 3),
(178, 35, 36, 1, 1, 3),
(179, 34, 35, 1, 1, 3),
(180, 33, 34, 1, 1, 3),
(181, 32, 33, 1, 1, 3),
(182, 31, 32, 1, 1, 3),
(183, 30, 31, 1, 1, 3),
(184, 29, 30, 1, 1, 3),
(185, 27, 28, 1, 1, 3),
(186, 26, 27, 1, 1, 3),
(187, 25, 26, 1, 1, 3),
(188, 24, 25, 1, 1, 3),
(189, 23, 24, 1, 1, 3),
(190, 22, 23, 1, 1, 3),
(191, 21, 22, 1, 1, 3),
(192, 20, 21, 1, 1, 3),
(193, 19, 20, 1, 1, 3),
(194, 18, 19, 1, 1, 3),
(195, 17, 18, 1, 1, 3),
(196, 16, 17, 1, 1, 3),
(197, 15, 16, 1, 1, 3),
(198, 14, 15, 1, 1, 3),
(199, 13, 14, 1, 1, 3),
(200, 12, 13, 1, 1, 3),
(201, 11, 12, 1, 1, 3),
(202, 10, 11, 1, 1, 3),
(203, 9, 10, 1, 1, 3),
(204, 8, 9, 1, 1, 3),
(205, 7, 8, 1, 1, 3),
(206, 6, 7, 1, 1, 3),
(207, 5, 6, 1, 1, 3),
(208, 4, 5, 1, 1, 3),
(209, 3, 4, 1, 1, 3),
(210, 2, 3, 1, 1, 3),
(211, 1, 2, 1, 1, 3),
(392, 181, 206, 0.5, 0.5, 3),
(391, 180, 205, 0.5, 0.5, 3),
(390, 179, 204, 0.5, 0.5, 3),
(389, 178, 203, 0.5, 0.5, 3),
(388, 177, 202, 0.5, 0.5, 3),
(387, 176, 201, 0.5, 0.5, 3),
(386, 175, 200, 0.5, 0.5, 3),
(379, 231, 168, 0.5, 0.5, 3),
(361, 232, 150, 0.5, 0.5, 3),
(360, 149, 188, 0.5, 0.5, 3),
(359, 231, 148, 0.5, 0.5, 3),
(358, 147, 169, 0.5, 0.5, 3),
(353, 142, 192, 0.5, 0.5, 3),
(352, 141, 193, 0.5, 0.5, 3),
(326, 115, 212, 0.5, 0.5, 3),
(325, 114, 213, 0.5, 0.5, 3),
(323, 258, 112, 0.5, 0.5, 3),
(310, 231, 99, 0.5, 0.5, 3),
(309, 232, 98, 0.5, 0.5, 3),
(308, 233, 97, 0.5, 0.5, 3),
(305, 258, 94, 0.5, 0.5, 3),
(300, 89, 124, 0.5, 0.5, 3),
(299, 88, 125, 0.5, 0.5, 3),
(298, 87, 126, 0.5, 0.5, 3),
(297, 86, 127, 0.5, 0.5, 3),
(296, 85, 128, 0.5, 0.5, 3),
(295, 84, 129, 0.5, 0.5, 3),
(282, 258, 71, 0.5, 0.5, 3),
(279, 233, 68, 0.5, 0.5, 3),
(278, 232, 67, 0.5, 0.5, 3),
(277, 231, 66, 0.5, 0.5, 3),
(264, 53, 156, 0.5, 0.5, 3),
(255, 44, 216, 0.5, 0.5, 3),
(253, 42, 215, 0.5, 0.5, 3),
(252, 41, 214, 0.5, 0.5, 3),
(250, 258, 39, 0.5, 0.5, 3),
(249, 233, 38, 0.5, 0.5, 3),
(248, 232, 37, 0.5, 0.5, 3),
(247, 231, 36, 0.5, 0.5, 3),
(245, 34, 101, 0.5, 0.5, 3),
(232, 21, 43, 0.5, 0.5, 3),
(228, 17, 70, 0.5, 0.5, 3),
(225, 233, 14, 0.5, 0.5, 3),
(224, 232, 13, 0.5, 0.5, 3),
(223, 231, 12, 0.5, 0.5, 3),
(212, 1, 105, 0.5, 0.5, 3),
(393, 182, 207, 0.5, 0.5, 3),
(394, 183, 208, 0.5, 0.5, 3),
(395, 184, 209, 0.5, 0.5, 3),
(396, 185, 210, 0.5, 0.5, 3),
(397, 186, 211, 0.5, 0.5, 3),
(398, 231, 187, 0.5, 0.5, 3),
(251, 259, 40, 0.5, 0.5, 3),
(283, 259, 72, 0.5, 0.5, 3),
(324, 259, 113, 0.5, 0.5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `geo_point`
--

DROP TABLE IF EXISTS `geo_point`;
CREATE TABLE IF NOT EXISTS `geo_point` (
  `GEO_POI_ID` int(3) NOT NULL,
  `GEO_POI_LATITUDE` double NOT NULL,
  `GEO_POI_LONGITUDE` double NOT NULL,
  `GEO_POI_NOM` varchar(64) NOT NULL,
  `GEO_POI_PARTITION` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geo_point`
--

INSERT INTO `geo_point` (`GEO_POI_ID`, `GEO_POI_LATITUDE`, `GEO_POI_LONGITUDE`, `GEO_POI_NOM`, `GEO_POI_PARTITION`) VALUES
(1, 46.210953, 5.241573, 'Revermont', 1),
(2, 46.216393, 5.239347, 'Granges Bardes', 1),
(3, 46.218601, 5.235753, 'Grand Challes', 1),
(4, 46.223392, 5.234127, 'Oyards', 1),
(5, 46.221321, 5.23448, 'Granges Rollet', 1),
(6, 46.218506, 5.233815, 'Tilleuls', 1),
(7, 46.215565, 5.233917, 'Chevrier', 1),
(8, 46.214268, 5.234539, 'Cimetière', 1),
(9, 46.212696, 5.230887, 'Schuman', 1),
(10, 46.211655, 5.230072, 'Dunant', 1),
(11, 46.210667, 2.230115, 'Jean Moulin', 1),
(12, 46.207497, 5.227554, 'Carré Amiot', 1),
(13, 46.20768, 5.220464, 'Charité Université', 1),
(14, 46.203621, 5.218618, 'Quinconces', 1),
(15, 46.202755, 5.2182, 'Observatoire ', 1),
(16, 46.201694, 5.215044, 'Victoire Gare', 1),
(17, 46.200638, 5.218574, 'Baudin', 1),
(18, 46.200653, 5.220666, 'Voltaire', 1),
(19, 46.200401, 5.225301, 'Labalme', 1),
(20, 46.1982, 5.225723, 'Bourg-Lycée', 1),
(21, 46.195892, 5.225383, 'Plein Soleil', 1),
(22, 46.193909, 5.225011, 'St Rock', 1),
(23, 46.190197, 5.226242, 'La Bruyère', 1),
(24, 46.188503, 5.226944, 'Vennes', 1),
(25, 46.187672, 5.224562, 'Rousseau', 1),
(26, 46.185635, 5.226609, 'Chartreuse', 1),
(27, 46.184502, 5.227006, 'Verlaine', 1),
(28, 46.186165, 5.228948, 'Seillon CFA', 1),
(29, 46.221333, 5.244226, 'Norélan', 2),
(30, 46.218971, 5.249265, 'Plan', 2),
(31, 46.216934, 5.24712, 'Parme', 2),
(32, 46.215305, 5.243917, 'Alimentec', 2),
(33, 46.212948, 5.24152, 'Gendarmerie', 2),
(34, 46.209812, 5.238424, 'Centre Nautique', 2),
(35, 46.208794, 5.233722, 'Europe', 2),
(36, 46.207352, 5.227682, 'Carré Amiot', 2),
(37, 46.207664, 5.220491, 'Charité Université', 2),
(38, 46.203312, 5.218699, 'Quinconces', 2),
(39, 46.199993, 5.215577, 'Sémard Gare', 2),
(40, 46.19685, 5.216403, 'Sémard Jaurès', 2),
(41, 46.195793, 5.220288, 'Ferry', 2),
(42, 46.195553, 5.22291, 'Crouy', 2),
(43, 46.195206, 5.226573, 'Plein Soleil', 2),
(44, 46.195248, 5.22922, 'Valéry', 2),
(45, 46.194771, 5.22987, 'Collège Riboud', 2),
(46, 46.191654, 5.232552, 'Stand', 2),
(47, 46.190136, 5.233505, 'Molière', 2),
(48, 46.19075, 5.235901, 'Aéroplanes', 2),
(49, 46.191044, 5.238986, 'Petites Vennes', 2),
(50, 46.188297, 5.237361, 'Vennes Stade', 2),
(51, 46.186954, 5.236998, 'Butte', 2),
(52, 46.185036, 5.239324, 'Ormeaux', 2),
(53, 46.186874, 5.241676, 'Ainterexpo', 2),
(54, 46.188313, 5.24579, 'Alagnier', 3),
(55, 46.196495, 5.265224, 'Mistral', 3),
(56, 46.197891, 5.260663, 'Curtafray', 3),
(57, 46.199207, 5.256668, 'Loëze', 3),
(58, 46.199837, 5.254592, 'Pennessuy', 3),
(59, 46.201221, 5.250374, 'Picasso', 3),
(60, 46.20203, 5.247498, 'Abbé Gringoz', 3),
(61, 46.203156, 5.24388, 'Croix Blanche', 3),
(62, 46.204567, 5.239231, 'Baudière', 3),
(63, 46.205353, 5.236716, 'Jura', 3),
(64, 46.205925, 5.233196, 'Maquis', 3),
(65, 46.205925, 5.231823, 'Robin', 3),
(66, 46.207367, 5.227926, 'Carré Amiot', 3),
(67, 46.207783, 5.220609, 'Charité Université', 3),
(68, 46.203716, 5.218759, 'Quinconces', 3),
(69, 46.203197, 5.221935, 'Préfecture', 3),
(70, 46.200665, 5.218843, 'Baudin', 3),
(71, 46.200123, 5.21551, 'Sémard Gare', 3),
(72, 46.197041, 5.216368, 'Sémard Jaurès', 3),
(73, 46.193378, 5.213548, 'Berthelot', 3),
(74, 46.19194, 5.211676, 'Girod de l\'Ain', 3),
(75, 46.19165, 5.208737, 'Bauvard', 3),
(76, 46.191376, 5.206988, 'Côtes', 3),
(77, 46.18959, 5.209386, 'Pagneux', 3),
(78, 46.187458, 5.209053, 'Grandes Bonnet', 3),
(79, 46.185795, 5.207905, 'Tyrandes', 3),
(80, 46.182858, 5.205533, 'Bellevue', 3),
(81, 46.18182, 5.205233, 'Péronnas Mairie', 3),
(82, 46.181587, 5.206504, 'Chênaie', 3),
(83, 46.181908, 5.209272, 'Vieux Chêne', 3),
(84, 46.203674, 5.195694, 'St Denis Collège', 4),
(85, 46.202702, 5.191838, 'St Denis Centre', 4),
(86, 46.202087, 5.189797, 'St Denis Mairie', 4),
(87, 46.199959, 5.190737, 'Flèches', 4),
(88, 46.200256, 5.193863, 'Grange Maman', 4),
(89, 46.20076, 5.199289, 'Fruitière', 4),
(90, 46.201183, 5.203435, 'Printemps', 4),
(91, 46.202091, 5.207386, 'Petit Montholon', 4),
(92, 46.204227, 5.209121, 'Lilas', 4),
(93, 46.202126, 5.212194, 'Mail', 4),
(94, 46.200047, 5.215529, 'Sémard Gare', 4),
(95, 46.201694, 5.215044, 'Victoire Gare', 4),
(96, 46.202621, 5.217645, 'Observatoire', 4),
(97, 46.203632, 5.218682, 'Quinconces', 4),
(98, 46.207573, 5.220401, 'Charité Université', 4),
(99, 46.207378, 5.228174, 'Carré Amiot', 4),
(100, 46.208813, 5.233699, 'Joliot Curie', 4),
(101, 46.207527, 5.234411, 'Centre Nautique', 4),
(102, 46.209862, 5.238305, 'Pré Neuf', 4),
(103, 46.207668, 5.241136, 'Dimes', 4),
(104, 46.20723, 5.241951, 'Petit Challes ', 4),
(105, 46.20808, 5.243783, 'Revermont', 4),
(106, 46.211246, 5.244153, 'Beau Site', 4),
(107, 46.211239, 5.247139, 'Clinique Convert', 4),
(108, 46.211567, 5.253822, 'Lycée Agricole', 4),
(109, 46.211578, 5.256784, 'Dévorah', 4),
(110, 46.20779, 5.258761, 'Stade Deguin', 4),
(111, 46.20776, 5.265469, 'EREA La Chagne', 4),
(112, 46.205956, 5.270505, 'Sémard Gare', 5),
(113, 46.175201, 5.216323, 'Sémard Jaurès', 5),
(114, 46.197029, 5.214756, 'Peloux', 5),
(115, 46.199467, 5.213662, 'Peloux Gare', 5),
(116, 46.198917, 5.210508, 'Clos', 5),
(117, 46.196629, 5.210443, 'Teyssonière', 5),
(118, 46.194595, 5.209993, 'Montholon', 5),
(119, 46.193451, 5.207632, 'Roland Garros', 5),
(120, 46.193138, 5.204371, 'Pascal', 5),
(121, 46.195782, 5.203512, 'Bouvreuils', 5),
(122, 46.197803, 5.203427, 'Vivaldi', 5),
(123, 46.200771, 5.202611, 'Charpine', 5),
(124, 46.200802, 5.199221, 'Fruitière', 5),
(125, 46.200268, 5.193878, 'Grange Maman', 5),
(126, 46.199955, 5.190852, 'Flèches', 5),
(127, 46.20208, 5.189844, 'St Denis Mairie', 5),
(128, 46.202702, 5.191882, 'St Denis Centre', 5),
(129, 46.203606, 5.195466, 'St Denis Collège', 5),
(130, 46.207771, 5.197774, 'Chalandré', 5),
(131, 46.209789, 5.198032, 'Semailles', 5),
(132, 46.213707, 5.197386, 'Cadalles', 5),
(133, 46.213615, 5.200893, 'Ourres', 5),
(134, 46.21431, 5.206222, 'Calidon', 5),
(135, 46.215771, 5.206833, 'Leclanché', 5),
(136, 46.22324, 5.204423, 'Chambière Nord', 5),
(137, 46.222095, 5.204777, 'Chambière Hotel', 5),
(138, 46.219364, 5.209543, 'Gay-Lussac', 5),
(139, 46.22448, 5.211088, 'Hopital Fleyriat', 5),
(140, 46.221844, 5.209167, 'Vareys', 5),
(141, 46.218967, 5.211906, 'Fort', 5),
(142, 46.215298, 5.214846, 'Neuve', 5),
(143, 46.217022, 5.218751, 'Boule', 5),
(144, 46.214691, 5.220983, 'Seguin', 5),
(145, 46.212566, 5.221682, 'Pont des chèvres', 5),
(146, 46.21175, 5.224429, 'Blanchisseries', 5),
(147, 46.210995, 5.22754, 'Moulin de Rozières', 5),
(148, 46.207474, 5.22769, 'Carré Amiot', 5),
(149, 46.207951, 5.224472, 'Vicaire', 5),
(150, 46.207607, 5.219664, 'Charité Université', 5),
(151, 46.207668, 5.216016, 'Jarrin', 5),
(152, 46.20673, 5.213312, 'Voisin', 5),
(153, 46.2048, 5.213892, 'Mas', 5),
(154, 46.203079, 5.21505, 'Citadelle', 5),
(155, 46.201565, 5.215082, 'Victoire Gare', 5),
(156, 46.188065, 5.255255, 'Ainterexpo', 6),
(157, 46.189579, 5.248147, 'Girolles', 6),
(158, 46.192307, 5.25656, 'Bouvent Plage', 6),
(159, 46.191391, 5.248785, 'Narcisses', 6),
(160, 46.191147, 5.243612, 'Platanes', 6),
(161, 46.191181, 5.241868, 'Charmettes', 6),
(162, 46.196396, 5.236549, 'Ferret', 6),
(163, 46.197975, 5.235149, 'Monastère de Brou', 6),
(164, 46.198441, 5.234778, 'Graves', 6),
(165, 46.199596, 5.233809, 'Hôtel Dieu', 6),
(166, 46.202534, 5.231367, 'Fontanettes', 6),
(167, 46.205444, 5.229032, 'Bons Enfants', 6),
(168, 46.207775, 5.227575, 'Carré Amiot', 6),
(169, 46.211315, 5.227501, 'Moulin de Rozières', 6),
(170, 46.214512, 5.22745, 'Canal', 6),
(171, 46.219238, 5.22787, 'Cuvier', 6),
(172, 46.220993, 5.226763, 'Miche', 6),
(173, 46.223347, 5.222464, 'Dépôt TUB', 6),
(174, 46.22776, 5.22828, 'Marboz', 6),
(175, 46.23558, 5.228396, 'CPA', 6),
(176, 46.232285, 5.229429, 'Castel', 6),
(177, 46.23521, 5.228447, 'Perrinche', 6),
(178, 46.243053, 5.224529, 'Feuilles Vertes', 6),
(179, 46.243973, 5.219865, 'Viriat Vernée', 6),
(180, 46.246063, 5.218847, 'Champagne', 6),
(181, 46.248245, 5.218917, 'Gelière', 6),
(182, 46.250381, 5.218496, 'Château', 6),
(183, 46.252495, 5.21698, 'Jayr', 6),
(184, 46.255043, 5.217155, 'Viriat Mairie', 6),
(185, 46.253296, 5.215927, 'Viriat Écoles', 6),
(186, 46.252174, 5.211509, 'VIRIAT Caronniers', 6),
(187, 46.207344, 5.2276, 'Carré Amiot', 7),
(188, 46.20787, 5.224697, 'Vicaire', 7),
(189, 46.209015, 5.220419, 'Schweitzer', 7),
(190, 46.210884, 5.218691, 'Mâcon', 7),
(191, 46.213093, 5.216747, 'Parc', 7),
(192, 46.215099, 5.214553, 'Neuve', 7),
(193, 46.21891, 5.211882, 'Fort', 7),
(194, 46.218559, 5.214963, 'Ecluses', 7),
(195, 46.221535, 5.216127, 'Valvert', 7),
(196, 46.22562, 5.217268, 'Liavoles', 7),
(197, 46.227161, 5.218917, 'Majornas', 7),
(198, 46.227695, 5.223305, 'Arago', 7),
(199, 46.227749, 5.228569, 'Buidon', 7),
(200, 46.228367, 5.229517, 'CPA', 7),
(201, 46.232285, 5.229429, 'Castel', 7),
(202, 46.23521, 5.228447, 'Perrinche', 7),
(203, 46.243053, 5.224529, 'Feuilles Vertes', 7),
(204, 46.243973, 5.219865, 'Viriat Vernée', 7),
(205, 46.246063, 5.218847, 'Champagne', 7),
(206, 46.248245, 5.218917, 'Gelière', 7),
(207, 46.250381, 5.218496, 'Château', 7),
(208, 46.252495, 5.21698, 'Jayr', 7),
(209, 46.255043, 5.217155, 'Viriat Mairie', 7),
(210, 46.253296, 5.215927, 'Viriat Écoles', 7),
(211, 46.252174, 5.211509, 'VIRIAT Caronniers', 7),
(212, 46.199829, 5.21354, 'Peloux Gare', 21),
(213, 46.196808, 5.214783, 'Peloux', 21),
(214, 46.195835, 5.220061, 'Ferry', 21),
(215, 46.195503, 5.223634, 'Crouy', 21),
(216, 46.195251, 5.228462, 'Valéry', 21),
(217, 46.194962, 5.234234, 'Arbelles', 21),
(218, 46.197739, 5.24012, 'Providence', 21),
(219, 46.196621, 5.24781, 'Sources', 21),
(231, 46.207455, 5.227743, 'Carré Amiot', 0),
(232, 46.207661, 5.220326, 'Charité Université', 0),
(233, 46.203571, 5.218689, 'Quinconces', 0),
(235, 46.201653, 5.215057, 'Victoire Gare', 0),
(258, 46.201527, 5.22928, 'Sémard Gare', 0),
(259, 46.189697, 5.216365, 'Sémard Jaurès', 0);

-- --------------------------------------------------------

--
-- Table structure for table `geo_version`
--

DROP TABLE IF EXISTS `geo_version`;
CREATE TABLE IF NOT EXISTS `geo_version` (
  `GEO_VERSION` int(11) DEFAULT NULL,
  `GEO_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
