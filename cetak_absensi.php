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

    <title>Cetak Resi</title>

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

<?php 
    if (isset($_POST['tombol_pdf_karyawan'])) { ?>

        <p class="fs-3 fw-bold text-center">
            PT. UNGARAN SARI GARMENTS </br>
            SECURITY - UNGARAN </br>
            </br>
            ABSENSI SENIOR STAFF</br>
            <h6 class="text-center">Hari / Tanggal : <?php echo $_POST['input_print_pdf']; ?></h6>

            
        </p>

        </br>

        
        <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAME</th>
                            <th>DEPARTMENT</th>
                            <th>IN</th>
                            <th>OUT</th>
                            <th>NOTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <!-- data informasi karyawan dari database -->
                            <?php
                                $urut = 1;
                                $absQuery = mysqli_query($koneksi,"SELECT * FROM tb_absensi WHERE tba_tanggal LIKE '$_POST[input_print_pdf]'");
                                while($listAbsence = mysqli_fetch_array($absQuery)){
                            ?>

                                <tr>
                                    <td><?php echo $urut++ ?></td>
                                    <td><?php echo $listAbsence['tba_nama']; ?></td>
                                    <td><?php echo $listAbsence['tba_dept']; ?></td>
                                    <td><?php echo $listAbsence['tba_masuk']; ?></td>
                                    <td>

                                        <?php
                                            if($listAbsence['tba_keluar'] == ''){
                                                echo "-";
                                            }else{
                                                echo $listAbsence['tba_keluar'];
                                            }
                                        ?>
                                        
                                    </td>
                                    <td>

                                        <?php
                                            if($listAbsence['tba_detail'] == ''){
                                                echo "-";
                                            }else{
                                                echo $listAbsence['tba_detail'];
                                            }
                                        ?>

                                    </td>
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