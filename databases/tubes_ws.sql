-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2022 pada 07.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_ws`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `top_uni`
--

CREATE TABLE `top_uni` (
  `id_univ` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `locate` varchar(100) NOT NULL,
  `score` int(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `top_uni`
--

INSERT INTO `top_uni` (`id_univ`, `name`, `locate`, `score`) VALUES
(1, 'Massachusetts Institute of Technology (MIT)', ' Cambridge, United States', 100),
(2, 'University of Cambridge', ' Cambridge, United Kingdom', 99),
(3, 'Stanford University', ' Stanford, United States', 99),
(4, 'University of Oxford', '  Oxford, United Kingdom', 98),
(5, 'Harvard University', ' Cambridge, United States', 98),
(6, 'California Institute of Technology (Caltech)', 'Pasadena, United States', 97),
(7, 'Imperial College London', 'London, United Kingdom', 97);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `top_uni`
--
ALTER TABLE `top_uni`
  ADD PRIMARY KEY (`id_univ`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `top_uni`
--
ALTER TABLE `top_uni`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
