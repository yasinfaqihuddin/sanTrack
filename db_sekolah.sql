-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 03:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `nip`, `nama`, `alamat`, `telpon`, `foto`) VALUES
(7, '110320030041100006', 'Ust Kukuh Setiawan', 'Malang, Jawa Timur', '089621966663', '757-default.png'),
(8, '110320030041100007', 'Ust Bagus Priyono', 'Malang, Jawa Timur', '089621966663', '43-default.png'),
(9, '110320030041100008', 'Ust Sofyan Sofi', 'Malang, Jawa Timur', '089621966663', '173-yasinLogo.jpg'),
(10, '210320030041100001', 'Ust Iqbal Vicry', 'Malang, Jawa Timur', '089621966663', '338-default.png'),
(11, '112320030041100007', 'Ust Saifullah Al-Hafidz', 'Malang, Jawa Timur', '089621966663', 'default.png'),
(12, '110320330041100001', 'Syaikh Utsman Al-Makki', 'Malang, Jawa Timur', '089621966663', 'default.png'),
(13, '110320030041103001', 'Ust Dwi Triyono', 'Malang, Jawa Timur', '089621966663', 'default.png'),
(14, '110320030041300007', 'Ust Hidayatullah', 'Madiun, Jawa Timur', '089621966663', 'default.png'),
(15, '310320030041100003', 'Ust Abu Bakar', 'Malang, Jawa Timur', '089621966663', '272-school.png'),
(16, '210320030041500001', 'Ust Ali Faqihuddin', 'Kediri, Jawa Timur', '089621966663', 'default.png'),
(17, '110320330041130001', 'Ust Ali Maksum', 'Gresik, Jawa Timur', '089621966663', 'default.png'),
(18, '220320030041100001', 'Ust Adi Hidayat', 'Sidoarjo, Jawa Timur', '089621966663', 'default.png'),
(19, '210320030041100008', 'Ust Junda Shobri', 'Malang, Jawa Timur', '089621966663', 'default.png'),
(20, '210320030041400001', 'Ust Rofiqus Syuhada', 'Probolinggo, Jawa Timur', '089621966663', 'default.png'),
(21, '110320030041500008', 'Ust Hasan Albasri', 'Malang, Jawa Timur', '089621966663', 'default.png'),
(22, '110320040041300007', 'Ust Abdurrohman As-Siddiq', 'Malang, Jawa Timur', '089621966663', 'default.png'),
(23, '210320030011100001', 'Ust Muhammad Ali Firdaus', 'Malang, Jawa Timur', '089621966663', 'default.png'),
(24, '110360030041300007', 'Ust Arham Ahmad', 'Malang, Jawa Timur', '089621966663', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_input_pelanggaran`
--

CREATE TABLE `tbl_input_pelanggaran` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pelanggaran` varchar(100) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `poin` int(100) DEFAULT NULL,
  `saksi` enum('Teman','Musyrif/ah','Ustadz/ah','') DEFAULT NULL,
  `nm_saksi` varchar(20) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_input_pelanggaran`
--

INSERT INTO `tbl_input_pelanggaran` (`id`, `tanggal`, `nama`, `pelanggaran`, `waktu`, `kategori`, `poin`, `saksi`, `nm_saksi`, `catatan`) VALUES
(1, '0000-00-00', 'Fadli', 'Tidur di dapur', 'Jam pelajaran', NULL, NULL, 'Teman', 'Yusuf', 'Katanya ngantuk karena tugas malam'),
(2, '2024-11-25', 'Yasin Faqihuddin', 'Tidur di wc', 'jam pelajaran', NULL, NULL, 'Teman', 'yusuf', 'Katanya sih ngantuk karena tugas malam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_ujian`
--

CREATE TABLE `tbl_nilai_ujian` (
  `id` int(11) NOT NULL,
  `no_ujian` char(7) NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `nilai_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nilai_ujian`
--

INSERT INTO `tbl_nilai_ujian` (`id`, `no_ujian`, `pelajaran`, `nilai_ujian`) VALUES
(8, 'UTS-001', 'Bahasa Indonesia', 85),
(9, 'UTS-001', 'fdgdfsgsd', 95),
(10, 'UTS-001', 'Fisika', 90),
(11, 'UTS-001', 'Proses Kimia Industri', 75),
(12, 'UTS-001', 'Bahasa Inggris', 90),
(13, 'UTS-001', 'Operasi Teknik Kimia', 85),
(14, 'UTS-001', 'Proses Industri Kimia', 80),
(15, 'UTS-002', 'Matematika', 65),
(16, 'UTS-002', 'Bahasa Indonesia', 50),
(17, 'UTS-002', 'Analisis Jenis', 55),
(18, 'UTS-002', 'Kimia Organik', 45),
(19, 'UTS-002', 'fdgdfsgsd', 40),
(20, 'UTS-002', 'Bahasa Inggris', 40),
(21, 'UTS-002', 'Analisis Sampel', 55),
(22, 'UTS-003', 'Bahasa Indonesia', 80),
(23, 'UTS-003', 'fdgdfsgsd', 65),
(24, 'UTS-003', 'Fisika', 75),
(25, 'UTS-003', 'Proses Kimia Industri', 65),
(26, 'UTS-003', 'Bahasa Inggris', 60),
(27, 'UTS-003', 'Operasi Teknik Kimia', 70),
(28, 'UTS-003', 'Proses Industri Kimia', 75),
(29, 'UTS-004', 'Matematika', 65),
(30, 'UTS-004', 'Bahasa Indonesia', 75),
(31, 'UTS-004', 'Analisis Jenis', 55),
(32, 'UTS-004', 'Kimia Organik', 70),
(33, 'UTS-004', 'fdgdfsgsd', 65),
(34, 'UTS-004', 'Bahasa Inggris', 80),
(35, 'UTS-004', 'Analisis Sampel', 65),
(36, 'UTS-005', 'Matematika', 55),
(37, 'UTS-005', 'Bahasa Indonesia', 65),
(38, 'UTS-005', 'Analisis Jenis', 45),
(39, 'UTS-005', 'Kimia Organik', 55),
(40, 'UTS-005', 'fdgdfsgsd', 60),
(41, 'UTS-005', 'Bahasa Inggris', 55),
(42, 'UTS-005', 'Analisis Sampel', 50),
(43, 'UTS-006', 'Matematika', 95),
(44, 'UTS-006', 'Bahasa Indonesia', 100),
(45, 'UTS-006', 'Analisis Jenis', 90),
(46, 'UTS-006', 'Kimia Organik', 95),
(47, 'UTS-006', 'fdgdfsgsd', 85),
(48, 'UTS-006', 'Bahasa Inggris', 95),
(49, 'UTS-006', 'Analisis Sampel', 90),
(50, 'UTS-007', 'Bahasa Indonesia', 85),
(51, 'UTS-007', 'fdgdfsgsd', 70),
(52, 'UTS-007', 'Fisika', 75),
(53, 'UTS-007', 'Proses Kimia Industri', 80),
(54, 'UTS-007', 'Bahasa Inggris', 80),
(55, 'UTS-007', 'Operasi Teknik Kimia', 75),
(56, 'UTS-007', 'Proses Industri Kimia', 70),
(57, 'UTS-008', 'Bahasa Indonesia', 60),
(58, 'UTS-008', 'fdgdfsgsd', 50),
(59, 'UTS-008', 'Fisika', 55),
(60, 'UTS-008', 'Proses Kimia Industri', 50),
(61, 'UTS-008', 'Bahasa Inggris', 40),
(62, 'UTS-008', 'Operasi Teknik Kimia', 45),
(63, 'UTS-008', 'Proses Industri Kimia', 50),
(64, 'UTS-001', 'Ulumul Quran', 85),
(65, 'UTS-001', 'Qawaid Quraniyyah', 85),
(66, 'UTS-001', 'Manajemen Halaqoh Quran', 75),
(67, 'UTS-001', 'Matan Jazariyyah', 80),
(68, 'UTS-001', 'Metode ABATA', 70),
(69, 'UTS-001', 'Aqidah', 95),
(70, 'UTS-001', 'Tarikh', 75),
(71, 'UTS-001', 'Fiqih', 75),
(72, 'UTS-002', 'Nahwu', 85),
(73, 'UTS-002', 'Shorof', 85),
(74, 'UTS-002', 'Insya', 75),
(75, 'UTS-002', 'Kalam', 70),
(76, 'UTS-002', 'Qiroah', 85),
(77, 'UTS-002', 'Aqidah', 70),
(78, 'UTS-002', 'Tarikh', 95),
(79, 'UTS-002', 'Fiqih', 95),
(80, 'UTS-003', 'Nahwu', 75),
(81, 'UTS-003', 'Shorof', 70),
(82, 'UTS-003', 'Insya', 65),
(83, 'UTS-003', 'Kalam', 75),
(84, 'UTS-003', 'Qiroah', 65),
(85, 'UTS-003', 'Aqidah', 70),
(86, 'UTS-003', 'Tarikh', 85),
(87, 'UTS-003', 'Fiqih', 65),
(88, 'UTS-004', 'Nahwu', 55),
(89, 'UTS-004', 'Shorof', 50),
(90, 'UTS-004', 'Insya', 45),
(91, 'UTS-004', 'Kalam', 65),
(92, 'UTS-004', 'Qiroah', 75),
(93, 'UTS-004', 'Aqidah', 85),
(94, 'UTS-004', 'Tarikh', 65),
(95, 'UTS-004', 'Fiqih', 80),
(96, 'UTS-005', 'Nahwu', 65),
(97, 'UTS-005', 'Shorof', 60),
(98, 'UTS-005', 'Insya', 70),
(99, 'UTS-005', 'Kalam', 65),
(100, 'UTS-005', 'Qiroah', 55),
(101, 'UTS-005', 'Aqidah', 75),
(102, 'UTS-005', 'Tarikh', 75),
(103, 'UTS-005', 'Fiqih', 70),
(104, 'UTS-006', 'Nahwu', 90),
(105, 'UTS-006', 'Shorof', 95),
(106, 'UTS-006', 'Insya', 80),
(107, 'UTS-006', 'Kalam', 85),
(108, 'UTS-006', 'Qiroah', 75),
(109, 'UTS-006', 'Aqidah', 80),
(110, 'UTS-006', 'Tarikh', 80),
(111, 'UTS-006', 'Fiqih', 90),
(112, 'UTS-007', 'Nahwu', 75),
(113, 'UTS-007', 'Shorof', 75),
(114, 'UTS-007', 'Insya', 70),
(115, 'UTS-007', 'Kalam', 85),
(116, 'UTS-007', 'Qiroah', 80),
(117, 'UTS-007', 'Aqidah', 90),
(118, 'UTS-007', 'Tarikh', 95),
(119, 'UTS-007', 'Fiqih', 85),
(120, 'UTS-008', 'Nahwu', 55),
(121, 'UTS-008', 'Shorof', 45),
(122, 'UTS-008', 'Insya', 65),
(123, 'UTS-008', 'Kalam', 55),
(124, 'UTS-008', 'Qiroah', 50),
(125, 'UTS-008', 'Aqidah', 40),
(126, 'UTS-008', 'Tarikh', 45),
(127, 'UTS-008', 'Fiqih', 65),
(128, 'UTS-009', 'Nahwu', 80),
(129, 'UTS-009', 'Shorof', 85),
(130, 'UTS-009', 'Insya', 95),
(131, 'UTS-009', 'Kalam', 90),
(132, 'UTS-009', 'Qiroah', 90),
(133, 'UTS-009', 'Aqidah', 90),
(134, 'UTS-009', 'Tarikh', 90),
(135, 'UTS-009', 'Fiqih', 90),
(136, 'UTS-010', 'Nahwu', 100),
(137, 'UTS-010', 'Shorof', 100),
(138, 'UTS-010', 'Insya', 100),
(139, 'UTS-010', 'Kalam', 90),
(140, 'UTS-010', 'Qiroah', 95),
(141, 'UTS-010', 'Aqidah', 100),
(142, 'UTS-010', 'Tarikh', 95),
(143, 'UTS-010', 'Fiqih', 90),
(144, 'UTS-011', 'Nahwu', 90),
(145, 'UTS-011', 'Shorof', 95),
(146, 'UTS-011', 'Insya', 85),
(147, 'UTS-011', 'Kalam', 80),
(148, 'UTS-011', 'Qiroah', 80),
(149, 'UTS-011', 'Aqidah', 90),
(150, 'UTS-011', 'Tarikh', 95),
(151, 'UTS-011', 'Fiqih', 100),
(152, 'UTS-012', 'Nahwu', 100),
(153, 'UTS-012', 'Shorof', 95),
(154, 'UTS-012', 'Insya', 90),
(155, 'UTS-012', 'Kalam', 90),
(156, 'UTS-012', 'Qiroah', 95),
(157, 'UTS-012', 'Aqidah', 100),
(158, 'UTS-012', 'Tarikh', 95),
(159, 'UTS-012', 'Fiqih', 100),
(160, 'UTS-013', 'Nahwu', 100),
(161, 'UTS-013', 'Shorof', 90),
(162, 'UTS-013', 'Insya', 85),
(163, 'UTS-013', 'Kalam', 85),
(164, 'UTS-013', 'Qiroah', 80),
(165, 'UTS-013', 'Aqidah', 95),
(166, 'UTS-013', 'Tarikh', 95),
(167, 'UTS-013', 'Fiqih', 100),
(168, 'UTS-014', 'Nahwu', 50),
(169, 'UTS-014', 'Shorof', 40),
(170, 'UTS-014', 'Insya', 45),
(171, 'UTS-014', 'Kalam', 65),
(172, 'UTS-014', 'Qiroah', 40),
(173, 'UTS-014', 'Aqidah', 75),
(174, 'UTS-014', 'Tarikh', 70),
(175, 'UTS-014', 'Fiqih', 45),
(176, 'UTS-015', 'Nahwu', 85),
(177, 'UTS-015', 'Shorof', 75),
(178, 'UTS-015', 'Insya', 70),
(179, 'UTS-015', 'Kalam', 80),
(180, 'UTS-015', 'Qiroah', 85),
(181, 'UTS-015', 'Aqidah', 75),
(182, 'UTS-015', 'Tarikh', 75),
(183, 'UTS-015', 'Fiqih', 85),
(184, 'UTS-016', 'Nahwu', 85),
(185, 'UTS-016', 'Shorof', 75),
(186, 'UTS-016', 'Insya', 75),
(187, 'UTS-016', 'Kalam', 70),
(188, 'UTS-016', 'Qiroah', 70),
(189, 'UTS-016', 'Aqidah', 95),
(190, 'UTS-016', 'Tarikh', 85),
(191, 'UTS-016', 'Fiqih', 95),
(192, 'UTS-017', 'Nahwu', 85),
(193, 'UTS-017', 'Shorof', 75),
(194, 'UTS-017', 'Insya', 70),
(195, 'UTS-017', 'Kalam', 80),
(196, 'UTS-017', 'Qiroah', 90),
(197, 'UTS-017', 'Aqidah', 75),
(198, 'UTS-017', 'Tarikh', 85),
(199, 'UTS-017', 'Fiqih', 80),
(200, 'UTS-018', 'Nahwu', 85),
(201, 'UTS-018', 'Shorof', 75),
(202, 'UTS-018', 'Insya', 70),
(203, 'UTS-018', 'Kalam', 95),
(204, 'UTS-018', 'Qiroah', 90),
(205, 'UTS-018', 'Aqidah', 85),
(206, 'UTS-018', 'Tarikh', 80),
(207, 'UTS-018', 'Fiqih', 85),
(208, 'UTS-019', 'Nahwu', 85),
(209, 'UTS-019', 'Shorof', 75),
(210, 'UTS-019', 'Insya', 90),
(211, 'UTS-019', 'Kalam', 70),
(212, 'UTS-019', 'Qiroah', 75),
(213, 'UTS-019', 'Aqidah', 70),
(214, 'UTS-019', 'Tarikh', 85),
(215, 'UTS-019', 'Fiqih', 85),
(216, 'UTS-020', 'Nahwu', 45),
(217, 'UTS-020', 'Shorof', 40),
(218, 'UTS-020', 'Insya', 50),
(219, 'UTS-020', 'Kalam', 55),
(220, 'UTS-020', 'Qiroah', 55),
(221, 'UTS-020', 'Aqidah', 50),
(222, 'UTS-020', 'Tarikh', 45),
(223, 'UTS-020', 'Fiqih', 50),
(224, 'UTS-021', 'Nahwu', 95),
(225, 'UTS-021', 'Shorof', 85),
(226, 'UTS-021', 'Insya', 90),
(227, 'UTS-021', 'Kalam', 75),
(228, 'UTS-021', 'Qiroah', 85),
(229, 'UTS-021', 'Aqidah', 95),
(230, 'UTS-021', 'Tarikh', 85),
(231, 'UTS-021', 'Fiqih', 85),
(232, 'UTS-022', 'Ulumul Quran', 85),
(233, 'UTS-022', 'Qawaid Quraniyyah', 95),
(234, 'UTS-022', 'Manajemen Halaqoh Quran', 80),
(235, 'UTS-022', 'Matan Jazariyyah', 80),
(236, 'UTS-022', 'Metode ABATA', 85),
(237, 'UTS-022', 'Aqidah', 95),
(238, 'UTS-022', 'Tarikh', 90),
(239, 'UTS-022', 'Fiqih', 90),
(240, 'UTS-023', 'Ulumul Quran', 85),
(241, 'UTS-023', 'Qawaid Quraniyyah', 80),
(242, 'UTS-023', 'Manajemen Halaqoh Quran', 90),
(243, 'UTS-023', 'Matan Jazariyyah', 95),
(244, 'UTS-023', 'Metode ABATA', 85),
(245, 'UTS-023', 'Aqidah', 75),
(246, 'UTS-023', 'Tarikh', 85),
(247, 'UTS-023', 'Fiqih', 80),
(248, 'UTS-024', 'Nahwu', 85),
(249, 'UTS-024', 'Shorof', 95),
(250, 'UTS-024', 'Insya', 85),
(251, 'UTS-024', 'Kalam', 100),
(252, 'UTS-024', 'Qiroah', 95),
(253, 'UTS-024', 'Aqidah', 85),
(254, 'UTS-024', 'Tarikh', 80),
(255, 'UTS-024', 'Fiqih', 80),
(256, 'UTS-025', 'Nahwu', 75),
(257, 'UTS-025', 'Shorof', 70),
(258, 'UTS-025', 'Insya', 75),
(259, 'UTS-025', 'Kalam', 85),
(260, 'UTS-025', 'Qiroah', 80),
(261, 'UTS-025', 'Aqidah', 80),
(262, 'UTS-025', 'Tarikh', 75),
(263, 'UTS-025', 'Fiqih', 85),
(264, 'UTS-026', 'Nahwu', 45),
(265, 'UTS-026', 'Shorof', 55),
(266, 'UTS-026', 'Insya', 50),
(267, 'UTS-026', 'Kalam', 45),
(268, 'UTS-026', 'Qiroah', 50),
(269, 'UTS-026', 'Aqidah', 45),
(270, 'UTS-026', 'Tarikh', 50),
(271, 'UTS-026', 'Fiqih', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelajaran`
--

CREATE TABLE `tbl_pelajaran` (
  `id` int(11) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelajaran`
--

INSERT INTO `tbl_pelajaran` (`id`, `pelajaran`, `jurusan`, `guru`) VALUES
(15, 'Ulumul Quran', 'Ilmu Al-Quran', 'Ust Sofyan Sofi'),
(16, 'Qawaid Quraniyyah', 'Ilmu Al-Quran', 'Ust Kukuh Setiawan'),
(17, 'Manajemen Halaqoh Quran', 'Ilmu Al-Quran', 'Ust Saifullah Al-Hafidz'),
(18, 'Matan Jazariyyah', 'Ilmu Al-Quran', 'Ust Saifullah Al-Hafidz'),
(19, 'Metode ABATA', 'Ilmu Al-Quran', 'Ust Bagus Priyono'),
(20, 'Nahwu', 'Bahasa Arab', 'Ust Hidayatullah'),
(21, 'Shorof', 'Bahasa Arab', 'Ust Abu Bakar'),
(22, 'Insya', 'Bahasa Arab', 'Ust Ali Faqihuddin'),
(23, 'Kalam', 'Bahasa Arab', 'Ust Hasan Albasri'),
(24, 'Qiroah', 'Bahasa Arab', 'Ust Ali Maksum'),
(25, 'Aqidah', 'Umum', 'Ust Adi Hidayat'),
(26, 'Tarikh', 'Umum', 'Ust Junda Shobri'),
(27, 'Fiqih', 'Umum', 'Ust Abdurrohman As-Siddiq');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggaran`
--

CREATE TABLE `tbl_pelanggaran` (
  `no` int(20) NOT NULL,
  `pelanggaran` varchar(100) NOT NULL,
  `jenis` enum('Ringan','Sedang','Berat','') NOT NULL,
  `poin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelanggaran`
--

INSERT INTO `tbl_pelanggaran` (`no`, `pelanggaran`, `jenis`, `poin`) VALUES
(1, 'Berbahasa Daerah', 'Ringan', -10),
(2, 'Berbahasa Indonesia pada jam aktif berbahasa arab', 'Ringan', -5),
(3, 'Meletakkan barang tidak pada tempatnya', 'Ringan', -5),
(4, 'Berkata kasar atau jorok, memanggil temannya dengan panggilan yang tidak layak', 'Sedang', -30),
(5, 'Tidak mengikuti program ma\'had tanpa udzur', 'Sedang', -25),
(6, 'Melanggar Syariat Islam secara sadar dan sengaja', 'Berat', -100),
(7, 'Berdusta', 'Berat', -75),
(9, 'Berpacaran', 'Berat', -100),
(11, 'Meremehkan peraturan mahad', 'Berat', -60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `id` int(20) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `kategori` enum('Jayyid','Jayyid Jiddan','Mumtaz','') NOT NULL,
  `poin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_prestasi`
--

INSERT INTO `tbl_prestasi` (`id`, `prestasi`, `kategori`, `poin`) VALUES
(1, 'Jayyid', 'Jayyid', 5),
(2, 'Jayyid Jiddan', 'Jayyid', 10),
(3, 'Imam sholat', 'Jayyid', 15),
(4, 'Tidak masbuk sholat selama 1 pekan', 'Jayyid Jiddan', 25),
(5, 'Tidak terdapat nilai merah', 'Jayyid Jiddan', 25),
(6, 'Nilai Al-Qur\'an mencapai 85', 'Jayyid', 20),
(7, 'Juara Pertama', 'Jayyid Jiddan', 50),
(8, 'Juara kedua', 'Jayyid Jiddan', 30),
(9, 'Juara ketiga', 'Jayyid', 20),
(10, 'Juara lomba tingkat kabupaten', 'Mumtaz', 80),
(11, 'Juara lomba tingkat nasional', 'Mumtaz', 130),
(23, 'Juara lomba tingkat internasional', 'Mumtaz', 180);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `akreditasi` char(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `visimisi` varchar(256) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id`, `nama`, `alamat`, `akreditasi`, `status`, `email`, `visimisi`, `gambar`) VALUES
(1, 'Mahad Tsurayya', 'Perum. Puncak Dieng Eksklusif ii No.1 12, Sumberjo, Kalisongo, Kec. Dau, Kabupaten Malang, Jawa Timur 65119, Indonesia.', 'A', 'Negeri', 'mahad.tsurayya@gmail.com', 'Mencetak Guru Al-Quran Berdaya Guna', '39-bgLogin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` char(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `walsan` varchar(15) DEFAULT '089621966663',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama`, `alamat`, `kelas`, `jurusan`, `walsan`, `foto`) VALUES
('NIS003', 'Ahmad Fadli', 'Bekasi, Jawa Barat', 'XI', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS005', 'Muhammad Isa Dawud', 'Malang, Jawa Timur', 'XII', 'Bahasa Arab', '6285850746278', '595-WhatsApp Image 2024-11-02 at 21.46.21 (1).jpeg'),
('NIS006', 'Muhammad Shalahuddin', 'Sragen, Jawa Timur', 'XI', 'Bahasa Arab', '6285731365976', '191-bukanBuggy.jpg'),
('NIS007', 'Abdul Lathif', 'Surakarta, Jawa Tengah', 'XI', 'Bahasa Arab', '6285775093865', 'default.png'),
('NIS008', 'Yuyun', 'Malang, Jawa Timur', 'XII', 'Bahasa Arab', '6282245349263', '87-istockphoto-1476991588-1024x1024.jpg'),
('NIS009', 'Ahmad Naufal', 'Karanganyar, Jawa Tengah', 'XI', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS010', 'Kholid Al-Firdaus', 'Sidoarjo, Jawa Timur', 'XI', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS011', 'Mehmet Yusuf', 'Malang, Jawa Timur', 'XI', 'Bahasa Arab', '6285731365976', 'default.png'),
('NIS012', 'Rizal Affendi', 'Surabaya, Jawa Timur', 'XI', 'Bahasa Arab', '6285775093865', 'default.png'),
('NIS013', 'Yasin Faqihuddin', 'Surakarta, Jawa Tengah', 'XII', 'Bahasa Arab', '6282245349263', 'default.png'),
('NIS014', 'Abdul Aziz Rantisi', 'Surakarta, Jawa Tengah', 'XI', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS015', 'Imad Aqil', 'Surakarta, Jawa Tengah', 'XI', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS016', 'Farhan Hudarrohman', 'Surakarta, Jawa Tengah', 'XII', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS017', 'Ibrohim Sholih', 'Surakarta, Jawa Tengah', 'XI', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS018', 'Ahmad Hanif', 'Klaten, Jawa Tengah', 'X', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS019', 'Muhammad Yusuf', 'Malang, Jawa Tengah\r\n', 'X', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS020', 'Rahmat Zami', 'Muko-muko, Bengkulu', 'XII', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS021', 'Haris Fazillah', 'Aceh Jaya, Aceh', 'XI', 'Bahasa Arab', '6285707412935', 'default.png'),
('NIS022', 'Arya Aditya', 'Banjarbaru, Kalimantan Timur', 'X', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS023', 'Hudaifah', 'Sukoharjo, Jawa Tengah', 'X', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS024', 'Muhammad Aqil Al Asykari', 'Sidoarjo, Jawa Timur', 'X', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS025', 'Usaid Ali Syahril', 'Surakarta, Jawa Tengah', 'XII', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS026', 'Muhammad Fatihu Farhat', 'Surakarta, Jawa Tengah', 'XII', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS027', 'Muhammad Rofiqus Syuhada', 'Surakarta, Jawa Tengah', 'X', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS028', 'Zakariyya Junda Shobri', 'Surakarta, Jawa Tengah', 'X', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS029', 'Muhammad Nafis Al Hanan', 'Sukoharjo, Jawa Tengah', 'X', 'Bahasa Arab', '6285850746278', 'default.png'),
('NIS030', 'Muhammad Fikri', 'Sukoharjo, Jawa Tengah', 'X', 'Bahasa Arab', '6285731365976', 'default.png'),
('NIS031', 'Muhammad Hasan', 'Surakarta, Jawa Tengah', 'X', 'Bahasa Arab', '6285731365976', 'default.png'),
('NIS032', 'Saelan', 'Blora, Jawa Tengah', 'X', 'Bahasa Arab', '6285731365976', 'default.png'),
('NIS033', 'Tengku Raffi', 'Pasuruan, Jawa Timur', 'XII', 'Bahasa Arab', '6285731365976', 'default.png'),
('NIS034', 'Muhammad Alfiyandi Alif', 'Malang, Jawa Timur', 'X', 'Ilmu Al-Quran', '6285731365976', 'default.png'),
('NIS035', 'Aldi Seno', 'Malang, Jawa Timur', 'X', 'Ilmu Al-Quran', '6285731365976', 'default.png'),
('NIS036', 'Sulthon Muslim', 'Sidoarjo, Jawa Timur', 'X', 'Ilmu Al-Quran', '6285731365976', 'default.png'),
('NIS037', 'Hasan Al Bana', 'Kediri, Jawa Timur', 'X', 'Ilmu Al-Quran', '6285731365976', 'default.png'),
('NIS038', 'Muhammad Yusril', 'Malang, Jawa Timur', 'X', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS039', 'Muhammad Hammam', 'Kota Gede, Yogyakarta', 'X', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS040', 'Muhammad Abbas', 'Jogja, Jogjakarta', 'X', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS041', 'Muhammad Shodiq', 'Jogja', 'XI', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS042', 'Hafidz', 'Jogja', 'X', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS043', 'Abdurrouf', 'Karanganyar, Jawa Tengah', 'X', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS044', 'Ahmad Dzulqornain Saifullah', 'Surakarta, Jawa Tengah', 'X', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS045', 'Muhammad Ayyas', 'Klaten, Jawa Tengah', 'XII', 'Ilmu Al-Quran', '6285775093865', 'default.png'),
('NIS046', 'Fadel Riziq', 'Surakarta, Jawa Tengah', 'X', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS047', 'Ziyad Akbar', 'Surakarta, Jawa Tengah', 'X', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS048', 'Ainul Yaqin', 'Malang, Jawa Timur', 'X', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS049', 'Habil Usaini Lukman', 'Malang, Jawa Timur', 'X', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS050', 'Hasan Husain', 'Klaten, Jawa Tengah', 'XII', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS051', 'Azzam Zaheedy', 'Surakarta, Jawa Tengah', 'X', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS052', 'Uwais Elqy', 'Surakarta, Jawa Tengah', 'XI', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS053', 'Izulhaq', 'Surakarta, Jawa Tengah', 'XI', 'Ilmu Al-Quran', '6282245349263', 'default.png'),
('NIS054', 'Arif Mapu', 'Magetan, Jawa Tengah', 'XI', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS055', 'Haris Bro', 'Bekasi, Jawa Barat', 'XII', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS056', 'Fahmi', 'Bandung, Jawa Barat', 'X', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS057', 'Yuda', 'Kediri, Jawa Timur', 'X', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS058', 'Ariful Umri', 'Surabaya, Jawa Timur', 'X', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS059', 'Rijal Musyafa', 'Klaten, Jawa Tengah', 'XII', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS060', 'Luthfi Daffa Ammar', 'Surabaya, Jawa Timur', 'XII', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS061', 'Ahmad Saifullah', 'Surabaya, Jawa Timur', 'XI', 'Ilmu Al-Quran', '6285862707149', 'default.png'),
('NIS062', 'Isa Faizul Haq', '', 'XI', 'Kimia Industri', '6285862707149', 'default.png'),
('NIS063', 'Abdullah Silmi Faizun', 'Sukoharjo, Jawa Tengah', 'XI', 'Kimia Analis', '6285862707149', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `no_ujian` char(7) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `nis` char(6) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `nilai_terendah` int(11) NOT NULL,
  `nilai_tertinggi` int(11) NOT NULL,
  `nilai_rata2` int(11) NOT NULL,
  `hasil_ujian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`no_ujian`, `tgl_ujian`, `nis`, `jurusan`, `total_nilai`, `nilai_terendah`, `nilai_tertinggi`, `nilai_rata2`, `hasil_ujian`) VALUES
('UTS-001', '2024-11-27', 'NIS003', 'Ilmu Al-Quran', 640, 70, 95, 80, 'LULUS'),
('UTS-002', '2024-11-27', 'NIS005', 'Bahasa Arab', 660, 70, 95, 83, 'LULUS'),
('UTS-003', '2024-11-27', 'NIS006', 'Bahasa Arab', 570, 65, 85, 71, 'LULUS'),
('UTS-004', '2024-11-27', 'NIS007', 'Bahasa Arab', 520, 45, 85, 65, 'GAGAL'),
('UTS-005', '2024-11-27', 'NIS008', 'Bahasa Arab', 535, 55, 75, 67, 'LULUS'),
('UTS-006', '2024-11-27', 'NIS009', 'Bahasa Arab', 675, 75, 95, 84, 'LULUS'),
('UTS-007', '2024-11-27', 'NIS010', 'Bahasa Arab', 655, 70, 95, 82, 'LULUS'),
('UTS-008', '2024-11-27', 'NIS011', 'Bahasa Arab', 420, 40, 65, 53, 'GAGAL'),
('UTS-009', '2024-11-27', 'NIS012', 'Bahasa Arab', 710, 80, 95, 89, 'LULUS'),
('UTS-010', '2024-11-27', 'NIS013', 'Bahasa Arab', 770, 90, 100, 96, 'LULUS'),
('UTS-011', '2024-11-27', 'NIS014', 'Bahasa Arab', 715, 80, 100, 89, 'LULUS'),
('UTS-012', '2024-11-27', 'NIS015', 'Bahasa Arab', 765, 90, 100, 96, 'LULUS'),
('UTS-013', '2024-11-27', 'NIS016', 'Bahasa Arab', 730, 80, 100, 91, 'LULUS'),
('UTS-014', '2024-11-27', 'NIS017', 'Bahasa Arab', 430, 40, 75, 54, 'GAGAL'),
('UTS-015', '2024-11-27', 'NIS018', 'Bahasa Arab', 630, 70, 85, 79, 'LULUS'),
('UTS-016', '2024-11-27', 'NIS019', 'Bahasa Arab', 650, 70, 95, 81, 'LULUS'),
('UTS-017', '2024-11-27', 'NIS020', 'Bahasa Arab', 640, 70, 90, 80, 'LULUS'),
('UTS-018', '2024-11-27', 'NIS021', 'Bahasa Arab', 665, 70, 95, 83, 'LULUS'),
('UTS-019', '2024-11-27', 'NIS022', 'Bahasa Arab', 635, 70, 90, 79, 'LULUS'),
('UTS-020', '2024-11-27', 'NIS023', 'Bahasa Arab', 390, 40, 55, 49, 'GAGAL'),
('UTS-021', '2024-11-27', 'NIS024', 'Bahasa Arab', 695, 75, 95, 87, 'LULUS'),
('UTS-022', '2024-11-27', 'NIS025', 'Ilmu Al-Quran', 700, 80, 95, 88, 'LULUS'),
('UTS-023', '2024-11-27', 'NIS026', 'Ilmu Al-Quran', 675, 75, 95, 84, 'LULUS'),
('UTS-024', '2024-11-27', 'NIS027', 'Bahasa Arab', 705, 80, 100, 88, 'LULUS'),
('UTS-025', '2024-11-27', 'NIS028', 'Bahasa Arab', 625, 70, 85, 78, 'LULUS'),
('UTS-026', '2024-11-27', 'NIS029', 'Bahasa Arab', 385, 45, 55, 48, 'GAGAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`) VALUES
(2, 'admin', '$2y$10$.5GDJvqVi6X.L4LDyJfXt.MemTXoVhXhKqDtuHF/1KNHGFkKGKZRu', 'admin slot', 'online', 'Staf TU', 'default.png'),
(3, 'user', '$2y$10$KkhSXmJEz2nSV.dfPX5JJOT4YPoOQmZgVb9wii8Zpk11uTl2ba7wW', 'user web', 'offline', 'Kepsek', 'default.png'),
(4, 'yasin', '$2y$10$yYZVCTvRCgxWRHhcw3Q6/urt1HLMqGkeb/n02ajfAyny6M13gbLCm', 'Yasin Faqihuddin', 'Banjarsari, Surakarta', 'Guru', 'default.png'),
(5, 'hamaz', '$2y$10$9wFpMmZfyi.8hzSit1xaV.wex3dxIj7vYnTy6G76amxj2M7hh7Zle', 'hamazzz', 'Lumajang', 'Kepsek', 'default.png'),
(6, '123', '$2y$10$cv31lsfF9yW4fa/QnfvUp.7fjz6/7/X6rjIVAn0CyzD.omZyzAw0e', '123', 'sdfsdaf', 'Kepsek', '29-bgLogin.jpg'),
(7, 'yanis', '$2y$10$YgkastfhmalO5rQKjjwqGOXp/cP4jOLRyFpkHx6c7YeDHNFuEm4ZK', 'sdl;fksdkfl', 'dsfjsdafklsad', 'Guru', '930-WhatsApp Image 2024-11-02 at 21.46.21 (1).jpeg'),
(8, 'Obaha', '$2y$10$BVMtTYQscZH1egKAy6sLPedihZgNCgLMiEZ8XLsOxTgqGr1V9aY/C', 'Pak Embon', 'lsdkfjsad; l/km', 'Guru', '105-bukanBuggy.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_input_pelanggaran`
--
ALTER TABLE `tbl_input_pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`no_ujian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_input_pelanggaran`
--
ALTER TABLE `tbl_input_pelanggaran`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
