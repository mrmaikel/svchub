# MySQL dump of database 'servishu_svchub' on host 'localhost'
# backup date and time: 16.05.2016 20:45 Uhr
# built by phpMyBackupPro 2.5
# http://www.phpMyBackupPro.net

### used character set: utf8 ###
set names utf8;

CREATE DATABASE IF NOT EXISTS `servishu_svchub`;

USE `servishu_svchub`;

### drop all tables first ###

DROP TABLE IF EXISTS `usr`;
DROP TABLE IF EXISTS `state`;
DROP TABLE IF EXISTS `servcat`;
DROP TABLE IF EXISTS `bookmark`;
DROP TABLE IF EXISTS `area`;
DROP TABLE IF EXISTS `adjob`;
DROP TABLE IF EXISTS `adimg`;
DROP TABLE IF EXISTS `adarea`;
DROP TABLE IF EXISTS `ad`;


### structure of table `ad` ###

CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `days` varchar(255) NOT NULL,
  `timeStart` varchar(255) NOT NULL,
  `timeEnd` varchar(255) NOT NULL,
  `servCatId` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `createDT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateDT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 AUTO_INCREMENT=22;


### data of table `ad` ###

insert into `ad` values ('10', 'Pembekal Ikan Rebus Dan Ikan Pekasam Tanpa Isi Perut', 'Kami memprocess dan membekal ikan rebus dan ikan pekasam tanpa isi perut.<br><br>Kami Juga mencari pekedai yang ingin menjual product kami.<br><br>100% muslim homemade<br><br>Boleh berjumpa terus dengan kami di pasar tani Putra Heights, Subang Jaya. Setiap Ahad, jam 7:00am - 12:00pm<br><br>Atau hubungi En. Hassan', '1,2,3,4,5,7', '0', '0', '13', '12', '2016-04-22 10:39:18', '2016-04-24 13:22:41');
insert into `ad` values ('11', 'Goodies //// cenderahati ', 'menerima tempahan goodies //// cenderahati perkahwinan////majlis aqiqah//// birthday party////dan sebagainya.', '1,2,3,4,5,6', '8.00 AM', '6.00 PM', '17', '13', '2016-04-26 10:45:37', null);
insert into `ad` values ('12', 'Mural // Graffiti // Airbrush Wall Art Painting Services', 'Wall Decor <br>from simple and attractive design to highly detail design painting on wall. bringing good vibe to your office, shop, mall, home, childs room, living room, kitchen, hospital, etc..<br>Canvas art<br>Freehand airbrushing potrait, landscape design by request custom on canvas', '1,2,3,4,5,6,7', '0', '0', '18', '15', '2016-04-27 00:57:19', null);
insert into `ad` values ('13', 'Pixel Touch : Percetakan Digital dan Inkjet', 'Menyediakan perkhidmatan percetakan dan pengiklanan ', '1,2,3,4,5,6,7', '8.00 AM', '10.00 PM', '18', '17', '2016-04-27 13:00:59', null);
insert into `ad` values ('14', 'Kontena ', 'we supply kontena and construction to built Kontena', '1,2,3,4,5,6,7', '0', '0', '13', '18', '2016-05-05 16:02:48', null);
insert into `ad` values ('15', 'Ais cream goyang & kek moist coklat murah', 'Assalmualaikm kami ada menyediakan perkhidmatan dan mengambil tempahan   AIS CREAM GOYANG TOK BAH & KEK MOIST COKLAT MURAH<br><br>&#127881;Tempahan untk majlis hari jadi<br>&#127881;Majlis perkahwinan<br>&#127881;kenduri akikah<br>&#127881;hari kantin, sukan sekolah dll..<br><br>Sebarang tempahan boleh hubungi saya..<br><br>', '6,7', '0', '0', '16', '19', '2016-05-08 16:07:16', null);
insert into `ad` values ('16', 'NURAYSA..BEAUTY SKINCARE', 'Asslmualaikm, NURAYSA Beautu skincare, adalah salah satu produk yg dihasilkn oleh orang islam dan disahkan halal, tidak ada bahan terlarang dan merbahaya...insyaallah tujuan utama..merawat dan membantu golongan yg ada masalah pnyakit kulit, dan sebagainya..produk yg sgt 2x terbaik kerana mesra wuduk, tanpa was2x..sesuai untk semua golongan..&#128536;&#128536;<br><br>Boleh pm saya bagi yg berminat. .', '1,2,3,4,5,6,7', '0', '0', '16', '19', '2016-05-08 16:25:04', null);
insert into `ad` values ('17', 'POWERGOLD AIN', '&#127800;website powergold saya <br>www.lubukemasmurah.com////Ain_2694<br><br>&#127800;whatapp saya////call mesej<br>601110686474<br><br>&#127800;telegram saya <br>@lubukemasain', '1,2,3,4,5,6,7', '8.00 AM', '12.00 PM', '16', '20', '2016-05-08 17:17:41', null);
insert into `ad` values ('18', 'SAHAJIDAH HAI-O', 'Assalamualaikum , saya merupakan agent berdaftar bg produk Hai-o . Antara produknya Set Marine Essence (Beauty Bar , Shampoo , Body wash & Toothpaste) , Sabun pencuci Eziclean , Min Coffee dan sebagainya atas permintaan .<br><br>Berminat nak tahu lebih lanjut boleh whatsapp sy 017-3536358<br><br>Dengan RM50 anda boleh daftar sebagai agent sah dan akan di guide oleh pakar . TQia .', '6,7', '0', '0', '16', '21', '2016-05-08 20:18:46', null);
insert into `ad` values ('19', 'Pest Control // anai2, semut, tikus', 'Menjalankan kerja2 membasmi serangga perosak di kawasan anda pada harga berpatutan.<br><br>Service dilendali juruteknik berpengalaman dan berlesen.<br><br>Service berkualiti setaraf syarikat ternama yang lain.<br><br>Hubungi <br>01126265227', '1,2,3,4,5,6,7', '7.00 AM', '7.00 PM', '12', '22', '2016-05-08 20:39:39', null);
insert into `ad` values ('20', 'DROPSHIP PAKAIAN', 'Assalamualaikum , saya agent sah bagi dropship pakaian .<br><br>Boleh add friend fb saya Cahaya Kejayaan untuk update koleksi terkini dan mampu milik standard butik .<br><br>TQ .', '1,2,3,4,5,6,7', '0', '0', '16', '21', '2016-05-08 21:36:38', null);
insert into `ad` values ('21', 'KHIDMAT MENGASUH', 'Assalamualaikum , saya menyediakan khidmat mengasuh anak .<br><br>Lokasi : Kg kuala sg baru , batu 13 , puchong<br>Waktu////Hari : Office hour////Weekdays (weekend boleh bincang)<br>Umur : Prefer bayi 3bulan ke atas .<br><br>Boleh runding dgn saya . TQ', '1,2,3,4,5', '7.00 AM', '6.00 PM', '16', '21', '2016-05-08 21:41:15', null);


### structure of table `adarea` ###

CREATE TABLE `adarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adId` int(11) NOT NULL,
  `areaId` int(11) NOT NULL,
  `stateId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 AUTO_INCREMENT=61;


### data of table `adarea` ###

insert into `adarea` values ('44', '11', '434', '11');
insert into `adarea` values ('45', '10', '0', '11');
insert into `adarea` values ('46', '12', '0', '11');
insert into `adarea` values ('47', '13', '0', '11');
insert into `adarea` values ('48', '14', '0', '4');
insert into `adarea` values ('49', '14', '0', '1');
insert into `adarea` values ('50', '14', '0', '6');
insert into `adarea` values ('52', '16', '411', '11');
insert into `adarea` values ('55', '17', '426', '11');
insert into `adarea` values ('56', '18', '411', '11');
insert into `adarea` values ('57', '19', '405', '11');
insert into `adarea` values ('58', '15', '411', '11');
insert into `adarea` values ('59', '20', '405', '11');
insert into `adarea` values ('60', '21', '405', '11');


### structure of table `adimg` ###

CREATE TABLE `adimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `path` text NOT NULL,
  `adId` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 AUTO_INCREMENT=53;


### data of table `adimg` ###

insert into `adimg` values ('29', 'ikan rebus label.jpg', 'adData/10/ikan rebus label.jpg', '10', '1', '119857');
insert into `adimg` values ('30', 'ikan pekasam label.jpg', 'adData/10/ikan pekasam label.jpg', '10', '2', '131005');
insert into `adimg` values ('31', 'IMG-20160505-WA0040.jpg', 'adData/14/IMG-20160505-WA0040.jpg', '14', '1', '69808');
insert into `adimg` values ('32', 'IMG-20160505-WA0023.jpg', 'adData/14/IMG-20160505-WA0023.jpg', '14', '2', '115780');
insert into `adimg` values ('35', 'P_20151216_210238_1_p_1_1.jpg', 'adData/15/P_20151216_210238_1_p_1_1.jpg', '15', '3', '1024369');
insert into `adimg` values ('36', '1462694597741-1798206964.jpg', 'adData/15/1462694597741-1798206964.jpg', '15', '4', '869691');
insert into `adimg` values ('37', 'IMG-20160503-WA0023.jpg', 'adData/16/IMG-20160503-WA0023.jpg', '16', '1', '24549');
insert into `adimg` values ('38', 'IMG-20160503-WA0024.jpg', 'adData/16/IMG-20160503-WA0024.jpg', '16', '2', '175306');
insert into `adimg` values ('39', 'IMG-20160324-WA0016.jpg', 'adData/16/IMG-20160324-WA0016.jpg', '16', '3', '134488');
insert into `adimg` values ('40', 'FB_IMG_1461550580964.jpg', 'adData/16/FB_IMG_1461550580964.jpg', '16', '4', '54422');
insert into `adimg` values ('41', 'FB_IMG_1451831527931.jpg', 'adData/16/FB_IMG_1451831527931.jpg', '16', '5', '42920');
insert into `adimg` values ('42', 'IMG_20160505_114843.jpg', 'adData/17/IMG_20160505_114843.jpg', '17', '1', '159218');
insert into `adimg` values ('43', 'IMG_20160505_124837.jpg', 'adData/17/IMG_20160505_124837.jpg', '17', '2', '120446');
insert into `adimg` values ('44', 'FB_IMG_1462709530660.jpg', 'adData/18/FB_IMG_1462709530660.jpg', '18', '1', '16843');
insert into `adimg` values ('45', 'FB_IMG_1462709358592.jpg', 'adData/18/FB_IMG_1462709358592.jpg', '18', '2', '15584');
insert into `adimg` values ('46', 'FB_IMG_1462709273449.jpg', 'adData/18/FB_IMG_1462709273449.jpg', '18', '3', '32050');
insert into `adimg` values ('47', 'FB_IMG_1462709266268.jpg', 'adData/18/FB_IMG_1462709266268.jpg', '18', '4', '31011');
insert into `adimg` values ('48', 'FB_IMG_1462709269817.jpg', 'adData/18/FB_IMG_1462709269817.jpg', '18', '5', '35070');
insert into `adimg` values ('49', 'P_20160207_115051_1_p.jpg', 'adData/15/P_20160207_115051_1_p.jpg', '15', '1', '1340720');
insert into `adimg` values ('50', 'P_20151216_210238_1_p_1_1.jpg', 'adData/15/P_20151216_210238_1_p_1_1.jpg', '15', '2', '1024369');
insert into `adimg` values ('51', 'FB_IMG_1462714274930.jpg', 'adData/20/FB_IMG_1462714274930.jpg', '20', '1', '27010');
insert into `adimg` values ('52', 'FB_IMG_1462714239774.jpg', 'adData/20/FB_IMG_1462714239774.jpg', '20', '2', '21247');


### structure of table `adjob` ###

CREATE TABLE `adjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adId` int(11) NOT NULL,
  `job` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 AUTO_INCREMENT=28;


### data of table `adjob` ###

insert into `adjob` values ('25', '10', 'Ikan Kembong Rebus', '-');
insert into `adjob` values ('26', '10', 'Ikan Loma Pekasam', '-');
insert into `adjob` values ('27', '10', 'Pati Barli Pandan', '-');


### structure of table `area` ###

CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `stateId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=468 DEFAULT CHARSET=latin1 AUTO_INCREMENT=468;


### data of table `area` ###

insert into `area` values ('1', 'Ayer Baloi', '1');
insert into `area` values ('2', 'Ayer Hitam', '1');
insert into `area` values ('3', 'Bandar Penawar', '1');
insert into `area` values ('4', 'Bandar Tenggara', '1');
insert into `area` values ('5', 'Batu Anam', '1');
insert into `area` values ('6', 'Batu Pahat', '1');
insert into `area` values ('7', 'Bekok', '1');
insert into `area` values ('8', 'Benut', '1');
insert into `area` values ('9', 'Bukit Gambir', '1');
insert into `area` values ('10', 'Bukit Pasir', '1');
insert into `area` values ('11', 'Chaah', '1');
insert into `area` values ('12', 'Endau', '1');
insert into `area` values ('13', 'Gelang Patah', '1');
insert into `area` values ('14', 'Gerisek', '1');
insert into `area` values ('15', 'Gugusan Taib Andak', '1');
insert into `area` values ('16', 'Jementah', '1');
insert into `area` values ('17', 'Johor Bharu', '1');
insert into `area` values ('18', 'Kahang', '1');
insert into `area` values ('19', 'Kluang', '1');
insert into `area` values ('20', 'Kota Tinggi', '1');
insert into `area` values ('21', 'Kukup', '1');
insert into `area` values ('22', 'Kulai', '1');
insert into `area` values ('23', 'Labis', '1');
insert into `area` values ('24', 'Layang-Layang', '1');
insert into `area` values ('25', 'Masai', '1');
insert into `area` values ('26', 'Mersing', '1');
insert into `area` values ('27', 'Mersing', '1');
insert into `area` values ('28', 'Muar', '1');
insert into `area` values ('29', 'Nusajaya', '1');
insert into `area` values ('30', 'Pagoh', '1');
insert into `area` values ('31', 'Paloh', '1');
insert into `area` values ('32', 'Panchor', '1');
insert into `area` values ('33', 'Parit Jawa', '1');
insert into `area` values ('34', 'Parit Raja', '1');
insert into `area` values ('35', 'Parit Sulong', '1');
insert into `area` values ('36', 'Pasir Gudang', '1');
insert into `area` values ('37', 'Pekan Nenas', '1');
insert into `area` values ('38', 'Pengerang', '1');
insert into `area` values ('39', 'Pontian', '1');
insert into `area` values ('40', 'Rengam', '1');
insert into `area` values ('41', 'Rengit', '1');
insert into `area` values ('42', 'Segamat', '1');
insert into `area` values ('43', 'Semerah', '1');
insert into `area` values ('44', 'Senai', '1');
insert into `area` values ('45', 'Senggarang', '1');
insert into `area` values ('46', 'Seri Gading', '1');
insert into `area` values ('47', 'Seri Medan', '1');
insert into `area` values ('48', 'Simpang Rengam', '1');
insert into `area` values ('49', 'Sungai Mati', '1');
insert into `area` values ('50', 'Tangkak', '1');
insert into `area` values ('51', 'Ulu Tiram', '1');
insert into `area` values ('52', 'Yong Peng', '1');
insert into `area` values ('53', 'Alor Setar', '2');
insert into `area` values ('54', 'Ayer Hitam', '2');
insert into `area` values ('55', 'Baling', '2');
insert into `area` values ('56', 'Bandar Baharu', '2');
insert into `area` values ('57', 'Bedong', '2');
insert into `area` values ('58', 'Bukit Kayu Hitam', '2');
insert into `area` values ('59', 'Changloon', '2');
insert into `area` values ('60', 'Gurun', '2');
insert into `area` values ('61', 'Jeniang', '2');
insert into `area` values ('62', 'Jitra', '2');
insert into `area` values ('63', 'Karangan', '2');
insert into `area` values ('64', 'Kepala Batas', '2');
insert into `area` values ('65', 'Kodiang', '2');
insert into `area` values ('66', 'Kota Kuala Muda', '2');
insert into `area` values ('67', 'Kota Sarang Semut', '2');
insert into `area` values ('68', 'Kuala Kedah', '2');
insert into `area` values ('69', 'Kuala Ketil', '2');
insert into `area` values ('70', 'Kuala Nerang', '2');
insert into `area` values ('71', 'Kuala Pegang', '2');
insert into `area` values ('72', 'Kulim', '2');
insert into `area` values ('73', 'Kupang', '2');
insert into `area` values ('74', 'Langgar', '2');
insert into `area` values ('75', 'Lunas', '2');
insert into `area` values ('76', 'Merbok', '2');
insert into `area` values ('77', 'Padang Serai', '2');
insert into `area` values ('78', 'Pendang', '2');
insert into `area` values ('79', 'Pokok Sena', '2');
insert into `area` values ('80', 'Serdang', '2');
insert into `area` values ('81', 'Sik', '2');
insert into `area` values ('82', 'Simpang Empat', '2');
insert into `area` values ('83', 'Sungai Petani', '2');
insert into `area` values ('84', 'Yan', '2');
insert into `area` values ('85', 'Ayer Lanas', '3');
insert into `area` values ('86', 'Bachok', '3');
insert into `area` values ('87', 'Cherang Ruku', '3');
insert into `area` values ('88', 'Dabong', '3');
insert into `area` values ('89', 'Gua Musang', '3');
insert into `area` values ('90', 'Jeli', '3');
insert into `area` values ('91', 'Kem Desa Pahlawan', '3');
insert into `area` values ('92', 'Ketereh', '3');
insert into `area` values ('93', 'Kota Bharu', '3');
insert into `area` values ('94', 'Kuala Balah', '3');
insert into `area` values ('95', 'Kuala Krai', '3');
insert into `area` values ('96', 'Machang', '3');
insert into `area` values ('97', 'Melor', '3');
insert into `area` values ('98', 'Pasir  Mas', '3');
insert into `area` values ('99', 'Pasir Puteh', '3');
insert into `area` values ('100', 'Pulai Chondong', '3');
insert into `area` values ('101', 'Rantau Panjang', '3');
insert into `area` values ('102', 'Selising', '3');
insert into `area` values ('103', 'Tanah Merah', '3');
insert into `area` values ('104', 'Temangan', '3');
insert into `area` values ('105', 'Tumpat', '3');
insert into `area` values ('106', 'Wakaf Bharu', '3');
insert into `area` values ('107', 'Ampang Hilir', '4');
insert into `area` values ('108', 'Bandar Damai Perdana', '4');
insert into `area` values ('109', 'Bandar Manjalara', '4');
insert into `area` values ('110', 'Bandar Sri Damansara', '4');
insert into `area` values ('111', 'Bandar Tasik Selatan', '4');
insert into `area` values ('112', 'Bandar Tun Razak', '4');
insert into `area` values ('113', 'Bangsar', '4');
insert into `area` values ('114', 'Bangsar South', '4');
insert into `area` values ('115', 'Batu', '4');
insert into `area` values ('116', 'Brickfields', '4');
insert into `area` values ('117', 'Bukit Bintang', '4');
insert into `area` values ('118', 'Bukit Jalil', '4');
insert into `area` values ('119', 'Bukit Ledang', '4');
insert into `area` values ('120', 'Bukit Persekutuan (Federal Hill)', '4');
insert into `area` values ('121', 'Bukit Tunku (Kenny Hills)', '4');
insert into `area` values ('122', 'Cheras', '4');
insert into `area` values ('123', 'Country Heights Damansara', '4');
insert into `area` values ('124', 'Damansara', '4');
insert into `area` values ('125', 'Damansara Heights', '4');
insert into `area` values ('126', 'Desa Pandan', '4');
insert into `area` values ('127', 'Desa Park City', '4');
insert into `area` values ('128', 'Desa Petaling', '4');
insert into `area` values ('129', 'Jalan Klang Lama (Old Klang Road)', '4');
insert into `area` values ('130', 'Jalan Sultan Ismail', '4');
insert into `area` values ('131', 'Jinjang', '4');
insert into `area` values ('132', 'Kepong', '4');
insert into `area` values ('133', 'Keramat', '4');
insert into `area` values ('134', 'KL Sentral', '4');
insert into `area` values ('135', 'KLCC', '4');
insert into `area` values ('136', 'Kuala Lumpur', '4');
insert into `area` values ('137', 'Kuchai Lama', '4');
insert into `area` values ('138', 'Lembah Pantai', '4');
insert into `area` values ('139', 'Mid Valley City', '4');
insert into `area` values ('140', 'Mont Kiara', '4');
insert into `area` values ('141', 'OUG', '4');
insert into `area` values ('142', 'Pandan Indah', '4');
insert into `area` values ('143', 'Pandan Jaya', '4');
insert into `area` values ('144', 'Pandan Perdana', '4');
insert into `area` values ('145', 'Pantai', '4');
insert into `area` values ('146', 'Pekan Batu', '4');
insert into `area` values ('147', 'Salak Selatan', '4');
insert into `area` values ('148', 'Segambut', '4');
insert into `area` values ('149', 'Sentul', '4');
insert into `area` values ('150', 'Seputeh', '4');
insert into `area` values ('151', 'Setapak', '4');
insert into `area` values ('152', 'Setiawangsa', '4');
insert into `area` values ('153', 'Solaris Dutamas', '4');
insert into `area` values ('154', 'Sri Hartamas', '4');
insert into `area` values ('155', 'Sri Petaling', '4');
insert into `area` values ('156', 'Sungai Besi', '4');
insert into `area` values ('157', 'Sungai Penchala', '4');
insert into `area` values ('158', 'Taman Desa', '4');
insert into `area` values ('159', 'Taman Duta', '4');
insert into `area` values ('160', 'Taman Melawati', '4');
insert into `area` values ('161', 'Taman Tun Dr. Ismail', '4');
insert into `area` values ('162', 'Titiwangsa', '4');
insert into `area` values ('163', 'TPM', '4');
insert into `area` values ('164', 'Wangsa Maju', '4');
insert into `area` values ('165', 'Alor Gajah', '5');
insert into `area` values ('166', 'Asahan', '5');
insert into `area` values ('167', 'Ayer Keroh', '5');
insert into `area` values ('168', 'Bandar Melaka', '5');
insert into `area` values ('169', 'Bemban', '5');
insert into `area` values ('170', 'Durian Tunggal', '5');
insert into `area` values ('171', 'Jasin', '5');
insert into `area` values ('172', 'Kem Trendak', '5');
insert into `area` values ('173', 'Kuala Sungai Baru', '5');
insert into `area` values ('174', 'Lubok China', '5');
insert into `area` values ('175', 'Masjid Tanah', '5');
insert into `area` values ('176', 'Merlimau', '5');
insert into `area` values ('177', 'Selandar', '5');
insert into `area` values ('178', 'Sungai Rambai', '5');
insert into `area` values ('179', 'Sungai Udang', '5');
insert into `area` values ('180', 'Bahau', '6');
insert into `area` values ('181', 'Bandar Enstek', '6');
insert into `area` values ('182', 'Bandar Seri Jempol', '6');
insert into `area` values ('183', 'Batu Kikir', '6');
insert into `area` values ('184', 'Gemas', '6');
insert into `area` values ('185', 'Gemencheh', '6');
insert into `area` values ('186', 'Johol', '6');
insert into `area` values ('187', 'Kota', '6');
insert into `area` values ('188', 'Kuala Klawang', '6');
insert into `area` values ('189', 'Kuala Pilah', '6');
insert into `area` values ('190', 'Labu', '6');
insert into `area` values ('191', 'Linggi', '6');
insert into `area` values ('192', 'Mantin', '6');
insert into `area` values ('193', 'Nilai', '6');
insert into `area` values ('194', 'Port Dickson', '6');
insert into `area` values ('195', 'Pusat Bandar Palong', '6');
insert into `area` values ('196', 'Rantau', '6');
insert into `area` values ('197', 'Rembau', '6');
insert into `area` values ('198', 'Rompin', '6');
insert into `area` values ('199', 'Seremban', '6');
insert into `area` values ('200', 'Si Rusa', '6');
insert into `area` values ('201', 'Simpang Durian', '6');
insert into `area` values ('202', 'Simpang Pertang', '6');
insert into `area` values ('203', 'Tampin', '6');
insert into `area` values ('204', 'Tanjong Ipoh', '6');
insert into `area` values ('205', 'Balok', '7');
insert into `area` values ('206', 'Bandar Bera', '7');
insert into `area` values ('207', 'Bandar Pusat Jengka', '7');
insert into `area` values ('208', 'Bandar Tun Abdul Razak', '7');
insert into `area` values ('209', 'Benta', '7');
insert into `area` values ('210', 'Bentong', '7');
insert into `area` values ('211', 'Brinchang', '7');
insert into `area` values ('212', 'Bukit Fraser', '7');
insert into `area` values ('213', 'Bukit Goh', '7');
insert into `area` values ('214', 'Chenor', '7');
insert into `area` values ('215', 'Chini', '7');
insert into `area` values ('216', 'Damak', '7');
insert into `area` values ('217', 'Dong', '7');
insert into `area` values ('218', 'Gambang', '7');
insert into `area` values ('219', 'Genting Highlands', '7');
insert into `area` values ('220', 'Jerantut', '7');
insert into `area` values ('221', 'Karak', '7');
insert into `area` values ('222', 'Kemayan', '7');
insert into `area` values ('223', 'Kuala Krau', '7');
insert into `area` values ('224', 'Kuala Lipis', '7');
insert into `area` values ('225', 'Kuala Rompin', '7');
insert into `area` values ('226', 'Kuantan', '7');
insert into `area` values ('227', 'Lanchang', '7');
insert into `area` values ('228', 'Lurah Bilut', '7');
insert into `area` values ('229', 'Maran', '7');
insert into `area` values ('230', 'Mentakab', '7');
insert into `area` values ('231', 'Muadzam Shah', '7');
insert into `area` values ('232', 'Padang Tengku', '7');
insert into `area` values ('233', 'Pekan', '7');
insert into `area` values ('234', 'Raub', '7');
insert into `area` values ('235', 'Ringlet', '7');
insert into `area` values ('236', 'Sega', '7');
insert into `area` values ('237', 'Sungai Lembing', '7');
insert into `area` values ('238', 'Tanah Rata', '7');
insert into `area` values ('239', 'Temerloh', '7');
insert into `area` values ('240', 'Triang', '7');
insert into `area` values ('241', 'Ayer Tawar', '8');
insert into `area` values ('242', 'Bagan Datoh', '8');
insert into `area` values ('243', 'Bagan Serai', '8');
insert into `area` values ('244', 'Bandar Seri Iskandar', '8');
insert into `area` values ('245', 'Batu Gajah', '8');
insert into `area` values ('246', 'Batu Kurau', '8');
insert into `area` values ('247', 'Behrang Stesen', '8');
insert into `area` values ('248', 'Bidor', '8');
insert into `area` values ('249', 'Bota', '8');
insert into `area` values ('250', 'Bruas', '8');
insert into `area` values ('251', 'Cameron Highlands', '8');
insert into `area` values ('252', 'Changkat Jering', '8');
insert into `area` values ('253', 'Changkat Keruing', '8');
insert into `area` values ('254', 'Chemor', '8');
insert into `area` values ('255', 'Chenderiang', '8');
insert into `area` values ('256', 'Chenderong Balai', '8');
insert into `area` values ('257', 'Chikus', '8');
insert into `area` values ('258', 'Enggor', '8');
insert into `area` values ('259', 'Gerik', '8');
insert into `area` values ('260', 'Gopeng', '8');
insert into `area` values ('261', 'Hutan Melintang', '8');
insert into `area` values ('262', 'Intan', '8');
insert into `area` values ('263', 'Ipoh', '8');
insert into `area` values ('264', 'Jeram', '8');
insert into `area` values ('265', 'Kampar', '8');
insert into `area` values ('266', 'Kampung Gajah', '8');
insert into `area` values ('267', 'Kampung Kepayang', '8');
insert into `area` values ('268', 'Kamunting', '8');
insert into `area` values ('269', 'Kuala Kangsar', '8');
insert into `area` values ('270', 'Kuala Kurau', '8');
insert into `area` values ('271', 'Kuala Sepetang', '8');
insert into `area` values ('272', 'Lambor Kanan', '8');
insert into `area` values ('273', 'Langkap', '8');
insert into `area` values ('274', 'Lenggong', '8');
insert into `area` values ('275', 'Lumut', '8');
insert into `area` values ('276', 'Malim Nawar', '8');
insert into `area` values ('277', 'Manong', '8');
insert into `area` values ('278', 'Matang', '8');
insert into `area` values ('279', 'Padang Rengas', '8');
insert into `area` values ('280', 'Pangkor', '8');
insert into `area` values ('281', 'Pantai Remis', '8');
insert into `area` values ('282', 'Parit', '8');
insert into `area` values ('283', 'Parit Buntar', '8');
insert into `area` values ('284', 'Pengkalan Hulu', '8');
insert into `area` values ('285', 'Pusing', '8');
insert into `area` values ('286', 'Rantau Panjang', '8');
insert into `area` values ('287', 'Sauk', '8');
insert into `area` values ('288', 'Selama', '8');
insert into `area` values ('289', 'Selekoh', '8');
insert into `area` values ('290', 'Seri Manjong', '8');
insert into `area` values ('291', 'Setiawan', '8');
insert into `area` values ('292', 'Simpang', '8');
insert into `area` values ('293', 'Slim River', '8');
insert into `area` values ('294', 'Sungai Siput', '8');
insert into `area` values ('295', 'Sungai Sumun', '8');
insert into `area` values ('296', 'Sungkai', '8');
insert into `area` values ('297', 'Taiping', '8');
insert into `area` values ('298', 'Tanjong Malim', '8');
insert into `area` values ('299', 'Tanjong Piandang', '8');
insert into `area` values ('300', 'Tanjong Rambutan', '8');
insert into `area` values ('301', 'Tanjong Tualang', '8');
insert into `area` values ('302', 'Tapah', '8');
insert into `area` values ('303', 'Tapah Road', '8');
insert into `area` values ('304', 'Teluk Intan', '8');
insert into `area` values ('305', 'Temoh', '8');
insert into `area` values ('306', 'TLDM Lumut', '8');
insert into `area` values ('307', 'Trolak', '8');
insert into `area` values ('308', 'Trong', '8');
insert into `area` values ('309', 'Tronoh', '8');
insert into `area` values ('310', 'Ulu Bernam', '8');
insert into `area` values ('311', 'Ulu Kinta', '8');
insert into `area` values ('312', 'Arau', '9');
insert into `area` values ('313', 'Kaki Bukit', '9');
insert into `area` values ('314', 'Kangar', '9');
insert into `area` values ('315', 'Kuala Perlis', '9');
insert into `area` values ('316', 'Padang Besar', '9');
insert into `area` values ('317', 'Ayer Itam', '10');
insert into `area` values ('318', 'Balik Pulau', '10');
insert into `area` values ('319', 'Batu Ferringhi', '10');
insert into `area` values ('320', 'Batu Maung', '10');
insert into `area` values ('321', 'Bayan Lepas', '10');
insert into `area` values ('322', 'Bukit Mertajam', '10');
insert into `area` values ('323', 'Butterworth', '10');
insert into `area` values ('324', 'Gelugor', '10');
insert into `area` values ('325', 'George Town', '10');
insert into `area` values ('326', 'Jelutong', '10');
insert into `area` values ('327', 'Juru', '10');
insert into `area` values ('328', 'Kepala Batas', '10');
insert into `area` values ('329', 'Kubang Semang', '10');
insert into `area` values ('330', 'Nibong Tebal', '10');
insert into `area` values ('331', 'Penaga', '10');
insert into `area` values ('332', 'Peneng Hill', '10');
insert into `area` values ('333', 'Perai', '10');
insert into `area` values ('334', 'Permatang Pauh', '10');
insert into `area` values ('335', 'Pulau Pinang', '10');
insert into `area` values ('336', 'Seberang Perai', '10');
insert into `area` values ('337', 'Simpang Ampat', '10');
insert into `area` values ('338', 'Sungai Jawi', '10');
insert into `area` values ('339', 'Tanjong Bungah', '10');
insert into `area` values ('340', 'Tasek Gelugor', '10');
insert into `area` values ('341', 'Alam Impian', '11');
insert into `area` values ('342', 'Alam Perdana', '11');
insert into `area` values ('343', 'Ambang Botanic', '11');
insert into `area` values ('344', 'Ampang', '11');
insert into `area` values ('345', 'Ara Damansara', '11');
insert into `area` values ('346', 'Balakong', '11');
insert into `area` values ('347', 'Bandar Baru Bangi', '11');
insert into `area` values ('348', 'Bandar Botanic', '11');
insert into `area` values ('349', 'Bandar Bukit Raja', '11');
insert into `area` values ('350', 'Bandar Bukit Tinggi', '11');
insert into `area` values ('351', 'Bandar Kinrara', '11');
insert into `area` values ('352', 'Bandar Puncak Alam', '11');
insert into `area` values ('353', 'Bandar Puteri Klang', '11');
insert into `area` values ('354', 'Bandar Puteri Puchong', '11');
insert into `area` values ('355', 'Bandar Saujana Putra', '11');
insert into `area` values ('356', 'Bandar Sungai Long', '11');
insert into `area` values ('357', 'Bandar Sunway', '11');
insert into `area` values ('358', 'Bandar Utama', '11');
insert into `area` values ('359', 'Bangi', '11');
insert into `area` values ('360', 'Banting', '11');
insert into `area` values ('361', 'Batang Berjuntai', '11');
insert into `area` values ('362', 'Batang Kali', '11');
insert into `area` values ('363', 'Batu Arang', '11');
insert into `area` values ('364', 'Batu Caves', '11');
insert into `area` values ('365', 'Beranang', '11');
insert into `area` values ('366', 'Bukit Antarabangsa', '11');
insert into `area` values ('367', 'Bukit Jelutong', '11');
insert into `area` values ('368', 'Bukit Rahman Putra', '11');
insert into `area` values ('369', 'Bukit Rotan', '11');
insert into `area` values ('370', 'Bukit Subang', '11');
insert into `area` values ('371', 'Country Heights', '11');
insert into `area` values ('372', 'Cyberjaya', '11');
insert into `area` values ('373', 'Damansara Damai', '11');
insert into `area` values ('374', 'Damansara Intan', '11');
insert into `area` values ('375', 'Damansara Jaya', '11');
insert into `area` values ('376', 'Damansara Kim', '11');
insert into `area` values ('377', 'Damansara Perdana', '11');
insert into `area` values ('378', 'Damansara Utama', '11');
insert into `area` values ('379', 'Denai Alam', '11');
insert into `area` values ('380', 'Dengkil', '11');
insert into `area` values ('381', 'Glenmarie', '11');
insert into `area` values ('382', 'Gombak', '11');
insert into `area` values ('383', 'Hulu Langat', '11');
insert into `area` values ('384', 'Hulu Selangor', '11');
insert into `area` values ('385', 'Jenjarom', '11');
insert into `area` values ('386', 'Jeram', '11');
insert into `area` values ('387', 'Kajang', '11');
insert into `area` values ('388', 'Kapar', '11');
insert into `area` values ('389', 'Kayu Ara', '11');
insert into `area` values ('390', 'Kelana Jaya', '11');
insert into `area` values ('391', 'Kerling', '11');
insert into `area` values ('392', 'Klang', '11');
insert into `area` values ('393', 'KLIA', '11');
insert into `area` values ('394', 'Kota Damansara', '11');
insert into `area` values ('395', 'Kota Emerald', '11');
insert into `area` values ('396', 'Kota Kemuning', '11');
insert into `area` values ('397', 'Kuala Kubu Baru', '11');
insert into `area` values ('398', 'Kuala Langat', '11');
insert into `area` values ('399', 'Kuala Selangor', '11');
insert into `area` values ('400', 'Kuang', '11');
insert into `area` values ('401', 'Mutiara Damansara', '11');
insert into `area` values ('402', 'Petaling', '11');
insert into `area` values ('403', 'Petaling Jaya', '11');
insert into `area` values ('404', 'Port Klang', '11');
insert into `area` values ('405', 'Puchong', '11');
insert into `area` values ('406', 'Puchong South', '11');
insert into `area` values ('407', 'Pulau Carey', '11');
insert into `area` values ('408', 'Pulau Indah (Pulau Lumut)', '11');
insert into `area` values ('409', 'Pulau Ketam', '11');
insert into `area` values ('410', 'Puncak Jalil', '11');
insert into `area` values ('411', 'Putra Heights', '11');
insert into `area` values ('412', 'Putrajaya', '11');
insert into `area` values ('413', 'Rasa', '11');
insert into `area` values ('414', 'Rawang', '11');
insert into `area` values ('415', 'Sabak Bernam', '11');
insert into `area` values ('416', 'Saujana', '11');
insert into `area` values ('417', 'Sekinchan', '11');
insert into `area` values ('418', 'Selayang', '11');
insert into `area` values ('419', 'Semenyih', '11');
insert into `area` values ('420', 'Sepang', '11');
insert into `area` values ('421', 'Serdang', '11');
insert into `area` values ('422', 'Serendah', '11');
insert into `area` values ('423', 'Seri Kembangan', '11');
insert into `area` values ('424', 'Setia Alam', '11');
insert into `area` values ('425', 'Setia Eco Park', '11');
insert into `area` values ('426', 'Shah Alam', '11');
insert into `area` values ('427', 'SierraMas', '11');
insert into `area` values ('428', 'SS2', '11');
insert into `area` values ('429', 'Subang Bestari', '11');
insert into `area` values ('430', 'Subang Heights', '11');
insert into `area` values ('431', 'Subang Jaya', '11');
insert into `area` values ('432', 'Sungai Ayer Tawar', '11');
insert into `area` values ('433', 'Sungai Besar', '11');
insert into `area` values ('434', 'Sungai Buloh', '11');
insert into `area` values ('435', 'Sungai Pelek', '11');
insert into `area` values ('436', 'Taman TTDI Jaya', '11');
insert into `area` values ('437', 'Tanjong Karang', '11');
insert into `area` values ('438', 'Tanjong Sepat', '11');
insert into `area` values ('439', 'Telok Panglima Garang', '11');
insert into `area` values ('440', 'Tropicana', '11');
insert into `area` values ('441', 'Ulu Klang', '11');
insert into `area` values ('442', 'USJ', '11');
insert into `area` values ('443', 'USJ Heights', '11');
insert into `area` values ('444', 'Valencia', '11');
insert into `area` values ('445', 'Ajil', '12');
insert into `area` values ('446', 'Al Muktatfi Billah Shah', '12');
insert into `area` values ('447', 'Ayer Puteh', '12');
insert into `area` values ('448', 'Bukit Besi', '12');
insert into `area` values ('449', 'Bukit Payong', '12');
insert into `area` values ('450', 'Ceneh', '12');
insert into `area` values ('451', 'Chalok', '12');
insert into `area` values ('452', 'Cukai', '12');
insert into `area` values ('453', 'Dungun', '12');
insert into `area` values ('454', 'Jerteh', '12');
insert into `area` values ('455', 'Kampung Raja', '12');
insert into `area` values ('456', 'Kemaman', '12');
insert into `area` values ('457', 'Kemasek', '12');
insert into `area` values ('458', 'Kerteh', '12');
insert into `area` values ('459', 'Ketengah Jaya', '12');
insert into `area` values ('460', 'Kijal', '12');
insert into `area` values ('461', 'Kuala Berang', '12');
insert into `area` values ('462', 'Kuala Besut', '12');
insert into `area` values ('463', 'Kuala Terengganu', '12');
insert into `area` values ('464', 'Marang', '12');
insert into `area` values ('465', 'Paka', '12');
insert into `area` values ('466', 'Permaisuri', '12');
insert into `area` values ('467', 'Sungai Tong', '12');


### structure of table `bookmark` ###

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adId` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 AUTO_INCREMENT=41;


### data of table `bookmark` ###

insert into `bookmark` values ('21', '11', '14');
insert into `bookmark` values ('24', '10', '14');
insert into `bookmark` values ('28', '14', '18');
insert into `bookmark` values ('30', '10', '16');
insert into `bookmark` values ('35', '20', '16');
insert into `bookmark` values ('36', '14', '16');
insert into `bookmark` values ('37', '15', '16');
insert into `bookmark` values ('38', '16', '16');
insert into `bookmark` values ('39', '17', '16');
insert into `bookmark` values ('40', '18', '16');


### structure of table `servcat` ###

CREATE TABLE `servcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameE` varchar(255) NOT NULL,
  `nameM` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 AUTO_INCREMENT=20;


### data of table `servcat` ###

insert into `servcat` values ('1', 'Renovation', '');
insert into `servcat` values ('2', 'Air Conditioning', '');
insert into `servcat` values ('3', 'Roofing', '');
insert into `servcat` values ('4', 'Wiring', '');
insert into `servcat` values ('5', 'Plumbing', '');
insert into `servcat` values ('6', 'Cleaning', '');
insert into `servcat` values ('7', 'Transport', '');
insert into `servcat` values ('8', 'Events', '');
insert into `servcat` values ('9', 'Tutoring', '');
insert into `servcat` values ('10', 'Printing', '');
insert into `servcat` values ('11', 'Tailor', '');
insert into `servcat` values ('12', 'Pest Control', '');
insert into `servcat` values ('13', 'Supplier', '');
insert into `servcat` values ('14', 'Photography', '');
insert into `servcat` values ('15', 'Furniture', '');
insert into `servcat` values ('16', 'Others', '');
insert into `servcat` values ('17', 'Wedding', '');
insert into `servcat` values ('18', 'Design', '');
insert into `servcat` values ('19', 'Travel', '');


### structure of table `state` ###

CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 AUTO_INCREMENT=13;


### data of table `state` ###

insert into `state` values ('1', 'Johor');
insert into `state` values ('2', 'Kedah');
insert into `state` values ('3', 'Kelantan');
insert into `state` values ('4', 'Kuala Lumpur');
insert into `state` values ('5', 'Melaka');
insert into `state` values ('6', 'Negeri Sembilan');
insert into `state` values ('7', 'Pahang');
insert into `state` values ('8', 'Perak');
insert into `state` values ('9', 'Perlis');
insert into `state` values ('10', 'Pulau Pinang');
insert into `state` values ('11', 'Selangor');
insert into `state` values ('12', 'Terengganu');


### structure of table `usr` ###

CREATE TABLE `usr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(10) unsigned zerofill DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `ssm` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `chkssm` int(11) NOT NULL DEFAULT '0',
  `createDT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 AUTO_INCREMENT=23;


### data of table `usr` ###

insert into `usr` values ('12', 'Hassan Nawawi', 'sayongvalley@gmail.com', 'f975bc22d220891a44809fdb317c2e75', '0176568995', '', 'SA0296586-V ', 'Sayong Valley ent.', '0', '2016-04-22 10:39:18');
insert into `usr` values ('13', 'Yaya Yusof', 'parteesandsuch', '817d92d8ed0d816147c27cabd8216852', '0126639934', '', '', 'Parteesandsuch Interprise', '0', '2016-04-26 10:07:25');
insert into `usr` values ('14', 'ehssan', 'ehssan.nawawi@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', null, '', '', '', '0', '2016-04-26 10:21:51');
insert into `usr` values ('15', 'Mohamad Ali Hanafiah', 'makesone@gmail.com', '978f6f608df5279d4d85e700d83ac873', '0172230073', '', '', 'makespaint', '0', '2016-04-27 00:57:19');
insert into `usr` values ('16', 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', null, '', '', '', '0', '2016-04-27 09:35:40');
insert into `usr` values ('17', 'Pixel Touch', 'pixeltouchadvertising@gmail.com', '3c461de62da29fb7123a3fca80e6c037', '0162745934', '', '', '', '0', '2016-04-27 13:00:58');
insert into `usr` values ('18', 'Rizal', 'faizalsk9@gmail.com', '67e09651f64e20778613cd17180dd6a8', '0167675849', '', '', '', '0', '2016-05-05 16:02:48');
insert into `usr` values ('19', 'Fatin nor syamimi fauzi', 'syamimifauzi92@gmail.com', 'b39182f9dfc6b1dfcdc67b1fd25c8e39', '0112403329', '', '', '', '0', '2016-05-08 15:46:33');
insert into `usr` values ('20', 'fatinlubukemas', 'perindusyurga3@gmail.com', '5de2da674696b01e158cde5f886dd837', '4294967295', '', '', '', '0', '2016-05-08 17:13:28');
insert into `usr` values ('21', 'Nur Najihah', 'mrs.najihah@ymail.com', 'ecbcd590227607afd8c901a134f163cd', '0173536358', '', '', '', '0', '2016-05-08 19:58:53');
insert into `usr` values ('22', 'Mohd fauzi', 'fauziyahya1979@gmail.com', 'f168d7ac7d62dca2c7e3d519d0ca0cf0', '0182079707', '', 'sa0123670d', 'YAKIN MAJU PEST CONTROL', '0', '2016-05-08 20:39:39');
