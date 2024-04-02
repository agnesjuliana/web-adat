-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2024 at 07:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-culture`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`category_id`, `name`) VALUES
(1, 'Rumah Adat'),
(2, 'Pakaian Adat'),
(3, 'Alat Musik Daerah'),
(4, 'Tarian Adat'),
(5, 'Makanan Tradisional'),
(6, 'Senjata Tradisional');

-- --------------------------------------------------------

--
-- Table structure for table `CultureItems`
--

CREATE TABLE `CultureItems` (
  `item_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CultureItems`
--

INSERT INTO `CultureItems` (`item_id`, `province_id`, `category_id`, `user_id`, `description`, `image`, `name`) VALUES
(1, 1, 3, 1, 'Alat musik tradisional dari Aceh adalah serune kale. Serune kale sangat populer di daerah Pidie, Aceh Utara, Aceh Besar dan Aceh Barat. Alat musik ini kerap kali dimainkan bersamaan dengan Rapai dan Gendrang pada acara-acara hiburan, tari-tarian atau penyambutan tamu kehormatan. Bahan dasar sarune kale ini berupa kayu, kuningan dan tembaga. Bentuk alat musiknya hampir menyerupai seruling bambu. Fungsinya sebagai pemanis atau penghias musik tradisional Aceh.', 'alat-musik/aceh.webp', 'Serune Kale'),
(2, 4, 3, 1, 'Provinsi Banten memiliki alat musik bernama dogdog lonjor yang dimainkan dengan cara ditabuh seperti bedug. Alat musik ini terbuat dari kayu berbentuk silinder memanjang. Bagian tengahnya dibuat berongga, di mana salah satu sisinya ditutup dengan membran dari kulit kambing atau sapi.', 'alat-musik/bali.jpg', 'Dogdog Lonjor'),
(3, 7, 3, 1, 'Alat musik tradisional tehyan berasal dari DKI Jakarta dan telah menjadi salah satu alat musik yang kehadirannya sudah mulai langka. Alat musik gesek ini merupakan hasil perpaduan suku Betawi dan kebudayaan Tionghoa. Cara memainkan Tehyan pun cukup mudah, cukup menggesek senar dawai seperti saat sedang bermain biola. Jenis alat ini terbagi menjadi 3 berdasarkan bentuk dan ukurannya, ada tehyan, sukong, dan kong ahyan. Seringkali masyarakat memainkannya pada acara kebudayaan Betawi seperti penampilan ondel-ondel, lenong Betawi, serta pertunjukan gambang kromong.', 'alat-musik/jakarta.webp', 'Tehyan'),
(4, 9, 3, 1, 'Salah satu alat musik terkenal dari Jambi adalah Cangor. Cangor termasuk ke dalam jenis musik idio-kordofon. Alat musik ini terbuat dari bahan bambu yang dipotong dengan panjang sekitar 40 cm, dan pada bagian kulit bambu dicungkil dan diganjal dengan bantalan kayu. Cangor dimainkan dengan cara dipukul dengan menggunakan dua tongkat yang terbuat dari bahan rotan. Alat musik ini biasa dimainkan oleh para petani saat sedang istirahat setelah mengurus kebun di ladang.', 'alat-musik/bali.jpg', 'Cangor'),
(5, 10, 3, 1, 'Alat musik tradisional terkenal di Jawa Barat adalah angklung. Alat musik tradisional ini terbuat dari bambu. Angklung dimainkan dengan cara digoyangkan. Setelah digoyangkan maka bunyinya akan keluar. Bunyi ini terjadi karena adanya benturan badan pipa bambu. Bunyi yang bergetar menghasilkan susunan nada 2, 3 sampai dengan 4 nada dalam setiap ukuran baik besar maupun kecil.', 'alat-musik/jabar.webp', 'Angklung'),
(6, 11, 3, 1, 'Gamelan adalah salah satu alat musik tradisional Indonesia yang berasal dari Jawa Tengah. Alat musik ini diduga sudah ada di Jawa sejak tahun 404 Masehi, dilihat dari adanya penggambaran masa lalu di relief Candi Borobudur dan Prambanan. Gamelan merupakan seperangkat instrumen yang dibunyikan dari beberapa alat musik, seperti di antaranya gambang, gendang, dan gong. Perpaduan ini memiliki sistem nada non diatonis yang menyajikan suara indah jika dimainkan secara harmonis.', 'alat-musik/jateng.webp', 'Gamelan'),
(7, 21, 3, 1, 'Dari Nusa Tenggara Timur (NTT), memiliki alat musik tradisional bernama sasando. Sasando memiliki bentuk yang sangat unik dan berbeda dari alat musik petik lainnya yakni berbentuk tabung panjang. Sasando sendiri terbuat dari bambu, kayu, paku penyangga, senar string, dan daun lontar. Cara memainkan sasando adalah dengan menggunakan kedua tangan untuk memetik dawainya. Seperti bermain gitar.', 'alat-musik/ntt.webp', 'Sasando'),
(8, 28, 3, 1, 'Alat musik tradisional Indonesia yang juga mendunia dan berasal dari Minahasa, Sulawesi Utara adalah kolintang. Kolintang terbuat dari kayu khusus yang disusun dan dimainkan dengan cara dipukul. Biasanya alat musik kolintang digunakan untuk mengiringi upacara adat, pertunjukan tari, pengiring nyanyian, bahkan pertunjukan musik.', 'alat-musik/sulut.webp', 'Kolintang'),
(9, 29, 3, 1, 'Salah satu alat musik tradisional Indonesia khas suku Minangkabau di Sumatera Barat ada Saluang. Alat musik ini terbuat dari bambu tipis atau bambu talang. Bambu talang dipercaya bisa mengeluarkan suara yang lebih bagus dan merdu. Alat musik saluang termasuk golongan seruling, tapi pembuatannya lebih sederhana. Cukup dengan membuat 4 lubang pada bambu talang. Sama seperti seruling pada umumnya, taluang dimainkan dengan cara ditiup.', 'alat-musik/sumbar.webp', 'Saluang'),
(12, 3, 1, 1, 'aaa', 'images/Screenshot 2024-04-02 at 21.27.51.png', 'aaa'),
(13, 4, 4, 1, 'aaaa', 'images/Screenshot 2024-04-02 at 21.27.51.png', 'AAA');

-- --------------------------------------------------------

--
-- Table structure for table `Provinces`
--

CREATE TABLE `Provinces` (
  `province_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Provinces`
--

INSERT INTO `Provinces` (`province_id`, `name`) VALUES
(1, 'Aceh'),
(2, 'Bali'),
(3, 'Bangka Belitung'),
(4, 'Banten'),
(5, 'Bengkulu'),
(6, 'Gorontalo'),
(7, 'Jakarta Raya'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nusa Tenggara Barat'),
(22, 'Nusa Tenggara Timur'),
(23, 'Papua'),
(24, 'Papua Barat'),
(25, 'Riau'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Utara'),
(31, 'Sumatera Barat'),
(32, 'Sumatera Selatan'),
(33, 'Sumatera Utara'),
(34, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `email`, `password`, `username`) VALUES
(1, 'studyfor.aga@gmail.com', '202cb962ac59075b964b07152d234b70', 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `CultureItems`
--
ALTER TABLE `CultureItems`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Provinces`
--
ALTER TABLE `Provinces`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `CultureItems`
--
ALTER TABLE `CultureItems`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Provinces`
--
ALTER TABLE `Provinces`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CultureItems`
--
ALTER TABLE `CultureItems`
  ADD CONSTRAINT `cultureitems_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `Provinces` (`province_id`),
  ADD CONSTRAINT `cultureitems_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`),
  ADD CONSTRAINT `cultureitems_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
