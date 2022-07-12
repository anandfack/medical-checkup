-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2021 pada 04.31
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesimpulan`
--

CREATE TABLE `kesimpulan` (
  `ID_KESIMPULAN` int(11) NOT NULL,
  `ID_PASIEN` int(11) NOT NULL,
  `PEMERIKSAAN_FISIK` varchar(255) NOT NULL,
  `FOTO_THORAX` varchar(255) NOT NULL,
  `LABORATORIUM` varchar(255) NOT NULL,
  `SARAN` varchar(255) NOT NULL,
  `IMT` varchar(255) NOT NULL,
  `TATALAKSANA` varchar(255) NOT NULL,
  `SLUG` varchar(255) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kesimpulan`
--

INSERT INTO `kesimpulan` (`ID_KESIMPULAN`, `ID_PASIEN`, `PEMERIKSAAN_FISIK`, `FOTO_THORAX`, `LABORATORIUM`, `SARAN`, `IMT`, `TATALAKSANA`, `SLUG`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 34, 'D', 'D', 'D', 'D', 'D', 'D', '', '2021-10-05 02:12:24', '2021-10-05 02:12:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laborat`
--

CREATE TABLE `laborat` (
  `ID_LABORAT` int(11) NOT NULL,
  `ID_PASIEN` int(11) NOT NULL,
  `ID_MASTERLAB` int(11) NOT NULL,
  `SLUG_LAB` varchar(100) NOT NULL,
  `HASIL_LAB` varchar(100) NOT NULL,
  `BIAYA_LAB` decimal(25,0) NOT NULL,
  `KESIMPULAN_LAB` varchar(255) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laborat`
--

INSERT INTO `laborat` (`ID_LABORAT`, `ID_PASIEN`, `ID_MASTERLAB`, `SLUG_LAB`, `HASIL_LAB`, `BIAYA_LAB`, `KESIMPULAN_LAB`, `CREATED_AT`, `UPDATED_AT`) VALUES
(23, 34, 1, '', 'llll', '0', '', '2021-10-05 02:12:06', '2021-10-05 02:12:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_lab`
--

CREATE TABLE `master_lab` (
  `ID_MASTERLAB` int(11) NOT NULL,
  `TIPE_PERIKSA_LAB` varchar(255) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_lab`
--

INSERT INTO `master_lab` (`ID_MASTERLAB`, `TIPE_PERIKSA_LAB`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'bbbb', '2021-10-05 01:58:28', '2021-10-05 01:58:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_rad`
--

CREATE TABLE `master_rad` (
  `ID_MASTERRAD` int(11) NOT NULL,
  `TIPE_PERIKSA_RAD` varchar(255) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `ID_PASIEN` int(11) NOT NULL,
  `NO_RM` varchar(50) NOT NULL,
  `NAMA_PASIEN` varchar(50) NOT NULL,
  `SLUG` varchar(255) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL DEFAULT current_timestamp(),
  `JENIS_KELAMIN` varchar(15) NOT NULL,
  `PERUSAHAAN` varchar(255) NOT NULL,
  `NIK` varchar(255) NOT NULL,
  `DEPARTEMEN` varchar(255) NOT NULL,
  `BAGIAN` varchar(255) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`ID_PASIEN`, `NO_RM`, `NAMA_PASIEN`, `SLUG`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `PERUSAHAAN`, `NIK`, `DEPARTEMEN`, `BAGIAN`, `CREATED_AT`, `UPDATED_AT`) VALUES
(34, '15.15.15', 'Tn. Agustino', '', '2021-06-23', 'L/25', 'Abc', '123456', 'Abc', 'Abc', '2021-06-24 21:25:14', '2021-06-24 21:25:14'),
(35, '1234', 'sfghsdg', '', '2021-07-09', 'ksdg12', 'aedghadgh', '135136', 'dgas', 'dgbsfh', '2021-07-07 20:17:08', '2021-07-07 20:17:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `ID_PERIKSA` int(11) NOT NULL,
  `ID-PASIEN` int(11) NOT NULL,
  `BATUK_DARAH` varchar(255) NOT NULL,
  `KENCING_BATU` varchar(255) NOT NULL,
  `HEPATITIS` varchar(255) NOT NULL,
  `HERNIA` varchar(255) NOT NULL,
  `HIPERTENSI` varchar(255) NOT NULL,
  `HEMORROID` varchar(255) NOT NULL,
  `DIABETES` varchar(255) NOT NULL,
  `TINGGI_BADAN` varchar(255) NOT NULL,
  `BERAT_BADAN` varchar(255) NOT NULL,
  `NADI` varchar(255) NOT NULL,
  `TEKANAN_DARAH` varchar(255) NOT NULL,
  `VISUS` varchar(255) NOT NULL,
  `BUTA_WARNA` varchar(255) NOT NULL,
  `JULING` varchar(255) NOT NULL,
  `KELAINAN_MATA_LAIN` varchar(255) NOT NULL,
  `TELINGA_LUAR` varchar(255) NOT NULL,
  `TELINGA_TENGAH` varchar(255) NOT NULL,
  `GIGI` varchar(255) NOT NULL,
  `PARU` varchar(255) NOT NULL,
  `JANTUNG` varchar(255) NOT NULL,
  `HATI` varchar(255) NOT NULL,
  `LIMPA` varchar(255) NOT NULL,
  `EKSTRIMITAS` varchar(255) NOT NULL,
  `KESEIMBANGAN` varchar(255) NOT NULL,
  `EXIM` varchar(255) NOT NULL,
  `DERMATITIS` varchar(255) NOT NULL,
  `SLUG` varchar(255) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`ID_PERIKSA`, `ID-PASIEN`, `BATUK_DARAH`, `KENCING_BATU`, `HEPATITIS`, `HERNIA`, `HIPERTENSI`, `HEMORROID`, `DIABETES`, `TINGGI_BADAN`, `BERAT_BADAN`, `NADI`, `TEKANAN_DARAH`, `VISUS`, `BUTA_WARNA`, `JULING`, `KELAINAN_MATA_LAIN`, `TELINGA_LUAR`, `TELINGA_TENGAH`, `GIGI`, `PARU`, `JANTUNG`, `HATI`, `LIMPA`, `EKSTRIMITAS`, `KESEIMBANGAN`, `EXIM`, `DERMATITIS`, `SLUG`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 34, 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', '', '2021-06-24 21:27:37', '2021-06-24 21:27:37'),
(2, 35, 'asfasfasf', 'adfgasdg', 'asdg', 'd', 'k', 'i', 'ni', 'ni', 'as', 'kojno', 'no', 'no', 'n', 'kk', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'kk', '', '2021-07-28 00:59:43', '2021-07-28 00:59:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `radiologi`
--

CREATE TABLE `radiologi` (
  `ID_RADIOLOGI` int(11) NOT NULL,
  `ID_PASIEN` int(11) NOT NULL,
  `ID_MASTERRAD` int(11) NOT NULL,
  `SLUG_RAD` varchar(100) NOT NULL,
  `HASIL_RAD` varchar(100) NOT NULL,
  `BIAYA_RAD` decimal(25,0) NOT NULL,
  `KESIMPULAN_RAD` varchar(255) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kesimpulan`
--
ALTER TABLE `kesimpulan`
  ADD PRIMARY KEY (`ID_KESIMPULAN`),
  ADD KEY `ID_PASIEN` (`ID_PASIEN`);

--
-- Indeks untuk tabel `laborat`
--
ALTER TABLE `laborat`
  ADD PRIMARY KEY (`ID_LABORAT`),
  ADD KEY `ID_PASIEN` (`ID_PASIEN`),
  ADD KEY `ID_MASTERLAB` (`ID_MASTERLAB`);

--
-- Indeks untuk tabel `master_lab`
--
ALTER TABLE `master_lab`
  ADD PRIMARY KEY (`ID_MASTERLAB`);

--
-- Indeks untuk tabel `master_rad`
--
ALTER TABLE `master_rad`
  ADD PRIMARY KEY (`ID_MASTERRAD`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_PASIEN`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`ID_PERIKSA`),
  ADD KEY `ID-PASIEN` (`ID-PASIEN`);

--
-- Indeks untuk tabel `radiologi`
--
ALTER TABLE `radiologi`
  ADD PRIMARY KEY (`ID_RADIOLOGI`),
  ADD KEY `ID_PASIEN` (`ID_PASIEN`),
  ADD KEY `ID_MASTERRAD` (`ID_MASTERRAD`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kesimpulan`
--
ALTER TABLE `kesimpulan`
  MODIFY `ID_KESIMPULAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laborat`
--
ALTER TABLE `laborat`
  MODIFY `ID_LABORAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `master_lab`
--
ALTER TABLE `master_lab`
  MODIFY `ID_MASTERLAB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_rad`
--
ALTER TABLE `master_rad`
  MODIFY `ID_MASTERRAD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `ID_PASIEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `ID_PERIKSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `radiologi`
--
ALTER TABLE `radiologi`
  MODIFY `ID_RADIOLOGI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laborat`
--
ALTER TABLE `laborat`
  ADD CONSTRAINT `laborat_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `radiologi`
--
ALTER TABLE `radiologi`
  ADD CONSTRAINT `radiologi_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
