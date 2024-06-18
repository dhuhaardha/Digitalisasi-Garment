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

$hariiini = date('l', strtotime($date));

$shift1 = '1';
$shift2 = '2';
$shift3 = '3';

$pdf = new FPDF('L','cm',array(59, 35));
$pdf->SetMargins(1, 1, 1);

$pdf->AddPage();

$pdf->SetFont('Times', 'B', 16);

// AWAL REPORT HEADER

$pdf->Cell(59, 1, 'LOG BOOK OPERASIONALKUNCI KENDARAAN PERUSAHAAN', 0, 1, 'C');
$pdf->Cell(59, 1, "HARI/TANGGAL : " . $hariiini . ", ". $date, 0, 1, 'C');
// $pdf->Cell(87, 10, '', 0, 1, 'C');
$pdf->SetFont('Times', '', 13);
// $pdf->Cell(58, 0.8, "Tanggal cetak : " . $date, 0, 0, 'L');
// AKHIR REPORT HEADER

$pdf->Cell(2,2,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(5,2,'NO POL','TB',0,'C'); //vertically merged cell
$pdf->Cell(25,1,'DIAMBIL','LTR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(25,1,'DIKEMBALIKAN','TR',1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(2,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(3,1,'TGL','LT',0,'C');
$pdf->Cell(3,1,'JAM','LT',0,'C');
$pdf->Cell(4.5,1,'NAMA','LTR',0,'C');
$pdf->Cell(3,1,'TTD','TR',0,'C');
$pdf->Cell(4.5,1,'DISERAHKAN','T',0,'C');
$pdf->Cell(2,1,'JUMLAH','LT',0,'C');
$pdf->Cell(5,1,'KETERANGAN','LTR',0,'C');
$pdf->Cell(3,1,'TGL','T',0,'C');
$pdf->Cell(3,1,'JAM','LT',0,'C');
$pdf->Cell(4.5,1,'NAMA','LTR',0,'C');
$pdf->Cell(3,1,'TTD','TR',0,'C');
$pdf->Cell(4.5,1,'DISERAHKAN','TR',0,'C');
$pdf->Cell(2,1,'JUMLAH','LT',0,'C');
$pdf->Cell(5,1,'KETERANGAN','LTR',1,'C');

// DATA
$pdf->SetFillColor(192, 192, 192); // Setting fill color to light grey
$no = 1;
$sql = "SELECT * FROM `tb_kunci_kendaraan` WHERE  
        DATE(date_taken) = '$date' OR DATE(date_returned) = '$date'
        ORDER BY id_vehicle_key ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
$pdf->Cell(57, 1, '' . $row['kawasan_no_pol'] . '', 1, 1, '', true); // Cell with light grey fill color, without content
$pdf->Cell(2,1,$no++,1,0,'C');
$pdf->Cell(5,1,'' . $row['no_police'] . '','TB',0,'C');
$pdf->Cell(3,1,'' . $row['date_taken'] . '','LT',0,'C');
$pdf->Cell(3,1,'' . $row['time_taken'] . '','LT',0,'C');
$pdf->Cell(4.5,1,'' . $row['name_taken'] . '','LTR',0,'C');
$pdf->Cell(3,1,'' . $row['signature_taken'] . '','TR',0,'C');
$pdf->Cell(4.5,1,'' . $row['submitted_to'] . '','T',0,'C');
$pdf->Cell(2,1,'' . $row['amount_taken'] . '','LT',0,'C');
$pdf->Cell(5,1,'' . $row['keterangan_taken'] . '','LTR',0,'C');
$pdf->Cell(3,1,'' . $row['date_returned'] . '','T',0,'C');
$pdf->Cell(3,1,'' . $row['time_returned'] . '','LT',0,'C');
$pdf->Cell(4.5,1,'' . $row['name_returned'] . '','LTR',0,'C');
$pdf->Cell(3,1,'' . $row['signature_returned'] . '','TR',0,'C');
$pdf->Cell(4.5,1,'' . $row['recieved_to'] . '','TR',0,'C');
$pdf->Cell(2,1,'' . $row['amount_returned'] . '','LT',0,'C');
$pdf->Cell(5,1,'' . $row['keterangan_returned'] . '','LTR',1,'C');
}


// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 13);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(0.1, 0.5, 'DITERIMA, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'DITERIMA, ', 0, 0, 'C');
$pdf->Cell(0, 0.5, 'DITERIMA, ', 0, 1, 'R');
$pdf->Cell(0.1, 0.5, 'SHIFT  '. $shift3, 0, 0, 'L');
$pdf->Cell(0, 0.5, 'SHIFT  '. $shift2, 0, 0, 'C');
$pdf->Cell(0, 0.6, 'SHIFT  '. $shift1, 0, 0, 'R');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 10);
$pdf->Cell(0.1, 4, '..........................', 0, 0, 'L');
$pdf->Cell(0, 4, '..............................', 0, 0, 'C');
$pdf->Cell(0, 4, '...........................', 0, 0, 'R');
$pdf->Ln();


$pdf->Output();
?>