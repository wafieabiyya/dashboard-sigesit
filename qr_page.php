<?php
session_start();
include('assets/server/connection.php');
include ('controller/query.php');
?>
<html>

<head>
    <title>QR Generate</title>

    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/dash.css">
    <link rel="icon" type="image/png" href="assets/img/hero.png">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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
                <li><a href="#" class="active">QR Page</a></li>
            </ul>

            <div class="data-tables datatable-dark container">
                <h2>QR Code</h2>
                <table id="exportpdf">
                    <thead>
                        <th>Nama Kurir</th>
                        <th>No Telepon</th>
                        <th>Plat Nomor</th>
                        <th>Tujuan Paket</th>
                        <th>Banyak Paket</th>
                        <th>Waktu Pengambilan</th>
                        <th>Qr Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($resultTableQR)) : ?>
                            <tr>
                                <td><?php echo $row['nama_kurir'] ?></td>
                                <td><?php echo $row['no_telepon'] ?></td>
                                <td><?php echo $row['plat_nomor'] ?></td>
                                <td><?php echo $row['tujuan_paket'] ?></td>
                                <td><?php echo $row['jumlah_paket'] ?></td>
                                <td><?php echo $row['waktu_paket'] ?></td>
                                <td><?php echo "<img style='height:150px; width:150px;' src='assets/img/" . $row['qr_paket1'] . "'>"; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $row['nama_kurir'] ?></td>
                                <td><?php echo $row['no_telepon'] ?></td>
                                <td><?php echo $row['plat_nomor'] ?></td>
                                <td><?php echo $row['tujuan_paket_kedua'] ?></td>
                                <td><?php echo $row['jumlah_paket_kedua'] ?></td>
                                <td><?php echo $row['waktu_paket'] ?></td>
                                <td><?php echo "<img style='height:150px; width:150px;' src='assets/img/" . $row['qr_paket2'] . "'>"; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $row['nama_kurir'] ?></td>
                                <td><?php echo $row['no_telepon'] ?></td>
                                <td><?php echo $row['plat_nomor'] ?></td>
                                <td><?php echo $row['tujuan_paket_ketiga'] ?></td>
                                <td><?php echo $row['jumlah_paket_ketiga'] ?></td>
                                <td><?php echo $row['waktu_paket'] ?></td>
                                <td><?php echo "<img style='height:150px; width:150px;' src='assets/img/" . $row['qr_paket3'] . "'>"; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <script>
          
            $(document).ready(function() {
                $('#exportpdf').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'print',
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            //specify which column you want to print
                        },
                    }]
                });
            });
        </script>


        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>