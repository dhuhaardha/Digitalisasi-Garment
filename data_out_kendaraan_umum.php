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
                                <h3 class="m-0 text-dark">Checkout Information</h3>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="aksi_security.php">

                                    <?php
                                        $uidReport = $_POST['checkout_kendaraan'];
                                        $queryCari = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan_umum 
                                                                            LEFT JOIN tb_list_card ON tb_kendaraan_umum.tbu_no_kartu = tb_list_card.tblic_uid 
                                                                            LEFT JOIN tb_list_kendaraan ON tb_kendaraan_umum.tbu_jns_kendaraan = tb_list_kendaraan.tblk_uid 
                                                                            WHERE tbu_uid LIKE '$uidReport'");

                                        while($infoKendaraan = mysqli_fetch_array($queryCari)){
                                    ?>

                                    <input type="text" class="form-control" name="info_uid_kendaraan" value="<?php echo $infoKendaraan['tbu_uid']; ?>" readonly>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Card Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="info_nomor_id" value="<?php echo $infoKendaraan['tblic_no_id']; ?>" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Vehicle Type</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="info_jns_kendaraan" value="<?php echo $infoKendaraan['tblk_nama_kendaraan']; ?>" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Vehicle Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="info_nomor_plat" value="<?php echo $infoKendaraan['tbu_nmr_plat']; ?>" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Driver Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="info_nama_supir" value="<?php echo $infoKendaraan['tbu_nm_supir']; ?>" readonly>
                                            </div>
                                    </div>

                                    <?php
                                        }
                                    ?>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Checker Name</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control selectpicker" name="input_nama_security" data-live-search="true">
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
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Outgoing BC</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_bc_keluar">
                                                    <option value="0" selected>Choose Type...</option>

                                                    <?php
                                                        $queryBC = mysqli_query($koneksi,"SELECT * FROM tb_list_bc WHERE tblb_sts_bc LIKE 'ACTIVE'");
                                                        while ($tabelBC = mysqli_fetch_array($queryBC)){
                                                    ?>

                                                        <option value="<?php echo $tabelBC['tblb_uid']; ?>"><?php echo $tabelBC['tblb_nm_bc']; ?></option>

                                                    <?php
                                                        }
                                                    ?>

                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Goods Out</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="3" style="text-transform:uppercase;" name="input_barang_keluar"></textarea>
                                            </div>
                                    </div>

                                    </br>

                                    <div class="form-group row">
                                        <div class="col-sm-10 text-center">
                                            <button type="submit" class="btn btn-danger" name="#">
                                                <i class="fa-solid fa-house-circle-xmark">&nbsp</i>
                                                    Cancel
                                            </button>
                                            <button type="submit" class="btn btn-success" name="tombol_checkout_kendaraan_umum">
                                                <i class="fa-solid fa-house-circle-xmark">&nbsp</i>
                                                    Check Out
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

<?php require_once "templates/footer.php" ?>

</body>

</html>