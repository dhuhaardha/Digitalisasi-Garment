-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 03:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_security`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `tba_uid` varchar(20) NOT NULL,
  `tba_nama` varchar(60) NOT NULL,
  `tba_dept` varchar(20) NOT NULL,
  `tba_tanggal` date DEFAULT NULL,
  `tba_masuk` time DEFAULT NULL,
  `tba_keluar` time DEFAULT NULL,
  `tba_detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`tba_uid`, `tba_nama`, `tba_dept`, `tba_tanggal`, `tba_masuk`, `tba_keluar`, `tba_detail`) VALUES
('', 'SAFIRA', 'PPMC', '2024-05-16', '16:03:00', '08:12:00', NULL),
('', 'YUDO', 'QC', '2024-05-16', '16:46:00', '08:22:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_inventaris_shift_3`
--

CREATE TABLE `tb_barang_inventaris_shift_3` (
  `id_barang_inventaris_pos` varchar(13) NOT NULL,
  `barang_inventaris` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_inventaris_shift_3`
--

INSERT INTO `tb_barang_inventaris_shift_3` (`id_barang_inventaris_pos`, `barang_inventaris`) VALUES
('BInv001', 'KOMPUTER'),
('BInv002', 'PRINTER'),
('BInv003', 'MONITOR CCTV'),
('BInv004', 'MONITOR E-SEAL'),
('BInv005', 'TELEPHONE'),
('BInv006', 'HT & CHARGER'),
('BInv007', 'KAMERA & CHARGER'),
('BInv008', 'JAM DINDING'),
('BInv009', 'LAMPU EMERGENCY'),
('BInv010', 'KIPAS ANGIN'),
('BInv011', 'SENTER'),
('BInv012', 'SENTER PENYEBRANGAN'),
('BInv013', 'SEPATU BOOTS'),
('BInv014', 'JAS HUJAN'),
('BInv015', 'KOTAK P3K'),
('BInv016', 'UNDER MIRROR'),
('BInv017', 'METAL DETECTOR'),
('BInv018', 'TONGKAT POLRI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dept`
--

CREATE TABLE `tb_dept` (
  `td_uid` varchar(20) NOT NULL,
  `td_unit` varchar(40) NOT NULL,
  `td_dept` varchar(40) NOT NULL,
  `td_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_dept`
--

INSERT INTO `tb_dept` (`td_uid`, `td_unit`, `td_dept`, `td_status`) VALUES
('UID0001', 'PTU1', 'GM', 'ACTIVE'),
('UID0002', 'PTU1', 'DRESS', 'ACTIVE'),
('UID0003', 'PTU1', 'HRD', 'ACTIVE'),
('UID0004', 'PTU1', 'PPMC', 'ACTIVE'),
('UID0005', 'PTU1', 'QC', 'ACTIVE'),
('UID0006', 'PTU1', 'P4BM', 'ACTIVE'),
('UID0007', 'PTU1', 'EXPORT', 'ACTIVE'),
('UID0008', 'PTU1', 'SAMPLE SHIRT', 'ACTIVE'),
('UID0009', 'PTU1', 'DMCA', 'ACTIVE'),
('UID0010', 'PTU1', 'IT', 'ACTIVE'),
('UID0011', 'PTU1', 'ACCOUNTING', 'ACTIVE'),
('UID0012', 'PTU1', 'SAMPLE PDF', 'ACTIVE'),
('UID0013', 'PTU1', 'TAX', 'ACTIVE'),
('UID0014', 'PTU1', 'SPN', 'ACTIVE'),
('UID0015', 'PTU1', 'SHIRT', 'ACTIVE'),
('UID0016', 'PTU1', 'PURCHASE', 'ACTIVE'),
('UID0017', 'PTU1', 'CUT DRESS', 'ACTIVE'),
('UID0018', 'PTU1', 'FNS DRESS 2', 'ACTIVE'),
('UID0019', 'PTU1', 'CUT SHIRT', 'ACTIVE'),
('UID0020', 'PTU1', 'IE SHIRT', 'ACTIVE'),
('UID0021', 'PTU1', 'DRESS 1', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_tamu`
--

CREATE TABLE `tb_jenis_tamu` (
  `tbjt_uid` varchar(3) NOT NULL,
  `tbjt_kode` varchar(10) DEFAULT NULL,
  `tbjt_jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_jenis_tamu`
--

INSERT INTO `tb_jenis_tamu` (`tbjt_uid`, `tbjt_kode`, `tbjt_jenis`) VALUES
('001', 'BK001', 'TAMU VIP'),
('002', 'BK002', 'BUYER/AUDIT'),
('003', 'BK003', 'TAMU PERUSAHAAN'),
('004', 'BK004', 'APPLICANT'),
('005', 'BK005', 'SUPPLIER'),
('006', 'BK006', 'MASUK SEGREGATION'),
('007', 'BK007', 'MASUK STORE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `tbk_uid` varchar(10) DEFAULT NULL,
  `tbk_nik` varchar(15) DEFAULT NULL,
  `tbk_nama` varchar(60) NOT NULL,
  `tbk_dept` varchar(25) NOT NULL,
  `tbk_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`tbk_uid`, `tbk_nik`, `tbk_nama`, `tbk_dept`, `tbk_status`) VALUES
(NULL, '201801001', 'SAFIRA', 'PPMC', 'ACTIVE'),
(NULL, '201711005', 'YUDO', 'QC', 'ACTIVE'),
(NULL, '2022021021', 'APRIL', 'ACCOUNTING', 'ACTIVE'),
(NULL, '', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `tbrk_uid` varchar(20) DEFAULT NULL,
  `tbrk_tanggal` date DEFAULT NULL,
  `tbrk_masuk` time DEFAULT NULL,
  `tbrk_keluar` time DEFAULT NULL,
  `tbrk_jns_kendaraan` varchar(20) DEFAULT NULL,
  `tbrk_nmr_kontainer` varchar(10) DEFAULT NULL,
  `tbrk_cek_mirror` varchar(10) DEFAULT NULL,
  `tbrk_nmr_seal` varchar(20) DEFAULT NULL,
  `tbrk_ket` varchar(250) DEFAULT NULL,
  `tbrk_jns_sim` varchar(5) DEFAULT NULL,
  `tbrk_no_sim` varchar(20) DEFAULT NULL,
  `tbrk_no_card` varchar(10) DEFAULT NULL,
  `tbrk_ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`tbrk_uid`, `tbrk_tanggal`, `tbrk_masuk`, `tbrk_keluar`, `tbrk_jns_kendaraan`, `tbrk_nmr_kontainer`, `tbrk_cek_mirror`, `tbrk_nmr_seal`, `tbrk_ket`, `tbrk_jns_sim`, `tbrk_no_sim`, `tbrk_no_card`, `tbrk_ttd`) VALUES
('a', '2024-05-24', '12:20:00', '14:16:00', '1', '1', 'Yes', '1', '1', 'A', '1', 'IDSHIP01', 'upload/1_66502808dbe9f.png'),
('REPVEHICLE/H123AB/20', '2024-05-24', '14:23:00', '14:47:00', 'truk', 'H123AB', 'Yes', 'SEAL123', 'coba kendaraan', 'A', '123123', 'IDSHIP01', 'upload/123123_665042c3833d3.png'),
('REPVEHICLE/H12345AB/', '2024-05-24', '16:24:00', '16:46:00', 'Container', 'H12345AB', 'Yes', 'USG1234', 'Shipment Garment', 'A', '12345678', 'IDSHIP01', 'upload/12345678_6650576463734.png'),
('REPVEHICLE/H5758DI/2', '2024-05-24', '16:37:00', '16:44:00', 'Container 40 feet', 'H5758DI', 'Yes', 'USG1-123', 'Buyer , Nama Tujuan, Pengawal', 'B', '1234567890', 'IDSHIP02', 'upload/1234567890_6650605939e48.png'),
('REPVEHICLE/coba/2024', '2024-05-25', '09:46:00', NULL, 'coba', 'coba', 'Yes', 'coba', 'coba', 'A', 'coba', 'IDSHIP01', 'upload/coba_66515026ddca9.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunci_kendaraan`
--

CREATE TABLE `tb_kunci_kendaraan` (
  `id_vehicle_key` varchar(16) NOT NULL,
  `id_no_pol` varchar(35) NOT NULL,
  `no_police` varchar(10) NOT NULL,
  `kawasan_no_pol` varchar(35) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_taken` date NOT NULL,
  `time_taken` time NOT NULL,
  `name_taken` varchar(255) NOT NULL,
  `signature_taken` text NOT NULL,
  `submitted_to` varchar(255) NOT NULL,
  `amount_taken` int(32) NOT NULL,
  `keterangan_taken` text NOT NULL,
  `date_returned` date NOT NULL,
  `time_returned` time NOT NULL,
  `name_returned` varchar(255) NOT NULL,
  `signature_returned` text NOT NULL,
  `recieved_to` varchar(255) NOT NULL,
  `amount_returned` int(32) NOT NULL,
  `keterangan_returned` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kunci_kendaraan`
--

INSERT INTO `tb_kunci_kendaraan` (`id_vehicle_key`, `id_no_pol`, `no_police`, `kawasan_no_pol`, `status`, `date_taken`, `time_taken`, `name_taken`, `signature_taken`, `submitted_to`, `amount_taken`, `keterangan_taken`, `date_returned`, `time_returned`, `name_returned`, `signature_returned`, `recieved_to`, `amount_returned`, `keterangan_returned`) VALUES
('keyvehicle001', '', '', '', '', '0000-00-00', '00:00:00', '', '', '', 0, '', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle002', 'KeyV013', 'B 2463 SZP', 'PRINGAPUS', '', '2024-06-04', '16:50:57', 'ARDHA', '665ee381a0430.png', 'YUDHO', 1, 'mantap', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle003', 'KeyV009', 'H 1077 WL', 'UNGARAN', '', '2024-06-05', '08:12:05', 'ARDHA', '665fbb6685a42.png', 'YUDHO', 1, 'mantap', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle004', 'KeyV002', 'B 1671 SYO', 'UNGARAN', '', '2024-06-05', '08:32:37', 'WEW', '665fc03716936.png', 'YUDHO', 1, 'qeq', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle005', 'KeyV001', 'B 1809 SYN', 'UNGARAN', '', '2024-06-05', '09:32:46', 'KUAT', '665fceaff154f.png', 'YUDHO', 1, 'mantap', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle006', 'KeyV004', 'B 1440 SZC', 'UNGARAN', 'DISERAHKAN', '2024-06-05', '09:35:34', 'ARDHA', '665fcef7ad5bc.png', 'YUDHO', 1, 'mantap', '2024-06-05', '15:50:36', '', '', '', 1, ''),
('keyvehicle007', 'KeyV014', 'B 2736 SZX', 'PRINGAPUS', 'DISERAHKAN', '2024-06-05', '11:10:51', 'RITA', '665fe54c45c51.png', 'YUDHO', 1, 'qwrqrq', '2024-06-05', '15:46:33', '', '', '', 1, ''),
('keyvehicle008', 'KeyV001', 'B 1809 SYN', 'UNGARAN', 'DISERAHKAN', '2024-06-05', '15:53:27', 'RITA', '6660278847f34.png', 'YUDHO', 1, 'qwrqrq', '2024-06-05', '15:54:09', 'ARDHA', '', 'DHUHA', 1, 'asda'),
('keyvehicle009', 'KeyV001', 'B 1809 SYN', 'UNGARAN', 'DIAMBIL', '2024-06-06', '14:21:41', 'RITA', '6661638641039.png', 'YUDHO', 1, 'qwrqrq', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle010', 'KeyV004', 'B 1440 SZC', 'UNGARAN', 'DISERAHKAN', '2024-06-07', '11:21:24', 'KUAT', '66628ac4c7ce7.png', 'YUDHO', 1, 'mantap', '2024-06-07', '11:21:49', 'RANI', '', 'YDHO', 1, 'qwrq'),
('keyvehicle011', 'KeyV013', 'B 2463 SZP', 'PRINGAPUS', 'DISERAHKAN', '2024-06-07', '14:18:52', 'ARDHA', '6662b45c51e76.png', 'YUDHO', 2, 'mantap', '2024-06-07', '14:19:42', 'RANI', '', 'WENDI', 2, 'qwrq'),
('keyvehicle012', 'KeyV008', 'H 8402 HC', 'UNGARAN', 'DIAMBIL', '2024-06-07', '15:41:44', 'YUDHO', '6662c85ed3f27.png', 'ARDHA', 1, 'SUDAH ADA', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle013', 'KeyV007', 'B 1993 SAO', 'UNGARAN', 'DISERAHKAN', '2024-06-07', '16:12:12', 'YUDHO', '6662cf8205e2f.png', 'ARDHA', 1, '', '2024-06-07', '16:13:00', 'YUDHO', '', 'ARDHA', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunci_ruangan`
--

CREATE TABLE `tb_kunci_ruangan` (
  `ID_kunci_ruangan` varchar(11) NOT NULL,
  `id_key_room` varchar(11) NOT NULL,
  `name_of_key` varchar(30) NOT NULL,
  `amount_of_key` int(11) NOT NULL,
  `part_operasional` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date_retrieval` date NOT NULL,
  `time_retrieval` time NOT NULL,
  `worker_retrieval` varchar(255) NOT NULL,
  `amount_retrieval` int(11) NOT NULL,
  `signature_retrieval` text NOT NULL,
  `date_returned` date NOT NULL,
  `time_returned` time NOT NULL,
  `worker_returned` varchar(255) NOT NULL,
  `amount_returned` int(11) NOT NULL,
  `signature_returned` text NOT NULL,
  `date_handover` date NOT NULL,
  `time_handover` time NOT NULL,
  `handover_to` varchar(255) NOT NULL,
  `amount_handover` int(11) NOT NULL,
  `signature_handover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kunci_ruangan`
--

INSERT INTO `tb_kunci_ruangan` (`ID_kunci_ruangan`, `id_key_room`, `name_of_key`, `amount_of_key`, `part_operasional`, `status`, `date_retrieval`, `time_retrieval`, `worker_retrieval`, `amount_retrieval`, `signature_retrieval`, `date_returned`, `time_returned`, `worker_returned`, `amount_returned`, `signature_returned`, `date_handover`, `time_handover`, `handover_to`, `amount_handover`, `signature_handover`) VALUES
('keyruang001', 'KeyR001', 'SHIRT', 12, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR002', 'DRESS 1', 23, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR003', 'DRESS 2', 25, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR006', 'OFFICE', 9, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR007', 'POLY', 9, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR010', 'R.BUYER', 4, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR011', 'LABORAT', 1, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR012', 'GGT', 7, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang001', 'KeyR013', 'COBA', 14, '1', 'PENGAMBILAN', '0000-00-00', '17:19:35', 'Raafi', 1, 'dfghj', '2024-05-29', '17:11:04', '', 0, '', '2024-05-29', '17:11:04', '', 0, ''),
('keyruang002', 'KeyR001', 'SHIRT', 12, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR002', 'DRESS 1', 23, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR003', 'DRESS 2', 25, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR006', 'OFFICE', 9, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR007', 'POLY', 9, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR010', 'R.BUYER', 4, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR011', 'LABORAT', 1, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR012', 'GGT', 7, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang002', 'KeyR013', 'COBA', 14, '1', 'PENGAMBILAN', '0000-00-00', '17:20:05', 'Shidiq', 1, 'ertyuio', '2024-05-29', '17:19:45', '', 0, '', '2024-05-29', '17:19:45', '', 0, ''),
('keyruang003', 'KeyR001', 'SHIRT', 12, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR002', 'DRESS 1', 23, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR003', 'DRESS 2', 25, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR004', 'STORE FABRIC', 8, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR006', 'OFFICE', 9, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR007', 'POLY', 9, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR008', 'BEA CUKAI', 2, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR009', 'LT.2 POSKO', 5, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR010', 'R.BUYER', 4, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR011', 'LABORAT', 1, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR012', 'GGT', 7, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang003', 'KeyR013', 'COBA', 14, '1', 'SERAH TERIMA', '0000-00-00', '08:13:51', 'ardha', 1, 'ertyui', '2024-05-30', '13:25:19', 'aji', 3, 'fghjl', '2024-05-30', '13:25:45', 'kopi', 1, 'ertyui'),
('keyruang004', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR002', 'DRESS 1', 23, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR003', 'DRESS 2', 25, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR004', 'STORE FABRIC', 8, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR006', 'OFFICE', 9, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR007', 'POLY', 9, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR008', 'BEA CUKAI', 2, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR009', 'LT.2 POSKO', 5, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR010', 'R.BUYER', 4, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR011', 'LABORAT', 1, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR012', 'GGT', 7, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang004', 'KeyR013', 'COBA', 14, '2', 'PENGEMBALIAN', '0000-00-00', '08:14:12', 'yanti', 2, 'xvbm', '2024-05-30', '13:25:29', 'aji', 3, 'fghjl', '2024-05-30', '08:13:56', '', 0, ''),
('keyruang005', 'KeyR001', 'SHIRT', 12, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR002', 'DRESS 1', 23, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR003', 'DRESS 2', 25, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR004', 'STORE FABRIC', 8, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR006', 'OFFICE', 9, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR007', 'POLY', 9, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR008', 'BEA CUKAI', 2, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR009', 'LT.2 POSKO', 5, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR010', 'R.BUYER', 4, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR011', 'LABORAT', 1, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR012', 'GGT', 7, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang005', 'KeyR013', 'COBA', 14, '1', 'SERAH TERIMA', '2024-05-30', '08:43:31', 'coba', 3, 'vbn', '2024-05-30', '13:01:54', 'aji', 3, 'fghjl', '2024-05-30', '13:24:46', 'kopi', 1, 'ertyui'),
('keyruang006', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR002', 'DRESS 1', 23, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR003', 'DRESS 2', 25, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR004', 'STORE FABRIC', 8, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR006', 'OFFICE', 9, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR007', 'POLY', 9, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR008', 'BEA CUKAI', 2, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR009', 'LT.2 POSKO', 5, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR010', 'R.BUYER', 4, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR011', 'LABORAT', 1, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR012', 'GGT', 7, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang006', 'KeyR013', 'COBA', 14, '2', 'PENGEMBALIAN', '2024-05-30', '09:47:19', 'RAAFI', 3, 'qwert', '2024-05-30', '13:25:37', 'aji', 3, 'fghjl', '2024-05-30', '09:45:51', '', 0, ''),
('keyruang007', 'KeyR001', 'SHIRT', 12, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR002', 'DRESS 1', 23, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR003', 'DRESS 2', 25, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR004', 'STORE FABRIC', 8, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR006', 'OFFICE', 9, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR007', 'POLY', 9, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR008', 'BEA CUKAI', 2, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR009', 'LT.2 POSKO', 5, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR010', 'R.BUYER', 4, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR011', 'LABORAT', 1, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR012', 'GGT', 7, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang007', 'KeyR013', 'COBA', 14, '1', 'SERAH TERIMA', '2024-05-30', '13:40:00', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:51:27', 'aji', 3, 'fghjl', '2024-05-30', '13:52:26', 'kopi', 1, 'ertyui'),
('keyruang008', 'KeyR001', 'SHIRT', 12, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR002', 'DRESS 1', 23, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR003', 'DRESS 2', 25, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR004', 'STORE FABRIC', 8, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR006', 'OFFICE', 9, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR007', 'POLY', 9, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR008', 'BEA CUKAI', 2, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR009', 'LT.2 POSKO', 5, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR010', 'R.BUYER', 4, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR011', 'LABORAT', 1, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR012', 'GGT', 7, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang008', 'KeyR013', 'COBA', 14, '2', 'PENGAMBILAN', '2024-05-30', '13:50:53', 'SHIDIQ', 12, 'ertyuio', '2024-05-30', '13:46:31', '', 0, '', '2024-05-30', '13:46:31', '', 0, ''),
('keyruang009', 'KeyR001', 'SHIRT', 12, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR002', 'DRESS 1', 23, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR006', 'OFFICE', 9, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR007', 'POLY', 9, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR010', 'R.BUYER', 4, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR011', 'LABORAT', 1, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR012', 'GGT', 7, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang009', 'KeyR013', 'COBA', 14, '1', 'PENGEMBALIAN', '2024-05-30', '13:54:09', 'YUDHO', 12, 'ertyuio', '2024-05-30', '13:54:28', 'ardha', 3, 'fghjl', '2024-05-30', '13:52:39', '', 0, ''),
('keyruang010', 'KeyR001', 'SHIRT', 12, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR002', 'DRESS 1', 23, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR006', 'OFFICE', 9, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR007', 'POLY', 9, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR010', 'R.BUYER', 4, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR011', 'LABORAT', 1, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR012', 'GGT', 7, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang010', 'KeyR013', 'COBA', 14, '1', 'PENGEMBALIAN', '2024-05-31', '08:52:59', 'SURIPTO', 12, 'qwert', '2024-05-31', '08:53:18', 'Salimin', 12, 'qwert', '2024-05-31', '08:50:36', '', 0, ''),
('keyruang011', 'KeyR001', 'SHIRT', 12, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR002', 'DRESS 1', 23, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR006', 'OFFICE', 9, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR007', 'POLY', 9, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR010', 'R.BUYER', 4, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR011', 'LABORAT', 1, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR012', 'GGT', 7, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang011', 'KeyR013', 'COBA', 14, '1', 'PENGEMBALIAN', '2024-05-31', '15:35:39', 'ARDHA', 12, 'qwer', '2024-05-31', '15:37:36', 'SOLIHIN', 12, 'qwer', '2024-05-31', '15:35:12', '', 0, ''),
('keyruang012', 'KeyR001', 'SHIRT', 12, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR002', 'DRESS 1', 23, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR003', 'DRESS 2', 25, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR004', 'STORE FABRIC', 8, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR006', 'OFFICE', 9, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR007', 'POLY', 9, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR008', 'BEA CUKAI', 2, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR009', 'LT.2 POSKO', 5, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR010', 'R.BUYER', 4, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR011', 'LABORAT', 1, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR012', 'GGT', 7, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang012', 'KeyR013', 'COBA', 14, '2', 'SERAH TERIMA', '2024-05-31', '15:37:58', 'YUDHO', 9, 'qert', '2024-05-31', '15:38:14', 'FIRA', 9, 'sfsd', '2024-05-31', '15:38:29', 'rudi', 9, 'qeqwe'),
('keyruang013', 'KeyR001', 'SHIRT', 12, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR002', 'DRESS 1', 23, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR006', 'OFFICE', 9, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR007', 'POLY', 9, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR010', 'R.BUYER', 4, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR011', 'LABORAT', 1, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR012', 'GGT', 7, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR013', 'COBA', 14, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang013', 'KeyR014', 'UJI', 9, '1', 'PENGEMBALIAN', '2024-05-31', '16:11:06', 'REI', 9, 'Yui', '2024-05-31', '16:12:22', 'YULI', 9, 'Ukj', '2024-05-31', '16:01:57', '', 0, ''),
('keyruang014', 'KeyR001', 'SHIRT', 12, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR002', 'DRESS 1', 23, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR003', 'DRESS 2', 25, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR004', 'STORE FABRIC', 8, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR006', 'OFFICE', 9, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR007', 'POLY', 9, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR008', 'BEA CUKAI', 2, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR009', 'LT.2 POSKO', 5, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR010', 'R.BUYER', 4, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR011', 'LABORAT', 1, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR012', 'GGT', 7, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR013', 'COBA', 14, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang014', 'KeyR014', 'UJI', 9, '2', 'SERAH TERIMA', '2024-05-31', '16:13:03', 'UJI', 6, 'Yuo', '2024-05-31', '16:13:29', 'JIKO', 6, 'Ukk', '2024-05-31', '16:13:57', 'Opo', 6, 'Ujk'),
('keyruang015', 'KeyR001', 'SHIRT', 12, '1', 'PENGEMBALIAN', '2024-06-03', '08:01:04', 'DANI', 12, 'wertyu', '2024-06-03', '08:57:06', 'KANIA', 12, 'qwer', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang016', 'KeyR001', 'SHIRT', 12, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR002', 'DRESS 1', 23, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR006', 'OFFICE', 9, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR007', 'POLY', 9, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR010', 'R.BUYER', 4, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR011', 'LABORAT', 1, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR012', 'GGT', 7, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR013', 'COBA', 14, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang016', 'KeyR014', 'UJI', 9, '1', 'PENGEMBALIAN', '2024-06-03', '09:05:56', 'KUAT', 0, 'wertyu', '2024-06-03', '09:17:24', 'JARWO', 12, 'qwer', '2024-06-03', '09:05:40', '', 0, ''),
('keyruang017', 'KeyR001', 'SHIRT', 12, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR002', 'DRESS 1', 23, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR003', 'DRESS 2', 25, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR004', 'STORE FABRIC', 8, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR006', 'OFFICE', 9, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR007', 'POLY', 9, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR008', 'BEA CUKAI', 2, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR009', 'LT.2 POSKO', 5, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR010', 'R.BUYER', 4, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR011', 'LABORAT', 1, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR012', 'GGT', 7, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR013', 'COBA', 14, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang017', 'KeyR014', 'UJI', 9, '2', 'SERAH TERIMA', '2024-06-03', '09:19:45', 'KUAT', 0, 'wertyu', '2024-06-03', '09:54:31', 'YUDHO', 0, 'qwer', '2024-06-03', '10:37:46', 'rateri', 12, 'qwerqr'),
('keyruang018', 'KeyR008', 'BEA CUKAI', 2, '2', 'SERAH TERIMA', '2024-06-03', '09:38:15', 'ARDHA', 2, 'sadasf', '2024-06-03', '09:56:20', 'YUDHO', 0, 'qwer', '2024-06-03', '11:24:53', 'RUDI', 2, 'qeqwe'),
('keyruang019', 'KeyR011', 'LABORAT', 1, '1', 'PENGEMBALIAN', '2024-06-03', '09:59:06', 'ARDHA', 1, 'sadasf', '2024-06-03', '10:33:56', 'kania', 0, 'qwer', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang020', 'KeyR006', 'OFFICE', 9, '1', 'PENGEMBALIAN', '2024-06-03', '10:05:38', 'KUAT', 9, 'wertyu', '2024-06-03', '10:35:10', 'yudho', 0, 'qwer', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang021', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-03', '10:39:19', 'ARDHA', 0, 'wertyu', '2024-06-03', '11:06:31', 'fira', 0, 'sfsd', '2024-06-03', '10:37:46', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang022', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '10:39:39', 'ARDHA', 0, 'sadasf', '2024-06-03', '11:17:03', 'solihin', 12, 'qwer', '2024-06-03', '10:39:21', '', 0, ''),
('keyruang023', 'KeyR001', 'SHIRT', 12, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR002', 'DRESS 1', 23, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR003', 'DRESS 2', 25, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR006', 'OFFICE', 9, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR007', 'POLY', 9, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR010', 'R.BUYER', 4, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR011', 'LABORAT', 1, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR012', 'GGT', 7, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, '');
INSERT INTO `tb_kunci_ruangan` (`ID_kunci_ruangan`, `id_key_room`, `name_of_key`, `amount_of_key`, `part_operasional`, `status`, `date_retrieval`, `time_retrieval`, `worker_retrieval`, `amount_retrieval`, `signature_retrieval`, `date_returned`, `time_returned`, `worker_returned`, `amount_returned`, `signature_returned`, `date_handover`, `time_handover`, `handover_to`, `amount_handover`, `signature_handover`) VALUES
('keyruang023', 'KeyR013', 'COBA', 14, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang023', 'KeyR014', 'UJI', 9, '1', 'PENGAMBILAN', '2024-06-03', '11:00:51', 'RANI', 0, 'qwer', '2024-06-03', '10:59:39', '', 0, '', '2024-06-03', '10:59:39', '', 0, ''),
('keyruang024', 'KeyR009', 'LT.2 POSKO', 5, '1', 'PENGEMBALIAN', '2024-06-03', '11:08:55', 'JOKO', 5, 'yui', '2024-06-03', '11:13:47', 'solihin', 0, 'sfsd', '2024-06-03', '11:08:38', '', 5, ''),
('keyruang025', 'KeyR009', 'LT.2 POSKO', 5, '2', 'SERAH TERIMA', '2024-06-03', '11:18:35', 'JOKO', 5, 'yui', '2024-06-03', '11:19:14', 'fira', 5, 'qwer', '2024-06-03', '11:22:40', 'rudi', 5, 'qeqwe'),
('keyruang026', 'KeyR007', 'POLY', 9, '1', 'PENGEMBALIAN', '2024-06-03', '13:54:14', 'RIFA', 9, 'keyruang026665d6897230d3.png', '2024-06-03', '14:40:26', 'FIRA', 9, 'sfsd', '2024-06-03', '13:53:58', '', 9, ''),
('keyruang027', 'KeyR010', 'R.BUYER', 4, '2', 'PENGAMBILAN', '2024-06-03', '14:08:53', 'KANTI', 4, '665d6c061d92f.png', '2024-06-03', '14:08:34', '', 4, '', '2024-06-03', '14:08:34', '', 4, ''),
('keyruang028', 'KeyR004', 'STORE FABRIC', 8, '1', 'PENGAMBILAN', '2024-06-03', '14:13:16', 'TATI', 8, '665d6d0d6a376.png', '2024-06-03', '14:13:04', '', 8, '', '2024-06-03', '14:13:04', '', 8, ''),
('keyruang029', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '14:27:25', 'AGE', 12, 'upload/_665d705e5bc79.', '2024-06-03', '14:41:00', 'ARDHA', 12, 'fgh', '2024-06-03', '14:27:17', '', 12, ''),
('keyruang030', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-03', '14:29:12', 'NESSA', 12, 'upload/_665d70c9637c9.PNG', '2024-06-03', '14:40:42', 'FIRA', 12, 'qwer', '2024-06-03', '14:27:26', '', 12, ''),
('keyruang031', 'KeyR010', 'R.BUYER', 4, '1', 'PENGAMBILAN', '2024-06-03', '14:39:31', 'BINTANG', 4, 'upload/_665d733467ac9.PNG', '2024-06-03', '14:29:13', '', 4, '', '2024-06-03', '14:29:13', '', 4, ''),
('keyruang031', 'KeyR010', 'R.BUYER', 4, '1', 'PENGAMBILAN', '2024-06-03', '14:39:31', 'BINTANG', 4, '', '0000-00-00', '00:00:00', '', 0, '', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang032', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-06-04', '08:42:10', 'ARDHA', 10, '665e70f33f0a2.png', '2024-06-04', '09:44:38', 'YUDHO', 10, 'qwer', '2024-06-04', '08:41:55', '', 10, ''),
('keyruang033', 'KeyR011', 'LABORAT', 1, '1', 'PENGAMBILAN', '2024-06-04', '13:00:45', 'KUAT', 1, '665ead8dce672.png', '2024-06-04', '13:00:25', '', 1, '', '2024-06-04', '13:00:25', '', 1, ''),
('keyruang034', 'KeyR004', 'STORE FABRIC', 8, '2', 'PENGAMBILAN', '2024-06-05', '08:14:40', 'KUAT', 8, '665fbc0144d66.png', '2024-06-05', '08:14:31', '', 8, '', '2024-06-05', '08:14:31', '', 8, ''),
('keyruang035', 'KeyR010', 'R.BUYER', 4, '1', 'PENGEMBALIAN', '2024-06-06', '15:12:59', 'GURI', 4, '6661700d1f054.png', '2024-06-06', '15:13:14', 'YUDHO', 4, 'Rtgg', '2024-06-06', '15:14:36', '', 4, ''),
('keyruang036', 'KeyR006', 'OFFICE', 9, '2', 'SERAH TERIMA', '2024-06-06', '15:13:38', 'TATIK', 9, '666170341f379.png', '2024-06-06', '15:13:53', 'ARDHA', 9, 'Tty', '2024-06-06', '15:14:16', 'YUDHO', 9, 'Tyy'),
('keyruang037', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-06-07', '11:20:57', 'KUAT', 10, '66628aaa11e16.png', '2024-06-07', '11:21:05', 'SOLIHIN', 10, 'qwer', '2024-06-07', '11:20:35', '', 10, ''),
('keyruang038', 'KeyR006', 'OFFICE', 9, '1', 'PENGEMBALIAN', '2024-06-07', '16:14:45', 'YUDHO', 9, '6662d01aed5fe.png', '2024-06-07', '16:15:18', 'YUDHO', 9, '', '2024-06-07', '16:16:11', '', 9, ''),
('keyruang039', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'SERAH TERIMA', '2024-06-07', '16:15:40', 'YUDHO', 10, '6662d0524dbdc.png', '2024-06-07', '16:16:05', 'YUDHO', 10, '', '2024-06-07', '16:16:26', 'YUDHO', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_card`
--

CREATE TABLE `tb_list_card` (
  `tblic_uid` varchar(10) DEFAULT NULL,
  `tblic_no_id` varchar(10) DEFAULT NULL,
  `tblic_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_card`
--

INSERT INTO `tb_list_card` (`tblic_uid`, `tblic_no_id`, `tblic_status`) VALUES
('IDSHIP01', '1', 'NOT READY'),
('IDSHIP02', '2', 'READY'),
('IDSHIP03', '3', 'READY'),
('IDSHIP04', '4', 'READY'),
('IDSHIP05', '5', 'READY'),
('IDSHIP02', '6', 'READY');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_cctv`
--

CREATE TABLE `tb_list_cctv` (
  `tblc_uid` varchar(10) NOT NULL,
  `tblc_lokasi` varchar(10) NOT NULL,
  `tblc_nama_cctv` varchar(50) NOT NULL,
  `tblc_status` varchar(10) NOT NULL,
  `tblc_cek_cctv` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_cctv`
--

INSERT INTO `tb_list_cctv` (`tblc_uid`, `tblc_lokasi`, `tblc_nama_cctv`, `tblc_status`, `tblc_cek_cctv`) VALUES
('PTU1/001', 'PTU1', 'POS INDUK', 'ACTIVE', '2024-05-31'),
('PTU1/002', 'PTU1', 'LOBBY', 'ACTIVE', '2024-05-24'),
('PTU1/003', 'PTU1', 'EXPORT DRESS 1', 'INACTIVE', '2024-05-24'),
('PTU1/004', 'PTU1', 'PINTU LOADING 2 DRESS 1', 'ACTIVE', '2024-05-22'),
('PTU1/005', 'PTU1', 'STORE ACCESSORIES', 'ACTIVE', '2024-05-22'),
('PTU1/006', 'PTU1', 'STORE ACCESSORIES DALAM', 'ACTIVE', '2024-05-22'),
('PTU1/007', 'PTU1', 'RUANG SERVER', 'ACTIVE', '2024-05-22'),
('PTU1/008', 'PTU1', 'PACKING DRESS 1', 'ACTIVE', NULL),
('PTU1/009', 'PTU1', 'POLYBAG DRESS 1', 'ACTIVE', NULL),
('PTU1/010', 'PTU1', 'STORE FABRIC', 'ACTIVE', NULL),
('PTU1/011', 'PTU1', 'STORE FABRIC DALAM', 'ACTIVE', NULL),
('PTU1/012', 'PTU1', 'EXPORT DRESS 2', 'ACTIVE', '2024-05-24'),
('PTU1/013', 'PTU1', 'PINTU LOADING 2 DRESS 2', 'ACTIVE', NULL),
('PTU1/014', 'PTU1', 'PINTU LOADING SHIRT', 'ACTIVE', NULL),
('PTU1/015', 'PTU1', 'EXPORT SHIRT', 'ACTIVE', NULL),
('PTU1/016', 'PTU1', 'GUDANG BARANG JADI', 'ACTIVE', NULL),
('PTU1/017', 'PTU1', 'GUDANG AVAL', 'ACTIVE', NULL),
('PTU1/018', 'PTU1', 'POLYBAG SHIRT', 'ACTIVE', NULL),
('PTU1/019', 'PTU1', 'PACKING DRESS 2', 'ACTIVE', NULL),
('PTU1/020', 'PTU1', 'KANTIN', 'ACTIVE', NULL),
('PTU1/021', 'PTU1', 'POLYBAG DRESS 2', 'ACTIVE', NULL),
('PTU1/022', 'PTU1', 'FINISHED GOOD SHIRT 1', 'ACTIVE', NULL),
('PTU1/023', 'PTU1', 'PACKING 2 SHIRT', 'ACTIVE', NULL),
('PTU1/024', 'PTU1', 'FINISHED GOOD SHIRT 2', 'ACTIVE', NULL),
('PTU1/025', 'PTU1', 'PACKING SHIRT 1', 'ACTIVE', NULL),
('PTU1/026', 'PTU1', 'RUANG PRODUKSI', 'ACTIVE', NULL),
('PTU1/027', 'PTU1', 'SEWING DRESS 2', 'ACTIVE', NULL),
('PTU1/028', 'PTU1', 'SEWING SHIRT', 'ACTIVE', NULL),
('PTU1/029', 'PTU1', 'RUANG TAMU UNGARAN', 'ACTIVE', NULL),
('PTU1/030', 'PTU1', 'GUDANG AVAL 2', 'ACTIVE', NULL),
('PTU1/031', 'PTU1', 'CONTAINER DEPAN SHIRT', 'ACTIVE', NULL),
('PTU1/032', 'PTU1', 'OFFICE LANTAI 2 BOARDROOM', 'ACTIVE', NULL),
('PTU1/033', 'PTU1', 'PINTU UTAMA DRESS 1', 'ACTIVE', NULL),
('PTU1/034', 'PTU1', 'FABRIC STORAGE DRESS 1', 'ACTIVE', NULL),
('PTU1/035', 'PTU1', 'SEWING LINE 18', 'ACTIVE', NULL),
('PTU1/036', 'PTU1', 'PINTU DARURAT 5', 'ACTIVE', NULL),
('PTU1/037', 'PTU1', 'CUTTING DRESS 1', 'ACTIVE', NULL),
('PTU1/038', 'PTU1', 'FINISHING & TANGGA PPMC', 'ACTIVE', NULL),
('PTU1/039', 'PTU1', 'AREA WASHING & QC', 'ACTIVE', NULL),
('PTU1/040', 'PTU1', 'PINTU DARURAT 1', 'ACTIVE', NULL),
('PTU1/041', 'PTU1', 'CUTTING DRESS 2', 'ACTIVE', NULL),
('PTU1/042', 'PTU1', 'PINTU DARURAT 2', 'ACTIVE', NULL),
('PTU1/043', 'PTU1', 'AREA LOKER', 'ACTIVE', NULL),
('PTU1/044', 'PTU1', 'SEWING LINE 1', 'ACTIVE', NULL),
('PTU1/045', 'PTU1', 'KANTIN LT.2', 'ACTIVE', NULL),
('PTU1/046', 'PTU1', 'DEPAN TUKANG KAYU', 'ACTIVE', NULL),
('PTU1/047', 'PTU1', 'DEPAN LINE PRESS', 'ACTIVE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_kendaraan`
--

CREATE TABLE `tb_list_kendaraan` (
  `tblk_uid` varchar(10) NOT NULL,
  `tblk_tipe_kendaraan` varchar(50) NOT NULL,
  `tblk_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_kendaraan`
--

INSERT INTO `tb_list_kendaraan` (`tblk_uid`, `tblk_tipe_kendaraan`, `tblk_status`) VALUES
('VHC001', 'Container 40 ft', 'ACTIVE'),
('VHC002', 'Container 20 ft', 'ACTIVE'),
('VHC003', 'Container 40 hc', 'ACTIVE'),
('VHC004', 'Container 45 ft', 'ACTIVE'),
('VHC005', 'Truck Tronton', 'ACTIVE'),
('VHC006', 'Truck Angkle', 'ACTIVE'),
('VHC007', 'Truck Wing Box', 'ACTIVE'),
('VHC008', 'Truck Box Diesel', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_key_room`
--

CREATE TABLE `tb_list_key_room` (
  `id_key_room` varchar(11) NOT NULL,
  `name_of_key` varchar(30) NOT NULL,
  `amount_of_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_list_key_room`
--

INSERT INTO `tb_list_key_room` (`id_key_room`, `name_of_key`, `amount_of_key`) VALUES
('KeyR001', 'SHIRT', 12),
('KeyR002', 'DRESS 1', 23),
('KeyR003', 'DRESS 2', 25),
('KeyR004', 'STORE FABRIC', 8),
('KeyR005', 'STORE ACCESSORIS', 10),
('KeyR006', 'OFFICE', 9),
('KeyR007', 'POLY', 9),
('KeyR008', 'BEA CUKAI', 2),
('KeyR009', 'LT.2 POSKO', 5),
('KeyR010', 'R.BUYER', 4),
('KeyR011', 'LABORAT', 1),
('KeyR012', 'GGT', 7),
('KeyR013', 'COBA', 14),
('KeyR014', 'UJI', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_key_vehicle`
--

CREATE TABLE `tb_list_key_vehicle` (
  `id_no_pol` varchar(35) NOT NULL,
  `kode_kawasan` varchar(2) NOT NULL,
  `seriesnumber` int(5) NOT NULL,
  `back_kode` varchar(4) NOT NULL,
  `kawasan_no_pol` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_list_key_vehicle`
--

INSERT INTO `tb_list_key_vehicle` (`id_no_pol`, `kode_kawasan`, `seriesnumber`, `back_kode`, `kawasan_no_pol`) VALUES
('KeyV001', 'B', 1809, 'SYN', 'UNGARAN'),
('KeyV002', 'B', 1671, 'SYO', 'UNGARAN'),
('KeyV003', 'B', 1492, 'SZH', 'UNGARAN'),
('KeyV004', 'B', 1440, 'SZC', 'UNGARAN'),
('KeyV005', 'B', 2332, 'SZV', 'UNGARAN'),
('KeyV006', 'B', 2734, 'SZX', 'UNGARAN'),
('KeyV007', 'B', 1993, 'SAO', 'UNGARAN'),
('KeyV008', 'H', 8402, 'HC', 'UNGARAN'),
('KeyV009', 'H', 1077, 'WL', 'UNGARAN'),
('KeyV010', 'H', 8401, 'GC', 'UNGARAN'),
('KeyV011', 'H', 8400, 'GC', 'UNGARAN'),
('KeyV012', 'B', 2550, 'SZL', 'CONGOL'),
('KeyV013', 'B', 2463, 'SZP', 'PRINGAPUS'),
('KeyV014', 'B', 2736, 'SZX', 'PRINGAPUS'),
('KeyV015', 'B', 2549, 'SZX', 'PRINGAPUS'),
('KeyV016', 'H', 8209, 'HC', 'BOX UNGARAN'),
('KeyV017', 'H', 8845, 'HC', 'BOX UNGARAN'),
('KeyV018', 'H', 1624, 'SC', 'BOX UNGARAN'),
('KeyV019', 'H', 1896, 'NC', 'BOX UNGARAN'),
('KeyV020', 'H', 8183, 'CC', 'BOX UNGARAN'),
('KeyV021', 'H', 8697, 'GC', 'BOX CONGOL'),
('KeyV022', 'H', 9651, 'GC', 'BOX PRINGAPUS'),
('KeyV023', 'H', 9652, 'GC', 'BOX PRINGAPUS'),
('KeyV024', 'H', 1725, 'QC', 'OTHER'),
('KeyV025', 'B', 8832, 'SP', 'OTHER'),
('KeyV026', 'B', 8014, 'SP', 'OTHER'),
('KeyV027', 'B', 1254, 'EW', 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_security`
--

CREATE TABLE `tb_list_security` (
  `tbls_uid` varchar(10) NOT NULL,
  `tbls_unit` varchar(10) DEFAULT NULL,
  `tbls_nik` varchar(15) NOT NULL,
  `tbls_nama` varchar(60) NOT NULL,
  `tbls_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_security`
--

INSERT INTO `tb_list_security` (`tbls_uid`, `tbls_unit`, `tbls_nik`, `tbls_nama`, `tbls_status`) VALUES
('PTU1/0001', 'PTU1', '', 'NAWOLO PRASETYO', 'ACTIVE'),
('PTU1/0002', 'PTU1', '', 'M MAULANA YUSUF', 'ACTIVE'),
('PTU1/0003', 'PTU1', '', 'DIMAS SULISTYO', 'ACTIVE'),
('PTU1/0004', 'PTU1', '', 'ARI PRABOWO', 'ACTIVE'),
('PTU1/0005', 'PTU1', '', 'HARDI PRAJOYO', 'ACTIVE'),
('PTU1/0006', 'PTU1', '', 'RENDI ARGA SAPUTRA', 'ACTIVE'),
('PTU1/0007', 'PTU1', '', 'NOVANT PRABOWO EKO. S', 'ACTIVE'),
('PTU1/0008', 'PTU1', '', 'KUAT PURWANTO', 'ACTIVE'),
('PTU1/0009', 'PTU1', '', 'HERU SUSANTO', 'ACTIVE'),
('PTU1/0010', 'PTU1', '', 'M.WAHYUDI', 'ACTIVE'),
('PTU1/0011', 'PTU1', '', 'ADIAT NUGROHO', 'ACTIVE'),
('PTU1/0012', 'PTU1', '', 'DAVID PUTRA SETIAWAN', 'ACTIVE'),
('PTU1/0013', 'PTU1', '', 'HARIYONO', 'ACTIVE'),
('PTU1/0014', 'PTU1', '', 'ADI ARDIANSYAH', 'ACTIVE'),
('PTU1/0015', 'PTU1', '', 'RIYAN ISMAWAN', 'ACTIVE'),
('PTU1/0016', 'PTU1', '', 'MARYANTO ', 'ACTIVE'),
('PTU1/0017', 'PTU1', '', 'SUPRIYANTO', 'ACTIVE'),
('PTU1/0018', 'PTU1', '', 'AGUS ANGGORO ', 'ACTIVE'),
('PTU1/0019', 'PTU1', '', 'GUNAWAN WIBOWO', 'ACTIVE'),
('PTU1/0020', 'PTU1', '', 'LUHADI ', 'ACTIVE'),
('PTU1/0021', 'PTU1', '', 'MULYADI', 'ACTIVE'),
('PTU1/0022', 'PTU1', '', 'FERRY KURNIAWAN', 'ACTIVE'),
('PTU1/0023', 'PTU1', '', 'APRILYA PUSPITASARI', 'ACTIVE'),
('PTU1/0024', 'PTU1', '', 'SRI RAHAYU', 'ACTIVE'),
('PTU1/0025', 'PTU1', '', 'MUJIATI', 'ACTIVE'),
('PTU1/0026', 'PTU1', '', 'HARYANTI', 'ACTIVE'),
('PTU1/0027', 'PTU1', '', 'W. SAPUTRO', 'ACTIVE'),
('PTU1/0028', 'PTU1', '', 'ARTIN WAHYU NINGSIH', 'ACTIVE'),
('PTU1/0029', 'PTU1', '', 'DINI NURINJANI', 'ACTIVE'),
('PTU1/0030', 'PTU1', '', 'ASTI MAULINA AZAHRA', 'ACTIVE'),
('PTU1/0031', 'PTU1', '', 'RENI HANDAYANI', 'ACTIVE'),
('PTU1/0032', 'PTU1', '', 'ZAHRA FIRSTA OKTAVIANA', 'ACTIVE'),
('PTU1/0033', 'PTU1', '', 'ADITYA BUDI SAPUTRA', 'ACTIVE'),
('PTU1/0034', 'PTU1', '', 'RATNA EKAWATI', 'ACTIVE'),
('PTU1/0035', 'PTU1', '', 'BAGAS DANISWARA', 'ACTIVE'),
('PTU1/0036', 'PTU1', '', 'EKA MUSRIATIEN', 'ACTIVE'),
('PTU1/0037', 'PTU1', '', 'ZAEMATUN NAVISAH', 'ACTIVE'),
('PTU1/0038', 'PTU1', '', 'IKBAR BAYU SAPUTRO', 'ACTIVE'),
('PTU1/0039', 'PTU1', '', 'BIMANTARA TARA SUGANDHA', 'ACTIVE'),
('PTU1/0040', 'PTU1', '', 'IRFAN BAGUS MAULANA', 'ACTIVE'),
('PTU1/0041', 'PTU1', '', 'BAYU SETYO ADI', 'ACTIVE'),
('PTU1/0042', 'PTU1', '', 'ANGELIKA KUSUMA', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs_activity_mutasi_shift_3`
--

CREATE TABLE `tb_logs_activity_mutasi_shift_3` (
  `id_logs_activity_shift_3` varchar(11) NOT NULL,
  `time_uraian_created` time NOT NULL,
  `uraian` text NOT NULL,
  `time_uraian_finished` time NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_logs_activity_mutasi_shift_3`
--

INSERT INTO `tb_logs_activity_mutasi_shift_3` (`id_logs_activity_shift_3`, `time_uraian_created`, `uraian`, `time_uraian_finished`, `dibuat_pada`) VALUES
('uraian001', '22:22:58', 'keliling aja', '22:58:58', '2024-06-07 04:23:46'),
('uraian002', '00:00:00', 'Cobaardha.....', '14:06:00', '2024-06-07 06:11:17'),
('uraian003', '13:12:36', 'weqweqeqeqweqweqweqeqeqweqw', '00:00:00', '2024-06-07 06:12:54'),
('uraian004', '13:14:12', 'Djdjdjd', '17:32:00', '2024-06-07 06:14:24'),
('uraian005', '14:45:10', 'Feojosnfonfso', '00:42:00', '2024-06-07 07:45:32'),
('uraian006', '16:34:08', 'JAGA MALAM', '00:00:00', '2024-06-07 09:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs_barang_inventaris_mutasi_shift_3`
--

CREATE TABLE `tb_logs_barang_inventaris_mutasi_shift_3` (
  `ID_logs_barang_inventaris` varchar(13) NOT NULL,
  `id_barang_inventaris_pos` varchar(13) NOT NULL,
  `barang_inventaris` varchar(32) NOT NULL,
  `jumlah_barang_inventaris` int(3) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_logs_barang_inventaris_mutasi_shift_3`
--

INSERT INTO `tb_logs_barang_inventaris_mutasi_shift_3` (`ID_logs_barang_inventaris`, `id_barang_inventaris_pos`, `barang_inventaris`, `jumlah_barang_inventaris`, `date_created`) VALUES
('LogInv001', 'BInv001', 'KOMPUTER', 2, '2024-06-06 09:19:06'),
('register002', 'BInv001', 'KOMPUTER', 2, '2024-06-07 03:18:31'),
('LogInv001', 'BInv002', 'PRINTER', 3, '2024-06-07 03:53:26'),
('LogInv001', 'BInv014', 'JAS HUJAN', 1, '2024-06-07 07:16:08'),
('LogInv001', 'BInv018', 'TONGKAT POLRI', 3, '2024-06-07 07:44:56'),
('LogInv001', 'BInv010', 'KIPAS ANGIN', 1, '2024-06-07 09:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi_shift_3`
--

CREATE TABLE `tb_mutasi_shift_3` (
  `ID_mutasi_shift_3` varchar(13) NOT NULL,
  `date` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NIK` int(16) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `jam_operasional_10` time NOT NULL,
  `jam_operasional_11` time NOT NULL,
  `jam_operasional_12` time NOT NULL,
  `jam_operasional_01` time NOT NULL,
  `jam_operasional_02` time NOT NULL,
  `jam_operasional_03` time NOT NULL,
  `jam_operasional_04` time NOT NULL,
  `jam_operasional_05` time NOT NULL,
  `pos_10` varchar(6) NOT NULL,
  `paraf_10` text NOT NULL,
  `pos_11` varchar(6) NOT NULL,
  `paraf_11` text NOT NULL,
  `pos_12` varchar(6) NOT NULL,
  `paraf_12` text NOT NULL,
  `pos_01` varchar(6) NOT NULL,
  `paraf_01` text NOT NULL,
  `pos_02` varchar(6) NOT NULL,
  `paraf_02` text NOT NULL,
  `pos_03` varchar(6) NOT NULL,
  `paraf_03` text NOT NULL,
  `pos_04` varchar(6) NOT NULL,
  `paraf_04` text NOT NULL,
  `pos_05` varchar(6) NOT NULL,
  `paraf_05` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mutasi_shift_3`
--

INSERT INTO `tb_mutasi_shift_3` (`ID_mutasi_shift_3`, `date`, `nama`, `NIK`, `jabatan`, `jam_operasional_10`, `jam_operasional_11`, `jam_operasional_12`, `jam_operasional_01`, `jam_operasional_02`, `jam_operasional_03`, `jam_operasional_04`, `jam_operasional_05`, `pos_10`, `paraf_10`, `pos_11`, `paraf_11`, `pos_12`, `paraf_12`, `pos_01`, `paraf_01`, `pos_02`, `paraf_02`, `pos_03`, `paraf_03`, `pos_04`, `paraf_04`, `pos_05`, `paraf_05`, `keterangan`) VALUES
('ShiftMlm001', '2024-06-06', 'Ardha', 202465654, 'anggota', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'fasfafaf'),
('register002', '2024-06-06', 'NAWOLO PRASETYO', 12414, 'ANGGOTA', '22:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'K', '', '1', 'signature_6662a5be98ed7.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('register002', '2024-06-07', 'RENDI ARGA SAPUTRA', 290675343, 'ANGGOTA', '22:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'K', '', '1', 'signature_6662a5be98ed7.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('register002', '2024-06-07', '', 0, '', '22:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', '', '1', 'signature_6662a5be98ed7.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('ShiftMlm002', '2024-06-07', 'ADIAT NUGROHO', 3538355, 'KETUA', '22:00:00', '23:00:00', '23:00:00', '01:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'K', '', '4/5', 'signature_6662a7819c2b1.png', '2', 'signature_6662b572dfde0.png', 'K', 'signature_6662b57a24e9e.png', '', '', '', '', '', '', '', '', ''),
('ShiftMlm003', '2024-06-07', 'LUHADI ', 346363, 'ANGGOTA', '22:00:00', '23:00:00', '23:00:00', '01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00', 'K', '', '2', 'signature_6662b321c6d8a.png', '4/5', 'signature_6662b3592df45.png', '4/5', 'signature_6662b26545059.png', 'K', '', '2', '', '1', 'signature_6662b35d982da.png', 'K', 'signature_6662b361ce243.png', ''),
('ShiftMlm004', '2024-06-07', 'DINI NURINJANI', 12345678, 'ANGGOTA', '22:00:00', '23:00:00', '23:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2', '', 'K', 'signature_6662d2700d567.png', '2', 'signature_6662d2bda4c03.png', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_register_surat_transit`
--

CREATE TABLE `tb_register_surat_transit` (
  `ID_register` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `kondisi_barang` varchar(10) NOT NULL,
  `security_recieved` varchar(100) NOT NULL,
  `ttd_office` text NOT NULL,
  `person_office_recieved` varchar(100) NOT NULL,
  `amount` int(32) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_register_surat_transit`
--

INSERT INTO `tb_register_surat_transit` (`ID_register`, `date`, `time`, `pengirim`, `kurir`, `kepada`, `kondisi_barang`, `security_recieved`, `ttd_office`, `person_office_recieved`, `amount`, `keterangan`) VALUES
('register001', '2024-06-05', '14:37:08', 'JNE', 'AGRITO', 'ARDHA', 'BAIK', 'KUAT', '', '', 1, 'SEPATU LARI'),
('register002', '2024-06-05', '14:51:39', 'JNT', 'MUKIDI', 'ARDHA', 'BAIK', 'KUAT', '-', '', 1, 'manatap'),
('register003', '2024-06-05', '15:55:16', 'JNT', 'YUNI', 'YUDHO', 'BAIK', 'KUAT', 'qewewr', 'KUAT PURWANTO', 1, 'manatap'),
('register004', '2024-06-06', '09:00:39', 'JNT', 'YUNI', 'ARDHA', 'BAIK', 'KUAT', '', 'NAWOLO PRASETYO', 1, 'manatap'),
('register005', '2024-06-06', '09:02:41', 'JNT', 'YUNI', 'ARDHA', 'BASAH', 'KUAT', '', 'HARDI PRAJOYO', 1, 'qrq'),
('register006', '2024-06-06', '09:16:04', 'JNT', 'MUKIDI', 'YUDHO', 'BAIK', 'KUAT', '-', '', 1, 'qrq'),
('register007', '2024-06-07', '08:10:25', 'JNE', 'AGUS', 'ARDHA', 'BAIK', 'KUAT', 'signature_6662626b22848.png', '', 1, 'tumbler merah'),
('register008', '2024-06-07', '08:42:06', 'SICEPAT', 'AGUS', 'ARDHA', 'BAIK', 'KUAT', 'signature_6662693ec24fe.png', '', 1, 'Sepatu tari'),
('register009', '2024-06-07', '09:01:50', 'JNE', 'HURAS', 'YUDHO', 'BAIK', 'KUAT', 'signature_66626eafa17bf.png', '', 1, 'Red mic'),
('register010', '2024-06-07', '09:25:41', 'JNT', 'MUKIDI', 'ARDHA', 'BAIK', 'KUAT', 'signature_6662702ba61c1.png', '', 1, 'manatap'),
('register011', '2024-06-07', '09:31:41', 'JNT', 'MUKIDI', 'YUDHO', 'BAIK', 'KUAT', 'signature_66627115564d2.png', 'NAWOLO PRASETYO', 1, 'manatap'),
('register012', '2024-06-07', '09:50:50', 'JNT', 'YUNI', 'YUDHO', 'BAIK', 'KUAT', '-', '', 1, 'tumbler merah'),
('register013', '2024-06-07', '16:18:55', 'DHL - 123456789', 'YUDHO', 'ARDHA', 'BAIK', 'MARYANTO', 'signature_6662d14916dbf.png', 'ADI ARDIANSYAH', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report_cctv`
--

CREATE TABLE `tb_report_cctv` (
  `tbrc_uid` varchar(25) NOT NULL,
  `tbrc_uid_cctv` varchar(10) NOT NULL,
  `tbrc_tgl_cek` date NOT NULL,
  `tbrc_status_cek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_report_cctv`
--

INSERT INTO `tb_report_cctv` (`tbrc_uid`, `tbrc_uid_cctv`, `tbrc_tgl_cek`, `tbrc_status_cek`) VALUES
('REPCCTV/PTU1/2024/05/22', 'PTU1/001', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/003', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/001', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/002', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/004', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/005', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/006', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/007', '2024-05-22', 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/001', '2024-05-24', 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/002', '2024-05-24', 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/003', '2024-05-24', 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/012', '2024-05-24', 'OK'),
('REPCCTV/PTU1/2024/05/25', 'PTU1/001', '2024-05-25', 'OK'),
('REPCCTV/PTU1/2024/05/28', 'PTU1/001', '2024-05-28', 'OK'),
('REPCCTV/PTU1/2024/05/29', 'PTU1/001', '2024-05-29', 'OK'),
('REPCCTV/PTU1/2024/05/31', 'PTU1/001', '2024-05-31', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `tbt_uid` varchar(30) DEFAULT NULL,
  `tbt_tanggal` date DEFAULT NULL,
  `tbt_masuk` time DEFAULT NULL,
  `tbt_keluar` time DEFAULT NULL,
  `tbt_nama` varchar(60) DEFAULT NULL,
  `tbt_alamat` varchar(150) DEFAULT NULL,
  `tbt_bertemu` varchar(30) DEFAULT NULL,
  `tbt_keperluan` varchar(150) DEFAULT NULL,
  `tbt_cek_metal` varchar(5) DEFAULT NULL,
  `tbt_cek_mirror` varchar(5) DEFAULT NULL,
  `tbt_ktp` varchar(30) DEFAULT NULL,
  `tbt_id_card` varchar(3) DEFAULT NULL,
  `tbt_paraf` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`tbt_uid`, `tbt_tanggal`, `tbt_masuk`, `tbt_keluar`, `tbt_nama`, `tbt_alamat`, `tbt_bertemu`, `tbt_keperluan`, `tbt_cek_metal`, `tbt_cek_mirror`, `tbt_ktp`, `tbt_id_card`, `tbt_paraf`) VALUES
(NULL, '2024-05-17', '00:00:13', NULL, 'Yudo', 'Bawen', 'Fira', 'Interview', 'NO', 'NO', '12345678', '1', 'upload/Yudo_6646f5c90fb89.png'),
(NULL, '2024-05-17', '00:00:13', NULL, 'Fira', 'Bringin', 'Yudo', 'Intervie user', 'NO', 'NO', '12345678', '2', 'upload/Fira_6646fdfde1209.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `tbu_uid` varchar(10) NOT NULL,
  `tbu_kd_unit` varchar(10) NOT NULL,
  `tbu_nama_unit` varchar(50) NOT NULL,
  `tbu_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`tbu_uid`, `tbu_kd_unit`, `tbu_nama_unit`, `tbu_status`) VALUES
('001', 'PTU1', 'PT. UNGARAN SARI GARMENTS 1', 'ACTIVE'),
('002', 'PTU2', 'PT. UNGARAN SARI GARMENTS 2', 'ACTIVE'),
('003', 'PTU3', 'PT. UNGARAN SARI GARMENTS 3', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_tamu`
--
ALTER TABLE `tb_jenis_tamu`
  ADD PRIMARY KEY (`tbjt_uid`);

--
-- Indexes for table `tb_list_key_room`
--
ALTER TABLE `tb_list_key_room`
  ADD PRIMARY KEY (`id_key_room`);

--
-- Indexes for table `tb_list_key_vehicle`
--
ALTER TABLE `tb_list_key_vehicle`
  ADD PRIMARY KEY (`id_no_pol`);

--
-- Indexes for table `tb_list_security`
--
ALTER TABLE `tb_list_security`
  ADD PRIMARY KEY (`tbls_uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
