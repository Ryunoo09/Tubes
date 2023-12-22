
<?php
include('config.php');
$koneksi = new Database();
$koneksi->tambah_data_user($_POST['username'], $_POST['password'], $_POST['akses_id']);
header('location: ../material-dashboard-master/pages/login.html');
?>
