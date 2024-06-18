<?php

require('fpdf/fpdf.php');
date_default_timezone_set('Asia/Jakarta');

$server     = "localhost";
$user       = "root";
$pass       = "";
$database   = "db_security";

// Cek Koneksi
$koneksi    = mysqli_connect($server, $user , $pass , $database );
if(!$koneksi){ // cek koneksi
    die("Tidak terkoneksi ke database");
}

$date = $_POST['input_print_pdf'];
$shift = $_POST['shift'];

// BUAT PDF BARU
$pdf = new FPDF('L','cm','A4');

// SET MARGIN LEFT, TOP, DAN RIGHT
$pdf->SetMargins(0.5, 0.5, 0.5);

// SET NEW PAGE
$pdf->AddPage();

// SET FONT STYLE
$pdf->SetFont('Times', 'B', 10);

// AWAL REPORT HEADER
$pdf->Cell(29, 0.4, "BUKU KONTROL PAGAR", 0, 1, 'C');

$pdf->Cell(10, 1, 'PT UNGARAN SARI GARMENTS', 0, 0, 'L');
$pdf->Cell(18, 1, "HARI/TANGGAL : " . $date, 0, 1, 'R');
$pdf->Cell(10, 0.5, 'SECURITY - UNGARAN', 0, 0, 'L');

// VARIABEL UNTUK MENDAPATKAN DATA MINIMAL DARI TIMESTAMP
$sqlMin = "SELECT MIN(TIME(time_kontrol_created)) AS min_timestamp FROM tb_kontrol_pagar WHERE DATE(dibuat_pada) = '$date'";
$resultMin = $koneksi->query($sqlMin);
$rowMin = $resultMin->fetch_assoc();
$minTimestamp = $rowMin['min_timestamp'];

// VARIABEL UNTUK MENDAPATKAN DATA MAXIMAL DARI TIMESTAMP
$sqlMax = "SELECT MAX(TIME(time_kontrol_finished)) AS max_timestamp FROM tb_kontrol_pagar WHERE DATE(dibuat_pada) = '$date'";
$resultMax = $koneksi->query($sqlMax);
$rowMax = $resultMax->fetch_assoc();
$maxTimestamp = $rowMax['max_timestamp'];

// AWAL HEADER
$pdf->Cell(18, 0.5, "JAM     : " . $minTimestamp . ' S/D ' . $maxTimestamp, 0, 1, 'R');
$pdf->Cell(26.7, 0.9, "SHIFT                     :   " . $shift, 0, 1, 'R');

$pdf->Ln();

// SET FONT STYLE UNTUK TABLE
$pdf->SetFont('Times', '', 7);

// TABLE HEADER
$pdf->Cell(9, 14, $pdf->Image('Lokasi Jam Amano Update_page-0001.jpg', $pdf->GetX(), $pdf->GetY(), 9, 17), 1, 0, 'L', false);
$pdf->Cell(19.5,0.5,'URAIAN','TBR',1,'C'); //vertically merged cell




// DATA
$no = 1;
$sql = "SELECT * FROM `tb_kontrol_pagar` WHERE  
        DATE(dibuat_pada) = '$date' AND shift = '$shift'
        ORDER BY id_opr_kontrol_pagar ASC";
$result = $koneksi->query($sql);
$uraianData = '';

while ($row = $result->fetch_assoc()) {
    // Concatenate uraian values
    $uraianData .= $row['uraian'] . "\n";
}
$pdf->Cell(9,0,'','',0,'C'); //vertically merged cell
$pdf->Cell(19.5,13.5, $uraianData,'BR',0,'L'); //vertically merged cell
$pdf->Ln();

// FOOTER

// ADD NEW PAGE
$pdf->AddPage();

//SET FONT STYLE
$pdf->SetFont('Times', 'B', 10);

$pdf->Cell(29, 3, 'DEMIKIAN TUGAS KONTROL PAGAR DAN INFRASTRUKTUR PERUSAHAAN TELAH DILAKSANAKAN', 0, 1, 'C');

// BAGIAN TANDA TANGAN
$pdf->Cell(29, 0.5, 'MENGETAHUI, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'PELAPOR, ', 0, 1, 'R');
$pdf->Cell(29, 0.5, 'HR / GA, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'SHIFT , '. $shift, 0, 0, 'R');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 10);
$pdf->Cell(29, 4, 'RUDY HARYOKO', 0, 0, 'L');
$pdf->Cell(0, 4, '............', 0, 0, 'R');



$pdf->Output();
?>