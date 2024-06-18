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
                                <h3 class="m-0 text-dark">Visitor Data</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="d-none">UID</th>
                                                    <th class="d-none">Card UID</th>
                                                    <th>No</th>
                                                    <th>In</th>
                                                    <th>Out</th>
                                                    <th>Card</th>
                                                    <th>Name</th>
                                                    <th>Appointment</th>
                                                    <th>Purpose</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                

                                                    <!-- data informasi karyawan dari database -->
                                                    <?php
                                                        $noUrut = 1;
                                                        $queryCari = mysqli_query($koneksi,"SELECT * FROM tb_report_tamu LEFT JOIN tb_list_buku ON tb_report_tamu.tbrt_jns_kunjungan = tb_list_buku.tblu_kd_buku
                                                                                                                            LEFT JOIN tb_list_card ON tb_report_tamu.tbrt_nmr_kartu = tb_list_card.tblic_uid
                                                                                                                            WHERE tbrt_jns_kunjungan LIKE 'B012'");
                                                        while($tabelCari = mysqli_fetch_array($queryCari)){
                                                    ?>

                                                        <tr>
                                                            <td class="d-none"><?php echo $tabelCari['tbrt_uid']; ?></td>
                                                            <td class="d-none"><?php echo $tabelCari['tblic_uid']; ?></td>
                                                            <td><?php echo $noUrut++; ?></td>
                                                            <td><?php echo $tabelCari['tbrt_tgl_masuk'] . " - " . $tabelCari['tbrt_jam_masuk']; ?></td>
                                                            <td><?php echo $tabelCari['tbrt_tgl_keluar'] . " - " . $tabelCari['tbrt_jam_keluar']; ?></td>
                                                            <td><?php echo $tabelCari['tblic_no_id']; ?></td>
                                                            <td><?php echo $tabelCari['tbrt_nm_tamu']; ?></td>
                                                            <td><?php echo $tabelCari['tbrt_jnj_temu']; ?></td>
                                                            <td><?php echo $tabelCari['tbrt_keperluan']; ?></td>
                                                            <td>
                                                                <?php
                                                                    if ($tabelCari['tbrt_tgl_keluar'] == ''){
                                                                ?>
                                                                    <button type="button" class="btn btn-danger btn-sm showButton" data-toggle="modal" data-target="#ModalSelesaiPatroli">
                                                                        <i class="fa-solid fa-person-circle-xmark"></i> <b>Check Out</b>
                                                                    </button>
                                                                <?php
                                                                    }else{
                                                                ?>
                                                                    <button type="button" class="btn btn-secondary btn-sm showButton" data-toggle="modal" data-target="#ModalSelesaiPatroli" disabled>
                                                                        <i class="fa-solid fa-person-circle-xmark"></i> <b>Check Out</b>
                                                                    </button>

                                                                <?php
                                                                    }
                                                                ?>

                                                                

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
                                                                                            <div class="row mb-3 d-none">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Card UID</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <input type="text" class="form-control" id="show_card_uid" name="show_card_uid" readonly>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="row mb-3">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Card</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <input type="text" class="form-control" id="show_card" name="show_card" readonly>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="row mb-3">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <input type="text" class="form-control" id="show_name" name="show_name" readonly>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="row mb-3">
                                                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Purpose</label>
                                                                                                    <div class="col-sm-10">
                                                                                                        <textarea class="form-control" id="show_purpose" name="show_purpose" rows="5" readonly></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" name="tombol_checkout_visitor" class="btn btn-success">Check Out</button>
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

    <!-- Script Button -->
    <script>
        $(document).ready(function () {

            $('.showButton').on('click', function () {
                $('#viewmodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#show_uid').val(data[0]);
                $('#show_card_uid').val(data[1]);
                $('#show_card').val(data[5]);
                $('#show_name').val(data[6]);
                $('#show_purpose').val(data[8]);
            });

        });
    </script>
                                                    

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
    </script>

</body>

</html>