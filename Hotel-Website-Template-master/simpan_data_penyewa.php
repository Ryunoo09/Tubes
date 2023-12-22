<?php
include('config.php');

$koneksi = new Database();

// Check if the key 'nama_pengunjung' exists in $_POST
if (isset($_POST['nama_pengunjung'])) {
    $nama_pengunjung = $_POST['nama_pengunjung'];
} else {
    // Handle the case when 'nama_pengunjung' is not set
    $nama_pengunjung = ''; // Set a default value or take appropriate action
}

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

//Tambahkan total ke dalam metode tambah_data_penyewa
$koneksi->tambah_data_penyewa(
    $_POST['username'],
    $nama_pengunjung,
    $_POST['tipe_kamar'],
    $_POST['check_in'],
    $_POST['check_out'],
    $total
);

header('location: ../material-dashboard-master/pages/menu_pengunjung.html');
?>
