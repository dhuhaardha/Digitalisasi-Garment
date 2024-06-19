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
                                <h3 class="m-0 text-dark">CCTV Checking</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col align-self-end">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportDaily">
                                            <i class="fa-solid fa-file-pdf">&nbsp</i>
                                                Daily Export
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportMonthly">
                                            <i class="fa-solid fa-file-pdf">&nbsp</i>
                                                Monthly Export
                                        </button>
                                    </div>
                                </div>

                                </br>
                                </br>
                                
                                <form method="POST" action="cek_cctv.php">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Security Name</label>
                                            <div class="col-sm-4">
                                                <select id="inputState" class="form-select" name="input_nama">
                                                    <option selected>Choose Security...</option>

                                                    <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_list_security ORDER BY tbls_nama ASC");
                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)){
                                                    ?>
                                                        <option value="<?php echo $tabelSecurity['tbls_uid']; ?>"><?php echo $tabelSecurity['tbls_nama']; ?></option>
                                                    <?php
                                                        }
                                                    ?>

                                                    
                                                </select>
                                            </div>
                                    </div>

                                    <div class="row mb-3">
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

                                    <div class="row">
                                        <div class="col align-self-center">
                                            <button type="submit" class="btn btn-success" name="tombol_masuk_cctv">
                                                Proceed
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                
                            
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            <!-- Modal Cetak PDF Daily-->
            <div class="modal fade" id="exportDaily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Export to PDF</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" action="cetak_cek_cctv.php" target="_blank">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="input_print_pdf" class="form-control">
                                        </div>
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="tombol_pdf_cctv_daily" target="_blank" class="btn btn-success">Export</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Cetak PDF Monthly-->
            <div class="modal fade" id="exportMonthly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Export to PDF</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" action="cetak_cek_cctv.php" target="_blank">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Month</label>
                                        <div class="col-sm-10">
                                            <input type="month" name="input_print_pdf" class="form-control">
                                        </div>
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="tombol_pdf_cctv_monthly" target="_blank" class="btn btn-success">Export</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
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