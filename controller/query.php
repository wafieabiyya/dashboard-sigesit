<?php
    //query untuk get table from db to qr page 
    $queryTableQR = "SELECT pk.resi, pk.nama_kurir, pk.no_telepon, pk.plat_nomor, pk.tujuan_paket, pk.tujuan_paket_kedua,pk.tujuan_paket_ketiga, pk.jumlah_paket, pk.jumlah_paket_kedua,pk.jumlah_paket_ketiga,
    pk.waktu_paket,
    pt1.qr AS qr_paket1, pt2.qr AS qr_paket2, pt3.qr AS qr_paket3
    FROM pickup pk 
    JOIN paket pt1 ON pk.tujuan_paket = pt1.id_kota 
    JOIN paket pt2 ON pk.tujuan_paket_kedua = pt2.id_kota
    JOIN paket pt3 ON pk.tujuan_paket_ketiga = pt3.id_kota
    ORDER BY pk.resi DESC 
    LIMIT 1";
    $resultTableQR = mysqli_query($conn, $queryTableQR);

    // query untuk get data db to generate pdf 
    $queryGenerate = "SELECT pk.resi, pk.nama_kurir, pk.no_telepon, pk.plat_nomor, pk.tujuan_paket, pk.tujuan_paket_kedua, pk.tujuan_paket_ketiga, pk.jumlah_paket, pk.jumlah_paket_kedua, pk.jumlah_paket_ketiga, 
    pk.waktu_paket, pt.qr
    FROM pickup pk JOIN paket pt ON pk.tujuan_paket=pt.id_kota";
    $resultGenerate = mysqli_query($conn, $queryGenerate);

    // query untuk menampilkan data dari hasil input form dan search
    if (isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $queryHistory = "SELECT * FROM pickup WHERE resi LIKE '%$keyword%' OR 
            nama_kurir LIKE '%$keyword%' OR plat_nomor LIKE '%$keyword%' OR tujuan_paket LIKE '%$keyword%' OR waktu_paket LIKE '%$keyword%' ";
    } else {
        $queryHistory = 'SELECT * FROM pickup';
    }

    //query untuk menampilkan data dari db to history
    if (isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $queryHistory = "SELECT * FROM pickup WHERE resi LIKE '%$keyword%' OR 
            nama_kurir LIKE '%$keyword%' OR plat_nomor LIKE '%$keyword%' OR tujuan_paket LIKE '%$keyword%' OR waktu_paket LIKE '%$keyword%' ";
    } else {
        $queryHistory = 'SELECT * FROM pickup';
    }
    
    $resultHistory = mysqli_query($conn, $queryHistory);


    $queryKota = "SELECT * FROM paket";
    $resultKota = mysqli_query($conn, $queryKota);
?>
