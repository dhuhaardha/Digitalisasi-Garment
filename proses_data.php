<?php

include "koneksi.php" ;


if(isset($_POST['Simpan'])){
    $Kode                =$_POST['Kode'];
    $Purpose             = $_POST['Purpose'];
    $Jenis_Transfer      =$_POST['Jenis_Transfer'];
    $Tanggal             =$_POST['Tanggal'];
    $Jam                 =$_POST['Jam'];
    $Pembawa             =$_POST['Pembawa'];
    $Keterangan          =$_POST['Keterangan'];
    $QTY                 =$_POST['QTY'];
    $Gatepass            =$_POST['Gatepass'];
    $Surat_Jalan         =$_POST['Surat_Jalan'];

        $Simpan   = mysqli_query($koneksi,"INSERT INTO transfer_barang (Kode,Purpose,Jenis_Transfer,Tanggal,Jam,Pembawa,Keterangan,QTY,Gatepass,Surat_Jalan) values ('$Kode','$Purpose','$Jenis_Transfer','$Tanggal','$Jam','$Pembawa','$Keterangan','$QTY','$Gatepass','$Surat_Jalan')");
        if($Simpan){
            echo "<script>
                    alert('Data berhasil disimpan !')
                  </script>";
                header('location:index.php');
                exit;
        }else{
            echo "<script>
                    alert('Data berhasil disimpan !')
                  </script>";
                header('location:index.php');
                exit;
        }
    }else{
        $error  ="Silahkan input ulang data !";
    }





