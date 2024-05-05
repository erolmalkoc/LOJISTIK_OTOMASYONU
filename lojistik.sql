-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 May 2024, 18:24:04
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `lojistik`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faturalar`
--

CREATE TABLE `faturalar` (
  `fatura_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `odeme_durumu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `faturalar`
--

INSERT INTO `faturalar` (`fatura_id`, `siparis_id`, `odeme_durumu`) VALUES
(1, 1, 'Ödendi'),
(2, 2, 'Ödenmedi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kargo_takibi`
--

CREATE TABLE `kargo_takibi` (
  `takip_id` int(11) NOT NULL,
  `durum` varchar(30) NOT NULL,
  `tahmini_varis` date NOT NULL,
  `gercek_varis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `musteri_id` int(11) NOT NULL,
  `adi` varchar(30) NOT NULL,
  `soyadi` varchar(30) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `telefon` varchar(11) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`musteri_id`, `adi`, `soyadi`, `adres`, `telefon`, `mail`) VALUES
(1, 'metecan', 'çıkrıkçıoğlu', 'İstanbul', '05315855966', 'metecan@gmail.com'),
(2, 'ahmet', 'can', 'ankara', '05322698754', 'ahmet@gmail.com'),
(3, 'selin', 'yılmaz', 'sinop', '05478963254', 'selin@gmail.com'),
(4, 'aynur', 'gül', 'hatay', '05879635478', 'aynur@gmail.com'),
(5, 'erol', 'malkoç', 'kocaeli', '05050036661', 'erol@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `urun_agirligi` int(11) NOT NULL,
  `tasima_fiyati` int(11) NOT NULL,
  `urunun_ismi` varchar(30) NOT NULL,
  `teslimat_adresi` varchar(100) NOT NULL,
  `nakliye_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `musteri_id`, `urun_agirligi`, `tasima_fiyati`, `urunun_ismi`, `teslimat_adresi`, `nakliye_tarihi`) VALUES
(1, 1, 1000, 10000, 'Elma', 'İstanbul', '2024-06-05'),
(2, 2, 2000, 20000, 'armut', 'ığdır', '2024-06-01'),
(3, 2, 62121, 621210, 'simit', 'ankara', '2024-05-29'),
(4, 5, 8000, 80000, 'oyuncak araba', 'ankara', '2024-05-31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teslimat_rotasi`
--

CREATE TABLE `teslimat_rotasi` (
  `teslimat_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `baslangic_noktası` varchar(30) NOT NULL,
  `mesafe` int(11) NOT NULL,
  `tahmini_sure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `teslimat_rotasi`
--

INSERT INTO `teslimat_rotasi` (`teslimat_id`, `siparis_id`, `baslangic_noktası`, `mesafe`, `tahmini_sure`) VALUES
(1, 1, 'Ankara', 450, 5);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `faturalar`
--
ALTER TABLE `faturalar`
  ADD PRIMARY KEY (`fatura_id`),
  ADD KEY `siparis_id` (`siparis_id`);

--
-- Tablo için indeksler `kargo_takibi`
--
ALTER TABLE `kargo_takibi`
  ADD PRIMARY KEY (`takip_id`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `teslimat_rotasi`
--
ALTER TABLE `teslimat_rotasi`
  ADD PRIMARY KEY (`teslimat_id`),
  ADD KEY `siparis_id` (`siparis_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `faturalar`
--
ALTER TABLE `faturalar`
  MODIFY `fatura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kargo_takibi`
--
ALTER TABLE `kargo_takibi`
  MODIFY `takip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `teslimat_rotasi`
--
ALTER TABLE `teslimat_rotasi`
  MODIFY `teslimat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `faturalar`
--
ALTER TABLE `faturalar`
  ADD CONSTRAINT `faturalar_ibfk_1` FOREIGN KEY (`siparis_id`) REFERENCES `siparis` (`siparis_id`);

--
-- Tablo kısıtlamaları `siparis`
--
ALTER TABLE `siparis`
  ADD CONSTRAINT `siparis_ibfk_1` FOREIGN KEY (`musteri_id`) REFERENCES `musteriler` (`musteri_id`);

--
-- Tablo kısıtlamaları `teslimat_rotasi`
--
ALTER TABLE `teslimat_rotasi`
  ADD CONSTRAINT `teslimat_rotasi_ibfk_1` FOREIGN KEY (`siparis_id`) REFERENCES `siparis` (`siparis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
