<?php
session_start();
$username = $_SESSION['username'];
include "../../Hotel-Website-Template-master/config.php";
$db = new Database();
foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == '2') {
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


  

  <?php 
            include 'menu_pengunjung.html'; 
            $db = new Database();
            ?>
  

  <?php
        require_once '../../Hotel-Website-Template-master/config.php';
        $db = new Database();
        $data_pengunjung = $db->username($username);
            // Tambahkan kode untuk menangani data_pengunjung
        
?>


  
  

  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-7">
          <div class="form h-100 contact-wrap p-5">
            <h3 class="text-center">Selamat Datang</h3>
            <form action="../../Hotel-Website-Template-master/simpan_data_penyewa.php" method="post">

            <div class="row">
              <div class="col-md-12 form-group mb-3">
                  <label for="" class="col-form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username"  value="<?php echo isset($data_pengunjung[0]['username']) ? $data_pengunjung[0]['username'] : ''; ?>">
              </div>
          </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="" class="col-form-label">Nama </label>
                  <input type="text" class="form-control" name="nama_pengunjung" id="nama_pengunjung"  value="<?php echo isset($data_pengunjung[0]['nama_pengunjung']) ? $data_pengunjung[0]['nama_pengunjung'] : ''; ?>" >
                </div>
              </div>

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
                        <label for="check_in" class="col-form-label">Check-in</label>
                        <input type="date" class="form-control" name="check_in" id="check_in" placeholder ="Check-in">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                      <label for="check_out" class="col-form-label">Check Out</label>
                      <input type="date" class="form-control" name="check_out" id="check_out" placeholder="Check Out">
                    </div>
                  </div>


             

              <div class="row justify-content-center">
                <div class="col-md-5 form-group text-center">
                  <input type="submit" value="Kirim" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              Terima Kasih sudah Memesan!
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>


<?php
} else {
echo "Anda belum login";
header("Location: login.php");
}
}
?>

