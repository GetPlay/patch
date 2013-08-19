/*
Navicat MySQL Data Transfer

Source Server         : 123
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : website

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2013-08-18 21:48:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL DEFAULT '1337',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) unsigned DEFAULT NULL COMMENT 'Account ID',
  `country` varchar(50) DEFAULT NULL COMMENT 'The Country of Residence',
  `date` date DEFAULT NULL COMMENT 'Date of Birth',
  `year` year(4) DEFAULT NULL COMMENT 'Year of Birth',
  `security_question` char(4) DEFAULT NULL COMMENT 'Security Question from the Registration',
  `answer` varchar(50) DEFAULT NULL COMMENT 'Answer of the Security Question',
  `name` varchar(50) DEFAULT NULL COMMENT 'User''s Name',
  `lastname` varchar(50) DEFAULT NULL COMMENT 'User''s Last Name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for `forum_blizzposts`
-- ----------------------------
DROP TABLE IF EXISTS `forum_blizzposts`;
CREATE TABLE `forum_blizzposts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `postid` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of forum_blizzposts
-- ----------------------------
INSERT INTO `forum_blizzposts` VALUES ('1', '1', '1', '1', '2013-05-27 18:53:48');

-- ----------------------------
-- Table structure for `forum_categ`
-- ----------------------------
DROP TABLE IF EXISTS `forum_categ`;
CREATE TABLE `forum_categ` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of forum_categ
-- ----------------------------
INSERT INTO `forum_categ` VALUES ('1', '1', 'Поддержка');
INSERT INTO `forum_categ` VALUES ('2', '2', 'Баг - Трекер');
INSERT INTO `forum_categ` VALUES ('3', '4', 'Сообщество');
INSERT INTO `forum_categ` VALUES ('4', '5', 'Игровой процесс');
INSERT INTO `forum_categ` VALUES ('5', '6', 'Корзина');
INSERT INTO `forum_categ` VALUES ('6', '3', 'Раздел серверов');

-- ----------------------------
-- Table structure for `forum_forums`
-- ----------------------------
DROP TABLE IF EXISTS `forum_forums`;
CREATE TABLE `forum_forums` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) NOT NULL,
  `categ` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` text,
  `locked` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of forum_forums
-- ----------------------------
INSERT INTO `forum_forums` VALUES ('7', '1', '1', 'Служба поддержки', 'cs', 'Форум, предназначенный для вопросов службам поддержки и обсуждения проблем, связанных с игрой или учетными записями.', '0');
INSERT INTO `forum_forums` VALUES ('8', '2', '1', 'Техническая поддержка', 'tsupport', 'Помощь в устранении технических проблем с установкой Wolrd of Warcraft, соеденением с мирами и зависанием игры.', '0');
INSERT INTO `forum_forums` VALUES ('9', '3', '1', 'Состояние игровых миров [Только чтение]', 'blizzard', 'Собрание важных сообщений о статусе игровых миров', '1');
INSERT INTO `forum_forums` VALUES ('10', '1', '2', 'Баги веб ресурсов', 'wwi', 'В этот раздел пишем о багах на сайте, форуме и личном кабинете.', '0');
INSERT INTO `forum_forums` VALUES ('11', '2', '2', 'Таланты и спелы', 'realm-pvp', 'В этот раздел пишем о багах в системе телантов и спелов.', '0');
INSERT INTO `forum_forums` VALUES ('12', '3', '2', 'Остальное', 'bugs', 'В этот раздел пишем об остальных багах и недочетах, не походящих к другим разделам', '0');
INSERT INTO `forum_forums` VALUES ('13', '1', '5', 'Корзина', 'bullet', 'Старые, неактуальные тему будут переноситься сюда', '1');
INSERT INTO `forum_forums` VALUES ('14', '1', '3', 'Гильдии, отличившиеся рейды и т.д.', 'guildrelations', 'Поделитесь своими советами и узнайте все самое захватывающее от гильдий и отличившихся рейд-лидеров', '0');
INSERT INTO `forum_forums` VALUES ('15', '2', '3', 'Поиск игроков (PvE)', 'battlegroup', 'Место встречи для тех, кто ищет гильдию, рейд или напарника/группу для PvE', '0');
INSERT INTO `forum_forums` VALUES ('16', '3', '3', 'Поиск игроков', 'dps', 'Хотите испытать себя на поле боя или Арене? Здесь вы можете найти себе комманду.', '0');
INSERT INTO `forum_forums` VALUES ('17', '1', '4', 'Помощь новичкам', 'newplayers', 'Чувствуете себя новичком? Не беда! Здесь вам подскажут выход из ситуации', '0');
INSERT INTO `forum_forums` VALUES ('18', '2', '4', 'Задания', 'cs', 'Застряли в ходе выполнения заданий? Тогда вам сюда!', '0');
INSERT INTO `forum_forums` VALUES ('19', '3', '4', 'Профессии', 'professions', 'Раскройте секреты Мастеров ремесел, а так же поделитесь опытом с другими!', '0');
INSERT INTO `forum_forums` VALUES ('20', '4', '4', 'Достижения', 'guides', 'Одни пытаются добиться всего и сразу, а другие усердно работают на д получением самых сложных достижений.', '0');
INSERT INTO `forum_forums` VALUES ('21', '5', '4', 'История', 'localisation', 'Узнайте все об истории Азерота и мире World of Warcraft!', '0');
INSERT INTO `forum_forums` VALUES ('22', '7', '4', 'Общий раздел', 'bullet', 'Не можете найти подходящий раздел для обсуждения игры? Добро пожаловать сюда!', '0');
INSERT INTO `forum_forums` VALUES ('23', '6', '4', 'Интерфейс, макросы и аддоны', 'uicustomizations', 'Пытаетесь настроить макросы, аддоны или изменить пользовательский интерфейс? Загляните сюда.', '0');
INSERT INTO `forum_forums` VALUES ('24', '1', '6', 'Игровой мир WotLK', 'wrath', 'Раздел для обсуждений игрового мира WotLK.', '0');
INSERT INTO `forum_forums` VALUES ('25', '2', '6', 'Игровой мир Cataclysm', 'cataclysm', 'Раздел дял обсуждения игрового мира Cataclysm', '0');
INSERT INTO `forum_forums` VALUES ('26', '3', '6', 'Нарушители', 'heal', 'Раздел для злостных нарушителей проекта.', '0');

-- ----------------------------
-- Table structure for `forum_posts`
-- ----------------------------
DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE `forum_posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL DEFAULT '0',
  `postid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of forum_posts
-- ----------------------------
INSERT INTO `forum_posts` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for `forum_replies`
-- ----------------------------
DROP TABLE IF EXISTS `forum_replies`;
CREATE TABLE `forum_replies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `threadid` int(10) NOT NULL,
  `content` text NOT NULL,
  `author` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `edited` int(1) NOT NULL DEFAULT '0',
  `editedby` int(10) NOT NULL DEFAULT '0',
  `last_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of forum_replies
-- ----------------------------

-- ----------------------------
-- Table structure for `forum_threads`
-- ----------------------------
DROP TABLE IF EXISTS `forum_threads`;
CREATE TABLE `forum_threads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` int(10) NOT NULL,
  `replies` int(10) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `locked` tinyint(1) DEFAULT '0',
  `has_blizz` tinyint(1) DEFAULT '0',
  `prefix` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'none',
  `last_date` datetime NOT NULL,
  `edited` int(1) NOT NULL DEFAULT '0',
  `editedby` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of forum_threads
-- ----------------------------
INSERT INTO `forum_threads` VALUES ('1', '8', 'Читать', '1', '0', '19', '2013-05-27 11:01:36', 'Сообщения Blizz заполнять необходимо в ручную!', '1', '1', 'none', '2013-05-27 11:01:36', '1', '2');

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `txn_id` varchar(32) DEFAULT NULL,
  `payer_email` varchar(64) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `info` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for `media`
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_url` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '0' COMMENT 'Just Youtube Videos',
  `title` text,
  `description` text,
  `comments` int(10) DEFAULT '0',
  `link` varchar(255) CHARACTER SET latin1 DEFAULT '#',
  `visible` int(2) NOT NULL DEFAULT '0',
  `type` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '0 video - 1 wallpapapers - 2 screenshots - 3 artwork - 4 comics',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES ('1', '0', '2013-04-20 23:39:49', '-E5M3X-1KP0', 'CATACLYSM (Español - España) - World of Warcraft', 'Trailer of the third World of Warcraft Expansion.</br>This expansion supouse a big change for Azeroth, all the known world will change and the Deathwing`s rage will change the curse of the life.', '1', 'http://www.youtube.com/watch?v=-E5M3X-1KP0', '1', '0');
INSERT INTO `media` VALUES ('2', '0', '2012-03-12 01:59:00', 'CARC72zF7UI', 'World of Warcraft - Cinemáticas', 'Normal Video', '0', 'http://www.youtube.com/watch?v=CARC72zF7UI', '1', '0');
INSERT INTO `media` VALUES ('3', '0', '2012-03-12 01:59:00', 'dYK_Gqyf48Y', 'World of Warcraft - Cinematic Trailer', 'Some Trailers', '0', 'http://www.youtube.com/watch?v=dYK_Gqyf48Y', '1', '0');
INSERT INTO `media` VALUES ('4', '0', '2012-03-12 01:59:00', 'IBHL_-biMrQ', 'World of Warcraft: The Burning Crusade', 'TBC Trailer', '0', 'http://www.youtube.com/watch?v=IBHL_-biMrQ', '1', '0');

-- ----------------------------
-- Table structure for `media_comments`
-- ----------------------------
DROP TABLE IF EXISTS `media_comments`;
CREATE TABLE `media_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mediaid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of media_comments
-- ----------------------------

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(255) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `content1` text,
  `content2` text,
  `contentlnk` text CHARACTER SET latin1,
  `title` text,
  `comments` int(10) DEFAULT '0',
  `image` varchar(255) CHARACTER SET latin1 DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '1', '2013-08-10 08:43:34', 'test', 'Test', '127.0.0.1/services.php', 'TeSt', '0', '4.3');

-- ----------------------------
-- Table structure for `prices`
-- ----------------------------
DROP TABLE IF EXISTS `prices`;
CREATE TABLE `prices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'vote',
  `vp` int(10) DEFAULT '0',
  `dp` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prices
-- ----------------------------
INSERT INTO `prices` VALUES ('1', 'name-change', 'vote', '1', '0');
INSERT INTO `prices` VALUES ('2', 'race-change', 'vote', '1', '0');
INSERT INTO `prices` VALUES ('3', 'appear-change', 'vote', '1', '1');
INSERT INTO `prices` VALUES ('4', 'faction-change', 'vote', '1', '1');
INSERT INTO `prices` VALUES ('5', 'vost_char', 'vote', '2', '2');

-- ----------------------------
-- Table structure for `realms`
-- ----------------------------
DROP TABLE IF EXISTS `realms`;
CREATE TABLE `realms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `realmid` int(10) DEFAULT NULL,
  `world_db` varchar(255) NOT NULL DEFAULT 'world',
  `char_db` varchar(255) NOT NULL DEFAULT 'characters',
  `version` varchar(15) NOT NULL DEFAULT '4.0.6a',
  `drop_rate` varchar(5) NOT NULL DEFAULT 'x1',
  `exp_rate` varchar(5) NOT NULL DEFAULT 'x1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of realms
-- ----------------------------
INSERT INTO `realms` VALUES ('1', '1', 'world', 'characters', '4.0.6a', 'x1', 'x1');

-- ----------------------------
-- Table structure for `rewards`
-- ----------------------------
DROP TABLE IF EXISTS `rewards`;
CREATE TABLE `rewards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `server` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `item1` int(10) unsigned NOT NULL,
  `item2` int(10) unsigned NOT NULL,
  `item3` int(10) unsigned NOT NULL,
  `item4` int(10) unsigned NOT NULL,
  `item5` int(10) unsigned NOT NULL,
  `item6` int(10) unsigned NOT NULL,
  `item7` int(10) unsigned NOT NULL,
  `item8` int(10) unsigned NOT NULL,
  `gold` int(10) unsigned NOT NULL,
  `price` float unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rewards
-- ----------------------------

-- ----------------------------
-- Table structure for `servers`
-- ----------------------------
DROP TABLE IF EXISTS `servers`;
CREATE TABLE `servers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `host` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `database` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of servers
-- ---------------------------- 

-- ----------------------------
-- Table structure for `shouts`
-- ----------------------------
DROP TABLE IF EXISTS `shouts`;
CREATE TABLE `shouts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `body` longtext,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shouts
-- ---------------------------- 

-- ----------------------------
-- Table structure for `slideshows`
-- ----------------------------
DROP TABLE IF EXISTS `slideshows`;
CREATE TABLE `slideshows` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `link` varchar(255) CHARACTER SET latin1 DEFAULT '#',
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slideshows
-- ----------------------------
INSERT INTO `slideshows` VALUES ('1', 'Title1', 'test1', '100.jpg', '', '0000-00-00');
INSERT INTO `slideshows` VALUES ('2', 'Title2', 'Description2', 'draenei.jpg', '#', '0000-00-00');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '0-0.jpg',
  `blizz` tinyint(1) DEFAULT '0',
  `class` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `character` int(10) NOT NULL DEFAULT '0',
  `vote_points` int(10) NOT NULL DEFAULT '0',
  `donation_points` int(10) NOT NULL DEFAULT '0',
  `char_realm` int(10) NOT NULL DEFAULT '1',
  `registerIp` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '0-0-0-0',
  `country` varchar(20) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `quest1` int(2) NOT NULL DEFAULT '0',
  `ans1` varchar(50) NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------  

-- ----------------------------
-- Table structure for `version`
-- ----------------------------
DROP TABLE IF EXISTS `version`;
CREATE TABLE `version` (
  `Name` text,
  `Number` varchar(10) DEFAULT NULL,
  `Revision` varchar(10) DEFAULT NULL,
  `DB_Version` varchar(50) DEFAULT NULL,
  `Updates` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of WoWFailureCMS you have.';

-- ----------------------------
-- Records of version
-- ----------------------------
INSERT INTO `version` VALUES ('AquaFlameCMS', 'v6', '192', 'v6', '0');

-- ----------------------------
-- Table structure for `vote`
-- ----------------------------
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `ID` int(10) DEFAULT NULL COMMENT 'ID has to be from 1 to 5',
  `Name` varchar(50) DEFAULT NULL COMMENT 'This is the Name of the Voting Site.',
  `Link` text COMMENT 'It must have http:// to work properly',
  `Description` text COMMENT 'Add the Description for the Voting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

-- ----------------------------
-- Records of vote
-- ----------------------------

-- ----------------------------
-- Table structure for `votes`
-- ----------------------------
DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `voteid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of votes
-- ---------------------------- 
