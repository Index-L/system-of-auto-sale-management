/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80015
 Source Host           : localhost:3306
 Source Schema         : car

 Target Server Type    : MySQL
 Target Server Version : 80015
 File Encoding         : 65001

 Date: 15/04/2019 18:04:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cardetail
-- ----------------------------
DROP TABLE IF EXISTS `cardetail`;
CREATE TABLE `cardetail`  (
  `CarTypeId` int(11) NOT NULL,
  `CarLine` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CarType` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ReleaseTime` year NULL DEFAULT NULL,
  `Displacement` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AutoGrade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Body` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `GearBox` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `MarketPrice` decimal(10, 2) NULL DEFAULT NULL,
  `IsForSale` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`CarTypeId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cardetail
-- ----------------------------
INSERT INTO `cardetail` VALUES (2019001001, 'A3', 'Limousine 35TFSI 时尚型', 2019, '1.4T', '紧凑型车', '三厢车', '7档双离合', 22.41, 1);
INSERT INTO `cardetail` VALUES (2019001002, 'A3', 'Limousine 35TFSI 运动型', 2019, '1.4T', '紧凑型车', '三厢车', '7档双离合', 23.27, 1);
INSERT INTO `cardetail` VALUES (2019001003, 'A3', 'Limousine 35TFSI 进取型', 2019, '1.4T', '紧凑型车', '三厢车', '7档双离合', 19.46, 1);
INSERT INTO `cardetail` VALUES (2019001004, 'A3', 'Limousine 35TFSI 风尚型', 2019, '1.4T', '紧凑型车', '三厢车', '7档双离合', 21.28, 1);
INSERT INTO `cardetail` VALUES (2019001005, 'A3', 'Sportback 35 TFSI 时尚型', 2019, '1.4T', '紧凑型车', '两厢车', '7档双离合', 21.28, 1);
INSERT INTO `cardetail` VALUES (2019001006, 'A3', 'Sportback 35 TFSI 运动型', 2019, '1.4T', '紧凑型车', '两厢车', '7档双离合', 22.67, 1);
INSERT INTO `cardetail` VALUES (2019001007, 'A3', 'Sportback 35 TFSI 进取型', 2019, '1.4T', '紧凑型车', '两厢车', '7档双离合', 18.86, 1);
INSERT INTO `cardetail` VALUES (2019001010, 'A3', 'Sportback 35 TFSI 进取型', 2019, '1.4T', '紧凑型车', '两厢车', '7档双离合', 22.67, 1);
INSERT INTO `cardetail` VALUES (2019001011, 'A3', 'Limousine 40 TFSI 运动型', 2019, '2.0T', '紧凑型车', '三厢车', '7档双离合', 25.09, 1);
INSERT INTO `cardetail` VALUES (2019001012, 'A3', 'Limousine 40 TFSI 风尚型', 2019, '2.0T', '紧凑型车', '三厢车', '7档双离合', 25.09, 1);
INSERT INTO `cardetail` VALUES (2019001013, 'A3', 'Sportback 40 TFSI 运动型', 2019, '2.0T', '紧凑型车', '两厢车', '7档双离合', 24.55, 1);
INSERT INTO `cardetail` VALUES (2019001014, 'A3', 'Sportback 40 TFSI 风尚型', 2019, '2.0T', '紧凑型车', '两厢车', '7档双离合', 24.55, 1);
INSERT INTO `cardetail` VALUES (2019002001, 'A4', '35 TFSI 进取型', 2019, '1.4T', '中型车', '三厢车', '7档双离合', 28.68, 1);
INSERT INTO `cardetail` VALUES (2019002002, 'A4', '30周年年型 30 TFSI 进取型', 2018, '1.4T', '中型车', '三厢车', '7档双离合', 29.00, 1);
INSERT INTO `cardetail` VALUES (2019002003, 'A4', '40 TFSI 进取型', 2019, '2.0T', '中型车', '三厢车', '7档双离合', 33.58, 1);
INSERT INTO `cardetail` VALUES (2019002004, 'A4', '40 TFSI 时尚型', 2019, '2.0T', '中型车', '三厢车', '7档双离合', 33.58, 1);
INSERT INTO `cardetail` VALUES (2019002005, 'A4', '40 TFSI 运动型', 2019, '2.0T', '中型车', '三厢车', '7档双离合', 36.28, 1);
INSERT INTO `cardetail` VALUES (2019002006, 'A4', '30周年年型 40 TFSI 时尚型', 2018, '2.0T', '中型车', '三厢车', '7档双离合', 34.29, 1);
INSERT INTO `cardetail` VALUES (2019002007, 'A4', '30周年年型 40 TFSI 运动型', 2018, '2.0T', '中型车', '三厢车', '7档双离合', 36.70, 1);
INSERT INTO `cardetail` VALUES (2019002008, 'A4', '30周年年型 40 TFSI 进取型', 2018, '2.0T', '中型车', '三厢车', '7档双离合', 30.70, 1);
INSERT INTO `cardetail` VALUES (2019002009, 'A4', '45 TFSI quattro 个性运动版', 2019, '2.0T', '中型车', '三厢车', '7档双离合', 36.28, 1);
INSERT INTO `cardetail` VALUES (2019002010, 'A4', '45 TFSI quattro 运动型', 2019, '2.0T', '中型车', '三厢车', '7档双离合', 40.18, 1);
INSERT INTO `cardetail` VALUES (2019002011, 'A4', '30周年年型 45 TFSI quattro 个性运动版', 2018, '2.0T', '中型车', '三厢车', '7档双离合', 36.70, 1);
INSERT INTO `cardetail` VALUES (2019002012, 'A4', '30周年年型 45 TFSI quattro 运动型', 2018, '2.0T', '中型车', '三厢车', '7档双离合', 40.70, 1);
INSERT INTO `cardetail` VALUES (2019003001, 'A6L', '40TFSI 豪华动感型', 2019, '2.0T', '中大型车', '三厢车', '7档双离合', 40.98, 1);
INSERT INTO `cardetail` VALUES (2019003002, 'A6L', '40TFSI 豪华致雅型', 2019, '2.0T', '中大型车', '三厢车', '7档双离合', 40.98, 1);
INSERT INTO `cardetail` VALUES (2019003003, 'A6L', '45TFSI quattro 尊享动感型', 2019, '2.0T', '中大型车', '三厢车', '7档双离合', 50.68, 1);
INSERT INTO `cardetail` VALUES (2019003004, 'A6L', '45TFSI quattro 臻选动感型', 2019, '2.0T', '中大型车', '三厢车', '7档双离合', 46.38, 1);
INSERT INTO `cardetail` VALUES (2019003005, 'A6L', '45TFSI 臻选动感型', 2019, '2.0T', '中大型车', '三厢车', '7档双离合', 43.38, 1);
INSERT INTO `cardetail` VALUES (2019003006, 'A6L', '55TFSI quattro 尊享动感型', 2019, '3.0T', '中大型车', '三厢车', '7档双离合', 54.18, 1);
INSERT INTO `cardetail` VALUES (2019003007, 'A6L', '55TFSI quattro 旗舰动感型', 2019, '3.0T', '中大型车', '三厢车', '7档双离合', 65.08, 1);
INSERT INTO `cardetail` VALUES (2019004001, 'Q3', '30 TFSI 时尚型典藏版', 2019, '1.4T', '紧凑型SUV', 'SUV', '6挡双离合', 26.00, 1);
INSERT INTO `cardetail` VALUES (2019004002, 'Q3', '30 TFSI 风尚型典藏版', 2019, '1.4T', '紧凑型SUV', 'SUV', '6挡双离合', 28.28, 1);
INSERT INTO `cardetail` VALUES (2019004003, 'Q3', '30周年年型 30 TFSI 时尚型', 2018, '1.4T', '紧凑型SUV', 'SUV', '6挡双离合', 26.56, 1);
INSERT INTO `cardetail` VALUES (2019004004, 'Q3', '30周年年型 30 TFSI 标准型', 2018, '1.4T', '紧凑型SUV', 'SUV', '6挡双离合', 24.69, 1);
INSERT INTO `cardetail` VALUES (2019004005, 'Q3', '30周年年型 30 TFSI 风尚型', 2018, '1.4T', '紧凑型SUV', 'SUV', '6挡双离合', 28.87, 1);
INSERT INTO `cardetail` VALUES (2019004006, 'Q3', '35 TFSI 时尚型典藏版', 2019, '2.0T', '紧凑型SUV', 'SUV', '7档双离合', 27.98, 1);
INSERT INTO `cardetail` VALUES (2019004007, 'Q3', '35 TFSI 运动型典藏版', 2019, '2.0T', '紧凑型SUV', 'SUV', '7档双离合', 30.16, 1);
INSERT INTO `cardetail` VALUES (2019004008, 'Q3', '30周年年型 35 TFSI quattro 全时四驱运动型', 2018, '2.0T', '紧凑型SUV', 'SUV', '7档双离合', 32.57, 1);
INSERT INTO `cardetail` VALUES (2019004009, 'Q3', '30周年年型 35 TFSI 时尚型', 2018, '2.0T', '紧凑型SUV', 'SUV', '7档双离合', 28.56, 1);
INSERT INTO `cardetail` VALUES (2019004010, 'Q3', '30周年年型 35 TFSI 运动型', 2018, '2.0T', '紧凑型SUV', 'SUV', '7档双离合', 30.87, 1);
INSERT INTO `cardetail` VALUES (2019004011, 'Q3', '30周年年型 40 TFSI quattro 全时四驱运动型', 2018, '2.0T', '紧凑型SUV', 'SUV', '7档双离合', 34.07, 1);
INSERT INTO `cardetail` VALUES (2019005001, 'Q5', '典藏版 40 TFSI quattro 技术型', 2018, '2.0T', '中型SUV', 'SUV', '8挡手自一体', 42.37, 1);
INSERT INTO `cardetail` VALUES (2019005002, 'Q5', '典藏版 40 TFSI quattro 进取型', 2018, '2.0T', '中型SUV', 'SUV', '8挡手自一体', 39.64, 1);
INSERT INTO `cardetail` VALUES (2019005003, 'Q5', 'Plus 40 TFSI quattro 动感型', 2017, '2.0T', '中型SUV', 'SUV', '8挡手自一体', 50.51, 1);
INSERT INTO `cardetail` VALUES (2019005004, 'Q5', 'Plus 40 TFSI quattro 技术型', 2017, '2.0T', '中型SUV', 'SUV', '8挡手自一体', 42.76, 1);
INSERT INTO `cardetail` VALUES (2019005005, 'Q5', 'Plus 40 TFSI quattro 舒适型', 2017, '2.0T', '中型SUV', 'SUV', '8挡手自一体', 47.09, 1);
INSERT INTO `cardetail` VALUES (2019005006, 'Q5', 'Plus 40 TFSI quattro 豪华型', 2017, '2.0T', '中型SUV', 'SUV', '8挡手自一体', 51.92, 1);
INSERT INTO `cardetail` VALUES (2019005007, 'Q5', 'Plus 40 TFSI quattro 进取型', 2017, '2.0T', '中型SUV', 'SUV', '8挡手自一体', 39.96, 1);
INSERT INTO `cardetail` VALUES (2019006001, 'Q5L', '40 TFSI 荣享时尚型', 2018, '2.0T', '中型SUV', 'SUV', '7挡双离合', 41.38, 1);
INSERT INTO `cardetail` VALUES (2019006002, 'Q5L', '40 TFSI 荣享进取型', 2018, '2.0T', '中型SUV', 'SUV', '7挡双离合', 38.28, 1);
INSERT INTO `cardetail` VALUES (2019006003, 'Q5L', '45 TFSI 尊享时尚型', 2018, '2.0T', '中型SUV', 'SUV', '7挡双离合', 44.52, 1);
INSERT INTO `cardetail` VALUES (2019006004, 'Q5L', '45 TFSI 尊享豪华运动型', 2018, '2.0T', '中型SUV', 'SUV', '7挡双离合', 49.80, 1);
INSERT INTO `cardetail` VALUES (2019006005, 'Q5L', '45 TFSI 尊享运动型', 2018, '2.0T', '中型SUV', 'SUV', '7挡双离合', 47.09, 1);
INSERT INTO `cardetail` VALUES (2019006006, 'Q5L', '45 TFSI 尊享风雅型', 2018, '2.0T', '中型SUV', 'SUV', '7挡双离合', 47.50, 1);

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `CustomerId` int(11) NOT NULL,
  `IDCard` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `C_LastName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `C_FirstName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `C_Phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `C_Gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `C_BirthDay` date NULL DEFAULT NULL,
  PRIMARY KEY (`CustomerId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (20130001, '110000197204164117', 'Sun', 'GuangXian', '北京市西城区景山前街4号', '18702257333 ', 'Male', '1972-04-16');
INSERT INTO `customer` VALUES (20130002, '110000198906164220', 'Zheng', 'QinAn', '北京市西城区景山前街5号', '15002284666 ', 'Male', '1989-06-16');
INSERT INTO `customer` VALUES (20130003, '110000197809052015', 'Huang', 'QiSheng', '北京市西城区景山前街6号', '18722394555 ', 'Male', '1978-09-05');
INSERT INTO `customer` VALUES (20130004, '110001199605071359', 'Wang', 'Fu', '北京市西城区景山前街7号', '15602059059', 'Female', '1996-05-07');
INSERT INTO `customer` VALUES (20130005, '110002199401065698', 'Li', 'QingYun', '北京市西城区景山前街8号', '13207512666 ', 'Male', '1994-01-06');
INSERT INTO `customer` VALUES (20130006, '110002198610235674', 'Cheng', 'LianZhen', '北京市西城区景山前街9号', '15602181878', 'Female', '1986-10-23');
INSERT INTO `customer` VALUES (20130007, '110002199012031325', 'Chen', 'XiLiang', '北京市西城区景山前街10号', '13072209995 ', 'Male', '1990-12-03');
INSERT INTO `customer` VALUES (20130008, '110006198310304256', 'Xiao', 'Xian', '北京市西城区景山前街11号', '15342193210 ', 'Female', '1983-10-30');
INSERT INTO `customer` VALUES (20130009, '110003197906061232', 'Zhang', 'PengHe', '北京市西城区景山前街12号', '15332059777', 'Male', '1979-06-06');

-- ----------------------------
-- Table structure for inventory
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory`  (
  `CarTypeId` int(11) NULL DEFAULT NULL,
  `VIN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EngineNo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `MFDate` date NULL DEFAULT NULL,
  `FacPrice` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`EngineNo`) USING BTREE,
  INDEX `CarTypePid`(`CarTypeId`) USING BTREE,
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`CarTypeId`) REFERENCES `cardetail` (`CarTypeId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventory
-- ----------------------------
INSERT INTO `inventory` VALUES (2019003004, 'LFV3A24F8K3124578', '233232', 'Purple', '2019-02-07', 41.23);
INSERT INTO `inventory` VALUES (2019006005, 'LFV3A28W8J3151511', '900126', 'Black', '2019-03-13', 43.02);
INSERT INTO `inventory` VALUES (2019006005, 'LFV3A28W8J3151512', '900127', 'Black', '2019-03-13', 43.02);
INSERT INTO `inventory` VALUES (2019006005, 'LFV3A28W8J3151513', '900128', 'Black', '2019-03-13', 43.02);
INSERT INTO `inventory` VALUES (2019006005, 'LFV3A28W8J3151514', '900129', 'Black', '2019-03-13', 43.02);

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale`  (
  `SaleId` int(11) NOT NULL,
  `CarTypeId` int(11) NULL DEFAULT NULL,
  `EngineNo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VIN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `StaffId` int(11) NULL DEFAULT NULL,
  `CustomerId` int(11) NULL DEFAULT NULL,
  `PurchaseTime` datetime(0) NULL DEFAULT NULL,
  `AucPrice` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`SaleId`) USING BTREE,
  INDEX `CarTypeId`(`CarTypeId`) USING BTREE,
  INDEX `StaffId`(`StaffId`) USING BTREE,
  INDEX `CustomerId`(`CustomerId`) USING BTREE,
  CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`CarTypeId`) REFERENCES `cardetail` (`CarTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`StaffId`) REFERENCES `staff` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`CustomerId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale
-- ----------------------------
INSERT INTO `sale` VALUES (654010001, 2019002010, '455652', 'LFV3A28K8K3721867', 301216006, 20130005, '2019-04-15 17:22:14', 42.15);
INSERT INTO `sale` VALUES (654010002, 2019006005, '900258', 'LFV3A28W8J3564262', 301216006, 20130008, '2019-04-14 17:34:52', 50.12);
INSERT INTO `sale` VALUES (654010003, 2019004011, '154522', 'LFV3A28T8J3541215', 301216001, 20130001, '2019-04-14 11:09:27', 36.28);
INSERT INTO `sale` VALUES (654010004, 2019003004, '233762', 'LFV3A24F8K3515125', 301216010, 20130007, '2019-04-15 17:35:14', 50.76);

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `StaffId` int(11) NOT NULL,
  `S_LastName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `S_FirstName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `S_Gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `S_BirthDay` date NULL DEFAULT NULL,
  `S_Phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Passwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`StaffId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES (301216001, 'Wang', 'EnMing', 'Male', '1973-06-27', '80886666', 'General Manager', '123456');
INSERT INTO `staff` VALUES (301216002, 'Shi', 'YiQun', 'Male', '1978-10-18', '81081685 ', 'Warehouse Keeper', '123457');
INSERT INTO `staff` VALUES (301216003, 'He', 'ShaoZhou', 'Male', '1986-10-29', '81011002 ', 'Salesman', '123458');
INSERT INTO `staff` VALUES (301216004, 'Zhang', 'DaoFan', 'Male', '1989-10-10', '86910992', 'Salesman', '123459');
INSERT INTO `staff` VALUES (301216005, 'Li', 'XingHua', 'Female', '1990-06-13', '88666886', 'Salesman', '123460');
INSERT INTO `staff` VALUES (301216006, 'Pu', 'AnXiu', 'Female', '1987-12-26', '83089992', 'Salesman', '123461');
INSERT INTO `staff` VALUES (301216007, 'Wang', 'MinTong', 'Female', '1993-11-17', '81012105 ', 'Salesman', '123462');
INSERT INTO `staff` VALUES (301216008, 'Pan', 'XianJian', 'Male', '1995-10-17', '82019125 ', 'Salesman', '123463');
INSERT INTO `staff` VALUES (301216009, 'Huang', 'PengNian', 'Male', '1992-06-08', '81991998 ', 'Salesman', '123464');
INSERT INTO `staff` VALUES (301216010, 'Li', 'DuanFen', 'Male', '1995-11-29', '82818925 ', 'Salesman', '123465');

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock`  (
  `StockId` int(11) NOT NULL,
  `CarTypeId` int(11) NULL DEFAULT NULL,
  `S_Num` int(11) NULL DEFAULT NULL,
  `S_Time` datetime(0) NULL DEFAULT NULL,
  `S_State` tinyint(4) NULL DEFAULT 1,
  `S_FTime` datetime(0) NULL DEFAULT NULL,
  `S_Remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`StockId`) USING BTREE,
  INDEX `CarTypeId`(`CarTypeId`) USING BTREE,
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`CarTypeId`) REFERENCES `cardetail` (`CarTypeId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES (9800001, 2019002010, 1, '2019-03-23 00:00:00', 0, '2019-04-13 17:12:18', 'Red：1');
INSERT INTO `stock` VALUES (9800002, 2019006005, 5, '2019-04-01 08:56:51', 0, '2019-04-13 17:12:25', 'Black：4；White：1');
INSERT INTO `stock` VALUES (9800003, 2019003004, 2, '2019-04-02 14:56:58', 0, '2019-04-13 17:12:32', 'Purple：2');
INSERT INTO `stock` VALUES (9800004, 2019003002, 2, NULL, 1, '2019-04-13 17:12:37', 'Blue：2');
INSERT INTO `stock` VALUES (9800005, 2019004011, 1, '2019-04-05 13:57:18', 0, '2019-04-13 17:12:40', 'Cyan:1');
INSERT INTO `stock` VALUES (9800006, 2019004005, 4, NULL, 1, '2019-04-13 17:12:45', 'Gray：4');
INSERT INTO `stock` VALUES (9800007, 2019002006, 3, NULL, 1, '2019-04-13 17:12:50', 'Black：3');

-- ----------------------------
-- Triggers structure for table sale
-- ----------------------------
DROP TRIGGER IF EXISTS `Trigger1`;
delimiter ;;
CREATE TRIGGER `Trigger1` AFTER INSERT ON `sale` FOR EACH ROW DELETE FROM inventory WHERE EngineNo = new.EngineNo
;
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
