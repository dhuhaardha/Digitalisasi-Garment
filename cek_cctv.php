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
                                <h3 class="m-0 text-dark">CCTV Checking</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                <div class="d-flex justify-content-end">
                                    <div class="">

                                    <button type="button" class="btn-lg btn-primary" data-toggle="modal" data-target="#exportDaily">
                                            <i class="fa-solid fa-file-pdf">&nbsp</i>
                                                Daily Export
                                        </button>
                                    </div>
                                    &nbsp
                                    <div>

                                    <button type="button" class="btn-lg btn-primary" data-toggle="modal" data-target="#exportMonthly">
                                            <i class="fa-solid fa-file-pdf">&nbsp</i>
                                                Monthly Export
                                        </button>
                                    </div>
                                        
                                    
                                </div>
                            
                                </div>
                                
                                

                                </br>
                                
                                <div class="row">
                                    <div class="table-responsive">
                                        <form method="POST" action="aksi_security.php">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Unit</th>
                                                        <th>Nama</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                        <!-- data informasi karyawan dari database -->
                                                        <?php
                                                            $noUrut = 1;
                                                            $hariIni = DATE('Y-m-d');
                                                            $cctvQuery = mysqli_query($koneksi,"SELECT * FROM tb_list_cctv WHERE tblc_cek_cctv < CURDATE() OR tblc_cek_cctv IS NULL");
                                                            while($listCCTV = mysqli_fetch_array($cctvQuery)){
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $noUrut++; ?></td>
                                                                <td><input type="hidden" name="input_lokasi" value="<?php echo $listCCTV['tblc_lokasi']; ?>"><?php echo $listCCTV['tblc_lokasi']; ?></td>
                                                                <td><?php echo $listCCTV['tblc_nama_cctv']; ?></td>
                                                                <td>
                                                                    <button type="submit" name="tombol_ok_cctv" class="btn btn-success" value="<?php echo $listCCTV['tblc_uid']; ?>">
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                    <button type="submit" name="tombol_notok_cctv" class="btn btn-danger" value="<?php echo $listCCTV['tblc_uid']; ?>">
                                                                        <i class="fa-solid fa-xmark"></i>
                                                                    </button>
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
                        <form method="POST" action="print_daily_cctv.php" target="_blank">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="input_print_pdf" class="form-control">
                                        </div>
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="" target="_blank" class="btn btn-success">Export</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
            <!-- Modal Tambah -->
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter CCTV Data</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" action="aksi_security.php">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="input_unit">
                                                <option selected>Choose Unit...</option>

                                                <!-- data department dari database -->
                                                <?php
                                                    $unitQuery = mysqli_query($koneksi,"SELECT * FROM tb_unit WHERE tbu_status LIKE 'ACTIVE' ORDER BY tbu_nama_unit ASC");
                                                    while ($listUnit = mysqli_fetch_array($unitQuery)){
                                                ?>

                                                <option value="<?php echo $listUnit['tbu_kd_unit']; ?>"><?php echo $listUnit['tbu_nama_unit']; ?></option>

                                                <?php
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input_name" name="input_name">
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="input_status">
                                                <option value="ACTIVE" selected>Active</option>
                                                <option value="INACTIVE">Inactive</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="tombol_tambah_cctv" class="btn btn-success">Add</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Cetak PDF -->
            <div class="modal fade" id="modalPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <button type="submit" name="tombol_pdf_cctv" target="_blank" class="btn btn-success">Export</button>
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