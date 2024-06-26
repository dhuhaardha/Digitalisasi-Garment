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
$shift1 = '1';
$shift2 = '2';
$shift3 = '3';
$danru = $_POST['input_nama_danru'];
$petugas = $_POST['input_nama_petugas'];
$HR = $_POST['input_hr'];
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
$no = 1;
$query = "SELECT `tbrt_tgl_masuk`, `tbrt_jam_masuk`, `tbrt_tgl_keluar`, `tbrt_jam_keluar`, `tbrt_nm_tamu`, `tbrt_alm_tamu`, `tbrt_jnj_temu`, `tbrt_keperluan`, `tbrt_cek_metal`, `tbrt_cek_mirror`, `tbrt_nmr_identitas`, `tbrt_nmr_kartu`, `tbrt_ttd_tamu` FROM `tb_report_tamu` WHERE `tbrt_jns_kunjungan` LIKE '$kode_kunjungan' AND `tbrt_tgl_masuk` LIKE '$date'";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    // Example of adding data to PDF cells
    $pdf->Cell(1, 3, $no++, 1, 0, 'C'); // vertically merged cell, height=3x row height=3x10=30
    $pdf->Cell(5, 3, $row['tbrt_tgl_masuk'], 'TB', 0, 'C'); // vertically merged cell with data from query result
    $pdf->Cell(4, 3, $row['tbrt_jam_masuk'], 'LTB', 0, 'C'); // vertically merged cell with data from query result
    $pdf->Cell(4, 3, $row['tbrt_jam_keluar'], 'LTB', 0, 'C'); // vertically merged cell with data from query result
    $pdf->Cell(9, 3, $row['tbrt_nm_tamu'], 1, 0, 'C'); // normal height cell with data from query result
    $pdf->Cell(5, 3, $row['tbrt_alm_tamu'], 1, 0, 'C'); // normal height cell with data from query result
    $pdf->Cell(5, 3, $row['tbrt_jnj_temu'], 1, 0, 'C'); // normal height cell with data from query result
    $pdf->Cell(5, 3, $row['tbrt_keperluan'], 1, 0, 'C'); // normal height cell with data from query result
    $pdf->Cell(5, 3, $row['tbrt_cek_metal'], 1, 0, 'C'); // normal height cell with data from query result
    $pdf->Cell(5, 3, $row['tbrt_cek_mirror'], 1, 0, 'C'); // normal height cell with data from query result
    $pdf->Cell(5, 3, $row['tbrt_nmr_identitas'], 1, 0, 'C'); // normal height cell with data from query result
    $pdf->Cell(5, 3, $row['tbrt_nmr_kartu'], 1, 0, 'C'); // normal height cell with data from query result
    $imagePath = $row['tbrt_ttd_tamu']; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(5, 3, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 5, 2), 1, 0, 'L', false);
    }
    
    
    // Move to the next line (row)
    $pdf->Ln();
}




// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(15, 0.5, 'PETUGAS', 0, 0, 'L');
$pdf->Cell(16, 0.5, '', 0, 0, 'L');
$pdf->Cell(15, 0.5, '', 0, 0, 'L');
$pdf->Cell(4, 0.5, 'MENGETAHUI, ', 0, 1, 'L');
$pdf->Cell(15, 1, ' ', 0, 0, 'L');
$pdf->Cell(24, 1, '', 0, 0, 'L');
$pdf->Cell(14, 1, 'KOMANDAN REGU, ', 0, 0, 'L');
$pdf->Cell(6, 1, 'HR & GA, ', 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, $petugas, 0, 0, 'L');
$pdf->Cell(19, 4, '', 0, 0, 'R');
$pdf->Cell(16, 4, '', 0, 0, 'R');
$pdf->Cell(10, 4, $danru, 0, 0, 'R');
$pdf->Cell(13, 4, $HR, 0, 0, 'R');
$pdf->Ln();

$pdf->Output();
?>