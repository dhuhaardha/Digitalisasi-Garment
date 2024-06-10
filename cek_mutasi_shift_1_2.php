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
                            <h3 class="m-0 text-dark">Mutasi Shift 1 & 2 Checking</h3>
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
                                        
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahShift1">
                                            <i class="fa-solid fa-plus">&nbsp</i>
                                            Input Shift 1
                                            <i class="fa-solid fa-plus">&nbsp</i>
                                        </button>

                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahShift2">
                                            <i class="fa-solid fa-plus">&nbsp</i>
                                            Input Shift 2
                                            <i class="fa-solid fa-plus">&nbsp</i>
                                        </button>

                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahShiftGS">
                                            <i class="fa-solid fa-plus">&nbsp</i>
                                            Input Shift GS
                                            <i class="fa-solid fa-plus">&nbsp</i>
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
                                            <tbody>
                                          
                                               
                                                <!-- data informasi karyawan dari database -->
                                                <?php
                                                $currentDate = date("Y-m-d");
                                                $noUrut = 1;
                                                $MutasiQuery = mysqli_query(
                                                    $koneksi,
                                                    "SELECT * FROM tb_mutasi_shift_1_to_gs  WHERE  
                                                    DATE(dibuat_pada) = '$currentDate'
                                                        ORDER BY id_mutasi_1_to_GS DESC LIMIT 14"
                                                );
                                                while ($Mutasi = mysqli_fetch_array($MutasiQuery)) {
                                                ?>
                                                        
                                                    <tr>
                                                        <td><?php echo $noUrut++; ?></td>
                                                        <td>Shift <?php echo $Mutasi['jenis']; ?></td>
                                                        <td><?php echo $Mutasi['nama']; ?></td>
                                                        <td><?php echo $Mutasi['NIK']; ?></td>
                                                        <td><?php echo $Mutasi['jabatan']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['pos']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['ttd']; ?></td>
                                                        
                                                        <td><?php echo $Mutasi['keterangan']; ?></td>
                                                
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
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

    // Send an AJAX request to save the image
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_image.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var filename = xhr.responseText;
            document.getElementById('signatureFilename').value = filename;
        }
    };
    xhr.send("imageData=" + encodeURIComponent(dataURL));
}


                                           // Call saveSignature() when the form is submitted
                                            document.querySelector('form').addEventListener('submit', saveSignature);
                                            </script>
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
                                        <button type="submit" name="tombol_tambah_shift_1_2" class="btn btn-success">Add</button>
                                        <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
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

    // Send an AJAX request to save the image
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_image.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var filename = xhr.responseText;
            document.getElementById('signatureFilename').value = filename;
        }
    };
    xhr.send("imageData=" + encodeURIComponent(dataURL));
}


                                           // Call saveSignature() when the form is submitted
                                            document.querySelector('form').addEventListener('submit', saveSignature);
                                            </script>
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
                                        <button type="submit" name="tombol_tambah_shift_2" class="btn btn-success">Add</button>
                                        <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature
                                                    </label>
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

    // Send an AJAX request to save the image
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_image.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var filename = xhr.responseText;
            document.getElementById('signatureFilename').value = filename;
        }
    };
    xhr.send("imageData=" + encodeURIComponent(dataURL));
}


                                           // Call saveSignature() when the form is submitted
                                            document.querySelector('form').addEventListener('submit', saveSignature);
                                            </script>
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
                                        <button type="submit" name="tombol_tambah_shift_GS" class="btn btn-success">Add</button>
                                        <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
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