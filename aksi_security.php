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
    
    $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_list_cctv VALUES ('$register', '$_POST[input_unit]', UPPER('$_POST[input_name]'), '$_POST[input_status]', '')");

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
    $time = DATE('H:i:s');
    $uidReport = "REPCCTV/" . $_POST['input_lokasi'] . "/" . DATE('Y/m/d');
    $namaSecurity = $_POST['input_nama_security'];

    $updateQuery = mysqli_query($koneksi,"UPDATE tb_list_cctv SET tblc_cek_cctv = '$today' WHERE tblc_uid LIKE '$_POST[tombol_ok_cctv]'");
    $updateQuery1 = mysqli_query($koneksi,"INSERT INTO tb_report_cctv VALUES ('$uidReport', '$_POST[tombol_ok_cctv]', '$today', '$time', '$namaSecurity', 'OK')");

    if($updateQuery && $updateQuery1){
        $_SESSION['sukses'] = 'data updated successfully';
        $_SESSION['nama_security'] = $namaSecurity;
        header('Location:cek_cctv.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:cek_cctv.php');
        exit;
    }
}

if (isset($_POST['tombol_notok_cctv'])){
    $today = DATE('Y-m-d');
    $time = DATE('H:i:s');
    $uidReport = "REPCCTV/" . $_POST['input_lokasi'] . "/" . DATE('Y/m/d');
    $namaSecurity = $_POST['input_nama_security'];

    $updateQuery = mysqli_query($koneksi,"UPDATE tb_list_cctv SET tblc_cek_cctv = '$today' WHERE tblc_uid LIKE '$_POST[tombol_ok_cctv]'");
    $updateQuery1 = mysqli_query($koneksi,"INSERT INTO tb_report_cctv VALUES ('$uidReport', '$_POST[tombol_ok_cctv]', '$today', '$time', '$namaSecurity', 'NOT OK')");

    if($updateQuery && $updateQuery1){
        $_SESSION['sukses'] = 'data updated successfully';
        $_SESSION['nama_security'] = $namaSecurity;
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
    $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_kendaraan (tbrk_uid, 
                                                                        tbrk_tanggal, 
                                                                        tbrk_masuk, 
                                                                        tbrk_jns_kendaraan, 
                                                                        tbrk_nama_supir, 
                                                                        tbrk_nomor_plat, 
                                                                        tbrk_nmr_kontainer, 
                                                                        tbrk_cek_mirror, 
                                                                        tbrk_nmr_seal, 
                                                                        tbrk_jns_sim, 
                                                                        tbrk_no_sim, 
                                                                        tbrk_no_card, 
                                                                        tbrk_ttd) 
                                            VALUES (UPPER('$uidVehicle'),
                                                        DATE_FORMAT(NOW(),'%Y-%m-%d'),
                                                        DATE_FORMAT(NOW(),'%H:%s'),
                                                        UPPER('$_POST[input_tipe_kontainer]'),
                                                        UPPER('$_POST[input_nama_supir]'),
                                                        UPPER('$_POST[input_plat_nomor]'),
                                                        UPPER('$_POST[input_nomor_kontainer]'),
                                                        UPPER('$_POST[input_cek_mirror]'),
                                                        UPPER('$_POST[input_nomor_seal]'),
                                                        UPPER('$_POST[input_tipe_sim]'),
                                                        UPPER('$_POST[input_nomor_sim]'),
                                                        UPPER('$_POST[input_nomor_kartu]'),
                                                        '$filePath')");
    
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
    $updateQuery = mysqli_query($koneksi,"UPDATE tb_kendaraan SET tbrk_keluar = DATE_FORMAT(NOW(),'%H:%s'), 
                                                                    tbrk_tanggal_out = DATE_FORMAT(NOW(), '%Y-%m-%d'),
                                                                    tbrk_nama_transporter = UPPER('$_POST[input_nama_transporter]'),
                                                                    tbrk_nama_buyer = UPPER('$_POST[input_nama_buyer]'),
                                                                    tbrk_qty_kirim = UPPER('$_POST[input_total_qty]'),
                                                                    tbrk_no_gp = UPPER('$_POST[input_nomor_gp]'),
                                                                    tbrk_tujuan = UPPER('$_POST[input_lokasi_tujuan]'),
                                                                    tbrk_nm_pengawal = UPPER('$_POST[input_nama_pengawal]'),
                                                                    tbrk_surat_jalan = UPPER('$_POST[input_nomor_surat]'),
                                                                    tbrk_no_eseal = UPPER('$_POST[input_nomor_eseal]') 
                                                                WHERE tbrk_uid LIKE '$_POST[info_uid_kendaraan]'");

    $cariID = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan WHERE tbrk_uid LIKE '$_POST[info_uid_kendaraan]'");

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

    // cari kode terbesar pada SQL
    $queryNo = mysqli_query($koneksi,"SELECT MAX(tblk_uid) AS Kode_Terbesar FROM tb_list_kendaraan");

    $tabel = mysqli_fetch_array($queryNo);
    $uidKendaraan = $tabel['Kode_Terbesar'];
    $noUID = (int) substr($uidKendaraan,8);
    $noUID++;
    
    // cek tipe kendaraan
    if($_POST['input_tipe'] == '1'){
        $tipeKendaraan = 'KU';
    }elseif($_POST['input_tipe'] == '2'){
        $tipeKendaraan = 'KS';
    }else{
        $_SESSION['gagal'] = 'type not selected';
        header('Location:data_kendaraan.php');
        exit;
    }

    // UID kendaraan
    $register = "PTU1/" . $tipeKendaraan . "/" . sprintf("%03s",$noUID);

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_list_kendaraan VALUES (UPPER('$register'),
                                                                                    UPPER('$tipeKendaraan'),
                                                                                    UPPER('$_POST[input_nama]'),
                                                                                    UPPER('$_POST[input_status]'))");

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

if (isset($_POST['tombol_register_kendaraan_umum'])){

    // cari kode terbesar
    $queryNo = mysqli_query($koneksi,"SELECT MAX(SUBSTRING(tbu_uid,9,10)) AS Kode_Terbesar FROM tb_kendaraan_umum");

    $noTerbesar = mysqli_fetch_array($queryNo);
    $uidKendaraan = (int) $noTerbesar['Kode_Terbesar'];
    $uidKendaraan++;

    // UID kendaraan
    $register = "PTU1/KU/" . $uidKendaraan;

    $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $tambahQuery = mysqli_query($koneksi,"INSERT INTO tb_kendaraan_umum (tbu_uid,
                                                        tbu_tgl_masuk,
                                                        tbu_jam_masuk,
                                                        tbu_jns_kendaraan,
                                                        tbu_no_kartu,
                                                        tbu_no_identitas,
                                                        tbu_nm_supir,
                                                        tbu_nmr_plat,
                                                        tbu_nmr_kontainer,
                                                        tbu_nmr_seal,
                                                        tbu_bc_masuk,
                                                        tbu_brg_masuk,
                                                        tbu_ttd) 
                                            VALUES (UPPER('$register'),
                                                        DATE_FORMAT(NOW(),'%Y-%m-%d'),
                                                        DATE_FORMAT(NOW(),'%H:%s'),
                                                        UPPER('$_POST[input_tipe_kontainer]'),
                                                        UPPER('$_POST[input_nomor_kartu]'),
                                                        UPPER('$_POST[input_nomor_identitas]'),
                                                        UPPER('$_POST[input_nama_supir]'),
                                                        UPPER('$_POST[input_plat_nomor]'),
                                                        UPPER('$_POST[input_nomor_kontainer]'),
                                                        UPPER('$_POST[input_nomor_seal]'),
                                                        UPPER('$_POST[input_bc_masuk]'),
                                                        UPPER('$_POST[input_barang_masuk]'),
                                                        '$filePath')");

    $kartuQuery = mysqli_query($koneksi,"UPDATE tb_list_card SET tblic_status = 'NOT READY' WHERE tblic_uid LIKE '$_POST[input_nomor_kartu]'");

    if($tambahQuery && $kartuQuery){
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:user_register_umum.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:user_register_umum.php');
        exit;
    }
    
}

if (isset($_POST['tombol_checkout_kendaraan_umum'])){

    // ambil input dari input box
    $InputUID = $_POST['info_uid_kendaraan'];
    $InputBC = $_POST['input_bc_keluar'];
    $InputNamaSecurity = $_POST['input_nama_security'];
    $InputBarangKeluar = $_POST['input_barang_keluar'];
    $InputNoKartu = $_POST['info_nomor_id'];

    // update ke database
    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_kendaraan_umum SET tbu_tgl_keluar = DATE_FORMAT(NOW(), '%Y-%m-%d'),
                                                                        tbu_jam_keluar = DATE_FORMAT(NOW(),'%H:%s'),
                                                                        tbu_bc_keluar = UPPER('$InputBC'),
                                                                        tbu_brg_keluar = UPPER('$InputBarangKeluar'),
                                                                        tbu_nm_security = UPPER('$InputNamaSecurity') WHERE tbu_uid LIKE '$InputUID'");

    $queryKartu = mysqli_query($koneksi,"UPDATE tb_list_card SET tblic_status = 'READY' WHERE tblic_no_id LIKE '$InputNoKartu'");

    // session
    if($queryUpdate && $queryKartu){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_kendaraan_umum.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_kendaraan_umum.php');
        exit;
    }

}

if (isset($_POST['tombol_tambah_list_security'])){

    // ambil inputan dari input box
    $InputUnit = $_POST['input_unit'];
    $InputNama = $_POST['input_nama'];
    $InputStatus = $_POST['input_status'];

    // cari UID tertinggi
    $queryCari = mysqli_query($koneksi,"SELECT MAX(SUBSTRING(tbls_uid,6,4)) AS Kode_Terbesar FROM tb_list_security");
    $tabelCari = mysqli_fetch_array($queryCari);
    $UID = (int) $tabelCari['Kode_Terbesar'];
    $UID++;
    $InputUID = "PTU1/" . sprintf("%04s",$UID);

    // tambah input ke database
    $queryTambah = mysqli_query($koneksi,"INSERT INTO tb_list_security (tbls_uid,
                                                                        tbls_unit,
                                                                        tbls_nama,
                                                                        tbls_status)
                                            VALUES (UPPER('$InputUID'),
                                                    UPPER('$InputUnit'),
                                                    UPPER('$InputNama'),
                                                    UPPER('$InputStatus'))");

    // session
    if($queryTambah){
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_list_security.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_list_security.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_list_security'])){
    
    // ambil inputan dari input box 
    $InputID = $_POST['tombol_enable_list_security'];

    // update ke database
    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_list_security SET tbls_status = 'ACTIVE' WHERE tbls_uid LIKE '$InputID'");

    // session
    if($queryUpdate){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_list_security.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_list_security.php');
        exit;
    }
}

if (isset($_POST['tombol_disable_list_security'])){

    // ambil inputan dari input box 
    $InputID = $_POST['tombol_disable_list_security'];

    // update ke database
    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_list_security SET tbls_status = 'INACTIVE' WHERE tbls_uid LIKE '$InputID'");

    // session
    if($queryUpdate){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_list_security.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_list_security.php');
        exit;
    }

}

if (isset($_POST['tombol_tambah_list_bc'])){
    
    // ambil input dari input box
    $InputNama = $_POST['input_nama'];
    $InputStatus = $_POST['input_status'];

    // cari UID tertinggi
    $queryCari = mysqli_query($koneksi,"SELECT MAX(SUBSTRING(tblb_uid,6,3)) AS Kode_Terbesar FROM tb_list_bc");
    $tabelCari = mysqli_fetch_array($queryCari);
    $UID = (int) $tabelCari['Kode_Terbesar'];
    $UID++;
    $InputUID = "PTU1/" . sprintf("%03s",$UID);

    // tambah input ke database
    $queryTambah = mysqli_query($koneksi,"INSERT INTO tb_list_bc VALUES (UPPER('$InputUID'),
                                                                            UPPER('$InputNama'),
                                                                            UPPER('$InputStatus'))");

    // session
    if($queryTambah){
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_list_bc.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_list_bc.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_list_bc'])){

    // ambil inputan dari input box
    $InputID = $_POST['tombol_enable_list_bc'];

    // update ke database
    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_list_bc SET tblb_sts_bc = 'ACTIVE' WHERE tblb_uid LIKE '$InputID'");

    // session
    if($queryUpdate){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_list_bc.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_list_bc.php');
        exit;
    }
}

if (isset($_POST['tombol_disable_list_bc'])){

    // ambil inputan dari input box
    $InputID = $_POST['tombol_disable_list_bc'];

    // update ke database
    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_list_bc SET tblb_sts_bc = 'INACTIVE' WHERE tblb_uid LIKE '$InputID'");

    // session
    if($queryUpdate){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_list_bc.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_list_bc.php');
        exit;
    }
}

if (isset($_POST['tombol_register_patroli'])){
    $InputJenisReport = $_POST['input_nama_buku'];
    $InputJamMulai = date("h:i:s");
    $InputHariMulai = date("Y-m-d");
    $InputNamaSecurity = SUBSTR($_POST['input_nama_security'],0,2);
    $InputShift = $_POST['input_shift'];
    $InputUID = "PTU1/" . $InputJenisReport . "/" . $InputHariMulai;

    $queryTambah = mysqli_query($koneksi,"INSERT INTO tb_report_patroli (tbrp_uid,
                                                                            tbrp_jns_report,
                                                                            tbrp_tgl_mulai,
                                                                            tbrp_jam_mulai,
                                                                            tbrp_nm_security,
                                                                            tbrp_shf_security) 
                                                                VALUES (UPPER('$InputUID'),
                                                                            UPPER('$InputJenisReport'),
                                                                            '$InputHariMulai',
                                                                            '$InputJamMulai',
                                                                            UPPER('$InputNamaSecurity'),
                                                                            UPPER('$InputShift'))");

    // session
    if($queryTambah){
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:input_data_patroli.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:input_data_patroli.php');
        exit;
    }
}

if (isset($_POST['tombol_update_patroli'])){
    $InputUIDReport = $_POST['show_uid'];
    $InputJamSelesai = date("h:i:s");
    $InputHariSelesai = date("Y-m-d");
    $InputKeterangan = $_POST['input_remark'];

    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_report_patroli SET tbrp_tgl_selesai = '$InputHariSelesai',
                                                                        tbrp_jam_selesai = '$InputJamSelesai',
                                                                        tbrp_keterangan = UPPER('$InputKeterangan')
                                            WHERE tbrp_uid LIKE '$InputUIDReport'");
    
    // session
    if($queryUpdate){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:input_data_patroli.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:input_data_patroli.php');
        exit;
    }
}

if (isset($_POST['tombol_register_tamu'])){
    $InputJenisKunjungan = $_POST['input_nama_buku'];
    $InputTanggalKunjungan = date("Y-m-d");
    $InputJamKunjungan = date("h:i:s");
    $InputNomorKartu = $_POST['input_nomor_kartu'];
    $InputNomorIdentitas = $_POST['input_nomor_identitas'];
    $InputNamaPengunjung = $_POST['input_nama_pengunjung'];
    $InputAlamatPengunjung = $_POST['input_alamat_pengunjung'];
    $InputJanjiBertemu = $_POST['input_janji_bertemu'];
    $InputTujuanKunjungan = $_POST['input_tujuan_kunjungan'];
    $InputCekMetal = $_POST['input_cek_metal'];
    $InputCekMirror = $_POST['input_cek_mirror'];

    $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $uniqueID = uniqid();
    $InputUID = "PTU1/" . $InputJenisKunjungan . "/" . $InputTanggalKunjungan . "/" . $uniqueID;

    $queryTambah = mysqli_query($koneksi,"INSERT INTO tb_report_tamu (tbrt_uid,
                                                                        tbrt_jns_kunjungan,
                                                                        tbrt_tgl_masuk,
                                                                        tbrt_jam_masuk,
                                                                        tbrt_nm_tamu,
                                                                        tbrt_alm_tamu,
                                                                        tbrt_jnj_temu,
                                                                        tbrt_keperluan,
                                                                        tbrt_cek_metal,
                                                                        tbrt_cek_mirror,
                                                                        tbrt_nmr_identitas,
                                                                        tbrt_nmr_kartu,
                                                                        tbrt_ttd_tamu)
                                            VALUES (UPPER('$InputUID'),
                                                    UPPER('$InputJenisKunjungan'),
                                                    '$InputTanggalKunjungan',
                                                    '$InputJamKunjungan',
                                                    UPPER('$InputNamaPengunjung'),
                                                    UPPER('$InputAlamatPengunjung'),
                                                    UPPER('$InputJanjiBertemu'),
                                                    UPPER('$InputTujuanKunjungan'),
                                                    UPPER('$InputCekMetal'),
                                                    UPPER('$InputCekMirror'),
                                                    UPPER('$InputNomorIdentitas'),
                                                    UPPER('$InputNomorKartu'),
                                                    '$filePath')");

    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_list_card SET tblic_status = 'NOT READY'
                                            WHERE tblic_uid LIKE '$InputNomorKartu'");

    // session
    if($queryTambah && $queryUpdate){
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:input_data_tamu.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:input_data_tamu.php');
        exit;
    }

}

if (isset($_POST['tombol_checkout_visitor'])){
    $InputUID = $_POST['show_uid'];
    $InputTanggalKeluar = date("Y-m-d");
    $InputJamKeluar = date("h:i:s");

    $query = mysqli_query($koneksi, "SELECT tbrt_nmr_kartu FROM tb_report_tamu WHERE tbrt_uid LIKE '$InputUID'");

    if ($query) {
        // Fetch row as an associative array
        $data = mysqli_fetch_assoc($query);

        $queryUpdateKartu = mysqli_query($koneksi,"UPDATE tb_list_card SET tblic_status = 'READY'
                                                    WHERE tblic_uid LIKE '$data[tbrt_nmr_kartu]'");

    }
    $queryUpdate = mysqli_query($koneksi,"UPDATE tb_report_tamu SET tbrt_tgl_keluar = '$InputTanggalKeluar',
                                                                    tbrt_jam_keluar = '$InputJamKeluar'
                                            WHERE tbrt_uid LIKE '$InputUID'");

    // session
    if($queryUpdate && $queryUpdateKartu){
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_tamu_applicant.php');
        exit;
    }else{
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_tamu_applicant.php');
        exit;
    }

}


if (isset($_POST['tombol_tambah_keyroom'])) {

    if ($_POST['input_name_key_room'] == '') {
        $_SESSION['gagal'] = 'name has not been filled';
        header('Location:data_keyroom.php');
        exit;
    }

    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_key_room) AS max_id FROM tb_list_key_room");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extracting the numeric part of the last ID and incrementing it
    $noUrut = (int) substr($lastId, 5) + 1;

    // Generating the new ID
    $register = "KeyR" . sprintf("%03s", $noUrut);

    

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_list_key_room VALUES ('$register', UPPER('$_POST[input_name_key_room]'), '$_POST[input_amount_key_room]')");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_keyroom.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_keyroom.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_operasional_keyroom'])) {
    // Get the data URL of the canvas
    $signatureData = $_POST['signatureFilenamePengambilan'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(ID_kunci_ruangan) AS max_id FROM tb_kunci_ruangan");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extracting the numeric part of the last ID and incrementing it
    $noUrut = (int) substr($lastId, 9) + 1;

    // Generating the new ID
    $register = "keyruang" . sprintf("%03s", $noUrut);

    // Get the selected key details based on the selected id_key_room
    $selected_key_id = $_POST['id_key_room'];
    $key_query = mysqli_query($koneksi, "SELECT name_of_key, amount_of_key FROM tb_list_key_room WHERE id_key_room = '$selected_key_id'");
    $key_row = mysqli_fetch_assoc($key_query);
    $selected_name_of_key = $key_row['name_of_key'];
    $selected_amount_of_key = $key_row['amount_of_key'];

    if ($_POST['part_operasional'] == '1') {
        $tambahQuery = mysqli_query(
            $koneksi,
            "INSERT INTO tb_kunci_ruangan
             (ID_kunci_ruangan, 
             id_key_room, 
             name_of_key, 
             amount_of_key, 
             part_operasional, 
             status, 
             date_retrieval, 
             time_retrieval, 
             worker_retrieval, 
             amount_retrieval, 
             signature_retrieval, 
             date_returned, 
             time_returned, 
             worker_returned, 
             amount_returned, 
             signature_returned, 
             date_handover, 
             time_handover, 
             handover_to, 
             amount_handover, 
             signature_handover)
            VALUES ('$register', '$selected_key_id', '$selected_name_of_key', 
            '$selected_amount_of_key', UPPER('$_POST[part_operasional]'), UPPER('$_POST[status]'), 
            '$_POST[date_retrieval]', '$_POST[time_retrieval]', UPPER('$_POST[worker_retrieval]'), 
            '$selected_amount_of_key', '$filePath', '$_POST[date_returned]', '$_POST[time_returned]', 
            UPPER('$_POST[worker_returned]'), '$selected_amount_of_key', '$_POST[signature_returned]', 
            '', '', '', '', '')"
        );
    }

    if ($_POST['part_operasional'] == '2') {
        $tambahQuery = mysqli_query(
            $koneksi,
            "INSERT INTO tb_kunci_ruangan
             (ID_kunci_ruangan, 
             id_key_room, 
             name_of_key, 
             amount_of_key, 
             part_operasional, 
             status, 
             date_retrieval, 
             time_retrieval, 
             worker_retrieval, 
             amount_retrieval, 
             signature_retrieval, 
             date_returned, 
             time_returned, 
             worker_returned, 
             amount_returned, 
             signature_returned, 
             date_handover, 
             time_handover, 
             handover_to, 
             amount_handover, 
             signature_handover)
            VALUES ('$register', '$selected_key_id', '$selected_name_of_key', '$selected_amount_of_key', UPPER('$_POST[part_operasional]'), UPPER('$_POST[status]'), '$_POST[date_retrieval]', '$_POST[time_retrieval]', UPPER('$_POST[worker_retrieval]'), '$selected_amount_of_key', '$filePath', '$_POST[date_returned]', '$_POST[time_returned]', UPPER('$_POST[worker_returned]'), '$selected_amount_of_key', '$_POST[signature_returned]', '$_POST[date_handover]', '$_POST[time_handover]', UPPER('$_POST[handover_to]'), '$selected_amount_of_key', '$_POST[signature_handover]')"
        );
    }

    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_keyroom.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_keyroom.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_keyroom_to_pengembalian'])) {

    $ID_kunci_ruangan = $_POST['ID_kunci_ruangan'];
    $status = 'PENGEMBALIAN';

    $key_query = mysqli_query($koneksi, "SELECT amount_of_key FROM tb_kunci_ruangan WHERE ID_kunci_ruangan = '$ID_kunci_ruangan'");
    $key_row = mysqli_fetch_assoc($key_query);
    $selected_amount_of_key = $key_row['amount_of_key'];

    $signatureData = $_POST['signatureFilenamePengembalian'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    // Sanitize the form inputs to prevent SQL injection
    $date_returned = mysqli_real_escape_string($koneksi, $_POST['date_returned']);
    $time_returned = mysqli_real_escape_string($koneksi, $_POST['time_returned']);
    $worker_returned = mysqli_real_escape_string($koneksi, $_POST['worker_returned']);
    $amount_returned = $selected_amount_of_key;

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_kunci_ruangan SET 
                        status = '$status',
                        date_returned = '$date_returned', 
                        time_returned = '$time_returned', 
                        worker_returned = UPPER('$worker_returned'), 
                        amount_returned = '$amount_returned', 
                        signature_returned = '$filePath'  
                    WHERE ID_kunci_ruangan = '$ID_kunci_ruangan'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_keyroom.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_keyroom.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_keyroom_to_serahterima'])) {

    $ID_kunci_ruangan = $_POST['ID_kunci_ruangan'];
    $status = 'SERAH TERIMA';

    $key_query = mysqli_query($koneksi, "SELECT amount_of_key FROM tb_kunci_ruangan WHERE ID_kunci_ruangan = '$ID_kunci_ruangan'");
    $key_row = mysqli_fetch_assoc($key_query);
    $selected_amount_of_key = $key_row['amount_of_key'];

    // Sanitize the form inputs to prevent SQL injection
    $date_handover = mysqli_real_escape_string($koneksi, $_POST['date_handover']);
    $time_handover = mysqli_real_escape_string($koneksi, $_POST['time_handover']);
    $handover_to = mysqli_real_escape_string($koneksi, $_POST['handover_to']);
    $amount_handover = $selected_amount_of_key;
    $signature_handover = mysqli_real_escape_string($koneksi, $_POST['signature_handover']);

    $signatureData = $_POST['signatureFilenameSerahTerima'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_kunci_ruangan SET 
                        status = '$status',
                        date_handover = '$date_handover', 
                        time_handover = '$time_handover', 
                        handover_to = UPPER('$handover_to'), 
                        amount_handover = '$amount_handover', 
                        signature_handover = '$filePath'  
                    WHERE ID_kunci_ruangan = '$ID_kunci_ruangan'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_keyroom.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_keyroom.php');
        exit;
    }
}


if (isset($_POST['tombol_tambah_key_vehicle'])) {

    if ($_POST['kawasan_no_pol'] == '') {
        $_SESSION['gagal'] = 'kendaraan has not been filled';
        header('Location:data_key_vehicle.php');
        exit;
    }

    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_no_pol) AS max_id FROM tb_list_key_vehicle");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extracting the numeric part of the last ID and incrementing it
    $noUrut = (int) substr($lastId, 5)+1;

    // Generating the new ID
    $register = "KeyV" . sprintf("%03s", $noUrut);

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_list_key_vehicle VALUES ('$register', UPPER('$_POST[kode_kawasan]'), '$_POST[seriesnumber]', UPPER('$_POST[back_kode]'), '$_POST[kawasan_no_pol]' )");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_key_vehicle.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_key_vehicle.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_operasional_key_vehicle'])) {
    // Get the data URL of the canvas
    $signatureData = $_POST['signatureFilenamePengambilanVehicle'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_vehicle_key) AS max_id FROM tb_kunci_kendaraan");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extract the numeric part of the ID
    $noUrut = (int)substr($lastId, 10) + 1; // Start from the 10th character to extract the numeric part

    // Generating the new ID
    $register = "keyvehicle" . sprintf("%03s", $noUrut);

    // Get the selected key details based on the selected id_key_room
    $selected_key_id = $_POST['id_no_pol'];
    $key_query = mysqli_query($koneksi, "SELECT kode_kawasan, seriesnumber, back_kode FROM tb_list_key_vehicle WHERE id_no_pol = '$selected_key_id'");
    $key_row = mysqli_fetch_assoc($key_query);
    $selected_data = $key_row['kode_kawasan'] . ' ' . $key_row['seriesnumber'] . ' ' . $key_row['back_kode'];

    $status = "DIAMBIL";

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_kunci_kendaraan
         (id_vehicle_key, 
         id_no_pol, 
         no_police, 
         kawasan_no_pol, 
         status, 
         date_taken, 
         time_taken, 
         name_taken, 
         signature_taken, 
         submitted_to, 
         amount_taken, 
         keterangan_taken, 
         date_returned, 
         time_returned, 
         name_returned, 
         signature_returned, 
         recieved_to, 
         amount_returned, 
         keterangan_returned)
        VALUES (
            '$register',
             '$selected_key_id',
              '$selected_data',
               UPPER('$_POST[kawasan_no_pol]'),
               '$status',
                 '$_POST[date_taken]',
                  '$_POST[time_taken]',
                   UPPER('$_POST[name_taken]'),
                    '$filePath',
                      UPPER('$_POST[submitted_to]'),
                      '$_POST[amount_taken]',
                       '$_POST[keterangan_taken]',
                        '',
                         '',
                          '',
                             '',
                              '',
                               '',
                                  '')");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_key_vehicle.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_keyroom.php');
        exit;
    }
}

    if (isset($_POST['tombol_enable_change_status_key_vehicle'])) {

    $id_vehicle_key = $_POST['id_vehicle_key'];
    $status = 'DISERAHKAN';

    $key_query = mysqli_query($koneksi, "SELECT amount_taken FROM tb_kunci_kendaraan WHERE id_vehicle_key = '$id_vehicle_key'");
    $key_row = mysqli_fetch_assoc($key_query);
    $selected_amount_of_key = $key_row['amount_taken'];

    // Sanitize the form inputs to prevent SQL injection
    $date_returned = mysqli_real_escape_string($koneksi, $_POST['date_returned']);
    $time_returned = mysqli_real_escape_string($koneksi, $_POST['time_returned']);
    $name_returned = mysqli_real_escape_string($koneksi, $_POST['name_returned']);
    $recieved_to = mysqli_real_escape_string($koneksi, $_POST['recieved_to']);
    $amount_returned = $selected_amount_of_key;
    $signature_returned = mysqli_real_escape_string($koneksi, $_POST['signature_returned']);
    $keterangan_returned = mysqli_real_escape_string($koneksi, $_POST['keterangan_returned']);

    $signatureData = $_POST['signatureFilenamePengembalian'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_kunci_kendaraan SET 
                        status = '$status',
                        date_returned = '$date_returned', 
                        time_returned = '$time_returned', 
                        name_returned = UPPER('$name_returned'), 
                        signature_returned = '$filePath',
                        recieved_to = UPPER('$recieved_to'), 
                        amount_returned = '$amount_returned', 
                        keterangan_returned = '$keterangan_returned'
                    WHERE id_vehicle_key = '$id_vehicle_key'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_key_vehicle.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_key_vehicle.php');
        exit;
    }
}


if (isset($_POST['tombol_tambah_barang_inventaris'])) {

    if ($_POST['barang_inventaris'] == '') {
        $_SESSION['gagal'] = 'barang inventaris has not been filled';
        header('Location:data_barang_inventaris_shift_3.php');
        exit;
    }

    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_barang_inventaris_pos) AS max_id FROM tb_barang_inventaris_shift_3");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extracting the numeric part of the last ID and incrementing it
    $noUrut = (int) substr($lastId, 5)+1;

    // Generating the new ID
    $register = "BInv" . sprintf("%03s", $noUrut);

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_barang_inventaris_shift_3 VALUES ('$register', UPPER('$_POST[barang_inventaris]') )");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_barang_inventaris_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_barang_inventaris_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_register_surat_transit'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(ID_register) AS max_id FROM tb_register_surat_transit");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extract the numeric part of the ID
    $noUrut = (int)substr($lastId, 8) + 1; // Start from the 10th character to extract the numeric part

    // Generating the new ID
    $register = "register" . sprintf("%03s", $noUrut);

    $ttd = "-";

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_register_surat_transit
         (ID_register,
         jenis_transit, 
         date, 
         time, 
         pengirim, 
         kurir, 
         kepada, 
         kondisi_barang, 
         security_recieved, 
         ttd_office, 
         person_office_recieved, 
         amount, 
         keterangan)
        VALUES (
            '$register',
            '$_POST[jenis_transit]',
                 '$_POST[date]',
                  '$_POST[time]',
                   UPPER('$_POST[pengirim]'),
                    UPPER('$_POST[kurir]'),
                     UPPER('$_POST[kepada]'),
                      UPPER('$_POST[kondisi_barang]'),
                       UPPER('$_POST[security_recieved]'),
                        '$ttd',
                         '$_POST[person_office_recieved]',
                          '$_POST[amount]',
                           '$_POST[keterangan]')");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_register_surat_dan_transit.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_register_surat_dan_transit.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_serahterima_transit_surat_paket'])) {

    $ID_register = $_POST['ID_register'];

    // Sanitize the form inputs to prevent SQL injection
    $person_office_recieved = $_POST['person_office_recieved'];
    
    $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_register_surat_transit SET 
                        person_office_recieved = '$person_office_recieved', 
                        ttd_office = '$filePath'  
                    WHERE ID_register = '$ID_register'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_register_surat_dan_transit.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_register_surat_dan_transit.php');
        exit;
    }
}


if (isset($_POST['tombol_tambah_shift_malam'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(ID_mutasi_shift_3) AS max_id FROM tb_mutasi_shift_3");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extract the numeric part of the ID
    $noUrut = (int)substr($lastId, 8) + 1; // Start from the 10th character to extract the numeric part

    // Generating the new ID
    $register = "ShiftMlm" . sprintf("%03s", $noUrut);

    $jam_10 = "22:00:00";

    $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_mutasi_shift_3
         (ID_mutasi_shift_3, 
         date, 
         nama, 
         NIK, 
         jabatan, 
         jam_operasional_10, 
         jam_operasional_11, 
         jam_operasional_12, 
         jam_operasional_01, 
         jam_operasional_02, 
         jam_operasional_03, 
         jam_operasional_04, 
         jam_operasional_05, 
         pos_10,
         paraf_10,
         pos_11,
         paraf_11,
         pos_12,
         paraf_12,
         pos_01,
         paraf_01,
         pos_02,
         paraf_02,
         pos_03,
         paraf_03,
         pos_04,
         paraf_04,
         pos_05,
         paraf_05,
         keterangan)
        VALUES (
            '$register',
                 '$_POST[date]',
                  UPPER('$_POST[nama]'),
                  '$_POST[NIK]',
                   UPPER('$_POST[jabatan]'),
                    '$jam_10',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '$_POST[pos_10]',
                    '$filePath',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                           '')");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_mutasi_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_pos_11'])) {

    $ID_mutasi_shift_3 = $_POST['ID_mutasi_shift_3'];

    // Sanitize the form inputs to prevent SQL injection
    $pos_11 = $_POST['pos_11'];
    $signatureData = $_POST['signatureFilename11'];

        // Remove the "data:image/png;base64," prefix
     $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
     $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
     $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
     $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
     file_put_contents($filePath, $signatureData);

    $jam_11 = "23:00:00";

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_mutasi_shift_3 SET 
                        jam_operasional_11 = '$jam_11',
                        pos_11 = '$pos_11', 
                        paraf_11 = '$filePath'  
                    WHERE ID_mutasi_shift_3 = '$ID_mutasi_shift_3'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_pos_12'])) {

    $ID_mutasi_shift_3 = $_POST['ID_mutasi_shift_3'];

    // Sanitize the form inputs to prevent SQL injection
    $pos_12 = $_POST['pos_12'];
    $signatureData = $_POST['signatureFilename12'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $jam_12 = "23:00:00";

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_mutasi_shift_3 SET 
                        jam_operasional_12 = '$jam_12',
                        pos_12 = '$pos_12', 
                        paraf_12 = '$filePath'  
                    WHERE ID_mutasi_shift_3 = '$ID_mutasi_shift_3'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_pos_01'])) {

    $ID_mutasi_shift_3 = $_POST['ID_mutasi_shift_3'];

    // Sanitize the form inputs to prevent SQL injection
    $pos_01 = $_POST['pos_01'];
    $signatureData = $_POST['signatureFilename01'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $jam_01 = "01:00:00";

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_mutasi_shift_3 SET 
                        jam_operasional_01 = '$jam_01',
                        pos_01 = '$pos_01', 
                        paraf_01 = '$filePath'  
                    WHERE ID_mutasi_shift_3 = '$ID_mutasi_shift_3'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_pos_02'])) {

    $ID_mutasi_shift_3 = $_POST['ID_mutasi_shift_3'];

    // Sanitize the form inputs to prevent SQL injection
    $pos_02 = $_POST['pos_02'];

    $signatureData = $_POST['signatureFilename02'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $jam_02 = "02:00:00";

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_mutasi_shift_3 SET 
                        jam_operasional_02 = '$jam_02',
                        pos_02 = '$pos_02', 
                        paraf_02 = '$filePath'  
                    WHERE ID_mutasi_shift_3 = '$ID_mutasi_shift_3'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_pos_03'])) {

    $ID_mutasi_shift_3 = $_POST['ID_mutasi_shift_3'];

    // Sanitize the form inputs to prevent SQL injection
    $pos_03 = $_POST['pos_03'];
    $signatureData = $_POST['signatureFilename03'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $jam_03 = "03:00:00";

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_mutasi_shift_3 SET 
                        jam_operasional_03 = '$jam_03',
                        pos_03 = '$pos_03', 
                        paraf_03 = '$filePath'  
                    WHERE ID_mutasi_shift_3 = '$ID_mutasi_shift_3'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_pos_04'])) {

    $ID_mutasi_shift_3 = $_POST['ID_mutasi_shift_3'];

    // Sanitize the form inputs to prevent SQL injection
    $pos_04 = $_POST['pos_04'];
    $signatureData = $_POST['signatureFilename04'];

        // Remove the "data:image/png;base64," prefix
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
        $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $jam_04 = "04:00:00";

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_mutasi_shift_3 SET 
                        jam_operasional_04 = '$jam_04',
                        pos_04 = '$pos_04', 
                        paraf_04 = '$filePath'  
                    WHERE ID_mutasi_shift_3 = '$ID_mutasi_shift_3'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_change_status_pos_05'])) {

    $ID_mutasi_shift_3 = $_POST['ID_mutasi_shift_3'];

    // Sanitize the form inputs to prevent SQL injection
    $pos_05 = $_POST['pos_05'];
    $signatureData = $_POST['signatureFilename05'];

    // Remove the "data:image/png;base64," prefix
    $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

    // Decode the base64-encoded image data
    $signatureData = base64_decode($signatureData);

    // Generate a unique filename using uniqid()
    $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
    $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
    file_put_contents($filePath, $signatureData);

    $jam_05 = "05:00:00";

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_mutasi_shift_3 SET 
                        jam_operasional_05 = '$jam_05',
                        pos_05 = '$pos_05', 
                        paraf_05 = '$filePath'  
                    WHERE ID_mutasi_shift_3 = '$ID_mutasi_shift_3'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_mutasi_shift_3.php');
        exit;
    }
}



if (isset($_POST['tombol_tambah_barang_shift'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(ID_logs_barang_inventaris) AS max_id FROM tb_logs_barang_inventaris_mutasi_shift");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    if ($lastId === NULL) {
        // If there are no existing records, start with LogInv001
        $nextId = "LogInv001";
    } else {
        // Extract the numeric part of the last ID and increment it
        $numericPart = (int)substr($lastId, 7) + 1; 
        // Generating the new ID
        $nextId = "LogInv" . sprintf("%03s", $numericPart);
    }

    // Get the selected key details based on the selected id_key_room
    $selected_barang_pos_id = $_POST['id_barang_inventaris_pos'];
    $barang_query = mysqli_query($koneksi, "SELECT barang_inventaris FROM tb_barang_inventaris_shift WHERE id_barang_inventaris_pos = '$selected_barang_pos_id'");
    $barang_row = mysqli_fetch_assoc($barang_query);
    $selected_data = $barang_row['barang_inventaris'];

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_logs_barang_inventaris_mutasi_shift
         (ID_logs_barang_inventaris, 
         id_barang_inventaris_pos, 
         barang_inventaris, 
         jumlah_barang_inventaris, 
         shift, 
         date_created)
        VALUES (
            '$nextId',
                 '$selected_barang_pos_id',
                  UPPER('$selected_data'),
                  '$_POST[jumlah_barang_inventaris]',
                  '$_POST[shift]',
                   current_timestamp())");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_barang_inventaris_mutasi_malam.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_barang_inventaris_mutasi_malam.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_uraian_shift_malam'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_logs_activity_shift) AS max_id FROM tb_logs_activity_mutasi_shift");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extract the numeric part of the ID
    $noUrut = (int)substr($lastId, 6) + 1; // Start from the 10th character to extract the numeric part

    // Generating the new ID
    $register = "uraian" . sprintf("%03s", $noUrut);


    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_logs_activity_mutasi_shift
         (id_logs_activity_shift,
         shift, 
         time_uraian_created, 
         uraian, 
         time_uraian_finished, 
         dibuat_pada)
        VALUES (
            '$register',
            '$_POST[shift]',
                 '$_POST[time_uraian_created]',
                  '$_POST[uraian]',
                  '$_POST[time_uraian_finished]',
                   current_timestamp())");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_uraian_mutasi_malam.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_uraian_mutasi_malam.php');
        exit;
    }
}


if (isset($_POST['tombol_update_waktu_selesai'])) {

    $id_logs_activity_shift = $_POST['id_logs_activity_shift'];

   
    // Construct the SQL update query
    $updateQuery = "UPDATE 	tb_logs_activity_mutasi_shift SET 
                        uraian = '$_POST[uraian]',
                        time_uraian_finished = '$_POST[time_uraian_finished]'
                    WHERE id_logs_activity_shift = '$id_logs_activity_shift'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_uraian_mutasi_malam.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_uraian_mutasi_malam.php');
        exit;
    }
}


if (isset($_POST['tombol_tambah_shift_1_2'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_mutasi_1_to_GS) AS max_id FROM tb_mutasi_shift_1_to_gs");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    if ($lastId === NULL) {
        // If there are no existing records, start with ShiftMut001
        $nextId = "ShiftMut001";
    } else {
        // Extract the numeric part of the last ID and increment it
        $numericPart = (int)substr($lastId, 8) + 1; 
        // Generating the new ID
        $nextId = "ShiftMut" . sprintf("%03s", $numericPart);
    }
     $jenisShift1 = 1;

     $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
     $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
     $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
     $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
     $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
     file_put_contents($filePath, $signatureData);

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_mutasi_shift_1_to_gs
         (id_mutasi_1_to_GS, 
         jenis,
         nama, 
         NIK, 
         jabatan, 
         pos,
         ttd,
         keterangan,
         dibuat_pada)
        VALUES (
            '$nextId',
            '$jenisShift1',
                  UPPER('$_POST[nama]'),
                  '$_POST[NIK]',
                   UPPER('$_POST[jabatan]'),
                    '$_POST[pos]',
                    '$filePath',
                    '$_POST[keterangan]',
                    current_timestamp())");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_mutasi_shift_1_2.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_mutasi_shift_1_2.php');
        exit;
    }
}


if (isset($_POST['tombol_tambah_shift_2'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_mutasi_1_to_GS) AS max_id FROM tb_mutasi_shift_1_to_gs");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    if ($lastId === NULL) {
        // If there are no existing records, start with ShiftMut001
        $nextId = "ShiftMut001";
    } else {
        // Extract the numeric part of the last ID and increment it
        $numericPart = (int)substr($lastId, 8) + 1; 
        // Generating the new ID
        $nextId = "ShiftMut" . sprintf("%03s", $numericPart);
    }
     $jenisShift1 = 2;

     $signatureData = $_POST['signatureFilename2'];

        // Remove the "data:image/png;base64," prefix
     $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
     $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
     $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
     $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
     file_put_contents($filePath, $signatureData);

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_mutasi_shift_1_to_gs
         (id_mutasi_1_to_GS, 
         jenis,
         nama, 
         NIK, 
         jabatan, 
         pos,
         ttd,
         keterangan,
         dibuat_pada)
        VALUES (
            '$nextId',
            '$jenisShift1',
                  UPPER('$_POST[nama]'),
                  '$_POST[NIK]',
                   UPPER('$_POST[jabatan]'),
                    '$_POST[pos]',
                    '$filePath',
                    '$_POST[keterangan]',
                    current_timestamp())");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_mutasi_shift_1_2.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_mutasi_shift_1_2.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_shift_GS'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_mutasi_1_to_GS) AS max_id FROM tb_mutasi_shift_1_to_gs");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    if ($lastId === NULL) {
        // If there are no existing records, start with ShiftMut001
        $nextId = "ShiftMut001";
    } else {
        // Extract the numeric part of the last ID and increment it
        $numericPart = (int)substr($lastId, 8) + 1; 
        // Generating the new ID
        $nextId = "ShiftMut" . sprintf("%03s", $numericPart);
    }
     $jenisShift1 = "GS";

     $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
     $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
     $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
     $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
     $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
     file_put_contents($filePath, $signatureData);

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_mutasi_shift_1_to_gs
         (id_mutasi_1_to_GS, 
         jenis,
         nama, 
         NIK, 
         jabatan, 
         pos,
         ttd,
         keterangan,
         dibuat_pada)
        VALUES (
            '$nextId',
            '$jenisShift1',
                  UPPER('$_POST[nama]'),
                  '$_POST[NIK]',
                   UPPER('$_POST[jabatan]'),
                    '$_POST[pos]',
                    '$filePath',
                    '$_POST[keterangan]',
                    current_timestamp())");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_mutasi_shift_1_2.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_mutasi_shift_1_2.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_uraian_kontrol_pagar'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(id_opr_kontrol_pagar) AS max_id FROM tb_kontrol_pagar");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extract the numeric part of the ID
    $noUrut = (int)substr($lastId, 6) + 1; // Start from the 10th character to extract the numeric part

    // Generating the new ID
    $register = "KonPag" . sprintf("%03s", $noUrut);


    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_kontrol_pagar
         (id_opr_kontrol_pagar,
         shift, 
         time_kontrol_created, 
         uraian, 
         time_kontrol_finished, 
         dibuat_pada)
        VALUES (
            '$register',
            '$_POST[shift]',
                 '$_POST[time_kontrol_created]',
                  '$_POST[uraian]',
                  '$_POST[time_kontrol_finished]',
                   current_timestamp())");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:cek_kontrol_pagar.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:cek_kontrol_pagar.php');
        exit;
    }
}


if (isset($_POST['tombol_update_waktu_selesai_kontrol_pagar'])) {

    $id_opr_kontrol_pagar = $_POST['id_opr_kontrol_pagar'];

   
    // Construct the SQL update query
    $updateQuery = "UPDATE 	tb_kontrol_pagar SET 
                        uraian = '$_POST[uraian]',
                        time_kontrol_finished = '$_POST[time_kontrol_finished]'
                    WHERE id_opr_kontrol_pagar = '$id_opr_kontrol_pagar'";

    // Execute the update query
    $result = mysqli_query($koneksi, $updateQuery);

    // Check if the query was successful
    if ($result) {
        $_SESSION['sukses'] = 'Data updated successfully';
        header('Location: cek_kontrol_pagar.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'Data cannot be updated';
        header('Location: cek_kontrol_pagar.php');
        exit;
    }
}


if (isset($_POST['tombol_tambah_ttd_danru'])) {
    // Assuming $koneksi is your database connection
    $genUID = mysqli_query($koneksi, "SELECT MAX(uid_export) AS max_id FROM tb_export");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    if ($lastId === NULL) {
        // If there are no existing records, start with ShiftMut001
        $nextId = "PTU1/export/EX001";
    } else {
        // Extract the numeric part of the last ID and increment it
        $numericPart = (int)substr($lastId, 15) + 1; 
        // Generating the new ID
        $nextId = "PTU1/export/EX" . sprintf("%03s", $numericPart);
    }

     $signatureData = $_POST['signatureFilename'];

        // Remove the "data:image/png;base64," prefix
     $signatureData = str_replace('data:image/png;base64,', '', $signatureData);

        // Decode the base64-encoded image data
     $signatureData = base64_decode($signatureData);

        // Generate a unique filename using uniqid()
     $uniqueFilename = uniqid('signature_') . '.png';

    // Set the file path where you want to save the signature image
     $filePath = 'upload/' . $uniqueFilename; // Update with your desired file path and name

    // Save the signature image to the specified file path
     file_put_contents($filePath, $signatureData);

    $tambahQuery = mysqli_query(
        $koneksi,
        "INSERT INTO tb_export
         (uid_export, 
         jenis_bagian_export,
         date, 
         danru_export, 
         ttd_danru, 
         dibuat_pada)
        VALUES (
            '$nextId',
            '$_POST[input_jns_kunjungan]',
                  '$_POST[input_print_pdf]',
                  '$_POST[input_nama_danru]',
                    '$filePath',
                    current_timestamp())");
    

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_tamu_applicant.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_tamu_applicant.php');
        exit;
    }
}

