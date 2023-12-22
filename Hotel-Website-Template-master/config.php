<?php

class Database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "reservasi_hotel";
    var $koneksi = "";


    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    function login($username)
    {
    $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($data) == 0) {
        echo "<b>Data user tidak ditemukan</b>";
        $hasil = [];
        header('location: ../material-dashboard-master/pages/login.html');
    } else {
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    }

    return $hasil;
    }

    function tambah_data_kamar($nomor_kamar, $tipe_kamar, $gambar,$harga)
    {
    mysqli_query($this->koneksi, "INSERT INTO data_kamar VALUES ('', '$nomor_kamar', '$tipe_kamar', '$gambar','$harga')");

    $ambil_id = mysqli_query($this->koneksi, "SELECT id FROM data_kamar ORDER BY id DESC LIMIT 1");
    $row_id = mysqli_fetch_array($ambil_id);
    $hasil_id = $row_id['id'];
    }

    function tampil_data_kamar()
    {
    $data = mysqli_query($this->koneksi, "SELECT * FROM data_kamar");
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
    }

    function tambah_data_user($username, $password, $akses_id)
    {
    mysqli_query($this->koneksi, "INSERT INTO user VALUES ('', '$username', '$password', '$akses_id')");
    }


    function tambah_data_pengunjung( $username, $nama_pengunjung, $jenis_kelamin, $tanggal_lahir, $phone, $alamat, $email, $foto_profil)
    {
    mysqli_query($this->koneksi, "INSERT INTO data_pengunjung VALUES ('', '$username','$nama_pengunjung', '$jenis_kelamin', '$tanggal_lahir', '$phone', '$alamat','$email' ,'$foto_profil')");

    $ambil_id = mysqli_query($this->koneksi, "SELECT id FROM data_pengunjung ORDER BY id DESC LIMIT 1");
    $row_id = mysqli_fetch_array($ambil_id);
    $hasil_id = $row_id['id'];
}

    function tampil_data_pengunjung()
    {
    $data = mysqli_query($this->koneksi, "SELECT * FROM data_pengunjung");
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
    }
    function tampil_data_user()
    {
    $data = mysqli_query($this->koneksi, "SELECT * FROM user");
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
    }


    function tampil_profil($username)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM data_pengunjung WHERE username ='$username' ");
        
        if (!$data || mysqli_num_rows($data) == 0) {
            return "Isi data diri Anda";
        } else {
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
    

    function tampil_detail_kamar()
{
    $data = mysqli_query($this->koneksi, "SELECT a.*,b.* FROM data_kamar a INNER JOIN spek_kamar b ON b.tipe_kamar = a.tipe_kamar   ");
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
    }
    

    function tampil_data_penyewa()
    {
    $data = mysqli_query($this->koneksi, "SELECT a.*,b.*,c.* FROM data_pengunjung a 
    INNER JOIN data_penyewa b ON b.nama_pengunjung = a.nama_pengunjung 
    INNER JOIN data_kamar c ON c.tipe_kamar=b.tipe_kamar
    ");
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
    }
    function tampil_data_penyewa_user($username)
    {
        $data = mysqli_query($this->koneksi, "SELECT a.*, b.*, c.* FROM data_pengunjung a 
        INNER JOIN data_penyewa b ON b.nama_pengunjung = a.nama_pengunjung
        INNER JOIN data_kamar c ON c.tipe_kamar = b.tipe_kamar
        WHERE a.username = '$username' ");
    
        if (!$data || mysqli_num_rows($data) == 0) {
            return "Data masih kosong";
        } else {
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
    



    function tambah_data_penyewa($username,$nama_pengunjung, $tipe_kamar, $check_in, $check_out, $total)
    {
    mysqli_query($this->koneksi, "INSERT INTO data_penyewa VALUES ('', '$username', '$nama_pengunjung','$tipe_kamar', '$check_in', '$check_out', '$total')");

    $ambil_id = mysqli_query($this->koneksi, "SELECT id FROM data_penyewa ORDER BY id DESC LIMIT 1");
    $row_id = mysqli_fetch_array($ambil_id);
    $hasil_id = $row_id['id'];


    }

    function tambah_data_spek_kamar($tipe_kamar, $tipe_ranjang, $kulkas, $pemanas_air, $balkon,$bathtub,$sarapan)
    {
    mysqli_query($this->koneksi, "INSERT INTO spek_kamar VALUES ('', '$tipe_kamar', '$tipe_ranjang', '$kulkas', '$pemanas_air', '$balkon','$bathtub','$sarapan')");

    $ambil_id = mysqli_query($this->koneksi, "SELECT id FROM spek_kamar ORDER BY id DESC LIMIT 1");
    $row_id = mysqli_fetch_array($ambil_id);
    $hasil_id = $row_id['id'];


    }

    function edit_data_penyewa( $nama_pengunjung, $tipe_kamar, $check_in, $check_out, $total){
        mysqli_query($this->koneksi, "UPDATE data_penyewa SET nama_pengunjung = '$nama_pengunjung', tipe_kamar = '$tipe_kamar', check_in = '$check_in', check_out = '$check_out', total = '$total' WHERE nama_pengunjung = '$nama_pengunjung'");
    }

    function edit_data_pengunjung( $username, $nama_pengunjung, $jenis_kelamin, $tanggal_lahir, $phone,$alamat,$email,$foto_profil){
        mysqli_query($this->koneksi, "UPDATE data_pengunjung SET username = '$username' , nama_pengunjung = '$nama_pengunjung', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', phone = '$phone', alamat = '$alamat' , email = '$email', foto_profil = '$foto_profil' WHERE username = '$username'");
    }
    

    
    
    function username($username){
            $data_pengunjung = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_pengunjung a
            INNER JOIN user b ON b.username = a.username 
            WHERE a.username='$username'");
            
            while($row_pengunjung = mysqli_fetch_assoc($data_pengunjung)){
                $hasil_pengunjung[] = $row_pengunjung;
            }
            return $hasil_pengunjung;
        }

    function data_penyewa($nama_pengunjung){
            $data_penyewa = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_pengunjung a
            INNER JOIN data_penyewa b ON b.nama_pengunjung = a.nama_pengunjung  INNER JOIN data_penyewa
            WHERE a.nama_pengunjung='$nama_pengunjung'");
            
            while($row_penyewa = mysqli_fetch_assoc($data_penyewa)){
                $hasil_penyewa[] = $row_penyewa;
            }
            return $hasil_penyewa;
        }


    public function ambil_data_kamar()
        {
            $data_kamar = mysqli_query($this->koneksi, "SELECT * FROM data_kamar");
            while($row_data_kamar = mysqli_fetch_array($data_kamar))
            {
                $hasil_data_kamar[] = $row_data_kamar;
            }
            return $hasil_data_kamar;
        }

    function hapus_data_penyewa($username)
        {
        mysqli_query($this->koneksi, "DELETE FROM data_penyewa WHERE username = '$username'");
        }
    function hapus_detail_kamar($tipe_kamar)
        {
        mysqli_query($this->koneksi, "DELETE FROM spek_kamar WHERE tipe_kamar = '$tipe_kamar'");
        }
    function hapus_data_pengunjung($nama_pengunjung)
        {
        mysqli_query($this->koneksi, "DELETE FROM data_pengunjung WHERE nama_pengunjung = '$nama_pengunjung'");
        }
    function hapus_data_kamar($tipe_kamar)
        {
        mysqli_query($this->koneksi, "DELETE FROM data_kamar WHERE tipe_kamar = '$tipe_kamar'");
        }
    function hapus_data_user($username)
        {
        mysqli_query($this->koneksi, "DELETE FROM user WHERE username = '$username'");
        }
    
    public function ambilTarifKamar($tipe_kamar) {
            $query = "SELECT harga FROM data_kamar WHERE tipe_kamar = '$tipe_kamar'";
    
            // Eksekusi query
            $result = $this->koneksi->query($query);
    
            // Periksa apakah query berhasil dieksekusi
            if ($result) {
                // Fetch hasil query sebagai array asosiatif
                $row = $result->fetch_assoc();
    
                // Return harga kamar jika ditemukan, jika tidak, return 0 atau nilai default sesuai kebutuhan
                return $row ? $row['harga'] : 0;
            } else {
                echo "Error: " . $this->koneksi->error;
                return 0; // Atau nilai default sesuai kebutuhan
            }
        }
        


}
