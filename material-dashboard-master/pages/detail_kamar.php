<?php
session_start();
$username = $_SESSION['username'];
include "../../Hotel-Website-Template-master/config.php";
$db = new Database();
foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == '2') {
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../assets/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="../assets/js/core/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/core/jquery.min.js" crossorigin="anonymous"></script>
    <title>Contoh PHP dengan CSS</title>
    <link rel="stylesheet" href="spek.css">
</head>
<body>


<?php 
            include 'menu_pengunjung.html'; 
            $db = new Database();
            ?>


<?php
                        $no = 1;
                        foreach ($db->tampil_detail_kamar() as $x){
                           
                        ?>

        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                    <td>
                              <?php
                              if (empty($x['gambar'])) {
                              ?>
                                <font color="red">Belum ada gambar</font>
                              <?php
                              } else {
                                // Mendapatkan path lengkap dari gambar di luar direktori
                                $gambarPath = '../../Hotel-Website-Template-master/' . $x['gambar'];
                              ?>
                                <img src="<?php echo $gambarPath; ?>" alt="" width="210" height="105">
                              <?php    
                              }
                              ?>
                            </td>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo $x['tipe_kamar']; ?>
                                    </h5>
                                    <h6>
                                    <?php echo $x['nomor_kamar']; ?>
                                    </h6>
                                    
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                   
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Kulkas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['kulkas']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pemanas Air</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['pemanas_air']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sarapan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['sarapan']; ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tipe Ranjang</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['tipe_ranjang']; ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bathtub</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['bathtub']; ?></p>
                                            </div>
                                        </div>
                                            

                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div> -->
                                       
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
                        
        </body>
               


<?php
                }
                ?>

</html>

<?php
} else {
echo "Anda belum login";
header("Location: login.php");
}
}
?>
                                        
