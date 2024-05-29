<?php
session_start();

include "koneksi.php" ;



if(isset($_POST['Export'])){

    if($_POST['Purpose']=='Washing'){
        $_SESSION['petugas'] = $_POST['petugas'];
        $_SESSION['danru'] = $_POST['danru'];
        $_SESSION['hrd'] = $_POST['hrd'];
        $_SESSION['Purpose'] = $_POST['Purpose'];
        header('location:tabel_export.php');
        exit;
    }elseif(($_POST['Purpose']=='Bordir')){
        $_SESSION['petugas'] = $_POST['petugas'];
        $_SESSION['danru'] = $_POST['danru'];
        $_SESSION['hrd'] = $_POST['hrd'];
        $_SESSION['Purpose'] = $_POST['Purpose'];
        header('location:tabel_export.php');
        exit;
    }elseif(($_POST['Purpose']=='Mesin')){
        $_SESSION['petugas'] = $_POST['petugas'];
        $_SESSION['danru'] = $_POST['danru'];
        $_SESSION['hrd'] = $_POST['hrd'];
        $_SESSION['Purpose'] = $_POST['Purpose'];
        header('location:tabel_export.php');
        exit;
    }else{
        $_SESSION['petugas'] = $_POST['petugas'];
        $_SESSION['danru'] = $_POST['danru'];
        $_SESSION['hrd'] = $_POST['hrd'];
        $_SESSION['Purpose'] = $_POST['Purpose'];
        header('location:tabel_export.php');
        exit;
    }
}

?>  