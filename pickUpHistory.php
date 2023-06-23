<?php
session_start();
include('assets/server/connection.php');
include ('controller/query.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick Up History</title>
    <link rel="stylesheet" href="assets/css/dash.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" type="image/png" href="assets/img/hero.png">
</head>

<body>

    <!-- -------------------- SIDEBAR START ------------------------->
    <section id="sidebar">
        <a href="#" class="logo"><img src="assets/img/sigesit.png" alt=""></a>
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class="uil uil-create-dashboard icon"></i>Dashboard</a></li>
            <li class="divider">Main</li>
            <li><a href="formPickUp.php"><i class="uil uil-newspaper icon"></i>Form Pick Up</a></li>
            <li><a href="#"><i class="uil uil-history icon"></i>History</a></li>
            <li><a href="qr_page.php"><i class="uil uil-qrcode-scan icon"></i>Qr Code</a></li>
            <hr>
            <li><a href="dataBarang.php"><i class="uil uil-truck icon"></i>Data Barang Masuk</a></li>
            <li><a href="telegram.php"><i class="uil uil-telegram-alt icon"></i>Telegram</a></li>
        </ul>

    </section>
    <!-- -------------------- SIDEBAR END --------------------------->

    <!-- -------------------- NAVBAR START -------------------------->
    <section id="content">
        <!-- NAV -->
        <nav>
            <i class="uil uil-bars toggle-sidebar"></i>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="keyword" id="" placeholder="Search">
                    <i class="uil uil-search icon"></i>
                </div>
            </form>
            <span>Si Gesit Admin</span>
            <span class="divider"></span>
            <div class="profile">
                <i class="uil uil-user image"></i>
            </div>
        </nav>
        <!-- NAV -->

        <!-- --------------------MAIN START ------------------------ -->
        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="dashboard.php">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Pick Up History</a></li>

            </ul>
            <div class="info-table">
                <div class="table">
                    <button class="generate__link">
                        <a href="generate.php">PRINT</a>
                    </button>
                    <div class="table-header">
                        <p>Pick Up History</p>
                        <form action="" method="POST">
                            <div class="search">
                                <input type="text" name="keyword" class="input-search" placeholder="search...">
                                <button type="submit" name="cari"><i class="uil uil-search icon"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="table-section">
                        <table>
                            <thead>
                                <tr>
                                    <th>Resi</th>
                                    <th>Nama Kurir</th>
                                    <th>No Telepon</th>
                                    <th>Plat Nomor</th>
                                    <th>Tujuan Paket</th>
                                    <th>Tujuan Paket Kedua</th>
                                    <th>Jumlah Paket</th>
                                    <th>Waktu Pengambilan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc(($resultHistory))) { ?>
                                    <tr>
                                        <td><?php echo $row['resi'] ?></td>
                                        <td><?php echo $row['nama_kurir'] ?></td>
                                        <td><?php echo $row['no_telepon'] ?></td>
                                        <td><?php echo $row['plat_nomor'] ?></td>
                                        <td><?php echo $row['tujuan_paket'] ?></td>
                                        <td><?php echo $row['tujuan_paket_kedua'] ?></td>
                                        <td><?php echo $row['jumlah_paket'] ?></td>
                                        <td><?php echo $row['waktu_paket'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>
        <!-- --------------------MAIN END ------------------------ -->
    </section>
    <!-- -------------------- NAVBAR END - -------------------------->
    <script src="assets/javascript/main.js"></script>
</body>

</html>