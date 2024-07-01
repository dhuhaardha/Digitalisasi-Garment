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
                <div class="row d-flex align-items-stretch">
    <div class="col-sm-12">
        <div class="card mb-4 h-100">
            <div class="card-header py-3 d-flex justify-content-center align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">Status Tanda Tangan</h5>
                
            </div>
            
            <div class="card-body">
    <?php
    $current_date = date('Y-m-d');
    $jenis_bagian_export = 'KENDARAAN UMUM';
    
    // Query to retrieve signature status for specific roles and current date
    $queryStatus = mysqli_query($koneksi, 
        "SELECT jabatan_ttd, danru_export, shift 
        FROM tb_export
        WHERE jabatan_ttd IN ('DANRU', 'DITERIMA', 'DISERAHKAN')
        AND jenis_bagian_export = '$jenis_bagian_export'
        AND DATE(dibuat_pada) = '$current_date'");
    
    // // Initialize status variables
    // $danru_signed = false;
    // $diterima_signed = false;
    // $diserahkan_signed = false;

    // Initialize arrays to store signature status and details
    $signature_status = array(
        'DANRU' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'DITERIMA' => array('signed' => false, 'signer' => '', 'shift' => ''),
        'DISERAHKAN' => array('signed' => false, 'signer' => '', 'shift' => '')
    );

    // // Iterate through query results
    // while ($row = mysqli_fetch_assoc($queryStatus)) {
    //     $jabatan_ttd = $row['jabatan_ttd'];
    //     $danru_export = $row['danru_export'];
        
        
    //     // Check each role and update status variables
    //     switch ($jabatan_ttd) {
    //         case 'DANRU':
    //             $danru_signed = !empty($danru_export);
    //             break;
    //         case 'DITERIMA':
    //             $diterima_signed = !empty($danru_export);
    //             break;
    //         case 'DISERAHKAN':
    //             $diserahkan_signed = !empty($danru_export);
    //             break;
    //         default:
    //             break;
    //     }
    // }

    // Iterate through query results
    while ($row = mysqli_fetch_assoc($queryStatus)) {
        $jabatan_ttd = $row['jabatan_ttd'];
        $danru_export = $row['danru_export'];
        $shift = $row['shift'];
        
        // Update signature status and details for each role
        switch ($jabatan_ttd) {
            case 'DANRU':
                $signature_status['DANRU']['signed'] = !empty($danru_export);
                $signature_status['DANRU']['signer'] = $danru_export;
                $signature_status['DANRU']['shift'] = $shift;
                break;
            case 'DITERIMA':
                $signature_status['DITERIMA']['signed'] = !empty($danru_export);
                $signature_status['DITERIMA']['signer'] = $danru_export;
                $signature_status['DITERIMA']['shift'] = $shift;
                break;
            case 'DISERAHKAN':
                $signature_status['DISERAHKAN']['signed'] = !empty($danru_export);
                $signature_status['DISERAHKAN']['signer'] = $danru_export;
                $signature_status['DISERAHKAN']['shift'] = $shift;
                break;
            default:
                break;
        }
    }
    
    

    // Display status and signer details for each role
    echo "<div class='d-flex justify-content-between'>";
    if ($signature_status['DITERIMA']['signed']) {
        echo "<div class='col-sm-6'>";
        echo "<span class='badge-lg d-flex align-items-center p-1 pe-2 text-primary-emphasis bg-success-subtle border border-primary-subtle rounded-pill'>";
        echo "<i class='fa-solid fa-circle-check fa-lg me-1'></i>";
        echo "<strong>DITERIMA </strong>";
        echo "<span class='vr mx-2'></span>";
        echo "<strong>{$signature_status['DITERIMA']['signer']} ( SHIFT {$signature_status['DITERIMA']['shift']} ).</strong>";
        echo "</span>";
        echo "</div>";
    } else {
        echo "<div class='col-sm-6'>";
        echo "<span class='badge-lg d-flex align-items-center p-1 pe-2 text-primary-emphasis bg-danger-subtle border border-primary-subtle rounded-pill'>";
        echo "<i class='fa-solid fa-circle-xmark fa-lg me-1'></i>";
        echo "<strong>DITERIMA </strong>";
        echo "<span class='vr mx-2'></span>";
        echo "<strong>Belum  tanda tangan. </strong>";
        echo "</span>";
        echo "</div>";
    }
    
    
    
    if ($signature_status['DISERAHKAN']['signed']) {
        echo "<div class='col-sm-6'>";
        echo "<span class='badge-lg d-flex align-items-center p-1 pe-2 text-primary-emphasis bg-success-subtle border border-primary-subtle rounded-pill'>";
        echo "<i class='fa-solid fa-circle-check fa-lg me-1'></i>";
        echo "<strong>DISERAHKAN </strong>";
        echo "<span class='vr mx-2'></span>";
        echo "<strong>{$signature_status['DISERAHKAN']['signer']} ( SHIFT {$signature_status['DISERAHKAN']['shift']} ).</strong>";
        echo "</span>";
        echo "</div>";
    } else {
        echo "<span class='badge-lg d-flex align-items-center p-1 pe-2 text-primary-emphasis bg-danger-subtle border border-primary-subtle rounded-pill'>";
        echo "<i class='fa-solid fa-circle-xmark fa-lg me-1'></i>";
        echo "<strong>DISERAHKAN </strong>";
        echo "<span class='vr mx-2'></span>";
        echo "<strong>Belum  tanda tangan. </strong>";
        echo "</span>";
    }
    echo "</div>";
    ?>
    <br>
    <div class="d-flex justify-content-center">

<div class="w-20">
    <button type="button" class="btn-lg btn-primary btn-block" data-toggle="modal" data-target="#modalPDF">
        <i class="fa-solid fa-file-pdf"></i>&nbsp; Export PDF
    </button>
</div>

<div class="w-20 ml-2"> 
    <button type="button" class="btn-lg btn-success btn-block" data-toggle="modal" data-target="#modalTambah">
        <i class="fa-solid fa-signature"></i>&nbsp; TTD Export
    </button>
</div>

</div>
</div>
        </div>
        </div>
    </div>
    <!-- <div class="col-sm-6">
        <div class="card mb-4 h-100">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Proses Tanda Tangan</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">

    <div class="w-50">
        <button type="button" class="btn-lg btn-primary btn-block" data-toggle="modal" data-target="#modalPDF">
            <i class="fa-solid fa-file-pdf"></i>&nbsp; Export PDF
        </button>
    </div>

    <div class="w-50 ml-2"> 
        <button type="button" class="btn-lg btn-success btn-block" data-toggle="modal" data-target="#modalTambah">
            <i class="fa-solid fa-signature"></i>&nbsp; TTD Export
        </button>
    </div>

</div>

            </div>
        </div>
    </div>
</div> -->

                <br>
                <p></p>
                    <!-- Container Data Karyawan -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h3 class="m-0 text-dark">Kendaraan Umum</h3>
                        
</div>

                            <div class="card-body">
                                
                                
                                
                                <div class="row">
                                    <div class="table-responsive">
                                        <form method="POST" action="data_out_kendaraan_umum.php">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Masuk</th>
                                                        <th>Keluar</th>
                                                        <th>Nomor Kartu</th>
                                                        <th>Nama Driver</th>
                                                        <th>Tipe Kendaraan</th>
                                                        <th>Goods In</th>
                                                        <th>Goods Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                        <!-- data informasi karyawan dari database -->
                                                        <?php
                                                            $noUrut = 1;
                                                            $queryKendaraan = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan_umum
                                                                                                    LEFT JOIN tb_list_card ON tb_kendaraan_umum.tbu_no_kartu = tb_list_card.tblic_uid
                                                                                                    LEFT JOIN tb_list_kendaraan ON tb_kendaraan_umum.tbu_jns_kendaraan = tb_list_kendaraan.tblk_uid
                                                                                                    LEFT JOIN tb_list_bc ON tb_kendaraan_umum.tbu_bc_masuk = tb_list_bc.tblb_uid");
                                                            while($tabelKendaraan = mysqli_fetch_array($queryKendaraan)){
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $noUrut++; ?></td>
                                                                <td><?php echo $tabelKendaraan['tbu_tgl_masuk'] . " - " . $tabelKendaraan['tbu_jam_masuk']; ?></td>
                                                                <td>
                                                                    
                                                                        <?php 
                                                                            if (empty($tabelKendaraan['tbu_tgl_keluar'])){
                                                                        ?>
                                                                            <button type="submit" class="btn btn-danger" name="checkout_kendaraan" value="<?php echo $tabelKendaraan['tbu_uid']; ?>">
                                                                        <?php
                                                                                echo "<i class='fa-solid fa-road-circle-xmark'></i>";
                                                                        ?>
                                                                            </button>
                                                                        <?php
                                                                            } else {
                                                                                echo $tabelKendaraan['tbu_tgl_keluar'] . " - " . $tabelKendaraan['tbu_jam_keluar'];
                                                                            }
                                                                        ?>
                                                                </td>
                                                                <td><?php echo $tabelKendaraan['tblic_no_id']; ?></td>
                                                                <td><?php echo $tabelKendaraan['tbu_nm_supir']; ?></td>
                                                                <td><?php echo $tabelKendaraan['tblk_nama_kendaraan']; ?></td>
                                                                <td><?php echo $tabelKendaraan['tbu_brg_masuk']; ?></td>
                                                                <td><?php echo $tabelKendaraan['tbu_brg_keluar']; ?></td>
                                                            </tr>

                                                        <?php
                                                            }
                                                        ?>
                                                     
                                                </tbody>
                                            </table>
                                        </form>

                                        <!-- Modal Tambah TTD -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Mutasi Malam</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="aksi_security.php">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label">Bagian TTD</label>
                        <div class="col-sm-9">
                            <select id="inputState" class="form-select" name="jabatan_ttd" onchange="toggleTTDFields()" required>
                                <option value="">Choose TTD...</option>
                                <option value="DITERIMA">DITERIMA</option>
                                <option value="DISERAHKAN">DISERAHKAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="input_print_pdf" class="form-control">
                            <input type="hidden" name="input_jns_kunjungan" value="KENDARAAN UMUM" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Shift</label>
                                            <div class="col-sm-9">
                                            <select id="inputState" class="form-select" name="shift">
                                                    <option selected disabled>PILIH SHIFT...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="GS">GS</option>
                                                </select>
                                            </div>
                                        </div>
                    <div id="danruFields" style="display: none;">
                        <div class="row mb-3">
                            <label for="danruName" class="col-sm-3 col-form-label">Danru</label>
                            <div class="col-sm-9">
                                <select class="form-control selectpicker" name="input_nama_danru" data-live-search="true">
                                    <option value="" selected>PILIH DANRU...</option>
                                    <?php
                                    $querySecurity = mysqli_query($koneksi, "SELECT * FROM tb_list_security WHERE tb_pangkat LIKE 'DANRU' ORDER BY tbls_nama ASC");
                                    while ($tabelSecurity = mysqli_fetch_array($querySecurity)) {
                                        echo "<option value='{$tabelSecurity['tbls_nama']}'>{$tabelSecurity['tbls_nik']} - {$tabelSecurity['tbls_nama']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="anggotaFields" style="display: none;">
                        <div class="row mb-3">
                            <label for="anggotaName" class="col-sm-3 col-form-label">Anggota</label>
                            <div class="col-sm-9">
                                <select class="form-control selectpicker" name="input_nama_anggota" data-live-search="true">
                                    <option value="" selected>PILIH ANGGOTA...</option>
                                    <?php
                                    $querySecurity = mysqli_query($koneksi, "SELECT * FROM tb_list_security WHERE tb_pangkat LIKE 'ANGGOTA' ORDER BY tbls_nama ASC");
                                    while ($tabelSecurity = mysqli_fetch_array($querySecurity)) {
                                        echo "<option value='{$tabelSecurity['tbls_nama']}'>{$tabelSecurity['tbls_nik']} - {$tabelSecurity['tbls_nama']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">TTD Ketua Regu</label>
                        <div class="col-sm-9">
                            <style>
                                canvas {
                                    border: 1px solid #000;
                                }
                            </style>
                            <div class="col-sm-4">
                                <canvas id="signatureCanvas" width="300" height="150"></canvas>
                                <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                <input type="hidden" class="form-control" id="signatureFilename" name="signatureFilename">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="tombol_tambah_ttd" class="btn btn-success" id="saveSignatureBtn">Add</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            <script src="signature_pad.umd.min.js"></script>
            <script>
                // Wait for the document to be fully loaded
                document.addEventListener("DOMContentLoaded", function() {
                    // Initialize Signature Pad
                    var canvas = document.getElementById('signatureCanvas');
                    var signaturePad = new SignaturePad(canvas, {
                        backgroundColor: 'rgb(255, 255, 255)' // set background color
                    });

                    // Clear Signature function
                    document.getElementById('clear_signature').addEventListener('click', function() {
                        signaturePad.clear(); // Clear the signature pad
                    });

                    // Form submission
                    document.getElementById('saveSignatureBtn').addEventListener('click', function() {
                        // Get the data URL of the signature
                        var dataURL = signaturePad.toDataURL();

                        // Set the data URL to the hidden input field
                        document.getElementById('signatureFilename').value = dataURL;
                    });
                });

                function toggleTTDFields() {
                    var selectedOption = document.getElementById("inputState").value;
                    var danruFields = document.getElementById("danruFields");
                    var anggotaFields = document.getElementById("anggotaFields");

                    if (selectedOption === "DANRU") {
                        danruFields.style.display = "block";
                        anggotaFields.style.display = "none";
                    } else {
                        danruFields.style.display = "none";
                        anggotaFields.style.display = "block";
                    }
                }
            </script>
        </div>
    </div>
</div>

                    <!-- End Modal -->

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
                        <form method="POST" action="print_kendaraan_umum.php" target="_blank">
                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="input_print_pdf" class="form-control">
                                                    <input type="hidden" name="input_jns_kunjungan" value="KENDARAAN UMUM" class="form-control">
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