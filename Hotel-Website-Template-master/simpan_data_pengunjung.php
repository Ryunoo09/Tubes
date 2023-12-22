<?php
include('config.php');
$koneksi = new Database();
$koneksi->tambah_data_pengunjung(
    $_POST['username'],
    $_POST['nama_pengunjung'],
    $_POST['jenis_kelamin'],
    $_POST['tanggal_lahir'],
    $_POST['phone'],
    $_POST['alamat'],
    $_POST['email'],
    $_POST['foto_profil']

);
header('location: ../material-dashboard-master/pages/menu_pengunjung.html');
?>
