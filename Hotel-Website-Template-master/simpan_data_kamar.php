<?php
include('config.php');
$koneksi = new Database();

$cekdir = is_dir("gambar");
if ($cekdir) {
    opendir("gambar");
} else {
    mkdir("gambar");
    chmod("gambar", 0755);
    opendir("gambar");
}
$daftar_list = array("jpeg", "jpg", "png");
$nama_file = $_FILES['gambar']['name'];
$pecah = explode(".", $nama_file);
$ekstensi = $pecah[1]; // Mengambil ekstensi file yang diunggah
if (in_array($ekstensi, $daftar_list)) {
    $lokasi_gambar = $_FILES['gambar']['tmp_name'];
    $nama_gambar = $_FILES['gambar']['name'];
    $dir_gambar = "gambar/" . $nama_gambar;
    move_uploaded_file($lokasi_gambar, $dir_gambar);
    $koneksi->tambah_data_kamar(
        $_POST['nomor_kamar'],
        $_POST['tipe_kamar'],
        $dir_gambar,
        $_POST['harga']

    );

    header('location: ../material-dashboard-master/pages/data_kamar.php');
} else {
    echo "Tipe file harus berupa gambar <br>";
    header('location: tampilkan_data_kamar.php');
}





?>
