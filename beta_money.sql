/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100125
 Source Host           : localhost:3306
 Source Schema         : beta_money

 Target Server Type    : MySQL
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 03/11/2018 22:47:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ku_admin
-- ----------------------------
DROP TABLE IF EXISTS `ku_admin`;
CREATE TABLE `ku_admin`  (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ku_admin
-- ----------------------------
INSERT INTO `ku_admin` VALUES (1, 'Admin Fin', 'f_admin@gmail.com', 'admin', '732ee80f8d09fa985ea2de46d000d38bYWRtaW4=c82834ebed1cdde333096d3252de91d5');

-- ----------------------------
-- Table structure for ku_anggota
-- ----------------------------
DROP TABLE IF EXISTS `ku_anggota`;
CREATE TABLE `ku_anggota`  (
  `id_anggota` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp` int(40) NULL DEFAULT NULL,
  `jk` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ku_anggota
-- ----------------------------
INSERT INTO `ku_anggota` VALUES (4, 'Basori', 'Malang', 9999999, 'L');
INSERT INTO `ku_anggota` VALUES (5, 'Marjuki Mustamar', 'Malang Sawojajar', 2147483647, 'L');
INSERT INTO `ku_anggota` VALUES (8, 'Ismail', 'Malang', 2147483647, 'L');
INSERT INTO `ku_anggota` VALUES (9, 'Sabriana', 'Malang Ampel', 2147483647, 'P');

-- ----------------------------
-- Table structure for ku_company
-- ----------------------------
DROP TABLE IF EXISTS `ku_company`;
CREATE TABLE `ku_company`  (
  `id_company` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_company`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ku_log
-- ----------------------------
DROP TABLE IF EXISTS `ku_log`;
CREATE TABLE `ku_log`  (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `log` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_log` datetime(0) NULL DEFAULT NULL,
  `admin_id` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ku_log
-- ----------------------------
INSERT INTO `ku_log` VALUES (1, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Pembelian Selang', '2018-10-30 20:45:03', 1);
INSERT INTO `ku_log` VALUES (2, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Pembelian Selang', '2018-10-30 20:45:15', 1);
INSERT INTO `ku_log` VALUES (3, 'MENGUBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Pembelian Selang Amlo', '2018-10-30 20:58:35', 1);
INSERT INTO `ku_log` VALUES (4, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Sumbangan dari PT Merdeka Malang', '2018-10-30 21:21:13', 1);
INSERT INTO `ku_log` VALUES (5, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Sumbangan dari Warga Setempat Untuk Makan Siang', '2018-10-31 20:21:09', 1);
INSERT INTO `ku_log` VALUES (6, 'MENGUBAH PROFIL DENGAN NAMA USER :Admin Fin', '2018-11-02 18:45:23', 1);
INSERT INTO `ku_log` VALUES (7, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Penjualan Buku Bekas', '2018-11-03 22:13:34', 1);
INSERT INTO `ku_log` VALUES (8, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Pembelian Sandal', '2018-11-03 22:13:57', 1);
INSERT INTO `ku_log` VALUES (9, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Beli 1 Pak Buku Tulis', '2018-11-03 22:15:44', 1);
INSERT INTO `ku_log` VALUES (10, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Pembelian Sarung', '2018-11-03 22:18:57', 1);
INSERT INTO `ku_log` VALUES (11, 'MENAMBAH TRANSAKSI DENGAN NAMA TRANSAKSI :Pembelian Baju', '2018-11-03 22:20:27', 1);

-- ----------------------------
-- Table structure for ku_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `ku_transaksi`;
CREATE TABLE `ku_transaksi`  (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` int(50) NULL DEFAULT NULL,
  `jenis_transaksi` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_add_transaksi` datetime(0) NULL DEFAULT NULL,
  `tgl_update_transaksi` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ku_transaksi
-- ----------------------------
INSERT INTO `ku_transaksi` VALUES (5, 'Pembelian Selang Amlo', 35000, 'K', '-', '2018-10-30 14:45:15', '2018-10-30 20:58:35');
INSERT INTO `ku_transaksi` VALUES (6, 'Sumbangan dari PT Merdeka Malang', 5000000, 'M', '-', '2018-10-30 21:21:13', '0000-00-00 00:00:00');
INSERT INTO `ku_transaksi` VALUES (7, 'Sumbangan dari Warga Setempat Untuk Makan Siang', 10000000, 'M', '-', '2018-10-31 20:21:09', '0000-00-00 00:00:00');
INSERT INTO `ku_transaksi` VALUES (8, 'Penjualan Buku Bekas', 55000, 'M', '-', '2018-11-03 22:13:34', '0000-00-00 00:00:00');
INSERT INTO `ku_transaksi` VALUES (9, 'Pembelian Sandal', 15000, 'K', '-', '2018-11-03 22:13:57', '0000-00-00 00:00:00');
INSERT INTO `ku_transaksi` VALUES (10, 'Beli 1 Pak Buku Tulis', 45000, 'K', '-', '2018-11-03 22:15:44', '0000-00-00 00:00:00');
INSERT INTO `ku_transaksi` VALUES (11, 'Pembelian Sarung', 250000, 'K', '-', '2018-11-03 22:18:57', '0000-00-00 00:00:00');
INSERT INTO `ku_transaksi` VALUES (12, 'Pembelian Baju', 59000, 'K', '-', '2018-11-03 22:20:27', '0000-00-00 00:00:00');

-- ----------------------------
-- View structure for v_log
-- ----------------------------
DROP VIEW IF EXISTS `v_log`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_log` AS SELECT
ku_admin.nama,
ku_log.id_log,
ku_log.log,
ku_log.date_log,
ku_log.admin_id
FROM
ku_admin
INNER JOIN ku_log ON ku_log.admin_id = ku_admin.id_admin ;

SET FOREIGN_KEY_CHECKS = 1;
