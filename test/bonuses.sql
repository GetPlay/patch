/*
MySQL Data Transfer
Source Host: localhost
Source Database: realmd
Target Host: localhost
Target Database: realmd
Date: 15.03.2013 19:28:02
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bonuses
-- ----------------------------
DROP TABLE IF EXISTS `bonuses`;
CREATE TABLE `bonuses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bonus` int(255) NOT NULL,
  `account_id` int(255) NOT NULL,
  `our_purse` varchar(255) NOT NULL,
  `donate_wm` double(255,0) NOT NULL,
  `donate_purse` varchar(255) NOT NULL,
  `donate_date` varchar(255) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records 
-- ----------------------------
