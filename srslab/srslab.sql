/*
Navicat MySQL Data Transfer

Source Server         : eproject
Source Server Version : 50136
Source Host           : localhost:3306
Source Database       : srslab

Target Server Type    : MYSQL
Target Server Version : 50136
File Encoding         : 65001

Date: 2009-10-29 14:38:31
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `productlist`
-- ----------------------------
DROP TABLE IF EXISTS `productlist`;
CREATE TABLE `productlist` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(40) NOT NULL,
  `Company_Name` varchar(80) NOT NULL,
  `Details` longtext NOT NULL,
  `image` varchar(80) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productlist
-- ----------------------------
INSERT INTO `productlist` VALUES ('1', 'Fuse', 'companylogo/shurter.jpg', 'companydetails/fuse.txt', 'Images/fuse-24575.jpg'), ('2', 'SemiConductor Protection gStype', 'companylogo/ferraz-shawmut-L17272.jpg', 'companydetails/semiconductor.txt', 'Images/semiconductor.jpg'), ('5', 'Semiconductor surge arrester type 3', 'companylogo/littlefuse-L17136.gif', 'companydetails/semiconductor1.txt', 'Images/semiconductor-surge-arrester-type-3-134945.jpg'), ('6', 'Compact industrial Ethernet switch eks E', 'companylogo/eks-engel-L41250.gif', 'companydetails/switch.txt', 'images/compact-industrial-ethernet-switch-389281.jpg'), ('7', 'Optical fiber splice box', 'companylogo/eks.g\r\nif', 'companydetails/eks.txt', 'Images/optical-fiber-splice-box-369836.jpg'), ('8', '4 axis palletizing robot', 'companylogo/kuka-roboter-L17587.g\r\nif', 'companydetails/4axi.txt', 'Images/4-axis-palletizing-robot-139930.jpg'), ('9', 'Cast resin distribution transformer', 'companylogo/allis-electric-L15128.g\r\nif', 'companydetails/elis.txt', 'Images/cast-resin-distribution-transformer-221699.jpg'), ('10', 'AC electric motor', 'companylogo/dunkermotoren-gmbh-L14411.g\r\nif', 'companydetails/elec.txt', 'Images/ac-electric-motor-201657.jpg');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Product_ID` bigint(10) NOT NULL,
  `Testing_ID` bigint(12) NOT NULL,
  `Company_Name` varchar(40) NOT NULL,
  `Product_Name` varchar(40) NOT NULL,
  `Testing_Type` varchar(40) NOT NULL,
  `Status` varchar(80) NOT NULL,
  `Product_Comment` longtext NOT NULL,
  `Tester` varchar(30) NOT NULL,
  `Date_Entered` datetime NOT NULL,
  `Image` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1253124476', '125312447621', 'Qtel', 'Sim', 'Fast Testing', 'CPRI check', 'We want you to manufacture this product and deploy it to the public as soon a possible.	\r\n', 'Sieder', '2009-10-25 19:51:30', 'Uploads/nomi_sim_card_chip.jpg'), ('2', '1253120587', '125312058740', 'THERMOCOMPACT', 'Coated wire', 'Wire Testing', 'Manufactured', 'The expertise of Thermo technologies also applies to the high-tech wires field. Coated with precious metals, assembled in strands (wires made of extra-fine wires), these wires acquire exceptional resistance and pliability, tested and recommended by the most demanding sectors: telecommunications, electronics, space aeronautics, medicine…', 'Bee', '2009-10-26 01:12:10', 'Uploads/coated-wire-402571.jpg');
