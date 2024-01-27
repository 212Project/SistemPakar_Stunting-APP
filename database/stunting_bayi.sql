-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.29 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table stunting_bayi.tb_anak
CREATE TABLE IF NOT EXISTS `tb_anak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_data` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tinggi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zscore` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stunting` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kesimpulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table stunting_bayi.tb_anak: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_anak` DISABLE KEYS */;
INSERT INTO `tb_anak` (`id`, `id_ibu`, `id_data`, `bulan`, `tinggi`, `zscore`, `status`, `stunting`, `kesimpulan`) VALUES
	(29, 'diana01', '94ca', '4', '40', '-10.045', 'Sangat Pendek', '79', 'Cukup Kemungkinan Stunting'),
	(30, 'diana01', 'b2bc', '5', '50', '-6.364', 'Sangat Pendek', '91.36', 'Kemungkinan Stunting'),
	(31, 'diana01', '86d1', '7', '70', '1.174', 'Tinggi', '94.6', 'Kemungkinan Stunting');
/*!40000 ALTER TABLE `tb_anak` ENABLE KEYS */;

-- Dumping structure for table stunting_bayi.tb_detail
CREATE TABLE IF NOT EXISTS `tb_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_data` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sakit` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sakitk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usiamuda` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usiamudak` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ekonomiburuk` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ekonomiburukk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jarakpendek` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jarakpendekk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hipertensi` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hipertensik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `interaksi` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `interaksik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengetahuan` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengetahuank` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bersih` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bersihk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vitamin` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vitamink` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pasif` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pasifk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nafsu` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nafsuk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `perhatian` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `perhatiank` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kontrol` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kontrolk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table stunting_bayi.tb_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_detail` DISABLE KEYS */;
INSERT INTO `tb_detail` (`id`, `id_ibu`, `id_data`, `sakit`, `sakitk`, `usiamuda`, `usiamudak`, `ekonomiburuk`, `ekonomiburukk`, `jarakpendek`, `jarakpendekk`, `hipertensi`, `hipertensik`, `interaksi`, `interaksik`, `pengetahuan`, `pengetahuank`, `bersih`, `bersihk`, `vitamin`, `vitamink`, `pasif`, `pasifk`, `nafsu`, `nafsuk`, `perhatian`, `perhatiank`, `kontrol`, `kontrolk`) VALUES
	(15, 'diana01', '94ca', '1', 'Iya', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak'),
	(16, 'diana01', 'b2bc', '0', 'Tidak', '0', 'Tidak', '1', 'Iya', '1', 'Iya', '1', 'Iya', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak'),
	(17, 'diana01', '86d1', '0', 'Tidak', '1', 'Iya', '1', 'Iya', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '1', 'Iya', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak', '0', 'Tidak');
/*!40000 ALTER TABLE `tb_detail` ENABLE KEYS */;

-- Dumping structure for table stunting_bayi.tb_ibuanak
CREATE TABLE IF NOT EXISTS `tb_ibuanak` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `umur` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notlp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_anak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jk` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table stunting_bayi.tb_ibuanak: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_ibuanak` DISABLE KEYS */;
INSERT INTO `tb_ibuanak` (`id`, `nama_ibu`, `umur`, `pendidikan`, `alamat`, `notlp`, `nama_anak`, `jk`) VALUES
	('diana01', 'Diana', '42', 'SMA', 'Jl. Tani', '08123456789', 'Susan', 'Perempuan');
/*!40000 ALTER TABLE `tb_ibuanak` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
