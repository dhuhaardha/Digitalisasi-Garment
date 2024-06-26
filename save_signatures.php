<?php 

date_default_timezone_set('Asia/Jakarta');

session_start();

$server     = "localhost";
$user       = "root";
$pass       = "";
$database   = "db_security";

// Cek Koneksi

$koneksi    = mysqli_connect($server, $user , $pass , $database );
if(!$koneksi){ // cek koneksi
    die("Tidak terkoneksi ke database");
}

if (isset($_POST['save_signatures'])) {
  // Process to save signature images (already provided)
  $signatureData1 = $_POST['signatureFilenameDiterima'];
  $signatureData2 = $_POST['signatureFilenameDiserahkan'];
  $signatureData3 = $_POST['signatureFilenameCommander'];
  
  // Remove the "data:image/png;base64," prefix
  $signatureData1 = str_replace('data:image/png;base64,', '', $signatureData1);
  $signatureData2 = str_replace('data:image/png;base64,', '', $signatureData2);
  $signatureData3 = str_replace('data:image/png;base64,', '', $signatureData3);
  
  // Decode the base64-encoded image data
  $signatureData1 = base64_decode($signatureData1);
  $signatureData2 = base64_decode($signatureData2);
  $signatureData3 = base64_decode($signatureData3);
  
  // Generate unique filenames using uniqid()
  $uniqueFilename1 = uniqid('signature_printtamu_diterima') . '.png';
  $uniqueFilename2 = uniqid('signature_printtamu_diserahkan') . '.png';
  $uniqueFilename3 = uniqid('signature_printtamu_commander') . '.png';
  
  // Set the file paths where you want to save the signature images
  $filePath1 = 'upload/' . $uniqueFilename1;
  $filePath2 = 'upload/' . $uniqueFilename2;
  $filePath3 = 'upload/' . $uniqueFilename3;
  
  // Save the signature images to the specified file paths
  file_put_contents($filePath1, $signatureData1);
  file_put_contents($filePath2, $signatureData2);
  file_put_contents($filePath3, $signatureData3);
  }
?>