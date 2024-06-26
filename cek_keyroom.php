<?php
include "koneksi.php";

date_default_timezone_set('Asia/Jakarta');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php require_once "templates/header.php" ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once "templates/sidebar.php" ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once "templates/topbar.php" ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="row d-flex align-items-stretch">
    <div class="col-sm-6">
        <div class="card mb-4 h-100">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Status Tanda Tangan</h5>
            </div>
            <div class="card-body">
    <?php
    $current_date = date('Y-m-d');
    $jenis_bagian_export = 'KEYROOM';
    
    // Query to retrieve signature status for specific roles and current date
    $queryStatus = mysqli_query($koneksi, 
    "SELECT jabatan_ttd, danru_export, shift 
    FROM tb_export
    WHERE jabatan_ttd = 'DITERIMA' 
    AND jenis_bagian_export = '$jenis_bagian_export'
    AND DATE(dibuat_pada) = '$current_date'
    AND shift IN (1, 2, 3)");

    
    // // Initialize status variables
    // $danru_signed = false;
    // $diterima_signed = false;
    // $diserahkan_signed = false;

    // Initialize arrays to store signature status and details
    // Initialize status array
    $signature_status_diterima = array(
        1 => array('signed' => false, 'signer' => ''),
        2 => array('signed' => false, 'signer' => ''),
        3 => array('signed' => false, 'signer' => '')
    );

    // // Iterate through query results
    // while ($row = mysqli_fetch_assoc($queryStatus)) {
    //     $jabatan_ttd = $row['jabatan_ttd'];
    //     $danru_export = $row['danru_export'];
        
        
    //     // Check each role and update status variables
    //     switch ($jabatan_ttd) {
    //         case 'DANRU':
    //             $danru_signed = !empty($danru_export);
    //             break;
    //         case 'DITERIMA':
    //             $diterima_signed = !empty($danru_export);
    //             break;
    //         case 'DISERAHKAN':
    //             $diserahkan_signed = !empty($danru_export);
    //             break;
    //         default:
    //             break;
    //     }
    // }

  // Iterasi untuk mengisi array dengan data dari query
while ($row = mysqli_fetch_assoc($queryStatus)) {
    $danru_export = $row['danru_export'];
    $shift = $row['shift'];

    // Memperbarui status tanda tangan untuk setiap shift yang sesuai
    switch ($shift) {
        case 1:
            $signature_status_diterima[1]['signed'] = !empty($danru_export);
            $signature_status_diterima[1]['signer'] = $danru_export;
            break;
        case 2:
            $signature_status_diterima[2]['signed'] = !empty($danru_export);
            $signature_status_diterima[2]['signer'] = $danru_export;
            break;
        case 3:
            $signature_status_diterima[3]['signed'] = !empty($danru_export);
            $signature_status_diterima[3]['signer'] = $danru_export;
            break;
        default:
            break;
    }
}
    
    // // Display status based on the gathered information
    // echo "<p><strong>DANRU:</strong> ";
    // echo $danru_signed ? "Sudah melakukan tanda tangan." : "Belum melakukan tanda tangan.";
    // echo "</p>";
    
    // echo "<p><strong>DITERIMA:</strong> ";
    // echo $diterima_signed ? "Sudah melakukan tanda tangan." : "Belum melakukan tanda tangan.";
    // echo "</p>";
    
    // echo "<p><strong>DISERAHKAN:</strong> ";
    // echo $diserahkan_signed ? "Sudah melakukan tanda tangan." : "Belum melakukan tanda tangan.";
    // echo "</p>";

    // Display status and signer details for each role
    
    // Menampilkan status tanda tangan untuk setiap shift
echo "<h3>Status Tanda Tangan 'DITERIMA'</h3>";
echo "<ul>";
foreach ($signature_status_diterima as $shift => $status) {
    echo "<li>Shift $shift: ";
    if ($status['signed']) {
        echo "Sudah ditandatangani oleh {$status['signer']}.";
    } else {
        echo "Belum ditandatangani.";
    }
    echo "</li>";
}
echo "</ul>";
    ?>
</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card mb-4 h-100">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Proses Tanda Tangan</h5>
            </div>
            <div class="card-body">
                <!-- <div class="text-center">

                    <button type="button" class="btn-lg btn-primary btn-block" data-toggle="modal" data-target="#modalPDF">
                        <i class="fa-solid fa-file-pdf"></i>&nbsp; Export PDF
                    </button>
                    <button type="button" class="btn-lg btn-success" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa-solid fa-signature">&nbsp</i>
                        TTD Export
                    </button>
                </div> -->
                <div class="d-flex justify-content-between">

    <div class="w-50">
        <button type="button" class="btn-lg btn-primary btn-block" data-toggle="modal" data-target="#modalPDF">
            <i class="fa-solid fa-file-pdf"></i>&nbsp; Export PDF
        </button>
    </div>

    <div class="w-50 ml-2"> <!-- ml-2 untuk memberi jarak antar tombol -->
        <button type="button" class="btn-lg btn-success btn-block" data-toggle="modal" data-target="#modalTambahTTD">
            <i class="fa-solid fa-signature"></i>&nbsp; TTD Export
        </button>
    </div>

</div>

            </div>
        </div>
    </div>
</div>

                <br>
                    <!-- Container Data Karyawan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h3 class="m-0 text-dark">Kunci Ruangan Checking</h3>                      
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPDF">
                            <i class="fa-solid fa-pen-to-square"></i>&nbsp;Export PDF Pada Tanggal
                        </button>
</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="card text-center">
                                    <div class="card-body">
                                       
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
                                            <i class="fa-solid fa-pen-to-square">&nbsp</i>
                                            Input Operasional Kunci Ruangan Hari Ini
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="table-responsive">
                                    <form method="POST" action="aksi_security.php">
                                        <br>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Part Operasional</th>
                                                    <th>Kunci</th>
                                                    <th>Jumlah Kunci</th>
                                                    <th>Worker(Pengambilan)</th>
                                                    <th>Worker(Pengembalian)</th>
                                                    <th>Worker(Serah Terima)</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <!-- data informasi karyawan dari database -->
                                                <?php
                                                $currentDate = date("Y-m-d");
                                                $noUrut = 1;
                                                $KeyRoomQuery = mysqli_query(
                                                    $koneksi,
                                                    "SELECT 
                                                        ID_kunci_ruangan, 
                                                        GROUP_CONCAT(CONCAT(id_key_room, '|', name_of_key, '|', amount_of_key, '|', part_operasional, '|', status, 
                                                        '|', date_retrieval, '|', time_retrieval, '|', worker_retrieval, '|', amount_retrieval, '|', signature_retrieval, 
                                                        '|', date_returned, '|', time_returned, '|', worker_returned, '|', amount_returned, '|', signature_returned, '|', 
                                                        date_handover, '|', time_handover, '|', handover_to, '|', amount_handover, '|', signature_handover) SEPARATOR '|||') AS data,
                                                    status
                                                        FROM 
                                                            tb_kunci_ruangan
                                                    WHERE  
                                                        -- DATE(date_retrieval) = '$currentDate' OR DATE(date_returned) = '$currentDate' OR DATE(date_handover) = '$currentDate'
                                                        DATE(date_retrieval) = '$currentDate' OR DATE(date_returned) = '$currentDate' OR DATE(date_handover) = '$currentDate'
                                                        -- (status = 'PENGAMBILAN' AND DATE(date_retrieval) = '$currentDate')
                                                        -- OR (status = 'PENGEMBALIAN' AND DATE(date_returned) = '$currentDate')
                                                        -- OR (status = 'SERAH TERIMA' AND DATE(date_handover) = '$currentDate')
                                                    GROUP BY 
                                                        ID_kunci_ruangan
                                                        ORDER BY 
        ID_kunci_ruangan DESC
    LIMIT 14"
                                                );
                                                while ($listKeyRoom = mysqli_fetch_array($KeyRoomQuery)) {
                                                    $data_array = explode('|||', $listKeyRoom['data']);
                                                ?>

                                                    <tr>
                                                        <td><?php echo $noUrut++; ?></td>

                                                        <?php
                                                        // Explode each data item using the separator '|'

                                                        $data_item_array = explode('|', $listKeyRoom['data']);
                                                        ?>
                                                        <!-- Display the individual fields -->

                                                        <?php
                                                        if ($data_item_array[3] == 1) {
                                                        ?>
                                                            <td>Operasional 1</td> <!-- part_operational -->
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td>Operasional 2</td>
                                                        <?php
                                                        }
                                                        ?>

                                                        <td><?php echo $data_item_array[1]; ?></td><!-- worker_retrieval -->
                                                        <td><?php echo $data_item_array[2]; ?></td><!-- worker_retrieval -->
                                                        <td><?php echo $data_item_array[7]; ?></td><!-- worker_retrieval -->
                                                        <td><?php echo $data_item_array[12]; ?></td><!-- worker_returned -->
                                                        <td><?php echo $data_item_array[17]; ?></td><!-- handover_to -->
                                                        <td><?php echo $listKeyRoom['status']; ?></td>
                                                        <td>

                                                        <?php
                                                            if ($listKeyRoom['status'] == 'PENGEMBALIAN') {
                                                                if ($data_item_array[3] == 1) {
                                                                    // If part_operasional == 1, the process is complete after status changes to 'PENGEMBALIAN'
                                                                    echo '<button type="button" class="btn btn-success" disabled><i class="fa-solid fa-check"></i></button>';
                                                                } else {
                                                                    // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                    echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima" value="' . $listKeyRoom['ID_kunci_ruangan'] . '"><i class="fa-solid fa-handshake"></i></button>';
                                                                }
                                                            } elseif ($listKeyRoom['status'] == 'PENGAMBILAN') {
                                                                // For 'PENGAMBILAN' status, proceed to 'PENGEMBALIAN'
                                                                echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalGantiPengembalian" value="' . $listKeyRoom['ID_kunci_ruangan'] . '"><i class="fa-solid fa-rotate-left"></i></button>';
                                                            } else {
                                                                // For other statuses, show a success button
                                                                echo '<button type="button" class="btn btn-success" disabled><i class="fa-solid fa-check"></i></button>';
                                                            }
                                                            ?>


                                                        </td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </form>
                                    <!-- Modal Tambah TTD -->
<div class="modal fade" id="modalTambahTTD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Mutasi Malam</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="aksi_security.php">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label">Bagian TTD</label>
                        <div class="col-sm-9">
                            <select id="inputState" class="form-select" name="jabatan_ttd" onchange="toggleTTDFields()" required>
                                <option value="">Choose TTD...</option>
                                <option value="DITERIMA">DITERIMA</option>
                                <option value="DISERAHKAN">DISERAHKAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="input_print_pdf" class="form-control">
                            <input type="hidden" name="input_jns_kunjungan" value="KEYROOM" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Shift</label>
                                            <div class="col-sm-9">
                                            <select id="inputState" class="form-select" name="shift">
                                                    <option selected disabled>PILIH SHIFT...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="GS">GS</option>
                                                </select>
                                            </div>
                                        </div>
                    <div id="danruFields" style="display: none;">
                        <div class="row mb-3">
                            <label for="danruName" class="col-sm-3 col-form-label">Danru</label>
                            <div class="col-sm-9">
                                <select class="form-control selectpicker" name="input_nama_danru" data-live-search="true">
                                    <option value="" selected>PILIH DANRU...</option>
                                    <?php
                                    $querySecurity = mysqli_query($koneksi, "SELECT * FROM tb_list_security WHERE tb_pangkat LIKE 'DANRU' ORDER BY tbls_nama ASC");
                                    while ($tabelSecurity = mysqli_fetch_array($querySecurity)) {
                                        echo "<option value='{$tabelSecurity['tbls_nama']}'>{$tabelSecurity['tbls_nik']} - {$tabelSecurity['tbls_nama']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="anggotaFields" style="display: none;">
                        <div class="row mb-3">
                            <label for="anggotaName" class="col-sm-3 col-form-label">Anggota</label>
                            <div class="col-sm-9">
                                <select class="form-control selectpicker" name="input_nama_anggota" data-live-search="true">
                                    <option value="" selected>PILIH ANGGOTA...</option>
                                    <?php
                                    $querySecurity = mysqli_query($koneksi, "SELECT * FROM tb_list_security WHERE tb_pangkat LIKE 'ANGGOTA' ORDER BY tbls_nama ASC");
                                    while ($tabelSecurity = mysqli_fetch_array($querySecurity)) {
                                        echo "<option value='{$tabelSecurity['tbls_nama']}'>{$tabelSecurity['tbls_nik']} - {$tabelSecurity['tbls_nama']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">TTD Ketua Regu</label>
                        <div class="col-sm-9">
                            <style>
                                canvas {
                                    border: 1px solid #000;
                                }
                            </style>
                            <div class="col-sm-4">
                                <canvas id="signatureCanvas" width="300" height="150"></canvas>
                                <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                <input type="hidden" class="form-control" id="signatureFilename" name="signatureFilename">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="tombol_tambah_ttd" class="btn btn-success" id="saveSignatureBtn">Add</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            <script src="signature_pad.umd.min.js"></script>
            <script>
                // Wait for the document to be fully loaded
                document.addEventListener("DOMContentLoaded", function() {
                    // Initialize Signature Pad
                    var canvas = document.getElementById('signatureCanvas');
                    var signaturePad = new SignaturePad(canvas, {
                        backgroundColor: 'rgb(255, 255, 255)' // set background color
                    });

                    // Clear Signature function
                    document.getElementById('clear_signature').addEventListener('click', function() {
                        signaturePad.clear(); // Clear the signature pad
                    });

                    // Form submission
                    document.getElementById('saveSignatureBtn').addEventListener('click', function() {
                        // Get the data URL of the signature
                        var dataURL = signaturePad.toDataURL();

                        // Set the data URL to the hidden input field
                        document.getElementById('signatureFilename').value = dataURL;
                    });
                });

                function toggleTTDFields() {
                    var selectedOption = document.getElementById("inputState").value;
                    var danruFields = document.getElementById("danruFields");
                    var anggotaFields = document.getElementById("anggotaFields");

                    if (selectedOption === "DANRU") {
                        danruFields.style.display = "block";
                        anggotaFields.style.display = "none";
                    } else {
                        danruFields.style.display = "none";
                        anggotaFields.style.display = "block";
                    }
                }
            </script>
        </div>
    </div>
</div>

                    <!-- End Modal -->
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                    <!-- Modal Cetak PDF -->
            <div class="modal fade" id="modalPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Export to PDF</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" action="print_keyroom.php" target="_blank">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="input_print_pdf" class="form-control">
                                            <input type="hidden" name="input_jns_kunjungan" value="KEYROOM" class="form-control">
                                        </div>
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="tombol_pdf_cctv" target="_blank" class="btn btn-success">Export</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Kunci Ruangan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputState" class="col-sm-2 col-form-label">Operasional</label>
                                            <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="part_operasional" required>
                                                    <option value="">PILIH OPERASIONAL...</option>
                                                    <option value="1">OPERASIONAL 1</option>
                                                    <option value="2">OPERASIONAL 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="operational1Fields" >
                                            <div class="row mb-3">
                                                <label for="operational1Type" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">
                                                    <select id="operational1Type" class="form-select" name="status" disabled>
                                                        <option value="pengambilan">PENGAMBILAN</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pengambilanFields" >
                                            
                                                    <input type="hidden" class="form-control" id="pengambilanDate" name="date_retrieval" value="<?php echo date('Y-m-d'); ?>">
                                            
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Pengambilan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="time_retrieval" value="<?php echo date('H:i:s'); ?>" readonly>
                                                </div>
                                            </div>
                                            <script>
                                                // Function to update the time field
                                                function updateTime() {
                                                    // Get the current time
                                                    var currentTime = new Date();
                                                    var hours = currentTime.getHours();
                                                    var minutes = currentTime.getMinutes();
                                                    var seconds = currentTime.getSeconds();

                                                    // Format the time with leading zeros if necessary
                                                    hours = (hours < 10 ? "0" : "") + hours;
                                                    minutes = (minutes < 10 ? "0" : "") + minutes;
                                                    seconds = (seconds < 10 ? "0" : "") + seconds;

                                                    // Display the formatted time in the input field
                                                    document.getElementById("time_retrieval").value = hours + ":" +
                                                        minutes +
                                                        ":" + seconds;
                                                }

                                                // Update the time initially and every second
                                                updateTime(); // Initial update
                                                setInterval(updateTime, 1000); // Update every second
                                            </script>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas Pengambilan</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="worker_retrieval" data-live-search="true">
                                                        <option value="" selected>PILIH ANGGOTA...</option>
                                                        <?php
                                                        $querySecurity = mysqli_query($koneksi, "SELECT * FROM tb_list_security WHERE tb_pangkat LIKE 'ANGGOTA' ORDER BY tbls_nama ASC");
                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)) {
                                                            echo "<option value='{$tabelSecurity['tbls_nama']}'>{$tabelSecurity['tbls_nik']} - {$tabelSecurity['tbls_nama']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kunci</label>
                <div class="col-sm-10">
                    <!-- Add select options for name_of_key from tb_list_keyroom -->
                    <select class="form-control" name="id_key_room">
                        <?php

                        $sql = "SELECT id_key_room, name_of_key, amount_of_key FROM tb_list_key_room";
                        $result = mysqli_query($koneksi, $sql);
                        
                        // Populate select options
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id_key_room'] . "''>" . $row['name_of_key'] . " - " . $row['amount_of_key'] . " Pcs</option>";
                            }
                        } else {
                            echo "<option value=''>No keys available</option>";
                        }
                        // Close database connection
                        $koneksi->close();
                        ?>
                    </select>
                    
                </div>
            </div>


                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    Pengambilan</label>
                                                <div class="col-sm-10">
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                
                                                    </style>
                                                <div class="col-sm-10">
                                                        <canvas id="signatureCanvasPengambilan" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilenamePengambilan" name="signatureFilenamePengambilan">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_operasional_keyroom" class="btn btn-success" id="saveSignatureBtnPengambilan">Add</button>
                                        <button class="btn btn-primary" id="clear_signaturePengambilan" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script src="signature_pad.umd.min.js"></script>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvasPengambilan = document.getElementById('signatureCanvasPengambilan');
        var signaturePadPengambilan = new SignaturePad(canvasPengambilan, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signaturePengambilan').addEventListener('click', function() {
            signaturePadPengambilan.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtnPengambilan').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePadPengambilan.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilenamePengambilan').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <script>
                        function toggleFields() {
                            var selectedOption = document.getElementById("inputState").value;
                            var operational1Fields = document.getElementById("operational1Fields");
                            var operational2Fields = document.getElementById("operational2Fields");
                            var pengambilanFields = document.getElementById("pengambilanFields");
                            var pengembalianFields = document.getElementById("pengembalianFields");
                            var serahTerimaFields = document.getElementById("serahTerimaFields");

                            if (selectedOption === "1") {
                                operational1Fields.style.display = "block";
                                operational2Fields.style.display = "none";
                                pengambilanFields.style.display = "none";
                                pengembalianFields.style.display = "none";
                                serahTerimaFields.style.display = "none";
                                var operational1Type = document.getElementById("operational1Type").value;
                                if (operational1Type === "pengambilan") {
                                    pengambilanFields.style.display = "block";
                                    pengembalianFields.style.display = "none";
                                    serahTerimaFields.style.display = "none";
                                } else if (operational1Type === "pengembalian") {
                                    pengambilanFields.style.display = "none";
                                    pengembalianFields.style.display = "block";
                                    serahTerimaFields.style.display = "none";
                                }
                            } else if (selectedOption === "2") {
                                operational1Fields.style.display = "none";
                                operational2Fields.style.display = "block";
                                pengambilanFields.style.display = "none";
                                pengembalianFields.style.display = "none";
                                serahTerimaFields.style.display = "none";
                                var operational2Type = document.getElementById("operational2Type").value;
                                if (operational2Type === "pengambilan") {
                                    operational2Fields.style.display = "block";
                                    pengambilanFields.style.display = "block";
                                    pengembalianFields.style.display = "none";
                                    serahTerimaFields.style.display = "none";
                                } else if (operational2Type === "pengembalian") {
                                    operational2Fields.style.display = "block";
                                    pengambilanFields.style.display = "none";
                                    pengembalianFields.style.display = "block";
                                    serahTerimaFields.style.display = "none";
                                } else if (operational2Type === "serah terima") {
                                    operational2Fields.style.display = "block";
                                    pengambilanFields.style.display = "none";
                                    pengembalianFields.style.display = "none";
                                    serahTerimaFields.style.display = "block";
                                }
                            } else {
                                operational1Fields.style.display = "none";
                                operational2Fields.style.display = "none";
                                pengambilanFields.style.display = "none";
                                pengembalianFields.style.display = "none";
                                serahTerimaFields.style.display = "none";
                            }
                        }
                    </script>

                    <!-- End Modal -->


                    <!-- Modal Ganti Pengembalian -->
                    <div class="modal fade" id="modalGantiPengembalian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Pengembalian Kunci Ruangan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="InputID" class="form-control" name="ID_kunci_ruangan" placeholder="Selected Date">

                                            
                                            
                                                    <input type="hidden" class="form-control" id="pengembalianDate" name="date_returned" value="<?php echo date('Y-m-d'); ?>">
                                            
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time_returned" name="time_returned" value="<?php echo date('H:i:s'); ?>" readonly>
                                                </div>
                                            </div>
                                            <script>
                                                // Function to update the time field
                                                function updateTime() {
                                                    // Get the current time
                                                    var currentTime = new Date();
                                                    var hours = currentTime.getHours();
                                                    var minutes = currentTime.getMinutes();
                                                    var seconds = currentTime.getSeconds();

                                                    // Format the time with leading zeros if necessary
                                                    hours = (hours < 10 ? "0" : "") + hours;
                                                    minutes = (minutes < 10 ? "0" : "") + minutes;
                                                    seconds = (seconds < 10 ? "0" : "") + seconds;

                                                    // Display the formatted time in the input field
                                                    document.getElementById("time_returned").value = hours + ":" +
                                                        minutes +
                                                        ":" + seconds;
                                                }

                                                // Update the time initially and every second
                                                updateTime(); // Initial update
                                                setInterval(updateTime, 1000); // Update every second
                                            </script>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="worker_returned">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature</label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                </style>
                                                <div class="col-sm-10">
                                                        <canvas id="signatureCanvasPengembalian" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilenamePengembalian" name="signatureFilenamePengembalian">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengembalian here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_keyroom_to_pengembalian" class="btn btn-success" id="saveSignatureBtnPengembalian">Add</button>
                                        <button class="btn btn-primary" id="clear_signaturePengembalian" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script src="signature_pad.umd.min.js"></script>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvasPengembalian = document.getElementById('signatureCanvasPengembalian');
        var signaturePadPengembalian = new SignaturePad(canvasPengembalian, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signaturePengembalian').addEventListener('click', function() {
            signaturePadPengembalian.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtnPengembalian').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePadPengembalian.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilenamePengembalian').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->

                    <!-- Modal Ganti Serah Terima -->
                    <div class="modal fade" id="modalGantiSerahTerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima Kunci Ruangan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput" class="form-control" name="ID_kunci_ruangan" placeholder="Selected Date">

                                            
                                            
                                                    <input type="hidden" class="form-control" id="pengembalianDate" name="date_handover" value="<?php echo date('Y-m-d'); ?>">
                                            
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time_handover" name="time_handover" value="<?php echo date('H:i:s'); ?>" readonly>
                                                </div>
                                            </div>
                                            <script>
                                                // Function to update the time field
                                                function updateTime() {
                                                    // Get the current time
                                                    var currentTime = new Date();
                                                    var hours = currentTime.getHours();
                                                    var minutes = currentTime.getMinutes();
                                                    var seconds = currentTime.getSeconds();

                                                    // Format the time with leading zeros if necessary
                                                    hours = (hours < 10 ? "0" : "") + hours;
                                                    minutes = (minutes < 10 ? "0" : "") + minutes;
                                                    seconds = (seconds < 10 ? "0" : "") + seconds;

                                                    // Display the formatted time in the input field
                                                    document.getElementById("time_handover").value = hours + ":" +
                                                        minutes +
                                                        ":" + seconds;
                                                }

                                                // Update the time initially and every second
                                                updateTime(); // Initial update
                                                setInterval(updateTime, 1000); // Update every second
                                            </script>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="handover_to">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature</label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                </style>
                                                <div class="col-sm-10">
                                                        <canvas id="signatureCanvasSerahTerima" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilenameSerahTerima" name="signatureFilenameSerahTerima">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_keyroom_to_serahterima" class="btn btn-success" id="saveSignatureBtnSerahTerima">Add</button>
                                        <button class="btn btn-primary" id="clear_signatureSerahTerima" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script src="signature_pad.umd.min.js"></script>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvasSerahTerima = document.getElementById('signatureCanvasSerahTerima');
        var signaturePadSerahTerima = new SignaturePad(canvasSerahTerima, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signatureSerahTerima').addEventListener('click', function() {
            signaturePadSerahTerima.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtnSerahTerima').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePadSerahTerima.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilenameSerahTerima').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->





                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; IT Department 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cek Session -->
        <?php
        if (@$_SESSION['sukses']) {
        ?>
            <script>
                Swal.fire({
                    title: 'SUCCESS!',
                    text: '<?php echo $_SESSION['sukses']; ?>',
                    icon: 'success',
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
        <?php
            unset($_SESSION['sukses']);
        } elseif (@$_SESSION['gagal']) {
        ?>
            <script>
                Swal.fire({
                    title: 'FAILED!',
                    text: '<?php echo $_SESSION['gagal']; ?>',
                    icon: 'error',
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>


        <?php
            unset($_SESSION['gagal']);
        }
        ?>
        
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiPengembalian"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var IDValue = button.value;

                    // Set the value to the input field
                    document.getElementById("InputID").value = IDValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput").value = dateValue;
                });
            });
        </script>
        
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>