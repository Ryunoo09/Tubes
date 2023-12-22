<?php
include('config.php');
$db = new Database();

if (isset($_GET['id'])) {
    $nama_pengunjung = $_GET['id'];
    $db->hapus_data_pengunjung($nama_pengunjung);
    header('location:../material-dashboard-master/pages/data_pengunjung.php');
} else {
    header('Location: ../material-dashboard-master/pages/data_pengunjung.php');
}
?>
