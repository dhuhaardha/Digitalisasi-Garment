<?php
include "koneksi.php";

date_default_timezone_set('Asia/Jakarta');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php require_once "templates/header.php" ?>

<body id="page-top">
<script src="signature_pad.umd.min.js"></script>
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
    $jenis_bagian_export = 'CEK MUTASI SHIFT 1 & 2';
    
    // Query to retrieve signature status for specific roles and current date
    $queryStatus = mysqli_query($koneksi, 
        "SELECT jabatan_ttd, danru_export, shift 
        FROM tb_export
        WHERE jabatan_ttd IN ('DANRU', 'DITERIMA', 'DISERAHKAN', 'PETUGAS')
        AND jenis_bagian_export = '$jenis_bagian_export'
        AND DATE(dibuat_pada) = '$current_date'");
    
    // // Initialize status variables
    // $danru_signed = false;
    // $diterima_signed = false;
    // $diserahkan_signed = false;

    // Initialize arrays to store signature status and details
    $signature_status = array(
        'DANRU' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'DITERIMA' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'DISERAHKAN' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'PETUGAS' => array('signed' => false, 'signer' => '', 'shift' => '')
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

    // Iterate through query results
    while ($row = mysqli_fetch_assoc($queryStatus)) {
        $jabatan_ttd = $row['jabatan_ttd'];
        $danru_export = $row['danru_export'];
        $shift = $row['shift'];
        
        // Update signature status and details for each role
        switch ($jabatan_ttd) {
            case 'DANRU':
                $signature_status['DANRU']['signed'] = !empty($danru_export);
                $signature_status['DANRU']['signer'] = $danru_export;
                $signature_status['DANRU']['shift'] = $shift;
                break;
            case 'DITERIMA':
                $signature_status['DITERIMA']['signed'] = !empty($danru_export);
                $signature_status['DITERIMA']['signer'] = $danru_export;
                $signature_status['DITERIMA']['shift'] = $shift;
                break;
            case 'DISERAHKAN':
                $signature_status['DISERAHKAN']['signed'] = !empty($danru_export);
                $signature_status['DISERAHKAN']['signer'] = $danru_export;
                $signature_status['DISERAHKAN']['shift'] = $shift;
                break;
            case 'PETUGAS':
                $signature_status['PETUGAS']['signed'] = !empty($danru_export);
                $signature_status['PETUGAS']['signer'] = $danru_export;
                $signature_status['PETUGAS']['shift'] = $shift;
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
    echo "<p><strong>DANRU:</strong> ";
    if ($signature_status['DANRU']['signed']) {
        echo "Sudah melakukan tanda tangan oleh {$signature_status['DANRU']['signer']} pada shift {$signature_status['DANRU']['shift']}.";
    } else {
        echo "Belum melakukan tanda tangan.";
    }
    echo "</p>";
    
    echo "<p><strong>DITERIMA:</strong> ";
    if ($signature_status['DITERIMA']['signed']) {
        echo "Sudah melakukan tanda tangan oleh {$signature_status['DITERIMA']['signer']} pada shift {$signature_status['DITERIMA']['shift']}.";
    } else {
        echo "Belum melakukan tanda tangan.";
    }
    echo "</p>";
    
    echo "<p><strong>DISERAHKAN:</strong> ";
    if ($signature_status['DISERAHKAN']['signed']) {
        echo "Sudah melakukan tanda tangan oleh {$signature_status['DISERAHKAN']['signer']} pada shift {$signature_status['DISERAHKAN']['shift']}.";
    } else {
        echo "Belum melakukan tanda tangan.";
    }
    echo "</p>";

    echo "<p><strong>PETUGAS:</strong> ";
    if ($signature_status['PETUGAS']['signed']) {
        echo "Sudah melakukan tanda tangan oleh {$signature_status['PETUGAS']['signer']} pada shift {$signature_status['PETUGAS']['shift']}.";
    } else {
        echo "Belum melakukan tanda tangan.";
    }
    echo "</p>";
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
        <button type="button" class="btn-lg btn-success btn-block" data-toggle="modal" data-target="#modalTambah">
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
                    <div class="card-header text-center">
                        <h3 class="m-0 text-dark">Mutasi Shift 1 & 2 Checking</h3>
                    </div>


                        <div class="card-body">
                        <div class="d-flex justify-content-between">
    <div class="col-sm-4">
    <select name="jenis" onchange="showCustomer(this.value)" style="width: 90%;" class="form-control form-control-lg">
                                <option value="">Select a Shift:</option>
                                <option value="1">Shift 1</option>
                                <option value="2">Shift 2</option>
                                <option value="GS">Shift GS</option>
                            </select>
    </div>
    
    <div class="">
      <button type="button" class="btn-lg btn-success"  data-toggle="modal" data-target="#modalTambahShift">
      <i class="fa-solid fa-square-pen">&nbsp</i>
        Input Operasional 
        
    </button>
    </div>
  </div>
                            
                        
                            </p>

                            </br>
                            
                            <div class="row">
                                <div class="table-responsive">
                                <table class='table table-bordered' id='dataTable' width='100%'' cellspacing='0'>
<thead>
<style>
      th, td {
        text-align: center;
      }
    </style>
<tr>
<th>No</th>
<th>SHIFT</th>
<th>NAMA</th>
<th>NIK</th>
<th>JABATAN</th>
<th>POS</th>
<th>TTD</th>
<th>KETERANGAN</th>
</tr>
</thead>
<tbody id="txtHint">
</tbody>
                                </table>
                                </div>
                                
                            </div>

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                    <!-- Modal Tambah TTD -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <option value="DANRU">DANRU</option>
                                <option value="DITERIMA">DITERIMA</option>
                                <option value="DISERAHKAN">DISERAHKAN</option>
                                <option value="PETUGAS">PETUGAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="input_print_pdf" class="form-control">
                            <input type="hidden" name="input_jns_kunjungan" value="CEK MUTASI SHIFT 1 & 2" class="form-control">
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

                    <!-- Modal Cetak PDF -->
                    <div class="modal fade" id="modalPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Export to PDF pada Tanggal</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="print_mutasi_shift_1_to_gs.php" target="_blank">
                                    <div class="modal-body">
                                    <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="input_print_pdf" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mulai</label>
                                            <div class="col-sm-10">
                                                <input type="time" name="input_time_mulai" class="form-control" placeholder="Jam mulai" min="00:00" max="23:59">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Selesai</label>
                                            <div class="col-sm-10">
                                                <input type="time" name="input_time_selesai" class="form-control" placeholder="Jam selesai" min="00:00" max="23:59">
                                            </div>
                                        </div>
                                        
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">HR/GA</label>
                                            <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="input_hr">
                                                    <option selected disabled>DISERAHKAN HR...</option>
                                                    <option value="REDY HARYOKO">REDY HARYOKO</option>
                                                    <option value="RIZKI AKBAR">RIZKI AKBAR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" target="_blank" class="btn btn-success">Export</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modalTambahShift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Mutasi Shift 1</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div id="pengambilanFields">
                                        <input type="hidden" class="form-control" id="" name="date" value="<?php echo date('Y-m-d'); ?>">
                                        <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">SHIFT</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="shift" required>
                                                    <option value="">PILIH SHIFT...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="GS">GS</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Nama Security
                                                    </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="nama" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['tbls_nik']; ?>" selected>PILIH SECURITY...</option>
                                                        <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_list_security ORDER BY tbls_nama ASC");

                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)){        
                                                    ?>

                                                            
                                                            <option value='<?php echo $tabelSecurity['tbls_nama']; ?>' data-nik='<?php echo $tabelSecurity['tbls_nik']; ?>' data-jabatan='<?php echo $tabelSecurity['tb_pangkat']; ?>'>
    <?php echo $tabelSecurity['tbls_nik'] . " - " . $tabelSecurity['tbls_nama']; ?>
</option>

                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <input type="hidden" class="form-control" id="time" name="time" value="<?php echo date('H:i:s'); ?>">
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
                                                    document.getElementById("time").value = hours + ":" +
                                                        minutes +
                                                        ":" + seconds;
                                                }

                                                // Update the time initially and every second
                                                updateTime(); // Initial update
                                                setInterval(updateTime, 1000); // Update every second
                                            </script>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="" name="NIK" required maxlength="9">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="jabatan">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">POS</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
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
                                                        <canvas id="signatureCanvas1" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename1" name="signatureFilename1">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="" name="keterangan" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_shift_1_2" class="btn btn-success" id="saveSignatureBtn1">Add</button>
                                        <button class="btn btn-primary" id="clear_signature1" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas1 = document.getElementById('signatureCanvas1');
        var signaturePad1 = new SignaturePad(canvas1, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature1').addEventListener('click', function() {
            signaturePad1.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn1').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL1 = signaturePad1.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename1').value = dataURL1;
        });
    });
</script>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    
                     <!-- Modal Tambah -->
                     <div class="modal fade" id="modalTambahShift2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Mutasi Shift 2</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div id="pengambilanFields">
                                        <input type="hidden" class="form-control" id="" name="date" value="<?php echo date('Y-m-d'); ?>">
                                            <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Nama Security
                                                    </label>
                                                <div class="col-sm-10">
                                                <select class="form-control selectpicker" name="nama" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['tbls_nik']; ?>" selected>PILIH SECURITY...</option>
                                                        <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_list_security ORDER BY tbls_nama ASC");

                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)){        
                                                    ?>

                                                            <option value='<?php echo $tabelSecurity['tbls_nama']; ?>'><?php echo $tabelSecurity['tbls_nik'] . " - " . $tabelSecurity['tbls_nama']; ?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <input type="hidden" class="form-control" id="time" name="time" value="<?php echo date('H:i:s'); ?>">
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
                                                    document.getElementById("time").value = hours + ":" +
                                                        minutes +
                                                        ":" + seconds;
                                                }

                                                // Update the time initially and every second
                                                updateTime(); // Initial update
                                                setInterval(updateTime, 1000); // Update every second
                                            </script>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="" name="NIK" required maxlength="9">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="jabatan">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">POS</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
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
                                                        <canvas id="signatureCanvas2" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename2" name="signatureFilename2">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="" name="keterangan" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_shift_2" class="btn btn-success" id="saveSignatureBtn2">Add</button>
                                        <button class="btn btn-primary" id="clear_signature2" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas2');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature2').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn2').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename2').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                     <!-- Modal Tambah -->
                     <div class="modal fade" id="modalTambahShiftGS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Mutasi Shift GS</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div id="pengambilanFields">
                                        <input type="hidden" class="form-control" id="" name="date" value="<?php echo date('d-m-Y'); ?>">
                                            <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Nama Security
                                                    </label>
                                                <div class="col-sm-10">
                                                <select class="form-control selectpicker" name="nama" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['tbls_nik']; ?>" selected>PILIH SECURITY...</option>
                                                        <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_list_security ORDER BY tbls_nama ASC");

                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)){        
                                                    ?>

                                                            <option value='<?php echo $tabelSecurity['tbls_nama']; ?>'><?php echo $tabelSecurity['tbls_nik'] . " - " . $tabelSecurity['tbls_nama']; ?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <input type="hidden" class="form-control" id="time" name="time" value="<?php echo date('H:i:s'); ?>">
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
                                                    document.getElementById("time").value = hours + ":" +
                                                        minutes +
                                                        ":" + seconds;
                                                }

                                                // Update the time initially and every second
                                                updateTime(); // Initial update
                                                setInterval(updateTime, 1000); // Update every second
                                            </script>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="" name="NIK" required maxlength="9">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="jabatan">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">POS</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
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
                                                        <canvas id="signatureCanvasGS" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilenameGS" name="signatureFilenameGS">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="" name="keterangan" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_shift_GS" class="btn btn-success" id="saveSignatureBtnGS">Add</button>
                                        <button class="btn btn-primary" id="clear_signatureGS" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvasGS');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signatureGS').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtnGS').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilenameGS').value = dataURL;
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
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update NIK and Jabatan based on selected security
        var selectSecurity = document.querySelector('select[name="nama"]');
        var inputNIK = document.querySelector('input[name="NIK"]');
        var inputJabatan = document.querySelector('input[name="jabatan"]');

        // Add change event listener to select box
        selectSecurity.addEventListener('change', function() {
            // Get the selected option
            var selectedOption = this.options[this.selectedIndex];

            // Set NIK and Jabatan based on selected option
            inputNIK.value = selectedOption.dataset.nik;
            inputJabatan.value = selectedOption.dataset.jabatan;
        });
    });
</script>
        
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
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima12"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput12").value = dateValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima01"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput01").value = dateValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima02"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput02").value = dateValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima03"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput03").value = dateValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima04"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput04").value = dateValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima05"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput05").value = dateValue;
                });
            });
        </script>
        

<script>
function showCustomer(int) {
  if (int == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "getseccurityshift.php?q="+int, true);
  xhttp.send();
}
</script>
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>