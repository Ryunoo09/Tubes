<?php
include('config.php');
$db = new Database();

if (isset($_GET['id'])) {
    $tipe_kamar = $_GET['id'];
    $db->hapus_data_kamar($tipe_kamar);
    header('location:../material-dashboard-master/pages/data_kamar.php');
} else {
    header('Location: ../material-dashboard-master/pages/data_kamar.php');
}
?>
