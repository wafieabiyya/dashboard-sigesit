<?php
    include 'assets/server/connection.php';
    require_once('qr-code/qrlib.php'); 
    require_once('fpdf/fpdf.php'); 
    
    $tujuan_paket = $_POST['tujuan_paket'];
    $jumlah_barang = $_POST['jumlah_barang'];

    $query = "UPDATE paket SET jumlah_barang = jumlah_barang + $jumlah_barang WHERE id_kota = '$tujuan_paket'";

    mysqli_query($conn, $query);

    header('location: dashboard.php');
?>