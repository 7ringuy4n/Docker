-- --------------------------------------------------------
-- Host:                         45.117.168.234
-- Server version:               5.7.36-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hailan_datphong
-- DROP DATABASE IF EXISTS `hailan_datphong`;
-- CREATE DATABASE IF NOT EXISTS `hailan_datphong` /*!40100 DEFAULT CHARACTER SET utf8 */;
-- USE `hailan_datphong`;

-- Dumping structure for table hailan_datphong.article
DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `status` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.article: ~0 rows (approximately)
DELETE FROM `article`;

-- Dumping structure for table hailan_datphong.article_translations
DROP TABLE IF EXISTS `article_translations`;
CREATE TABLE IF NOT EXISTS `article_translations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_model_id` int(11) unsigned DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `content` longtext,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `article_model_id` (`article_model_id`) USING BTREE,
  CONSTRAINT `article_translations_ibfk_1` FOREIGN KEY (`article_model_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.article_translations: ~0 rows (approximately)
DELETE FROM `article_translations`;

-- Dumping structure for table hailan_datphong.benefit
DROP TABLE IF EXISTS `benefit`;
CREATE TABLE IF NOT EXISTS `benefit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `sort` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.benefit: ~5 rows (approximately)
DELETE FROM `benefit`;
INSERT INTO `benefit` (`id`, `thumb`, `status`, `sort`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(1, '2DfggsAYIU.jpeg', 'active', 5, '2021-08-19 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin'),
	(2, 'cWNhnob6Ib.jpeg', 'active', 4, '2021-08-19 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin'),
	(3, 'AcWO3tA7ry.jpeg', 'active', 3, '2021-08-19 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(4, 'hogXnnkfFs.jpeg', 'active', 1, '2021-08-19 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin'),
	(5, 'iZo2bZtrRK.jpeg', 'active', 2, '2021-08-31 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin');

-- Dumping structure for table hailan_datphong.benefit_translations
DROP TABLE IF EXISTS `benefit_translations`;
CREATE TABLE IF NOT EXISTS `benefit_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `benefit_model_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `benefit_translations_benefit_model_id_foreign` (`benefit_model_id`),
  CONSTRAINT `benefit_translations_benefit_model_id_foreign` FOREIGN KEY (`benefit_model_id`) REFERENCES `benefit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.benefit_translations: ~10 rows (approximately)
DELETE FROM `benefit_translations`;
INSERT INTO `benefit_translations` (`id`, `benefit_model_id`, `locale`, `name`, `description`) VALUES
	(1, 1, 'en', 'Meeting Facilities', '<p>Trung Son Meeting room measure 40 sqm, is an ideal place for hosting an executive meeting or workshop. Inviting decor and occupancy up to 20 people to suit any event. Our dedicate event specialists are ready to serve you to make you event a success.</p>'),
	(2, 1, 'ja', '会議', '<p>チュンソン会議室の広さは40平米で、エグゼクティブミーティングやワークショップを開催するのに理想的な場所です。会議室は20人のイベントに合うように装飾を施し、レイアウトを調整します。イベントを成功させるために、DHTSスタッフが一生懸命お手伝いします。</p>'),
	(3, 2, 'en', 'Business Service', '<p>If you need assistance to send a fax, or you need a few documents photocopied, our professional reception staff are ready to help you. The only thing you need to do is enquire at the DHTS&#39;s reception and we will take care of the rest.</p>'),
	(4, 2, 'ja', 'ビジネスサービス', '<p>ファックスを送信するし、資料をコピーしたい場合、専門の受付スタッフがお手伝いします。DHTSの受付でお問い合わせいただくて、後はお任せください。</p>'),
	(5, 3, 'en', 'Airport Pickup', '<p class="MsoBodyText" style="margin-right:3px; margin-left:10px">Enjoy DHTS&rsquo;s warm hospitality from the moment you set foot in Ho Chi Minh City to the moment you leave with our luxury private car service to/from Tan Son Nhat International Airport.&nbsp;Please contact us for more information at <span style="color:#bca36e;">sales.apartment@dhts.com.vn</span></p>'),
	(6, 3, 'ja', 'プライベート 空港送迎サービス', '<p>&nbsp;ホーチミン市に降り立った瞬間、タンソンニャット国際空港へ/から当ホテルの豪華なプライベートカーサービスをご利用の瞬間まで、DHTSの温かいおもてなしをお楽しみください。</p>\r\n\r\n<p>詳細は &nbsp;sales.apartment@dhts.com.vn &nbsp;にお問い合わせください</p>'),
	(7, 4, 'en', 'Business Lounge', '<p>Guests will find comprehensive services including photocopy, fax, and high-speed internet access computers. Private rooms are also available equipped with meeting and conference facilities. Professional staffs are available for secretarial and administrative assistance.</p>'),
	(8, 4, 'ja', 'ビジネスラウンジ', '<p>コピーやファックス、高速インターネットサービスなど、ビジネスシーンのあらゆるニーズにお応えします。</p>\r\n\r\n<p>会議や会合に最適な設備の整った個室もご利用可能です。またオフィスレンタルもございます。</p>'),
	(9, 5, 'en', 'Golf Simulator', '<p>Play the world&rsquo;s top courses, enjoy a number of game formats and competitions, practice at the driving range, analyze your swing, be totally entertained.</p>'),
	(10, 5, 'ja', 'ゴルフシミュレーター', '<p>世界の一流のコースを参加するし、いろいろなゲーム形式や競技会を楽しむし、ミニゴルフ場でゴルフを練習し、スイングを分析しるのは極楽しませます。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>');

-- Dumping structure for table hailan_datphong.booking
DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` bigint(20) unsigned DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrive_date` datetime DEFAULT NULL,
  `departure_date` datetime DEFAULT NULL,
  `number_of_person` int(10) unsigned DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.booking: ~4 rows (approximately)
DELETE FROM `booking`;
INSERT INTO `booking` (`id`, `room_id`, `fullname`, `phone`, `email`, `nationality`, `arrive_date`, `departure_date`, `number_of_person`, `note`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(1, 2, 'Nguyen', '0336405077', 'nvlinh174test01@gmail.com', NULL, '2021-08-28 00:00:00', '2021-09-03 00:00:00', 2, 'ádsda', 'inactive', '2021-08-27 08:13:11', NULL, NULL, NULL),
	(2, 2, 'Nguyen', '0336405077', 'nvlinh174test01@gmail.com', NULL, '2021-08-28 00:00:00', '2021-09-03 00:00:00', 3, 'áddasdasdasdasdasdasdasdasđ', 'inactive', '2021-08-27 08:30:12', NULL, NULL, NULL),
	(3, 2, 'gdgdfgdfg', '0163 640 5077', 'nvlinh174test01@gmail.com', NULL, '2021-08-28 00:00:00', '2021-08-30 00:00:00', 3, 'gsdfgsdfsdfsfsdfsfs', 'inactive', '2021-08-27 08:34:30', NULL, NULL, NULL),
	(4, 6, 'ádasdasdasdasd', 'ádasdasdasđ', 'nvlinh17041992@gmail.com', NULL, '2021-08-29 00:00:00', '2021-09-04 00:00:00', 3, 'ádasdasdasdsd', 'inactive', '2021-08-29 23:41:45', NULL, NULL, NULL);

-- Dumping structure for table hailan_datphong.cate_convenience
DROP TABLE IF EXISTS `cate_convenience`;
CREATE TABLE IF NOT EXISTS `cate_convenience` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cate_convenience__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.cate_convenience: ~8 rows (approximately)
DELETE FROM `cate_convenience`;
INSERT INTO `cate_convenience` (`id`, `status`, `_lft`, `_rgt`, `parent_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(1, 'active', 1, 16, NULL, NULL, NULL, NULL, NULL),
	(2, 'active', 10, 11, 1, '2021-08-20 00:00:00', 'admin', '2021-11-11 00:00:00', 'admin'),
	(4, 'active', 2, 5, 1, '2021-08-20 00:00:00', 'admin', '2021-11-11 00:00:00', 'admin'),
	(5, 'active', 3, 4, 4, '2021-08-20 00:00:00', 'admin', '2021-11-11 00:00:00', 'admin'),
	(6, 'active', 8, 9, 1, '2021-08-20 00:00:00', 'admin', '2021-11-11 00:00:00', 'admin'),
	(7, 'active', 6, 7, 1, '2021-08-28 00:00:00', 'admin', '2021-11-17 00:00:00', 'admin'),
	(8, 'active', 12, 13, 1, '2021-08-28 00:00:00', 'admin', '2021-11-11 00:00:00', 'admin'),
	(16, 'active', 14, 15, 1, '2021-11-11 00:00:00', 'admin', NULL, NULL);

-- Dumping structure for table hailan_datphong.cate_convenience_translations
DROP TABLE IF EXISTS `cate_convenience_translations`;
CREATE TABLE IF NOT EXISTS `cate_convenience_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cate_convenience_model_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cate_convenience_translations_cate_convenience_model_id_foreign` (`cate_convenience_model_id`),
  CONSTRAINT `cate_convenience_translations_cate_convenience_model_id_foreign` FOREIGN KEY (`cate_convenience_model_id`) REFERENCES `cate_convenience` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.cate_convenience_translations: ~16 rows (approximately)
DELETE FROM `cate_convenience_translations`;
INSERT INTO `cate_convenience_translations` (`id`, `cate_convenience_model_id`, `locale`, `name`) VALUES
	(1, 1, 'en', 'Root'),
	(2, 1, 'vi', '根'),
	(3, 2, 'en', 'To Shop'),
	(4, 2, 'ja', '買い物'),
	(7, 4, 'en', 'To Taste'),
	(8, 4, 'ja', '飲食店'),
	(9, 5, 'en', 'To Drink'),
	(10, 5, 'ja', 'コーヒーショップ'),
	(11, 6, 'en', 'Supermarket'),
	(12, 6, 'ja', 'スーパーマーケット'),
	(13, 7, 'en', 'Hospital & Healthcare Center'),
	(14, 7, 'ja', 'Healthcare'),
	(15, 8, 'en', 'To Exchange'),
	(16, 8, 'ja', 'Bank'),
	(31, 16, 'en', 'To See'),
	(32, 16, 'ja', 'To See');

-- Dumping structure for table hailan_datphong.cate_news
DROP TABLE IF EXISTS `cate_news`;
CREATE TABLE IF NOT EXISTS `cate_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.cate_news: ~0 rows (approximately)
DELETE FROM `cate_news`;

-- Dumping structure for table hailan_datphong.cate_news_translations
DROP TABLE IF EXISTS `cate_news_translations`;
CREATE TABLE IF NOT EXISTS `cate_news_translations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_news_model_id` int(11) unsigned DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keyword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `cate_service_model_id` (`cate_news_model_id`) USING BTREE,
  KEY `locale` (`locale`) USING BTREE,
  CONSTRAINT `cate_news_translations_ibfk_1` FOREIGN KEY (`cate_news_model_id`) REFERENCES `cate_news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.cate_news_translations: ~0 rows (approximately)
DELETE FROM `cate_news_translations`;

-- Dumping structure for table hailan_datphong.contact
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.contact: ~4 rows (approximately)
DELETE FROM `contact`;
INSERT INTO `contact` (`id`, `fullname`, `phone`, `email`, `question`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(13, 'Linh Nguyen', '0336405077', 'nvlinh17041992@gmail.com', 'asdasdasdasdsdds', 'inactive', '2021-08-27 07:58:30', NULL, NULL, NULL),
	(14, 'Linh Nguyen', '0336405077', 'nvlinh17041992@gmail.com', 'asdasdasdasdsdds', 'inactive', '2021-08-27 07:59:58', NULL, NULL, NULL),
	(15, 'Linh Nguyen', '0336405077', 'nvlinh174test01@gmail.com', 'asdasdasdasdsdds', 'inactive', '2021-08-27 08:02:07', NULL, NULL, NULL),
	(16, 'ádasđ', 'ádasđ', 'nvlinh17041992@gmail.com', 'ádasdsdasdasđ', 'inactive', '2021-08-30 00:40:40', NULL, NULL, NULL);

-- Dumping structure for table hailan_datphong.convenience
DROP TABLE IF EXISTS `convenience`;
CREATE TABLE IF NOT EXISTS `convenience` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `sort` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.convenience: ~25 rows (approximately)
DELETE FROM `convenience`;
INSERT INTO `convenience` (`id`, `category_id`, `link`, `status`, `sort`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(1, 2, 'https://www.takashimaya-vn.com/vn', 'active', 25, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(2, 2, 'https://www.tripadvisor.com/Attraction_Review-g293925-d1784754-Reviews-Dong_Khoi_Street-Ho_Chi_Minh_City.html', 'active', 24, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(3, 4, 'https://sushihokkaidosachi.com.vn/ja/', 'active', 23, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(4, 4, 'https://www.tripadvisor.com.vn/Restaurant_Review-g293925-d6880981-Reviews-Ngoc_Suong_Ben_Thuyen_Restaurant-Ho_Chi_Minh_City.html', 'active', 22, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(5, 4, 'https://www.tripadvisor.com.vn/Restaurant_Review-g293925-d1717810-Reviews-Cuc_Gach_Quan-Ho_Chi_Minh_City.html', 'active', 21, '2021-08-20 00:00:00', 'admin', '2021-11-11 00:00:00', 'admin'),
	(6, 4, 'https://www.pho24.com.vn/en/', 'active', 20, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(7, 6, 'https://namanmarket.com/?view=en', 'active', 19, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(8, 6, 'https://www.aeon.com.vn/en/', 'active', 18, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(9, 6, 'http://www.co-opmart.com.vn/trangchu/danhsachcacdiembanhang.aspx', 'active', 17, '2021-08-20 00:00:00', 'admin', '2021-11-04 00:00:00', 'admin'),
	(10, 5, 'https://www.dumiencoffeegroup.com', 'active', 14, '2021-11-04 00:00:00', 'admin', NULL, NULL),
	(11, 7, 'https://www.victoriavn.com/en/', 'active', 15, '2021-11-05 00:00:00', 'admin', NULL, NULL),
	(12, 7, 'https://rafflesmedical.vn/ja/', 'active', 16, '2021-11-05 00:00:00', 'admin', NULL, NULL),
	(13, 5, 'https://en.starbucks.vn', 'active', 13, '2021-11-05 00:00:00', 'admin', NULL, NULL),
	(14, 5, 'https://saigoncasacafe.com.vn', 'active', 12, '2021-11-05 00:00:00', 'admin', NULL, NULL),
	(15, 2, 'https://www.hachihachi.com.vn/jp/', 'active', 11, '2021-11-05 00:00:00', 'admin', NULL, NULL),
	(16, 4, 'https://pizza4ps.com', 'active', 10, '2021-11-11 00:00:00', 'admin', '2021-11-11 00:00:00', 'admin'),
	(17, 8, 'https://www.techcombank.com.vn/home', 'active', 9, '2021-11-11 00:00:00', 'admin', NULL, NULL),
	(18, 8, 'https://www.google.com/maps/dir/10.8020094,106.6645009/Hà+Tâm+Jewelry/@10.7868488,106.6640921,14z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31752f3f25a712a5:0x58f0ae42e35a4342!2m2!1d106.6974025!2d10.7722037', 'active', 8, '2021-11-11 00:00:00', 'admin', NULL, NULL),
	(19, 16, 'https://www.tripadvisor.com.vn/Attraction_Review-g293925-d311103-Reviews-War_Remnants_Museum-Ho_Chi_Minh_City.html', 'active', 7, '2021-11-11 00:00:00', 'admin', NULL, NULL),
	(20, 16, 'https://www.tripadvisor.com.vn/Attraction_Review-g293925-d317890-Reviews-The_Independence_Palace-Ho_Chi_Minh_City.html', 'active', 6, '2021-11-11 00:00:00', 'admin', NULL, NULL),
	(21, 16, 'https://www.tripadvisor.com.vn/Attraction_Review-g293925-d317896-Reviews-Saigon_Notre_Dame_Cathedral-Ho_Chi_Minh_City.html', 'active', 5, '2021-11-11 00:00:00', 'admin', NULL, NULL),
	(22, 16, 'https://www.tripadvisor.com.vn/Attraction_Review-g293925-d311089-Reviews-Central_Post_Office-Ho_Chi_Minh_City.html', 'active', 4, '2021-11-11 00:00:00', 'admin', NULL, NULL),
	(23, 16, 'https://www.tripadvisor.com.vn/Attraction_Review-g293925-d454974-Reviews-Saigon_Opera_House_Ho_Chi_Minh_Municipal_Theater-Ho_Chi_Minh_City.html', 'active', 3, '2021-11-11 00:00:00', 'admin', NULL, NULL),
	(24, 7, 'https://www.columbiaasia.com/vietnam/hospitals/saigon/overview', 'active', 2, '2021-11-17 00:00:00', 'admin', NULL, NULL),
	(25, 7, 'https://lotus-clinic.com/en/', 'active', 1, '2021-11-17 00:00:00', 'admin', NULL, NULL);

-- Dumping structure for table hailan_datphong.convenience_translations
DROP TABLE IF EXISTS `convenience_translations`;
CREATE TABLE IF NOT EXISTS `convenience_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `convenience_model_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `convenience_translations_convenience_model_id_foreign` (`convenience_model_id`),
  CONSTRAINT `convenience_translations_convenience_model_id_foreign` FOREIGN KEY (`convenience_model_id`) REFERENCES `convenience` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.convenience_translations: ~50 rows (approximately)
DELETE FROM `convenience_translations`;
INSERT INTO `convenience_translations` (`id`, `convenience_model_id`, `locale`, `name`) VALUES
	(1, 1, 'en', 'Takashimaya HCM'),
	(2, 1, 'ja', 'ヴィンコムセンター'),
	(3, 2, 'en', 'Dong Khoi Street'),
	(4, 2, 'ja', 'ドンコイ通り'),
	(5, 3, 'en', 'Japanese Food'),
	(6, 3, 'ja', 'すし'),
	(7, 4, 'en', 'Seafood'),
	(8, 4, 'ja', 'シーフード'),
	(9, 5, 'en', 'Vietnamese Food'),
	(10, 5, 'ja', 'ベトナム料理'),
	(11, 6, 'en', 'Phở'),
	(12, 6, 'ja', 'フォー'),
	(13, 7, 'en', 'Nam An'),
	(14, 7, 'ja', 'Nam An'),
	(15, 8, 'en', 'Aeon Mall'),
	(16, 8, 'ja', 'イオンモール'),
	(17, 9, 'en', 'CoopMart'),
	(18, 9, 'ja', 'コープマート'),
	(19, 10, 'en', 'Du Miên Coffee'),
	(20, 10, 'ja', 'Du Miên Coffee'),
	(21, 11, 'en', 'Victoria Healthcare'),
	(22, 11, 'ja', 'Victoria Healthcare'),
	(23, 12, 'en', 'Raffels Medical International Clinic'),
	(24, 12, 'ja', 'Raffels Medical International Clinic'),
	(25, 13, 'en', 'Starbuck Coffee'),
	(26, 13, 'ja', 'Starbuck Coffee'),
	(27, 14, 'en', 'Saigon Casa'),
	(28, 14, 'ja', 'Saigon Casa'),
	(29, 15, 'en', 'Japan Shop Hachi'),
	(30, 15, 'ja', 'Japan Shop Hachi'),
	(31, 16, 'en', 'Pizza 4P\'S'),
	(32, 16, 'ja', 'Pizza 4P\'S'),
	(33, 17, 'en', 'Techcombank'),
	(34, 17, 'ja', 'Techcombank'),
	(35, 18, 'en', 'Money Exchange Ha Tam Jewelry'),
	(36, 18, 'ja', 'Money Exchange Ha Tam Jewelry'),
	(37, 19, 'en', 'War Remnants Museum'),
	(38, 19, 'ja', 'War Remnants Museum'),
	(39, 20, 'en', 'Independence Palace'),
	(40, 20, 'ja', 'Independence Palace'),
	(41, 21, 'en', 'Notral Dame Catheral'),
	(42, 21, 'ja', 'Notre-Dame Cathedral'),
	(43, 22, 'en', 'Central Post Office'),
	(44, 22, 'ja', 'Central Post Office'),
	(45, 23, 'en', 'Opera House'),
	(46, 23, 'ja', 'Opera House'),
	(47, 24, 'en', 'Columbia Asia International Clinic - Saigon'),
	(48, 24, 'ja', 'Columbia Asia International Clinic - Saigon'),
	(49, 25, 'en', 'Lotus Clinic'),
	(50, 25, 'ja', 'Lotus Clinic');

-- Dumping structure for table hailan_datphong.email_bcc
DROP TABLE IF EXISTS `email_bcc`;
CREATE TABLE IF NOT EXISTS `email_bcc` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `template` varchar(1000) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.email_bcc: ~0 rows (approximately)
DELETE FROM `email_bcc`;
INSERT INTO `email_bcc` (`id`, `email`, `template`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(1, 'nvlinh17041992@gmail.com', '["2","1"]', 'active', '2021-08-26 18:11:49', 'admin', '2021-08-27 08:31:28', 'admin');

-- Dumping structure for table hailan_datphong.email_subscribe
DROP TABLE IF EXISTS `email_subscribe`;
CREATE TABLE IF NOT EXISTS `email_subscribe` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.email_subscribe: ~0 rows (approximately)
DELETE FROM `email_subscribe`;

-- Dumping structure for table hailan_datphong.email_template
DROP TABLE IF EXISTS `email_template`;
CREATE TABLE IF NOT EXISTS `email_template` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.email_template: ~2 rows (approximately)
DELETE FROM `email_template`;
INSERT INTO `email_template` (`id`, `name`, `title`, `content`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(1, 'EMAIL_TEMPLATE_SEND_CONTACT', 'DHTS gửi thông tin liên hệ của bạn {{ name }}', '<p>Contact Info</p>\n<ul>\n    <li>Name: {{ fullname }}</li>\n    <li>Phone: {{ phone }} </li>\n    <li>Email: {{ email }} </li>\n    <li>Question: {{ question }} </li>\n</ul>', '2021-08-26 17:42:46', 'admin', '2021-08-30 00:39:26', 'admin'),
	(2, 'EMAIL_TEMPLATE_BOOKING', 'DHTS - Booking Infomation', '<p>Booking Infomation</p>\n<ul>\n    <li>Room: {{ room_name }} </li>\n    <li>Name: {{ fullname }}</li>\n    <li>Phone: {{ phone }} </li>\n    <li>Email: {{ email }} </li>\n    <li>Arrive Date: {{ arrive_date }} </li>\n    <li>Departure Date: {{ departure_date }} </li>\n    <li>Number of person: {{ number_of_person }} </li>\n    <li>Note: {{ note }} </li>\n</ul>', '2021-08-26 17:50:19', 'admin', '2021-08-29 23:34:15', 'admin');

-- Dumping structure for table hailan_datphong.facilities
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `sort` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.facilities: ~4 rows (approximately)
DELETE FROM `facilities`;
INSERT INTO `facilities` (`id`, `thumb`, `thumb_content`, `status`, `sort`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(2, 'TdNVKq3Oa2.jpeg', 'hObDpL7nXg.jpeg', 'active', 14, '2021-08-19 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin'),
	(3, '6D7rLVYYUJ.jpeg', 'kLv98jRpZq.jpeg', 'active', 2, '2021-08-19 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin'),
	(5, 'WkxeU6dx8E.jpeg', 'UazB7sLz98.jpeg', 'active', 1, '2021-08-28 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin'),
	(6, 'IXwFhFdeKk.jpeg', 'asb3MKetLR.jpeg', 'active', 15, '2021-08-28 00:00:00', 'admin', '2021-11-05 00:00:00', 'admin');

-- Dumping structure for table hailan_datphong.facility_translations
DROP TABLE IF EXISTS `facility_translations`;
CREATE TABLE IF NOT EXISTS `facility_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facility_model_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_description` text COLLATE utf8mb4_unicode_ci,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `facility_translations_facility_model_id_foreign` (`facility_model_id`),
  CONSTRAINT `facility_translations_facility_model_id_foreign` FOREIGN KEY (`facility_model_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.facility_translations: ~8 rows (approximately)
DELETE FROM `facility_translations`;
INSERT INTO `facility_translations` (`id`, `facility_model_id`, `locale`, `name`, `head_title`, `head_description`, `main_title`, `main_description`) VALUES
	(1, 2, 'en', 'Spa Center', 'Spa', 'Spa Center at DHTS Business Apartment is the perfect place to get away from the hustle and bustle of the day. The carefully chosen selection of treatments ensures that you can totally relax.', 'Spa', '<p><span style="color:#bca36e;">Location : </span>Level 6 - DHTS Business Apartment<span style="color:#bca36e;"><br />\r\nOpening Hours:&nbsp;&nbsp;From 9:00 am to 8:00 pm</span><br />\r\n<br />\r\nWe highly recommend booking in advance to ensure your desired time and treatments. To make a reservation, please contact us for support!</p>\r\n\r\n<p>Please contact Us at <span style="color:#bca36e;">+84 283 811 0910 </span>or email your inquiry to <span style="color:#bca36e;">sales.apartment@dhts.com.vn</span></p>'),
	(2, 2, 'ja', 'スパセンター', 'スパセンター', 'グーリンダイのポンポコピーのポンポコナーの。海砂利水魚の、食う寝る処に住む処。五劫の擦り切れ、水行末 雲来末 風来末、長久命の長助。寿限無、寿限無。シューリンガンのグーリンダイ。シューリンガンのグーリンダイ。寿限無、寿限無。五劫の擦り切れ。', 'ビジネスサービス', '<p>海砂利水魚の、グーリンダイのポンポコピーのポンポコナーの、やぶら小路の藪柑子、水行末 雲来末 風来末、食う寝る処に住む処。パイポパイポ パイポのシューリンガン、シューリンガンのグーリンダイ、グーリンダイのポンポコピーのポンポコナーの。</p>'),
	(3, 3, 'en', 'Fitness Center', 'Gym', 'Caters to all level of fitness enthusiasts, our Fitness Center offers standard gym equipment including treadmills, fitness bicycle, strength machines. The ideal venue to catch-up with your exercise routine.', 'GYM', '<p><span style="color:#bca36e;">Location :</span> Level 8&nbsp;- DHTS Business Apartment<br />\r\n<span style="color:#bca36e;">Opening Hours:</span>&nbsp;&nbsp;From 8:00 am to 8:00 pm<br />\r\n&nbsp;</p>\r\n\r\n<p>Please contact Us at <span style="color:#bca36e;">+84 283 811 0910</span> or email your inquiry to <span style="color:#bca36e;">sales.apartment@dhts.com.vn</span></p>'),
	(4, 3, 'ja', 'ニッコーフィットネスセンター', 'ジム', 'あらゆるレベルのトレーニングに対応するトレッドミルやエアロバイク、フィットネスマシンなどを揃えています。日々のエクササイズに最適です。', 'ジム', '<p><span style="color:#bca36e;">場所:</span> 8 階 - DHTS Business Apartment<br />\r\n<span style="color:#bca36e;">利用時間: </span>午前8時 ~ 午後8時</p>\r\n\r\n<p>お問い合わせください：<br />\r\n電話番号: +84 283 811 0910<br />\r\nメール: &nbsp;sales.apartment@dhts.com.vn</p>'),
	(7, 5, 'en', 'Swimming Pool', 'Panoramic City View', 'The turquoise outdoor swimming pool at DHTS offers resort like relaxation. The spacious terrace overlooking Ho Chi Minh City is surrounded by sunbeds that are perfect for sunbathing or just simply unwinding. \r\nRooftop features stunning panoramic views at sunrise and sunset.', 'SWIMMING POOL', '<p><span style="color:#bca36e;">Location:</span> Level 9&nbsp;- DHTS Business Apartment<br />\r\n<span style="color:#bca36e;">Open Hour: </span>7:00 am to 8:00&nbsp;pm<br />\r\n&nbsp;</p>\r\n\r\n<p><span style="color:#bca36e;">Length: </span>20m &nbsp;&nbsp;<span style="color:#bca36e;">Widt</span><span style="color:#bca36e;">h:</span>3m &nbsp;<span style="color:#bca36e;">Depth:</span> 1,5m<br />\r\nJacuzzi is also available.</p>\r\n\r\n<p><span style="color:Swimming Pool;"></span></p>'),
	(8, 5, 'ja', 'プール', 'パノラマの街', 'DHTS の屋外プールから、街のパノラマを眺めることができます。\r\nプールサイドに広がるテラスにはサンベッドが設置されており、日光浴を楽しみながらゆったりとお過ごし頂けます。', 'プール', '<p><span style="color:#bca36e;">場所:</span>&nbsp;9&nbsp;階 - DHTS Business Apartment</p>\r\n\r\n<p><span style="color:#bca36e;">利用時間:</span> 午前7時 ~ 午後8時</p>\r\n\r\n<p><span style="color:#bca36e;">長さ:</span> 20m<span style="color:#bca36e;"> 幅:</span> 3m <span style="color:#bca36e;">深さ:</span> 1,5m</p>\r\n\r\n<p>ジャグジーを使う。</p>'),
	(9, 6, 'en', 'Sauna & Steambath', 'Sauna & Steambath', 'Being away from home doesn\'t mean one has to miss familiar comforts. DHTS features brand new sauna and elegant steam bath perfect for unwinding after a busy day in the bustling city.', NULL, '<p><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span new="" roman="" style="font-family:" times=""><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:-.15pt"></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p><span style="font-size:18px;"><span style="color:#bca36e;">Sauna &amp; Steambath</span></span></p>\r\n\r\n<p>Enjoy the benefits of our sauna &amp; steambath&nbsp;for your post-exercise recovery or to relax after a long day.</p>\r\n\r\n<p><span style="color:#bca36e;">Location : </span>Level 8&nbsp;- DHTS Business Apartment<br />\r\n<span style="color:#bca36e;">Opening Hours:</span>&nbsp;&nbsp;From 8:00 am to 8:00 pm<br />\r\n&nbsp;</p>\r\n\r\n<p>Please contact us at <span style="color:#bca36e;">+84 283 811 0910</span> or email your inquiry to <span style="color:#bca36e;">sales.apartment@dhts.com.vn</span><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span new="" roman="" style="font-family:" times=""><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:-.15pt"></span></span></span></span></span></span></span></span></span></p>'),
	(10, 6, 'ja', 'Sauna', 'Sauna', 'Sauna', NULL, NULL);

-- Dumping structure for table hailan_datphong.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(11) unsigned DEFAULT NULL,
  `sort` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `media_id` (`media_id`) USING BTREE,
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.images: ~32 rows (approximately)
DELETE FROM `images`;
INSERT INTO `images` (`id`, `media_id`, `sort`, `name`, `alt`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(165, 12, 1, 'DSC07642-1_6128c88f7d015.jpeg', NULL, NULL, NULL, NULL, NULL),
	(166, 13, 1, 'Room_1 (14)a_61290bcb097f1.jpeg', NULL, NULL, NULL, NULL, NULL),
	(167, 13, 2, 'Room_1 (11)a_61290bcb33d40.jpeg', NULL, NULL, NULL, NULL, NULL),
	(168, 13, 3, 'Room_1 (15)a_61290bcbbdbd5.jpeg', NULL, NULL, NULL, NULL, NULL),
	(177, 13, 4, 'Room_1 (21)a_612a0c21101e8.jpeg', NULL, NULL, NULL, NULL, NULL),
	(178, 13, 5, '_L4A2014_612a0c20d6ba3.jpeg', NULL, NULL, NULL, NULL, NULL),
	(179, 13, 6, 'Room_3 (13)a_612a0c2d09107.jpeg', NULL, NULL, NULL, NULL, NULL),
	(180, 13, 7, 'Room_5 (16)a_612a0c397dd31.jpeg', NULL, NULL, NULL, NULL, NULL),
	(181, 13, 8, 'Room_5 (15)a_612a0c3981434.jpeg', NULL, NULL, NULL, NULL, NULL),
	(183, 13, 9, 'Room_2 (2)a_612a0c49030ce.jpeg', NULL, NULL, NULL, NULL, NULL),
	(184, 13, 10, 'Room_2 (3)a_612a0c4972932.jpeg', NULL, NULL, NULL, NULL, NULL),
	(185, 13, 11, 'Room_2 (4)a_612a0c4980585.jpeg', NULL, NULL, NULL, NULL, NULL),
	(186, 13, 12, 'Room_2 (25)a_612a0c49ce537.jpeg', NULL, NULL, NULL, NULL, NULL),
	(187, 13, 13, 'Room_4 (9)a_612a0c97e80f5.jpeg', NULL, NULL, NULL, NULL, NULL),
	(189, 13, 14, 'Room_4 (14)a_612a0c9868337.jpeg', NULL, NULL, NULL, NULL, NULL),
	(190, 13, 15, 'Room_4(19)a_612a0c9873a77.jpeg', NULL, NULL, NULL, NULL, NULL),
	(191, 13, 16, '_Room_6 (4)a - 1_612a0caa6bb49.jpeg', NULL, NULL, NULL, NULL, NULL),
	(192, 13, 17, '_Room_6 (8)a_612a0caaa111b.jpeg', NULL, NULL, NULL, NULL, NULL),
	(193, 13, 18, 'Room_6 (5)a_612a0cab2e861.jpeg', NULL, NULL, NULL, NULL, NULL),
	(195, 13, 19, 'Room_6 (10)a_612a0cab77b52.jpeg', NULL, NULL, NULL, NULL, NULL),
	(196, 13, 20, 'Room_6 (11)a_612a0cabbb6c0.jpeg', NULL, NULL, NULL, NULL, NULL),
	(197, 13, 21, 'Room_6 (15)a_612a0cabf1bf8.jpeg', NULL, NULL, NULL, NULL, NULL),
	(198, 13, 22, 'Room_6 (7)a_612b39c497a25.jpeg', NULL, NULL, NULL, NULL, NULL),
	(199, 13, 23, 'Room_6 (1)a_612b39c4918b5.jpeg', NULL, NULL, NULL, NULL, NULL),
	(200, 13, 24, 'Room_5 (1)a_612b39d894103.jpeg', NULL, NULL, NULL, NULL, NULL),
	(201, 13, 25, 'Room_5 (8)a_612b39d8ad987.jpeg', NULL, NULL, NULL, NULL, NULL),
	(202, 13, 26, 'Room_5 (7)a_612b39d933216.jpeg', NULL, NULL, NULL, NULL, NULL),
	(203, 13, 27, 'Room_5 (17)a_612b39d946b44.jpeg', NULL, NULL, NULL, NULL, NULL),
	(204, 13, 28, 'Room_2 (10)a_612b3a0146533.jpeg', NULL, NULL, NULL, NULL, NULL),
	(205, 13, 29, 'Room_2 (1)a_612b3a0143b00.jpeg', NULL, NULL, NULL, NULL, NULL),
	(206, 13, 30, 'Room_2 (22)_612b3a01c8b6b.jpeg', NULL, NULL, NULL, NULL, NULL),
	(207, 13, 31, 'Room_2 (20)a_612b3a01bc992.jpeg', NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table hailan_datphong.media
DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.media: ~3 rows (approximately)
DELETE FROM `media`;
INSERT INTO `media` (`id`, `status`, `sort`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(11, 'active', 3, '2021-08-20 05:51:43', 'admin', '2021-08-29 21:28:24', 'admin'),
	(12, 'active', 2, '2021-08-20 05:52:42', 'admin', '2021-08-29 14:43:04', 'admin'),
	(13, 'active', 1, '2021-08-20 05:54:22', 'admin', '2021-08-29 14:41:42', 'admin');

-- Dumping structure for table hailan_datphong.media_translations
DROP TABLE IF EXISTS `media_translations`;
CREATE TABLE IF NOT EXISTS `media_translations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `media_model_id` int(10) unsigned DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_media_translations_media` (`media_model_id`),
  CONSTRAINT `FK_media_translations_media` FOREIGN KEY (`media_model_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.media_translations: ~6 rows (approximately)
DELETE FROM `media_translations`;
INSERT INTO `media_translations` (`id`, `media_model_id`, `locale`, `name`) VALUES
	(3, 11, 'en', 'Outdoor'),
	(4, 11, 'ja', 'ホテル＆グラウンド'),
	(5, 12, 'en', 'Facilities'),
	(6, 12, 'ja', '部屋/スイート'),
	(7, 13, 'en', 'Rooms'),
	(8, 13, 'ja', 'トイレ');

-- Dumping structure for table hailan_datphong.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.migrations: ~11 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2021_08_19_151824_create_facilities_table', 3),
	(7, '2021_08_19_152659_create_facility_translations_table', 4),
	(8, '2021_08_19_212851_create_benefit_table', 5),
	(9, '2021_08_19_212943_create_benefit_translations_table', 6),
	(10, '2021_08_19_234011_create_cate_convenience_table', 7),
	(12, '2021_08_19_234033_create_cate_convenience_translations_table', 8),
	(13, '2021_08_20_003615_create_convenience_table', 9),
	(14, '2021_08_20_003633_create_convenience_translations_table', 10),
	(15, '2021_08_20_063554_create_contact_table', 11),
	(16, '2021_08_26_074041_create_table_reviews', 12),
	(17, '2021_08_26_172425_create_booking_table', 13);

-- Dumping structure for table hailan_datphong.reviews
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rating_cleaness` int(10) unsigned NOT NULL DEFAULT '5',
  `rating_staff_service` int(10) unsigned NOT NULL DEFAULT '5',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `sort` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hailan_datphong.reviews: ~4 rows (approximately)
DELETE FROM `reviews`;
INSERT INTO `reviews` (`id`, `rating_cleaness`, `rating_staff_service`, `name`, `country`, `message`, `status`, `sort`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(1, 5, 5, 'Toshiyuki', 'Japan', '誕生日で、夜部屋に戻るとケーキが用意してありとてもうれしかったです！ そして、テト中でもしっかりした行き届いたサービスで気持ち良く過ごせました。 ありがとうございました', 'active', 5, '2021-08-26 08:42:31', 'admin', '2021-08-27 22:42:01', 'admin'),
	(89, 4, 5, 'あな', 'Japan', '初めてのHCMCでの滞在で良い印象を持ちました、次回も使いたい。', 'active', 5, '2021-08-26 15:53:26', NULL, '2021-08-27 22:43:45', 'admin'),
	(98, 5, 5, 'John', 'USA', 'Quiet for Saigon, lovely people who couldn’t have been more helpful. Nice panorama view outdoor pool. Great place to stay for business trip !', 'active', 4, '2021-08-27 22:56:01', 'admin', '2021-08-27 22:57:35', 'admin'),
	(99, 5, 5, 'Noriko', 'Japan', '清潔感があり、スタッフ（特に清掃スタッフ）の笑顔がよかった。', 'active', 3, '2021-08-29 15:40:53', 'admin', NULL, NULL);

-- Dumping structure for table hailan_datphong.room
DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  `sort` int(6) DEFAULT NULL,
  `images` longtext,
  `images_extra` longtext,
  `price_day` int(11) DEFAULT NULL,
  `price_month` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.room: ~6 rows (approximately)
DELETE FROM `room`;
INSERT INTO `room` (`id`, `status`, `sort`, `images`, `images_extra`, `price_day`, `price_month`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(2, 'active', 2, '[{"name":"R05_01 -1_6128c730471a5.jpeg","alt":null},{"name":"R05_02 -1_6128c793d5d74.jpeg","alt":null},{"name":"Room_5 (7)a_612a0ffeaf8b3.jpeg","alt":null},{"name":"Room_5 (8)a_612a0ffe5d253.jpeg","alt":null},{"name":"Room_5 (17)a_612a10001ef04.jpeg","alt":null},{"name":"Room_5 (10)a_612a0fffcc81d.jpeg","alt":null},{"name":"R05_30503 - 1_6128c793d2e80.jpeg","alt":null},{"name":"DSC07642-1_6128c7944368f.jpeg","alt":null},{"name":"Room_5 (9)a_612a0fffb94cb.jpeg","alt":null},{"name":"dsc07641_612de7280fef6.jpeg","alt":null},{"name":"dsc07642_612de72808c62.jpeg","alt":null},{"name":"dsc07644_612de72920f89.jpeg","alt":null},{"name":"dsc07645_612de729346be.jpeg","alt":null},{"name":"dsc07646_612de729718f2.jpeg","alt":null},{"name":"dsc07650_612de729c949a.jpeg","alt":null},{"name":"dsc07653_612de729d4715.jpeg","alt":null}]', '[{"name":"room-5-16a_612bcf164c03f.jpeg","alt":null},{"name":"room-5-15a_612bcf163f7bc.jpeg","alt":null}]', 110, 1300, '2021-08-20 07:08:56', 'admin', '2021-12-03 14:12:33', 'admin'),
	(3, 'active', 1, '[{"name":"Room_6 (7)a_6129022bde6a6.jpeg","alt":null},{"name":"Room_6 (1)a_6129022b42612.jpeg","alt":null},{"name":"Room_6 (3)a_6129022bae4ef.jpeg","alt":null},{"name":"Room_6 (2)a_6129022c765ca.jpeg","alt":null},{"name":"dsc07663_61a9ce735baca.jpeg","alt":null},{"name":"dsc07664_61a9ce735b949.jpeg","alt":null},{"name":"dsc07666_61a9ce768608d.jpeg","alt":null},{"name":"dsc07667_61a9ce7808ff4.jpeg","alt":null},{"name":"dsc07668_61a9ce781f737.jpeg","alt":null},{"name":"dsc07669_61a9ce79b0617.jpeg","alt":null},{"name":"dsc07670_61a9ce795c9ed.jpeg","alt":null},{"name":"dsc07677_61a9ce7a6a7f9.jpeg","alt":null},{"name":"dsc07680_61a9ce7b01e16.jpeg","alt":null},{"name":"dsc07681_61a9ce7b4d4b6.jpeg","alt":null},{"name":"dsc07682_61a9ce7ca24f1.jpeg","alt":null}]', '[{"name":"room-6-4a-1_612bcf25da109.jpeg","alt":null},{"name":"room-6-8a_612bcf263494a.jpeg","alt":null},{"name":"room-6-5a_612bcf266e686.jpeg","alt":null},{"name":"room-6-9a_612bcf269f6f7.jpeg","alt":null}]', 98, 1100, '2021-08-27 13:08:04', 'admin', '2021-12-03 15:12:15', 'admin'),
	(4, 'active', 3, '[{"name":"Room_1 (14)a_612901bc99234.jpeg","alt":null},{"name":"Slide 6_61288ecb5ca93.jpeg","alt":null},{"name":"Room_1 (11)a_612901bc90d8e.jpeg","alt":null},{"name":"Room_1 (15)a_612901bd64df7.jpeg","alt":null},{"name":"Room_1 (16)a_612901bd902c7.jpeg","alt":null},{"name":"Room_1 (18)a_612901be9301c.jpeg","alt":null},{"name":"Room_1 (19)a_612901e18a71c.jpeg","alt":null},{"name":"_L4A2014_6129e6e7a5339.jpeg","alt":null},{"name":"dsc07520_61a9cff7457ef.jpeg","alt":null},{"name":"dsc07524_61a9d002cf3e7.jpeg","alt":null},{"name":"dsc07527_61a9cff99b6d8.jpeg","alt":null},{"name":"dsc07528_61a9cffb0e57e.jpeg","alt":null},{"name":"dsc07529_61a9cffc0e035.jpeg","alt":null},{"name":"dsc07531_61a9cfff123f9.jpeg","alt":null},{"name":"dsc07534_61a9d001ca8b8.jpeg","alt":null},{"name":"dsc07535_61a9d00456eda.jpeg","alt":null},{"name":"dsc07538_61a9d0044bbd4.jpeg","alt":null},{"name":"dsc07539_61a9d005822e9.jpeg","alt":null},{"name":"dsc07540_61a9d005d3a13.jpeg","alt":null},{"name":"dsc07512_61a9d0066f264.jpeg","alt":null},{"name":"dsc07517_61a9d007e39fc.jpeg","alt":null}]', '[{"name":"room-1-21a_612bcf4552d39.jpeg","alt":null},{"name":"room-1-10a_612bcf456f681.jpeg","alt":null}]', 105, 1433, '2021-08-27 14:08:48', 'admin', '2021-12-03 15:12:44', 'admin'),
	(5, 'active', 4, '[{"name":"Room_3 (5)a_6129005564f1a.jpeg","alt":null},{"name":"Room_3 (3)a_612900555713a.jpeg","alt":null},{"name":"Room_3 (7)a_6129005662582.jpeg","alt":null},{"name":"Room_3(6)a_61290056d69d0.jpeg","alt":null},{"name":"Slide 6_6128a993b70e7.jpeg","alt":null},{"name":"dsc07598_61a9d03ead984.jpeg","alt":null},{"name":"dsc07601_61a9d03f5a036.jpeg","alt":null},{"name":"dsc07604_61a9d040441a5.jpeg","alt":null},{"name":"dsc07605_61a9d0436a7df.jpeg","alt":null},{"name":"dsc07608_61a9d0445e2b5.jpeg","alt":null},{"name":"dsc07609_61a9d04560d03.jpeg","alt":null},{"name":"dsc07610_61a9d047a3351.jpeg","alt":null},{"name":"dsc07615_61a9d0487ff81.jpeg","alt":null},{"name":"dsc07617_61a9d04bb7673.jpeg","alt":null},{"name":"dsc07618_61a9d04d4ecc5.jpeg","alt":null},{"name":"dsc07624_61a9d04e3b473.jpeg","alt":null},{"name":"dsc07627_61a9d04ec568f.jpeg","alt":null},{"name":"dsc07636_61a9d0b12a4b0.jpeg","alt":null}]', '[{"name":"room-3-13a_612bcf54c7bd8.jpeg","alt":null},{"name":"room-3-12a_612bcf54bf9e1.jpeg","alt":null},{"name":"room-3-2a_612bcf556a858.jpeg","alt":null}]', 130, 1533, '2021-08-27 16:08:04', 'admin', '2021-12-03 15:12:32', 'admin'),
	(6, 'active', 7, '[{"name":"Room_4 (2)a_6128ffd4a65e7.jpeg","alt":null},{"name":"Room_4 (1)a_6128ffd55b8fd.jpeg","alt":null},{"name":"Room_4 (3)a_6128ffd558f52.jpeg","alt":null},{"name":"Room_4 (4)a_6128ffd6676e6.jpeg","alt":null},{"name":"Room_4 (17)a_6128ffd67bd2a.jpeg","alt":null},{"name":"Room_4(16)a_6128ffd755330.jpeg","alt":null},{"name":"Room_4(18)a_6128ffd7531b1.jpeg","alt":null}]', '[{"name":"room-4-14a_612bcf65e0f86.jpeg","alt":null},{"name":"room-4-9a_612bcf66e564b.jpeg","alt":null},{"name":"room-419a_612bcf6708812.jpeg","alt":null}]', 180, 1633, '2021-08-27 16:08:17', 'admin', '2021-12-03 14:12:48', 'admin'),
	(7, 'active', 8, '[{"name":"Room_2 (19)a_612902be37e08.jpeg","alt":null},{"name":"DHTS_Slide- 2_6128afa70d006.jpeg","alt":null},{"name":"Room_2 (1)a_612902bc081ba.jpeg","alt":null},{"name":"Room_2 (18)a_612902be1a375.jpeg","alt":null},{"name":"Room_2 (5)a_612902bc2e463.jpeg","alt":null},{"name":"Room_2 (10)a_612902bc62e8d.jpeg","alt":null},{"name":"Room_2 (11)a_612902bd0cdce.jpeg","alt":null},{"name":"Room_2 (13)a_612902bd11906.jpeg","alt":null},{"name":"Room_2 (15)a_612902bd8449f.jpeg","alt":null},{"name":"Room_2 (16)a_612902bdd57f2.jpeg","alt":null},{"name":"Room_2 (21)a_612902be64e06.jpeg","alt":null},{"name":"Room_2 (22)_612902be9baaa.jpeg","alt":null},{"name":"Room_2 (24)a_612902bee7569.jpeg","alt":null}]', '[{"name":"room-6-4a-1_612bcf7ea8673.jpeg","alt":null},{"name":"room-6-8a_612bcf7ec8454.jpeg","alt":null},{"name":"room-6-9a_612bcf7faaea7.jpeg","alt":null},{"name":"room-6-5a_612bcf7fbb6c2.jpeg","alt":null}]', 180, 1733, '2021-08-27 16:08:42', 'admin', '2021-12-03 14:12:16', 'admin');

-- Dumping structure for table hailan_datphong.room_translations
DROP TABLE IF EXISTS `room_translations`;
CREATE TABLE IF NOT EXISTS `room_translations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `room_model_id` int(11) unsigned DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `overview` longtext,
  `content` longtext,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(1000) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `product_model_id` (`room_model_id`) USING BTREE,
  CONSTRAINT `room_translations_ibfk_1` FOREIGN KEY (`room_model_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.room_translations: ~12 rows (approximately)
DELETE FROM `room_translations`;
INSERT INTO `room_translations` (`id`, `room_model_id`, `locale`, `name`, `overview`, `content`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
	(3, 2, 'en', 'DHTS Suites', '<p>DHTS Suites combine unpretentious luxury and convenience. The soft bed, large bathtub and comfortable couch invite one to relax sorrounded by warm wood and comforting light. &nbsp;A fully equipped fitness room, sauna and steam bath a few floors above are available 24/7. Experienced staff manages all cleaning and laundry needs while functioning as family members who are excited to assist with recommendations for the best way to enjoy the convenient location. Each room is a safe and private escape from the hectic city that allows you to feel at home.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Size: 47&nbsp;m2</li>\r\n	<li>One&nbsp;Queen&nbsp;bed</li>\r\n	<li>Spacious living&nbsp;room</li>\r\n	<li>Private Window</li>\r\n	<li>No. room: 04&nbsp;rooms</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '<p>Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class="btgrid">\r\n<div class="row row-1">\r\n<div class="col col-md-4">\r\n<div class="content">\r\n<p><strong>LIVING ROOM</strong></p>\r\n\r\n<ul>\r\n	<li><span aria-hidden="true" class="fa fa-table"></span>&nbsp;Oversized work desk</li>\r\n	<li><span aria-hidden="true" class="fa fa-volume-down"></span>&nbsp;Hairdryer</li>\r\n	<li><span aria-hidden="true" class="fa fa-clipboard"></span>&nbsp;Iron/ironing board upon request</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="col col-md-4">\r\n<div class="content">\r\n<p><strong>KITCHEN ROOM</strong></p>\r\n\r\n<ul>\r\n	<li><span aria-hidden="true" class="fa fa-table"></span>&nbsp;Oversized work desk</li>\r\n	<li><span aria-hidden="true" class="fa fa-volume-down"></span>&nbsp;Hairdryer</li>\r\n	<li><span aria-hidden="true" class="fa fa-clipboard"></span>&nbsp;Iron/ironing board upon request</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="col col-md-4">\r\n<div class="content">\r\n<p><strong>BALCONY</strong></p>\r\n\r\n<ul>\r\n	<li><span aria-hidden="true" class="fa fa-table"></span>&nbsp;Oversized work desk</li>\r\n	<li><span aria-hidden="true" class="fa fa-volume-down"></span>&nbsp;Hairdryer</li>\r\n	<li><span aria-hidden="true" class="fa fa-clipboard"></span>&nbsp;Iron/ironing board upon request</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row row-2">\r\n<div class="col col-md-4">\r\n<div class="content">\r\n<p><strong>BEDROOM</strong></p>\r\n\r\n<ul>\r\n	<li><span aria-hidden="true" class="fa fa-table"></span>&nbsp;Oversized work desk</li>\r\n	<li><span aria-hidden="true" class="fa fa-volume-down"></span>&nbsp;Hairdryer</li>\r\n	<li><span aria-hidden="true" class="fa fa-clipboard"></span>&nbsp;Iron/ironing board upon request</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="col col-md-4">\r\n<div class="content">\r\n<p><strong>BATHROOM</strong></p>\r\n\r\n<ul>\r\n	<li><span aria-hidden="true" class="fa fa-table"></span>&nbsp;Oversized work desk</li>\r\n	<li><span aria-hidden="true" class="fa fa-volume-down"></span>&nbsp;Hairdryer</li>\r\n	<li><span aria-hidden="true" class="fa fa-clipboard"></span>&nbsp;Iron/ironing board upon request</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="col col-md-4">\r\n<div class="content">\r\n<p><strong>OVERSIZED WORK DESK</strong></p>\r\n\r\n<ul>\r\n	<li><span aria-hidden="true" class="fa fa-table"></span>&nbsp;Oversized work desk</li>\r\n	<li><span aria-hidden="true" class="fa fa-volume-down"></span>&nbsp;Hairdryer</li>\r\n	<li><span aria-hidden="true" class="fa fa-clipboard"></span>&nbsp;Iron/ironing board upon request</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', 'DHTS Suites', 'DHTS Suites', 'DHTS Suites'),
	(4, 2, 'ja', 'DHTS スイート', '<h2 style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-left:10px"><span style="font-size:14pt"><span style="line-height:28.25pt"><span cjk="" jp="" medium="" noto="" sans="" style="font-family:"><span style="font-weight:normal"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="letter-spacing:normal"><span style="orphans:auto"><span style="text-transform:none"><span style="white-space:normal"><span style="widows:auto"><span style="word-spacing:0px"><span style="-webkit-text-size-adjust:auto"><span style="text-decoration:none"><span lang="EN-US" style="color:#414042"><span style="letter-spacing:-0.35pt"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></h2>\r\n\r\n<p style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:9pt"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="orphans:auto"><span style="text-transform:none"><span style="white-space:normal"><span style="widows:auto"><span style="word-spacing:0px"><span style="-webkit-text-size-adjust:auto"><span style="text-decoration:none"><span style="line-height:8.640000343322754px">&nbsp;&nbsp;<span hei="" lang="EN-US" micro="" style="font-family:" wenquanyi=""><span style="color:#414042">DHTS</span></span><span gothic="" lang="EN-US" ms="" style="font-family:"><span style="color:#414042">スイートは見栄を張らない贅沢さと便利さを兼ね備えています。温かみのある木製の内装と心地よいライトに囲まれ、柔らかなベッドや広いバスタブ、ソファなどでリラックスできます。上の階にある設備の整ったジム、サウナ、スチームバスは年中無休で利用可能。経験豊富なスタッフたちはこの便利なロケーションを堪能するために最良な過ごし方をサポートしてくれ、すべての掃除と洗濯も管理してくれます。各部屋は都会の喧騒から離れた、安心でプライベートな空間。あなたにくつろぎを与えてくれます。</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:50%">\r\n			<h3>スペシャルルーム</h3>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td style="width:50%">\r\n			<h3>サービスルーム</h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>最大：4人</li>\r\n				<li>サイズ：35 m2 / 376 ft2</li>\r\n				<li>ビュー：海</li>\r\n				<li>ベッド：キングサイズまたはツインベッド</li>\r\n			</ul>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>\r\n			<ul>\r\n				<li>特大のワークデスク</li>\r\n				<li>ヘアドライヤー</li>\r\n				<li>リクエストに応じてアイロン/アイロン台</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<ul>\r\n	<li><span style="font-size:11pt"><span style="line-height:12.8pt"><span style="tab-stops:18.3pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span>&nbsp;&nbsp;<span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">面積</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.1pt">：</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span hei="" micro="" style="font-family:" wenquanyi=""><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.1pt">47m</span></span></span></span></span></span>&nbsp;<sup><span lang="EN-US" style="font-size:9pt"><span courier="" new="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt">2</span></span></span></span></span></sup><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">クイーンベッド</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">スマートソニーテレビ</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">広々としたリビングルーム</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.05pt">室数：</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span hei="" micro="" style="font-family:" wenquanyi=""><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt">4&nbsp;<span style="letter-spacing:0.15pt">DHTS</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">スイート</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">モンスーンシャワー</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">炊飯器やケトル、調理道具を含むキッチン</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">電子レンジ</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li><span style="font-size:11pt"><span style="tab-stops:18.3pt"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"></span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">毎日の洗濯と掃除サービス（日曜と祝日は除く）</span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="color:#231f20"></span></span></span></span></span></span></li>\r\n	<li style="margin-top:2px; margin-right:81px"><span style="font-size:11pt"><span style="line-height:70%"><span style="tab-stops:18.3pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US" style="font-size:9.0pt"><span style="line-height:70%"></span></span><span lang="EN-US" style="font-size:9pt"><span style="line-height:8.399999618530273px"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">個人の無料空港送迎（</span></span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="line-height:8.399999618530273px"><span hei="" micro="" style="font-family:" wenquanyi=""><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">10</span></span></span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="line-height:8.399999618530273px"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="position:relative"><span style="top:-0.5pt"><span style="letter-spacing:0.15pt">日以上の宿泊するゲストが利</span></span></span></span></span></span></span>&nbsp;<span lang="EN-US" style="font-size:9pt"><span style="line-height:8.399999618530273px"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">用可能）</span></span></span></span></span><span lang="EN-US" style="font-size:9pt"><span style="line-height:8.399999618530273px"><span style="color:#231f20"></span></span></span></span></span></span></span></li>\r\n</ul>', 'DHTS スイート', 'DHTS スイート', 'DHTS スイート'),
	(5, 3, 'en', 'Blossom Suites', '<h1 style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-top:7px"><span style="font-size:14px;"><span style="font-family:Tahoma,Geneva,sans-serif;"><span style="font-weight:normal"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"><span lang="VI"></span></span></span></span></span></span></span></span></span></span></span></span></span></h1>\r\n\r\n<p style="margin-top:7px; text-align:justify"><span style="font-size:11pt"><span style="background:white"><span style="line-height:20.4pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style="margin-top:7px; text-align:justify"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span new="" roman="" style="font-family:" times=""><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt">The warm wood and soft light of the one-bedroom apartments invite guests to relax and refresh in style. With all the kitchen, bath, entertainment and lifestyle amenities provided, you will certainly be at your most comfort state. Access to a state-of-the-art fitness room and rooftop pool furthers the homey atmosphere. The convenient location between the international airport and the city center makes it easy to work, explore and play while having a safe and quiet place to sleep.</span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times="">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Size: 40&nbsp;m&nbsp;</span></span></span></span><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">2</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">One&nbsp;</span></span></span></span><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Queen&nbsp;bed</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Spacious living&nbsp;room</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">No. room: 04&nbsp;rooms</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px">&nbsp;</p>\r\n\r\n<p style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px">&nbsp;</p>\r\n\r\n<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif"></span></span></span></p>\r\n\r\n<p style="margin-right:3px; margin-left:10px"><span style="font-size:11pt"><span style="background:white"><span style="line-height:20.4pt"><span style="font-family:Calibri,sans-serif"><i><span style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:.25pt"></span></span></span></span></i><span style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"></span></span></span></span></span></span></span></span></p>\r\n\r\n<p class="MsoBodyText" style="text-align: start; text-indent: 0px; -webkit-text-stroke-width: 0px; margin-right: 3px; margin-left: 10px;"><em><span style="line-height:10.8pt"><span style="color:#414042"></span></span></em></p>\r\n\r\n<h1 style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-top:7px"><span style="font-size:14px;"><span style="font-family:Verdana, sans-serif"><span style="font-weight:normal"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"><span lang="VI"><span style="font-family:Tahoma,Geneva,sans-serif;"></span><span style="font-family:Verdana,Geneva,sans-serif;"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></h1>', '<p>Blossom Suites</p>', 'Blossom Suites', 'The warm wood and soft light of the one-bedroom apartments invite guests to relax and refresh in style. With all the kitchen, bath, entertainment and lifestyle amenities provided, you will certainly be at your most comfort state. Access to a state-of-the-art fitness room and rooftop pool furthers the homey atmosphere. The convenient location between the international airport and the city center makes it easy to work, explore and play while having a safe and quiet place to sleep.\r\n\r\n\r\nSize: 40 m 2\r\n\r\nOne Queen bed\r\n\r\nSpacious living room\r\n\r\nNo. room: 04 rooms', 'Blossom Suites'),
	(6, 3, 'ja', 'ブロッソムスイート', '<p style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:11pt"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="orphans:auto"><span style="text-transform:none"><span style="white-space:normal"><span style="widows:auto"><span style="word-spacing:0px"><span style="-webkit-text-size-adjust:auto"><span style="text-decoration:none"><span lang="VI" style="font-size:9pt">1</span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:">ベッドルームアパートでは、温かな木製の内装と柔らかなライトの中で、スタイリッシュにリラックスして過ごすことができます。キッチンやバス、エンターテインメント、ライフスタイルのためのアメニティも揃っているので、快適な暮らしが叶います。最新式のジムとルーフトッププールを利用したら、さらにアットホームな雰囲気が感じられるでしょう。国際空港と都市の中心部の間の便利なロケーションなので、安全かつ静かな場所で就寝でき、仕事や旅行も快適です。</span></span><span lang="VI" style="font-size:9pt"><span gothic="" ms="" style="font-family:"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', NULL, 'ブロッソムスイート', 'ブロッソムスイート', 'ブロッソムスイート'),
	(7, 4, 'en', 'Sky Corner Suites', '<h1 style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-top:7px"><span style="font-family:Verdana,Geneva,sans-serif;"><span style="font-size:14px;"><span style="font-weight:normal"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"><span lang="VI"></span></span></span></span></span></span></span></span></span></span></span></span></span></h1>\r\n\r\n<p style="text-indent:0px; -webkit-text-stroke-width:0px; margin-top:7px; text-align:justify"><span style="font-weight:normal"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span new="" roman="" style="font-family:" times=""><span style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"></span></span></span></span></span></span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span new="" roman="" style="font-family:" times=""><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt">The warm wood and soft light of the one-bedroom apartments invite guests to relax and refresh in style. With all the kitchen, bath, entertainment and lifestyle amenities provided, you will certainly be at your most comfort state. Access to a state-of-the-art fitness room and rooftop pool furthers the homey atmosphere. The convenient location between the international airport and the city center makes it easy to work, explore and play while having a safe and quiet place to sleep.</span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times="">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Size: 47&nbsp;m&nbsp;2</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">One&nbsp;Queen&nbsp;bed</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Spacious living&nbsp;room</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Private Balcony</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">No. room: 04&nbsp;rooms</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><em style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"></span></span></span></span></em><span style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-indent:0px; -webkit-text-stroke-width:0px; margin-top:7px; text-align:justify"><span style="font-weight:normal"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px"><span style="line-height:10.8pt"><span style="color:#414042"></span></span></p>\r\n\r\n<h1 style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-top:7px"><span style="font-family:Verdana,Geneva,sans-serif;"><span style="font-size:14px;"><span style="font-weight:normal"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"><span lang="VI"></span></span></span></span></span></span></span></span></span></span></span></span></span></h1>', NULL, 'Sky Corner Suites', 'Sky Corner Suites', 'Sky Corner Suites'),
	(8, 4, 'ja', 'スカイコーナースイート', '<p style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:11pt"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="orphans:auto"><span style="text-transform:none"><span style="white-space:normal"><span style="widows:auto"><span style="word-spacing:0px"><span style="-webkit-text-size-adjust:auto"><span style="text-decoration:none"><span lang="VI" style="font-size:9pt">1</span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:">ベッドルームアパートでは、温かな木製の内装と柔らかなライトの中で、スタイリッシュにリラックスして過ごすことができます。キッチンやバス、エンターテインメント、ライフスタイルのためのアメニティも揃っているので、快適な暮らしが叶います。最新式のジムとルーフトッププールを利用したら、さらにアットホームな雰囲気が感じられるでしょう。国際空港と都市の中心部の間の便利なロケーションなので、安全かつ静かな場所で就寝でき、仕事や旅行も快適です。</span></span><span lang="VI" style="font-size:9pt"><span gothic="" ms="" style="font-family:"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', NULL, 'スカイコーナースイート', 'スカイコーナースイート', 'スカイコーナースイート'),
	(9, 5, 'en', 'Signature Suites', '<p style="text-indent: 0px; -webkit-text-stroke-width: 0px; margin-top: 7px; text-align: justify;"><span style="-webkit-text-stroke-width:0px;margin-top:7px;text-align:justify;text-indent:0px;"><span style="font-weight:normal;"><span style="caret-color:#000000;"><span style="color:#000000;"><span style="font-style:normal;"><span style="font-variant-caps:normal;"><span style="letter-spacing:normal;"><span style="text-transform:none;"><span style="white-space:normal;"><span style="word-spacing:0px;"><span style="text-decoration:none;"><span lang="VI"></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span new="" roman="" style="font-family:" times=""><span lang="VI" style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:black">The warm wood and soft light of the one-bedroom apartments invite guests to relax and refresh in style. With all the kitchen, bath, entertainment and lifestyle amenities provided, you will certainly be at your most comfort state. Access to a&nbsp;state-of-the-art fitness room and rooftop pool furthers the homey atmosphere. The convenient location between the international airport and the city center makes it easy to work, explore and play while having a safe and quiet place to sleep.</span></span></span></span></span></span></span></p>\r\n\r\n<p style="margin-top:7px; text-align:justify; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times="">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box; -webkit-text-stroke-width:0px"><span style="box-sizing:border-box; -webkit-text-stroke-width:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="caret-color:#000000"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span lang="VI" style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:black"><span style="box-sizing:border-box"><span style="box-sizing:border-box; -webkit-text-stroke-width:0px"><span style="box-sizing:border-box"><span style="caret-color:#000000"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Size : 58 m2</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span lang="VI" style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:black"><span style="box-sizing:border-box"><span style="box-sizing:border-box; -webkit-text-stroke-width:0px"><span style="box-sizing:border-box"><span style="caret-color:#000000"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box">One&nbsp;Queen&nbsp;bed</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span lang="VI" style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:black"><span style="box-sizing:border-box"><span style="box-sizing:border-box; -webkit-text-stroke-width:0px"><span style="box-sizing:border-box"><span style="caret-color:#000000"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Spacious living&nbsp;room</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span lang="VI" style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:black">Private Balcony</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li style="text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span lang="VI" style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:black"><span style="box-sizing:border-box"><span style="box-sizing:border-box; -webkit-text-stroke-width:0px"><span style="box-sizing:border-box"><span style="caret-color:#000000"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box">No. room: 04&nbsp;rooms</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><em><span style="-webkit-text-stroke-width:0px;margin-top:7px;text-align:justify;text-indent:0px;"><span style="font-weight:normal;"><span style="caret-color:#000000;"><span style="color:#000000;"><span style="font-style:normal;"><span style="font-variant-caps:normal;"><span style="letter-spacing:normal;"><span style="text-transform:none;"><span style="white-space:normal;"><span style="word-spacing:0px;"><span style="text-decoration:none;"><span lang="VI"></span></span></span></span></span></span></span></span></span></span></span></span></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px">&nbsp;</p>', NULL, NULL, NULL, 'Signature Suites'),
	(10, 5, 'ja', 'シグネチャースイート', '<p style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:11pt"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="orphans:auto"><span style="text-transform:none"><span style="white-space:normal"><span style="widows:auto"><span style="word-spacing:0px"><span style="-webkit-text-size-adjust:auto"><span style="text-decoration:none"><span lang="VI" style="font-size:9pt">1</span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:">ベッドルームアパートでは、温かな木製の内装と柔らかなライトの中で、スタイリッシュにリラックスして過ごすことができます。キッチンやバス、エンターテインメント、ライフスタイルのためのアメニティも揃っているので、快適な暮らしが叶います。最新式のジムとルーフトッププールを利用したら、さらにアットホームな雰囲気が感じられるでしょう。国際空港と都市の中心部の間の便利なロケーションなので、安全かつ静かな場所で就寝でき、仕事や旅行も快適です。</span></span><span lang="VI" style="font-size:9pt"><span gothic="" ms="" style="font-family:"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', NULL, 'シグネチャースイート', NULL, 'シグネチャースイート'),
	(11, 6, 'en', 'Family Suites', '<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px"><span style="font-size:14px;"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"><span style="line-height:11.760000228881836px"><span lang="EN-US" style="color:#414042"></span></span></span></span></span></span></span></span></span></span></span></span></span></span><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span new="" roman="" style="font-family:" times=""><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:.25pt">The&nbsp;spacious&nbsp;two-bedroom&nbsp;apartments&nbsp;create&nbsp;a&nbsp;soothing atmosphere with rich wood, plush furniture and large Queen beds. The&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">private window</span></span>&nbsp;open onto&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">expansive&nbsp;</span></span><span style="box-sizing:border-box"><span style="box-sizing:border-box">views</span></span>&nbsp;of&nbsp;the&nbsp;modern&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">skyline,</span></span>&nbsp;but&nbsp;closing&nbsp;the&nbsp;doors&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">ushers&nbsp;</span></span>in serene silence. The living room and adjacent, fully stocked&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">kitchenette&nbsp;</span></span>let one&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">stretch&nbsp;</span></span>out when hosting or relaxing&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">alone.</span></span>&nbsp;Minimalist&nbsp;bedrooms&nbsp;withcarefully&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">curated&nbsp;</span></span>d&eacute;cor offer&nbsp;a&nbsp;peaceful&nbsp;environment&nbsp;to&nbsp;sleep&nbsp;at&nbsp;night.&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">Easy access to the&nbsp;city and &nbsp;</span></span>the&nbsp;building&rsquo;s&nbsp;fitness&nbsp;room,rooftop pool and sauna mean one can&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">enjoy&nbsp;</span></span>the best of&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">the&nbsp;</span></span>dynamic&nbsp;city&nbsp;while&nbsp;still&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">having</span></span>&nbsp;a&nbsp;<span style="box-sizing:border-box"><span style="box-sizing:border-box">familiar</span></span>&nbsp;place&nbsp;to&nbsp;call&nbsp;home.</span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p class="MsoBodyText" style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times="">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="caret-color:#000000"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Size: 58&nbsp;m&nbsp;</span><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">2</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Two&nbsp;</span></span></span><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Queen&nbsp;beds</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Spacious living&nbsp;room</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">Private Window</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-size:10.5pt"><span style="background:white"><span style="font-family:Montserrat"><span style="color:#414042"><span style="letter-spacing:.25pt"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="box-sizing:border-box"><span style="font-variant-caps:normal"><span style="box-sizing:border-box"><span style="orphans:2"><span style="box-sizing:border-box"><span style="widows:2"><span style="box-sizing:border-box"><span style="text-decoration-thickness:initial"><span style="box-sizing:border-box"><span style="text-decoration-style:initial"><span style="box-sizing:border-box"><span style="text-decoration-color:initial"><span style="box-sizing:border-box"><span style="word-spacing:0px"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box">No. room: 04&nbsp;rooms</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p class="MsoBodyText" style="margin-right:3px; margin-left:10px; text-align:start; -webkit-text-stroke-width:0px"><span style="font-size:12pt"><span style="background:white"><span style="line-height:20.4pt"><span style="box-sizing:border-box"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="orphans:2"><span style="widows:2"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="word-spacing:0px"><span new="" roman="" style="font-family:" times=""><span style="box-sizing:border-box"><span style="box-sizing:border-box"><span style="box-sizing:border-box"></span></span></span><span style="font-size:10.5pt"><span style="font-family:Montserrat"><span style="color:#232323"><span style="letter-spacing:.25pt"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px"><span style="line-height:10.8pt"><span style="color:#414042"></span></span></p>\r\n\r\n<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px">&nbsp;</p>\r\n\r\n<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px">&nbsp;</p>', NULL, 'Family Suites', NULL, NULL),
	(12, 6, 'ja', 'ファミリースイート', '<p style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:11pt"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="orphans:auto"><span style="text-transform:none"><span style="white-space:normal"><span style="widows:auto"><span style="word-spacing:0px"><span style="-webkit-text-size-adjust:auto"><span style="text-decoration:none"><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:">広々とした</span></span><span lang="VI" style="font-size:9pt">2</span><span lang="EN-US" style="font-size:9pt"><span gothic="" ms="" style="font-family:">ベッドルーム付きアパートは豊かな木製の内装と豪華な家具、大きなクイーンベッドで落ち着いた雰囲気を作り出しています。個人のベランダからはモダンな都市の広大な眺めが満喫でき、ドアを閉めれば穏やかな静寂も感じることができます。リビングルームと収納力のあるキッチンは、誰かをもてなす時も一人の時も快適に使うことができ、厳選された装飾が施されたミニマルなベッドルームは、睡眠のため静かな環境を提供してくれます。都市部へのアクセスやビル内にあるジムやルーフトッププール、サウナなどを利用が楽なので、ホームと呼ぶ親しみのある場所に泊まりながら、ダイナミックな都市生活を堪能できます。</span></span><span lang="VI" style="font-size:9pt"><span gothic="" ms="" style="font-family:"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', NULL, 'ファミリースイート', NULL, 'ファミリースイート'),
	(13, 7, 'en', 'Family Premium Suites', '<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"><span style="line-height:11.760000228881836px"><span lang="EN-US" style="color:#414042"></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p class="MsoBodyText" style="margin-right:3px; margin-left:10px">The spacious two-bedroom apartments create a soothing atmosphere with rich wood, plush furniture and large Queen beds. The private balconies open onto expansive views of the modern skyline, but closing the doors ushers in serene silence. The living room and adjacent, fully stocked kitchenette let one stretch out when hosting or relaxing alone. Minimalist bedrooms withcarefully curated d&eacute;cor offer a peaceful environment to sleep at night. Easy access to the city and the building&rsquo;s fitness room,rooftop pool and sauna mean one can enjoy the best of the dynamic city while still having a familiar place to call home.<span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:Calibri,sans-serif"></span></span></span><span style="line-height:10.8pt"><span lang="EN-US"><span style="color:#414042"></span></span></span></p>\r\n\r\n<p class="MsoBodyText" style="margin-right:3px; margin-left:10px">&nbsp;</p>\r\n\r\n<ul>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px">Size: 76m2</li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px">Two&nbsp;Queen&nbsp;beds</li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px">Spacious living&nbsp;room</li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px">Private Balcony</li>\r\n	<li class="MsoBodyText" style="margin-right:3px; margin-left:10px">No. room: 04&nbsp;rooms</li>\r\n</ul>\r\n\r\n<p class="MsoBodyText" style="margin-right:3px; margin-left:10px">&nbsp;</p>\r\n\r\n<p class="MsoBodyText" style="margin-right:3px; margin-left:10px">&nbsp;</p>\r\n\r\n<p class="MsoBodyText" style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px; margin-right:3px; margin-left:10px"><span style="font-size:9pt"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="orphans:auto"><span style="text-transform:none"><span style="white-space:normal"><span style="widows:auto"><span style="word-spacing:0px"><span style="-webkit-text-size-adjust:auto"><span style="text-decoration:none"><span style="line-height:11.760000228881836px"><span lang="EN-US" style="color:#414042"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', NULL, 'Family Premium Suites', NULL, 'Family Premium Suites'),
	(14, 7, 'ja', 'ファミリープレミアムスイート', '<p style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:14px;"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none"><span lang="EN-US"><span gothic="" ms="" style="font-family:">広々とした</span></span><span lang="VI">2</span><span lang="EN-US"><span gothic="" ms="" style="font-family:">ベッドルーム付きアパートは豊かな木製の内装と豪華な家具、大きなクイーンベッドで落ち着いた雰囲気を作り出しています。個人のベランダからはモダンな都市の広大な眺めが満喫でき、ドアを閉めれば穏やかな静寂も感じることができます。リビングルームと収納力のあるキッチンは、誰かをもてなす時も一人の時も快適に使うことができ、厳選された装飾が施されたミニマルなベッドルームは、睡眠のため静かな環境を提供してくれます。都市部へのアクセスやビル内にあるジムやルーフトッププール、サウナなどを利用が楽なので、ホームと呼ぶ親しみのある場所に泊まりながら、ダイナミックな都市生活を堪能できます。</span></span><span lang="VI"><span gothic="" ms="" style="font-family:"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<p style="text-align:start; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:14px;"><span style="font-family:Verdana, sans-serif"><span style="caret-color:#000000"><span style="color:#000000"><span style="font-style:normal"><span style="font-variant-caps:normal"><span style="font-weight:normal"><span style="letter-spacing:normal"><span style="text-transform:none"><span style="white-space:normal"><span style="word-spacing:0px"><span style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:14px;"><span style="line-height:12.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US"></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">面積</span></span></span></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.1pt">：</span></span></span></span><span lang="EN-US"><span hei="" micro="" style="font-family:" wenquanyi=""><span style="color:#414042"><span style="letter-spacing:-0.25pt">&nbsp;</span></span></span></span><span lang="EN-US"><span hei="" micro="" style="font-family:" wenquanyi=""><span style="color:#414042">76m&nbsp;</span></span></span><sup><span lang="EN-US"><span courier="" new="" style="font-family:"><span style="color:#414042">2</span></span></span></sup><span lang="EN-US"><span style="color:#414042"></span></span></span></span></span></li>\r\n	<li><span style="font-size:14px;"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US"></span><span lang="EN-US"><span hei="" micro="" style="font-family:" wenquanyi=""><span style="color:#414042"><span style="letter-spacing:0.15pt">2</span></span></span></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">つのクイーンベッド</span></span></span></span><span lang="EN-US"><span style="color:#414042"></span></span></span></span></span></li>\r\n	<li><span style="font-size:14px;"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US"></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">スマートソニーテレビ</span></span></span></span><span lang="EN-US"><span style="color:#414042"></span></span></span></span></span></li>\r\n	<li><span style="font-size:14px;"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US"></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">広々としたリビングルーム</span></span></span></span><span lang="EN-US"><span style="color:#414042"></span></span></span></span></span></li>\r\n	<li><span style="font-size:14px;"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US"></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">室数：</span></span></span></span><span lang="EN-US"><span hei="" micro="" style="font-family:" wenquanyi=""><span style="color:#414042"><span style="letter-spacing:0.15pt">4</span></span></span></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">室</span></span></span></span><span lang="EN-US"><span style="color:#414042"></span></span></span></span></span></li>\r\n	<li><span style="font-size:14px;"><span style="line-height:10.8pt"><span style="font-family:Verdana,sans-serif"><span lang="EN-US"></span><span lang="EN-US"><span gothic="" ms="" style="font-family:"><span style="color:#414042"><span style="letter-spacing:0.15pt">モンスーンシャワー</span></span></span></span><span lang="EN-US"><span style="color:#414042"></span></span></span></span></span></li>\r\n</ul>', NULL, 'ファミリープレミアムスイート', NULL, 'ファミリープレミアムスイート');

-- Dumping structure for table hailan_datphong.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_value` varchar(50) NOT NULL DEFAULT '0',
  `value` longtext,
  `status` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.settings: ~6 rows (approximately)
DELETE FROM `settings`;
INSERT INTO `settings` (`id`, `key_value`, `value`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(4, 'setting-email', '{"_token":"8YvQr27qQpNAxHj82bhBuafuiAeBdwl6ylCs8IXP","email":"nvlinh174test01@gmail.com","password":"phzgrzgqxdgtwqoq","key_value":"setting-email"}', NULL, '2019-06-18 06:06:22', 'admin', '2021-08-26 19:07:52', 'admin'),
	(5, 'setting-main', '{"_token":"nQFj3AhyLaARIEq5ir1bvTmEiqW1LFzwz7RO2JPM","logo1":"\\/upload\\/1\\/upload\\/logo1.png","hotline1":"+84 283 811 0910","hotline2":"091 258 9988","fax":"sales.apartment@dhts.com","copyright":"\\u00a9 2021 DHTS Business Apartment All rights reserved.","time":null,"address":"38\\/16 Nguyen Van Troi, Ward 15 , Phu Nhuan District , Ho Chi Minh City, Vietnam","logan":null,"introduce":null,"key_value":"setting-main"}', NULL, '2019-06-28 10:06:46', 'admin', '2022-10-04 17:24:38', 'admin'),
	(6, 'setting-social', '{"_token":"Ga6nIy5FR2uFu4VwS74z9QrV0sVOUptRTYTE6VJ7","facebook":"https:\\/\\/www.facebook.com\\/DHTS.com.vn","youtube":null,"skype":null,"tripadvisor":"https:\\/\\/www.tripadvisor.com.vn\\/Hotel_Review-g293925-d22851088-Reviews-Dhts_Serviced_Apartment-Ho_Chi_Minh_City.html?m=19905","instagram":"https:\\/\\/www.facebook.com\\/DHTS.com.vn","twitter":null,"linkedin":"https:\\/\\/www.linkedin.com\\/in\\/dhts-business-apartment-336a79201\\/","key_value":"setting-social"}', NULL, '2019-06-28 10:06:09', 'admin', '2021-12-03 11:24:20', 'admin'),
	(7, 'setting-script', '{"script_head":null,"google_map":null,"google_analyst":null}', NULL, '2020-03-25 10:46:48', 'admin', '2020-03-25 11:03:03', 'admin'),
	(8, 'setting-chat', '{"hotline":"{\\"status\\":\\"active\\"}","facebook":"{\\"page_id\\":null,\\"position\\":\\"right\\",\\"status\\":\\"inactive\\"}","zalo":"{\\"page_id\\":null,\\"position\\":\\"left\\",\\"status\\":\\"inactive\\"}","service":"{\\"page_id\\":null,\\"position\\":\\"right\\",\\"status\\":\\"inactive\\"}"}', NULL, '2020-03-25 10:46:50', 'admin', '2020-03-25 11:03:10', 'admin'),
	(9, 'setting-seo', '{"_token":"pclRGzFI8NefKqEQ2SwcMNWIa5BJuDK8XKpILcas","meta_title":"DHTS Business Apartment","meta_description":"DHTS Business Apartment","meta_keyword":"DHTS Business Apartment","key_value":"setting-seo"}', NULL, '2019-10-18 14:10:01', 'admin', '2021-11-11 01:28:08', 'admin');

-- Dumping structure for table hailan_datphong.slider
DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(200) DEFAULT NULL,
  `thumb` text,
  `status` text,
  `sort` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.slider: ~9 rows (approximately)
DELETE FROM `slider`;
INSERT INTO `slider` (`id`, `link`, `thumb`, `status`, `sort`, `created`, `created_by`, `modified`, `modified_by`) VALUES
	(14, NULL, 'gLdVN2GUqv.jpeg', 'inactive', 10, '2021-08-19 00:00:00', 'admin', '2021-08-27 00:00:00', 'admin'),
	(15, NULL, 'iNgYpsGmLM.jpeg', 'active', 1, '2021-08-19 00:00:00', 'admin', '2021-12-03 00:00:00', 'admin'),
	(16, NULL, 'T7tcRoDvj6.jpeg', 'active', 4, '2021-08-19 00:00:00', 'admin', '2021-12-03 00:00:00', 'admin'),
	(17, NULL, 'tXIstnsc5Y.jpeg', 'active', 3, '2021-08-27 00:00:00', 'admin', '2021-12-03 00:00:00', 'admin'),
	(18, NULL, 'MLMUDbCCur.jpeg', 'inactive', 9, '2021-08-27 00:00:00', 'admin', '2021-12-03 00:00:00', 'admin'),
	(19, NULL, 'nU0pPaly1A.jpeg', 'inactive', 8, '2021-08-27 00:00:00', 'admin', '2021-08-27 00:00:00', 'admin'),
	(20, NULL, 'r2zw1J1vC2.jpeg', 'active', 6, '2021-08-27 00:00:00', 'admin', '2021-09-24 00:00:00', 'admin'),
	(21, NULL, 'YpqhCEJn0R.jpeg', 'active', 5, '2021-08-27 00:00:00', 'admin', '2021-12-03 00:00:00', 'admin'),
	(22, NULL, 'as4XS1gLSU.jpeg', 'active', 2, '2021-12-03 00:00:00', 'admin', '2021-12-03 00:00:00', 'admin');

-- Dumping structure for table hailan_datphong.slider_translations
DROP TABLE IF EXISTS `slider_translations`;
CREATE TABLE IF NOT EXISTS `slider_translations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slider_model_id` int(11) unsigned DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `slider_model_id` (`slider_model_id`) USING BTREE,
  CONSTRAINT `slider_translations_ibfk_1` FOREIGN KEY (`slider_model_id`) REFERENCES `slider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.slider_translations: ~18 rows (approximately)
DELETE FROM `slider_translations`;
INSERT INTO `slider_translations` (`id`, `slider_model_id`, `locale`, `name`, `description`) VALUES
	(27, 14, 'en', 'Welcome to', 'DHTS APARTMENT'),
	(28, 14, 'ja', 'スライダー01JA-名前', 'スライダー01JA-説明'),
	(29, 15, 'en', 'DHTS APARTMENT', 'あなたの第二の家'),
	(30, 15, 'ja', 'スライダー02JA-名前', 'スライダー02JA-説明'),
	(31, 16, 'en', 'BLISSFUL HOME', 'DHTS APARTMENT'),
	(32, 16, 'ja', 'DHTS BUSINESS APARTMENT', 'あなたの第二の家'),
	(33, 17, 'en', 'WELCOME TO', 'DHTS APARTMENT'),
	(34, 17, 'ja', 'DHTS  APARTMENT', 'あなたの第二の家'),
	(35, 18, 'en', 'Welcome to', 'DHTS APARTMENT'),
	(36, 18, 'ja', 'DHTS APARTMENT', 'あなたの第二の家'),
	(37, 19, 'en', 'BLISSFUL HOME', 'DHTS APARTMENT'),
	(38, 19, 'ja', 'YOUR BLISSFUL HOME', 'DHTS APARTMENT'),
	(39, 20, 'en', 'BLISSFUL HOME', 'DHTS APARTMENT'),
	(40, 20, 'ja', 'YOUR BLISSFUL HOME', 'DHTS APARTMENT'),
	(41, 21, 'en', 'BLISSFUL HOME', 'DHTS APARTMENT'),
	(42, 21, 'ja', 'DHTS BUSINESS APARTMENT', 'あなたの第二の家'),
	(43, 22, 'en', '.', 'DHTS BUSINESS APARTMENT'),
	(44, 22, 'ja', '.', 'DHTS BUSINESS APARTMENT');

-- Dumping structure for table hailan_datphong.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table hailan_datphong.user: ~2 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `avatar`, `level`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
	(1, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'fXDBn28iVA.jpeg', 'admin', '2014-12-10 08:55:35', 'admin', '2020-02-10 00:00:00', 'dev', 'active'),
	(2, 'dev', 'dev@gmail.com', 'dev', 'e10adc3949ba59abbe56e057f20f883e', 'JFgBVlZxRX.jpeg', 'admin', '2019-10-07 00:00:00', 'admin', '2019-10-07 00:00:00', 'admin', 'active');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
