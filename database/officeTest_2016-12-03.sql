# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.34)
# Database: officeTest
# Generation Time: 2016-12-03 04:18:27 +0000
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
  `type` char(2) DEFAULT NULL COMMENT '产品大类：lg大类,md中类,xs小类',
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
  `stockPrice` double(11,2) DEFAULT NULL COMMENT '进货单价\n',
  `costPrice` double(11,2) DEFAULT NULL COMMENT '成本单价',
  `standardPrice` double(6,2) DEFAULT NULL COMMENT '标准售价',
  `oneTypePrice` double(6,2) DEFAULT NULL COMMENT '分类售价一',
  `twoTypePrice` double(6,2) DEFAULT NULL COMMENT '分类售价二\n',
  `picPositive` varchar(100) DEFAULT NULL COMMENT '产品正面',
  `picSide` varchar(100) DEFAULT NULL COMMENT '产品的侧面',
  `picBackground` varchar(100) DEFAULT NULL COMMENT '产品背景\\n',
  PRIMARY KEY (`productId`),
  KEY `warehouseId_idx` (`warehouseId`),
  KEY `product_supplier_id_idx` (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品表';

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`productId`, `supplierId`, `warehouseId`, `supplierIdExt`, `barCode`, `qrCode`, `type`, `chineseBrand`, `englishBrand`, `brandName`, `number`, `standard`, `color`, `unit`, `packageNum`, `packageUnit`, `packageRules`, `description`, `expiration`, `stockPrice`, `costPrice`, `standardPrice`, `oneTypePrice`, `twoTypePrice`, `picPositive`, `picSide`, `picBackground`)
VALUES
	(1,34,NULL,0,'',NULL,NULL,'asdfasdf','阿斯顿发送','asdfasdfasdf','asdfasdf','','','',0,0,0,'',0,34234.22,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL),
	(2,34,NULL,0,'',NULL,NULL,'asdfasdf','阿斯顿发送','asdfasdfasdf','asdfasdf','','','',0,0,0,'',0,34234.22,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL),
	(3,34,NULL,0,'',NULL,NULL,'asdfasdf','阿斯顿发送','asdfasdfasdf','asdfasdf','','','',0,0,0,'',0,34234.22,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL),
	(4,3423,NULL,0,'',NULL,NULL,'32423','asfdasdf','asdfasdfsadf','阿斯顿发','','','',0,0,0,'',0,342.00,234.00,234.00,0.00,0.00,NULL,NULL,NULL),
	(5,343,NULL,0,'',NULL,NULL,'阿斯顿发','阿斯顿发送','asdfasdfsadf','阿斯顿发送到发送地方','','','',0,0,0,'',0,1234.00,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL),
	(6,23,NULL,234,'/uploads/20161202172850140.jpg',NULL,NULL,'2sadf','asdfas','fasdfas','asdfasdf','asdfasdgasdfasd','asdfasdf','asdfasd',0,0,0,'asdfasdf',0,3423.00,234.00,9999.99,234.00,234.00,NULL,NULL,NULL),
	(7,34,NULL,2342,'/uploads/20161202173349878.jpg','/uploads/20161202173358285.jpg',NULL,'234234','asdfasdfasdf','asdfasdfasdf','asdf','asdf','','asdf',0,0,0,'asdf',0,34.00,234.00,3423.00,234.00,234.00,NULL,NULL,NULL),
	(8,342,NULL,2342,'/uploads/20161202173756468.jpg','/uploads/20161202173806979.jpg',NULL,'sadfasd','fasdf','asdfasdf','asdf','asdfasdf','asdf','asdfasd',0,0,0,'asdfasd',0,3423.00,234.00,234.00,34.00,3423.00,NULL,NULL,NULL),
	(9,342,NULL,2342,'/uploads/20161202173756468.jpg','/uploads/20161202173806979.jpg',NULL,'sadfasd','fasdf','asdfasdf','asdf','asdfasdf','asdf','asdfasd',0,0,0,'asdfasd',0,3423.00,234.00,234.00,34.00,3423.00,NULL,NULL,NULL),
	(10,3234,NULL,234,'/uploads/20161202174249102.jpg','/uploads/20161202174258315.jpg',NULL,'dsfasdf','asdfasdf','asdfasdf','asdf','asdfa','as','dfas',0,0,0,'asdf',0,32.00,234.00,234.00,234.00,234.00,NULL,NULL,NULL),
	(11,3234,NULL,234,'/uploads/20161202174249102.jpg','/uploads/20161202174258315.jpg',NULL,'dsfasdf','asdfasdf','asdfasdf','asdf','asdfa','as','dfas',0,0,0,'asdf',0,32.00,234.00,234.00,234.00,234.00,NULL,NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
  `priceTax` double(9,2) DEFAULT NULL COMMENT '结算价格（含税）',
  `priceNoTax` double(9,2) DEFAULT NULL COMMENT '结算价格（不含税）',
  `account` varchar(45) DEFAULT NULL COMMENT '帐户信息',
  `deliveryIs` tinyint(1) DEFAULT NULL COMMENT '是否送货',
  `signIs` tinyint(1) DEFAULT NULL COMMENT '是否签协',
  `returnRequirements` varchar(255) DEFAULT NULL COMMENT '退换货要求',
  `contractDate` char(10) DEFAULT NULL COMMENT '合同到期日',
  `contractBriefing` varchar(255) DEFAULT NULL COMMENT '合同简报',
  `credit` varchar(45) DEFAULT NULL COMMENT '授信额度',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供应商表';



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
  KEY `supplierID` (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供应联系人表';



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
  KEY `supplierId_idx` (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供应商接触记录表';



# Dump of table warehouse
# ------------------------------------------------------------

DROP TABLE IF EXISTS `warehouse`;

CREATE TABLE `warehouse` (
  `warehouseId` int(10) NOT NULL COMMENT '库房ID',
  `name` varchar(100) DEFAULT NULL COMMENT '库房名称',
  `address` varchar(100) DEFAULT NULL COMMENT '库房地址',
  `area` double(9,2) DEFAULT NULL COMMENT '库房面积',
  `number` smallint(6) DEFAULT NULL COMMENT '员工人数',
  `distrbutionArea` varchar(255) DEFAULT NULL COMMENT '配送区域',
  `distrbutionTools` varchar(255) DEFAULT NULL COMMENT '配送工具情况',
  `quota` double(9,2) DEFAULT NULL COMMENT '储值额度',
  `credit` double(9,2) DEFAULT NULL COMMENT '授信额度',
  `joinDate` int(11) DEFAULT NULL COMMENT '加盟日期',
  `contractDate` int(11) DEFAULT NULL COMMENT '合同到期日',
  PRIMARY KEY (`warehouseId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品库房设置表';




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
