/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : example

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-11-02 14:23:24
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
INSERT INTO `access` VALUES ('1', '1', '1');
INSERT INTO `access` VALUES ('1', '2', '2');
INSERT INTO `access` VALUES ('1', '5', '3');
INSERT INTO `access` VALUES ('1', '3', '2');
INSERT INTO `access` VALUES ('1', '6', '3');
INSERT INTO `access` VALUES ('1', '7', '3');
INSERT INTO `access` VALUES ('1', '8', '3');
INSERT INTO `access` VALUES ('1', '9', '3');
INSERT INTO `access` VALUES ('1', '4', '2');
INSERT INTO `access` VALUES ('1', '10', '3');
INSERT INTO `access` VALUES ('1', '11', '3');
INSERT INTO `access` VALUES ('1', '12', '3');
INSERT INTO `access` VALUES ('1', '13', '3');
INSERT INTO `access` VALUES ('1', '14', '3');
INSERT INTO `access` VALUES ('1', '15', '3');
INSERT INTO `access` VALUES ('1', '16', '3');
INSERT INTO `access` VALUES ('1', '17', '3');
INSERT INTO `access` VALUES ('1', '18', '3');
INSERT INTO `access` VALUES ('1', '19', '3');
INSERT INTO `access` VALUES ('1', '20', '3');
INSERT INTO `access` VALUES ('1', '21', '3');
INSERT INTO `access` VALUES ('1', '22', '3');
INSERT INTO `access` VALUES ('1', '23', '3');
INSERT INTO `access` VALUES ('1', '24', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backmenu
-- ----------------------------
INSERT INTO `backmenu` VALUES ('1', '首页', '0', '1', 'Index/index', '0', 'color_4', 'icon icon-home', '0');
INSERT INTO `backmenu` VALUES ('2', '后台链接配置', '0', '3', 'Backmenu/index', '0', 'color_7', 'icon icon-gear', '0');
INSERT INTO `backmenu` VALUES ('3', '链接添加', '2', '0', 'Backmenu/add', '0', 'color_2', 'dashboard.png', '0');
INSERT INTO `backmenu` VALUES ('4', '链接列表', '2', '2', 'Backmenu/index', '0', 'color_1', 'dashboard.png', '0');
INSERT INTO `backmenu` VALUES ('5', '权限管理', '0', '5', 'Rbac/index', '0', 'color_3', 'icon icon-user', '0');
INSERT INTO `backmenu` VALUES ('6', '用户列表', '5', '6', 'Rbac/user', '0', '', 'others.png', '0');
INSERT INTO `backmenu` VALUES ('7', '角色列表', '5', '7', 'Rbac/role', '0', null, '', '0');
INSERT INTO `backmenu` VALUES ('8', '节点列表', '5', '8', 'Rbac/node', '0', null, '', '0');
INSERT INTO `backmenu` VALUES ('13', '网站管理', '0', '10', 'Web/index', '0', 'color_6', 'icon icon-graph-pie', '0');

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(255) DEFAULT NULL COMMENT '颜色或图标',
  `type` int(11) DEFAULT '1' COMMENT '1颜色2图标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', 'icon-align-center', '1');
INSERT INTO `class` VALUES ('2', 'icon icon-gear', '1');
INSERT INTO `class` VALUES ('3', 'icon icon-view-thumb', '1');
INSERT INTO `class` VALUES ('4', 'icon icon-home', '1');
INSERT INTO `class` VALUES ('5', 'icon icon-user', '1');
INSERT INTO `class` VALUES ('6', 'entypo-vcard', '1');
INSERT INTO `class` VALUES ('7', 'entypo-rss', '1');
INSERT INTO `class` VALUES ('8', 'icon icon-help', '1');
INSERT INTO `class` VALUES ('9', 'icon icon-document', '1');
INSERT INTO `class` VALUES ('10', 'icon icon-graph-pie', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nodes
-- ----------------------------
INSERT INTO `nodes` VALUES ('1', 'Admin', '后台', '1', '后台', '1', '0', '1');
INSERT INTO `nodes` VALUES ('2', 'Index', '首页控制器', '1', '首页控制器', '2', '1', '2');
INSERT INTO `nodes` VALUES ('3', 'Backmenu', '后台菜单', '1', '后台菜单', '3', '1', '2');
INSERT INTO `nodes` VALUES ('4', 'Rbac', '权限管理', '1', '权限管理', '4', '1', '2');
INSERT INTO `nodes` VALUES ('5', 'index', '首页', '1', '首页', '5', '2', '3');
INSERT INTO `nodes` VALUES ('6', 'index', '列表', '1', '列表', '6', '3', '3');
INSERT INTO `nodes` VALUES ('7', 'add', '新增', '1', '新增菜单', '7', '3', '3');
INSERT INTO `nodes` VALUES ('8', 'edit', '编辑', '1', '编辑', '8', '3', '3');
INSERT INTO `nodes` VALUES ('9', 'delete', '删除', '1', '删除', '9', '3', '3');
INSERT INTO `nodes` VALUES ('10', 'user', '用户列表', '1', '用户列表', '9', '4', '3');
INSERT INTO `nodes` VALUES ('11', 'role', '角色管理', '1', '角色管理', '10', '4', '3');
INSERT INTO `nodes` VALUES ('12', 'node', '节点管理', '1', '节点管理', '11', '4', '3');
INSERT INTO `nodes` VALUES ('13', 'addNode', '添加节点', '1', null, '12', '4', '3');
INSERT INTO `nodes` VALUES ('14', 'addRole', '添加角色', '1', null, '13', '4', '3');
INSERT INTO `nodes` VALUES ('15', 'addUser', '添加用户', '1', null, '14', '4', '3');
INSERT INTO `nodes` VALUES ('16', 'editNode', '编辑节点', '1', null, '15', '4', '3');
INSERT INTO `nodes` VALUES ('17', 'editRole', '编辑角色', '1', null, '16', '4', '3');
INSERT INTO `nodes` VALUES ('18', 'editUser', '编辑用户', '1', null, '17', '4', '3');
INSERT INTO `nodes` VALUES ('19', 'access', '权限设置', '1', null, '18', '4', '3');
INSERT INTO `nodes` VALUES ('20', 'deleteNode', '删除节点', '1', null, '19', '4', '3');
INSERT INTO `nodes` VALUES ('21', 'deleteUser', '删除用户', '1', null, '20', '4', '3');
INSERT INTO `nodes` VALUES ('22', 'deleteRole', '删除角色', '1', null, '21', '4', '3');
INSERT INTO `nodes` VALUES ('23', 'setAccess', '设置权限', '1', null, '22', '4', '3');
INSERT INTO `nodes` VALUES ('24', 'setActive', '设置用户状态', '1', null, '23', '4', '3');

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
  `menu_ids` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', '超级管理员', null, '1', '超级管理员', '1-2-3-6-7-8');
INSERT INTO `roles` VALUES ('2', '管理员', null, '1', '管理员', null);

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
INSERT INTO `roles_users` VALUES ('1', '2');
INSERT INTO `roles_users` VALUES ('2', '3');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户表id',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `logins` int(11) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `super` tinyint(1) DEFAULT NULL COMMENT '0: 普通管理员  1：超级管理员',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '0:禁用 1：正常',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '23b959dab5b0be5a5b58a8bb0fbb73b3', 'admin', null, null, '21', '1477708352', '1', '1', null);
INSERT INTO `users` VALUES ('2', 'administrator', '4297f44b13955235245b2497399d7a93', 'administrator', null, null, '1', '1477045678', null, '1', null);
INSERT INTO `users` VALUES ('3', 'manager', '4297f44b13955235245b2497399d7a93', 'manager', null, null, '1', '1477033665', null, '1', null);

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
