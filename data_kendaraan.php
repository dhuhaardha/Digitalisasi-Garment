<?php
include "koneksi.php";

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
                                <h3 class="m-0 text-dark">Vehicle Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col align-self-end">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
                                            <i class="fa-solid fa-square-plus">&nbsp</i>
                                                Add Vehicle
                                        </button>
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
                                                        <th>Tipe</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                        <!-- data informasi karyawan dari database -->
                                                        <?php
                                                            $noUrut = 1;
                                                            $kendaraanQuery = mysqli_query($koneksi,"SELECT * FROM tb_list_kendaraan");
                                                            while($listKendaraan = mysqli_fetch_array($kendaraanQuery)){
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $noUrut++; ?></td>
                                                                <td><?php echo $listKendaraan['tblk_tipe_kendaraan']; ?></td>
                                                                <td><?php echo $listKendaraan['tblk_status']; ?></td>
                                                                <td>

                                                                    <?php
                                                                        if($listKendaraan['tblk_status'] == 'ACTIVE'){
                                                                    ?>

                                                                        <button type="button" name="tombol_enable_kendaraan" class="btn btn-secondary" disabled>
                                                                            <i class="fa-solid fa-person-circle-check"></i>
                                                                        </button>
                                                                        <button type="submit" name="tombol_disable_kendaraan" class="btn btn-danger" value="<?php echo $listKendaraan['tblk_uid']; ?>">
                                                                            <i class="fa-solid fa-person-circle-minus"></i>
                                                                        </button>
                                                                    
                                                                    <?php
                                                                        }elseif($listKendaraan['tblk_status'] == 'INACTIVE'){
                                                                    ?>

                                                                        <button type="submit" name="tombol_enable_kendaraan" class="btn btn-success" value="<?php echo $listKendaraan['tblk_uid']; ?>">
                                                                            <i class="fa-solid fa-person-circle-check"></i>
                                                                        </button>
                                                                        <button type="button" name="tombol_disable_kendaraan" class="btn btn-secondary" disabled>
                                                                            <i class="fa-solid fa-person-circle-minus"></i>
                                                                        </button>

                                                                    <?php
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

                </div>
                <!-- /.container-fluid -->
            
            <!-- Modal Tambah -->
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter Vehicle Type</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" action="aksi_security.php">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tipe</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input_tipe" name="input_tipe">
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
                                <button type="submit" name="tombol_tambah_kendaraan" class="btn btn-success">Add</button>
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