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

<<!doctype html>
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
            <h3 class="text-center">Selamat Datang</h3>
            <form action="simpan_spek_kamar.php" method="post" enctype="multipart/form-data">
    
            <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Tipe_kamar</label>
                  <select name="tipe_kamar" class="form-control">
                        <option value="--"></option>
                       <?php
                       foreach($db->ambil_data_kamar() as $x){
                           echo '<option value="'.$x['tipe_kamar'].'">'.$x['tipe_kamar'].'</option>';
                       }
                       ?>
                    </select>
                </div>
            </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Tipe Ranjang</label>
                  <input type="text" class="form-control" name="tipe_ranjang" id="tipe_ranjang">
                </div>
              </div>

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="budget" class="col-form-label">Kulkas</label>
                        <select class="form-control" name="kulkas" id="kulkas">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak_tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="budget" class="col-form-label">Pemanas_Air</label>
                        <select class="form-control" name="pemanas_air" id="pemanas_air">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak_tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="budget" class="col-form-label">Balkon</label>
                        <select class="form-control" name="balkon" id="balkon">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak_tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="budget" class="col-form-label">Bathtub</label>
                        <select class="form-control" name="bathtub" id="bathtub">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak_tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="budget" class="col-form-label">Sarapan</label>
                        <select class="form-control" name="sarapan" id="sarapan">
                        <option value="tersedia">Iya</option>
                        <option value="tidak_tersedia">Tidak</option>
                        </select>
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
