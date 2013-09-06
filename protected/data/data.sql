/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : takita

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2013-09-06 18:50:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for akun
-- ----------------------------
DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `umur` tinyint(4) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `tanggalDaftar` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
