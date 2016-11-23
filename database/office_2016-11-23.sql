# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.34)
# Database: office
# Generation Time: 2016-11-23 14:18:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `productId` int(10) NOT NULL AUTO_INCREMENT COMMENT '产品ID',
  `supplierId` int(8) DEFAULT NULL COMMENT '供应商ID',
  `warehouseId` int(10) DEFAULT NULL,
  `supplierIdExt` int(8) DEFAULT NULL COMMENT '辅助供应商',
  `barCode` varchar(100) DEFAULT NULL COMMENT '条形码',
  `qrCode` varchar(100) DEFAULT NULL COMMENT '二维码',
  `type` char(2) CHARACTER SET latin1 DEFAULT NULL COMMENT '产品大类：lg大类,md中类,xs小类',
  `chineseBrand` varchar(80) DEFAULT NULL COMMENT '品牌(中文)',
  `englishBrand` varchar(80) DEFAULT NULL COMMENT '品牌(英文)',
  `brandName` varchar(50) DEFAULT NULL COMMENT '品名',
  `number` varchar(200) DEFAULT NULL COMMENT '货号',
  `standard` varchar(255) DEFAULT NULL COMMENT '简要规格',
  `color` varchar(20) DEFAULT NULL COMMENT '颜色',
  `unit` varchar(45) DEFAULT NULL COMMENT '单位',
  `packageNum` int(6) DEFAULT NULL COMMENT '最小包规计算数量',
  `packageUnit` int(6) DEFAULT NULL COMMENT '最小包规单位',
  `packageRules` int(6) DEFAULT NULL COMMENT '包规',
  `description` text COMMENT '产品详细描述',
  `expiration` int(10) DEFAULT NULL COMMENT '产品效期',
  `stockPrice` double(6,2) DEFAULT NULL COMMENT '进货单价\n',
  `costPrice` double(6,2) DEFAULT NULL COMMENT '成本单价',
  `standardPrice` double(6,2) DEFAULT NULL COMMENT '标准售价',
  `oneTypePrice` double(6,2) DEFAULT NULL COMMENT '分类售价一',
  `twoTypePrice` double(6,2) DEFAULT NULL COMMENT '分类售价二\n',
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品表';

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`productId`, `supplierId`, `warehouseId`, `supplierIdExt`, `barCode`, `qrCode`, `type`, `chineseBrand`, `englishBrand`, `brandName`, `number`, `standard`, `color`, `unit`, `packageNum`, `packageUnit`, `packageRules`, `description`, `expiration`, `stockPrice`, `costPrice`, `standardPrice`, `oneTypePrice`, `twoTypePrice`)
VALUES
	(47,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(48,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(49,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(50,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(98,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(99,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(100,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(101,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(102,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(103,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(104,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(105,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(106,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(107,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(108,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(109,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(110,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(111,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(112,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34),
	(115,2,NULL,20,'uploads/20161102145714443.jpg','uploads/20161102145720665.jpg','1','是打发点','dasasdf','asdfsd地方','阿斯顿发送到','阿斯顿发生的的发生的发生的地方','','',0,0,3,'格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品格和对该产品使用方法的说明,以及对该产品',0,3434.34,3434.34,3434.34,3434.34,3434.34);

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table purchase
# ------------------------------------------------------------

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `purchaseId` int(10) NOT NULL AUTO_INCREMENT COMMENT '进货单ID',
  `supplierId` int(10) DEFAULT NULL COMMENT '供应商ID',
  `purchasecol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`purchaseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table supplier
# ------------------------------------------------------------

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplierId` int(8) NOT NULL AUTO_INCREMENT COMMENT '供应商ID',
  `fullName` varchar(100) DEFAULT NULL COMMENT '供应商全称',
  `abbreviation` varchar(30) DEFAULT NULL COMMENT '供应商简称',
  `type` varchar(45) DEFAULT NULL COMMENT '供应商类型',
  `brand` varchar(45) DEFAULT NULL COMMENT '供应品牌',
  `brandType` varchar(45) DEFAULT NULL COMMENT '供应品类',
  `officeAdd` varchar(100) DEFAULT NULL COMMENT '办公地址',
  `warehoustAdd` varchar(100) DEFAULT NULL COMMENT '库房地址',
  `area` varchar(45) DEFAULT NULL COMMENT '采购区域',
  `settlementMmethod` varchar(45) DEFAULT NULL COMMENT '结算方式',
  `paymentMethod` varchar(45) DEFAULT NULL COMMENT '收款方式',
  `priceTax` double(11,2) DEFAULT NULL COMMENT '结算价格（含税）',
  `priceNoTax` double(11,2) DEFAULT NULL COMMENT '结算价格（不含税）',
  `account` varchar(45) DEFAULT NULL COMMENT '帐户信息',
  `deliveryIs` tinyint(1) DEFAULT NULL COMMENT '是否送货',
  `signIs` tinyint(1) DEFAULT NULL COMMENT '是否签协',
  `returnRequirements` varchar(255) DEFAULT NULL COMMENT '退换货要求',
  `contractDate` char(10) DEFAULT NULL COMMENT '合同到期日',
  `contractBriefing` varchar(255) DEFAULT NULL COMMENT '合同简报',
  `credit` varchar(45) DEFAULT NULL COMMENT '授信额度',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商表';

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;

INSERT INTO `supplier` (`supplierId`, `fullName`, `abbreviation`, `type`, `brand`, `brandType`, `officeAdd`, `warehoustAdd`, `area`, `settlementMmethod`, `paymentMethod`, `priceTax`, `priceNoTax`, `account`, `deliveryIs`, `signIs`, `returnRequirements`, `contractDate`, `contractBriefing`, `credit`, `note`)
VALUES
	(1,'阿斯顿发生','阿斯蒂芬','s:13:\"[\"0\",\"1\",\"2\"]\";','阿斯顿','阿斯顿','阿斯蒂芬','啊手动阀手动阀','发的是个地方','东风公司','豆腐干士大夫',34.11,22.25,'中国工商',0,0,'','2016.12.03','','阿斯蒂芬',''),
	(2,'阿斯顿发生','阿斯蒂芬','s:13:\"[\"0\",\"1\",\"2\"]\";','阿斯顿','阿斯顿','阿斯蒂芬','啊手动阀手动阀','发的是个地方','东风公司','豆腐干士大夫',34.11,22.25,'中国工商',0,0,'','2016.12.03','','阿斯蒂芬',''),
	(3,'阿斯顿发生','阿斯蒂芬','s:13:\"[\"0\",\"1\",\"2\"]\";','阿斯顿','阿斯顿','阿斯蒂芬','啊手动阀手动阀','发的是个地方','东风公司','豆腐干士大夫',34.11,22.25,'中国工商',0,0,'','2016.12.03','','阿斯蒂芬',''),
	(4,'阿斯顿发生','阿斯蒂芬','s:13:\"[\"0\",\"1\",\"2\"]\";','阿斯顿','阿斯顿','阿斯蒂芬','啊手动阀手动阀','发的是个地方','东风公司','豆腐干士大夫',34.11,22.25,'中国工商',0,0,'','2016.12.03','','阿斯蒂芬',''),
	(5,'阿斯顿发生','阿斯蒂芬','s:13:\"[\"0\",\"1\",\"2\"]\";','阿斯顿','阿斯顿','阿斯蒂芬','啊手动阀手动阀','发的是个地方','东风公司','豆腐干士大夫',34.11,22.25,'中国工商',0,0,'','2016.12.03','','阿斯蒂芬',''),
	(6,'阿斯顿发生','阿斯蒂芬','s:13:\"[\"0\",\"1\",\"2\"]\";','阿斯顿','阿斯顿','阿斯蒂芬','啊手动阀手动阀','发的是个地方','东风公司','豆腐干士大夫',34.11,22.25,'中国工商',0,0,'','2016.12.03','','阿斯蒂芬',''),
	(7,'阿斯顿发生','阿斯蒂芬','s:13:\"[\"0\",\"1\",\"2\"]\";','阿斯顿','阿斯顿','阿斯蒂芬','啊手动阀手动阀','发的是个地方','东风公司','豆腐干士大夫',34.11,22.25,'中国工商',0,0,'','2016.12.03','','阿斯蒂芬',''),
	(8,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(9,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(10,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(11,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(12,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(13,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(65,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(66,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(67,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(68,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(69,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(70,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(71,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(72,'阿斯蒂芬','地方','s:13:\"[\"0\",\"1\",\"2\"]\";','地方','地方','覆盖','覆盖是','阿斯蒂芬','丰功硕德','豆腐干',34.11,22.25,'中国工商',0,1,'啊山豆根豆腐干岁的法国和深度覆盖','2016-21-12','士大夫a','阿斯蒂芬','阿斯顿'),
	(73,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(74,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(75,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(76,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(77,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(109,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(110,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(111,'啊手动阀手动阀','更换防盗更换','s:13:\"[\"0\",\"1\",\"2\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是','山东分公司s','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'d\'s\'f\'g','2016-21-12','岁的法国法国警方规划局规划局开会艰苦了；','士大夫敢死队风格','是豆腐干士大夫敢死队'),
	(115,'阿斯蒂芬','更换防盗更换','s:9:\"[\"0\",\"1\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是a\'s\'d\'fa\'s\'d\'f','覆盖是','啊是的地方','规划','发个好地方',34.11,22.25,'中国工商',1,0,'','2016-21-12','','啊士大夫风格化法国',''),
	(116,'阿斯蒂芬','更换防盗更换','s:9:\"[\"0\",\"1\"]\";','东风公司','的风光很多的d\'f\'g\'h','地方感觉还是a\'s\'d\'fa\'s\'d\'f','覆盖是','啊是的地方','规划','发个好地方',34.11,22.25,'中国工商',1,0,'','2016-21-12','','啊士大夫风格化法国',''),
	(117,'阿斯蒂芬','更换防盗更换','s:9:\"[\"0\",\"1\"]\";','东风公司','地方','地方感觉还是','覆盖是','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'','2016-21-12','','士大夫敢死队风格',''),
	(118,'阿斯蒂芬','更换防盗更换','s:9:\"[\"0\",\"1\"]\";','东风公司','地方','地方感觉还是','覆盖是','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'','2016-21-12','','士大夫敢死队风格',''),
	(120,'23阿斯蒂芬大师傅似的发射点发射点发射点发射点','更换防盗更换','s:9:\"[\"0\",\"1\"]\";','东风公司','地方','地方感觉还是','覆盖是','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'','2016-21-12','','士大夫敢死队风格啊啊啊啊',''),
	(121,'23阿斯蒂芬大师傅似的发射点发射点发射点发射点','更换防盗更换','s:9:\"[\"0\",\"1\"]\";','东风公司','地方','地方感觉还是','覆盖是','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'','2016-21-12','','士大夫敢死队风格啊啊啊啊',''),
	(123,'阿斯蒂芬大师傅似的发射点发射点发射点发射点','更换防盗1更换得到的','s:9:\"[\"0\",\"1\"]\";','东风公司','地方','地方感觉还是','覆盖是','岁的法国','的甲方根据','但是风格士大夫',34.11,22.25,'中国工商',0,0,'','2016-11-10','','士大夫敢死队风格','');

/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table supplier_contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `supplier_contact`;

CREATE TABLE `supplier_contact` (
  `contactId` int(5) NOT NULL AUTO_INCREMENT COMMENT '供应商ID',
  `supplierId` int(8) DEFAULT NULL COMMENT '供应商ID',
  `name` varchar(45) DEFAULT NULL COMMENT '联系人姓名',
  `nickname` varchar(45) DEFAULT NULL COMMENT '英文名/昵称',
  `gender` tinyint(1) DEFAULT NULL COMMENT '性别',
  `position` varchar(255) DEFAULT NULL COMMENT '职位/描述',
  `age` tinyint(1) DEFAULT NULL COMMENT '年龄',
  `phone` varchar(30) DEFAULT NULL COMMENT '座机电话',
  `phoneExt` varchar(10) DEFAULT NULL COMMENT '分机',
  `telOne` char(11) DEFAULT NULL COMMENT '手机一',
  `telTwo` char(11) DEFAULT NULL COMMENT '手机二',
  `email` varchar(45) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(15) DEFAULT NULL COMMENT 'qq',
  `wechat` varchar(20) DEFAULT NULL COMMENT '微信',
  `account` varchar(45) DEFAULT NULL COMMENT '个人帐户',
  `birthday` char(10) DEFAULT NULL COMMENT '生日',
  `note` varchar(255) DEFAULT NULL COMMENT '附注',
  PRIMARY KEY (`contactId`),
  KEY `supplierID` (`supplierId`),
  CONSTRAINT `contact_record_supplierid` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`supplierId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应联系人表';



# Dump of table supplier_record
# ------------------------------------------------------------

DROP TABLE IF EXISTS `supplier_record`;

CREATE TABLE `supplier_record` (
  `recordId` int(10) NOT NULL COMMENT '供应商接触记录ID',
  `supplierId` int(8) DEFAULT NULL COMMENT '供应商ID',
  `contactId` int(5) DEFAULT NULL COMMENT '联系人ID',
  `timestamp` int(10) DEFAULT NULL COMMENT '联系时间',
  `type` varchar(45) DEFAULT NULL COMMENT '联系方式',
  `record` varchar(255) DEFAULT NULL COMMENT '记录',
  `keepRecords` varchar(255) DEFAULT NULL COMMENT '留物记录',
  `nextTimestamp` int(10) DEFAULT NULL COMMENT '下次联系计划日期',
  `nextContent` varchar(45) DEFAULT NULL COMMENT '下次联系计划内容',
  PRIMARY KEY (`recordId`),
  UNIQUE KEY `recordId_UNIQUE` (`recordId`),
  KEY `supplierId_idx` (`supplierId`),
  CONSTRAINT `record_supplier_id` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`supplierId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='供应商接触记录表';



# Dump of table warehouse
# ------------------------------------------------------------

DROP TABLE IF EXISTS `warehouse`;

CREATE TABLE `warehouse` (
  `warehouseId` int(10) NOT NULL AUTO_INCREMENT COMMENT '库房ID',
  `name` varchar(100) DEFAULT NULL COMMENT '库房名称',
  `address` varchar(100) DEFAULT NULL COMMENT '库房地址',
  `area` double(9,2) DEFAULT NULL COMMENT '库存面积',
  `number` int(10) DEFAULT NULL COMMENT '员工人数',
  `distrbutionArea` varchar(255) DEFAULT NULL COMMENT '配送区域',
  `distrbutionTools` varchar(255) DEFAULT NULL COMMENT '配送工具情况',
  `quota` varchar(255) DEFAULT NULL COMMENT '储值额度',
  `credit` varchar(255) DEFAULT NULL COMMENT '授信额度',
  `joinDate` int(11) DEFAULT NULL COMMENT '加盟日期',
  `contractDate` int(11) DEFAULT NULL COMMENT '合同到期日',
  PRIMARY KEY (`warehouseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品库房设置表';

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;

INSERT INTO `warehouse` (`warehouseId`, `name`, `address`, `area`, `number`, `distrbutionArea`, `distrbutionTools`, `quota`, `credit`, `joinDate`, `contractDate`)
VALUES
	(6,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(7,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(8,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(9,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(10,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(11,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(12,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(13,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(14,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(15,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(16,'卡睡觉了发送；了','但看见啊疯了似的',23.00,34234,'五城区','老师快点减肥开始','打开房间','会计法 i',2016,2016),
	(33,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(34,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(35,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(36,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(37,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(38,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(39,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(40,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(44,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(46,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(48,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(49,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(50,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(51,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(52,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(53,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(55,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(56,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(57,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(58,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(59,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(60,'是的风格','很是的风格大方',312.00,342,'五城区','d时代发生的','到发送','阿斯顿飞',2016,2016),
	(63,'阿斯顿飞地方','很是的风格大方',312.23,342,'史蒂夫和分公司噶地方是的','d时代发生的','123.23','343.234',2016,2016),
	(64,'到发送地方','很是的风格大方',312.23,342,'史蒂夫和分公司噶地方是的','d时代发生的','123.23','343.234',2016,2016),
	(66,'到发送地方时','很是的风格大方',312.23,342,'史蒂夫和分公司噶地方是的','d时代发生的','123.23','343.234',1970,1970),
	(67,'到发送地方时11111','很是的风格大方',312.23,342,'史蒂夫和分公司噶地方是的','d时代发生的','123.23','343.234',1478736000,1478736000);

/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
