-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Eyl 2018, 10:16:37
-- Sunucu sürümü: 10.1.34-MariaDB
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `epiz_22404425_toplucatopla`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `control_orders` (IN `product_id` INT(4), OUT `OutPutControl` INT)  BEGIN
DECLARE Amount INT;
DECLARE Target INT;
SELECT p.buy_amount,p.target_number INTO Amount,Target FROM products p WHERE id =product_id; 
SET OutPutControl=1;
IF Amount>=Target
THEN
UPDATE orders o SET o.status=2 WHERE o.product_id=product_id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_orders_Cange_order_number` (IN `order_id` INT(4), IN `customer_id` INT(4))  NO SQL
BEGIN
UPDATE `orders` SET `order_number` = '-1' 
WHERE `orders`.`id` =order_id AND `orders`.`customer_id`= customer_id ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `amount` int(4) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` tinyint(2) NOT NULL,
  `category_name` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Gıda'),
(2, 'Elektronik ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `comment` varchar(400) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(4) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `address` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(41) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci COMMENT='customer information';

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `password`, `email`) VALUES
(1, 'murat çağlayan', 'beykent', '0 (554) 927 37 16', '12345678', 'muratcaglayan425@gmail.com'),
(2, 'ayşe çağlayan', 'beyken palandöken sok', '0 (554) 927 37 16', 'Fnjpk22pk', 'aysecaglayan.ma@hotmail.com'),
(3, 'aa', 'aa', '0 (111) 111 11 11', 'aa', 'aa@hotmail.com'),
(4, 'aaa', 'aaa', '0 (123) 456 78 99', 'aaa', 'aaa@hotmail.com'),
(5, 'aaaa', 'beykend', '0 (111) 111 11 11', 'aaa', 'aaaa@hotmail.com'),
(6, 'aa', 'sds', '0 (554) 927 37 16', 'sssss', 'd@hotmail.com'),
(7, 'murat çağlayn', 'sdaf', '0 (554) 927 37 16', 'aaa', 'aaasa@hotmail.com'),
(8, 'murat', 'sd', '0 (554) 927 37 16', 'ssss', '4@hotmail.com'),
(9, 'musaf', 'sad', '0 (562) 566 33 63', 'ssss', 'a@hotmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(4) NOT NULL,
  `news` varchar(400) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `basket_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `amount` int(10) NOT NULL,
  `order_comment` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `new_address` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `new_customer` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `new_phone` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `order_date` date NOT NULL,
  `order_number` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci COMMENT='order information';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pictures`
--

CREATE TABLE `pictures` (
  `id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `picture_path` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `pictures`
--

INSERT INTO `pictures` (`id`, `product_id`, `picture_path`) VALUES
(1, 1, 'ali_seker/toz_seker_1.jpg'),
(2, 1, 'ali_seker/toz_seker_2.jpg'),
(3, 1, 'ali_seker/toz_seker_3.jpg'),
(4, 2, 'sunny_tv/sunny_tv_1.jpg'),
(5, 2, 'sunny_tv/sunny_tv_2.jpg'),
(6, 2, 'sunny_tv/sunny_tv_3.jpg'),
(7, 3, 'caykur_rize/caykur_rize_1.jpg'),
(8, 3, 'caykur_rize/caykur_rize_2.jpg'),
(9, 3, 'caykur_rize/caykur_rize_3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `company_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kind_of` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `category_id` tinyint(1) NOT NULL,
  `buy_number` int(4) DEFAULT NULL,
  `buy_amount` int(10) NOT NULL,
  `target_number` int(10) DEFAULT NULL,
  `unit_0f` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `explanation_of_product` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `Product_time_start` date NOT NULL,
  `product_time_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci COMMENT='Products information';

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `company_name`, `kind_of`, `category_id`, `buy_number`, `buy_amount`, `target_number`, `unit_0f`, `explanation_of_product`, `Product_time_start`, `product_time_end`) VALUES
(1, 'Alipaşa şeker fabrikasından', '2.50', 'Alipaşa', 'ŞEKER', 1, 40, 1038, 1000, 'Kg', 'Bu şeher ihraç fazlasıdır. Ali şeher fabrikasından halkın kullanıma açılmıştır. Bu anlamda şeker fab', '2018-08-28', '2018-11-20'),
(2, '2Sunny 28\" 70 Ekran Uydu Alıcı', '2500.00', 'Sunny', 'Led TV', 2, 224, 1243, 500, 'Tane', '', '2018-08-01', '2018-11-04'),
(3, 'Çaykur Rize Turist Çayı 1000 g', '24.00', 'Çaykur', 'Çay', 1, 9, 9, 100, 'Kg', '', '2018-08-10', '2018-08-28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `status`
--

CREATE TABLE `status` (
  `id` int(2) UNSIGNED NOT NULL,
  `status_word` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `status`
--

INSERT INTO `status` (`id`, `status_word`) VALUES
(1, 'Hedef Beklenmektedir.'),
(2, 'Hedef Ulaşılmış '),
(3, 'İptal Edilmiştir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `tc_number` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `position` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci COMMENT='User of webside';

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `status`
--
ALTER TABLE `status`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
