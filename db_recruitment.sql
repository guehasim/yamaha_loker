-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 08:54 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_recruitment`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `awal`
--
CREATE TABLE `awal` (
`nik_ktp` int(20)
,`nama_ktp` varchar(255)
,`tempat_lahir` varchar(255)
,`tinggi_badan_cm` int(3)
,`berat_badan_kg` int(3)
);

-- --------------------------------------------------------

--
-- Table structure for table `join_lamar`
--

CREATE TABLE `join_lamar` (
  `ID_PelamarJoin` int(11) NOT NULL,
  `ID_Pelamar` int(255) NOT NULL,
  `ID_Loker` int(255) NOT NULL,
  `TGL_Lamar` date NOT NULL,
  `status_Join` int(1) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `join_lamar`
--

INSERT INTO `join_lamar` (`ID_PelamarJoin`, `ID_Pelamar`, `ID_Loker`, `TGL_Lamar`, `status_Join`, `status_aktif`) VALUES
(1, 26, 8, '2022-04-22', 8, 1),
(2, 25, 11, '2022-04-23', 8, 1),
(3, 27, 10, '2022-04-23', 8, 1),
(4, 28, 11, '2022-04-24', 8, 1),
(5, 29, 7, '2022-04-24', 8, 1),
(6, 30, 8, '2022-04-25', 8, 1),
(7, 31, 10, '2022-04-25', 8, 1),
(8, 32, 8, '2022-04-26', 8, 1),
(9, 33, 8, '2022-04-26', 8, 1),
(10, 34, 7, '2022-04-27', 8, 1),
(11, 25, 7, '2022-04-27', 8, 1),
(13, 39, 6, '2022-06-07', 1, 1),
(14, 33, 6, '2022-06-09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_area`
--

CREATE TABLE `karyawan_area` (
  `ID_Area` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `area` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_area`
--

INSERT INTO `karyawan_area` (`ID_Area`, `ID_Pelamar`, `area`) VALUES
(1, 25, 2),
(2, 27, 1),
(3, 33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_darurat`
--

CREATE TABLE `karyawan_darurat` (
  `ID_Darurat` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `nama_Darurat` varchar(255) NOT NULL,
  `telp_Darurat` varchar(15) NOT NULL,
  `hubungan_Darurat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_darurat`
--

INSERT INTO `karyawan_darurat` (`ID_Darurat`, `ID_Pelamar`, `nama_Darurat`, `telp_Darurat`, `hubungan_Darurat`) VALUES
(5, 25, 'toni suratmojo', '08123264554576', 'paman'),
(6, 25, 'Intan Wahyuni', '0858586525853', 'Saudara Kandung'),
(7, 27, 'sudirman', '0817578689354', 'kakak'),
(8, 27, 'budiono', '08345758565', 'paman'),
(10, 33, 'elbisker', '082463916393', 'pak de'),
(11, 33, 'marsumi', '08448849348', 'bu de');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_kawin`
--

CREATE TABLE `karyawan_kawin` (
  `ID_Kawin` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `status_kawin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_kawin`
--

INSERT INTO `karyawan_kawin` (`ID_Kawin`, `ID_Pelamar`, `status_kawin`) VALUES
(1, 25, 2),
(2, 27, 1),
(3, 33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_keluarga`
--

CREATE TABLE `karyawan_keluarga` (
  `ID_Keluarga` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `nama_ortu_ayah` varchar(255) NOT NULL,
  `alamat_ortu_ayah` text NOT NULL,
  `telp_ortu_ayah` varchar(15) NOT NULL,
  `nama_ortu_ibu` varchar(255) NOT NULL,
  `alamat_ortu_ibu` text NOT NULL,
  `telp_ortu_ibu` varchar(15) NOT NULL,
  `nama_mertua_ayah` varchar(255) DEFAULT NULL,
  `alamat_mertua_ayah` text,
  `telp_mertua_ayah` varchar(15) DEFAULT NULL,
  `nama_mertua_ibu` varchar(255) DEFAULT NULL,
  `alamat_mertua_ibu` text,
  `telp_mertua_ibu` varchar(15) DEFAULT NULL,
  `nama_saudara_1` varchar(255) DEFAULT NULL,
  `alamat_saudara_1` text,
  `telp_saudara_1` varchar(15) DEFAULT NULL,
  `nama_saudara_2` varchar(255) DEFAULT NULL,
  `alamat_saudara_2` text,
  `telp_saudara_2` varchar(15) DEFAULT NULL,
  `nama_saudara_3` varchar(255) DEFAULT NULL,
  `alamat_saudara_3` text,
  `telp_saudara_3` varchar(15) DEFAULT NULL,
  `nama_saudara_4` varchar(255) DEFAULT NULL,
  `alamat_saudara_4` text,
  `telp_saudara_4` varchar(15) DEFAULT NULL,
  `nama_saudara_5` varchar(255) DEFAULT NULL,
  `alamat_saudara_5` text,
  `telp_saudara_5` text,
  `nama_istri` varchar(255) DEFAULT NULL,
  `alamat_istri` text,
  `telp_istri` varchar(15) DEFAULT NULL,
  `nama_anak_1` varchar(255) DEFAULT NULL,
  `alamat_anak_1` text,
  `telp_anak_1` varchar(15) DEFAULT NULL,
  `nama_anak_2` varchar(255) DEFAULT NULL,
  `alamat_anak_2` text,
  `telp_anak_2` varchar(15) DEFAULT NULL,
  `nama_anak_3` varchar(255) DEFAULT NULL,
  `alamat_anak_3` text,
  `telp_anak_3` varchar(15) DEFAULT NULL,
  `nama_anak_4` varchar(255) DEFAULT NULL,
  `alamat_anak_4` text,
  `telp_anak_4` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_keluarga`
--

INSERT INTO `karyawan_keluarga` (`ID_Keluarga`, `ID_Pelamar`, `nama_ortu_ayah`, `alamat_ortu_ayah`, `telp_ortu_ayah`, `nama_ortu_ibu`, `alamat_ortu_ibu`, `telp_ortu_ibu`, `nama_mertua_ayah`, `alamat_mertua_ayah`, `telp_mertua_ayah`, `nama_mertua_ibu`, `alamat_mertua_ibu`, `telp_mertua_ibu`, `nama_saudara_1`, `alamat_saudara_1`, `telp_saudara_1`, `nama_saudara_2`, `alamat_saudara_2`, `telp_saudara_2`, `nama_saudara_3`, `alamat_saudara_3`, `telp_saudara_3`, `nama_saudara_4`, `alamat_saudara_4`, `telp_saudara_4`, `nama_saudara_5`, `alamat_saudara_5`, `telp_saudara_5`, `nama_istri`, `alamat_istri`, `telp_istri`, `nama_anak_1`, `alamat_anak_1`, `telp_anak_1`, `nama_anak_2`, `alamat_anak_2`, `telp_anak_2`, `nama_anak_3`, `alamat_anak_3`, `telp_anak_3`, `nama_anak_4`, `alamat_anak_4`, `telp_anak_4`) VALUES
(6, 25, 'satimin', 'jln.sumberurip No.32, purworejo pasuruan', '08123456789', 'siti aminah', 'jln.sumberurip No.32, purworejo pasuruan', '081233134334', 'fauzi', 'jln. patiunus No.17, Ngemplakrejo, Pasuruan', '085757478587', 'khoiriyah', 'jln. patiunus No.17, Ngemplakrejo, Pasuruan', '087585858566', 'sinta', 'jln.sumberurip No.34, purworejo pasuruan', '081654355455', 'dany', 'jln.sumberurip No.34, purworejo pasuruan', '082562342344', 'sifa', 'jln. Garuda No.10, purutrejo pasuruan', '0834234234442', 'andri', 'Perumahan Taman Asri 1, Gang. Elang No.17. Tembok Rejo, Pasuruan', '0856475456455', 'taulani', 'Perumahan Taman Asri 1, Gang.Merpati No.12, Tembok Rejo Pasuruan', '087634526534', 'indah', 'Perumahan Pucang Indah 3 No.7D, Purworejo, Kota Pasuruan', '088543534532', 'rudi', 'Perumahan Pucang Indah 3 No.7D, Purworejo, Kota Pasuruan', '089523452553', 'usep', 'Perumahan Pucang Indah 3 No.7D, Purworejo, Kota Pasuruan', '087542352522', '', '', '', '', '', ''),
(7, 27, 'supriyanto', 'jln kenanga no.1', '081233134334', 'masrifah', 'jln kenanga no.1', '081233134334', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 33, 'tomo', 'pasuruan', '081233134334', 'tini', 'pasuruan', '081233134334', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'citra', 'pasuruan', '08123456789', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_kepesertaan`
--

CREATE TABLE `karyawan_kepesertaan` (
  `ID_Kepesertaan` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `NO_BPJS_Kes` int(14) NOT NULL,
  `NO_BPJS_Kerja` int(14) NOT NULL,
  `NO_NPWP` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_kepesertaan`
--

INSERT INTO `karyawan_kepesertaan` (`ID_Kepesertaan`, `ID_Pelamar`, `NO_BPJS_Kes`, `NO_BPJS_Kerja`, `NO_NPWP`) VALUES
(7, 25, 2147483647, 2147483647, 2147483647),
(8, 27, 6545243, 324234234, 4234234),
(9, 33, 2147483647, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_sim`
--

CREATE TABLE `karyawan_sim` (
  `ID_SIM` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `NO_SIM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_sim`
--

INSERT INTO `karyawan_sim` (`ID_SIM`, `ID_Pelamar`, `NO_SIM`) VALUES
(5, 25, 524435235),
(6, 27, 1422556454),
(7, 33, 745329743);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_upload_dokumen`
--

CREATE TABLE `karyawan_upload_dokumen` (
  `ID_PelamarDokumen` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lam_alamat`
--

CREATE TABLE `lam_alamat` (
  `ID_PelamarAlamat` int(11) NOT NULL,
  `ID_Pelamar` int(255) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `rt_ktp` varchar(10) NOT NULL,
  `rw_ktp` varchar(10) NOT NULL,
  `kelurahan_ktp` varchar(250) NOT NULL,
  `kecamatan_ktp` varchar(250) NOT NULL,
  `kota_ktp` varchar(100) NOT NULL,
  `kodepos_ktp` int(5) NOT NULL,
  `alamat_domisili` text NOT NULL,
  `rt_domisili` varchar(10) NOT NULL,
  `rw_domisili` varchar(10) NOT NULL,
  `kelurahan_domisili` varchar(250) NOT NULL,
  `kecamatan_domisili` varchar(250) NOT NULL,
  `kota_domisili` varchar(100) NOT NULL,
  `kodepos_domisili` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lam_alamat`
--

INSERT INTO `lam_alamat` (`ID_PelamarAlamat`, `ID_Pelamar`, `alamat_ktp`, `rt_ktp`, `rw_ktp`, `kelurahan_ktp`, `kecamatan_ktp`, `kota_ktp`, `kodepos_ktp`, `alamat_domisili`, `rt_domisili`, `rw_domisili`, `kelurahan_domisili`, `kecamatan_domisili`, `kota_domisili`, `kodepos_domisili`) VALUES
(12, 25, 'Jln. Elang No.11 Taman Asri 1', '03', '10', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Perumahan Tiara Candi Blok. E5', '09', '03', 'sekargadung', 'Bugul Kidul', 'Pasuruan', 62189),
(13, 26, 'Jln. Elang No.11 Taman Asri 1', '13', '05', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Perumahan Ijen Nirwana Blok E.5', '09', '11', 'oro-oro dowo', 'klojen', 'malang', 62189),
(14, 27, 'Jln Taman Asri 1 No.32', '07', '05', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67139, 'Jln Taman Asri 1 No.32', '02', '06', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67139),
(15, 28, 'Jln. Elang No.11 Taman Asri 1', '04', '07', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Perumahan Tiara Candi Blok. E5', '06', '09', 'Sekargadung', 'Bugul Kidul', 'Pasuruan', 62189),
(16, 29, 'Jln. Elang No.11 Taman Asri 1', '04', '09', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Perumahan Tiara Candi Blok. E5', '08', '05', 'Sekargadung', 'Bugulkidul', 'Pasuruan', 67112),
(17, 30, 'Jln. Elang No.11 Taman Asri 1', '02', '09', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Perumahan Tiara Candi Blok. E5', '04', '02', 'Sekargadung', 'Bugul Kidul', 'Pasuruan', 62189),
(18, 31, 'Jln. Gajah Mada no. 35', '02', '09', 'Kebonsari', 'Panggungrejo', 'Pasuruan', 67112, 'Jln. Gajah Mada no. 35', '02', '05', 'Kebonsari', 'Panggungrejo', 'Pasuruan', 67112),
(19, 32, 'Jln. Elang No.11 Taman Asri 1', '02', '03', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Perumahan Tiara Candi Blok. E5', '04', '08', 'Sekargadung', 'Bugul Kidul', 'Pasuruan', 67139),
(20, 33, 'Jln. Elang No.11 Taman Asri 1', '06', '09', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Perumahan Tiara Candi Blok. E5', '04', '01', 'Sekargadung', 'Bugul Kidul', 'Pasuruan', 62189),
(21, 34, 'Jln Taman Asri 1 No.32', '06', '02', 'Tembokrejo', 'Purworejo', 'Pasuruan', 67111, 'Jln Taman Asri 1 No.32', '06', '03', 'Tembokrejo', 'Purworejo', 'Pasuruan', 62189),
(24, 37, 'Perum Ngijo Regency Blok.E3', '10', '06', 'Kepuharjo', 'Karangploso', 'Malang', 67112, 'Perum Graha Candi Blok M.24', '10', '04', 'Bakalan', 'Bugulkidul', 'Pasuruan', 67139),
(25, 39, 'Jln. WR Supratman No.7', '10', '04', 'Kandangsapi', 'Panggungrejo', 'Pasuruan', 67126, 'Jln. Trunojoyo No.293', '13', '05', 'Bugul kidul', 'Bugul Kidul', 'Pasuruan', 65174);

-- --------------------------------------------------------

--
-- Table structure for table `lam_identitas`
--

CREATE TABLE `lam_identitas` (
  `ID_PelamarIdentitas` int(11) NOT NULL,
  `ID_Pelamar` int(255) NOT NULL,
  `jenkel` int(1) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir_ktp` date NOT NULL,
  `usia` int(10) NOT NULL,
  `agama` int(1) DEFAULT NULL,
  `nohp` varchar(15) NOT NULL,
  `status_kawin` int(1) NOT NULL,
  `kerja_ayah` varchar(250) NOT NULL,
  `kerja_ibu` varchar(250) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lam_identitas`
--

INSERT INTO `lam_identitas` (`ID_PelamarIdentitas`, `ID_Pelamar`, `jenkel`, `tempat_lahir`, `tgl_lahir_ktp`, `usia`, `agama`, `nohp`, `status_kawin`, `kerja_ayah`, `kerja_ibu`, `image`) VALUES
(23, 25, 1, 'Pasuruan', '1994-02-01', 0, 1, '0812345678', 1, 'swasta', 'swasta', '1650862682-81510656_2843591879055364_3782806232797020160_n.jpg'),
(24, 26, 1, 'Pasuruan', '1998-03-02', 0, 1, '08123456789', 0, 'buruh', 'petani', '1650592473-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(25, 27, 1, 'Pasuruan', '1997-03-14', 0, 1, '0812345678', 1, 'Petani', 'IRT', '1650593821-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(26, 28, 0, 'Pasuruan', '1997-03-13', 0, 1, '0812345678', 0, 'petani', 'petani', '1650594344-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(27, 29, 0, 'Pasuruan', '1994-04-02', 0, 1, '0812345678', 0, 'tukang bangunan', 'ibu rumah tangga', '1650594685-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(28, 30, 1, 'Pasuruan', '1998-03-02', 0, 1, '08123456789', 1, 'swasta', 'swasta', '1650595163-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(29, 31, 1, 'Pasuruan', '1996-03-03', 0, 1, '08123456789', 0, 'swasta', 'swasta', '1650596207-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(30, 32, 0, 'Pasuruan', '1994-03-02', 0, 1, '0812345678', 1, 'swasta', 'swasta', '1650596585-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(31, 33, 1, 'Pasuruan', '1998-04-03', 0, 1, '08123456789', 0, 'swasta', 'swasta', '1650597406-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(32, 34, 1, 'Pasuruan', '1995-04-03', 0, 1, '08123456789', 1, 'swasta', 'swasta', '1650598010-70d01adee6dde5dc16bedafe6d14217b.jpg'),
(35, 37, 1, 'Pasuruan', '1997-07-16', 24, 1, '6285649928698', 1, 'Swasta', 'Swasta', '1653967990-f59393dc222e2738b59563d9295336ef.jpg'),
(36, 36, 1, 'Kepanjen', '2012-07-13', 9, 1, '6285655627845', 1, 'Swasta', 'Ibu Rumah Tangga', '1654135849-a3a35b22a7a32e71b6ef7e6a62c303c2.jpg'),
(37, 39, 1, 'Pasuruan', '1997-07-10', 24, 1, '085655627845', 1, 'swasta', 'swasta', '1654587483-man-300x300.png');

-- --------------------------------------------------------

--
-- Table structure for table `lam_kacamata`
--

CREATE TABLE `lam_kacamata` (
  `ID_PelamarKacamata` int(11) NOT NULL,
  `ID_Pelamar` int(255) NOT NULL,
  `kaca_kiri` varchar(10) DEFAULT NULL,
  `kaca_kanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lam_kacamata`
--

INSERT INTO `lam_kacamata` (`ID_PelamarKacamata`, `ID_Pelamar`, `kaca_kiri`, `kaca_kanan`) VALUES
(19, 25, '0,5', '0,2'),
(20, 26, NULL, NULL),
(21, 27, '0,1', '0,2'),
(22, 28, NULL, NULL),
(23, 29, NULL, NULL),
(24, 30, NULL, NULL),
(25, 31, NULL, NULL),
(26, 32, NULL, NULL),
(27, 33, '0,1', '0,2'),
(28, 34, '0,1', '0,2'),
(29, 37, '0,1', '0,2'),
(30, 39, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lam_pendidikan`
--

CREATE TABLE `lam_pendidikan` (
  `ID_PelamarPendidikan` int(11) NOT NULL,
  `Id_Pelamar` int(255) NOT NULL,
  `pendidikan` int(2) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `thn_masuk` int(4) NOT NULL,
  `thn_lulus` int(4) NOT NULL,
  `asal_pendidikan` varchar(100) NOT NULL,
  `tempat_pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lam_pendidikan`
--

INSERT INTO `lam_pendidikan` (`ID_PelamarPendidikan`, `Id_Pelamar`, `pendidikan`, `jurusan`, `thn_masuk`, `thn_lulus`, `asal_pendidikan`, `tempat_pendidikan`) VALUES
(8, 25, 3, 'tata boga', 2014, 2017, 'SMAN 1 PURWOSARI', 'Pasuruan'),
(9, 26, 4, 'Administasi Negara', 2015, 2019, 'Universitas Brawijaya', 'Malang'),
(10, 27, 5, 'Teknik Industri', 2014, 2018, 'Universitas Islam Malang', 'Malang'),
(11, 28, 3, 'Ekonomi', 2015, 2018, 'SMAN 1 PURWOSARI', 'Pasuruan'),
(12, 29, 5, 'Teknik Elektro', 2014, 2018, 'Universitas Gajayana', 'Malang'),
(13, 30, 3, 'IPA', 2014, 2017, 'SMAN 1 GRATI', 'PASURUAN'),
(14, 31, 4, 'Ekonomi', 2015, 2019, 'Universitas Merdeka', 'Pasuruan'),
(15, 32, 3, 'IPA', 2015, 2018, 'SMAN 1 Pasuruan', 'Pasuruan'),
(16, 33, 5, 'Teknik Informatika', 2015, 2019, 'Universitas Jember', 'Jember'),
(17, 34, 5, 'Psikologi', 2013, 2017, 'Universitas Negeri Surabaya', 'Surabaya'),
(18, 37, 3, 'IPA', 2015, 2018, 'SMAN 2 PASURUAN', 'PASURUAN'),
(19, 37, 5, 'Administrasi', 2018, 2021, 'Universitas Brawijaya', 'Malang'),
(20, 33, 3, 'IPA', 2014, 2017, 'SMAN 1 GRATI', 'Pasuruan'),
(21, 39, 1, '-', 2004, 2010, 'SDN Pekuncen', 'Pasuruan'),
(22, 39, 2, '-', 2010, 2013, 'SMPN 1 Pasuruan', 'Pasuruan'),
(23, 39, 3, 'IPA', 2013, 2016, 'SMAN 1 Pasuruan', 'Pasuruan'),
(24, 39, 5, 'Teknik Informatika', 2016, 2020, 'Universitas Islam Malang', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `lam_pengalamankerja`
--

CREATE TABLE `lam_pengalamankerja` (
  `ID_PelamarPengalaman` int(11) NOT NULL,
  `ID_Pelamar` int(255) NOT NULL,
  `peng_perusahaan` varchar(250) NOT NULL,
  `peng_bidang` varchar(250) NOT NULL,
  `peng_tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lam_pengalamankerja`
--

INSERT INTO `lam_pengalamankerja` (`ID_PelamarPengalaman`, `ID_Pelamar`, `peng_perusahaan`, `peng_bidang`, `peng_tahun`) VALUES
(14, 25, 'PT. Merakindo Mix', 'Produksi', 2019),
(15, 26, 'PT.Mayora', 'produksi', 2020),
(16, 27, 'PT. wahana cargo', 'Driver', 2019),
(17, 28, 'PT.Antrak', 'Pengecoran', 2020),
(18, 29, 'PT. Cheil Jedang Indonesia', 'Electrical', 2019),
(19, 30, 'CV. indah pratiwi', 'marketing', 2018),
(20, 31, 'PT. Wuling Motor', 'Akuntansi', 2020),
(21, 32, 'PT. Merakindo Mix', 'Produksi', 2019),
(22, 33, 'Royal Plaza', 'IT Support', 2020),
(23, 34, 'PT. Maspion', 'HRD', 2019),
(28, 37, 'PT. Mayora', 'Produksi', 2019),
(29, 37, 'PT. Merakindo Mix', 'marketing', 2020),
(30, 39, 'PT. Hummatech Indonesia (Magang)', 'Programmer Desktop', 2018),
(31, 39, 'CV. Nakulasadewa', 'Web Developher', 2020),
(32, 39, 'CV.Ridicomp Technologi', 'Networking', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `lam_pertanyaan`
--

CREATE TABLE `lam_pertanyaan` (
  `ID_PelamarPertanyaan` int(11) NOT NULL,
  `ID_Pelamar` int(255) NOT NULL,
  `jwb_kacamata` int(1) DEFAULT NULL,
  `jwb_rokok` int(1) DEFAULT NULL,
  `jwb_sim` int(1) DEFAULT NULL,
  `jwb_celaka_kerja` int(1) DEFAULT NULL,
  `jwb_celaka_lalin` int(1) DEFAULT NULL,
  `jwb_patah_tulang` int(1) DEFAULT NULL,
  `jwb_pernah_kerja` int(1) DEFAULT NULL,
  `jwb_nikah_tahun` int(1) DEFAULT NULL,
  `jwb_shift` int(1) DEFAULT NULL,
  `jwb_kerja` int(1) DEFAULT NULL,
  `jwb_nikah_kontrak` int(1) DEFAULT NULL,
  `jwb_kuliah` int(1) DEFAULT NULL,
  `jwb_area` int(1) DEFAULT NULL,
  `jwb_no_rokok` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lam_pertanyaan`
--

INSERT INTO `lam_pertanyaan` (`ID_PelamarPertanyaan`, `ID_Pelamar`, `jwb_kacamata`, `jwb_rokok`, `jwb_sim`, `jwb_celaka_kerja`, `jwb_celaka_lalin`, `jwb_patah_tulang`, `jwb_pernah_kerja`, `jwb_nikah_tahun`, `jwb_shift`, `jwb_kerja`, `jwb_nikah_kontrak`, `jwb_kuliah`, `jwb_area`, `jwb_no_rokok`) VALUES
(19, 25, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0),
(20, 26, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1),
(21, 27, 1, 1, 3, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1),
(22, 28, 0, 1, 2, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1),
(23, 29, 0, 0, 3, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1),
(24, 30, 0, 1, 2, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(25, 31, 0, 0, 3, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(26, 32, 0, 0, 3, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1),
(27, 33, 1, 1, 3, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(28, 34, 1, 0, 3, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(29, 37, 1, 0, 3, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1),
(30, 39, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lam_ukuran`
--

CREATE TABLE `lam_ukuran` (
  `ID_PelamarUkuran` int(11) NOT NULL,
  `ID_Pelamar` int(255) NOT NULL,
  `tinggi_badan_cm` int(3) NOT NULL,
  `berat_badan_kg` int(3) NOT NULL,
  `ukuran_baju` varchar(5) NOT NULL,
  `ukuran_sepatu_cm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lam_ukuran`
--

INSERT INTO `lam_ukuran` (`ID_PelamarUkuran`, `ID_Pelamar`, `tinggi_badan_cm`, `berat_badan_kg`, `ukuran_baju`, `ukuran_sepatu_cm`) VALUES
(11, 25, 180, 70, 'XL', 43),
(12, 26, 170, 80, 'XL', 43),
(13, 27, 180, 70, 'XL', 43),
(14, 28, 180, 70, 'XL', 43),
(15, 29, 170, 70, 'XL', 42),
(16, 30, 180, 70, 'XL', 43),
(17, 31, 180, 70, 'XL', 43),
(18, 32, 170, 70, 'XL', 43),
(19, 33, 180, 70, 'XL', 43),
(20, 34, 170, 70, 'XL', 43),
(21, 37, 180, 70, 'XL', 38),
(22, 39, 167, 70, 'XL', 41);

-- --------------------------------------------------------

--
-- Table structure for table `m_hrd`
--

CREATE TABLE `m_hrd` (
  `hrd_id` int(11) NOT NULL,
  `hrd_user` varchar(100) NOT NULL,
  `hrd_pass` text NOT NULL,
  `hrd_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_hrd`
--

INSERT INTO `m_hrd` (`hrd_id`, `hrd_user`, `hrd_pass`, `hrd_status`) VALUES
(2, 'guehasim', 'bzB1a3VO', 0),
(3, 'admin', 'bk9VTGpI', 1),
(4, 'admin', 'UkxSZ1RF', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_karyawan`
--

CREATE TABLE `m_karyawan` (
  `nik` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_bpjs_kes` int(20) NOT NULL,
  `no_bpjs_kerja` int(20) NOT NULL,
  `no_npwp` int(20) NOT NULL,
  `no_sim` int(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `kel_kec_ktp` varchar(250) NOT NULL,
  `kota_ktp` varchar(100) NOT NULL,
  `kodepos_ktp` int(5) NOT NULL,
  `alamat_domisili` text NOT NULL,
  `kel_kec_domisili` varchar(250) NOT NULL,
  `kota_domisili` int(100) NOT NULL,
  `kodepos_domisili` int(5) NOT NULL,
  `area` int(1) DEFAULT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `ket_lulus` int(1) NOT NULL,
  `thn_dari` int(4) NOT NULL,
  `thn_sudah` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_loker`
--

CREATE TABLE `m_loker` (
  `ID_Loker` int(11) NOT NULL,
  `lok_nama` varchar(250) NOT NULL,
  `lok_tgl_awal` date NOT NULL,
  `lok_tgl_akhir` date NOT NULL,
  `lok_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_loker`
--

INSERT INTO `m_loker` (`ID_Loker`, `lok_nama`, `lok_tgl_awal`, `lok_tgl_akhir`, `lok_status`) VALUES
(6, 'IT Staff', '2022-04-14', '2022-04-30', 0),
(7, 'Cleaning Service', '2022-04-01', '2022-04-30', 0),
(8, 'Quality Control', '2022-04-10', '2022-04-30', 0),
(10, 'purchasing', '2022-04-14', '2022-04-29', 0),
(11, 'Produksi', '2022-04-15', '2022-05-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_pelamar`
--

CREATE TABLE `m_pelamar` (
  `ID_Pelamar` int(255) NOT NULL,
  `nik_ktp` int(20) NOT NULL,
  `nama_ktp` varchar(255) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pelamar`
--

INSERT INTO `m_pelamar` (`ID_Pelamar`, `nik_ktp`, `nama_ktp`, `user`, `email`, `pass`) VALUES
(25, 2019201, 'nasrul', 'nasrul', 'nasrul@gmail.com', 'bmFzcnVs'),
(26, 2019202, 'nasik', 'nasik', 'nasik@gmail.com', 'bmFzaWs='),
(27, 2019203, 'heri', 'heri', 'heri@gmail.com', 'aGVyaQ=='),
(28, 2019204, 'dewi', 'dewi', 'dewi@gmail.com', 'ZGV3aQ=='),
(29, 2019205, 'anita', 'anita', 'anita@gmail.com', 'YW5pdGE='),
(30, 2019206, 'ripin', 'ripin', 'ripin@gmail.com', 'cmlwaW4='),
(31, 2019207, 'aisyah', 'aisyah', 'aisyah@gmail.com', 'YWlzeWFo'),
(32, 2019208, 'rosy', 'rosy', 'rosy@gmail.com', 'cm9zeQ=='),
(33, 2019209, 'lana', 'lana', 'lana@gmail.com', 'bGFuYQ=='),
(34, 2019210, 'sugi', 'sugi', 'sugi@gmail.com', 'c3VnaQ=='),
(36, 2019266004, 'sakdullah', 'dullah', 'mail@example.com', 'MTIz'),
(37, 2147483647, 'wildan pratama', 'wildan', 'wildan@gmail.com', 'MTIz'),
(38, 2147483647, 'abdul ghoni', 'ghoni', 'ghoni@mail.com', 'MTIz'),
(39, 2147483647, 'ahmad arifin wijaya', 'arif', 'arif@gmail.com', 'MTIz'),
(40, 2147483647, 'tes', 'tes', 'tes@gmail.com', 'MTIz');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `ID_User` int(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Pass` text NOT NULL,
  `Status_User` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`ID_User`, `User`, `Pass`, `Status_User`) VALUES
(2, 'admin', 'YWRtaW4=', 1),
(3, 'nasik', 'bmFzaWs=', 1),
(4, 'torik', 'dG9yaWs=', 2),
(7, 'adminn', 'QWRtaW5uMTIz', 1),
(8, 'samit', 'c2FtaXQ=', 1),
(9, 'sifa', 'c2lmYQ==', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_pindah`
--

CREATE TABLE `status_pindah` (
  `ID_Pindah` int(11) NOT NULL,
  `ID_Pelamar` int(11) NOT NULL,
  `status_Pindah` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_recruitment`
--

CREATE TABLE `status_recruitment` (
  `ID_recruitment` int(11) NOT NULL,
  `status_recruitment` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_recruitment`
--

INSERT INTO `status_recruitment` (`ID_recruitment`, `status_recruitment`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampil_karyawan`
--
CREATE TABLE `tampil_karyawan` (
`nik_ktp` int(20)
,`nama_ktp` varchar(255)
,`TGL_Lamar` date
,`status_Join` int(1)
,`status_aktif` int(1)
,`ID_Pelamar` int(255)
,`area` int(1)
,`hubungan_Darurat` varchar(255)
,`telp_Darurat` varchar(15)
,`nama_Darurat` varchar(255)
,`status_kawin` int(2)
,`nama_ortu_ayah` varchar(255)
,`NO_BPJS_Kes` int(14)
,`NO_BPJS_Kerja` int(14)
,`NO_NPWP` int(14)
,`NO_SIM` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `awal`
--
DROP TABLE IF EXISTS `awal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `awal`  AS  select `m_pelamar`.`nik_ktp` AS `nik_ktp`,`m_pelamar`.`nama_ktp` AS `nama_ktp`,`lam_identitas`.`tempat_lahir` AS `tempat_lahir`,`lam_ukuran`.`tinggi_badan_cm` AS `tinggi_badan_cm`,`lam_ukuran`.`berat_badan_kg` AS `berat_badan_kg` from (((`m_pelamar` left join `lam_identitas` on((`m_pelamar`.`ID_Pelamar` = `lam_identitas`.`ID_Pelamar`))) left join `lam_ukuran` on((`m_pelamar`.`ID_Pelamar` = `lam_ukuran`.`ID_Pelamar`))) left join `lam_pertanyaan` on((`m_pelamar`.`ID_Pelamar` = `lam_pertanyaan`.`ID_Pelamar`))) ;

-- --------------------------------------------------------

--
-- Structure for view `tampil_karyawan`
--
DROP TABLE IF EXISTS `tampil_karyawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampil_karyawan`  AS  select `m_pelamar`.`nik_ktp` AS `nik_ktp`,`m_pelamar`.`nama_ktp` AS `nama_ktp`,`join_lamar`.`TGL_Lamar` AS `TGL_Lamar`,`join_lamar`.`status_Join` AS `status_Join`,`join_lamar`.`status_aktif` AS `status_aktif`,`join_lamar`.`ID_Pelamar` AS `ID_Pelamar`,`karyawan_area`.`area` AS `area`,`karyawan_darurat`.`hubungan_Darurat` AS `hubungan_Darurat`,`karyawan_darurat`.`telp_Darurat` AS `telp_Darurat`,`karyawan_darurat`.`nama_Darurat` AS `nama_Darurat`,`karyawan_kawin`.`status_kawin` AS `status_kawin`,`karyawan_keluarga`.`nama_ortu_ayah` AS `nama_ortu_ayah`,`karyawan_kepesertaan`.`NO_BPJS_Kes` AS `NO_BPJS_Kes`,`karyawan_kepesertaan`.`NO_BPJS_Kerja` AS `NO_BPJS_Kerja`,`karyawan_kepesertaan`.`NO_NPWP` AS `NO_NPWP`,`karyawan_sim`.`NO_SIM` AS `NO_SIM` from (((((((`join_lamar` join `m_pelamar` on((`join_lamar`.`ID_Pelamar` = `m_pelamar`.`ID_Pelamar`))) left join `karyawan_area` on((`m_pelamar`.`ID_Pelamar` = `karyawan_area`.`ID_Pelamar`))) left join `karyawan_darurat` on((`m_pelamar`.`ID_Pelamar` = `karyawan_darurat`.`ID_Pelamar`))) left join `karyawan_kawin` on((`m_pelamar`.`ID_Pelamar` = `karyawan_kawin`.`ID_Pelamar`))) left join `karyawan_keluarga` on((`m_pelamar`.`ID_Pelamar` = `karyawan_keluarga`.`ID_Pelamar`))) left join `karyawan_kepesertaan` on((`m_pelamar`.`ID_Pelamar` = `karyawan_kepesertaan`.`ID_Pelamar`))) left join `karyawan_sim` on((`m_pelamar`.`ID_Pelamar` = `karyawan_sim`.`ID_Pelamar`))) where ((`join_lamar`.`status_Join` = 8) and (`join_lamar`.`status_aktif` = 1)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `join_lamar`
--
ALTER TABLE `join_lamar`
  ADD PRIMARY KEY (`ID_PelamarJoin`);

--
-- Indexes for table `karyawan_area`
--
ALTER TABLE `karyawan_area`
  ADD PRIMARY KEY (`ID_Area`);

--
-- Indexes for table `karyawan_darurat`
--
ALTER TABLE `karyawan_darurat`
  ADD PRIMARY KEY (`ID_Darurat`);

--
-- Indexes for table `karyawan_kawin`
--
ALTER TABLE `karyawan_kawin`
  ADD PRIMARY KEY (`ID_Kawin`);

--
-- Indexes for table `karyawan_keluarga`
--
ALTER TABLE `karyawan_keluarga`
  ADD PRIMARY KEY (`ID_Keluarga`);

--
-- Indexes for table `karyawan_kepesertaan`
--
ALTER TABLE `karyawan_kepesertaan`
  ADD PRIMARY KEY (`ID_Kepesertaan`);

--
-- Indexes for table `karyawan_sim`
--
ALTER TABLE `karyawan_sim`
  ADD PRIMARY KEY (`ID_SIM`);

--
-- Indexes for table `karyawan_upload_dokumen`
--
ALTER TABLE `karyawan_upload_dokumen`
  ADD PRIMARY KEY (`ID_PelamarDokumen`);

--
-- Indexes for table `lam_alamat`
--
ALTER TABLE `lam_alamat`
  ADD PRIMARY KEY (`ID_PelamarAlamat`);

--
-- Indexes for table `lam_identitas`
--
ALTER TABLE `lam_identitas`
  ADD PRIMARY KEY (`ID_PelamarIdentitas`);

--
-- Indexes for table `lam_kacamata`
--
ALTER TABLE `lam_kacamata`
  ADD PRIMARY KEY (`ID_PelamarKacamata`);

--
-- Indexes for table `lam_pendidikan`
--
ALTER TABLE `lam_pendidikan`
  ADD PRIMARY KEY (`ID_PelamarPendidikan`);

--
-- Indexes for table `lam_pengalamankerja`
--
ALTER TABLE `lam_pengalamankerja`
  ADD PRIMARY KEY (`ID_PelamarPengalaman`);

--
-- Indexes for table `lam_pertanyaan`
--
ALTER TABLE `lam_pertanyaan`
  ADD PRIMARY KEY (`ID_PelamarPertanyaan`);

--
-- Indexes for table `lam_ukuran`
--
ALTER TABLE `lam_ukuran`
  ADD PRIMARY KEY (`ID_PelamarUkuran`);

--
-- Indexes for table `m_hrd`
--
ALTER TABLE `m_hrd`
  ADD PRIMARY KEY (`hrd_id`);

--
-- Indexes for table `m_loker`
--
ALTER TABLE `m_loker`
  ADD PRIMARY KEY (`ID_Loker`);

--
-- Indexes for table `m_pelamar`
--
ALTER TABLE `m_pelamar`
  ADD PRIMARY KEY (`ID_Pelamar`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `status_pindah`
--
ALTER TABLE `status_pindah`
  ADD PRIMARY KEY (`ID_Pindah`);

--
-- Indexes for table `status_recruitment`
--
ALTER TABLE `status_recruitment`
  ADD PRIMARY KEY (`ID_recruitment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `join_lamar`
--
ALTER TABLE `join_lamar`
  MODIFY `ID_PelamarJoin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `karyawan_area`
--
ALTER TABLE `karyawan_area`
  MODIFY `ID_Area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan_darurat`
--
ALTER TABLE `karyawan_darurat`
  MODIFY `ID_Darurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `karyawan_kawin`
--
ALTER TABLE `karyawan_kawin`
  MODIFY `ID_Kawin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan_keluarga`
--
ALTER TABLE `karyawan_keluarga`
  MODIFY `ID_Keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `karyawan_kepesertaan`
--
ALTER TABLE `karyawan_kepesertaan`
  MODIFY `ID_Kepesertaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `karyawan_sim`
--
ALTER TABLE `karyawan_sim`
  MODIFY `ID_SIM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `karyawan_upload_dokumen`
--
ALTER TABLE `karyawan_upload_dokumen`
  MODIFY `ID_PelamarDokumen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lam_alamat`
--
ALTER TABLE `lam_alamat`
  MODIFY `ID_PelamarAlamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `lam_identitas`
--
ALTER TABLE `lam_identitas`
  MODIFY `ID_PelamarIdentitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `lam_kacamata`
--
ALTER TABLE `lam_kacamata`
  MODIFY `ID_PelamarKacamata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lam_pendidikan`
--
ALTER TABLE `lam_pendidikan`
  MODIFY `ID_PelamarPendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `lam_pengalamankerja`
--
ALTER TABLE `lam_pengalamankerja`
  MODIFY `ID_PelamarPengalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `lam_pertanyaan`
--
ALTER TABLE `lam_pertanyaan`
  MODIFY `ID_PelamarPertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lam_ukuran`
--
ALTER TABLE `lam_ukuran`
  MODIFY `ID_PelamarUkuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `m_hrd`
--
ALTER TABLE `m_hrd`
  MODIFY `hrd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_loker`
--
ALTER TABLE `m_loker`
  MODIFY `ID_Loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `m_pelamar`
--
ALTER TABLE `m_pelamar`
  MODIFY `ID_Pelamar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `ID_User` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status_pindah`
--
ALTER TABLE `status_pindah`
  MODIFY `ID_Pindah` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_recruitment`
--
ALTER TABLE `status_recruitment`
  MODIFY `ID_recruitment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
