-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 09:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p3l`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `service` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `budget` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `address`, `service`, `package`, `budget`, `date`, `details`) VALUES
(46, 'Dimas f', 2147483647, 'dudu@gmail.com', 'jln. in dulu jadian kaga', 'Wedding Organizer, Photoshoot Services', 'THE INTIMATE ELEGANCE', 95000000, '2024-12-28', 'baru nih'),
(47, 'andri', 2147483647, 'dudu@gmail.com', 'jln. in dulu jadian kaga', 'Wedding Organizer, Photoshoot Services, Venue for ', 'THE IMPERIAL BLISS', 96000000, '2024-12-21', 'apa sih'),
(53, 'andri', 2147483647, 'dudu@gmail.com', 'jln. in dulu jadian kaga', 'Wedding Organizer, Photoshoot Services, Venue for ', 'THE INTIMATE ELEGANCE', 95000000, '2025-03-15', 'vefwa');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `deskripsi`, `gambar`) VALUES
(1, 'Wedding Organizer', 'Lorem ipsum dolor sit amet consectetur adipiscing elit...', 'uploads/Rectangle 28.jpg'),
(3, 'Photoshoot Services', 'Lorem ipsum dolor sit amet consectetur adipiscing elit...', 'uploads/Rectangle 29.jpg'),
(4, 'Venue for Shooting', 'Lorem ipsum dolor sit amet consectetur adipiscing elit...', 'uploads/Rectangle 30.jpg'),
(5, 'Event by Request', 'Lorem ipsum dolor sit amet consectetur adipiscing elit...', 'uploads/Rectangle 31.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_packages`
--

CREATE TABLE `wedding_packages` (
  `id` int(11) NOT NULL,
  `title_pk` varchar(50) NOT NULL,
  `deskripsi_pk` text NOT NULL,
  `pax` varchar(50) NOT NULL,
  `gambar_pk` varchar(255) NOT NULL,
  `overlay_text` varchar(255) NOT NULL,
  `gambar_paket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wedding_packages`
--

INSERT INTO `wedding_packages` (`id`, `title_pk`, `deskripsi_pk`, `pax`, `gambar_pk`, `overlay_text`, `gambar_paket`) VALUES
(1, 'THE INTIMATE ELEGANCE', 'THE INTIMATE ELEGANCE menggunakan atmosfer intim dengan desain penuh perhatian...', '150', 'uploads/Rectangle 73.jpg', 'THE INTIMATE ELEGANCE', 'uploads/Rectangle 11.jpg'),
(3, 'THE RADIANCE ROYALE', 'THE RADIANCE ROYALE menghadirkan pengalaman memukau dengan dekorasi elegan...', '200', 'uploads/Rectangle 74.jpg', 'THE RADIANCE ROYALE', ''),
(4, 'THE IMPERIAL BLISS', 'THE IMPERIAL BLISS menghadirkan kemegahan eksklusif dengan sentuhan dekorasi klasik...', '300', 'uploads/Rectangle 75.jpg', 'THE IMPERIAL BLISS', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding_packages`
--
ALTER TABLE `wedding_packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wedding_packages`
--
ALTER TABLE `wedding_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
