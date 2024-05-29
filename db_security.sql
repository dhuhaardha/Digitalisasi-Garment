-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 03:19 AM
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
(NULL, '2022021021', 'APRIL', 'ACCOUNTING', 'ACTIVE');

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
('PTU1/001', 'PTU1', 'POS INDUK', 'ACTIVE', '2024-05-28'),
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
('REPCCTV/PTU1/2024/05/28', 'PTU1/001', '2024-05-28', 'OK');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
