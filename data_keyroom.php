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
                            <h3 class="m-0 text-dark">Kunci Ruangan Information</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col align-self-end">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modalTambah">
                                        <i class="fa-solid fa-square-plus">&nbsp</i>
                                        Add Kunci Ruangan
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
                                                    <th>Nama Kunci</th>
                                                    <th>Jumlah Fisik</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <!-- data informasi karyawan dari database -->
                                                <?php
                                                $noUrut = 1;
                                                $KeyRoomQuery = mysqli_query($koneksi, "SELECT * FROM tb_list_key_room");
                                                while ($listKeyRoom = mysqli_fetch_array($KeyRoomQuery)) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $noUrut++; ?></td>
                                                    <td><?php echo $listKeyRoom['name_of_key']; ?></td>
                                                    <td><?php echo $listKeyRoom['amount_of_key']; ?></td>
                                                    <!-- <td>

                                                            <?php
                                                            if ($listKeyroom['tblc_status'] == 'ACTIVE') {
                                                            ?>

                                                                <button type="button" name="tombol_enable_cctv" class="btn btn-secondary" disabled>
                                                                    <i class="fa-solid fa-person-circle-check"></i>
                                                                </button>
                                                                <button type="submit" name="tombol_disable_cctv" class="btn btn-danger" value="<?php echo $listCCTV['tblc_uid']; ?>">
                                                                    <i class="fa-solid fa-person-circle-minus"></i>
                                                                </button>

                                                            <?php
                                                            } elseif ($listCCTV['tblc_status'] == 'INACTIVE') {
                                                            ?>

                                                                <button type="submit" name="tombol_enable_cctv" class="btn btn-success" value="<?php echo $listCCTV['tblc_uid']; ?>">
                                                                    <i class="fa-solid fa-person-circle-check"></i>
                                                                </button>
                                                                <button type="button" name="tombol_disable_cctv" class="btn btn-secondary" disabled>
                                                                    <i class="fa-solid fa-person-circle-minus"></i>
                                                                </button>

                                                            <?php
                                                            }
                                                            ?>

                                                        </td> -->
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
                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enter Kunci Ruangan Data</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="POST" action="aksi_security.php">
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name Kunci</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input_name_key_room"
                                                name="input_name_key_room">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Kunci</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input_amount_key_room"
                                                name="input_amount_key_room">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="tombol_tambah_keyroom"
                                        class="btn btn-success">Add</button>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- footer -->
    <?php require_once "templates/footer.php" ?>

</body>

</html>
