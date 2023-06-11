-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2023 pada 00.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egoverment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(125) NOT NULL,
  `alamat_admin` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat_admin`, `no_hp`, `username`, `password`, `level_admin`) VALUES
(1, 'Admin', 'Kuningan, Jawa Barat', '085156727368', 'admin', 'admin', 1),
(3, 'Kasi Pemerintahan', 'Kuningan', '085156727388', 'kasi_pemerintahan', 'kasi_pemerintahan', 2),
(4, 'Kasi Kesejahteraan', 'Kuningan', '08976543434', 'kasi_kesejahteraan', 'kasi_kesejahteraan', 3),
(5, 'Kasi Pelayanan', 'Kuningan', '089876778987', 'kasi_pelayanan', 'kasi_pelayanan', 4),
(6, 'Kepala Desa', 'Desa Kertawana', '089786589984', 'kepaladesa', 'kepaladesa', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `belum_kawin`
--

CREATE TABLE `belum_kawin` (
  `id_kawin` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_kawin` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_surat_kawin` varchar(20) NOT NULL,
  `stat_kawin` varchar(20) NOT NULL,
  `stat_surat` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `belum_kawin`
--

INSERT INTO `belum_kawin` (`id_kawin`, `id_masyarakat`, `tgl_pengajuan_kawin`, `no_surat_kawin`, `stat_kawin`, `stat_surat`, `surat_pengantar`) VALUES
(1, 1, '2022-12-14 17:00:00', '1', 'Belum Kawin', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blm_mmlk_rumah`
--

CREATE TABLE `blm_mmlk_rumah` (
  `id_rumah` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_rumah` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_surat_rumah` varchar(20) NOT NULL,
  `stat_rumah` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blm_mmlk_rumah`
--

INSERT INTO `blm_mmlk_rumah` (`id_rumah`, `id_masyarakat`, `tgl_pengajuan_rumah`, `no_surat_rumah`, `stat_rumah`, `surat_pengantar`) VALUES
(1, 1, '2022-12-15 14:10:00', '1', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_dom` varchar(15) NOT NULL,
  `no_surat_dom` varchar(20) NOT NULL,
  `create_dom` timestamp NOT NULL DEFAULT current_timestamp(),
  `stat_dom` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `id_masyarakat`, `tgl_pengajuan_dom`, `no_surat_dom`, `create_dom`, `stat_dom`, `surat_pengantar`) VALUES
(1, 1, '2022-10-12', '1', '2022-12-11 12:15:33', 1, ''),
(3, 4, '2022-12-13', '2', '2022-12-13 12:47:15', 1, ''),
(4, 1, '2023-03-27', '3', '2023-03-27 13:31:47', 0, 'Screenshot_2022-06-27_121156.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `id_kematian` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_kematian` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_surat_kematian` varchar(20) NOT NULL,
  `tgl_meninggal` varchar(15) NOT NULL,
  `akibat` varchar(125) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `stat_kematian` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `id_masyarakat`, `tgl_pengajuan_kematian`, `no_surat_kematian`, `tgl_meninggal`, `akibat`, `tempat`, `stat_kematian`, `surat_pengantar`) VALUES
(1, 2, '2022-12-14 17:00:00', '1', '15 Desember 202', 'Sakit', 'Rumah', 1, ''),
(2, 1, '2022-12-17 17:00:00', '2', '15 Desember 202', 'Sakit', 'Rumah', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_kelahiran`
--

CREATE TABLE `ket_kelahiran` (
  `id_ket_kelahiran` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_kel` varchar(15) NOT NULL,
  `no_surat_kel` varchar(20) NOT NULL,
  `create_kel` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_bayi` varchar(125) NOT NULL,
  `jk_bayi` varchar(10) NOT NULL,
  `tempat_dilahirkan` varchar(50) NOT NULL,
  `tempat_kel` int(11) NOT NULL,
  `hari_tgl_lahir` varchar(20) NOT NULL,
  `pukul` varchar(10) NOT NULL,
  `penolong_kel` int(11) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `panjang` varchar(5) NOT NULL,
  `nik_saksi_satu` varchar(20) NOT NULL,
  `nama_saksi_satu` varchar(125) NOT NULL,
  `umur_saksi_satu` varchar(5) NOT NULL,
  `pekerjaan_saksi_satu` varchar(125) NOT NULL,
  `alamat_saksi_satu` text NOT NULL,
  `nik_saksi_dua` varchar(20) NOT NULL,
  `nama_saksi_dua` varchar(125) NOT NULL,
  `umur_saksi_dua` varchar(5) NOT NULL,
  `pekerjaan_saksi_dua` varchar(125) NOT NULL,
  `alamat_saksi_dua` text NOT NULL,
  `jenis_kel` int(11) NOT NULL,
  `kelahiran_ke` int(11) NOT NULL,
  `tgl_perkawinan` varchar(30) NOT NULL,
  `stat_lahir` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ket_kelahiran`
--

INSERT INTO `ket_kelahiran` (`id_ket_kelahiran`, `id_masyarakat`, `tgl_pengajuan_kel`, `no_surat_kel`, `create_kel`, `nama_bayi`, `jk_bayi`, `tempat_dilahirkan`, `tempat_kel`, `hari_tgl_lahir`, `pukul`, `penolong_kel`, `berat`, `panjang`, `nik_saksi_satu`, `nama_saksi_satu`, `umur_saksi_satu`, `pekerjaan_saksi_satu`, `alamat_saksi_satu`, `nik_saksi_dua`, `nama_saksi_dua`, `umur_saksi_dua`, `pekerjaan_saksi_dua`, `alamat_saksi_dua`, `jenis_kel`, `kelahiran_ke`, `tgl_perkawinan`, `stat_lahir`, `surat_pengantar`) VALUES
(1, 1, '2022-12-15', '1', '2022-12-15 22:46:16', 'Syarif', '1', '1', 0, 'Kuningan, 05 Novembe', '12.00', 1, '3', '50', '3209876787789097', 'Ahmad', '42', 'Buruh', 'LINK.KRAMAT JAYA RT/RW 007/003', '3208089800123212', 'Mamah', '52', 'Wiraswasta', 'LINK.KRAMAT JAYA RT/RW 007/003', 1, 1, '13 Desember 2021', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_pindah`
--

CREATE TABLE `ket_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_pindah` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_surat_pindah` varchar(20) NOT NULL,
  `alasan` int(11) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa_kel` varchar(50) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `jenis_pindah` int(11) NOT NULL,
  `stat_kk_tidak` int(11) NOT NULL,
  `stat_kk_iya` int(11) NOT NULL,
  `type_pindah` int(11) NOT NULL,
  `stat_pindah` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ket_pindah`
--

INSERT INTO `ket_pindah` (`id_pindah`, `id_masyarakat`, `tgl_pengajuan_pindah`, `no_surat_pindah`, `alasan`, `alamat_tujuan`, `rt`, `rw`, `desa_kel`, `kec`, `kab`, `prov`, `kode_pos`, `jenis_pindah`, `stat_kk_tidak`, `stat_kk_iya`, `type_pindah`, `stat_pindah`, `surat_pengantar`) VALUES
(1, 1, '2022-12-17 17:00:00', '1', 1, 'Gunungkeling, Kuningan Jawa Barat', '12', '03', 'Gunungkeling', 'Cigugur', 'kuningan', 'jawa barat', 45552, 1, 1, 1, 2, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_lengkap` varchar(125) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kel_desa` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `stat_kawin` varchar(20) NOT NULL,
  `stat_dlm_kel` varchar(20) NOT NULL,
  `pekerjaan` varchar(125) NOT NULL,
  `nama_ayah` varchar(125) NOT NULL,
  `nama_ibu` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `id_admin`, `no_kk`, `nik`, `nama_lengkap`, `ttl`, `jk`, `alamat`, `rt`, `rw`, `kel_desa`, `kec`, `agama`, `stat_kawin`, `stat_dlm_kel`, `pekerjaan`, `nama_ayah`, `nama_ibu`) VALUES
(1, 0, '3202145698745655', '239872183738298', 'Azka Raharja', 'Kuningan, 14 Maret 1999', 'Laki - Laki', 'Link Gurame', '014', '03', 'Kertawana', 'Kalimanggis', 'Islam', 'Menikah', 'Kepala Keluarga', 'Wiraswata', 'Sastra', 'Siti'),
(2, 0, '3201259874563402', '320987484939321', 'Ramdan', 'Kuningan, 05 November 2022', 'Laki - Laki', 'Ling. Harapan', '23', '03', 'Kertawana', 'Kalimanggis', 'Islam', 'Menikah', 'Kepala Keluarga', 'Wiraswata', 'Maman', 'Yati'),
(3, 0, '3201259874563402', '2398721837382876', 'Blue Street edit', 'Kuningan, 05 November 2022', 'Perempuan', 'Ling. Harapan', '23', '03', 'Kertawana', 'Kalimanggis', 'Islam', 'Menikah', 'Istri', 'Wiraswata', 'Surya', 'Mami'),
(4, 0, '3202145698745655', '320987484939342', 'Titin', 'Kuningan, 05 April 2022', 'Perempuan', 'Ling. Harapan', '12', '03', 'Kertawana', 'Kalimanggis', 'Islam', 'Menikah', 'Isti', 'Ibu Rumah Tangga', 'Nana', 'Yayan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_sktm` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_surat_sktm` varchar(20) NOT NULL,
  `stat_sktm` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_masyarakat`, `tgl_pengajuan_sktm`, `no_surat_sktm`, `stat_sktm`, `surat_pengantar`) VALUES
(1, 1, '2022-12-17 17:00:00', '1', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sku`
--

CREATE TABLE `sku` (
  `id_sku` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `tgl_pengajuan_sku` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_surat_sku` varchar(20) NOT NULL,
  `nama_usaha` varchar(125) NOT NULL,
  `jenis_usaha` varchar(125) NOT NULL,
  `stat_usaha` int(11) NOT NULL,
  `surat_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sku`
--

INSERT INTO `sku` (`id_sku`, `id_masyarakat`, `tgl_pengajuan_sku`, `no_surat_sku`, `nama_usaha`, `jenis_usaha`, `stat_usaha`, `surat_pengantar`) VALUES
(1, 1, '2022-12-17 17:00:00', '1', 'Sari Rasa', 'Kue', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `belum_kawin`
--
ALTER TABLE `belum_kawin`
  ADD PRIMARY KEY (`id_kawin`);

--
-- Indeks untuk tabel `blm_mmlk_rumah`
--
ALTER TABLE `blm_mmlk_rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indeks untuk tabel `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indeks untuk tabel `ket_kelahiran`
--
ALTER TABLE `ket_kelahiran`
  ADD PRIMARY KEY (`id_ket_kelahiran`);

--
-- Indeks untuk tabel `ket_pindah`
--
ALTER TABLE `ket_pindah`
  ADD PRIMARY KEY (`id_pindah`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indeks untuk tabel `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`id_sku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `belum_kawin`
--
ALTER TABLE `belum_kawin`
  MODIFY `id_kawin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blm_mmlk_rumah`
--
ALTER TABLE `blm_mmlk_rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ket_kelahiran`
--
ALTER TABLE `ket_kelahiran`
  MODIFY `id_ket_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ket_pindah`
--
ALTER TABLE `ket_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sku`
--
ALTER TABLE `sku`
  MODIFY `id_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
