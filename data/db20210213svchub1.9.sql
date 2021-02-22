-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+0000';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `days` varchar(255) NOT NULL,
  `timeStart` varchar(255) NOT NULL,
  `timeEnd` varchar(255) NOT NULL,
  `servCatId` int NOT NULL,
  `usrId` int NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `quality` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `usage` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `quantity` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `createDT` timestamp NOT NULL,
  `updateDT` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ad` (`id`, `title`, `description`, `days`, `timeStart`, `timeEnd`, `servCatId`, `usrId`, `status`, `quality`, `usage`, `quantity`, `createDT`, `updateDT`) VALUES
(1,	'set meja makan terpakai dengan empat kerusi',	'abcbr123brdefbr456brghibr789',	'1,2,3,4,5,6,7',	'1.00 AM',	'1.00 AM',	2,	1,	'active',	'',	'',	'',	'2021-02-05 061238',	'2021-02-07 162213'),
(2,	'Produk Kecantikan',	'b',	'1',	'12.00 PM',	'12.00 PM',	2,	1,	'active',	'',	'',	'',	'2021-02-05 172300',	NULL),
(3,	'title test',	'title desc',	'1,2,3,4,5,6,7',	'9.00 PM',	'9.00 PM',	2,	2,	'inactive',	'',	'',	'',	'2021-02-07 183617',	NULL),
(4,	'x',	'x',	'1,2,3,4,5,6,7',	'7.00 PM',	'7.00 PM',	2,	1,	'inactive',	'',	'',	'',	'2021-02-09 100315',	NULL),
(5,	'qweqwe',	'qweqweqwe',	'1,2,3,4,5,6,7',	'6.00 PM',	'6.00 PM',	6,	1,	'inactive',	'',	'',	'',	'2021-02-09 140611',	NULL),
(6,	'Kontena',	'Kontena 2015, tiada kerosakan, cat baru',	'1,2,3,4,5',	'9.00 AM',	'6.00 PM',	13,	1,	'inactive',	'',	'',	'',	'2021-02-09 160530',	NULL),
(7,	'ccc',	'cascascascascas',	'1,2,3,4,5,6,7',	'6.00 PM',	'9.00 PM',	6,	1,	'inactive',	'',	'',	'',	'2021-02-09 160832',	NULL),
(8,	'Husna',	'Sharifah Husna Sakinah',	'1,2,3,4,5,6,7',	'8.00 PM',	'7.00 PM',	2,	1,	'active',	'',	'',	'',	'2021-02-10 041238',	NULL),
(9,	'Haris',	'Syed Ahmad Haris',	'1,2,3,4,5,6,7',	'7.00 PM',	'6.00 PM',	3,	1,	'active',	'',	'',	'',	'2021-02-10 041930',	NULL),
(10,	'xxx',	'xxx',	'1,2,3,4,5,6,7',	'6.00 PM',	'6.00 PM',	8,	1,	'inactive',	'',	'',	'',	'2021-02-10 055728',	NULL),
(11,	'ggg',	'gggg',	'1,2,3,4,5,6,7',	'7.00 PM',	'6.00 PM',	2,	1,	'inactive',	'',	'',	'',	'2021-02-10 090136',	NULL),
(12,	'ggg',	'gggg',	'1,2,3,4,5,6,7',	'7.00 PM',	'6.00 PM',	2,	1,	'inactive',	'',	'',	'',	'2021-02-10 090156',	NULL),
(13,	'ggg',	'gggg',	'1,2,3,4,5,6,7',	'7.00 PM',	'6.00 PM',	2,	1,	'inactive',	'',	'',	'',	'2021-02-10 090223',	NULL),
(14,	'ggg',	'gggg',	'1,2,3,4,5,6,7',	'7.00 PM',	'6.00 PM',	2,	1,	'inactive',	'',	'',	'',	'2021-02-10 090233',	NULL),
(15,	'Seorang budak bernama haris',	'budak ini budak baik.. dia dengar cakap abi dan umi dia..',	'1,2,3,4,5',	'8.00 AM',	'6.00 PM',	6,	1,	'active',	'',	'',	'',	'2021-02-11 051419',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `title` = VALUES(`title`), `description` = VALUES(`description`), `days` = VALUES(`days`), `timeStart` = VALUES(`timeStart`), `timeEnd` = VALUES(`timeEnd`), `servCatId` = VALUES(`servCatId`), `usrId` = VALUES(`usrId`), `status` = VALUES(`status`), `quality` = VALUES(`quality`), `usage` = VALUES(`usage`), `quantity` = VALUES(`quantity`), `createDT` = VALUES(`createDT`), `updateDT` = VALUES(`updateDT`);

DROP TABLE IF EXISTS `adarea`;
CREATE TABLE `adarea` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adId` int NOT NULL,
  `areaId` int NOT NULL,
  `stateId` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `adarea` (`id`, `adId`, `areaId`, `stateId`) VALUES
(323,	3,	1,	1),
(327,	6,	426,	11),
(328,	7,	3,	1),
(329,	4,	0,	1),
(332,	5,	2,	1),
(396,	9,	54,	2),
(399,	8,	1,	1),
(437,	10,	3,	1),
(467,	11,	1,	1),
(469,	12,	1,	1),
(470,	13,	1,	1),
(471,	14,	1,	1),
(476,	1,	1,	1),
(477,	1,	2,	1),
(478,	1,	3,	1),
(480,	15,	426,	11),
(481,	2,	463,	12)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `adId` = VALUES(`adId`), `areaId` = VALUES(`areaId`), `stateId` = VALUES(`stateId`);

DROP TABLE IF EXISTS `adimg`;
CREATE TABLE `adimg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `path` text NOT NULL,
  `adId` int NOT NULL,
  `pos` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `adimg` (`id`, `name`, `path`, `adId`, `pos`, `size`) VALUES
(15,	'bookmarkcheck.png',	'adData3bookmarkcheck.png',	3,	'1',	'673'),
(17,	'blankimgOld.png',	'adData1blankimgOld.png',	1,	'2',	'350'),
(19,	'arrowleft48b.png',	'adData5arrowleft48b.png',	5,	'2',	'275'),
(20,	'IMG-20160505-WA0023.jpg',	'adData6IMG-20160505-WA0023.jpg',	6,	'1',	'85813'),
(21,	'IMG-20160505-WA0040.jpg',	'adData6IMG-20160505-WA0040.jpg',	6,	'2',	'133610'),
(22,	'1462694597741-1798206964.jpg',	'adData71462694597741-1798206964.jpg',	7,	'1',	'8464'),
(23,	'P_20160207_115051_1_p.jpg',	'adData4P_20160207_115051_1_p.jpg',	4,	'1',	'17637'),
(25,	'IMG-20160503-WA0023.jpg',	'adData2IMG-20160503-WA0023.jpg',	2,	'1',	'19537'),
(26,	'IMG_20160505_124837.jpg',	'adData5IMG_20160505_124837.jpg',	5,	'1',	'34012'),
(27,	'FB_IMG_1462709269817.jpg',	'adData1FB_IMG_1462709269817.jpg',	1,	'1',	'29320'),
(28,	'00100sPORTRAIT_00100_BURST20180802221601344_COVER.jpg',	'adData800100sPORTRAIT_00100_BURST20180802221601344_COVER.jpg',	8,	'1',	'953303'),
(33,	'abc.jpg',	'adData9abc.jpg',	9,	'1',	'4635656'),
(34,	'00100sPORTRAIT_00100_BURST20200408203639375_COVER.jpg',	'adData900100sPORTRAIT_00100_BURST20200408203639375_COVER.jpg',	9,	'2',	'4653063'),
(35,	'00100sPORTRAIT_00100_BURST20200408202436236_COVER.jpg',	'adData900100sPORTRAIT_00100_BURST20200408202436236_COVER.jpg',	9,	'3',	'5636109'),
(36,	'00100sPORTRAIT_00100_BURST20200408202316126_COVER.jpg',	'adData900100sPORTRAIT_00100_BURST20200408202316126_COVER.jpg',	9,	'4',	'5508257'),
(37,	'00100sPORTRAIT_00100_BURST20200408203907513_COVER.jpg',	'adData900100sPORTRAIT_00100_BURST20200408203907513_COVER.jpg',	9,	'5',	'5264468'),
(38,	'IMG_20200314_183208.jpg',	'adData8IMG_20200314_183208.jpg',	8,	'2',	'3242711'),
(39,	'us.jpg',	'adData8us.jpg',	8,	'3',	'1068296'),
(40,	'us.jpg',	'adData8us.jpg',	8,	'4',	'1068296'),
(41,	'us.jpg',	'adData8us.jpg',	8,	'5',	'1068296'),
(42,	'00100sPORTRAIT_00100_BURST20200408202316126_COVER.jpg',	'adData1000100sPORTRAIT_00100_BURST20200408202316126_COVER.jpg',	10,	'1',	'5508257'),
(43,	'00100sPORTRAIT_00100_BURST20200408202436236_COVER.jpg',	'adData1000100sPORTRAIT_00100_BURST20200408202436236_COVER.jpg',	10,	'2',	'5636109'),
(44,	'avatar_alien.png',	'adData10avatar_alien.png',	10,	'3',	'15152'),
(45,	'avatar_flower.png',	'adData10avatar_flower.png',	10,	'4',	'17426'),
(46,	'FxCam_1254406510344.jpg',	'adData11FxCam_1254406510344.jpg',	11,	'1',	'81978'),
(47,	'2009-09-30 22.21.57.jpg',	'adData112009-09-30 22.21.57.jpg',	11,	'2',	'114295'),
(53,	'2009-09-24 19.16.57.jpg',	'adData122009-09-24 19.16.57.jpg',	12,	'1',	'131431'),
(54,	'2009-10-06 20.24.47.jpg',	'adData122009-10-06 20.24.47.jpg',	12,	'2',	'190029'),
(55,	'2009-10-07 19.45.27.jpg',	'adData122009-10-07 19.45.27.jpg',	12,	'3',	'200687'),
(56,	'2009-09-30 16.42.20.jpg',	'adData122009-09-30 16.42.20.jpg',	12,	'4',	'187060'),
(57,	'IMG_20101026_191815.jpg',	'adData12IMG_20101026_191815.jpg',	12,	'5',	'219335'),
(58,	'IMG_20110219_152836.jpg',	'adData13IMG_20110219_152836.jpg',	13,	'1',	'158697'),
(59,	'IMG_20110123_212051.jpg',	'adData13IMG_20110123_212051.jpg',	13,	'2',	'148131'),
(60,	'2009-09-24 20.32.58.jpg',	'adData132009-09-24 20.32.58.jpg',	13,	'3',	'108221'),
(61,	'2009-09-25 11.38.50.jpg',	'adData132009-09-25 11.38.50.jpg',	13,	'4',	'150084'),
(62,	'IMG_20110122_115912.jpg',	'adData13IMG_20110122_115912.jpg',	13,	'5',	'212485'),
(63,	'FB_IMG_1462709269817.jpg',	'adData14FB_IMG_1462709269817.jpg',	14,	'1',	'28354'),
(64,	'0d47ff.jpeg',	'adData150d47ff.jpeg',	15,	'1',	'62016'),
(65,	'0420ee.jpeg',	'adData150420ee.jpeg',	15,	'2',	'46020'),
(66,	'IMG-20201220-WA0003.jpg',	'adData15IMG-20201220-WA0003.jpg',	15,	'3',	'55733'),
(67,	'IMG_20210201_183425.jpg',	'adData15IMG_20210201_183425.jpg',	15,	'4',	'636864'),
(68,	'IMG-20201220-WA0003.jpg',	'adData15IMG-20201220-WA0003.jpg',	15,	'5',	'55733')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `path` = VALUES(`path`), `adId` = VALUES(`adId`), `pos` = VALUES(`pos`), `size` = VALUES(`size`);

DROP TABLE IF EXISTS `adjob`;
CREATE TABLE `adjob` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adId` int NOT NULL,
  `job` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `adjob` (`id`, `adId`, `job`, `price`) VALUES
(323,	3,	'serv 1',	'1'),
(326,	6,	'Kontena',	'500'),
(327,	7,	'asd',	'12'),
(330,	5,	'q',	'12'),
(394,	9,	'a',	'a'),
(397,	8,	'a',	'a'),
(435,	10,	'x',	'x'),
(465,	11,	'123',	'123'),
(467,	12,	'123',	'123'),
(468,	13,	'123',	'123'),
(469,	14,	'123',	'123'),
(472,	1,	'a',	'a'),
(476,	15,	'kemas rumah',	'20'),
(477,	15,	'sapu lantai',	'10'),
(478,	15,	'makan',	'5'),
(479,	2,	'b',	'2')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `adId` = VALUES(`adId`), `job` = VALUES(`job`), `price` = VALUES(`price`);

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `stateId` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `area` (`id`, `name`, `stateId`) VALUES
(1,	'Ayer Baloi',	1),
(2,	'Ayer Hitam',	1),
(3,	'Bandar Penawar',	1),
(4,	'Bandar Tenggara',	1),
(5,	'Batu Anam',	1),
(6,	'Batu Pahat',	1),
(7,	'Bekok',	1),
(8,	'Benut',	1),
(9,	'Bukit Gambir',	1),
(10,	'Bukit Pasir',	1),
(11,	'Chaah',	1),
(12,	'Endau',	1),
(13,	'Gelang Patah',	1),
(14,	'Gerisek',	1),
(15,	'Gugusan Taib Andak',	1),
(16,	'Jementah',	1),
(17,	'Johor Bharu',	1),
(18,	'Kahang',	1),
(19,	'Kluang',	1),
(20,	'Kota Tinggi',	1),
(21,	'Kukup',	1),
(22,	'Kulai',	1),
(23,	'Labis',	1),
(24,	'Layang-Layang',	1),
(25,	'Masai',	1),
(26,	'Mersing',	1),
(27,	'Mersing',	1),
(28,	'Muar',	1),
(29,	'Nusajaya',	1),
(30,	'Pagoh',	1),
(31,	'Paloh',	1),
(32,	'Panchor',	1),
(33,	'Parit Jawa',	1),
(34,	'Parit Raja',	1),
(35,	'Parit Sulong',	1),
(36,	'Pasir Gudang',	1),
(37,	'Pekan Nenas',	1),
(38,	'Pengerang',	1),
(39,	'Pontian',	1),
(40,	'Rengam',	1),
(41,	'Rengit',	1),
(42,	'Segamat',	1),
(43,	'Semerah',	1),
(44,	'Senai',	1),
(45,	'Senggarang',	1),
(46,	'Seri Gading',	1),
(47,	'Seri Medan',	1),
(48,	'Simpang Rengam',	1),
(49,	'Sungai Mati',	1),
(50,	'Tangkak',	1),
(51,	'Ulu Tiram',	1),
(52,	'Yong Peng',	1),
(53,	'Alor Setar',	2),
(54,	'Ayer Hitam',	2),
(55,	'Baling',	2),
(56,	'Bandar Baharu',	2),
(57,	'Bedong',	2),
(58,	'Bukit Kayu Hitam',	2),
(59,	'Changloon',	2),
(60,	'Gurun',	2),
(61,	'Jeniang',	2),
(62,	'Jitra',	2),
(63,	'Karangan',	2),
(64,	'Kepala Batas',	2),
(65,	'Kodiang',	2),
(66,	'Kota Kuala Muda',	2),
(67,	'Kota Sarang Semut',	2),
(68,	'Kuala Kedah',	2),
(69,	'Kuala Ketil',	2),
(70,	'Kuala Nerang',	2),
(71,	'Kuala Pegang',	2),
(72,	'Kulim',	2),
(73,	'Kupang',	2),
(74,	'Langgar',	2),
(75,	'Lunas',	2),
(76,	'Merbok',	2),
(77,	'Padang Serai',	2),
(78,	'Pendang',	2),
(79,	'Pokok Sena',	2),
(80,	'Serdang',	2),
(81,	'Sik',	2),
(82,	'Simpang Empat',	2),
(83,	'Sungai Petani',	2),
(84,	'Yan',	2),
(85,	'Ayer Lanas',	3),
(86,	'Bachok',	3),
(87,	'Cherang Ruku',	3),
(88,	'Dabong',	3),
(89,	'Gua Musang',	3),
(90,	'Jeli',	3),
(91,	'Kem Desa Pahlawan',	3),
(92,	'Ketereh',	3),
(93,	'Kota Bharu',	3),
(94,	'Kuala Balah',	3),
(95,	'Kuala Krai',	3),
(96,	'Machang',	3),
(97,	'Melor',	3),
(98,	'Pasir  Mas',	3),
(99,	'Pasir Puteh',	3),
(100,	'Pulai Chondong',	3),
(101,	'Rantau Panjang',	3),
(102,	'Selising',	3),
(103,	'Tanah Merah',	3),
(104,	'Temangan',	3),
(105,	'Tumpat',	3),
(106,	'Wakaf Bharu',	3),
(107,	'Ampang Hilir',	4),
(108,	'Bandar Damai Perdana',	4),
(109,	'Bandar Manjalara',	4),
(110,	'Bandar Sri Damansara',	4),
(111,	'Bandar Tasik Selatan',	4),
(112,	'Bandar Tun Razak',	4),
(113,	'Bangsar',	4),
(114,	'Bangsar South',	4),
(115,	'Batu',	4),
(116,	'Brickfields',	4),
(117,	'Bukit Bintang',	4),
(118,	'Bukit Jalil',	4),
(119,	'Bukit Ledang',	4),
(120,	'Bukit Persekutuan (Federal Hill)',	4),
(121,	'Bukit Tunku (Kenny Hills)',	4),
(122,	'Cheras',	4),
(123,	'Country Heights Damansara',	4),
(124,	'Damansara',	4),
(125,	'Damansara Heights',	4),
(126,	'Desa Pandan',	4),
(127,	'Desa Park City',	4),
(128,	'Desa Petaling',	4),
(129,	'Jalan Klang Lama (Old Klang Road)',	4),
(130,	'Jalan Sultan Ismail',	4),
(131,	'Jinjang',	4),
(132,	'Kepong',	4),
(133,	'Keramat',	4),
(134,	'KL Sentral',	4),
(135,	'KLCC',	4),
(136,	'Kuala Lumpur',	4),
(137,	'Kuchai Lama',	4),
(138,	'Lembah Pantai',	4),
(139,	'Mid Valley City',	4),
(140,	'Mont Kiara',	4),
(141,	'OUG',	4),
(142,	'Pandan Indah',	4),
(143,	'Pandan Jaya',	4),
(144,	'Pandan Perdana',	4),
(145,	'Pantai',	4),
(146,	'Pekan Batu',	4),
(147,	'Salak Selatan',	4),
(148,	'Segambut',	4),
(149,	'Sentul',	4),
(150,	'Seputeh',	4),
(151,	'Setapak',	4),
(152,	'Setiawangsa',	4),
(153,	'Solaris Dutamas',	4),
(154,	'Sri Hartamas',	4),
(155,	'Sri Petaling',	4),
(156,	'Sungai Besi',	4),
(157,	'Sungai Penchala',	4),
(158,	'Taman Desa',	4),
(159,	'Taman Duta',	4),
(160,	'Taman Melawati',	4),
(161,	'Taman Tun Dr. Ismail',	4),
(162,	'Titiwangsa',	4),
(163,	'TPM',	4),
(164,	'Wangsa Maju',	4),
(165,	'Alor Gajah',	5),
(166,	'Asahan',	5),
(167,	'Ayer Keroh',	5),
(168,	'Bandar Melaka',	5),
(169,	'Bemban',	5),
(170,	'Durian Tunggal',	5),
(171,	'Jasin',	5),
(172,	'Kem Trendak',	5),
(173,	'Kuala Sungai Baru',	5),
(174,	'Lubok China',	5),
(175,	'Masjid Tanah',	5),
(176,	'Merlimau',	5),
(177,	'Selandar',	5),
(178,	'Sungai Rambai',	5),
(179,	'Sungai Udang',	5),
(180,	'Bahau',	6),
(181,	'Bandar Enstek',	6),
(182,	'Bandar Seri Jempol',	6),
(183,	'Batu Kikir',	6),
(184,	'Gemas',	6),
(185,	'Gemencheh',	6),
(186,	'Johol',	6),
(187,	'Kota',	6),
(188,	'Kuala Klawang',	6),
(189,	'Kuala Pilah',	6),
(190,	'Labu',	6),
(191,	'Linggi',	6),
(192,	'Mantin',	6),
(193,	'Nilai',	6),
(194,	'Port Dickson',	6),
(195,	'Pusat Bandar Palong',	6),
(196,	'Rantau',	6),
(197,	'Rembau',	6),
(198,	'Rompin',	6),
(199,	'Seremban',	6),
(200,	'Si Rusa',	6),
(201,	'Simpang Durian',	6),
(202,	'Simpang Pertang',	6),
(203,	'Tampin',	6),
(204,	'Tanjong Ipoh',	6),
(205,	'Balok',	7),
(206,	'Bandar Bera',	7),
(207,	'Bandar Pusat Jengka',	7),
(208,	'Bandar Tun Abdul Razak',	7),
(209,	'Benta',	7),
(210,	'Bentong',	7),
(211,	'Brinchang',	7),
(212,	'Bukit Fraser',	7),
(213,	'Bukit Goh',	7),
(214,	'Chenor',	7),
(215,	'Chini',	7),
(216,	'Damak',	7),
(217,	'Dong',	7),
(218,	'Gambang',	7),
(219,	'Genting Highlands',	7),
(220,	'Jerantut',	7),
(221,	'Karak',	7),
(222,	'Kemayan',	7),
(223,	'Kuala Krau',	7),
(224,	'Kuala Lipis',	7),
(225,	'Kuala Rompin',	7),
(226,	'Kuantan',	7),
(227,	'Lanchang',	7),
(228,	'Lurah Bilut',	7),
(229,	'Maran',	7),
(230,	'Mentakab',	7),
(231,	'Muadzam Shah',	7),
(232,	'Padang Tengku',	7),
(233,	'Pekan',	7),
(234,	'Raub',	7),
(235,	'Ringlet',	7),
(236,	'Sega',	7),
(237,	'Sungai Lembing',	7),
(238,	'Tanah Rata',	7),
(239,	'Temerloh',	7),
(240,	'Triang',	7),
(241,	'Ayer Tawar',	8),
(242,	'Bagan Datoh',	8),
(243,	'Bagan Serai',	8),
(244,	'Bandar Seri Iskandar',	8),
(245,	'Batu Gajah',	8),
(246,	'Batu Kurau',	8),
(247,	'Behrang Stesen',	8),
(248,	'Bidor',	8),
(249,	'Bota',	8),
(250,	'Bruas',	8),
(251,	'Cameron Highlands',	8),
(252,	'Changkat Jering',	8),
(253,	'Changkat Keruing',	8),
(254,	'Chemor',	8),
(255,	'Chenderiang',	8),
(256,	'Chenderong Balai',	8),
(257,	'Chikus',	8),
(258,	'Enggor',	8),
(259,	'Gerik',	8),
(260,	'Gopeng',	8),
(261,	'Hutan Melintang',	8),
(262,	'Intan',	8),
(263,	'Ipoh',	8),
(264,	'Jeram',	8),
(265,	'Kampar',	8),
(266,	'Kampung Gajah',	8),
(267,	'Kampung Kepayang',	8),
(268,	'Kamunting',	8),
(269,	'Kuala Kangsar',	8),
(270,	'Kuala Kurau',	8),
(271,	'Kuala Sepetang',	8),
(272,	'Lambor Kanan',	8),
(273,	'Langkap',	8),
(274,	'Lenggong',	8),
(275,	'Lumut',	8),
(276,	'Malim Nawar',	8),
(277,	'Manong',	8),
(278,	'Matang',	8),
(279,	'Padang Rengas',	8),
(280,	'Pangkor',	8),
(281,	'Pantai Remis',	8),
(282,	'Parit',	8),
(283,	'Parit Buntar',	8),
(284,	'Pengkalan Hulu',	8),
(285,	'Pusing',	8),
(286,	'Rantau Panjang',	8),
(287,	'Sauk',	8),
(288,	'Selama',	8),
(289,	'Selekoh',	8),
(290,	'Seri Manjong',	8),
(291,	'Setiawan',	8),
(292,	'Simpang',	8),
(293,	'Slim River',	8),
(294,	'Sungai Siput',	8),
(295,	'Sungai Sumun',	8),
(296,	'Sungkai',	8),
(297,	'Taiping',	8),
(298,	'Tanjong Malim',	8),
(299,	'Tanjong Piandang',	8),
(300,	'Tanjong Rambutan',	8),
(301,	'Tanjong Tualang',	8),
(302,	'Tapah',	8),
(303,	'Tapah Road',	8),
(304,	'Teluk Intan',	8),
(305,	'Temoh',	8),
(306,	'TLDM Lumut',	8),
(307,	'Trolak',	8),
(308,	'Trong',	8),
(309,	'Tronoh',	8),
(310,	'Ulu Bernam',	8),
(311,	'Ulu Kinta',	8),
(312,	'Arau',	9),
(313,	'Kaki Bukit',	9),
(314,	'Kangar',	9),
(315,	'Kuala Perlis',	9),
(316,	'Padang Besar',	9),
(317,	'Ayer Itam',	10),
(318,	'Balik Pulau',	10),
(319,	'Batu Ferringhi',	10),
(320,	'Batu Maung',	10),
(321,	'Bayan Lepas',	10),
(322,	'Bukit Mertajam',	10),
(323,	'Butterworth',	10),
(324,	'Gelugor',	10),
(325,	'George Town',	10),
(326,	'Jelutong',	10),
(327,	'Juru',	10),
(328,	'Kepala Batas',	10),
(329,	'Kubang Semang',	10),
(330,	'Nibong Tebal',	10),
(331,	'Penaga',	10),
(332,	'Peneng Hill',	10),
(333,	'Perai',	10),
(334,	'Permatang Pauh',	10),
(335,	'Pulau Pinang',	10),
(336,	'Seberang Perai',	10),
(337,	'Simpang Ampat',	10),
(338,	'Sungai Jawi',	10),
(339,	'Tanjong Bungah',	10),
(340,	'Tasek Gelugor',	10),
(341,	'Alam Impian',	11),
(342,	'Alam Perdana',	11),
(343,	'Ambang Botanic',	11),
(344,	'Ampang',	11),
(345,	'Ara Damansara',	11),
(346,	'Balakong',	11),
(347,	'Bandar Baru Bangi',	11),
(348,	'Bandar Botanic',	11),
(349,	'Bandar Bukit Raja',	11),
(350,	'Bandar Bukit Tinggi',	11),
(351,	'Bandar Kinrara',	11),
(352,	'Bandar Puncak Alam',	11),
(353,	'Bandar Puteri Klang',	11),
(354,	'Bandar Puteri Puchong',	11),
(355,	'Bandar Saujana Putra',	11),
(356,	'Bandar Sungai Long',	11),
(357,	'Bandar Sunway',	11),
(358,	'Bandar Utama',	11),
(359,	'Bangi',	11),
(360,	'Banting',	11),
(361,	'Batang Berjuntai',	11),
(362,	'Batang Kali',	11),
(363,	'Batu Arang',	11),
(364,	'Batu Caves',	11),
(365,	'Beranang',	11),
(366,	'Bukit Antarabangsa',	11),
(367,	'Bukit Jelutong',	11),
(368,	'Bukit Rahman Putra',	11),
(369,	'Bukit Rotan',	11),
(370,	'Bukit Subang',	11),
(371,	'Country Heights',	11),
(372,	'Cyberjaya',	11),
(373,	'Damansara Damai',	11),
(374,	'Damansara Intan',	11),
(375,	'Damansara Jaya',	11),
(376,	'Damansara Kim',	11),
(377,	'Damansara Perdana',	11),
(378,	'Damansara Utama',	11),
(379,	'Denai Alam',	11),
(380,	'Dengkil',	11),
(381,	'Glenmarie',	11),
(382,	'Gombak',	11),
(383,	'Hulu Langat',	11),
(384,	'Hulu Selangor',	11),
(385,	'Jenjarom',	11),
(386,	'Jeram',	11),
(387,	'Kajang',	11),
(388,	'Kapar',	11),
(389,	'Kayu Ara',	11),
(390,	'Kelana Jaya',	11),
(391,	'Kerling',	11),
(392,	'Klang',	11),
(393,	'KLIA',	11),
(394,	'Kota Damansara',	11),
(395,	'Kota Emerald',	11),
(396,	'Kota Kemuning',	11),
(397,	'Kuala Kubu Baru',	11),
(398,	'Kuala Langat',	11),
(399,	'Kuala Selangor',	11),
(400,	'Kuang',	11),
(401,	'Mutiara Damansara',	11),
(402,	'Petaling',	11),
(403,	'Petaling Jaya',	11),
(404,	'Port Klang',	11),
(405,	'Puchong',	11),
(406,	'Puchong South',	11),
(407,	'Pulau Carey',	11),
(408,	'Pulau Indah (Pulau Lumut)',	11),
(409,	'Pulau Ketam',	11),
(410,	'Puncak Jalil',	11),
(411,	'Putra Heights',	11),
(412,	'Putrajaya',	11),
(413,	'Rasa',	11),
(414,	'Rawang',	11),
(415,	'Sabak Bernam',	11),
(416,	'Saujana',	11),
(417,	'Sekinchan',	11),
(418,	'Selayang',	11),
(419,	'Semenyih',	11),
(420,	'Sepang',	11),
(421,	'Serdang',	11),
(422,	'Serendah',	11),
(423,	'Seri Kembangan',	11),
(424,	'Setia Alam',	11),
(425,	'Setia Eco Park',	11),
(426,	'Shah Alam',	11),
(427,	'SierraMas',	11),
(428,	'SS2',	11),
(429,	'Subang Bestari',	11),
(430,	'Subang Heights',	11),
(431,	'Subang Jaya',	11),
(432,	'Sungai Ayer Tawar',	11),
(433,	'Sungai Besar',	11),
(434,	'Sungai Buloh',	11),
(435,	'Sungai Pelek',	11),
(436,	'Taman TTDI Jaya',	11),
(437,	'Tanjong Karang',	11),
(438,	'Tanjong Sepat',	11),
(439,	'Telok Panglima Garang',	11),
(440,	'Tropicana',	11),
(441,	'Ulu Klang',	11),
(442,	'USJ',	11),
(443,	'USJ Heights',	11),
(444,	'Valencia',	11),
(445,	'Ajil',	12),
(446,	'Al Muktatfi Billah Shah',	12),
(447,	'Ayer Puteh',	12),
(448,	'Bukit Besi',	12),
(449,	'Bukit Payong',	12),
(450,	'Ceneh',	12),
(451,	'Chalok',	12),
(452,	'Cukai',	12),
(453,	'Dungun',	12),
(454,	'Jerteh',	12),
(455,	'Kampung Raja',	12),
(456,	'Kemaman',	12),
(457,	'Kemasek',	12),
(458,	'Kerteh',	12),
(459,	'Ketengah Jaya',	12),
(460,	'Kijal',	12),
(461,	'Kuala Berang',	12),
(462,	'Kuala Besut',	12),
(463,	'Kuala Terengganu',	12),
(464,	'Marang',	12),
(465,	'Paka',	12),
(466,	'Permaisuri',	12),
(467,	'Sungai Tong',	12)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `stateId` = VALUES(`stateId`);

DROP TABLE IF EXISTS `bookmark`;
CREATE TABLE `bookmark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adId` int NOT NULL,
  `usrId` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bookmark` (`id`, `adId`, `usrId`) VALUES
(105,	8,	1),
(106,	9,	1),
(112,	15,	1),
(113,	10,	1)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `adId` = VALUES(`adId`), `usrId` = VALUES(`usrId`);

DROP TABLE IF EXISTS `servcat`;
CREATE TABLE `servcat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameE` varchar(255) NOT NULL,
  `nameM` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `servcat` (`id`, `nameE`, `nameM`) VALUES
(1,	'Renovation',	''),
(2,	'Air Conditioning',	''),
(3,	'Roofing',	''),
(4,	'Wiring',	''),
(5,	'Plumbing',	''),
(6,	'Cleaning',	''),
(7,	'Transport',	''),
(8,	'Events',	''),
(9,	'Tutoring',	''),
(10,	'Printing',	''),
(11,	'Tailor',	''),
(12,	'Pest Control',	''),
(13,	'Others',	'')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `nameE` = VALUES(`nameE`), `nameM` = VALUES(`nameM`);

DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `state` (`id`, `name`) VALUES
(1,	'Johor'),
(2,	'Kedah'),
(3,	'Kelantan'),
(4,	'Kuala Lumpur'),
(5,	'Melaka'),
(6,	'Negeri Sembilan'),
(7,	'Pahang'),
(8,	'Perak'),
(9,	'Perlis'),
(10,	'Pulau Pinang'),
(11,	'Selangor'),
(12,	'Terengganu')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`);

DROP TABLE IF EXISTS `usr`;
CREATE TABLE `usr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'en',
  `phone` int(10) unsigned zerofill DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ssm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `chkssm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `company` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `createDT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usr` (`id`, `name`, `email`, `password`, `lang`, `phone`, `pic`, `ssm`, `chkssm`, `company`, `createDT`) VALUES
(1,	'Syed Hamdi',	'a@a.com',	'0cc175b9c0f1b6a831c399e269772661',	'bm',	0176734970,	NULL,	'b',	NULL,	'b',	'2021-02-05 061201'),
(2,	'userTest1',	'c@c.com',	'0cc175b9c0f1b6a831c399e269772661',	'en',	0123456789,	NULL,	'',	NULL,	'',	'2021-02-07 183458'),
(3,	'b',	'b@b.com',	'92eb5ffee6ae2fec3ad71c777531578f',	'en',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-02-09 195219')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `email` = VALUES(`email`), `password` = VALUES(`password`), `lang` = VALUES(`lang`), `phone` = VALUES(`phone`), `pic` = VALUES(`pic`), `ssm` = VALUES(`ssm`), `chkssm` = VALUES(`chkssm`), `company` = VALUES(`company`), `createDT` = VALUES(`createDT`);

-- 2021-02-13 054753