/*
MySQL Data Transfer
Source Host: localhost
Source Database: realmd
Target Host: localhost
Target Database: realmd
Date: 15.03.2013 19:27:55
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for voting
-- ----------------------------
DROP TABLE IF EXISTS `voting`;
CREATE TABLE `voting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `acc_id` int(255) NOT NULL,
  `vote_time_1` timestamp NULL DEFAULT NULL,
  `vote_time_2` timestamp NULL DEFAULT NULL,
  `vote_time_3` timestamp NULL DEFAULT NULL,
  `vote_time_4` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records 
-- ----------------------------
