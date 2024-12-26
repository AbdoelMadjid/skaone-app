-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: web-skaone
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kompetensi_keahlians`
--

DROP TABLE IF EXISTS `kompetensi_keahlians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kompetensi_keahlians` (
  `idkk` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idkk`),
  KEY `kompetensi_keahlians_id_bk_foreign` (`id_bk`),
  KEY `kompetensi_keahlians_id_pk_foreign` (`id_pk`),
  CONSTRAINT `kompetensi_keahlians_id_bk_foreign` FOREIGN KEY (`id_bk`) REFERENCES `bidang_keahlians` (`idbk`) ON DELETE CASCADE,
  CONSTRAINT `kompetensi_keahlians_id_pk_foreign` FOREIGN KEY (`id_pk`) REFERENCES `program_keahlians` (`idpk`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kompetensi_keahlians`
--

LOCK TABLES `kompetensi_keahlians` WRITE;
/*!40000 ALTER TABLE `kompetensi_keahlians` DISABLE KEYS */;
INSERT INTO `kompetensi_keahlians` VALUES ('411','10','1001','Rekayasa Perangkat Lunak','RPL',NULL,NULL),('421','10','1002','Teknik Komputer dan Jaringan','TKJ',NULL,NULL),('811','11','1101','Bisnis Digital','BD',NULL,NULL),('821','11','1102','Manajemen Perkantoran','MP',NULL,NULL),('833','11','1103','Akuntansi','AK',NULL,NULL);
/*!40000 ALTER TABLE `kompetensi_keahlians` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-26 11:53:44
