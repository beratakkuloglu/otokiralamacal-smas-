-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 18 May 2026, 08:57:18
-- Sunucu sürümü: 5.7.15-log
-- PHP Sürümü: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `online_arac_kiralama`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_araclar`
--

CREATE TABLE `tbl_araclar` (
  `arac_id` int(11) NOT NULL,
  `marka` varchar(30) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL,
  `model_yili` smallint(6) DEFAULT NULL,
  `yakit_tipi` varchar(10) DEFAULT NULL,
  `vites_tipi` varchar(10) DEFAULT NULL,
  `fiyat` double DEFAULT NULL,
  `musait_mi` varchar(1) DEFAULT 'E',
  `resim_var_mi` varchar(1) NOT NULL DEFAULT 'H'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_araclar`
--

INSERT INTO `tbl_araclar` (`arac_id`, `marka`, `model`, `model_yili`, `yakit_tipi`, `vites_tipi`, `fiyat`, `musait_mi`, `resim_var_mi`) VALUES
(1, 'ford', 'focus', 2017, 'Benzin', 'Manuel', 9500, 'E', 'E'),
(2, 'peugeot', '3008', 2022, 'Dizel', 'Otomatik', 11000, 'E', 'E'),
(3, 'Renault', 'Clio', 2021, 'Dizel', 'Otomatik', 9600, 'E', 'E'),
(5, 'Renault', 'Megane', 2022, 'Benzin', 'Otomatik', 77000, 'E', 'E');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_rezervasyonlar`
--

CREATE TABLE `tbl_rezervasyonlar` (
  `rez_id` int(11) NOT NULL,
  `rez_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alma_tarihi` date NOT NULL,
  `teslim_tarihi` date NOT NULL,
  `iptal_tarihi` date NOT NULL,
  `tutar` float NOT NULL,
  `arac_id` int(11) NOT NULL,
  `tckimlik` varchar(11) NOT NULL,
  `durumu` varchar(20) NOT NULL DEFAULT 'onay bekliyor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_rezervasyonlar`
--

INSERT INTO `tbl_rezervasyonlar` (`rez_id`, `rez_tarihi`, `alma_tarihi`, `teslim_tarihi`, `iptal_tarihi`, `tutar`, `arac_id`, `tckimlik`, `durumu`) VALUES
(1, '0000-00-00 00:00:00', '2026-05-18', '2026-05-22', '0000-00-00', 38000, 1, '111', 'onay bekliyor'),
(3, '0000-00-00 00:00:00', '2026-06-02', '2026-06-05', '0000-00-00', 33000, 2, '222', 'onay bekliyor'),
(4, '2026-05-18 08:50:02', '2026-05-25', '2026-05-27', '2026-05-18', 22000, 2, '333', 'İptal'),
(5, '2026-05-11 08:18:22', '2026-06-01', '2026-06-03', '0000-00-00', 19200, 3, '333', 'onay bekliyor');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_araclar`
--
ALTER TABLE `tbl_araclar`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `tbl_rezervasyonlar`
--
ALTER TABLE `tbl_rezervasyonlar`
  ADD PRIMARY KEY (`rez_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_araclar`
--
ALTER TABLE `tbl_araclar`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_rezervasyonlar`
--
ALTER TABLE `tbl_rezervasyonlar`
  MODIFY `rez_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
