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
    }
}


// BUAT PDF BARU
$pdf = new FPDF('L','cm',array(78, 48));

//SET MARGIN LEFT, TOP AND RIGHT
$pdf->SetMargins(1, 2, 1);

// SET/TAMBAH PAGE
$pdf->AddPage();

// SET FONT STYLE
$pdf->SetFont('Times', 'B', 16);

// AWAL REPORT HEADER
// $pdf->Cell(59, 1, 'OPERASIONAL KUNCI RUANGAN', 0, 1, 'C');
// $pdf->Cell(59, 1, "Tanggal cetak : " . $date, 0, 1, 'C');

// SET NEW FONT STYLE
$pdf->SetFont('Times', '', 15);

// AKHIR REPORT HEADER
$pdf->Cell(1,2,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(8,1,'JAM','LT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(8,1,'TANGGAL','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO. POL','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'DRIVER','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'JENIS KENDARAAN','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO.KONTAINER','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO SEAL','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'PARAF','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'DOC BC MASUK','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'DOC BC KELUAR','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'KTP/SIM','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO ID','1',0,'C'); //vertically merged cell
$pdf->Cell(9,2,'KETERANGAN BARANG MASUK','1',0,'C'); //vertically merged cell
$pdf->Cell(10,1,'',0,1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(1,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(4,1,'MASUK','LTB',0,'C');
$pdf->Cell(4,1,'KELUAR','LTB',0,'C');
$pdf->Cell(4,1,'MASUK','LTB',0,'C');
$pdf->Cell(4,1,'KELUAR','LTB',0,'C');
$pdf->Cell(9,1,'',0,1,'C');


// DATA
$no = 1;
$query = "SELECT * FROM tb_kendaraan_umum
                                                                                                    LEFT JOIN tb_list_card ON tb_kendaraan_umum.tbu_no_kartu = tb_list_card.tblic_uid
                                                                                                    LEFT JOIN tb_list_kendaraan ON tb_kendaraan_umum.tbu_jns_kendaraan = tb_list_kendaraan.tblk_uid
                                                                                                    LEFT JOIN tb_list_bc ON tb_kendaraan_umum.tbu_bc_masuk = tb_list_bc.tblb_uid WHERE `tbu_tgl_masuk` LIKE '$date'";
$result = mysqli_query($koneksi, $query);
while($tabelKendaraan = mysqli_fetch_array($result)){
$pdf->Cell(1,1,$no++,1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(4,1,'' . $tabelKendaraan['tbu_jam_masuk'] . '','TB',0,'C'); //vertically merged cell
$pdf->Cell(4,1,'' . $tabelKendaraan['tbu_jam_keluar'] . '','LTB',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(4,1,'' . $tabelKendaraan['tbu_tgl_masuk'] . '','LTB',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(4,1,'' . $tabelKendaraan['tbu_tgl_keluar'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_nmr_plat'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_nm_supir'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tblk_nama_kendaraan'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_nmr_kontainer'] . '',1,0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_nmr_seal'] . '',1,0,'C'); //vertically merged cell
$imagePath = $tabelKendaraan['tbu_ttd']; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(5, 1, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 2, 0.8), 1, 0, 'L', false);
    } else {
        $pdf->Cell(5, 1, '', 1, 0, 'L', false);
    }

$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_bc_masuk'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_bc_keluar'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_no_identitas'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $tabelKendaraan['tbu_no_kartu'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(9,1,'' . $tabelKendaraan['tbu_brg_masuk'] . '','1',1,'C'); //vertically merged cell

}




// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 17);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(15, 0.5, 'DITERIMA,', 0, 0, 'L');
$pdf->Cell(16, 0.5, 'DISERAHKAN,', 0, 1, 'L');
$pdf->Cell(15, 1, 'SHIFT '. $shift_diterima, 0, 0, 'L');
$pdf->Cell(24, 1, 'SHIFT '. $shift_diserahkan, 0, 0, 'L');
$pdf->Ln();

$x = $pdf->GetX();
    $y = $pdf->GetY();
    $imageWidth = 5; // Width of the image in cm
    $imageHeight = 2; // Height of the image in cm
    
    // Check if the image file exists
    $imagePath = $ttd_diterima; // Path to the image file
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        // Move the cursor to the right after placing the image
        $pdf->SetX($x + $imageWidth);
    } else {
        $pdf->Cell(10, 4, 'Image not found', 0, 0, 'R'); // Fallback text if image is not found
    }

    $pdf->SetX(15);
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

$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, $nama_diterima, 0, 0, 'L');
$pdf->Cell(19, 4, $nama_diserahkan, 0, 0, 'R');


$pdf->Ln();

$pdf->Output();
?>