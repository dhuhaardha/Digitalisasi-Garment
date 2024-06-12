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

$pdf->Cell(59, 1, 'LOG BOOK OPERASIONALKUNCI KENDARAAN PERUSAHAAN', 0, 1, 'C');
$pdf->Cell(59, 1, "HARI/TANGGAL : " . $date, 0, 1, 'C');
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
$pdf->Cell(57, 1, '', 1, 1, '', true); // Cell with light grey fill color, without content
$pdf->Cell(2,1,'1',1,0,'C');
$pdf->Cell(5,1,'','TB',0,'C');
$pdf->Cell(3,1,'','LT',0,'C');
$pdf->Cell(3,1,'','LT',0,'C');
$pdf->Cell(4.5,1,'','LTR',0,'C');
$pdf->Cell(3,1,'','TR',0,'C');
$pdf->Cell(4.5,1,'','T',0,'C');
$pdf->Cell(2,1,'','LT',0,'C');
$pdf->Cell(5,1,'','LTR',0,'C');
$pdf->Cell(3,1,'','T',0,'C');
$pdf->Cell(3,1,'','LT',0,'C');
$pdf->Cell(4.5,1,'','LTR',0,'C');
$pdf->Cell(3,1,'','TR',0,'C');
$pdf->Cell(4.5,1,'','TR',0,'C');
$pdf->Cell(2,1,'','LT',0,'C');
$pdf->Cell(5,1,'','LTR',1,'C');




// $no = 1;
// $sql = "SELECT * FROM `tb_kunci_ruangan` WHERE  
//         DATE(date_retrieval) = '$date' OR DATE(date_returned) = '$date' OR DATE(date_handover) = '$date' 
//         ORDER BY ID_kunci_ruangan ASC";
// $result = $koneksi->query($sql);
// while ($row = $result->fetch_assoc()) {
    
//     $pdf->Cell(2,2,$no++,1,0,'C');
//     $pdf->Cell(5,2,'' . $row['name_of_key'] . '',1,0,'C');
//     $pdf->Cell(5,2,'' . $row['amount_of_key'] . '',1,0,'C');
//     // Data Row

//     if ($row['part_operasional'] == '1') {
//         // operasional 1
//     $pdf->Cell(2.5,1,'' . $row['date_retrieval'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['time_retrieval'] . '',1,0,'C');
//     $pdf->Cell(4,2,'' . $row['signature_retrieval'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['date_returned'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['time_returned'] . '',1,0,'C');
//     $pdf->Cell(4,2,'' . $row['signature_returned'] . '',1,0,'C');
    
//     // operasional 2
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,2,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,2,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,2,'',1,0,'C');
//     $pdf->Cell(0,1,'',0,1,'C');
//     } else /* proses jika status operasional 2 */ {
//     // operasional 1    
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,2,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,2,'',1,0,'C');
    
//     // operasional 2
//     $pdf->Cell(2.5,1,'' . $row['date_retrieval'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['time_retrieval'] . '',1,0,'C');
//     $pdf->Cell(4,2,'' . $row['signature_retrieval'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['date_returned'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['time_returned'] . '',1,0,'C');
//     $pdf->Cell(4,2,'' . $row['signature_returned'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['date_handover'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['time_handover'] . '',1,0,'C');
//     $pdf->Cell(4,2,'' . $row['signature_handover'] . '',1,0,'C');
//     $pdf->Cell(0,1,'',0,1,'C');
//     }

//     if ($row['part_operasional'] == '1') {
//     // petugas dan jumlah
//     $pdf->Cell(12,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'' . $row['worker_retrieval'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['amount_retrieval'] . '',1,0,'C');
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'' . $row['worker_returned'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['amount_returned'] . '',1,0,'C');

//     // operasional 2
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',0,1,'C');
//     } else {
//         // petugas dan jumlah
//     $pdf->Cell(12,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'',1,0,'C');
//     $pdf->Cell(2.5,1,'',1,0,'C');

//     // operasional 2
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'' . $row['worker_retrieval'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['amount_retrieval'] . '',1,0,'C');
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'' . $row['worker_returned'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['amount_returned'] . '',1,0,'C');
//     $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
//     $pdf->Cell(2.5,1,'' . $row['handover_to'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'' . $row['amount_handover'] . '',1,0,'C');
//     $pdf->Cell(2.5,1,'',0,1,'C');
//     }
// }

$pdf->Output();
?>