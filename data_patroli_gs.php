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

                    <!-- Container Data Karyawan -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h3 class="m-0 text-dark">GS Patrol Data</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPDF">
                            <i class="fa-solid fa-pen-to-square"></i>&nbsp;Export PDF Pada Tanggal
                        </button>
</div>

                            <div class="card-body">
                                
                                </br>

                                </br>
                                
                                <div class="row">
                                    <div class="table-responsive">
                                        <form method="POST" action="data_out_kendaraan_umum.php">
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
                                                                                                    WHERE tbrp_jns_report LIKE 'B001'");
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="input_print_pdf" class="form-control">
                                            <input type="hidden" name="informasi_kode" value="B001" class="form-control">
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Petugas</label>
                                        <div class="col-sm-10">
                                            <select class="form-control selectpicker" name="input_nama_petugas" data-live-search="true">
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">TTD Petugas</label>
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
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">TTD Ketua Regu</label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                </style>
                                                <div class="col-sm-10">
                                                        <canvas id="signatureCanvasCommander" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilenameCommander" name="signatureFilenameCommander">
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
                                <button type="submit" name="tombol_cetak_pdf" target="_blank" class="btn btn-success" id="saveSignatureBtn" id="saveSignatureBtnCommander">Export</button>
                                <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        <script src="signature_pad.umd.min.js"></script>
                        <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pads
        var canvas1 = document.getElementById('signatureCanvas');
        var signaturePad1 = new SignaturePad(canvas1, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        var canvas2 = document.getElementById('signatureCanvasCommander');
        var signaturePad2 = new SignaturePad(canvas2, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function for the first pad
        document.getElementById('clear_signature').addEventListener('click', function() {
            signaturePad1.clear(); // Clear the first signature pad
            signaturePad2.clear(); // Clear the first signature pad
        });

        // Clear Signature function for the second pad
        document.getElementById('clear_signature_commander').addEventListener('click', function() {
            signaturePad2.clear(); // Clear the second signature pad
        });

        // Form submission for the first pad
        document.getElementById('saveSignatureBtn').addEventListener('click', function() {
            // Get the data URL of the first signature
            var dataURL1 = signaturePad1.toDataURL();

            // Set the data URL to the hidden input field for the first pad
            document.getElementById('signatureFilename').value = dataURL1;
        });

        // Form submission for the second pad
        document.getElementById('saveSignatureBtnCommander').addEventListener('click', function() {
            // Get the data URL of the second signature
            var dataURL2 = signaturePad2.toDataURL();

            // Set the data URL to the hidden input field for the second pad
            document.getElementById('signatureFilenameCommander').value = dataURL2;
        });
    });
</script>
                    </div>
                </div>
            </div>

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