/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : office

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-10-29 10:40:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for produce_warehouse
-- ----------------------------
DROP TABLE IF EXISTS `produce_warehouse`;
CREATE TABLE `produce_warehouse` (
  `warehouseId` int(10) NOT NULL COMMENT '库房ID',
  `name` varchar(100) DEFAULT NULL COMMENT '库房名称',
  `type` varchar(45) DEFAULT NULL COMMENT '库存类别',
  `where` varchar(100) DEFAULT NULL COMMENT '货品的存放位置',
  `minNum` int(10) DEFAULT NULL COMMENT '最低库存量',
  `maxNum` int(10) DEFAULT NULL COMMENT '最高库存量\n',
  `cycle` tinyint(1) DEFAULT NULL COMMENT '盘点周期',
  PRIMARY KEY (`warehouseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='产品库房设置表';

-- ----------------------------
-- Records of produce_warehouse
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `productId` int(10) NOT NULL AUTO_INCREMENT COMMENT '产品ID',
  `supplierId` int(8) DEFAULT NULL COMMENT '供应商ID',
  `warehouseId` int(10) DEFAULT NULL,
  `supplierIdExt` int(8) DEFAULT NULL COMMENT '辅助供应商',
  `barCode` varchar(100) DEFAULT NULL COMMENT '条形码',
  `qrCode` varchar(100) DEFAULT NULL COMMENT '二维码',
  `lg` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT '产品大类',
  `md` varchar(45) DEFAULT NULL COMMENT '产品中类\n',
  `xs` varchar(45) DEFAULT NULL COMMENT '产品小类\n',
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='产品表';

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('2', '2', null, '20', 'uploads/20161028153803537.png', 'uploads/20161028153806846.png', '1', null, null, '??????', 'sadfdfdf', '????', '3434dff', '????????????????', '', '', '0', '0', '34', '?????????????,???????????????????,??????', '0', '1212.21', '1212.21', '1212.21', '1212.21', '1212.21');
INSERT INTO `product` VALUES ('3', '2', null, '20', 'uploads/20161028154502348.png', 'uploads/20161028154504427.png', null, null, '1', '的发生的地方', 'sadfdfdf', '对方答复', '3434dff', '*简要规格*简要规格*简要规格*简要规格', '', '', '0', '0', '34', '对该产品使用方法的说明,以及对该对该产品使用方法的说明,以及对该对该产品使用方法的说明,以及对该', '0', '1212.21', '1212.21', '1212.21', '1212.21', '1212.21');

-- ----------------------------
-- Table structure for purchase
-- ----------------------------
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `purchaseId` int(10) NOT NULL AUTO_INCREMENT COMMENT '进货单ID',
  `supplierId` int(10) DEFAULT NULL COMMENT '供应商ID',
  `purchasecol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`purchaseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase
-- ----------------------------

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
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
  `priceTax` int(8) DEFAULT NULL COMMENT '结算价格（含税）',
  `priceNoTax` int(8) DEFAULT NULL,
  `account` varchar(45) DEFAULT NULL COMMENT '帐户信息',
  `deliveryIs` tinyint(1) DEFAULT NULL COMMENT '是否送货',
  `signIs` tinyint(1) DEFAULT NULL COMMENT '是否签协',
  `returnRequirements` varchar(255) DEFAULT NULL COMMENT '退换货要求',
  `contractDate` char(10) DEFAULT NULL COMMENT '合同到期日',
  `contractBriefing` varchar(255) DEFAULT NULL COMMENT '合同简报',
  `credit` varchar(45) DEFAULT NULL COMMENT '授信额度',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='供应商表';

-- ----------------------------
-- Records of supplier
-- ----------------------------

-- ----------------------------
-- Table structure for supplier_contact
-- ----------------------------
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

-- ----------------------------
-- Records of supplier_contact
-- ----------------------------

-- ----------------------------
-- Table structure for supplier_record
-- ----------------------------
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

-- ----------------------------
-- Records of supplier_record
-- ----------------------------
