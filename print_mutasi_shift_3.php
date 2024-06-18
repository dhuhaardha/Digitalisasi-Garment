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
$shift = '3';

// BUAT PDF BARU
$pdf = new FPDF('L','cm','A4');

// SET MARGIN LEFT, TOP, AND RIGHT
$pdf->SetMargins(0.5, 0.5, 0.5, 0.5);

// SET NEW PAGE PDF
$pdf->AddPage();

// SET TYPE FONT AND STYLE
$pdf->SetFont('Times', 'B', 10);


// AWAL REPORT HEADER
$pdf->Cell(10, 1, 'PT UNGARAN SARI GARMENTS', 0, 0, 'L');
$pdf->Cell(10, 1, "HARI/TANGGAL : " . $date, 0, 1, 'R');
$pdf->Cell(10, 0.5, 'SECURITY - UNGARAN', 0, 0, 'L');
$pdf->Cell(10, 0.5, "JAM                        : " . $date, 0, 1, 'R');
$pdf->Cell(20, 1, 'SHIFT/DAN RU      :   3/3', 0, 1, 'C');

$pdf->SetFont('Times', 'B', 7);


// AKHIR REPORT HEADER
$pdf->Cell(0.4,1,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(2.4,1,'NAMA','TB',0,'C'); //vertically merged cell
$pdf->Cell(1.2,1,'NIK','LBT',0,'C'); //vertically merged cell
$pdf->Cell(1.4,1,'JABATAN','1',0,'C'); //vertically merged cell
$pdf->Cell(1.2,1,'KET','BTR',0,'C'); //vertically merged cell
$pdf->Cell(1.7,0.5,'22:00','TR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(1.7,0.5,'23:00','TR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(1.7,0.5,'24:00','TR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(1.7,0.5,'01:00','TR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(1.7,0.5,'02:00','TR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(1.7,0.5,'03:00','TR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(1.7,0.5,'04:00','TR',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(1.7,0.5,'05:00','TR',1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(2.6,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,0,'C');
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,0,'C');
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,0,'C');
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,0,'C');
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,0,'C');
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,0,'C');
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,0,'C');
$pdf->Cell(0.7,0.5,'POS','TB',0,'C');
$pdf->Cell(1,0.5,'PARAF',1,1,'C');


// DATA
$no = 1;
$sql = "SELECT * FROM `tb_mutasi_shift_3` WHERE  
        DATE(date) = '$date'
        ORDER BY ID_mutasi_shift_3 ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
$pdf->Cell(0.4,0.5,$no++,'LBR',0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->SetFont('Arial', 'B', 4.7);
$pdf->Cell(2.4,0.5,'' . $row['nama'] . '','B',0,'C'); //vertically merged cell
$pdf->SetFont('Times', 'B', 7);
$pdf->Cell(1.2,0.5,'' . $row['NIK'] . '','LB',0,'C'); //vertically merged cell
$pdf->Cell(1.4,0.5,'' . $row['jabatan'] . '','RLB',0,'C'); //vertically merged cell
$pdf->Cell(1.2,0.5,'' . $row['keterangan'] . '','BR',0,'C'); //vertically merged cell
$pdf->Cell(0.7,0.5,'' . $row['pos_10'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_10'] . '','BLR',0,'C');
$pdf->Cell(0.7,0.5,'' . $row['pos_11'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_11'] . '','BLR',0,'C');
$pdf->Cell(0.7,0.5,'' . $row['pos_12'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_12'] . '','BLR',0,'C');
$pdf->Cell(0.7,0.5,'' . $row['pos_01'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_01'] . '','BLR',0,'C');
$pdf->Cell(0.7,0.5,'' . $row['pos_02'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_02'] . '','BLR',0,'C');
$pdf->Cell(0.7,0.5,'' . $row['pos_03'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_03'] . '','BLR',0,'C');
$pdf->Cell(0.7,0.5,'' . $row['pos_04'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_04'] . '','BLR',0,'C');
$pdf->Cell(0.7,0.5,'' . $row['pos_05'] . '','B',0,'C');
$pdf->Cell(1,0.5,'' . $row['paraf_05'] . '','BLR',1,'C');
}

// BAGIAN BARANG INVENTARIS
// SET NEW PAGE
$pdf->AddPage();

// SET FONT STYLE
$pdf->SetFont('Times', 'B', 14);


$pdf->Cell(10, 2, 'BARANG INVENTARIS :', 0, 1, 'L');

// DATA BARANG INVENTARIS
$no = 1;
$sql = "SELECT * FROM `tb_logs_barang_inventaris_mutasi_shift` WHERE  
        DATE(date_created) = '$date' AND shift = '$shift'
        ORDER BY ID_logs_barang_inventaris ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {

$pdf->Cell(10, 1.2, '=>               ' . $row['barang_inventaris'] . ' :            ' . $row['shift'] . '', 0, 1, 'L');
}
$pdf->Ln();


// URAIAN OPERASIONAL MUTASI SHIFT

// SET NEW PAGE 
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 9);

function tableHeader() {
  global $pdf;
  
  $pdf->Cell(1,1.4,'',0,1,'C'); //vertically merged cell, height=3x row height=3x10=30
  $pdf->Cell(1.6,0.8,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
  $pdf->Cell(2.5,0.8,'JAM','TB',0,'C'); //vertically merged cell
  $pdf->Cell(21.5,0.8,'URAIAN','LBT',0,'C'); //vertically merged cell
  $pdf->Cell(2.4,0.8,'S/D','1',1,'C'); //vertically merged cell
}


// DATA URAIAN MUTASI
$no = 1;
$sql = "SELECT * FROM `tb_logs_activity_mutasi_shift` WHERE  
        DATE(dibuat_pada) = '$date' AND shift = '$shift'
        ORDER BY id_logs_activity_shift ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
  if ($no % 4 == 1) {
    tableHeader(); // Add header to the new page
  }
$pdf->Cell(1.6,3.8,$no++,'LBR',0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(2.5,3.8,'' . $row['time_uraian_created'] . '','B',0,'C'); //vertically merged cell
$pdf->Cell(21.5,3.8,'' . $row['uraian'] . '','LBR',0,'C'); //vertically merged cell
$pdf->Cell(2.4,3.8,'' . $row['time_uraian_finished'] . '','LRB',1,'C'); //vertically merged cell

}
$pdf->Ln();


// FOOTER BAGIAN TANDA TANGAN

// ADD NEW PAGE
$pdf->AddPage();

//SET FONT STYLE
$pdf->SetFont('Times', 'B', 10);

$pdf->Cell(29, 1, 'TUGAS DAN TANGGUNG JAWAB JAGA TELAH SELESAI DILAKSANAKAN', 0, 1, 'L');
$pdf->Cell(29, 0.6, '           =>  LAMPU DIMATIKAN PETUGAS UTILITY          :', 0, 1, 'L');
$pdf->Cell(29, 0.6, '           =>  PINTU UTAMA DITUTUP OLEH PETUGAS        :', 0, 1, 'L');
$pdf->Cell(29, 0.6, '           =>  KUNCI DISERAHKAN POS INDUK                       :', 0, 1, 'L');
$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(0.1, 0.5, 'DITERIMA, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'DISERAHKAN, ', 0, 1, 'R');
$pdf->Cell(0.1, 0.5, 'SHIFT  '. $shift, 0, 0, 'L');
$pdf->Cell(0, 0.5, 'SHIFT  '. $shift, 0, 0, 'R');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 10);
$pdf->Cell(0.1, 4, '..........................', 0, 0, 'L');
$pdf->Cell(0, 4, '...........................', 0, 0, 'R');
$pdf->Ln();

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(28, 1, 'MENGETAHUI', 0, 1, 'C');
$pdf->Cell(28, 0, 'HR / GA', 0, 1, 'C');

$pdf->Ln();

$pdf->SetFont('Times', 'U', 10);
$pdf->Cell(28, 8, 'RUDY HARYOKO', 0, 1, 'C');




$pdf->Output();
?>