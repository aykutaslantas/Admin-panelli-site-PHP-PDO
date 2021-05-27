-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 May 2021, 07:50:24
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sitedb`
--
CREATE DATABASE IF NOT EXISTS `sitedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `sitedb`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anasayfa`
--

CREATE TABLE `anasayfa` (
  `id` int(11) NOT NULL,
  `ustbaslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `altbaslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `linkmetin` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `anasayfa`
--

INSERT INTO `anasayfa` (`id`, `ustbaslik`, `altbaslik`, `linkmetin`, `link`) VALUES
(1, 'Welcome To Our Studio! deneme', 'IT\'S NİCE TO MEET YOU', 'Daha fazlası...', 'servis.php');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `altbaslik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `alticerik` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `alticerik2` varchar(2000) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `baslik`, `icerik`, `altbaslik`, `alticerik`, `alticerik2`) VALUES
(1, 'HAKKIMIZDAaa', 'Lorem ipsum dolor sit amet consectetur.', 'MUHTEŞEM TAKIMIMIZ', 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde. alt icerik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisimformu`
--

CREATE TABLE `iletisimformu` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisimformu`
--

INSERT INTO `iletisimformu` (`id`, `ad`, `email`, `mesaj`, `tarih`) VALUES
(16, 'aykut ismet aslantaş', 'aykur111aykur@gmail.com', 'Lorem Ipsum, masaüstü yayıncılık ve basın yayın sektöründe kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda içerik yerine geçerek yazı bloğunu doldurmak için kullanılır.', '2021-04-04 19:03:17'),
(18, 'aykut ismet aslantaş', 'aykur111aykur@gmail.com', 'deneme gibi', '2021-04-08 08:28:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` tinyint(4) NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kadi`, `parola`, `yetki`, `email`, `aktif`) VALUES
(1, 'admin', '105a9a2d46f64e147097c986076d2164', 1, 'aykur111aykur@gmail.com', 1),
(2, 'user', '105a9a2d46f64e147097c986076d2164', 2, 'aykur111aykur@gmail.com', 1),
(7, 'asdsad32', 'asdfsadf', 1, 'asdasd@gmail.com', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolyo`
--

CREATE TABLE `portfolyo` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `altbaslik` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolyo`
--

INSERT INTO `portfolyo` (`id`, `baslik`, `altbaslik`) VALUES
(1, 'PORTFOLYOO', 'LOREM İPSTUM LA DOLERO');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolyolar`
--

CREATE TABLE `portfolyolar` (
  `id` int(11) NOT NULL,
  `kfoto` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `bfoto` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `client` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `sira` smallint(6) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolyolar`
--

INSERT INTO `portfolyolar` (`id`, `kfoto`, `bfoto`, `baslik`, `client`, `date`, `category`, `aciklama`, `icerik`, `sira`, `aktif`) VALUES
(1, '01-thumbnail.jpg', '01-full.jpg', 'PROJECT NAME', 'Threads', 'January 2020', 'Illustration', 'Lorem ipsum dolor sit amet consectetur.', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo! aykut ismet', 0, 1),
(2, '02-thumbnail.jpg', '02-full.jpg', 'PROJECT NAME', 'Explore', 'January 2020', 'Graphic Design', 'Lorem ipsum dolor sit amet consectetur.', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!', 0, 1),
(3, '03-thumbnail.jpg', '03-full.jpg', 'PROJECT NAME', 'Finish', 'January 2020', 'Identity', 'Lorem ipsum dolor sit amet consectetur.', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!', 0, 1),
(4, '04-thumbnail.jpg', '04-full.jpg', 'PROJECT NAME', 'Lines', 'January 2020', 'Branding', 'Lorem ipsum dolor sit amet consectetur.', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!', 0, 1),
(5, '05-thumbnail.jpg', '05-full.jpg', 'PROJECT NAME', 'Southwest', 'January 2020', 'Website Designn', 'Lorem ipsum dolor sit amet consectetur.', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo! e bura', 0, 1),
(6, '06-thumbnail.jpg', '06-full.jpg', 'PROJECT NAME', 'Window', 'January 2020', 'Photography', 'Lorem ipsum dolor sit amet consectetur.', 'Used this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo! bura değişiyor mu', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE `referans` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sira` smallint(6) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`id`, `foto`, `link`, `sira`, `aktif`) VALUES
(1, 'envato.jpg', '#', 10, 1),
(2, 'designmodo.jpg', '#', 20, 1),
(3, 'themeforest.jpg', '#', 15, 1),
(4, 'creative-market.jpg', '#', 30, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servis`
--

CREATE TABLE `servis` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `altbaslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `servis`
--

INSERT INTO `servis` (`id`, `baslik`, `altbaslik`) VALUES
(1, 'lorem ipsum dolare', 'Lorem ipsum dolor sit amet consectetur. aykut ismet aslantaş');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servislerimiz`
--

CREATE TABLE `servislerimiz` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `sira` smallint(6) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `servislerimiz`
--

INSERT INTO `servislerimiz` (`id`, `foto`, `baslik`, `icerik`, `sira`, `aktif`) VALUES
(1, 'fa-shopping-cart', 'E-Commerce', 'içerik  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 10, 1),
(2, 'fa-laptop', 'Responsive Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 0, 1),
(3, 'fa-lock', 'Web Security', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takim`
--

CREATE TABLE `takim` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `gorev` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `linkedin` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sira` smallint(6) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `takim`
--

INSERT INTO `takim` (`id`, `foto`, `isim`, `gorev`, `twitter`, `facebook`, `linkedin`, `sira`, `aktif`) VALUES
(1, '1.jpg', 'Kay Garland', 'Lead Designer', '#', '#', '#', 0, 1),
(2, '2.jpg', 'Onur Erkan', 'Lead Marketer', '#', '#', '#', 0, 1),
(3, '3.jpg', 'Diana Petersen', 'Lead Developer', '#', '#', '#', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tarihce`
--

CREATE TABLE `tarihce` (
  `id` int(11) NOT NULL,
  `tarih` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tarihce`
--

INSERT INTO `tarihce` (`id`, `tarih`, `baslik`, `icerik`, `foto`) VALUES
(1, '2009-2011', 'Our Humble Beginnings', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', '1.jpg'),
(2, 'March 2011', 'An Agency is Born', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', '2.jpg'),
(3, 'December 2012', 'Transition to Full Service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur', '3.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anasayfa`
--
ALTER TABLE `anasayfa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisimformu`
--
ALTER TABLE `iletisimformu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolyo`
--
ALTER TABLE `portfolyo`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolyolar`
--
ALTER TABLE `portfolyolar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referans`
--
ALTER TABLE `referans`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `servislerimiz`
--
ALTER TABLE `servislerimiz`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `takim`
--
ALTER TABLE `takim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tarihce`
--
ALTER TABLE `tarihce`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anasayfa`
--
ALTER TABLE `anasayfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `iletisimformu`
--
ALTER TABLE `iletisimformu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `portfolyo`
--
ALTER TABLE `portfolyo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `portfolyolar`
--
ALTER TABLE `portfolyolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `referans`
--
ALTER TABLE `referans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `servis`
--
ALTER TABLE `servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `servislerimiz`
--
ALTER TABLE `servislerimiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `takim`
--
ALTER TABLE `takim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `tarihce`
--
ALTER TABLE `tarihce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
