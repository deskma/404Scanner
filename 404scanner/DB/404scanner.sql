-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 04:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `404scanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL,
  `from_link_id` bigint(20) NOT NULL,
  `from_url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `linking_id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `errorcode` int(11) DEFAULT NULL,
  `isInternal` tinyint(1) NOT NULL DEFAULT '0',
  `content` mediumtext COLLATE utf8_bin,
  `depth` int(11) NOT NULL DEFAULT '0',
  `Content-Type` text COLLATE utf8_bin,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `loadtime` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `site_id`, `from_link_id`, `from_url`, `linking_id`, `name`, `url`, `errorcode`, `isInternal`, `content`, `depth`, `Content-Type`, `start`, `end`, `loadtime`) VALUES
(1, 0, 0, NULL, 0, 'Home', 't3cms.dk', 200, 1, '', 1, 'text/html; charset=utf-8', '2017-05-23 12:27:22', '2017-05-23 12:27:26', 3),
(2, 0, 1, 't3cms.dk', 0, 'base', 'mobil.t3cms.dk', 200, 1, '', 2, 'text/html; charset=utf-8', '2017-05-23 12:27:26', '2017-05-23 12:27:35', 2),
(3, 0, 1, 't3cms.dk', 0, 'link', 'typo3temp/stylesheet_3083d22338.css?1355746205', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:27', '2017-05-23 12:27:40', 3),
(4, 0, 1, 't3cms.dk', 0, 'script', 'typo3temp/javascript_4d3df8e13f.js?1351081518', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:27', '2017-05-23 12:27:42', 2),
(5, 0, 1, 't3cms.dk', 0, 'link', 'mobil.t3cms.dk/mobil', 200, 1, '', 2, 'text/html; charset=utf-8', '2017-05-23 12:27:27', '2017-05-23 12:27:44', 2),
(6, 0, 1, 't3cms.dk', 0, 'link', 'code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css', 200, 0, '', 2, 'text/css', '2017-05-23 12:27:27', '2017-05-23 12:27:47', 1),
(7, 0, 1, 't3cms.dk', 0, 'link', 'fileadmin/templates/mobil/css/main.css', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:27', '2017-05-23 12:27:50', 2),
(8, 0, 1, 't3cms.dk', 0, 'link', 'fileadmin/templates/mobil/css/jquery-mobile.css', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:28', '2017-05-23 12:27:52', 2),
(9, 0, 1, 't3cms.dk', 0, 'link', 'fileadmin/templates/mobil/css/styles.css', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:28', '2017-05-23 12:27:55', 3),
(10, 0, 1, 't3cms.dk', 0, 'link', 'fileadmin/templates/mobil/css/photoswipe.css', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:28', '2017-05-23 12:27:57', 2),
(11, 0, 1, 't3cms.dk', 0, 'script', 'code.jquery.com/jquery-1.8.1.min.js', 200, 0, '', 2, 'application/javascript; charset=utf-8', '2017-05-23 12:27:28', '2017-05-23 12:27:59', 2),
(12, 0, 1, 't3cms.dk', 0, 'script', 'ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js', 200, 0, '', 2, 'text/javascript; charset=UTF-8', '2017-05-23 12:27:29', '2017-05-23 12:28:00', 1),
(13, 0, 1, 't3cms.dk', 0, 'script', 'fileadmin/templates/mobil/js/jquery.mobile-init.js', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:29', '2017-05-23 12:28:02', 2),
(14, 0, 1, 't3cms.dk', 0, 'script', 'fileadmin/templates/mobil/js/jquery.mobile-1.2.0.js', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:29', '2017-05-23 12:28:05', 3),
(15, 0, 1, 't3cms.dk', 0, 'script', 'fileadmin/templates/mobil/js/tabs.js', 404, 0, NULL, 2, NULL, '2017-05-23 12:27:30', '2017-05-23 12:28:07', 2),
(16, 0, 1, 't3cms.dk', 0, 'script', 'fileadmin/templates/mobil/js/klass.min.js', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:30', NULL, NULL),
(17, 0, 1, 't3cms.dk', 0, 'script', 'fileadmin/templates/mobil/js/code.photoswipe-3.0.5.js', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:30', NULL, NULL),
(18, 0, 1, 't3cms.dk', 0, 'script', 'fileadmin/templates/mobil/js/swipe.js', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:30', NULL, NULL),
(19, 0, 1, 't3cms.dk', 0, 'script', 'fileadmin/templates/mobil/js/redirect.js', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:31', NULL, NULL),
(20, 0, 1, 't3cms.dk', 0, 'link', 't3cms.dk/fileadmin/templates/mobil/img/ikoner/ikon-114x114.png', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:31', NULL, NULL),
(21, 0, 1, 't3cms.dk', 0, 'link', 't3cms.dk/fileadmin/templates/mobil/img/ikoner/ikon-72x72.png', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:31', NULL, NULL),
(22, 0, 1, 't3cms.dk', 0, 'link', 't3cms.dk/fileadmin/templates/mobil/img/ikoner/ikon-57x57.png', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:31', NULL, NULL),
(23, 0, 1, 't3cms.dk', 0, 'link', 't3cms.dk/fileadmin/templates/mobil/img/ikoner/favicon.ico', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:32', NULL, NULL),
(24, 0, 1, 't3cms.dk', 0, 'img', 't3cms.dk/fileadmin/templates/mobil/img/logo.png', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:32', NULL, NULL),
(25, 0, 1, 't3cms.dk', 0, 'a', 'facebook.com/t3cms', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:32', NULL, NULL),
(26, 0, 1, 't3cms.dk', 0, 'img', 't3cms.dk/fileadmin/templates/mobil/img/facebook.png', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:32', NULL, NULL),
(27, 0, 1, 't3cms.dk', 0, 'a', 'www.youtube.com/user/T3CMSTYPO3', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:32', NULL, NULL),
(28, 0, 1, 't3cms.dk', 0, 'img', 't3cms.dk/fileadmin/templates/mobil/img/youtube.png', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:32', NULL, NULL),
(29, 0, 1, 't3cms.dk', 0, 'img', 'typo3temp/pics/9a78f98ea3.png', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:33', NULL, NULL),
(30, 0, 1, 't3cms.dk', 0, 'img', 'uploads/pics/typo3-nyhed.png', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:33', NULL, NULL),
(31, 0, 1, 't3cms.dk', 0, 'img', 'uploads/pics/footer-deler.png', NULL, 0, NULL, 2, NULL, '2017-05-23 12:27:33', NULL, NULL),
(32, 0, 1, 't3cms.dk', 0, 'PCversion', 'www.t3cms.dk', NULL, 1, NULL, 2, NULL, '2017-05-23 12:27:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `link_link`
--

CREATE TABLE `link_link` (
  `id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL,
  `toSite` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `link_link`
--

INSERT INTO `link_link` (`id`, `site_id`, `toSite`) VALUES
(1, 0, 2),
(2, 0, 3),
(3, 0, 4),
(4, 0, 5),
(5, 0, 6),
(6, 0, 7),
(7, 0, 8),
(8, 0, 9),
(9, 0, 10),
(10, 0, 11),
(11, 0, 12),
(12, 0, 13),
(13, 0, 14),
(14, 0, 15),
(15, 0, 16),
(16, 0, 17),
(17, 0, 18),
(18, 0, 19),
(19, 0, 20),
(20, 0, 21),
(21, 0, 22),
(22, 0, 23),
(23, 0, 24),
(24, 0, 25),
(25, 0, 26),
(26, 0, 27),
(27, 0, 28),
(28, 0, 29),
(29, 0, 30),
(30, 0, 31),
(31, 0, 32);

-- --------------------------------------------------------

--
-- Table structure for table `link_sites`
--

CREATE TABLE `link_sites` (
  `id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL,
  `toSite` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `site_id` int(11) NOT NULL,
  `short_form_domain` text COLLATE utf8_bin,
  `domain` varchar(255) COLLATE utf8_bin NOT NULL,
  `facebook` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `google_key_word_search` text COLLATE utf8_bin,
  `email` text COLLATE utf8_bin NOT NULL,
  `submit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sent_status` text COLLATE utf8_bin,
  `sent_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `short_form_domain`, `domain`, `facebook`, `twitter`, `google`, `linkedin`, `google_key_word_search`, `email`, `submit_date`, `sent_status`, `sent_time`) VALUES
(0, 't3cms.dk', 't3cms.dk', NULL, NULL, NULL, NULL, NULL, 'Ole.Oldhojgmail.com', '2017-05-22 06:09:02', NULL, '0000-00-00 00:00:00'),
(1, 'jaynest.com', 'jaynest.com', NULL, NULL, NULL, NULL, NULL, '', '2017-04-01 16:49:43', 'done', '0000-00-00 00:00:00'),
(2, 'boolex.com', 'boolex.com', NULL, NULL, 'plus.google.com/u/0/117692459050969303006', NULL, NULL, '', '2017-03-29 10:28:47', 'done', '0000-00-00 00:00:00'),
(3, 'google.com.ph', 'www.google.com.ph/search?site=&source=hp&q=real+estate&oq=real+estate&gs_l=hp.3..0l2j0i131k1j0l7.1013.3027.0.3530.11.6.0.5.5.0.245.484.2-2.2.0....0...1c.1.64.hp..4.7.497.y5BvtO8QZ7M', NULL, NULL, NULL, NULL, 'real estate', 'Ole.oldhoj@gmail.com', '2017-03-29 10:28:09', 'done', '0000-00-00 00:00:00'),
(4, 'google.com', 'google.com/search?site=webhp&q=real+estate&oq=real+esa', NULL, NULL, NULL, NULL, 'real estate', '', '2017-04-01 16:08:23', '', '0000-00-00 00:00:00'),
(5, 'trustpilot.com', 'trustpilot.com', NULL, NULL, NULL, NULL, NULL, 'Ole.oldhoj@gmail.com', '2017-04-05 10:51:13', ' ', '0000-00-00 00:00:00'),
(6, 'trustpilot.dk', 'trustpilot.dk', NULL, NULL, NULL, NULL, NULL, 'Ole.oldhoj@gmail.com', '2017-04-05 10:51:14', ' ', '0000-00-00 00:00:00'),
(7, 'serviceray.com', 'serviceray.com', NULL, NULL, NULL, NULL, NULL, '', '2017-04-12 06:32:34', ' ', '0000-00-00 00:00:00'),
(9, 'venturecup.dk', 'venturecup.dk', NULL, NULL, NULL, NULL, NULL, '', '2017-04-12 06:32:34', 'done', '0000-00-00 00:00:00'),
(10, 'propellos.dk', 'propellos.dk', NULL, NULL, NULL, NULL, NULL, 'propellos.dk', '2017-04-14 09:16:30', 'd', '0000-00-00 00:00:00'),
(11, 'ulykkespatient.dk', 'https://www.ulykkespatient.dk/', NULL, NULL, NULL, NULL, NULL, '', '2017-04-26 02:58:09', NULL, '0000-00-00 00:00:00'),
(34149, NULL, 'typo3temp/stylesheet_3083d22338.css?1355746205', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:27', NULL, '0000-00-00 00:00:00'),
(34150, NULL, 'typo3temp/javascript_4d3df8e13f.js?1351081518', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:27', NULL, '0000-00-00 00:00:00'),
(34151, NULL, 'code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:27', NULL, '0000-00-00 00:00:00'),
(34152, NULL, 'fileadmin/templates/mobil/css/main.css', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:27', NULL, '0000-00-00 00:00:00'),
(34153, NULL, 'fileadmin/templates/mobil/css/jquery-mobile.css', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:28', NULL, '0000-00-00 00:00:00'),
(34154, NULL, 'fileadmin/templates/mobil/css/styles.css', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:28', NULL, '0000-00-00 00:00:00'),
(34155, NULL, 'fileadmin/templates/mobil/css/photoswipe.css', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:28', NULL, '0000-00-00 00:00:00'),
(34156, NULL, 'code.jquery.com/jquery-1.8.1.min.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:29', NULL, '0000-00-00 00:00:00'),
(34157, NULL, 'ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:29', NULL, '0000-00-00 00:00:00'),
(34158, NULL, 'fileadmin/templates/mobil/js/jquery.mobile-init.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:29', NULL, '0000-00-00 00:00:00'),
(34159, NULL, 'fileadmin/templates/mobil/js/jquery.mobile-1.2.0.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:30', NULL, '0000-00-00 00:00:00'),
(34160, NULL, 'fileadmin/templates/mobil/js/tabs.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:30', NULL, '0000-00-00 00:00:00'),
(34161, NULL, 'fileadmin/templates/mobil/js/klass.min.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:30', NULL, '0000-00-00 00:00:00'),
(34162, NULL, 'fileadmin/templates/mobil/js/code.photoswipe-3.0.5.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:30', NULL, '0000-00-00 00:00:00'),
(34163, NULL, 'fileadmin/templates/mobil/js/swipe.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:31', NULL, '0000-00-00 00:00:00'),
(34164, NULL, 'fileadmin/templates/mobil/js/redirect.js', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:31', NULL, '0000-00-00 00:00:00'),
(34165, NULL, 'facebook.com/t3cms', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:32', NULL, '0000-00-00 00:00:00'),
(34166, NULL, 'www.youtube.com/user/T3CMSTYPO3', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:32', NULL, '0000-00-00 00:00:00'),
(34167, NULL, 'typo3temp/pics/9a78f98ea3.png', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:33', NULL, '0000-00-00 00:00:00'),
(34168, NULL, 'uploads/pics/typo3-nyhed.png', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:33', NULL, '0000-00-00 00:00:00'),
(34169, NULL, 'uploads/pics/footer-deler.png', NULL, NULL, NULL, NULL, NULL, '', '2017-05-23 12:27:33', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sites_link`
--

CREATE TABLE `sites_link` (
  `id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL,
  `toSite` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `site_email`
--

CREATE TABLE `site_email` (
  `id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_errors`
--
CREATE TABLE `v_errors` (
`id` bigint(20)
,`site_id` bigint(20)
,`from_link_id` bigint(20)
,`from_url` varchar(255)
,`linking_id` int(11)
,`name` text
,`url` varchar(255)
,`errorcode` int(11)
,`isInternal` tinyint(1)
,`content` mediumtext
,`depth` int(11)
,`Content-Type` text
,`start` timestamp
,`end` timestamp
,`loadtime` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_errors2`
--
CREATE TABLE `v_errors2` (
`id` bigint(20)
,`site_id` bigint(20)
,`from_url` varchar(255)
,`name` text
,`url` varchar(255)
,`errorcode` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_errors`
--
DROP TABLE IF EXISTS `v_errors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_errors`  AS  select `link`.`id` AS `id`,`link`.`site_id` AS `site_id`,`link`.`from_link_id` AS `from_link_id`,`link`.`from_url` AS `from_url`,`link`.`linking_id` AS `linking_id`,`link`.`name` AS `name`,`link`.`url` AS `url`,`link`.`errorcode` AS `errorcode`,`link`.`isInternal` AS `isInternal`,`link`.`content` AS `content`,`link`.`depth` AS `depth`,`link`.`Content-Type` AS `Content-Type`,`link`.`start` AS `start`,`link`.`end` AS `end`,`link`.`loadtime` AS `loadtime` from `link` where ((`link`.`errorcode` <> 200) and (`link`.`errorcode` <> 406)) order by `link`.`errorcode` desc ;

-- --------------------------------------------------------

--
-- Structure for view `v_errors2`
--
DROP TABLE IF EXISTS `v_errors2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_errors2`  AS  select `link`.`id` AS `id`,`link`.`site_id` AS `site_id`,`link`.`from_url` AS `from_url`,`link`.`name` AS `name`,`link`.`url` AS `url`,`link`.`errorcode` AS `errorcode` from `link` where ((`link`.`errorcode` <> 200) and (`link`.`errorcode` <> 406)) order by `link`.`errorcode` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `link_link`
--
ALTER TABLE `link_link`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `link_sites`
--
ALTER TABLE `link_sites`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`site_id`),
  ADD UNIQUE KEY `domain` (`domain`),
  ADD KEY `id` (`site_id`);

--
-- Indexes for table `sites_link`
--
ALTER TABLE `sites_link`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `site_email`
--
ALTER TABLE `site_email`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_id` (`site_id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `link_link`
--
ALTER TABLE `link_link`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `link_sites`
--
ALTER TABLE `link_sites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34170;
--
-- AUTO_INCREMENT for table `sites_link`
--
ALTER TABLE `sites_link`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_email`
--
ALTER TABLE `site_email`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
