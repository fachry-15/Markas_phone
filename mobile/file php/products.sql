-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Jan 2023 pada 00.33
-- Versi server: 10.5.16-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20065870_db_markas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `nama_hp` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `spesifikasi` varchar(1500) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `url_gambar` varchar(100) NOT NULL,
  `id_barang` int(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`nama_hp`, `merek`, `spesifikasi`, `gambar`, `url_gambar`, `id_barang`, `harga`, `status`) VALUES
('iPhone 11 64 GB', 'iPhone', 'Sistem kamera ganda baru merekam lebih banyak lagi hal yang Anda lihat dan sukai. Chip paling cepat ', '63896c1b59cf7.png', 'https://markasphone.000webhostapp.com/assets/image/product/63896c1b59cf7.png', 1, 7500000, 0),
('iPhone 14 Pro Max 256 GB', 'iPhone', 'iPhone 14 Pro Max. Memotret detail menakjubkan dengan kamera Utama 48 MP. Nikmati iPhone dalam cara ', '63896fc6a550f.png', 'https://markasphone.000webhostapp.com/assets/image/product/63896fc6a550f.png', 2, 23000000, 0),
('iPhone 13 Pro 128 GB', 'iPhone', 'iPhone 13 Pro. Pembaruan sistem kamera Pro yang terbesar. Layar Super Retina XDR dengan ProMotion un', '638970d0779a8.png', 'https://markasphone.000webhostapp.com/assets/image/product/638970d0779a8.png', 3, 20000000, 0),
('iPhone 12 Pro Max 128 GB', 'iPhone', 'iPhone 12 Pro Max. Layar Super Retina XDR 6,7 inci yang lebih besar.1 Ceramic Shield dengan ketahana', '638971550e88c.png', 'https://markasphone.000webhostapp.com/assets/image/product/638971550e88c.png', 4, 18000000, 0),
('iPhone XS Max 128 GB', 'iPhone', 'Apple iPhone Xs Max merupakan HP dengan layar 6.5\" dan tingkat densitas piksel sebesar 458ppi. Ia di', '6389720ab225f.png', 'https://markasphone.000webhostapp.com/assets/image/product/6389720ab225f.png', 5, 5550000, 0),
('Samsung S10 Plus', 'Samsung', 'Samsung Galaxy S10 Plus merupakan HP dengan layar 6.4\" dan tingkat densitas piksel sebesar 522ppi. I', '638975bd50f4d.png', 'https://markasphone.000webhostapp.com/assets/image/product/638975bd50f4d.png', 6, 6000000, 0),
('Samsung A51', 'Samsung', 'Samsung Galaxy A51 RAM 6GB ROM 64 GB merupakan HP dengan layar 6.5\" dan tingkat densitas piksel sebe', '6389760ac4f20.png', 'https://markasphone.000webhostapp.com/assets/image/product/6389760ac4f20.png', 7, 4100000, 0),
('Samsung Note 20 Ultra', 'Samsung', 'Samsung Galaxy Note20 Ultra RAM 12GB ROM 512GB merupakan HP dengan layar 6.9\" dan tingkat densitas p', '63897667a829e.png', 'https://markasphone.000webhostapp.com/assets/image/product/63897667a829e.png', 8, 13000000, 0),
('Samsung Note 10+', 'Samsung', 'Samsung Galaxy Note10 RAM 8GB ROM 256GB merupakan HP dengan layar 6.3\" dan tingkat densitas piksel s', '6389776c11b79.png', 'https://markasphone.000webhostapp.com/assets/image/product/6389776c11b79.png', 9, 5500000, 0),
('Samsung S21 5G', 'Samsung', 'Samsung Galaxy S21 5G merupakan HP dengan layar 6.2\" dan tingkat densitas piksel sebesar 421ppi. Ia ', '63897821e8b69.png', 'https://markasphone.000webhostapp.com/assets/image/product/63897821e8b69.png', 10, 7200000, 0),
('Xiaomi Note 10S', 'Xiaomi', 'Spesifikasi Xiaomi Redmi Note 10S RAM 6GB ROM 128GB\r\nBasic Info\r\nKategori 	HP\r\nBrand 	Xiaomi\r\nTahun ', '63897c13ade43.png', 'https://markasphone.000webhostapp.com/assets/image/product/63897c13ade43.png', 11, 3000000, 0),
('Xiaomi Poco X3 Pro', 'Xiaomi', 'Xiaomi Poco X3 Pro merupakan HP dengan layar 6.67\" dan tingkat densitas piksel sebesar 395ppi. Ia di', '63897d2093d8b.png', 'https://markasphone.000webhostapp.com/assets/image/product/63897d2093d8b.png', 12, 3100000, 0),
('Xiaomi Note 10 5G', 'Xiaomi', '• Ukuran layar 6.5 inchi\r\n• Memory ram 4GB Dan Internal 128GB\r\n• Jaringan suport 5G\r\n• Camera belaka', '638997c2848a7.png', 'https://markasphone.000webhostapp.com/assets/image/product/63897d2093d8b.png', 13, 2650000, 0),
('Xiaomi Redmi Note 11 Pro', 'Xiaomi', 'Xiaomi Redmi Note 11 Pro RAM 6GB ROM 128GB merupakan HP dengan layar 6.67\" dan tingkat densitas piks', '6389985486235.png', 'https://markasphone.000webhostapp.com/assets/image/product/6389985486235.png', 14, 3300000, 0),
('Xiaomi Redmi Note 9 Pro', 'Xiaomi', 'Xiaomi Redmi Note 9 Pro merupakan HP dengan layar 6.67\" dan tingkat densitas piksel sebesar 395ppi. ', '6389996894055.png', 'https://markasphone.000webhostapp.com/assets/image/product/6389996894055.png', 15, 3200000, 0),
('Google Pixel 5A 5G', 'Pixel', 'Google Pixel 5a 5G merupakan HP dengan layar 6.34\" dan tingkat densitas piksel sebesar 415ppi. Ia di', '63899bb974e2d.png', 'https://markasphone.000webhostapp.com/assets/image/product/63899bb974e2d.png', 16, 8000000, 0),
('Google Pixel 6 Pro', 'Pixel', 'Google Pixel 6 Pro merupakan HP dengan layar 6.7\" dan tingkat densitas piksel sebesar 512ppi. Ia dil', '63899c0df1e52.png', 'https://markasphone.000webhostapp.com/assets/image/product/63899c0df1e52.png', 17, 8600000, 0),
('Google Pixel 7 Pro', 'Pixel', 'Google Pixel 7 Pro merupakan HP dengan layar 6.7\" dan tingkat densitas piksel sebesar 512ppi. Ia dil', '63899c87a8936.png', 'https://markasphone.000webhostapp.com/assets/image/product/63899c0df1e52.png', 18, 16000000, 0),
('iPhone 7 Plus 64 GB 2nd', 'iPhone', 'Apple iPhone 7 Plus RAM 2GB ROM 32GB merupakan HP dengan layar 5.5\" dan tingkat densitas piksel sebe', '63899d8288f69.png', 'https://markasphone.000webhostapp.com/assets/image/product/63899d8288f69.png', 19, 4300000, 0),
('iPhone 8 Plus 64 GB 2nd', 'iPhone', 'Apple iPhone 8 Plus RAM 3GB ROM 256GB merupakan HP dengan layar 5.5\" dan tingkat densitas piksel seb', '63899dcce354f.png', 'https://markasphone.000webhostapp.com/assets/image/product/63899dcce354f.png', 20, 4800000, 0),
('Oppo A9 2020', 'Oppo', 'Oppo A9 2020 merupakan HP dengan layar 6.5\" dan tingkat densitas piksel sebesar 270ppi. Ia dilengkapi dengan kamera belakang 48 + 8 + 2 + 2MP dan kamera depan 16MP. HP ini juga hadir dengan kapasitas baterai 5000mAh. Oppo A9 2020 dirilis pada: 2019. ', '638ebe07a265f.png', 'https://markasphone.000webhostapp.com/assets/image/product/638ebe07a265f.png', 21, 2100000, 0),
('Iphone 7 256GB', 'iPhone', 'Apple iPhone 7 merupakan HP dengan layar 4.7\" dan tingkat densitas piksel sebesar 401ppi. Ia dilengkapi dengan kamera belakang 12MP dan kamera depan 7MP. HP ini juga hadir dengan kapasitas baterai 1960mAh. Apple iPhone 7 dirilis pada: 2016.', '639dc2727c748.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dc2727c748.png', 22, 2050000, 0),
('iphone 8 256GB', 'iPhone', 'Apple iPhone 8 RAM 2GB ROM 64GB merupakan HP dengan layar 4.7\" dan tingkat densitas piksel sebesar 326ppi. Ia dilengkapi dengan kamera belakang 12MP dan kamera depan 7MP. Memiliki berat sebesar 148g, HP ini hadir dengan kapasitas baterai 1821mAh. Apple iPhone 8 dirilis pada: 2017.', '639dc4b7f2e93.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dc4b7f2e93.png', 23, 2900000, 0),
('iphone 12 mini 64GB', 'iPhone', 'Apple iPhone 12 Mini RAM 4GB ROM 64GB merupakan HP dengan layar 5.4\" dan tingkat densitas piksel sebesar 458ppi. Ia dilengkapi dengan kamera belakang 12 + 12 + 12MP dan kamera depan 12MP. Memiliki berat sebesar 133g, HP ini hadir dengan kapasitas baterai 2227mAh. Apple iPhone 12 Mini dirilis pada: 2020.', '639dc71b061ed.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dc71b061ed.png', 57, 6950000, 0),
('oppo A54 4/128', 'Oppo', 'OPPO A54 merupakan HP dengan layar 6.5\" dan tingkat densitas piksel sebesar 270ppi. Ia dilengkapi dengan kamera belakang 48 + 8 + 2 + 2MP dan kamera depan 16MP. HP ini juga hadir dengan kapasitas baterai 5000mAh. OPPO A54 dirilis pada: 2021.', '639dc922d41e7.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dc922d41e7.png', 58, 1850000, 0),
('Oppo A92 8/128', 'Oppo', 'Oppo A92 RAM 8GB ROM 128GB merupakan HP dengan layar 6.5\" dan tingkat densitas piksel sebesar 405ppi. Ia dilengkapi dengan kamera belakang 48 + 8 + 2 + 2MP dan kamera depan 16MP. Memiliki berat sebesar 192g, HP ini hadir dengan kapasitas baterai 5000mAh. Oppo A92 dirilis pada: 2020.', '639dca1a1c991.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dca1a1c991.png', 59, 2100000, 0),
('samsung A13 6/128', 'Samsung', 'Samsung Galaxy A13 RAM 6GB ROM 128 GB merupakan HP dengan layar 6.6\" dan tingkat densitas piksel sebesar 400ppi. Ia dilengkapi dengan kamera belakang 50 + 5 + 2 + 2MP dan kamera depan 8MP. Memiliki berat sebesar 195 g, HP ini hadir dengan kapasitas baterai 5000mAh. Samsung Galaxy A13 dirilis pada: 2022.', '639dcb593a78a.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dcb593a78a.png', 60, 2150000, 0),
('Samsung Galaxy A21s 128GB', 'Samsung', 'Samsung Galaxy A21s RAM 6GB ROM 64GB merupakan HP dengan layar 6.5\" dan tingkat densitas piksel sebesar 270ppi. Ia dilengkapi dengan kamera belakang 48MP dan kamera depan 13MP. Memiliki berat sebesar 192g, HP ini hadir dengan kapasitas baterai 5000mAh. Samsung Galaxy A21s dirilis pada: 2020.', '639dccb28118b.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dccb28118b.png', 61, 1650000, 0),
('Samsung A31 128 GB', 'Samsung', 'Samsung Galaxy A31 merupakan HP dengan layar 6.4\" dan tingkat densitas piksel sebesar 411ppi. Ia dilengkapi dengan kamera belakang 48 + 8MP dan kamera depan 20MP. HP ini juga hadir dengan kapasitas baterai 5000mAh. Samsung Galaxy A31 dirilis pada: 2020.', '639dcd765039f.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dcd765039f.png', 62, 2050000, 0),
('Samsung A13 128 GB', 'Samsung', 'Samsung Galaxy A13 RAM 6GB ROM 128 GB merupakan HP dengan layar 6.6\" dan tingkat densitas piksel sebesar 400ppi. Ia dilengkapi dengan kamera belakang 50 + 5 + 2 + 2MP dan kamera depan 8MP. Memiliki berat sebesar 195 g, HP ini hadir dengan kapasitas baterai 5000mAh. Samsung Galaxy A13 dirilis pada: 2022.', '639dce4e96b4b.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dce4e96b4b.png', 63, 1750000, 0),
('Samsung A33 5G 128 GB', 'Samsung', 'Samsung Galaxy A33 5G RAM 8GB ROM 128GB merupakan HP dengan layar 6.4\" dan tingkat densitas piksel sebesar 411ppi. Ia dilengkapi dengan kamera belakang 48 + 8 + 5 + 2MP dan kamera depan 13MP. Memiliki berat sebesar 186g, HP ini hadir dengan kapasitas baterai 5000mAh. Samsung Galaxy A33 5G dirilis pada: 2022.', '639dcfdb0938a.png', 'https://markasphone.000webhostapp.com/assets/image/product/639dcfdb0938a.png', 64, 3350000, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_barang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
