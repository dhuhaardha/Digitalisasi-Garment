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

                <!-- Topbar -->
                    <?php require_once "templates/topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Container Data Karyawan -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-0 text-dark">Patrol and Facility Register</h3>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="aksi_security.php">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Tipe Report</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_nama_buku">
                                                    <option value="0" selected>PILIH REPORT...</option>

                                                        <?php
                                                            $queryBuku = mysqli_query($koneksi,"SELECT * FROM tb_list_buku WHERE tblu_jns_buku LIKE 'PATROLI'");

                                                            while ($tabelBuku = mysqli_fetch_array($queryBuku)){
                                                        ?>

                                                        <option value="<?php echo $tabelBuku['tblu_kd_buku']; ?>"><?php echo $tabelBuku['tblu_nm_buku']; ?></option>

                                                        <?php
                                                            }
                                                        ?>

                                                </select>

                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nama Security</label>
                                            <div class="col-sm-10">
                                                <select class="form-control selectpicker" name="input_nama_security" data-live-search="true">
                                                <option value="0" selected>PILIH SECURITY...</option>
                                                    <?php
                                                        $querySecurity = mysqli_query($koneksi,"SELECT * FROM tb_list_security WHERE tbls_status LIKE 'ACTIVE' ORDER BY tbls_nama ASC");

                                                        while ($tabelSecurity = mysqli_fetch_array($querySecurity)){        
                                                    ?>

                                                            <option value='<?php echo $tabelSecurity['tbls_nik']; ?>'><?php echo $tabelSecurity['tbls_nik'] . " - " . $tabelSecurity['tbls_nama']; ?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Shift</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_shift">
                                                    <option value="0" selected>PILIH SHIFT...</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>GS</option>
                                                </select>
                                            </div>
                                    </div>

                                    </br>

                                    <div class="form-group row">
                                        <div class="col-sm-10 text-center">
                                            <button type="submit" class="btn btn-success" name="tombol_register_patroli">
                                                        <i class="fa-solid fa-square-plus">&nbsp</i>
                                                            Add Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-0 text-dark">Patrol Data</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="d-none">UID</th>
                                                    <th>No</th>
                                                    <th>Tipe</th>
                                                    <th>Start Patrol</th>
                                                    <th>Nama Security</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                

                                                    <!-- data informasi karyawan dari database -->
                                                    <?php
                                                        $noUrut = 1;
                                                        $queryCari = mysqli_query($koneksi,"SELECT * FROM tb_report_patroli LEFT JOIN tb_list_security ON tb_report_patroli.tbrp_nm_security = tb_list_security.tbls_nik
                                                                                                                            LEFT JOIN tb_list_buku ON tb_report_patroli.tbrp_jns_report = tb_list_buku.tblu_kd_buku
                                                                                                                            WHERE tbrp_tgl_selesai IS NULL");
                                                        while($tabelCari = mysqli_fetch_array($queryCari)){
                                                    ?>

                                                        <tr>
                                                            <td class="d-none"><?php echo $tabelCari['tbrp_uid']; ?></td>
                                                            <td><?php echo $noUrut++; ?></td>
                                                            <td><?php echo $tabelCari['tblu_nm_buku']; ?></td>
                                                            <td><?php echo $tabelCari['tbrp_tgl_mulai'] . " - " . $tabelCari['tbrp_jam_mulai']; ?></td>
                                                            <td><?php echo $tabelCari['tbls_uid'] . " - " . $tabelCari['tbls_nama']; ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-warning btn-sm showButton" data-toggle="modal" data-target="#ModalSelesaiPatroli">
                                                                    <i class="fa-solid fa-clipboard-check"></i> <b>Finish Patrol</b>
                                                                </button>

                                                                    <!-- Modal Selesai Patroli -->
                                                                        <div class="modal fade" id="ModalSelesaiPatroli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Patrol Information</h5>
                                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">×</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form method="POST" action="aksi_security.php">
                                                                                        <div class="modal-body">
                                                                                            <div class="row mb-3">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">UID</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <input type="text" class="form-control" id="show_uid" name="show_uid" readonly>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="row mb-3">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tipe</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <input type="text" class="form-control" id="show_type" name="show_type" readonly>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="row mb-3">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <input type="text" class="form-control" id="show_name" name="show_name" readonly>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="row mb-3">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <textarea class="form-control" name="input_remark" rows="5"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" name="tombol_update_patroli" class="btn btn-success">Add</button>
                                                                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                            </td>
                                                        </tr>

                                                    <?php
                                                        }
                                                    ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
        
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalCheckoutUraian"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var IDValue = button.value;

                    // Set the value to the input field
                    document.getElementById("InputID").value = IDValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput").value = dateValue;
                });
            });
        </script>
        
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>