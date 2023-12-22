<?php
include('config.php');
$koneksi = new Database();

$cekdir = is_dir("foto_profil");
if ($cekdir) {
    opendir("foto_profil");
} else {
    mkdir("foto_profil");
    chmod("foto_profil", 0755);
    opendir("foto_profil");
}

$daftar_list = array("jpeg", "jpg", "png");
$nama_file = $_FILES['foto_profil']['name'];
$pecah = explode(".", $nama_file);
$ekstensi = strtolower(end($pecah)); // Mengambil ekstensi file yang diunggah dan diubah menjadi lowercase

if (in_array($ekstensi, $daftar_list)) {
    $lokasi_foto_profil = $_FILES['foto_profil']['tmp_name'];
    $nama_foto_profil = $_FILES['foto_profil']['name'];
    $dir_foto_profil = "foto_profil/" . $nama_foto_profil; // Perbaikan pada path penyimpanan foto
    move_uploaded_file($lokasi_foto_profil, $dir_foto_profil);

    $koneksi->edit_data_pengunjung(
        $_POST['username'],
        $_POST['nama_pengunjung'],
        $_POST['jenis_kelamin'],
        $_POST['tanggal_lahir'],
        $_POST['phone'],
        $_POST['alamat'],
        $_POST['email'],
        $dir_foto_profil // Menambahkan path foto_profil pada pemanggilan fungsi edit_data_pengunjung
    );
    header('location: ../material-dashboard-master/pages/profil_pengunjung.php');
} else {
    echo "Tipe file harus berupa gambar <br>";
    // header('location: tampilkan_data_kamar.php'); // Seharusnya ini hanya mengeluarkan pesan, tidak melakukan redirect
}
?>
