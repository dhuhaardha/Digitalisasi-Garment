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
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h3 class="m-0 text-dark">Kunci Kendaraan Checking</h3>                      
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
                                                    <th>Kawasan Operasional</th>
                                                    <th>Kunci</th>
                                                    <th>Jumlah Kunci</th>
                                                    <th>Worker(Pengambilan)</th>
                                                    <th>Diserahkan</th>
                                                    <th>Worker(Pengembalian)</th>
                                                    <th>Diterima</th>
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
                                                         '|', amount_taken, '|', keterangan_taken,
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

                                                        

                                                        <td><?php echo $data_item_array[2]; ?></td>
                                                        <td><?php echo $data_item_array[1]; ?></td>
                                                        <td><?php echo $data_item_array[9]; ?></td>
                                                        <td><?php echo $data_item_array[6]; ?></td>
                                                        <td><?php echo $data_item_array[8]; ?></td>
                                                        <td><?php echo $data_item_array[13]; ?></td>
                                                        <td><?php echo $data_item_array[15]; ?></td>
                                                        <td><?php echo $listKeyVehicle['status']; ?></td>
                                                        <td>

                                                        <?php
                                                        if ($listKeyVehicle['status'] == 'DIAMBIL') {
                                                                // If part_operasional == 2, continue until status becomes 'SERAH TERIMA'
                                                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal1" value="' . $listKeyVehicle['id_vehicle_key'] . '"><i class="fa-solid fa-rotate-left"></i></button>';
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
                                <form method="POST" action="print_key_vehicle.php" target="_blank">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="input_print_pdf" class="form-control">
                                                <input type="hidden" name="input_jns_kunjungan" value="KUNCI KENDARAAN" class="form-control">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Kunci Kendaraan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputState" class="col-sm-2 col-form-label">Operasional</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="status" value="DIAMBIL"  disabled>
                                            </div>
                                        </div> 
                                            
                                                    <input type="hidden" class="form-control" id="diambilDate" name="date_taken" value="<?php echo date('Y-m-d'); ?>" readonly>
                                            
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jam
                                                    </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time_taken" name="time_taken" value="<?php echo date('H:i:s'); ?>" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Driver
                                                    </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="name_taken" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['uid_driver']; ?>" selected>PILIH SUPIR...</option>
                                                    <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_driver WHERE status LIKE 'ACTIVE' ORDER BY nama ASC");

                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)){        
                                                    ?>

                                                            <option value='<?php echo $tabelSecurity['nama']; ?>'><?php echo $tabelSecurity['nama']; ?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </select>
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kawasan No Pol</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kawasan_no_pol" id="kawasan_no_pol" onchange="fetchKeyRooms(this.value)">
                                                        <!-- Add options for kawasan_no_pol -->
                                                        <option value="">Pilih Kawasan Kendaraan..</option>
                                                        <option value="UNGARAN">UNGARAN</option>
                                                        <option value="PRINGAPUS">PRINGAPUS</option>
                                                        <option value="CONGOL">CONGOL</option>
                                                        <option value="OTHER">OTHER</option>
                                                        <!-- Add more options as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kunci</label>
                                                <div class="col-sm-10">
                                                    <!-- Add select options for name_of_key from tb_list_keyroom -->
                                                    <select class="form-control" name="id_no_pol" id="id_no_pol">
                                                        <!-- Options will be populated dynamically using JavaScript -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Diserahkan
                                                    </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="submitted_to">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="amount_taken" class="col-sm-2 col-form-label">Fisik Kunci
                                                    </label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control"  id="amount_taken" name="amount_taken" min="1" max="2">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan
                                                    </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="" name="keterangan_taken">
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
                                                        <canvas id="signatureCanvasPengambilanVehicle" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilenamePengambilanVehicle" name="signatureFilenamePengambilanVehicle">
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_operasional_key_vehicle" class="btn btn-success" id="saveSignatureBtnPengambilanVehicle">Add</button>
                                        <button class="btn btn-primary" id="clear_signaturePengambilanVehicle" type="button">Clear Signature</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                <script src="signature_pad.umd.min.js"></script>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvasPengambilanVehicle = document.getElementById('signatureCanvasPengambilanVehicle');
        var signaturePadPengambilanVehicle = new SignaturePad(canvasPengambilanVehicle, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signaturePengambilanVehicle').addEventListener('click', function() {
            signaturePadPengambilanVehicle.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtnPengambilanVehicle').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePadPengambilanVehicle.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilenamePengambilanVehicle').value = dataURL;
        });
    });
</script>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <!-- Modal 1 -->
                    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Kunci Kendaraan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                            <input type="hidden" id="InputID" class="form-control" name="id_vehicle_key">
                                            
                                            
                                                    <input type="hidden" class="form-control" id="pengembalianDate" name="date_returned" value="<?php echo date('Y-m-d'); ?>" readonly>
                                            
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Driver Pengembalian
                                                    </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control selectpicker" name="name_returned" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['uid_driver']; ?>" selected>PILIH SUPIR...</option>
                                                    <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_driver WHERE status LIKE 'ACTIVE' ORDER BY nama ASC");

                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)){        
                                                    ?>

                                                            <option value='<?php echo $tabelSecurity['nama']; ?>'><?php echo $tabelSecurity['nama']; ?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </select>
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Diserahkan Kepada</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input_nik" name="recieved_to">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="amount_returned" class="col-sm-2 col-form-label">Fisik Kunci
                                                    </label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control"  id="amount_returned" name="amount_returned" min="1" max="2">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="keterangan_returned" class="col-sm-2 col-form-label">Keterangan
                                                    </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"  id="keterangan_returned" name="keterangan_returned">
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
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_enable_change_status_key_vehicle" class="btn btn-success" id="saveSignatureBtnPengembalian">Add</button>
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
            signaturePad.clear(); // Clear the signature pad
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
                    <!-- End Modal 1 -->

                    

            </div>
             <!-- End of Main Content -->
                
                
               

        </div>
            <!-- End of Content Wrapper -->

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
                '[data-target="#modal1"]');

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
    function fetchKeyRooms(kawasanNoPol) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("id_no_pol").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "fetch_key_kendaraan.php?kawasan_no_pol=" + kawasanNoPol, true);
        xhttp.send();
    }
    </script>
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>