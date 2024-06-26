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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#l">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Container Data Karyawan -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h3 class="m-0 text-dark">Registrasi Kendaraan Shipment</h3>
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPDF">
                            <i class="fa-solid fa-pen-to-square"></i>&nbsp;Export PDF Pada Tanggal
                        </button>
</div>

                            <div class="card-body">
                                
                                
                                <div class="row">
                                    <div class="table-responsive">
                                    <form method="POST" action="data_out_kendaraan.php">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Masuk</th>
                                                        <th>Keluar</th>
                                                        <th>Nomor Kartu</th>
                                                        <th>Nama Driver</th>
                                                        <th>Tipe Kendaraan</th>
                                                        <th>Keterangan</th>
                                                        <th>TTD</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                        <!-- data informasi karyawan dari database -->
                                                        <?php
                                                            $noUrut = 1;
                                                            $vehicleQuery = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan 
                                                                                                    LEFT JOIN tb_list_card ON tb_kendaraan.tbrk_no_card = tb_list_card.tblic_uid
                                                                                                    LEFT JOIN tb_list_kendaraan ON tb_kendaraan.tbrk_jns_kendaraan = tb_list_kendaraan.tblk_uid");
                                                            while($listVehicle = mysqli_fetch_array($vehicleQuery)){
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $noUrut++; ?></td>
                                                                <td><?php echo $listVehicle['tbrk_tanggal'] . " - " . $listVehicle['tbrk_masuk']; ?></td>
                                                                <td>
                                                                    
                                                                        <?php 
                                                                            if (empty($listVehicle['tbrk_keluar'])){
                                                                        ?>
                                                                            <button type="submit" class="btn btn-danger" name="checkout_kendaraan" value="<?php echo $listVehicle['tbrk_uid']; ?>">
                                                                        <?php
                                                                                echo "<i class='fa-solid fa-road-circle-xmark'></i>";
                                                                        ?>
                                                                            </button>
                                                                        <?php
                                                                            } else {
                                                                                echo $listVehicle['tbrk_tanggal_out'] . " - " . $listVehicle['tbrk_keluar'];
                                                                            }
                                                                        ?>
                                                                </td>
                                                                <td><?php echo $listVehicle['tblic_no_id']; ?></td>
                                                                <td><?php echo $listVehicle['tbrk_nama_supir']; ?></td>
                                                                <td><?php echo $listVehicle['tblk_nama_kendaraan']; ?></td>
                                                                <td>
                                                                    <?php echo "Transporter : " . $listVehicle['tbrk_nama_transporter'] . "</br>" .
                                                                                "Buyer : " . $listVehicle['tbrk_nama_buyer'] . "</br>" .
                                                                                "Qty : " . $listVehicle['tbrk_qty_kirim'] . "</br>" .
                                                                                "Gatepass : " . $listVehicle['tbrk_no_gp'] . "</br>" .
                                                                                "Destination : " . $listVehicle['tbrk_tujuan'] . "</br>" .
                                                                                "Bodyguard : " . $listVehicle['tbrk_nm_pengawal'] . "</br>" .
                                                                                "Delivery No : " . $listVehicle['tbrk_surat_jalan'] . "</br>" .
                                                                                "Eseal No : " . $listVehicle['tbrk_no_eseal']; ?>
                                                                </td>
                                                                <td><img src="<?php echo $listVehicle['tbrk_ttd']; ?>" width="100px" height="100px"></td>
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
                        <form method="POST" action="print_kendaraan_shipment.php" target="_blank">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="input_print_pdf" class="form-control">
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