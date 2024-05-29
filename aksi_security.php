<?php

    include "koneksi.php";

    // mulai session
    session_start();

    // tanggal otomatis
    date_default_timezone_set('Asia/Jakarta');

    if (isset($_POST['tombol_tambah_karyawan'])){
        $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_karyawan (tbk_nik, tbk_nama, tbk_dept, tbk_status) VALUES 
                                                ('$_POST[input_nik]',
                                                 UPPER('$_POST[input_name]'),
                                                 UPPER('$_POST[input_department]'),
                                                 UPPER('$_POST[input_status]'))");
    
        if($tambahQuery){
            $_SESSION['sukses'] = 'data added successfully';
            header('Location:index.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be added';
            header('Location:index.php');
            exit;
        }

    }

    if (isset($_POST['tombol_enable_karyawan'])){
        $updateQuery = mysqli_query($koneksi,"UPDATE tb_karyawan SET 
                                                tbk_status = 'ACTIVE' WHERE
                                                tbk_nik LIKE '$_POST[tombol_enable_karyawan]'");

        if($updateQuery){
            $_SESSION['sukses'] = 'data updated successfully';
            header('Location:index.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be updated';
            header('Location:index.php');
            exit;
        }
    }

    if (isset($_POST['tombol_disable_karyawan'])){
        $updateQuery = mysqli_query($koneksi,"UPDATE tb_karyawan SET 
                                                tbk_status = 'INACTIVE' WHERE
                                                tbk_nik LIKE '$_POST[tombol_disable_karyawan]'");

        if($updateQuery){
            $_SESSION['sukses'] = 'data updated successfully';
            header('Location:index.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be updated';
            header('Location:index.php');
            exit;
        }
    }

    if (isset($_POST['tombol_checkin_karyawan'])){
        $cariDept = mysqli_query($koneksi,"SELECT tbk_dept FROM tb_karyawan WHERE tbk_nama = '$_POST[input_nama]'");
        $listDept = mysqli_fetch_array($cariDept);
        $Dept = $listDept['tbk_dept'];

        $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_absensi (tba_nama, tba_dept, tba_tanggal, tba_masuk) VALUES
                                                ('$_POST[input_nama]',
                                                '$Dept',
                                                DATE_FORMAT(NOW(),'%Y-%m-%d'),
                                                DATE_FORMAT(NOW(),'%H:%s'))");

        if($tambahQuery){
            $_SESSION['sukses'] = 'data updated successfully';
            header('Location:absensi.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be updated';
            header('Location:absensi.php');
            exit;
        }
    }

    if (isset($_POST['tombol_checkout_karyawan'])){
        $updateQuery = mysqli_query($koneksi,"UPDATE tb_absensi SET tba_keluar = DATE_FORMAT(NOW(),'%H:%s') WHERE tba_nama LIKE '$_POST[tombol_checkout_karyawan]'");

        if($updateQuery){
            $_SESSION['sukses'] = 'data updated successfully';
            header('Location:absensi.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be updated';
            header('Location:absensi.php');
            exit;
        }
    }

    if (isset($_POST['tombol_note_karyawan'])){
        $updateQuery = mysqli_query($koneksi,"UPDATE tb_absensi SET tba_detail = '$_POST[input_note_karyawan]' WHERE tba_nama LIKE '$_POST[input_nama_karyawan]'");

        if($updateQuery){
            $_SESSION['sukses'] = 'data updated successfully';
            header('Location:absensi.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be updated';
            header('Location:absensi.php');
            exit;
        }
    }

    if (isset($_POST['tombol_tambah_tamu'])){
        $name = $_POST['input_nama_tamu'];
        $folderPath = "upload/";
        $image_parts = explode(";base64,", $_POST['signature']);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . $name . "_" . uniqid() . '.' . $image_type;
    
        file_put_contents($file, $image_base64);

        $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_tamu (tbt_tanggal, tbt_masuk, tbt_nama, tbt_alamat, tbt_bertemu, tbt_keperluan, tbt_cek_metal, tbt_cek_mirror, tbt_ktp, tbt_id_card, tbt_paraf) VALUES
                                                (DATE_FORMAT(NOW(), '%Y-%m-%d'),
                                                DATE_FORMAT(NOW(), '%H-%s'),
                                                '$_POST[input_nama_tamu]',
                                                '$_POST[input_alamat_tamu]',
                                                '$_POST[input_kunjung_tamu]',
                                                '$_POST[input_tujuan_tamu]',
                                                '$_POST[input_cek_metal]',
                                                '$_POST[input_cek_mirror]',
                                                '$_POST[input_ktp_tamu]',
                                                '$_POST[input_nomor_visit]',
                                                '$file')");

        if($tambahQuery){
            $_SESSION['sukses'] = 'data added succesfully';
            header('Location:absensi.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be added';
            header('Location:absensi.php');
            exit;
        }
    }

    if (isset($_POST['tombol_checkout_tamu'])){
        $updateQuery = mysqli_query($koneksi,"UPDATE tb_tamu SET tbt_keluar = DATE_FORMAT(NOW(), '%H:%s') WHERE tbt_id_card LIKE '$_POST[tombol_checkout_karyawan]'");

        if($updateQuery){
            $_SESSION['sukses'] = 'data updated successfully';
            header('Location:absensi.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be updated';
            header('Location:absensi.php');
            exit;
        }
    }

    if (isset($_POST['tombol_tambah_cctv'])){

        if($_POST['input_name'] == ''){
            $_SESSION['gagal'] = 'name has not been filled';
            header('Location:data_cctv.php');
            exit;
        }

        if($_POST['input_unit'] == 'PTU1'){
            $genUID = mysqli_query($koneksi,"SELECT MAX(tblc_uid) AS Kode_CCTV FROM tb_list_cctv WHERE SUBSTRING(tblc_uid,1,4) LIKE 'PTU1'");
        }elseif($_POST['input_unit'] == 'PTU2'){
            $genUID = mysqli_query($koneksi,"SELECT MAX(tblc_uid) AS Kode_CCTV FROM tb_list_cctv WHERE SUBSTRING(tblc_uid,1,4) LIKE 'PTU2'");
        }elseif($_POST['input_unit'] == 'PTU3'){
            $genUID = mysqli_query($koneksi,"SELECT MAX(tblc_uid) AS Kode_CCTV FROM tb_list_cctv WHERE SUBSTRING(tblc_uid,1,4) LIKE 'PTU3'");
        }else{
            $_SESSION['gagal'] = 'unit has not been selected';
            header('Location:data_cctv.php');
            exit;
        }

        $tabel = mysqli_fetch_array($genUID);
        $kdUID = $_POST['input_unit'];
        $noUID = $tabel['Kode_CCTV'];

        $noUrut = (int) substr($noUID, 5, 3);
        $noUrut++;

        $register = $kdUID . "/" . sprintf("%03s",$noUrut);
        var_dump($kdUID);
        
        $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_list_cctv VALUES ('$register', '$_POST[input_unit]', UPPER('$_POST[input_name]'), '$_POST[input_status]')");

        if($tambahQuery){
            $_SESSION['sukses'] = 'data added successfully';
            header('Location:data_cctv.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be added';
            header('Location:data_cctv.php');
            exit;
        }
    }

    if (isset($_POST['tombol_enable_cctv'])){

        $updateQuery = mysqli_query($koneksi,"UPDATE tb_list_cctv SET tblc_status = 'ACTIVE' WHERE tblc_uid LIKE '$_POST[tombol_enable_cctv]'");

        if($updateQuery){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_cctv.php');
        exit;
        }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_cctv.php');
        exit;
        }
    }

    if (isset($_POST['tombol_disable_cctv'])){

        $updateQuery = mysqli_query($koneksi,"UPDATE tb_list_cctv SET tblc_status = 'INACTIVE' WHERE tblc_uid LIKE '$_POST[tombol_disable_cctv]'");

        if($updateQuery){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_cctv.php');
        exit;
        }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_cctv.php');
        exit;
        }
    }

    if (isset($_POST['tombol_ok_cctv'])){
        $today = DATE('Y-m-d');
        $uidReport = "REPCCTV/" . $_POST['input_lokasi'] . "/" . DATE('Y/m/d');

        $updateQuery = mysqli_query($koneksi,"UPDATE tb_list_cctv SET tblc_cek_cctv = '$today' WHERE tblc_uid LIKE '$_POST[tombol_ok_cctv]'");
        $updateQuery1 = mysqli_query($koneksi,"INSERT INTO tb_report_cctv VALUES ('$uidReport', '$_POST[tombol_ok_cctv]', '$today', 'OK')");

        if($updateQuery && $updateQuery1){
            $_SESSION['sukses'] = 'data updated successfully';
            header('Location:cek_cctv.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be updated';
            header('Location:cek_cctv.php');
            exit;
        }
    }

    if (isset($_POST['tombol_register_kendaraan'])){

        $today = DATE('Y-m-d');
        $uidVehicle = "REPVEHICLE/" . $_POST['input_nomor_kontainer'] . "/" . DATE('Y/m/d');

        $sim = $_POST['input_nomor_sim'];
        $folderPath = "upload/";
        $image_parts = explode(";base64,", $_POST['signature']);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . $sim . "_" . uniqid() . '.' . $image_type;
    
        file_put_contents($file, $image_base64);

        $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_kendaraan (tbrk_uid, tbrk_tanggal, tbrk_masuk, tbrk_jns_kendaraan, tbrk_nmr_kontainer, tbrk_cek_mirror, tbrk_nmr_seal, 
                                                                                tbrk_ket, tbrk_jns_sim, tbrk_no_sim, tbrk_no_card, tbrk_ttd) 
                                                VALUES ('$uidVehicle',
                                                            DATE_FORMAT(NOW(),'%Y-%m-%d'),
                                                            DATE_FORMAT(NOW(),'%H:%s'),
                                                            '$_POST[input_tipe_kendaraan]',
                                                            '$_POST[input_nomor_kontainer]',
                                                            '$_POST[input_cek_mirror]',
                                                            '$_POST[input_nomor_seal]',
                                                            '$_POST[input_keterangan]',
                                                            '$_POST[input_tipe_sim]',
                                                            '$_POST[input_nomor_sim]',
                                                            '$_POST[input_nomor_kartu]',
                                                            '$file')");
        
        $kartuQuery = mysqli_query($koneksi,"UPDATE tb_list_card SET tblic_status = 'NOT READY' WHERE tblic_uid LIKE '$_POST[input_nomor_kartu]'");

        if($tambahQuery && $kartuQuery){
            $_SESSION['sukses'] = 'data added successfully';
            header('Location:user_register_kendaraan.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be added';
            header('Location:user_register_kendaraan.php');
            exit;
        }
    }

    if (isset($_POST['tombol_checkout_kendaraan'])){
        $updateQuery = mysqli_query($koneksi,"UPDATE tb_kendaraan SET tbrk_keluar = DATE_FORMAT(NOW(),'%H:%s') WHERE tbrk_uid LIKE '$_POST[tombol_checkout_kendaraan]'");
        $cariID = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan WHERE tbrk_uid LIKE '$_POST[tombol_checkout_kendaraan]'");

        $ambilID = mysqli_fetch_array($cariID);
        $noID = $ambilID['tbrk_no_card'];
        $updateQuery1 = mysqli_query($koneksi,"UPDATE tb_list_card SET tblic_status = 'READY' WHERE tblic_uid LIKE '$noID'");

        if($updateQuery && $updateQuery1){
            $_SESSION['sukses'] = 'data added successfully';
            header('Location:data_register_kendaraan.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be added';
            header('Location:data_register_kendaraan.php');
            exit;
        }
    }

    if (isset($_POST['tombol_tambah_kendaraan'])){
        $queryNo = mysqli_query($koneksi,"SELECT MAX(tblk_uid) AS Kode_Terbesar FROM tb_list_kendaraan");

        $tabel = mysqli_fetch_array($queryNo);
        $uidKendaraan = $tabel['Kode_Terbesar'];
        $noUID = (int) substr($uidKendaraan,3);
        $noUID++;

        $register = "VHC" . sprintf("%03s",$noUID);

        $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_list_kendaraan VALUES ('$register','$_POST[input_tipe]','$_POST[input_status]')");

        if($tambahQuery){
            $_SESSION['sukses'] = 'data added successfully';
            header('Location:data_kendaraan.php');
            exit;
        }else{
            $_SESSION['gagal'] = 'data cannot be added';
            header('Location:data_kendaraan.php');
            exit;
        }
    }
?>