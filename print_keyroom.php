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

class PDF extends FPDF
{
    //Page footer
    function Footer()
    {
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-1);
        //Arial italic 9
        $this->SetFont('Arial', 'I', 9);
        //nomor halaman
        $this->Cell(0, 0.8, 'Halaman ' . $this->PageNo() . ' dari {nb}', 0, 0, 'C');
    }
}
$pdf = new FPDF('L','cm',array(59, 35));
$pdf->SetMargins(1, 1, 1);

$pdf->AddPage();

$pdf->SetFont('Times', 'B', 16);

// AWAL REPORT HEADER

$pdf->Cell(59, 1, 'OPERASIONAL KUNCI RUANGAN', 0, 1, 'C');
$pdf->Cell(59, 1, "Tanggal cetak : " . $date, 0, 1, 'C');
// $pdf->Cell(87, 10, '', 0, 1, 'C');
$pdf->SetFont('Times', '', 13);
// $pdf->Cell(58, 0.8, "Tanggal cetak : " . $date, 0, 0, 'L');
// AKHIR REPORT HEADER

$pdf->Cell(2,4,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(5,4,'NAMA KUNCI','TB',0,'C'); //vertically merged cell
$pdf->Cell(5,4,'JUMLAH FISIK','LT',0,'C'); //vertically merged cell
$pdf->Cell(18,1,'OPERASIONAL 1','LT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(27,1,'OPERASIONAL 2','TR',1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(2,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(9,1,'PENGAMBILAN','LT',0,'C');
$pdf->Cell(9,1,'PENGEMBALIAN','LTR',0,'C');
$pdf->Cell(9,1,'PENGAMBILAN',1,0,'C');
$pdf->Cell(9,1,'PENGEMBALIAN',1,0,'C');
$pdf->Cell(9,1,'SERAH TERIMA',1,1,'C');

// third line(row)
$pdf->Cell(12,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(0,1,'',0,1,'C');

// fourth line(row)
$pdf->Cell(12,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,1); //dummy cell to align next cell, should be invisible



$no = 1;
$sql = "SELECT * FROM `tb_kunci_ruangan` WHERE  
        DATE(date_retrieval) = '$date' OR DATE(date_returned) = '$date' OR DATE(date_handover) = '$date' 
        ORDER BY ID_kunci_ruangan ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
    
    $pdf->Cell(2,2,$no++,1,0,'C');
    $pdf->Cell(5,2,'' . $row['name_of_key'] . '',1,0,'C');
    $pdf->Cell(5,2,'' . $row['amount_of_key'] . '',1,0,'C');
    // Data Row

    if ($row['part_operasional'] == '1') {
        // operasional 1
    $pdf->Cell(2.5,1,'' . $row['date_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_retrieval'] . '',1,0,'C');
    $pdf->Cell(4,2,'' . $row['signature_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['date_returned'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_returned'] . '',1,0,'C');
    $pdf->Cell(4,2,'' . $row['signature_returned'] . '',1,0,'C');
    
    // operasional 2
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,2,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,2,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,2,'',1,0,'C');
    $pdf->Cell(0,1,'',0,1,'C');
    } else /* proses jika status operasional 2 */ {
    // operasional 1    
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,2,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,2,'',1,0,'C');
    
    // operasional 2
    $pdf->Cell(2.5,1,'' . $row['date_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_retrieval'] . '',1,0,'C');
    $pdf->Cell(4,2,'' . $row['signature_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['date_returned'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_returned'] . '',1,0,'C');
    $pdf->Cell(4,2,'' . $row['signature_returned'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['date_handover'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_handover'] . '',1,0,'C');
    $pdf->Cell(4,2,'' . $row['signature_handover'] . '',1,0,'C');
    $pdf->Cell(0,1,'',0,1,'C');
    }

    if ($row['part_operasional'] == '1') {
    // petugas dan jumlah
    $pdf->Cell(12,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['worker_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_retrieval'] . '',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['worker_returned'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_returned'] . '',1,0,'C');

    // operasional 2
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',0,1,'C');
    } else {
        // petugas dan jumlah
    $pdf->Cell(12,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(2.5,1,'',1,0,'C');

    // operasional 2
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['worker_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_retrieval'] . '',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['worker_returned'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_returned'] . '',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['handover_to'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_handover'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'',0,1,'C');
    }
}

$pdf->Output();
?>