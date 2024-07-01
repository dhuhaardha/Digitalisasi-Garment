<?php

require('fpdf/fpdf.php');
date_default_timezone_set('Asia/Jakarta');
// $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

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
// $time_mulai = $_POST['input_time_mulai'];
// $time_selesai = $_POST['input_time_selesai'];

$kode_kunjungan = 'KEYROOM';


// Query to get shift_diterima and shift_diserahkan
$shift_diterima = '';
$shift_diserahkan = '';
$nama_diterima = '';
$nama_diserahkan = '';
$ttd_diterima = '';
$ttd_diserahkan = '';
$nama_danru = '';
$ttd_danru = '';

$query_shift = "SELECT `jenis_bagian_export`, `jabatan_ttd`, `shift`, `date`, `danru_export`, `ttd_danru` FROM `tb_export` WHERE `date` LIKE '$date' AND `jenis_bagian_export` LIKE '$kode_kunjungan'";
$result_shift = mysqli_query($koneksi, $query_shift);

while ($row_shift = mysqli_fetch_assoc($result_shift)) {
    if ($row_shift['jabatan_ttd'] == 'DITERIMA' && $row_shift['shift'] == '1') {
        $shift_diterima1 = $row_shift['shift'];
        $nama_diterima1 = $row_shift['danru_export'];
        $ttd_diterima1 = $row_shift['ttd_danru'];
    } elseif ($row_shift['jabatan_ttd'] == 'DITERIMA' && $row_shift['shift'] == '2') {
        $shift_diserahkan2 = $row_shift['shift'];
        $nama_diserahkan2 = $row_shift['danru_export'];
        $ttd_diserahkan2 = $row_shift['ttd_danru'];
    } elseif ($row_shift['jabatan_ttd'] == 'DITERIMA' && $row_shift['shift'] == '3') {
        $shift_diserahkan3 = $row_shift['shift'];
        $nama_diserahkan3 = $row_shift['danru_export'];
        $ttd_diserahkan3 = $row_shift['ttd_danru'];
    }
}

// BUAT PDF BARU
$pdf = new FPDF('L','cm',array(59, 35));

//SET MARGIN LEFT, TOP AND RIGHT
$pdf->SetMargins(1, 1, 1);

// SET/TAMBAH PAGE
$pdf->AddPage();

// SET FONT STYLE
$pdf->SetFont('Times', 'B', 16);

// AWAL REPORT HEADER
$pdf->Cell(59, 1, 'OPERASIONAL KUNCI RUANGAN', 0, 1, 'C');
$pdf->Cell(59, 1, "Tanggal cetak : " . $date, 0, 1, 'C');

// SET NEW FONT STYLE
$pdf->SetFont('Times', '', 13);

// AKHIR REPORT HEADER

$pdf->Cell(2,3,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(5,3,'NAMA KUNCI','TB',0,'C'); //vertically merged cell
$pdf->Cell(5,4,'JUMLAH FISIK','LT',0,'C'); //vertically merged cell
$pdf->Cell(5,4,'OPERASIONAL','LT',0,'C'); //vertically merged cell
// $pdf->Cell(18,1,'OPERASIONAL 1','LT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
// $pdf->Cell(27,1,'OPERASIONAL 2','TR',1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
// $pdf->Cell(2,1,'',0,0); //dummy cell to align next cell, should be invisible
// $pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
// $pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
// $pdf->Cell(9,1,'PENGAMBILAN','LT',0,'C');
// $pdf->Cell(9,1,'PENGEMBALIAN','LTR',0,'C');
$pdf->Cell(9,1,'PENGAMBILAN',1,0,'C');
$pdf->Cell(9,1,'PENGEMBALIAN',1,0,'C');
$pdf->Cell(9,1,'SERAH TERIMA',1,1,'C');

// third line(row)
$pdf->Cell(17,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(2.5,1,'TGL','LTR',0,'C');
$pdf->Cell(2.5,1,'JAM','LTR',0,'C');
$pdf->Cell(4,2,'PARAF',1,0,'C');
// $pdf->Cell(2.5,1,'TGL','LTR',0,'C');
// $pdf->Cell(2.5,1,'JAM','LTR',0,'C');
// $pdf->Cell(4,2,'PARAF',1,0,'C');
// $pdf->Cell(2.5,1,'TGL','LTR',0,'C');
// $pdf->Cell(2.5,1,'JAM','LTR',0,'C');
// $pdf->Cell(4,2,'PARAF',1,0,'C');
$pdf->Cell(0,1,'',0,1,'C');

// fourth line(row)
$pdf->Cell(17,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
$pdf->Cell(2.5,1,'JML',1,0,'C');
$pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
// $pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
// $pdf->Cell(2.5,1,'JML',1,0,'C');
// $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
// $pdf->Cell(2.5,1,'PETUGAS',1,0,'C');
// $pdf->Cell(2.5,1,'JML',1,0,'C');
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
    $pdf->Cell(5,2,'' . $row['part_operasional'] . '',1,0,'C');
    // Data Row

    
        // operasional 1
    $pdf->Cell(2.5,1,'' . $row['date_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_retrieval'] . '',1,0,'C');
    $imagePath = $row['signature_retrieval']; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(4, 2, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 4, 2), 1, 0, 'L', false);
    }
    // $pdf->Cell(4,2,'' . $row['signature_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['date_returned'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_returned'] . '',1,0,'C');
    $imagePath = $row['signature_returned']; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(4, 2, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 4, 2), 1, 0, 'L', false);
    }
    // $pdf->Cell(4,2,'' . $row['signature_returned'] . '',1,0,'C');
    
    // operasional 2
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(4,2,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(4,2,'',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['date_handover'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['time_handover'] . '',1,0,'C');
    $imagePath = $row['signature_handover']; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(4, 2, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 4, 2), 1, 0, 'L', false);
    } else {
        $pdf->Cell(4,2,'',1,0,'C');
    }
    $pdf->Cell(0,1,'',0,1,'C');

    //else /* proses jika status operasional 2 */ {
    // // operasional 1    
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(4,2,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(4,2,'',1,0,'C');
    
    // // operasional 2
    // $pdf->Cell(2.5,1,'' . $row['date_retrieval'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['time_retrieval'] . '',1,0,'C');
    // $pdf->Cell(4,2,'' . $row['signature_retrieval'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['date_returned'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['time_returned'] . '',1,0,'C');
    // $pdf->Cell(4,2,'' . $row['signature_returned'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['date_handover'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['time_handover'] . '',1,0,'C');
    // $pdf->Cell(4,2,'' . $row['signature_handover'] . '',1,0,'C');
    // $pdf->Cell(0,1,'',0,1,'C');
    // }

    
    // petugas dan jumlah
    $pdf->Cell(17,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['worker_retrieval'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_retrieval'] . '',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['worker_returned'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_returned'] . '',1,0,'C');

    // operasional 2
    // $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    $pdf->Cell(2.5,1,'' . $row['handover_to'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'' . $row['amount_handover'] . '',1,0,'C');
    $pdf->Cell(2.5,1,'',0,1,'C');
    
    // else {
    //     // petugas dan jumlah
    // $pdf->Cell(12,1,'',0,0); //dummy cell to align next cell, should be invisible
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    // $pdf->Cell(2.5,1,'',1,0,'C');
    // $pdf->Cell(2.5,1,'',1,0,'C');

    // // operasional 2
    // $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    // $pdf->Cell(2.5,1,'' . $row['worker_retrieval'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['amount_retrieval'] . '',1,0,'C');
    // $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    // $pdf->Cell(2.5,1,'' . $row['worker_returned'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['amount_returned'] . '',1,0,'C');
    // $pdf->Cell(4,1,'',0,0); //dummy cell to align next cell, should be invisible
    // $pdf->Cell(2.5,1,'' . $row['handover_to'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'' . $row['amount_handover'] . '',1,0,'C');
    // $pdf->Cell(2.5,1,'',0,1,'C');
    // }
}

// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 13);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(0.1, 0.5, 'DITERIMA, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'DITERIMA, ', 0, 0, 'C');
$pdf->Cell(0, 0.5, 'DITERIMA, ', 0, 1, 'R');
$pdf->Cell(0.1, 0.5, 'SHIFT  '. $shift_diserahkan3, 0, 0, 'L');
$pdf->Cell(0, 0.5, 'SHIFT  '. $shift_diserahkan2, 0, 0, 'C');
$pdf->Cell(0, 0.6, 'SHIFT  '. $shift_diterima1, 0, 0, 'R');
$pdf->Ln();

$x = $pdf->GetX();
    $y = $pdf->GetY();
    $imageWidth = 5; // Width of the image in cm
    $imageHeight = 2; // Height of the image in cm
    
    // Check if the image file exists
    $imagePath = $ttd_diserahkan3; // Path to the image file
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        // Move the cursor to the right after placing the image
        $pdf->SetX($x + $imageWidth);
    } else {
        $pdf->Cell(10, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
    }

    $pdf->SetX(26);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $imageWidth = 5; // Width of the image in cm
    $imageHeight = 2; // Height of the image in cm
    
    // Check if the image file exists
    $imagePath = $ttd_diserahkan2; // Path to the image file
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        // Move the cursor to the right after placing the image
        $pdf->SetX($x + $imageWidth);
    } else {
        $pdf->Cell(10, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
    }

    $pdf->SetX(54);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $imageWidth = 5; // Width of the image in cm
    $imageHeight = 2; // Height of the image in cm
    
    // Check if the image file exists
    $imagePath = $ttd_diterima1; // Path to the image file
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        // Move the cursor to the right after placing the image
        $pdf->SetX($x + $imageWidth);
    } else {
        $pdf->Cell(10, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
    }

$pdf->Ln();

$pdf->SetFont('Times', 'U', 10);
$pdf->Cell(0.1, 4, $nama_diserahkan3, 0, 0, 'L');
$pdf->Cell(0, 4, $nama_diserahkan2, 0, 0, 'C');
$pdf->Cell(0, 4, $nama_diterima1, 0, 0, 'R');
$pdf->Ln();



$pdf->Output();
?>