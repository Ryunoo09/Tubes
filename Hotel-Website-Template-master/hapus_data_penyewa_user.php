<?php
include('config.php');
$db = new Database();

if (isset($_GET['id'])) {
    $username = $_GET['id'];
    $db->hapus_data_penyewa($username);
    header('location:../material-dashboard-master/pages/kamar_sewa.php');
} else {
    header('Location:../material-dashboard-master/pages/kamar_sewa.php');
}
?>
