<?php

include "koneksi.php";

// mulai session
session_start();

// tanggal otomatis
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['tombol_tambah_karyawan'])) {
    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_karyawan (tbk_nik, tbk_nama, tbk_dept, tbk_status) VALUES 
                                                ('$_POST[input_nik]',
                                                 UPPER('$_POST[input_name]'),
                                                 UPPER('$_POST[input_department]'),
                                                 UPPER('$_POST[input_status]'))");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:index.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:index.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_karyawan'])) {
    $updateQuery = mysqli_query($koneksi, "UPDATE tb_karyawan SET 
                                                tbk_status = 'ACTIVE' WHERE
                                                tbk_nik LIKE '$_POST[tombol_enable_karyawan]'");

    if ($updateQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:index.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:index.php');
        exit;
    }
}

if (isset($_POST['tombol_disable_karyawan'])) {
    $updateQuery = mysqli_query($koneksi, "UPDATE tb_karyawan SET 
                                                tbk_status = 'INACTIVE' WHERE
                                                tbk_nik LIKE '$_POST[tombol_disable_karyawan]'");

    if ($updateQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:index.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:index.php');
        exit;
    }
}

if (isset($_POST['tombol_checkin_karyawan'])) {
    $cariDept = mysqli_query($koneksi, "SELECT tbk_dept FROM tb_karyawan WHERE tbk_nama = '$_POST[input_nama]'");
    $listDept = mysqli_fetch_array($cariDept);
    $Dept = $listDept['tbk_dept'];

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_absensi (tba_nama, tba_dept, tba_tanggal, tba_masuk) VALUES
                                                ('$_POST[input_nama]',
                                                '$Dept',
                                                DATE_FORMAT(NOW(),'%Y-%m-%d'),
                                                DATE_FORMAT(NOW(),'%H:%s'))");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:absensi.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:absensi.php');
        exit;
    }
}

if (isset($_POST['tombol_checkout_karyawan'])) {
    $updateQuery = mysqli_query($koneksi, "UPDATE tb_absensi SET tba_keluar = DATE_FORMAT(NOW(),'%H:%s') WHERE tba_nama LIKE '$_POST[tombol_checkout_karyawan]'");

    if ($updateQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:absensi.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:absensi.php');
        exit;
    }
}

if (isset($_POST['tombol_note_karyawan'])) {
    $updateQuery = mysqli_query($koneksi, "UPDATE tb_absensi SET tba_detail = '$_POST[input_note_karyawan]' WHERE tba_nama LIKE '$_POST[input_nama_karyawan]'");

    if ($updateQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:absensi.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:absensi.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_tamu'])) {
    $name = $_POST['input_nama_tamu'];
    $folderPath = "upload/";
    $image_parts = explode(";base64,", $_POST['signature']);
    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);

    $file = $folderPath . $name . "_" . uniqid() . '.' . $image_type;

    file_put_contents($file, $image_base64);

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_tamu (tbt_tanggal, tbt_masuk, tbt_nama, tbt_alamat, tbt_bertemu, tbt_keperluan, tbt_cek_metal, tbt_cek_mirror, tbt_ktp, tbt_id_card, tbt_paraf) VALUES
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

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added succesfully';
        header('Location:absensi.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:absensi.php');
        exit;
    }
}

if (isset($_POST['tombol_checkout_tamu'])) {
    $updateQuery = mysqli_query($koneksi, "UPDATE tb_tamu SET tbt_keluar = DATE_FORMAT(NOW(), '%H:%s') WHERE tbt_id_card LIKE '$_POST[tombol_checkout_karyawan]'");

    if ($updateQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:absensi.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:absensi.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_cctv'])) {

    if ($_POST['input_name'] == '') {
        $_SESSION['gagal'] = 'name has not been filled';
        header('Location:data_cctv.php');
        exit;
    }

    if ($_POST['input_unit'] == 'PTU1') {
        $genUID = mysqli_query($koneksi, "SELECT MAX(tblc_uid) AS Kode_CCTV FROM tb_list_cctv WHERE SUBSTRING(tblc_uid,1,4) LIKE 'PTU1'");
    } elseif ($_POST['input_unit'] == 'PTU2') {
        $genUID = mysqli_query($koneksi, "SELECT MAX(tblc_uid) AS Kode_CCTV FROM tb_list_cctv WHERE SUBSTRING(tblc_uid,1,4) LIKE 'PTU2'");
    } elseif ($_POST['input_unit'] == 'PTU3') {
        $genUID = mysqli_query($koneksi, "SELECT MAX(tblc_uid) AS Kode_CCTV FROM tb_list_cctv WHERE SUBSTRING(tblc_uid,1,4) LIKE 'PTU3'");
    } else {
        $_SESSION['gagal'] = 'unit has not been selected';
        header('Location:data_cctv.php');
        exit;
    }

    $tabel = mysqli_fetch_array($genUID);
    $kdUID = $_POST['input_unit'];
    $noUID = $tabel['Kode_CCTV'];

    $noUrut = (int) substr($noUID, 5, 3);
    $noUrut++;

    $register = $kdUID . "/" . sprintf("%03s", $noUrut);
    var_dump($kdUID);

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_list_cctv VALUES ('$register', '$_POST[input_unit]', UPPER('$_POST[input_name]'), '$_POST[input_status]')");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_cctv.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_cctv.php');
        exit;
    }
}

if (isset($_POST['tombol_enable_cctv'])) {

    $updateQuery = mysqli_query($koneksi, "UPDATE tb_list_cctv SET tblc_status = 'ACTIVE' WHERE tblc_uid LIKE '$_POST[tombol_enable_cctv]'");

    if ($updateQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_cctv.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_cctv.php');
        exit;
    }
}

if (isset($_POST['tombol_disable_cctv'])) {

    $updateQuery = mysqli_query($koneksi, "UPDATE tb_list_cctv SET tblc_status = 'INACTIVE' WHERE tblc_uid LIKE '$_POST[tombol_disable_cctv]'");

    if ($updateQuery) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:data_cctv.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:data_cctv.php');
        exit;
    }
}

if (isset($_POST['tombol_ok_cctv'])) {
    $today = DATE('Y-m-d');
    $uidReport = "REPCCTV/" . $_POST['input_lokasi'] . "/" . DATE('Y/m/d');

    $updateQuery = mysqli_query($koneksi, "UPDATE tb_list_cctv SET tblc_cek_cctv = '$today' WHERE tblc_uid LIKE '$_POST[tombol_ok_cctv]'");
    $updateQuery1 = mysqli_query($koneksi, "INSERT INTO tb_report_cctv VALUES ('$uidReport', '$_POST[tombol_ok_cctv]', '$today', 'OK')");

    if ($updateQuery && $updateQuery1) {
        $_SESSION['sukses'] = 'data updated successfully';
        header('Location:cek_cctv.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be updated';
        header('Location:cek_cctv.php');
        exit;
    }
}

if (isset($_POST['tombol_register_kendaraan'])) {

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

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_kendaraan (tbrk_uid, tbrk_tanggal, tbrk_masuk, tbrk_jns_kendaraan, tbrk_nmr_kontainer, tbrk_cek_mirror, tbrk_nmr_seal, 
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

    $kartuQuery = mysqli_query($koneksi, "UPDATE tb_list_card SET tblic_status = 'NOT READY' WHERE tblic_uid LIKE '$_POST[input_nomor_kartu]'");

    if ($tambahQuery && $kartuQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:user_register_kendaraan.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:user_register_kendaraan.php');
        exit;
    }
}

if (isset($_POST['tombol_checkout_kendaraan'])) {
    $updateQuery = mysqli_query($koneksi, "UPDATE tb_kendaraan SET tbrk_keluar = DATE_FORMAT(NOW(),'%H:%s') WHERE tbrk_uid LIKE '$_POST[tombol_checkout_kendaraan]'");
    $cariID = mysqli_query($koneksi, "SELECT * FROM tb_kendaraan WHERE tbrk_uid LIKE '$_POST[tombol_checkout_kendaraan]'");

    $ambilID = mysqli_fetch_array($cariID);
    $noID = $ambilID['tbrk_no_card'];
    $updateQuery1 = mysqli_query($koneksi, "UPDATE tb_list_card SET tblic_status = 'READY' WHERE tblic_uid LIKE '$noID'");

    if ($updateQuery && $updateQuery1) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_register_kendaraan.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_register_kendaraan.php');
        exit;
    }
}

if (isset($_POST['tombol_tambah_kendaraan'])) {
    $queryNo = mysqli_query($koneksi, "SELECT MAX(tblk_uid) AS Kode_Terbesar FROM tb_list_kendaraan");

    $tabel = mysqli_fetch_array($queryNo);
    $uidKendaraan = $tabel['Kode_Terbesar'];
    $noUID = (int) substr($uidKendaraan, 3);
    $noUID++;

    $register = "VHC" . sprintf("%03s", $noUID);

    $tambahQuery = mysqli_query($koneksi, "INSERT INTO tb_list_kendaraan VALUES ('$register','$_POST[input_tipe]','$_POST[input_status]')");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'data added successfully';
        header('Location:data_kendaraan.php');
        exit;
    } else {
        $_SESSION['gagal'] = 'data cannot be added';
        header('Location:data_kendaraan.php');
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
    // Assuming $koneksi is your database connection

    // You may want to validate the input data before proceeding with database operations

    // Generate a unique ID for the new record
    $genUID = mysqli_query($koneksi, "SELECT MAX(ID_kunci_ruangan) AS max_id FROM tb_kunci_ruangan");
    $row = mysqli_fetch_assoc($genUID);
    $lastId = $row['max_id'];

    // Extract the numeric part of the last ID and increment it
    $noUrut = (int) substr($lastId, 9) + 1;

    // Generate the new ID
    $register = "keyruang" . sprintf("%03s", $noUrut);

    // Get the selected key details based on the selected id_key_room
    $selected_key_id = $_POST['id_key_room'];
    $key_query = mysqli_query($koneksi, "SELECT name_of_key, amount_of_key FROM tb_list_key_room WHERE id_key_room = '$selected_key_id'");
    $key_row = mysqli_fetch_assoc($key_query);
    $selected_name_of_key = $key_row['name_of_key'];
    $selected_amount_of_key = $key_row['amount_of_key'];

    // Prepare the INSERT query
    $tambahQuery = mysqli_query($koneksi,
        "INSERT INTO tb_kunci_ruangan (ID_kunci_ruangan, id_key_room, name_of_key, amount_of_key, part_operasional, status, date_retrieval, time_retrieval, worker_retrieval, amount_retrieval, signature_retrieval, date_returned, time_returned, worker_returned, amount_returned, signature_returned, date_handover, time_handover, handover_to, amount_handover, signature_handover)
        VALUES ('$register', '$selected_key_id', '$selected_name_of_key', '$selected_amount_of_key', UPPER('$_POST[part_operasional]'), UPPER('$_POST[status]'), '$_POST[date_retrieval]', '$_POST[time_retrieval]', UPPER('$_POST[worker_retrieval]'), '$selected_amount_of_key', '$_POST[signature_retrieval]', '', '', '', '', '', '', '', '', '', '')");

    if ($tambahQuery) {
        $_SESSION['sukses'] = 'Data added successfully';
        header('Location: cek_keyroom.php'); // Redirect after successful insertion
        exit;
    } else {
        $_SESSION['gagal'] = 'Failed to add data';
        header('Location: cek_keyroom.php'); // Redirect after failure
        exit;
    }
} else {
    $_SESSION['gagal'] = 'Form submission failed';
    header('Location: cek_keyroom.php'); // Redirect if form submission fails
    exit;
}

if (isset($_POST['tombol_enable_change_status_keyroom_to_pengembalian'])) {

    $ID_kunci_ruangan = $_POST['ID_kunci_ruangan'];
    $status = 'PENGEMBALIAN';

    // Sanitize the form inputs to prevent SQL injection
    $date_returned = mysqli_real_escape_string($koneksi, $_POST['date_returned']);
    $time_returned = mysqli_real_escape_string($koneksi, $_POST['time_returned']);
    $worker_returned = mysqli_real_escape_string($koneksi, $_POST['worker_returned']);
    $amount_returned = mysqli_real_escape_string($koneksi, $_POST['amount_returned']);
    $signature_returned = mysqli_real_escape_string($koneksi, $_POST['signature_returned']);

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_kunci_ruangan SET 
                        status = '$status',
                        date_returned = '$date_returned', 
                        time_returned = '$time_returned', 
                        worker_returned = UPPER('$worker_returned'), 
                        amount_returned = '$amount_returned', 
                        signature_returned = '$signature_returned'  
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

    // Sanitize the form inputs to prevent SQL injection
    $date_handover = mysqli_real_escape_string($koneksi, $_POST['date_handover']);
    $time_handover = mysqli_real_escape_string($koneksi, $_POST['time_handover']);
    $handover_to = mysqli_real_escape_string($koneksi, $_POST['handover_to']);
    $amount_handover = mysqli_real_escape_string($koneksi, $_POST['amount_handover']);
    $signature_handover = mysqli_real_escape_string($koneksi, $_POST['signature_handover']);

    // Construct the SQL update query
    $updateQuery = "UPDATE tb_kunci_ruangan SET 
                        status = '$status',
                        date_handover = '$date_handover', 
                        time_handover = '$time_handover', 
                        handover_to = '$handover_to', 
                        amount_handover = '$amount_handover', 
                        signature_handover = '$signature_handover'  
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
