<?php
include "koneksi.php" ;

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Karyawan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link href="vendor/woff/font.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- CSS dan JS sweetalert -->
    <script src="vendor/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="vendor/sweetalert/sweetalert2.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-user-shield fa-lg"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Administrasi Security</div>
            </a>

            <br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Home -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Jenis Register
            </div>

            <!-- Nav Item - AKTIVITAS KARYAWAN -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-users"></i>
                    <span>Aktivitas Karyawan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrasi :</h6>
                        <a class="collapse-item" href="buttons.html">Absensi</a>
                        <a class="collapse-item" href="cards.html">Kejadian & Pelanggaran</a>
                        <a class="collapse-item" href="cards.html">Orientasi</a>
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - MUTASI -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-book"></i>
                    <span>Mutasi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrasi :</h6>
                        <a class="collapse-item" href="utilities-color.html">Mutasi Malam</a>
                        <a class="collapse-item" href="utilities-border.html">Mutasi GS</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - PATROLI -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie" aria-expanded="true" aria-controls="collapseUtilitie">
                    <i class="fa-solid fa-building-circle-check"></i>
                        <span>Patroli & Facility</span>
                </a>
                <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrasi :</h6>
                        <a class="collapse-item" href="utilities-color.html">Keamanan</a>
                        <a class="collapse-item" href="utilities-border.html">Fasilitas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - STORE -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie1" aria-expanded="true" aria-controls="collapseUtilitie1">
                    <i class="fa-solid fa-store"></i>
                        <span>Store</span>
                </a>
                <div id="collapseUtilitie1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrasi :</h6>
                        <a class="collapse-item" href="utilities-color.html">Bongkar</a>
                        <a class="collapse-item" href="utilities-border.html">Loading</a>
                        <a class="collapse-item" href="utilities-border.html">Administrasi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - TAMU -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie2" aria-expanded="true" aria-controls="collapseUtilitie2">
                    <i class="fa-solid fa-address-card"></i>
                        <span>Pos Induk</span>
                </a>
                <div id="collapseUtilitie2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrasi :</h6>
                        <a class="collapse-item" href="utilities-color.html">Fasilitas</a>
                        <a class="collapse-item" href="utilities-border.html">Tamu</a>
                        <a class="collapse-item" href="utilities-border.html">Administrasi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - TRANSFER -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie3" aria-expanded="true" aria-controls="collapseUtilitie3">
                    <i class="fa-solid fa-truck"></i>
                        <span>Transfer</span>
                </a>
                <div id="collapseUtilitie3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrasi :</h6>
                        <a class="collapse-item" href="utilities-color.html">Gatepass</a>
                        <a class="collapse-item" href="utilities-border.html">Kartu Shipment</a>
                        <a class="collapse-item" href="utilities-border.html">Transfer Barang</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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
                            <div class="card-header py-3">
                                <h3 class="m-0 text-dark">Employee Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col align-self-end">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
                                            <i class="fa-solid fa-square-plus">&nbsp</i>
                                                Add Employee
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
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Department</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                        <!-- data informasi karyawan dari database -->
                                                        <?php
                                                            $empQuery = mysqli_query($koneksi,"SELECT * FROM tb_karyawan");
                                                            while($listEmployee = mysqli_fetch_array($empQuery)){
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $listEmployee['tbk_nik']; ?></td>
                                                                <td><?php echo $listEmployee['tbk_nama']; ?></td>
                                                                <td><?php echo $listEmployee['tbk_dept']; ?></td>
                                                                <td><?php echo $listEmployee['tbk_status']; ?></td>
                                                                <td>

                                                                    <?php
                                                                        if($listEmployee['tbk_status'] == 'ACTIVE'){
                                                                    ?>

                                                                        <button type="button" name="tombol_enable_karyawan" class="btn btn-secondary" disabled>
                                                                            <i class="fa-solid fa-person-circle-check"></i>
                                                                        </button>
                                                                        <button type="submit" name="tombol_disable_karyawan" class="btn btn-danger" value="<?php echo $listEmployee['tbk_nik']; ?>">
                                                                            <i class="fa-solid fa-person-circle-minus"></i>
                                                                        </button>
                                                                    
                                                                    <?php
                                                                        }elseif($listEmployee['tbk_status'] == 'INACTIVE'){
                                                                    ?>

                                                                        <button type="submit" name="tombol_enable_karyawan" class="btn btn-success" value="<?php echo $listEmployee['tbk_nik']; ?>">
                                                                            <i class="fa-solid fa-person-circle-check"></i>
                                                                        </button>
                                                                        <button type="button" name="tombol_disable_karyawan" class="btn btn-secondary" disabled>
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
                            <h5 class="modal-title" id="exampleModalLabel">Enter Employee Data</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" action="aksi_security.php">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input_nik" name="input_nik">
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input_name" name="input_name">
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Dept</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="input_department">
                                                <option selected>Choose Dept...</option>

                                                <!-- data department dari database -->
                                                <?php
                                                    $deptQuery = mysqli_query($koneksi,"SELECT * FROM tb_dept WHERE td_status LIKE 'ACTIVE'");
                                                    while ($listDept = mysqli_fetch_array($deptQuery)){
                                                ?>

                                                <option value="<?php echo $listDept['td_dept']; ?>"><?php echo $listDept['td_dept']; ?></option>

                                                <?php
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="input_status">
                                                <option value="choose" selected>Choose Status...</option>
                                                <option value="ACTIVE">Active</option>
                                                <option value="INACTIVE">Inactive</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="tombol_tambah_karyawan" class="btn btn-success">Add</button>
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