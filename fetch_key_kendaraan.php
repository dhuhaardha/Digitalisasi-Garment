<?php
// Establish database connection
$koneksi = new mysqli("localhost", "root", "", "db_security");

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Fetch options for id_key_room based on kawasan_no_pol
$kawasanNoPol = $_GET['kawasan_no_pol'];
var_dump($kawasanNoPol);

// $sql = "SELECT `id_no_pol`, `kode_kawasan`, `seriesnumber`, `back_kode` FROM tb_list_key_vehicle WHERE `kawasan_no_pol` = ?";
// $stmt = $koneksi->prepare($sql);
// $stmt->bind_param("i", $kawasanNoPol);
// $stmt->execute();
// $result = $stmt->get_result();

$sql = "SELECT `id_no_pol`, `kode_kawasan`, `seriesnumber`, `back_kode` FROM tb_list_key_vehicle WHERE `kawasan_no_pol` = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $kawasanNoPol);
$stmt->execute();
$result = $stmt->get_result();

// Populate select options
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id_no_pol'] . "'>" . $row['kode_kawasan'] . "  " . $row['seriesnumber'] . " " . $row['back_kode'] . "</option>";
    }
} else {
    echo "<option value=''>No keys available</option>";
}

// Close database connection
$stmt->close();
$koneksi->close();

