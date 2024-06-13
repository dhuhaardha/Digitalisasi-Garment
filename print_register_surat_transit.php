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

$pdf->Cell(59, 1, 'LOG BOOK OPERASIONAL REGISTER TRANSIT PAKET STORE DAN SURAT PERUSAHAAN', 0, 1, 'C');
$pdf->Cell(59, 1, "HARI/TANGGAL : " . $date, 0, 1, 'C');
// $pdf->Cell(87, 10, '', 0, 1, 'C');
$pdf->SetFont('Times', '', 13);
// $pdf->Cell(58, 0.8, "Tanggal cetak : " . $date, 0, 0, 'L');
// AKHIR REPORT HEADER

$pdf->Cell(2,2,'NO','1',0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(5,2,'TANGGAL','TBR',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'JAM','TBR',0,'C'); //vertically merged cell
$pdf->Cell(6,2,'PENGIRIM','TBR',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'KURIR','TBR',0,'C'); //vertically merged cell
$pdf->Cell(6,2,'KEPADA','TBR',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'HASIL DETEKSI','TBR',0,'C'); //vertically merged cell
$pdf->Cell(2,2,'JUMLAH','TBR',0,'C'); //vertically merged cell
$pdf->Cell(6,2,'KETERANGAN','TBR',0,'C'); //vertically merged cell
$pdf->Cell(15,1,'DITERIMA','LTR',1,'C'); // Merged horizontally for "DITERIMA"
$pdf->Cell(21,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(21,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(8,1,'SECURITY','TBR',0,'C'); // "TGL" subfield
$pdf->Cell(7,1,'OFFICE/STORE','TBR',1,'C'); // "JAM" subfield and move to the next line


// DATA
$no = 1;
$sql = "SELECT * FROM `tb_register_surat_transit` WHERE  
        DATE(date) = '$date'
        ORDER BY ID_register ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
$pdf->Cell(2,1,$no++,'LB',0,'C');
$pdf->Cell(5,1,'' . $row['date'] . '','LB',0,'C');
$pdf->Cell(5,1,'' . $row['time'] . '','LB',0,'C');
$pdf->Cell(6,1,'' . $row['pengirim'] . '','LRB',0,'C');
$pdf->Cell(5,1,'' . $row['kurir'] . '','RB',0,'C');
$pdf->Cell(6,1,'' . $row['kepada'] . '','B',0,'C');
$pdf->Cell(5,1,'' . $row['kondisi_barang'] . '','LB',0,'C');
$pdf->Cell(2,1,'' . $row['security_recieved'] . '','LRB',0,'C');
$pdf->Cell(6, 1, $row['ttd_office'] . "\n" . $row['person_office_recieved'], 'B', 0, 'C');
$pdf->Cell(8,1,'' . $row['amount'] . '','LB',0,'C');
$pdf->Cell(7,1,'' . $row['keterangan'] . '','LRB',0,'C');
}



$pdf->Output();
?>