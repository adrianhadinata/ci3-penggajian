/*
 Navicat Premium Data Transfer

 Source Server         : localMaria
 Source Server Type    : MariaDB
 Source Server Version : 101105 (10.11.5-MariaDB)
 Source Host           : localhost:3307
 Source Schema         : penggajian

 Target Server Type    : MariaDB
 Target Server Version : 101105 (10.11.5-MariaDB)
 File Encoding         : 65001

 Date: 18/02/2024 09:36:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `data_jabatan`;
CREATE TABLE `data_jabatan`  (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gaji_pokok` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tj_transport` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uang_makan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jabatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_jabatan
-- ----------------------------
INSERT INTO `data_jabatan` VALUES (1, 'HRD', '4000000', '600000', '400000');
INSERT INTO `data_jabatan` VALUES (2, 'Staff Marketing', '2500000', '300000', '200000');
INSERT INTO `data_jabatan` VALUES (3, 'Admin', '2200000', '300000', '200000');
INSERT INTO `data_jabatan` VALUES (4, 'Sales', '2500000', '300000', '200000');
INSERT INTO `data_jabatan` VALUES (5, 'Bos Besar', '10000000', '500000', '1500000');

-- ----------------------------
-- Table structure for data_kehadiran
-- ----------------------------
DROP TABLE IF EXISTS `data_kehadiran`;
CREATE TABLE `data_kehadiran`  (
  `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  PRIMARY KEY (`id_kehadiran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_kehadiran
-- ----------------------------
INSERT INTO `data_kehadiran` VALUES (1, '012021', '0987654321', 'Dodi', 'Laki-Laki', 'Staff Marketing', 24, 0, 0);
INSERT INTO `data_kehadiran` VALUES (2, '012021', '123456789', 'Fauzi', 'Laki-Laki', 'Admin', 22, 0, 1);
INSERT INTO `data_kehadiran` VALUES (3, '022024', '0987654321', 'Dodi', 'Laki-Laki', 'Staff Marketing', 24, 0, 0);
INSERT INTO `data_kehadiran` VALUES (4, '022024', '123456789', 'Fauzi', 'Laki-Laki', 'Admin', 23, 0, 0);
INSERT INTO `data_kehadiran` VALUES (5, '022024', '3374132408990001', 'Adrian Hadinata Hadi Darsono', 'Laki-Laki', 'HRD', 24, 0, 0);

-- ----------------------------
-- Table structure for data_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `data_pegawai`;
CREATE TABLE `data_pegawai`  (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `id_ptkp` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_pegawai
-- ----------------------------
INSERT INTO `data_pegawai` VALUES (1, '123456789', 'Fauzi', 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7', 'Laki-Laki', 'Admin', '2020-12-26', 'Karyawan Tetap', 'pegawai-210101-a7ca89f5fc.png', 1, 4);
INSERT INTO `data_pegawai` VALUES (2, '0987654321', 'Dodi', 'dodi', '0bd9897bf12294ce35fdc0e21065c8a7', 'Laki-Laki', 'Staff Marketing', '2021-01-02', 'Karyawan Tidak Tetap', 'pegawai-210101-9847084dc8.png', 2, 4);
INSERT INTO `data_pegawai` VALUES (3, '3374132408990001', 'Adrian Hadinata Hadi Darsono', 'adrian', '8db0e9b0c28924cc17a20d5a5ff1db42', 'Laki-Laki', 'Bos Besar', '2024-02-16', 'Karyawan Tetap', '', 1, 4);

-- ----------------------------
-- Table structure for data_pkp
-- ----------------------------
DROP TABLE IF EXISTS `data_pkp`;
CREATE TABLE `data_pkp`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal_akhir` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pot_npwp` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pot_no_npwp` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_pkp
-- ----------------------------
INSERT INTO `data_pkp` VALUES (1, 'PKP/0', 'KENA PAJAK', '54000000', '60000000', '5', '6');
INSERT INTO `data_pkp` VALUES (2, 'PKP/1', 'KENA PAJAK', '60000000', '250000000', '15', '17.4');

-- ----------------------------
-- Table structure for data_ptkp
-- ----------------------------
DROP TABLE IF EXISTS `data_ptkp`;
CREATE TABLE `data_ptkp`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_ptkp
-- ----------------------------
INSERT INTO `data_ptkp` VALUES (4, 'TK/0', 'TIDAK KAWIN', '54000000');
INSERT INTO `data_ptkp` VALUES (5, 'TK/1', 'TIDAK KAWIN', '58500000');
INSERT INTO `data_ptkp` VALUES (6, 'TK/2', 'TIDAK KAWIN', '63000000');
INSERT INTO `data_ptkp` VALUES (7, 'TK/3', 'TIDAK KAWIN', '67500000');
INSERT INTO `data_ptkp` VALUES (8, 'K/0', 'KAWIN', '58500000');
INSERT INTO `data_ptkp` VALUES (9, 'K/1', 'KAWIN', '63000000');
INSERT INTO `data_ptkp` VALUES (10, 'K/2', 'KAWIN', '67500000');
INSERT INTO `data_ptkp` VALUES (11, 'K/3', 'KAWIN', '72000000');

-- ----------------------------
-- Table structure for hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hak_akses` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hak_akses
-- ----------------------------
INSERT INTO `hak_akses` VALUES (1, 'admin', 1);
INSERT INTO `hak_akses` VALUES (2, 'pegawai', 2);

-- ----------------------------
-- Table structure for potongan_gaji
-- ----------------------------
DROP TABLE IF EXISTS `potongan_gaji`;
CREATE TABLE `potongan_gaji`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `potongan` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jml_potongan` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of potongan_gaji
-- ----------------------------
INSERT INTO `potongan_gaji` VALUES (1, 'Alpha', 100000);
INSERT INTO `potongan_gaji` VALUES (2, 'Sakit', 0);

SET FOREIGN_KEY_CHECKS = 1;
