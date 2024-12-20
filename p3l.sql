-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 03:25 PM
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
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin1234');

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
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `gambar_porto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `gambar_porto`) VALUES
(1, 'uploads/Rectangle 45.jpg'),
(2, 'uploads/Rectangle 46.jpg'),
(3, 'uploads/Rectangle 48.jpg'),
(4, 'uploads/Rectangle 47.jpg'),
(5, 'uploads/Rectangle 49.jpg'),
(6, 'uploads/Rectangle 50.jpg'),
(7, 'uploads/Rectangle 51.jpg'),
(8, 'uploads/Rectangle 54.jpg'),
(9, 'uploads/Rectangle 53.jpg'),
(10, 'uploads/Rectangle 52.jpg'),
(11, 'uploads/Rectangle 55.jpg'),
(12, 'uploads/Rectangle 56.jpg');

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
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
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
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
