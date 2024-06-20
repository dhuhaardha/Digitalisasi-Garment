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
$pdf = new FPDF('L','cm',array(65, 40));

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
$pdf->Cell(1,2,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(5,2,'TANGGAL','TB',0,'C'); //vertically merged cell
$pdf->Cell(8,1,'JAM','LT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(9,2,'NAMA','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'ALAMAT/INSTANSI','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'BERTEMU','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'KEPERLUAN','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'METAL DETECTOR','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'UNDER MIRROR','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO KTP','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO ID','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'PARAF','1',0,'C'); //vertically merged cell
$pdf->Cell(10,1,'',0,1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(1,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(4,1,'MASUK','LTB',0,'C');
$pdf->Cell(4,1,'KELUAR','LTB',0,'C');
$pdf->Cell(9,1,'',0,1,'C');


// DATA
$pdf->Cell(1,1,'',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(5,1,'','TB',0,'C'); //vertically merged cell
$pdf->Cell(4,1,'','LTB',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(4,1,'','LTB',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(9,1,'','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'',1,0,'C'); //vertically merged cell
$pdf->Cell(5,1,'',1,0,'C'); //vertically merged cell
$pdf->Cell(5,1,'','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'','1',0,'C'); //vertically merged cell





// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(15, 0.5, 'DITERIMA,', 0, 0, 'L');
$pdf->Cell(16, 0.5, 'DISERAHKAN,', 0, 0, 'L');
$pdf->Cell(15, 0.5, 'PETUGAS,', 0, 0, 'L');
$pdf->Cell(4, 0.5, 'MENGETAHUI, ', 0, 1, 'L');
$pdf->Cell(15, 1, 'SHIFT, ', 0, 0, 'L');
$pdf->Cell(24, 1, 'SHIFT, ', 0, 0, 'L');
$pdf->Cell(14, 1, 'KOMANDAN REGU, ', 0, 0, 'L');
$pdf->Cell(6, 1, 'HR & GA, ', 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, '..........................', 0, 0, 'L');
$pdf->Cell(19, 4, '........................................', 0, 0, 'R');
$pdf->Cell(16, 4, '..........................................', 0, 0, 'R');
$pdf->Cell(10, 4, '............................................................', 0, 0, 'R');
$pdf->Cell(13, 4, '............................................................', 0, 0, 'R');
$pdf->Ln();

$pdf->Output();
?>