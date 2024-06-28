<?php
include "koneksi.php" ;

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php require_once "templates/header.php" ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            <?php require_once "templates/sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php require_once "templates/topbar.php" ?>
                <!-- End of Topbar -->

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
    $jenis_bagian_export = 'B005';
    
    // Query to retrieve signature status and details for specific roles and current date
    $queryStatus = mysqli_query($koneksi, 
        "SELECT jabatan_ttd, danru_export, shift 
        FROM tb_export
        WHERE jabatan_ttd IN ('DANRU', 'DITERIMA', 'DISERAHKAN', 'PETUGAS')
        AND jenis_bagian_export = '$jenis_bagian_export'
        AND DATE(dibuat_pada) = '$current_date'");
    
    // Initialize arrays to store signature status and details
    $signature_status = array(
        'DANRU' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'DITERIMA' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'DISERAHKAN' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'PETUGAS' => array('signed' => false, 'signer' => '', 'shift' => '')
    );

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
    
    // Display status and signer details for each role

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
                    <div class="card-header py-3 text-center">
                    <h3 class="m-0 text-dark">GS Patrol Data</h3>
                        
                        </div>

                            <div class="card-body">
                            <div class="d-flex justify-content-end">
                                    <div class="">

                                        <button type="button" class="btn-lg btn-primary" data-toggle="modal" data-target="#modalPDF">
                                        <i class="fa-solid fa-file-pdf">&nbsp</i>
                                                    Export PDF
                                                </button>
                                    </div>
                                    &nbsp
                                    <div>

                                    <button type="button" class="btn-lg btn-success" data-toggle="modal" data-target="#modalTambah">
                                    <i class="fa-solid fa-signature">&nbsp</i>
                                            TTD Export
                                        </button>
                                    </div>
                                        
                                    
                                </div>

                                <br>
                                <div class="row">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Mulai</th>
                                                        <th>Selesai</th>
                                                        <th>Security</th>
                                                        <th>Shift</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                        <!-- data informasi karyawan dari database -->
                                                        <?php
                                                            $noUrut = 1;
                                                            $queryPatroli = mysqli_query($koneksi,"SELECT * FROM tb_report_patroli
                                                                                                    LEFT JOIN tb_list_security ON tb_report_patroli.tbrp_nm_security = tb_list_security.tbls_nik
                                                                                                    WHERE tbrp_jns_report LIKE 'B005'");
                                                            while($tabelPatroli = mysqli_fetch_array($queryPatroli)){
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $noUrut++; ?></td>
                                                                <td><?php echo $tabelPatroli['tbrp_tgl_mulai']; ?></td>
                                                                <td><?php echo $tabelPatroli['tbrp_jam_mulai']; ?></td>
                                                                <td><?php echo $tabelPatroli['tbrp_jam_selesai']; ?></td>
                                                                <td><?php echo $tabelPatroli['tbls_nama']; ?></td>
                                                                <td><?php echo $tabelPatroli['tbrp_shf_security']; ?></td>
                                                                <td><?php echo $tabelPatroli['tbrp_keterangan']; ?></td>
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
                                <option value="PETUGAS">PETUGAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="input_print_pdf" class="form-control">
                            <input type="hidden" name="input_jns_kunjungan" value="B005" class="form-control">
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
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Export to PDF</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                    <form method="POST" action="print_patroli.php" target="_blank">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="input_print_pdf" class="form-control">
                                                    <input type="hidden" name="input_jns_kunjungan" value="B005" class="form-control">
                                                </div>
                                            </div>
                                                <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">HR/GA</label>
                                                <div class="col-sm-9">
                                                <select id="inputState" class="form-select" name="input_hr">
                                                        <option selected disabled>DISERAHKAN HR...</option>
                                                        <option value="REDY HARYOKO">REDY HARYOKO</option>
                                                        <option value="RIZKI AKBAR">RIZKI AKBAR</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" target="_blank" class="btn btn-success" id="saveSignatureBtn saveSignatureBtnDiserahkan saveSignatureBtnCommander">Export</button>
                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                    <script src="signature_pad.umd.min.js"></script>
                            <script>
        // Wait for the document to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {

            var canvasCommander = document.getElementById('signatureCanvasCommander');
            var signaturePadCommander = new SignaturePad(canvasCommander, {
                backgroundColor: 'rgb(255, 255, 255)' // set background color
            });


            // Clear Signature function for the second pad
            document.getElementById('clear_signature_commander').addEventListener('click', function() {
                signaturePadCommander.clear(); // Clear the second signature pad
            });

            // Form submission for the second pad
            document.getElementById('saveSignatureBtnCommander').addEventListener('click', function() {
                // Get the data URL of the second signature
                var dataURL3 = signaturePadCommander.toDataURL();

                // Set the data URL to the hidden input field for the second pad
                document.getElementById('signatureFilenameCommander').value = dataURL3;
            });
        });
    </script>
                                </div>
                            </div>
                        </div>
                    <!-- End Modal -->

                    

                                                                    <!-- Modal Selesai Patroli -->
                                                                        <div class="modal fade" id="ModalSelesaiPatroli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Patrol Information</h5>
                                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">×</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form method="POST" action="aksi_security.php">
                                                                                    <div class="modal-body">
                                                                                            <h5 class="text-center"> Apakah anda yakin ingin Check out Card</h5>
                                                                                                        <input type="text" class="form-control" id="IDInput" name="show_uid" readonly>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" name="tombol_checkout_visitor" class="btn btn-success">Check Out</button>
                                                                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                </div>
                <!-- /.container-fluid -->
            
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

    <!-- Script Button -->
    <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#ModalSelesaiPatroli"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var IDValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput").value = IDValue;
                });
            });
        </script>
                                                    

    <!-- Cek Session -->
    <?php 
        if(@$_SESSION['sukses']){ 
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
        }elseif(@$_SESSION['gagal']){
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
<?php require_once "templates/footer.php" ?>

</body>

</html>