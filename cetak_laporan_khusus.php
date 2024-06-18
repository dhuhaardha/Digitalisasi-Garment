<?php
    include "koneksi.php";
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

    <title>Print Page</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link href="vendor/woff/font.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top"> 

        <p class="fs-3 fw-bold text-center">
            PT. UNGARAN SARI GARMENTS </br>
            SECURITY - UNGARAN </br>
            </br>
            SPECIAL SECURITY REPORT</br>
            <h6 class="text-center">Periode : <?php echo $_POST['input_print_pdf']; ?></h6>
        </p>

        </br>

        <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Start</th>
                            <th>Finish</th>
                            <th>Security</th>
                            <th>Shift</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <!-- data informasi karyawan dari database -->
                            <?php
                                $InputKode = $_POST['informasi_kode'];
                                $InputTanggal = $_POST['input_print_pdf'];

                                $noUrut = 1;
                                $queryPatroli = mysqli_query($koneksi,"SELECT * FROM tb_report_patroli
                                                                        LEFT JOIN tb_list_security ON tb_report_patroli.tbrp_nm_security = tb_list_security.tbls_nik
                                                                        WHERE tbrp_jns_report LIKE '$InputKode' AND tbrp_tgl_mulai LIKE '$InputTanggal'");
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
        </div>

        </br>
        </br>
        </br>
        </br>

        <div class="table-responsive">
            <table class="table table-borderless col-sm-10" width="100%" cellspacing="0">
                <tr>
                    <td colspan="2"><center>REQUESTED</center></td>
                    <td colspan="2"><center>AKNOWLEDGE</center></td>
                </tr>
                <tr>
                    <td colspan="4"></br></td>
                </tr>
                <tr>
                    <td colspan="4"></br></td>
                </tr>
                <tr>
                    <td style="width: 110px;"><center><?php echo $_POST['input_nama_petugas']; ?></center></td>
                    <td style="width: 110px;"><center><?php echo $_POST['input_nama_penanggung_jawab']; ?></center></td>
                    <td style="width: 110px;"><center><?php echo $_POST['input_nama_komandan_regu']; ?></center></td>
                    <td style="width: 110px;"><center><?php echo $_POST['input_nama_hr']; ?></center></td>
                </tr>
                <tr>
                    <td style="width: 110px;"><center>OFFICER</center></td>
                    <td style="width: 110px;"><center>RESPONSIBLE</center></td>
                    <td style="width: 110px;"><center>COMMANDER</center></td>
                    <td style="width: 110px;"><center>HR & GA</center></td>
                </tr>
            </table>
        </div>
    
                                                                     

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

</body>

<script>
    window.print()
</script>

</html>