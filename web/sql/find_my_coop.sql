-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2017 at 03:55 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find_my_coop`
--

-- --------------------------------------------------------

--
-- Table structure for table `fmc_mail`
--

CREATE TABLE `fmc_mail` (
  `id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `fk_mail` int(11) DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` longtext COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fmc_pictures`
--

CREATE TABLE `fmc_pictures` (
  `id` int(11) NOT NULL,
  `fk_post` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fmc_post`
--

CREATE TABLE `fmc_post` (
  `id` int(11) NOT NULL,
  `fk_theme` int(11) DEFAULT NULL,
  `fk_post` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fmc_post`
--

INSERT INTO `fmc_post` (`id`, `fk_theme`, `fk_post`, `fk_user`, `title`, `description`, `url`, `datetime`) VALUES
(1, 200, NULL, 1, 'Find my Coop', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', 'url', '1486237120'),
(2, NULL, 1, 1, 'couche presentation', 'text text text text text text text text text text text text text text text text text text text text text text', 'null', '1486237192'),
(3, NULL, 1, 1, 'couche metier', '<p>{{item.user.pseudo}}</p>\r\n                            <p>{{item.user.pseudo}}</p>\r\n                            <p>{{item.user.pseudo}}</p>\r\n                            <p>{{item.user.pseudo}}</p>', 'null', '1486243506'),
(4, 121, NULL, 1, 'les vingts de France', 'Ici vous pouvez parler de tous les vingt. Pas de discrimination, vingt rouges, blanc, rose, vin et un , vin neuf, etc...', 'null', '12354'),
(5, NULL, 4, 1, 'le vingt deux Côtes-d\'Armor', 'le vingt deux Côtes-d\'Armor est un vingt rouge elever durant vin ans ', 'null', '15635847');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_subject`
--

CREATE TABLE `fmc_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fmc_theme`
--

CREATE TABLE `fmc_theme` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_themeParent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fmc_theme`
--

INSERT INTO `fmc_theme` (`id`, `title`, `fk_themeParent`) VALUES
(1, 'bar', NULL),
(2, 'projet', NULL),
(11, 'Informatique', 1),
(12, 'electro', 1),
(20, 'Informatique', 2),
(110, '20', 11),
(111, 'web', 11),
(121, 'CUISINE', 11),
(123, 'bierre', 12),
(200, 'web', 20);

-- --------------------------------------------------------

--
-- Table structure for table `fmc_user`
--

CREATE TABLE `fmc_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passWord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postalCode` int(11) DEFAULT NULL,
  `posts` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `boss` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `role` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fmc_user`
--

INSERT INTO `fmc_user` (`id`, `name`, `firstName`, `pseudo`, `passWord`, `address`, `city`, `url`, `mail`, `postalCode`, `posts`, `boss`, `role`) VALUES
(1, NULL, NULL, 'user', 'user', NULL, NULL, NULL, 'user@user.fr', NULL, 'a:0:{}', 'a:0:{}', 'a:1:{i:0;s:12:"ROLE_MEMBRES";}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fmc_mail`
--
ALTER TABLE `fmc_mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DD860DCABDAFD8C8` (`author`),
  ADD KEY `IDX_DD860DCA3DB88C96` (`receiver`),
  ADD KEY `IDX_DD860DCADD187276` (`fk_mail`);

--
-- Indexes for table `fmc_pictures`
--
ALTER TABLE `fmc_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A9F15C5D6B4B2B3` (`fk_post`),
  ADD KEY `IDX_5A9F15C51AD0877` (`fk_user`);

--
-- Indexes for table `fmc_post`
--
ALTER TABLE `fmc_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D62ACD0F5698C47D` (`fk_theme`),
  ADD KEY `IDX_D62ACD0FD6B4B2B3` (`fk_post`),
  ADD KEY `IDX_D62ACD0F1AD0877` (`fk_user`);

--
-- Indexes for table `fmc_subject`
--
ALTER TABLE `fmc_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fmc_theme`
--
ALTER TABLE `fmc_theme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_944FA5A581CEAE34` (`fk_themeParent`);

--
-- Indexes for table `fmc_user`
--
ALTER TABLE `fmc_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_13377CB86CC499D` (`pseudo`),
  ADD UNIQUE KEY `UNIQ_13377CBF47645AE` (`url`),
  ADD UNIQUE KEY `UNIQ_13377CB5126AC48` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fmc_mail`
--
ALTER TABLE `fmc_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fmc_pictures`
--
ALTER TABLE `fmc_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fmc_post`
--
ALTER TABLE `fmc_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fmc_subject`
--
ALTER TABLE `fmc_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fmc_theme`
--
ALTER TABLE `fmc_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111;
--
-- AUTO_INCREMENT for table `fmc_user`
--
ALTER TABLE `fmc_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fmc_mail`
--
ALTER TABLE `fmc_mail`
  ADD CONSTRAINT `FK_DD860DCA3DB88C96` FOREIGN KEY (`receiver`) REFERENCES `fmc_user` (`id`),
  ADD CONSTRAINT `FK_DD860DCABDAFD8C8` FOREIGN KEY (`author`) REFERENCES `fmc_user` (`id`),
  ADD CONSTRAINT `FK_DD860DCADD187276` FOREIGN KEY (`fk_mail`) REFERENCES `fmc_mail` (`id`);

--
-- Constraints for table `fmc_pictures`
--
ALTER TABLE `fmc_pictures`
  ADD CONSTRAINT `FK_5A9F15C51AD0877` FOREIGN KEY (`fk_user`) REFERENCES `fmc_user` (`id`),
  ADD CONSTRAINT `FK_5A9F15C5D6B4B2B3` FOREIGN KEY (`fk_post`) REFERENCES `fmc_post` (`id`);

--
-- Constraints for table `fmc_post`
--
ALTER TABLE `fmc_post`
  ADD CONSTRAINT `FK_D62ACD0F1AD0877` FOREIGN KEY (`fk_user`) REFERENCES `fmc_user` (`id`),
  ADD CONSTRAINT `FK_D62ACD0F5698C47D` FOREIGN KEY (`fk_theme`) REFERENCES `fmc_theme` (`id`),
  ADD CONSTRAINT `FK_D62ACD0FD6B4B2B3` FOREIGN KEY (`fk_post`) REFERENCES `fmc_post` (`id`);

--
-- Constraints for table `fmc_theme`
--
ALTER TABLE `fmc_theme`
  ADD CONSTRAINT `FK_944FA5A581CEAE34` FOREIGN KEY (`fk_themeParent`) REFERENCES `fmc_theme` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
