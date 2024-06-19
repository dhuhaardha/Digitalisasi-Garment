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

                    <!-- Container Data Karyawan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 text-dark">Mutasi Shift Checking</h3>
                        </div>

                        <div class="card-body">


                            <p class="fs-3 fw-bold text-center">
                                PT. UNGARAN SARI GARMENTS </br>
                                SECURITY - UNGARAN </br>
                                </br>
                                DAILY CHECK</br>
                            <h6 class="text-center">Date : <?php echo DATE('d-m-Y'); ?></h6>
                            </p>

                            </br>

                            <div class="row">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPDF">
                                            <i class="fa-solid fa-pen-to-square">&nbsp</i>
                                            Export PDF Pada Tanggal
                                        </button>
                                        
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
                                            <i class="fa-solid fa-pen-to-square">&nbsp</i>
                                            Input Operasional Shift Hari Ini
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="table-responsive">
                                    
                                        <br>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                              <style>
                                                th, td {
                                                  text-align: center;
                                                }
                                              </style>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">NAMA</th>
                                                    <th rowspan="2">NIK</th>
                                                    <th colspan="">22:00</th>
                                                    <th colspan="">23:00</th>
                                                    <th colspan="">00:00</th>
                                                    <th colspan="">01:00</th>
                                                    <th colspan="">02:00</th>
                                                    <th colspan="">03:00</th>
                                                    <th colspan="">04:00</th>
                                                    <th colspan="">05:00</th>
                                                    <th rowspan="2">Paraf</th>
                                                    <th rowspan="2">Keterangan</th>
                                                    <th rowspan="2">ACTION</th>
                                                </tr>
                                                <tr>
                                                  <th>POS</th>
                                                  <th>POS</th>
                                                  <th>POS</th>
                                                  <th>POS</th>
                                                  <th>POS</th>
                                                  <th>POS</th>
                                                  <th>POS</th>
                                                  <th>POS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                          
                                               
                                                <!-- data informasi karyawan dari database -->
                                                <?php
                                                $currentDate = date("Y-m-d");
                                                $noUrut = 1;
                                                $MutasiQuery = mysqli_query(
                                                    $koneksi,
                                                    "SELECT * FROM tb_mutasi_shift_3  WHERE  
                                                    DATE(date) = '$currentDate'
                                                        ORDER BY ID_mutasi_shift_3 DESC LIMIT 14"
                                                );
                                                while ($Mutasi = mysqli_fetch_array($MutasiQuery)) {
                                                ?>
                                                        
                                                    <tr>
                                                        <td><?php echo $noUrut++; ?></td>
                                                        <td><?php echo $Mutasi['nama']; ?></td>
                                                        <td><?php echo $Mutasi['NIK']; ?></td>
                                                        <td><?php echo $Mutasi['pos_10']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos_11']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos_12']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos_01']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos_02']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos_03']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos_04']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos_05']; ?></td>
                                                        <td><?php echo $Mutasi['paraf_05']; ?></td>
                                                        <td><?php echo $Mutasi['keterangan']; ?></td>
                                                        <td>

                                                        <?php
                                                            if ($Mutasi['pos_11'] == "") {
                                                                    // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                    echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima" value="' . $Mutasi['ID_mutasi_shift_3'] . '"><i class="fa-solid fa-handshake"></i> 11</button>';
                                                            } elseif ($Mutasi['pos_12'] == "") {
                                                                // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima12" value="' . $Mutasi['ID_mutasi_shift_3'] . '"><i class="fa-solid fa-handshake"></i> 12</button>';
                                                            } elseif ($Mutasi['pos_01'] == "") {
                                                                // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima01" value="' . $Mutasi['ID_mutasi_shift_3'] . '"><i class="fa-solid fa-handshake"></i> 01</button>';
                                                            } elseif ($Mutasi['pos_02'] == "") {
                                                                // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima02" value="' . $Mutasi['ID_mutasi_shift_3'] . '"><i class="fa-solid fa-handshake"></i> 02</button>';
                                                            }elseif ($Mutasi['pos_03'] == "") {
                                                                // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima03" value="' . $Mutasi['ID_mutasi_shift_3'] . '"><i class="fa-solid fa-handshake"></i> 03</button>';
                                                            } elseif ($Mutasi['pos_04'] == "") {
                                                                // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima04" value="' . $Mutasi['ID_mutasi_shift_3'] . '"><i class="fa-solid fa-handshake"></i> 04</button>';
                                                            } elseif ($Mutasi['pos_05'] == "") {
                                                                // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima05" value="' . $Mutasi['ID_mutasi_shift_3'] . '"><i class="fa-solid fa-handshake"></i> 05</button>';
                                                            } else {
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
                                <form method="POST" action="print_mutasi_shift_3.php" target="_blank">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="input_print_pdf" class="form-control">
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
                                        <div id="pengambilanFields">
                                        <input type="hidden" class="form-control" id="" name="date" value="<?php echo date('Y-m-d'); ?>">
                                            <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Nama Security
                                                    </label>
                                                <div class="col-sm-10">
                                                <select class="form-control" name="nama">
                                                        <?php

                                                        $sql = "SELECT tbls_nama FROM tb_list_security";
                                                        $result = mysqli_query($koneksi, $sql);
                        
                                                        // Populate select options
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='" . $row['tbls_nama'] . "''>" . $row['tbls_nama'] . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option value=''>No security available</option>";
                                                        }
                                                        // Close database connection
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
                                                    <input type="number" class="form-control" id="" name="NIK">
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
                                                <select id="inputState" class="form-select" name="pos_10">
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
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_shift_malam" class="btn btn-success" id="saveSignatureBtn">Add</button>
                                        <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima POS Malam</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput" class="form-control" name="ID_mutasi_shift_3" placeholder="Selected Date">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">POS</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos_11">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                
                                                    </style>
                                                <div class="col-sm-10">
                                                    <canvas id="signatureCanvas11" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename11" name="signatureFilename11">

                                                </div>
                                            </div>
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_pos_11" class="btn btn-success" id="saveSignatureBtn11">Add</button>
                                        <button class="btn btn-primary" id="clear_signature11" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas11');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature11').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn11').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename11').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->

                    <!-- Modal Ganti Serah Terima -->
                    <div class="modal fade" id="modalGantiSerahTerima12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima POS Malam</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput12" class="form-control" name="ID_mutasi_shift_3">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">POS 12</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos_12">
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
                                                        <canvas id="signatureCanvas12" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename12" name="signatureFilename12">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_pos_12" class="btn btn-success" id="saveSignatureBtn12">Add</button>
                                        <button class="btn btn-primary" id="clear_signature12" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas12');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature12').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn12').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename12').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->


                    <!-- Modal Ganti Serah Terima 01 -->
                    <div class="modal fade" id="modalGantiSerahTerima01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima POS Malam</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput01" class="form-control" name="ID_mutasi_shift_3" placeholder="Selected Date">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">POS 01</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos_01">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                
                                                    </style>
                                                <div class="col-sm-10">
                                                    <canvas id="signatureCanvas01" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename01" name="signatureFilename01">

                                                </div>
                                            </div>
                                            
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_pos_01" class="btn btn-success" id="saveSignatureBtn01">Add</button>
                                        <button class="btn btn-primary" id="clear_signature01" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas01');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature01').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn01').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename01').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->

                    <!-- Modal Ganti Serah Terima 02 -->
                    <div class="modal fade" id="modalGantiSerahTerima02" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima POS Malam</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput02" class="form-control" name="ID_mutasi_shift_3" placeholder="Selected Date">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">POS 02</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos_02">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                
                                                    </style>
                                                <div class="col-sm-10">
                                                    <canvas id="signatureCanvas02" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename02" name="signatureFilename02">

                                                </div>
                                            </div>
                                            
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_pos_02" class="btn btn-success" id="saveSignatureBtn02">Add</button>
                                        <button class="btn btn-primary" id="clear_signature02" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas02');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature02').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn02').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename02').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->

                    <!-- Modal Ganti Serah Terima 03 -->
                    <div class="modal fade" id="modalGantiSerahTerima03" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima POS Malam</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput03" class="form-control" name="ID_mutasi_shift_3" placeholder="Selected Date">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">POS 03</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos_03">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                
                                                    </style>
                                                <div class="col-sm-10">
                                                    <canvas id="signatureCanvas03" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename03" name="signatureFilename03">

                                                </div>
                                            </div>
                                            
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_pos_03" class="btn btn-success" id="saveSignatureBtn03">Add</button>
                                        <button class="btn btn-primary" id="clear_signature03" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas03');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature03').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn03').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename03').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->

                    <!-- Modal Ganti Serah Terima 04 -->
                    <div class="modal fade" id="modalGantiSerahTerima04" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima POS Malam</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput04" class="form-control" name="ID_mutasi_shift_3" placeholder="Selected Date">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">POS 04</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos_04">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                
                                                    </style>
                                                <div class="col-sm-10">
                                                    <canvas id="signatureCanvas04" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename04" name="signatureFilename04">

                                                </div>
                                            </div>
                                            
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_pos_04" class="btn btn-success" id="saveSignatureBtn04">Add</button>
                                        <button class="btn btn-primary" id="clear_signature04" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas04');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature04').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn04').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename04').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->

                    <!-- Modal Ganti Serah Terima 05 -->
                    <div class="modal fade" id="modalGantiSerahTerima05" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima POS Malam</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput05" class="form-control" name="ID_mutasi_shift_3" placeholder="Selected Date">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">POS 05</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="pos_05">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="K">K</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4/5">4/5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                
                                                    </style>
                                                <div class="col-sm-10">
                                                    <canvas id="signatureCanvas05" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename05" name="signatureFilename05">

                                                </div>
                                            </div>
                                           
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_pos_05" class="btn btn-success" id="saveSignatureBtn05">Add</button>
                                        <button class="btn btn-primary" id="clear_signature05" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas05');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature05').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn05').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename05').value = dataURL;
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
        
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>