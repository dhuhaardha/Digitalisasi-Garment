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
                            <h3 class="m-0 text-dark">Kunci Kendaraan Checking</h3>
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
                                            Input Operasional Kunci Kendaraan Hari Ini
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
                                                    <th>Nomor Polisi</th>
                                                    <th>Bagian Kawasan Nomor Polisi</th>
                                                    <th>Worker(Pengambilan)</th>
                                                    <th>Worker(Pengembalian)</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <!-- data informasi karyawan dari database -->
                                                <?php
                                                $currentDate = date("Y-m-d");
                                                $noUrut = 1;
                                                $KeyVehicleQuery = mysqli_query(
                                                    $koneksi,
                                                    "SELECT 
                                                        id_vehicle_key, 
                                                        GROUP_CONCAT(CONCAT(id_no_pol, '|', no_police, '|', kawasan_no_pol, '|', status, 
                                                        '|', date_taken, '|', time_taken, '|', name_taken, '|', signature_taken, '|', submitted_to,
                                                         '|', signature_retrieval, '|', amount_taken, '|', keterangan_taken,
                                                        '|', date_returned, '|', time_returned, '|', name_returned, '|', signature_returned, '|',
                                                         recieved_to, '|', amount_returned, '|', keterangan_returned) SEPARATOR '|||') AS data,
                                                    status
                                                        FROM 
                                                            tb_kunci_kendaraan
                                                    WHERE  
                                                        DATE(date_taken) = '$currentDate' OR DATE(date_returned) = '$currentDate' 
                                                        
                                                    GROUP BY 
                                                       id_vehicle_key
                                                        ORDER BY 
                                                     id_vehicle_key DESC
                                                  LIMIT 14"
                                                );
                                                while ($listKeyVehicle = mysqli_fetch_array($KeyVehicleQuery)) {
                                                    $data_array = explode('|||', $listKeyVehicle['data']);
                                                ?>

                                                    <tr>
                                                        <td><?php echo $noUrut++; ?></td>

                                                        <?php
                                                        // Explode each data item using the separator '|'

                                                        $data_item_array = explode('|', $listKeyVehicle['data']);
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
                                                        <td><?php echo $listKeyVehicle['status']; ?></td>
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
                                <form method="POST" action="print_data_kunci_ruangan.php" target="_blank">
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
                                                <select id="inputState" class="form-select" name="part_operasional" onchange="toggleFields()">
                                                    <option selected disabled>Choose Dept...</option>
                                                    <option value="1">Operational 1</option>
                                                    <option value="2">Operational 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="operational1Fields" style="display: none;">
                                            <div class="row mb-3">
                                                <label for="operational1Type" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">
                                                    <select id="operational1Type" class="form-select" onchange="toggleFields()" name="status">
                                                        <option value="pengambilan">Pengambilan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="operational2Fields" style="display: none;">
                                            <div class="row mb-3">
                                                <label for="operational2Type" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">
                                                    <select id="operational2Type" class="form-select" onchange="toggleFields()" name="status">
                                                        <option value="pengambilan">Pengambilan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pengambilanFields" style="display: none;">
                                            <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Date
                                                    Pengambilan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="pengambilanDate" name="date_retrieval" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Pengambilan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time_retrieval" name="time_retrieval" value="<?php echo date('H:i:s'); ?>">
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas
                                                    Pengambilan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="worker_retrieval">
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
                                                    <canvas id="signatureCanvas" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureData" name="signatureData">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                        <div id="pengembalianFields" style="display: none;">
                                            <div class="row mb-3">
                                                <label for="pengembalianDate" class="col-sm-2 col-form-label">Date
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="pengembalianDate" name="date_returned" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="time_returned" value="<?php echo date('H:i:s'); ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="worker_returned">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="amount_returned">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    Pengembalian</label>
                                                    <input type="text" class="form-control" id="input_name" name="signature_returned">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengembalian here -->
                                        </div>
                                        <div id="serahTerimaFields" style="display: none;">
                                            <div class="row mb-3">
                                                <label for="serahTerimaDate" class="col-sm-2 col-form-label">Date Serah
                                                    Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="serahTerimaDate" name="date_handover" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="time_handover" value="<?php echo date('H:i:s'); ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="handover_to">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="amount_handover">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_name" name="signature_handover">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to serah terima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_operasional_keyroom" class="btn btn-success">Add</button>
                                        <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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

                                            <div class="row mb-3">
                                                <label for="pengembalianDate" class="col-sm-2 col-form-label">Date
                                                    Pengembalian
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="pengembalianDate" name="date_returned" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time_returned" name="time_returned" value="<?php echo date('H:i:s'); ?>">
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    Pengembalian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_name" name="signature_returned">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengembalian here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_keyroom_to_pengembalian" class="btn btn-success">Add</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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

                                            <div class="row mb-3">
                                                <label for="pengembalianDate" class="col-sm-2 col-form-label">Date
                                                    Serah Terima
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="pengembalianDate" name="date_handover" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time_handover" name="time_handover" value="<?php echo date('H:i:s'); ?>">
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    Serah Terima</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_name" name="signature_handover">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_keyroom_to_serahterima" class="btn btn-success">Add</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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
    var canvas = document.getElementById('signatureCanvas');
    var ctx = canvas.getContext('2d');
    var isDrawing = false;

    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('touchstart', startDrawingTouch);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('touchmove', drawTouch);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('touchend', stopDrawing);

    function startDrawing(event) {
        isDrawing = true;
        draw(event);
    }

    function startDrawingTouch(event) {
        event.preventDefault();
        isDrawing = true;
        var touch = event.touches[0];
        var offsetX = touch.pageX - canvas.offsetLeft;
        var offsetY = touch.pageY - canvas.offsetTop;
        draw({
            offsetX,
            offsetY
        });
    }

    function draw(event) {
        if (!isDrawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(event.offsetX, event.offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(event.offsetX, event.offsetY);
    }

    function drawTouch(event) {
        event.preventDefault();
        if (!isDrawing) return;
        var touch = event.touches[0];
        var offsetX = touch.pageX - canvas.offsetLeft;
        var offsetY = touch.pageY - canvas.offsetTop;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(offsetX, offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(offsetX, offsetY);
    }

    function stopDrawing() {
        isDrawing = false;
        ctx.beginPath();
    }

    var clearButton = document.getElementById('clear_signature');

    clearButton.addEventListener('click', function() {
        clearSignature();
    });

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }


    // Function to convert canvas to data URL and store it in hidden input field
    function saveSignature() {
        var dataURL = canvas.toDataURL("image/png");
        document.getElementById('signatureData').value = dataURL;
    }

    // Call saveSignature() when the form is submitted
    document.querySelector('form').addEventListener('submit', saveSignature);
    </script>
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>