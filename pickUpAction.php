<?php 
include 'assets/server/connection.php';
require_once('qr-code/qrlib.php'); 
require_once('fpdf/fpdf.php'); 

$nama_kurir = $_POST['nama_kurir'];
$no_telepon = $_POST['no_telepon'];
$plat_nomor = $_POST['plat_nomor'];
$tujuan_paket_pertama = $_POST['tujuan_paket'];
$tujuan_paket_kedua = $_POST['tujuan_paket_kedua'];
$tujuan_paket_ketiga = $_POST['tujuan_paket_ketiga'];
$jumlah_paket = $_POST['jumlah_paket'];
$jumlah_paket_kedua = $_POST['jumlah_paket_kedua'];
$jumlah_paket_ketiga = $_POST['jumlah_paket_ketiga'];
$waktu_paket_pertama = $_POST['waktu_paket'];

$qr_value_1 = "$tujuan_paket_pertama";

$tempDir = "assets/img/"; 
$codeContents = $qr_value_1; 
$fileName = $tujuan_paket_pertama.'.png'; 
$pngAbsoluteFilePath = $tempDir.$fileName; 
$urlRelativeFilePath = $tempDir.$fileName; 

$qr_value_2 = "$tujuan_paket_kedua";

$tempDir = "assets/img/"; 
$codeContents = $qr_value_2; 
$fileName = $tujuan_paket_kedua.'.png'; 
$pngAbsoluteFilePath = $tempDir.$fileName; 
$urlRelativeFilePath = $tempDir.$fileName;

$qr_value_3 = "$tujuan_paket_ketiga";

$tempDir = "assets/img/"; 
$codeContents = $qr_value_2; 
$fileName = $tujuan_paket_kedua.'.png'; 
$pngAbsoluteFilePath = $tempDir.$fileName; 
$urlRelativeFilePath = $tempDir.$fileName;



if (!file_exists($pngAbsoluteFilePath)) { 
    QRcode::png($codeContents, $pngAbsoluteFilePath); 
}

$query = "INSERT INTO pickup VALUES 
('', '$nama_kurir', '$no_telepon', '$plat_nomor', '$tujuan_paket_pertama','$tujuan_paket_kedua','$tujuan_paket_ketiga','$jumlah_paket','$jumlah_paket_kedua','$jumlah_paket_ketiga','$waktu_paket_pertama')";
mysqli_error($conn);
mysqli_query($conn, $query);

header('location: qr_page.php');
 ?>
