<?php
session_start();

$username = $_SESSION['username'];

include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];

    if ($akses_id == '1') {
        // Your code for access level 1 goes here

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style2.css">

    <title>Contact Form #10</title>
  </head>
  <body>
  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-7">
          <div class="form h-100 contact-wrap p-5">
            <h3 class="text-center">Data Kamar</h3>
            <form action="simpan_data_kamar.php" method="post" enctype="multipart/form-data">

    
            <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Nomor Kamar</label>
                  <input type="text" class="form-control" name="nomor_kamar" id="nomor_kamar">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Tipe Kamar</label>
                  <input type="text" class="form-control" name="tipe_kamar" id="tipe_kamar">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Gambar</label>
                  <input type="file" class="form-control" name="gambar" id="gambar">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">harga</label>
                  <input type="text" class="form-control" name="harga" id="harga">
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-md-5 form-group text-center">
                  <input type="submit" value="Tambah" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
    </form>
</body>
</html>
<?php } else {
        echo "Anda belum login";
        header("Location: ../material-dashboard-master/pages/login.html");
    }
}
