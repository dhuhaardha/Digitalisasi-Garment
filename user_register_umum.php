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
                                <h3 class="m-0 text-dark">Public Vehicle Registration</h3>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="aksi_security.php">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Card Number</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_nomor_kartu">
                                                
                                                    <?php
                                                        $idQuery = mysqli_query($koneksi,"SELECT * FROM tb_list_card WHERE tblic_status LIKE 'READY'");
                                                        while($listID = mysqli_fetch_array($idQuery)){
                                                            echo "<option value='$listID[tblic_uid]'>$listID[tblic_no_id]</option>";
                                                        }
                                                    ?>
                                                
                                                </select>

                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Vehicle Type</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_tipe_kontainer">
                                                    <option value="0" selected>Choose Type...</option>

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
                                        <label class="col-sm-2 col-form-label" for="unit">Vehicle Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_plat_nomor">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Identity Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_nomor_identitas">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Driver Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_nama_supir">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Container Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_nomor_kontainer">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Seal Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" style="text-transform:uppercase;" name="input_nomor_seal">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Incoming BC</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_bc_masuk">
                                                    <option value="0" selected>Choose Type...</option>

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
                                        <label class="col-sm-2 col-form-label" for="unit">Sign</label>
                                            <div class="col-sm-10">
                                                <div name="sig" id="sig"></div>
                                                    <br />
                                                    <textarea id="signature64" name="signature" style="display: none"></textarea>
                                                        <div class="col-12">
                                                            <button class="btn btn-sm btn-warning" id="clear">&#x232B;Clear Signature</button>
                                                        </div>
                                            </div>
                                    </div>

                                    </br>

                                    <div class="form-group row">
                                        <div class="col-sm-10 text-center">
                                            <button type="submit" class="btn btn-success" name="tombol_register_kendaraan_umum">
                                                        <i class="fa-solid fa-square-plus">&nbsp</i>
                                                            Add Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
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

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Menampilkan 2 datatable atau lebih -->
    <script>
        $(document).ready(function() {
        $('table.table').DataTable();
        } );
    </script>

    <!-- script signature -->
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
        var can = document.getElementById('sig');
        can.addEventListener( 'touchstart', onTouchStart, false);
    </script>

</body>

</html>