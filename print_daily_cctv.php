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
// Extract the day, month, and year
$dateTime = new DateTime($date);
$day = $dateTime->format('d');
$month = $dateTime->format('F'); // Full month name
$year = $dateTime->format('Y');
$periode = $month . ' ' . $year;

// BUAT PDF BARU
$pdf = new FPDF('L','cm','A4');

//SET MARGIN LEFT, TOP AND RIGHT
$pdf->SetMargins(1, 1, 1);

// SET/TAMBAH PAGE
$pdf->AddPage();

// SET FONT STYLE
$pdf->SetFont('Times', 'B', 11);

// AWAL REPORT HEADER
function setHeader($pdf, $month, $year) {
    $pdf->SetFont('Times', 'B', 11);
    $pdf->Cell(28, 1, 'PT.UNGARAN SARI GARMENTS', 0, 1, 'L');
    $pdf->Cell(28, 0.8, 'SECURITY UNGARAN', 0, 1, 'L');
    $pdf->Ln();
    $pdf->Cell(28, 1, 'CEK LIST CCTV', 0, 1, 'C');
    $pdf->Cell(28, 1, "PERIODE : " . $month . ' ' . $year, 0, 1, 'C');
    $pdf->Ln();
    // SET NEW FONT STYLE
    $pdf->SetFont('Times', '', 13);
    
    // AKHIR REPORT HEADER
    $pdf->Cell(1,0.8,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
    $pdf->Cell(12,0.8,'LOKASI/POS JAGA','TBR',0,'C'); //vertically merged cell
    $pdf->Cell(5,0.8,'JUMLAH','TB',0,'C'); //vertically merged cell
    $pdf->Cell(9,0.8,'status','LTR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
    $pdf->Cell(10,0,'',0,1,'C'); //normal height, but occupy 6 columns (horizontally merged)
    $pdf->Cell(9,0.8,'',0,1,'C');
}


// second line(row)
// $pdf->Cell(8,1,'',0,0); //dummy cell to align next cell, should be invisible
// $pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
// $pdf->Cell(9,1,'',0,0,'C');


$pdf->Cell(9,0.8,'',0,1,'C');

// Initialize the first header
setHeader($pdf, $month, $year);

// DATA
$no = 1;
$query = "SELECT tbrc_uid, tbrc_uid_cctv, tbrc_tgl_cek, tbrc_status_cek, tblc_nama_cctv
    FROM tb_report_cctv
    JOIN tb_list_cctv ON tb_report_cctv.tbrc_uid_cctv = tb_list_cctv.tblc_uid
    WHERE tbrc_tgl_cek = '$date'";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    if ($no > 1 && ($no - 1) % 6 == 0) {
        $pdf->AddPage();
        setHeader($pdf, $month, $year);
    }
    $pdf->Cell(1, 1, $no++, 1, 0, 'C');
    $pdf->Cell(12, 1, $row['tblc_nama_cctv'], 'TBR', 0, 'L');
    $pdf->Cell(5, 1, ' 1 UNIT', 'TB', 0, 'C');
    $pdf->Cell(9, 1, $row['tbrc_status_cek'], 1, 1, 'C');
}







// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$checker_query = "SELECT danru_export, ttd_danru FROM tb_export
    WHERE jenis_bagian_export = 'CCTV'
    AND jabatan_ttd = 'SECURITY'
    AND DATE(dibuat_pada) = '$date'";
$checker_result = mysqli_query($koneksi, $checker_query);
$checker = mysqli_fetch_assoc($checker_result);
$nama_checker = $checker['danru_export'];
$ttd_checker = $checker['ttd_danru'];

$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(15, 0.5, $day . '-' . $month . '-' . $year, 0, 1, 'L');
$pdf->Cell(15, 1, '', 0, 0, 'L');

$pdf->SetFont('Times', 'U', 13);
$pdf->SetX(1); // Adjust this value to move the image further to the right
$x = $pdf->GetX();
$y = $pdf->GetY();
$imageWidth = 5; // Width of the image in cm
$imageHeight = 2.5; // Height of the image in cm
$imagePath = $ttd_checker; // Path to the image file
if (file_exists($imagePath)) {
    $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
    // Move the cursor to the right after placing the image
    $pdf->SetX($x + $imageWidth);
} else {
    $pdf->Cell(0.1, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
}
$pdf->Ln();
$pdf->Cell(0.1, 4, $nama_checker, 0, 0, 'L');

$pdf->Ln();

$pdf->Output();
?>