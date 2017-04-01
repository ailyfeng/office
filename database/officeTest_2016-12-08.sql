# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.34)
# Database: officeTest
# Generation Time: 2016-12-08 11:29:59 +0000
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
  `stockPrice` double(13,2) DEFAULT NULL COMMENT '进货单价\\n',
  `costPrice` double(13,2) DEFAULT NULL COMMENT '成本单价',
  `standardPrice` double(13,2) DEFAULT NULL COMMENT '标准售价',
  `oneTypePrice` double(13,2) DEFAULT NULL COMMENT '分类售价一',
  `twoTypePrice` double(13,2) DEFAULT NULL COMMENT '分类售价二\\n',
  `picPositive` varchar(100) DEFAULT NULL COMMENT '产品正面',
  `picSide` varchar(100) DEFAULT NULL COMMENT '产品的侧面',
  `picBackground` varchar(100) DEFAULT NULL COMMENT '产品背景\\n',
  `close` tinyint(1) DEFAULT NULL COMMENT '是否删除，1:删除；0:正常使用',
  PRIMARY KEY (`productId`),
  KEY `warehouseId_idx` (`warehouseId`),
  KEY `product_supplier_id_idx` (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品表';

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`productId`, `supplierId`, `warehouseId`, `supplierIdExt`, `barCode`, `qrCode`, `type`, `chineseBrand`, `englishBrand`, `brandName`, `number`, `standard`, `color`, `unit`, `packageNum`, `packageUnit`, `packageRules`, `description`, `expiration`, `stockPrice`, `costPrice`, `standardPrice`, `oneTypePrice`, `twoTypePrice`, `picPositive`, `picSide`, `picBackground`, `close`)
VALUES
	(1,34,NULL,0,'',NULL,NULL,'asdfasdf','阿斯顿发送','asdfasdfasdf','asdfasdf','','','',0,0,0,'',0,34234.22,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL,0),
	(2,34,NULL,0,'',NULL,NULL,'asdfasdf','阿斯顿发送','asdfasdfasdf','asdfasdf','','','',0,0,0,'',0,34234.22,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL,0),
	(3,34,NULL,0,'',NULL,NULL,'asdfasdf','阿斯顿发送','asdfasdfasdf','asdfasdf','','','',0,0,0,'',0,34234.22,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL,0),
	(4,3423,NULL,0,'',NULL,NULL,'32423','asfdasdf','asdfasdfsadf','阿斯顿发','','','',0,0,0,'',0,342.00,234.00,234.00,0.00,0.00,NULL,NULL,NULL,0),
	(5,343,NULL,0,'',NULL,NULL,'阿斯顿发','阿斯顿发送','asdfasdfsadf','阿斯顿发送到发送地方','','','',0,0,0,'',0,1234.00,234234.00,9999.99,0.00,0.00,NULL,NULL,NULL,0),
	(6,23,NULL,234,'/uploads/20161202172850140.jpg',NULL,NULL,'2sadf','asdfas','fasdfas','asdfasdf','asdfasdgasdfasd','asdfasdf','asdfasd',0,0,0,'asdfasdf',0,3423.00,234.00,9999.99,234.00,234.00,NULL,NULL,NULL,0),
	(7,34,NULL,2342,'/uploads/20161202173349878.jpg','/uploads/20161202173358285.jpg',NULL,'234234','asdfasdfasdf','asdfasdfasdf','asdf','asdf','','asdf',0,0,0,'asdf',0,34.00,234.00,3423.00,234.00,234.00,NULL,NULL,NULL,0),
	(8,342,NULL,2342,'/uploads/20161202173756468.jpg','/uploads/20161202173806979.jpg',NULL,'sadfasd','fasdf','asdfasdf','asdf','asdfasdf','asdf','asdfasd',0,0,0,'asdfasd',0,3423.00,234.00,234.00,34.00,3423.00,NULL,NULL,NULL,0),
	(9,342,NULL,2342,'/uploads/20161202173756468.jpg','/uploads/20161202173806979.jpg',NULL,'sadfasd','fasdf','asdfasdf','asdf','asdfasdf','asdf','asdfasd',0,0,0,'asdfasd',0,3423.00,234.00,234.00,34.00,3423.00,NULL,NULL,NULL,0),
	(10,3234,NULL,234,'/uploads/20161202174249102.jpg','/uploads/20161202174258315.jpg',NULL,'dsfasdf','asdfasdf','asdfasdf','asdf','asdfa','as','dfas',0,0,0,'asdf',0,32.00,234.00,234.00,234.00,234.00,NULL,NULL,NULL,0),
	(11,3234,NULL,234,'/uploads/20161202174249102.jpg','/uploads/20161202174258315.jpg',NULL,'dsfasdf','asdfasdf','asdfasdf','asdf','asdfa','as','dfas',0,0,0,'asdf',0,32.00,234.00,234.00,234.00,234.00,NULL,NULL,NULL,0);

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
  `priceTax` double(13,2) DEFAULT NULL COMMENT '结算价格（含税）',
  `priceNoTax` double(13,2) DEFAULT NULL COMMENT '结算价格（不含税）',
  `account` varchar(45) DEFAULT NULL COMMENT '帐户信息',
  `deliveryIs` tinyint(1) DEFAULT NULL COMMENT '是否送货',
  `signIs` tinyint(1) DEFAULT NULL COMMENT '是否签协',
  `returnRequirements` varchar(255) DEFAULT NULL COMMENT '退换货要求',
  `contractDate` char(10) DEFAULT NULL COMMENT '合同到期日',
  `contractBriefing` varchar(255) DEFAULT NULL COMMENT '合同简报',
  `credit` varchar(45) DEFAULT NULL COMMENT '授信额度',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  `close` tinyint(1) DEFAULT NULL COMMENT '是否删除，1:删除；0:正常使用',
  PRIMARY KEY (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供应商表';

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;

INSERT INTO `supplier` (`supplierId`, `fullName`, `abbreviation`, `type`, `brand`, `brandType`, `officeAdd`, `warehoustAdd`, `area`, `settlementMmethod`, `paymentMethod`, `priceTax`, `priceNoTax`, `account`, `deliveryIs`, `signIs`, `returnRequirements`, `contractDate`, `contractBriefing`, `credit`, `note`, `close`)
VALUES
	(1,'asdfkasj','ja;lskdj','s:13:\"[\"0\",\"1\",\"2\"]\";','jkas;dljkf','jfasd;lkfj;','jlskadjfa;lskdj','jas;ldkjf','jas;dkjf','j;alskdj','aslkdjf;',1.00,2324.00,'sdmfna',0,0,'dkjfa;sldkjf;','1481673600','sldkjf','kjdkalf','jk;lasjkfd;',0),
	(2,'asdfd;lkajs;ldkjfsd','alksdjflk','s:13:\"[\"0\",\"1\",\"2\"]\";','a;sldkjf;l','kja;skldj','klsdjfa;sdk','kdjf;askdjf','askdjfoieuaslkdjfaa;','sdkfja;s','asdkfja;skdl',341234.00,342.00,'lksadjfa;slkj',0,0,'askdjfa;slkdjf;','1481673600','sdfasdf','asdkfj','as;dlkjfa;lskdf',0),
	(3,'sdfasdlk','lkjda;lsdkjf','s:13:\"[\"0\",\"1\",\"2\"]\";',';aksdjf;','a;skdjfa;s',';askdf;aks','sdkjfa;k','a;skdfj','alksdjfejfa;slkdj','asdfasd',34123.00,234.00,'sdkfjaks',0,0,'asdfasdkfjksadfj','1481673600','dsfasdf','sadf','asdfasdfas',0),
	(4,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,9999999.99,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(5,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(6,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(7,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(8,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(9,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(10,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(11,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(12,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(13,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(14,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(15,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(16,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(30,'到发送大发','alskdjfaksj','s:13:\"[\"0\",\"1\",\"2\"]\";','ksajf;skdj','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',0),
	(18,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(19,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(20,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(21,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(22,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(23,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(24,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(29,'asdfasdf ','alskdjfaksj','s:13:\"[\"0\",\"1\",\"2\"]\";','ksajf;skdj','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','','','',0),
	(26,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(27,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(28,'slkdjfalksdjf','skdjfkas','s:13:\"[\"0\",\"1\",\"2\"]\";','sdfasdfkjdas','sdkajfaskdjf','ksadjflaksdj','klasjdlfkjasldkjf','alksjdlfajlsdj','kajsldfjlj','lkjdskafjsldkaj',234234.00,423142314.00,'sdkjfkasjd',1,1,'asdfasdfkjaskljdflasjdk','1481673600','asdfasdf','faskdjfklaj','sadkfjaksdfl',0),
	(31,'asdfasdf ','alskdjfaksj','s:13:\"[\"0\",\"1\",\"2\"]\";','ksajf;skdj','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',0),
	(32,'asdfasdf ','alskdjfaksj','s:13:\"[\"0\",\"1\",\"2\"]\";','ksajf;skdj','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',0),
	(33,'asdfasdf ','alskdjfaksj','s:13:\"[\"0\",\"1\",\"2\"]\";','ksajf;skdj','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',0),
	(34,'阿斯顿发送到','alskdjfaksj','s:13:\"[\"0\",\"1\",\"2\"]\";','ksajf;skdj','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',0),
	(35,'asdfasdf ','alskdjfaksj','s:13:\"[\"0\",\"1\",\"2\"]\";','卡萨肌肤抗衰老的','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',0),
	(36,'阿斯顿发撒地方','不晓得','s:13:\"[\"0\",\"1\",\"2\"]\";','卡萨肌肤抗衰老的','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1481673600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',0),
	(37,'阿斯顿发说到发送','阿斯顿发发呆','s:13:\"[\"0\",\"1\",\"2\"]\";','卡萨肌肤抗衰老的','lkasjdlfkj','s;akdjf;alskjdf','alskjfd;alskdjf;kj ','kasjd;flkasjd ','skdjfklasjd','jfalksjdflakj',234123.00,2341234.00,'kjsakdfj ',1,1,'asdfasdfkjasklj卡索拉就地方啦深刻的萨科的肌肤阿斯顿','1480809600','阿斯科利的肌肤啦深刻的肌肤撒放','是打开房间','撒离开的肌肤阿斯顿skald',1);

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
  `phone` varchar(11) DEFAULT NULL COMMENT '座机电话',
  `phoneExt` varchar(10) DEFAULT NULL COMMENT '分机',
  `telOne` char(11) DEFAULT NULL COMMENT '手机一',
  `telTwo` char(11) DEFAULT NULL COMMENT '手机二',
  `email` varchar(45) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(15) DEFAULT NULL COMMENT 'qq',
  `wechat` varchar(20) DEFAULT NULL COMMENT '微信',
  `account` varchar(45) DEFAULT NULL COMMENT '个人帐户',
  `birthday` char(10) DEFAULT NULL COMMENT '生日',
  `note` varchar(255) DEFAULT NULL COMMENT '附注',
  `close` tinyint(1) DEFAULT NULL COMMENT '是否删除，1:删除；0:正常使用',
  PRIMARY KEY (`contactId`),
  KEY `supplierID` (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供应联系人表';

LOCK TABLES `supplier_contact` WRITE;
/*!40000 ALTER TABLE `supplier_contact` DISABLE KEYS */;

INSERT INTO `supplier_contact` (`contactId`, `supplierId`, `name`, `nickname`, `gender`, `position`, `age`, `phone`, `phoneExt`, `telOne`, `telTwo`, `email`, `qq`, `wechat`, `account`, `birthday`, `note`, `close`)
VALUES
	(1,36,'asdfas','',1,'',23,'','','','','','','','','0','',NULL),
	(2,36,'asdfasdf','',1,'',0,'','','','','','','','','0','',NULL),
	(3,36,'asdfasdf','',1,'',0,'','','','','','','','','0','',NULL),
	(4,36,'asdfasdf','',1,'asdfa',32,'','','','','','','','','0','',NULL),
	(5,36,'asdfasdf','',1,'',0,'','','','18782373332','','','','','0','',NULL);

/*!40000 ALTER TABLE `supplier_contact` ENABLE KEYS */;
UNLOCK TABLES;


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
  `warehouseId` int(10) NOT NULL AUTO_INCREMENT COMMENT '库房ID',
  `name` varchar(100) DEFAULT NULL COMMENT '库房名称',
  `address` varchar(100) DEFAULT NULL COMMENT '库房地址',
  `area` double(9,2) DEFAULT NULL COMMENT '库房面积',
  `number` smallint(6) DEFAULT NULL COMMENT '员工人数',
  `distrbutionArea` varchar(255) DEFAULT NULL COMMENT '配送区域',
  `distrbutionTools` varchar(255) DEFAULT NULL COMMENT '配送工具情况',
  `quota` double(13,2) DEFAULT NULL COMMENT '储值额度',
  `credit` double(13,2) DEFAULT NULL COMMENT '授信额度',
  `joinDate` int(11) DEFAULT NULL COMMENT '加盟日期',
  `contractDate` int(11) DEFAULT NULL COMMENT '合同到期日',
  `close` tinyint(1) DEFAULT NULL COMMENT '是否删除，1:删除；0:正常使用',
  PRIMARY KEY (`warehouseId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品库房设置表';

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;

INSERT INTO `warehouse` (`warehouseId`, `name`, `address`, `area`, `number`, `distrbutionArea`, `distrbutionTools`, `quota`, `credit`, `joinDate`, `contractDate`, `close`)
VALUES
	(1,'大家是否卡设计的课','看见阿斯利康的肌肤 ',234234.00,32412,'将卢卡斯大家发开始','23就撒了大家发来上课就地方',234.00,34234.00,1480809600,1480809600,0),
	(2,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(3,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(4,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(5,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(6,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(7,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(8,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(9,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(10,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(11,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(12,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(13,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(14,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(15,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(16,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(17,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(18,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(19,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(20,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(21,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(22,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(23,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(24,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(25,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(26,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(27,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(28,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(29,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(30,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(31,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(32,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(33,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(34,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(35,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1480809600,1480809600,0),
	(41,'大看风使舵','啊谁看得见发是快乐的经历',234234.00,32767,'啦可是大家发可是大家发','是会计法律框架地方啦可是',234234.00,4324243.00,1482278400,1481673600,0),
	(42,'阿斯顿发水淀粉','但是发送到发送地方',234234.00,1111,'ksjadlfk ','aksjdfl ',34234.00,3243.00,1480896000,1482192000,0),
	(43,'asdfsdf','阿斯顿地方地方fd',234234.00,111,'kjaslkdjfsdf','askdjfakljfasdf',342.00,3242.00,1480896000,1480896000,0),
	(38,'阿斯顿发送到发送地方空间','谁看了就地方啦深刻对接',234234.00,32767,'是打开房间阿里萨达','啊上课大家发来上课就地方啦',342342.00,234234234.00,1480809600,1480809600,0),
	(39,'阿斯顿发送到发送地方空间','谁看了就地方啦深刻对接',234234.00,32767,'是打开房间阿里萨达','啊上课大家发来上课就地方啦',342342.00,234234234.00,1480809600,1480809600,0),
	(40,'阿斯顿发送到发送地方空间','谁看了就地方啦深刻对接',234234.00,32767,'是打开房间阿里萨达','啊上课大家发来上课就地方啦',342342.00,234234234.00,1480809600,1480809600,0);

/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
