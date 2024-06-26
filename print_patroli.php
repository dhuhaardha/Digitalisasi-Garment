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

// // Handle signature data for Petugas
// if (isset($_POST['signatureFilename'])) {
//     $signatureData = $_POST['signatureFilename'];

//     // Remove the "data:image/png;base64," prefix
//     $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

//     // Decode the base64-encoded image data
//     $signatureData = base64_decode($signatureData);

//     // Generate a unique filename using uniqid()
//     $uniqueFilename = uniqid('signature_petugas_') . '.png';

//     // Set the file path where you want to save the signature image
//     $filePath = 'upload/' . $uniqueFilename;

//     // Save the signature image to the specified file path
//     $success = file_put_contents($filePath, $signatureData);

//     if ($success !== false) {
//         echo "Signature for Petugas saved successfully as: " . $filePath . "<br>";
//     } else {
//         echo "Failed to save signature for Petugas.<br>";
//     }
// } else {
//     echo "No signature data received for Petugas.<br>";
// }

// // Handle signature data for Ketua Regu
// if (isset($_POST['signatureFilenameCommander'])) {
//     $signatureDataCommander = $_POST['signatureFilenameCommander'];

//     // Remove the "data:image/png;base64," prefix
//     $signatureDataCommander = str_replace('data:image/png;base64,', '', $signatureDataCommander);

//     // Decode the base64-encoded image data
//     $signatureDataCommander = base64_decode($signatureDataCommander);

//     // Generate a unique filename using uniqid()
//     $uniqueFilenameCommander = uniqid('signature_ketua_regu_') . '.png';

//     // Set the file path where you want to save the signature image
//     $filePathCommander = 'upload/' . $uniqueFilenameCommander;

//     // Save the signature image to the specified file path
//     $successCommander = file_put_contents($filePathCommander, $signatureDataCommander);

//     if ($successCommander !== false) {
//         echo "Signature for Ketua Regu saved successfully as: " . $filePathCommander . "<br>";
//     } else {
//         echo "Failed to save signature for Ketua Regu.<br>";
//     }
// } else {
//     echo "No signature data received for Ketua Regu.<br>";
// }


$date = $_POST['input_print_pdf'];
$kode = $_POST['informasi_kode'];
$petugas = $_POST['input_nama_petugas'];
$HR = $_POST['input_hr'];
$komandan_regu = $_POST['input_nama_danru'];



// BUAT PDF BARU
$pdf = new FPDF('L','cm',array(59, 35));

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

$pdf->Cell(2,2,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(6,2,'HARI/TANGGAL','TB',0,'C'); //vertically merged cell
$pdf->Cell(12,1,'JAM','LT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(12,2,'PETUGAS','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'SHIFT','1',0,'C'); //vertically merged cell
$pdf->Cell(20,2,'URAIAN SINGKAT KETERANGAN','1',0,'C'); //vertically merged cell
$pdf->Cell(10,1,'',0,1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(3,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(5,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(6,1,'START','LT',0,'C');
$pdf->Cell(6,1,'FINISH','LT',0,'C');
$pdf->Cell(9,1,'',0,1,'C');


// DATA
$no = 1;
$query = "SELECT * FROM tb_report_patroli LEFT JOIN tb_list_security ON 
         tb_report_patroli.tbrp_nm_security = tb_list_security.tbls_nik 
         WHERE tbrp_jns_report LIKE '$kode' AND `tbrp_tgl_mulai` LIKE '$date'";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
$pdf->Cell(2,1,$no++,1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(6,1,'' . $row['tbrp_tgl_mulai'] . '','TB',0,'C'); //vertically merged cell
$pdf->Cell(6,1,'' . $row['tbrp_jam_mulai'] . '','BLT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(6,1,'' . $row['tbrp_jam_selesai'] . '','BLT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(12,1,'' . $row['tbls_nama'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $row['tbrp_shf_security'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(20,1,'' . $row['tbrp_keterangan'] . '','1',1,'C'); //vertically merged cell
}




// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(0.1, 0.5, 'PETUGAS / PELAPOR, ', 0, 0, 'L');
$pdf->Cell(0, 0.5, 'MENGETAHUI, ', 0, 1, 'C');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, $petugas, 0, 0, 'L');
$pdf->Cell(23, 4, '', 0, 0, 'R');
$pdf->Cell(5, 4, $komandan_regu, 0, 0, 'R');
$pdf->Cell(5, 4, $HR, 0, 0, 'R');
$pdf->Ln();


// $pdf->Image($filePath, 10, 10, 50, 50, 'PNG');
// $pdf->Cell(24, -3, $komandan_regu, 0, 0, 'R');
// $pdf->Cell(5, -3, $komandan_regu, 0, 0, 'R');
// $pdf->Cell(5, -3, $HR, 0, 0, 'R');


$pdf->Output();
?>