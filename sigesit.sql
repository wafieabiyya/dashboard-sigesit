-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.25-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk sigesit
CREATE DATABASE IF NOT EXISTS `sigesit` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sigesit`;

-- membuang struktur untuk table sigesit.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `password_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel sigesit.admin: ~0 rows (lebih kurang)
INSERT INTO `admin` (`id_admin`, `username`, `email_admin`, `password_admin`) VALUES
	(1, 'sigesit', 'sigesti@gmail.com', '12345');

-- membuang struktur untuk table sigesit.paket
CREATE TABLE IF NOT EXISTS `paket` (
  `id_kota` varchar(50) NOT NULL DEFAULT '0',
  `nama_kota` varchar(255) NOT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `qr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sigesit.paket: ~9 rows (lebih kurang)
INSERT INTO `paket` (`id_kota`, `nama_kota`, `jumlah_barang`, `qr`) VALUES
	('BDO', 'Bandung', 100, 'BDO.png'),
	('CGK', 'Jakarta', 100, 'CGK.png'),
	('DPS', 'Denpasar', 150, 'DPS.png'),
	('JOG', 'Yogyakarta', 300, 'JOG.PNG'),
	('MLG', 'Malang', 50, 'Malang.png'),
	('SOC', 'Solo', 90, 'SOC.png'),
	('SRG', 'Semarang', 310, 'SRG.png'),
	('SUB', 'Surabaya', 178, 'SUB.png'),
	('TGR', 'Tangerang', 190, 'TGR.png');

-- membuang struktur untuk table sigesit.pickup
CREATE TABLE IF NOT EXISTS `pickup` (
  `resi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kurir` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `plat_nomor` varchar(50) NOT NULL,
  `tujuan_paket` varchar(255) NOT NULL,
  `tujuan_paket_kedua` varchar(225) NOT NULL,
  `tujuan_paket_ketiga` varchar(225) NOT NULL,
  `jumlah_paket` int(11) NOT NULL,
  `jumlah_paket_kedua` int(11) NOT NULL,
  `jumlah_paket_ketiga` int(11) NOT NULL,
  `waktu_paket` datetime NOT NULL,
  PRIMARY KEY (`resi`),
  KEY `FK_pickup_paket` (`tujuan_paket`),
  KEY `FK_pickup_paket_2` (`tujuan_paket_kedua`),
  KEY `FK_pickup_paket_3` (`tujuan_paket_ketiga`),
  CONSTRAINT `FK_pickup_paket` FOREIGN KEY (`tujuan_paket`) REFERENCES `paket` (`id_kota`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_pickup_paket_2` FOREIGN KEY (`tujuan_paket_kedua`) REFERENCES `paket` (`id_kota`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_pickup_paket_3` FOREIGN KEY (`tujuan_paket_ketiga`) REFERENCES `paket` (`id_kota`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sigesit.pickup: ~2 rows (lebih kurang)
INSERT INTO `pickup` (`resi`, `nama_kurir`, `no_telepon`, `plat_nomor`, `tujuan_paket`, `tujuan_paket_kedua`, `tujuan_paket_ketiga`, `jumlah_paket`, `jumlah_paket_kedua`, `jumlah_paket_ketiga`, `waktu_paket`) VALUES
	(49, 'Jek Sparow Gow', '12313', 'GGemink12', 'BDO', 'JOG', 'SRG', 313, 111, 20, '2023-10-10 08:30:00'),
	(50, 'Jon', '12212', 'D 19019 AD', 'DPS', 'JOG', 'SOC', 122, 111, 90, '2023-10-10 08:30:00'),
	(51, 'Julian Alvarez', '08123', 'D 19019 AD', 'BDO', 'MLG', 'SUB', 90, 120, 10, '2023-10-10 08:30:11'),
	(52, 'uwaw', '12313', 'DD 334 INK', 'BDO', 'SOC', 'SRG', 90, 10, 9, '2000-12-12 09:30:12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
