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
            <h3 class="text-center">Selamat Datang</h3>
            <form action="simpan_data_pengunjung.php" method="post">
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Nama </label>
                  <input type="text" class="form-control" name="nama_pengunjung" id="nama_pengunjung" placeholder="Your name">
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Email *</label>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Your email">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Your username">
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Jenis Kelamin</label>
                  <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal lahir">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your phone">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
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
              Terima Kasih Sudah Mengisi Data Diri Anda!
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