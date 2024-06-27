<?php
require('fpdf/fpdf.php'); // Include FPDF library
date_default_timezone_set('Asia/Jakarta'); // Set timezone

$server     = "localhost";
$user       = "root";
$pass       = "";
$database   = "db_security";

// Check Database Connection
$koneksi    = mysqli_connect($server, $user , $pass , $database );
if(!$koneksi){ // Check connection
    die("Tidak terkoneksi ke database");
}

$month = 6; // Example: June
$year = 2024; // Example: 2024

// Calculate number of days in the month
$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

$pdf = new FPDF('L','cm','A4');
$pdf->SetMargins(1, 1, 1); // Set margins

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

for ($day = 1; $day <= $num_days; $day++) {
    // Format the date in YYYY-MM-DD format
    $date = sprintf('%04d-%02d-%02d', $year, $month, $day);

    // Create a new page for each day
    $pdf->AddPage();
    

    // Call setHeader function to set the header
    setHeader($pdf, date('F', mktime(0, 0, 0, $month, 1, $year)), $year);

    // Fetch data from database for the specific date
    $query = "SELECT tbrc_uid, tbrc_uid_cctv, tbrc_tgl_cek, tbrc_status_cek, tblc_nama_cctv,
                     danru_export AS nama_checker, ttd_danru AS ttd_checker
              FROM tb_report_cctv
              JOIN tb_list_cctv ON tb_report_cctv.tbrc_uid_cctv = tb_list_cctv.tblc_uid
              JOIN tb_export ON tb_report_cctv.tbrc_tgl_cek = tb_export.dibuat_pada
              WHERE tbrc_tgl_cek = '$date'
              AND jenis_bagian_export = 'CCTV'
              AND jabatan_ttd = 'SECURITY'";
    $result = mysqli_query($koneksi, $query);

    // Loop through fetched data and add to the PDF
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($no > 1 && ($no - 1) % 6 == 0) {
            $pdf->AddPage();
            setHeader($pdf, $month, $year);
        }
        $pdf->Cell(1, 1, $no++, 1, 0, 'C');
        $pdf->Cell(12, 1, $row['tblc_nama_cctv'], 'TBR', 0, 'L');
        $pdf->Cell(5, 1, ' 1 UNIT', 'TB', 0, 'C');
        $pdf->Cell(9, 1, $row['tbrc_status_cek'], 1, 1, 'C');

        // Example code to display checker's name and signature image
        $pdf->Cell(9, 1, $row['nama_checker'], 1, 0, 'C'); // Checker's name
        $pdf->Cell(1, 1, '', 0, 1); // Dummy cell for alignment (if needed)

        $pdf->Cell(9, 1, '', 1, 0, 'C'); // Empty cell or signature image placeholder
        $pdf->Cell(1, 1, '', 0, 1); // Dummy cell for alignment (if needed)
    }
}


$pdf->Output();
?>

