<?php
    include 'assets/server/connection.php';
    $id_kota = $_GET['id_kota'];
    $query = "UPDATE paket SET jumlah_barang = 0 WHERE id_kota = '$id_kota'";

    mysqli_query($conn, $query);
    header('location:dashboard.php');
?>