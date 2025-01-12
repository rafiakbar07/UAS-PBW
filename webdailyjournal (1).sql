-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2025 pada 04.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Kelompok Belajar', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate porro, alias sint tempora consectetur veniam, esse et officiis perspiciatis odit qui velit aliquid quis ipsum beatae voluptatem fugit itaque? Nihil quibusdam inventore laudantium, vitae facere sed tempore aut numquam fuga aspernatur commodi laborum? Voluptatem illo cum quae, minima quis dignissimos.', 'ed-us-_y4FqRhxkR8-unsplash.jpg', '2024-12-16 22:34:04', 'admin'),
(2, 'Perpustakaan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus delectus molestiae illo nihil illum ab. Eaque debitis neque delectus quasi iure fuga aperiam harum exercitationem dolorum iusto voluptates deleniti, mollitia voluptatum suscipit aliquid eos sit optio iste omnis sapiente! Consectetur corporis cupiditate, voluptatum id illum porro nam dolor neque laboriosam?', 'inna-safa-XbJx7F4Lv1A-unsplash.jpg', '2024-12-16 22:42:06', 'admin'),
(3, 'Pemandangan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, laboriosam? Nemo hic quisquam reiciendis. Illo, minus eveniet velit laboriosam aut explicabo. Dolores et inventore qui deleniti eveniet ab laborum sapiente modi cum porro expedita, dicta perferendis, suscipit, repellat nesciunt velit fugiat possimus molestiae? Perferendis quas dolores optio nesciunt mollitia voluptate.', 'ake-widyastomo-mQG0XpNCWOk-unsplash.jpg', '2024-12-17 18:44:04', 'admin'),
(14, 'mesin cuci', 'buat cuci baju', '20250110174847.jpeg', '2025-01-10 17:48:47', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id`, `foto`, `judul`, `isi`, `tanggal`) VALUES
(1, '20250110182527.jpeg', 'Kelompok Belajar', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate porro, alias sint tempora consectetur veniam, esse et officiis perspiciatis odit qui velit aliquid quis ipsum beatae voluptatem fugit itaque? Nihil quibusdam inventore laudantium, vitae facere sed tempore aut numquam fuga aspernatur commodi laborum? Voluptatem illo cum quae, minima quis dignissimos.', '2025-01-10 18:25:27'),
(2, 'inna-safa-XbJx7F4Lv1A-unsplash.jpg', 'Perpustakaan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus delectus molestiae illo nihil illum ab. Eaque debitis neque delectus quasi iure fuga aperiam harum exercitationem dolorum iusto voluptates deleniti, mollitia voluptatum suscipit aliquid eos sit optio iste omnis sapiente! Consectetur corporis cupiditate, voluptatum id illum porro nam dolor neque laboriosam?', '2024-12-19 08:44:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
