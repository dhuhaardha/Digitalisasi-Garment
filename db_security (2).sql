-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 01:23 AM
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
('', 'YUDO', 'QC', '2024-05-16', '16:46:00', '08:22:00', NULL),
('', 'SAFIRA', 'PPMC', '2024-05-16', '16:03:00', '08:12:00', NULL),
('', 'YUDO', 'QC', '2024-05-16', '16:46:00', '08:22:00', NULL),
('', 'SAFIRA', 'PPMC', '2024-05-16', '16:03:00', '08:12:00', NULL),
('', 'YUDO', 'QC', '2024-05-16', '16:46:00', '08:22:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_inventaris_shift`
--

CREATE TABLE `tb_barang_inventaris_shift` (
  `id_barang_inventaris_pos` varchar(13) NOT NULL,
  `barang_inventaris` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_inventaris_shift`
--

INSERT INTO `tb_barang_inventaris_shift` (`id_barang_inventaris_pos`, `barang_inventaris`) VALUES
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
-- Table structure for table `tb_control_gate`
--

CREATE TABLE `tb_control_gate` (
  `ID_control_gate` varchar(13) NOT NULL,
  `time_uraian_created` time NOT NULL,
  `uraian` text NOT NULL,
  `time_uraian_finished` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('UID0021', 'PTU1', 'DRESS 1', 'ACTIVE'),
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
('UID0021', 'PTU1', 'DRESS 1', 'ACTIVE'),
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
(NULL, '', '', '1', ''),
(NULL, '201801001', 'SAFIRA', 'PPMC', 'ACTIVE'),
(NULL, '201711005', 'YUDO', 'QC', 'ACTIVE'),
(NULL, '2022021021', 'APRIL', 'ACCOUNTING', 'ACTIVE'),
(NULL, '201801001', 'SAFIRA', 'PPMC', 'ACTIVE'),
(NULL, '201711005', 'YUDO', 'QC', 'ACTIVE'),
(NULL, '2022021021', 'APRIL', 'ACCOUNTING', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `tbrk_uid` varchar(30) NOT NULL,
  `tbrk_tanggal` date DEFAULT NULL,
  `tbrk_masuk` time DEFAULT NULL,
  `tbrk_tanggal_out` date DEFAULT NULL,
  `tbrk_keluar` time DEFAULT NULL,
  `tbrk_jns_kendaraan` varchar(20) DEFAULT NULL,
  `tbrk_nama_supir` varchar(60) DEFAULT NULL,
  `tbrk_nomor_plat` varchar(15) DEFAULT NULL,
  `tbrk_nmr_kontainer` varchar(20) DEFAULT NULL,
  `tbrk_cek_mirror` varchar(10) DEFAULT NULL,
  `tbrk_nmr_seal` varchar(20) DEFAULT NULL,
  `tbrk_ket` varchar(250) DEFAULT NULL,
  `tbrk_jns_sim` varchar(10) DEFAULT NULL,
  `tbrk_no_sim` varchar(20) DEFAULT NULL,
  `tbrk_no_card` varchar(10) DEFAULT NULL,
  `tbrk_nama_transporter` varchar(50) DEFAULT NULL,
  `tbrk_nama_buyer` varchar(50) DEFAULT NULL,
  `tbrk_qty_kirim` varchar(10) DEFAULT NULL,
  `tbrk_no_gp` varchar(30) DEFAULT NULL,
  `tbrk_tujuan` varchar(50) DEFAULT NULL,
  `tbrk_nm_pengawal` varchar(50) DEFAULT NULL,
  `tbrk_surat_jalan` varchar(50) DEFAULT NULL,
  `tbrk_no_eseal` varchar(50) DEFAULT NULL,
  `tbrk_ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`tbrk_uid`, `tbrk_tanggal`, `tbrk_masuk`, `tbrk_tanggal_out`, `tbrk_keluar`, `tbrk_jns_kendaraan`, `tbrk_nama_supir`, `tbrk_nomor_plat`, `tbrk_nmr_kontainer`, `tbrk_cek_mirror`, `tbrk_nmr_seal`, `tbrk_ket`, `tbrk_jns_sim`, `tbrk_no_sim`, `tbrk_no_card`, `tbrk_nama_transporter`, `tbrk_nama_buyer`, `tbrk_qty_kirim`, `tbrk_no_gp`, `tbrk_tujuan`, `tbrk_nm_pengawal`, `tbrk_surat_jalan`, `tbrk_no_eseal`, `tbrk_ttd`) VALUES
('REPVEHICLE/12/2024/06/21', '2024-06-21', '14:33:00', '2024-06-21', '14:18:00', 'PTU1/KS/002', 'MUKIDI', 'B 6898 RT', '12', 'YES', '1', NULL, 'B', '123456789', 'IDSHIP01', 'SDADAS', 'ADSAD', '2', 'GP1', 'QWERTYU', 'QWERT', '1234567', '123456', 'upload/123456789_667525c598c62.'),
('REPVEHICLE/ctn123/2024/06/03', '2024-06-03', '11:00:00', '2024-06-03', '12:55:00', 'PTU1/KS/003', 'YUDO DRIVER', 'H1234DI', 'CTN123', 'YES', '1234', NULL, 'B1', '1234567', 'IDSHIP01', 'JNT', 'DILLARD', '100', 'GP1234', 'AMERICA LATIN', 'IBNU', 'TN123', 'ESEAL123', 'upload/1234567_665d468c6c9dd.png'),
('REPVEHICLE/CTN1234/2024/06/14', '2024-06-14', '17:17:00', '2024-06-14', '17:35:00', 'PTU1/KS/002', 'INDRO', 'AB1234A', 'CTN1234', 'YES', 'UG123', NULL, 'B1', '12345', 'IDSHIP03', 'DHL', 'LULUEMON', '10', 'GP1234', 'AMERICA', 'PENGAWAL1', 'TN1234', 'UG1234', 'upload/12345_666c1d5d4d31d.png'),
('REPVEHICLE/CTN321/2024/06/07', '2024-06-07', '17:23:00', '2024-06-07', '17:37:00', 'PTU1/KS/003', 'BUDI', 'B1234DI', 'CTN321', 'YES', 'SEAL123', NULL, 'B2', '123456', 'IDSHIP02', 'DHL', 'LULULEMON', '123', 'GP1234', 'AMERICA', 'APRIL', 'SURAT1234', 'ESEAL1234', 'upload/123456_6662dbdb82336.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan_umum`
--

CREATE TABLE `tb_kendaraan_umum` (
  `tbu_uid` varchar(30) NOT NULL,
  `tbu_tgl_masuk` date DEFAULT NULL,
  `tbu_jam_masuk` time DEFAULT NULL,
  `tbu_tgl_keluar` date DEFAULT NULL,
  `tbu_jam_keluar` time DEFAULT NULL,
  `tbu_jns_kendaraan` varchar(20) DEFAULT NULL,
  `tbu_no_kartu` varchar(20) DEFAULT NULL,
  `tbu_no_identitas` varchar(20) DEFAULT NULL,
  `tbu_nm_supir` varchar(60) DEFAULT NULL,
  `tbu_nmr_plat` varchar(15) DEFAULT NULL,
  `tbu_nmr_kontainer` varchar(20) DEFAULT NULL,
  `tbu_nmr_seal` varchar(20) DEFAULT NULL,
  `tbu_bc_masuk` varchar(50) DEFAULT NULL,
  `tbu_brg_masuk` varchar(250) DEFAULT NULL,
  `tbu_bc_keluar` varchar(20) DEFAULT NULL,
  `tbu_brg_keluar` varchar(250) DEFAULT NULL,
  `tbu_nm_security` varchar(60) DEFAULT NULL,
  `tbu_ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_kendaraan_umum`
--

INSERT INTO `tb_kendaraan_umum` (`tbu_uid`, `tbu_tgl_masuk`, `tbu_jam_masuk`, `tbu_tgl_keluar`, `tbu_jam_keluar`, `tbu_jns_kendaraan`, `tbu_no_kartu`, `tbu_no_identitas`, `tbu_nm_supir`, `tbu_nmr_plat`, `tbu_nmr_kontainer`, `tbu_nmr_seal`, `tbu_bc_masuk`, `tbu_brg_masuk`, `tbu_bc_keluar`, `tbu_brg_keluar`, `tbu_nm_security`, `tbu_ttd`) VALUES
('PTU1/KU/1', '2024-06-05', '13:05:00', '2024-06-21', '17:13:00', 'PTU1/KS/001', 'IDSHIP01', '1234567890', 'YUDO', 'AB1234CD', 'CTN123', 'SEAL1234', 'PTU1/001', 'BARANG MASUK DARI LUAR', 'PTU1/006', 'MANTAP', 'PTU1/0029', NULL),
('PTU1/KU/2', '2024-06-07', '11:22:00', '2024-06-21', '17:13:00', 'PTU1/KS/001', 'IDSHIP01', '1234567890', 'PUBLIC', 'H1234DI', 'MCHU2000005', 'ID5555550', 'PTU1/001', 'BARANG MASUK', 'PTU1/006', 'MANTAP', 'PTU1/0029', NULL),
('PTU1/KU/3', '2024-06-07', '16:40:00', '2024-06-21', '17:13:00', 'PTU1/KS/001', 'IDSHIP01', '12345767', 'MUKIDI', 'B1234DI', 'CTN1234', 'SEAL1234', 'PTU1/004', 'KAIN 20 KG', 'PTU1/006', 'MANTAP', 'PTU1/0029', NULL),
('PTU1/KU/4', '2024-06-14', '17:06:00', '2024-06-21', '17:13:00', 'PTU1/KS/002', 'IDSHIP03', '123456778', 'YUDO', 'H1234B', 'CTN3211', 'UG111', 'PTU1/002', 'FABRIC', 'PTU1/006', 'MANTAP', 'PTU1/0029', NULL),
('PTU1/KU/5', '2024-06-21', '13:37:00', '2024-06-21', '17:13:00', 'PTU1/KS/006', 'IDSHIP02', '12345678', 'MUKIDI', 'B 6898 RT', '12', '1', 'PTU1/003', 'FABRIC MASUK', 'PTU1/006', 'MANTAP', 'PTU1/0029', NULL),
('PTU1/KU/6', '2024-06-21', '17:52:00', '2024-06-21', '17:13:00', 'PTU1/KS/004', 'IDSHIP02', '12345678', 'MUKIDI', 'B 6374 RT', '12', '1', 'PTU1/008', 'DRESS MANTAP', 'PTU1/006', 'MANTAP', 'PTU1/0029', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontrol_pagar`
--

CREATE TABLE `tb_kontrol_pagar` (
  `id_opr_kontrol_pagar` varchar(13) NOT NULL,
  `shift` int(4) NOT NULL,
  `time_kontrol_created` time NOT NULL,
  `uraian` text NOT NULL,
  `time_kontrol_finished` time NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kontrol_pagar`
--

INSERT INTO `tb_kontrol_pagar` (`id_opr_kontrol_pagar`, `shift`, `time_kontrol_created`, `uraian`, `time_kontrol_finished`, `dibuat_pada`) VALUES
('KonPag001', 3, '09:52:00', 'harus OKE', '10:44:01', '2024-06-14 03:44:11'),
('KonPag002', 3, '10:01:40', 'harus OK', '10:42:53', '2024-06-14 03:44:01'),
('KonPag003', 1, '13:08:31', 'asfasff', '13:09:40', '2024-06-14 06:09:44'),
('KonPag004', 2, '13:09:29', 'qwrwrqw', '13:09:34', '2024-06-14 06:09:40'),
('KonPag005', 1, '16:12:44', '', '00:00:00', '2024-06-14 09:13:08'),
('KonPag006', 1, '16:12:27', '', '00:00:00', '2024-06-14 09:13:11');

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
('keyvehicle013', 'KeyV007', 'B 1993 SAO', 'UNGARAN', 'DISERAHKAN', '2024-06-07', '16:12:12', 'YUDHO', '6662cf8205e2f.png', 'ARDHA', 1, '', '2024-06-07', '16:13:00', 'YUDHO', '', 'ARDHA', 1, ''),
('keyvehicle014', 'KeyV001', 'B 1809 SYN', 'UNGARAN', 'DISERAHKAN', '2024-06-13', '14:21:27', 'RITA', '666a9df8069aa.png', 'YUDHO', 1, 'qwrqrq', '2024-06-13', '15:17:13', 'ARDHA', '', '', 1, 'heiii'),
('keyvehicle015', 'KeyV012', 'B 2550 SZL', 'CONGOL', 'DISERAHKAN', '2024-06-13', '15:16:02', 'RITA', '666aaac29d0f2.png', 'YUDHO', 1, 'qwe', '2024-06-13', '15:17:01', 'ARDHA', '', '', 1, 'hoho'),
('keyvehicle016', 'KeyV005', 'B 2332 SZV', 'UNGARAN', 'DISERAHKAN', '2024-06-13', '15:16:20', 'RITA', '666aaad536d7b.png', 'YUDHO', 1, 'qwrqrq', '2024-06-13', '15:16:49', 'ARDHA', '', 'DHUHA', 1, 'asda'),
('keyvehicle017', 'KeyV001', 'B 1809 SYN', 'UNGARAN', 'DIAMBIL', '2024-06-14', '13:11:28', 'RITA', '666bdf1147fd0.png', 'YUDHO', 1, 'qwrqrq', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle018', 'KeyV001', 'B 1809 SYN', 'UNGARAN', 'DIAMBIL', '0000-00-00', '13:31:57', 'SAYA', '66727bc664f76.png', 'AYAY', 1, '', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle019', 'KeyV006', 'B 2734 SZX', 'UNGARAN', 'DIAMBIL', '2024-06-19', '13:37:36', 'VTU', '66727d1a721bc.png', 'YUI', 1, '', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle020', 'KeyV001', 'B 1809 SYN', 'UNGARAN', 'DIAMBIL', '2024-06-20', '07:59:58', 'RITA', '66737f1cc5670.png', 'YUDHO', 1, '', '0000-00-00', '00:00:00', '', '', '', 0, ''),
('keyvehicle021', 'KeyV012', 'B 2550 SZL', 'CONGOL', 'DISERAHKAN', '2024-06-21', '14:52:06', 'RITA', '6675315b8a4fa.png', 'YUDHO', 1, 'qwrqrq', '2024-06-21', '14:53:12', 'ARDHA', '', 'DHUHA', 1, '1'),
('keyvehicle022', 'KeyV006', 'B 2734 SZX', 'UNGARAN', 'DISERAHKAN', '2024-06-21', '17:30:23', 'RITA', '6675566c78da0.png', 'YUDHO', 1, 'qwrqrq', '2024-06-21', '17:31:29', 'ARDHA', '', 'DHUHA', 1, 'asda');

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
('keyruang039', 'KeyR005', 'STORE ACCESSORIS', 10, '2', 'SERAH TERIMA', '2024-06-07', '16:15:40', 'YUDHO', 10, '6662d0524dbdc.png', '2024-06-07', '16:16:05', 'YUDHO', 10, '', '2024-06-07', '16:16:26', 'YUDHO', 10, ''),
('keyruang040', 'KeyR001', 'SHIRT', 12, '2', 'PENGAMBILAN', '2024-06-08', '13:32:13', 'ARDHA', 12, '6663faefc45cd.png', '2024-06-08', '13:32:04', '', 12, '', '2024-06-08', '13:32:04', '', 12, ''),
('keyruang041', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-06-12', '12:03:37', 'ARDHA', 10, '66692c29df32b.png', '2024-06-12', '12:04:52', 'YUDHO', 10, '', '2024-06-12', '12:03:27', '', 10, ''),
('keyruang042', 'KeyR007', 'POLY', 9, '1', 'PENGEMBALIAN', '2024-06-12', '12:04:03', 'ARDHA', 9, '66692c43c129f.png', '2024-06-12', '12:04:46', 'YUDHO', 9, '', '2024-06-12', '12:03:38', '', 9, ''),
('keyruang043', 'KeyR011', 'LABORAT', 1, '2', 'SERAH TERIMA', '2024-06-12', '12:04:14', 'ARDHA', 1, '66692c4fbb3f2.png', '2024-06-12', '12:05:02', 'YUDHO', 1, '', '2024-06-12', '12:05:12', 'RATERI', 1, ''),
('keyruang044', 'KeyR004', 'STORE FABRIC', 8, '2', 'SERAH TERIMA', '2024-06-12', '12:04:34', 'ARDHA', 8, '66692c6303da4.png', '2024-06-12', '12:04:57', 'YUDHO', 8, '', '2024-06-12', '12:05:07', 'RATERI', 8, ''),
('keyruang045', 'KeyR008', 'BEA CUKAI', 2, '1', 'PENGEMBALIAN', '2024-06-12', '13:30:20', 'ARDHA', 2, '6669407d0a4ae.png', '2024-06-12', '13:30:26', 'YUDHO', 2, '', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang046', 'KeyR001', 'SHIRT', 12, '1', 'PENGAMBILAN', '2024-06-12', '14:57:52', 'DHUHA ARDHA SAPUTRA', 12, '666955013b331.png', '2024-06-12', '14:41:49', '', 12, '', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang047', 'KeyR001', 'SHIRT', 12, '1', 'PENGAMBILAN', '2024-06-14', '13:15:26', 'ARDHA', 12, '666bdfff61618.png', '2024-06-14', '13:15:21', '', 12, '', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang048', 'KeyR001', 'SHIRT', 12, '2', 'PENGEMBALIAN', '2024-06-14', '16:20:50', 'APRILYA', 12, '666c0c0989fe4.png', '2024-06-14', '16:22:17', 'ARTIN', 12, '', '2024-06-14', '16:21:57', '', 12, ''),
('keyruang049', 'KeyR013', 'COBA', 14, '2', 'SERAH TERIMA', '2024-06-14', '16:21:27', 'KUAT', 14, '666c0c099b27b.png', '2024-06-14', '16:23:16', 'NAWOLO', 14, '', '2024-06-14', '16:23:21', 'YANTI', 14, ''),
('keyruang050', 'KeyR005', 'STORE ACCESSORIS', 10, '1', 'PENGEMBALIAN', '2024-06-19', '09:51:53', 'KUAT', 10, 'upload/signature_66724833360b9.png', '2024-06-19', '14:36:53', 'ARDHA', 10, 'upload/signature_66728affa6c2e.png', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang051', 'KeyR003', 'DRESS 2', 25, '1', 'PENGEMBALIAN', '2024-06-19', '14:38:40', 'YUBBU', 25, 'upload/signature_66728b8893a28.png', '2024-06-19', '15:11:57', 'YUDHO', 25, 'upload/signature_6672933755e32.png', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang052', 'KeyR006', 'OFFICE', 9, '2', 'PENGEMBALIAN', '2024-06-19', '14:40:56', 'GURI', 9, 'upload/signature_66728c09be24b.png', '2024-06-19', '15:12:05', 'ARDHA', 9, 'upload/signature_6672933e5bf16.png', '2024-06-19', '14:40:56', '', 9, ''),
('keyruang053', 'KeyR001', 'SHIRT', 12, '1', 'PENGEMBALIAN', '2024-06-21', '14:50:44', 'ARDHA', 12, 'upload/signature_667530df7e09c.png', '2024-06-21', '14:51:04', 'YUDHO', 12, 'upload/signature_667530e91c943.png', '0000-00-00', '00:00:00', '', 0, ''),
('keyruang054', 'KeyR007', 'POLY', 9, '2', 'SERAH TERIMA', '2024-06-21', '17:26:45', 'DANI', 9, 'upload/signature_667555a191b6c.png', '2024-06-21', '17:28:27', 'YUDHO', 9, 'upload/signature_667555cc1f647.png', '2024-06-21', '17:28:33', 'RATERI', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_bc`
--

CREATE TABLE `tb_list_bc` (
  `tblb_uid` varchar(20) NOT NULL,
  `tblb_nm_bc` varchar(10) DEFAULT NULL,
  `tblb_sts_bc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_bc`
--

INSERT INTO `tb_list_bc` (`tblb_uid`, `tblb_nm_bc`, `tblb_sts_bc`) VALUES
('PTU1/001', 'BC 23', 'ACTIVE'),
('PTU1/002', 'BC 27', 'ACTIVE'),
('PTU1/003', 'BC 30', 'ACTIVE'),
('PTU1/004', 'BC 25', 'ACTIVE'),
('PTU1/005', 'BC 40', 'ACTIVE'),
('PTU1/006', 'BC 41', 'ACTIVE'),
('PTU1/007', 'BC 261', 'ACTIVE'),
('PTU1/008', 'BC 262', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_buku`
--

CREATE TABLE `tb_list_buku` (
  `tblu_uid` varchar(20) NOT NULL,
  `tblu_jns_buku` varchar(30) DEFAULT NULL,
  `tblu_kd_buku` varchar(10) DEFAULT NULL,
  `tblu_nm_buku` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_buku`
--

INSERT INTO `tb_list_buku` (`tblu_uid`, `tblu_jns_buku`, `tblu_kd_buku`, `tblu_nm_buku`) VALUES
('PTU1/001', 'PATROLI', 'B001', 'GS PATROL'),
('PTU1/002', 'PATROLI', 'B002', 'EMERGENCY DOOR CHECK'),
('PTU1/003', 'PATROLI', 'B003', 'SHIFT PATROL'),
('PTU1/004', 'PATROLI', 'B004', 'DANRU PATROL'),
('PTU1/005', 'PATROLI', 'B005', 'SPECIAL SECURITY REPORT'),
('PTU1/006', 'TAMU', 'B006', 'VIP'),
('PTU1/007', 'TAMU', 'B007', 'BUYER'),
('PTU1/008', 'TAMU', 'B008', 'FACTORY VISITOR'),
('PTU1/009', 'TAMU', 'B009', 'APPLICANT'),
('PTU1/010', 'TAMU', 'B010', 'SUPPLIER'),
('PTU1/011', 'TAMU', 'B011', 'SEGREGATION'),
('PTU1/012', 'TAMU', 'B012', 'STORE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_card`
--

CREATE TABLE `tb_list_card` (
  `tblic_uid` varchar(10) NOT NULL,
  `tblic_jns_kartu` varchar(20) DEFAULT NULL,
  `tblic_no_id` varchar(10) DEFAULT NULL,
  `tblic_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_card`
--

INSERT INTO `tb_list_card` (`tblic_uid`, `tblic_jns_kartu`, `tblic_no_id`, `tblic_status`) VALUES
('IDSHIP01', NULL, '1', 'READY'),
('IDSHIP02', NULL, '2', 'READY'),
('IDSHIP03', NULL, '3', 'READY'),
('IDSHIP04', NULL, '4', 'READY'),
('IDSHIP05', NULL, '5', 'READY'),
('PTU1/006', 'TAMU', '1', 'READY'),
('PTU1/007', 'TAMU', '2', 'READY'),
('PTU1/008', 'TAMU', '3', 'READY'),
('PTU1/009', 'TAMU', '4', 'READY'),
('PTU1/010', 'TAMU', '5', 'READY'),
('PTU1/011', 'TAMU', '6', 'READY'),
('PTU1/012', 'TAMU', '7', 'READY'),
('PTU1/013', 'TAMU', '8', 'READY');

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
('PTU1/001', 'PTU1', 'POS INDUK', 'INACTIVE', '2024-06-21'),
('PTU1/002', 'PTU1', 'LOBBY', 'ACTIVE', '2024-06-05'),
('PTU1/003', 'PTU1', 'EXPORT DRESS 1', 'ACTIVE', '2024-05-31'),
('PTU1/004', 'PTU1', 'PINTU LOADING 2 DRESS 1', 'ACTIVE', '2024-05-31'),
('PTU1/005', 'PTU1', 'STORE ACCESSORIES', 'ACTIVE', '2024-05-31'),
('PTU1/006', 'PTU1', 'STORE ACCESSORIES DALAM', 'ACTIVE', '2024-05-31'),
('PTU1/007', 'PTU1', 'RUANG SERVER', 'ACTIVE', '2024-05-30'),
('PTU1/008', 'PTU1', 'PACKING DRESS 1', 'ACTIVE', '2024-05-30'),
('PTU1/009', 'PTU1', 'POLYBAG DRESS 1', 'ACTIVE', '2024-05-30'),
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
('PTU1/047', 'PTU1', 'DEPAN LINE PRESS', 'ACTIVE', NULL),
('PTU1/048', 'PTU1', 'COBA CCTV', 'ACTIVE', ''),
('PTU1/049', 'PTU1', 'APRIL', 'ACTIVE', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_kendaraan`
--

CREATE TABLE `tb_list_kendaraan` (
  `tblk_uid` varchar(20) NOT NULL,
  `tblk_tipe_kendaraan` varchar(50) NOT NULL,
  `tblk_nama_kendaraan` varchar(50) DEFAULT NULL,
  `tblk_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_list_kendaraan`
--

INSERT INTO `tb_list_kendaraan` (`tblk_uid`, `tblk_tipe_kendaraan`, `tblk_nama_kendaraan`, `tblk_status`) VALUES
('PTU1/KS/001', 'KS', 'CONTAINER 20 FT', 'ACTIVE'),
('PTU1/KS/002', 'KS', 'CONTAINER 40 FT', 'ACTIVE'),
('PTU1/KS/003', 'KS', 'CONTAINER 40 HC', 'ACTIVE'),
('PTU1/KS/004', 'KS', 'CONTAINER 45 FT', 'ACTIVE'),
('PTU1/KS/005', 'KS', 'TRUCK TRONTON', 'ACTIVE'),
('PTU1/KS/006', 'KS', 'TRUCK ANGKEL', 'ACTIVE'),
('PTU1/KS/007', 'KS', 'TRUCK BUILD UP', 'ACTIVE'),
('PTU1/KS/008', 'KS', 'TRUCK BOX DIESEL', 'ACTIVE');

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
-- Table structure for table `tb_logs_activity_mutasi_shift`
--

CREATE TABLE `tb_logs_activity_mutasi_shift` (
  `id_logs_activity_shift` varchar(11) NOT NULL,
  `shift` varchar(16) NOT NULL,
  `time_uraian_created` time NOT NULL,
  `uraian` text NOT NULL,
  `time_uraian_finished` time NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_logs_activity_mutasi_shift`
--

INSERT INTO `tb_logs_activity_mutasi_shift` (`id_logs_activity_shift`, `shift`, `time_uraian_created`, `uraian`, `time_uraian_finished`, `dibuat_pada`) VALUES
('uraian001', '', '22:22:58', 'keliling aja', '22:58:58', '2024-06-07 04:23:46'),
('uraian002', '', '00:00:00', 'Cobaardha.....', '14:06:00', '2024-06-07 06:11:17'),
('uraian003', '', '13:12:36', 'weqweqeqeqweqweqweqeqeqweqw', '00:00:00', '2024-06-07 06:12:54'),
('uraian004', '', '13:14:12', 'Djdjdjd', '17:32:00', '2024-06-07 06:14:24'),
('uraian005', '', '14:45:10', 'Feojosnfonfso', '00:42:00', '2024-06-07 07:45:32'),
('uraian006', '', '16:34:08', 'JAGA MALAM', '00:00:00', '2024-06-07 09:38:09'),
('uraian007', '', '13:34:12', '', '00:00:00', '2024-06-08 06:34:19'),
('uraian008', '', '09:31:01', 'manatap', '09:53:26', '2024-06-10 02:53:32'),
('uraian009', '1', '09:31:53', 'wqwerqrwr', '09:53:21', '2024-06-10 02:53:26'),
('uraian010', '2', '14:25:08', 'qwrqwrqwrqrwq', '14:27:16', '2024-06-10 07:27:24'),
('uraian011', '2', '10:47:39', 'wqwqeqwe', '10:47:44', '2024-06-11 03:47:50'),
('uraian012', 'GS', '14:22:19', 'Dhuha Ardha S melakukan patroli berputra sekitar kawasan DRESS 01 sampai SHIRT', '14:25:40', '2024-06-11 07:27:04'),
('uraian013', '1', '13:38:14', 'adsada', '13:38:35', '2024-06-13 06:38:44'),
('uraian014', '1', '13:38:20', 'qweqweqeqwe', '13:38:44', '2024-06-13 06:39:04'),
('uraian015', '3', '14:28:10', 'wdwqweq', '14:28:15', '2024-06-13 07:28:19'),
('uraian016', '1', '10:51:14', 'qwertyuiosdfgh', '10:51:18', '2024-06-14 03:51:24'),
('uraian017', '1', '13:47:56', 'mem an aan satusar', '13:48:17', '2024-06-14 06:50:36'),
('uraian018', '1', '14:05:25', 'syuuiiookkjhbgfdr556y', '14:05:36', '2024-06-14 07:08:19'),
('uraian019', '1', '15:58:52', 'ada saya', '15:59:02', '2024-06-14 08:59:35'),
('uraian020', '1', '15:58:08', 'Ada tamu WNA', '15:59:04', '2024-06-14 08:59:46'),
('uraian021', '1', '15:58:09', 'Ada tamu reskrim', '15:59:08', '2024-06-14 08:59:36'),
('uraian022', '1', '16:13:08', '', '00:00:00', '2024-06-14 09:13:16'),
('uraian023', '1', '16:13:17', '', '00:00:00', '2024-06-14 09:15:44'),
('uraian024', '1', '16:22:39', 'asjdhakjdh', '16:22:45', '2024-06-21 09:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs_barang_inventaris_mutasi_shift`
--

CREATE TABLE `tb_logs_barang_inventaris_mutasi_shift` (
  `ID_logs_barang_inventaris` varchar(13) NOT NULL,
  `id_barang_inventaris_pos` varchar(13) NOT NULL,
  `barang_inventaris` varchar(32) NOT NULL,
  `jumlah_barang_inventaris` int(3) NOT NULL,
  `shift` varchar(3) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_logs_barang_inventaris_mutasi_shift`
--

INSERT INTO `tb_logs_barang_inventaris_mutasi_shift` (`ID_logs_barang_inventaris`, `id_barang_inventaris_pos`, `barang_inventaris`, `jumlah_barang_inventaris`, `shift`, `date_created`) VALUES
('LogInv001', 'BInv001', 'KOMPUTER', 1, '1', '2024-06-10 02:20:34'),
('LogInv002', 'BInv003', 'MONITOR CCTV', 2, '1', '2024-06-10 02:22:33'),
('LogInv003', 'BInv001', 'KOMPUTER', 2, '1', '2024-06-13 06:27:54'),
('LogInv004', 'BInv003', 'MONITOR CCTV', 2, '2', '2024-06-13 06:28:03'),
('LogInv005', 'BInv008', 'JAM DINDING', 1, 'GS', '2024-06-13 06:28:10'),
('LogInv006', 'BInv001', 'KOMPUTER', 3, '3', '2024-06-13 07:28:06'),
('LogInv007', 'BInv006', 'HT & CHARGER', 3, '1', '2024-06-14 03:50:57'),
('LogInv008', 'BInv002', 'PRINTER', 1, '1', '2024-06-14 03:51:07'),
('LogInv009', 'BInv007', 'KAMERA & CHARGER', 2, '1', '2024-06-14 06:47:45'),
('LogInv010', 'BInv001', 'KOMPUTER', 1, '1', '2024-06-14 08:44:28'),
('LogInv011', 'BInv001', 'KOMPUTER', 1, '1', '2024-06-21 09:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi_shift_1_to_gs`
--

CREATE TABLE `tb_mutasi_shift_1_to_gs` (
  `id_mutasi_1_to_GS` varchar(13) NOT NULL,
  `jenis` varchar(3) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `NIK` int(9) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pos` varchar(3) NOT NULL,
  `ttd` text NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mutasi_shift_1_to_gs`
--

INSERT INTO `tb_mutasi_shift_1_to_gs` (`id_mutasi_1_to_GS`, `jenis`, `nama`, `NIK`, `jabatan`, `pos`, `ttd`, `keterangan`, `dibuat_pada`) VALUES
('ShiftMut001', '', 'NAWOLO PRASETYO', 234590, 'ANGGOTA', 'K', '', 'weqeq', '2024-06-10'),
('ShiftMut002', '1', 'HARDI PRAJOYO', 213475, 'ANGGOTA', '1', '', 'wewrwr', '2024-06-10'),
('ShiftMut003', '2', 'RIYAN ISMAWAN', 6789986, 'ANGGOTA', '2', '', 'weqweqwe', '2024-06-10'),
('ShiftMut004', 'GS', 'GUNAWAN WIBOWO', 6789986, 'ANGGOTA', '4/5', '', 'weqweq', '2024-06-10'),
('ShiftMut005', '1', 'MARYANTO ', 123456, 'ANGGOTA', '1', '', 'dadasd', '2024-06-11'),
('ShiftMut006', '2', 'ADI ARDIANSYAH', 123456, 'ANGGOTA', '4/5', '', '', '2024-06-11'),
('ShiftMut007', 'GS', 'GUNAWAN WIBOWO', 346363, 'ANGGOTA', '2', '', '', '2024-06-11'),
('ShiftMut008', '1', 'ADI ARDIANSYAH', 2147483647, '', '', '', '', '2024-06-11'),
('ShiftMut009', '1', 'ADI ARDIANSYAH', 202405678, '', '', '', '', '2024-06-11'),
('ShiftMut010', '1', 'DINI NURINJANI', 123456789, 'ANGGOTA', 'K', '', 'qweqew', '2024-06-11'),
('ShiftMut011', '1', 'HARDI PRAJOYO', 123456789, 'ANGGOTA', '1', '', 'sdfdf', '2024-06-11'),
('ShiftMut012', '1', 'BIMANTARA TARA SUGANDHA', 123456789, 'ANGGOTA', '2', '', 'dsdf', '2024-06-11'),
('ShiftMut013', '1', 'W. SAPUTRO', 123456789, 'ANGGOTA', '1', '', 'sdf', '2024-06-11'),
('ShiftMut014', '1', 'ANGELIKA KUSUMA', 290921312, 'ANGGOTA', '2', '', 'ewqeqwe', '2024-06-11'),
('ShiftMut015', '1', 'BAGAS DANISWARA', 123456789, 'ANGGOTA', '4/5', '', 'qeqw', '2024-06-11'),
('ShiftMut016', '1', 'FERRY KURNIAWAN', 123456789, 'ANGGOTA', '1', '', 'dsad', '2024-06-11'),
('ShiftMut017', '1', 'MULYADI', 123456789, 'ANGGOTA', '1', '', 'sda', '2024-06-11'),
('ShiftMut018', '1', 'HARIYONO', 202356987, 'KETUE', 'K', '', 'Rapi ndan', '2024-06-11'),
('ShiftMut019', '1', 'AGUS ANGGORO ', 123456789, 'ANGGOTA', '1', '', '', '2024-06-12'),
('ShiftMut020', '1', 'ADI ARDIANSYAH', 123456789, 'ANGGOTA', '1', '', 'qwertyui', '2024-06-13'),
('ShiftMut021', '1', 'APRILYA PUSPITASARI', 123456789, 'KETUA', 'K', '', 'dada', '2024-06-14'),
('ShiftMut022', '1', 'ADI ARDIANSYAH', 123456789, 'ANGGOTA', '2', '', '', '2024-06-14'),
('ShiftMut023', '2', 'GUNAWAN WIBOWO', 123456789, 'ANGGOTA', '1', '', '', '2024-06-14'),
('ShiftMut024', '1', 'ADITYA BUDI SAPUTRA', 12646246, 'ANGGOTA', '1', 'upload/signature_666bbfd563208.png', '', '2024-06-14'),
('ShiftMut025', '2', 'DINI NURINJANI', 121451165, 'ANGGOTA', '2', 'upload/signature_666bc30709669.png', 'sadadas', '2024-06-14'),
('ShiftMut026', '2', 'EKA MUSRIATIEN', 2024040253, 'ANGGOTA', 'K', 'upload/signature_666bc37434d51.png', 'Mantap boss', '2024-06-14'),
('ShiftMut027', '1', 'ADITYA BUDI SAPUTRA', 2021022222, 'KETUA', '1', 'upload/signature_666bc5b14d21b.png', 'ada senua', '2024-06-14'),
('ShiftMut028', '1', 'ANGELIKA KUSUMA', 21414, 'ANGGOTA', '1', 'upload/signature_666bddcbea4c2.png', '', '2024-06-14'),
('ShiftMut029', '1', 'AGUS ANGGORO ', 202111457, 'ANGGOTA', '1', 'upload/signature_666be6543372e.png', 'Coba', '2024-06-14'),
('ShiftMut030', '1', 'KUAT PURWANTO', 199911010, 'DANRU', '1', 'upload/signature_666c019f11707.png', 'Jaga', '2024-06-14'),
('ShiftMut031', '1', 'APRILYA PUSPITASARI', 202456789, 'DAN RU', '1', 'upload/signature_666c01c00a058.png', '', '2024-06-14'),
('ShiftMut032', 'GS', 'APRILYA PUSPITASARI', 200604122, 'KOMANDAN REGU', 'K', '', 'Aman', '2024-06-14'),
('ShiftMut033', '1', 'ADITYA BUDI SAPUTRA', 123456789, 'ANGGOTA', 'K', 'upload/signature_66712c017135a.png', '', '2024-06-18'),
('ShiftMut034', '1', 'AGUS ANGGORO ', 221312414, 'ANGGOTA', '4/5', 'upload/signature_6671492e24ee0.png', '', '2024-06-18'),
('ShiftMut035', '2', 'DAVID PUTRA SETIAWAN', 141412515, 'ANGGOTA', 'K', 'upload/signature_66714c4d49037.png', '', '2024-06-18'),
('ShiftMut036', '1', 'ADITYA BUDI SAPUTRA', 2809844, 'ANGGOTA', '1', 'upload/signature_66723b77d1a9d.png', '', '2024-06-19'),
('ShiftMut037', '1', 'KUAT PURWANTO', 202439764, 'KETUA', '1', 'upload/signature_66738b7453c70.png', '', '2024-06-20'),
('ShiftMut038', '1', 'ASTI MAULINA AZAHRA', 124125, 'ANGGOTA', '2', 'upload/signature_6674cd8399fc1.png', '', '2024-06-21'),
('ShiftMut039', '1', 'ANGELIKA KUSUMA', 202, 'ANGGOTA', '1', 'upload/signature_6675ea00cfe10.png', '', '2024-06-22'),
('ShiftMut040', '1', 'ASTI MAULINA AZAHRA', 202400245, 'ANGGOTA', '1', 'upload/signature_6675ea2213aad.png', 'tidak ada', '2024-06-22'),
('ShiftMut041', '1', 'FERRY KURNIAWAN', 123456789, 'ANGGOTA', '1', 'upload/signature_6675ea70e1ce8.png', '', '2024-06-22'),
('ShiftMut042', '1', 'ADITYA BUDI SAPUTRA', 123456789, 'ANGGOTA', '1', 'upload/signature_6675ebfceea07.png', 'dfghj', '2024-06-22'),
('ShiftMut043', '2', 'ADI ARDIANSYAH', 123456789, 'ANGGOTA', '2', 'upload/signature_6675ee56219af.png', '', '2024-06-22');

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
('ShiftMlm004', '2024-06-07', 'DINI NURINJANI', 12345678, 'ANGGOTA', '22:00:00', '23:00:00', '23:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2', '', 'K', 'signature_6662d2700d567.png', '2', 'signature_6662d2bda4c03.png', '', '', '', '', '', '', '', '', '', '', ''),
('ShiftMlm005', '2024-06-10', 'HARIYONO', 234590, 'ANGGOTA', '22:00:00', '23:00:00', '23:00:00', '01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00', '1', '', '2', 'signature_6666ab9d8230d.png', 'K', 'signature_6666aba243f9e.png', '4/5', 'signature_6666aba7625c9.png', '2', 'signature_6666abacc1fb9.png', '1', 'signature_6666abb187958.png', '2', 'signature_6666abb81b231.png', 'K', 'signature_6666abbdefc70.png', ''),
('ShiftMlm006', '2024-06-13', 'NAWOLO PRASETYO', 123456789, 'ANGGOTA', '22:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('ShiftMlm007', '2024-06-13', 'NOVANT PRABOWO EKO. S', 12271376, 'ANGGOTA', '22:00:00', '23:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '1', '', '2', 'signature_666aa1bad1ce6.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('ShiftMlm008', '2024-06-14', 'HERU SUSANTO', 123456789, 'DAN RU', '22:00:00', '23:00:00', '23:00:00', '01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00', '1', '', '2', 'signature_666c03c9582db.png', '4/5', 'signature_666c03debdb2c.png', '1', 'signature_666c03e778144.png', '1', 'signature_666c03f6ad2dc.png', '4/5', 'signature_666c04014a47a.png', 'K', 'signature_666c04395e027.png', '1', 'signature_666c05aa03404.png', ''),
('ShiftMlm009', '2024-06-14', 'NAWOLO PRASETYO', 0, '', '22:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('ShiftMlm010', '2024-06-18', 'NAWOLO PRASETYO', 12312312, 'ANGGOTA', '22:00:00', '23:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '1', 'upload/signature_6671483491c1e.png', '4/5', 'upload/signature_66714c24e6977.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('ShiftMlm011', '2024-06-18', 'RENDI ARGA SAPUTRA', 123456789, 'KETUA', '22:00:00', '23:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '1', 'upload/signature_667148e740391.png', '2', 'signature_66714ba0e4012.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('ShiftMlm012', '2024-06-19', 'ARI PRABOWO', 20248593, 'ANGGOTA', '22:00:00', '23:00:00', '23:00:00', '01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00', '1', 'upload/signature_667237dc1eb66.png', 'K', 'upload/signature_66723a45270a1.png', '2', 'upload/signature_66723c2e8be0b.png', '4/5', 'upload/signature_66723dd7aee0d.png', '1', 'upload/signature_667240e3e0b34.png', '2', 'upload/signature_667241baa021c.png', '2', 'upload/signature_66724217b016d.png', '2', 'upload/signature_66724274d3ad6.png', ''),
('ShiftMlm013', '2024-06-19', 'KUAT PURWANTO', 6755676, 'ANGGOTA', '22:00:00', '23:00:00', '23:00:00', '01:00:00', '02:00:00', '03:00:00', '00:00:00', '00:00:00', '1', 'upload/signature_66723b4c04f36.png', '2', 'upload/signature_66723c4f88c3e.png', 'K', 'upload/signature_66723d8db3570.png', '4/5', 'upload/signature_66723e0de75dd.png', '1', 'upload/signature_66723e8a19d7a.png', '1', 'upload/signature_6672417486213.png', '', '', '', '', ''),
('ShiftMlm014', '2024-06-21', 'NAWOLO PRASETYO', 123456789, 'ANGGOTA', '22:00:00', '23:00:00', '23:00:00', '01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00', '1', 'upload/signature_66751adb35829.png', 'K', 'upload/signature_667537114fa32.png', '2', 'upload/signature_667537172318c.png', '4/5', 'upload/signature_6675371d23dc4.png', '4/5', 'upload/signature_667537228204d.png', 'K', 'upload/signature_66753726bab49.png', 'K', 'upload/signature_6675372c8142d.png', '2', 'upload/signature_667537336747a.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_register_surat_transit`
--

CREATE TABLE `tb_register_surat_transit` (
  `ID_register` varchar(12) NOT NULL,
  `jenis_transit` varchar(20) NOT NULL,
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

INSERT INTO `tb_register_surat_transit` (`ID_register`, `jenis_transit`, `date`, `time`, `pengirim`, `kurir`, `kepada`, `kondisi_barang`, `security_recieved`, `ttd_office`, `person_office_recieved`, `amount`, `keterangan`) VALUES
('register001', '', '2024-06-05', '14:37:08', 'JNE', 'AGRITO', 'ARDHA', 'BAIK', 'KUAT', '', '', 1, 'SEPATU LARI'),
('register002', '', '2024-06-05', '14:51:39', 'JNT', 'MUKIDI', 'ARDHA', 'BAIK', 'KUAT', '-', '', 1, 'manatap'),
('register003', '', '2024-06-05', '15:55:16', 'JNT', 'YUNI', 'YUDHO', 'BAIK', 'KUAT', 'qewewr', 'KUAT PURWANTO', 1, 'manatap'),
('register004', '', '2024-06-06', '09:00:39', 'JNT', 'YUNI', 'ARDHA', 'BAIK', 'KUAT', '', 'NAWOLO PRASETYO', 1, 'manatap'),
('register005', '', '2024-06-06', '09:02:41', 'JNT', 'YUNI', 'ARDHA', 'BASAH', 'KUAT', '', 'HARDI PRAJOYO', 1, 'qrq'),
('register006', '', '2024-06-06', '09:16:04', 'JNT', 'MUKIDI', 'YUDHO', 'BAIK', 'KUAT', '-', '', 1, 'qrq'),
('register007', '', '2024-06-07', '08:10:25', 'JNE', 'AGUS', 'ARDHA', 'BAIK', 'KUAT', 'signature_6662626b22848.png', '', 1, 'tumbler merah'),
('register008', '', '2024-06-07', '08:42:06', 'SICEPAT', 'AGUS', 'ARDHA', 'BAIK', 'KUAT', 'signature_6662693ec24fe.png', '', 1, 'Sepatu tari'),
('register009', '', '2024-06-07', '09:01:50', 'JNE', 'HURAS', 'YUDHO', 'BAIK', 'KUAT', 'signature_66626eafa17bf.png', '', 1, 'Red mic'),
('register010', '', '2024-06-07', '09:25:41', 'JNT', 'MUKIDI', 'ARDHA', 'BAIK', 'KUAT', 'signature_6662702ba61c1.png', '', 1, 'manatap'),
('register011', '', '2024-06-07', '09:31:41', 'JNT', 'MUKIDI', 'YUDHO', 'BAIK', 'KUAT', 'signature_66627115564d2.png', 'NAWOLO PRASETYO', 1, 'manatap'),
('register012', '', '2024-06-07', '09:50:50', 'JNT', 'YUNI', 'YUDHO', 'BAIK', 'KUAT', '-', '', 1, 'tumbler merah'),
('register013', '', '2024-06-07', '16:18:55', 'DHL - 123456789', 'YUDHO', 'ARDHA', 'BAIK', 'MARYANTO', 'signature_6662d14916dbf.png', 'ADI ARDIANSYAH', 1, ''),
('register014', '', '2024-06-10', '13:51:47', 'SDFAAASD', 'ADSADSA', 'ASDASDA', 'BAIK', 'ADASD', '-', '', 1, 'adsasd'),
('register015', '', '2024-06-11', '10:20:53', 'JNE - 4567890', 'MARINO', 'ARDHA', 'BAIK', 'AASDASD', 'signature_6667fb1a1e545.png', 'ADI ARDIANSYAH', 1, ''),
('register016', '', '2024-06-13', '15:28:00', 'JNT', 'YUNI', 'ARDHA', 'BAIK', 'KUAT', 'signature_666aada03c47d.png', 'DAVID PUTRA SETIAWAN', 1, 'tumbler merah'),
('register017', '', '2024-06-14', '08:14:32', 'JNT', 'YUNI', 'ARDHA', 'BAIK', 'KUAT', 'upload/signature_666b99818d649.png', 'DIMAS SULISTYO', 1, ''),
('register018', '', '2024-06-14', '08:21:10', 'TUA', 'KIRI', 'ARDHA', 'BAIK', 'KUAT', 'upload/signature_666b9b8ad5868.png', 'ARTIN WAHYU NINGSIH', 1, ''),
('register019', '', '2024-06-21', '08:38:34', 'JNT', 'YUNI', 'ARDHA', 'BAIK', 'KUAT', 'upload/signature_6674d9ff1e6e1.png', 'ADITYA BUDI SAPUTRA', 1, ''),
('register020', '', '2024-06-21', '17:39:42', 'JNT', 'MUKIDI', 'ARDHA', 'BAIK', 'KUAT', 'upload/signature_6675587736118.png', 'ANGELIKA KUSUMA', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report_cctv`
--

CREATE TABLE `tb_report_cctv` (
  `tbrc_uid` varchar(25) NOT NULL,
  `tbrc_uid_cctv` varchar(10) NOT NULL,
  `tbrc_tgl_cek` date NOT NULL,
  `tbrc_jam_cek` time DEFAULT NULL,
  `tbrc_nama_security` varchar(60) DEFAULT NULL,
  `tbrc_status_cek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_report_cctv`
--

INSERT INTO `tb_report_cctv` (`tbrc_uid`, `tbrc_uid_cctv`, `tbrc_tgl_cek`, `tbrc_jam_cek`, `tbrc_nama_security`, `tbrc_status_cek`) VALUES
('REPCCTV/PTU1/2024/05/22', 'PTU1/001', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/003', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/001', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/002', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/004', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/005', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/006', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/22', 'PTU1/007', '2024-05-22', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/001', '2024-05-24', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/002', '2024-05-24', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/003', '2024-05-24', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/24', 'PTU1/012', '2024-05-24', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/25', 'PTU1/001', '2024-05-25', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/28', 'PTU1/001', '2024-05-28', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/29', 'PTU1/001', '2024-05-29', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/29', 'PTU1/004', '2024-05-29', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/29', 'PTU1/005', '2024-05-29', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/29', 'PTU1/003', '2024-05-29', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/29', 'PTU1/006', '2024-05-29', NULL, NULL, 'OK'),
('REPCCTV/PTU1/2024/05/29', 'PTU1/007', '2024-05-29', '14:12:53', 'coba1', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/001', '2024-05-30', '13:03:45', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/003', '2024-05-30', '13:03:48', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/004', '2024-05-30', '13:03:50', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/005', '2024-05-30', '13:03:51', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/006', '2024-05-30', '13:03:53', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/007', '2024-05-30', '13:03:54', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/008', '2024-05-30', '13:03:55', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/30', 'PTU1/009', '2024-05-30', '13:03:57', 'coba2', 'OK'),
('REPCCTV/PTU1/2024/05/31', 'PTU1/001', '2024-05-31', '16:26:49', 'April', 'OK'),
('REPCCTV/PTU1/2024/05/31', 'PTU1/003', '2024-05-31', '16:26:56', 'April', 'OK'),
('REPCCTV/PTU1/2024/05/31', 'PTU1/004', '2024-05-31', '16:27:03', 'April', 'OK'),
('REPCCTV/PTU1/2024/05/31', 'PTU1/005', '2024-05-31', '16:27:41', 'April', 'OK'),
('REPCCTV/PTU1/2024/05/31', 'PTU1/006', '2024-05-31', '16:27:44', 'April', 'OK'),
('REPCCTV/PTU1/2024/06/05', 'PTU1/002', '2024-06-05', '11:21:09', 'PTU1/0033', 'OK'),
('REPCCTV/PTU1/2024/06/21', 'PTU1/001', '2024-06-21', '17:24:02', '', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report_patroli`
--

CREATE TABLE `tb_report_patroli` (
  `tbrp_uid` varchar(30) NOT NULL,
  `tbrp_jns_report` varchar(50) DEFAULT NULL,
  `tbrp_tgl_mulai` date DEFAULT NULL,
  `tbrp_jam_mulai` time DEFAULT NULL,
  `tbrp_tgl_selesai` date DEFAULT NULL,
  `tbrp_jam_selesai` time DEFAULT NULL,
  `tbrp_nm_security` varchar(60) DEFAULT NULL,
  `tbrp_shf_security` varchar(10) DEFAULT NULL,
  `tbrp_keterangan` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_report_patroli`
--

INSERT INTO `tb_report_patroli` (`tbrp_uid`, `tbrp_jns_report`, `tbrp_tgl_mulai`, `tbrp_jam_mulai`, `tbrp_tgl_selesai`, `tbrp_jam_selesai`, `tbrp_nm_security`, `tbrp_shf_security`, `tbrp_keterangan`) VALUES
('PTU1/B001/2024-06-13', 'B001', '2024-06-13', '09:20:36', '2024-06-13', '06:14:43', '35', '1', 'PATROLI GS AMAN'),
('PTU1/B001/2024-06-14', 'B001', '2024-06-14', '04:44:47', '2024-06-14', '04:48:27', '23', 'GS', 'SITUASI AMAN'),
('PTU1/B001/2024-06-19', 'B001', '2024-06-19', '10:47:26', '2024-06-21', '02:36:46', '', '1', 'ASDADAD'),
('PTU1/B001/2024-06-21', 'B001', '2024-06-21', '02:44:46', '2024-06-21', '02:50:11', '', '2', 'SUDAH MANTAP'),
('PTU1/B003/2024-06-13', 'B003', '2024-06-13', '09:24:57', '2024-06-14', '02:25:08', '13', '2', '~MPROFMEA'),
('PTU1/B003/2024-06-14', 'B003', '2024-06-14', '04:44:47', '2024-06-14', '04:48:10', '18', '1', 'ADA SHIPMENT DI SHIRT BELUM SELESAI DAN KONDISI AMAN '),
('PTU1/B003/2024-06-19', 'B003', '2024-06-19', '10:50:44', '2024-06-21', '02:36:59', '', '1', 'ASDADA'),
('PTU1/B003/2024-06-21', 'B003', '2024-06-21', '02:37:27', '2024-06-21', '02:37:32', '', '1', 'ASDASDAS'),
('PTU1/B004/2024-06-20', 'B004', '2024-06-20', '02:54:08', '2024-06-21', '02:37:19', '', '1', 'SADADS'),
('PTU1/B004/2024-06-21', 'B004', '2024-06-21', '05:02:07', '2024-06-21', '05:02:50', '', '1', 'AFASSFA'),
('PTU1/B005/2024-06-21', 'B005', '2024-06-21', '03:50:31', '2024-06-21', '03:51:33', '', '3', 'DASDA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report_tamu`
--

CREATE TABLE `tb_report_tamu` (
  `tbrt_uid` varchar(30) DEFAULT NULL,
  `tbrt_jns_kunjungan` varchar(20) DEFAULT NULL,
  `tbrt_tgl_masuk` date DEFAULT NULL,
  `tbrt_jam_masuk` time DEFAULT NULL,
  `tbrt_tgl_keluar` date DEFAULT NULL,
  `tbrt_jam_keluar` time DEFAULT NULL,
  `tbrt_nm_tamu` varchar(60) DEFAULT NULL,
  `tbrt_alm_tamu` text DEFAULT NULL,
  `tbrt_jnj_temu` varchar(60) DEFAULT NULL,
  `tbrt_keperluan` text DEFAULT NULL,
  `tbrt_cek_metal` varchar(10) DEFAULT NULL,
  `tbrt_cek_mirror` varchar(10) DEFAULT NULL,
  `tbrt_nmr_identitas` varchar(40) DEFAULT NULL,
  `tbrt_nmr_kartu` varchar(10) DEFAULT NULL,
  `tbrt_ttd_tamu` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_report_tamu`
--

INSERT INTO `tb_report_tamu` (`tbrt_uid`, `tbrt_jns_kunjungan`, `tbrt_tgl_masuk`, `tbrt_jam_masuk`, `tbrt_tgl_keluar`, `tbrt_jam_keluar`, `tbrt_nm_tamu`, `tbrt_alm_tamu`, `tbrt_jnj_temu`, `tbrt_keperluan`, `tbrt_cek_metal`, `tbrt_cek_mirror`, `tbrt_nmr_identitas`, `tbrt_nmr_kartu`, `tbrt_ttd_tamu`) VALUES
('PTU1/B009/2024-06-14', 'B009', '2024-06-14', '10:47:20', '2024-06-19', '12:39:07', 'SUSANTI', 'SALATIGA', 'HRD', 'WAWANCARA KERJA', 'NO', 'NO', '123456789', 'PTU1/011', NULL),
('PTU1/B009/2024-06-14', 'B009', '2024-06-14', '11:27:20', '2024-06-14', '01:31:59', 'ANGGRIANI', 'SEMARANG', 'HRD', 'INTERVIEW KERJA PT.2', 'NO', 'NO', '987654321', 'PTU1/007', NULL),
('PTU1/B008/2024-06-14', 'B008', '2024-06-14', '02:00:25', NULL, NULL, 'TRIAS', 'JAKARTA', 'EXPORT', 'MEETING PENGIRIMAN BARANG', 'YES', 'YES', '12341234', 'PTU1/007', NULL),
('PTU1/B010/2024-06-14', 'B010', '2024-06-14', '05:09:20', '2024-06-14', '05:17:04', 'RIZKI', 'UNGARAN', 'MAHMUDI', 'SIDAK', 'YES', 'YES', '32134590087', 'PTU1/008', NULL),
('PTU1/B008/2024-06-14', 'B008', '2024-06-14', '05:10:02', '2024-06-14', '05:11:54', 'NATHAN TJOE', 'SEMARANG', 'APRILYA', 'VISIT', 'YES', 'YES', '123456789', 'PTU1/009', NULL),
('PTU1/B008/2024-06-14', 'B008', '2024-06-14', '05:11:20', NULL, NULL, 'YUDO', 'SEMARANG', 'IT', 'MEETING', 'YES', 'YES', '123456789', 'PTU1/013', NULL),
('PTU1/B011/2024-06-14', 'B011', '2024-06-14', '05:23:15', NULL, NULL, 'RIZKI', '', '', 'INSPECT', 'YES', 'NO', '', '0', NULL),
('PTU1/B011/2024-06-14', 'B011', '2024-06-14', '05:27:03', '2024-06-14', '05:27:19', '', '', '', 'INSPECT', 'YES', 'NO', '', 'PTU1/006', NULL),
('PTU1/B011/2024-06-18', 'B011', '2024-06-18', '01:42:36', '2024-06-18', '01:42:57', 'AHAY', 'TUHUY', 'KAMIS', 'DFGH', 'YES', 'YES', '12345678', 'PTU1/008', NULL),
('PTU1/B009/2024-06-19', 'B009', '2024-06-19', '12:32:08', '2024-06-21', '10:08:09', 'RIZKI', 'UNGARAN', 'MAHMUDI', 'DAFTAR KERJA', 'YES', 'YES', '32134590087', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21', 'B009', '2024-06-21', '10:22:13', '2024-06-21', '11:05:18', 'ARDHA', 'TUHUY', 'KAMIS', 'NGELAMAR', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21', 'B009', '2024-06-21', '10:35:36', '2024-06-21', '11:05:18', 'ARDHA', 'TUHUY', 'KAMIS', 'SFAD', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21/', 'B009', '2024-06-21', '10:43:17', '0000-00-00', '00:00:00', 'AHAY', 'TUHUY', 'KAMIS', 'WQWERQW', 'YES', 'YES', '12345678', 'PTU1/008', NULL),
('PTU1/B009/2024-06-21/6674F768D', 'B009', '2024-06-21', '10:45:44', '0000-00-00', '00:00:00', 'ARDHA', 'TUHUY', 'KAMIS', 'WQERQ', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21/6674F83D8', 'B009', '2024-06-21', '10:49:17', '2024-06-21', '04:48:59', 'AHAY', 'TUHUY', 'KAMIS', 'ADAS', 'YES', 'YES', '12345678', 'PTU1/009', NULL),
('PTU1/B009/2024-06-21', 'B009', '2024-06-21', '10:59:07', '2024-06-21', '11:05:18', 'ARDHA', 'TUHUY', 'KAMIS', 'DASDAS', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21', 'B009', '2024-06-21', '11:01:27', '2024-06-21', '11:05:18', 'AHAY', 'TUHUY', 'KAMIS', 'ADASD', 'YES', 'YES', '12345678', 'PTU1/008', NULL),
('PTU1/B009/2024-06-21', 'B009', '2024-06-21', '11:03:26', '2024-06-21', '11:05:18', 'AHAY', 'TUHUY', 'KAMIS', 'WADA', 'YES', 'YES', '12345678', 'PTU1/007', NULL),
('PTU1/B009/2024-06-21/6674FC193', 'B009', '2024-06-21', '11:05:45', '2024-06-21', '11:06:05', 'ARDHA', 'TUHUY', 'KAMIS', 'ADADAS', 'YES', 'YES', '12345678', 'PTU1/009', NULL),
('PTU1/B009/2024-06-21/6674FDE1E', 'B009', '2024-06-21', '11:13:21', '2024-06-21', '11:14:21', 'AHAY', 'TUHUY', 'KAMIS', 'WDQWD', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21/6674FEFF7', 'B009', '2024-06-21', '11:18:07', '2024-06-21', '11:18:19', 'ARDHA', 'TUHUY', 'KAMIS', 'ADAA', 'YES', 'YES', '12345678', 'PTU1/007', NULL),
('PTU1/B007/2024-06-21/66753FA1C', 'B007', '2024-06-21', '03:53:53', '2024-06-21', '04:08:56', 'ARDHA', 'TUHUY', 'KAMIS', 'QWRQW', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21/6675474ED', 'B009', '2024-06-21', '04:26:38', '2024-06-21', '04:49:58', 'YUI', 'YUI', 'KAMIS', 'ADAFAS', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-21/66754D1F4', 'B009', '2024-06-21', '04:51:27', '2024-06-22', '06:06:24', 'YUI', 'YUI', 'KAMIS', 'SASAFA', 'YES', 'YES', '12345678', 'PTU1/006', NULL),
('PTU1/B009/2024-06-22/667607FDA', 'B009', '2024-06-22', '06:08:45', '2024-06-22', '06:09:09', 'ASDA', 'ADSSA', 'ADASADSA', 'ASDAS', 'YES', 'YES', '1', 'PTU1/006', 'upload/signature_667607fd9fe7b.png'),
('PTU1/B007/2024-06-22/6676083C5', 'B007', '2024-06-22', '06:09:48', '2024-06-22', '06:12:20', 'ASDAS', 'ASDSA', 'QEQQWE', 'QWEQW', 'YES', 'YES', '1', 'PTU1/006', 'upload/signature_6676083c50a63.png'),
('PTU1/B008/2024-06-22/66760851C', 'B008', '2024-06-22', '06:10:09', '2024-06-22', '06:13:29', 'TYUIO', 'UIO', 'BNM,', 'VBNM,', 'YES', 'YES', '1', 'PTU1/007', 'upload/signature_66760851c07dd.png'),
('PTU1/B011/2024-06-22/667608658', 'B011', '2024-06-22', '06:10:29', '2024-06-22', '06:16:10', 'CVBNM,', 'CCV BNM', 'VBN', 'VBNM', 'YES', 'YES', '', '0', 'upload/signature_66760865870f1.png'),
('PTU1/B012/2024-06-22/667608790', 'B012', '2024-06-22', '06:10:49', '2024-06-22', '06:16:37', 'CVBNM', 'GHJK', 'BNM', 'VBNM', 'YES', 'YES', '6', 'PTU1/008', 'upload/signature_667608790d88a.png'),
('PTU1/B010/2024-06-22/667608920', 'B010', '2024-06-22', '06:11:14', '2024-06-22', '06:17:26', 'GHJK', 'HJK', 'HJKL', 'GHNM,', 'YES', 'YES', '8', 'PTU1/009', 'upload/signature_667608920ba66.png'),
('PTU1/B006/2024-06-22/667608ABA', 'B006', '2024-06-22', '06:11:39', '2024-06-22', '06:17:43', 'CVBNM', 'VBNM', 'VBNM', 'VBNM', 'YES', 'YES', '9', 'PTU1/010', 'upload/signature_667608abad58a.png');

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
(NULL, '2024-05-17', '00:00:13', NULL, 'Fira', 'Bringin', 'Yudo', 'Intervie user', 'NO', 'NO', '12345678', '2', 'upload/Fira_6646fdfde1209.png'),
(NULL, '2024-05-17', '00:00:13', NULL, 'Yudo', 'Bawen', 'Fira', 'Interview', 'NO', 'NO', '12345678', '1', 'upload/Yudo_6646f5c90fb89.png'),
(NULL, '2024-05-17', '00:00:13', NULL, 'Fira', 'Bringin', 'Yudo', 'Intervie user', 'NO', 'NO', '12345678', '2', 'upload/Fira_6646fdfde1209.png'),
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
('003', 'PTU3', 'PT. UNGARAN SARI GARMENTS 3', 'ACTIVE'),
('001', 'PTU1', 'PT. UNGARAN SARI GARMENTS 1', 'ACTIVE'),
('002', 'PTU2', 'PT. UNGARAN SARI GARMENTS 2', 'ACTIVE'),
('003', 'PTU3', 'PT. UNGARAN SARI GARMENTS 3', 'ACTIVE'),
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
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`tbrk_uid`);

--
-- Indexes for table `tb_kendaraan_umum`
--
ALTER TABLE `tb_kendaraan_umum`
  ADD PRIMARY KEY (`tbu_uid`);

--
-- Indexes for table `tb_list_bc`
--
ALTER TABLE `tb_list_bc`
  ADD PRIMARY KEY (`tblb_uid`);

--
-- Indexes for table `tb_list_buku`
--
ALTER TABLE `tb_list_buku`
  ADD PRIMARY KEY (`tblu_uid`),
  ADD UNIQUE KEY `tblu_kd_buku` (`tblu_kd_buku`);

--
-- Indexes for table `tb_list_card`
--
ALTER TABLE `tb_list_card`
  ADD PRIMARY KEY (`tblic_uid`);

--
-- Indexes for table `tb_list_kendaraan`
--
ALTER TABLE `tb_list_kendaraan`
  ADD PRIMARY KEY (`tblk_uid`);

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

--
-- Indexes for table `tb_report_patroli`
--
ALTER TABLE `tb_report_patroli`
  ADD PRIMARY KEY (`tbrp_uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
