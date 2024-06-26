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

                    <!-- Container Data Karyawan -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h3 class="m-0 text-dark">Mutasi Shift 1 & 2 Checking</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPDF">
                            <i class="fa-solid fa-pen-to-square"></i>&nbsp;Export PDF
                        </button>
</div>


                        <div class="card-body">
                        <div class="row">
    <div class="col-sm">
    <select name="jenis" onchange="showCustomer(this.value)" style="width: 90%;" class="form-control form-control-lg">
                                <option value="">Select a Shift:</option>
                                <option value="1">Shift 1</option>
                                <option value="2">Shift 2</option>
                                <option value="GS">Shift GS</option>
                            </select>
    </div>
    <div class="col-sm">
      <button type="button" class="btn-lg btn-success"  data-toggle="modal" data-target="#modalTambahShift1">
        <i class="fa-solid fa-plus">&nbsp</i>
        Input Shift 1
        <i class="fa-solid fa-plus">&nbsp</i>
    </button>
    </div>
    <div class="col-sm">
      <button type="button" class="btn-lg btn-success"  data-toggle="modal" data-target="#modalTambahShift2">
        <i class="fa-solid fa-plus">&nbsp</i>
        Input Shift 2
        <i class="fa-solid fa-plus">&nbsp</i>
    </button>
    </div>
    <div class="col-sm">
      <button type="button" class="btn-lg btn-success"  data-toggle="modal" data-target="#modalTambahShiftGS">
        <i class="fa-solid fa-plus">&nbsp</i>
        Input Shift GS
        <i class="fa-solid fa-plus">&nbsp</i>
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
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Petugas
                                                    </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="input_nama_petugas" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['tbls_nama']; ?>" selected>PILIH PETUGAS...</option>
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
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Danru
                                                    </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="input_nama_danru" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['tbls_nama']; ?>" selected>PILIH DANRU...</option>
                                                        <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_list_security WHERE tb_pangkat LIKE 'DANRU' ORDER BY tbls_nama ASC");

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
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Diterima</label>
                                            <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="input_diterima_shift">
                                                    <option selected disabled>DITERIMA SHIFT...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="GS">GS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Oleh
                                                    </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="input_nama_diterima" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['tbls_nama']; ?>" selected>PILIH SECURITY(DITERIMA)...</option>
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
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Diserahkan</label>
                                            <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="input_diserahkan_shift">
                                                    <option selected disabled>DISERAHKAN SHIFT...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="GS">GS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Oleh
                                                    </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="input_nama_diserahkan" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['tbls_nama']; ?>" selected>PILIH SECURITY(DISERAHKAN)...</option>
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
                    <div class="modal fade" id="modalTambahShift1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <canvas id="signatureCanvas" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename" name="signatureFilename">
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
                                        <button type="submit" name="tombol_tambah_shift_1_2" class="btn btn-success" id="saveSignatureBtn">Add</button>
                                        <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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