-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 05:20 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svchub`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `days` varchar(255) NOT NULL,
  `timeStart` varchar(255) NOT NULL,
  `timeEnd` varchar(255) NOT NULL,
  `servCatId` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `createDT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateDT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adarea`
--

CREATE TABLE IF NOT EXISTS `adarea` (
  `id` int(11) NOT NULL,
  `adId` int(11) NOT NULL,
  `areaId` int(11) NOT NULL,
  `stateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adimg`
--

CREATE TABLE IF NOT EXISTS `adimg` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `path` text NOT NULL,
  `adId` int(11) NOT NULL,
  `pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adjob`
--

CREATE TABLE IF NOT EXISTS `adjob` (
  `id` int(11) NOT NULL,
  `adId` int(11) NOT NULL,
  `job` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stateId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=468 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `stateId`) VALUES
(1, 'Ayer Baloi', 1),
(2, 'Ayer Hitam', 1),
(3, 'Bandar Penawar', 1),
(4, 'Bandar Tenggara', 1),
(5, 'Batu Anam', 1),
(6, 'Batu Pahat', 1),
(7, 'Bekok', 1),
(8, 'Benut', 1),
(9, 'Bukit Gambir', 1),
(10, 'Bukit Pasir', 1),
(11, 'Chaah', 1),
(12, 'Endau', 1),
(13, 'Gelang Patah', 1),
(14, 'Gerisek', 1),
(15, 'Gugusan Taib Andak', 1),
(16, 'Jementah', 1),
(17, 'Johor Bharu', 1),
(18, 'Kahang', 1),
(19, 'Kluang', 1),
(20, 'Kota Tinggi', 1),
(21, 'Kukup', 1),
(22, 'Kulai', 1),
(23, 'Labis', 1),
(24, 'Layang-Layang', 1),
(25, 'Masai', 1),
(26, 'Mersing', 1),
(27, 'Mersing', 1),
(28, 'Muar', 1),
(29, 'Nusajaya', 1),
(30, 'Pagoh', 1),
(31, 'Paloh', 1),
(32, 'Panchor', 1),
(33, 'Parit Jawa', 1),
(34, 'Parit Raja', 1),
(35, 'Parit Sulong', 1),
(36, 'Pasir Gudang', 1),
(37, 'Pekan Nenas', 1),
(38, 'Pengerang', 1),
(39, 'Pontian', 1),
(40, 'Rengam', 1),
(41, 'Rengit', 1),
(42, 'Segamat', 1),
(43, 'Semerah', 1),
(44, 'Senai', 1),
(45, 'Senggarang', 1),
(46, 'Seri Gading', 1),
(47, 'Seri Medan', 1),
(48, 'Simpang Rengam', 1),
(49, 'Sungai Mati', 1),
(50, 'Tangkak', 1),
(51, 'Ulu Tiram', 1),
(52, 'Yong Peng', 1),
(53, 'Alor Setar', 2),
(54, 'Ayer Hitam', 2),
(55, 'Baling', 2),
(56, 'Bandar Baharu', 2),
(57, 'Bedong', 2),
(58, 'Bukit Kayu Hitam', 2),
(59, 'Changloon', 2),
(60, 'Gurun', 2),
(61, 'Jeniang', 2),
(62, 'Jitra', 2),
(63, 'Karangan', 2),
(64, 'Kepala Batas', 2),
(65, 'Kodiang', 2),
(66, 'Kota Kuala Muda', 2),
(67, 'Kota Sarang Semut', 2),
(68, 'Kuala Kedah', 2),
(69, 'Kuala Ketil', 2),
(70, 'Kuala Nerang', 2),
(71, 'Kuala Pegang', 2),
(72, 'Kulim', 2),
(73, 'Kupang', 2),
(74, 'Langgar', 2),
(75, 'Lunas', 2),
(76, 'Merbok', 2),
(77, 'Padang Serai', 2),
(78, 'Pendang', 2),
(79, 'Pokok Sena', 2),
(80, 'Serdang', 2),
(81, 'Sik', 2),
(82, 'Simpang Empat', 2),
(83, 'Sungai Petani', 2),
(84, 'Yan', 2),
(85, 'Ayer Lanas', 3),
(86, 'Bachok', 3),
(87, 'Cherang Ruku', 3),
(88, 'Dabong', 3),
(89, 'Gua Musang', 3),
(90, 'Jeli', 3),
(91, 'Kem Desa Pahlawan', 3),
(92, 'Ketereh', 3),
(93, 'Kota Bharu', 3),
(94, 'Kuala Balah', 3),
(95, 'Kuala Krai', 3),
(96, 'Machang', 3),
(97, 'Melor', 3),
(98, 'Pasir  Mas', 3),
(99, 'Pasir Puteh', 3),
(100, 'Pulai Chondong', 3),
(101, 'Rantau Panjang', 3),
(102, 'Selising', 3),
(103, 'Tanah Merah', 3),
(104, 'Temangan', 3),
(105, 'Tumpat', 3),
(106, 'Wakaf Bharu', 3),
(107, 'Ampang Hilir', 4),
(108, 'Bandar Damai Perdana', 4),
(109, 'Bandar Manjalara', 4),
(110, 'Bandar Sri Damansara', 4),
(111, 'Bandar Tasik Selatan', 4),
(112, 'Bandar Tun Razak', 4),
(113, 'Bangsar', 4),
(114, 'Bangsar South', 4),
(115, 'Batu', 4),
(116, 'Brickfields', 4),
(117, 'Bukit Bintang', 4),
(118, 'Bukit Jalil', 4),
(119, 'Bukit Ledang', 4),
(120, 'Bukit Persekutuan (Federal Hill)', 4),
(121, 'Bukit Tunku (Kenny Hills)', 4),
(122, 'Cheras', 4),
(123, 'Country Heights Damansara', 4),
(124, 'Damansara', 4),
(125, 'Damansara Heights', 4),
(126, 'Desa Pandan', 4),
(127, 'Desa Park City', 4),
(128, 'Desa Petaling', 4),
(129, 'Jalan Klang Lama (Old Klang Road)', 4),
(130, 'Jalan Sultan Ismail', 4),
(131, 'Jinjang', 4),
(132, 'Kepong', 4),
(133, 'Keramat', 4),
(134, 'KL Sentral', 4),
(135, 'KLCC', 4),
(136, 'Kuala Lumpur', 4),
(137, 'Kuchai Lama', 4),
(138, 'Lembah Pantai', 4),
(139, 'Mid Valley City', 4),
(140, 'Mont Kiara', 4),
(141, 'OUG', 4),
(142, 'Pandan Indah', 4),
(143, 'Pandan Jaya', 4),
(144, 'Pandan Perdana', 4),
(145, 'Pantai', 4),
(146, 'Pekan Batu', 4),
(147, 'Salak Selatan', 4),
(148, 'Segambut', 4),
(149, 'Sentul', 4),
(150, 'Seputeh', 4),
(151, 'Setapak', 4),
(152, 'Setiawangsa', 4),
(153, 'Solaris Dutamas', 4),
(154, 'Sri Hartamas', 4),
(155, 'Sri Petaling', 4),
(156, 'Sungai Besi', 4),
(157, 'Sungai Penchala', 4),
(158, 'Taman Desa', 4),
(159, 'Taman Duta', 4),
(160, 'Taman Melawati', 4),
(161, 'Taman Tun Dr. Ismail', 4),
(162, 'Titiwangsa', 4),
(163, 'TPM', 4),
(164, 'Wangsa Maju', 4),
(165, 'Alor Gajah', 5),
(166, 'Asahan', 5),
(167, 'Ayer Keroh', 5),
(168, 'Bandar Melaka', 5),
(169, 'Bemban', 5),
(170, 'Durian Tunggal', 5),
(171, 'Jasin', 5),
(172, 'Kem Trendak', 5),
(173, 'Kuala Sungai Baru', 5),
(174, 'Lubok China', 5),
(175, 'Masjid Tanah', 5),
(176, 'Merlimau', 5),
(177, 'Selandar', 5),
(178, 'Sungai Rambai', 5),
(179, 'Sungai Udang', 5),
(180, 'Bahau', 6),
(181, 'Bandar Enstek', 6),
(182, 'Bandar Seri Jempol', 6),
(183, 'Batu Kikir', 6),
(184, 'Gemas', 6),
(185, 'Gemencheh', 6),
(186, 'Johol', 6),
(187, 'Kota', 6),
(188, 'Kuala Klawang', 6),
(189, 'Kuala Pilah', 6),
(190, 'Labu', 6),
(191, 'Linggi', 6),
(192, 'Mantin', 6),
(193, 'Nilai', 6),
(194, 'Port Dickson', 6),
(195, 'Pusat Bandar Palong', 6),
(196, 'Rantau', 6),
(197, 'Rembau', 6),
(198, 'Rompin', 6),
(199, 'Seremban', 6),
(200, 'Si Rusa', 6),
(201, 'Simpang Durian', 6),
(202, 'Simpang Pertang', 6),
(203, 'Tampin', 6),
(204, 'Tanjong Ipoh', 6),
(205, 'Balok', 7),
(206, 'Bandar Bera', 7),
(207, 'Bandar Pusat Jengka', 7),
(208, 'Bandar Tun Abdul Razak', 7),
(209, 'Benta', 7),
(210, 'Bentong', 7),
(211, 'Brinchang', 7),
(212, 'Bukit Fraser', 7),
(213, 'Bukit Goh', 7),
(214, 'Chenor', 7),
(215, 'Chini', 7),
(216, 'Damak', 7),
(217, 'Dong', 7),
(218, 'Gambang', 7),
(219, 'Genting Highlands', 7),
(220, 'Jerantut', 7),
(221, 'Karak', 7),
(222, 'Kemayan', 7),
(223, 'Kuala Krau', 7),
(224, 'Kuala Lipis', 7),
(225, 'Kuala Rompin', 7),
(226, 'Kuantan', 7),
(227, 'Lanchang', 7),
(228, 'Lurah Bilut', 7),
(229, 'Maran', 7),
(230, 'Mentakab', 7),
(231, 'Muadzam Shah', 7),
(232, 'Padang Tengku', 7),
(233, 'Pekan', 7),
(234, 'Raub', 7),
(235, 'Ringlet', 7),
(236, 'Sega', 7),
(237, 'Sungai Lembing', 7),
(238, 'Tanah Rata', 7),
(239, 'Temerloh', 7),
(240, 'Triang', 7),
(241, 'Ayer Tawar', 8),
(242, 'Bagan Datoh', 8),
(243, 'Bagan Serai', 8),
(244, 'Bandar Seri Iskandar', 8),
(245, 'Batu Gajah', 8),
(246, 'Batu Kurau', 8),
(247, 'Behrang Stesen', 8),
(248, 'Bidor', 8),
(249, 'Bota', 8),
(250, 'Bruas', 8),
(251, 'Cameron Highlands', 8),
(252, 'Changkat Jering', 8),
(253, 'Changkat Keruing', 8),
(254, 'Chemor', 8),
(255, 'Chenderiang', 8),
(256, 'Chenderong Balai', 8),
(257, 'Chikus', 8),
(258, 'Enggor', 8),
(259, 'Gerik', 8),
(260, 'Gopeng', 8),
(261, 'Hutan Melintang', 8),
(262, 'Intan', 8),
(263, 'Ipoh', 8),
(264, 'Jeram', 8),
(265, 'Kampar', 8),
(266, 'Kampung Gajah', 8),
(267, 'Kampung Kepayang', 8),
(268, 'Kamunting', 8),
(269, 'Kuala Kangsar', 8),
(270, 'Kuala Kurau', 8),
(271, 'Kuala Sepetang', 8),
(272, 'Lambor Kanan', 8),
(273, 'Langkap', 8),
(274, 'Lenggong', 8),
(275, 'Lumut', 8),
(276, 'Malim Nawar', 8),
(277, 'Manong', 8),
(278, 'Matang', 8),
(279, 'Padang Rengas', 8),
(280, 'Pangkor', 8),
(281, 'Pantai Remis', 8),
(282, 'Parit', 8),
(283, 'Parit Buntar', 8),
(284, 'Pengkalan Hulu', 8),
(285, 'Pusing', 8),
(286, 'Rantau Panjang', 8),
(287, 'Sauk', 8),
(288, 'Selama', 8),
(289, 'Selekoh', 8),
(290, 'Seri Manjong', 8),
(291, 'Setiawan', 8),
(292, 'Simpang', 8),
(293, 'Slim River', 8),
(294, 'Sungai Siput', 8),
(295, 'Sungai Sumun', 8),
(296, 'Sungkai', 8),
(297, 'Taiping', 8),
(298, 'Tanjong Malim', 8),
(299, 'Tanjong Piandang', 8),
(300, 'Tanjong Rambutan', 8),
(301, 'Tanjong Tualang', 8),
(302, 'Tapah', 8),
(303, 'Tapah Road', 8),
(304, 'Teluk Intan', 8),
(305, 'Temoh', 8),
(306, 'TLDM Lumut', 8),
(307, 'Trolak', 8),
(308, 'Trong', 8),
(309, 'Tronoh', 8),
(310, 'Ulu Bernam', 8),
(311, 'Ulu Kinta', 8),
(312, 'Arau', 9),
(313, 'Kaki Bukit', 9),
(314, 'Kangar', 9),
(315, 'Kuala Perlis', 9),
(316, 'Padang Besar', 9),
(317, 'Ayer Itam', 10),
(318, 'Balik Pulau', 10),
(319, 'Batu Ferringhi', 10),
(320, 'Batu Maung', 10),
(321, 'Bayan Lepas', 10),
(322, 'Bukit Mertajam', 10),
(323, 'Butterworth', 10),
(324, 'Gelugor', 10),
(325, 'George Town', 10),
(326, 'Jelutong', 10),
(327, 'Juru', 10),
(328, 'Kepala Batas', 10),
(329, 'Kubang Semang', 10),
(330, 'Nibong Tebal', 10),
(331, 'Penaga', 10),
(332, 'Peneng Hill', 10),
(333, 'Perai', 10),
(334, 'Permatang Pauh', 10),
(335, 'Pulau Pinang', 10),
(336, 'Seberang Perai', 10),
(337, 'Simpang Ampat', 10),
(338, 'Sungai Jawi', 10),
(339, 'Tanjong Bungah', 10),
(340, 'Tasek Gelugor', 10),
(341, 'Alam Impian', 11),
(342, 'Alam Perdana', 11),
(343, 'Ambang Botanic', 11),
(344, 'Ampang', 11),
(345, 'Ara Damansara', 11),
(346, 'Balakong', 11),
(347, 'Bandar Baru Bangi', 11),
(348, 'Bandar Botanic', 11),
(349, 'Bandar Bukit Raja', 11),
(350, 'Bandar Bukit Tinggi', 11),
(351, 'Bandar Kinrara', 11),
(352, 'Bandar Puncak Alam', 11),
(353, 'Bandar Puteri Klang', 11),
(354, 'Bandar Puteri Puchong', 11),
(355, 'Bandar Saujana Putra', 11),
(356, 'Bandar Sungai Long', 11),
(357, 'Bandar Sunway', 11),
(358, 'Bandar Utama', 11),
(359, 'Bangi', 11),
(360, 'Banting', 11),
(361, 'Batang Berjuntai', 11),
(362, 'Batang Kali', 11),
(363, 'Batu Arang', 11),
(364, 'Batu Caves', 11),
(365, 'Beranang', 11),
(366, 'Bukit Antarabangsa', 11),
(367, 'Bukit Jelutong', 11),
(368, 'Bukit Rahman Putra', 11),
(369, 'Bukit Rotan', 11),
(370, 'Bukit Subang', 11),
(371, 'Country Heights', 11),
(372, 'Cyberjaya', 11),
(373, 'Damansara Damai', 11),
(374, 'Damansara Intan', 11),
(375, 'Damansara Jaya', 11),
(376, 'Damansara Kim', 11),
(377, 'Damansara Perdana', 11),
(378, 'Damansara Utama', 11),
(379, 'Denai Alam', 11),
(380, 'Dengkil', 11),
(381, 'Glenmarie', 11),
(382, 'Gombak', 11),
(383, 'Hulu Langat', 11),
(384, 'Hulu Selangor', 11),
(385, 'Jenjarom', 11),
(386, 'Jeram', 11),
(387, 'Kajang', 11),
(388, 'Kapar', 11),
(389, 'Kayu Ara', 11),
(390, 'Kelana Jaya', 11),
(391, 'Kerling', 11),
(392, 'Klang', 11),
(393, 'KLIA', 11),
(394, 'Kota Damansara', 11),
(395, 'Kota Emerald', 11),
(396, 'Kota Kemuning', 11),
(397, 'Kuala Kubu Baru', 11),
(398, 'Kuala Langat', 11),
(399, 'Kuala Selangor', 11),
(400, 'Kuang', 11),
(401, 'Mutiara Damansara', 11),
(402, 'Petaling', 11),
(403, 'Petaling Jaya', 11),
(404, 'Port Klang', 11),
(405, 'Puchong', 11),
(406, 'Puchong South', 11),
(407, 'Pulau Carey', 11),
(408, 'Pulau Indah (Pulau Lumut)', 11),
(409, 'Pulau Ketam', 11),
(410, 'Puncak Jalil', 11),
(411, 'Putra Heights', 11),
(412, 'Putrajaya', 11),
(413, 'Rasa', 11),
(414, 'Rawang', 11),
(415, 'Sabak Bernam', 11),
(416, 'Saujana', 11),
(417, 'Sekinchan', 11),
(418, 'Selayang', 11),
(419, 'Semenyih', 11),
(420, 'Sepang', 11),
(421, 'Serdang', 11),
(422, 'Serendah', 11),
(423, 'Seri Kembangan', 11),
(424, 'Setia Alam', 11),
(425, 'Setia Eco Park', 11),
(426, 'Shah Alam', 11),
(427, 'SierraMas', 11),
(428, 'SS2', 11),
(429, 'Subang Bestari', 11),
(430, 'Subang Heights', 11),
(431, 'Subang Jaya', 11),
(432, 'Sungai Ayer Tawar', 11),
(433, 'Sungai Besar', 11),
(434, 'Sungai Buloh', 11),
(435, 'Sungai Pelek', 11),
(436, 'Taman TTDI Jaya', 11),
(437, 'Tanjong Karang', 11),
(438, 'Tanjong Sepat', 11),
(439, 'Telok Panglima Garang', 11),
(440, 'Tropicana', 11),
(441, 'Ulu Klang', 11),
(442, 'USJ', 11),
(443, 'USJ Heights', 11),
(444, 'Valencia', 11),
(445, 'Ajil', 12),
(446, 'Al Muktatfi Billah Shah', 12),
(447, 'Ayer Puteh', 12),
(448, 'Bukit Besi', 12),
(449, 'Bukit Payong', 12),
(450, 'Ceneh', 12),
(451, 'Chalok', 12),
(452, 'Cukai', 12),
(453, 'Dungun', 12),
(454, 'Jerteh', 12),
(455, 'Kampung Raja', 12),
(456, 'Kemaman', 12),
(457, 'Kemasek', 12),
(458, 'Kerteh', 12),
(459, 'Ketengah Jaya', 12),
(460, 'Kijal', 12),
(461, 'Kuala Berang', 12),
(462, 'Kuala Besut', 12),
(463, 'Kuala Terengganu', 12),
(464, 'Marang', 12),
(465, 'Paka', 12),
(466, 'Permaisuri', 12),
(467, 'Sungai Tong', 12);

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE IF NOT EXISTS `bookmark` (
  `id` int(11) NOT NULL,
  `adId` int(11) NOT NULL,
  `usrId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servcat`
--

CREATE TABLE IF NOT EXISTS `servcat` (
  `id` int(11) NOT NULL,
  `nameE` varchar(255) NOT NULL,
  `nameM` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servcat`
--

INSERT INTO `servcat` (`id`, `nameE`, `nameM`) VALUES
(1, 'Renovation', ''),
(2, 'Air Conditioning', ''),
(3, 'Roofing', ''),
(4, 'Wiring', ''),
(5, 'Plumbing', ''),
(6, 'Cleaning', ''),
(7, 'Transport', ''),
(8, 'Events', ''),
(9, 'Tutoring', ''),
(10, 'Printing', ''),
(11, 'Tailor', ''),
(12, 'Pest Control', ''),
(13, 'Others', '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Kuala Lumpur'),
(5, 'Melaka'),
(6, 'Negeri Sembilan'),
(7, 'Pahang'),
(8, 'Perak'),
(9, 'Perlis'),
(10, 'Pulau Pinang'),
(11, 'Selangor'),
(12, 'Terengganu');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE IF NOT EXISTS `usr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(10) unsigned zerofill DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `createDT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adarea`
--
ALTER TABLE `adarea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adimg`
--
ALTER TABLE `adimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjob`
--
ALTER TABLE `adjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servcat`
--
ALTER TABLE `servcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adarea`
--
ALTER TABLE `adarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adimg`
--
ALTER TABLE `adimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adjob`
--
ALTER TABLE `adjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=468;
--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servcat`
--
ALTER TABLE `servcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
