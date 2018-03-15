/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : db_medical

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2018-01-01 19:05:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for doctor_credentials
-- ----------------------------
DROP TABLE IF EXISTS `doctor_credentials`;
CREATE TABLE `doctor_credentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `location_details` varchar(255) DEFAULT NULL,
  `new_patient_fee` double(5,0) DEFAULT NULL,
  `returning_patient_fee` float(5,0) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of doctor_credentials
-- ----------------------------
INSERT INTO `doctor_credentials` VALUES ('1', '2', '3', '1', 'Monipuri Para', '1234', '12', '23.761733396515105', '90.38575744314585');
