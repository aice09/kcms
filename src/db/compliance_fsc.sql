-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for compliance_fsc
DROP DATABASE IF EXISTS `compliance_fsc`;
CREATE DATABASE IF NOT EXISTS `compliance_fsc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `compliance_fsc`;

-- Dumping structure for table compliance_fsc.fsc001p2_jt
DROP TABLE IF EXISTS `fsc001p2_jt`;
CREATE TABLE IF NOT EXISTS `fsc001p2_jt` (
  `fsc001p2_id` int(11) NOT NULL AUTO_INCREMENT,
  `fsc001p2_jtid` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_ponum` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_recieveddate` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_issueddate` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_rollnum` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_lotnum` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_qtym` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_qtypcs` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_qtykg` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_createdby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_dtcreated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_updatedby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_dtupdated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p2_status` enum('Active','Deleted') COLLATE utf8mb4_bin DEFAULT 'Active',
  PRIMARY KEY (`fsc001p2_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table compliance_fsc.fsc001p2_jt: ~6 rows (approximately)
/*!40000 ALTER TABLE `fsc001p2_jt` DISABLE KEYS */;
INSERT INTO `fsc001p2_jt` (`fsc001p2_id`, `fsc001p2_jtid`, `fsc001p2_ponum`, `fsc001p2_recieveddate`, `fsc001p2_issueddate`, `fsc001p2_rollnum`, `fsc001p2_lotnum`, `fsc001p2_qtym`, `fsc001p2_qtypcs`, `fsc001p2_qtykg`, `fsc001p2_createdby`, `fsc001p2_dtcreated`, `fsc001p2_updatedby`, `fsc001p2_dtupdated`, `fsc001p2_status`) VALUES
	(1, '1', '2107053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active'),
	(3, '', '123456', '123456', '123456', '123456', '123456', '123456', '2901774.5916088847', '123456', 'EL-11-0013', '03/03/2022 01:58 PM', 'EL-11-0013', '03/03/2022 01:58 PM', 'Active'),
	(5, '6', '1234', '1234', '1234', '1234', '1234', '1234', '29004.583382301094', '1234', 'EL-11-0013', '03/03/2022 02:03 PM', 'EL-11-0013', '03/03/2022 02:03 PM', 'Active'),
	(6, '9', '10', '03/03/2022', '03/18/2022', '10', '10', '10', '235.04524620989542', '10', 'EL-11-0013', '03/03/2022 04:13 PM', ' ', ' ', 'Active'),
	(7, '10', '12345', '03/04/2022', '03/19/2022', '12345', '12345', '12345', '290163.3564461159', '12345', 'EL-11-0013', '03/04/2022 04:56 PM', ' ', ' ', 'Active'),
	(8, '10', '9000', '03/04/2022', '03/19/2022', '9000', '9000', '9000', '211540.72158890587', '9000', 'EL-11-0013', '03/04/2022 04:57 PM', ' ', ' ', 'Active');
/*!40000 ALTER TABLE `fsc001p2_jt` ENABLE KEYS */;

-- Dumping structure for table compliance_fsc.fsc001p3_jt
DROP TABLE IF EXISTS `fsc001p3_jt`;
CREATE TABLE IF NOT EXISTS `fsc001p3_jt` (
  `fsc001p3_id` int(11) NOT NULL AUTO_INCREMENT,
  `fsc001p3_iooid` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_lotcode` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_qtypcs` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_qtykg` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_createdby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_dtcreated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_updatedby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_dtupdated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p3_status` enum('Active','Deleted') COLLATE utf8mb4_bin DEFAULT 'Active',
  PRIMARY KEY (`fsc001p3_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table compliance_fsc.fsc001p3_jt: ~5 rows (approximately)
/*!40000 ALTER TABLE `fsc001p3_jt` DISABLE KEYS */;
INSERT INTO `fsc001p3_jt` (`fsc001p3_id`, `fsc001p3_iooid`, `fsc001p3_lotcode`, `fsc001p3_qtypcs`, `fsc001p3_qtykg`, `fsc001p3_createdby`, `fsc001p3_dtcreated`, `fsc001p3_updatedby`, `fsc001p3_dtupdated`, `fsc001p3_status`) VALUES
	(2, '6', '11', '11', '0.11', 'EL-11-0013', '03/03/2022 04:15 PM', 'EL-11-0013', '03/03/2022 04:22 PM', 'Active'),
	(3, '6', '55', '55', '0.55', 'EL-11-0013', '03/03/2022 04:25 PM', 'EL-11-0013', '03/03/2022 04:29 PM', 'Active'),
	(4, '6', '33', '33', '0.33', 'EL-11-0013', '03/03/2022 04:30 PM', 'EL-11-0013', '03/03/2022 04:30 PM', 'Active'),
	(5, '6', '241', '241', '2.41', 'EL-11-0013', '03/03/2022 04:30 PM', 'EL-11-0013', '03/03/2022 04:30 PM', 'Active'),
	(6, '6', '22', '22', '0.22', 'EL-11-0013', '03/03/2022 04:30 PM', ' ', ' ', 'Active');
/*!40000 ALTER TABLE `fsc001p3_jt` ENABLE KEYS */;

-- Dumping structure for table compliance_fsc.fsc001p4_jt
DROP TABLE IF EXISTS `fsc001p4_jt`;
CREATE TABLE IF NOT EXISTS `fsc001p4_jt` (
  `fsc001p4_id` int(11) NOT NULL AUTO_INCREMENT,
  `fsc001p4_outputid` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_qtypcs` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_qtykg` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_wippcs` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_wipkg` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_createdby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_dtcreated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_updatedby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_dtupdated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p4_status` enum('Active','Deleted') COLLATE utf8mb4_bin DEFAULT 'Active',
  PRIMARY KEY (`fsc001p4_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table compliance_fsc.fsc001p4_jt: ~2 rows (approximately)
/*!40000 ALTER TABLE `fsc001p4_jt` DISABLE KEYS */;
INSERT INTO `fsc001p4_jt` (`fsc001p4_id`, `fsc001p4_outputid`, `fsc001p4_qtypcs`, `fsc001p4_qtykg`, `fsc001p4_wippcs`, `fsc001p4_wipkg`, `fsc001p4_createdby`, `fsc001p4_dtcreated`, `fsc001p4_updatedby`, `fsc001p4_dtupdated`, `fsc001p4_status`) VALUES
	(3, '6', '32000', '', '32000', '', 'EL-11-0013', '03/04/2022 10:39 AM', 'EL-11-0013', '03/04/2022 10:40 AM', 'Active'),
	(4, '4', '33000', '330', '33000', '330', 'EL-11-0013', '03/04/2022 10:56 AM', 'EL-11-0013', '03/04/2022 10:57 AM', 'Active');
/*!40000 ALTER TABLE `fsc001p4_jt` ENABLE KEYS */;

-- Dumping structure for table compliance_fsc.fsc001p5_jt
DROP TABLE IF EXISTS `fsc001p5_jt`;
CREATE TABLE IF NOT EXISTS `fsc001p5_jt` (
  `fsc001p5_id` int(11) NOT NULL AUTO_INCREMENT,
  `fsc001p5_stockid` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p5_ponum` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p5_drnum` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p5_createdby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p5_dtcreated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p5_updatedby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p5_dtupdated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p5_status` enum('Active','Deleted') COLLATE utf8mb4_bin DEFAULT 'Active',
  PRIMARY KEY (`fsc001p5_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table compliance_fsc.fsc001p5_jt: ~1 rows (approximately)
/*!40000 ALTER TABLE `fsc001p5_jt` DISABLE KEYS */;
INSERT INTO `fsc001p5_jt` (`fsc001p5_id`, `fsc001p5_stockid`, `fsc001p5_ponum`, `fsc001p5_drnum`, `fsc001p5_createdby`, `fsc001p5_dtcreated`, `fsc001p5_updatedby`, `fsc001p5_dtupdated`, `fsc001p5_status`) VALUES
	(2, '3', '1234', '1234', 'EL-11-0013', '03/04/2022 11:34 AM', 'EL-11-0013', '03/04/2022 11:34 AM', 'Active'),
	(3, '3', '12', '12', 'EL-11-0013', '03/04/2022 11:48 AM', ' ', ' ', 'Active');
/*!40000 ALTER TABLE `fsc001p5_jt` ENABLE KEYS */;

-- Dumping structure for table compliance_fsc.fsc001p6_jt
DROP TABLE IF EXISTS `fsc001p6_jt`;
CREATE TABLE IF NOT EXISTS `fsc001p6_jt` (
  `fsc001p6_id` int(11) NOT NULL AUTO_INCREMENT,
  `fsc001p6_deliveryid` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_invoicedate` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_invoicenum` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_qtypcs` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_qtykg` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_createdby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_dtcreated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_updatedby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_dtupdated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001p6_status` enum('Active','Deleted') COLLATE utf8mb4_bin DEFAULT 'Active',
  PRIMARY KEY (`fsc001p6_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table compliance_fsc.fsc001p6_jt: ~2 rows (approximately)
/*!40000 ALTER TABLE `fsc001p6_jt` DISABLE KEYS */;
INSERT INTO `fsc001p6_jt` (`fsc001p6_id`, `fsc001p6_deliveryid`, `fsc001p6_invoicedate`, `fsc001p6_invoicenum`, `fsc001p6_qtypcs`, `fsc001p6_qtykg`, `fsc001p6_createdby`, `fsc001p6_dtcreated`, `fsc001p6_updatedby`, `fsc001p6_dtupdated`, `fsc001p6_status`) VALUES
	(6, '2', '03/04/2022', '1234', '1234', '12.34', 'EL-11-0013', '03/04/2022 01:26 PM', 'EL-11-0013', '03/04/2022 01:29 PM', 'Active'),
	(7, '2', '03/03/2022', '12345', '12345', '123.45', 'EL-11-0013', '03/04/2022 01:28 PM', 'EL-11-0013', '03/04/2022 01:29 PM', 'Active');
/*!40000 ALTER TABLE `fsc001p6_jt` ENABLE KEYS */;

-- Dumping structure for table compliance_fsc.fsc001_jt
DROP TABLE IF EXISTS `fsc001_jt`;
CREATE TABLE IF NOT EXISTS `fsc001_jt` (
  `fsc001_id` int(11) NOT NULL AUTO_INCREMENT,
  `fsc001_number` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001_desc` text COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001_weight` varchar(50) COLLATE utf8mb4_bin DEFAULT '0',
  `fsc001_qtypcs` varchar(50) COLLATE utf8mb4_bin DEFAULT '0',
  `fsc001_totalkg` varchar(50) COLLATE utf8mb4_bin DEFAULT '0',
  `fsc001_createdby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001_dtcreated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001_updatedby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001_dtupdated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsc001_status` enum('Active','Deleted') COLLATE utf8mb4_bin DEFAULT 'Active',
  PRIMARY KEY (`fsc001_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table compliance_fsc.fsc001_jt: ~8 rows (approximately)
/*!40000 ALTER TABLE `fsc001_jt` DISABLE KEYS */;
INSERT INTO `fsc001_jt` (`fsc001_id`, `fsc001_number`, `fsc001_desc`, `fsc001_weight`, `fsc001_qtypcs`, `fsc001_totalkg`, `fsc001_createdby`, `fsc001_dtcreated`, `fsc001_updatedby`, `fsc001_dtupdated`, `fsc001_status`) VALUES
	(1, '2021110422', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, 'Active'),
	(2, '2021120161', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, 'Active'),
	(3, '2021120155', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, 'Active'),
	(4, '2021120162', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, 'Active'),
	(6, '2022010487', '16oz COLD PAPER CUP McCAFE', '0', '1486320', '0', 'EL-11-0013', '03/03/2022 11:45 AM', ' ', ' ', 'Active'),
	(7, '12345', '12345', '0', '50000', '0', '', '', 'EL-11-0013', '03/03/2022 11:52 AM', 'Active'),
	(8, '12345', '12345', '0', '15000', '0', 'EL-11-0013', '03/03/2022 11:52 AM', 'EL-11-0013', '03/03/2022 11:53 AM', 'Active'),
	(9, '890', '10', '10', '10', '0.1', 'EL-11-0013', '03/03/2022 04:13 PM', ' ', ' ', 'Active'),
	(10, '0123', 'try', '2', '3000', '6', 'EW-05-0019', '03/04/2022 04:28 PM', ' ', ' ', 'Active');
/*!40000 ALTER TABLE `fsc001_jt` ENABLE KEYS */;

-- Dumping structure for table compliance_fsc.fsc_category
DROP TABLE IF EXISTS `fsc_category`;
CREATE TABLE IF NOT EXISTS `fsc_category` (
  `fsccat_id` int(11) NOT NULL AUTO_INCREMENT,
  `fsccat_name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsccat_category` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsccat_createdby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsccat_dtcreated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsccat_updatedby` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsccat_dtupdated` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fsccat_status` enum('Active','Deleted') COLLATE utf8mb4_bin DEFAULT 'Active',
  PRIMARY KEY (`fsccat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table compliance_fsc.fsc_category: ~14 rows (approximately)
/*!40000 ALTER TABLE `fsc_category` DISABLE KEYS */;
INSERT INTO `fsc_category` (`fsccat_id`, `fsccat_name`, `fsccat_category`, `fsccat_createdby`, `fsccat_dtcreated`, `fsccat_updatedby`, `fsccat_dtupdated`, `fsccat_status`) VALUES
	(1, 'FSC Mix Paper Cups', NULL, 'EL-11-0013', '03/07/2022 03:35 PM', ' ', ' ', 'Active'),
	(2, 'FSC Mix Box', NULL, 'EL-11-0013', '03/07/2022 03:35 PM', ' ', ' ', 'Active'),
	(3, 'FSC Mix Cup Sleeves', NULL, 'EL-11-0013', '03/07/2022 03:35 PM', ' ', ' ', 'Active'),
	(4, 'FSC Mix (BK) Paper Bags', NULL, 'EL-11-0013', '03/07/2022 03:36 PM', ' ', ' ', 'Active'),
	(5, 'FSC Mix Cup Carrier', NULL, 'EL-11-0013', '03/07/2022 03:36 PM', ' ', ' ', 'Active'),
	(6, 'FSC Mix Food Wraps', NULL, 'EL-11-0013', '03/07/2022 03:36 PM', ' ', ' ', 'Active'),
	(7, 'FSC Mix Food Wraps P2', NULL, 'EL-11-0013', '03/07/2022 03:36 PM', ' ', ' ', 'Active'),
	(8, 'FSC Recycled Paper Bags ', NULL, 'EL-11-0013', '03/07/2022 03:37 PM', ' ', ' ', 'Active'),
	(9, 'FSC Mix (GP) Paper Bags', NULL, 'EL-11-0013', '03/07/2022 03:37 PM', ' ', ' ', 'Active'),
	(10, 'FSC Bottoms', NULL, 'EL-11-0013', '03/07/2022 03:38 PM', ' ', ' ', 'Active'),
	(11, 'Non-FSC TL and CM', NULL, 'EL-11-0013', '03/08/2022 11:58 AM', ' ', ' ', 'Active'),
	(12, 'Non-FSC P1S', NULL, 'EL-11-0013', '03/08/2022 11:59 AM', ' ', ' ', 'Active'),
	(13, 'Non-FSC Greaseproof', NULL, 'EL-11-0013', '03/08/2022 11:59 AM', ' ', ' ', 'Active'),
	(14, 'Non-FSC Brown Kraft', NULL, 'EL-11-0013', '03/08/2022 12:00 PM', ' ', ' ', 'Active'),
	(15, 'Non-FSC Kraftpack (2 sides brow)', NULL, 'EL-11-0013', '03/08/2022 12:00 PM', ' ', ' ', 'Active'),
	(16, 'Non-FSC Carrier Board', NULL, 'EL-11-0013', '03/08/2022 12:00 PM', ' ', ' ', 'Active');
/*!40000 ALTER TABLE `fsc_category` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
