<?php
include "koneksi.php";

date_default_timezone_set('Asia/Jakarta');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php require_once "templates/header.php" ?>

<!-- Include Signature Pad CSS
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/signature_pad/dist/signature-pad.css">


<script src="https://cdn.jsdelivr.net/npm/signature_pad"></script> -->


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
                            <h3 class="m-0 text-dark">Register Surat dan Transit Paket Checking</h3>
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
                                            Input Operasional Surat dan Transit Hari Ini
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
                                                    <th>Waktu</th>
                                                    <th>Pengirim</th>
                                                    <th>Kurir</th>
                                                    <th>Kepada(Penerima)</th>
                                                    <th>Hasil Deteksi</th>
                                                    <th>Security(Dititipkan)</th>
                                                    <th>TTD, Person</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <!-- data informasi karyawan dari database -->
                                                <?php
                                                $currentDate = date("Y-m-d");
                                                $noUrut = 1;
                                                $RegisterQuery = mysqli_query(
                                                    $koneksi,
                                                    "SELECT * FROM tb_register_surat_transit  WHERE  
                                                    DATE(date) = '$currentDate'
                                                        ORDER BY ID_register DESC LIMIT 14"
                                                );
                                                while ($Register = mysqli_fetch_array($RegisterQuery)) {
                                                ?>

                                                    <tr>
                                                        <td><?php echo $noUrut++; ?></td>
                                                        <td><?php echo $Register['time']; ?></td>
                                                        <td><?php echo $Register['pengirim']; ?></td>
                                                        <td><?php echo $Register['kurir']; ?></td>
                                                        <td><?php echo $Register['kepada']; ?></td>
                                                        <td><?php echo $Register['kondisi_barang']; ?></td>
                                                        <td><?php echo $Register['security_recieved']; ?></td>
                                                        <td><?php echo $Register['ttd_office'], $Register['person_office_recieved']; ?></td>
                                                        <td><?php echo $Register['amount']; ?></td>
                                                        <td><?php echo $Register['keterangan']; ?></td>
                                                        <td>

                                                        <?php
                                                            if ($Register['ttd_office'] == '-') {
                                                                    // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                                    echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGantiSerahTerima" value="' . $Register['ID_register'] . '"><i class="fa-solid fa-handshake"></i></button>';
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
                                <form method="POST" action="print_register_surat_transit.php" target="_blank">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Transit Paket dan Surat</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div id="pengambilanFields">
                                            <div class="row mb-3">
                                                <label for="pengambilanDate" class="col-sm-2 col-form-label">Date
                                                    Register</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    Register</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time" name="time" value="<?php echo date('H:i:s'); ?>" readonly>
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pengirim</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="pengirim">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kurir</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="kurir">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kepada</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="kepada">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kondisi Barang</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="kondisi_barang">
                                                    <option selected disabled>Choose Dept...</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Rusak">Rusak</option>
                                                    <option value="Basah">Basah</option>
                                                    <option value="Robek">Robek</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Security</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="security_recieved">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="" name="amount" min="1" max="10">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="keterangan">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_register_surat_transit" class="btn btn-success">Add</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Serah Terima Surat dan Transit</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div>
                                            <input type="hidden" id="IDInput" class="form-control" name="ID_register" placeholder="Selected Date">
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas</label>
                                                <div class="col-sm-10">
                                                    <!-- Add select options for nama from tb_list_security -->
                                                    <select class="form-control" name="person_office_recieved">
                                                        <?php

                                                        $sql = "SELECT tbls_uid, tbls_nama FROM tb_list_security ORDER BY tbls_nama ASC";
                                                        $result = mysqli_query($koneksi, $sql);
                        
                                                        // Populate select options
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='". $row['tbls_nama'] ."'>". $row['tbls_nama'] ."</option>";
                                                            }
                                                        } else {
                                                            echo "<option value=''>No keys available</option>";
                                                        }
                                                        // Close database connection
                                                        ?>
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
                                            <!-- Add other fields related to serahterima here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_serahterima_transit_surat_paket" class="btn btn-success" onclick="saveSignature()">Add</button>
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
            // Initialize Signature Pad
            var canvas = document.getElementById('signatureCanvas');
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)', // set background color to white
                penColor: 'black', // set pen color to black
                maxWidth: 2, // set maximum width of the line
                throttle: 16 // set the update rate of the canvas in milliseconds
            });

            // Handle touch events
            canvas.addEventListener('touchstart', onTouchStart, false);
            canvas.addEventListener('touchmove', onTouchMove, false);

            function onTouchStart(event) {
                event.preventDefault();
                var touch = event.touches[0];
                if (touch) {
                    var x = touch.clientX;
                    var y = touch.clientY;
                    signaturePad._strokeBegin(event);
                    signaturePad._strokeUpdate(event);
                }
            }

            function onTouchMove(event) {
                event.preventDefault();
                var touch = event.touches[0];
                if (touch) {
                    var x = touch.clientX;
                    var y = touch.clientY;
                    signaturePad._strokeUpdate(event);
                }
            }

            // Function to clear the signature
            function clearSignature() {
                signaturePad.clear();
            }

            // Function to save the signature
            function saveSignature() {
                if (signaturePad.isEmpty()) {
                    alert('Please provide a signature first.');
                } else {
                    var dataURL = signaturePad.toDataURL(); // Get the signature image as data URL
                    document.getElementById('signatureFilename').value = dataURL; // Set the data URL value to the hidden input field
                    // You can proceed with saving the signature data as needed
                }
            }

            

            // Event listener for clear button
            document.getElementById('clear_signature').addEventListener('click', function() {
                clearSignature();
            });

            // Event listener for form submission
            document.querySelector('form').addEventListener('submit', function(event) {
                saveSignature();
                // You can include additional form submission handling here if needed
            });

        </script>
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>