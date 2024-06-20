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
$pdf->Cell(59, 1, 'PT.UNGARAN SARI GARMENTS', 0, 1, 'L');
$pdf->Cell(59, 1, 'SECURITY UNGARAN', 0, 1, 'L');
$pdf->Ln();
$pdf->Cell(59, 1, 'CEK LIST CCTV', 0, 1, 'C');
$pdf->Cell(59, 1, "PERIODE : ", 0, 1, 'C');

$pdf->Ln();

// SET NEW FONT STYLE
$pdf->SetFont('Times', '', 13);

// AKHIR REPORT HEADER
$pdf->Cell(1,2,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(7,2,'LOKASI/POS JAGA','TBR',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'JUMLAH','TB',0,'C'); //vertically merged cell
$pdf->Cell(49,1,'TANGGAL','LTR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(10,1,'',0,1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(8,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(1.58,1,'1','LTB',0,'C');
$pdf->Cell(1.58,1,'2','LTB',0,'C');
$pdf->Cell(1.58,1,'3','LTB',0,'C');
$pdf->Cell(1.58,1,'4','LTB',0,'C');
$pdf->Cell(1.58,1,'5','LTB',0,'C');
$pdf->Cell(1.58,1,'6','LTB',0,'C');
$pdf->Cell(1.58,1,'7','LTB',0,'C');
$pdf->Cell(1.58,1,'8','LTB',0,'C');
$pdf->Cell(1.58,1,'9','LTB',0,'C');
$pdf->Cell(1.58,1,'10','LTB',0,'C');
$pdf->Cell(1.58,1,'11','LTB',0,'C');
$pdf->Cell(1.58,1,'12','LTB',0,'C');
$pdf->Cell(1.58,1,'13','LTB',0,'C');
$pdf->Cell(1.58,1,'14','LTB',0,'C');
$pdf->Cell(1.58,1,'15','LTB',0,'C');
$pdf->Cell(1.58,1,'16','LTB',0,'C');
$pdf->Cell(1.58,1,'17','LTB',0,'C');
$pdf->Cell(1.58,1,'18','LTB',0,'C');
$pdf->Cell(1.58,1,'19','LTB',0,'C');
$pdf->Cell(1.58,1,'20','LTB',0,'C');
$pdf->Cell(1.58,1,'21','LTB',0,'C');
$pdf->Cell(1.58,1,'22','LTB',0,'C');
$pdf->Cell(1.58,1,'23','LTB',0,'C');
$pdf->Cell(1.58,1,'24','LTB',0,'C');
$pdf->Cell(1.58,1,'25','LTB',0,'C');
$pdf->Cell(1.58,1,'26','LTB',0,'C');
$pdf->Cell(1.58,1,'27','LTB',0,'C');
$pdf->Cell(1.58,1,'28','LTB',0,'C');
$pdf->Cell(1.58,1,'29','LTB',0,'C');
$pdf->Cell(1.58,1,'30','LTB',0,'C');
$pdf->Cell(1.58,1,'31','1',0,'C');

$pdf->Cell(9,1,'',0,1,'C');


// DATA
$pdf->Cell(1,1,'1',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(7,1,'LOKASI/POS JAGA','TBR',0,'L'); //vertically merged cell
$pdf->Cell(5,1,'JUMLAH','TB',0,'C'); //vertically merged cell
$pdf->Cell(1.58,1,'1','LTB',0,'C');
$pdf->Cell(1.58,1,'2','LTB',0,'C');
$pdf->Cell(1.58,1,'3','LTB',0,'C');
$pdf->Cell(1.58,1,'4','LTB',0,'C');
$pdf->Cell(1.58,1,'5','LTB',0,'C');
$pdf->Cell(1.58,1,'6','LTB',0,'C');
$pdf->Cell(1.58,1,'7','LTB',0,'C');
$pdf->Cell(1.58,1,'8','LTB',0,'C');
$pdf->Cell(1.58,1,'9','LTB',0,'C');
$pdf->Cell(1.58,1,'10','LTB',0,'C');
$pdf->Cell(1.58,1,'11','LTB',0,'C');
$pdf->Cell(1.58,1,'12','LTB',0,'C');
$pdf->Cell(1.58,1,'13','LTB',0,'C');
$pdf->Cell(1.58,1,'14','LTB',0,'C');
$pdf->Cell(1.58,1,'15','LTB',0,'C');
$pdf->Cell(1.58,1,'16','LTB',0,'C');
$pdf->Cell(1.58,1,'17','LTB',0,'C');
$pdf->Cell(1.58,1,'18','LTB',0,'C');
$pdf->Cell(1.58,1,'19','LTB',0,'C');
$pdf->Cell(1.58,1,'20','LTB',0,'C');
$pdf->Cell(1.58,1,'21','LTB',0,'C');
$pdf->Cell(1.58,1,'22','LTB',0,'C');
$pdf->Cell(1.58,1,'23','LTB',0,'C');
$pdf->Cell(1.58,1,'24','LTB',0,'C');
$pdf->Cell(1.58,1,'25','LTB',0,'C');
$pdf->Cell(1.58,1,'26','LTB',0,'C');
$pdf->Cell(1.58,1,'27','LTB',0,'C');
$pdf->Cell(1.58,1,'28','LTB',0,'C');
$pdf->Cell(1.58,1,'29','LTB',0,'C');
$pdf->Cell(1.58,1,'30','LTB',0,'C');
$pdf->Cell(1.58,1,'31','1',0,'C');





// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(15, 0.5, 'HARI PENGECEKAN,', 0, 1, 'L');
$pdf->Cell(15, 1, 'CHECKER, ', 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, '..........................', 0, 0, 'L');

$pdf->Ln();

$pdf->Output();
?>