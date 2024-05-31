<?php
require('fpdf/fpdf.php');

$date = $_POST['input_print_pdf'];

$server     = "localhost";
$user       = "root";
$pass       = "";
$database   = "db_security";

// Cek Koneksi

$koneksi    = mysqli_connect($server, $user , $pass , $database );
if(!$koneksi){ // cek koneksi
    die("Tidak terkoneksi ke database");
}

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

$pdf = new PDF('L', 'cm', array(30, 38));
$pdf->SetMargins(1, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();

// AWAL REPORT HEADER
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(37, 0.5, 'DATA KUNCI RUANGAN', 0, 1, 'C');
$pdf->Cell(37, 0.5, 'PT UNGARAN SARI GARMENT', 0, 1, 'C');
$pdf->Cell(37, 0.5, '', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(3, 0.8, "Tanggal cetak : " . $date, 0, 0, 'L');
// AKHIR REPORT HEADER

// REPORT DETAIL
$pdf->SetFont('Arial', 'B', 9);
$pdf->ln(1);
$pdf->Cell(0.75, 0.8, 'No.', 1, 0, 'C');
$pdf->Cell(0.76, 0.8, 'Nama Kunci', 1, 0, 'C');
$pdf->Cell(0.76, 0.8, 'Jumlah Fisik', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Hari Ini', 1, 0, 'C');
$pdf->Cell(100,100,"Text inside first column",1,0,'L');
$pdf->SetX($pdf->GetX() - 35);
$pdf->Cell(35,35,'Text inside second column ',1,0,'C');
$pdf->Ln();


// Baris keempat
$pdf->Cell(0, 5.9, "(                                     )", 0, 0, 'L');
$pdf->Cell(0, 5.9, "(                                     )", 0, 1, 'R');

$pdf->Ln();




$pdf->Output("Laporan_buku.pdf", "I");
exit;