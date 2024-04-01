-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: sihijau
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aspek`
--

DROP TABLE IF EXISTS `aspek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aspek` (
  `id_aspek` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_aspek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_aspek`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspek`
--

LOCK TABLES `aspek` WRITE;
/*!40000 ALTER TABLE `aspek` DISABLE KEYS */;
INSERT INTO `aspek` VALUES (1,'Tapak dan Infrastruktur',2021,NULL,'2021-04-17 20:46:30','2021-04-17 20:46:30'),(3,'Energi dan Perubahan Iklim',2021,NULL,'2021-04-17 21:14:28','2021-04-17 21:14:28'),(4,'Sampah',2021,NULL,'2021-04-17 21:14:43','2021-04-17 21:14:43'),(5,'Air',2021,NULL,'2021-04-17 21:14:54','2021-04-17 21:14:54'),(6,'Transportasi',2021,NULL,'2021-04-17 21:15:09','2021-04-17 21:15:09'),(7,'Pendidikan dan Kegiatan Pendukung',2021,NULL,'2021-04-17 21:15:26','2021-04-17 21:15:26');
/*!40000 ALTER TABLE `aspek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bukti`
--

DROP TABLE IF EXISTS `bukti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bukti` (
  `id_bukti` int unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_indikator` bigint unsigned NOT NULL,
  `id_sekolah` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_bukti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bukti`
--

LOCK TABLES `bukti` WRITE;
/*!40000 ALTER TABLE `bukti` DISABLE KEYS */;
/*!40000 ALTER TABLE `bukti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indikator`
--

DROP TABLE IF EXISTS `indikator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `indikator` (
  `id_indikator` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_indikator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_aspek` bigint unsigned NOT NULL,
  `id_satuan` bigint unsigned NOT NULL,
  `id_periode` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_indikator`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indikator`
--

LOCK TABLES `indikator` WRITE;
/*!40000 ALTER TABLE `indikator` DISABLE KEYS */;
INSERT INTO `indikator` VALUES (1,'Rasio area terbuka terhadap total area sekolah','1.1',2021,'GSR_1.1_ 1_ Rasio area terbuka terhadap total area sekolah_ 1618701022.docx',NULL,'2021-04-17 20:46:30','2021-04-18 06:10:22',1,1,1),(2,'Pemilahan Sampah di Lingkungan Sekolah','3.1',2021,NULL,NULL,'2021-04-17 21:24:40','2021-04-17 21:24:40',4,3,1),(3,'Sumber air bersih (prioritas)','4.1',2021,NULL,NULL,'2021-04-17 21:35:13','2021-04-17 21:35:13',5,2,1),(4,'Upaya efisiensi penggunaan air','4.2',2021,NULL,NULL,'2021-04-17 21:37:42','2021-04-17 21:37:42',5,1,1),(5,'Ketersediaan Bak Penampung Air Hujan','4.3',2021,NULL,NULL,'2021-04-17 21:38:54','2021-04-17 21:41:07',5,5,1),(6,'Jenis Perkerasan Ruang Luar yang Dominan','1.2',2021,NULL,NULL,'2021-04-17 21:39:36','2021-04-17 21:39:36',1,2,1),(7,'Sistem pengolahan air hujan','4.4',2021,NULL,NULL,'2021-04-17 21:39:46','2021-04-17 21:41:34',5,2,1),(8,'Persentase Jumlah Ruang Berpenghawaan Alami Penuh','1.3',2021,NULL,NULL,'2021-04-17 21:41:34','2021-04-17 21:41:34',1,1,1),(9,'Jumlah Sumur Resapan','4.5',2021,NULL,NULL,'2021-04-17 21:42:42','2021-04-17 21:42:42',5,2,1),(10,'Persentase Jumlah Ruang Berpenghawaan Kipas Angin','1.4',2021,NULL,NULL,'2021-04-17 21:42:43','2021-04-17 21:42:43',1,1,1),(11,'Persentase Jumlah Ruang Berpenghawaan AC','1.5',2021,NULL,NULL,'2021-04-17 21:43:26','2021-04-17 21:43:26',1,1,1),(12,'Persentase Jumlah Ruang Berpencahayaan Alami (Misalnya : jendela kaca, glassblock, genteng kaca)','1.6',2021,NULL,NULL,'2021-04-17 21:44:40','2021-04-17 21:44:40',1,1,1),(13,'Jumlah Biopori','4.6',2021,NULL,NULL,'2021-04-17 21:44:43','2021-04-17 21:44:43',5,2,1),(14,'Persentase Jumlah Ruang Berpencahayaan Buatan (lampu menyala terus)','1.7',2021,NULL,NULL,'2021-04-17 21:45:21','2021-04-17 21:45:21',1,1,1),(15,'Ketersediaan Prasarana Drainase/selokan Dalam Area Sekolah','4.7',2021,NULL,NULL,'2021-04-17 21:46:04','2021-04-17 21:46:04',5,1,1),(16,'Persentase Jumlah Ruang dengan Tanaman Indoor','1.8',2021,NULL,NULL,'2021-04-17 21:46:12','2021-04-17 21:46:12',1,1,1),(17,'Jenis Keanekaragaman Vegetasi','1.9',2021,NULL,NULL,'2021-04-17 21:47:11','2021-04-17 21:47:11',1,2,1),(18,'Pemanfaatan Sistem Kontrol Kualitas Air','4.8',2021,NULL,NULL,'2021-04-17 21:47:14','2021-04-17 21:47:25',5,2,1),(19,'Inventarisasi pohon (asal, tahun tanam, nama)','1.10',2021,NULL,NULL,'2021-04-17 21:47:55','2021-04-17 21:47:55',1,2,1),(20,'Keberadaan Kebun/Lahan Sekolah (kebun obat, kebun bibit, kebun sayur, hutan mini, green house)','1.11',2021,NULL,NULL,'2021-04-17 21:48:44','2021-04-17 21:48:44',1,2,1),(21,'Peraturan Penggunaan Air','4.9',2021,NULL,NULL,'2021-04-17 21:49:15','2021-04-17 21:49:15',5,2,1),(22,'Produk Unggulan Sekolah yang Dihasilkan Dalam Hal Biodiversitas','1.12',2021,NULL,NULL,'2021-04-17 21:50:36','2021-04-17 21:50:36',1,2,1),(23,'Kampanye Hemat Penggunaan Air','4.10',2020,NULL,NULL,'2021-04-17 21:51:09','2021-04-17 21:51:09',5,2,1),(24,'Peraturan Tentang Penataan Lingkungan','1.13',2021,NULL,NULL,'2021-04-17 21:51:20','2021-04-17 21:51:20',1,2,1),(25,'Kampanye Tentang Lingkungan dan Biodiversitas','1.14',2021,NULL,NULL,'2021-04-17 21:51:59','2021-04-17 21:51:59',1,2,1),(26,'Persentase rata-rata mobil per hari','5.1',2021,NULL,NULL,'2021-04-17 21:52:19','2021-04-17 21:52:19',6,1,1),(27,'Persentase Rata-Rata Sepeda Motor per Hari','5.2',2021,NULL,NULL,'2021-04-17 21:53:08','2021-04-17 21:53:08',6,1,1),(28,'Persentase Rata-Rata Sepeda per Hari','5.3',2021,NULL,NULL,'2021-04-17 21:53:40','2021-04-17 21:53:40',6,1,1),(29,'Upaya Efisiensi Penggunaan Listrik','2.1',2021,NULL,NULL,'2021-04-17 21:54:08','2021-04-17 21:54:08',3,2,1),(30,'Persentase Pejalan Kaki Tetap (termasuk pengguna kendaraan umum)','5.4',2021,NULL,NULL,'2021-04-17 21:54:34','2021-04-17 21:54:34',6,1,1),(31,'Tren Penggunaan Energi Listrik Dalam 4 Bulan Terakhir','2.2',2021,NULL,NULL,'2021-04-17 21:55:05','2021-04-17 21:55:05',3,2,1),(32,'Media Sosialiasi Transportasi Ramah Lingkungan / Budaya Jalan Kaki (poster, leaflet, banner dll)','5.5',2021,NULL,NULL,'2021-04-17 21:55:27','2021-04-17 21:55:27',6,2,1),(33,'Peraturan pembatasan penggunaan kendaraan pribadi','5.6',2021,NULL,NULL,'2021-04-17 21:56:19','2021-04-17 21:56:19',6,2,1),(34,'Peraturan Penggunaan Kendaraan','5.7',2021,NULL,NULL,'2021-04-17 21:56:57','2021-04-17 21:56:57',6,2,1),(35,'Kampanye Transportasi Ramah Lingkungan / Jalan kali / Bersepeda','5.8',2021,NULL,NULL,'2021-04-17 21:57:36','2021-04-17 21:57:36',6,2,1),(36,'Mata Pelajaran (MP) Berwawasan Lingkungan','6.1',2021,NULL,NULL,'2021-04-17 21:58:18','2021-04-17 21:58:18',7,2,1),(37,'Publikasi di Sekolah Terkait Lingkungan','6.2',2021,NULL,NULL,'2021-04-17 21:58:50','2021-04-17 21:58:50',7,2,1),(38,'Pengembangan Materi Pelajaran Berkarakter Konservasi/Lingkungan','6.3',2021,NULL,NULL,'2021-04-17 21:59:37','2021-04-17 21:59:37',7,2,1),(39,'Peraturan Sekolah Tentang Penyelamatan Lingkungan','6.4',2021,NULL,NULL,'2021-04-17 22:00:10','2021-04-17 22:00:10',7,2,1),(40,'Penggunaan Listrik Rata-Rata Perbulan','2.3',2021,NULL,NULL,'2021-04-17 22:00:15','2021-04-17 22:00:15',3,2,1),(41,'Jumlah Judul Buku yang Berkaitan dengan Lingkungan','6.5',2021,NULL,NULL,'2021-04-17 22:00:53','2021-04-17 22:00:53',7,2,1),(42,'Kerjasama dengan Instansi Lain Dalam Hal Pengembangan Energi Terbarukan di Sekolah','2.4',2021,NULL,NULL,'2021-04-17 22:01:01','2021-04-17 22:01:01',3,2,1),(43,'Prestasi Kesiswaan di Bidang Lingkungan dalam 3 Tahun','6.6',2021,NULL,NULL,'2021-04-17 22:01:32','2021-04-17 22:01:32',7,2,1),(44,'Penugasan Personil yang Membawahi Energi di Sekolah','2.5',2021,NULL,NULL,'2021-04-17 22:01:51','2021-04-17 22:01:51',3,2,1),(45,'Satuan Tugas/Tim/Gugus di Sekolah Terkait Lingkungan','6.7',2021,NULL,NULL,'2021-04-17 22:02:32','2021-04-17 22:02:32',7,2,1),(46,'Mengikuti atau Menyelenggarakan Seminar (webinar) Sekolah Hemat Energi','2.6',2021,NULL,NULL,'2021-04-17 22:02:36','2021-04-17 22:02:36',3,2,1),(47,'Ekstrakurikuler Siswa Bercirikan  Lingkungan','6.8',2021,NULL,NULL,'2021-04-17 22:03:13','2021-04-17 22:03:13',7,2,1),(48,'Peraturan Tata Kelola Energi','2.7',2021,NULL,NULL,'2021-04-17 22:03:28','2021-04-17 22:03:28',3,2,1),(49,'Kampanye Peduli Energi','2.8',2021,NULL,NULL,'2021-04-17 22:04:05','2021-04-17 22:04:05',3,2,1),(50,'Komunitas Siswa Bercirikan Lingkungan dengan Pembinaan Intensif','6.9',2021,NULL,NULL,'2021-04-17 22:04:10','2021-04-17 22:04:10',7,2,1),(51,'Jumlah Workshop/Seminar Bertema Lingkungan','6.10',2021,NULL,NULL,'2021-04-17 22:04:38','2021-04-17 22:04:38',7,2,1),(52,'Pengolahan Sampah Organik (ranting/daun/kayu) Menjadi Kompos','3.2',2021,NULL,NULL,'2021-04-17 22:05:46','2021-04-17 22:05:46',4,3,1),(53,'Pengolahan Sampah Anorganik (plastik/logam/kertas)','3.3',2021,NULL,NULL,'2021-04-17 22:06:23','2021-04-17 22:06:23',4,3,1),(54,'Pemanfaatan Kembali (reuse) Sampah Organik','3.4',2021,NULL,NULL,'2021-04-17 22:07:11','2021-04-17 22:07:11',4,2,1),(55,'Pemanfaatan Kembali (reuse) Sampah Anorganik','3.5',2021,NULL,NULL,'2021-04-17 22:07:41','2021-04-17 22:07:41',4,2,1),(56,'Alat Pengolahan Sampah','3.6',2021,NULL,NULL,'2021-04-17 22:08:13','2021-04-17 22:08:13',4,2,1),(57,'Armada Pengangkut Sampah','3.7',2021,NULL,NULL,'2021-04-17 22:08:45','2021-04-17 22:08:45',4,2,1),(58,'Produk Unggulan yang Dihasilkan Dalam Hal Pengelolaan Sampah','3.8',2021,NULL,NULL,'2021-04-17 22:09:30','2021-04-17 22:09:30',4,2,1),(59,'Peraturan Tata Kelola Sampah','3.9',2021,NULL,NULL,'2021-04-17 22:10:01','2021-04-17 22:10:01',4,2,1),(60,'Kampanye Peduli Sampah','3.10',2021,NULL,NULL,'2021-04-17 22:10:30','2021-04-17 22:10:30',4,2,1);
/*!40000 ALTER TABLE `indikator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `isian`
--

DROP TABLE IF EXISTS `isian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `isian` (
  `id_isian` int unsigned NOT NULL AUTO_INCREMENT,
  `isian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sub_indikator` bigint unsigned NOT NULL,
  `id_sekolah` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_isian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `isian`
--

LOCK TABLES `isian` WRITE;
/*!40000 ALTER TABLE `isian` DISABLE KEYS */;
/*!40000 ALTER TABLE `isian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kriteria_penilaian`
--

DROP TABLE IF EXISTS `kriteria_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kriteria_penilaian` (
  `id_kriteria` int unsigned NOT NULL AUTO_INCREMENT,
  `id_indikator` int unsigned NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`),
  KEY `kriteria_penilaian_id_indikator_foreign` (`id_indikator`),
  CONSTRAINT `kriteria_penilaian_id_indikator_foreign` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria_penilaian`
--

LOCK TABLES `kriteria_penilaian` WRITE;
/*!40000 ALTER TABLE `kriteria_penilaian` DISABLE KEYS */;
INSERT INTO `kriteria_penilaian` VALUES (5,2,'>per bulan',1,NULL,'2021-04-17 21:29:03','2021-04-17 21:29:03'),(9,1,'<20',1,NULL,'2021-04-17 22:21:50','2021-04-17 22:21:50'),(10,1,'20-35',2,NULL,'2021-04-17 22:24:34','2021-04-17 22:24:34'),(11,1,'>35-50',3,NULL,'2021-04-17 22:25:38','2021-04-17 22:25:38'),(12,1,'>50',4,NULL,'2021-04-17 22:27:44','2021-04-17 22:27:44'),(13,6,'Beton',1,NULL,'2021-04-17 22:30:57','2021-04-17 22:30:57'),(14,6,'Aspal',2,NULL,'2021-04-17 22:36:35','2021-04-17 22:36:35'),(15,6,'Paving',3,NULL,'2021-04-17 22:37:00','2021-04-17 22:37:00'),(16,6,'Grass blok / Tanah',4,NULL,'2021-04-17 22:37:25','2021-04-17 22:37:25'),(17,8,'<10',1,NULL,'2021-04-17 22:37:48','2021-04-17 22:37:48'),(18,8,'10-30',2,NULL,'2021-04-17 22:37:59','2021-04-17 22:37:59'),(19,8,'30-50',3,NULL,'2021-04-17 22:38:18','2021-04-17 22:38:18'),(20,8,'>50',4,NULL,'2021-04-17 22:39:38','2021-04-17 22:39:38'),(21,3,'Sumur dalam',1,NULL,'2021-04-17 22:39:42','2021-04-17 22:39:42'),(22,10,'>60',1,NULL,'2021-04-17 22:40:28','2021-04-17 22:40:28'),(23,3,'Sumur Dangkal',2,NULL,'2021-04-17 22:40:38','2021-04-17 22:40:38'),(24,10,'40-60',2,NULL,'2021-04-17 22:40:47','2021-04-17 22:40:47'),(25,3,'PDAM',3,NULL,'2021-04-17 22:40:55','2021-04-17 22:40:55'),(26,10,'20-40',3,NULL,'2021-04-17 22:40:59','2021-04-17 22:40:59'),(27,10,'<20',4,NULL,'2021-04-17 22:41:15','2021-04-17 22:41:15'),(28,3,'Alternatif (air hujan/ sungai)',4,NULL,'2021-04-17 22:41:18','2021-04-17 22:41:18'),(29,4,'Peringatan',1,NULL,'2021-04-17 22:42:22','2021-04-17 22:42:22'),(30,4,'Kontrol meteran',2,NULL,'2021-04-17 22:42:40','2021-04-17 22:42:40'),(31,4,'Batasan kuota',3,NULL,'2021-04-17 22:43:02','2021-04-17 22:43:02'),(32,4,'Otomatisasi',4,NULL,'2021-04-17 22:43:21','2021-04-17 22:43:21'),(33,5,'< 50',1,NULL,'2021-04-17 22:43:45','2021-04-17 22:43:45'),(34,5,'50 – 200',2,NULL,'2021-04-17 22:44:06','2021-04-17 22:44:06'),(35,11,'>40',1,NULL,'2021-04-17 22:44:11','2021-04-17 22:44:11'),(36,5,'>200-300',3,NULL,'2021-04-17 22:44:32','2021-04-17 22:44:32'),(37,11,'>25-40',2,NULL,'2021-04-17 22:44:40','2021-04-17 22:44:40'),(38,5,'> 300',4,NULL,'2021-04-17 22:44:51','2021-04-17 22:44:51'),(39,11,'10-25',3,NULL,'2021-04-17 22:44:51','2021-04-17 22:44:51'),(40,11,'<10',4,NULL,'2021-04-17 22:45:13','2021-04-17 22:45:13'),(43,12,'<20',1,NULL,'2021-04-17 22:46:02','2021-04-17 22:46:02'),(45,12,'20-40',2,NULL,'2021-04-17 22:46:24','2021-04-17 22:46:24'),(47,7,'Tidak Tersedia',1,NULL,'2021-04-17 22:48:09','2021-04-17 22:48:09'),(48,12,'40-60',3,NULL,'2021-04-17 22:48:33','2021-04-17 22:48:33'),(49,7,'Langsung Pakai',2,NULL,'2021-04-17 22:48:37','2021-04-17 22:48:37'),(50,7,'Dengan Pengendapan',3,NULL,'2021-04-17 22:48:50','2021-04-17 22:48:50'),(51,12,'>60',4,NULL,'2021-04-17 22:48:56','2021-04-17 22:48:56'),(52,7,'Dengan Filtrasi',4,NULL,'2021-04-17 22:49:00','2021-04-17 22:49:00'),(53,9,'1',1,NULL,'2021-04-17 22:49:18','2021-04-17 22:49:18'),(54,9,'2',2,NULL,'2021-04-17 22:49:25','2021-04-17 22:49:25'),(55,14,'>60',1,NULL,'2021-04-17 22:49:33','2021-04-17 22:49:33'),(56,9,'3',3,NULL,'2021-04-17 22:49:37','2021-04-17 22:49:37'),(57,14,'40-60',2,NULL,'2021-04-17 22:49:54','2021-04-17 22:49:54'),(58,9,'> 3',4,NULL,'2021-04-17 22:49:56','2021-04-17 22:49:56'),(59,14,'20-40',3,NULL,'2021-04-17 22:50:12','2021-04-17 22:50:12'),(60,13,'< 5',1,NULL,'2021-04-17 22:50:18','2021-04-17 22:50:18'),(61,14,'<20',4,NULL,'2021-04-17 22:50:28','2021-04-17 22:50:28'),(62,16,'<5',1,NULL,'2021-04-17 22:50:43','2021-04-17 22:50:43'),(63,16,'5-10',2,NULL,'2021-04-17 22:50:55','2021-04-17 22:50:55'),(64,13,'5 – 10',2,NULL,'2021-04-17 22:50:57','2021-04-17 22:50:57'),(65,16,'10-20',3,NULL,'2021-04-17 22:51:08','2021-04-17 22:51:08'),(66,16,'>20',4,NULL,'2021-04-17 22:51:22','2021-04-17 22:51:22'),(67,13,'>10-15',3,NULL,'2021-04-17 22:51:30','2021-04-17 22:51:30'),(68,17,'<5',1,NULL,'2021-04-17 22:51:35','2021-04-17 22:51:35'),(69,17,'5-10',2,NULL,'2021-04-17 22:51:56','2021-04-17 22:51:56'),(70,13,'> 15',4,NULL,'2021-04-17 22:51:57','2021-04-17 22:51:57'),(72,15,'Tidak Tersedia',1,NULL,'2021-04-17 22:52:26','2021-04-17 22:52:26'),(73,15,'Tersedia < 30',2,NULL,'2021-04-17 22:52:49','2021-04-17 22:52:49'),(74,17,'10-20',3,NULL,'2021-04-17 22:52:57','2021-04-17 22:52:57'),(75,17,'>20',4,NULL,'2021-04-17 22:53:09','2021-04-17 22:53:09'),(76,19,'Tidak Ada',1,NULL,'2021-04-17 22:53:23','2021-04-17 22:53:23'),(77,15,'Tersedia 30 - 50',3,NULL,'2021-04-17 22:53:25','2021-04-17 22:53:25'),(78,19,'Draft',2,NULL,'2021-04-17 22:53:35','2021-04-17 22:53:35'),(79,19,'Dokumen',3,NULL,'2021-04-17 22:53:46','2021-04-17 22:53:46'),(80,15,'Tersedia',4,NULL,'2021-04-17 22:53:48','2021-04-17 22:53:48'),(81,19,'Masuk Sistem Informasi',4,NULL,'2021-04-17 22:54:13','2021-04-17 22:54:13'),(82,20,'Tidak Ada',1,NULL,'2021-04-17 22:54:27','2021-04-17 22:54:27'),(83,20,'Terbengkalai',2,NULL,'2021-04-17 22:54:41','2021-04-17 22:54:41'),(84,20,'Terawat dan Tidak Aktif',3,NULL,'2021-04-17 22:55:09','2021-04-17 22:55:09'),(85,18,'Tidak ada',1,NULL,'2021-04-17 22:55:21','2021-04-17 22:55:21'),(86,20,'Terawat dan Aktif',4,NULL,'2021-04-17 22:55:25','2021-04-17 22:55:25'),(87,22,'Tidak Ada',1,NULL,'2021-04-17 22:55:37','2021-04-17 22:55:37'),(88,18,'Ada',2,NULL,'2021-04-17 22:55:39','2021-04-17 22:55:39'),(89,22,'Ada',4,NULL,'2021-04-17 22:55:52','2021-04-17 22:55:52'),(90,24,'Tidak Ada',1,NULL,'2021-04-17 22:56:05','2021-04-17 22:56:05'),(91,21,'Tidak ada',1,NULL,'2021-04-17 22:56:13','2021-04-17 22:56:13'),(92,24,'Draft',2,NULL,'2021-04-17 22:56:14','2021-04-17 22:56:14'),(93,24,'Dokumen',3,NULL,'2021-04-17 22:56:22','2021-04-17 22:56:22'),(94,21,'Draft',2,NULL,'2021-04-17 22:56:36','2021-04-17 22:56:36'),(95,21,'Dokumen',3,NULL,'2021-04-17 22:56:48','2021-04-17 22:56:48'),(96,24,'Tersosialisasi (banner, poster, stiker, dll)',4,NULL,'2021-04-17 22:56:55','2021-04-17 22:56:55'),(97,25,'Tidak Ada',1,NULL,'2021-04-17 22:57:06','2021-04-17 22:57:06'),(98,25,'Draft',2,NULL,'2021-04-17 22:57:12','2021-04-17 22:57:12'),(99,21,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 22:57:17','2021-04-17 22:57:17'),(100,25,'Dokumen',3,NULL,'2021-04-17 22:57:22','2021-04-17 22:57:22'),(101,25,'Tersosialisasi (banner, poster, stiker, dll)',4,NULL,'2021-04-17 22:57:34','2021-04-17 22:57:34'),(102,23,'Tidak ada',1,NULL,'2021-04-17 22:57:43','2021-04-17 22:57:43'),(103,23,'Draft',2,NULL,'2021-04-17 22:57:51','2021-04-17 22:57:51'),(104,23,'Dokumen',3,NULL,'2021-04-17 22:58:01','2021-04-17 22:58:01'),(105,29,'Tidak Ada',1,NULL,'2021-04-17 22:58:03','2021-04-17 22:58:03'),(106,23,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 22:58:15','2021-04-17 22:58:15'),(107,29,'Kontrol Meter',2,NULL,'2021-04-17 22:58:16','2021-04-17 22:58:16'),(108,29,'Pembatasan Penggunaan Alat Listrik',3,NULL,'2021-04-17 22:58:40','2021-04-17 22:58:40'),(109,29,'Alat Listrik Hemat Energi',4,NULL,'2021-04-17 22:58:59','2021-04-17 22:58:59'),(110,31,'Meningkat',1,NULL,'2021-04-17 22:59:11','2021-04-17 22:59:11'),(111,33,'Tidak ada',1,NULL,'2021-04-17 22:59:13','2021-04-17 22:59:13'),(112,33,'Draft',2,NULL,'2021-04-17 22:59:22','2021-04-17 22:59:22'),(113,31,'Cenderung Tetap',2,NULL,'2021-04-17 22:59:23','2021-04-17 22:59:23'),(114,33,'Dokumen',3,NULL,'2021-04-17 22:59:32','2021-04-17 22:59:32'),(115,31,'Sedikit Menurun',3,NULL,'2021-04-17 22:59:38','2021-04-17 22:59:38'),(116,33,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 22:59:50','2021-04-17 22:59:50'),(117,31,'Menurun Signifikan',4,NULL,'2021-04-17 22:59:52','2021-04-17 22:59:52'),(118,34,'Tidak ada',1,NULL,'2021-04-17 22:59:58','2021-04-17 22:59:58'),(119,34,'Draft',2,NULL,'2021-04-17 23:00:04','2021-04-17 23:00:04'),(120,34,'Dokumen',3,NULL,'2021-04-17 23:00:12','2021-04-17 23:00:12'),(121,40,'Tidak Tersedia Data',1,NULL,'2021-04-17 23:00:19','2021-04-17 23:00:19'),(122,34,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 23:00:21','2021-04-17 23:00:21'),(123,40,'Tersedia Data',4,NULL,'2021-04-17 23:00:30','2021-04-17 23:00:30'),(124,35,'Tidak ada',1,NULL,'2021-04-17 23:00:37','2021-04-17 23:00:37'),(125,42,'Tidak Ada',1,NULL,'2021-04-17 23:00:43','2021-04-17 23:00:43'),(126,35,'Draft',2,NULL,'2021-04-17 23:00:46','2021-04-17 23:00:46'),(127,42,'Ada',4,NULL,'2021-04-17 23:00:55','2021-04-17 23:00:55'),(128,35,'Dokumen',3,NULL,'2021-04-17 23:00:58','2021-04-17 23:00:58'),(129,44,'Tidak Ada',1,NULL,'2021-04-17 23:01:04','2021-04-17 23:01:04'),(130,35,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 23:01:07','2021-04-17 23:01:07'),(131,44,'Sebagai Tugas Sampingan Saja',2,NULL,'2021-04-17 23:01:35','2021-04-17 23:01:35'),(132,26,'> 40',1,NULL,'2021-04-17 23:02:03','2021-04-17 23:02:03'),(133,44,'Melekat Tata Usaha Bagian Sarpras',3,NULL,'2021-04-17 23:02:09','2021-04-17 23:02:09'),(134,44,'Personil Khusus (Tim Hemat Energi)',4,NULL,'2021-04-17 23:02:41','2021-04-17 23:02:41'),(135,26,'>25 - 40',2,NULL,'2021-04-17 23:02:46','2021-04-17 23:02:46'),(136,26,'10 - 25',3,NULL,'2021-04-17 23:03:14','2021-04-17 23:03:14'),(137,46,'Tidak Ada Program',1,NULL,'2021-04-17 23:03:14','2021-04-17 23:03:14'),(138,26,'< 10',4,NULL,'2021-04-17 23:03:29','2021-04-17 23:03:29'),(139,46,'Ada Rencana',2,NULL,'2021-04-17 23:03:40','2021-04-17 23:03:40'),(140,27,'> 60',1,NULL,'2021-04-17 23:03:47','2021-04-17 23:03:47'),(141,46,'Terlaksana 1 Kali',3,NULL,'2021-04-17 23:03:57','2021-04-17 23:03:57'),(142,27,'> 40 - 60',2,NULL,'2021-04-17 23:04:10','2021-04-17 23:04:10'),(143,46,'Terlaksana Lebih 1 Kali',4,NULL,'2021-04-17 23:04:14','2021-04-17 23:04:14'),(144,48,'Tidak Ada',1,NULL,'2021-04-17 23:04:25','2021-04-17 23:04:25'),(145,48,'Draft',2,NULL,'2021-04-17 23:04:33','2021-04-17 23:04:33'),(146,27,'20 - 40',3,NULL,'2021-04-17 23:04:37','2021-04-17 23:04:37'),(147,48,'Dokumen',3,NULL,'2021-04-17 23:04:41','2021-04-17 23:04:41'),(148,48,'Tersosialisasi (banner, poster, stiker, dll)',4,NULL,'2021-04-17 23:04:51','2021-04-17 23:04:51'),(149,27,'< 20',4,NULL,'2021-04-17 23:04:54','2021-04-17 23:04:54'),(150,49,'Tidak Ada',1,NULL,'2021-04-17 23:05:01','2021-04-17 23:05:01'),(151,49,'Draft',2,NULL,'2021-04-17 23:05:09','2021-04-17 23:05:09'),(152,28,'< 5',1,NULL,'2021-04-17 23:05:12','2021-04-17 23:05:12'),(153,49,'Dokumen',3,NULL,'2021-04-17 23:05:18','2021-04-17 23:05:18'),(155,28,'5 - 10',2,NULL,'2021-04-17 23:05:41','2021-04-17 23:05:41'),(156,49,'Tersosialisasi (banner, poster, stiker, car freeday, dll)',4,NULL,'2021-04-17 23:06:06','2021-04-17 23:06:06'),(157,28,'> 10 - 20',3,NULL,'2021-04-17 23:06:09','2021-04-17 23:06:09'),(158,28,'> 20',4,NULL,'2021-04-17 23:06:24','2021-04-17 23:06:24'),(159,2,'2-3 Minggu',2,NULL,'2021-04-17 23:06:51','2021-04-17 23:06:51'),(160,30,'< 10',1,NULL,'2021-04-17 23:06:57','2021-04-17 23:06:57'),(161,2,'1 Minggu',3,NULL,'2021-04-17 23:07:02','2021-04-17 23:07:02'),(162,2,'1-3 Hari',4,NULL,'2021-04-17 23:07:15','2021-04-17 23:07:15'),(163,30,'10 - 30',2,NULL,'2021-04-17 23:07:21','2021-04-17 23:07:21'),(164,52,'>3 Bulan',1,NULL,'2021-04-17 23:07:30','2021-04-17 23:07:30'),(165,52,'2-3 Bulan',2,NULL,'2021-04-17 23:07:41','2021-04-17 23:07:41'),(166,52,'1 Bulan',3,NULL,'2021-04-17 23:07:48','2021-04-17 23:07:48'),(167,52,'<1 Bulan',4,NULL,'2021-04-17 23:07:58','2021-04-17 23:07:58'),(168,30,'> 30 - 50',3,NULL,'2021-04-17 23:08:01','2021-04-17 23:08:01'),(169,53,'>3 Bulan',1,NULL,'2021-04-17 23:08:08','2021-04-17 23:08:08'),(170,30,'> 50',4,NULL,'2021-04-17 23:08:17','2021-04-17 23:08:17'),(171,53,'2-3 Bulan',2,NULL,'2021-04-17 23:08:18','2021-04-17 23:08:18'),(172,53,'1 Bulan',3,NULL,'2021-04-17 23:08:28','2021-04-17 23:08:28'),(173,32,'1',1,NULL,'2021-04-17 23:08:31','2021-04-17 23:08:31'),(174,53,'<1 Bulan',4,NULL,'2021-04-17 23:08:38','2021-04-17 23:08:38'),(175,32,'2',2,NULL,'2021-04-17 23:08:41','2021-04-17 23:08:41'),(176,32,'3',3,NULL,'2021-04-17 23:08:48','2021-04-17 23:08:48'),(177,54,'Tidak Ada',1,NULL,'2021-04-17 23:08:48','2021-04-17 23:08:48'),(178,54,'Sebagian',2,NULL,'2021-04-17 23:08:58','2021-04-17 23:08:58'),(179,32,'> 3',4,NULL,'2021-04-17 23:08:58','2021-04-17 23:08:58'),(180,54,'Penuh',3,NULL,'2021-04-17 23:09:07','2021-04-17 23:09:07'),(181,54,'Penuh dan Dikembangkan',4,NULL,'2021-04-17 23:09:30','2021-04-17 23:09:30'),(182,55,'Tidak Ada',1,NULL,'2021-04-17 23:10:11','2021-04-17 23:10:11'),(183,55,'Sebagian',2,NULL,'2021-04-17 23:10:19','2021-04-17 23:10:19'),(184,55,'Penuh',3,NULL,'2021-04-17 23:10:27','2021-04-17 23:10:27'),(185,55,'Penuh dan Dikembangkan',4,NULL,'2021-04-17 23:10:43','2021-04-17 23:10:43'),(186,36,'Tidak Ada Data',1,NULL,'2021-04-17 23:10:52','2021-04-17 23:10:52'),(187,56,'Tidak Ada',1,NULL,'2021-04-17 23:10:56','2021-04-17 23:10:56'),(188,36,'Ada Data',2,NULL,'2021-04-17 23:11:06','2021-04-17 23:11:06'),(189,56,'Ada dan Tidak Beroperasi',2,NULL,'2021-04-17 23:11:19','2021-04-17 23:11:19'),(190,37,'Tidak ada',1,NULL,'2021-04-17 23:11:35','2021-04-17 23:11:35'),(191,37,'Draft',2,NULL,'2021-04-17 23:11:43','2021-04-17 23:11:43'),(192,56,'Ada Dengan Operasional Kurang Optimal',3,NULL,'2021-04-17 23:11:47','2021-04-17 23:11:47'),(193,37,'Dokumen',3,NULL,'2021-04-17 23:11:52','2021-04-17 23:11:52'),(194,37,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 23:12:01','2021-04-17 23:12:01'),(195,56,'Ada Dengan Operasional Optimal',4,NULL,'2021-04-17 23:12:13','2021-04-17 23:12:13'),(196,57,'Tidak Ada',1,NULL,'2021-04-17 23:12:26','2021-04-17 23:12:26'),(197,57,'Ada dan Tidak Beroperasi',2,NULL,'2021-04-17 23:12:37','2021-04-17 23:12:37'),(198,38,'Tidak ada',1,NULL,'2021-04-17 23:12:47','2021-04-17 23:12:47'),(199,57,'Ada Dengan Operasional Kurang Optimal',3,NULL,'2021-04-17 23:12:52','2021-04-17 23:12:52'),(200,38,'Draft',2,NULL,'2021-04-17 23:12:54','2021-04-17 23:12:54'),(201,38,'Dokumen',3,NULL,'2021-04-17 23:13:01','2021-04-17 23:13:01'),(202,57,'Ada Dengan Operasional Optimal',4,NULL,'2021-04-17 23:13:04','2021-04-17 23:13:04'),(204,58,'Tidak Ada',1,NULL,'2021-04-17 23:13:14','2021-04-17 23:13:14'),(205,38,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 23:13:14','2021-04-17 23:13:14'),(206,58,'Ada',4,NULL,'2021-04-17 23:13:24','2021-04-17 23:13:24'),(207,39,'Tidak ada',1,NULL,'2021-04-17 23:13:44','2021-04-17 23:13:44'),(208,39,'Draft',2,NULL,'2021-04-17 23:13:53','2021-04-17 23:13:53'),(209,39,'Dokumen',3,NULL,'2021-04-17 23:14:04','2021-04-17 23:14:04'),(210,39,'Tersosialisasi (banner, poster, stiker dll)',4,NULL,'2021-04-17 23:14:13','2021-04-17 23:14:13'),(211,59,'Tidak Ada',1,NULL,'2021-04-17 23:14:29','2021-04-17 23:14:29'),(212,59,'Draft',2,NULL,'2021-04-17 23:14:38','2021-04-17 23:14:38'),(213,59,'Dokumen',3,NULL,'2021-04-17 23:14:45','2021-04-17 23:14:45'),(214,41,'< 10',1,NULL,'2021-04-17 23:14:53','2021-04-17 23:14:53'),(215,59,'Tersosialisasi (banner, poster, stiker, dll)',4,NULL,'2021-04-17 23:15:01','2021-04-17 23:15:01'),(216,60,'Tidak Ada',1,NULL,'2021-04-17 23:15:19','2021-04-17 23:15:19'),(217,60,'Draft',2,NULL,'2021-04-17 23:15:28','2021-04-17 23:15:28'),(218,60,'Dokumen',3,NULL,'2021-04-17 23:15:33','2021-04-17 23:15:33'),(219,60,'Tersosialisasi (banner, poster, stiker, car freeday dll)',4,NULL,'2021-04-17 23:15:55','2021-04-17 23:15:55'),(220,51,'0',1,NULL,'2021-04-17 23:16:45','2021-04-17 23:16:45'),(221,51,'1',2,NULL,'2021-04-17 23:16:52','2021-04-17 23:16:52'),(222,51,'2',3,NULL,'2021-04-17 23:17:02','2021-04-17 23:17:02'),(223,51,'>2',4,NULL,'2021-04-17 23:17:11','2021-04-17 23:17:11'),(224,50,'Tidak Ada',1,NULL,'2021-04-17 23:17:21','2021-04-17 23:17:21'),(225,50,'Ada',4,NULL,'2021-04-17 23:17:28','2021-04-17 23:17:28'),(226,41,'10-30',2,NULL,'2021-04-17 23:17:47','2021-04-17 23:17:47'),(227,47,'Tidak Ada',1,NULL,'2021-04-17 23:17:47','2021-04-17 23:17:47'),(228,47,'Embrio',2,NULL,'2021-04-17 23:17:57','2021-04-17 23:17:57'),(229,47,'Tingkat Sekolah',3,NULL,'2021-04-17 23:18:08','2021-04-17 23:18:08'),(230,41,'>30 - 50',3,NULL,'2021-04-17 23:18:08','2021-04-17 23:18:08'),(231,41,'> 50',4,NULL,'2021-04-17 23:18:28','2021-04-17 23:18:28'),(232,47,'Berperan Dalam Kegiatan Luar Sekolah',4,NULL,'2021-04-17 23:18:31','2021-04-17 23:18:31'),(233,45,'Tidak Ada',1,NULL,'2021-04-17 23:18:42','2021-04-17 23:18:42'),(234,43,'< 2',1,NULL,'2021-04-17 23:18:49','2021-04-17 23:18:49'),(235,45,'Ada',4,NULL,'2021-04-17 23:18:50','2021-04-17 23:18:50'),(236,43,'2 - 3',2,NULL,'2021-04-17 23:19:16','2021-04-17 23:19:16'),(237,43,'4 - 5',3,NULL,'2021-04-17 23:20:42','2021-04-17 23:20:42'),(238,43,'> 5',4,NULL,'2021-04-17 23:21:08','2021-04-17 23:21:08');
/*!40000 ALTER TABLE `kriteria_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_04_01_043317_create_aspek_table',1),(5,'2021_04_01_044254_create_satuan_table',1),(6,'2021_04_01_044314_create_indikator_table',1),(7,'2021_04_01_044359_create_kriteria_penilaian_table',1),(8,'2021_04_01_044423_create_isian_table',1),(9,'2021_04_01_044443_create_bukti_table',1),(10,'2021_04_01_044502_create_nilai_table',1),(11,'2021_04_01_044524_create_sub_indikator_table',1),(12,'2021_04_01_074646_create_sekolah_table',1),(13,'2021_04_01_212550_create_permission_tables',1),(14,'2021_04_07_171453_create_periode_table',1),(15,'2021_04_08_201850_create_nilai_juri_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nilai` (
  `id_nilai` int unsigned NOT NULL AUTO_INCREMENT,
  `id_sekolah` int NOT NULL,
  `nilai` int DEFAULT NULL,
  `nilai_juri` int DEFAULT NULL,
  `id_juri` int DEFAULT NULL,
  `tahun` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_indikator` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai_juri`
--

DROP TABLE IF EXISTS `nilai_juri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nilai_juri` (
  `id_nilai_juri` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_indikator` bigint unsigned NOT NULL,
  `id_sekolah` bigint unsigned NOT NULL,
  `id_juri` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_nilai_juri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai_juri`
--

LOCK TABLES `nilai_juri` WRITE;
/*!40000 ALTER TABLE `nilai_juri` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_juri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periode`
--

DROP TABLE IF EXISTS `periode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periode` (
  `id_periode` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_close` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periode`
--

LOCK TABLES `periode` WRITE;
/*!40000 ALTER TABLE `periode` DISABLE KEYS */;
INSERT INTO `periode` VALUES (1,'Juni 2021','P1','20210714',1,NULL,'2021-04-17 20:46:30','2021-04-17 20:46:30');
/*!40000 ALTER TABLE `periode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2021-04-17 20:46:30','2021-04-17 20:46:30'),(2,'juri','web','2021-04-17 20:46:30','2021-04-17 20:46:30'),(3,'operator sekolah','web','2021-04-17 20:46:30','2021-04-17 20:46:30');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `satuan` (
  `id_satuan` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `simbol` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan`
--

LOCK TABLES `satuan` WRITE;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` VALUES (1,'persen luas','%',NULL,'2021-04-17 20:46:30','2021-04-17 20:46:30'),(2,'Ada atau Tidak Ada',NULL,NULL,'2021-04-17 21:18:22','2021-04-17 21:18:22'),(3,'Per Kegiatan','/keg',NULL,'2021-04-17 21:23:43','2021-04-17 21:23:43'),(5,'Liter','Liter',NULL,'2021-04-17 21:40:57','2021-04-17 21:40:57');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sekolah`
--

DROP TABLE IF EXISTS `sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sekolah` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `npsn` int NOT NULL,
  `file_npsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_operator` int NOT NULL,
  `email_operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letak_sekolah` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_peta_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_foto_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_total` int NOT NULL,
  `file_masterplan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_area` int NOT NULL,
  `file_luas_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_area_hijau` int NOT NULL,
  `file_luas_area_hijau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_guru` int NOT NULL,
  `file_guru_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_siswa` int NOT NULL,
  `file_jumlah_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sekolah_email_operator_unique` (`email_operator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sekolah`
--

LOCK TABLES `sekolah` WRITE;
/*!40000 ALTER TABLE `sekolah` DISABLE KEYS */;
/*!40000 ALTER TABLE `sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_indikator`
--

DROP TABLE IF EXISTS `sub_indikator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_indikator` (
  `id_sub_indikator` int unsigned NOT NULL AUTO_INCREMENT,
  `id_indikator` int unsigned NOT NULL,
  `id_satuan` int unsigned NOT NULL,
  `nama_sub_indikator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL,
  `tahun` int NOT NULL,
  `is_pembagi` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sub_indikator`),
  KEY `sub_indikator_id_indikator_foreign` (`id_indikator`),
  KEY `sub_indikator_id_satuan_foreign` (`id_satuan`),
  CONSTRAINT `sub_indikator_id_indikator_foreign` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sub_indikator_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_indikator`
--

LOCK TABLES `sub_indikator` WRITE;
/*!40000 ALTER TABLE `sub_indikator` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_indikator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_sekolah` bigint unsigned DEFAULT NULL,
  `id_periode` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,1,'Admin','admin@mail.com',NULL,'$2y$10$CLZ3LrOXvp/jK03Nac9B.ema4roZ2iO3bizxaAMHRnDbr.ArFWlnG',NULL,'2021-04-17 20:46:30','2021-04-19 07:10:17'),(2,NULL,1,'Juri','juri@mail.com',NULL,'$2y$10$hsMM7G4Ss0Ka3VP5DaLpkuOHVlchN6a/HsCDKASDfkXGOZXdgJLCG',NULL,'2021-04-17 20:46:30','2021-04-18 20:15:58'),(3,NULL,1,'Operator Sekolah','os@mail.com',NULL,'$2y$10$YUAZ0JuQWAHCdswu.5IGG.tPrAj4f9jrIY6viDuFGGb49bPSQ.94K',NULL,'2021-04-17 20:46:30','2021-04-18 20:16:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-19  1:46:31
