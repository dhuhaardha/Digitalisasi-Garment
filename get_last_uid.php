<?php
// Koneksi ke database
include 'koneksi.php'; // Sesuaikan dengan file koneksi database Anda

// Query untuk mengambil ID terakhir
$query = "SELECT MAX(uid_export) AS max_id FROM tb_export";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $lastId = $row['max_id'];

    // Kirimkan ID terakhir sebagai response
    echo $lastId;
} else {
    echo "Error";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
