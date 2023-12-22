<?php
session_start();

$username = $_SESSION['username'];

include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];

    if ($akses_id == '2') {
        // Your code for access level 1 goes here

?>





<!doctype html>
<html lang="en">
  <head>
  	<title>Table 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style2.css">

	</head>
	<body>


	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Hotel Anggreni</h2>
				</div>
			</div>
			<div class="row">
    <div class="col-md-12">
        <h4 class="text-center mb-4">Kamar Hotel</h4>
        <div class="table-wrap">
            <table class="table">
                <thead class="thead-primary">
                    <tr>
                        <th>NO</th>
                        <th>Nomor Kamar</th>
                        <th>Tipe Kamar</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db->tampil_data_kamar() as $x) {
                    ?>
                        <tr style="text-align: center;">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $x['nomor_kamar']; ?></td>
                            <td><?php echo $x['tipe_kamar']; ?></td>
                            <td>
                                <?php
                                if (empty($x['gambar'])) {
                                ?>
                                    <font color="red">Belum ada gambar</font>
                                <?php
                                } else {
                                    // Mendapatkan path lengkap dari gambar di luar direktori
                                    $gambarPath = '' . $x['gambar'];
                                ?>
                                    <img src="<?php echo $gambarPath; ?>" alt="" width="210" height="105">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $x['harga']; ?></td>
                           
</td>
                        </tr>
                    <?php
                    } ?>
                </tbody>

            </table>

            <div class="text-center mt-4">
                <a href="../material-dashboard-master/pages/detail_kamar.php" class="btn btn-primary">Detail</a>
                <a href="../material-dashboard-master/pages/tambah_data_penyewa.php" class="btn btn-primary">Beli</a>
              </div>

        </div>
    </div>
</div>

		</div>

		

	</section>

	<script src="js/jquery.min.js"></script>
  	<script src="js/popper.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/main.js"></script>

	</body>
</html>

<?php } else {
        echo "Anda belum login";
        header("Location: login.php");
    }
}
