<?php
session_start();
$username = $_SESSION['username'];
include "../../Hotel-Website-Template-master/config.php";
$db = new Database();
foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == '2') {
        ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian</title>
    <style>
        body {
            background: linear-gradient(to right, #4a90e2, #36d1dc);
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
<?php 
            include 'menu_pengunjung.html'; 
            $db = new Database();
            ?>

    <h2>Kamar Saya</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>username</th>
                <th>Tipe Kamar</th>
                <th>Nomor Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
        <tr>
        <?php
                $no = 1;
                $dataPenyewa = $db->tampil_data_penyewa_user($username);

                if ($dataPenyewa == "Data masih kosong") {
                    echo '<tr><td colspan="7" style="text-align: center;">Belum ada pesanan</td></tr>';
                } else {
                    foreach ($dataPenyewa as $x) {
                ?>
                    <tr style="text-align: center;">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $x['username']; ?></td>
                        <td><?php echo $x['tipe_kamar']; ?></td>
                        <td><?php echo $x['nomor_kamar']; ?></td>
                        <td><?php echo $x['check_in']; ?></td>
                        <td><?php echo $x['check_out']; ?></td>
                        <td><?php echo $x['total']; ?></td>
                        <td><a href="../../Hotel-Website-Template-master/hapus_data_penyewa_user.php?id=<?php echo $x['username']; ?>">Batalkan</a></td>
                    </tr>
                <?php
                    }
                }
                ?>

            <!-- Tambahkan baris ini untuk setiap data pembelian -->
        </tbody>
    </table>

</body>
</html>


<?php
} else {
echo "Anda belum login";
header("Location: login.html");
}
}
?>
          
