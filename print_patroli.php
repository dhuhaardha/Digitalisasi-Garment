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
$kode_kunjungan = $_POST['input_jns_kunjungan'];
$HR = $_POST['input_hr'];

// Query to get shift_diterima and shift_diserahkan
$shift_petugas = '';
$nama_petugas = '';
$ttd_petugas = '';
$nama_danru = '';
$ttd_danru = '';

$query_shift = "SELECT `jenis_bagian_export`, `jabatan_ttd`, `shift`, `date`, `danru_export`, `ttd_danru` FROM `tb_export` WHERE `date` LIKE '$date' AND `jenis_bagian_export` LIKE '$kode_kunjungan'";
$result_shift = mysqli_query($koneksi, $query_shift);

while ($row_shift = mysqli_fetch_assoc($result_shift)) {
    if ($row_shift['jabatan_ttd'] == 'PETUGAS') {
        $shift_petugas = $row_shift['shift'];
        $nama_petugas = $row_shift['danru_export'];
        $ttd_petugas = $row_shift['ttd_danru'];
    } elseif ($row_shift['jabatan_ttd'] == 'DANRU') {
        $nama_danru = $row_shift['danru_export'];
        $ttd_danru = $row_shift['ttd_danru'];
    }
}



// BUAT PDF BARU
$pdf = new FPDF('L','cm',array(59, 35));

//SET MARGIN LEFT, TOP AND RIGHT
$pdf->SetMargins(1, 1, 1);

// SET/TAMBAH PAGE
$pdf->AddPage();

// SET FONT STYLE
$pdf->SetFont('Times', 'B', 16);

// AWAL REPORT HEADER
// $pdf->Cell(59, 1, 'OPERASIONAL KUNCI RUANGAN', 0, 1, 'C');
// $pdf->Cell(59, 1, "Tanggal cetak : " . $date, 0, 1, 'C');

// SET NEW FONT STYLE
$pdf->SetFont('Times', '', 13);

// AKHIR REPORT HEADER

$pdf->Cell(2,2,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(6,2,'HARI/TANGGAL','TB',0,'C'); //vertically merged cell
$pdf->Cell(12,1,'JAM','LT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(12,2,'PETUGAS','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'SHIFT','1',0,'C'); //vertically merged cell
$pdf->Cell(20,2,'URAIAN SINGKAT KETERANGAN','1',0,'C'); //vertically merged cell
$pdf->Cell(10,1,'',0,1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(3,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(6,1,'START','LT',0,'C');
$pdf->Cell(6,1,'FINISH','LT',0,'C');
$pdf->Cell(9,1,'',0,1,'C');


// DATA
$no = 1;
$query = "SELECT * FROM tb_report_patroli LEFT JOIN tb_list_security ON 
         tb_report_patroli.tbrp_nm_security = tb_list_security.tbls_nik 
         WHERE tbrp_jns_report LIKE '$kode_kunjungan' AND `tbrp_tgl_mulai` LIKE '$date'";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
$pdf->Cell(2,1,$no++,1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(6,1,'' . $row['tbrp_tgl_mulai'] . '','TB',0,'C'); //vertically merged cell
$pdf->Cell(6,1,'' . $row['tbrp_jam_mulai'] . '','BLT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(6,1,'' . $row['tbrp_jam_selesai'] . '','BLT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(12,1,'' . $row['tbls_nama'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $row['tbrp_shf_security'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(20,1,'' . $row['tbrp_keterangan'] . '','1',1,'C'); //vertically merged cell
}




// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(0.1, 0.5, 'PETUGAS / PELAPOR, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'MENGETAHUI, ', 0, 1, 'C');
$pdf->Ln();

$pdf->SetX(0.5); // Adjust this value to move the image further to the right
$x = $pdf->GetX();
$y = $pdf->GetY();
$imageWidth = 7; // Width of the image in cm
$imageHeight = 5; // Height of the image in cm

// Check if the image file exists
$imagePath = $ttd_petugas; // Path to the image file
if (file_exists($imagePath)) {
    $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
    // Move the cursor to the right after placing the image
    $pdf->SetX($x + $imageWidth);
} else {
    $pdf->Cell(19, 4, 'image not found', 0, 0, 'R');
}
// $pdf->Cell(19, 4, '', 0, 0, 'R');
$pdf->Cell(14, 4, '', 0, 0, 'R');
// Set the X and Y positions for the image
$pdf->SetX(24); // Adjust this value to move the image further to the right
$x = $pdf->GetX();
$y = $pdf->GetY();
$imageWidth = 5; // Width of the image in cm
$imageHeight = 5; // Height of the image in cm

// Check if the image file exists
$imagePath = $ttd_danru; // Path to the image file
if (file_exists($imagePath)) {
    $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
    // Move the cursor to the right after placing the image
    $pdf->SetX($x + $imageWidth);
} 
// $pdf->Cell(10, 4, $ttd_danru, 0, 0, 'R');
$pdf->Cell(13, 4, '', 0, 0, 'R');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, $nama_petugas, 0, 0, 'L');
$pdf->Cell(23, 4, '', 0, 0, 'R');
$pdf->Cell(5, 4, $nama_danru, 0, 0, 'R');
$pdf->Cell(5, 4, $HR, 0, 0, 'R');
$pdf->Ln();


// $pdf->Image($filePath, 10, 10, 50, 50, 'PNG');
// $pdf->Cell(24, -3, $komandan_regu, 0, 0, 'R');
// $pdf->Cell(5, -3, $komandan_regu, 0, 0, 'R');
// $pdf->Cell(5, -3, $HR, 0, 0, 'R');


$pdf->Output();
?>