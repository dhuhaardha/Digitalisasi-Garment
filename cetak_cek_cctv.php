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

    <title>Cetak CCTV Report</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link href="vendor/woff/font.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>@media print{@page {size: landscape}}</style>

</head>

<body id="page-top">

<?php 
    if (isset($_POST['tombol_pdf_cctv'])) { ?>

        <p class="fs-3 fw-bold text-center">
            PT. UNGARAN SARI GARMENTS </br>
            SECURITY - UNGARAN </br>
            </br>
            CHECK LIST CCTV</br>
            <h6 class="text-center">Periode : <?php echo $_POST['input_print_pdf']; ?></h6>

            
        </p>

        </br>

        
        <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>

                        <?php
                            $tahun = substr($_POST['input_print_pdf'],0,4);
                            $bulan = substr($_POST['input_print_pdf'],5);
                            $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
                            $tglJudul = 1;
                        ?>

                        <tr>
                            <th>NO</th>
                            <th>NAME</th>

                            <?php
                                while($tglJudul <= $tanggal){
                                    echo "<th>$tglJudul</th>";
                                    $tglJudul++;
                                }
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                            <!-- data informasi karyawan dari database -->
                            <?php
                                $urut = 1;
                                $namaKamera = mysqli_query($koneksi,"SELECT DISTINCT tb_list_cctv.tblc_nama_cctv, tb_report_cctv.tbrc_uid_cctv FROM tb_report_cctv LEFT JOIN tb_list_cctv ON tb_report_cctv.tbrc_uid_cctv = tb_list_cctv.tblc_uid");
                                while($listKamera = mysqli_fetch_array($namaKamera)){
                            ?>

                                <tr>
                                    <td><?php echo $urut++ ?></td>
                                    <td><?php echo $listKamera['tblc_nama_cctv']; ?></td>
                                    <?php
                                        
                                        $a = 1;
                                        $dtKamera = $listKamera['tbrc_uid_cctv'];
                                        while($a <= $tanggal){
                                            $cmbTgl = $_POST['input_print_pdf'] . "-" . $a;
                                            $statusQuery = mysqli_query($koneksi,"SELECT * FROM tb_report_cctv WHERE tbrc_uid_cctv = '$dtKamera' AND tbrc_tgl_cek = '$cmbTgl'");
                                            $stsCek = mysqli_fetch_array($statusQuery);
                                            
                                            if(empty($stsCek['tbrc_status_cek'])){
                                                $hasil = "";
                                            }else{
                                                $hasil = "<i class='fa-solid fa-circle-check'></i>";
                                            }

                                            echo "<td>$hasil</td>";
                                            
                                            $a++;
                                        }
                                        
                                    ?>
                                    
                                </tr>

                            <?php
                                }
                            ?>
                        
                    </tbody>
                </table>
        </div>

    <?php
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

</body>

<script>
    window.print()
</script>

</html>