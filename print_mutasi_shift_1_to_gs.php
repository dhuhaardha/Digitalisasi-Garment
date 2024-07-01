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
$time_mulai = $_POST['input_time_mulai'];
$time_selesai = $_POST['input_time_selesai'];
$HR = $_POST['input_hr'];
$kode_kunjungan = 'CEK MUTASI SHIFT 1 & 2';
$HR = $_POST['input_hr'];

// Query to get shift_diterima and shift_diserahkan
$shift_diterima = '';
$shift_diserahkan = '';
$nama_diterima = '';
$nama_diserahkan = '';
$ttd_diterima = '';
$ttd_diserahkan = '';
$nama_danru = '';
$ttd_danru = '';
$nama_petugas = '';
$ttd_petugas = '';

$query_shift = "SELECT `jenis_bagian_export`, `jabatan_ttd`, `shift`, `date`, `danru_export`, `ttd_danru` FROM `tb_export` WHERE `date` LIKE '$date' AND `jenis_bagian_export` LIKE '$kode_kunjungan'";
$result_shift = mysqli_query($koneksi, $query_shift);

while ($row_shift = mysqli_fetch_assoc($result_shift)) {
    if ($row_shift['jabatan_ttd'] == 'DITERIMA') {
        $shift_diterima = $row_shift['shift'];
        $nama_diterima = $row_shift['danru_export'];
        $ttd_diterima = $row_shift['ttd_danru'];
    } elseif ($row_shift['jabatan_ttd'] == 'DISERAHKAN') {
        $shift_diserahkan = $row_shift['shift'];
        $nama_diserahkan = $row_shift['danru_export'];
        $ttd_diserahkan = $row_shift['ttd_danru'];
    } elseif ($row_shift['jabatan_ttd'] == 'DANRU') {
        $nama_danru = $row_shift['danru_export'];
        $ttd_danru = $row_shift['ttd_danru'];
    } elseif ($row_shift['jabatan_ttd'] == 'PETUGAS') {
        $nama_petugas = $row_shift['danru_export'];
        $ttd_petugas = $row_shift['ttd_danru'];
    }
}




// BUAT PDF BARU
$pdf = new FPDF('L','cm','A4');

// SET MARGIN LEFT, TOP, AND RIGHT
$pdf->SetMargins(0.5, 0.5, 0.5, 0.5);

// SET NEW PAGE PDF
$pdf->AddPage();

// SET TYPE FONT AND STYLE
$pdf->SetFont('Times', 'B', 10);




// AWAL REPORT HEADER
$pdf->Cell(18, 1, 'PT UNGARAN SARI GARMENTS', 0, 0, 'L');
$pdf->Cell(10, 1, "HARI/TANGGAL : " . $date, 0, 1, 'R');
$pdf->Cell(18, 0.5, 'SECURITY - UNGARAN', 0, 0, 'L');
$pdf->Cell(10, 0.5, "JAM                        : " . $time_mulai . "-" . $time_selesai, 0, 1, 'R');

$pdf->Ln();

$pdf->Cell(18, 0.5, 'SHIFT                           :  '  . $shift_diterima, 0, 1, 'L');
$pdf->Cell(10, 0.5, "DAN RU                        : ". $nama_danru, 0, 1, 'L');

$pdf->Ln();

//SET FONT STYLE FOR BELOW 
$pdf->SetFont('Times', '', 7);


// AKHIR REPORT HEADER
$pdf->Cell(0.8,1,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(6,1,'NAMA','TB',0,'C'); //vertically merged cell
$pdf->Cell(4.2,1,'NIK','LBT',0,'C'); //vertically merged cell
$pdf->Cell(4.4,1,'JABATAN','1',0,'C'); //vertically merged cell
$pdf->Cell(3,1,'POS','1',0,'C'); //vertically merged cell
$pdf->Cell(3,1,'TANDA TANGAN','1',0,'C'); //vertically merged cell
$pdf->Cell(4,1,'KETERANGAN','BTR',1,'C'); //vertically merged cell



// DATA OPERASIONAL SHIFT
$no = 1;
$sql = "SELECT * FROM `tb_mutasi_shift_1_to_gs` WHERE  
        DATE(dibuat_pada) = '$date' AND jenis = '$shift_diterima'
        ORDER BY id_mutasi_1_to_GS ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
  $pdf->Cell(0.8,0.8,$no++,1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
  $pdf->Cell(6,0.8,'' . $row['nama'] . '','TB',0,'C'); //vertically merged cell
  $pdf->Cell(4.2,0.8,'' . $row['NIK'] . '','LBT',0,'C'); //vertically merged cell
  $pdf->Cell(4.4,0.8,'' . $row['jabatan'] . '','1',0,'C'); //vertically merged cell
  $pdf->Cell(3,0.8,'' . $row['pos'] . '','1',0,'C'); //vertically merged cell
  $imagePath = $row['ttd']; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(3, 0.8, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 3, 0.8), 1, 0, 'C', false);
    }
  $pdf->Cell(4,0.8,'' . $row['keterangan'] . '','BTR',1,'C'); //vertically merged cell  
}
$pdf->Ln();


// BAGIAN BARANG INVENTARIS
// SET NEW PAGE
$pdf->AddPage();

// SET FONT STYLE
$pdf->SetFont('Times', 'B', 14);


$pdf->Cell(10, 2, 'BARANG INVENTARIS :', 0, 1, 'L');

// DATA BARANG INVENTARIS
$no = 1;
$sql = "SELECT * FROM `tb_logs_barang_inventaris_mutasi_shift` WHERE  
        DATE(date_created) = '$date' AND shift = '$shift_diterima'
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
        DATE(dibuat_pada) = '$date' AND shift = '$shift_diterima'
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
$pdf->Cell(0, 0.5, 'DISERAHKAN, ', 0, 0, 'C');
$pdf->Cell(0, 0.5, 'PETUGAS, ', 0, 1, 'R');
$pdf->Cell(0.1, 0.5, 'SHIFT  '. $shift_diterima, 0, 0, 'L');
$pdf->Cell(0, 0.5, 'SHIFT  '. $shift_diserahkan, 0, 0, 'C');
$pdf->Cell(0, 0.6,  '', 0, 0, 'R');
$pdf->Ln();

$imagePath = $ttd_diterima; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(5.4, 0.8, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 5, 2), 0, 0, 'L', false);
    }
    $pdf->SetX(13); // Adjust this value to move the image further to the right$pdf->SetX(40); // Adjust this value to move the image further to the right
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $imageWidth = 5; // Width of the image in cm
    $imageHeight = 2; // Height of the image in cm
    
    // Check if the image file exists
    $imagePath = $ttd_diserahkan; // Path to the image file
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        // Move the cursor to the right after placing the image
        $pdf->SetX($x + $imageWidth);
    } else {
        $pdf->Cell(10, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
    }
    $pdf->SetX(25); // Adjust this value to move the image further to the right$pdf->SetX(40); // Adjust this value to move the image further to the right
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $imageWidth = 5; // Width of the image in cm
    $imageHeight = 2; // Height of the image in cm
    
    // Check if the image file exists
    $imagePath = $ttd_petugas; // Path to the image file
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        // Move the cursor to the right after placing the image
        $pdf->SetX($x + $imageWidth);
    } else {
        $pdf->Cell(10, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
    }

$pdf->Ln();

$pdf->SetFont('Times', 'U', 10);
$pdf->Cell(0.1, 4, $nama_diterima, 0, 0, 'L');
$pdf->Cell(0, 4, $nama_diserahkan, 0, 0, 'C');
$pdf->Cell(0, 4, $nama_petugas, 0, 0, 'R');
$pdf->Ln();

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(28, 2, 'MENGETAHUI', 0, 1, 'C');
$pdf->Cell(29, 0.5, 'DANRU, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'HR / GA, ', 0, 1, 'R');

$pdf->Ln();


    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $imageWidth = 5; // Width of the image in cm
    $imageHeight = 2; // Height of the image in cm
    
    // Check if the image file exists
    $imagePath = $ttd_danru; // Path to the image file
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        // Move the cursor to the right after placing the image
        $pdf->SetX($x + $imageWidth);
    } else {
        $pdf->Cell(10, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
    }

    

$pdf->Ln();

$pdf->SetFont('Times', 'U', 10);
$pdf->Cell(29, 4, $nama_danru, 0, 0, 'L');
$pdf->Cell(0, 4, $HR, 0, 0, 'R');



$pdf->Output();
?>