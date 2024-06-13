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
$pdf = new FPDF('P','cm','A4');
$pdf->SetMargins(0.4, 0.5, 0.5, 0.5);

$pdf->AddPage();

$pdf->SetFont('Times', 'B', 10);

// AWAL REPORT HEADER

$pdf->Cell(10, 1, 'PT UNGARAN SARI GARMENTS', 0, 0, 'L');
$pdf->Cell(10, 1, "HARI/TANGGAL : " . $date, 0, 1, 'R');
$pdf->Cell(10, 0.5, 'SECURITY - UNGARAN', 0, 0, 'L');
$pdf->Cell(10, 0.5, "JAM                        : " . $date, 0, 1, 'R');
$pdf->Cell(20, 1, 'SHIFT/DAN RU      :   3/3', 0, 1, 'C');
// $pdf->Cell(87, 10, '', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 7);
// $pdf->Cell(58, 0.8, "Tanggal cetak : " . $date, 0, 0, 'L');
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

$pdf->SetFont('Times', 'B', 7);
$pdf->Cell(10, 1, 'BARANG INVENTARIS :', 0, 1, 'L');

$no = 1;
$sql = "SELECT * FROM `tb_logs_barang_inventaris_mutasi_shift` WHERE  
        DATE(date_created) = '$date' AND shift = '3'
        ORDER BY ID_logs_barang_inventaris ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {

$pdf->Cell(10, 0.4, '=>               ' . $row['barang_inventaris'] . ' :            ' . $row['shift'] . '', 0, 1, 'L');
}


$pdf->Cell(1,1.4,'',0,1,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(0.6,0.8,'NO',1,0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(1.5,0.8,'JAM','TB',0,'C'); //vertically merged cell
$pdf->Cell(16.5,0.8,'URAIAN','LBT',0,'C'); //vertically merged cell
$pdf->Cell(1.4,0.8,'S/D','1',1,'C'); //vertically merged cell

// DATA
$no = 1;
$sql = "SELECT * FROM `tb_logs_activity_mutasi_shift` WHERE  
        DATE(dibuat_pada) = '$date' AND shift = '3'
        ORDER BY id_logs_activity_shift ASC";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
$pdf->Cell(0.6,3.8,$no++,'LBR',0,'C'); //vertically merged cell, height=3x row height=3x10=30
$pdf->Cell(1.5,3.8,'' . $row['time_uraian_created'] . '','B',0,'C'); //vertically merged cell
$pdf->Cell(16.5,3.8,'' . $row['uraian'] . '','LBR',0,'C'); //vertically merged cell
$pdf->Cell(1.4,3.8,'' . $row['time_uraian_finished'] . '','LRB',1,'C'); //vertically merged cell
}




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