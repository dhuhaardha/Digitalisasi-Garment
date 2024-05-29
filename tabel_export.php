<?php
include "koneksi.php" ;

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width , initial-scale = 1">
    <title>Export Data - Register Washing</title>
    <link href="Bootstraps/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br>
        <div class="mt-5" align="center">
            
            <?php
                if($_SESSION['Purpose']== 'Washing'){
                    echo '<h3 class="text-center fs-1">REGISTER WASHING</h3>';
                }elseif ($_SESSION['Purpose']== 'Bordir') {
                    echo '<h3 class="text-center fs-1">REGISTER BORDIR</h3>';
                }elseif ($_SESSION['Purpose']== 'Mesin'){
                    echo '<h3 class="text-center fs-1">REGISTER MESIN</h3>';
                }else{
                    echo '<h3 class="text-center fs-1">REGISTER SAMPLE WASHING</h3>';
                }
            ?>
        </div>
    </div>

    <div class="container">
    <div class="col align-self-center">
    <br>
    <br>
    <table class="table table-bordered table-striped table-hover text-center align-middle fs-6" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">No</th> 
                    <th scope="col">Kode</th>
                    <th scope="col">Purpose</th> 
                    <th scope="col">Jenis Transfer</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Pembawa</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Gatepass</th>
                    <th scope="col">Surat Jalan</th>
                </tr>
                                    
                <Form method = "GET" action = "">
                    <?php
                    $Purpose = $_SESSION['Purpose'];
                        $Tampil     = mysqli_query($koneksi , "SELECT * FROM transfer_barang WHERE Purpose ='$Purpose' ORDER BY Kode ASC") ;
                        $urutan     = 1;
                        while ($data = mysqli_fetch_array($Tampil)){
                            $Kode                = $data['Kode'];
                            $Purpose             = $data['Purpose'];
                            $Jenis_Transfer      = $data['Jenis_Transfer'];
                            $Tanggal             = $data['Tanggal'];
                            $Jam                 = $data['Jam'];
                            $Pembawa             = $data['Pembawa'];
                            $Keterangan          = $data['Keterangan'];
                            $QTY                 = $data['QTY'];                            
                            $Gatepass            = $data['Gatepass'];
                            $Surat_Jalan         = $data['Surat_Jalan'];

                    ?>
                        <tr>
                            <td scope="row"><?php echo $urutan++ ?></td>
                            <td scope="row"><?php echo $Purpose ?></td>
                            <td scope="row"><?php echo $Kode ?></td>
                            <td scope="row"><?php echo $Jenis_Transfer ?></td>
                            <td scope="row"><?php echo $Tanggal ?></td>
                            <td scope="row"><?php echo $Jam ?></td>
                            <td scope="row"><?php echo $Pembawa ?></td>
                            <td scope="row"><?php echo $Keterangan ?></td>
                            <td scope="row"><?php echo $QTY ?></td>
                            <td scope="row"><?php echo $Gatepass ?></td>
                            <td scope="row"><?php echo $Surat_Jalan ?></td>
                        </tr>
                    <?php
                                                    
                    }
                    ?>
                </form>
        </table>
    </div>
</div>

<div class="container">
    <br>
    <div class="mt-5" align="center">
        <h3 class="text-center fs-1"></h3>
    </div>
</div>
    <div class="container">
        <div class="col align-self-center">
        <br>
        <br>
        <table class="table table-borderless">
            <tr align="center">
                <td scope="col"</td>
                <td scope="col"</td>
                <td scope="col"</td>
                <td scope="col">Petugas,</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td colspan="2">Mengetahui,</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
            <tr align="center">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td></td>
                <td></td>
                <td></td>
                <td scope="col"><u>(<?php echo $_SESSION['petugas']?>)</u></td>
                <td></td>
                <td></td>
                <td></td>
                <td scope="col"><u>(<?php echo $_SESSION['danru']?>)</u><br>Penanggung Jawab Jaga</td>
                <td scope="col"><u>(<?php echo $_SESSION['hrd']?>)</u><br>Komandan Regu</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: ‘Bfrtip’,
        buttons: [
            ‘Excel’ , ‘pdf’
        ]
    } );
} );

    <script src="Bootstraps/js/bootstrap.bundle.min.js" ></script>


</body>
</html>

<script>
    window.print();
</script>



