<?php
include('config.php');

$koneksi = new Database();

// Hitung selisih hari antara check-out dan check-in
$checkInDate = new DateTime($_POST['check_in']);
$checkOutDate = new DateTime($_POST['check_out']);
$interval = $checkInDate->diff($checkOutDate);
$totalHari = $interval->days;

// Ambil tarif kamar dari database berdasarkan tipe kamar yang dipilih
$tipeKamarTerpilih = $_POST['tipe_kamar'];
$tarifKamar = $koneksi->ambilTarifKamar($tipeKamarTerpilih); // Gantilah 'ambilTarifKamar' dengan nama metode sesungguhnya

// Hitung total berdasarkan jumlah hari dan tarif kamar
$total = $totalHari * $tarifKamar;

// Simpan total di session untuk penggunaan selanjutnya jika diperlukan
$_SESSION['total'] = $total;


$koneksi->edit_data_penyewa(
    $_POST['nama_pengunjung'],
    $_POST['tipe_kamar'],
    $_POST['check_in'],
    $_POST['check_out'],
    $total
);

header('location: ../material-dashboard-master/pages/data_penyewa.php');
?>
