<?php
include('config.php');
$koneksi = new Database();
$koneksi->tambah_data_spek_kamar(
    $_POST['tipe_kamar'],
    $_POST['tipe_ranjang'],
    $_POST['kulkas'],
    $_POST['pemanas_air'],
    $_POST['balkon'],
    $_POST['bathtub'],
    $_POST['sarapan'],
);
header('location: ../material-dashboard-master/pages/spek_kamar.php');
?>
