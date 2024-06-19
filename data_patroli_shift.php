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
                                <h3 class="m-0 text-dark">Shift Patrol Report</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col align-self-end">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPDF">
                                            <i class="fa-solid fa-pen-to-square">&nbsp</i>
                                                Export PDF
                                        </button>
                                    </div>
                                </div>
                                
                                </br>

                                <p class="fs-3 fw-bold text-center">
                                    PT. UNGARAN SARI GARMENTS </br>
                                    SECURITY - UNGARAN </br>
                                    </br>
                                    SHIFT PATROL REPORT</br>
                                </p>

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
                                                                                                    WHERE tbrp_jns_report LIKE 'B003'");
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
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Export to PDF</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" action="cetak_laporan_khusus.php" target="_blank">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="input_print_pdf" class="form-control">
                                            <input type="hidden" name="informasi_kode" value="B003" class="form-control">
                                        </div>
                                </div> 
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Officer</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="input_nama_petugas" class="form-control">
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Responsible</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="input_nama_penanggung_jawab" class="form-control">
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Commander</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="input_nama_komandan_regu" class="form-control">
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">HR & GA</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="input_nama_hr" class="form-control">
                                        </div>
                                </div>                               
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="tombol_cetak_pdf" target="_blank" class="btn btn-success">Export</button>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
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

</body>

</html>