<?php
session_start();
include('assets/server/connection.php');
include ('controller/query.php');

?>
<html>

<head>
    <title>Pick Up History</title>
    <link rel="stylesheet" href="assets/css/generate.css">
    <link rel="icon" type="image/png" href="assets/img/hero.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Pick Up History</h2>
        <div class="data-tables datatable-dark">
            <table id="exportpdf">
                <thead>
                    <tr>
                        <th>Resi</th>
                        <th>Nama Kurir</th>
                        <th>No Telepon</th>
                        <th>Plat Nomor</th>
                        <th>Tujuan Paket</th>
                        <th>Jumlah Paket</th>
                        <th>Waktu Pengambilan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc(($resultGenerate))) { ?>
                        <tr>
                            <td><?php echo $row['resi'] ?></td>
                            <td><?php echo $row['nama_kurir'] ?></td>
                            <td><?php echo $row['no_telepon'] ?></td>
                            <td><?php echo $row['plat_nomor'] ?></td>
                            <td><?php echo $row['tujuan_paket'] ?></td>
                            <td><?php echo $row['jumlah_paket'] ?></td>
                            <td><?php echo $row['waktu_paket'] ?></td>                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#exportpdf').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        exportOptions: {
                            stripHtml : false,
                            columns: [0, 1, 2, 3, 4, 5, 6] 
                            //specify which column you want to print
                        }
                    }
                ]
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


</body>

</html>