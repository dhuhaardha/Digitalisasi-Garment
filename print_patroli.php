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

// $date = $_POST['input_print_pdf'];
$shift1 = '1';
$shift2 = '2';
$shift3 = '3';

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
$pdf->Cell(2,1,'1',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(6,1,'tUESDAY, 24-04-1024','TB',0,'C'); //vertically merged cell
$pdf->Cell(6,1,'JAM','BLT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(6,1,'JAM','BLT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(12,1,'PETUGAS','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'SHIFT','1',0,'C'); //vertically merged cell
$pdf->Cell(20,1,'URAIAN SINGKAT KETERANGAN','1',0,'C'); //vertically merged cell





// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(0.1, 0.5, 'PETUGAS / PELAPOR, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'MENGETAHUI, ', 0, 1, 'C');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, '..........................', 0, 0, 'L');
$pdf->Cell(24, 4, '........................................', 0, 0, 'R');
$pdf->Cell(5, 4, '.....................................', 0, 0, 'R');
$pdf->Cell(5, 4, '.....................', 0, 0, 'R');
$pdf->Ln();


$pdf->Cell(0.1, -3, '', 0, 0, 'L');
$pdf->Cell(24, -3, 'PENANGGUNG JAWAB', 0, 0, 'R');
$pdf->Cell(5, -3, 'KOMANDAN REGU', 0, 0, 'R');
$pdf->Cell(5, -3, 'HR & GA', 0, 0, 'R');


$pdf->Output();
?>