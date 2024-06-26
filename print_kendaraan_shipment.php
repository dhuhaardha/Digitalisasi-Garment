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
$pdf->Cell(8,1,'JAM','LT',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(8,1,'TANGGAL','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'JENIS KENDARAAN','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO.KONTAINER','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'UNDER MIRROR','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO SEAL','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'PARAF','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'JENIS SIM','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO SIM','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'NO ID','1',0,'C'); //vertically merged cell
$pdf->Cell(5,2,'KETERANGAN','1',0,'C'); //vertically merged cell
$pdf->Cell(10,1,'',0,1,'C'); //normal height, but occupy 6 columns (horizontally merged)

// second line(row)
$pdf->Cell(1,1,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(4,1,'MASUK','LTB',0,'C');
$pdf->Cell(4,1,'KELUAR','LTB',0,'C');
$pdf->Cell(4,1,'MASUK','LTB',0,'C');
$pdf->Cell(4,1,'KELUAR','LTB',0,'C');
$pdf->Cell(9,1,'',0,1,'C');


// DATA
$noUrut = 1;
$vehicleQuery = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan 
                                        LEFT JOIN tb_list_card ON tb_kendaraan.tbrk_no_card = tb_list_card.tblic_uid
                                        LEFT JOIN tb_list_kendaraan ON tb_kendaraan.tbrk_jns_kendaraan = tb_list_kendaraan.tblk_uid");
while($listVehicle = mysqli_fetch_array($vehicleQuery)){
$pdf->Cell(1,1,$noUrut++,1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(4,1,'' . $listVehicle['tbrk_masuk'] . '','TB',0,'C'); //vertically merged cell
$pdf->Cell(4,1,'' . $listVehicle['tbrk_keluar'] . '','LTB',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(4,1,'' . $listVehicle['tbrk_tanggal'] . '','LTB',0,'C'); //normal height, but occupy 6 columns (horizontally merged)
$pdf->Cell(4,1,'' . $listVehicle['tbrk_tanggal_out'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $listVehicle['tblk_nama_kendaraan'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $listVehicle['tbrk_nmr_kontainer'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $listVehicle['tbrk_cek_mirror'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,1,'' . $listVehicle['tbrk_nmr_seal'] . '',1,0,'C'); //vertically merged cell
$imagePath = $listVehicle['tbrk_ttd']; // Adjust path as needed
    if (file_exists($imagePath)) {
        $pdf->Cell(5, 1, $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 2, 0.8), 1, 0, 'L', false);
    } else {
        $pdf->Cell(5, 1, '', 1, 0, 'L', false);
    }
$pdf->Cell(5,6.8,'' . $listVehicle['tbrk_jns_sim'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,6.8,'' . $listVehicle['tbrk_no_sim'] . '','1',0,'C'); //vertically merged cell
$pdf->Cell(5,9,'' . $listVehicle['tblic_no_id'] . '','1',0,'C'); //vertically merged cell
$data = "Transporter: " . $listVehicle['tbrk_nama_transporter'] . "\n" .
        "Buyer: " . $listVehicle['tbrk_nama_buyer'] . "\n" .
        "Qty: " . $listVehicle['tbrk_qty_kirim'] . "\n" .
        "Gatepass: " . $listVehicle['tbrk_no_gp'] . "\n" .
        "Destination: " . $listVehicle['tbrk_tujuan'] . "\n" .
        "Bodyguard: " . $listVehicle['tbrk_nm_pengawal'] . "\n" .
        "Delivery No: " . $listVehicle['tbrk_surat_jalan'] . "\n" .
        "Eseal No: " . $listVehicle['tbrk_no_eseal'];

$pdf->MultiCell(5, 1.5, $data, 1, 'C');
// $pdf->Cell(5,1,'' . $listVehicle['tbrk_ket'] . '',1,1,'C'); //vertically merged cell
}




// FOOTER BAGIAN TANDA TANGAN


//SET FONT STYLE
$pdf->SetFont('Times', 'B', 15);

$pdf->Ln();

// BAGIAN TANDA TANGAN
$pdf->Cell(3,1,'',0,1); //dummy cell to align next cell, should be invisible
$pdf->Cell(15, 0.5, 'DITERIMA,', 0, 0, 'L');
$pdf->Cell(16, 0.5, 'DISERAHKAN,', 0, 1, 'L');
$pdf->Cell(15, 1, 'SHIFT, ', 0, 0, 'L');
$pdf->Cell(24, 1, 'SHIFT, ', 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Times', 'U', 13);
$pdf->Cell(0.1, 4, '..........................', 0, 0, 'L');
$pdf->Cell(19, 4, '........................................', 0, 0, 'R');


$pdf->Ln();

$pdf->Output();
?>