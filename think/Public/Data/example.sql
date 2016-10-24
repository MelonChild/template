/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : example

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-10-20 23:06:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `access`
-- ----------------------------
DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  KEY `groupId` (`role_id`) USING BTREE,
  KEY `nodeId` (`node_id`) USING BTREE,
  CONSTRAINT `access_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `access_ibfk_2` FOREIGN KEY (`node_id`) REFERENCES `nodes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of access
-- ----------------------------

-- ----------------------------
-- Table structure for `backmenu`
-- ----------------------------
DROP TABLE IF EXISTS `backmenu`;
CREATE TABLE `backmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '菜单名',
  `pid` int(11) unsigned NOT NULL COMMENT '菜单类型',
  `sort` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1隐藏',
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '菜单颜色',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '菜单图片',
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1失效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backmenu
-- ----------------------------
INSERT INTO `backmenu` VALUES ('1', '首页', '0', '1', 'Index/index', '0', 'color_4', 'dashboard.png', '0');
INSERT INTO `backmenu` VALUES ('2', '后台链接配置', '0', '2', 'Backmenu/index', '0', 'color_7', 'forms.png', '0');
INSERT INTO `backmenu` VALUES ('3', '链接添加', '2', '0', 'Backmenu/add', '0', 'color_2', 'dashboard.png', '0');
INSERT INTO `backmenu` VALUES ('4', '链接列表', '2', '2', 'Backmenu/index', '0', 'color_1', 'dashboard.png', '0');

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(255) DEFAULT NULL COMMENT '颜色或图标',
  `type` int(11) DEFAULT '1' COMMENT '1颜色2图标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', 'color_1', '1');
INSERT INTO `class` VALUES ('2', 'color_2', '1');
INSERT INTO `class` VALUES ('3', 'color_3', '1');
INSERT INTO `class` VALUES ('4', 'color_4', '1');
INSERT INTO `class` VALUES ('5', 'color_5', '1');
INSERT INTO `class` VALUES ('6', 'color_6', '1');
INSERT INTO `class` VALUES ('7', 'color_7', '1');
INSERT INTO `class` VALUES ('8', 'color_8', '1');
INSERT INTO `class` VALUES ('9', 'color_9', '1');
INSERT INTO `class` VALUES ('10', 'color_10', '1');
INSERT INTO `class` VALUES ('11', 'color_11', '1');
INSERT INTO `class` VALUES ('12', 'color_12', '1');
INSERT INTO `class` VALUES ('13', 'color_13', '1');
INSERT INTO `class` VALUES ('14', 'color_14', '1');
INSERT INTO `class` VALUES ('15', 'color_15', '1');
INSERT INTO `class` VALUES ('16', 'color_16', '1');
INSERT INTO `class` VALUES ('17', 'color_17', '1');
INSERT INTO `class` VALUES ('18', 'color_18', '1');
INSERT INTO `class` VALUES ('19', 'color_19', '1');
INSERT INTO `class` VALUES ('20', 'color_20', '1');
INSERT INTO `class` VALUES ('21', 'color_21', '1');
INSERT INTO `class` VALUES ('22', 'color_22', '1');
INSERT INTO `class` VALUES ('23', 'color_23', '1');
INSERT INTO `class` VALUES ('24', 'color_24', '1');
INSERT INTO `class` VALUES ('25', 'color_25', '1');
INSERT INTO `class` VALUES ('26', 'color_26', '1');
INSERT INTO `class` VALUES ('27', 'color_27', '1');
INSERT INTO `class` VALUES ('28', 'color_0', '1');
INSERT INTO `class` VALUES ('29', 'dashboard.png', '2');
INSERT INTO `class` VALUES ('30', 'forms.png', '2');
INSERT INTO `class` VALUES ('31', 'widgets.png', '2');
INSERT INTO `class` VALUES ('32', 'calendar.png', '2');
INSERT INTO `class` VALUES ('33', 'maps.png', '2');
INSERT INTO `class` VALUES ('34', 'tables.png', '2');
INSERT INTO `class` VALUES ('35', 'statistics.png', '2');
INSERT INTO `class` VALUES ('36', 'grid.png', '2');
INSERT INTO `class` VALUES ('37', 'gallery.png', '2');
INSERT INTO `class` VALUES ('38', 'explorer.png', '2');
INSERT INTO `class` VALUES ('39', 'others.png', '2');

-- ----------------------------
-- Table structure for `nodes`
-- ----------------------------
DROP TABLE IF EXISTS `nodes`;
CREATE TABLE `nodes` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nodes
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `bakmenu_ids` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for `roles_users`
-- ----------------------------
DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE `roles_users` (
  `role_id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `group_id` (`role_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles_users
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户表id',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `qq` varchar(55) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `logins` int(11) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `super` tinyint(1) DEFAULT NULL COMMENT '0: 普通管理员  1：超级管理员',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '0:禁用 1：正常',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '23b959dab5b0be5a5b58a8bb0fbb73b3', null, null, null, '14', '1476973268', null, '1', null);

-- ----------------------------
-- Table structure for `web`
-- ----------------------------
DROP TABLE IF EXISTS `web`;
CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `webname` varchar(255) DEFAULT NULL COMMENT '网站名称',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `telphone` varchar(55) DEFAULT NULL COMMENT '联系电话',
  `copyright` varchar(255) DEFAULT NULL COMMENT '版权信息',
  `logo` varchar(255) DEFAULT NULL COMMENT '网站logo',
  `qq_name1` varchar(255) DEFAULT NULL,
  `qq1` varchar(255) DEFAULT NULL,
  `qq_name2` varchar(255) DEFAULT NULL,
  `qq2` varchar(255) DEFAULT NULL,
  `qq_name3` varchar(255) DEFAULT NULL,
  `qq3` varchar(255) DEFAULT NULL,
  `level1` float(11,2) DEFAULT '0.00' COMMENT '一级奖励百分比',
  `level2` float(11,2) DEFAULT '0.00' COMMENT '二级奖励百分比',
  `level3` float(11,2) DEFAULT '0.00' COMMENT '三级奖励百分比',
  `sms_sid` varchar(255) DEFAULT NULL COMMENT '短信sid',
  `sms_token` varchar(255) DEFAULT NULL COMMENT '短信token',
  `sms_appid` varchar(255) DEFAULT NULL COMMENT '短信appid',
  `sms_temp` varchar(255) DEFAULT NULL COMMENT '短信模板id',
  `domain` varchar(255) DEFAULT NULL COMMENT '域名',
  `wxh` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web
-- ----------------------------
