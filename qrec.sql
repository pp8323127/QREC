-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 163.18.42.141    Database: qrec
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `admin_acc` varchar(20) DEFAULT NULL COMMENT '管理者帳號',
  `admin_name` varchar(20) DEFAULT NULL COMMENT '管理者姓名',
  `admin_phone` varchar(15) DEFAULT NULL COMMENT '管理者聯絡方式',
  `admin_email` varchar(50) DEFAULT NULL COMMENT '管理者電子郵件',
  `admin_devicetoken` varchar(200) DEFAULT NULL COMMENT '管理者裝置代號',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'0322806','DennyChen','(0912) 345-678','u0322806@nkfust.edu.tw','epRdrMGj2_g:APA91bHvRR69aP7qjAoaRS1Az3jpphdcebKpME2pjbtMfdSF4oLyFdu8XCn74IVI5EEIZPZT7m_GRR74IRsgHZMzH0fwJSL21TCx1E0dtw4DZRgTHqREEfQ0Ug4U8spxqOEgsV8ptzj3'),(3,'0132037','Kin HSU',NULL,'u0132037@nkfust.edu.tw',NULL),(4,'0324813','楊東霖','0900111111','u0324813@nkfust.edu.tw','dheEqErQXHg:APA91bEm2PsKiCrXqY51K0bGVbeq4BIccQfqYAibnj42I8ARoGDNtLj1x_7RePuL1l98C9ikS6EU9e8_r-W4y-2owD6WIjS6X1CXrxCqXPXFrF2Q_bvWcY9OpNBWbItxvjnsnqXm9JSv'),(5,'9924058','nkfust',NULL,'u9924058@nkfust.edu.tw',NULL),(6,'9924083','Denny',NULL,'u9924083@nkfust.edu.tw',NULL),(7,'9924093','Bone',NULL,'u9924093@nkfust.edu.tw',NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) NOT NULL COMMENT '消費者ID',
  `oid` varchar(50) NOT NULL COMMENT '訂單編號',
  `order_item` text NOT NULL,
  `order_price` int(10) NOT NULL,
  `receive_name` varchar(50) NOT NULL,
  `receive_phone` varchar(50) NOT NULL,
  `receive_email` varchar(50) DEFAULT NULL,
  `tplace` varchar(100) NOT NULL COMMENT '交易地點',
  `ttime` varchar(50) NOT NULL COMMENT '交易時間',
  `tupdate` datetime NOT NULL COMMENT '訂單成立時間',
  `situation` int(10) NOT NULL COMMENT '訂單狀態(1可修改，0不可修改)',
  `remark` varchar(500) DEFAULT NULL COMMENT '訂單備註',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (16,3,'20151005172228tDMp100','[{\"spec\":\"L\",\"oid\":\"20151005172228tDMp100\",\"pid\":\"A03\",\"num\":1},{\"spec\":\"L\",\"oid\":\"20151005172228tDMp100\",\"pid\":\"A06\",\"num\":1},{\"spec\":\"S\",\"oid\":\"20151005172228tDMp100\",\"pid\":\"A06\",\"num\":1}]',1148,'吳啟維','0955182780','u0324813@nkfust.edu.tw','學生活動中心（Ｒ棟）','2015年10月8日 17點20分','2014-05-11 17:22:29',1,NULL),(18,2,'20151008225517BRHB100','[{\"price\":350,\"num\":4,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"M\",\"pic\":\"A01.jpg\"},{\"price\":450,\"num\":5,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B14-b-350.jpg\",\"pid\":\"B07\",\"spec\":\"none\",\"pic\":\"B07.jpg\"}]',3650,'Tony','0988123654','u0324813@nkfust.edu.tw','行政大樓（Ａ棟）','2015年10月8日 22點55分','2015-10-08 22:55:20',1,NULL),(19,2,'20151021132814a3aH100','[{\"price\":350,\"num\":1,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"S\",\"pic\":\"A01.jpg\"},{\"price\":350,\"num\":5,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-DT31-400.jpg\",\"pid\":\"A07\",\"spec\":\"S\",\"pic\":\"A07.jpg\"}]',2100,'楊東霖','0911222333','u0324813@nkfust.edu.tw','教學研究室大樓（Ｒ棟）','2015年10月21日 13點27分','2015-10-21 13:28:15',1,NULL),(20,1,'201510211340558Nuv944','[{\"spec\":\"none\",\"pid\":\"B02\",\"num\":1,\"price\":399,\"pic\":\"B02.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B11-k-350.jpg\"}]',399,'Denny','0987861106','u0322806@nkfust.edu.tw','管理學院（Ｃ棟）','2015年10月25日 13點44分','2015-10-21 13:40:56',1,NULL),(21,2,'20151021134347rnTQ100','[{\"price\":399,\"num\":5,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-B11-black-400.jpg\",\"pid\":\"B04\",\"spec\":\"none\",\"pic\":\"B04.jpg\"}]',1995,'楊東霖','0912345678','u0324813@nkfust.edu.tw','游泳館','2015年10月21日 13點43分','2015-10-21 13:43:48',1,NULL),(22,1,'20151021135953oszb100','[{\"price\":350,\"num\":2,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"M\",\"pic\":\"A01.jpg\"},{\"price\":299,\"num\":1,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-CC03-3-L-350.jpg\",\"pid\":\"E04\",\"spec\":\"none\",\"pic\":\"E04.jpg\"}]',999,'iwo','66788','u0324813@nkfust.edu.tw','財務金融學院（Ｅ棟）','2015年10月23日 16點30分','2015-10-21 14:00:00',1,NULL),(23,1,'201510211423147IIq100','[{\"price\":350,\"num\":2,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"M\",\"pic\":\"A01.jpg\"},{\"price\":150,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-hp-F400.jpg\",\"pid\":\"C02\",\"spec\":\"none\",\"pic\":\"C02.jpg\"}]',1150,'uyu','3649','u0324813@nkfust.edu.tw','行政大樓（Ａ棟）','2015年10月23日 15點30分','2015-10-21 14:23:21',1,NULL),(24,1,'20151021143234vUHH100','[{\"price\":350,\"num\":2,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT01-B150.jpg\",\"pid\":\"A02\",\"spec\":\"L\",\"pic\":\"A02.jpg\"},{\"price\":399,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B11-k-350.jpg\",\"pid\":\"B02\",\"spec\":\"none\",\"pic\":\"B02.jpg\"}]',1897,'oeep','09124357689','u0324813@nkfust.edu.tw','圖書資訊大樓（Ｊ棟）','2015年10月23日 15點30分','2015-10-21 14:32:35',1,NULL),(25,1,'20151021164320z8Us100','[{\"price\":150,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B16-1-400.jpg\",\"pid\":\"B06\",\"spec\":\"none\",\"pic\":\"B06.jpg\"}]',450,'oeep','09124357689','u0324813@nkfust.edu.tw','教學研究室大樓（Ｒ棟）','2015年10月21日 16點42分','2015-10-21 16:43:21',1,NULL),(26,2,'20151021171302unYq795','[{\"price\":350,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT02-B150.jpg\",\"pid\":\"A03\",\"spec\":\"M\",\"pic\":\"A03.jpg\"}]',1050,'楊東霖','0912345678','u0324813@nkfust.edu.tw','工學院（Ｆ棟）','2015年10月21日 17點12分','2015-10-21 17:13:02',1,NULL),(27,2,'20151021174102LSmM737','[{\"price\":350,\"num\":1,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"S\",\"pic\":\"A01.jpg\"}]',350,'楊東霖','0912345678','u0324813@nkfust.edu.tw','教學研究室大樓（Ｒ棟）','2015年10月21日 17點40分','2015-10-21 17:41:02',1,NULL),(28,2,'20151021192520L7R6914','[{\"price\":350,\"num\":1,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"S\",\"pic\":\"A01.jpg\"},{\"price\":350,\"num\":5,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-DT31-400.jpg\",\"pid\":\"A07\",\"spec\":\"XL\",\"pic\":\"A07.jpg\"},{\"price\":350,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-DT31-400.jpg\",\"pid\":\"A07\",\"spec\":\"S\",\"pic\":\"A07.jpg\"}]',3150,'楊東霖','0912345678','u0324813@nkfust.edu.tw','電機資訊學院（Ｂ棟）','2015年10月21日 19點25分','2015-10-21 19:25:20',1,NULL),(29,1,'20151021194320Mtst173','[{\"spec\":\"S\",\"pid\":\"A07\",\"num\":3,\"price\":350,\"pic\":\"A07.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-DT31-400.jpg\"},{\"spec\":\"none\",\"pid\":\"B07\",\"num\":2,\"price\":450,\"pic\":\"B07.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B14-b-350.jpg\"},{\"spec\":\"none\",\"pid\":\"E11\",\"num\":1,\"price\":199,\"pic\":\"E11.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-CC01-3-L-350.jpg\"}]',2149,'Denny','0987654321','u0322806@nkfust.edu.tw','管理學院（Ｃ棟）','2015年10月23日 19點42分','2015-10-21 19:43:20',1,NULL),(30,1,'20151021195518UtBn106','[{\"spec\":\"L\",\"pid\":\"A01\",\"num\":1,\"price\":350,\"pic\":\"A01.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\"},{\"spec\":\"none\",\"pid\":\"B03\",\"num\":2,\"price\":399,\"pic\":\"B03.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B11-b01-350.jpg\"},{\"spec\":\"none\",\"pid\":\"C01\",\"num\":3,\"price\":150,\"pic\":\"C01.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-CN-F400.jpg\"},{\"spec\":\"none\",\"pid\":\"D02\",\"num\":4,\"price\":175,\"pic\":\"D02.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-SS07-B400.jpg\"},{\"spec\":\"none\",\"pid\":\"E01\",\"num\":5,\"price\":330,\"pic\":\"E01.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-TH11-O-400.jpg\"},{\"spec\":\"none\",\"pid\":\"D01\",\"num\":6,\"price\":25,\"pic\":\"D01.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/A4-f-400.jpg\"}]',4098,'陳瑋俊','0987861106','u0322806@nkfust.edu.tw','教學研究室大樓（Ｒ棟）','2015年10月23日 18點30分','2015-10-21 19:55:19',1,NULL),(31,1,'20151021195756ST1K288','[{\"spec\":\"S\",\"pid\":\"A06\",\"num\":1,\"price\":399,\"pic\":\"A06.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-DPT02-400.jpg\"},{\"spec\":\"none\",\"pid\":\"B07\",\"num\":2,\"price\":450,\"pic\":\"B07.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B14-b-350.jpg\"},{\"spec\":\"none\",\"pid\":\"E09\",\"num\":3,\"price\":199,\"pic\":\"E09.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-CC01-4-L-350.jpg\"},{\"spec\":\"none\",\"pid\":\"E01\",\"num\":4,\"price\":330,\"pic\":\"E01.jpg\",\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-TH11-O-400.jpg\"}]',3216,'陳瑋俊','0987861106','u0322806@nkfust.edu.tw','工學院（Ｆ棟）','2015年10月25日 20點0分','2015-10-21 19:57:58',1,NULL),(32,2,'20151022114556hQ5q877','[{\"price\":399,\"num\":2,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-DP02-350.jpg\",\"pid\":\"A05\",\"spec\":\"M\",\"pic\":\"A05.jpg\"},{\"price\":350,\"num\":4,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"M\",\"pic\":\"A01.jpg\"}]',2198,'Tony','0912345678','u0324813@nkfust.edu.tw','教學研究室大樓（Ｒ棟）','2015年10月22日 11點45分','2015-10-22 11:45:56',1,NULL),(33,1,'2015102213430086eL875','[{\"price\":350,\"num\":2,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"L\",\"pic\":\"A01.jpg\"},{\"price\":399,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-B11-400.jpg\",\"pid\":\"B01\",\"spec\":\"none\",\"pic\":\"B01.jpg\"},{\"price\":25,\"num\":4,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/A4-f-400.jpg\",\"pid\":\"D01\",\"spec\":\"none\",\"pic\":\"D01.jpg\"}]',1997,'陳瑋俊','0987861106','u0324813@nkfust.edu.tw','外語學院（Ｄ棟）','2015年10月26日 20點0分','2015-10-22 13:43:00',1,NULL),(34,2,'20151022140348KoRQ414','[{\"price\":350,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"M\",\"pic\":\"A01.jpg\"},{\"price\":999,\"num\":2,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-coat-500.jpg\",\"pid\":\"A08\",\"spec\":\"S\",\"pic\":\"A08.jpg\"}]',3048,'Tony','0912345678','u0324813@nkfust.edu.tw','教學研究室大樓（Ｒ棟）','2015年10月22日 14點3分','2015-10-22 14:03:48',1,NULL),(35,1,'20151022162205gdc2851','[{\"price\":350,\"num\":1,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"L\",\"pic\":\"A01.jpg\"},{\"price\":450,\"num\":2,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-B14-b-350.jpg\",\"pid\":\"B07\",\"spec\":\"none\",\"pic\":\"B07.jpg\"},{\"price\":350,\"num\":3,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/nkfust-MC02-R-350.jpg\",\"pid\":\"D07\",\"spec\":\"none\",\"pic\":\"D07.jpg\"}]',2300,'陳瑋俊','0987861106','u0324813@nkfust.edu.tw','創業園區、招待所（Ｌ棟）','2015年10月26日 22點0分','2015-10-22 16:22:05',1,NULL),(36,2,'20151026004536ojqa940','[{\"price\":350,\"num\":1,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"S\",\"pic\":\"A01.jpg\"},{\"price\":350,\"num\":6,\"pic_link\":\"http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg\",\"pid\":\"A01\",\"spec\":\"L\",\"pic\":\"A01.jpg\"}]',2450,'Tony','0912345678','u0324813@nkfust.edu.tw','教學研究室大樓（Ｒ棟）','2015年10月26日 0點45分','2015-10-26 00:45:35',1,NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_status` (
  `oid` varchar(10) NOT NULL DEFAULT '' COMMENT '訂單編號',
  `order_check` int(10) DEFAULT NULL COMMENT '訂單審核',
  `check_time` datetime DEFAULT NULL COMMENT '審核時間',
  `order_prepare` int(10) DEFAULT NULL COMMENT '訂單理貨',
  `preapre_time` datetime DEFAULT NULL COMMENT '理貨時間',
  `order_ship` int(10) DEFAULT NULL COMMENT '訂單出貨',
  `ship_time` datetime DEFAULT NULL COMMENT '出貨時間',
  `order_deliver` int(10) DEFAULT NULL COMMENT '訂單送達',
  `deliver_time` datetime DEFAULT NULL COMMENT '送達時間',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `pid` varchar(20) NOT NULL DEFAULT '' COMMENT '產品ID',
  `name` varchar(100) DEFAULT NULL COMMENT '產品名稱',
  `price` int(11) DEFAULT NULL COMMENT '產品金額',
  `pic` varchar(20) DEFAULT NULL COMMENT '產品圖片',
  `pic_link` text COMMENT '產品圖片連結',
  `link` text COMMENT '產品網址',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('A01','NKFUST經典款_酒紅色短袖純棉T恤(女版) ',350,'A01.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-CT03-B150.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_144&products_id=532'),('A02','NKFUST經典款_酒紅色短袖純棉T恤(中性版)',350,'A02.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-CT01-B150.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_144&products_id=528'),('A03','NKFUST經典款_深藍色短袖純棉T恤(中性版)',350,'A03.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-CT02-B150.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_144&products_id=529'),('A04','長袖厚棉連帽T恤_中性版_NKFUST版/藍色',780,'A04.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST_CT03-B150.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_144&products_id=530'),('A05','快速排汗Polo衫_NKFUST+Logo',399,'A05.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-DP02-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_143&products_id=424'),('A06','快速排汗Polo衫_第一科大',399,'A06.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-DPT02-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_143&products_id=425'),('A07','剪接配色排汗T恤-第一科大',350,'A07.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-DT31-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_143&products_id=461'),('A08','夾克_黑色_NKFUST',999,'A08.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-coat-500.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_120&products_id=472'),('B01','側背書包(藍色)-第一科大',399,'B01.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-B11-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_119&products_id=446'),('B02','側背書包(卡其色)-NKFUST',399,'B02.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-B11-k-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_119&products_id=445'),('B03','側背書包(黑色)-NKFUST',399,'B03.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-B11-b01-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_119&products_id=464'),('B04','側背書包(黑色)-第一科大',399,'B04.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-B11-black-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_119&products_id=465'),('B05','黑色尼龍布迷你小小書包(14cm)--第一科大',150,'B05.jpg','http://nkfustgift.colaz.com.tw/images/B15-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_119&products_id=503'),('B06','綠色帆布迷你小小書包(14cm)--第一科大',150,'B06.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-B16-1-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_119&products_id=512'),('B07','運動提袋(黑色)-NKFUST',450,'B07.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-B14-b-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_119&products_id=448'),('C01','2 in 1 手機座+名片座與名片盒',150,'C01.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-CN-F400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_142&products_id=521'),('C02','2 in 1 手機座_摺疊充電座+桌上型手機座',150,'C02.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-hp-F400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_142&products_id=522'),('D01','A4資料夾_第一科十大校景',25,'D01.jpg','http://nkfustgift.colaz.com.tw/images/A4-f-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=504'),('D02','藍色環保筷組(含筷子/湯匙)',175,'D02.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-SS07-B400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=514'),('D03','米色環保筷組(含筷子/湯匙)',175,'D03.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-SS06-B400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=524'),('D04','LED手電筒-Logo雷射雕刻',150,'D04.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-LD01-LED-1-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=442'),('D05','黑色磁性金屬鋼珠筆',250,'D05.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-BP01-L-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=456'),('D06','銅質雙圓鏡-第一科大校徽',299,'D06.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-MC03-R-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=411'),('D07','放大鏡文鎮-校徽',350,'D07.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-MC02-R-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=405'),('D08','金屬名片盒-中英文校名',299,'D08,jpg','http://nkfustgift.colaz.com.tw/images/nkfust-MC01-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_124&products_id=407'),('E01','優仕保溫杯320c.c_芋香紫',330,'E01.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-TH11-O-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=516'),('E02','優仕保溫杯390c.c_抹茶綠',380,'E02.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-TH10-O-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=515'),('E03','三件式濾茶杯-Logo',299,'E03.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-CC03-1-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=437'),('E04','三件式濾茶杯-生態池',299,'E04.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-CC03-3-L-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=459'),('E05','三件式濾茶杯-四格校景',299,'E05.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-CC03-1-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=438'),('E06','不銹鋼運動水瓶(750cc)_第一科大校徽',299,'E06.jpg','http://nkfustgift.colaz.com.tw/images/TH02-open-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=505'),('E07','全瓷蓋杯-Logo',299,'E07.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-CC04-1-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=439'),('E08','全瓷蓋杯-生態池',299,'E08.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-CC04-2-L-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=440'),('E09','馬克杯--生態池',199,'E09.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-CC01-4-L-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=415'),('E10','馬克杯--校園地圖',199,'E10.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-CC01-2-L-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=414'),('E11','馬克杯-四張校景拼貼',199,'E11.jpg','http://nkfustgift.colaz.com.tw/images/nkfust-CC01-3-L-350.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=435'),('E12','馬克杯-校徽logo',199,'E12.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-CC01-1-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=413'),('E13','保溫杯-第一科大雷雕',299,'E13.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-TH01-RICO-order-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=502'),('E14','彈跳保溫杯260c.c',380,'E14.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-TH12-O-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=517'),('E15','彈跳保溫杯420c.c',450,'E15.jpg','http://nkfustgift.colaz.com.tw/images/NKFUST-TH13-O-400.jpg','http://nkfustgift.colaz.com.tw/product_info.php?cPath=113_126&products_id=518');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_specification`
--

DROP TABLE IF EXISTS `product_specification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(10) DEFAULT NULL COMMENT '產品ID',
  `product_spec` varchar(10) DEFAULT NULL COMMENT '產品規格',
  `product_amount` int(11) DEFAULT NULL COMMENT '產品數量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_specification`
--

LOCK TABLES `product_specification` WRITE;
/*!40000 ALTER TABLE `product_specification` DISABLE KEYS */;
INSERT INTO `product_specification` VALUES (1,'A01','S',10),(2,'A01','M',10),(3,'A01','L',10),(4,'A01','XL',10),(5,'A02','S',10),(6,'A02','M',10),(7,'A02','L',10),(8,'A02','XL',10),(9,'A03','S',10),(10,'A03','M',10),(11,'A03','L',10),(12,'A03','XL',10),(13,'A04','S',10),(14,'A04','M',10),(15,'A04','L',10),(16,'A04','XL',10),(17,'A05','S',10),(18,'A05','M',10),(19,'A05','L',10),(20,'A05','XL',10),(21,'A06','S',10),(22,'A06','M',10),(23,'A06','L',10),(24,'A06','XL',10),(25,'A07','S',10),(26,'A07','M',10),(27,'A07','L',10),(28,'A07','XL',10),(29,'A08','S',10),(30,'A08','M',10),(31,'A08','L',10),(32,'A08','XL',10),(33,'B01','none',10),(34,'B02','none',10),(35,'B03','none',10),(36,'B04','none',10),(37,'B05','none',10),(38,'B06','none',10),(39,'B07','none',10),(40,'C01','none',10),(41,'C02','none',10),(42,'D01','none',10),(43,'D02','none',10),(44,'D03','none',10),(45,'D04','none',10),(46,'D05','none',10),(47,'D06','none',10),(48,'D07','none',10),(49,'D08','none',10),(50,'E01','none',10),(51,'E02','none',10),(52,'E03','none',10),(53,'E04','none',10),(54,'E05','none',10),(55,'E06','none',10),(56,'E07','none',10),(57,'E08','none',10),(58,'E09','none',10),(59,'E10','none',10),(60,'E11','none',10),(61,'E12','none',10),(62,'E13','none',10),(63,'E14','none',10),(64,'E15','none',10);
/*!40000 ALTER TABLE `product_specification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_acc` varchar(15) DEFAULT NULL COMMENT '帳號(學號)',
  `user_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `user_phone` varchar(15) DEFAULT NULL COMMENT '連絡電話',
  `user_email` varchar(50) DEFAULT NULL COMMENT '電子郵件',
  `user_devicetoken` varchar(200) NOT NULL COMMENT '裝置代號',
  `user_status` int(1) DEFAULT NULL COMMENT '是否能夠登入(1=可登入,0=禁止登入)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'0322806','陳瑋俊','0987861106','u0324813@nkfust.edu.tw','cA3GBxRMNXI:APA91bEJacPp8e9_WmQjkdsNah7qvGeDvGBi5-P3h3TyYa9IU7euuusSwsi0WYAVPfJ5c_0nvrVtglsGCa4WPeSIor8i3DeJdZ18KRXMQHtslI8d0PUtkiaw-ve7X-U_JqcSK5Gdm3o4',1),(2,'0324813','Tony','0912345678','u0324813@nkfust.edu.tw','dETquMT5McY:APA91bGtpmJ2uBIsJBgLPYFQpYqNjO5UBSZuI9Hjq-JU_7udETpOOrAmJ40Gk0Ut4RIoL_3zwWedTZG6zwVkpsKcVN_4Bdkn6CdI-GOJDmkVy6xwc5KTcKWKpO1NaZvx5tqcFjCl35Qu',1),(3,'0424802',NULL,NULL,NULL,'cf6gQLLg-qM:APA91bFtMgr8f6viCG7CDKM9WMgWkuKbnHo9DhvshGY77odYDMlUjtGwGt4Tlt6IN-5JKhVxQRqAyp8hHbQnLfcYJM9xXZkxBOjGlnPUB7Vz6hJeHhmotoXgbVoBrISIf6trXCsfXVUn',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-22 22:46:33
