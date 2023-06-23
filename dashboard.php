    <?php
    session_start();
    include('assets/server/connection.php');
    include('controller/query.php');

    if (!isset($_SESSION['logged_in'])) {
        header('location: index.php');
        exit;
    }

    if (isset($_GET['logout'])) {
        if (isset($_SESSION['logged_in'])) {
            unset($_SESSION['logged_in']);
            unset($_SESSION['admin_email']);
            header('location: index.php');
            exit;
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <link rel="stylesheet" href="assets/css/dash.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link rel="icon" type="image/png" href="assets/img/hero.png">
    </head>

    <body>

        <!-- -------------------- SIDEBAR START ------------------------->
        <section id="sidebar">
            <a href="#" class="logo"><img src="assets/img/sigesit.png" alt=""></a>
            <ul class="side-menu">
                <li><a href=""><i class="uil uil-create-dashboard icon"></i>Dashboard</a></li>
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
                    <ul class="profile-link">
                        <li><a href="dashboard.php?logout=1"><i class="uil uil-signin"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>
            <!-- NAV -->

            <!-- --------------------MAIN START ------------------------ -->
            <main>
                <h1 class="title">Dashboard</h1>
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li class="divider">/</li>
                    <li><a href="#" class="active">Dashboard</a></li>
                </ul>
                <div class="info-table">
                    <?php while ($row = mysqli_fetch_assoc(($resultKota))) { ?>
                        <div class="card">
                            <div class="head">
                                <h2>
                                    <span><?php echo $row['nama_kota']; ?></span>
                                    <br>
                                    <h4 style="color: #9BA4B5;"><?php echo $row['id_kota'] ?></h4>
                                    <h3>
                                        <?php
                                        echo $row['jumlah_barang'];
                                        ?>
                                    </h3>
                                    <p>Jumlah Barang</p>
                                </h2>
                            </div>
                            <a href="reset.php?id_kota=<?php echo $row['id_kota'] ?>">Reset</a>
                        </div>
                    <?php } ?>
                </div>
            </main>
            <!-- --------------------MAIN END ------------------------ -->

        </section>
        <!-- -------------------- NAVBAR END - -------------------------->
        <script src="assets/javascript/main.js"></script>
    </body>

    </html