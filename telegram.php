<?php
session_start();
include 'assets/server/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pick Up</title>
    <link rel="stylesheet" href="assets/css/product.css">
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
            <li><a href="pickUpHistory.php"><i class="uil uil-history icon"></i>History</a></li>
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
        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="dashboard.php">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Send To Telegram</a></li>
            </ul>
            <div class="container">
                <form action="teleAction.php" method="POST">
                    <h2>Send To Telegram</h2>
                    <div class="content">
                        <div class="input-fields">
                            <label for="">Tele Id</label>
                            <input type="" name="chatId" placeholder="Tele Id" required>
                        </div>
                        <div style="margin-right: 5em;">
                            <label for="" style="display: flex;">Pilih File</label>
                            <input type="file" name="file" style="padding-top: 20px;" required>
                        </div>
                        <div class="alert">
                            <div class="button-submit">
                                <button type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <script src="assets/javascript/main.js"></script>
</body>

</html>