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
                            <div class="card-header py-3">
                                <h3 class="m-0 text-dark">Registrasi Kendaraan Umum</h3>
                            </div>
                            

                            <div class="card-body">
                                <form method="POST" action="aksi_security.php">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nomor Kartu</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_nomor_kartu">
                                                
                                                    <?php
                                                        $idQuery = mysqli_query($koneksi,"SELECT * FROM tb_list_card WHERE tblic_status LIKE 'READY' AND tblic_jns_kartu LIKE 'KENDARAAN'");
                                                        while($listID = mysqli_fetch_array($idQuery)){
                                                            echo "<option value='$listID[tblic_uid]'>$listID[tblic_no_id]</option>";
                                                        }
                                                    ?>
                                                
                                                </select>

                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Tipe Kendaraan</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_tipe_kontainer">
                                                    <option value="0" selected>PILIH TIPE...</option>

                                                    <?php
                                                    $queryKendaraan = mysqli_query($koneksi,"SELECT * FROM tb_list_kendaraan WHERE tblk_status LIKE 'ACTIVE'");
                                                    while ($listKendaraan = mysqli_fetch_array($queryKendaraan)){
                                                    ?>

                                                        <option value='<?php echo $listKendaraan['tblk_uid'] ?>'><?php echo $listKendaraan['tblk_nama_kendaraan'] ?></option>

                                                    <?php
                                                        }
                                                    ?>

                                                </select>

                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nomer Kendaraan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_plat_nomor">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nomer Identitas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_nomor_identitas">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nama Driver</label>
                                        <div class="col-sm-10">
                                                <select class="form-control selectpicker" name="input_nama_supir" data-live-search="true">
                                                <option value="<?php echo $tabelSecurity['uid_driver']; ?>" selected>PILIH SECURITY...</option>
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
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nomer Kontainer</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_nomor_kontainer">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nomer Seal</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_nomor_seal">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">BC Yang Akan Datang</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_bc_masuk">
                                                    <option value="0" selected>PILIH TIPE...</option>

                                                        <?php 
                                                            $queryJenis = mysqli_query($koneksi,"SELECT * FROM tb_list_bc");
                                                            while ($tabelJenis = mysqli_fetch_array($queryJenis)){
                                                        ?>

                                                            <option value="<?php echo $tabelJenis['tblb_uid']; ?>"><?php echo $tabelJenis['tblb_nm_bc']; ?></option>

                                                        <?php
                                                            }
                                                        ?>

                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Incoming Goods</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="3" style="text-transform:uppercase;" name="input_barang_masuk"></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Tanda Tangan</label>
                                            <div class="col-sm-10">
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
                                    </div>

                                    </br>

                                    <div class="form-group row">
                                        <div class="col-sm-10 text-center">
                                            <button type="submit" class="btn btn-success" name="tombol_register_kendaraan_umum" id="saveSignatureBtn">
                                                        <i class="fa-solid fa-square-plus">&nbsp</i>
                                                            Add Kendaraan Umum
                                            </button>
                                            <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                        </div>
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