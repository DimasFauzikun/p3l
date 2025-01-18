-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230628.1f935e57f7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Jan 2025 pada 15.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

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
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `address`, `service`, `package`, `budget`, `date`, `details`) VALUES
(46, 'Dimas f', 2147483647, 'dudu@gmail.com', 'jln. in dulu jadian kaga', 'Wedding Organizer, Photoshoot Services', 'THE INTIMATE ELEGANCE', 95000000, '2024-12-28', 'baru nih'),
(47, 'andri', 2147483647, 'dudu@gmail.com', 'jln. in dulu jadian kaga', 'Wedding Organizer, Photoshoot Services, Venue for ', 'THE IMPERIAL BLISS', 96000000, '2024-12-21', 'apa sih'),
(53, 'andri', 2147483647, 'dudu@gmail.com', 'jln. in dulu jadian kaga', 'Wedding Organizer, Photoshoot Services, Venue for ', 'THE INTIMATE ELEGANCE', 95000000, '2025-03-15', 'vefwa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `gambar_porto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`id`, `gambar_porto`) VALUES
(1, 'uploads/beblooms.wedding-1629903797890.jpg'),
(2, 'uploads/DEDI8283-2.JPG'),
(3, 'uploads/842A2492.JPG'),
(4, 'uploads/IMG_8997.JPG'),
(5, 'uploads/IMG-20210315-WA0042.jpg'),
(6, 'uploads/IMG-20210213-WA0052.jpg'),
(7, 'uploads/IMG_7895.JPG'),
(8, 'uploads/IMG-20210315-WA0037.jpg'),
(9, 'uploads/IMG-20210213-WA0057.jpg'),
(10, 'uploads/Photo dias 2021 (1 of 1)-8.JPG'),
(11, 'uploads/beblooms.wedding-1628184487659.jpg'),
(12, 'uploads/IMG-20200902-WA0010.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `title`, `deskripsi`, `gambar`) VALUES
(1, 'Wedding Organizer', 'Percayakan pernikahan Anda pada tim profesional yang akan mengurus semua detai. Dengan layanan Wedding Organizer dari VillaVi, Anda akan mendapatkan tim ahli yang siap membantu merencanakan, mengoordinasikan, dan mengelola setiap aspek acara pernikahan Anda.', 'uploads/Rectangle 28.jpg'),
(3, 'Photoshoot Services', 'Abadikan setiap momen indah dalam hidup Anda dengan layanan Photoshoot Service dari VillaVi.Kami menawarkan sesi pemotretan yang disesuaikan dengan gaya dan tema yang Anda inginkan, menggunakan peralatan profesional dan fotografer berpengalaman.', 'uploads/Rectangle 29.jpg'),
(4, 'Venue for Shooting', 'VillaVi menyediakan berbagai lokasi yang dirancang khusus untuk memenuhi kebutuhan shooting Anda.Dari lokasi pernikahan yang romantis hingga tempat-tempat unik untuk pemotretan komersial atau produksi film, kami menawarkan pilihan yang variatif, estetis, dan mendukung kreativitas.', 'uploads/Rectangle 30.jpg'),
(5, 'Event by Request', 'Setiap acara memiliki kebutuhan dan karakteristik unik, dan di VillaVi, kami siap untuk menciptakan pengalaman yang sepenuhnya disesuaikan dengan permintaan Anda. Layanan Event by Request memungkinkan Anda untuk menciptakan acara yang sepenuhnya disesuaikan dengan keinginan dan kebutuhan Anda.', 'uploads/Rectangle 31.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wedding_packages`
--

CREATE TABLE `wedding_packages` (
  `id` int(11) NOT NULL,
  `title_pk` varchar(50) NOT NULL,
  `deskripsi_pk` text NOT NULL,
  `pax` varchar(50) NOT NULL,
  `gambar_pk` varchar(255) NOT NULL,
  `overlay_text` varchar(255) NOT NULL,
  `gambar_paket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wedding_packages`
--

INSERT INTO `wedding_packages` (`id`, `title_pk`, `deskripsi_pk`, `pax`, `gambar_pk`, `overlay_text`, `gambar_paket`) VALUES
(1, 'THE INTIMATE ELEGANCE', 'THE INTIMATE ELEGANCE menyuguhkan atmosfer intim dengan dekorasi menawan, menu istimewa yang dirancang dengan penuh perhatian, serta layanan eksklusif untuk menjadikan momen Anda sempurna', '150', 'uploads/image (1).jpg', 'THE INTIMATE ELEGANCE', 'uploads/image (1).jpg'),
(3, 'THE RADIANCE ROYALE', 'THE RADIANCE ROYALE menghadirkan perpaduan sempurna antara desain dekorasi yang memukau, sajian kuliner premium, dan pengalaman tak terlupakan yang akan memanjakan Anda serta tamu undangan', '200', 'uploads/image-2.jpg', 'THE RADIANCE ROYALE', 'uploads/image-2.jpg'),
(4, 'THE IMPERIAL BLISS', 'THE IMPERIAL BLISS menyajikan pengalaman eksklusif dengan tata ruang megah, dekorasi mewah, menu istimewa, dan layanan yang dirancang untuk memberikan kesempurnaan di setiap momen berharga di hidup anda', '300', 'uploads/image-3.png', 'THE IMPERIAL BLISS', 'uploads/image-3.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wedding_packages`
--
ALTER TABLE `wedding_packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wedding_packages`
--
ALTER TABLE `wedding_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
